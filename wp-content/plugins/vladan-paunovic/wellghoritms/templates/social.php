<?php
/**
 * @description: Template for displaying single wellghoritm
 * @author: Vladan Paunovic
 * @contact: https://givemejobtoday.com
 * @date: 15/02/2017
 */

require_once 'logic.php';
require_once 'header.php';

$number_of_questions = count(array_filter($welgorithm['questions']));
$counter = 1;
$prefix = is_singular('user_answers') ? "user_" : "";
$def_questions = is_singular('user_answers') ? "user_questions" : "chosen_question";
$def_first_answers = is_singular('user_answers') ? "user_first_answers" : "chosen_first_answer";
$def_second_answers = is_singular('user_answers') ? "user_second_answers" : "chosen_second_answer";
$question_animations = ($category[0]->name == "Hellgo") ? "h_question-animations" : "question-animations";
$hellgo_prefix = "";
if ( $category[0]->name == "Hellgo" ) {
    $hellgo_prefix = "h_";
} elseif ( $category[0]->name == "Letgo" ) {
    $hellgo_prefix = "l_";
}
$logic->checkForCustomWellgo();

?>
    <script>
        var all_steps = <?= $welgorithm[ $prefix . 'basic_settings_steps' ][0]; ?>;
        var steps = <?= $number_of_questions; ?>;
        var maximum_steps = 3;
        var question_animation = "<?= $favorfields[ $question_animations ] ?>";
        var ajaxurl = "<?= admin_url( 'admin-ajax.php' ) ?>";
        var permalink = "<?= get_permalink(); ?>";
        var user_id = "<?= get_current_user_id(); ?>";
        var title = "<?= get_the_title(); ?>";
        var icon = "<?= $welgorithm[ $prefix . 'basic_settings_icon' ][0] ?>";
        var color_template = "<?= $color_scheme ?>";
        var mood = "<?= $welgorithm[ $prefix . 'basic_settings_mood' ][0] ?>";
        var level = "<?= $welgorithm[ $prefix . 'basic_settings_level' ][0] ?>";
        var confidence = "<?= $welgorithm[ $prefix . 'basic_settings_confidence' ][0] ?>";
        var recommended = "<?= $welgorithm[ $prefix . 'basic_settings_recommended' ][0] ?>";
        var post_id = "<?= get_the_ID() ?>";
    </script>
    <!-- Main -->
    <div id="main">
        <h1>SOCIAL MODE</h1>
        <div class="banner-image border-color-1">
            <img src="<?= $logic->getRandomImage($color_scheme, true) ?>" alt="">
        </div>

        <div class="inner">

            <? for($i = 0; $i < $number_of_questions; $i++) : ?>

                <div class="wellghoritm<? if ($i > 0 ) : ?> hidden<? endif;?>">
                    <? if ($i == 0 ) : ?>
                        <div class="progressbar">
                            <div class="outline border-color-1">
                                <div class="inside background-color-1" style="width:0%">
                                    0%
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
                            <i class="fa fa-heart question__like color-1" aria-hidden="true"></i>

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
                            <input type="radio" name="answered_question_<?= $i; ?>" id="selected_answer_<?= $counter; ?>" value="<?= $welgorithm['first_answers'][$i]; ?>">
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
                            <input type="radio" name="answered_question_<?= $i; ?>" id="selected_answer_<? print( $counter + 1 ); ?>" value="<?= $welgorithm['second_answers'][$i]; ?>">
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
                            <li>
                                <div class="circle border-color-1"></div>
                            </li>
                            <li>
                                <div class="circle border-color-1"></div>
                            </li>
                            <li>
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
            <?= $favorfields['prompt-save-wellgo']; ?>
            <button class="color-1 save-question-yes">Yes</button>
            <button class="color-1 save-question-no">No</button>
        </div>
    </div>

<?php get_footer(); ?>