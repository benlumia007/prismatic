<?php
/**
 * The main template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header(); ?>

	<section class="site-content">
		<div id="global-layouts" class="<?php echo esc_attr( get_theme_mod( 'prismatic_global_layout', 'left-sidebar' ) ); ?>">
			<main id="primary" class="site-main">
				<?php
				if ( have_posts() ) :

					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;
					the_posts_pagination();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>

			</main><!-- #main -->
			<?php get_sidebar(); ?>
		</div>
	</section>

<?php
get_footer();
