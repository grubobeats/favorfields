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
$tags = array();
$weather = array();
$args = array(
    'post_type' => 'my_wellgorithms',
    'author'    => $author, // use 25 for testing
);
// The Query
$the_query = new WP_Query( $args );
?>
<script>
    var tags, weather;
</script>
<div class="separator" style="height: 150px; width: 100%"></div>
<!-- Main -->
<div id="main">
    <form action="<?= get_permalink() ?>">
        <select name="category-filter" id="category-filter">
            <option value="0">All</option>
            <? foreach( get_categories() as $category ) : ?>
                <option value="<?= $category->cat_ID?>"><?= $category->name?></option>
            <? endforeach; ?>
        </select>
        <select name="tags-filter" id="tags-filter">
            <option value="0">All</option>

        </select>

        <select name="weather-filter" id="weather-filter">
            <option value="1">All</option>
        </select>

        <button type="submit" class="submit-filter">Filter</button>
    </form>

    <div class="wellgorithms-container">
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

                $current_weather =  get_post_meta( $post->ID, 'user_basic_settings_mood')[0];
                $current_weather_name = "";

                switch($current_weather) {
                    case 1: $current_weather_name = "Sunshine"; break;
                    case 2: $current_weather_name = "Storm"; break;
                    case 3: $current_weather_name = "Rainbow"; break;
                    case 4: $current_weather_name = "Rain"; break;
                    case 5: $current_weather_name = "Partly_sunny"; break;
                    case 6: $current_weather_name = "Clouds"; break;
                    default: $current_weather_name = "No weather";
                }


                $weather[] = array(
                    'id' =>  $current_weather,
                    'name' =>  $current_weather_name
                );

                $tags[] = array(
                    'id' => wp_get_post_tags($related_wellgo_id)[0]->term_taxonomy_id,
                    'name' => wp_get_post_tags($related_wellgo_id)[0]->name,
                );

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
<script>
    tags = <?= json_encode( array_values( array_unique( $tags, SORT_REGULAR ) ) )?>;
    weather = <?= json_encode( array_values( array_unique( $weather, SORT_REGULAR ) ) )?>;



    jQuery(document).ready(function ($) {

        // Add to tags
        $.each(tags, function(key, value) {
            $('#tags-filter')
                .append($("<option></option>")
                    .attr("value",value.id)
                    .text(value.name));
        });


        // Add to weather
        $.each(weather, function(key, value) {
            $('#weather-filter')
                .append($("<option></option>")
                    .attr("value",value.id)
                    .text( value.name.replace('_', ' ') ));
        });


    })


</script>
<?php get_footer(); ?>
