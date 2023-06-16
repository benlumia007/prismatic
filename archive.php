<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header(); ?>

	<section class="site-content">
		<div class="no-sidebar">
			<main id="primary" class="site-main">
				<?php if ( have_posts() ) : ?>
				<header class="page-header">
					<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</header><!-- .page-header -->
				<div class="loop">
					<ul class="grid-items grid-col-3">
						<?php while ( have_posts() ) : the_post();

							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'archive' );

						endwhile;

						the_posts_navigation();

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
						?>
					</ul>
				</div>

			</main><!-- #main -->
		</div>
	</section>

<?php
get_footer();
