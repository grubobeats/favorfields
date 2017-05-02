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
 * Template name: Algolia search
 */
get_header();

global $favorfields;
$algolia_avatars_array = explode(',',$favorfields['homepage_search_agolia_avatars']);

function getColorTemplate($color_scheme, $key) {
	global $wpdb;

	$get_color_template = $wpdb->get_results(
		"
          SELECT meta_value FROM $wpdb->postmeta WHERE post_id = 
        (SELECT ID
        FROM $wpdb->posts
        WHERE post_type = 'color_template'
          AND ID = '$color_scheme' LIMIT 1) AND meta_key = '$key' LIMIT 1
        "
	);

	return $get_color_template[0]->meta_value;
}

function getRandomImage($color_scheme, $random = false) {
	global $wpdb;

	$query = "
          SELECT * FROM $wpdb->postmeta WHERE post_id = 
        (SELECT ID
        FROM $wpdb->posts
        WHERE post_type = 'color_template'
          AND ID = '$color_scheme') AND meta_key LIKE '%multiple_images_image%' AND meta_value != ''
        ";

	$get_images = $wpdb->get_results( $query );

	$images = array();
	foreach ($get_images as $image) {
		$images[] = $image->meta_value;
	}

	if ($random == true) {
		return $images[array_rand($images)];
	} else {
		return $images[0];
	}
}


$color_1 = getColorTemplate($favorfields['color-select'], 'basic_settings_color-1');
$color_2 = getColorTemplate($favorfields['color-select'], 'basic_settings_color-2');
$color_3 = getColorTemplate($favorfields['color-select'], 'basic_settings_color-3');
$color_4 = getColorTemplate($favorfields['color-select'], 'basic_settings_color-4');
$color_5 = getColorTemplate($favorfields['color-select'], 'basic_settings_color-5');
$color_6 = getColorTemplate($favorfields['color-select'], 'basic_settings_color-6');
$banner_image_src  = getRandomImage($favorfields['color-select'], true);
$favor_png = getColorTemplate($favorfields['color-select'], 'basic_settings_favor_png');
$favor_card_png = getColorTemplate($favorfields['color-select'], 'basic_settings_favor_card_png');
$color_masking_off = (boolean) getColorTemplate($favorfields['color-select'], 'basic_settings_off_color_masking');
?>

<style>
    .color-1 { color: <?= $color_1 ?> !important; } .color-2 { color: <?= $color_2 ?> !important; } .color-3 { color: <?= $color_3 ?> !important; } .color-4 { color: <?= $color_4 ?> !important; } .background-color-1 { background-color: <?= $color_1 ?> !important; } .background-color-2 { background-color: <?= $color_2 ?> !important; } .background-color-3 { background-color: <?= $color_3 ?> !important; } .background-color-4 { background-color: <?= $color_4 ?> !important; } .border-color-1 { border-color: <?= $color_1 ?> !important; } .border-color-2 { border-color: <?= $color_2 ?> !important; } .border-color-3 { border-color: <?= $color_3 ?> !important; } .border-color-4 { border-color: <?= $color_4 ?> !important; } .box-shadow-color-1 { box-shadow: 0 0 0 1px <?= $color_1 ?> !important; } .border-left-color-1 {border-left-color: <?= $color_1?> !important;} .border-left-color-2 {border-left-color: <?= $color_2 ?> !important;} .border-left-color-3 {border-left-color: <?= $color_3?> !important;} .border-left-color-4 {border-left-color: <?= $color_4?> !important;}.border-right-color-1 {border-right-color: <?= $color_1?> !important;} .border-right-color-2 {border-right-color: <?= $color_2 ?> !important;} .border-right-color-3 {border-right-color: <?= $color_3?> !important;} .border-right-color-4 {border-right-color: <?= $color_4?> !important;}

    .wellgo-btn-container button:hover .btn1, .wellgo-btn-container button:hover .btn2, .wellgo-btn-container button:hover .btn3 { background-color: <?= $color_5 ?> !important; }

    .wellgo-questionnaire-container .wellgo-questionnaire .wellgo-quiz-box .wellgo-user .wellgo-favor-btn:hover, .wellgo-questionnaire-container .wellgo-questionnaire .wellgo-quiz-box .wellgo-user .wellgo-favor-btn:focus { background-color: <?= $color_5 ?> !important; }

    .background-color-5 { background-color: <?= $color_5 ?> !important;}
    .background-color-6 { background-color: <?= $color_6 ?> !important;}

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

    .favor-card-png { background-image: url('<?= $favor_card_png ?>') !important; }

    .ais-search-box::after { background-color: <?= $color_3 ?> }
    .ais-hits { border-color: <?= $color_4 ?> }
    .ais-hits--item { border-color: <?= $color_4 ?> }
    .nicescroll-cursors { background-color: <?= $color_4 ?> !important;}
</style>



<script src="//cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.js"></script>
<link href="//cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.6.8-fix/jquery.nicescroll.min.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet" />
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/assets/css/3d-carousel/carousel.css">

<!-- Home-top-banner -->
    <style>
        #focus_overlay {
            position: absolute;
            top: 69px;
            left: 15px;
            background: #eff8fd;
            width: 210px;
            z-index: 1;
        }
    </style>


<div class="home-top-banner cs-image-overlayed">
    <div class="homepage-transparent-overlay background-color-3" <? if($color_masking_off) : ?> style="background-color: rgba(68, 45, 45, 0) !important;" <? endif; ?>></div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-banner-text">
                    <h1 class="banner-title"><?= $favorfields['homepage_h1'] ?></h1>
                    <div class="banner-desc"><?= $favorfields['homepage_subhead'] ?></div>
                    <a href="#" class="demo-btn" title="Demo"> Demo </a>
                </div>
                <div class="right-faded-logo">
                    <img src="http://favorfields.com/wp-content/themes/favorfields/assets/images/mian-logo.png" alt="FFLOGO" class="img-responsive">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main -->
