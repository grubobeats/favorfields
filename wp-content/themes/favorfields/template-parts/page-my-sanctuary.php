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

get_header();



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
<script>
    var ajaxurl = "<?= admin_url( 'admin-ajax.php' ) ?>";
    var permalink = "<?= get_permalink(); ?>";
    var user_id = "<?= get_current_user_id(); ?>";
    var title = "<?= get_the_title(); ?>";
    var date = <?= $profile_page->getDateRanges() ?>;
    var most_used_tags = <?= $profile_page->listMostUsedTags() ?>;
    var most_passed_wellgorithms = <?= $profile_page->listMostPopularWellgorithmsJSON() ?>;
</script>
<div class="separator" style="height: 150px; width: 100%"></div>
<!-- Main -->

<div id="main">

    <div class="my-journey">

        <h1><?= get_the_title() ?></h1>

        <div class="row">
            <div class="user-avatar"><img class="user-logo" src="<?= $avatar; ?>" alt=""></div>
            <div class="username"><?= $user->user_login ?></div>
        </div>
        <div class="calendar_row">
            <div id="calendar"></div>
        </div>
        <div class="row">
            <div id="most-used-tags"></div>
        </div>
        <div class="row">
            <div id="most-used-wellgorithms"></div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <button class="favor-trigger">Favor me</button>
                <div class="favor-menu">
                    <ul class="clearfix">
                        <li class="favor-item">
                            <span><?= $favorfields['social_first'] ?></span>
                            <ul class="favor-second-level">
                                <?
                                $list_1 = explode(PHP_EOL, $favorfields['social_first_inner']);
                                foreach ($list_1 as $li) {
                                    echo "<li class='favor-subitem'>" . $li . "</li>";
                                }
                                ?>
                            </ul>
                        </li>
                        <li class="favor-item">
                            <span><?= $favorfields['social_second'] ?></span>
                            <ul class="favor-second-level">
                                <?
                                $list_2 = explode(PHP_EOL, $favorfields['social_second_inner']);
                                foreach ($list_2 as $li) {
                                    echo "<li class='favor-subitem'>" . $li . "</li>";
                                }
                                ?>
                            </ul>
                        </li>
                        <li class="favor-item">
                            <span><?= $favorfields['social_third'] ?></span>
                            <ul class="favor-second-level">
                                <?
                                $list_3 = explode(PHP_EOL, $favorfields['social_third_inner']);
                                foreach ($list_3 as $li) {
                                    echo "<li class='favor-subitem'>" . $li . "</li>";
                                }
                                ?>
                            </ul>
                        </li>
                        <li class="favor-item"><input type="text" name="favor-text" placeholder="Write a note"></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                <a href="/my-wellgorithms">My wellgorithms</a>
            </div>
        </div>
        <div class="row">
            <h2><?= $headline ?></h2>
            <h4><?= $subhead ?></h4>
        </div>
        <div class="row">
            <p><?= $profile_page->countFinishedWellgorithms() ?> of wellgorithms completed</p>
        </div>
        <div class="row">
            <p>My most popular Wellgorithms:</p>
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
        </div>
        <div class="row">
            <p>People I’ve favored</p>
            <? $profile_page->peopleIFavored() ?>
            <ul>
                <? foreach ( $profile_page->peopleIFavored() as $user ) : ?>
                    <li>
                        <img src="<?= get_wp_user_avatar($user, 96) ?>" alt="">
                        <span><?= get_userdata($user)->data->user_login ?></span>
                    </li>
                <? endforeach; ?>
            </ul>
        </div>
        <div class="row">
            <p>People who favored me</p>
            <ul>
                <? foreach ( $profile_page->peopleFavoredMe() as $user ) : ?>
                    <li>
                        <img src="<?= get_wp_user_avatar($user, 96) ?>" alt="">
                        <span><?= get_userdata($user)->data->user_login ?></span>
                    </li>
                <? endforeach; ?>
            </ul>
        </div>
        <div class="row">
            <p>Favor points: <?= $favor_points; ?></p>
        </div>
        <div class="row">
            <p>Pledge groups I belong to</p>
            <ul>
                <? foreach($profile_page->myPladgeGroups() as $pladgeGroupPost) : ?>
                    <li>
                        <a href="<?= get_permalink( $pladgeGroupPost ) ?>"><?= get_post( $pladgeGroupPost )->post_title ?></a>
                    </li>
                <? endforeach; ?>
            </ul>
        </div>
        <div class="row">
            <p>Are you Gratitude Bars getting too low?</p>
            <ul>
                <?= $profile_page->getPostsByTag('gratitude') ?>
            </ul>
        </div>
        <div class="row">
            <p>Blocks</p>
            <ul>
                <?= $profile_page->getBreaktroughts('blocks') ?>
            </ul>
        </div>
        <div class="row">
            <p>Braketroughts</p>
            <ul>
                <?= $profile_page->getBreaktroughts('breaktroughts') ?>
            </ul>
        </div>
        <div class="row">
            <p>Do yourself a favor today — <span onClick="this.style.behavior='url(#default#homepage)'; this.setHomePage('http://www.favorfields.com');">Make favor fields your home page</span></p>
        </div>
        <div class="row">
            <a href="<?= get_permalink() ?>settings">Settings page</a>
        </div>
        <div class="row">
            <div class="algolia-box">
                [HERE COMES ALGOLIA]
            </div>
        </div>
    </div>
</div>



<? else : ?>
    <h2>You need to be logged in to view this page</h2>
<? endif; ?>

<?php get_footer(); ?>
