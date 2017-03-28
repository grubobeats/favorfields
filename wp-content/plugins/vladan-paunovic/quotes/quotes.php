<?php
/**
 * Created by PhpStorm.
 * User: vladan
 * Date: 10/02/2017
 * Time: 16:28
 */
require_once 'custom-post-type.php';


function wpb_change_title_text( $title ){
    $screen = get_current_screen();

    if  ( 'quotes' == $screen->post_type ) {
        $title = 'Enter quote author here';
    }

    return $title;
}

add_filter( 'enter_title_here', 'wpb_change_title_text' );



?>