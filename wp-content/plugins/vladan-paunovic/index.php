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

/**
 * Adds the meta box stylesheet when appropriate
 */
function vp_admin_styles(){
    global $typenow;

    if( $typenow == 'wellghoritms' ) {
        wp_enqueue_style( 'vp_admin_styles', plugins_url( 'css/style.css', __FILE__ ));
    }
}
add_action( 'admin_print_styles', 'vp_admin_styles' );