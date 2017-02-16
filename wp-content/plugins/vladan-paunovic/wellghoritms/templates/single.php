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
?>
<script>
    var steps = <?= $welgorithm['basic_settings_steps'][0]; ?>
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
                                <div class="inside background-color-1" style="width:30%">
                                    30%
                                </div>
                            </div>
                        </div>
                    <? endif; ?>
                    <div class="question">
                        <div class="wide-separator"></div>
                        <span class="color-1">
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
                    </div>
                </div>
                <div class="separator background-color-1"></div>
                <? $counter = $counter + 2; ?>
            <? endfor; ?>

        </div>
    </div>

<?php get_footer(); ?>