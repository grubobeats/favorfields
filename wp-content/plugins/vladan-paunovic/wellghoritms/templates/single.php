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
// get_header();
require_once 'header.php';


$number_of_questions = count(array_filter($welgorithm['questions']));
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

$maximum_questions = 3;

if( is_user_logged_in() ) {
	$maximum_questions = $welgorithm[ $prefix . 'basic_settings_steps' ][0];
}

?>
    <script>
        var all_steps = <?= $welgorithm[ $prefix . 'basic_settings_steps' ][0]; ?>,
            steps = <?= $number_of_questions; ?>,
            maximum_steps = <?= $maximum_questions ?>,
            question_animation = "<?= $favorfields[ $question_animations ] ?>",
            ajaxurl = "<?= admin_url( 'admin-ajax.php' ) ?>",
            permalink = "<?= get_permalink(); ?>",
            user_id = "<?= get_current_user_id(); ?>",
            title = "<?= get_the_title(); ?>",
            icon = "<?= $welgorithm[ $prefix . 'basic_settings_icon' ][0] ?>",
            color_template = "<?= $color_scheme ?>",
            mood = "<?= $welgorithm[ $prefix . 'basic_settings_mood' ][0] ?>",
            level = "<?= $welgorithm[ $prefix . 'basic_settings_level' ][0] ?>",
            confidence = "<?= $welgorithm[ $prefix . 'basic_settings_confidence' ][0] ?>",
            recommended = "<?= $welgorithm[ $prefix . 'basic_settings_recommended' ][0] ?>",
            post_id = "<?= $logic->getWellgorithmPostID(); ?>",
            username = "<?= $username ?>",
            current_step = 1,
            isLoggedIn = "<?= $logged = ( is_user_logged_in() == true ) ? 1 : 0; ?>",
            current_post_id = "<?= get_the_ID() ?>",
            pladged = "<?= $logic->checkPladged()['permission'] ?>",
            days_left_to_pladge = "<?= $logic->checkPladged()['days_left'] ?>";
    </script>

    <!-- Latest compiled and minified CSS  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400i|Raleway:400,600|Open+Sans:400,600" rel="stylesheet">
    <!-- Main -->

    <div id="main">
        <div class="main-wellgorithms">

            <!-- wellgorithms-main-banner starts -->
            <div class="wellgorithms-main-banner cs-image-overlayed">
                <div class="wellgo-transparent-overlay background-color-1" <? if($color_masking_off) : ?> style="background-color: rgba(68, 45, 45, 0) !important;" <? endif; ?>></div> <!-- wellgo-transparent-overlay -->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="wellgorightem-content">
                                <figure class="wellgo-mood-img">
                                    <img src="<?= $welgorithm['basic_settings_icon'][0] ?>" alt="" class="img-responsive">
                                </figure>
                                <h1 class="wellgo-main-title">
                                    <small><?= $subhead ?></small>
                                    <span><?= get_the_title(); ?></span>
                                </h1>
                            </div> <!-- wellgorightem-content ends -->

                            <div class="right-faded-logo">
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/FFLOGO2.svg" alt="FFLOGO" class="img-responsive">
                            </div>  <!-- right-faded-logo ends -->
                        </div> <!-- col-sm-12 ends -->
                    </div> <!-- row ends -->
                </div> <!-- container ends-->
            </div>
            <!-- wellgorithms-main-banner ends -->

            <!-- wellgorithms-questionnaire starts -->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <!--=========================== Quiz Box Loop Starts Here ===========================-->
                        <? $main_loop_counter = 0; ?>
						<? for($i = 0; $i < $number_of_questions; $i++) : ?>

                        <div class="wellgo-questionnaire-container background-color-2<? if ($i > 0 ) : ?> hidden<? endif;?>">

                            <? if ($i != 0) : ?>
                                <div class="wellgorithms-main-banner">
                                    <div class="wellgo-transparent-overlay background-color-1"></div>
                                    <h3 class="wellgo-main-title"> <span><?= get_the_title(); ?></span></h3>
                                </div> <!-- Banner with Wellgo Quiz -->
                            <? endif; ?>

                            <div class="wellgo-questionnaire">
                                <div class="wellgo-type"> <span><?= $category[0]->name ?></span> </div>
                                <!-- Wellgo-Type ends -->

                                <div class="wellgo-btn-container">
                                    <button type="button">
                                        <span class="btn1 sparkley" style="border:2px solid white !important;">Inspiration</span>
                                    </button>
                                    <button type="button">
                                        <span class="btn2 sparkley" style="border:2px solid white !important;">Aha Moment </span>
                                    </button>
                                    <button type="button">
                                        <span class="btn3 sparkley" style="border:2px solid white !important;">Breakthrough </span>
                                    </button>
                                </div>
                                <!-- Wellgo-btn-container ends -->

                                <h2 class="wellgo-main-title color-3">
									<?= $welgorithm[$def_questions][$i]; ?>
                                </h2>

                                <div class="wellgo-quiz-box border-color-4">
                                    <div class="col-sm-5 wellgo-quiz-option first">
                                        <p contenteditable="true"><?= $welgorithm[$def_first_answers][$i]; ?></p>
                                        <div class="media wellgo-user"></div>
                                        <!-- wellgo-user ends -->
                                    </div>
                                    <!-- col-sm-5 wellgo-quiz-option ends -->
                                    <div class="col-sm-2 wellgo-main-img text-center">
                                        <ul class="background-color-4 cs-main-background-image" data-step="<?= $i ?>">
                                            <li class="top-part mode-solo"></li>
                                            <li class="middle-part mode-default"></li>
                                            <li class="bottom-part mode-social"></li>
                                        </ul>
                                    </div> <!-- col-sm-2 wellgo-main-img ends -->

                                    <div class="col-sm-5 wellgo-quiz-option second">
                                        <p contenteditable="true"><?= $welgorithm[$def_second_answers][$i]; ?></p>
                                        <div class="media wellgo-user"></div>
                                        <!-- wellgo-user ends -->
                                    </div>
                                    <!-- col-sm-5 wellgo-quiz-option ends -->

                                    <div class="<?= $buttons_style; ?>">
                                        <div class="radio">
                                            <input type="radio" name="answered_question_<?= $i; ?>" id="selected_answer_<?= $counter; ?>" value="<?= $welgorithm['first_answers'][$i]; ?>" data-recommend="Good">
                                            <label for="selected_answer_<?= $counter; ?>" class="radio-label <? if($buttons_style != "hexagon") :?>border-before-color-4<? endif; ?>"></label>
                                        </div> <!-- option 1 -->
                                        <div class="radio">
                                            <input type="radio" name="answered_question_<?= $i; ?>" id="selected_answer_<? print( $counter + 1 ); ?>" value="<?= $welgorithm['second_answers'][$i]; ?>" data-recommend="Bad">
                                            <label  for="selected_answer_<? print( $counter + 1 ); ?>" class="radio-label <? if($buttons_style != "hexagon") :?>border-before-color-4<? endif; ?>"></label>
                                        </div> <!-- option 2 -->
                                    </div>
                                    <!-- Radio Buttons -->

                                </div>
                                <!-- wellgo-quiz-box ends -->

                                <!-- wellgo-btn-sm btns -->
                                <button type="button" class="question__like wellgo-btn-sm top-next border-color-4" data-step="<?= $i ?>"></button>
                                <div class="popup-suggest-question background-color-1 box-shadow-color-1">
                                    <div class="row first">
                                        <div class="suggest__icon"><i class="fa fa-heart"></i></div>
                                        <div class="suggest__text">Love this!</div>
                                    </div>
                                    <div class="row second">
                                        <div class="suggest__icon"><i class="fa fa-lightbulb-o"></i></div>
                                        <div class="suggest__text">
                                            <p>I have a suggestion for improvment:</p>
                                            <textarea class="question_sugestion" name="question_suggestion_<?= $i ?>" id="question_suggestion_<?= $i ?>" cols="30" rows="1"></textarea>
                                            <button class="btn btn-default suggest__button" data-step="<?= $i ?>">Send</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- progressbar ends -->
                                <ul class="progressbar">
                                    <? for( $step_li=0; $step_li < $number_of_questions; $step_li++ ) : ?>

                                        <?
                                            switch ($step_li) {

												case $i:
													$progress_bar_classname = "active background-color-before-color-3 background-color-after-color-3";
													break;

                                                case $step_li <= $i:
													$progress_bar_classname = "step-completed background-color-before-color-4 background-color-after-color-4";
													break;

												case 0:
													$progress_bar_classname = "step-completed background-color-before-color-4 background-color-after-color-4";
													break;

                                                default;
                                                    $progress_bar_classname = "";
                                                    break;
                                            }
										?>

                                        <li class="<?= $progress_bar_classname; ?>"></li>
                                    <? endfor; ?>
                                </ul>
                                <!-- progressbar ends -->

                                <div class="clearfix"></div>

                                <!-- wellgo-random-users list -->
                                <ul class="wellgo-random-users list-inline"></ul>
                                <!-- wellgo-random-users list ends here -->
                            </div>
                            <!-- wellgorightem-questionnaire ends -->
                        </div>
							<? $counter = $counter + 2; ?>
							<? $main_loop_counter++; ?>
                        <!--=========================== Quiz Box Loop Ends Here ===========================-->
                        <? endfor; ?>

                        <!--=========================== Thank You & Confirmation Message ===========================-->
                        <div class="popups background-color-2">
                            <div class="prompt-save border-color-1" style="display: none;">
                                <p class="greetings_msg">Great job, <span><?= $username ?>!</span></p>
                                <div class="is-saved"></div>
                                <p class="join-community">Join these wonderful community members who have created a
                                    <br/> <span><?= get_the_title() ?></span> pledge group:
                                </p>
                                <div class="wellgo-avatars"></div>

								<? if ( $logic->checkPladged()['permission'] == "true" ) : ?>
                                    <p for="pladge">Pledge to do the <span><?= get_the_title() ?></span> for</p>
                                    <select name="pladge" id="pladge">
                                        <option value="null"></option>
										<? for ($i=3; $i <= 30; $i++) : ?>
                                            <option value="<?= $i ?>"><?= $i ?> days</option>
										<? endfor; ?>
                                    </select>
								<? else : ?>
                                    <p for="pladge" class="already-pladged">You already pladged to do this wellgorithm</p>
								<? endif; ?>

                                <p class="people-who-did">People who did the <span><?= get_the_title() ?></span> also did the:</p>
                                <div class="related_wellgorithms"></div>
                            </div>
                        </div>
                        <!--===========================  Thank You & Confirmation Message ===========================-->

                        <div class="tooltip1">Hover over me
                            <div class="tooltiptext background-color-4 favormenu favor-card-png">
                                <div class="tooltipcontent">
                                    <div class="col-sm-4">
                                        <h3 class="color-3">FAVOR SARA</h3>
                                        <figure class="text-center">
                                            <img src="http://favorfields.com/wp-content/uploads/2017/02/mm9.png" alt="sumit" class="user-avatar border-color-4">
                                        </figure>
                                        <h4 class="color-3">
                                            <span class="favor-menu-option" data-option="<?= $hellgo_prefix . 'social_first_inner' ?>"><span><?= $favorfields[$hellgo_prefix . 'social_first']?></span></span>
                                            <span class="favor-menu-option" data-option="<?= $hellgo_prefix . 'social_second_inner' ?>"><span><?= $favorfields[$hellgo_prefix . 'social_second']?></span></span>
                                            <span class="favor-menu-option" data-option="<?= $hellgo_prefix . 'social_third_inner' ?>"><span><?= $favorfields[$hellgo_prefix . 'social_third']?></span></span>
                                        </h4>
                                    </div>
                                    <div class="col-sm-8 favor-menu-option__wrapper">
										<?
										$list_1 = explode(PHP_EOL, $favorfields[$hellgo_prefix . 'social_first_inner'] );
										shuffle($list_1);
										for ($list=0; $list < 3; $list++ ) {
											$list_text = $list_1[$list];
											$class = "favor-menu-option__inner";
											if( $list == 2 ) { $class = "favor-menu-option__inner last"; }
											$first_text = $favorfields[$hellgo_prefix . 'social_first'];

											echo "<p class='$class'><span data-first-text='$first_text'>  $list_text</span> </p>";
										}
										?>
                                        <!-- <p class="last"><a href="#"> Breathing in, I marvel at your resilience.</a> </p>-->

                                        <form>
                                            <div class="textarea-wrapper"><textarea name="" class="form-control" rows="1" style="overflow: hidden; resize: none; height: 68px;"> </textarea></div>
                                        </form>
                                        <a href=""> <i class="fa fa-heart color-4"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>


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