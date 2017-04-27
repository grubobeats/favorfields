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
?>

<script src="//cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.js"></script>
<link href="//cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.css" rel="stylesheet" />

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.6.8-fix/jquery.nicescroll.min.js"></script>

<link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet" />

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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


<div class="home-top-banner">
    <div class="homepage-transparent-overlay background-color-3"></div>

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
<div id="main">
    <section class="algolia-search-container">
        <div class="container">
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

                    <div class="algolia-search">
                        <div class="top">
                            <div class="input-container">
                                <input type="text" id="search-box" class="clearable"/>
                                <div id="stats"></div>   
                                <input type="text" id="search-box-replica" class="clearable"/>
                            </div>
                        </div>

                        <div class="content">
                            <div class="facets">
                                <div class="facet">
                                    <div class="facet-title"></div>
                                    <div id="focus"></div>
                                    <div id="focus_overlay">
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
        <section id="loving-kindness" class="container">
            <div class="row tex-center">
                <div class="col-sm-12 text-center">
                    <div class="bordered-container bg-white pad-top0">
                        <div class="home-matrix-seperator clearfix">
                            <h2 class="title-span"><?= $favorfields['homepage_sub_2'] ?></h2>
                        </div>
                        <h3 class="bold-text"><?= $favorfields['homepage_sub_2_text_1'] ?><br/><?= $favorfields['homepage_sub_2_text_2'] ?></h3>
                        <div class="row">
                            <div class="col-sm-6 demo-video vid1">
                                <div class="demo-video-container">
                                    <img src="http://favorfields.com//wp-content/themes/favorfields/assets/images/lotus-video.jpg" class="img-responsive video-bordered" alt="Video">
                                    <a class="play-video" href="javascript:void(0)"> <i class="fa fa-play" aria-hidden="true"></i> Watch</a>
                                </div>
                                <h3 class="bold-text"> <span><?= $favorfields['homepage_sub_2_content_title_1'] ?></span> <br/> <strong><?= $favorfields['homepage_sub_2_content_subhead_1']?></strong></h3>
                                <div class="text-left long-text"><?= $favorfields['homepage_sub_2_content_content_1'] ;?></div>
                                <a href="javascript:void(0)" class="more-btn" title="More"> <?= $favorfields['homepage_sub_2_content_button_1']?> </a>
                            </div>
                            <div class="col-sm-6 demo-video vid2">
                                <div class="demo-video-container">
                                    <img src="http://favorfields.com//wp-content/themes/favorfields/assets/images/video2.jpg" class="img-responsive video-bordered" alt="Video">
                                    <a class="play-video" href="javascript:void(0)"> <i class="fa fa-play" aria-hidden="true"></i> Watch </a>
                                </div>
                                <h3 class="bold-text"> <span><?= $favorfields['homepage_sub_2_content_title_2'] ?></span> <br/> <strong><?= $favorfields['homepage_sub_2_content_subhead_2']?></strong></h3>
                                <div class="text-left long-text"><?= $favorfields['homepage_sub_2_content_content_2'] ;?></div>
                                <a href="javascript:void(0)" class="more-btn" title="More"> <?= $favorfields['homepage_sub_2_content_button_1']?> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> <!--loving-kindness section ends-->
        
        <section id="meet-the-members" class="container" >
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="bordered-container pad-top0 pad-bottom100">
                        <div class="home-matrix-seperator clearfix">
                            <h2 class="title-span"><?= $favorfields['homepage_sub_3_title'] ?></h2>
                        </div>
                        <h3 class="bold-text pad-bottom50"><?= $favorfields['homepage_sub_3_subhead'] ?></h3>
                        <!--============== Tabbed Carousel Starts Here==============-->
                        <div class="accordion-container">
                          <div id="membersCarousel" class="carousel slide" data-ride="carousel">
                            <nav class="accordion-nav nav--active">
                              <ul class="nav__list">
                                  <? for ( $slide_title=0; $slide_title < count($favorfields['hompepage_sub_3_slider']); $slide_title++ ) : ?>
                                      <li class="nav__item" data-target="#membersCarousel" data-slide-to="<?= $slide_title ?>">
                                          <a href="javascript:void(0)" class="nav__link wellgo-color active">
                                              <div class="nav__thumb" data-letter="<?= $slide_title ?>">
                                                  <img class="img-responsive" src="<?= $favorfields['hompepage_sub_3_slider'][$slide_title]['image'] ?>">
                                              </div>
                                              <p class="nav__label"><?= $favorfields['hompepage_sub_3_slider'][$slide_title]['title'] ?></p>
                                          </a>
                                      </li>
                                  <? endfor; ?>
                              </ul>
                            </nav> <!--carousel list ends-->
                            <!-- carousel-content for slides -->
                            <div class="accordion-content carousel-inner">
                                <? for ( $slide_desc=0; $slide_desc < count($favorfields['hompepage_sub_3_slider']); $slide_desc++ ) : ?>
                                    <section class="section item<? if($slide_desc==0) : ?> section--active active<? endif; ?>" data-letter="<?= $slide_desc ?>">
                                        <article class="section__wrapper">
	                                        <?= $favorfields['hompepage_sub_3_slider'][$slide_desc]['description'] ?>
                                        </article>
                                    </section>
                                <? endfor; ?>
                            </div><!-- End Carousel Inner -->
                          </div><!-- End Carousel -->
                        </div>
                        <!--============== Tabbed Carousel Ends Here==============-->
                    </div>
                </div>
            </div>
        </section>

        <section id="meet-favor-bots" class="container" >
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="bordered-container pad-top0 pad-bottom50">
                        <div class="home-matrix-seperator clearfix">
                            <h2 class="title-span"><?= $favorfields['homepage_sub_4_title'] ?></h2>
                        </div>
                        <h3 class="bold-text"><?= $favorfields['homepage_sub_4_subhead'] ?></h3>
                        <!--============== Tabbed Carousel Starts Here==============-->
                        <div class="accordion-container">
                          <div id="favorBotsCarousel" class="carousel slide" data-ride="carousel">
                            <nav class="accordion-nav nav--active">
                              <ul class="nav__list">
	                              <? for ( $slide_title=0; $slide_title < count($favorfields['hompepage_sub_4_slider']); $slide_title++ ) : ?>
                                      <li class="nav__item" data-target="#favorBotsCarousel" data-slide-to="<?= $slide_title ?>">
                                          <a href="javascript:void(0)" class="nav__link wellgo-color active">
                                              <div class="nav__thumb" data-letter="<?= $slide_title ?>">
                                                  <img class="img-responsive" src="<?= $favorfields['hompepage_sub_4_slider'][$slide_title]['image'] ?>">
                                              </div>
                                              <p class="nav__label"><?= $favorfields['hompepage_sub_4_slider'][$slide_title]['title'] ?></p>
                                          </a>
                                      </li>
	                              <? endfor; ?>
                              </ul>
                            </nav> <!--carousel list ends-->
                            <!-- carousel-content for slides -->
                            <div class="accordion-content carousel-inner">
	                            <? for ( $slide_desc=0; $slide_desc < count($favorfields['hompepage_sub_4_slider']); $slide_desc++ ) : ?>
                                    <section class="section item<? if($slide_desc==0) : ?> section--active active<? endif; ?>" data-letter="<?= $slide_desc ?>">
                                        <article class="section__wrapper">
				                            <?= $favorfields['hompepage_sub_4_slider'][$slide_desc]['description'] ?>
                                        </article>
                                    </section>
	                            <? endfor; ?>
                            </div><!-- End Carousel Inner -->
                          </div><!-- End Carousel -->
                        </div>
                        <!--============== Tabbed Carousel Ends Here==============-->
                    </div>
                </div>
            </div>
        </section>
        
        <section id="help-us" class="container" >
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="bordered-container">
                        <div class="home-matrix-seperator clearfix">
                            <h2 class="title-span"><?= $favorfields['homepage_sub_5_title'] ?></h2>
                        </div>
                        <h3 class="bold-text"><?= $favorfields['homepage_sub_5_subhead'] ?></h3>

                        <div class="signup-form-container">
                            <form class="signup-form">
                              <div class="form-group">
                                <input type="text" class="form-control" id="first_Name" placeholder="first name">
                              </div>
                              <div class="form-group">
                                <input type="email" class="form-control" id="signUpEmail" placeholder="email">
                              </div>
                              <div class="form-group">
                                <button type="submit" class="btn btn-default btn-block">put me on the waiting list</button>
                              </div>
                              <div class="form-group">
                                <p class="help-block">* We respect your privacy.</p>
                              </div>
                            </form>
                        </div> <!-- signup-form-container -->
                    </div>
                </div>
            </div>
        </section>

        <section id="testimonials" class="container">
            <div class="row tex-center">
                <div class="col-sm-12 text-center">
                    <div class="bordered-container bg-white pad-top0">
                        <div class="home-matrix-seperator clearfix">
                            <h2 class="title-span"><?= $favorfields['homepage_sub_6_title'] ?></h2>
                        </div>
                        <h3 class="bold-text"><?= $favorfields['homepage_sub_6_subhead'] ?></h3>
                        <div class="row">
                            <div class="col-sm-offset-2 col-sm-8">
                                <div class="media pad-bottom100">
                                    <div class="media-left">
                                      <img src="<?= $favorfields['homepage_sub_6_user_avatar']['url'] ?>" class="media-object">
                                       <h4 class="media-heading"><?= $favorfields['homepage_sub_6_username'] ?></h4>
                                    </div>
                                    <div class="media-body text-left"><?= $favorfields['homepage_sub_6_content'] ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> <!--loving-kindness section ends-->
    </div>
