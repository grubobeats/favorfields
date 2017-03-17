<?php

/**
 * Generated by the WordPress Meta Box Generator at http://goo.gl/8nwllb
 */
class Basic_Settings {
    private $screens = array(
        'color_template',
    );
    private $fields = array(
        array(
            'id' => 'color-1',
            'label' => 'Color #1',
            'type' => 'color',
        ),
        array(
            'id' => 'color-2',
            'label' => 'Color #2',
            'type' => 'color',
        ),
        array(
            'id' => 'color-3',
            'label' => 'Color #3',
            'type' => 'color',
        ),
        array(
            'id' => 'color-4',
            'label' => 'Color #4',
            'type' => 'color',
        ),
    );

    /**
     * Class construct method. Adds actions to their respective WordPress hooks.
     */
    public function __construct() {
        add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
        add_action( 'save_post', array( $this, 'save_post' ) );
    }

    /**
     * Hooks into WordPress' add_meta_boxes function.
     * Goes through screens (post types) and adds the meta box.
     */
    public function add_meta_boxes() {
        foreach ( $this->screens as $screen ) {
            add_meta_box(
                'basic-settings',
                __( 'Basic settings', 'rational-metabox' ),
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
        echo 'Edit color template settings';
        $this->generate_fields( $post );
    }

    /**
     * Generates the field's HTML for the meta box.
     */
    public function generate_fields( $post ) {
        $output = '';
        foreach ( $this->fields as $field ) {
            $label = '<label for="' . $field['id'] . '">' . $field['label'] . '</label>';
            $db_value = get_post_meta( $post->ID, 'basic_settings_' . $field['id'], true );
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
                update_post_meta( $post_id, 'basic_settings_' . $field['id'], $_POST[ $field['id'] ] );
            } else if ( $field['type'] === 'checkbox' ) {
                update_post_meta( $post_id, 'basic_settings_' . $field['id'], '0' );
            }
        }
    }
}
new Basic_Settings;