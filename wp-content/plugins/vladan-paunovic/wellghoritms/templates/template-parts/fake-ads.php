<?php
/**
 * Created by PhpStorm.
 * User: vladan
 * Date: 29/04/2017
 * Time: 09:12
 */
//global $favorfields;

$fako = $logic->FakoAd($category->cat_ID);
$fako_image = $favorfields[  $category[0]->slug . '_fako_img']['url'];
?>

<div class="fakeads hidden">
	<div class="clearfix"></div>
	<!-- clearfix ends -->

	<div class="warning-bar green-bar background-color-4">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1 class="warning-bar-text">WARNING: <span class="cm">REAL FAKE AD</span> AHEAD!</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- Warning Bar Ends -->

	<div class="clearfix"></div>
	<!-- clearfix ends -->

	<div class="ad-name-wrapper yellow-bar">
		<div class="container">
			<div class="row">
				<div class="col-sm-7 ad-name">
					<h2 class="ad-title"><span class="cm"><?= $fako->title ?></span> </h2>
					<h4 class="ad-sub-title"><?= $fako->subtitle ?></h4>
				</div>
				<div class="col-sm-5">
					<div class="right-arrow"> </div>
					<figure class="advert-img">
						<img src="<?= $fako_image; ?>" alt="iconic" class="img-responsive">
					</figure>
				</div>
			</div>
		</div> <!-- Container Ends -->
	</div>
	<!-- ad-name-wrapper ends -->

	<div class="clearfix"></div>
	<!-- clearfix ends -->

	<div class="guarantee-section">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="headline"><?= $fako->headline ?></h3>
				</div>

				<div class="col-sm-6">
					<p class="summary"><?= $fako->body?></p>
				</div>

				<div class="col-sm-6">
					<div class="guarantee">
						<span class="guarantee-title">FUNNY BACK GUARANTEE!</span>
						<span class="guarantee-sub-title">100% RISKY<br> Funny Back Guarantee!</span>
						<p class="sm-text">If for ANY reason during the first 30 days, you are not satisfied with your purchase (don’t worry, you won’t be), you can request a full refund, and we GUARANTEE that we’ll laugh! In fact, we’re laughing already! </p>
					</div>
				</div>
			</div>
		</div> <!-- Container Ends -->
	</div>
	<!-- Guarantee-section Ends -->

	<div class="clearfix"></div>
	<!-- clearfix ends -->

	<div class="quote-wrapper yellow-bar">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<figure class="legend-img">
						<img src="<?= $fako->quote_image ?>" alt="img" class="img-responsive">
					</figure>
				</div>
				<div class="col-sm-9">
					<p class="legend-quote">“<?= $fako->quote_name ?>”<br>
						<span class="legend-name">­— <?= $fako->quote_author ?></span>
					</p>
				</div>
			</div>
		</div> <!-- Container Ends -->
	</div>
	<!-- quote-wrapper ends -->

	<div class="clearfix"></div>
	<!-- clearfix ends -->

	<div class="join-club-section">
		<div class="container">
			<div class="row">

				<div class="col-sm-12 available-now">
					<p class=""><strong class="red">Available NOW</strong> at Smallgreens, Worst Buy, Shmuckmart, Fartbucks, Costwoe, Smite Aid, Rotten Foods, The Sap, Hoardstrom, Death, Dread and Beyond, and other fine retailers. </p>
				</div>

				<div class="col-sm-6">
					<figure class="three-arrows">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/fake-ads/three-arrows.jpg" alt="three-arrows" class="img-responsive">
					</figure>
					<p class="join-club-now"> Join the <strong class="red cm fako-title"><?= $fako->title ?></strong> <br> club NOW!</p>
				</div>

				<div class="col-sm-6">
					<div class="join-club-form-wrapper">
						<p class="sm-heading"> Haha. Very funny.</p>
						<p class="sm-text"> Ok, so it’s not a real app, but it IS a real joke club, and I’d love to be a part of it!</p>
						<p class="bold-content"> I’d also be thrilled if I can be one of the first people in the world to give Favor Fields a test drive. Please put me on the waiting list for the next beta group.</p>
						<div class="join-club-form">
                            <?= do_shortcode('[mc4wp_form id="7150"]'); ?>
						</div>
						<p class="privacy-value"> <span class="lock-icon"></span> We value your privacy and  would never spam you </p>
					</div>
					<a href="/" class="recommend-wellgo red">RECOMMEND ANOTHER WELLGORITHM PLS <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/fake-ads/red-arrow.jpg" alt="red-arrow" class="img-responsive"> </a>
				</div>

				<div class="col-sm-8 act-now">
					<h3 class="act-title red"> HURRY!!! ACT NOW!!!</h3>
				</div>

				<div class="col-sm-4 timer">
					<? require_once 'countdown.php'; ?>
				</div>

				<div class="col-sm-12">
					<p class="more-text">(btw, we use a count down timer to create fake anxiety. There’s no deadline. Nothing happens if you act now or later. Who cares? But the marketing professor (whose identity shall remain anonymous, for now) said we would get better results with a countdown timer.)</p>

					<figure class="awards-img">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/fake-ads/awards.png" alt="awards" class="img-responsive">
					</figure>
				</div>

                <? if ( $fako->pro ) : ?>
				<div class="col-sm-12">
					<h3 class="all-new-title"><?= $fako->pro_headline?></h3>
					<p class="more-text"> <?= $fako->pro_body?></p>
				</div>
                <? endif; ?>
			</div>
		</div> <!-- Container Ends -->
	</div>
	<!-- join-club-section ends -->

	<div class="clearfix"></div>
	<!-- clearfix ends -->

	<div class="benefits-title">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h2> Check out these GREAT benefits!!! </h2>
				</div>
			</div>
		</div> <!-- Container Ends -->
	</div>
	<!-- benefits-title ends -->

	<div class="clearfix"></div>
	<!-- clearfix ends -->

	<div class="benefits-section">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<ul class="benefits-list">
						<li> Benefit #1</li>
						<li> Benefit #2</li>
						<li> Benefit #3</li>
					</ul>
					<p> Look, we’re not saying that this product will benefit you. We’re just saying that we took a marketing class and the professor said that we have to have at least 3 benefit bullets. So we included 3 benefit bullets. Why? We have no idea. But apparently, it works. </p>
				</div>
			</div>
		</div> <!-- Container Ends -->
	</div> <!-- benefits-section Ends -->

	<div class="clearfix"></div>
	<!-- clearfix ends -->

	<div class="quote-wrapper yellow-bar">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<figure class="legend-img">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/fake-ads/fako59.png" alt="Fako" class="img-responsive">
					</figure>
				</div>
				<div class="col-sm-9">
					<p class="legend-quote"> “Of all the apps i’ve ever recommended, <br> this one is my favorite.”
						<span class="legend-name">— Fako</span>
					</p>
				</div>
			</div>
		</div> <!-- Container Ends -->
	</div>
	<!-- quote-wrapper ends -->

	<div class="join-club-section">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 text-center">
					<div class="text-center">
						<div class="fact-free">
							<span class=""> Special Bonus!</span>
						</div>
					</div>
					<figure class="three-arrows">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/fake-ads/arrow-red-2.jpg" alt="arrows" class="img-responsive">
					</figure>
					<p class="join-club-now text-left"> Membership includes access to the online <strong class="red cm">Fako</strong> library and the <strong class="red cm">Real Fake Ad</strong> club!!!</p>
				</div>

				<div class="col-sm-6">
					<div class="join-club-form-wrapper">
						<p class="sm-heading"> Haha. Very funny.</p>
						<p class="sm-text"> Ok, so it’s not a real app, but it IS a real joke club, and I’d love to be a part of it!</p>
						<p class="bold-content"> I’d also be thrilled if I can be one of the first people in the world to give Favor Fields a test drive. Please put me on the waiting list for the next beta group.</p>
						<div class="join-club-form">
							<?= do_shortcode('[mc4wp_form id="7150"]'); ?>
						</div>
						<p class="privacy-value"> <span class="lock-icon"></span> We value your privacy and  would never spam you </p>
					</div>
				</div>

				<div class="col-sm-12">
					<p class="side-effects">SIDE EFFECTS INCLUDE wondering why the whole world is crazy, and you’re the only sane one left; an awakening from the madness of consumerism; and other meshugenah maladies. </p>

					<div class="text-center">
						<div class="fact-free">
							<span class="cm"> 100% Fact Free!</span>
						</div>
					</div>

					<p class="disclaimer"><strong>DISCLAIMER.</strong> WE DISCLAIM EVERYTHING, EVEN THE WHITE SPACES BETWEEN THE WORDS. This ad is fake. Ok? So don’t blame us if you actually try to download this fake product! But the sign up for the Favor Fields beta test group is real. So there. Haha.</p>

					<div class="text-center">
						<p class="piracy-protection-box">
							<span>We would protect your piracy, but sorry,<br> our smell checker is broke. </span>
						</p>
					</div>
				</div>
			</div>
		</div> <!-- Container Ends -->
	</div>
	<!-- join-club-section ends -->

	<div class="clearfix"></div>
	<!-- clearfix ends -->

	<div class="go-back green-bar">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1 class="warning-bar-text">TAKE ME BACK TO THE WELLGORITHMS!</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- Go-back Bar Ends -->

	<div class="clearfix"></div>
	<!-- clearfix ends -->

	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<a href="http://favorfields.com" title="Home" class="go-back-btn">Go Back</a>
			</div>
		</div>
	</div>

</div>
