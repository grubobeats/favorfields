<?php
/**
 * FavorFields functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package FavorFields
 */

if ( ! function_exists( 'favorfields_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function favorfields_setup() {

	/*
	 * Add Redux Framework
	 */
	require get_template_directory() . '/admin/admin-init.php';

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on FavorFields, use a find and replace
	 * to change 'favorfields' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'favorfields', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'favorfields' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'favorfields_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // favorfields_setup
add_action( 'after_setup_theme', 'favorfields_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function favorfields_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'favorfields_content_width', 640 );
}
add_action( 'after_setup_theme', 'favorfields_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function favorfields_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'favorfields' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'favorfields_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function favorfields_scripts() {
    // Styles
    wp_enqueue_style( 'favorfields-main-style', get_template_directory_uri() . '/assets/css/main.css');

    // Scripts
	wp_enqueue_script( 'favorfields-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'favorfields-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'favorfields-skel', get_template_directory_uri() . '/js/skel.min.js', array(), '20130115', true );
	wp_enqueue_script( 'favorfields-respond-ie', get_template_directory_uri() . '/js/ie/respond.min.js', array(), '20130115', true );
	wp_enqueue_script( 'favorfields-main', get_template_directory_uri() . '/js/main.js', array(), '20130115', true );
	wp_enqueue_script( 'favorfields-font-awesome', 'https://use.fontawesome.com/795c526065.js', array(), '20130115', false );

	// Scripts & Styles for algolia search
    wp_enqueue_style( 'favorfields-font-awesome', get_template_directory_uri() . '/assets/css/algolia-styles.css' );
//    wp_enqueue_script( 'favorfields-font-awesome', get_template_directory_uri() . '/js/algolia_search.js', array(), '20130115', false );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'favorfields_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Removing admin bar from front-end
 */
function hide_admin_bar_from_front_end(){
    if (is_blog_admin()) {
        return true;
    }
    return false;
}
add_filter( 'show_admin_bar', 'hide_admin_bar_from_front_end' );


/**
 * Add sub pages to wellgorithms
 */

$my_fake_pages = array(
    'social' => 'Social',
);

add_filter('rewrite_rules_array', 'fsp_insertrules');
add_filter('query_vars', 'fsp_insertqv');

// Adding fake pages' rewrite rules
function fsp_insertrules($rules)
{
    global $my_fake_pages;

    $newrules = array();
    foreach ($my_fake_pages as $slug => $title)
        $newrules['wellgorithms/([^/]+)/' . $slug . '/?$'] = 'index.php?wellgorithms=$matches[1]&fpage=' . $slug;

    return $newrules + $rules;
}

// Tell WordPress to accept our custom query variable
function fsp_insertqv($vars)
{
    array_push($vars, 'fpage');
    return $vars;
}

// Remove WordPress's default canonical handling function

remove_filter('wp_head', 'rel_canonical');
add_filter('wp_head', 'fsp_rel_canonical');
function fsp_rel_canonical()
{
    global $current_fp, $wp_the_query;

    if (!is_singular())
        return;

    if (!$id = $wp_the_query->get_queried_object_id())
        return;

    $link = trailingslashit(get_permalink($id));

    // Make sure fake pages' permalinks are canonical
    if (!empty($current_fp))
        $link .= user_trailingslashit($current_fp);

    echo '<link rel="canonical" href="'.$link.'" />';
}


function googleTagManager() {
    ?>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-5W88FZB');</script>
    <!-- End Google Tag Manager -->

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5W88FZB"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php
}

add_action( 'wp_head', 'googleTagManager' );


/**
 * Add dynamic url for users
 */

add_filter('query_vars', 'add_state_var', 0, 1);
function add_state_var($vars){
    $vars[] = 'creator';
    return $vars;
}

add_rewrite_rule('^my-wellgorithms/([^/]+)/?$','index.php?pagename=my-wellgorithms&creator=$matches[1]','top');


