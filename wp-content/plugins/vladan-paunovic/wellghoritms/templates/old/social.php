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
//$logic->checkForCustomWellgo();

$maximum_questions = 3;

if( is_user_logged_in() ) {
    $maximum_questions = $welgorithm[ $prefix . 'basic_settings_steps' ][0];
}


if( isset($_COOKIE["banner_image"]) ) {
    $banner_image_src = $_COOKIE["banner_image"];
} else {
    $banner_image_src = $logic->getRandomImage($color_scheme, true);
}


?>
    <script>
        var all_steps = <?= $welgorithm[ $prefix . 'basic_settings_steps' ][0]; ?>;
        var steps = <?= $number_of_questions; ?>;
        var maximum_steps = <?= $maximum_questions ?>;
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
        var post_id = "<?= $logic->getWellgorithmPostID(); ?>";
    </script>
    <!-- Main -->
    <div id="main" class="social-mode background-color-1">
        <div class="banner-image border-color-1">
            <img src="<?= $_COOKIE["banner_image"] ?>" alt="">
            <div class="focus-bar">
                <div class="circle-focus">1</div>
                <a class="circle-focus" href="<?= get_permalink() ?>">2</a>
                <div class="circle-focus">3</div>
            </div>
        </div>

        <? for($i = 0; $i < $number_of_questions; $i++) : ?>

        <div class="social<? if ($i > 0 ) : ?> hidden<? endif;?>">
            <div class="avatar-box">
                <?= $logic->getRelatedUsers($i) ?>
            </div>
            <div class="inner center-content background-color-2">
                    <div class="wellghoritm">
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
                                <input type="radio" name="answered_question_<?= $i; ?>" id="selected_answer_<?= $counter; ?>" value="<?= $welgorithm['first_answers'][$i]; ?>">
                                <div class="check border-color-1">
                                    <div class="inside background-color-1"></div>
                                </div>
                            </div>
                            <div class="answer__input">
                                <div>
                                    <div class="fake-input border-color-1">
                                        <div class="avatar" data-user-id="0"></div>
                                        <span><?= $welgorithm[$def_first_answers][$i]; ?></span>
                                    </div>
                                    <div class="favor-menu background-color-1">
                                        <ul class="clearfix">
                                            <li class="favor-item">
                                                <span><?= $favorfields['social_first'] ?></span>
                                                <ul class="favor-second-level background-color-1">
                                                    <?
                                                        $list_1 = explode(PHP_EOL, $favorfields['social_first_inner']);
                                                        foreach ($list_1 as $li) {
                                                            echo "<li class='favor-subitem'>" . $li . "</li>";
                                                        }
                                                    ?>
                                                </ul>
                                            </li>
                                            <li class="favor-item">
                                                <span><?= $favorfields['social_second'] ?></span>
                                                <ul class="favor-second-level background-color-1">
                                                    <?
                                                        $list_2 = explode(PHP_EOL, $favorfields['social_second_inner']);
                                                        foreach ($list_2 as $li) {
                                                            echo "<li class='favor-subitem'>" . $li . "</li>";
                                                        }
                                                    ?>
                                                </ul>
                                            </li>
                                            <li class="favor-item">
                                                <span><?= $favorfields['social_third'] ?></span>
                                                <ul class="favor-second-level background-color-1">
                                                    <?
                                                        $list_3 = explode(PHP_EOL, $favorfields['social_third_inner']);
                                                        foreach ($list_3 as $li) {
                                                            echo "<li class='favor-subitem'>" . $li . "</li>";
                                                        }
                                                    ?>
                                                </ul>
                                            </li>
                                            <li class="favor-item"><input type="text" name="favor-text" placeholder="Write a note"></li>
                                        </ul>
                                    </div>
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
                                    <div class="fake-input border-color-1">
                                        <div class="avatar"></div>
                                        <span><?= $welgorithm[$def_second_answers][$i]; ?></span>
                                    </div>
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
            </div>
            <div class="avatar-box">
                <?= $logic->getRelatedUsers($i) ?>
            </div>
        </div>
        <? endfor; ?>

    </div>

    <div class="popups">
        <div class="prompt-save border-color-1 ">
            <?= $favorfields['prompt-save-wellgo']; ?>
            <button class="color-1 save-question-yes">Yes</button>
            <button class="color-1 save-question-no">No</button>
        </div>
    </div>

<?php get_footer(); ?>