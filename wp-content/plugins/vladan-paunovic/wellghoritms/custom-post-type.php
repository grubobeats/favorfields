<?php
/**
 * Created by PhpStorm.
 * User: vladan
 * Date: 10/02/2017
 * Time: 16:28
 */


// Register Custom Post Type
function wellghoritms() {

    $labels = array(
        'name'                  => _x( 'Wellgorithms', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Wellgorithm', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Wellgorithm', 'text_domain' ),
        'name_admin_bar'        => __( 'Wellgorithm', 'text_domain' ),
        'archives'              => __( 'Wellgorithm Archives', 'text_domain' ),
        'attributes'            => __( 'Wellgorithm Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Wellgorithm:', 'text_domain' ),
        'all_items'             => __( 'All Wellgorithms', 'text_domain' ),
        'add_new_item'          => __( 'Add New Wellgorithm', 'text_domain' ),
        'add_new'               => __( 'Add New Wellgorithm', 'text_domain' ),
        'new_item'              => __( 'New Wellgorithm', 'text_domain' ),
        'edit_item'             => __( 'Edit Wellgorithm', 'text_domain' ),
        'update_item'           => __( 'Update Wellgorithm', 'text_domain' ),
        'view_item'             => __( 'View Wellgorithm', 'text_domain' ),
        'view_items'            => __( 'View Wellgorithms', 'text_domain' ),
        'search_items'          => __( 'Search Wellgorithm', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this Wellgorithm', 'text_domain' ),
        'items_list'            => __( 'Items list', 'text_domain' ),
        'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter Wellgorithms list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Wellgorithm', 'text_domain' ),
        'description'           => __( 'Wellgorithm Description', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'thumbnail', ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'menu_icon'             => 'dashicons-smiley',
    );
    register_post_type( 'wellghoritms', $args );

}
add_action( 'init', 'wellghoritms', 0 );

