<?php
/**
 * @description: Template for displaying single wellghoritm
 * @author: Vladan Paunovic
 * @contact: https://givemejobtoday.com
 * @date: 15/02/2017
 */
global $post;

require_once 'logic.php';
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

$cookie_name = "banner_image";
$banner_image_src = ( get_the_post_thumbnail_url() ) ? get_the_post_thumbnail_url() : $logic->getRandomImage($color_scheme, true);
setcookie($cookie_name, $banner_image_src, time() + (3600), "/");

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

    <!-- Main -->
    <div id="main">
        <div class="banner-image border-color-1">
            <img src="<?= $banner_image_src; ?>" alt="">
            <div class="focus-bar">
                <? if ( is_user_logged_in() ) : ?>
                    <div class="circle-focus"><?= $logic->countPassingTimes() ?></div>
                <? endif; ?>
                <a class="circle-focus" href="<?= get_permalink($logic->getWellgorithmPostID()) ?>social">2</a>
                <div class="circle-focus"><?= $logic->checkPladged()['days_left'] ?></div>
            </div>
        </div>

        <div class="inner">

            <? for($i = 0; $i < $number_of_questions; $i++) : ?>

                <div class="wellghoritm<? if ($i > 0 ) : ?> hidden<? endif;?>">
                    <? if ($i == 0 ) : ?>
                        <div class="progressbar">
                            <div class="outline border-color-1">
                                <div class="inside background-color-1" style="width:1%">
                                    1%
                                </div>
                            </div>
                        </div>
                    <? endif; ?>
                    <div class="question">
                        <div class="wide-separator"></div>
                        <span class="color-3">
                            <?= $welgorithm[$def_questions][$i]; ?>
                        </span>

                        <div class="wide-separator">
<!--                            <i class="fa fa-heart question__like color-1" aria-hidden="true"></i>-->
                            <div class="question__like border-color-1"></div>

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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="answer first">
                        <div class="answer__radio">
                            <label for="selected_answer_<?= $counter; ?>"></label>
                            <input type="radio" name="answered_question_<?= $i; ?>" id="selected_answer_<?= $counter; ?>" value="<?= $welgorithm['first_answers'][$i]; ?>" data-recommend="Good">
                            <div class="check border-color-1">
                                <div class="inside background-color-1"></div>
                            </div>
                        </div>
                        <div class="answer__input">
                            <div>
                                <div contenteditable="true" class="fake-input border-color-1"><?= $welgorithm[$def_first_answers][$i]; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="answer second">
                        <div class="answer__radio">
                            <label for="selected_answer_<? print( $counter + 1 ); ?>"></label>
                            <input type="radio" name="answered_question_<?= $i; ?>" id="selected_answer_<? print( $counter + 1 ); ?>" value="<?= $welgorithm['second_answers'][$i]; ?>" data-recommend="Bad">
                            <div class="check border-color-1">
                                <div class="inside background-color-1"></div>
                            </div>
                        </div>
                        <div class="answer__input">
                            <div>
                                <div contenteditable="true" class="fake-input border-color-1"><?= $welgorithm[$def_second_answers][$i]; ?></div>
                            </div>
                        </div>
                    </div>



                    <div class="extra-menu">
                        <ul>
                            <li class="first">
                                <div class="circle border-color-1"></div>
                            </li>
                            <li class="second">
                                <div class="circle border-color-1"></div>
                            </li>
                            <li class="third">
                                <div class="circle border-color-1"></div>
                            </li>
                        </ul>

                        <div class="popup-extra-menu left background-color-1 box-shadow-color-1">
                            <div class="rows first">
                                <?= $favorfields[$hellgo_prefix . 'wellgo_extra_menu_1']?>
                            </div>
                            <div class="rows">
                                <?= $favorfields[$hellgo_prefix . 'wellgo_extra_menu_2']?>
                            </div>
                            <div class="rows">
                                <?= $favorfields[$hellgo_prefix . 'wellgo_extra_menu_3']?>
                            </div>
                            <div class="rows">
                                <?= $favorfields[$hellgo_prefix . 'wellgo_extra_menu_4']?>
                            </div>
                            <div class="rows">
                                <textarea name="extra-menu-first[]" id="" placeholder="Enter # of days"></textarea>
                            </div>
                        </div>

                        <div class="popup-extra-menu middle background-color-1 box-shadow-color-1">
                            <div class="rows first">
                                <?= $favorfields[$hellgo_prefix . 'wellgo_extra_menu_1-2']?>
                            </div>
                            <div class="rows">
                                <?= $favorfields[$hellgo_prefix . 'wellgo_extra_menu_2-2']?>
                            </div>
                            <div class="rows">
                                <?= $favorfields[$hellgo_prefix . 'wellgo_extra_menu_3-2']?>
                            </div>
                            <div class="rows">
                                <?= $favorfields[$hellgo_prefix . 'wellgo_extra_menu_4-2']?>
                            </div>
                            <div class="rows">
                                <textarea name="extra-menu-first[]" id="" placeholder="Enter # of days"></textarea>
                            </div>
                        </div>

                        <div class="popup-extra-menu right background-color-1 box-shadow-color-1">
                            <div class="rows first">
                                <?= $favorfields[$hellgo_prefix . 'wellgo_extra_menu_1-3']?>
                            </div>
                            <div class="rows">
                                <?= $favorfields[$hellgo_prefix . 'wellgo_extra_menu_2-3']?>
                            </div>
                            <div class="rows">
                                <?= $favorfields[$hellgo_prefix . 'wellgo_extra_menu_3-3']?>
                            </div>
                            <div class="rows">
                                <?= $favorfields[$hellgo_prefix . 'wellgo_extra_menu_4-3']?>
                            </div>
                            <div class="rows">
                                <textarea name="extra-menu-first[]" id="" placeholder="Enter # of days"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="separator background-color-1"></div>
                <? $counter = $counter + 2; ?>
            <? endfor; ?>

        </div>
    </div>

    <div class="popups">
        <div class="prompt-save border-color-1 ">
            <p>Great job, <span><?= $username ?>!</span></p>
            <div class="is-saved"></div>
            <p>Join these wonderful community members who have created a <span><?= get_the_title() ?></span> pledge group:</p>
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
                <p for="pladge">You already pladged to do this wellgorithm</p>
            <? endif; ?>

            <p>People who did the <span><?= get_the_title() ?></span> also did the:</p>
            <div class="related_wellgorithms">
                <div class="wellgo-user">
                    1
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>