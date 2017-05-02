<?php
/**
 * Created by PhpStorm.
 * User: vladan
 * Date: 02/05/2017
 * Time: 10:06
 */

Redux::setSection( $opt_name, array(
	'title' => __( 'Fako', 'redux-framework-demo' ),
	'id'    => 'fako',
	'desc'  => __( 'Settings for Fako ads.', 'redux-framework-demo' ),
	'icon'  => 'el el-home',
	'subsection' => false,
	'fields'=> array(
		// Wellgo
		array(
			'id'       => 'wellgo_fako_img',
			'type'     => 'media',
			'url'      => true,
			'title'    => __('Wellgo image', 'redux-framework-demo'),
			'default'  => array(
				'url'=>'http://favorfields.com/wp-content/themes/favorfields/assets/images/fake-ads/iconic.png'
			),
		),

		// Cosmo
		array(
			'id'       => 'cosmo_fako_img',
			'type'     => 'media',
			'url'      => true,
			'title'    => __('Cosmo image', 'redux-framework-demo'),
			'default'  => array(
				'url'=>'http://favorfields.com/wp-content/themes/favorfields/assets/images/fake-ads/iconic.png'
			),
		),

		// Hellgo
		array(
			'id'       => 'hellgo_fako_img',
			'type'     => 'media',
			'url'      => true,
			'title'    => __('Hellgo image', 'redux-framework-demo'),
			'default'  => array(
				'url'=>'http://favorfields.com/wp-content/themes/favorfields/assets/images/fake-ads/iconic.png'
			),
		),

		// Letgo
		array(
			'id'       => 'letgo_fako_img',
			'type'     => 'media',
			'url'      => true,
			'title'    => __('Letgo image', 'redux-framework-demo'),
			'default'  => array(
				'url'=>'http://favorfields.com/wp-content/themes/favorfields/assets/images/fake-ads/iconic.png'
			),
		),

		// Predicto
		array(
			'id'       => 'predicto_fako_img',
			'type'     => 'media',
			'url'      => true,
			'title'    => __('Predicto image', 'redux-framework-demo'),
			'default'  => array(
				'url'=>'http://favorfields.com/wp-content/themes/favorfields/assets/images/fake-ads/iconic.png'
			),
		),

		// Quacko
		array(
			'id'       => 'quacko_fako_img',
			'type'     => 'media',
			'url'      => true,
			'title'    => __('Quacko image', 'redux-framework-demo'),
			'default'  => array(
				'url'=>'http://favorfields.com/wp-content/themes/favorfields/assets/images/fake-ads/iconic.png'
			),
		),
	)
));