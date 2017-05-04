<?php

/**
 * @description: Getting data from 'Color Template' associated to this Wellgorithm
 * @author: Vladan Paunovic
 * @contact: https://givemejobtoday.com
 * @date: 15/02/2017
 */
class Template_logic
{
    public function getColorTemplate($color_scheme, $key) {
        global $wpdb;

        $get_color_template = $wpdb->get_results(
            "
          SELECT meta_value FROM $wpdb->postmeta WHERE post_id = 
        (SELECT ID
        FROM $wpdb->posts
        WHERE post_type = 'color_template'
          AND post_title = '$color_scheme' LIMIT 1) AND meta_key = '$key' LIMIT 1
        "
        );

        return $get_color_template[0]->meta_value;
    }

    /**
     * @description: Getting random image from 'Color template' associated to this Wellgorithm
     * @param $color_scheme
     * @param bool $random
     * @return mixed
     */
    public function getRandomImage($color_scheme, $random = false) {
        global $wpdb;

        $get_images = $wpdb->get_results(
            "
          SELECT * FROM $wpdb->postmeta WHERE post_id = 
        (SELECT ID
        FROM $wpdb->posts
        WHERE post_type = 'color_template'
          AND post_title = '$color_scheme' LIMIT 1) AND meta_key LIKE '%multiple_images_image%' AND meta_value != ''
        "
        );

        $images = array();
        foreach ($get_images as $image) {
            $images[] = $image->meta_value;
        }

        if ($random == true) {
            return $images[array_rand($images)];
        } else {
            return $images[0];
        }
    }

    /**
     * @description: Collecting all data for single wellghoritm,
     * unserializing strings and returning array
     * @author: Vladan Paunovic
     * @contact: https://givemejobtoday.com
     * @date: 15/02/2017
     */
    public function getWellghoritm() {

		$stored_data = get_post_meta( get_the_ID() );

		// Getting questions from related wellgo
		$stored_data['admin_questions'] = get_post_meta( $this->getWellgorithmPostID(), 'chosen_question' )[0];
		$stored_data['admin_icon'] = get_post_meta( $this->getWellgorithmPostID(), 'basic_settings_icon' )[0];

		// Getting the rest of the data from original wellgo
		$stored_data['questions'] = unserialize($stored_data['questions'][0]);
        $stored_data['first_answers'] = unserialize($stored_data['first_answers'][0]);
        $stored_data['second_answers'] = unserialize($stored_data['second_answers'][0]);
        $stored_data['chosen_question'] = unserialize($stored_data['chosen_question'][0]);
        $stored_data['chosen_first_answer'] = unserialize($stored_data['chosen_first_answer'][0]);
        $stored_data['chosen_second_answer'] = unserialize($stored_data['chosen_second_answer'][0]);
        $stored_data['user_questions'] = unserialize($stored_data['user_questions'][0]);
        $stored_data['user_first_answers'] = unserialize($stored_data['user_first_answers'][0]);
        $stored_data['user_second_answers'] = unserialize($stored_data['user_second_answers'][0]);

        return $stored_data;
    }


    /**
     * Checking for custom wellgorithm if ti exists
     */
    public function checkForCustomWellgo(){

        if ( is_singular('wellgorithms') ) {

            global $wpdb;
            $this_post_id = get_the_ID();
            $this_user = get_current_user_id();

            // check if there are user_answers connected with this user.
            $user_answers = "SELECT * FROM wp_posts WHERE post_author = $this_user AND post_type = 'my_wellgorithms' AND post_status = 'publish'";
            $gel_all_answers_for_this_user = $wpdb->get_results($user_answers);

            if (count($gel_all_answers_for_this_user) > 0) {

                $ids = array();
                $check = false;

                foreach ($gel_all_answers_for_this_user as $answer) {
                    $one_of_the_posts_id = $answer->ID;

                    $list_wellgorithms = "SELECT * from wp_postmeta WHERE post_id   = $one_of_the_posts_id AND meta_key = 'user_basic_settings_related_wellgo'";
                    $get_related_wellgo = $wpdb->get_results($list_wellgorithms);

                    $redirect_to_id = $get_related_wellgo[count($get_related_wellgo) - 1]->post_id;

                    if ($this_post_id == $get_related_wellgo[0]->meta_value) {
                        $ids[] = get_permalink($redirect_to_id);
                        $check = true;
                    }
                }

                $last_id = $ids[ count($ids) - 1 ];

                if ($check) {
                    wp_redirect($last_id);
                    exit;
                }
            }

        }
    }

    /**
     * Find parent welgoritihm ID
     */

    function getWellgorithmPostID() {
        if ( is_singular('wellgorithms') ) {
            return get_the_ID();
        } else {
            global $wpdb;
            $this_post_id = get_the_ID();
            $query = 'SELECT `meta_value` FROM `wp_postmeta` WHERE `post_id` = ' . $this_post_id . ' AND `meta_key` =  "user_basic_settings_related_wellgo"';

            $related_wellgo = $wpdb->get_results($query);

            $wellgo_id = $related_wellgo[0]->meta_value;

            return $wellgo_id;
        }
    }

    /**
     * Get list of users for Social Mode
     */

