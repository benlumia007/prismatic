<?php

/**
 * Enqueue scripts and styles.
 */
function prismatic_scripts() {

	// Rather than loading the style.css stylesheet, we are going to enqueue screen.css
	wp_enqueue_style( 'prismatic-screen', prismatic_asset( 'css/screen.css' ), null, null );
	wp_enqueue_style( 'prismatic-open-sans', get_parent_theme_file_uri( 'assets/fonts/open-sans/open-sans.css' ) );
	wp_enqueue_style( 'prismatic-crimson',   get_parent_theme_file_uri( 'assets/fonts/crimson/crimson.css' ) );

	wp_enqueue_script( 'prismatic-app', prismatic_asset( 'js/app.js' ), [ 'jquery' ], null, true );

	// Enqueue Navigation.
	wp_enqueue_script( 'prismatic-navigation', prismatic_asset( 'js/navigation.js' ), null, null, true );
	wp_localize_script( 'prismatic-navigation', 'prismaticScreenReaderText', [
		'expand'   => '<span class="screen-reader-text">' . esc_html__( 'expand child menu', 'prismatic' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . esc_html__( 'collapse child menu', 'prismatic' ) . '</span>',
	] );

	// Loads ClassicPress' comment-reply script where appropriate.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'prismatic_scripts' );
