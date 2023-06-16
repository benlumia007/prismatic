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

function prismatic_custom_styles() {
	$header_background = get_theme_mod( 'prismatic_theme_header_background', get_background_color() );
	$footer_background = get_theme_mod( 'prismatic_theme_footer_background', '0b5e79' );
	$title_color       = get_theme_mod( 'prismatic_theme_header_site_branding', 'ffffff' );


	$styles = '';

	if ( $header_background ) {
		$styles .= ".site-header { background: $header_background; }";
	}

	if ( $footer_background ) {
		$styles .= ".site-footer { background: $footer_background; }";
	}

	if ( $title_color ) {
		$styles .= ".site-header .branding-navigation .site-branding .site-title a, .site-header .branding-navigation .site-branding .site-description { color: $title_color; }";
	}

	if ( $styles ) {
		echo '<style type="text/css" id="custom-background-styles">';
		echo esc_html( $styles );
		echo '</style>';
	}
}
