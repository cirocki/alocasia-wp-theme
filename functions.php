<?php

/**
 * Alocasia Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Alocasia_Theme
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function alocasia_theme_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Alocasia Theme, use a find and replace
		* to change 'alocasia_theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('alocasia_theme', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'alocasia_theme'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'alocasia_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'alocasia_theme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function alocasia_theme_content_width()
{
	$GLOBALS['content_width'] = apply_filters('alocasia_theme_content_width', 640);
}
add_action('after_setup_theme', 'alocasia_theme_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function alocasia_theme_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'alocasia_theme'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'alocasia_theme'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'alocasia_theme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function alocasia_theme_scripts()
{
	wp_enqueue_style('alocasia_theme-style', get_stylesheet_uri(), array(), _S_VERSION);

	wp_enqueue_script('alocasia_theme-navigation', get_template_directory_uri() . '/js/scripts.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'alocasia_theme_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

// CUSTOM ADMIN PANEL COLOR SCHEME 
// CREATE YOUR STYLES HERE 
// https://wpadmincolors.com/ 
function alocasia_admin_color_scheme()
{
	//Get the theme directory
	$theme_dir = get_stylesheet_directory_uri();

	//alocasia
	wp_admin_css_color(
		'alocasia',
		__('alocasia'),
		$theme_dir . '/alocasia.css',
		array('#111111', '#ffffff', '#ff0000', '#4a987a')
	);
}
add_action('admin_init', 'alocasia_admin_color_scheme');


// CUSTOM LOGIN PAGE STYLES 
function my_custom_login()
{
	echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/custom-login-styles.css" />';
}
add_action('login_head', 'my_custom_login');


// CHANGE EXCERPT LENGTH 
function wpdocs_custom_excerpt_length($length)
{
	return 20;
}
add_filter('excerpt_length', 'wpdocs_custom_excerpt_length', 999);
