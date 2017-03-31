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

        $args = array(
            'post_type'         => 'wellgorithms',
            'order'             => 'DESC',
            'posts_per_page'    => 5,
            'post__in'           => $this->mostlyPassedWellgorithms()
        );

        $popular_list = new WP_Query( $args );

        return $popular_list->posts;
    }

    /**
     * @return array
     * Showing the list of people whom I favored
     */
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

    /**
     * @return array
     * Showing the people who clicked on "favor", actually the ones who favored me
     */
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

    /**
     * @return array
     * Showing the pladge groups I belong to
     */
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

    /**
     * @param $tag
     * @return string
     * Showing a list of posts containing inserted tag
     */
    public function getPostsByTag( $tag ) {
        $output = "";

        $args = array(
            'tag' => $tag,
            'post_type' => 'wellgorithms',
            'orderby' => 'id',
            'order' => 'ASC',
            'posts_per_page' => 5
        );

        $the_query = new WP_Query( $args );

        if ( $the_query->have_posts() ) {
            while ( $the_query->have_posts() ) {
                $the_query->the_post();
                $output .= '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
            }
        } else {
            // no posts found
            $output = "<li>We don't have posts to how you right now</li>";
        }
        /* Restore original Post Data */
        wp_reset_postdata();

        return $output;
    }


    /**
     * Get how many time user passed that wellgorithm
     */
    function mostlyPassedWellgorithms() {
        $output = array();

        global $wpdb;

        $query = "SELECT * FROM `ff_finished_wellgorithms` WHERE `user_id`=$this->user_id ORDER BY `passed` DESC LIMIT 5";
        $result = $wpdb->get_results($query);

        foreach ( $result as $post ) {
            $output[] = (int) $post->post_id;
        }

        shuffle( $output );

        return $output;
    }


    /**
     * Get breaktroughts, blocks or pladges randomly
     */
    function getBreaktroughts( $type ) {
        $output = "";

        global $wpdb;

        $query = "SELECT * FROM `ff_blocks_braketroughts_pladges` WHERE `user_id`=$this->user_id AND `type`='$type' ORDER BY `id` DESC LIMIT 5";
        $result = $wpdb->get_results($query);

        foreach ( $result as $post ) {
            $output .= "<li>" . $post->text . "</li>";
        }

        return $output;
    }

    /**
     * Count how many times user passed the wellgorithm by wellgorithm ID
     */
    function countPassedTimeOfWellgorithm( $id ) {

        global $wpdb;

        $query = "SELECT `passed` FROM `ff_finished_wellgorithms` WHERE `user_id`=$this->user_id AND `post_id`='$id' ORDER BY `passed` DESC LIMIT 5";
        $result = $wpdb->get_var($query);


        return $result;
    }
}