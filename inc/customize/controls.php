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

	/// ----------------------------------------------------------------------------------------------------------------
	///  Theme Header
	/// ----------------------------------------------------------------------------------------------------------------

	$manager->add_control( new WP_Customize_Color_Control( $manager, 'prismatic_theme_header_site_branding', array(
		'label'    => __( 'Site Branding Color', 'prismatic' ),
		'section'  => 'prismatic_theme_header_background',
		'settings' => 'prismatic_theme_header_site_branding',
		'priority' => 20, // Adjust the priority as needed
	) ) );

	// Add a new control
	$manager->add_control( new WP_Customize_Color_Control( $manager, 'prismatic_theme_header_background', array(
		'label'    => 'Background Color',
		'section'  => 'prismatic_theme_header_background',
		'settings' => 'prismatic_theme_header_background',
	) ) );

	// Add a new control
	$manager->add_control( new WP_Customize_Color_Control( $manager, 'prismatic_theme_footer_background', array(
		'label'    => 'Background Color',
		'section'  => 'prismatic_theme_footer_colors',
		'settings' => 'prismatic_theme_footer_background',
	) ) );

	$manager->add_control( 'prismatic_theme_footer_credit', [
		'label' => esc_html__( 'Credit', 'prismatic' ),
		'type' => 'textarea',
		'section' => 'prismatic_theme_footer_credit'
	] );
}
