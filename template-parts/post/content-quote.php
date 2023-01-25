<?php
/**
 * Template for the Quote post format
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package     Andaaz
 * @author      Amjad Ali
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 */

?>
<?php

/***********************************************************************************************/
/* Template for the Quote post format */
/***********************************************************************************************/

$quote = false;
if (preg_match('/<blockquote.*?>(.*?)<\/blockquote>/is', get_the_content(), $matches)) {
    if ($matches[1]) {
        $quote = $matches[1];
    }
}
?>
<div class="quote-bg-image">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-content-wrapper">
				
			<?php if ($quote) { ?>

				<div class="archive_post_blockquote">
					<a href="<?php the_permalink();?>"><blockquote><?php echo wp_kses_post($quote); ?></blockquote></a>
				</div>
			                                                                                             
			<?php } else { ?>
			
				<header class="post-entry-header">
					<?php
						andaaz_single_entry_meta_top();
						do_action( 'andaaz_before_entry_title' );
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
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
						<a class="entry-read-more mt-3" href="<?php the_permalink();?>"><?php esc_html_e('Read More', 'andaaz'); ?> <i class="fas        fa-long-arrow-alt-right ml-1"></i></a>
					</footer>
				<?php } ?>

			<?php } ?>
		</div>

	</article><!-- #post-## -->
</div>