</div>


<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

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
                { start: 4, end: 4, name: 'Hellgo' },
                { start: 3, end: 3, name: 'Wellgo' },
                { start: 5, end: 5, name: 'Letgo' },
                { start: 148, end: 148, name: 'Cosmo' },
                { start: 147, end: 147, name: 'Predicto' }
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
                        output = "<img src='<?= wp_get_attachment_url($algolia_avatars_array[3]); ?>'><span class='wellgo'>Cosmo</span>";
                    } else if (data.name == 'Predicto') {
                        output = "<img src='<?= wp_get_attachment_url($algolia_avatars_array[4]); ?>'><span class='wellgo'>Predicto</span>";
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
                link: '<i class="fa fa-repeat reload_search" aria-hidden="true"></i>'
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
                { start: 4, end: 4, name: 'Hellgo' },
                { start: 3, end: 3, name: 'Wellgo' },
                { start: 5, end: 5, name: 'Letgo' },
                { start: 148, end: 148, name: 'Cosmo' },
                { start: 147, end: 147, name: 'Predicto' }
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
                        output = "<img src='<?= wp_get_attachment_url($algolia_avatars_array[3]); ?>'><span class='wellgo'>Cosmo</span>";
                    } else if (data.name == 'Predicto') {
                        output = "<img src='<?= wp_get_attachment_url($algolia_avatars_array[4]); ?>'><span class='wellgo'>Predicto</span>";
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
                link: '<i class="fa fa-repeat reload_search" aria-hidden="true"></i>'
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


    <!--============== Accordion JS Starts Here==============-->
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('#membersCarousel .accordion-nav .nav__list .nav__item .nav__link').click(function(){
                jQuery('#membersCarousel .accordion-nav .nav__list .nav__item .nav__link').removeClass("active");
                jQuery(this).addClass("active");
            });
            jQuery('#favorBotsCarousel .accordion-nav .nav__list .nav__item .nav__link').click(function(){
                jQuery('#favorBotsCarousel .accordion-nav .nav__list .nav__item .nav__link').removeClass("active");
                jQuery(this).addClass("active");
            });
        });

        jQuery('#membersCarousel').carousel({
            interval: false
        });

        jQuery('#favorBotsCarousel').carousel({
            interval: false
        });
    </script>
    <!--============== Accordion JS Ends Here==============-->
<? get_footer() ?>