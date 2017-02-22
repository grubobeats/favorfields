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
?>
<script>
    var all_steps = <?= $welgorithm[ $prefix . 'basic_settings_steps' ][0]; ?>;
    var steps = <?= $number_of_questions; ?>;
    var maximum_steps = 3;
    var question_animation = "<?= $favorfields[ $prefix . 'question-animation' ] ?>";
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
                            <?= $welgorithm['questions'][$i]; ?>
                        </span>

                        <div class="wide-separator">
                            <i class="fa fa-heart question__like color-1" aria-hidden="true"></i>
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
                                <div contenteditable="true" class="fake-input border-color-1"><?= $welgorithm['first_answers'][$i]; ?></div>
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
                                <div contenteditable="true" class="fake-input border-color-1"><?= $welgorithm['second_answers'][$i]; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="extra-menu">
                        <ul>
                            <li>
                                <div class="circle"></div>
                            </li>
                            <li>
                                <div class="circle"></div>
                            </li>
                            <li>
                                <div class="circle"></div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="separator background-color-1"></div>
                <? $counter = $counter + 2; ?>
            <? endfor; ?>

        </div>
    </div>

    <div class="popups">
        <div class="prompt-save border-color-1">
            <?= $favorfields['prompt-save-wellgo']; ?>
            <button class="color-1 save-question-yes">Yes</button>
            <button class="color-1 save-question-no">No</button>
        </div>
    </div>

<?php get_footer(); ?>