<?php

# Filters the archive title and description.
add_filter( 'get_the_archive_title', 'prismatic_archive_title_filter', 5  );

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
		 $title = prismatic_get_single_author_title();
	} elseif ( is_search() ) {

	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_archive() ) {
		$title = esc_html__( 'Archives', 'prismatic' );
	}

	apply_filters( 'prismatic_archive_title', $title );
}
