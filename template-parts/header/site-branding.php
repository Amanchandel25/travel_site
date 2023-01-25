<?php
/**
 * Displays header site branding
 *
 *
 * @package     Andaaz
 * @author      Amjad Ali
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 */


$blog_info    = get_bloginfo( 'name' );
$is_header_tagline   = (false === get_theme_mod( 'andaaz_is_header_tagline') ) ? ' screen-reader-text' : null;


// Let's check to see if the option is enabled via the Customizer.
$visibility = has_custom_logo() == false ? ' ' : 'screen-reader-text';
do_action( 'andaaz_before_site_logo' );
?>

<h1 class="navbar-brand mb-0 site-title <?php echo esc_attr( $visibility ); ?>" itemscope itemtype="http://schema.org/Organization">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url" class="black"><?php echo esc_html( $blog_info ); ?></a>
</h1>

<!-- the_custom_logo -->
<?php if (function_exists('the_custom_logo') && has_custom_logo()) : ?>

    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="navbar-brand">
        <?php 
            echo wp_get_attachment_image(get_theme_mod('custom_logo'), 'full', false, array("class" => "etcodes-normal-logo"));
            echo wp_get_attachment_image(get_theme_mod('andaaz_logo_light'), 'full', false, array("class" => "etcodes-light-logo"));
        ?>
        <span class="site-description small d-block <?php echo esc_attr( $is_header_tagline ); ?>"><?php echo esc_html(get_bloginfo('description', 'display')); ?></span>
    </a>

<?php endif; ?>

<?php

do_action( 'andaaz_after_site_logo' );