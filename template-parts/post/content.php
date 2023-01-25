<?php
/**
 * Template part for displaying the singular post.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package     Andaaz
 * @author      Amjad Ali
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		andaaz_post_thumbnail(); 
	?>
	
	<div class="entry-content-wrapper">

		<header class="post-entry-header">
			<?php
				andaaz_single_entry_meta_top();
				do_action( 'andaaz_before_entry_title' );
				the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
				do_action( 'andaaz_after_entry_title' );
			?>
		</header>

		<div class="clearfix">
			<?php 
			
			do_action( 'andaaz_before_content' );

			andaaz_entry_content();

			wp_link_pages(
				array(
					'before'      => '<div class="page-links">' . __( 'Pages:', 'andaaz' ),
					'after'       => '</div>',
					'link_before' => '<span class="page-number">',
					'link_after'  => '</span>',
				)
			);

			?>

		</div>
		
		<?php do_action( 'andaaz_after_content' ); ?>

		<?php if (get_theme_mod('andaaz_is_blog_post_read_more_btn', andaaz_defaults( 'is_blog_post_read_more_btn' ) )) { ?>
			<footer class="entry-footer">
				<a class="entry-read-more arrow-btn-icon-right mt-3" href="<?php the_permalink();?>">
					<svg xmlns="http://www.w3.org/2000/svg" width="80.21" height="48.487" viewBox="0 0 80.21 48.487">
					  <g data-name="Button Arrow" transform="translate(0.5)">
					    <g>
					      <path data-name="arrow right" d="M0,3H0L3.9,0M0,3,3.9,6M60,3H0" transform="translate(60 27.5) rotate(180)" fill="none" 					stroke="#212806" stroke-linecap="square" stroke-width="1" fill-rule="evenodd"/>
					      <g transform="translate(51.426 0) rotate(45)" fill="none" stroke="#212806" stroke-width="1">
					        <ellipse cx="20" cy="14.286" rx="20" ry="14.286" stroke="none"/>
					        <ellipse cx="20" cy="14.286" rx="19.5" ry="13.786" fill="none"/>
					      </g>
					    </g>
					  </g>
					</svg>
					<span class="sr-only"><?php esc_html_e( 'Continue reading', 'andaaz' ); ?> <?php the_title(); ?></span>
				</a>
			</footer>
		<?php } ?>

		
	</div>

</article><!-- #post-## -->
