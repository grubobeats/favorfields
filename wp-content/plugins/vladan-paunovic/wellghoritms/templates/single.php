<?php
/**
 * @description: Template for displaying single wellghoritm
 * @author: Vladan Paunovic
 * @contact: https://givemejobtoday.com
 * @date: 15/02/2017
 */

get_header();
require_once 'logic.php';

$welgorithm = $logic->getWellghoritm();
$color_scheme = $welgorithm['basic_settings_color-template'][0];

$number_of_questions = count(array_filter($welgorithm['questions']));
?>
<script>
    var steps = $welgorithm['basic_settings_steps'][0];
</script>
    <!-- Main -->
    <div id="main">
        <div class="banner-image">
            <img src="<?= $logic->getRandomImage($color_scheme, true) ?>" alt="">
        </div>

        <div class="inner">

            <? for($i = 0; $i < $number_of_questions; $i++) : ?>
            <div class="wellghoritm<? if ($i > 0 ) : ?> hidden<? endif;?>">
                <? if ($i == 0 ) : ?>
                    <div class="progressbar">
                        <div class="outline">
                            <div class="inside" style="width:30%">
                                30%
                            </div>
                        </div>
                    </div>
                <? endif; ?>
                <div class="question">
                    <span>
                        <?= $welgorithm['questions'][$i]; ?>
                    </span>
                </div>
                <div class="answer first">
                    <div class="answer__radio">
                        <label for="selected_anser_1"></label>
                        <input type="radio" name="selected_anser_1" id="selected_anser_1" value="<?= $welgorithm['first_answers'][$i]; ?>">
                        <div class="check">
                            <div class="inside"></div>
                        </div>
                    </div>
                    <div class="answer__input">
                        <div>
                            <div contenteditable="true" class="fake-input"><?= $welgorithm['first_answers'][$i]; ?></div>
                        </div>
                    </div>
                </div>
                <div class="answer second">
                    <div class="answer__radio">
                        <label for="selected_anser_2"></label>
                        <input type="radio" name="selected_anser_1" id="selected_anser_2" value="<?= $welgorithm['second_answers'][$i]; ?>">
                        <div class="check">
                            <div class="inside"></div>
                        </div>
                    </div>
                    <div class="answer__input">
                        <div>
                            <div contenteditable="true" class="fake-input"><?= $welgorithm['second_answers'][$i]; ?></div>
                        </div>
                    </div>
                </div>
                <div class="extra-menu">
                </div>
            </div>
            <div class="separator"></div>
            <? endfor; ?>

        </div>
    </div>

<?php get_footer(); ?>