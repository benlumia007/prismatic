<?php
/**
 * Theme Customizer - Sections
 *
 * @package   Prismatic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://github.com/benlumia007/prismatic
 */

add_action( 'customize_register', 'prismatic_customize_sections' );

function prismatic_customize_sections( $manager ) {

	/// ----------------------------------------------------------------------------------------------------------------
	///  Theme Global
	/// ----------------------------------------------------------------------------------------------------------------

	// Additional CSS
	$manager->get_section( 'custom_css' )->panel = 'prismatic_theme_global';
	$manager->get_section( 'custom_css' )->priority = 5;

	// Background Colors and Images
	$manager->get_section( 'background_image' )->panel = 'prismatic_theme_global';
	$manager->get_section( 'background_image' )->section = 'colors';
	$manager->get_section( 'background_image' )->title = esc_html__( 'Background', 'prismatic' );
	$manager->get_section( 'background_image' )->priority = 10;

	/// ----------------------------------------------------------------------------------------------------------------
	///  Theme Header
	/// ----------------------------------------------------------------------------------------------------------------

	$manager->add_section( 'prismatic_theme_header_background', [
		'title' => esc_html__( 'Colors', 'prismatic' ),
		'panel' => 'prismatic_theme_header'
	] );

	$manager->get_section( 'title_tagline' )->panel = 'prismatic_theme_header';
	$manager->get_section( 'title_tagline' )->title = esc_html__( 'Branding', 'prismatic' );

	$manager->get_section( 'static_front_page' )->panel = 'prismatic_theme_content';

	/// ----------------------------------------------------------------------------------------------------------------
	///  Theme Content
	/// ----------------------------------------------------------------------------------------------------------------

	/// ----------------------------------------------------------------------------------------------------------------
	///  Theme Footer
	/// ----------------------------------------------------------------------------------------------------------------
	$manager->add_section( 'prismatic_theme_footer_credit', [
		'title' => esc_html__( 'Credit', 'prismatic' ),
		'panel' => 'prismatic_theme_footer'
	] );
}