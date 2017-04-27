<?php
/**
 * Created by PhpStorm.
 * User: vladan
 * Date: 26/04/2017
 * Time: 09:52
 */
?>
<style>.color-1 { color: <?= $color_1 ?> !important; } .color-2 { color: <?= $color_2 ?> !important; } .color-3 { color: <?= $color_3 ?> !important; } .color-4 { color: <?= $color_4 ?> !important; } .background-color-1 { background-color: <?= $color_1 ?> !important; } .background-color-2 { background-color: <?= $color_2 ?> !important; } .background-color-3 { background-color: <?= $color_3 ?> !important; } .background-color-4 { background-color: <?= $color_4 ?> !important; } .border-color-1 { border-color: <?= $color_1 ?> !important; } .border-color-2 { border-color: <?= $color_2 ?> !important; } .border-color-3 { border-color: <?= $color_3 ?> !important; } .border-color-4 { border-color: <?= $color_4 ?> !important; } .box-shadow-color-1 { box-shadow: 0 0 0 1px <?= $color_1 ?> !important; } .border-left-color-1 {border-left-color: <?= $color_1?> !important;} .border-left-color-2 {border-left-color: <?= $color_2 ?> !important;} .border-left-color-3 {border-left-color: <?= $color_3?> !important;} .border-left-color-4 {border-left-color: <?= $color_4?> !important;}

	.wellgo-btn-container button:hover .btn1, .wellgo-btn-container button:hover .btn2, .wellgo-btn-container button:hover .btn3 { background-color: <?= $color_5 ?> !important; }

	.wellgo-questionnaire-container .wellgo-questionnaire .wellgo-quiz-box .wellgo-user .wellgo-favor-btn:hover, .wellgo-questionnaire-container .wellgo-questionnaire .wellgo-quiz-box .wellgo-user .wellgo-favor-btn:focus { background-color: <?= $color_5 ?> !important; }

	.background-color-5 { background-color: <?= $color_5 ?> }
	.background-color-6 { background-color: <?= $color_6 ?> }

	.border-before-color-1::before {
		border-color: <?= $color_1 ?> !important;
	}
	.border-before-color-2::before {
		border-color: <?= $color_2 ?> !important;
	}
	.border-before-color-3::before {
		border-color: <?= $color_3 ?> !important;
	}
	.border-before-color-4::before {
		border-color: <?= $color_4 ?> !important;
	}

	.background-color-before-color-1::before {
		background-color: <?= $color_1 ?> !important;
	}
	.background-color-before-color-2::before {
		background-color: <?= $color_2 ?> !important;
	}
	.background-color-before-color-3::before {
		background-color: <?= $color_3 ?> !important;
	}
	.background-color-before-color-4::before {
		background-color: <?= $color_4 ?> !important;
	}

	.background-color-after-color-1::after {
		background-color: <?= $color_1 ?> !important;
	}
	.background-color-after-color-2::after {
		background-color: <?= $color_2 ?> !important;
	}
	.background-color-after-color-3::after {
		background-color: <?= $color_3 ?> !important;
	}
	.background-color-after-color-4::after {
		background-color: <?= $color_4 ?> !important;
	}

	.cs-background-image {
		background-image: url("<?= $favor_png ?>") !important;
	}

	.cs-image-overlayed {
		background-image: url("<?= $banner_image_src; ?>");
	}

	.cs-main-background-image {
		background-image: url("<?= $main_png ?>") !important;
	}

	.hexagon label {background-color: <?= $color_4 ?> !important;}
	.hexagon label::before {border-bottom-color: <?= $color_4 ?> !important;}
	.hexagon label::after {border-top-color: <?= $color_4 ?> !important;}

	.hexagon .hexagon-focus {background-color: <?= $color_1 ?> !important;}
	.hexagon .hexagon-focus::before {border-bottom-color: <?= $color_1 ?> !important;}
	.hexagon .hexagon-focus::after {border-top-color: <?= $color_1 ?> !important;}

	.favor-card-png { background-image: url('<?= $favor_card_png ?>') !important; }
</style>
