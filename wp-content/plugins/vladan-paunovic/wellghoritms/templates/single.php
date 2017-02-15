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
 */

get_header();
require_once 'logic.php';

$welgorithm = $logic->getWellghoritm();
$color_scheme = $welgorithm['basic_settings_color-template'][0];

$number_of_questions = count(array_filter($welgorithm['questions']));
?>

    <!-- Main -->
    <div id="main">
        <div class="banner-image">
            <img src="<?= $logic->getRandomImage($color_scheme, true) ?>" alt="">
        </div>

        <div class="inner">

            <? for($i = 0; $i <= $number_of_questions; $i++) : ?>
            <div class="wellghoritm<? if ($i > 0 ) : ?> hidden<? endif;?>">
                <div class="progressbar">
                    <?= $progresbar = $i > 0 ? "" : $welgorithm['basic_settings_steps'][0]; ?>
                </div>
                <div class="question">
                    <?= $welgorithm['questions'][$i]; ?>
                </div>
                <div class="answer first">
                    <input type="text" name="first_answers[]" value="<?= $welgorithm['first_answers'][$i]; ?>">
                </div>
                <div class="answer second">
                    <input type="text" name="second_answers[]" value="<?= $welgorithm['second_answers'][$i]; ?>">
                </div>
                <div class="extra-menu">
                </div>
            </div>
            <? endfor; ?>

        </div>
    </div>

<?php get_footer(); ?>