<?php

add_action( 'customize_register', 'prismatic_customization' );
add_action( 'wp_head', 'prismatic_custom_styles' );

function prismatic_customization( $wp_customize ) {

	$panels = [
		'prismatic_theme_global'  => esc_html__( 'Theme: Global',  'prismatic' ),
		'prismatic_theme_header'  => esc_html__( 'Theme: Header',  'prismatic' ),
		'prismatic_theme_content' => esc_html__( 'Theme: Content', 'prismatic' ),
		'prismatic_theme_footer'  => esc_html__( 'Theme: Footer',  'prismatic' )
	];

	foreach ( $panels as $panel => $label ) {
		$wp_customize->add_panel( $panel, [
			'title'    => $label,
			'priority' => 100
		] );
	}

	/// ---------------------------------------------
	/// Global Settings
	/// ---------------------------------------------

	$wp_customize->get_section( 'custom_css' )->panel = 'prismatic_theme_global';
	$wp_customize->get_section( 'custom_css' )->priority = 5;
	$wp_customize->get_control( 'background_color' )->section = 'background_image';
	$wp_customize->get_section( 'background_image' )->panel = 'prismatic_theme_global';
	$wp_customize->get_section( 'background_image' )->section = 'colors';
	$wp_customize->get_section( 'background_image' )->title = esc_html__( 'Background', 'prismatic' );
	$wp_customize->get_section( 'background_image' )->priority = 10;

	/// ---------------------------------------------
	/// Header Settings
	/// ---------------------------------------------
	$wp_customize->add_section( 'prismatic_theme_header_section', [
		'title' => esc_html__( 'Background', 'prismatic' ),
		'panel' => 'prismatic_theme_header'
	] );

	// Add background image setting and control
	$wp_customize->add_setting( 'prismatic_theme_header_background', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'prismatic_theme_header_background', array(
		'label'    => __( 'Background Image', 'prismatic' ),
		'section'  => 'prismatic_theme_header_section',
		'settings' => 'prismatic_theme_header_background',
		'priority' => 10, // Adjust the priority as needed
	) ) );

	$wp_customize->get_section( 'title_tagline' )->panel = 'prismatic_theme_header';
	$wp_customize->get_section( 'static_front_page' )->panel = 'prismatic_theme_content';
}

function prismatic_custom_styles() {
	$background_color = get_theme_mod( 'theme_global_background', '#0B5E79' );

	$styles = '';

	if ( $background_color ) {
		$styles .= "background: $background_color";
	}

	if ( $styles ) {
		echo '<style type="text/css" id="custom-background-styles">';
		echo '.site-header, .site-footer { ' . $styles . ' }';
		echo '</style>';
	}

}
