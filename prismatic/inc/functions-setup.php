<?php

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

	// Adds featured image support.
	add_theme_support( 'post-thumbnails' );

	/**
	 * By add_image_size( 'prismatic-small-thumbnails', 324, 324, true );. This should be used for content in the home for blogs.
	 */
	add_image_size( 'prismatic-small-thumbnails', 324, 324, true );

	/**
	 * By add_image_size( 'prismatic-medium-thumbnails', 810, 396, true );. This should be used for content that has sidebars.
	 */
	add_image_size( 'prismatic-medium-thumbnails', 810, 396, true );

	/**
	 * By add_image_size( 'prismatic-large-thumbnails', 1170, 614, true );. This should be used for content that has no sidebars.
	 */
	add_image_size( 'prismatic-large-thumbnails', 1170, 614, true );

	$defaults = array(
		'default-image'    =>  '',
		'default-color'    => 'ffffff',
		'wp-head-callback' => 'prismatic_custom_background' // Callback function for custom background style
	);
	add_theme_support( 'custom-background', $defaults );

	add_theme_support( 'custom-logo', [
		'flex-height' => true,
		'flex-width' => true,
		'height' => 38,
		'width' => null
	] );

	add_theme_support( 'custom-header', [
			'default-text-color' => '000000',
			'default-image'      => '',
			'height'             => 500,
			'max-width'          => 2000,
			'width'              => 2000,
			'flex-height'        => false,
			'flex-width'         => false,
	] );


	// Load theme translations.
	load_theme_textdomain( 'prismatic', get_parent_theme_file_path( 'languages' ) );
}
add_action( 'after_setup_theme', 'prismatic_setup' );

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
			'name' => esc_html__( 'Primary', 'prismatic' )
		],
		[
			'id' => 'secondary',
			'name' => esc_html__( 'Secondary', 'prismatic' )
		],
		[
			'id' => 'custom',
			'name' => esc_html__( 'Custom', 'prismatic' )
		],
	];

	foreach ( $sidebars as $sidebar ) {
		register_sidebar(array_merge($sidebar, $args));
	}
}
add_action( 'widgets_init', 'prismatic_widgets' );
