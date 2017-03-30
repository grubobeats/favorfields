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
 * Template name: My Sanctuary
 */

get_header();

$author = get_current_user_id();
$username_query = get_query_var('creator', 0);
$shared = get_user_by('login', get_query_var('creator', 0))->data->ID;
$form_action_link = ($username_query != "0") ? get_permalink() . $username_query : get_permalink();

if ( is_user_logged_in() ) :

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

    <div class="my-sanctuary">

        My sanctuary page

    </div>
</div>



<? else : ?>
    <h2>You need to be logged in to view this page</h2>
<? endif; ?>

<?php get_footer(); ?>
