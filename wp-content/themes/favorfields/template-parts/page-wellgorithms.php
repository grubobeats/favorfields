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