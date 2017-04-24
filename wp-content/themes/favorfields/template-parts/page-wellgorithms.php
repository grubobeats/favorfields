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
 * Template name: Wellgorithms
 */
// get_header();
get_template_part( 'header-wellgorithms');
?>

<!-- Latest compiled and minified CSS  -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400i|Raleway:400,600,700|Open+Sans:400,600" rel="stylesheet">
<!-- Main -->

<div id="main">
  <div class="main-wellgorithms">

		<!-- wellgorithms-main-banner starts -->
  	<div class="wellgorithms-main-banner">
  		<div class="wellgo-transparent-overlay background-color-3">
  		</div> <!-- wellgo-transparent-overlay -->
  		<div class="container">
  			<div class="row">
  				<div class="col-sm-12">

  					<div class="wellgorightem-content">
	  					<figure class="wellgo-mood-img">
	  						<img src="http://favorfields.com/wp-content/uploads/2017/02/wellgo1.png" alt="" class="img-responsive">					
	  					</figure>
	  					<h1 class="wellgo-main-title">
	  						<small>It's time to do the </small> 
	  						<span>Peace Infuser</span> 
	  					</h1>
	  				</div> <!-- wellgorightem-content ends -->

	  				<div class="right-faded-logo">
	  					<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/FFLOGO2.svg" alt="FFLOGO" class="img-responsive">
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

  					<div class="wellgo-type"> <span>Wellgo</span> </div>
	  				<!-- Wellgo-Type ends -->

              <div class="wellgo-btn-container">
             		<button type="button"> <span class="btn1 sparkley" style="border:2px solid white !important;">Inspiration</span> </button>
             		<button type="button"> <span class="btn2 sparkley" style="border:2px solid white !important;">Aha Moment </span> </button>
             		<button type="button"> <span class="btn3 sparkley" style="border:2px solid white !important;">Breakthrough </span> </button>
              </div>

	  					<h2 class="wellgo-main-title color-3">
	  						I am ready now to be the peace I wish to see in the world.<br>
	  						I am ready now to be the peace I wish to see in the world.<br>
	  						I am ready now to be the peace I wish to see in the world.
	  					</h2>

	  					<div class="wellgo-quiz-box border-color-4">
	  						<div class="col-sm-5 wellgo-quiz-option">
	  							<p contenteditable="true">I know it won't be easy. But I'm up for the challenge. I've done if before and i can do it again.</p>
	  							<div class="media wellgo-user">
	  								<figure class="media-left wellgo-user-img border-color-4"> 
	  									<img src="http://favorfields.com/wp-content/uploads/2017/02/mm9.png" alt="user" class="img-responsive"> 
	  								</figure>
	  								<div class="media-body">
		  								<span class="wellgo-user-name color-4"> JACQUELINE </span>
		  								<button class="wellgo-favor-btn background-color-4"> Favor </button>
	  								</div>
	  							</div>
	  							<!-- wellgo-user ends -->
	  						</div> 
	  						<!-- col-sm-5 wellgo-quiz-option ends -->

	  						<div class="col-sm-2 wellgo-main-img text-center">
	  							<ul class="background-color-4">
		  							<li class="top-part"></li>
		  							<li class="middle-part"></li>
		  							<li class="bottom-part"></li>
	  							</ul>
	  						</div> <!-- col-sm-2 wellgo-main-img ends -->

	  						<div class="col-sm-5 wellgo-quiz-option">
	  							<p contenteditable="true">Honestly I wish it was that easy. No matter how hard I try, I just can't seem to get myself together.</p>
	  							<div class="media wellgo-user">
	  								<figure class="media-left wellgo-user-img border-color-4"> 
	  									<img src="http://favorfields.com/wp-content/uploads/2017/02/mm9.png" alt="user" class="img-responsive"> 
	  								</figure>
	  								<div class="media-body">
		  								<span class="wellgo-user-name color-4"> JONATHAN </span>
		  								<button class="wellgo-favor-btn background-color-4"> Favor </button>
	  								</div>
	  							</div>
	  							<!-- wellgo-user ends -->
	  						</div> 
	  						<!-- col-sm-5 wellgo-quiz-option ends -->

	  						<div class="circle">
								  <div class="radio">
								    <input id="radio-1" name="radio" type="radio">
								    <label for="radio-1" class="radio-label border-color-4"></label>
								  </div> <!-- option 1 -->
								  <div class="radio">
								    <input id="radio-2" name="radio" type="radio">
								    <label  for="radio-2" class="radio-label border-color-4"></label>
								  </div> <!-- option 2 -->
								</div>
								<!-- Radio Buttons -->

	  					</div>
	  					<!-- wellgo-quiz-box ends -->							
							
							<!-- wellgo-btn-sm btns -->
  						<button type="button" class="wellgo-btn-sm top-next border-color-4"></button>
							
							<!-- progressbar ends -->	
							<ul class="progressbar">
				        <li class="step-completed background-color-4"></li>
				        <li class="step-completed background-color-4"></li>
				        <li class="step-completed background-color-4"></li>
				        <li class="active background-color-3"></li>
				        <li></li>
				        <li></li>
				        <li></li>
				    	</ul> 
				    	<!-- progressbar ends -->
							
							<div class="clearfix"></div>

							<!-- wellgo-random-users list -->					
				    	<ul class="wellgo-random-users list-inline">
				    		<li>
				    			<a href="#"> 
				    				<img src="http://favorfields.com/wp-content/uploads/2017/02/mm9.png" alt="user" class="img-responsive border-color-4">
				    				<span class="color-4"> Jonathan</span>
				    			</a>
				    		</li>
				    		<li>
				    			<a href="#"> 
				    				<img src="http://favorfields.com/wp-content/uploads/2017/02/mm9.png" alt="user" class="img-responsive border-color-4">
				    				<span class="color-4"> Jacqueline</span>
				    			</a>
				    		</li>
				    		<li>
				    			<a href="#"> 
				    				<img src="http://favorfields.com/wp-content/uploads/2017/02/mm9.png" alt="user" class="img-responsive border-color-4">
				    				<span class="color-4"> Tony</span>
				    			</a>
				    		</li>
				    		<li>
				    			<a href="#"> 
				    				<img src="http://favorfields.com/wp-content/uploads/2017/02/mm9.png" alt="user" class="img-responsive border-color-4">
				    				<span class="color-4"> Karl</span>
				    			</a>
				    		</li>
				    		<li>
				    			<a href="#"> 
				    				<img src="http://favorfields.com/wp-content/uploads/2017/02/mm9.png" alt="user" class="img-responsive border-color-4">
				    				<span class="color-4"> Bonny</span>
				    			</a>
				    		</li>

			    			<div class="shuffle-users"> 
					    		<a href="javascript:void(0)" title="Suffle Users" class="border-color-4"> 
					    			<i class="fa fa-repeat reload_search" aria-hidden="true"> </i> 
					    		</a> 
					    	</div>
					    	<!-- shuffle-users btn ends -->
				    	</ul>
							<!-- wellgo-random-users list ends here -->
	  				</div> 
	  				<!-- wellgorightem-questionnaire ends -->
  				</div>
  				<!--=========================== Quiz Box Loop Ends Here ===========================-->

  			</div> 
  			<!-- col-sm-12 ends -->
			 	 
			 	<!-- wellgo-login-box starts here -->
  			<div class="col-sm-12 wellgo-login-box text-center">
  				<form class="form-inline">
					  <div class="form-group">
					    <input type="email" class="form-control background-color-3" placeholder="email">
					  </div>
					  <div class="form-group">
					    <input type="password" class="form-control background-color-3" placeholder="password">
					  </div>
					  <button type="submit" class="btn btn-default background-color-3">enter</button>
					</form>
  			</div>
  		  <!-- wellgo-login-box ends here -->

  		  <!-- wellgo-video-box starts here -->
  			<div class="col-sm-12 text-center">
	  			<div class="wellgo-video-box wellgo-box-bg space-md background-color-2">
	  				<h3 class="bold-text color-3">New to Favor Fields?
	            <br> Watch a <span class="tm">Wellgorithm</span> in action.
	          </h3>

	          <div class="demo-video-container">
              <img src="http://favorfields.com//wp-content/themes/favorfields/assets/images/lotus.jpg" class="img-responsive" alt="Video">
              <a class="play-video background-color-4" href="javascript:void(0)"> <i class="fa fa-play" aria-hidden="true"></i> Watch</a>
          	</div>
	  			</div>
  			</div>
  		  <!-- wellgo-video-box ends here -->

  		  <!-- wellgo-Signup-box starts here -->
  			<div class="col-sm-12 text-center">
	  			<div class="wellgo-singup-box wellgo-box-bg space-md background-color-2">
	  				<h3 class="bold-text color-3">Not yet a member?
	            <br> Join the <strong class="cm">Thought Grenade</strong>
	            <br> Pledge Group
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
	  			</div>
  			</div>
  		  <!-- wellgo-Signup-box ends here -->


  		  <!-- Wellgo Footer starts here -->
  			<footer class="col-sm-12">
	  			<div class="wellgo-footer space-md background-color-3">
	  			  <div class="row">

	  			  	<div class="col-md-7">
               	<div class="noble-truths background-color-2"> 
		  			  		<h4 class="color-3">Our Four Noble Truths</h4>
			  			  	<ul class="color-3">
			  			  		<li><i class="fa fa-heart" aria-hidden="true"></i> It’s a blessing you were born. </li>
			  			  		<li><i class="fa fa-heart" aria-hidden="true"></i> It matters what you do. </li>
			  			  		<li><i class="fa fa-heart" aria-hidden="true"></i> Your experience of the divine is true. </li>
			  			  		<li><i class="fa fa-heart" aria-hidden="true"></i> You don’t have to go it alone. </li>
			  			  	</ul>
		  			  	</div>
	  			  	</div>

	  			  	<div class="col-md-5 text-center">
	  			  		<h4>Say hello anytime.</h4>
                <form class="contact-form row">
								  <div class="form-group col-sm-12">
								    <textarea class="form-control" rows="3"></textarea>
								  </div> 
								  <div class="form-group col-sm-6">
								    <input type="name" class="form-control" placeholder="name">
								  </div>
								  <div class="form-group col-sm-6">
								    <input type="email" class="form-control" placeholder="email">
								  </div>
								  <div class="form-group col-sm-12">
								  	<button type="submit" class="btn btn-default">send</button>
								  </div>
								</form>
	  			  	</div>

	  			  	<div class="col-sm-12"> 
								<figure class="ff-largo-logo">
									<img src="http://favorfields.com/wp-content/themes/favorfields/assets/images/ff-large-logo.png" class="img-responsive" alt="">
								</figure>
								<hr class="seperator">
	  			  	</div>
	  			  	
	  			  	<div class="col-md-12 text-center trademarks_copyrights">
		  			  	<p><span class="cm">FavorFields</span>, Do yourself a favor <span class="tm">today</span>, <span class="tm">Wellgorithm</span>, and Thought <span class="cm">Grenade</span> are trademarks of Lightworkers of the Sphere, LLC</p>
		  			  	<div class="clearfix pad-bottom50"></div>
		  			  	<p>The information on this website is solely for informational and educational purposes. It does not replace the advice of your physician or other health care provider. We are not responsible for any possible consequences from interacting with the content on this site.</p>	
		  			  	<p>&copy; 2017 FavorFields. All rights reserved.<br>
		  			  	We respect your privacy. <a href="#"> Read more.</a> </p>
	  			  	</div>

	  			  </div>
	  			</div>
  			</footer>
  		  <!-- Wellgo Footer Ends here -->



  		</div> 
  		<!-- row ends -->
  	</div> 
  	<!-- container ends -->
  </div> 
  <!-- main-wellgorithms ends -->
