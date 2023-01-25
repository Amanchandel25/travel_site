<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package     Andaaz
 * @author      Amjad Ali
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">

	<div class="widget-area__inner">

		<div class="widget-area__wrapper">

			<?php do_action( 'andaaz_after_widgets' ); ?>
			
			<?php 
			
			if(is_woocommerce()) {

				dynamic_sidebar( 'shop-1' ); 

			} else {

				dynamic_sidebar( 'sidebar-1' );

			}
			
			?>

			<?php do_action( 'andaaz_after_widgets' ); ?>
			
		</div>

	</div>
</aside>
