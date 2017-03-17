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

<!-- Main -->
<div id="main">
    <div class="inner">
        <?php

        // TO SHOW THE PAGE CONTENTS
        while ( have_posts() ) :
            the_post();
            the_content();

        endwhile; //resetting the page loop

        wp_reset_query(); //resetting the page query
        ?>

    </div>
</div>

<?php get_footer(); ?>
