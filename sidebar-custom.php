<?php
/**
 * The custom sidebar containing a widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

if ( ! is_active_sidebar( 'custom' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'custom' ); ?>
</aside><!-- #secondary -->
