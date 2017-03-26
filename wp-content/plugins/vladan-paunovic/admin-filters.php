<?php
function rudr_filter_by_the_author() {
    $params = array(
        'name' => 'author', // this is the "name" attribute for filter <select>
        'show_option_all' => 'All authors' // label for all authors (display posts without filter)
    );

    if ( isset($_GET['user']) )
        $params['selected'] = $_GET['user']; // choose selected user by $_GET variable

    wp_dropdown_users( $params ); // print the ready author list
}

add_action('restrict_manage_posts', 'rudr_filter_by_the_author');