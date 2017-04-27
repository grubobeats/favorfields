<?php
/**
 * Created by PhpStorm.
 * User: vladan
 * Date: 26/04/2017
 * Time: 09:58
 */
?>
<div class="wellgorithms-main-banner cs-image-overlayed">
	<div class="wellgo-transparent-overlay background-color-1" <? if($color_masking_off) : ?> style="background-color: rgba(68, 45, 45, 0) !important;" <? endif; ?>></div> <!-- wellgo-transparent-overlay -->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">

				<div class="wellgorightem-content">
					<figure class="wellgo-mood-img">
						<img src="<?= $welgorithm['admin_icon'] ?>" alt="" class="img-responsive">
					</figure>
					<h1 class="wellgo-main-title">
						<small><?= $subhead ?></small>
						<span><?= get_the_title(); ?></span>
					</h1>
				</div> <!-- wellgorightem-content ends -->

				<div class="right-faded-logo">
					<img src="<?= $right_faded_logo_url ?>" alt="FFLOGO" class="img-responsive">
				</div>  <!-- right-faded-logo ends -->
			</div> <!-- col-sm-12 ends -->
		</div> <!-- row ends -->
	</div> <!-- container ends-->
</div>
