<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FavorFields
 */


get_header();
global $favorfields;
require_once get_template_directory() . '/classes/blog/Blog.php';
$blog = new Blog();

$cat_ids = get_the_category()[0];

$this_cat_id = ( get_query_var('cat') ) ? get_query_var('cat') : $cat_ids->term_id;
$tag_list  = $blog->get_tags_by_category(4, $this_cat_id);

?>

<!-- Latest compiled and minified CSS  -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<div id="primary" class="content-area test">
    <main id="main" class="site-main" role="main">
        <div class="wellgorithms-main-banner">
            <div class="wellgo-transparent-overlay background-color-3">
            </div> <!-- wellgo-transparent-overlay -->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="top-banner-content">
                            <ul class="list-inline top-categories">
	                            <? foreach( $favorfields['blog_categories_order'] as $category ) : ?>
                                    <li>
                                        <figure class="wellgo-mood-img">
                                            <a href="<?= get_category_link( $category['url'] ); ?>">
                                                <img src="<?= $category['image'] ?>" alt="" class="img-responsive">
                                                <figcaption> <?= $category['title'] ?> </figcaption>
                                            </a>
                                        </figure>
                                    </li>
	                            <? endforeach; ?>
                            </ul> <!-- top-categories -->

                            <div class="blog-page-heading">
                                <span class="heading"> <?= get_the_category_by_ID($this_cat_id) ?></span>
                                <span class="sub-heading">“<?= category_description( $this_cat_id ) ?>”</span>
                            </div> <!-- blog-page-heading -->

                            <ul class="list-inline blog-random-tags">
                                <li><a href="<?= get_category_link( 162 ); ?>"><?= get_the_category_by_ID( 162 ) ?></a></li>
                                <li><a href="<?= get_category_link( 163 ); ?>"><?= get_the_category_by_ID( 163 ) ?></a></li>
                            </ul> <!-- blog-random-tags -->
                        </div> <!-- top-banner-content -->
                    </div> <!-- col-sm-12 ends -->
                </div> <!-- row ends -->
            </div> <!-- container ends-->
        </div>

        <div class="blog-container container">
            <div class="row">

                <div class="col-sm-12 big-matrix clearfix">
                    <a href="http://favorfields.com/blog/" title="Blog Home" class="refresh-btn border-color-4">
                      <i class="fa fa-repeat" aria-hidden="true"> </i>
                    </a>
                </div>

                <div class="col-sm-8">
					<?php if ( have_posts() ) : ?>

						<?php if ( is_home() && ! is_front_page() ) : ?>
                            <!-- <header>
    						<h1 class="page-title screen-reader-text"><?php // single_post_title(); ?></h1>
    					</header> -->
						<?php endif; ?>

						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<?php

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_format() );
							?>
						<?php endwhile; ?>
						<?php the_posts_navigation(); ?>
					<?php else : ?>

						<?php get_template_part( 'template-parts/content', 'none' ); ?>
					<?php endif; ?>
                </div>

                <div class="col-sm-4">
					<?php get_sidebar(); ?>
                </div>
            </div> <!-- .row -->
        </div> <!-- .container -->

    </main><!-- #main -->
</div><!-- #primary -->
<?php get_footer(); ?>
