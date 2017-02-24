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

        return $stored_data;
    }

}

$logic = new Template_logic();