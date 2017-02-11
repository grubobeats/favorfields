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
<html <?php language_attributes(); ?> vladan>
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

    <!-- Header -->
    <header id="header">
        <div class="inner">

            <!-- Logo -->
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
                <span class="symbol"><img src="/wp-content/uploads/2017/02/logo-1.png" alt="" /></span><span class="title"><?php bloginfo( 'description')?></span>
            </a>

            <!-- Nav -->
            <nav>
                <ul>
                    <li><a href="#menu">Menu</a></li>
                </ul>
            </nav>

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