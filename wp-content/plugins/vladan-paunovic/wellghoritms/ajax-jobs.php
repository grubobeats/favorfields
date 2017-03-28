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
    check_ajax_referer('secure-site', 'security');

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



/**
 * Make wellgorithms visibille / hidden
 */
function postVisibilityChange(){

    $post_id    = $_POST['post_id'];
    $make       = $_POST['make'];

    global $wpdb;
    $query = "UPDATE `wp_posts` SET `post_status` = '$make' WHERE `ID` = '$post_id'";

    $wpdb->get_results($query);

    // Update the post into the database

    echo json_encode( $wpdb->get_results($query) );

    wp_die();
}

add_action( 'wp_ajax_post_visibility', 'postVisibilityChange' );


/**
 * Delete post by ID
 */
function deleteParticularPost(){

    $post_id    = $_POST['post_id'];

    wp_delete_post( $post_id, true );

    echo json_encode( true );

    wp_die();
}

add_action( 'wp_ajax_post_delete', 'deleteParticularPost' );


/**
 * Reccomending people who did the wellgorithm
 */


function prepareRecommendPosts ($post_id){
        $args = array(
            'post_type'         => 'wellgorithms',
//            'meta_key'          => 'basic_settings_weight',
//            'orderby'           => 'meta_value_num',
            'order'             => 'rand',
            'posts_per_page'    =>  3,
            'post_status'       => 'publish'
        );

    $my_query = new WP_Query($args);
    if( $my_query->have_posts() ) {
        while ($my_query->have_posts()) : $my_query->the_post();
            $loop_post_id = get_the_ID();
            $icon = get_post_meta($loop_post_id, 'basic_settings_icon')[0];
            ?>
            <div class="rel-wellgorithm">
                <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
                    <img src="<?= $icon ?>" alt="">
                    <span><?php the_title(); ?></span>
                </a>
            </div>
            <?php
        endwhile;
    }
    wp_reset_query();

    wp_die();
}

function recommendPosts (){

    $post_id = $_POST['post_id'];
    $marked_as = ( $_POST['marked_as'] == 0 ) ? "Good" : "Bad" ; // 0 = good, 1 = bad

    $tags = wp_get_post_tags($post_id);

        // $first_tag = $tags[0]->term_id;

        $all_tags = array();

        foreach ($tags as $tag) {
            $all_tags[] = $tag->term_id;
        }

        $args = array(
            'post_type'         => 'wellgorithms',
            'tag__in'           => $all_tags,
            'post__not_in'      => array($post_id),
            'posts_per_page'    => 3,
            'caller_get_posts'  => 1,
            'meta_key'          => 'basic_settings_weight',
            'orderby'           => 'meta_value_num',
            'order'             => 'DESC',
            'meta_query'=> array(
                array(
                    'key' => 'basic_settings_recommended',
                    'value' => $marked_as,
                )
            ),
        );


    if ($tags) {


        $my_query = new WP_Query($args);
        if( $my_query->have_posts() ) {
            while ($my_query->have_posts()) : $my_query->the_post();
                $loop_post_id = get_the_ID();
                $icon = get_post_meta($loop_post_id, 'basic_settings_icon')[0];

            ?>
                <div class="rel-wellgorithm">
                    <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
                        <img src="<?= $icon ?>" alt="">
                        <span><?php the_title(); ?></span>
                    </a>
                </div>
                <?php
            endwhile;
        } else {
            // Thhis will show if there are no related wellgorithms
            // prepareRecommendPosts($post_id);
        }
        wp_reset_query();
    }

    wp_die();
}

add_action( 'wp_ajax_recommend_posts', 'recommendPosts' );

/**
 * Saves user pladges to database
 */
function savePledge() {
    $post_id = $_POST['post_id'];
    $days = $_POST['days'];
    $user_id = $_POST['user'];

    global $wpdb;

    $wpdb->insert( 'pladge_groups', array(
        'post_id' => $post_id,
        'user_id' => $user_id,
        'chosen_days' => $days
    ) );

    echo $post_id . " " . $days . " " . $user_id;

    wp_die();
}

add_action( 'wp_ajax_save_pledge', 'savePledge' );


/**
 * Lists users who pladged on this wellgorithm
 */

function listPladges() {
    $post_id = $_POST['post_id'];
    $user_id = $_POST['user'];
    $data = array();
    global $wpdb;

    $query = "SELECT * FROM `pladge_groups` WHERE `post_id` = '$post_id' GROUP BY `user_id` ORDER BY id DESC LIMIT 3";
    $results = $wpdb->get_results($query);



    $output = "";

    foreach ( $results as $user ) {
        $userdata = get_userdata($user->user_id)->data;
        $avatar = get_wp_user_avatar( $userdata->ID, 96 );

        if ( substr( $avatar, 0, 4 ) === "<img" ) {
            $array = array();
            preg_match( '/src="([^"]*)"/i', $avatar, $array ) ;
            $avatar = $array[1];
        }

        $output .= "<a class=\"wellgo-user\" href=\"/my-wellgorithms/$userdata->user_login\" data-id=\"$userdata->ID\">";
        $output .= sprintf('<img src="%s" alt="%s" class="user-avatar"><span class="username">%s</span>',
            $avatar,
            $userdata->user_login,
            $userdata->user_login
        );
        $output .= "</a>";
    }


    $query_users = "SELECT * FROM `pladge_groups` WHERE `post_id` = '$post_id' AND `user_id` = '$user_id'";
    $results_users = count( $wpdb->get_results($query_users) );

    $data['html'] = $output;
    $data['isDoneByUser'] = ( $results_users >= 1 ) ? true : false;

    echo json_encode($data);

    wp_die();
}

add_action( 'wp_ajax_list_pledges', 'listPladges' );



/**
 * Sending favors
 */

function sendFavor() {

    $current_user = get_userdata( $_POST['current_user'] )->data->user_email;
    $current_username = ucfirst(get_userdata( $_POST['current_user'] )->data->user_login);
    $selected_user = get_userdata( $_POST['selected_user'] )->data->user_email;
    $selected_username = ucfirst(get_userdata( $_POST['selected_user'] )->data->user_login);
    $message_first = ucfirst($_POST['message_first']);
    $message_second = ucfirst($_POST['message_second']);
    $title = $_POST['title'];


    $to = $selected_user;
    $subject = "You’ve been favored!";

    $message = "
    <html>
    <head>
    <title>FavorFields.com</title>
    </head>
    <body>
    <p>Dear $selected_username</p>
    <p>$current_username has favored you with the $message_first.</p>
    <p>\"$message_second\"</p>
    </body>
    </html>
    ";

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <' . $current_user . '>' . "\r\n";

    if ( mail($to,$subject,$message,$headers) ) {
        echo json_encode( true );
    } else  {
        echo json_encode( false );
    }

    wp_die();
}

add_action( 'wp_ajax_send_favor', 'sendFavor' );