</div>
<!-- #main ends -->

<style type="text/css" media="screen">
	
	.ff-largo-logo {
		text-align: center;
		margin-top: -75px;
    padding-left: 40px;
    padding-bottom: 20px;
	}
	.ff-largo-logo img {
		max-width: 700px;
		display: inline-block;
		opacity: 0.35;
		position: relative;
    z-index: 1;
	}

	hr.seperator {
		border-top: 1px double #fff;
    text-align: center;
    position: absolute;
    width: calc(100% - -40px);
    left: -20px;
    top: 30px;
    padding: 50px 0;
	}
	hr.seperator:after {
		content: '';
		display: inline-block;
		position: relative;
		top: -80px;
		padding: 15px 75px;
		background: #3589ad;
		left: 20px;
	}

  .space-md {
  	padding-top: 40px;
  	padding-bottom: 40px;
  }
  .main-wellgorithms h3.bold-text {
		margin: 0 0 40px 0;
		font-family: 'Raleway', sans-serif;
    font-size: 34px;
    font-weight: 600;
    line-height: 44px;
    letter-spacing: 0;
    text-transform: initial;
    color: #3b8db8;
	}
	.main-wellgorithms h3.bold-text strong {
		font-weight: 900;
	}
  .main-wellgorithms h3.bold-text .tm::after,
  .main-wellgorithms h3.bold-text .cm::after {
	  content: "TM";
    font-size: 7.5px;
    font-family: 'Raleway', sans-serif;
    font-weight: 400;
    vertical-align: super;
    position: relative;
	}
	.main-wellgorithms h3.bold-text .cm::after {
		content: "CM";
	}
  .wellgo-box-bg {
  	background-color: #f1f6fc;
  	margin-bottom: 40px;
  }
  /* Wellgo login Box */
	.wellgo-login-box	{
		text-align: center 
	}
	.wellgo-login-box	.form-inline {
		margin: 0; 
		padding: 0px 0 40px
	}
	.wellgo-login-box	.form-inline .form-group {
		margin-right: 18px;
	}
	.wellgo-login-box	.form-inline .form-group .form-control,
	.wellgo-login-box	.form-inline .form-group .form-control:hover,
	.wellgo-login-box	.form-inline .form-group .form-control:focus,	
	.wellgo-singup-box .signup-form .form-group .form-control,
	.wellgo-singup-box .signup-form .form-group .form-control:hover,
	.wellgo-singup-box .signup-form .form-group .form-control:focus {
		font-family: 'Open Sans', sans-serif;
		font-size: 18px;
		font-weight: 700;
		background: #3589ad;
    color: #fff;
    padding-left: 20px;
    padding-right: 20px;
    border: 0;
    box-shadow: none;
    width: 250px;
    height: 42px;
    border-radius: 0px;
  }
  .wellgo-login-box	.form-inline .form-group .form-control::-moz-placeholder {
	  color: #fff;
	  opacity: 0.5;
	}
	.wellgo-login-box	.form-inline .form-group .form-control:-ms-input-placeholder {
	  color: #fff;
	  opacity: 0.5;
	}
	.wellgo-login-box	.form-inline .form-group .form-control::-webkit-input-placeholder {
	  color: #fff;
	  opacity: 0.5;
	}
	.wellgo-login-box	.form-inline .btn-default,
	.wellgo-singup-box .signup-form .btn-default {
		font-family: 'Open Sans', sans-serif;
    font-size: 18px;
    font-weight: 700;
		margin-left: 0px;
		outline: 0;
		box-shadow: none;
		height: 42px;
		border-radius: 0;
		border: 0;
		background: #3589ad;
		color: rgba(255, 255, 255, 0.5) !important;
		letter-spacing: 0;
		padding: 0 20px;
	}

	/* Wellgo Signup Box */
	.wellgo-singup-box	{ 
		text-align: center 
	}
	.wellgo-singup-box .signup-form {
    margin: 0;
    padding: 0 0 40px;
    max-width: 300px;
    display: inline-block;
	}
	.wellgo-singup-box	.signup-form .form-group .form-control,
	.wellgo-singup-box	.signup-form .form-group .form-control:hover,
	.wellgo-singup-box	.signup-form .form-group .form-control:focus {
		background: rgba(122, 192, 228, 0.35);
    color: #3589ad;
    width: 100%;
  }
  .wellgo-singup-box .signup-form .form-group .form-control::-moz-placeholder {
	  color: #3589ad;
	  opacity: 1;
	}
	.wellgo-singup-box	.signup-form .form-group .form-control:-ms-input-placeholder {
	  color: #3589ad;
	}
	.wellgo-singup-box	.signup-form .form-group .form-control::-webkit-input-placeholder {
	  color: #3589ad;
	}
	.wellgo-singup-box	.signup-form .btn-default {
		background: #3589ad;
		color: rgba(255, 255, 255, 0.75) !important;
	}

  /* Wellgo Video Box */
	.wellgo-video-box .demo-video-container {
    display: inline-block;
    margin-bottom: 40px;
	}
  .wellgo-video-box .demo-video-container img {
  	max-width: 600px;
    display: inline-block;
  }
  .wellgo-video-box .demo-video-container a.play-video,
  .wellgo-video-box .demo-video-container a.play-video:hover,
  .wellgo-video-box .demo-video-container a.play-video:focus {
  	left: 50%;
    transform: translate(-50%, -50%);
  }

	/* Wellgo Footer */
	.wellgo-footer {
		background-color: #3589ad;
		padding-left: 35px;
    padding-right: 35px;
    margin-top: 50px;
    margin-bottom: 50px;
	}
	.wellgo-footer h4 {
		font-family: 'Raleway', sans-serif;
    font-size: 24px;
    font-weight: 700;
    line-height: 30px;
    letter-spacing: 0;
    text-transform: initial;
    margin: 0 0 20px;
    color: white;
	}

	.wellgo-footer .noble-truths {
		display: inline-block;
    background: #f1f6fc;
    margin-top: -75px;
    height: 260px;
    padding: 25px 40px;
    width: 100%;
    max-width: 450px;
    border: 1px solid #3589ad;
	}
	.wellgo-footer .noble-truths h4 {
		color: #3589ad;
		font-size: 21px;
		padding-top: 15px;
	}

	.wellgo-footer .noble-truths ul {
		color: #3589ad;
		list-style: none;
		padding-left: 0;
	}
	.wellgo-footer .noble-truths ul li {
    font-family: 'Raleway', sans-serif;
    font-size: 18px;
    font-weight: 600;
    line-height: 30px;
    padding-left: 0;
	}
	.wellgo-footer .noble-truths ul li i.fa.fa-heart {
    font-size: 14px;
    padding-right: 10px;
	}

	.wellgo-footer .contact-form {
		max-width: 400px;
		position: relative;
    z-index: 1;
	}

	.wellgo-footer .contact-form .col-sm-12 {
		padding-left: 15px !important;
		padding-right: 15px !important;
	}
	.wellgo-footer .contact-form .textarea-wrapper textarea.form-control {
    height: 80px !important;
    background-color: white;
	}
	.wellgo-footer .contact-form .form-control{
		font-family: 'Raleway', sans-serif;
    font-size: 18px;
    font-weight: 700;
    background: #fff;
    color: #3589ad;
    padding-left: 20px;
    padding-right: 20px;
    border: 0;
    box-shadow: none;
    height: 35px;
    border-radius: 0px;
	}
	.wellgo-footer .contact-form input.form-control {
		opacity: 0.65;
	}
	.wellgo-footer .contact-form button.btn.btn-default {
    background: transparent;
    box-shadow: none;
    border: 2px solid white;
    height: auto;
    color: white !important;
    letter-spacing: 0;
    padding: 2px 15px;
    top: 30px;
    border-radius: 12px;
    width: 70px;
    margin-top: 15px;
    float: right;
	}
	.wellgo-footer .contact-form button.btn.btn-default:hover,
	.wellgo-footer .contact-form button.btn.btn-default:focus {
		outline: 0;
	}
	.wellgo-footer .trademarks_copyrights p,
	.wellgo-footer .trademarks_copyrights p a {
		color: white;
		opacity: 0.9;
		font-size: 14px;
    font-family: 'Raleway', sans-serif;
    letter-spacing: 0.25px;
	}
	.wellgo-footer .trademarks_copyrights p span.cm::after,
	.wellgo-footer .trademarks_copyrights p span.tm::after {
	  content: "CM";
    font-size: 6px;
    font-family: 'Raleway', sans-serif;
    font-weight: 400;
    vertical-align: super;
    position: relative;
    opacity: 0.5;
	}
	.wellgo-footer .trademarks_copyrights p span.tm::after {
		content: "TM";
	}
</style>


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