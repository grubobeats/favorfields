<?php
/**
 * Created by PhpStorm.
 * User: vladan
 * Date: 26/04/2017
 * Time: 09:45
 */
?>
<!--===========================  Thank You & Confirmation Message ===========================-->

<div class="tooltip1">Hover over me
	<div class="tooltiptext background-color-4 favormenu favor-card-png">
		<div class="tooltipcontent">
			<div class="col-sm-4">
				<h3 class="color-3">FAVOR SARA</h3>
				<figure class="text-center">
					<img src="http://favorfields.com/wp-content/uploads/2017/02/mm9.png" alt="sumit" class="user-avatar border-color-4">
				</figure>
				<h4 class="color-3">
					<span class="favor-menu-option" data-option="<?= $hellgo_prefix . 'social_first_inner' ?>"><span><?= $favorfields[$hellgo_prefix . 'social_first']?></span></span>
					<span class="favor-menu-option" data-option="<?= $hellgo_prefix . 'social_second_inner' ?>"><span><?= $favorfields[$hellgo_prefix . 'social_second']?></span></span>
					<span class="favor-menu-option" data-option="<?= $hellgo_prefix . 'social_third_inner' ?>"><span><?= $favorfields[$hellgo_prefix . 'social_third']?></span></span>
				</h4>
			</div>
			<div class="col-sm-8 favor-menu-option__wrapper">
				<?
				$list_1 = explode(PHP_EOL, $favorfields[$hellgo_prefix . 'social_first_inner'] );
				shuffle($list_1);
				for ($list=0; $list < 3; $list++ ) {
					$list_text = $list_1[$list];
					$class = "favor-menu-option__inner";
					if( $list == 2 ) { $class = "favor-menu-option__inner last"; }
					$first_text = $favorfields[$hellgo_prefix . 'social_first'];

					echo "<p class='$class'><span data-first-text='$first_text'>  $list_text</span> </p>";
				}
				?>
				<form>
					<div class="textarea-wrapper"><textarea name="" class="form-control" rows="1" style="overflow: hidden; resize: none; height: 68px;"> </textarea></div>
				</form>
				<div> <i class="fa fa-heart color-4"></i> </div>
			</div>
		</div>
	</div>
</div>
