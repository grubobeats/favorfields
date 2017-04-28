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
 * Template name: My Sanctuary
 */

// get_header();
get_template_part( 'header-wellgorithms');

if ( is_user_logged_in() ) :

    require_once get_template_directory() . '/classes/profile_page/My_Sanctaury.php';
    $profile_page = new My_Sanctaury();

    global $favorfields;

    $user = wp_get_current_user();
    $avatar = get_wp_user_avatar($user->ID, 96);
    $favor_points = ( get_user_meta( $user->ID, 'favor_points', true ) ) ? get_user_meta( $user->ID, 'favor_points', true ) : 0 ;

    $headline = ( get_user_meta( $user->ID, 'headline', true ) && get_user_meta( $user->ID, 'headline', true ) != "" ) ? get_user_meta( $user->ID, 'headline', true ) : "A better world starts with a better me.";
    $subhead = ( get_user_meta( $user->ID, 'subhead', true ) && get_user_meta( $user->ID, 'subhead', true ) != "" ) ? get_user_meta( $user->ID, 'subhead', true ) : "Congratulations for visiting your Inner Sanctuary. You’re on your way to becoming your best possible self";


?>

<!-- Latest compiled and minified CSS  -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400i|Raleway:400,600,700|Open+Sans:400,600" rel="stylesheet">
<script src="//cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.js"></script>
<link href="//cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.6.8-fix/jquery.nicescroll.min.js"></script>

<script>
    var ajaxurl = "<?= admin_url( 'admin-ajax.php' ) ?>";
    var permalink = "<?= get_permalink(); ?>";
    var user_id = "<?= get_current_user_id(); ?>";
    var title = "<?= get_the_title(); ?>";
    var date = <?= $profile_page->getDateRanges() ?>;
    var most_used_tags = <?= $profile_page->listMostUsedTags() ?>;
    var most_passed_wellgorithms = <?= $profile_page->listMostPopularWellgorithmsJSON() ?>;
</script>

