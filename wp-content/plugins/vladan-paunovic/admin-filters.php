<?php

/**
 * Adding filtering by authors to my_wellgorithms
 */
function rudr_filter_by_the_author() {
    if (isset($_GET['post_type']) && $_GET['post_type'] == 'my_wellgorithms') {
        $params = array(
            'name' => 'author', // this is the "name" attribute for filter <select>
            'show_option_all' => 'All authors' // label for all authors (display posts without filter)
        );

        if (isset($_GET['user']))
            $params['selected'] = $_GET['user']; // choose selected user by $_GET variable


        wp_dropdown_users($params); // print the ready author list
    }
}

add_action('restrict_manage_posts', 'rudr_filter_by_the_author');


/**
 * @param $query
 * Filter admin fields by meta values to wellgorithms
 */

function ba_admin_posts_filter( $query )
{
    global $pagenow;
    if (isset($_GET['post_type']) && $_GET['post_type'] == 'wellgorithms') {
        $query->query_vars['meta_key'] = $_GET['ADMIN_FILTER_FIELD_NAME'];
        if (isset($_GET['ADMIN_FILTER_FIELD_VALUE']) && $_GET['ADMIN_FILTER_FIELD_VALUE'] != '')
            $query->query_vars['meta_value'] = $_GET['ADMIN_FILTER_FIELD_VALUE'];
    }
}

add_filter( 'parse_query', 'ba_admin_posts_filter' );

add_action( 'restrict_manage_posts', 'my_search_box' );
function my_search_box() {
    global $typenow;
    if ($typenow == 'wellgorithms') {
        ?>
        <select name="ADMIN_FILTER_FIELD_NAME">
            <option value="0">Custom field...</option>
            <option value="basic_settings_weight">Weight</option>
            <option value="basic_settings_level">Level</option>
            <option value="basic_settings_recommended">Recommended</option>
        </select>
        Value:
        <input type="TEXT" name="ADMIN_FILTER_FIELD_VALUE" value="" placeholder="Enter value" />
        <?php
    }
}