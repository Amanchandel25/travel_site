<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #page div and all content after
 *
 * @package     Andaaz
 * @author      Amjad Ali
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 */

?>

			</main>

		</div>

		<?php do_action( 'andaaz_before_footer' ); ?>

		<footer class="site-footer">
		
		<?php

		$container         = (false === get_theme_mod('andaaz_is_footer_fluid', andaaz_defaults('is_footer_fluid'))) ? 'container' : 'container-fluid';
		$is_footer_widgets = get_theme_mod('andaaz_is_footer_widgets', andaaz_defaults('is_footer_widgets'));
		$is_footer         = get_theme_mod('andaaz_is_footer', andaaz_defaults('is_footer'));
			 
        if ( $is_footer_widgets && is_active_sidebar( 'footer-top-area' ) ) : ?>
			<div class="footer-widgets">
				<div class="<?php echo esc_attr($container); ?>">
            		<?php dynamic_sidebar( 'footer-top-area' ); ?>
				</div>
			</div>
        <?php endif; ?>

		<?php if ( $is_footer && is_active_sidebar( 'footer-bottom-area' ) ) : ?>
			<div class="footer-bottom-area">
				<div class="<?php echo esc_attr($container); ?>">
					<?php dynamic_sidebar( 'footer-bottom-area' );  ?>
				</div>
			</div>
		<?php endif; ?>

		<?php
			/**
			 * Functions hooked in to andaaz_footer action
			 *
			 * @hooked andaaz_footer_widgets - 10
			 */
			do_action( 'andaaz_footer' );
		?>

		</footer>

		<?php do_action( 'andaaz_after_footer' ); ?>

	</div>

	<?php wp_footer(); ?>

	</body>

</html>
