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
	$background = get_background_color();
	$image = get_background_image();

	if ( $background ) { ?>
		<style>
			body {
				background: #<?php echo esc_attr( $background ); ?>;
			}
		</style>
	<?php }

	if ( $image ) { ?>
		<style>
			body {
				background: url('<?php echo esc_attr( $image ); ?>') repeat scroll top left;
			}
		</style>
	<?php }
}

