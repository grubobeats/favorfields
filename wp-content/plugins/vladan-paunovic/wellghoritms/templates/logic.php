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
          AND post_title = '$color_scheme') AND meta_key = '$key'
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
          AND post_title = '$color_scheme') AND meta_key LIKE '%multiple_images_image%' AND meta_value != ''
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
            $user_answers = "SELECT * FROM wp_posts WHERE post_author = $this_user AND post_type = 'user_answers' AND post_status = 'publish'";
            $gel_all_answers_for_this_user = $wpdb->get_results($user_answers);

            if (count($gel_all_answers_for_this_user) > 0) {

                $ids = array();

                foreach ($gel_all_answers_for_this_user as $answer) {
                    $one_of_the_posts_id = $answer->ID;

                    $list_wellgorithms = "SELECT * from wp_postmeta WHERE post_id   = $one_of_the_posts_id AND meta_key = 'user_basic_settings_related_wellgo'";
                    $get_related_wellgo = $wpdb->get_results($list_wellgorithms);

                    $redirect_to_id = $get_related_wellgo[count($get_related_wellgo) - 1]->post_id;

                    if ($this_post_id == $get_related_wellgo[0]->meta_value) {
                        $ids[] = get_permalink($redirect_to_id);
                    }
                }

                $last_id = $ids[ count($ids) - 1 ];
                wp_redirect($last_id);
                exit;
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

}

$logic = new Template_logic();