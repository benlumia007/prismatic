<?php
/**
 * Prismatic functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Prismatic
 */

/**
 * Sets up theme defaults and registers support for various ClassicPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function prismatic_setup() {

	// Let ClassicPress manage the document title.
	add_theme_support( 'title-tag' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Output HTML5 markup for core features.
	add_theme_support( 'html5', [
		'caption',
		'comment-form',
		'comment-list',
		'gallery',
		'search-form'
	] );

	// Load theme translations.
	load_theme_textdomain( 'prismatic', get_parent_theme_file_path( 'languages' ) );
}
add_action( 'after_setup_theme', 'prismatic_setup' );

/**
 * Enqueue scripts and styles.
 */
function prismatic_scripts() {

	// Rather than loading the style.css stylesheet, we are going to enqueue screen.css
	wp_enqueue_style( 'prismatic-screen', prismatic_asset( 'css/screen.css' ), null, null );
	wp_enqueue_style( 'prismatic-open-sans', get_parent_theme_file_uri( 'assets/fonts/open-sans/open-sans.css' ) );
	wp_enqueue_style( 'prismatic-crimson',   get_parent_theme_file_uri( 'assets/fonts/crimson/crimson.css' ) );

	wp_enqueue_script( 'creativity-app', prismatic_asset( 'js/app.js' ), [ 'jquery' ], null, true );

	// Enqueue Navigation.
	wp_enqueue_script( 'prismatic-navigation', prismatic_asset( 'js/navigation.js' ), null, null, true );
	wp_localize_script( 'prismatic-navigation', 'prismaticScreenReaderText', [
		'expand'   => '<span class="screen-reader-text">' . esc_html__( 'expand child menu', 'prismatic' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . esc_html__( 'collapse child menu', 'prismatic' ) . '</span>',
	] );
}
add_action( 'wp_enqueue_scripts', 'prismatic_scripts' );

function prismatic_menus() {
	register_nav_menus( [
		'primary'	=> esc_html__( 'Primary Navigation', 'prismatic' ),
		'social' => esc_html__( 'Social Navigation', 'prismatic' )
	] );
}
add_action( 'init', 'prismatic_menus', 5 );

/**
 * Register sidebars.
 *
 * @link   https://developer.wordpress.org/reference/functions/register_sidebar/
 * @link   https://developer.wordpress.org/reference/functions/register_sidebars/
 * @since  1.0.0
 * @access public
 * @return void
 */
function prismatic_widgets() {
	$args = [
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	];

	$sidebars = [
		[
			'id' => 'primary',
			'name' => esc_html__( 'Primary', 'creativity' )
		],
		[
			'id' => 'secondary',
			'name' => esc_html__( 'Secondary', 'creativity' )
		],
		[
			'id' => 'custom',
			'name' => esc_html__( 'Custom', 'creativity' )
		],
	];

	foreach ( $sidebars as $sidebar ) {
		register_sidebar(array_merge($sidebar, $args));
	}
}
add_action( 'widgets_init', 'prismatic_widgets' );

require_once get_parent_theme_file_path( 'inc/functions-extras.php' );
require_once get_parent_theme_file_path( 'inc/functions-filters.php' );
