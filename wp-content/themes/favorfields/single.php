<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package FavorFields
 */

get_header(); ?>

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
								<li>
									<figure class="wellgo-mood-img">
										<a href=""> 
											<img src="http://favorfields.com/wp-content/uploads/2017/02/Hellgo40-1.png" alt="" class="img-responsive">
											<figcaption> Hellgo </figcaption>
										</a>
									</figure>
								</li>
								<li>
									<figure class="wellgo-mood-img">
										<a href=""> 
											<img src="http://favorfields.com/wp-content/uploads/2017/02/Letgo5-1.png" alt="" class="img-responsive">
											<figcaption> Wellgo </figcaption>
										</a>
									</figure>
								</li>
								<li>
									<figure class="wellgo-mood-img">
										<a href=""> 
											<img src="http://favorfields.com/wp-content/uploads/2017/02/Wellgo12.png" alt="" class="img-responsive">
											<figcaption> Letgo </figcaption>
										</a>
									</figure>
								</li>
								<li>
									<figure class="wellgo-mood-img">
										<a href=""> 
											<img src="http://favorfields.com/wp-content/uploads/2017/02/Wellgo10.png" alt="" class="img-responsive">
											<figcaption> Cosmo </figcaption>
										</a>
									</figure>
								</li>
								<li>
									<figure class="wellgo-mood-img">
										<a href=""> 
											<img src="http://favorfields.com/wp-content/uploads/2017/02/Wellgo40.png" alt="" class="img-responsive">
											<figcaption> Predicto </figcaption>
										</a>
									</figure>
								</li>
								<li>
									<figure class="wellgo-mood-img">
										<a href=""> 
											<img src="http://favorfields.com/wp-content/uploads/2017/02/Wellgo58.png" alt="" class="img-responsive">
											<figcaption> Quacko </figcaption>
										</a>
									</figure>
								</li>
								<li>
									<figure class="wellgo-mood-img">
										<a href=""> 
											<img src="http://favorfields.com/wp-content/uploads/2017/02/Letgo47-1.png" alt="" class="img-responsive">
											<figcaption> Fako </figcaption>
										</a>
									</figure>
								</li>
							</ul> <!-- top-categories -->

							<div class="blog-page-heading">
								<span class="heading"> Hellgo</span>
								<span class="sub-heading">“Climbing out of your inner hell.”</span>
							</div> <!-- blog-page-heading -->

							<ul class="list-inline blog-random-tags">
								<li> Gratitude </li>
								<li> Peace </li>
								<li> Faith </li>
								<li> Joy </li>
							</ul> <!-- blog-random-tags -->
						</div> <!-- top-banner-content -->

          	<div class="right-faded-logo">
              <img src="http://favorfields.com/wp-content/themes/favorfields/assets/images/mian-logo.png" alt="FFLOGO" class="img-responsive">
            </div>  <!-- right-faded-logo ends -->
          </div> <!-- col-sm-12 ends -->
        </div> <!-- row ends -->
      </div> <!-- container ends-->
    </div>

		<div class="blog-container container">
			<div class="row">

				<div class="col-sm-12 big-matrix clearfix"> 
	    		<a href="javascript:void(0)" title="Suffle Users" class="refresh-btn border-color-4"> 
	          <i class="fa fa-repeat" aria-hidden="true"> </i> 
	      	</a>
    		</div>
    		
				<div class="col-sm-8 test">
					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'template-parts/content', 'single' ); ?>

						<?php the_post_navigation(); ?>

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
