<?php
/**
 * Created by PhpStorm.
 * User: vladan
 * Date: 24/04/2017
 * Time: 19:35
 */

Redux::setSection( $opt_name, array(
	'title' => __( 'Homepage', 'redux-framework-demo' ),
	'id'    => 'homepage',
	'desc'  => __( 'Settings for homepage.', 'redux-framework-demo' ),
	'icon'  => 'el el-home',
	'subsection' => false,
));


	Redux::setSection( $opt_name, array(
		'title'      => __( 'Section (Header)', 'redux-framework-demo' ),
		'desc'       => '',
		'id'         => 'homepage-sec-0',
		'subsection' => true,
		'fields'=> array(


			array(
				'id'       => 'homepage_h1',
				'type'     => 'text',
				'title'    => __('Heading', 'redux-framework-demo'),
				'description'  => '',
				'default'  => 'Do yourself a favor today.'
			),

			array(
				'id'       => 'homepage_subhead',
				'type'     => 'text',
				'title'    => __('Subhead', 'redux-framework-demo'),
				'description'  => '',
				'default'  => 'Grow, laugh and love with a Wellgorithm.'
			),
		)));





	Redux::setSection( $opt_name, array(
		'title'      => __( 'Section #1 (Algolia)', 'redux-framework-demo' ),
		'desc'       => '',
		'id'         => 'homepage-sec-1',
		'subsection' => true,
		'fields'=> array(

			array(
				'id'       => 'homepage_search_1',
				'type'     => 'text',
				'title'    => __('Algolia search 1', 'redux-framework-demo'),
				'description'  => '',
				'default'  => 'I\'m feeling...'
			),

			array(
				'id'       => 'homepage_search_2',
				'type'     => 'text',
				'title'    => __('Algolia search 2', 'redux-framework-demo'),
				'description'  => '',
				'default'  => 'I\'m seeking...'
			),

			array(
				'id'       => 'homepage_search_default_words',
				'type'     => 'textarea',
				'title'    => __('Algolia default focus words', 'redux-framework-demo'),
				'description'  => 'Each word in new row',
				'default'  => ''
			),
			array(
				'id'       => 'homepage_search_agolia_avatars',
				'type'     => 'gallery',
				'title'    => __('Add/Edit Avatars', 'redux-framework-demo'),
				'subtitle' => __('Note to have exact number of avatars and in order as they are shown on homepage.', 'redux-framework-demo'),
			)
		)));




	Redux::setSection( $opt_name, array(
		'title'      => __( 'Section #2', 'redux-framework-demo' ),
		'desc'       => '',
		'id'         => 'homepage-sec-2',
		'subsection' => true,
		'fields'=> array(

			array(
				'id'       => 'homepage_sub_2',
				'type'     => 'text',
				'title'    => __('Second subhead', 'redux-framework-demo'),
				'description'  => '',
				'default'  => 'Watch The Insider\'s Demo.'
			),

			array(
				'id'       => 'homepage_sub_2_text_1',
				'type'     => 'text',
				'title'    => __('Section #2 subhead #1', 'redux-framework-demo'),
				'description'  => '',
				'default'  => 'We asked our bots — '
			),
			array(
				'id'       => 'homepage_sub_2_text_2',
				'type'     => 'text',
				'title'    => __('Section #2 subhead #2', 'redux-framework-demo'),
				'description'  => '',
				'default'  => 'How can we spark a revolution in laughter and love?'
			),

			array(
				'id'       => 'homepage_sub_2_youtube_1',
				'type'     => 'text',
				'title'    => __('Section #2 youtube #1', 'redux-framework-demo'),
				'description'  => 'Not enabled yet',
				'default'  => ''
			),
			array(
				'id'       => 'homepage_sub_2_youtube_2',
				'type'     => 'text',
				'title'    => __('Section #2 youtube #2', 'redux-framework-demo'),
				'description'  => 'Not enabled yet',
				'default'  => ''
			),

			// Content #1
			array(
				'id'       => 'homepage_sub_2_content_title_1',
				'type'     => 'text',
				'title'    => __('Section #2 Content title #1', 'redux-framework-demo'),
				'description'  => '',
				'default'  => 'The “miracle move”: '
			),
			array(
				'id'       => 'homepage_sub_2_content_subhead_1',
				'type'     => 'text',
				'title'    => __('Section #2 Content subhead #1', 'redux-framework-demo'),
				'description'  => '',
				'default'  => 'Loving Kindness'
			),
			array(
				'id'       => 'homepage_sub_2_content_content_1',
				'type'     => 'textarea',
				'title'    => __('Section #2 content #1', 'redux-framework-demo'),
				'description'  => '',
				'default'  => 'One of the most amazing discoveries in artificial intelligence is the value of “miracle moves” — unexpected ways of solving problems. But AI is not yet helping us to love ourselves, honor our planet, and be the peace we wish to see in the world. In Favor Fields, we’re on a treasure hunt for the “miracle moves” of the heart — ways of spreading Loving Kindness we’ve never thought of before. For us, the Holy Grail of AI is not understanding human intelligence, but healing and transforming the human heart. '
			),
			array(
				'id'       => 'homepage_sub_2_content_button_1',
				'type'     => 'text',
				'title'    => __('Section #2 Content button #1', 'redux-framework-demo'),
				'description'  => '',
				'default'  => 'More'
			),

			// Content #2
			array(
				'id'       => 'homepage_sub_2_content_title_2',
				'type'     => 'text',
				'title'    => __('Section #2 Content title #2', 'redux-framework-demo'),
				'description'  => '',
				'default'  => 'The unexpected invention: '
			),
			array(
				'id'       => 'homepage_sub_2_content_subhead_2',
				'type'     => 'text',
				'title'    => __('Section #2 Content subhead #2', 'redux-framework-demo'),
				'description'  => '',
				'default'  => 'Wellgorithms'
			),
			array(
				'id'       => 'homepage_sub_2_content_content_2',
				'type'     => 'textarea',
				'title'    => __('Section #2 content #2', 'redux-framework-demo'),
				'description'  => '',
				'default'  => 'When our bots said we had to rethink social media, and rethink human wellness, we didn’t know what to expect. They basically said, “Let’s gather the very best of human wisdom — from spirituality to poetry to biology to cognitive psychology — and put it into a new form: the Wellgorithm. Let’s completely rethink social media, reinvent the news feed, and develop new ways of doing spiritual practice in community.” The result is Favor Fields, version 1.0.'
			),
			array(
				'id'       => 'homepage_sub_2_content_button_2',
				'type'     => 'text',
				'title'    => __('Section #2 Content button #2', 'redux-framework-demo'),
				'description'  => '',
				'default'  => 'More'
			),
		)));


		Redux::setSection( $opt_name, array(
			'title'      => __( 'Section #3 (slider)', 'redux-framework-demo' ),
			'desc'       => '',
			'id'         => 'homepage-sec-3',
			'subsection' => true,
			'fields'=> array(

				// Section #3
				array(
					'id'       => 'homepage_sub_3_title',
					'type'     => 'text',
					'title'    => __('Section #3 title', 'redux-framework-demo'),
					'description'  => '',
					'default'  => 'Meet The Members'
				),

				array(
					'id'       => 'homepage_sub_3_subhead',
					'type'     => 'text',
					'title'    => __('Section #3 subhead', 'redux-framework-demo'),
					'description'  => '',
					'default'  => 'An uncommon community with a common aspiration: to be the peace we wish to see in the world.'
				),

				array(
					'id'          => 'hompepage_sub_3_slider',
					'type'        => 'slides',
					'title'       => __('Slides', 'redux-framework-demo'),
					'subtitle'    => 'You can sort those slider by drag and drop',
				    'placeholder' => array(
						'title'           => __('Enter title', 'redux-framework-demo'),
						'description'     => __('Enter Description', 'redux-framework-demo'),
						'url'             => __('Link (optional)', 'redux-framework-demo'),
					),
				),
			)));



		Redux::setSection( $opt_name, array(
			'title'      => __( 'Section #4 (slider)', 'redux-framework-demo' ),
			'desc'       => '',
			'id'         => 'homepage-sec-4',
			'subsection' => true,
			'fields'=> array(

				// Section #4
				array(
					'id'       => 'homepage_sub_4_title',
					'type'     => 'text',
					'title'    => __('Section #4 title', 'redux-framework-demo'),
					'description'  => '',
					'default'  => 'Meet The Favor Bots'
				),

				array(
					'id'       => 'homepage_sub_4_subhead',
					'type'     => 'text',
					'title'    => __('Section #4 subhead', 'redux-framework-demo'),
					'description'  => '',
					'default'  => '“Let’s completely rethink social media, reinvent the news feed, and laugh away the tears.”'
				),

				array(
					'id'          => 'hompepage_sub_4_slider',
					'type'        => 'slides',
					'title'       => __('Slides', 'redux-framework-demo'),
					'subtitle'    => 'You can sort those slider by drag and drop',
					'placeholder' => array(
						'title'           => __('Enter title', 'redux-framework-demo'),
						'description'     => __('Enter Description', 'redux-framework-demo'),
						'url'             => __('Link (optional)', 'redux-framework-demo'),
					),
				),
			)));



		Redux::setSection( $opt_name, array(
			'title'      => __( 'Section #5', 'redux-framework-demo' ),
			'desc'       => '',
			'id'         => 'homepage-sec-5',
			'subsection' => true,
			'fields'=> array(

				// Section #5
				array(
					'id'       => 'homepage_sub_5_title',
					'type'     => 'text',
					'title'    => __('Section #5 title', 'redux-framework-demo'),
					'description'  => '',
					'default'  => 'Help Us Make History'
				),

				array(
					'id'       => 'homepage_sub_5_subhead',
					'type'     => 'text',
					'title'    => __('Section #5 subhead', 'redux-framework-demo'),
					'description'  => '',
					'default'  => 'Membership is full right now. But a new group is starting October 1.'
				),
			)));


		Redux::setSection( $opt_name, array(
			'title'      => __( 'Section #6', 'redux-framework-demo' ),
			'desc'       => '',
			'id'         => 'homepage-sec-6',
			'subsection' => true,
			'fields'=> array(

				// Section #6
				array(
					'id'       => 'homepage_sub_6_title',
					'type'     => 'text',
					'title'    => __('Section #6 title', 'redux-framework-demo'),
					'description'  => '',
					'default'  => 'Take The Tour'
				),

				array(
					'id'       => 'homepage_sub_6_subhead',
					'type'     => 'text',
					'title'    => __('Section #6 subhead', 'redux-framework-demo'),
					'description'  => '',
					'default'  => 'Hi. I’m Shae, aka Lady Metta.<br>Here to help you find your way around.'
				),
				array(
					'id'       => 'homepage_sub_6_username',
					'type'     => 'text',
					'title'    => __('Section #6 username', 'redux-framework-demo'),
					'description'  => '',
					'default'  => 'Lady<br>Metta'
				),
				array(
					'id'       => 'homepage_sub_6_user_avatar',
					'type'     => 'media',
					'url'      => true,
					'title'    => __('Section #6 user avatar', 'redux-framework-demo'),
					'default'  => array(
						'url'=>'http://favorfields.com//wp-content/themes/favorfields/assets/images/img_avatar1.png'
					),
				),
				array(
					'id'       => 'homepage_sub_6_content',
					'type'     => 'textarea',
					'title'    => __('Section #6 content', 'redux-framework-demo'),
					'description'  => '',
				),
			)));
