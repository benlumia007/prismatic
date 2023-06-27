<?php

/**
 * Outputs the post author HTML.
 *
 * @since  3.0.0
 * @access public
 * @param  array  $args
 * @return void
 */
function prismatic_display_author( array $args = [] ) {
	echo prismatic_render_author( $args ); // phpcs:ignore
}

function prismatic_render_author( array $args = [] ) {
	$args = wp_parse_args( $args, [
		'text'   => '%s',
		'class'  => 'entry-author',
		'link'   => true,
		'before' => '',
		'after'  => ''
	] );

	$author = get_the_author();

	if ( $args['link'] ) {
		$url = get_author_posts_url( get_the_author_meta( 'ID' ) );

		$author = sprintf(
			'<a class="entry__author-link" href="%s">%s</a>',
			esc_url( $url ),
			$author
		);
	}

	$html = sprintf( '<i class="fas fa-user"></i><span class="%s">%s</span>', esc_attr( $args['class'] ), $author );

	return apply_filters( 'backdrop/display/author', $args['before'] . $html . $args['after'] );
}

/**
 * Outputs the post date HTML.
 *
 * @since  3.0.0
 * @access public
 * @param  array  $args
 * @return void
 */
function prismatic_display_date( array $args = [] ) {

	echo prismatic_render_date( $args ); // phpcs:ignore
}


/**
 * Returns the post date HTML.
 *
 * @since  3.0.0
 * @access public
 * @param  array  $args
 * @return string
 */
function prismatic_render_date( array $args = [] ) {

	$args = wp_parse_args( $args, [
		'text'   => '%s',
		'class'  => 'entry-published',
		'format' => '',
		'before' => '',
		'after'  => ''
	] );

	$html = sprintf(
		'<time class="%s" datetime="%s">%s</time>',
		esc_attr( $args['class'] ),
		esc_attr( get_the_date( DATE_W3C ) ),
		sprintf( $args['text'], get_the_date( $args['format'] ) )
	);

	return apply_filters( 'backdrop/display/date', $args['before'] . $html . $args['after'] );
}

/**
 * Outputs the post comments link HTML.
 *
 * @since  3.0.0
 * @access public
 * @param  array  $args
 * @return void
 */
function prismatic_display_comments_link( array $args = [] ) {

	echo prismatic_render_comments_link( $args ); // phpcs:ignore
}

/**
 * Returns the post comments link HTML.
 *
 * @since  3.0.0
 * @access public
 * @param  array  $args
 * @return string
 */
function prismatic_render_comments_link( array $args = [] ) {

	$args = wp_parse_args( $args, [
		'zero'   => false,
		'one'    => false,
		'more'   => false,
		'class'  => 'entry-comments',
		'before' => '',
		'after'  => ''
	] );

	$number = get_comments_number();

	if ( 0 == $number && ! comments_open() && ! pings_open() ) {
		return '';
	}

	$url  = get_comments_link();
	$text = get_comments_number_text( $args['zero'], $args['one'], $args['more'] );

	$html = sprintf(
		'<a class="%s" href="%s">%s</a>',
		esc_attr( $args['class'] ),
		esc_url( $url ),
		$text
	);

	return apply_filters( 'backdrop/display/comments/link', $args['before'] . $html . $args['after'] );
}

/**
 * Returns the metadata separator.
 *
 * @since  1.0.0
 * @access public
 * @param  string  $sep  String to separate metadata.
 * @return string
 */
function sep( $sep = '' ) {

	return apply_filters(
		'prismatic_sep',
		sprintf(
			' <span class="sep mx-2">%s</span> ',
			$sep ?: esc_html_x( '&middot;', 'meta separator', 'prismatic' )
		)
	);
}
