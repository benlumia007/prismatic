<?php

# Filters the archive title and description.
add_filter( 'get_the_archive_title', 'prismatic_archive_title_filter', 5  );
add_action( 'wp_head', 'prismatic_custom_styles' );

function prismatic_archive_title_filter() {
	$title = '';

	if ( is_home() && ! is_front_page() ) {
		$title = get_post_field( 'post_title', get_queried_object_id() );
	} elseif ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	} elseif ( is_author() ) {
		$title = get_the_author_meta( 'display_name', absint( get_query_var( 'author' ) ) );
	} elseif ( is_month() ) {
		$title = get_the_date(esc_html_x('F Y', 'month date format', 'prismatic'));
	} elseif ( is_year() ) {
		$title = get_the_date(esc_html_x('Y', 'yearly archives date format', 'prismatic'));
	} elseif ( is_day() ) {
		$title = get_the_date( esc_html_x( 'F d, Y', 'yearly archives date format', 'prismatic' ) );
	} elseif ( is_search() ) {
		$title = sprintf(
		// Translators: %s is the search query.
			esc_html__( 'Search results for: %s', 'prismatic' ),
			get_search_query()
		);
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_archive() ) {
		$title = esc_html__( 'Archives', 'prismatic' );
	}

	return apply_filters( 'prismatic_archive_title', $title );
}

/**
 * Filters the excerpt more link.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
add_filter( 'excerpt_more', function() {

	return sprintf(
		'&thinsp;&hellip;&thinsp; <a href="%s" class="entry__more-link italic">%s</a>',
		esc_url( get_permalink() ),
		sprintf(
		// Translators: %s is the post title for screen readers.
			esc_html__( 'Continue reading&nbsp;%s&nbsp;&rarr;', 'prismatic' ),
			the_title( '<span class="screen-reader-text">', '</span>', false )
		)
	);
} );

function prismatic_custom_styles() {
	$header_border = get_theme_mod( 'prismatic_theme_header_border', '' );
	$header_background = get_theme_mod( 'prismatic_theme_header_background', 'ffffff' );
	$header_description = get_theme_mod( 'prismatic_theme_header_site_description', '000000' );
	$menu_link = get_theme_mod( 'prismatic_theme_header_menu_link', '000000' );
	$footer_border = get_theme_mod( 'prismatic_theme_footer_border', 'ffffff' );
	$footer_background = get_theme_mod( 'prismatic_theme_footer_background', 'ffffff' );
	$footer_text = get_theme_mod( 'prismatic_theme_footer_text_color', 'ffffff' );
	$footer_text_link = get_theme_mod( 'prismatic_theme_footer_text_link_color', '000000' );
	$primary_text = get_theme_mod( 'prismatic_theme_content_primary_color', '000000' );
	$primary_link_text = get_theme_mod( 'prismatic_theme_content_primary_link_color', '0369a1' );

	$styles = '';

	if ( $header_border ) {
		$styles .= '.site-header { border-bottom: 0.063rem solid ' . $header_border . '}';
	}

	if ( $header_background ) {
		$styles .= '.site-header { background: ' . $header_background . '}';
	}

	if ( $header_description ) {
		$styles .= '.site-header .branding-navigation .site-branding .site-description { color: ' . $header_description . '}';
	}

	if ( $menu_link ) {
		$styles .= '
			@media screen and ( min-width: 769px ) {
				.primary-menu .menu-items .menu-item a,
				.primary-menu .menu-items .menu-item.menu-item-has-children > a:after {
					color: ' . $menu_link . ';
				}
			}';
	}

	if ( $footer_border ) {
		$styles .= '.site-footer { border-top: 0.063rem solid ' . $footer_border . '}';
	}

	if ( $footer_background ) {
		$styles .= '.site-footer { background: ' . $footer_background . '}';
	}

	if ( $footer_text ) {
		$styles .= '.site-footer .site-info { color: ' . $footer_text . '}';
	}

	if ( $footer_text_link ) {
		$styles .= '.site-footer .site-info a { color: ' . $footer_text_link . '}';
	}

	if ( $primary_link_text ) {
		$styles .= '.site-main { color: ' . $primary_text . ' }';
	}

	if ( $primary_link_text ) {
		$styles .= '.site-main a { color: ' . $primary_link_text . ' }';
	}

	if ( $styles ) {
		echo '<style type="text/css" id="custom-background-styles">';
		echo esc_html( $styles );
		echo '</style>';
	}
}
