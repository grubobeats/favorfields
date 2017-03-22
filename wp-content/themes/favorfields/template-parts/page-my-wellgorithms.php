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
 * Template name: My Wellgorithms
 */

get_header();

$author = get_current_user_id();

$args = array(
    'post_type' => 'my_wellgorithms',
    'author'    => $author, // use 25 for testing
);
// The Query
$the_query = new WP_Query( $args );
?>
<div class="separator" style="height: 150px; width: 100%"></div>
<!-- Main -->
<div id="main">
    <div class="inner">
        <?php
        // The Loop
        if ( $the_query->have_posts() ) {

            while ( $the_query->have_posts() ) {
                $the_query->the_post();
                $answer = array_filter( get_post_meta($post->ID, 'user_questions')[0] );
                $random_answer = rand(0, count($answer) - 1 );
                $image_src = get_post_meta( $post->ID, 'user_basic_settings_icon' )[0];
                $related_wellgo_id = get_post_meta( $post->ID, 'user_basic_settings_related_wellgo' )[0];
                $category = strtolower( get_the_category($related_wellgo_id)[0]->name );

                echo '<div class="wellgorithm ' . $category .'">';

                    echo '<div class="image"><img src="' . $image_src . '" alt="' . get_the_title() . '"/></div>';
                    echo '<div class="title">' . get_the_title() . '</div>';
                    echo '<div class="description">' . $answer[ $random_answer ] . '</div>';
                    echo '<div class="footer" data-post_id="' . $post->ID . '">';
                        echo '<div class="option href"><a href="' . get_permalink() . '">1</a></div>';
                        echo '<div class="option share" data-share-link="' . get_permalink() . '">' . '2' . '</div>';
                        echo '<div class="option public">' . '3' . '</div>';
                        echo '<div class="option delete">' . '4' . '</div>';
                    echo '</div>';

                echo '</div>';
            }


            /* Restore original Post Data */
            wp_reset_postdata();
        } else {
            // no posts found
            echo "No wellgorithms";
        }

        wp_reset_query(); //resetting the page query
        ?>

    </div>
</div>

<?php get_footer(); ?>
