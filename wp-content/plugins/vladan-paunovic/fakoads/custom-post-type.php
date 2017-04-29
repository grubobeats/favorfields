<?php
/**
 * Created by PhpStorm.
 * User: vladan
 * Date: 29/04/2017
 * Time: 09:47
 */


// Register Custom Post Type
function fakoads() {

	$labels = array(
		'name'                  => _x( 'Fako-ads', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Fako-ad', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Fako-ad', 'text_domain' ),
		'name_admin_bar'        => __( 'Fako-ad', 'text_domain' ),
		'archives'              => __( 'Fako-ad Archives', 'text_domain' ),
		'attributes'            => __( 'Fako-ad Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Fako-ad:', 'text_domain' ),
		'all_items'             => __( 'All Fako-ads', 'text_domain' ),
		'add_new_item'          => __( 'Add New Fako-ad', 'text_domain' ),
		'add_new'               => __( 'Add New Fako-ad', 'text_domain' ),
		'new_item'              => __( 'New Fako-ad', 'text_domain' ),
		'edit_item'             => __( 'Edit Fako-ad', 'text_domain' ),
		'update_item'           => __( 'Update Fako-ad', 'text_domain' ),
		'view_item'             => __( 'View Fako-ad', 'text_domain' ),
		'view_items'            => __( 'View Fako-ads', 'text_domain' ),
		'search_items'          => __( 'Search Fako-ad', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Fako-ad', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Fako-ads list', 'text_domain' ),
	);
	$args = array(
		'query_var'             => true,
		'label'                 => __( 'Fako-ad', 'text_domain' ),
		'description'           => __( 'Fako-ad Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => true,
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
		'menu_icon'             => 'dashicons-carrot',
		'rewrite'               => array(
			'slug'          => 'fakoads',
			'with_front'    => false
		)
	);
	register_post_type( 'fakoads', $args );

}
add_action( 'init', 'fakoads', 0 );

