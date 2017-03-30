<?php

/**
 * Created by PhpStorm.
 * User: vladan
 * Date: 30/03/2017
 * Time: 18:24
 */
class My_Sanctaury
{
    private $user_id;

    public function __construct() {
        $this->user_id = get_current_user_id();
    }

    public function countFinishedWellgorithms() {
        global $wpdb;

        $rowcount = $wpdb->get_var("SELECT COUNT(*) FROM `ff_finished_wellgorithms` WHERE user_id = '$this->user_id'");

        return $rowcount;
    }

    public function myMostPopularWellgorithms() {

        // TODO: Add to query conditions to order posts by the most popular

        $args = array(
            'post_type'         => 'my_wellgorithms',
            'order'             => 'DESC',
            'posts_per_page'    => 5,
            'post_author'       => $this->user_id,
            /*
            'meta_query'=> array(
                array(
                    'key' => 'basic_settings_recommended',
                    'value' => "",
                )
            ),
            */
//            'orderby'           => 'meta_value_num',
//            'meta_key'          => 'basic_settings_weight',
        );

        $popular_list = new WP_Query( $args );

        return $popular_list->posts;
    }

    public function peopleIFavored() {
        $output = array();

        global $wpdb;

        $query = "SELECT * FROM `ff_favored_people` WHERE `favor_from` = '$this->user_id'";
        $data = $wpdb->get_results( $query, OBJECT );

        foreach($data as $row) {
            $output[] = $row->favor_to;
        }

        return $output;
    }

    public function peopleFavoredMe() {
        $output = array();

        global $wpdb;

        $query = "SELECT * FROM `ff_favored_people` WHERE `favor_to` = '$this->user_id'";
        $data = $wpdb->get_results( $query, OBJECT );

        foreach($data as $row) {
            $output[] = $row->favor_from;
        }

        return $output;
    }

    public function myPladgeGroups() {
        $output = array();

        global $wpdb;

        $query = "SELECT * FROM `pladge_groups` WHERE `user_id` = '$this->user_id'";
        $data = $wpdb->get_results( $query, OBJECT );

        foreach($data as $row) {
            $output[] = $row->post_id;
        }

        return $output;
    }
}