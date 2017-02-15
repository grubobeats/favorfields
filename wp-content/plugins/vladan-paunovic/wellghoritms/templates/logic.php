<?php
/**
 * Created by PhpStorm.
 * User: vladan
 * Date: 14/02/2017
 * Time: 16:41
 */

$welgorithm = get_post_meta( get_the_ID() );
$color_scheme = $welgorithm['basic_settings_color-template'][0];

/**
 * @description: Getting data from 'Color Template' associated to this Wellgorithm
 * @param $color_scheme
 * @param $key
 * @return mixed
 */
function getColorTemplate($color_scheme, $key) {
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
function getRandomImage($color_scheme, $random = false) {
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
