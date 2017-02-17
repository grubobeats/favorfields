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
    $welgorithm = $logic->getWellghoritm();
    $color_scheme = $welgorithm['basic_settings_color-template'][0];
    $category = get_the_category();
    $color_1 = $logic->getColorTemplate($color_scheme, 'basic_settings_color-1');
    $color_2 = $logic->getColorTemplate($color_scheme, 'basic_settings_color-2');
    $color_3 = $logic->getColorTemplate($color_scheme, 'basic_settings_color-3');
    $color_4 = $logic->getColorTemplate($color_scheme, 'basic_settings_color-4');
?>
<head>
    <title><?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description')?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="<?php get_template_directory_uri() ?>js/ie/html5shiv.js"></script><![endif]-->
    <?php wp_head(); ?>

    <style>.color-1 { color: <?= $color_1 ?> !important; } .color-2 { color: <?= $color_2 ?> !important; } .color-3 { color: <?= $color_3 ?> !important; } .color-4 { color: <?= $color_4 ?> !important; } .background-color-1 { background-color: <?= $color_1 ?> !important; } .background-color-2 { background-color: <?= $color_2 ?> !important; } .background-color-3 { background-color: <?= $color_3 ?> !important; } .background-color-4 { background-color: <?= $color_4 ?> !important; } .border-color-1 { border-color: <?= $color_1 ?> !important; } .border-color-2 { border-color: <?= $color_2 ?> !important; } .border-color-3 { border-color: <?= $color_3 ?> !important; } .border-color-4 { border-color: <?= $color_4 ?> !important; }</style>

</head>
<body <?php body_class('background-color-2'); ?>>
<!-- Wrapper -->
<div id="wrapper">

    <!-- Header -->
    <header id="header" class="header-class background-color-1">
        <div class="inner top-bar">

            <div class="left-separator"></div>

            <img src="<?= $welgorithm['basic_settings_icon'][0] ?>" alt="" class="wellgo-icon">

            <!-- Logo -->
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
                <span class="symbol">
                    <img src="<?= $favorfields['logo']['url'];?>" alt="" />
                </span>
                <span class="category">
                    <?= $category[0]->name; ?>
                </span>
            </a>

            <span class="title"><?= get_the_title(); ?></span>

            <!-- Nav -->
            <nav>
                <ul>
                    <li><a href="#menu">Menu</a></li>
                </ul>
            </nav>

        </div>
    </header>

    <!-- Menu -->
    <nav id="menu" class="background-color-4">

        <h2>Menu</h2>
        <?php wp_nav_menu( array(
            'theme_location' => 'primary',
            'menu_id' => 'primary-menu',
            'container' => false
        ) ); ?>
    </nav>