<div id="main" class="background-color-6">
    <section class="algolia-search-container">
        <div class="container background-color-6">
            <div class="row">
                <div class="col-sm-12">

                    <script id="movie" type="text/x-handlebars-template">
                        <a class="movie" href="{{{ permalink }}}">
                            <img class="movie-image" src="{{ vp_icon }}" />
                            <div class="movie-meta">
                                <span class="movie-title {{{ taxonomies.category }}}">
                                    {{{ post_title }}}
                                </span>

                                <div class="movie-rating">
                                    {{#stars}}
                                    <span class="ais-star-rating--star{{^.}}__empty{{/.}}">
                      </span>
                                    {{/stars}}
                                </div>

                                <div class="movie-genres">
                                    {{#genre}}
                                    <div class="movie-genre">
                                        {{.}}
                                    </div>
                                    {{/genre}}
                                </div>
                            </div>
                        </a>
                    </script>

                    <div class="algolia-search border-left-color-3 border-right-color-3 background-color-2">
                        <div class="top background-color-4">
                            <div class="input-container">
                                <input type="text" id="search-box" class="clearable border-color-4"/>
                                <div id="stats"></div>   
                                <input type="text" id="search-box-replica" class="clearable border-color-4"/>
                            </div>
                        </div>

                        <div class="content">
                            <div class="facets">
                                <div class="facet">
                                    <div class="facet-title"></div>
                                    <div id="focus"></div>
                                    <div id="focus_overlay" class="background-color-2">
                                        <div data-reactroot="">
                                            <div class="ais-root ais-refinement-list">
                                                <div class="ais-body ais-refinement-list--body">
                                                    <div class="ais-refinement-list--list titles__list">
                                                        <? $default_words_string = explode(PHP_EOL, $favorfields['homepage_search_default_words'] ); ?>
                                                        <? foreach ( $default_words_string as $word ) :?>
                                                            <div class="ais-refinement-list--item">
                                                                <div><div class="focus__items custom_facet"><?= $word ?></div>
                                                                </div>
                                                            </div>
                                                        <? endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="canvas">
                                <!-- <h3 class="search__h3"> &nbsp; </h3> -->
                                <div id="hits" style="margin-top: 25px;"></div>
                                <div id="pagination"></div>
                            </div>

                            <div class="facets">
                                <div class="facet">
                                    <div class="facet-title"> &nbsp; </div>
                                    <div id="mood"></div>
                                </div>
                            </div>
                        </div>
                        <div class="footer pad-bottom50">
                            <div class="facet">
                                <div id="category"></div>
                            </div>
                            <div class="facet">
                                <div id="level"></div>
                            </div>
                            <div class="facet">
                                <div id="confidence"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       </div> 
    </section>

    <div class="inner">
        <section id="loving-kindness" class="container background-color-6">
            <div class="row tex-center">
                <div class="col-sm-12 text-center">
                    <div class="bordered-container bg-white pad-top0 border-left-color-3 border-right-color-3 background-color-2">
                        <div class="home-matrix-seperator background-color-4 clearfix">
                            <h2 class="title-span color-4 border-color-4"><?= $favorfields['homepage_sub_2'] ?></h2>
                        </div>
                        <h3 class="bold-text color-4"><?= $favorfields['homepage_sub_2_text_1'] ?><br/><?= $favorfields['homepage_sub_2_text_2'] ?></h3>
                        <div class="row">
                            <div class="col-sm-6 demo-video vid1">
                                <div class="demo-video-container">
                                    <img src="http://favorfields.com//wp-content/themes/favorfields/assets/images/lotus-video.jpg" class="img-responsive video-bordered border-color-4" alt="Video">
                                    <a class="play-video background-color-4" href="javascript:void(0)"> <i class="fa fa-play" aria-hidden="true"></i> Watch</a>
                                </div>
                                <h3 class="bold-text color-4"> <span><?= $favorfields['homepage_sub_2_content_title_1'] ?></span> <br/> <strong><?= $favorfields['homepage_sub_2_content_subhead_1']?></strong></h3>
                                <div class="text-left long-text"><?= $favorfields['homepage_sub_2_content_content_1'] ;?></div>
                                <a href="<?= $favorfields['homepage_sub_2_content_button_1_link']; ?>" class="more-btn background-color-4" title="More" target="_blank"> <?= $favorfields['homepage_sub_2_content_button_1']?> </a>
                            </div>
                            <div class="col-sm-6 demo-video vid2">
                                <div class="demo-video-container">
                                    <img src="http://favorfields.com//wp-content/themes/favorfields/assets/images/video2.jpg" class="img-responsive video-bordered border-color-4" alt="Video">
                                    <a class="play-video background-color-4 color-4" href="javascript:void(0)"> <i class="fa fa-play" aria-hidden="true"></i> Watch </a>
                                </div>
                                <h3 class="bold-text color-4"> <span><?= $favorfields['homepage_sub_2_content_title_2'] ?></span> <br/> <strong><?= $favorfields['homepage_sub_2_content_subhead_2']?></strong></h3>
                                <div class="text-left long-text"><?= $favorfields['homepage_sub_2_content_content_2'] ;?></div>
                                <a href="<?= $favorfields['homepage_sub_2_content_button_2_link']; ?>" class="more-btn background-color-4" title="More" target="_blank"> <?= $favorfields['homepage_sub_2_content_button_2']?> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> <!--loving-kindness section ends-->
        
         <!--====================== Favor Bots 3D Carousel Starts here ======================-->
        <section id="meet-favor-bots" class="container background-color-6">
            <div class="row">
                <div class="col-sm-12">
                    <div class="bordered-container pad-top0 pad-bottom100 border-left-color-3 border-right-color-3 background-color-2">
                        <div class="home-matrix-seperator background-color-4 clearfix">
                            <h2 class="title-span color-4 border-color-4"><?= $favorfields['homepage_sub_4_title'] ?></h2>
                        </div>
                        <h3 class="bold-text color-4 text-center"><?= $favorfields['homepage_sub_4_subhead'] ?></h3>
                        <ul id="botsCarousel">
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/botcons.png" alt="" />
                                <p class="title">Wellgo</p>
                                <div class="description"> 
                                    <span class="sub-heading">Mission</span>
                                    <p>“The levels my addiction took me to were in the darkest places, and it is in those times I remember thinking, “I’m either going to die, or change.” I found strength within myself to want to change. And I did. I found strength within myself to want to change. And I did.”</p>
                                </div>
                                <ul class="wellgolist">
                                    <h4>Specialities</h4>
                                    <li> <a href="" class="color-4">Stress Blesser </a> </li>
                                    <li> <a href="" class="color-4">Love Latte </a> </li>
                                    <li> <a href="" class="color-4">Motivation Mocha </a> </li>
                                </ul>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/botcons.png" alt="" />
                                <p class="title">Wellgo</p>
                                <div class="description"> 
                                    <span class="sub-heading">Mission</span>
                                    <p>“The levels my addiction took me to were in the darkest places, and it is in those times I remember thinking, “I’m either going to die, or change.” I found strength within myself to want to change. And I did. I found strength within myself to want to change. And I did.”</p>
                                </div>
                                <ul class="wellgolist">
                                    <h4>Specialities</h4>
                                    <li> <a href="" class="color-4">Stress Blesser </a> </li>
                                    <li> <a href="" class="color-4">Love Latte </a> </li>
                                    <li> <a href="" class="color-4">Motivation Mocha </a> </li>
                                </ul>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/botcons.png" alt="" />
                                <p class="title">Wellgo</p>
                                <div class="description"> 
                                    <span class="sub-heading">Mission</span>
                                    <p>“The levels my addiction took me to were in the darkest places, and it is in those times I remember thinking, “I’m either going to die, or change.” I found strength within myself to want to change. And I did. I found strength within myself to want to change. And I did.”</p>
                                </div>
                                <ul class="wellgolist">
                                    <h4>Specialities</h4>
                                    <li> <a href="" class="color-4">Stress Blesser </a> </li>
                                    <li> <a href="" class="color-4">Love Latte </a> </li>
                                    <li> <a href="" class="color-4">Motivation Mocha </a> </li>
                                </ul>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/botcons.png" alt="" />
                                <p class="title">Wellgo</p>
                                <div class="description"> 
                                    <span class="sub-heading">Mission</span>
                                    <p>“The levels my addiction took me to were in the darkest places, and it is in those times I remember thinking, “I’m either going to die, or change.” I found strength within myself to want to change. And I did. I found strength within myself to want to change. And I did.”</p>
                                </div>
                                <ul class="wellgolist">
                                    <h4>Specialities</h4>
                                    <li> <a href="" class="color-4">Stress Blesser </a> </li>
                                    <li> <a href="" class="color-4">Love Latte </a> </li>
                                    <li> <a href="" class="color-4">Motivation Mocha </a> </li>
                                </ul>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/botcons.png" alt="" />
                                <p class="title">Wellgo</p>
                                <div class="description">
                                    <span class="sub-heading">Mission</span>
                                    <p>“The levels my addiction took me to were in the darkest places, and it is in those times I remember thinking, “I’m either going to die, or change.” I found strength within myself to want to change. And I did. I found strength within myself to want to change. And I did.”</p>
                                </div>
                                <ul class="wellgolist">
                                    <h4>Specialities</h4>
                                    <li> <a href="" class="color-4">Stress Blesser </a> </li>
                                    <li> <a href="" class="color-4">Love Latte </a> </li>
                                    <li> <a href="" class="color-4">Motivation Mocha </a> </li>
                                </ul>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/botcons.png" alt="" />
                                <p class="title">Wellgo</p>
                                <div class="description"> 
                                    <span class="sub-heading">Mission</span>
                                    <p>“The levels my addiction took me to were in the darkest places, and it is in those times I remember thinking, “I’m either going to die, or change.” I found strength within myself to want to change. And I did. I found strength within myself to want to change. And I did.”</p>
                                </div>
                                <ul class="wellgolist">
                                    <h4>Specialities</h4>
                                    <li> <a href="" class="color-4">Stress Blesser </a> </li>
                                    <li> <a href="" class="color-4">Love Latte </a> </li>
                                    <li> <a href="" class="color-4">Motivation Mocha </a> </li>
                                </ul>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/botcons.png" alt="" />
                                <p class="title">Wellgo</p>
                                <div class="description"> 
                                    <span class="sub-heading">Mission</span>
                                    <p>“The levels my addiction took me to were in the darkest places, and it is in those times I remember thinking, “I’m either going to die, or change.” I found strength within myself to want to change. And I did. I found strength within myself to want to change. And I did.”</p>
                                </div>
                                <ul class="wellgolist">
                                    <h4>Specialities</h4>
                                    <li> <a href="" class="color-4">Stress Blesser </a> </li>
                                    <li> <a href="" class="color-4">Love Latte </a> </li>
                                    <li> <a href="" class="color-4">Motivation Mocha </a> </li>
                                </ul>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/botcons.png" alt="" />
                                <p class="title">Wellgo</p>
                                <div class="description"> 
                                    <span class="sub-heading">Mission</span>
                                    <p>“The levels my addiction took me to were in the darkest places, and it is in those times I remember thinking, “I’m either going to die, or change.” I found strength within myself to want to change. And I did. I found strength within myself to want to change. And I did.”</p>
                                </div>
                                <ul class="wellgolist">
                                    <h4>Specialities</h4>
                                    <li> <a href="" class="color-4">Stress Blesser </a> </li>
                                    <li> <a href="" class="color-4">Love Latte </a> </li>
                                    <li> <a href="" class="color-4">Motivation Mocha </a> </li>
                                </ul>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/botcons.png" alt="" />
                                <p class="title">Wellgo</p>
                                <div class="description"> 
                                    <span class="sub-heading">Mission</span>
                                    <p>“The levels my addiction took me to were in the darkest places, and it is in those times I remember thinking, “I’m either going to die, or change.” I found strength within myself to want to change. And I did. I found strength within myself to want to change. And I did.”</p>
                                </div>
                                <ul class="wellgolist">
                                    <h4>Specialities</h4>
                                    <li> <a href="" class="color-4">Stress Blesser </a> </li>
                                    <li> <a href="" class="color-4">Love Latte </a> </li>
                                    <li> <a href="" class="color-4">Motivation Mocha </a> </li>
                                </ul>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/botcons.png" alt="" />
                                <p class="title">Wellgo</p>
                                <div class="description"> 
                                    <span class="sub-heading">Mission</span>
                                    <p>“The levels my addiction took me to were in the darkest places, and it is in those times I remember thinking, “I’m either going to die, or change.” I found strength within myself to want to change. And I did. I found strength within myself to want to change. And I did.”</p>
                                </div>
                                <ul class="wellgolist">
                                    <h4>Specialities</h4>
                                    <li> <a href="" class="color-4">Stress Blesser </a> </li>
                                    <li> <a href="" class="color-4">Love Latte </a> </li>
                                    <li> <a href="" class="color-4">Motivation Mocha </a> </li>
                                </ul>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/botcons.png" alt="" />
                                <p class="title">Wellgo</p>
                                <div class="description"> 
                                    <span class="sub-heading">Mission</span>
                                    <p>“The levels my addiction took me to were in the darkest places, and it is in those times I remember thinking, “I’m either going to die, or change.” I found strength within myself to want to change. And I did. I found strength within myself to want to change. And I did.”</p>
                                </div>
                                <ul class="wellgolist">
                                    <h4>Specialities</h4>
                                    <li> <a href="" class="color-4">Stress Blesser </a> </li>
                                    <li> <a href="" class="color-4">Love Latte </a> </li>
                                    <li> <a href="" class="color-4">Motivation Mocha </a> </li>
                                </ul>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/botcons.png" alt="" />
                                <p class="title">Wellgo</p>
                                <div class="description"> 
                                    <span class="sub-heading">Mission</span>
                                    <p>“The levels my addiction took me to were in the darkest places, and it is in those times I remember thinking, “I’m either going to die, or change.” I found strength within myself to want to change. And I did. I found strength within myself to want to change. And I did.”</p>
                                </div>
                                <ul class="wellgolist">
                                    <h4>Specialities</h4>
                                    <li> <a href="" class="color-4">Stress Blesser </a> </li>
                                    <li> <a href="" class="color-4">Love Latte </a> </li>
                                    <li> <a href="" class="color-4">Motivation Mocha </a> </li>
                                </ul>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/botcons.png" alt="" />
                                <p class="title">Wellgo</p>
                                <div class="description"> 
                                    <span class="sub-heading">Mission</span>
                                    <p>“The levels my addiction took me to were in the darkest places, and it is in those times I remember thinking, “I’m either going to die, or change.” I found strength within myself to want to change. And I did. I found strength within myself to want to change. And I did.”</p>
                                </div>
                                <ul class="wellgolist">
                                    <h4>Specialities</h4>
                                    <li> <a href="" class="color-4">Stress Blesser </a> </li>
                                    <li> <a href="" class="color-4">Love Latte </a> </li>
                                    <li> <a href="" class="color-4">Motivation Mocha </a> </li>
                                </ul>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/botcons.png" alt="" />
                                <p class="title">Wellgo</p>
                                <div class="description"> 
                                    <span class="sub-heading">Mission</span>
                                    <p>“The levels my addiction took me to were in the darkest places, and it is in those times I remember thinking, “I’m either going to die, or change.” I found strength within myself to want to change. And I did. I found strength within myself to want to change. And I did.”</p>
                                </div>
                                <ul class="wellgolist">
                                    <h4>Specialities</h4>
                                    <li> <a href="" class="color-4">Stress Blesser </a> </li>
                                    <li> <a href="" class="color-4">Love Latte </a> </li>
                                    <li> <a href="" class="color-4">Motivation Mocha </a> </li>
                                </ul>
                            </li>
                        </ul>
                        <div id="bots-text" class="carousel-text clearfix">
                            <div id="bots-title" class="col-sm-12">Title</div>
                            <div id="bots-description" class="col-sm-6">
                                <p>Description of the selected item</p>
                            </div>
                            <div class="col-md-6">
                                <ul id="wellgos-bots">List of Favorite Wellgorithms</ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--====================== Favor Bots 3D Carousel Ends here ======================-->

        <!--====================== Member 3D Carousel Starts here ======================-->
        <section id="meet-the-members" class="container background-color-6">
            <div class="row">
                <div class="col-sm-12">
                    <div class="bordered-container pad-top0 pad-bottom100 border-left-color-3 border-right-color-3 background-color-2">
                        <div class="home-matrix-seperator background-color-4 clearfix">
                            <h2 class="title-span color-4 border-color-4"><?= $favorfields['homepage_sub_3_title'] ?></h2>
                        </div>
                        <h3 class="bold-text color-4 text-center"><?= $favorfields['homepage_sub_3_subhead'] ?></h3>
                        <ul id="meetMemberCarousel">
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/150x170.png" alt="" />
                                <p class="title">Member 1</p>
                                <div class="description"> 
                                    <span class="sub-heading">Turning Point:</span>
                                    <p>“The levels my addiction took me to were in the darkest places, and it is in those times I remember thinking, “I’m either going to die, or change.” I found strength within myself to want to change. And I did. I found strength within myself to want to change. And I did.”</p>
                                </div>
                                <ul class="wellgolist">
                                    <h4>Favorite Wellgorithms</h4>
                                    <li> <a href="" class="color-4">Stress Blesser </a> </li>
                                    <li> <a href="" class="color-4">Love Latte </a> </li>
                                    <li> <a href="" class="color-4">Motivation Mocha </a> </li>
                                </ul>
                                <ul class="botlist">
                                    <h4>Favorite Bot</h4>
                                    <li> <a href="#" class="color-4"> Wellgo </a></li>
                                </ul>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/150x170.png" alt="" />
                                <p class="title">Member 2</p>
                                <div class="description"> 
                                    <span class="sub-heading">Turning Point:</span>
                                    <p>“The levels my addiction took me to were in the darkest places, and it is in those times I remember thinking, “I’m either going to die, or change.” I found strength within myself to want to change. And I did. I found strength within myself to want to change. And I did.”</p>
                                </div>
                                <ul class="wellgolist">
                                    <h4>Favorite Wellgorithms</h4>
                                    <li> <a href="" class="color-4">Stress Blesser </a> </li>
                                    <li> <a href="" class="color-4">Love Latte </a> </li>
                                    <li> <a href="" class="color-4">Motivation Mocha </a> </li>
                                </ul>
                                <ul class="botlist">
                                    <h4>Favorite Bot</h4>
                                    <li> <a href="#" class="color-4"> Wellgo </a></li>
                                </ul>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/150x170.png" alt="" />
                                <p class="title">Member 3</p>
                                <div class="description"> 
                                    <span class="sub-heading">Turning Point:</span>
                                    <p>“The levels my addiction took me to were in the darkest places, and it is in those times I remember thinking, “I’m either going to die, or change.” I found strength within myself to want to change. And I did. I found strength within myself to want to change. And I did.”</p>
                                </div>
                                <ul class="wellgolist">
                                    <h4>Favorite Wellgorithms</h4>
                                    <li> <a href="" class="color-4">Stress Blesser </a> </li>
                                    <li> <a href="" class="color-4">Love Latte </a> </li>
                                    <li> <a href="" class="color-4">Motivation Mocha </a> </li>
                                </ul>
                                <ul class="botlist">
                                    <h4>Favorite Bot</h4>
                                    <li> <a href="#" class="color-4"> Wellgo </a></li>
                                </ul>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/150x170.png" alt="" />
                                <p class="title">Member 4</p>
                                <div class="description"> 
                                    <span class="sub-heading">Turning Point:</span>
                                    <p>“The levels my addiction took me to were in the darkest places, and it is in those times I remember thinking, “I’m either going to die, or change.” I found strength within myself to want to change. And I did. I found strength within myself to want to change. And I did.”</p>
                                </div>
                                <ul class="wellgolist">
                                    <h4>Favorite Wellgorithms</h4>
                                    <li> <a href="" class="color-4">Stress Blesser </a> </li>
                                    <li> <a href="" class="color-4">Love Latte </a> </li>
                                    <li> <a href="" class="color-4">Motivation Mocha </a> </li>
                                </ul>
                                <ul class="botlist">
                                    <h4>Favorite Bot</h4>
                                    <li> <a href="#" class="color-4"> Wellgo </a></li>
                                </ul>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/150x170.png" alt="" />
                                <p class="title">Member 5</p>
                               <div class="description"> 
                                    <span class="sub-heading">Turning Point:</span>
                                    <p>“The levels my addiction took me to were in the darkest places, and it is in those times I remember thinking, “I’m either going to die, or change.” I found strength within myself to want to change. And I did. I found strength within myself to want to change. And I did.”</p>
                                </div>
                                <ul class="wellgolist">
                                    <h4>Favorite Wellgorithms</h4>
                                    <li> <a href="" class="color-4">Stress Blesser </a> </li>
                                    <li> <a href="" class="color-4">Love Latte </a> </li>
                                    <li> <a href="" class="color-4">Motivation Mocha </a> </li>
                                </ul>
                                <ul class="botlist">
                                    <h4>Favorite Bot</h4>
                                    <li> <a href="#" class="color-4"> Wellgo </a></li>
                                </ul>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/150x170.png" alt="" />
                                <p class="title">Member 6</p>
                                <div class="description"> 
                                    <span class="sub-heading">Turning Point:</span>
                                    <p>“The levels my addiction took me to were in the darkest places, and it is in those times I remember thinking, “I’m either going to die, or change.” I found strength within myself to want to change. And I did. I found strength within myself to want to change. And I did.”</p>
                                </div>
                                <ul class="wellgolist">
                                    <h4>Favorite Wellgorithms</h4>
                                    <li> <a href="" class="color-4">Stress Blesser </a> </li>
                                    <li> <a href="" class="color-4">Love Latte </a> </li>
                                    <li> <a href="" class="color-4">Motivation Mocha </a> </li>
                                </ul>
                                <ul class="botlist">
                                    <h4>Favorite Bot</h4>
                                    <li> <a href="#" class="color-4"> Wellgo </a></li>
                                </ul>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/150x170.png" alt="" />
                                <p class="title">Member 7</p>
                                <div class="description"> 
                                    <span class="sub-heading">Turning Point:</span>
                                    <p>“The levels my addiction took me to were in the darkest places, and it is in those times I remember thinking, “I’m either going to die, or change.” I found strength within myself to want to change. And I did. I found strength within myself to want to change. And I did.”</p>
                                </div>
                                <ul class="wellgolist">
                                    <h4>Favorite Wellgorithms</h4>
                                    <li> <a href="" class="color-4">Stress Blesser </a> </li>
                                    <li> <a href="" class="color-4">Love Latte </a> </li>
                                    <li> <a href="" class="color-4">Motivation Mocha </a> </li>
                                </ul>
                                <ul class="botlist">
                                    <h4>Favorite Bot</h4>
                                    <li> <a href="#" class="color-4"> Wellgo </a></li>
                                </ul>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/community-icon.jpg" alt="" />
                                <p class="title">Favor Fields</p>
                                <div class="description"> 
                                    <span class="sub-heading">We are...</span>
                                    <p>We range in ages from 18 to 89.</p>
                                    <p>We’re grandmothers, widows, single moms, college students, recovering addicts, whole, broken, and everything in between.</p>
                                    <p>73% of our founding members and contributors are women.</p>
                                </div>
                                <ul class="wellgolist">
                                    <h4>We come from..</h4>
                                    <li class="description"> We come from 53 countries, many of which are rarely represented in a startup, including Algeria, Tunisia, Zimbabwe, Nepal, Lebanon, Uruguay, and Vietnam.</li>
                                </ul>
                                <ul class="botlist">
                                    <li class="description">We represent all the major faith traditions. We’re Christians, Jews, Buddhists, scientists, agnostics, conservatives, liberals, reformers.</li>
                                </ul>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/150x170.png" alt="" />
                                <p class="title">Member 9</p>
                                <div class="description"> 
                                    <span class="sub-heading">Turning Point:</span>
                                    <p>“The levels my addiction took me to were in the darkest places, and it is in those times I remember thinking, “I’m either going to die, or change.” I found strength within myself to want to change. And I did. I found strength within myself to want to change. And I did.”</p>
                                </div>
                                <ul class="wellgolist">
                                    <h4>Favorite Wellgorithms</h4>
                                    <li> <a href="" class="color-4">Stress Blesser </a> </li>
                                    <li> <a href="" class="color-4">Love Latte </a> </li>
                                    <li> <a href="" class="color-4">Motivation Mocha </a> </li>
                                </ul>
                                <ul class="botlist">
                                    <h4>Favorite Bot</h4>
                                    <li> <a href="#" class="color-4"> Wellgo </a></li>
                                </ul>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/150x170.png" alt="" />
                                <p class="title">Member 10</p>
                                <div class="description"> 
                                    <span class="sub-heading">Turning Point:</span>
                                    <p>“The levels my addiction took me to were in the darkest places, and it is in those times I remember thinking, “I’m either going to die, or change.” I found strength within myself to want to change. And I did. I found strength within myself to want to change. And I did.”</p>
                                </div>
                                <ul class="wellgolist">
                                    <h4>Favorite Wellgorithms</h4>
                                    <li> <a href="" class="color-4">Stress Blesser </a> </li>
                                    <li> <a href="" class="color-4">Love Latte </a> </li>
                                    <li> <a href="" class="color-4">Motivation Mocha </a> </li>
                                </ul>
                                <ul class="botlist">
                                    <h4>Favorite Bot</h4>
                                    <li> <a href="#" class="color-4"> Wellgo </a></li>
                                </ul>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/150x170.png" alt="" />
                                <p class="title">Member 11 </p>
                                <div class="description"> 
                                    <span class="sub-heading">Turning Point:</span>
                                    <p>“The levels my addiction took me to were in the darkest places, and it is in those times I remember thinking, “I’m either going to die, or change.” I found strength within myself to want to change. And I did. I found strength within myself to want to change. And I did.”</p>
                                </div>
                                <ul class="wellgolist">
                                    <h4>Favorite Wellgorithms</h4>
                                    <li> <a href="" class="color-4">Stress Blesser </a> </li>
                                    <li> <a href="" class="color-4">Love Latte </a> </li>
                                    <li> <a href="" class="color-4">Motivation Mocha </a> </li>
                                </ul>
                                <ul class="botlist">
                                    <h4>Favorite Bot</h4>
                                    <li> <a href="#" class="color-4"> Wellgo </a></li>
                                </ul>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/150x170.png" alt="" />
                                <p class="title">Member 12</p>
                                <div class="description"> 
                                    <span class="sub-heading">Turning Point:</span>
                                    <p>“The levels my addiction took me to were in the darkest places, and it is in those times I remember thinking, “I’m either going to die, or change.” I found strength within myself to want to change. And I did. I found strength within myself to want to change. And I did.”</p>
                                </div>
                                <ul class="wellgolist">
                                    <h4>Favorite Wellgorithms</h4>
                                    <li> <a href="" class="color-4">Stress Blesser </a> </li>
                                    <li> <a href="" class="color-4">Love Latte </a> </li>
                                    <li> <a href="" class="color-4">Motivation Mocha </a> </li>
                                </ul>
                                <ul class="botlist">
                                    <h4>Favorite Bot</h4>
                                    <li> <a href="#" class="color-4"> Wellgo </a></li>
                                </ul>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/150x170.png" alt="" />
                                <p class="title">Member 13</p>
                                <div class="description"> 
                                    <span class="sub-heading">Turning Point:</span>
                                    <p>“The levels my addiction took me to were in the darkest places, and it is in those times I remember thinking, “I’m either going to die, or change.” I found strength within myself to want to change. And I did. I found strength within myself to want to change. And I did.”</p>
                                </div>
                                <ul class="wellgolist">
                                    <h4>Favorite Wellgorithms</h4>
                                    <li> <a href="" class="color-4">Stress Blesser </a> </li>
                                    <li> <a href="" class="color-4">Love Latte </a> </li>
                                    <li> <a href="" class="color-4">Motivation Mocha </a> </li>
                                </ul>
                                <ul class="botlist">
                                    <h4>Favorite Bot</h4>
                                    <li> <a href="#" class="color-4"> Wellgo </a></li>
                                </ul>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/150x170.png" alt="" />
                                <p class="title">Member 14</p>
                                <div class="description"> 
                                    <span class="sub-heading">Turning Point:</span>
                                    <p>“The levels my addiction took me to were in the darkest places, and it is in those times I remember thinking, “I’m either going to die, or change.” I found strength within myself to want to change. And I did. I found strength within myself to want to change. And I did.”</p>
                                </div>
                                <ul class="wellgolist">
                                    <h4>Favorite Wellgorithms</h4>
                                    <li> <a href="" class="color-4">Stress Blesser </a> </li>
                                    <li> <a href="" class="color-4">Love Latte </a> </li>
                                    <li> <a href="" class="color-4">Motivation Mocha </a> </li>
                                </ul>
                                <ul class="botlist">
                                    <h4>Favorite Bot</h4>
                                    <li> <a href="#" class="color-4"> Wellgo </a></li>
                                </ul>
                            </li>
                        </ul>
                        <div id="text" class="carousel-text clearfix">
                            <div id="selected-title" class="col-sm-12">Title</div>
                            <div id="selected-description" class="col-sm-6">
                                <p>Description of the selected item</p>
                            </div>
                            <div class="col-md-6">
                                <ul id="favorite-wellgos">List of Favorite Wellgorithms</ul>
                                <ul id="favorite-bots">List of Favorite Bots</ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--====================== Member 3D Carousel Ends here ======================-->
        
        <section id="wellgo-week" class="container background-color-6">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="bordered-container pad-top0 pad-bottom50 border-left-color-3 border-right-color-3 background-color-2">
                        <div class="home-matrix-seperator background-color-4 clearfix">
                            <h2 class="title-span color-4 border-color-4">Wellgorithm of the Week</h2>
                        </div>
                        <h3 class="bold-text color-4">"You may delay, but time won't." <br><em>— Ben Franklin</em></h3>
                        <div class="do-the-section">
                            <span class="do-title color-4"> do the </span>
                            <p> <a href="#" class="do-btn background-color-3 border-color-3">Procrastination Pranker </a> </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="help-us" class="container background-color-6">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="bordered-container pad-top0 pad-bottom50 border-left-color-3 border-right-color-3 background-color-2">
                        <div class="home-matrix-seperator background-color-4 clearfix">
                        </div>
                        <h3 class="bold-text color-4"> Come <span>grow</span> with us.
                          <br><br> Help us re-imagine social media — <br> show the world what it can be.
                        </h3>

                        <div class="signup-form-container">
                            <form class="signup-form">
                              <div class="form-group">
                                <input type="text" class="form-control color-4 border-color-4" id="first_Name" placeholder="first name">
                              </div>
                              <div class="form-group">
                                <input type="email" class="form-control color-4 border-color-4" id="signUpEmail" placeholder="email">
                              </div>
                              <div class="form-group">
                                <button type="submit" class="btn btn-default btn-block background-color-3">put me on the waiting list</button>
                              </div>
                            </form>
                             <p class="help-block">* We're a small community, and right now we have a waiting list. We'd love to hear from you. We pro- <br> tect your privacy and won't share your email address with anyone.</p>
                        </div> <!-- signup-form-container -->
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>


<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!--=========== Typad JS Starts Here ============== -->
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/typed.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function(){
      Typed.new('#help-us .bold-text color-4 span', {
        strings: ["grow", "laugh", "love"],
        typeSpeed: 100,
        loop: true,
        startDelay: 0,
        backSpeed: 50,
        backDelay: 500,
        showCursor: true,
        cursorChar: "|"
      });
  });
</script>
<!--=========== 3D Carousel Starts Here ============== -->
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/3d-carousel/jquery.carousel.min.js"></script>
<script type="text/javascript">
    // Bots Carousel
    var botsCarousel;
    jQuery(document).ready(function($){
        botsCarousel = jQuery('#botsCarousel').carousel({
            width: 800, 
            height: 450,
            itemWidth: 150, 
            horizontalRadius: 300, 
            verticalRadius: 120, 
            resize: false, 
            scaleRatio: 0.5,
            autoScroll: true,
            itemSelect: onItemSelect1,
            maintainAspectRatio: true
        });                                 
        botsCarousel.scrollToItem(0);
    });
    function toggleAutoScroll() {
        if (carousel.settings.autoScroll) {
            carousel.stopAutoScroll();
            jQuery('#controls #auto-scroll').css('background-position', '-38px 0px');
        } else {
            carousel.startAutoScroll();
            jQuery('#controls #auto-scroll').css('background-position', '0px 0px');
        }
    }
    // populate the text fields when an item is selected
    function onItemSelect1(event) {
        jQuery('#bots-text #bots-title').html(event.data.title);
        jQuery('#bots-text #bots-description').html(event.data.description);
        jQuery('#bots-text #wellgos-bots').html(event.data.wellgolist);

        jQuery('#botsCarousel .carousel-item').each(function () {
            jQuery(this).removeClass('active');
        });
        jQuery('#botsCarousel .carousel-item').eq(event.index).addClass('active');
    }

    // Meet the Members Carousel
    var meetMemberCarousel;
    jQuery(document).ready(function($){
        meetMemberCarousel = jQuery('#meetMemberCarousel').carousel({
            width: 800, 
            height: 450,
            itemWidth: 150, 
            horizontalRadius: 300, 
            verticalRadius: 120, 
            resize: false, 
            scaleRatio: 0.5,
            autoScroll: true,
            itemSelect: onItemSelect,
            maintainAspectRatio: true
        });                                 
        meetMemberCarousel.scrollToItem(0);
    });
    function toggleAutoScroll() {
        if (carousel.settings.autoScroll) {
            carousel.stopAutoScroll();
            jQuery('#controls #auto-scroll').css('background-position', '-38px 0px');
        } else {
            carousel.startAutoScroll();
            jQuery('#controls #auto-scroll').css('background-position', '0px 0px');
        }
    }
    // populate the text fields when an item is selected
    function onItemSelect(event) {
        jQuery('#text #selected-title').html(event.data.title);
        jQuery('#text #selected-description').html(event.data.description);
        jQuery('#text #favorite-wellgos').html(event.data.wellgolist);
        jQuery('#text #favorite-bots').html(event.data.botlist);

        jQuery('#meetMemberCarousel .carousel-item').each(function () {
            jQuery(this).removeClass('active');
        });
        jQuery('#meetMemberCarousel .carousel-item').eq(event.index).addClass('active');
    }
</script>
<!--=========== 3D Carousel Ends Here ============== -->

    <script>
        // TODO: All of this have to be moved to the separate JS file
        
        'use strict';

        // Instasearch instance 1

        var search = instantsearch({
            appId: 'T2B04QR9B0',
            apiKey: '28985d34dee832a8f54db2e290beaec7',
            indexName: 'wp_posts_wellgorithms', // test_wellgorithms
        });

        search.addWidget(instantsearch.widgets.searchBox({
            container: '#search-box',
            placeholder: "<?= $favorfields['homepage_search_1'] ?>",
            autofocus: false
        }));

        var hitTemplate = document.getElementById('movie').innerHTML;

        search.addWidget(instantsearch.widgets.hits({
            container: '#hits',
            hitsPerPage: 50,
            templates: {
                item: hitTemplate
            },
            transformData: function transformData(hit) {
                hit.stars = [];
                for (var i = 1; i <= 3; ++i) {
                    hit.stars.push(i <= hit.vp_level);
                }
                return hit;
            }
        }));

        search.addWidget(instantsearch.widgets.refinementList({
            container: '#focus',
            attributeName: 'taxonomies.post_tag',
            limit: 7,
            templates: {
                item: function item(data) {
                    return "<div class='focus__items'>" + data.name + "</div>";
                }
            },
            cssClasses: {
                list: "titles__list",
                // item: "justLoaded"
            }
        }));

        search.addWidget(instantsearch.widgets.rangeSlider({
            container: '#confidence',
            attributeName: 'vp_confidence',
            tooltips: {
                format: function format(v) {
                    return "";
                }
            },
            min: 0,
            max: 10,
            pips: false,
            templates: {
                footer: 'Confidence'
            }
        }));

        search.addWidget(instantsearch.widgets.numericRefinementList({
            container: '#category',
            attributeName: 'vp_category',
            limit: 3,
            autoHideContainer: false,
            options: [
                { start: 3, end: 3, name: 'Wellgo' },
                { start: 4, end: 4, name: 'Hellgo' },
                { start: 5, end: 5, name: 'Letgo' },
                { start: 148, end: 148, name: 'Cosmo' },
                { start: 147, end: 147, name: 'Predicto' },
                { start: 152, end: 152, name: 'Quacko' }
            ],
            templates: {
                item: function item(data) {
                    var output = "";
                    if (data.name == 'Hellgo') {
                        output = "<img src='<?= wp_get_attachment_url($algolia_avatars_array[0]); ?>'><span class='hellgo'>Hellgo</span>";
                    } else if (data.name == 'Letgo') {
                        output = "<img src='<?= wp_get_attachment_url($algolia_avatars_array[1]); ?>'><span class='letgo'>Letgo</span>";
                    } else if (data.name == 'Wellgo') {
                        output = "<img src='<?= wp_get_attachment_url($algolia_avatars_array[2]); ?>'><span class='wellgo'>Wellgo</span>";
                    } else if (data.name == 'Cosmo') {
                        output = "<img src='<?= wp_get_attachment_url($algolia_avatars_array[3]); ?>'><span class='cosmo'>Cosmo</span>";
                    } else if (data.name == 'Predicto') {
                        output = "<img src='<?= wp_get_attachment_url($algolia_avatars_array[4]); ?>'><span class='predicto'>Predicto</span>";
                    } else if (data.name == 'Quacko') {
                        output = "<img src='<?= wp_get_attachment_url($algolia_avatars_array[5]); ?>'><span class='quacko'>Quacko</span>";
                    }
                    return output;
                }
            },
            cssClasses: {
                item: "wellgo_categories"
            },
            sortBy: ['name:desc']
        }));

        search.addWidget(instantsearch.widgets.numericRefinementList({
            container: '#level',
            attributeName: 'vp_level',
            options: [{ start: 1, end: 1, name: '1' }, { start: 2, end: 2, name: '2' }, { start: 3, end: 3, name: '3' }],
            autoHideContainer: false,
            templates: {
                item: function item(data) {
                    return " ";
                },
                footer: "Level"
            },
            cssClasses: {
                list: "wellgo_levels",
            }
        }));

        search.addWidget(instantsearch.widgets.numericRefinementList({
            container: '#mood',
            attributeName: 'vp_mood',
            options: [{ start: 1, end: 1, name: 'Sunshine' }, { start: 5, end: 5, name: 'Partly_sunny' }, { start: 6, end: 6, name: 'Clouds' }, { start: 4, end: 4, name: 'Rain' }, { start: 2, end: 2, name: 'Storm' }, { start: 3, end: 3, name: 'Rainbow' }],
            autoHideContainer: false,
            templates: {
                item: function item(data) {
                    if (data.name == 'Storm') {
                        return "<img src='http://favorfields.com/wp-content/uploads/2017/03/w-storm.png'>";
                    } else if (data.name == 'Sunshine') {
                        return '<img src="http://favorfields.com/wp-content/uploads/2017/03/w-sunny.png">';
                    } else if (data.name == 'Rainbow') {
                        return '<img src="http://favorfields.com/wp-content/uploads/2017/03/w-rainbow.png">';
                    } else if (data.name == 'Rain') {
                        return '<img src="http://favorfields.com/wp-content/uploads/2017/03/w-rain.png">';
                    } else if (data.name == 'Clouds') {
                        return '<img src="http://favorfields.com/wp-content/uploads/2017/03/w-clouds.png">';
                    } else if (data.name == 'Partly_sunny') {
                        return '<img src="http://favorfields.com/wp-content/uploads/2017/03/w-partly-sunny.png">';
                    } else {
                        return 'x';
                    }
                }
            },
            cssClasses: {
                // item: "justLoaded"
            }
        }));

        search.addWidget(instantsearch.widgets.clearAll({
            container: '#stats',
            templates: {
                link: '<i class="fa fa-repeat reload_search color-4" aria-hidden="true"></i>'
            },
            autoHideContainer: false
        }));

        search.start();



        // Instasearch instance 2

        var search_replica = instantsearch({
            appId: 'T2B04QR9B0',
            apiKey: '28985d34dee832a8f54db2e290beaec7',
            indexName: 'test_wellgorithms' // test_wellgorithms
        });


        search_replica.addWidget(instantsearch.widgets.searchBox({
            container: '#search-box-replica',
            placeholder: "<?= $favorfields['homepage_search_2'] ?>",
            autofocus: false,
            poweredBy: false
        }));

        var hitTemplate = document.getElementById('movie').innerHTML;

        search_replica.addWidget(instantsearch.widgets.hits({
            container: '#hits',
            hitsPerPage: 50,
            templates: {
                item: hitTemplate
            },
            transformData: function transformData(hit) {
                hit.stars = [];
                for (var i = 1; i <= 3; ++i) {
                    hit.stars.push(i <= hit.vp_level);
                }
                return hit;
            }
        }));

        search_replica.addWidget(instantsearch.widgets.refinementList({
            container: '#focus',
            attributeName: 'taxonomies.post_tag',
            limit: 7,
            templates: {
                item: function item(data) {
                    return "<div class='focus__items'>" + data.name + "</div>";
                }
            },
            cssClasses: {
                list: "titles__list",
                // item: "justLoaded"
            }
        }));

        search_replica.addWidget(instantsearch.widgets.rangeSlider({
            container: '#confidence',
            attributeName: 'vp_confidence',
            tooltips: {
                format: function format(v) {
                    return "";
                }
            },
            min: 0,
            max: 10,
            pips: false,
            templates: {
                footer: 'Confidence'
            }
        }));

        search_replica.addWidget(instantsearch.widgets.numericRefinementList({
            container: '#category',
            attributeName: 'vp_category',
            limit: 3,
            autoHideContainer: false,
            options: [
                { start: 3, end: 3, name: 'Wellgo' },
                { start: 4, end: 4, name: 'Hellgo' },
                { start: 5, end: 5, name: 'Letgo' },
                { start: 148, end: 148, name: 'Cosmo' },
                { start: 147, end: 147, name: 'Predicto' },
                { start: 152, end: 152, name: 'Quacko' }
                ],
            templates: {
                item: function item(data) {
                    var output = "";
                    if (data.name == 'Hellgo') {
                        output = "<img src='<?= wp_get_attachment_url($algolia_avatars_array[0]); ?>'><span class='hellgo'>Hellgo</span>";
                    } else if (data.name == 'Letgo') {
                        output = "<img src='<?= wp_get_attachment_url($algolia_avatars_array[1]); ?>'><span class='letgo'>Letgo</span>";
                    } else if (data.name == 'Wellgo') {
                        output = "<img src='<?= wp_get_attachment_url($algolia_avatars_array[2]); ?>'><span class='wellgo'>Wellgo</span>";
                    } else if (data.name == 'Cosmo') {
                        output = "<img src='<?= wp_get_attachment_url($algolia_avatars_array[3]); ?>'><span class='cosmo'>Cosmo</span>";
                    } else if (data.name == 'Predicto') {
                        output = "<img src='<?= wp_get_attachment_url($algolia_avatars_array[4]); ?>'><span class='predicto'>Predicto</span>";
                    } else if (data.name == 'Quacko') {
                        output = "<img src='<?= wp_get_attachment_url($algolia_avatars_array[5]); ?>'><span class='quacko'>Quacko</span>";
                    }
                    return output;
                }
            },
            cssClasses: {
                item: "wellgo_categories"
            },
            sortBy: ['name:desc']
        }));

        search_replica.addWidget(instantsearch.widgets.numericRefinementList({
            container: '#level',
            attributeName: 'vp_level',
            options: [{ start: 1, end: 1, name: '1' }, { start: 2, end: 2, name: '2' }, { start: 3, end: 3, name: '3' }],
            autoHideContainer: false,
            templates: {
                item: function item(data) {
                    return " ";
                },
                footer: "Level"
            },
            cssClasses: {
                list: "wellgo_levels",
            }
        }));

        search_replica.addWidget(instantsearch.widgets.numericRefinementList({
            container: '#mood',
            attributeName: 'vp_mood',
            options: [{ start: 1, end: 1, name: 'Sunshine' }, { start: 5, end: 5, name: 'Partly_sunny' }, { start: 6, end: 6, name: 'Clouds' }, { start: 4, end: 4, name: 'Rain' }, { start: 2, end: 2, name: 'Storm' }, { start: 3, end: 3, name: 'Rainbow' }],
            autoHideContainer: false,
            templates: {
                item: function item(data) {
                    if (data.name == 'Storm') {
                        return "<img src='http://favorfields.com/wp-content/uploads/2017/03/w-storm.png'>";
                    } else if (data.name == 'Sunshine') {
                        return '<img src="http://favorfields.com/wp-content/uploads/2017/03/w-sunny.png">';
                    } else if (data.name == 'Rainbow') {
                        return '<img src="http://favorfields.com/wp-content/uploads/2017/03/w-rainbow.png">';
                    } else if (data.name == 'Rain') {
                        return '<img src="http://favorfields.com/wp-content/uploads/2017/03/w-rain.png">';
                    } else if (data.name == 'Clouds') {
                        return '<img src="http://favorfields.com/wp-content/uploads/2017/03/w-clouds.png">';
                    } else if (data.name == 'Partly_sunny') {
                        return '<img src="http://favorfields.com/wp-content/uploads/2017/03/w-partly-sunny.png">';
                    } else {
                        return 'x';
                    }
                }
            },
            cssClasses: {
                // item: "justLoaded"
            }
        }));

        search_replica.addWidget(instantsearch.widgets.clearAll({
            container: '#stats',
            templates: {
                link: '<i class="fa fa-repeat reload_search color-4" aria-hidden="true"></i>'
            },
            autoHideContainer: false
        }));

        search_replica.start();



        jQuery(document).ready(function ($) {
            var overlay = $('#focus_overlay');

            var onRenderHandler = function() {
                overlay.hide();
            };
            search.on('render', onRenderHandler);


            $('.custom_facet').click(function (e) {

                var $this = $(this),
                    facet = $this.text();

                search.helper.addDisjunctiveFacetRefinement('taxonomies.post_tag', facet).search();

            });



            /**
             * Remove colors from filters after clicking on one of them
             */
            function justLoaded() {
                overlay.show();

                setTimeout(function(){
                    overlay.show();
                    $('.ais-refinement-list--item, .focus__items').each(function () {
                        $(this).addClass('justLoaded');
                    });
                }, 500);

            }

            // Adding color
            justLoaded();
            $(document).on('click', '.reload_search', justLoaded );

            // Removing colors
            $(document).on('click', '.justLoaded', function(){
                $('.justLoaded').each(function () {
                    $(this).removeClass('justLoaded');
                });
            });
          
           // Nice Scroll
           jQuery('#hits').niceScroll();

            // Clearing inputs
            function tog(v) {
                return v?'addClass':'removeClass';
            }
            $(document).on('input', '.clearable', function(){
                $(this)[tog(this.value)]('x');
            }).on('mousemove', '.x', function( e ){
                $(this)[tog(this.offsetWidth - 100 < e.clientX-this.getBoundingClientRect().left)]('onX');
            }).on('touchstart click', '.onX', function( ev ){
                ev.preventDefault();
                $(this).removeClass('x onX').val('').change();

                search.helper.setQuery('').search();
                justLoaded();
            });
        });
    </script>
<? get_footer() ?>