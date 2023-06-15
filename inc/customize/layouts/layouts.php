<?php

add_action( 'customize_register', 'prismatic_customize_layouts' );

function prismatic_customize_layouts( $wp_customize ) {

	//
	$wp_customize->add_section( 'prismatic_global_layout', [
		'title' => esc_html__( 'Global Layout', 'prismatic' ),
		'panel' => 'prismatic_theme_content'

	] );

	$wp_customize->add_setting( 'prismatic_global_layout', array(
		'default'           => 'left-sidebar',
		'sanitize_callback' => 'prismatic_sanitize_layout',
		'transport'         => 'refresh',
		'type'              => 'theme_mod',
	) );

	$wp_customize->add_control( new Prismatic_Radio_Image_Control( $wp_customize, 'prismatic_global_layout', array(
		'label'     => __('General Layout', 'prismatic'),
		'description'   => __('General Layout applies to all layouts that supports in this theme.', 'prismatic'),
		'section'   => 'prismatic_global_layout',
		'settings'  => 'prismatic_global_layout',
		'type'      => 'radio-image',
		'choices'  => array(
			'left-sidebar'  => trailingslashit(get_template_directory_uri()) . 'assets/images/2cl.png',
			'right-sidebar' => trailingslashit(get_template_directory_uri()) . 'assets/images/2cr.png',
			'no-sidebar'    => trailingslashit(get_template_directory_uri()) . 'assets/images/1col.png',
		),
	)));
}

function prismatic_sanitize_layout($value) {
	if (!in_array($value, array('left-sidebar', 'right-sidebar', 'no-sidebar'))) {
		$value = 'left-sidebar';
	}
	return $value;
}
