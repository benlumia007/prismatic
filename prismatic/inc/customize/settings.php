<?php
/**
 * Theme Customizer - Settings
 *
 * @package   Prismatic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://github.com/benlumia007/prismatic
 */

add_action( 'customize_register', 'prismatic_customize_settings' );

function prismatic_customize_settings( $manager ) {

	/// ----------------------------------------------------------------------------------------------------------------
	///  Theme: Global
	/// ----------------------------------------------------------------------------------------------------------------

	/// ----------------------------------------------------------------------------------------------------------------
	///  Theme: Header
	/// ----------------------------------------------------------------------------------------------------------------

	$manager->add_setting( 'prismatic_theme_header_border', [
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	] );

	$manager->add_setting( 'prismatic_theme_header_background', [
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	] );

	$manager->add_setting( 'prismatic_theme_header_site_description', [
		'default'           => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
	] );

	$manager->add_setting( 'prismatic_theme_header_menu_link', [
		'default'           => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
	] );

	$manager->add_setting( 'prismatic_theme_global_layout', [
		'default'           => 'wide',
		'sanitize_callback' => 'sanitize_text_field',
	] );

	/// ----------------------------------------------------------------------------------------------------------------
	///  Theme: Content
	/// ----------------------------------------------------------------------------------------------------------------
	///

	$manager->add_setting( 'prismatic_theme_content_primary_color', [
		'default'           => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
	] );

	$manager->add_setting( 'prismatic_theme_content_primary_link_color', [
		'default'           => '#0369a1',
		'sanitize_callback' => 'sanitize_hex_color',
	] );

	/// ----------------------------------------------------------------------------------------------------------------
	///  Theme: Footer
	/// ----------------------------------------------------------------------------------------------------------------

	// Add a new setting
	$manager->add_setting( 'prismatic_theme_footer_border', array(
		'default'           => 'ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Add a new setting
	$manager->add_setting( 'prismatic_theme_footer_background', array(
		'default'           => 'ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Add a new setting
	$manager->add_setting( 'prismatic_theme_footer_text_color', array(
		'default'           => '000000',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Add a new setting
	$manager->add_setting( 'prismatic_theme_footer_text_link_color', array(
		'default'           => '0369a1',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$manager->add_setting( 'prismatic_theme_footer_credit', [
		'default' => 'Proudly powered by <a href="https://www.classicpress.com">ClassicPress</a>',
		'sanitize_callback' => 'wp_kses_post',
	] );
}
