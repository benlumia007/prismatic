<?php
/**
 * Template Name: No Sidebar
 */

get_header(); ?>
	<section class="site-content">
		<div id="global-layouts" class="no-sidebar">
			<main id="primary" class="site-main">
				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'page' );

				endwhile;
				comments_template();
				?>

			</main><!-- #main -->
			<?php get_sidebar('secondary'); ?>
		</div>
	</section>

<?php
get_footer();
