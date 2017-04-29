<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FavorFields
 */
require_once get_template_directory() . '/classes/blog/Blog.php';
$blog = new Blog();
$cat_id = -1;

if ( is_archive() ) {
	$cat_id = get_query_var('cat');
}

?>

<div id="secondary" class="widget-area" role="complementary">
	<?php //dynamic_sidebar( 'sidebar-1' ); ?>
    <aside id="ask_lady_widget" class="widget widget_ask_lady">
        <div class="ask_lady-metta">
            <p class="pull-left"> <img class="img-responsive pull-left" src="http://favorfields.com/wp-content/uploads/2017/03/RENEE.png"> <span class="ask-lady-title pull-left">Ask <br>Lady Metta</span></p>
            <p>Spiritual AI. Motivational Bots. Wellgorithms. Sound strange? Exactly! That’s why I’m here to help...</p>
            <p class="text-center"><a href="#" class="explore-btn">Explore</a></p>
        </div>
    </aside>
    <aside id="tag_cloud-2" class="widget widget_tag_cloud">
        <h2 class="widget-title">Topics</h2>
        <div class="tagcloud">
            <?= $blog->get_tag_cloud_by_category($cat_id); ?>
        </div>
    </aside>
    <aside id="search-2" class="widget widget_search">
        <? get_search_form(); ?>
    </aside>
    <aside id="categories-2" class="widget widget_categories">
        <h2 class="widget-title">Wellgorithms</h2>
        <ul>
            <? foreach( $blog->get_wellgorithms_by_category(5,$cat_id) as $wellgorithm ) : ?>
                <li class="cat-item cat-item-151">
                    <a href="<?= the_permalink($wellgorithm) ?>"><?= get_the_title($wellgorithm) ?></a>
                </li>
            <? endforeach; ?>
        </ul>
    </aside>
</div>