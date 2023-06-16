<?php
/**
 * The secondary sidebar containing a widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

if ( ! is_active_sidebar( 'secondary' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'secondary' ); ?>
</aside><!-- #secondary -->