<!-- Main -->
<div id="main">

    <!-- wellgorithms-main-banner starts -->
    <div class="wellgorithms-main-banner">
        <div class="wellgo-transparent-overlay background-color-3">
        </div> <!-- wellgo-transparent-overlay -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="profile-banner-section">
                        <span class="name-of-user"> Shae </span>
                        <h1 class="profile-momuntum">
                        <span>Mom</span><img class="img-responsive" src="http://favorfields.com/wp-content/uploads/2017/03/RENEE.png"><span>'ntum</span></h1>
                        <h2 class="loving-quote"> "To remain in Loving Kindness is the <br> secret of all happiness." </h2>
                    </div> <!-- wellgorightem-content ends -->

                    <div class="right-faded-logo">
                        <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/mian-logo.png" alt="FFLOGO" class="img-responsive">
                    </div>  <!-- right-faded-logo ends -->

                </div> <!-- col-sm-12 ends -->
            </div> <!-- row ends -->
        </div> <!-- container ends-->
    </div> 
    <!-- wellgorithms-main-banner ends -->

    <!--==============My Journey Section Starts Here==================== -->
    <div class="my-journey container">
        <div class="row">
            <div class="col-sm-8">
                <div class="calendar-wrapper">
                    <h3 class="fav-time">FavTime</h3>
                    <div id="calendar"></div>
                </div>

                <div class="prorgress-wrapper">
                    <h3 class="section-title">Progress</h3>
                    <div id="most-used-wellgorithms"></div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="today-welgo-wrapper">
                    <h4>Today's<br> Wellgorithms</h4>
                    <ul>
                        <li> <a href=""> Stress Blesser </a></li>
                        <li> <a href=""> Peace Infuser </a></li>
                        <li> <a href=""> Cosmic Awakener </a></li>
                        <li> <a href=""> Motivation Mocha </a></li>
                        <li> <a href=""> Love Latte</a></li>
                    </ul>
                </div> <!-- today-welgo-wrapper -->

                <div class="favor-wheels-wrapper text-center">
                    <h4 class="favor-wheel-title">Favor Wheels</h4>
                    
                    <div id="favor-peace" style="width: 240px; height: 240px; margin: 0 auto"> </div>
                    <span class="gauge-title">Peace</span>

                    <div id="favor-gratitude" style="width: 240px; height: 240px; margin: 0 auto"> </div>
                    <span class="gauge-title">Gratitude</span>

                    <div id="favor-love" style="width: 240px; height: 240px; margin: 0 auto"> </div>
                    <span class="gauge-title">Love</span>
                </div> <!-- favor-wheels-wrapper -->
            </div>
        </div>

        <div class="row space-md">
            <div class="col-sm-8">
                <h3 class="section-title">People who favored me</h3>
                <!-- this section is only for design purpose -->
                <ul class="list-inline people-favor">
                    <li>
                        <img src="http://favorfields.com/wp-content/uploads/2017/03/RENEE.png" alt="" class="img-responsive img-bordered">
                    </li>
                    <li>
                        <img src="http://favorfields.com/wp-content/uploads/2017/03/RENEE.png" alt="" class="img-responsive img-bordered">
                    </li>
                </ul>
                <!-- this section ends-->
                <ul class="list-inline people-favor">
                    <? foreach ( $profile_page->peopleFavoredMe() as $user ) : ?>
                        <li>
                            <img src="<?= get_wp_user_avatar($user, 96) ?>" alt="" class="img-responsive img-bordered">
                            <span><?= get_userdata($user)->data->user_login ?></span>
                        </li>
                    <? endforeach; ?>
                </ul>

                <h3 class="section-title">People I’ve favored</h3>
                <? $profile_page->peopleIFavored() ?>
                <!-- this section is only for design purpose -->
                <ul class="list-inline people-favor">
                    <li>
                        <img src="http://favorfields.com/wp-content/uploads/2017/03/RENEE.png" alt="" class="img-responsive img-bordered">
                    </li>
                    <li>
                        <img src="http://favorfields.com/wp-content/uploads/2017/03/RENEE.png" alt="" class="img-responsive img-bordered">
                    </li>
                </ul>
                <!-- this section ends-->
                <ul>
                    <? foreach ( $profile_page->peopleIFavored() as $user ) : ?>
                        <li>
                            <img src="<?= get_wp_user_avatar($user, 96) ?>" alt="" class="img-responsive img-bordered">
                            <span><?= get_userdata($user)->data->user_login ?></span>
                        </li>
                    <? endforeach; ?>
                </ul>
            </div>
            <div class="col-sm-4">
                <p class="quoted"> <strong> "The measure of your<br> commitment is daily <br> consistency.</strong> It's the ultimate seal of the deal, the ingredient that determines whether you win or not. Consistency is the make it or break it part of pursuit that will take anywhere and allow you to make possible the impossible, and then see your dream come to fruition." <span> - Chris Gardner</span> </p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="big-matrix clearfix">
                    <h4 class="matrix-title">Focus Area</h4>
                </div>
            </div>
            <div class="col-sm-12">
                <div id="most-used-tags"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="tooltip1 favor-trigger">Favor me
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
                                <!-- <p class="last"><a href="#"> Breathing in, I marvel at your resilience.</a> </p>-->

                                <form>
                                    <div class="textarea-wrapper"><textarea name="" class="form-control" rows="1" style="overflow: hidden; resize: none; height: 68px;"> </textarea></div>
                                </form>
                                <div> <i class="fa fa-heart color-4"></i> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <a href="/my-wellgorithms">My wellgorithms</a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 extra-content">
                <p>Favor points: <?= $favor_points; ?></p>
                <h2><?= $headline ?></h2>
                <h4><?= $subhead ?></h4>
                <p><?= $profile_page->countFinishedWellgorithms() ?> of wellgorithms completed</p>
                <h3 class="section-title">My most popular Wellgorithms:</h3>
                <div class="list-my-wellgorithms">
                    <ul>
                        <? foreach( $profile_page->myMostPopularWellgorithms() as $post ) : ?>
                            <li>
                                <a href="<?= $post->guid ?>"><?= $post->post_title ?></a>
                                <span><?= $profile_page->countPassedTimeOfWellgorithm( $post->ID ) ?> times</span>
                            </li>
                        <? endforeach; ?>
                    </ul>
                </div>
 
                <h3 class="section-title">Pledge groups I belong to</h3>
                <ul>
                    <? foreach($profile_page->myPladgeGroups() as $pladgeGroupPost) : ?>
                        <li>
                            <a href="<?= get_permalink( $pladgeGroupPost ) ?>"><?= get_post( $pladgeGroupPost )->post_title ?></a>
                        </li>
                    <? endforeach; ?>
                </ul>

                <p>Are you Gratitude Bars getting too low?</p>
                <ul>
                    <?= $profile_page->getPostsByTag('gratitude') ?>
                </ul>

                <p>Blocks</p>
                <ul>
                    <?= $profile_page->getBreaktroughts('blocks') ?>
                </ul>

                <p>Braketroughts</p>
                <ul>
                    <?= $profile_page->getBreaktroughts('breaktroughts') ?>
                </ul>

                <p>Do yourself a favor today — <span onClick="this.style.behavior='url(#default#homepage)'; this.setHomePage('http://www.favorfields.com');">Make favor fields your home page</span></p>

                <a href="<?= get_permalink() ?>settings">Settings page</a>
            </div>
        </div>

        <!-- <div class="row">
            <div class="col-sm-12">
                <div class="algolia-box">
                    [HERE COMES ALGOLIA]
                </div>
            </div>
        </div> -->
    </div>
    <!--==============My Journey Section Ends Here==================== -->

    <!--==============Algolia Search Section Starts Here==================== -->
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
                                                        <div class="ais-refinement-list--item">
                                                            <div><div class="focus__items custom_facet">Politics</div>
                                                            </div>
                                                        </div>
                                                        <div class="ais-refinement-list--item">
                                                            <div>
                                                                <div class="focus__items custom_facet">Peace</div>
                                                            </div>
                                                        </div>
                                                        <div class="ais-refinement-list--item"><div>
                                                                <div class="focus__items custom_facet">Sobriety</div>
                                                            </div>
                                                        </div>
                                                        <div class="ais-refinement-list--item"><div>
                                                                <div class="focus__items custom_facet">Relaxation</div>
                                                            </div>
                                                        </div>
                                                        <div class="ais-refinement-list--item"><div>
                                                                <div class="focus__items custom_facet">Love</div>
                                                            </div>
                                                        </div>
                                                        <div class="ais-refinement-list--item"><div>
                                                                <div class="focus__items custom_facet">Kindness</div>
                                                            </div>
                                                        </div>
                                                        <div class="ais-refinement-list--item"><div>
                                                                <div class="focus__items custom_facet">Loneliness</div>
                                                            </div>
                                                        </div>
                                                        <div class="ais-refinement-list--item"><div>
                                                                <div class="focus__items custom_facet">Anger</div>
                                                            </div>
                                                        </div>
                                                        <div class="ais-refinement-list--item"><div>
                                                                <div class="focus__items custom_facet">Gratitude</div>
                                                            </div>
                                                        </div>
                                                        <div class="ais-refinement-list--item"><div>
                                                                <div class="focus__items custom_facet">Resilience</div>
                                                            </div>
                                                        </div>
                                                        <div class="ais-refinement-list--item"><div>
                                                                <div class="focus__items custom_facet">Confidence</div>
                                                            </div>
                                                        </div>
                                                        <div class="ais-refinement-list--item"><div>
                                                                <div class="focus__items custom_facet">Awakening</div>
                                                            </div>
                                                        </div>
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
    <!--==============Algolia Search Section Ends Here==================== -->
    
    <div class="container new-to-favorfield"> 
        <div class="row"> 
            <div class="col-sm-12 text-center"> 
                <h5>
                    <span> New to Favor Fields? </span>
                    <strong> Visit our A-Z page. </strong>
                </h5>
            </div>
        </div>
    </div>
