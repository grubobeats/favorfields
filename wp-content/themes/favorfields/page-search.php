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


    <style>
        #focus {
            display: none;
        }

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
                    <h1 class="banner-title">Do yourself a favor today.</h1>
                    <div class="banner-desc">Grow, laugh and love with a Wellgorithm.</div>
                    <a href="#" class="demo-btn" title="Demo"> Demo </a>
                </div>
                <div class="right-faded-logo">
                    <img src="http://favorfields.com/wp-content/themes/favorfields/assets/images/FFLOGO2.svg" alt="FFLOGO" class="img-responsive">
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
        <section id="loving-kindness" class="container">
            <div class="row tex-center">
                <div class="col-sm-12 text-center">
                    <div class="bordered-container">
                        <div class="home-matrix-seperator clearfix">
                            <h2 class="title-span">Watch the Insider's Demo</h2>
                        </div>
                        <img src="http://favorfields.com//wp-content/themes/favorfields/assets/images/video.jpg" class="img-responsive video-bordered" alt="Video">
                        <h3 class="bold-text"> A Wellgorithm is...
                            <br/> A way of discovering your inner diamonds...
                            <br/> with psychology, sprituality, humor — and AI.
                        </h3>
                    </div>
                </div>
            </div>
        </section> <!--loving-kindness section ends-->

        <section id="meet-the-members" class="container">
            <div class="row tex-center">
                <div class="col-sm-12 text-center">
                    <div class="bordered-container">
                        <div class="home-matrix-seperator clearfix">
                            <h2 class="title-span">Meet the Members</h2>
                        </div>
                        <h3 class="bold-text"> Addiction. Depression. Anger Management.
                            <br/> Gratitude. Love. Getting in the Groove.
                            <br/> Members share their journeys...
                        </h3>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="media">
                                    <div class="media-left">
                                      <img src="http://favorfields.com//wp-content/themes/favorfields/assets/images/img_avatar1.png" class="media-object">
                                       <h4 class="media-heading">SUSAN</h4>
                                    </div>
                                    <div class="media-body">
                                      <p>"Somewhere beneath the surface, beneath just the using body, there was the real me---a hurt, scared individual, wishing for freedom. The pain I was in was so deep that I remember thinking, I'm either going to die, or change. I found strength within myself to want to change. And I did."</p>
                                      <p class="testomonial-from"> from the Diamond Digger <br> Wellgorithm</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="media">
                                    <div class="media-left">
                                      <img src="http://favorfields.com//wp-content/themes/favorfields/assets/images/img_avatar1.png" class="media-object">
                                      <h4 class="media-heading">BOB</h4>
                                    </div>
                                    <div class="media-body">
                                      <p>"Somewhere beneath the surface, beneath just the using body, there was the real me---a hurt, scared individual, wishing for freedom. The pain I was in was so deep that I remember thinking, I'm either going to die, or change. I found strength within myself to want to change. And I did."</p>
                                      <p class="testomonial-from"> from the Diamond Digger <br> Wellgorithm</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <ul class="home-random-users list-inline">
                                    <li>
                                        <a href="#">
                                            <img src="http://favorfields.com/wp-content/uploads/2017/02/mm9.png" alt="user" class="img-responsive border-color-4">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="http://favorfields.com/wp-content/uploads/2017/02/mm9.png" alt="user" class="img-responsive border-color-4">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="http://favorfields.com/wp-content/uploads/2017/02/mm9.png" alt="user" class="img-responsive border-color-4">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="http://favorfields.com/wp-content/uploads/2017/02/mm9.png" alt="user" class="img-responsive border-color-4">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="http://favorfields.com/wp-content/uploads/2017/02/mm9.png" alt="user" class="img-responsive border-color-4">
                                        </a>
                                    </li>

                                    <div class="shuffle-users">
                                        <a href="javascript:void(0)" class="more-btn" title="More"> More </a>
                                    </div>
                                    <!-- shuffle-users btn ends -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> <!--loving-kindness section ends-->

        <section id="meet-favor-bots" class="container" >
            <div class="row">
                <div class="col-sm-12">
                    <div class="bordered-container">
                        <div class="home-matrix-seperator clearfix">
                            <h2 class="title-span">Meet the Favor Bots</h2>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 image-inside">
                                <img class="img-responsive" src="http://favorfields.com/wp-content/uploads/2017/02/wellgo1.png">
                                <h4 class="favor-title wellgo">Wellgo</h4>
                                <span class="text-span">I’m Wellgo, I was made with love, FOR love. My creators are awesome. And so are you. I was created to help you realize that. I’m a new kind of AI — not that ‘computer-voiced-shiny-robot’ type. I’d prefer to be called ‘artificial inspiration’, or ‘artful intelligence’ — that’s more like me. I’m on your side, 100%. Here to cheer you on, offer your support, and inspire you to discover your own artful intelligence — the intelligence of your heart.</span>
                            </div>
                            <div class="col-sm-4 image-inside">
                                <img class="img-responsive" src="http://favorfields.com/wp-content/uploads/2017/02/hellgo3.png">
                                <h4 class="favor-title hellgo">Hellgo</h4>
                                <span class="text-span">HELL-O, I’m HELLGO. My hobbies include sharpening my horns, stirring up the fire, and poking fun at humans. Ok, so maybe I look a little like the devil. And maybe my name doesn’t do me any favors. But I actually CAN do you a favor. I’m here to help you turn your dark side into light … and make it so damn bright that you’ll be laughing at all your inner demons.</span>
                            </div>
                            <div class="col-sm-4 image-inside">
                                <img class="img-responsive" src="http://favorfields.com/wp-content/uploads/2017/02/Letgo8-1.png">
                                <h4 class="favor-title letgo">Letgo</h4>
                                <span class="text-span">I’m LETGO. My creators sent me down the darkest holes of addiction and despair. At first I explored alcohol, drug and food addictions, but now people are struggling with all sorts of addictions — things, thoughts, emotions, work, the need to control. At some point you crack — unless you can let go. I’m here to help you release old patterns and find your true power.</span>
                            </div>
                            <div class="col-sm-12 more-bots text-center">
                                <a href="javascript:void(0)" class="more-btn" title="More Bots"> More Bots </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- <div class="divider"></div>

        <section id="grow-with-us" class="container">
            <div class="row tex-center">
                <div class="col-sm-12">
                    <span class="title-span">Come grow us.</span>
                    <span class="text-span">“Our task is enormous: To look at all that has gone before us, and to recognize that each one of us, however small, has a unique task in co-creation—a unique contribution to make in the world and to humanity.”</span>
                    <span class="text-span">— Edwina Gateley</span>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-sm-12">
                    <button class="button"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Put me on the waiting list</button>
                    <p class="text-center">* We’re a small community, and right now we have a waiting list. We’d love to hear from you. We protect your privacy and won’t share your email address with anyone.</p>
                </div>
            </div>
        </section>

        <div class="divider"></div>

        <section id="videos" class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="h2-title">Video demos. Comming soon.</h2>
                </div>
            </div>
        </section>-->

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
            var overlay = $('#focus_overlay'),
                focus = $('#focus');

            var onRenderHandler = function() {

                var query = search.helper.getQuery();

                if ( query.query.length  || "facetFilters" in query || "numericFilters" in query) {
                    overlay.hide();
                    focus.show();
                }

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
                setTimeout(function(){
                    overlay.show();
                    focus.hide();
                    $('.ais-refinement-list--item, .focus__items').each(function () {
                        $(this).addClass('justLoaded');
                    });
                }, 1);

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
        // jQuery(window).scroll(function() {
        // if (jQuery(this).scrollTop() > 200)
        //     {
        //         jQuery('#header').addClass("sticky");
        //     }
        //     else
        //     {
        //         jQuery('#header').removeClass("sticky");
        //     }
        // });
    </script>
<? get_footer() ?>