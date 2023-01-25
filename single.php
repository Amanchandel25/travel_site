<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package     Andaaz
 * @author      Amjad Ali
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 */

get_header();

$page_layout = get_theme_mod('andaaz_single_post_page_layout', andaaz_defaults( 'single_post_page_layout' ) );
$page_sidebar_align = $page_layout == 'left_sidebar' ? 'col-lg-8 order-lg-2' : 'col-lg-8 ';

if ( !is_active_sidebar('sidebar-1') ) { 
	$page_sidebar_align = 'col-lg-12';
}
?>


<header class="post-entry-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">


				<div class="entry-meta-top">

					<?php if (get_theme_mod('andaaz_is_blog_single_post_categories', andaaz_defaults( 'is_blog_single_post_categories' ) )) {?>
						<span class="entry-meta-category"><i class="far fa-folder"></i> <?php the_category( ', ' );?> </span>
					<?php } ?>
									
					<?php if (get_theme_mod('andaaz_is_blog_single_post_author', andaaz_defaults( 'is_blog_single_post_author' ) )) { ?>
						<span class="entry-author"><i class="far fa-user"></i> <?php esc_html_e('By ', 'andaaz'); ?> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a></span>
					<?php } ?>
						
					<?php if (get_theme_mod('andaaz_is_blog_single_post_date', andaaz_defaults( 'is_blog_single_post_date' ) )) {?>
					  <span class="entry-meta-data"><i class="far fa-clock"></i> <?php echo get_the_date(); ?></span>
					<?php }?>
					
					<?php if (get_theme_mod('andaaz_is_blog_single_post_comments_counter', andaaz_defaults( 'is_blog_single_post_comments_counter' 	))) { ?>
						<span class="entry-comment-counter"><i class="far fa-comment-alt"></i> <?php comments_number('0 Comments', 	'1 Comment', '% Comments');?></span>
					<?php } ?>
									
					<?php
						if (get_theme_mod('andaaz_is_blog_single_post_edit_btn', andaaz_defaults( 'is_blog_single_post_edit_btn' ))) {
							// Edit post link.
							edit_post_link(
								sprintf(
									wp_kses(
										/* translators: %s: Name of current post. Only visible to screen readers. */
										__( 'Edit <span class="screen-reader-text">%s</span>', 'andaaz'),
										array(
											'span' => array(
												'class' => array(),
											),
										)
									),
									get_the_title()
								),
								'<span class="entry-meta-edit-link"><i class="far fa-edit"></i> ',
								'</span>'
							);
						}
					?>

				</div>

				<?php
					do_action( 'andaaz_before_entry_title' );
					the_title( '<h1 class="entry-title">', '</h1>' );
                    do_action( 'andaaz_after_entry_title' );
                                
                            ?>
                </div>
            </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
			<?php andaaz_post_thumbnail(); ?>
		</div>
	</div>
</div>

<?php if($page_layout !== 'full_width') { ?>


<div class="container">
	<div class="row gx-5">
		<div class=" <?php echo esc_attr($page_sidebar_align); ?>">
<?php } ?>

			<div class="blog-post single-post">

				<?php
				// Start the loop.
				while ( have_posts() ) :
				 
					the_post();
				
					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
				
					get_template_part( 'template-parts/post/content-single', get_post_format() );
				
					do_action( 'andaaz_before_comments' );
				
					/*
					 * If comments are open or we have at least one comment, load up the comment template.
					 *
					 * @link https://codex.wordpress.org/Function_Reference/comments_open/
					 * @link https://codex.wordpress.org/Template_Tags/get_comments_number/
					 * @link https://developer.wordpress.org/reference/functions/comments_template/
					 */

					?> 

					<div class="container px-0">
						<div class="row">
							<div class="col-lg-12">
								<?php
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
								do_action( 'andaaz_after_comments' );
							?>
							</div>
						</div>
					</div>
				
				<?php endwhile; ?>

			</div>

<?php

if($page_layout !== 'full_width') { ?>

	</div>

	<?php

		if ( is_active_sidebar( 'sidebar-1' ) ) : ?>

		<div class="col-lg-4 mt-6 mb-7">

			<aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Sidebar', 'andaaz' ); ?>">

				<?php

				if ( is_active_sidebar( 'sidebar-1' ) ) {
					dynamic_sidebar( 'sidebar-1' ); 
				}
			
				?>

			</aside>
			<!-- .widget-area -->
			
		</div>
			
	<?php endif; ?>

	</div>

</div>
	
<?php } ?>

<?php	
get_footer();
