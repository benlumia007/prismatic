<?php

add_action( 'customize_register', 'prismatic_customization' );
add_action( 'wp_head', 'prismatic_custom_styles' );

function prismatic_customization( $wp_customize ) {

	$panels = [
		'theme_global'  => esc_html__( 'Theme: Global',  'prismatic' ),
		'theme_header'  => esc_html__( 'Theme: Header',  'prismatic' ),
		'theme_content' => esc_html__( 'Theme: Content', 'prismatic' ),
		'theme_footer'  => esc_html__( 'Theme: Footer',  'prismatic' )
	];

	foreach ( $panels as $panel => $label ) {
		$wp_customize->add_panel( $panel, [
			'title'    => $label,
			'priority' => 100
		] );
	}

	$wp_customize->add_section( 'theme_global_background', [
		'title' => esc_html__( 'Background', 'pristmatic' ),
		'panel' => 'theme_global',
	] );

	$wp_customize->add_setting('theme_global_background', array(
		'default'   => '#0B5E79',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_global_background', array(
		'label'     => esc_html__('Background Color', 'camaraderie'),
		'section'   => 'theme_global_background',
		'settings'  => 'theme_global_background',
		'priority'  => 10
	)));

	$wp_customize->get_section( 'custom_css' )->panel = 'theme_global';
	$wp_customize->get_section( 'title_tagline' )->panel = 'theme_header';
	$wp_customize->get_section( 'static_front_page' )->panel = 'theme_content';
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
