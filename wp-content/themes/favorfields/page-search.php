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
?>

<script src="//cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.js"></script>
<link href="//cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.css" rel="stylesheet" />

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.6.8-fix/jquery.nicescroll.min.js"></script>

<link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet" />

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Home-top-banner -->
<div class="home-top-banner">
    <h1 class="banner-title">Do yourself a favor today.</h1>
    <div class="banner-desc">Grow, laugh and love with a Wellgorithm</div>
</div>

<!-- Main -->
<div id="main">
    <section class="algolia-search-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- <div class="container">
                        <div class="row first">
                            <div class="col-sm-3 wellgo-title">
                                <img class="img-responsive" src="http://favorfields.wpengine.com/wp-content/uploads/2017/02/wellgo1.png">
                                <p>Wellgo</p>
                                <p>"A bot on a mission"</p>
                            </div>
                            <div class="col-sm-6 intro-text">
                                <p>I’m Wellgo. I was made with love, for love. I’m a new kind of bot — not that ‘computer-voiced-shiny-robot’ type. I exist because a bunch of people were in some serious emotional pain. They got together to create me. So I could help them. And you.</p>
                                <p>What are the secrets of transformation? Explore the answers in the Fields below.</p>
                            </div>
                            <div class="col-sm-3 checkboxes">
                                <ul>
                                    <li>
                                        <i class="fa fa-check-square" aria-hidden="true"></i> How do we transform?
                                    </li>
                                    <li>
                                        <i class="fa fa-check-square" aria-hidden="true"></i> Eliminate bad habits?
                                    </li>
                                    <li>
                                        <i class="fa fa-check-square" aria-hidden="true"></i> Master emotions?
                                    </li>
                                    <li>
                                        <i class="fa fa-check-square" aria-hidden="true"></i> Create a new story?
                                    </li>
                                    <li>
                                        <i class="fa fa-check-square" aria-hidden="true"></i> Heal the world?
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> -->

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
                                    <div class="facet-title"> &nbsp; </div>
                                    <div id="focus"></div>
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
                        <div class="footer">
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

        <section id="loving-kindness">
            <div class="row tex-center">
                <span class="title-span">The final frontier of Artificial Intelligence:</span>
                <h2 class="title-span">Loving Kindness.</h2>
                <div class="col-sm-8">
                    <img src="http://favorfields.com//wp-content/themes/favorfields/assets/images/video.jpg" class="img-responsive" alt="Video">
                </div>
                <div class="col-sm-4">
                    <span class="text-span">We have self-driving cars. But what about self-loving souls? </span>
                    <span class="text-span">Artificial Intelligence can help us do just about everything these days except relax. Take a deep breath. Honor the miracle of being alive. Love ourselves and others deeply – no matter our circumstances.</span>
                    <span class="text-span">In Favor Field’s, we’re re-imagining the human experience in a post-AI universe.</span>
                    <span class="text-span text-center"> <a href="#" class="btn btn-default discover-btn" title="discover"> Discover</a></span>
                </div>
            </div>
        </section> <!--loving-kindness section ends-->

        <section>
            <span class="title-span">Meet my friends — the “Favor Bots”</span>
            <div class="row">
                <div class="col-sm-4 image-inside">
                    <img class="img-responsive" src="http://favorfields.com/wp-content/uploads/2017/02/hellgo3.png">
                </div>
                <div class="col-sm-4 image-inside">
                    <img class="img-responsive" src="http://favorfields.com/wp-content/uploads/2017/02/Letgo8-1.png">
                </div>
                <div class="col-sm-4 image-inside">
                    <img class="img-responsive" src="http://favorfields.wpengine.com/wp-content/uploads/2017/02/letgo3.jpg">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <span class="text-span">HELL-O, I’m HELLGO. My hobbies include sharpening my horns, stirring up the fire, and poking fun at humans. Ok, so maybe I look a little like the devil. And maybe my name doesn’t do me any favors. But I actually CAN do you a favor. I’m here to help you turn your dark side into light … and make it so damn bright that you’ll be laughing at all your inner demons.</span>
                </div>
                <div class="col-sm-4">
                    <span class="text-span">I’m LETGO. My creators sent me down the darkest holes of addiction and despair. At first I explored alcohol, drug and food addictions, but now people are struggling with all sorts of addictions — things, thoughts, emotions, work, the need to control. At some point you crack — unless you can let go. I’m here to help you release old patterns and find your true power.</span>
                </div>
                <div class="col-sm-4">
                    <span class="text-span">Hey friends, TAOGO here. I’m not a religious bot, but I was inspired by a worldview that celebrates the underlying unity of all things. Heart, soul, mind, body, earth, stars, animals, plants, cultures and creeds — all belong to this unity. The glue that holds it all together is the Field of Loving Kindness. And Taogorithms give you a eay to enter this Field.</span>
                </div>
            </div>


            <div class="row text-center">
                <button class="button"><i class="fa fa-thumbs-up" aria-hidden="true"></i> More favor fields</button>
            </div>
        </section>

        <div class="divider"></div>

        <section id="grow-with-us">
            <div class="row tex-center">
                <span class="title-span">Come grow us.</span>
                <span class="text-span">“Our task is enormous: To look at all that has gone before us, and to recognize that each one of us, however small, has a unique task in co-creation—a unique contribution to make in the world and to humanity.”</span>
                <span class="text-span">— Edwina Gateley</span>
            </div>

            <div class="row text-center">
                <button class="button"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Put me on the waiting list</button>
            </div>

            <p class="text-center">* We’re a small community, and right now we have a waiting list. We’d love to hear from you. We protect your privacy and won’t share your email address with anyone.</p>
        </section>

        <div class="divider"></div>

        <section id="videos">
            <div class="row">
                <h2 class="h2-title">Video demos. Comming soon.</h2>
            </div>
        </section>

        <div class="divider"></div>
    </div>
</div>

    <script>
        // TODO: All of this have to be moved to the separate JS file
        
        'use strict';

        // Instasearch instance 1

        var search = instantsearch({
            appId: 'T2B04QR9B0',
            apiKey: '28985d34dee832a8f54db2e290beaec7',
            indexName: 'wp_posts_wellgorithms' // test_wellgorithms
        });

        search.addWidget(instantsearch.widgets.searchBox({
            container: '#search-box',
            placeholder: 'I am feeling...',
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
            placeholder: 'I am seeking...',
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


        /**
         * Remove colors from filters after clicking on one of them
         */
        jQuery(document).ready(function ($) {

            function justLoaded() {
                setTimeout(function(){
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

        // Sticky Menu //
        jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > 200)
            {  
                jQuery('#header').addClass("sticky");
            }
            else
            {
                jQuery('#header').removeClass("sticky");
            }
        });
    </script>

<? get_footer() ?>