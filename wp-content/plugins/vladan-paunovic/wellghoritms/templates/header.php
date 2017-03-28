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


    $ct_prefix = is_singular('my_wellgorithms') ? "user_" : "";

    $color_scheme = $welgorithm[$ct_prefix.'basic_settings_color-template'][0];

    $color_1 = $logic->getColorTemplate($color_scheme, 'basic_settings_color-1');
    $color_2 = $logic->getColorTemplate($color_scheme, 'basic_settings_color-2');
    $color_3 = $logic->getColorTemplate($color_scheme, 'basic_settings_color-3');
    $color_4 = $logic->getColorTemplate($color_scheme, 'basic_settings_color-4');

    $category = get_the_category();
//    $category_name = ($category[0]->name == "Hellgo") ? "Hellgorithm" : "Wellgorithm";
    $category_name = $category[0]->name;

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
    <title><?php bloginfo( 'name' ); ?> - <?= get_the_title() ?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="<?php get_template_directory_uri() ?>js/ie/html5shiv.js"></script><![endif]-->
    <?php wp_head(); ?>

    <style>.color-1 { color: <?= $color_1 ?> !important; } .color-2 { color: <?= $color_2 ?> !important; } .color-3 { color: <?= $color_3 ?> !important; } .color-4 { color: <?= $color_4 ?> !important; } .background-color-1 { background-color: <?= $color_1 ?> !important; } .background-color-2 { background-color: <?= $color_2 ?> !important; } .background-color-3 { background-color: <?= $color_3 ?> !important; } .background-color-4 { background-color: <?= $color_4 ?> !important; } .border-color-1 { border-color: <?= $color_1 ?> !important; } .border-color-2 { border-color: <?= $color_2 ?> !important; } .border-color-3 { border-color: <?= $color_3 ?> !important; } .border-color-4 { border-color: <?= $color_4 ?> !important; } .box-shadow-color-1 { box-shadow: 0 0 0 1px <?= $color_1 ?> !important; } </style>

</head>
<body <?php body_class('background-color-2'); ?>>
<!-- Wrapper -->
<div id="wrapper">

    <!-- Header -->
    <header id="header" class="header-class background-color-1">
        <div class="inner top-bar">
            <div class="left-header">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img class="logo" src="<?= $favorfields['logo']['url'];?>" alt="" />
                </a>
                <img class="wellgo-icon" src="<?= $welgorithm['basic_settings_icon'][0] ?>" alt="" >
                <span class="category"><?= $category_name; ?></span>
            </div>


            <span class="title"><?= get_the_title(); ?></span>

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
    <nav id="menu" class="background-color-4">
        <h2>Menu</h2>
        <?php wp_nav_menu( array(
            'theme_location' => 'primary',
            'menu_id' => 'primary-menu',
            'container' => false
        ) ); ?>
    </nav>