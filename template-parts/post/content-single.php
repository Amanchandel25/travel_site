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

	<div class="entry-content-wrapper">

		<div class="entry-content clearfix">

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

		<footer class="entry-footer">

            <?php 
                andaaz_single_entry_footer();
				andaaz_single_entry_author_details();
                if (get_theme_mod('andaaz_single_post_navigation', true)) { ?>
					<div class="navigation post-navigation">
						<div class="row nav-links arrow-btn-icon-right">
							<div class="col-lg-6 mb-4 mb-lg-0 text-lg-start arrow-btn-icon-left">
								<div class="nav-previous">
									<?php 
									previous_post_link(
										'<div class="nav-subtitle">'. esc_html__('Previous Post', 'andaaz') .' </div> <div class="nav-title"> %link </div>',
										'<svg xmlns="http://www.w3.org/2000/svg" width="151.198" height="91.669" viewBox="0 0 151.198 91.669">
											<g data-name="arrow left" transform="translate(-415.001 -1727.001)">
											<g transform="translate(468.475 1818.67) rotate(-135)" fill="#b48d62" stroke="#b48d62" stroke-width="1" opacity="0.4">
												<ellipse cx="37.812" cy="27.008" rx="37.812" ry="27.008" stroke="none"/>
												<ellipse cx="37.812" cy="27.008" rx="37.312" ry="26.508" fill="none"/>
											</g>
											<path d="M1.5,7.172h0L8.866,1.5M1.5,7.172l7.366,5.672M114.935,7.172H1.5" transform="translate(450.764 1765.179)" fill="none" stroke="#212806" stroke-linecap="square" stroke-width="1" fill-rule="evenodd" opacity="0.4"/>
											</g>
										</svg>'
									); 
									?>
								</div>
					  		</div>
							<div class="col-lg-6 text-lg-end">
								<div class="nav-next">
									<?php 
									next_post_link(
										'<div class="nav-subtitle">'. esc_html__('Next Post', 'andaaz') .'</div> <div class="nav-title"> %link </div>',
										'<svg xmlns="http://www.w3.org/2000/svg" width="151.248" height="91.699" viewBox="0 0 151.248 91.699">
											<g data-name="arrow right" transform="translate(-414.5 -1727)">
											<g transform="translate(512.256 1727) rotate(45)" fill="#b48d62" stroke="#b48d62" stroke-width="1" opacity="0.4">
												<ellipse cx="37.824" cy="27.017" rx="37.824" ry="27.017" stroke="none"/>
												<ellipse cx="37.824" cy="27.017" rx="37.324" ry="26.517" fill="none"/>
											</g>
											<path d="M0,5.674H0L7.368,0M0,5.674l7.368,5.674m106.1-5.674H0" transform="translate(528.472 1779.008) rotate(180)" fill="none" stroke="#212806" stroke-linecap="square" stroke-width="1" fill-rule="evenodd" opacity="0.4"/>
											</g>
										</svg>'
									); 
									?>
								</div>
					  		</div>
						</div>
				  	</div>
                                
                <?php }
            ?>
		</footer>
		

	</div>

</article><!-- #post-## -->
