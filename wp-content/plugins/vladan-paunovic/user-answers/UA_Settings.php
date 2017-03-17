<?php

/**
 * Generating custom meta box for basic setting
 */
class UA_Settings {

    private $screens = array(
        'user_answers',
    );

    public function color_templates() {

        global $wpdb;
        $array = array();

        $fivesdrafts = $wpdb->get_results(
            "
            SELECT ID, post_title 
            FROM $wpdb->posts
            WHERE post_type = 'color_template'
              AND post_status = 'publish'
            "
        );

        foreach ( $fivesdrafts as $key => $value )
        {
            $array[$value->ID] = $value->post_title;
        }


        return $array;
    }

    public $fields;
    public $color_values;
    public $colors;
    public $wp_query;
    public $args;

    /**
     * Class construct method. Adds actions to their respective WordPress hooks.
     */
    public function __construct() {
        add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
        add_action( 'admin_footer', array( $this, 'admin_footer' ) );
        add_action( 'save_post', array( $this, 'save_post' ) );

        $this->color_values = $this->color_templates();

        $this->fields = array(
            array(
                'id' => 'related_wellgo',
                'label' => 'Related Wellgorihtm',
                'type' => 'text',
            ),
            array(
                'id' => 'icon',
                'label' => 'Icon',
                'type' => 'media',
            ),
            array(
                'id' => 'steps',
                'label' => 'Steps',
                'type' => 'text',
            ),
            array(
                'id' => 'color-template',
                'label' => 'Color template',
                'type' => 'select',
                'options' => $this->color_values
            ),
            array(
                'id' => 'mood',
                'label' => 'Mood',
                'type' => 'select',
                'options' => array(
                    'Sunshine',
                    'Cloudy',
                    'Rainy',
                    'Thunderstorm',
                    'Rainbow',
                ),
            ),
            array(
                'id' => 'level',
                'label' => 'Level',
                'type' => 'select',
                'options' => array(
                    '1',
                    '2',
                    '3',
                ),
            ),
            array(
                'id' => 'confidence',
                'label' => 'Confidence',
                'type' => 'select',
                'options' => array(
                    'Stuck',
                    'Middle',
                    'Free',
                ),
            ),
            array(
                'id' => 'recommended',
                'label' => 'Recommended',
                'type' => 'select',
                'options' => array(
                    'Good',
                    'Bad',
                ),
            ),
        );
    }

    /**
     * Hooks into WordPress' add_meta_boxes function.
     * Goes through screens (post types) and adds the meta box.
     */
    public function add_meta_boxes() {
        foreach ( $this->screens as $screen ) {
            add_meta_box(
                'basic-settings',
                __( 'Basic Settings', 'rational-metabox' ),
                array( $this, 'add_meta_box_callback' ),
                $screen,
                'side',
                'high'
            );
        }
    }

    /**
     * Generates the HTML for the meta box
     *
     * @param object $post WordPress post object
     */
    public function add_meta_box_callback( $post ) {
        wp_nonce_field( 'basic_settings_data', 'basic_settings_nonce' );
        $this->generate_fields( $post );
    }

    /**
     * Hooks into WordPress' admin_footer function.
     * Adds scripts for media uploader.
     */
    public function admin_footer() {
        ?><script>
            // https://codestag.com/how-to-use-wordpress-3-5-media-uploader-in-theme-options/
            jQuery(document).ready(function($){
                if ( typeof wp.media !== 'undefined' ) {
                    var _custom_media = true,
                        _orig_send_attachment = wp.media.editor.send.attachment;
                    $('.rational-metabox-media').click(function(e) {
                        var send_attachment_bkp = wp.media.editor.send.attachment;
                        var button = $(this);
                        var id = button.attr('id').replace('_button', '');
                        _custom_media = true;
                        wp.media.editor.send.attachment = function(props, attachment){
                            if ( _custom_media ) {
                                $("#"+id).val(attachment.url);
                            } else {
                                return _orig_send_attachment.apply( this, [props, attachment] );
                            };
                        }
                        wp.media.editor.open(button);
                        return false;
                    });
                    $('.add_media').on('click', function(){
                        _custom_media = false;
                    });
                }
            });
        </script><?php
    }

    /**
     * Generates the field's HTML for the meta box.
     */
    public function generate_fields( $post ) {
        $output = '';
        foreach ( $this->fields as $field ) {
            $label = '<label for="' . $field['id'] . '">' . $field['label'] . '</label>';
            $db_value = get_post_meta( $post->ID, 'user_basic_settings_' . $field['id'], true );
            switch ( $field['type'] ) {
                case 'media':
                    $input = sprintf(
                        '<input id="%s" name="%s" type="text" value="%s"> <input class="button rational-metabox-media" id="%s_button" name="%s_button" type="button" value="Upload" />',
                        $field['id'],
                        $field['id'],
                        $db_value,
                        $field['id'],
                        $field['id']
                    );
                    break;
                case 'select':
                    $input = sprintf(
                        '<select id="%s" name="%s">',
                        $field['id'],
                        $field['id']
                    );
                    foreach ( $field['options'] as $key => $value ) {
                        $field_value = $value;
                        $input .= sprintf(
                            '<option %s value="%s" >%s</option>',
                            $db_value === $field_value ? 'selected' : '',
                            $field_value,
                            $value
                        );
                    }
                    $input .= '</select>';
                    break;
                default:
                    $input = sprintf(
                        '<input id="%s" name="%s" type="%s" value="%s">',
                        $field['id'],
                        $field['id'],
                        $field['type'],
                        $db_value
                    );
            }
            $output .= '<p>' . $label . '<br>' . $input . '</p>';
        }
        echo $output;

    }

    /**
     * Hooks into WordPress' save_post function
     */
    public function save_post( $post_id ) {
        if ( ! isset( $_POST['basic_settings_nonce'] ) )
            return $post_id;

        $nonce = $_POST['basic_settings_nonce'];
        if ( !wp_verify_nonce( $nonce, 'basic_settings_data' ) )
            return $post_id;

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
            return $post_id;

        foreach ( $this->fields as $field ) {
            if ( isset( $_POST[ $field['id'] ] ) ) {
                switch ( $field['type'] ) {
                    case 'email':
                        $_POST[ $field['id'] ] = sanitize_email( $_POST[ $field['id'] ] );
                        break;
                    case 'text':
                        $_POST[ $field['id'] ] = sanitize_text_field( $_POST[ $field['id'] ] );
                        break;
                }
                update_post_meta( $post_id, 'user_basic_settings_' . $field['id'], $_POST[ $field['id'] ] );
            } else if ( $field['type'] === 'checkbox' ) {
                update_post_meta( $post_id, 'user_basic_settings_' . $field['id'], '0' );
            }
        }


    }
}
new UA_Settings;