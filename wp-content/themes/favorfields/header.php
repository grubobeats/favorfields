<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FavorFields
 */

?><!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<?php
global $favorfields;
$user = wp_get_current_user();
if ( $user->ID == 0 ) {
    $username = "Guest";
    $avatar = $favorfields['guest-avatar']['url'];
} else {
    $username = $user->user_login;
    $avatar = get_wp_user_avatar($user->ID, 96);
}
?>
<head>
    <title><?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description')?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="<?php get_template_directory_uri() ?>js/ie/html5shiv.js"></script><![endif]-->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- Wrapper -->
<div id="wrapper">

    <header id="header" class="header-class homepage background-color-1">
        <div class="inner top-bar">
            <div class="left-header">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img class="logo" src="<?= $favorfields['logo']['url'];?>" alt="<?php bloginfo( 'description')?>" />
                </a>
                <img class="main-logo" src="<?= $favorfields['main-logo']['url'] ?>" alt="<?php bloginfo( 'description')?>" >
                <span class="category"><?= $category_name; ?></span>
            </div>


            <span class="title"><?php bloginfo( 'description')?></span>

            <div class="right-header">
                <div class="user"><?= $username ?></div>
                <img class="user-logo" src="<?= $avatar; ?>" alt="">
                <!-- Nav -->
                <nav>
                    <ul>
                        <li><a href="#menu">Menu</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- Menu -->
    <nav id="menu">

            <h2>Menu</h2>
            <?php wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_id' => 'primary-menu',
                'container' => false
            ) ); ?>
    </nav>