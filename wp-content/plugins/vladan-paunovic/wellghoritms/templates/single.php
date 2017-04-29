<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FavorFields
 *
 * Template name: Wellgorithms
 */
require_once 'header.php';

$number_of_questions = count(array_filter($welgorithm['admin_questions']));

$counter = 1;
$prefix = is_singular('my_wellgorithms') ? "user_" : "";
$def_questions = is_singular('my_wellgorithms') ? "user_questions" : "chosen_question";
$def_first_answers = is_singular('my_wellgorithms') ? "user_first_answers" : "chosen_first_answer";
$def_second_answers = is_singular('my_wellgorithms') ? "user_second_answers" : "chosen_second_answer";
$question_animations = ($category[0]->name == "Hellgo") ? "h_question-animations" : "question-animations";
$hellgo_prefix = "";
if ( $category[0]->name == "Hellgo" ) {
	$hellgo_prefix = "h_";
} elseif ( $category[0]->name == "Letgo" ) {
	$hellgo_prefix = "l_";
}
$logic->checkForCustomWellgo();

$maximum_questions = 2;

if( is_user_logged_in() ) {
	$maximum_questions = $welgorithm[ $prefix . 'basic_settings_steps' ][0];
}


$right_faded_logo = explode(",", $favorfields[ $hellgo_prefix . 'logo_gallery']);
shuffle($right_faded_logo);

$right_faded_logo_url = wp_get_attachment_url($right_faded_logo[0]);

// Javascript object with all dynamic settings
require_once 'template-parts/additional-js.php';
?>


    <!-- Latest compiled and minified CSS  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400i|Raleway:400,600|Open+Sans:400,600" rel="stylesheet">
    <!-- Main -->


    <div id="main">
        <div class="main-wellgorithms background-color-6">

            <!-- wellgorithms-main-banner starts -->
            <? require_once 'template-parts/banner.php'; ?>
            <!-- wellgorithms-main-banner ends -->

            <!-- wellgorithms-questionnaire starts -->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <!--=========================== Quiz Box Loop Starts Here ===========================-->
                        <? $main_loop_counter = 0; ?>
						<? for($i = 0; $i < $number_of_questions; $i++) : ?>
                            <? require 'template-parts/quiz-loop.php'; ?>
                        <? endfor; ?>
                        <!--=========================== Quiz Box Loop Ends Here ===========================-->

                        <!--=========================== Thank You & Confirmation Messages ===========================-->


                        <? require_once 'template-parts/fake-ads.php'; ?>
                        <? if ( !is_user_logged_in() ) : ?>
	                        <? require_once 'template-parts/wellgorithm-done.php'; ?>
	                        <? require_once 'template-parts/login-box.php'; ?>
                        <? endif; ?>

                        <? require_once 'template-parts/video-box.php'; ?>

	                    <? if ( !is_user_logged_in() ) : ?>
                            <? require_once 'template-parts/signup-box.php'; ?>
	                    <? endif; ?>

                        <? require_once 'template-parts/thank-you.php'; ?>

                    </div>
                    <!-- col-sm-12 ends -->
                </div>
                <!-- row ends -->
            </div>
            <!-- container ends -->
        </div>
        <!-- main-wellgorithms ends -->
    </div>
    <!-- #main ends -->

    <!-- Sparkleh Main File -->
    <script type='text/javascript' src='http://favorfields.com/wp-content/themes/favorfields/js/sparkleh.js'></script>
    <script type="text/javascript">
    </script>
<?php get_footer(); ?>