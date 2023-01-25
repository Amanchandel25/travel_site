<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package     Andaaz
 * @author      Amjad Ali
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="page-wrapper">

		<header class="page-entry-header">
			<?php do_action( 'andaaz_before_entry_title' ); ?>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php do_action( 'andaaz_after_entry_title' ); ?>
		</header>

		<?php do_action( 'andaaz_before_content' ); ?>

		<div class="entry-content clearfix">
			<?php
				the_content();

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'andaaz' ),
						'after'  => '</div>',
					)
				);
			?>
		</div>

		<?php do_action( 'andaaz_after_content' ); ?>

	</div>

</article>
