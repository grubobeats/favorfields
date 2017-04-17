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

require_once 'logic.php';
global $post;
global $favorfields;

$welgorithm = $logic->getWellghoritm();
$ct_prefix = is_singular('my_wellgorithms') ? "user_" : "";

$color_scheme = $welgorithm[$ct_prefix.'basic_settings_color-template'][0];

$color_1 = $logic->getColorTemplate($color_scheme, 'basic_settings_color-1');
$color_2 = $logic->getColorTemplate($color_scheme, 'basic_settings_color-2');
$color_3 = $logic->getColorTemplate($color_scheme, 'basic_settings_color-3');
$color_4 = $logic->getColorTemplate($color_scheme, 'basic_settings_color-4');
$buttons_style = strtolower( $logic->getColorTemplate($color_scheme, 'basic_settings_buttons_style') );
$main_png = $logic->getColorTemplate($color_scheme, 'basic_settings_main_png');
$favor_png = $logic->getColorTemplate($color_scheme, 'basic_settings_favor_png');

if( !$buttons_style ) {
	$buttons_style = "circle";
}

if( !$favor_png ) {
	$favor_png = "http://favorfields.com/wp-content/themes/favorfields/assets/images/favor-img.png";
}

$category = get_the_category();
// $category_name = ($category[0]->name == "Hellgo") ? "Hellgorithm" : "Wellgorithm";
$category_name = $category[0]->name;


$user = wp_get_current_user();
if ( $user->ID == 0 ) {
	$username = "Guest";
	$avatar = $favorfields['guest-avatar']['url'];
} else {
	$username = $user->user_login;
	$avatar = get_wp_user_avatar($user->ID, 96);
}


$cookie_name = "banner_image";
$banner_image_src = ( get_the_post_thumbnail_url() ) ? get_the_post_thumbnail_url() : $logic->getRandomImage($color_scheme, true);
setcookie($cookie_name, $banner_image_src, time() + (3600), "/");
$subhead = ($welgorithm['basic_settings_subhead'][0]) ? $welgorithm['basic_settings_subhead'][0] : "It is time to do the";
?>
<head>
    <title><?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description')?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="<?php get_template_directory_uri() ?>js/ie/html5shiv.js"></script><![endif]-->
	<?php wp_head(); ?>

    <style>.color-1 { color: <?= $color_1 ?> !important; } .color-2 { color: <?= $color_2 ?> !important; } .color-3 { color: <?= $color_3 ?> !important; } .color-4 { color: <?= $color_4 ?> !important; } .background-color-1 { background-color: <?= $color_1 ?> !important; } .background-color-2 { background-color: <?= $color_2 ?> !important; } .background-color-3 { background-color: <?= $color_3 ?> !important; } .background-color-4 { background-color: <?= $color_4 ?> !important; } .border-color-1 { border-color: <?= $color_1 ?> !important; } .border-color-2 { border-color: <?= $color_2 ?> !important; } .border-color-3 { border-color: <?= $color_3 ?> !important; } .border-color-4 { border-color: <?= $color_4 ?> !important; } .box-shadow-color-1 { box-shadow: 0 0 0 1px <?= $color_1 ?> !important; } .border-left-color-1 {border-left-color: <?= $color_1?> !important;} .border-left-color-2 {border-left-color: <?= $color_2 ?> !important;} .border-left-color-3 {border-left-color: <?= $color_3?> !important;} .border-left-color-4 {border-left-color: <?= $color_4?> !important;}
        .border-before-color-1::before {
            border-color: <?= $color_1 ?> !important;
        }
        .border-before-color-2::before {
            border-color: <?= $color_2 ?> !important;
        }
        .border-before-color-3::before {
            border-color: <?= $color_3 ?> !important;
        }
        .border-before-color-4::before {
            border-color: <?= $color_4 ?> !important;
        }

        .background-color-before-color-1::before {
            background-color: <?= $color_1 ?> !important;
        }
        .background-color-before-color-2::before {
            background-color: <?= $color_2 ?> !important;
        }
        .background-color-before-color-3::before {
            background-color: <?= $color_3 ?> !important;
        }
        .background-color-before-color-4::before {
            background-color: <?= $color_4 ?> !important;
        }

        .background-color-after-color-1::after {
            background-color: <?= $color_1 ?> !important;
        }
        .background-color-after-color-2::after {
            background-color: <?= $color_2 ?> !important;
        }
        .background-color-after-color-3::after {
            background-color: <?= $color_3 ?> !important;
        }
        .background-color-after-color-4::after {
            background-color: <?= $color_4 ?> !important;
        }

        .cs-background-image {
            background-image: url("<?= $favor_png?>") !important;
        }

        .cs-image-overlayed {
            background-image: url("<?= $banner_image_src; ?>");
        }
    </style>

    <script>
        var ajaxurl = "<?= admin_url( 'admin-ajax.php' ) ?>";
    </script>
</head>
<body <?php body_class(); ?>>
<!-- Wrapper -->
<div id="wrapper" class="wellgorithms">

    <header id="header" class="header-class homepage background-color-1 wellgorithms">
        <div class="inner top-bar">
            <div class="left-header">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img class="main-logo" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/ff-logo.png" alt="Favor Fields">
                </a>
            </div>


            <div class="right-header">
				<? if ( is_user_logged_in() ) :
                    $pladge_icon = '<img src="' . get_template_directory_uri() . '/assets/images/favor-icon.png" alt="Favor">';
                    $icon = ( $logic->checkPladged()['permission'] == "true" ) ? "" : $pladge_icon;
				?>
                    <a href="javascript:void(0)" class="favor-cion"><?= $icon; ?></a>
                <? endif; ?>
                <div class="wellgo-test-counts"> <?= $logic->countPassingTimes() ?> </div>
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