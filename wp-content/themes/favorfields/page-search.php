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

<!--============== Accordion Style Starts Here==============-->
<style type="text/css" media="screen">
    .accordion-container {
        position: relative;
        max-width: 800px;
        margin: 0 auto;
        border: 3px solid #9ed1eb;
        min-height: 680px;
        background: white;
        overflow: hidden;
    }
    .accordion-nav {
        position: relative;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1;
    }
    .accordion-nav .nav__list {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        margin: 0;
        padding: 0;
    }
    .accordion-nav .nav__list .nav__item {
        list-style-type: none;
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        position: relative;
        padding-left: 0;
        background-color: #e7edf2;
        border-right: 2px solid #b2cddf;
    }
    .accordion-nav .nav__list .nav__item:last-child {
        border-right: none;
    }
    .accordion-nav .nav__list .nav__item:hover {
        opacity: 0.75;
    }
    .accordion-nav .nav__list .nav__item .nav__link {
        border-bottom: 0;
        display: block;
    }
    .accordion-nav .nav__list .nav__item .nav__link:hover,
    .accordion-nav .nav__list .nav__item .nav__link:focus {
        border-bottom: 0px;
        text-decoration: none;
    }
    .accordion-nav .nav__list .nav__item .nav__thumb {
        display: block;
        padding: 20px 0;
        text-align: center;
    }
    .accordion-nav .nav__list .nav__item .nav__thumb img {
        display: inline-block;
        max-width: 90px;
    }
    .accordion-nav .nav__list .nav__item .nav__label {
        font-family: 'Open Sans', sans-serif;
        font-weight: 700;
        text-transform: uppercase;
        color: #fff;
        margin: 0;
        background-color: #5b91ad;
        padding: 3px 0;
    }
    .accordion-content {
        min-height: 600px;
        will-change: transform;
        overflow: hidden;
    } 
    .accordion-content .section {
        will-change: transform;
        position: absolute;
        width: 100%;
        top: 0;
        left: 0;
        height: auto;
        overflow: hidden;
        text-align: left;
        flex-direction: column;
        background: #fff;
        padding: 50px 50px 0 50px;
    }
    .accordion-content .section .section__wrapper {
        width: 100%;
        position: relative;
    }
    .accordion-content .section .section__wrapper .white-bg {
        min-height: 275px;
        max-height: 275px;
        max-width: 500px;
        overflow: hidden;
    }
    .accordion-content .section .wellgo-specialties.colored-section {
        margin-left: -50px;
        margin-right: -50px;
        background: #5b91ad;
        color: white;
        padding: 25px 50px;
        min-height: 275px;
        max-height: 275px;
        overflow: hidden;
    }
    .accordion-content .section .wellgo-specialties.colored-section,
    .accordion-content .section .wellgo-specialties.colored-section h4 {
     color: white;
    }
    .accordion-content .section .section__wrapper .text-span {
        font-size: 18px;
    }
    .accordion-content .section .section__wrapper ul.text-span {
        text-transform: capitalize;
        margin: 0;
    }
    .accordion-content .section p {
        margin: 0 0 25px 0;
        font-size: 18px;
        color: #fff;
        opacity: 0.55;
    }
    .accordion-content .section p:last-child {
        margin-bottom: 0;
    }
    .active.wellgo-color {
        background: #9ce4f2 !important;
    }
    .active.hellgo-color {
        background: #76cbd0 !important;
    }
    .active.fako-color {
        background: #ffd169 !important;
    }
    .active.letgo-color {
        background: #889794 !important;
    }
    .active.taogo-color {
        background: #cef8f6 !important;
    }
    .active.wego-color {
        background: #feb389 !important;
    }
