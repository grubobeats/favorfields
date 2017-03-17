<?php
/**
 * Generated by the WordPress Meta Box Generator at http://goo.gl/8nwllb
 */
class Multiple_Images {
    private $screens = array(
        'color_template',
    );

    /**
     * Class construct method. Adds actions to their respective WordPress hooks.
     */
    public function __construct() {
        add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
        add_action( 'admin_footer', array( $this, 'admin_footer' ) );
        add_action( 'save_post', array( $this, 'save_post' ) );
    }

    /**
     * Hooks into WordPress' add_meta_boxes function.
     * Goes through screens (post types) and adds the meta box.
     */
    public function add_meta_boxes() {
        foreach ( $this->screens as $screen ) {
            add_meta_box(
                'multiple-images',
                __( 'Multiple images', 'rational-metabox' ),
                array( $this, 'add_meta_box_callback' ),
                $screen,
                'normal',
                'high'
            );
        }
    }

    /**
     * Taking number of fields from Redux and rendering that amount of fields
     * to Color templates admin
     * @return array
     */
    public function setFields() {

        global $favorfields;
        $images = array();

        for ( $i = 1; $i <= $favorfields['number-of-images']; $i++ ) {
            $images[] = array(
                'id' => 'image-' . $i,
                'label' => 'Image #' . $i,
                'type' => 'media',
            );
        }

        return $images;
    }

    /**
     * Generates the HTML for the meta box
     *
     * @param object $post WordPress post object
     */
    public function add_meta_box_callback( $post ) {
        wp_nonce_field( 'multiple_images_data', 'multiple_images_nonce' );
        echo 'Insert images';
        $this->generate_fields( $post );
    }

    /**
     * Hooks into WordPress' admin_footer function.
     * Adds scripts for media uploader.
     */
    public function admin_footer() {
        ?><style>
            table.images td, table td * {
                vertical-align: top;
            }
        </style><script>
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

                $('.dashicons-no').click(function(){
                   $(this).parent().find('img').hide();
                   $(this).parent().find('.regular-text').val("");
                   $(this).hide();
                });
            });
        </script><?php
    }

    /**
     * Generates the field's HTML for the meta box.
     */
    public function generate_fields( $post ) {
        $output = '';
        foreach ( $this->setFields() as $field ) {
            $label = '<label for="' . $field['id'] . '">' . $field['label'] . '</label>';
            $db_value = get_post_meta( $post->ID, 'multiple_images_' . $field['id'], true );
            switch ( $field['type'] ) {
                case 'media':
                    $input = sprintf(
                        '<input class="regular-text" id="%s" name="%s" type="text" value="%s"> <input class="button rational-metabox-media" id="%s_button" name="%s_button" type="button" value="Upload" />',
                        $field['id'],
                        $field['id'],
                        $db_value,
                        $field['id'],
                        $field['id']
                    );

                    if (isset($db_value) && $db_value != "") {
                        $input .= sprintf("<img src='%s' width='200px'><span class=\"dashicons dashicons-no\"></span>", $db_value);
                    }
                    break;
                default:
                    $input = sprintf(
                        '<input %s id="%s" name="%s" type="%s" value="%s">',
                        $field['type'] !== 'color' ? 'class="regular-text"' : '',
                        $field['id'],
                        $field['id'],
                        $field['type'],
                        $db_value
                    );
            }
            $output .= $this->row_format( $label, $input );
        }
        echo '<table class="form-table images"><tbody>' . $output . '</tbody></table>';
    }

    /**
     * Generates the HTML for table rows.
     */
    public function row_format( $label, $input ) {
        return sprintf(
            '<tr><th scope="row">%s</th><td>%s</td></tr>',
            $label,
            $input
        );
    }
    /**
     * Hooks into WordPress' save_post function
     */
    public function save_post( $post_id ) {
        if ( ! isset( $_POST['multiple_images_nonce'] ) )
            return $post_id;

        $nonce = $_POST['multiple_images_nonce'];
        if ( !wp_verify_nonce( $nonce, 'multiple_images_data' ) )
            return $post_id;

        if ( defined( 'DOING_AUTOSA3VE' ) && DOING_AUTOSAVE )
            return $post_id;

        foreach ( $this->setFields() as $field ) {
            if ( isset( $_POST[ $field['id'] ] ) ) {
                switch ( $field['type'] ) {
                    case 'email':
                        $_POST[ $field['id'] ] = sanitize_email( $_POST[ $field['id'] ] );
                        break;
                    case 'text':
                        $_POST[ $field['id'] ] = sanitize_text_field( $_POST[ $field['id'] ] );
                        break;
                }
                update_post_meta( $post_id, 'multiple_images_' . $field['id'], $_POST[ $field['id'] ] );
            } else if ( $field['type'] === 'checkbox' ) {
                update_post_meta( $post_id, 'multiple_images_' . $field['id'], '0' );
            }
        }
    }
}
new Multiple_Images;