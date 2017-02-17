<?php

/*
Plugin Name: Vladan Paunovic
Plugin URI: https://givemejobtoday.com/
Description: Additional features specially declared for this custom website are stored here.
Version: 1.0
Author: Vladan Paunovic
Author URI: https://givemejobtoday.com
*/

require_once 'wellghoritms/wellghoritms.php';
require_once 'color-templates/color-template.php';
require_once 'user-answers/user-answers.php';

require_once 'algolia/custom-fields.php';

/**
 * Adds the meta box stylesheet when appropriate
 */
function vp_admin_styles(){
    global $typenow;

    if( $typenow == 'wellgorithms' ) {
        wp_enqueue_style( 'vp_admin_styles', plugins_url( 'css/style.css', __FILE__ ));
    }

    if( $typenow == 'color_template' ) {
        wp_enqueue_style( 'vp_admin_styles', plugins_url( 'css/color-templates.css', __FILE__ ));
    }
}
add_action( 'admin_print_styles', 'vp_admin_styles' );


/**
 * @param $original_template
 * @return string
 * @description: Getting page template
 */
function get_templates( $original_template ) {

    if ( is_singular( 'wellgorithms' ) ) {
        wp_enqueue_style( 'vp_animate_css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css');
        wp_enqueue_script( 'vp_wellghoritms', plugins_url( 'js/wellgorithms.js', __FILE__ ), array(), '20130115', true );
        return plugin_dir_path(__FILE__) . 'wellghoritms/templates/single.php';
    } else {
        return $original_template;
    }


}

add_action('template_include', 'get_templates');