<?php
/**
 * Created by PhpStorm.
 * User: vladan
 * Date: 25/04/2017
 * Time: 16:50
 */

Redux::setSection( $opt_name, array(
	'title' => __( 'Wellgorithms', 'redux-framework-demo' ),
	'id'    => 'wellgorithms',
	'desc'  => __( 'Basic fields as subsections.', 'redux-framework-demo' ),
	'icon'  => 'el el-home'
) );

Redux::setSection( $opt_name, array(
	'title'      => __( 'Common Settings', 'redux-framework-demo' ),
	'desc'       => __( 'Common settings for all types of wellgorithms', 'redux-framework-demo' ),
	'id'         => 'wellgo-common',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'number-of-steps',
			'type'     => 'text',
			'title'    => 'Steps (wellgorithms)',
			'subtitle' => '',
			'desc'     => 'Maximum number of steps',
			'validate' => 'numeric',
			'msg'      => 'You can store only numbers here',
			'default'  => '15'
		),

		array(
			'id'=>'prompt-save-wellgo',
			'type' => 'textarea',
			'title' => __('Popup text after completing wellgorithm', 'redux-framework-demo'),
			'subtitle' => __('Custom HTML Allowed', 'redux-framework-demo'),
			'desc' => '',
			'validate' => 'html_custom',
			'default' => '<p>We noticed that you made some changes to this Wellgorithm. Would you like to save those changes to your board?</p>',
			'allowed_html' => array(
				'a' => array(
					'href' => array(),
					'title' => array()
				),
				'br' => array(),
				'em' => array(),
				'strong' => array()
			)
		),
	)
) );

Redux::setSection( $opt_name, array(
	'title'      => __( 'Wellgo', 'redux-framework-demo' ),
	'desc'       => __( 'Settings for wellgorithms', 'redux-framework-demo' ),
	'id'         => 'wellgo-wellgo',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'logo_gallery',
			'type'     => 'gallery',
			'title'    => __('Add/Edit Icons', 'redux-framework-demo'),
		),

		array(
			'id'       => 'question-animations',
			'type'     => 'select',
			'title'    => __('Select Animation', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'desc'     => __('Select how questions are appearing in wellghoritms', 'redux-framework-demo'),
			// Must provide key => value pairs for select options
			'options'  => array(
				'bounce' => 'Bounce',
				'flash' => 'Flash',
				'pulse' => 'Pulse',
				'rubberBand' => 'RubberBand',
				'shake' => 'Shake',
				'swing' => 'Swing',
				'bounceIn' => 'BounceIn',
				'bounceInUp' => 'BounceInUp',
				'fadeIn' => 'FadeIn',
				'fadeInUpBig' => 'FadeInUpBig',
				'lightSpeedIn' => 'LightSpeedIn',
				'slideInUp' => 'SlideInUp',
				'slideInDown' => 'SlideInDown',
				'zoomIn' => 'ZoomIn',
				'rollIn' => 'RollIn',
			),
			'default'  => 'fadeIn',
		),

		array(
			'id' => 'section-start',
			'type' => 'section',
			'title' => __('Extra menu: first', 'redux-framework-demo'),
			'subtitle' => __('Edit fields for the extra menus on the end of each step.', 'redux-framework-demo'),
			'indent' => true
		),

		array(
			'id'       => 'wellgo_extra_menu_1',
			'type'     => 'text',
			'title'    => __('Title', 'redux-framework-demo'),
			'default'  => 'Blocks'
		),
		array(
			'id'       => 'wellgo_extra_menu_2',
			'type'     => 'textarea',
			'title'    => __('Text', 'redux-framework-demo'),
			'default'  => 'Some text goes here'
		),

		array(
			'id'     => 'section-end',
			'type'   => 'section',
			'indent' => false,
		),

		array(
			'id' => 'section-start-2',
			'type' => 'section',
			'title' => __('Extra menu: second', 'redux-framework-demo'),
			'subtitle' => __('Edit fields for the extra menus on the end of each step.', 'redux-framework-demo'),
			'indent' => true
		),

		array(
			'id'       => 'wellgo_extra_menu_1-2',
			'type'     => 'text',
			'title'    => __('Title', 'redux-framework-demo'),
			'default'  => 'Blocks'
		),
		array(
			'id'       => 'wellgo_extra_menu_2-2',
			'type'     => 'textarea',
			'title'    => __('Text', 'redux-framework-demo'),
			'default'  => 'Some text goes here'
		),

		array(
			'id'     => 'section-end-2',
			'type'   => 'section',
			'indent' => false,
		),

		array(
			'id' => 'section-start-3',
			'type' => 'section',
			'title' => __('Extra menu: third', 'redux-framework-demo'),
			'subtitle' => __('Edit fields for the extra menus on the end of each step.', 'redux-framework-demo'),
			'indent' => true
		),

		array(
			'id'       => 'wellgo_extra_menu_1-3',
			'type'     => 'text',
			'title'    => __('Title', 'redux-framework-demo'),
			'default'  => 'Blocks'
		),
		array(
			'id'       => 'wellgo_extra_menu_2-3',
			'type'     => 'textarea',
			'title'    => __('Text', 'redux-framework-demo'),
			'default'  => 'Some text goes here'
		),

		array(
			'id'     => 'section-end-3',
			'type'   => 'section',
			'indent' => false,
		),
	)
) );

