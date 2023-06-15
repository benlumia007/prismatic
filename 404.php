<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Prismatic
 */

get_header(); ?>
	<section class="site-content">
		<div class="no-sidebar">
			<main id="primary" class="site-main">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( '404 Not Found' ); ?></h1>
					<p class="archive-description">
						<?php esc_html_e( 'It looks like you stumbled upon a page that does not exist. Perhaps rolling the dice with a search might help or checkout the latest posts below.' ) ?>
						<?php get_search_form() ?>
					</p>
				</header><!-- .page-header -->
				<?php if ( have_posts() ) : ?>
				<header class="page-header">

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