    function getRelatedUsers($step) {
        global $wpdb;
        $related_wellgo = $this->getWellgorithmPostID();
        $query = "SELECT `post_id` FROM `wp_postmeta` WHERE `meta_key` = \"user_basic_settings_related_wellgo\" and `meta_value` = $related_wellgo";

        $post_ids = $wpdb->get_results($query);
        $reload_string = "";
        $prepare_users = array();
        $users = array();
        $render_users = array();

        // Getting list of all wellgorithms
        foreach ($post_ids as $id) {
            $query_authors = "SELECT `post_author`, `ID` FROM `wp_posts` WHERE `ID` = $id->post_id AND `post_status` = 'publish' AND `post_author` != 1";
            $prepare_users[] = $wpdb->get_results($query_authors);
        }

        foreach ($prepare_users as $prepared_user) {

            $user_id = $prepared_user[0]->post_author;
            $userdata = get_userdata($user_id);
            $avatar = get_wp_user_avatar( $prepared_user[0]->post_author, 96 );

            if ( substr( $avatar, 0, 4 ) === "<img" ) {
                $array = array();
                preg_match( '/src="([^"]*)"/i', $avatar, $array ) ;
                $avatar = $array[1];
            }

            $users[] = array(
                'user_id'       => $prepared_user[0]->post_author,
                'user_avatar'   => $avatar,
                'user_username' => $userdata->user_login,
                'post_id'       => $prepared_user[0]->ID
            );
        }

        // Prepare array for output
        for ($i=0; $i < 3; $i++) {
            $random_key = rand(0, count($users) - 1);
            if (!empty($users[$random_key]['post_id'])) {
                $render_users[] = $users[$random_key];
                if( count($users) > 3 ) {
                    $reload_string = "<div class=\"user reload\" data-step=\"$step\"><i class=\"fa fa-repeat reload_users color-2\" aria-hidden=\"true\"></i></div>";
                }
            } else {
                $i--;
            }
        }


        $output = "";
        foreach ( $render_users as $user ) {
                $output .= "<div class=\"user\" data-step=\"$step\">";
                $output .= sprintf('<img src="%s" alt="%s" class="user-avatar" data-user-id="%s" data-post-id="%s" data-step="%s"><span class="color-2">%s</span>',
                    $user['user_avatar'],
                    $user['user_username'],
                    $user['user_id'],
                    $user['post_id'],
                    $step,
                    $user['user_username']
                );
                $output .= "</div>";
        }
        $output .= $reload_string;

        return $output;
    }

    /**
     * Check if user pladged for this wellgorithm or not
     */
    function checkPladged() {
        $user_id = wp_get_current_user()->ID;
        $post_id = $this->getWellgorithmPostID();
        $today = date('Y-m-d H:i:s');;
        global $wpdb;

        $query = "SELECT * FROM `pladge_groups` WHERE `post_id` = \"$post_id\" and `user_id` = $user_id";

        $pladged_date_prepare = $wpdb->get_results($query)[0]->pladged_date_finish;
        $days_left = 0;

        if ((time()-(60*60*24)) < strtotime($pladged_date_prepare)) {
            $output = "false";
            $days_left = floor( (strtotime($pladged_date_prepare) - (time()-(60*60*24))) / 86400 );
        } else {
            $output = "true";
        }

        return array(
            'permission' => $output,
            'days_left' => $days_left
        );
    }


    /**
     * Get how many time user passed that wellgorithm
     */
    function countPassingTimes() {
        global $wpdb;

        $post_id = $this->getWellgorithmPostID();
        $user_id = wp_get_current_user()->ID;
        $query = "SELECT `passed` FROM `ff_finished_wellgorithms` WHERE `post_id`=$post_id AND `user_id`=$user_id";
        $result = $wpdb->get_results($query)[0];

        if ( !$result ) {
            return 0;
        } else {
            return $result->passed;
        }
    }

	/**
	 * Getting fake ads by category
	 */
    function getRandomFakeAd( $category_id ){

	    $args = array(
		    'post_type'         => 'fakoads',
		    'order'             => 'rand',
		    'posts_per_page'    =>  -1,
		    'post_status'       => 'publish'
	    );

	    $output = [];

	    $my_query = new WP_Query($args);
	    if( $my_query->have_posts() ) {
		    while ($my_query->have_posts()) : $my_query->the_post();
		        $cat = get_the_category();

		        if ( $cat[0]->cat_ID != $category_id ) continue;

			    $loop_post_id = get_the_ID();
			    $output[] = $loop_post_id;
		    endwhile;
	    }
	    wp_reset_query();

	    return $output[ rand(0, count($output) - 1) ];
    }


    function FakoAd( $category_id ) {

    	// Get random Fako Id from this category;
	    $fako_id = $this->getRandomFakeAd( $category_id );

	    $title = get_the_title($fako_id);
		$meta = get_post_meta($fako_id);

	    $output = [
	    	'title'     => $title,
		    'subtitle'  => $meta['fields_subtitle'][0],
		    'headline'  => $meta['fields_headline'][0],
		    'body'      => $meta['fields_body'][0],
		    'quote_name'    => $meta['fields_quote-name'][0],
		    'quote_author'  => $meta['fields_quote-author'][0],
		    'quote_image'   => $meta['fields_quote-image'][0],
		    'pro'           => $meta['fields_pro-fake-ad'][0],
		    'pro_headline'  => $meta['fields_pro-headline'][0],
		    'pro_body'      => $meta['fields_pro-body'][0],
	    ];

	    return (object) $output;
    }
}

$logic = new Template_logic();