Redux::setSection( $opt_name, array(
	'title'      => __( 'Hellgo', 'redux-framework-demo' ),
	'desc'       => __( 'Settings for hellgorithms.', 'redux-framework-demo' ),
	'id'         => 'wellgo-hellgo',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'h_logo_gallery',
			'type'     => 'gallery',
			'title'    => __('Add/Edit Icons', 'redux-framework-demo'),
		),

		array(
			'id'       => 'h_question-animations',
			'type'     => 'select',
			'title'    => __('Select Animation', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'desc'     => __('Select how questions are appearing in hellgorithms', 'redux-framework-demo'),
			// Must provide key => value pairs for select options
			'options'  => array(
				'bounce' => 'Bounce',
				'flash' => 'Flash',
				'pulse' => 'Pulse',
				'rubberBand' => 'RubberBand',
				'shake' => 'Shake',
				'swing' => 'Swing',
				'bounceIn' => 'BounceIn',
				'bounceInUp' => 'BounceInUp',
				'fadeIn' => 'FadeIn',
				'fadeInUpBig' => 'FadeInUpBig',
				'lightSpeedIn' => 'LightSpeedIn',
				'slideInUp' => 'SlideInUp',
				'slideInDown' => 'SlideInDown',
				'zoomIn' => 'ZoomIn',
				'rollIn' => 'RollIn',
			),
			'default'  => 'fadeIn',
		),


		array(
			'id' => 'h_section-start',
			'type' => 'section',
			'title' => __('Extra menu: first', 'redux-framework-demo'),
			'subtitle' => __('Edit fields for the extra menus on the end of each step.', 'redux-framework-demo'),
			'indent' => true
		),

		array(
			'id'       => 'h_wellgo_extra_menu_1',
			'type'     => 'text',
			'title'    => __('Title', 'redux-framework-demo'),
			'default'  => 'Blocks'
		),
		array(
			'id'       => 'h_wellgo_extra_menu_2',
			'type'     => 'textarea',
			'title'    => __('Text', 'redux-framework-demo'),
			'default'  => 'Some text goes here'
		),

		array(
			'id'     => 'h_section-end',
			'type'   => 'section',
			'indent' => false,
		),

		array(
			'id' => 'h_section-start-2',
			'type' => 'section',
			'title' => __('Extra menu: second', 'redux-framework-demo'),
			'subtitle' => __('Edit fields for the extra menus on the end of each step.', 'redux-framework-demo'),
			'indent' => true
		),

		array(
			'id'       => 'h_wellgo_extra_menu_1-2',
			'type'     => 'text',
			'title'    => __('Title', 'redux-framework-demo'),
			'default'  => 'Blocks'
		),
		array(
			'id'       => 'h_wellgo_extra_menu_2-2',
			'type'     => 'textarea',
			'title'    => __('Text', 'redux-framework-demo'),
			'default'  => 'Some text goes here'
		),

		array(
			'id'     => 'h_section-end-2',
			'type'   => 'section',
			'indent' => false,
		),

		array(
			'id' => 'h_section-start-3',
			'type' => 'section',
			'title' => __('Extra menu: third', 'redux-framework-demo'),
			'subtitle' => __('Edit fields for the extra menus on the end of each step.', 'redux-framework-demo'),
			'indent' => true
		),

		array(
			'id'       => 'h_wellgo_extra_menu_1-3',
			'type'     => 'text',
			'title'    => __('Title', 'redux-framework-demo'),
			'default'  => 'Blocks'
		),
		array(
			'id'       => 'h_wellgo_extra_menu_2-3',
			'type'     => 'textarea',
			'title'    => __('Text', 'redux-framework-demo'),
			'default'  => 'Some text goes here'
		),

		array(
			'id'     => 'h_section-end-3',
			'type'   => 'section',
			'indent' => false,
		),
	)
) );



