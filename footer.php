<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Prismatic
 */

?>

<footer id="colophon" class="site-footer">
	<div class="site-info">
		<?php echo wp_kses_post( get_theme_mod( 'prismatic_theme_footer_credit', 'Proudly powered by <a href="https://www.classicpress.com">ClassicPress</a>' ) );?>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
