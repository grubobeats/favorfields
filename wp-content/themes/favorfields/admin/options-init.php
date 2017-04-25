<?php

    /**
     * For full documentation, please visit: http://docs.reduxframework.com/
     * For a more extensive sample-config file, you may look at:
     * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "favorfields";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'opt_name' => 'favorfields',
        'dev_mode' => TRUE,
        'use_cdn' => FALSE,
        'display_name' => 'FavorFields Theme Options',
        'display_version' => '1.0.0',
        'page_slug' => 'favorfields-theme-options',
        'page_title' => 'Favorfields Options',
        'update_notice' => TRUE,
        'intro_text' => 'Here you can customize your Favor Fields template by Vladan Paunovic',
        'footer_text' => 'Customize your Favor Fields template by Vladan Paunovic',
        'admin_bar' => TRUE,
        'menu_type' => 'menu',
        'menu_title' => 'Website Options',
        'allow_sub_menu' => TRUE,
        'page_parent_post_type' => 'your_post_type',
        'customizer' => TRUE,
        'default_show' => TRUE,
        'default_mark' => '*',
        'class' => 'FavorFields',
        'hints' => array(
            'icon' => 'el el-bulb',
            'icon_position' => 'left',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'light',
                'shadow' => '1',
                'rounded' => '1',
            ),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect' => array(
                'show' => array(
                    'duration' => '500',
                    'event' => 'mouseover',
                ),
                'hide' => array(
                    'duration' => '500',
                    'event' => 'mouseleave unfocus',
                ),
            ),
        ),
        'output' => TRUE,
        'output_tag' => TRUE,
        'settings_api' => TRUE,
        'cdn_check_time' => '1440',
        'compiler' => TRUE,
        'page_permissions' => 'manage_options',
        'save_defaults' => TRUE,
        'show_import_export' => TRUE,
        'database' => 'options',
        'transient_time' => '3600',
        'network_sites' => TRUE,
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/vladan.g.paunovic',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/reduxframework',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/company/redux-framework',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'favorfields' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'favorfields' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'favorfields' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'favorfields' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'favorfields' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    Redux::setSection( $opt_name, array(
        'title' => __( 'Theme Options', 'redux-framework-demo' ),
        'id'    => 'basic',
        'desc'  => __( 'Basic fields as subsections.', 'redux-framework-demo' ),
        'icon'  => 'el el-home'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'General settings', 'redux-framework-demo' ),
        'desc'       => 'General settings for this website.',
        'id'         => 'general-settings',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'number-of-images',
                'type'     => 'text',
                'title'    => 'Images (color templates)',
                'subtitle' => '',
                'desc'     => 'Maximum number of images',
                'validate' => 'numeric',
                'msg'      => 'You can store only numbers here',
                'default'  => '15'
            ),
        )
    ));

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Header', 'redux-framework-demo' ),
        'desc'       => __( 'For full documentation on this field, visit: ', 'redux-framework-demo' ) . '<a href="http://docs.reduxframework.com/core/fields/textarea/" target="_blank">http://docs.reduxframework.com/core/fields/textarea/</a>',
        'id'         => 'vp-header',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'main-logo',
                'type'     => 'media',
                'url'      => true,
                'title'    => __('Logo', 'redux-framework-demo'),
                'desc'     => __('Basic media uploader with disabled URL input field.', 'redux-framework-demo'),
                'subtitle' => __('Choose your main logo here', 'redux-framework-demo'),
                'default'  => array(
                    'url'=>'http://favorfields.wpengine.com/wp-content/uploads/2017/02/logo-1.png'
                ),
            ),

            array(
                'id'       => 'logo',
                'type'     => 'media',
                'url'      => true,
                'title'    => __('Mini logo for everywhere', 'redux-framework-demo'),
                'desc'     => "",
                'subtitle' => __('Choose your mini logo here', 'redux-framework-demo'),
                'default'  => array(
                    'url'=>'http://favorfields.wpengine.com/wp-content/uploads/2017/02/logo-1.png'
                ),
            ),

            array(
                'id'       => 'guest-avatar',
                'type'     => 'media',
                'url'      => true,
                'title'    => __('Guest avatar', 'redux-framework-demo'),
                'desc'     => "",
                'subtitle' => __('Choose your guest avatar here', 'redux-framework-demo'),
                'default'  => array(
                    'url'=>'http://favorfields.com/wp-content/uploads/2017/02/mm9.png'
                ),
            )
        )
    ));


    Redux::setSection( $opt_name, array(
        'title'      => __( 'Footer', 'redux-framework-demo' ),
        'desc'       => __( 'Here you can maintain footer options.', 'redux-framework-demo' ),
        'id'         => 'vp-footer',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'enable-footer',
                'type'     => 'switch',
                'title'    => __('Footer On/Off', 'redux-framework-demo'),
                'subtitle' => __('Enable and disable footer', 'redux-framework-demo'),
                'default'  => true,
            )
        )
    ) );


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

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Social ( Favors )', 'redux-framework-demo' ),
        'desc'       => __( 'Here you can maintain social options.', 'redux-framework-demo' ),
        'id'         => 'vp-social',
        'subsection' => false
	));


		Redux::setSection( $opt_name, array(
			'title'      => __( 'Wellgo', 'redux-framework-demo' ),
			'desc'       => __( 'Settings for Wellgo wellgorithms.', 'redux-framework-demo' ),
			'id'         => 'social-wellgo-wellgo',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'       => 'social_first',
					'type'     => 'text',
					'title'    => __('Menu item #1', 'redux-framework-demo'),
					'default'  => ''
				),
				array(
					'id'       => 'social_first_inner',
					'type'     => 'textarea',
					'title'    => __('Menu item #1 options', 'redux-framework-demo'),
					'description'  => 'Each row is one option',
					'default'  => ''
				),

				array(
					'id'       => 'social_second',
					'type'     => 'text',
					'title'    => __('Menu item #2', 'redux-framework-demo'),
					'default'  => ''
				),
				array(
					'id'       => 'social_second_inner',
					'type'     => 'textarea',
					'title'    => __('Menu item #2 options', 'redux-framework-demo'),
					'description'  => 'Each row is one option',
					'default'  => ''
				),

				array(
					'id'       => 'social_third',
					'type'     => 'text',
					'title'    => __('Menu item #3', 'redux-framework-demo'),
					'default'  => ''
				),
				array(
					'id'       => 'social_third_inner',
					'type'     => 'textarea',
					'title'    => __('Menu item #3 options', 'redux-framework-demo'),
					'description'  => 'Each row is one option',
					'default'  => ''
				),
			)
		) );

		Redux::setSection( $opt_name, array(
			'title'      => __( 'Letgo', 'redux-framework-demo' ),
			'desc'       => __( 'Settings for Letgo wellgorithms.', 'redux-framework-demo' ),
			'id'         => 'social-wellgo-letgo',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'       => 'l_social_first',
					'type'     => 'text',
					'title'    => __('Menu item #1', 'redux-framework-demo'),
					'default'  => ''
				),
				array(
					'id'       => 'l_social_first_inner',
					'type'     => 'textarea',
					'title'    => __('Menu item #1 options', 'redux-framework-demo'),
					'description'  => 'Each row is one option',
					'default'  => ''
				),

				array(
					'id'       => 'l_social_second',
					'type'     => 'text',
					'title'    => __('Menu item #2', 'redux-framework-demo'),
					'default'  => ''
				),
				array(
					'id'       => 'l_social_second_inner',
					'type'     => 'textarea',
					'title'    => __('Menu item #2 options', 'redux-framework-demo'),
					'description'  => 'Each row is one option',
					'default'  => ''
				),

				array(
					'id'       => 'l_social_third',
					'type'     => 'text',
					'title'    => __('Menu item #3', 'redux-framework-demo'),
					'default'  => ''
				),
				array(
					'id'       => 'l_social_third_inner',
					'type'     => 'textarea',
					'title'    => __('Menu item #3 options', 'redux-framework-demo'),
					'description'  => 'Each row is one option',
					'default'  => ''
				),
			)
		) );


		Redux::setSection( $opt_name, array(
			'title'      => __( 'Hellgo', 'redux-framework-demo' ),
			'desc'       => __( 'Settings for Hellgo wellgorithms.', 'redux-framework-demo' ),
			'id'         => 'social-wellgo-hellgo',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'       => 'h_social_first',
					'type'     => 'text',
					'title'    => __('Menu item #1', 'redux-framework-demo'),
					'default'  => ''
				),
				array(
					'id'       => 'h_social_first_inner',
					'type'     => 'textarea',
					'title'    => __('Menu item #1 options', 'redux-framework-demo'),
					'description'  => 'Each row is one option',
					'default'  => ''
				),

				array(
					'id'       => 'h_social_second',
					'type'     => 'text',
					'title'    => __('Menu item #2', 'redux-framework-demo'),
					'default'  => ''
				),
				array(
					'id'       => 'h_social_second_inner',
					'type'     => 'textarea',
					'title'    => __('Menu item #2 options', 'redux-framework-demo'),
					'description'  => 'Each row is one option',
					'default'  => ''
				),

				array(
					'id'       => 'h_social_third',
					'type'     => 'text',
					'title'    => __('Menu item #3', 'redux-framework-demo'),
					'default'  => ''
				),
				array(
					'id'       => 'h_social_third_inner',
					'type'     => 'textarea',
					'title'    => __('Menu item #3 options', 'redux-framework-demo'),
					'description'  => 'Each row is one option',
					'default'  => ''
				),
			)
		) );


    /*
     * <--- END SECTIONS
     */

    require_once 'homepage.php';
