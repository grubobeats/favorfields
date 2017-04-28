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
 * Template name: Quackbot
 */
get_header();
// get_template_part( 'header-wellgorithms');
?>
<!-- Latest compiled and minified CSS  -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Main -->
<style id="cornerstone-generated-css" type="text/css">#cs-content .x-accordion,#cs-content .x-alert,#cs-content .x-audio,#cs-content .x-author-box,#cs-content .x-base-margin,#cs-content .x-block-grid,#cs-content .x-card-outer,#cs-content .x-code,#cs-content .x-columnize,#cs-content .x-entry-share,#cs-content div.x-feature-box,#cs-content .x-feature-list,#cs-content .x-flexslider-shortcode-container,#cs-content .x-gap,#cs-content .x-img,#cs-content .x-map,#cs-content .x-promo,#cs-content .x-prompt,#cs-content .x-recent-posts,#cs-content .x-section,#cs-content .x-skill-bar,#cs-content .x-tab-content,#cs-content .x-video{margin-bottom:1.5em;}#cs-content .x-blockquote:not(.x-pullquote),#cs-content .x-callout,#cs-content .x-hr,#cs-content .x-pricing-table{margin-top:1.5em;margin-bottom:1.5em;}@media (max-width:767px){#cs-content .x-pullquote.left,#cs-content .x-pullquote.right{margin-top:1.5em;margin-bottom:1.5em;}}@media (max-width:480px){#cs-content .x-toc.left,#cs-content .x-toc.right{margin-bottom:1.5em;}}#cs-content .x-container.width{width:88%;}#cs-content .x-container.max{max-width:1200px;}#cs-content .x-accordion-heading .x-accordion-toggle.collapsed,#cs-content .x-nav-tabs > li > a,#cs-content .x-recent-posts .h-recent-posts,#cs-content .x-recent-posts .x-recent-posts-date{color:#272727;}#cs-content .x-accordion-heading .x-accordion-toggle.collapsed:hover,#cs-content .x-accordion-heading .x-accordion-toggle,#cs-content .x-nav-tabs > li > a:hover,#cs-content .x-nav-tabs > .active > a,#cs-content .x-nav-tabs > .active > a:hover,#cs-content .x-recent-posts a:hover .h-recent-posts{color:#ff2a13;}#cs-content a.x-img-thumbnail:hover{border-color:#ff2a13;}#cs-content .x-dropcap,#cs-content .x-highlight,#cs-content .x-pricing-column.featured h2,#cs-content .x-recent-posts .x-recent-posts-img:after{background-color:#ff2a13;}#cs-content .x-btn{color:#ffffff;border-color:#ac1100;background-color:#ff2a13;margin-bottom:0.25em;text-shadow:0 0.075em 0.075em rgba(0,0,0,0.5);box-shadow:0 0.25em 0 0 #a71000,0 4px 9px rgba(0,0,0,0.75);border-radius:0.25em;}#cs-content a.x-btn:hover{color:#ffffff;border-color:#600900;background-color:#ef2201;margin-bottom:0.25em;text-shadow:0 0.075em 0.075em rgba(0,0,0,0.5);box-shadow:0 0.25em 0 0 #a71000,0 4px 9px rgba(0,0,0,0.75);}#cs-content .x-btn.x-btn-real,#cs-content .x-btn.x-btn-real:hover{margin-bottom:0.25em;text-shadow:0 0.075em 0.075em rgba(0,0,0,0.65);}#cs-content .x-btn.x-btn-real{box-shadow:0 0.25em 0 0 #a71000,0 4px 9px rgba(0,0,0,0.75);}#cs-content .x-btn.x-btn-real:hover{box-shadow:0 0.25em 0 0 #a71000,0 4px 9px rgba(0,0,0,0.75);}#cs-content .x-btn.x-btn-flat,#cs-content .x-btn.x-btn-flat:hover{margin-bottom:0;text-shadow:0 0.075em 0.075em rgba(0,0,0,0.65);box-shadow:none;}#cs-content .x-btn.x-btn-transparent,#cs-content .x-btn.x-btn-transparent:hover{margin-bottom:0;border-width:3px;text-shadow:none;text-transform:uppercase;background-color:transparent;box-shadow:none;}</style>
    <style>.color-1 { color: #000000 !important; } .color-2 { color: #d0e0c5 !important; } .color-3 { color: #4a6659 !important; } .color-4 { color: #35443d !important; } .background-color-1 { background-color: #000000 !important; } .background-color-2 { background-color: #d0e0c5 !important; } .background-color-3 { background-color: #4a6659 !important; } .background-color-4 { background-color: #35443d !important; } .border-color-1 { border-color: #000000 !important; } .border-color-2 { border-color: #d0e0c5 !important; } .border-color-3 { border-color: #4a6659 !important; } .border-color-4 { border-color: #35443d !important; } .box-shadow-color-1 { box-shadow: 0 0 0 1px #000000 !important; } .border-left-color-1 {border-left-color: #000000 !important;} .border-left-color-2 {border-left-color: #d0e0c5 !important;} .border-left-color-3 {border-left-color: #4a6659 !important;} .border-left-color-4 {border-left-color: #35443d !important;}

	.wellgo-btn-container button:hover .btn1, .wellgo-btn-container button:hover .btn2, .wellgo-btn-container button:hover .btn3 { background-color: #000000 !important; }

	.wellgo-questionnaire-container .wellgo-questionnaire .wellgo-quiz-box .wellgo-user .wellgo-favor-btn:hover, .wellgo-questionnaire-container .wellgo-questionnaire .wellgo-quiz-box .wellgo-user .wellgo-favor-btn:focus { background-color: #000000 !important; }

	.background-color-5 { background-color: #000000 }
	.background-color-6 { background-color: #99977f }

	.border-before-color-1::before {
		border-color: #000000 !important;
	}
	.border-before-color-2::before {
		border-color: #d0e0c5 !important;
	}
	.border-before-color-3::before {
		border-color: #4a6659 !important;
	}
	.border-before-color-4::before {
		border-color: #35443d !important;
	}

	.background-color-before-color-1::before {
		background-color: #000000 !important;
	}
	.background-color-before-color-2::before {
		background-color: #d0e0c5 !important;
	}
	.background-color-before-color-3::before {
		background-color: #4a6659 !important;
	}
	.background-color-before-color-4::before {
		background-color: #35443d !important;
	}

	.background-color-after-color-1::after {
		background-color: #000000 !important;
	}
	.background-color-after-color-2::after {
		background-color: #d0e0c5 !important;
	}
	.background-color-after-color-3::after {
		background-color: #4a6659 !important;
	}
	.background-color-after-color-4::after {
		background-color: #35443d !important;
	}

	.cs-background-image {
		background-image: url("http://favorfields.com/wp-content/themes/favorfields/assets/images/favor-img.png") !important;
	}

	.cs-image-overlayed {
		background-image: url("http://favorfields.com/wp-content/uploads/2017/04/newhellgo4.jpg");
	}

	.cs-main-background-image {
		background-image: url("http://favorfields.com/wp-content/uploads/2017/04/hellgo77.png") !important;
	}

	.hexagon label {background-color: #35443d !important;}
	.hexagon label::before {border-bottom-color: #35443d !important;}
	.hexagon label::after {border-top-color: #35443d !important;}

	.hexagon .hexagon-focus {background-color: #000000 !important;}
	.hexagon .hexagon-focus::before {border-bottom-color: #000000 !important;}
	.hexagon .hexagon-focus::after {border-top-color: #000000 !important;}

	.favor-card-png { background-image: url('') !important; }
</style>

<div id="main">
  <div class="main-wellgorithms background-color-6">

		<!-- wellgorithms-main-banner starts -->
  	<div class="wellgorithms-main-banner cs-image-overlayed">
  		<div class="wellgo-transparent-overlay background-color-1" style="background-color: rgba(68, 45, 45, 0) !important;">
  		</div> <!-- wellgo-transparent-overlay -->
  		<div class="container">
  			<div class="row">
  				<div class="col-sm-12">

  					<div class="wellgorightem-content">
	  					<figure class="wellgo-mood-img">
	  						<img src="http://favorfields.com/wp-content/uploads/2017/04/hellgo-or1.png" alt="" class="img-responsive">					
	  					</figure>
	  					<h1 class="wellgo-main-title">
	  						<small>Oh no! </small> 
	  						<span class="cm">Selfie Self Syndrome</span> 
	  					</h1>
	  				</div> <!-- wellgorightem-content ends -->

	  				<div class="right-faded-logo">
	  					<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/ff-iconr.png" alt="FFLOGO" class="img-responsive">
	  				</div>  <!-- right-faded-logo ends -->

  				</div> <!-- col-sm-12 ends -->
  			</div> <!-- row ends -->
  		</div> <!-- container ends-->
  	</div> 
  	<!-- wellgorithms-main-banner ends -->
		
		<!-- wellgorithms-questionnaire starts -->
  	<div class="container">
  		<div class="row">
  			<div class="col-sm-12">
  				<!--=========================== Quiz Box Loop Starts Here ===========================-->
  				<div class="wellgo-questionnaire-container background-color-2">
  					<div class="wellgo-questionnaire">

  					<div class="wellgo-type"> <span>Hellgo</span> </div>
	  				<!-- Wellgo-Type ends -->

              <div class="wellgo-btn-container">
             		<button type="button" class="border-color-4"> <span class="btn1 sparkley" style="border:2px solid white !important;">Inspiration</span> </button>
             		<button type="button" class="border-color-4"> <span class="btn2 sparkley" style="border:2px solid white !important;">Aha Moment </span> </button>
             		<button type="button" class="border-color-4"> <span class="btn3 sparkley" style="border:2px solid white !important;">Breakthrough </span> </button>
              </div>

	  					<h2 class="wellgo-main-title color-3">
	  						<span class="tm">Quack Bot Says</span>
	  						<br> I have <span class="cm">Selfie Self Syndrome</span>
	  					</h2>

	  					<div class="wellgo-quiz-box border-color-4">
	  						<div class="col-sm-5 wellgo-quiz-option">
	  							<p contenteditable="true" class="changed">I can't believe it. Just yesterday I had Other Other Syndrome.</p>
	  						</div> 
	  						<!-- col-sm-5 wellgo-quiz-option ends -->

	  						<div class="col-sm-2 wellgo-main-img text-center">
	  							<ul class="background-color-4 cs-main-background-image" data-step="0">
										<li class="top-part mode-solo"></li>
										<li class="middle-part mode-default"></li>
										<li class="bottom-part mode-social"></li>
									</ul>
	  						</div> <!-- col-sm-2 wellgo-main-img ends -->

	  						<div class="col-sm-5 wellgo-quiz-option">
	  							<p contenteditable="true">Now I'm seriously confused. </p>
	  						</div> 
	  						<!-- col-sm-5 wellgo-quiz-option ends -->

	  						<div class="diamond">
								  <div class="radio">
								    <input id="radio-1" name="radio" type="radio">
								    <label for="radio-1" class="radio-label border-before-color-4"></label>
								  </div> <!-- option 1 -->
								  <div class="radio">
								    <input id="radio-2" name="radio" type="radio">
								    <label  for="radio-2" class="radio-label border-before-color-4"></label>
								  </div> <!-- option 2 -->
								</div>
								<!-- Radio Buttons -->

	  					</div>
	  					<!-- wellgo-quiz-box ends -->							
							
							<!-- wellgo-btn-sm btns -->
  						<button type="button" class="wellgo-btn-sm top-next border-color-4"></button>
							
							<!-- progressbar ends -->	
							<ul class="progressbar fixed">				
								<li class="active background-color-before-color-3 background-color-after-color-3"></li>
							</ul>
				    	<!-- progressbar ends -->
							
							<div class="clearfix"></div>
	  				</div> 
	  				<!-- wellgorightem-questionnaire ends -->
  				</div>
  				<!--=========================== Quiz Box Loop Ends Here ===========================-->

  			</div> 
  			<!-- col-sm-12 ends -->
			 	 
			 	<!-- wellgo-login-box starts here -->
  			<div class="col-sm-12 wellgo-login-box bw-login-box text-center">
  				<form class="form-inline">
					  <div class="form-group">
					    <input type="email" class="form-control background-color-3" placeholder="name">
					  </div>
					  <div class="form-group">
					    <input type="password" class="form-control background-color-3" placeholder="password">
					  </div>
					  <button type="submit" class="btn btn-default background-color-3">enter</button>
					</form>
  			</div>
  		  <!-- wellgo-login-box ends here -->

  		  <!-- wellgo-Signup-box starts here -->
  			<div class="col-sm-12 text-center">
	  			<div class="wellgo-singup-box wellgo-box-bg space-md background-color-2 bw-signup-box">
	  				<h3 class="bold-text color-3">Not yet a member?
	            <br> Join the <strong class="tm">Quack Bot Says</strong> Club
	          </h3>
	  				<form class="signup-form">
						  <div class="form-group">
						    <input type="name" class="form-control background-color-4 color-3" placeholder="name">
						  </div>
						  <div class="form-group">
						    <input type="email" class="form-control background-color-4 color-3" placeholder="email">
						  </div>
						  <button type="submit" class="btn btn-default background-color-3">put me on the waiting list</button>
						</form>
						<h3 class="bold-text color-3">Find out if you have 
	            <br> <strong class="cm">Selfie Self Syndrome</strong>
	            <br> (and other disorders)
	          </h3>
	  			</div>
  			</div>
  		  <!-- wellgo-Signup-box ends here -->

  		</div> 
  		<!-- row ends -->
  	</div> 
  	<!-- container ends -->
  </div> 
  <!-- main-wellgorithms ends -->
</div>
<!-- #main ends -->

<script type="text/javascript">
// Changing 3 Dots Hover Button's Text when clicking
jQuery('.wellgo-btn-container button').eq(0).click(function(){
  jQuery(this).find('.btn1').text("awesome!")
})
jQuery('.wellgo-btn-container button').eq(1).click(function(){
  jQuery(this).find('.btn2').text("way to go!")
})
jQuery('.wellgo-btn-container button').eq(2).click(function(){
  jQuery(this).find('.btn3').text("you are amazing!")
})
</script>

<!-- Sparkleh Main File -->
<script type='text/javascript' src='http://favorfields.com/wp-content/themes/favorfields/js/sparkleh.js'></script>
<script type="text/javascript">
// Initializing Sparkleh Function
jQuery(function() {
  jQuery(".sparkley").sparkleh();
});
</script>

<?php get_footer(); ?>