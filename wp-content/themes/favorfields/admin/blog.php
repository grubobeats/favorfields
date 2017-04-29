<?php
/**
 * Created by PhpStorm.
 * User: vladan
 * Date: 29/04/2017
 * Time: 22:37
 */


Redux::setSection( $opt_name, array(
	'title' => __( 'Blog', 'redux-framework-demo' ),
	'id'    => 'blog',
	'desc'  => __( 'Settings for blog.', 'redux-framework-demo' ),
	'icon'  => 'el el-home',
	'subsection' => false,
));

	Redux::setSection( $opt_name, array(
		'title'      => __( 'Categories order', 'redux-framework-demo' ),
		'desc'       => '',
		'id'         => 'blog-cat-order',
		'subsection' => true,
		'fields'=> array(


			array(
				'id'          => 'blog_categories_order',
				'type'        => 'slides',
				'title'       => __('Order categories', 'redux-framework-demo'),
				'subtitle'    => 'You can sort those categories by drag and drop',
				'placeholder' => array(
					'title'           => __('Enter title', 'redux-framework-demo'),
					'description'     => __('Description', 'redux-framework-demo'),
					'url'             => __('Category ID', 'redux-framework-demo'),
				),
			),
		)));