</div>

<? else : ?>
    <h2>You need to be logged in to view this page</h2>
<? endif; ?>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/solid-gauge.js"></script>

<!-- Copy of JavaScript as on Homepage -->
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
        placeholder: "I'm feeling...",
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
        options: [{ start: 4, end: 4, name: 'Hellgo' }, { start: 3, end: 3, name: 'Wellgo' }, { start: 5, end: 5, name: 'Letgo' }],
        templates: {
            item: function item(data) {
                var output = "";
                if (data.name == 'Hellgo') {
                    output = "<img src='http://favorfields.wpengine.com/wp-content/uploads/2017/02/hellgo3.png'><span class='hellgo'>Hellgo</span>";
                } else if (data.name == 'Letgo') {
                    output = "<img src='http://favorfields.com/wp-content/uploads/2017/03/letgo1.png'><span class='letgo'>Letgo</span>";
                } else if (data.name == 'Wellgo') {
                    output = "<img src='http://favorfields.wpengine.com/wp-content/uploads/2017/02/wellgo1.png'><span class='wellgo'>Wellgo</span>";
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
        placeholder: "I'm seeking...",
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
        options: [{ start: 4, end: 4, name: 'Hellgo' }, { start: 3, end: 3, name: 'Wellgo' }, { start: 5, end: 5, name: 'Letgo' }],
        templates: {
            item: function item(data) {
                var output = "";
                if (data.name == 'Hellgo') {
                    output = "<img src='http://favorfields.wpengine.com/wp-content/uploads/2017/02/hellgo3.png'><span class='hellgo'>Hellgo</span>";
                } else if (data.name == 'Letgo') {
                    output = "<img src='http://favorfields.com/wp-content/uploads/2017/03/letgo1.png'><span class='letgo'>Letgo</span>";
                } else if (data.name == 'Wellgo') {
                    output = "<img src='http://favorfields.wpengine.com/wp-content/uploads/2017/02/wellgo1.png'><span class='wellgo'>Wellgo</span>";
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
<!-- Copy of JavaScript as on Homepage -->

<?php get_footer(); ?>