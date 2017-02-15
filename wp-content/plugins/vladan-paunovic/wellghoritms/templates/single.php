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

get_header(); ?>

<?php require_once 'logic.php'?>

    <!-- Main -->
    <div id="main">
        <div class="banner-image">
            <img src="<?= getRandomImage($color_scheme, true) ?>" alt="">
        </div>

        <div class="inner">


        </div>
    </div>

<?php get_footer(); ?>