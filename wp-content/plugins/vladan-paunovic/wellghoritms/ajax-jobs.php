<?php
/**
 * Created by PhpStorm.
 * User: vladan
 * Date: 19/03/2017
 * Time: 07:18
 */


/**
 * AJAX saving posts to user_answers
 */
function saveUserWellgo() {
    $userid = $_POST['user_id'];
    $related = $_POST['related'];
    $permalink = $_POST['permalink'];
    $title = $_POST['title'];
    $questions = serialize($_POST['questions']);
    $first_answers = serialize($_POST['first_answers']);
    $second_answers = serialize($_POST['second_answers']);
    $icon = $_POST['icon'];
    $steps = $_POST['steps'];
    $color_template = $_POST['color_template'];
    $mood = $_POST['mood'];
    $level = $_POST['level'];
    $confidence = $_POST['confidence'];
    $recommended = $_POST['recommended'];

    $postarr = array(
        'post_title' => $title,
        'post_type' => 'my_wellgorithms',
        'post_author' => $userid,
        'post_status' => 'publish',
        'meta_input' => array(
            'user_basic_settings_related_wellgo' => $related,
            'user_basic_settings_icon' => $icon,
            'user_basic_settings_steps' => $steps,
            'user_basic_settings_color-template' => $color_template,
            'user_basic_settings_mood' => $mood,
            'user_basic_settings_level' => $level,
            'user_basic_settings_confidence' => $confidence,
            'user_basic_settings_recommended' => $recommended,
            'user_questions' => $questions,
            'user_first_answers' => $first_answers,
            'user_second_answers' => $second_answers
        )
    );

    wp_insert_post( $postarr );
}

add_action( 'wp_ajax_save_wellgo', 'saveUserWellgo' );




function socialGetUserAnswers(){

    $post_id = $_POST['post_id'];
    $step = (int) $_POST['step'];


    global $wpdb;
    $query_first_answer = "SELECT `meta_value` FROM `wp_postmeta` WHERE `meta_key` = \"user_first_answers\" AND `post_id` = $post_id";
    $first_answers = $wpdb->get_results($query_first_answer);
    $unserialized_first_answer = unserialize($first_answers[0]->meta_value);

    $query_second_answer = "SELECT `meta_value` FROM `wp_postmeta` WHERE `meta_key` = \"user_second_answers\" AND `post_id` = $post_id";
    $second_answers = $wpdb->get_results($query_second_answer);
    $unserialized_second_answer = unserialize($second_answers[0]->meta_value);

    $answers = array(
        'first_answer' => $unserialized_first_answer[$step],
        'second_answer' => $unserialized_second_answer[$step],
    );

    echo json_encode( $answers );

    wp_die();
}

add_action( 'wp_ajax_read_social_answers', 'socialGetUserAnswers' );


/**
 * Get list of users for Social Mode
 */

function ajaxGetRelatedUsers() {

    $step = $_POST['step'];
    $related_wellgo = $_POST['related_wellgo'];


    global $wpdb;
    $query = "SELECT `post_id` FROM `wp_postmeta` WHERE `meta_key` = \"user_basic_settings_related_wellgo\" and `meta_value` = $related_wellgo";

    $post_ids = $wpdb->get_results($query);
    $reload_string = "";
    $prepare_users = array();
    $users = array();
    $render_users = array();

    // Getting list of all wellgorithms
    foreach ($post_ids as $id) {
        $query_authors = "SELECT `post_author`, `ID` FROM `wp_posts` WHERE `ID` = $id->post_id AND `post_status` = 'publish'";
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
                $reload_string = "<div class=\"user reload\"><i class=\"fa fa-repeat reload_users color-2\" aria-hidden=\"true\"></i></div>";
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


    echo $output;

    wp_die();
}

add_action('wp_ajax_refresh_users', 'ajaxGetRelatedUsers');