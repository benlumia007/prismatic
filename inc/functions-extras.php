<?php
/**
 * Functions which enhance the theme by hooking into ClassicPress
 *
 * @package Prismatic
 */

/**
 * Add Laravel Mix assets
 */
function prismatic_asset( $path ) {

	// Get the Laravel Mix manifest.
	$manifest = prismatic_parent_asset();

	// Make sure to trim any slashes from the front of the path.
	$path = '/' . ltrim( $path, '/' );

	// Retrieve the path from the manifest, or null if not found.
	$manifestPath = $manifest[$path] ?? null;

	// Get the parent theme's directory URI.
	$themeDirectoryUri = get_template_directory_uri();

	// Construct the URL with the desired path from the manifest.
	return trailingslashit( $themeDirectoryUri ) . 'assets' . $manifestPath;
}

function prismatic_parent_asset() {

	$file = get_template_directory() . '/' . 'assets/mix-manifest.json';

	return file_exists( $file ) ? json_decode( file_get_contents( $file ), true ) : null;
}

function prismatic_custom_background() {
	$background  = get_background_color();
	$image       = get_background_image();
	$header_text = get_header_textcolor();

	$style = '';

	if ( $background ) {
			$style .= 'body { background: #' . $background . ' }';
	}

	if ( $image ) {
		$style .= 'body { background: url( ' . $image .  ' ) repeat scroll top left }';
	}

	if ( $header_text ) {
		$style .= '.site-header .branding-navigation .site-branding .site-title a { color: #' . $header_text .  '}';
	}

	if ( ! display_header_text() ) {
		$style .= '.site-header .branding-navigation .site-branding .site-title, .site-header .branding-navigation .site-branding .site-description { display: none }';
	}

	echo '<style>';
	echo esc_html( $style );
	echo '</style>';
}

