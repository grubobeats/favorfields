<?php

/*
Plugin Name: Vladan Paunovic
Plugin URI: https://givemejobtoday.com/
Description: Additional features specially declared for this custom website are stored here.
Version: 1.0
Author: Vladan Paunovic
Author URI: https://givemejobtoday.com
*/

require_once 'wellghoritms/wellghoritms.php';
require_once 'color-templates/color-template.php';
require_once 'user-answers/user-answers.php';

require_once 'algolia/custom-fields.php';

/**
 * Adds the meta box stylesheet when appropriate
 */
function vp_admin_styles(){
    global $typenow;

    if( $typenow == 'wellgorithms' || $typenow == 'user_answers' ) {
        wp_enqueue_style( 'vp_admin_styles', plugins_url( 'css/style.css', __FILE__ ));
    }

    if( $typenow == 'color_template' ) {
        wp_enqueue_style( 'vp_admin_styles', plugins_url( 'css/color-templates.css', __FILE__ ));
    }
}
add_action( 'admin_print_styles', 'vp_admin_styles' );


/**
 * @param $original_template
 * @return string
 * @description: Getting page template
 */
function get_templates( $original_template ) {
    if ( is_singular( 'wellgorithms' ) || is_singular( 'user_answers' ) ) {
        wp_enqueue_style( 'vp_animate_css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css');
        wp_enqueue_script( 'vp_wellghoritms', plugins_url( 'js/wellgorithms.js', __FILE__ ), array(), '20130115', true );
        return plugin_dir_path(__FILE__) . 'wellghoritms/templates/single.php';
    } else {
        return $original_template;
    }
}

add_action('template_include', 'get_templates');


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
        'post_type' => 'user_answers',
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