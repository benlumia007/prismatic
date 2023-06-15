<?php
/**
 * Theme Customizer - Panels
 *
 * @package   Prismatic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://github.com/benlumia007/prismatic
 */

add_action( 'customize_register', 'prismatic_customize_panels' );

function prismatic_customize_panels( $manager ) {

	$panels = [
		'prismatic_theme_global'  => esc_html__( 'Theme: Global',  'prismatic' ),
		'prismatic_theme_header'  => esc_html__( 'Theme: Header',  'prismatic' ),
		'prismatic_theme_content' => esc_html__( 'Theme: Content', 'prismatic' ),
		'prismatic_theme_footer'  => esc_html__( 'Theme: Footer',  'prismatic' )
	];

	foreach ( $panels as $panel => $label ) {
		$manager->add_panel( $panel, [
			'title'    => $label,
			'priority' => 100
		] );
	}
}
