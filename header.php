<?php
/**
 * The header for our theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package     Andaaz
 * @author      Amjad Ali
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">

	<?php do_action( 'andaaz_before_header' ); ?>
	<header id="masthead" class="site-header" role="banner">
    	<div class="site-header-container">
			
			<?php do_action( 'andaaz_before_nav' ); ?>
			
			<?php $is_fixed_top_navbar = ( false === get_theme_mod('andaaz_is_fixed_top_navbar', andaaz_defaults( 'is_fixed_top_navbar' ) ) ) ? null : ' fixed-top'; ?>

    		<nav class="navbar navbar-expand-lg navbar-light <?php echo esc_attr($is_fixed_top_navbar); ?>">
				
				<?php $header_container = ( false === get_theme_mod('andaaz_is_header_fluid', andaaz_defaults( 'is_header_fluid' ) ) ) ? 'container' : 'container-fluid'; ?>
    		    
				<div class="<?php echo esc_attr($header_container); ?>">

					<?php get_template_part( 'template-parts/header/site-branding' ); ?>
					
					<?php if ( has_nav_menu( 'primary' ) ) : ?>
							<button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#primary-navbar-collapse" aria-controls="primary-navbar-collapse" aria-expanded="false" aria-label="<?php esc_html_e( 'Toggle navigation', 'andaaz' ); ?>">
								<span class="navbar-toggler-icon"></span>
							</button>

							<div id="primary-navbar-collapse" class="collapse navbar-collapse justify-content-center">
								<?php

									$menu_class = (has_nav_menu( 'social' ) ? 'navbar-nav ' : 'navbar-nav ');

									wp_nav_menu(
										array(
											'theme_location' => 'primary',
											'depth'          => '3',
											'menu_class'     => $menu_class,
											'container'       => false,
											'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
											'walker'          => new WP_Bootstrap_Navwalker(),
										)
									);
									
									if ( has_nav_menu( 'social' ) ) {
										wp_nav_menu(
											array(
												'theme_location' => 'social',
												'container'       => false,
												'menu_class'     => 'nav-module social-nav',
												'depth'          => 0,
												'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
												'walker'          => new WP_Bootstrap_Navwalker(),
											)
										);
									}
								?>

							</div>

					<?php endif; ?>
					
					<?php get_template_part( 'template-parts/header/header-modules' ); ?>
				</div>
    
			</nav>
			<?php do_action( 'andaaz_after_nav' ); ?>
									
    	</div>
    
	</header>
	<?php do_action( 'andaaz_after_header' ); ?>
	
	<div id="content" class="site-content">

		<main id="main" class="site-main" role="main">
