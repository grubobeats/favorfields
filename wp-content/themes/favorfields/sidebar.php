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
	$cat_id = get_the_category()[0]->term_id;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php //dynamic_sidebar( 'sidebar-1' ); ?>
    <aside id="tag_cloud-2" class="widget widget_tag_cloud">
        <h2 class="widget-title">Topics</h2>
        <div class="tagcloud">
            <?= $blog->get_tag_cloud_by_category($cat_id); ?>
        </div>
    </aside>
    <aside id="search-2" class="widget widget_search">
        <form role="search" method="get" class="search-form" action="http://favorfields.com/">
            <label>
                <span class="screen-reader-text">Search for:</span>
                <input type="search" class="search-field" placeholder="Search …" value="" name="s">
            </label>
            <input type="submit" class="search-submit" value="Search">
        </form>
    </aside>
    <aside id="categories-2" class="widget widget_categories">
        <h2 class="widget-title">Wellgorithms</h2>
        <ul>
            <li class="cat-item cat-item-151"><a href="http://favorfields.com/category/blog/">Blog</a>
            </li>
            <li class="cat-item cat-item-148"><a href="http://favorfields.com/category/cosmo/">Cosmo</a>
            </li>
            <li class="cat-item cat-item-4"><a href="http://favorfields.com/category/hellgo/">Hellgo</a>
            </li>
            <li class="cat-item cat-item-5"><a href="http://favorfields.com/category/letgo/">Letgo</a>
            </li>
            <li class="cat-item cat-item-147"><a href="http://favorfields.com/category/predicto/">Predicto</a>
            </li>
            <li class="cat-item cat-item-3"><a href="http://favorfields.com/category/wellgo/">Wellgo</a>
            </li>
        </ul>
    </aside>
</div>