Redux::setSection( $opt_name, array(
	'title'      => __( 'Letgo', 'redux-framework-demo' ),
	'desc'       => __( 'Settings for Letgo wellgorithms.', 'redux-framework-demo' ),
	'id'         => 'wellgo-letgo',
	'subsection' => true,
	'fields'     => array(
		/*                array(
							'id'       => 'l_question-animations',
							'type'     => 'select',
							'title'    => __('Select Animation', 'redux-framework-demo'),
							'subtitle' => __('', 'redux-framework-demo'),
							'desc'     => __('Select how questions are appearing in hellgorithms', 'redux-framework-demo'),
							// Must provide key => value pairs for select options
							'options'  => array(
								'bounce' => 'Bounce',
								'flash' => 'Flash',
								'pulse' => 'Pulse',
								'rubberBand' => 'RubberBand',
								'shake' => 'Shake',
								'swing' => 'Swing',
								'bounceIn' => 'BounceIn',
								'bounceInUp' => 'BounceInUp',
								'fadeIn' => 'FadeIn',
								'fadeInUpBig' => 'FadeInUpBig',
								'lightSpeedIn' => 'LightSpeedIn',
								'slideInUp' => 'SlideInUp',
								'slideInDown' => 'SlideInDown',
								'zoomIn' => 'ZoomIn',
								'rollIn' => 'RollIn',
							),
							'default'  => 'fadeIn',
						),*/


		array(
			'id'       => 'l_logo_gallery',
			'type'     => 'gallery',
			'title'    => __('Add/Edit Icons', 'redux-framework-demo'),
		),

		array(
			'id' => 'l_section-start',
			'type' => 'section',
			'title' => __('Extra menu: first', 'redux-framework-demo'),
			'subtitle' => __('Edit fields for the extra menus on the end of each step.', 'redux-framework-demo'),
			'indent' => true
		),

		array(
			'id'       => 'l_wellgo_extra_menu_1',
			'type'     => 'text',
			'title'    => __('Title', 'redux-framework-demo'),
			'default'  => 'Blocks'
		),
		array(
			'id'       => 'l_wellgo_extra_menu_2',
			'type'     => 'textarea',
			'title'    => __('Text', 'redux-framework-demo'),
			'default'  => 'Some text goes here'
		),

		array(
			'id'     => 'l_section-end',
			'type'   => 'section',
			'indent' => false,
		),

		array(
			'id' => 'l_section-start-2',
			'type' => 'section',
			'title' => __('Extra menu: second', 'redux-framework-demo'),
			'subtitle' => __('Edit fields for the extra menus on the end of each step.', 'redux-framework-demo'),
			'indent' => true
		),

		array(
			'id'       => 'l_wellgo_extra_menu_1-2',
			'type'     => 'text',
			'title'    => __('Title', 'redux-framework-demo'),
			'default'  => 'Blocks'
		),
		array(
			'id'       => 'l_wellgo_extra_menu_2-2',
			'type'     => 'textarea',
			'title'    => __('Text', 'redux-framework-demo'),
			'default'  => 'Some text goes here'
		),

		array(
			'id'     => 'l_section-end-2',
			'type'   => 'section',
			'indent' => false,
		),

		array(
			'id' => 'l_section-start-3',
			'type' => 'section',
			'title' => __('Extra menu: third', 'redux-framework-demo'),
			'subtitle' => __('Edit fields for the extra menus on the end of each step.', 'redux-framework-demo'),
			'indent' => true
		),

		array(
			'id'       => 'l_wellgo_extra_menu_1-3',
			'type'     => 'text',
			'title'    => __('Title', 'redux-framework-demo'),
			'default'  => 'Blocks'
		),
		array(
			'id'       => 'l_wellgo_extra_menu_2-3',
			'type'     => 'textarea',
			'title'    => __('Text', 'redux-framework-demo'),
			'default'  => 'Some text goes here'
		),

		array(
			'id'     => 'l_section-end-3',
			'type'   => 'section',
			'indent' => false,
		),
	)
) );