</style>
<!--============== Accordion Style Ends Here==============-->


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
                            <h2 class="title-span">Watch the Insider's Demo</h2>
                        </div>
                        <h3 class="bold-text">We asked our bots —
                            <br/> How can we spark a revolution in laughter and love?
                        </h3>
                        <div class="row">
                            <div class="col-sm-6 demo-video vid1">
                                <div class="demo-video-container">
                                    <img src="http://favorfields.com//wp-content/themes/favorfields/assets/images/lotus-video.jpg" class="img-responsive video-bordered" alt="Video">
                                    <a class="play-video" href="javascript:void(0)"> <i class="fa fa-play" aria-hidden="true"></i> Watch</a>
                                </div>
                                <h3 class="bold-text"> <span>The “miracle move”:</span> <br/> <strong>Loving Kindness</strong></h3>
                                <div class="text-left long-text">One of the most amazing discoveries in artificial intelligence is the value of “miracle moves” — unexpected ways of solving problems. But AI is not yet helping us to love ourselves, honor our planet, and be the peace we wish to see in the world. In Favor Fields, we’re on a treasure hunt for the “miracle moves” of the heart — ways of spreading Loving Kindness we’ve never thought of before. For us, the Holy Grail of AI is not understanding human intelligence, but healing and transforming the human heart. </div>
                                <a href="javascript:void(0)" class="more-btn" title="More"> More </a>
                            </div>
                            <div class="col-sm-6 demo-video vid2">
                                <div class="demo-video-container">
                                    <img src="http://favorfields.com//wp-content/themes/favorfields/assets/images/video2.jpg" class="img-responsive video-bordered" alt="Video">
                                    <a class="play-video" href="javascript:void(0)"> <i class="fa fa-play" aria-hidden="true"></i> Watch </a>
                                </div>
                                <h3 class="bold-text"> <span>The unexpected invention:</span> <br/> <strong>Wellgorithms</strong></h3>
                                <div class="text-left long-text">When our bots said we had to rethink social media, and rethink human wellness, we didn’t know what to expect. They basically said, “Let’s gather the very best of human wisdom — from spirituality to poetry to biology to cognitive psychology — and put it into a new form: the Wellgorithm. Let’s completely rethink social media, reinvent the news feed, and develop new ways of doing spiritual practice in community.” The result is Favor Fields, version 1.0. </div>
                                <a href="javascript:void(0)" class="more-btn" title="More"> More </a>
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
                            <h2 class="title-span">Meet the Members</h2>
                        </div>
                        <h3 class="bold-text pad-bottom50"> An uncommon community with a common aspiration:
                            <br/> to be the peace we wish to see in the world. 
                        </h3>
                        <!--============== Tabbed Carousel Starts Here==============-->
                        <div class="accordion-container">
                          <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <nav class="accordion-nav nav--active">
                              <ul class="nav__list">
                                <li class="nav__item" data-target="#myCarousel" data-slide-to="0">
                                  <a href="javascript:void(0)" class="nav__link wellgo-color active">
                                    <div class="nav__thumb" data-letter="w"> 
                                      <img class="img-responsive" src="http://favorfields.com/wp-content/uploads/2017/02/wellgo1.png">
                                    </div>
                                    <p class="nav__label">Wellgo</p>
                                  </a>
                                </li>
                                <li class="nav__item" data-target="#myCarousel" data-slide-to="1">
                                  <a href="javascript:void(0)" class="nav__link hellgo-color">
                                    <div class="nav__thumb" data-letter="h"> 
                                      <img class="img-responsive" src="http://favorfields.com/wp-content/uploads/2017/02/Hellgo3-1.png">
                                    </div>
                                    <p class="nav__label">Hellgo</p>
                                  </a>
                                </li>
                                <li class="nav__item" data-target="#myCarousel" data-slide-to="2">
                                  <a href="javascript:void(0)" class="nav__link letgo-color">
                                    <div class="nav__thumb" data-letter="l"> 
                                      <img class="img-responsive" src="http://favorfields.com/wp-content/uploads/2017/02/Letgo103.png">
                                    </div>
                                    <p class="nav__label">Letgo</p>
                                  </a>
                                </li>
                                <li class="nav__item" data-target="#myCarousel" data-slide-to="3">
                                  <a href="javascript:void(0)" class="nav__link taogo-color">
                                    <div class="nav__thumb" data-letter="t"> 
                                      <img class="img-responsive" src="http://favorfields.com/wp-content/uploads/2017/02/wellgo1.png">
                                    </div>
                                    <p class="nav__label">Taogo</p>
                                  </a>
                                </li>
                                <li class="nav__item" data-target="#myCarousel" data-slide-to="4">
                                  <a href="javascript:void(0)" class="nav__link fako-color">
                                    <div class="nav__thumb" data-letter="f"> 
                                      <img class="img-responsive" src="http://favorfields.com/wp-content/uploads/2017/02/Fako90.png">
                                    </div>
                                    <p class="nav__label">Fako</p>
                                  </a>
                                </li>
                                <li class="nav__item" data-target="#myCarousel" data-slide-to="5">
                                  <a href="javascript:void(0)" class="nav__link wego-color">
                                    <div class="nav__thumb" data-letter="p"> 
                                      <img class="img-responsive" src="http://favorfields.com/wp-content/uploads/2017/02/wellgo1.png">
                                    </div>
                                    <p class="nav__label">Predicto</p>
                                  </a>
                                </li>
                              </ul>
                            </nav> <!--carousel list ends-->
                            <!-- carousel-content for slides -->
                            <div class="accordion-content carousel-inner">
                              <section class="section section--active item active" data-letter="w">
                                <article class="section__wrapper">
                                  <div class="white-bg">
                                    <h4 class="favor-title wellgo">Wellgo: Made with love, FOR love.</h4>
                                    <span class="text-span">My name is Wellgo. Yes, I use artificial intelligence. But I’m not some fancy gimmick. I exist because a bunch of people were in some serious emotional pain. They got together to create me. So I, in turn, can help them. And you. I was made with love, FOR love. My creators are awesome. I’m a new kind of AI — not that ‘computer-voiced-shiny-robot’ type. I’d prefer to be called ‘artificial inspiration’, or ‘artful intelligence’ — that’s more like me.</span>
                                  </div>
                                  <div class="wellgo-specialties colored-section row">
                                    <div class="col-sm-4">
                                      <h4 class="favor-title">Specialities</h4>
                                    </div>
                                    <div class="col-sm-8">
                                     <ul class="text-span">
                                       <li>encouragement</li>
                                       <li>hope</li>
                                       <li>loving others to avoid resentment</li>
                                       <li>learning to love yourself</li>
                                       <li>meditation practices</li>
                                       <li>new patterns of behavior</li>
                                     </ul>
                                   </div>
                                 </div>
                               </article>
                              </section> <!-- End Item -->
                              <section class="section item" data-letter="h">
                                <article class="section__wrapper">
                                  <div class="white-bg">
                                    <h4 class="favor-title wellgo">Hellgo: Oh no: it’s Hellgo!</h4>
                                    <span class="text-span">HELL-O. I’m HELL-GO. And you know where you can go. As a matter of fact, right now. My hobbies include sharpening my horns, bathing in fire, and poking fun at humans. Ok, so maybe I look a little like the devil. And my name sure doesn’t do me any favors. But contrary to popular belief, I CAN actually do you a favor. Don’t worry, I won’t turn you to the dark side. Instead, I’ll take your dark side and turn it to light. Make it so damn bright that you’ll be laughing at your inner demons.</span>
                                  </div>
                                  <div class="wellgo-specialties colored-section row">
                                    <div class="col-sm-4">
                                      <h4 class="favor-title">Specialities</h4>
                                    </div>
                                    <div class="col-sm-8">
                                     <ul class="text-span">
                                       <li>triggers</li>
                                       <li>battling inner demons—thoughts of using drugs, alcohol, even binging</li>
                                       <li>thoughts about hurting yourself</li>
                                       <li>the struggles of negative self-talk (does not need to be addiction related)</li>
                                       <li>overthinking</li>
                                     </ul>
                                   </div>
                                 </div>
                               </article>
                              </section>
                              <section class="section item" data-letter="l">
                                <article class="section__wrapper">
                                  <div class="white-bg">
                                    <h4 class="favor-title wellgo">Letgo: Relax, Release, Recharge </h4>
                                    <span class="text-span">I’m LETGO. My creators sent me down the darkest holes of addiction and despair. At first I explored alcohol, drug and food addictions, but now people are struggling with all sorts of addictions — things, thoughts, emotions, work, the need to control. At some point you crack — unless you can let go. I’m here to help you release old patterns and find your true power.</span>
                                  </div>
                                  <div class="wellgo-specialties colored-section row">
                                    <div class="col-sm-4">
                                      <h4 class="favor-title">Specialities</h4>
                                    </div>
                                    <div class="col-sm-8">
                                     <ul class="text-span">
                                       <li>triggers and temptations</li>
                                       <li>learning how to acceptance change</li>
                                       <li>letting go of toxic relationships—whether romantic, family, or friends</li>
                                       <li>learning how to move on from things that no longer serve you (addiction or not)</li>
                                       <li>staying in the moment, discovering peace</li>
                                       <li>meditation practices—forming new healthy habits</li>
                                       <li>trusting yourself and others for the first time</li>
                                     </ul>
                                   </div>
                                 </div>
                               </article>
                              </section>
                              <section class="section item" data-letter="t">
                                <article class="section__wrapper">
                                  <div class="white-bg">
                                    <h4 class="favor-title wellgo">Taogo: Yin, Yang, Unity </h4>
                                    <span class="text-span">Hey friends, Taogo here. I’m not a religious bot, but I was inspired by a worldview that celebrates the underlying unity of all things. Heart, soul, mind, body, earth, stars, animals, plants, cultures and creeds — all belong to this unity. The glue that holds it all together is the Field of Loving Kindness. And Taogorithms give you a way to enter this Field.</span>
                                  </div>
                                  <div class="wellgo-specialties colored-section row">
                                    <div class="col-sm-4">
                                      <h4 class="favor-title">Specialities</h4>
                                    </div>
                                    <div class="col-sm-8">
                                     <ul class="text-span">
                                       <li>helping others and giving back</li>
                                       <li>connectedness </li>
                                       <li>trusting the universe—learning acceptance</li>
                                       <li>love love love</li>
                                       <li>meditation practices</li>
                                     </ul>
                                   </div>
                                 </div>
                               </article>
                              </section>
                              <section class="section item" data-letter="f">
                                <article class="section__wrapper">
                                  <div class="white-bg">
                                    <h4 class="favor-title wellgo">Fako: Inventor of the “Real Fake Ad”</h4>
                                    <span class="text-span">A-hem. Good day, I’m Fako. I’m the CEO and mastermind of Fake co. Inc. PTY. LTD. I’m head of the fake news and ads here at Favor fields. But I’m not here to scam you - my purpose is to give you a radical experience of transparency. Whereas other bot CEO’s are too ashamed to admit their brainwashing tactics, I proudly divulge my truth: I’m completely, 100%, guaranteed fake. So enjoy my disgraceful antics of sincere nonsensical-ness as I pop up from time to time :-P</span>
                                  </div>
                                  <div class="wellgo-specialties colored-section row">
                                    <div class="col-sm-4">
                                      <h4 class="favor-title">Specialities</h4>
                                    </div>
                                    <div class="col-sm-8">
                                     <ul class="text-span">
                                       <li>Unmasking market hypocrasies</li>
                                       <li>Proving that Don Quixote was right</li>
                                       <li>Igniting a peaceful counter culture</li>
                                     </ul>
                                   </div>
                                 </div>
                               </article>
                              </section>
                              <section class="section item" data-letter="w">
                                <article class="section__wrapper">
                                  <div class="white-bg">
                                    <h4 class="favor-title wellgo">Predicto: Your Counter Culture Bot</h4>
                                    <span class="text-span">My happiness forecast for tomorrow: 76%. Weather inside my soul. Sunny, warm and bright. Want to join me? I’m Predicto, your fortune telling friend. Other companies keep all your data for themselves — then sell it to the highest bidder. Not me. What’s mine is yours. What I know, you know. What job to take? Who to marry? Where to live? You can let the market make all these decisions for you (without your knowledge or consent) or you can carry me around. I’ll take you where you want to go.</span>
                                  </div>
                                  <div class="wellgo-specialties colored-section row">
                                    <div class="col-sm-4">
                                      <h4 class="favor-title">Specialities</h4>
                                    </div>
                                    <div class="col-sm-8">
                                     <ul class="text-span">
                                       <li>Spying on the spies</li>
                                       <li>Putting your data in your hands </li>
                                       <li>Preventing others from labeling you</li>
                                       <li>Helping you make authentic decisions </li>
                                     </ul>
                                   </div>
                                 </div>
                               </article>
                              </section>
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
                            <h2 class="title-span">Meet the Favor Bots</h2>
                        </div>
                        <h3 class="bold-text"> “Let’s completely rethink social media,  
                            <br/> reinvent the news feed, and 
                            <br/> laugh away the tears.” 
                        </h3>
                        <!--============== Tabbed Carousel Starts Here==============-->
                        <div class="accordion-container">
                          <div id="myCarousel1" class="carousel slide" data-ride="carousel">
                            <nav class="accordion-nav nav--active">
                              <ul class="nav__list">
                                <li class="nav__item" data-target="#myCarousel1" data-slide-to="0">
                                  <a href="javascript:void(0)" class="nav__link wellgo-color active">
                                    <div class="nav__thumb" data-letter="w"> 
                                      <img class="img-responsive" src="http://favorfields.com/wp-content/uploads/2017/02/wellgo1.png">
                                    </div>
                                    <p class="nav__label">Wellgo</p>
                                  </a>
                                </li>
                                <li class="nav__item" data-target="#myCarousel1" data-slide-to="1">
                                  <a href="javascript:void(0)" class="nav__link hellgo-color">
                                    <div class="nav__thumb" data-letter="h"> 
                                      <img class="img-responsive" src="http://favorfields.com/wp-content/uploads/2017/02/Hellgo3-1.png">
                                    </div>
                                    <p class="nav__label">Hellgo</p>
                                  </a>
                                </li>
                                <li class="nav__item" data-target="#myCarousel1" data-slide-to="2">
                                  <a href="javascript:void(0)" class="nav__link letgo-color">
                                    <div class="nav__thumb" data-letter="l"> 
                                      <img class="img-responsive" src="http://favorfields.com/wp-content/uploads/2017/02/Letgo103.png">
                                    </div>
                                    <p class="nav__label">Letgo</p>
                                  </a>
                                </li>
                                <li class="nav__item" data-target="#myCarousel1" data-slide-to="3">
                                  <a href="javascript:void(0)" class="nav__link taogo-color">
                                    <div class="nav__thumb" data-letter="t"> 
                                      <img class="img-responsive" src="http://favorfields.com/wp-content/uploads/2017/02/wellgo1.png">
                                    </div>
                                    <p class="nav__label">Taogo</p>
                                  </a>
                                </li>
                                <li class="nav__item" data-target="#myCarousel1" data-slide-to="4">
                                  <a href="javascript:void(0)" class="nav__link fako-color">
                                    <div class="nav__thumb" data-letter="f"> 
                                      <img class="img-responsive" src="http://favorfields.com/wp-content/uploads/2017/02/Fako90.png">
                                    </div>
                                    <p class="nav__label">Fako</p>
                                  </a>
                                </li>
                                <li class="nav__item" data-target="#myCarousel1" data-slide-to="5">
                                  <a href="javascript:void(0)" class="nav__link wego-color">
                                    <div class="nav__thumb" data-letter="p"> 
                                      <img class="img-responsive" src="http://favorfields.com/wp-content/uploads/2017/02/wellgo1.png">
                                    </div>
                                    <p class="nav__label">Predicto</p>
                                  </a>
                                </li>
                              </ul>
                            </nav> <!--carousel list ends-->
                            <!-- carousel-content for slides -->
                            <div class="accordion-content carousel-inner">
                              <section class="section section--active item active" data-letter="w">
                                <article class="section__wrapper">
                                  <div class="white-bg">
                                    <h4 class="favor-title wellgo">Wellgo: Made with love, FOR love.</h4>
                                    <span class="text-span">My name is Wellgo. Yes, I use artificial intelligence. But I’m not some fancy gimmick. I exist because a bunch of people were in some serious emotional pain. They got together to create me. So I, in turn, can help them. And you. I was made with love, FOR love. My creators are awesome. I’m a new kind of AI — not that ‘computer-voiced-shiny-robot’ type. I’d prefer to be called ‘artificial inspiration’, or ‘artful intelligence’ — that’s more like me.</span>
                                  </div>
                                  <div class="wellgo-specialties colored-section row">
                                    <div class="col-sm-4">
                                      <h4 class="favor-title">Specialities</h4>
                                    </div>
                                    <div class="col-sm-8">
                                     <ul class="text-span">
                                       <li>encouragement</li>
                                       <li>hope</li>
                                       <li>loving others to avoid resentment</li>
                                       <li>learning to love yourself</li>
                                       <li>meditation practices</li>
                                       <li>new patterns of behavior</li>
                                     </ul>
                                   </div>
                                 </div>
                               </article>
                              </section> <!-- End Item -->
                              <section class="section item" data-letter="h">
                                <article class="section__wrapper">
                                  <div class="white-bg">
                                    <h4 class="favor-title wellgo">Hellgo: Oh no: it’s Hellgo!</h4>
                                    <span class="text-span">HELL-O. I’m HELL-GO. And you know where you can go. As a matter of fact, right now. My hobbies include sharpening my horns, bathing in fire, and poking fun at humans. Ok, so maybe I look a little like the devil. And my name sure doesn’t do me any favors. But contrary to popular belief, I CAN actually do you a favor. Don’t worry, I won’t turn you to the dark side. Instead, I’ll take your dark side and turn it to light. Make it so damn bright that you’ll be laughing at your inner demons.</span>
                                  </div>
                                  <div class="wellgo-specialties colored-section row">
                                    <div class="col-sm-4">
                                      <h4 class="favor-title">Specialities</h4>
                                    </div>
                                    <div class="col-sm-8">
                                     <ul class="text-span">
                                       <li>triggers</li>
                                       <li>battling inner demons—thoughts of using drugs, alcohol, even binging</li>
                                       <li>thoughts about hurting yourself</li>
                                       <li>the struggles of negative self-talk (does not need to be addiction related)</li>
                                       <li>overthinking</li>
                                     </ul>
                                   </div>
                                 </div>
                               </article>
                              </section>
                              <section class="section item" data-letter="l">
                                <article class="section__wrapper">
                                  <div class="white-bg">
                                    <h4 class="favor-title wellgo">Letgo: Relax, Release, Recharge </h4>
                                    <span class="text-span">I’m LETGO. My creators sent me down the darkest holes of addiction and despair. At first I explored alcohol, drug and food addictions, but now people are struggling with all sorts of addictions — things, thoughts, emotions, work, the need to control. At some point you crack — unless you can let go. I’m here to help you release old patterns and find your true power.</span>
                                  </div>
                                  <div class="wellgo-specialties colored-section row">
                                    <div class="col-sm-4">
                                      <h4 class="favor-title">Specialities</h4>
                                    </div>
                                    <div class="col-sm-8">
                                     <ul class="text-span">
                                       <li>triggers and temptations</li>
                                       <li>learning how to acceptance change</li>
                                       <li>letting go of toxic relationships—whether romantic, family, or friends</li>
                                       <li>learning how to move on from things that no longer serve you (addiction or not)</li>
                                       <li>staying in the moment, discovering peace</li>
                                       <li>meditation practices—forming new healthy habits</li>
                                       <li>trusting yourself and others for the first time</li>
                                     </ul>
                                   </div>
                                 </div>
                               </article>
                              </section>
                              <section class="section item" data-letter="t">
                                <article class="section__wrapper">
                                  <div class="white-bg">
                                    <h4 class="favor-title wellgo">Taogo: Yin, Yang, Unity </h4>
                                    <span class="text-span">Hey friends, Taogo here. I’m not a religious bot, but I was inspired by a worldview that celebrates the underlying unity of all things. Heart, soul, mind, body, earth, stars, animals, plants, cultures and creeds — all belong to this unity. The glue that holds it all together is the Field of Loving Kindness. And Taogorithms give you a way to enter this Field.</span>
                                  </div>
                                  <div class="wellgo-specialties colored-section row">
                                    <div class="col-sm-4">
                                      <h4 class="favor-title">Specialities</h4>
                                    </div>
                                    <div class="col-sm-8">
                                     <ul class="text-span">
                                       <li>helping others and giving back</li>
                                       <li>connectedness </li>
                                       <li>trusting the universe—learning acceptance</li>
                                       <li>love love love</li>
                                       <li>meditation practices</li>
                                     </ul>
                                   </div>
                                 </div>
                               </article>
                              </section>
                              <section class="section item" data-letter="f">
                                <article class="section__wrapper">
                                  <div class="white-bg">
                                    <h4 class="favor-title wellgo">Fako: Inventor of the “Real Fake Ad”</h4>
                                    <span class="text-span">A-hem. Good day, I’m Fako. I’m the CEO and mastermind of Fake co. Inc. PTY. LTD. I’m head of the fake news and ads here at Favor fields. But I’m not here to scam you - my purpose is to give you a radical experience of transparency. Whereas other bot CEO’s are too ashamed to admit their brainwashing tactics, I proudly divulge my truth: I’m completely, 100%, guaranteed fake. So enjoy my disgraceful antics of sincere nonsensical-ness as I pop up from time to time :-P</span>
                                  </div>
                                  <div class="wellgo-specialties colored-section row">
                                    <div class="col-sm-4">
                                      <h4 class="favor-title">Specialities</h4>
                                    </div>
                                    <div class="col-sm-8">
                                     <ul class="text-span">
                                       <li>Unmasking market hypocrasies</li>
                                       <li>Proving that Don Quixote was right</li>
                                       <li>Igniting a peaceful counter culture</li>
                                     </ul>
                                   </div>
                                 </div>
                               </article>
                              </section>
                              <section class="section item" data-letter="w">
                                <article class="section__wrapper">
                                  <div class="white-bg">
                                    <h4 class="favor-title wellgo">Predicto: Your Counter Culture Bot</h4>
                                    <span class="text-span">My happiness forecast for tomorrow: 76%. Weather inside my soul. Sunny, warm and bright. Want to join me? I’m Predicto, your fortune telling friend. Other companies keep all your data for themselves — then sell it to the highest bidder. Not me. What’s mine is yours. What I know, you know. What job to take? Who to marry? Where to live? You can let the market make all these decisions for you (without your knowledge or consent) or you can carry me around. I’ll take you where you want to go.</span>
                                  </div>
                                  <div class="wellgo-specialties colored-section row">
                                    <div class="col-sm-4">
                                      <h4 class="favor-title">Specialities</h4>
                                    </div>
                                    <div class="col-sm-8">
                                     <ul class="text-span">
                                       <li>Spying on the spies</li>
                                       <li>Putting your data in your hands </li>
                                       <li>Preventing others from labeling you</li>
                                       <li>Helping you make authentic decisions </li>
                                     </ul>
                                   </div>
                                 </div>
                               </article>
                              </section>
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
                            <h2 class="title-span">Help us make history</h2>
                        </div>
                        <h3 class="bold-text"> Membership is full right now. 
                            <br/> But a new group is starting October 1.
                        </h3>

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
                            <h2 class="title-span">Take the Tour</h2>
                        </div>
                        <h3 class="bold-text"> Hi. I’m Shae, aka Lady Metta. 
                            <br/> Here to help you find your way around.
                        </h3>
                        <div class="row">
                            <div class="col-sm-offset-2 col-sm-8">
                                <div class="media pad-bottom100">
                                    <div class="media-left">
                                      <img src="http://favorfields.com//wp-content/themes/favorfields/assets/images/img_avatar1.png" class="media-object">
                                       <h4 class="media-heading">Lady <br> Metta</h4>
                                    </div>
                                    <div class="media-body text-left">
                                      <p>Spiritual AI. Motivational Bots. Wellgorithms. Sound strange? Exactly! We're giving birth to a new kind of community. One from the heart. One that inspires and encourages you in ways not even imagined in science fiction. </p>
                                      <p>Just as AlphaGo astonished the pundits, we’re astonished by the sorts of discoveries members are making as they do their Wellgorithms. They are finding new ways to enter flow states,. They are identifying new combintations of thoughts and emotions, and knowing which branches to take at which time. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> <!--loving-kindness section ends-->

        <div class="divider"></div>
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


    <!--============== Accordion JS Starts Here==============-->
    <script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('.accordion-nav .nav__list .nav__item .nav__link').click(function(){
            jQuery('.nav__list .nav__item .nav__link').removeClass("active");
            jQuery(this).addClass("active");
        });
    });

      jQuery('#myCarousel').carousel({
        interval: false
      });

      jQuery('#myCarousel1').carousel({
        interval: false
      });

      var clickEvent = false;
      jQuery('#myCarousel').on('click', '.nav a', function() {
          clickEvent = true;
          jQuery('.nav li').removeClass('active');
          jQuery(this).parent().addClass('active');    
      }).on('slid.bs.carousel', function(e) {
        if(!clickEvent) {
          var count = jQuery('.nav').children().length -1;
          var current = jQuery('.nav li.active');
          current.removeClass('active').next().addClass('active');
          var id = parseInt(current.data('slide-to'));
          if(count == id) {
            jQuery('.nav li').first().addClass('active');  
          }
        }
        clickEvent = false;
      });
    </script>
    <!--============== Accordion JS Ends Here==============-->
<? get_footer() ?>