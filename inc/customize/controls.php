<?php
/**
 * Theme Customizer - Controls
 *
 * @package   Prismatic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://github.com/benlumia007/prismatic
 */

add_action( 'customize_register', 'prismatic_customize_controls' );

function prismatic_customize_controls( $manager ) {

	/// ----------------------------------------------------------------------------------------------------------------
	///  Theme Global
	/// ----------------------------------------------------------------------------------------------------------------

	$manager->get_control( 'background_color' )->section = 'background_image';

	// Register a control for the dropdown
	$manager->add_control( 'prismatic_theme_global_layout', array(
		'label'    => __( 'Layout', 'prismatic' ),
		'description' => esc_html__( 'Select the layout used across the site.', 'prismatic' ),
		'section'  => 'prismatic_theme_global_layout', // Replace with your own section ID
		'settings' => 'prismatic_theme_global_layout',
		'type'     => 'select',
		'choices'  => array(
			'wide' => __( 'Wide', 'prismatic' ),
			'Full' => __( 'Full', 'prismatic' ),
		),
	) );

	/// ----------------------------------------------------------------------------------------------------------------
	///  Theme Header
	/// ----------------------------------------------------------------------------------------------------------------

	// Add a new control
	$manager->add_control( new WP_Customize_Color_Control( $manager, 'prismatic_theme_header_border', array(
		'label'    => 'Header: Border',
		'section'  => 'prismatic_theme_header_colors',
		'settings' => 'prismatic_theme_header_border',
		'priority' => 5
	) ) );

	// Add a new control
	$manager->add_control( new WP_Customize_Color_Control( $manager, 'prismatic_theme_header_background', array(
		'label'    => 'Header: Background',
		'section'  => 'prismatic_theme_header_colors',
		'settings' => 'prismatic_theme_header_background',
		'priority' => 5
	) ) );

	// Add a new control
	$manager->add_control( new WP_Customize_Color_Control( $manager, 'prismatic_theme_header_site_description', array(
		'label'    => 'Header: Site Description',
		'section'  => 'prismatic_theme_header_colors',
		'settings' => 'prismatic_theme_header_site_description',
		'priority' => 15
	) ) );


	// Add a new control
	$manager->add_control( new WP_Customize_Color_Control( $manager, 'prismatic_theme_footer_border', array(
		'label'    => 'Footer: Border',
		'section'  => 'prismatic_theme_footer_colors',
		'settings' => 'prismatic_theme_footer_border',
		'priority' => 5
	) ) );


	// Add a new control
	$manager->add_control( new WP_Customize_Color_Control( $manager, 'prismatic_theme_footer_background', array(
		'label'    => 'Footer: Background',
		'section'  => 'prismatic_theme_footer_colors',
		'settings' => 'prismatic_theme_footer_background',
	) ) );

	// Add a new control
	$manager->add_control( new WP_Customize_Color_Control( $manager, 'prismatic_theme_footer_text_color', array(
		'label'    => 'Footer: Text',
		'section'  => 'prismatic_theme_footer_colors',
		'settings' => 'prismatic_theme_footer_text_color',
	) ) );

	// Add a new control
	$manager->add_control( new WP_Customize_Color_Control( $manager, 'prismatic_theme_footer_text_link_color', array(
		'label'    => 'Footer: Link',
		'section'  => 'prismatic_theme_footer_colors',
		'settings' => 'prismatic_theme_footer_text_link_color',
	) ) );

	$manager->add_control( 'prismatic_theme_footer_credit', [
		'label' => esc_html__( 'Credit', 'prismatic' ),
		'type' => 'textarea',
		'section' => 'prismatic_theme_footer_credit'
	] );

	$manager->get_control( 'header_textcolor' )->section = 'prismatic_theme_header_colors';
	$manager->get_control( 'header_textcolor' )->label = esc_html__( 'Header: Site Title', 'prismatic' );
	$manager->get_control( 'header_textcolor' )->priority = 10;
}
