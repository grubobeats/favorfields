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
$username_query = get_query_var('creator', 0);
$shared = get_user_by('login', get_query_var('creator', 0))->data->ID;
$form_action_link = ($username_query != "0") ? get_permalink() . $username_query : get_permalink();

if ( is_user_logged_in() || $shared != 0 ) :

    if ( $shared != 0 ) {
        $read_from_author = $shared;
        $status = "publish";
    } else {
        $read_from_author = $author;
        $status = "*";
    }

    $tags = array();
    $weather = array();
    $args = array(
        'post_type' => 'my_wellgorithms',
        'author'    => $read_from_author, // use 25 for testing
        'post_status'    => $status,
    );
    // The Query
    $the_query = new WP_Query( $args );


?>
<script>
    var tags, weather, ajaxurl = "<?= admin_url( 'admin-ajax.php' ) ?>";
</script>
<div class="separator" style="height: 150px; width: 100%"></div>
<!-- Main -->

<div id="main">

    <? if ($shared != 0) : ?>
    <div class="wellgo-creator">
        <h3><?= get_query_var('creator', 0) ?></h3>
    </div>
    <? endif; ?>

    <form action="<?= $form_action_link ?>" class="filter-form">
        <select name="category-filter" id="category-filter">
            <option value="0">Category</option>
            <? foreach( get_categories() as $category ) : ?>
                <option value="<?= $category->cat_ID?>"><?= $category->name?></option>
            <? endforeach; ?>
        </select>
        <select name="tags-filter" id="tags-filter">
            <option value="0">Focus</option>

        </select>

        <select name="mood-filter" id="mood-filter">
            <option value="1">Mood</option>
        </select>

        <button type="submit" class="submit-filter">Filter</button>
    </form>

    <div class="wellgorithms-container">
        <?php
        // The Loop
        if ( $the_query->have_posts() ) {

            while ( $the_query->have_posts() ) {

                $the_query->the_post();
                $answer = array_filter( get_post_meta($post->ID, 'user_first_answers')[0] );
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

                // Checking if data is filtered
                // TODO: make select boxes to save values after search
                if (isset($_GET['category-filter'])) {
                    if ( get_the_category($related_wellgo_id)[0]->cat_ID != $_GET['category-filter'] && $_GET['category-filter'] != "0" )
                        continue;
                }

                if (isset($_GET['tags-filter'])) {
                    if ( wp_get_post_tags($related_wellgo_id)[0]->term_taxonomy_id != $_GET['tags-filter'] && $_GET['tags-filter'] != "0" )
                        continue;
                }

                if (isset($_GET['mood-filter'])) {
                    if ( $current_weather != $_GET['mood-filter'] && $_GET['mood-filter'] != "0" )
                        continue;
                }


                echo '<div class="wellgorithm">';

                    echo '<div class="image ' . $category .'" style="background-image: url(' . $image_src . ')"></div>';
                    echo '<div class="title">' . get_the_title() . '</div>';
                    echo '<div class="description">' . $answer[ $random_answer ] . '</div>';
                    echo '<div class="my-wellgos-footer" data-post_id="' . $post->ID . '">';
                        echo '<div class="option href"><a href="' . get_permalink() . '" target="_blank"><i class="fa fa-external-link" aria-hidden="true"></i></a></div>';
                        echo '<div class="option share" data-share-link="' . get_permalink() . '"><i class="fa fa-share-alt" aria-hidden="true"></i></div>';

                        if ( $shared == 0 ) {
                            echo '<div class="option public ' . get_post_status() . '" data-post-status="' . get_post_status() . '"><i class="fa fa-cog fa-spin fa-3x fa-fw" aria-hidden="true"></i></div>';
                            echo '<div class="option delete"><i class="fa fa-trash" aria-hidden="true"></i></div>';
                        }
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

        $('.public').each(function () {
            var thisfield = $(this);
            if (thisfield.data('post-status') === 'publish') {
                thisfield.find('i').attr( 'class', 'fa fa-check-circle' )
            } else {
                thisfield.find('i').attr( 'class', 'fa fa-stop-circle-o' )
            }
        });

        // Add to tags
        $.each(tags, function(key, value) {
            $('#tags-filter')
                .append($("<option></option>")
                    .attr("value",value.id)
                    .text(value.name));
        });


        // Add to weather
        $.each(weather, function(key, value) {
            $('#mood-filter')
                .append($("<option></option>")
                    .attr("value",value.id)
                    .text( value.name.replace('_', ' ') ));
        });


        $('.public').click(function(){

            var post_id = $(this).parent().data('post_id'),
                make = "private",
                thisfield = $(this);

            thisfield.find('i').attr('class', 'fa fa-cog fa-spin fa-3x fa-fw');

            if ( $(this).data('post-status') === 'private' ) {
                make = "publish";
            }

            $.ajax({
                url: ajaxurl,
                type: "POST",
                dataType: "json",
                data: {
                    action: "post_visibility",
                    post_id: post_id,
                    make: make
                },
                success: function( response ) {
                    thisfield
                        .data('post-status', make)
                        .removeClass('publish')
                        .removeClass('private')
                        .addClass(make);

                    if (thisfield.data('post-status') === 'publish') {
                        thisfield.find('i').attr( 'class', 'fa fa-check-circle' )
                    } else {
                        thisfield.find('i').attr( 'class', 'fa fa-stop-circle-o' )
                    }
                },
                error: function( error ) {
                    console.log( "Error " + error );
                }

            });
        })


        $('.delete').click(function(){

            if ( confirm('Are you sure about permanent deleting of this wellgorithm?') === true ) {
                var post_id = $(this).parent().data('post_id'),
                    thisfield = $(this),
                    wellgorithm = $(this).parent().parent();

                thisfield.find('i').attr('class', 'fa fa-cog fa-spin fa-3x fa-fw');

                $.ajax({
                    url: ajaxurl,
                    type: "POST",
                    dataType: "json",
                    data: {
                        action: "post_delete",
                        post_id: post_id
                    },
                    success: function( response ) {
                        thisfield.find('i').attr('class', 'fa fa-stop-circle-o');
                        wellgorithm.hide('slow').delay(2000).remove();
                    },
                    error: function( error ) {
                        console.log( "Error " + error );
                    }

                });
            }

        })












    })
</script>

<? else : ?>
    <h2>You need to be logged in to view this page</h2>

<? endif; ?>

<?php get_footer(); ?>
