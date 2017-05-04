<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package FavorFields
 */

get_header();
global $favorfields;

$cat_ids = get_the_category()[0];
$this_cat_id = ( get_query_var('cat') ) ? get_query_var('cat') : $cat_ids->term_id;
?>

<!-- Latest compiled and minified CSS  -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<div id="primary" class="content-area vlad">
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
								<span class="sub-heading">“<?= category_description($this_cat_id);?>”</span>
							</div> <!-- blog-page-heading -->

							<ul class="list-inline blog-random-tags">
                                <li><a href="#">What Is Wellgorithm?</a></li>
                                <li><a href="#">Videos</a></li>
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
    		
				<div class="col-sm-8 test">
					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'template-parts/content', 'single' ); ?>

						<?php // the_posts_navigation(); ?>

						<?php
									// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
						?>

					<?php endwhile; // End of the loop. ?>
				</div>

				<div class="col-sm-4">
					<?php get_sidebar(); ?>
				</div>

			</div> <!-- .row -->
		</div> <!-- .container -->

</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
