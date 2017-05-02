<?php

/**
 * Created by PhpStorm.
 * User: vladan
 * Date: 02/05/2017
 * Time: 08:49
 */
class FF_Global {

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
}