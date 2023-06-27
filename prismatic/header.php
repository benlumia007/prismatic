<?php
/**
 * The header for our theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'prismatic' ); ?></a>

	<header id="masthead" class="site-header <?php echo esc_attr( get_theme_mod( 'prismatic_theme_global_layout', 'wide' ) === 'wide' ? 'wide' : 'full' ); ?>">
		<div class="branding-navigation">
			<div class="site-branding">
				<?php the_custom_logo() ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<p class="site-description"><?php echo get_bloginfo( 'description' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			</div><!-- .site-branding -->
			<?php
			if ( has_nav_menu( 'primary' ) ) { ?>
				<nav id="primary" class="primary-menu">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'prismatic' ); ?></button>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'container'      => '',
							'menu_id'        => 'primary-menu',
							'menu_class'     => 'menu-items',
							'depth'          => 2
						)
					);
					?>
				</nav>
			<?php }
			?>
		</div><!-- #branding-navigation -->
	</header><!-- #masthead -->
	<?php the_custom_header_markup() ?>
