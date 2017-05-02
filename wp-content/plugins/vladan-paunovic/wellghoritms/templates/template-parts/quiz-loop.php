<?php
/**
 * Created by PhpStorm.
 * User: vladan
 * Date: 26/04/2017
 * Time: 10:00
 */
?>
<div class="wellgo-questionnaire-container background-color-2<? if ($i > 0 ) : ?> hidden<? endif;?>">

	<? if ($i != 0) : ?>
		<div class="wellgorithms-main-banner">
			<div class="wellgo-transparent-overlay background-color-1"></div>
			<h3 class="wellgo-main-title"> <span><?= get_the_title(); ?></span></h3>
		</div> <!-- Banner with Wellgo Quiz -->
	<? endif; ?>

	<div class="wellgo-questionnaire">
		<div class="wellgo-type"> <span><?= $category[0]->name ?></span> </div>
		<!-- Wellgo-Type ends -->

		<div class="wellgo-btn-container">
			<button type="button" class="border-color-4">
				<span class="btn1 sparkley background-color-5" style="border:2px solid white !important;">Inspiration</span>
			</button>
			<button type="button" class="border-color-4">
				<span class="btn2 sparkley background-color-5" style="border:2px solid white !important;">Aha Moment </span>
			</button>
			<button type="button" class="border-color-4">
				<span class="btn3 sparkley background-color-5" style="border:2px solid white !important;">Breakthrough </span>
			</button>
		</div>
		<!-- Wellgo-btn-container ends -->

		<h2 class="wellgo-main-title color-3">
			<?
			if ( $welgorithm[$def_questions][$i] != "" ) {
				echo $welgorithm[$def_questions][$i];
			} else {
				echo $welgorithm['admin_questions'][$i];
			}
			?>


		</h2>

		<div class="wellgo-quiz-box border-color-4">
			<div class="col-sm-5 wellgo-quiz-option first">
				<p contenteditable="true"><?= $welgorithm[$def_first_answers][$i]; ?></p>
				<div class="media wellgo-user"></div>
				<!-- wellgo-user ends -->
			</div>
			<!-- col-sm-5 wellgo-quiz-option ends -->
			<div class="col-sm-2 wellgo-main-img text-center">
				<ul class="background-color-4 cs-main-background-image" data-step="<?= $i ?>">
					<li class="mode_bar top-part mode-solo"></li>
					<li class="mode_bar middle-part mode-default active"></li>
					<li class="mode_bar bottom-part mode-social"></li>
				</ul>
			</div> <!-- col-sm-2 wellgo-main-img ends -->

			<div class="col-sm-5 wellgo-quiz-option second">
				<p contenteditable="true"><?= $welgorithm[$def_second_answers][$i]; ?></p>
				<div class="media wellgo-user"></div>
				<!-- wellgo-user ends -->
			</div>
			<!-- col-sm-5 wellgo-quiz-option ends -->

			<div class="<?= $buttons_style; ?>">
				<div class="radio">
					<input type="radio" name="answered_question_<?= $i; ?>" id="selected_answer_<?= $counter; ?>" value="<?= $welgorithm['first_answers'][$i]; ?>" data-recommend="Good">
					<label for="selected_answer_<?= $counter; ?>" class="radio-label <? if($buttons_style != "hexagon") :?>border-before-color-4<? endif; ?>"></label>
				</div> <!-- option 1 -->
				<div class="radio">
					<input type="radio" name="answered_question_<?= $i; ?>" id="selected_answer_<? print( $counter + 1 ); ?>" value="<?= $welgorithm['second_answers'][$i]; ?>" data-recommend="Bad">
					<label  for="selected_answer_<? print( $counter + 1 ); ?>" class="radio-label <? if($buttons_style != "hexagon") :?>border-before-color-4<? endif; ?>"></label>
				</div> <!-- option 2 -->
			</div>
			<!-- Radio Buttons -->

		</div>
		<!-- wellgo-quiz-box ends -->

		<!-- wellgo-btn-sm btns -->
		<button type="button" class="question__like wellgo-btn-sm top-next border-color-4" data-step="<?= $i ?>"></button>
		<div class="popup-suggest-question background-color-1 box-shadow-color-1">
			<div class="row first">
				<div class="suggest__icon"><i class="fa fa-heart"></i></div>
				<div class="suggest__text">Love this!</div>
			</div>
			<div class="row second">
				<button class="cross__icon"><i class="fa fa-close"></i></button>
				<div class="suggest__icon"><i class="fa fa-lightbulb-o"></i></div>
				<div class="suggest__text">
					<p>I have a suggestion for improvment:</p>
					<textarea class="question_sugestion" name="question_suggestion_<?= $i ?>" id="question_suggestion_<?= $i ?>" cols="30" rows="1"></textarea>
					<!-- <button class="btn btn-default suggest__button" data-step="<?= $i ?>">Send</button> -->
				</div>
			</div>
		</div>

		<!-- progressbar ends -->
		<ul class="progressbar">
			<? for( $step_li=0; $step_li < $number_of_questions; $step_li++ ) : ?>

				<?
				switch ($step_li) {

					case $i:
						$progress_bar_classname = "active background-color-before-color-3 background-color-after-color-3";
						break;

					case $step_li <= $i:
						$progress_bar_classname = "step-completed background-color-before-color-4 background-color-after-color-4";
						break;

					case 0:
						$progress_bar_classname = "step-completed background-color-before-color-4 background-color-after-color-4";
						break;

					default;
						$progress_bar_classname = "";
						break;
				}
				?>

				<li class="<?= $progress_bar_classname; ?>"></li>
			<? endfor; ?>
		</ul>
		<!-- progressbar ends -->

		<div class="clearfix"></div>

		<!-- wellgo-random-users list -->
		<ul class="wellgo-random-users list-inline"></ul>
		<!-- wellgo-random-users list ends here -->
	</div>
	<!-- wellgorightem-questionnaire ends -->
</div>

<? $counter = $counter + 2; ?>
<? $main_loop_counter++; ?>
