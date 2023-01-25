<?php
/**
 * The template for displaying archive pages.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package     Andaaz
 * @author      Amjad Ali
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 */

get_header(); ?>

<?php if (is_author()) { 
  $author = get_queried_object();
  $author_id = $author->ID;
  ?>
 <div class="page-title-container">
   <div class="container">
     <div class="row">
      <div class="col-lg-3">
        <img src="<?php echo esc_url(get_avatar_url( $author_id, array('size' => '550'))); ?>">
       </div>
       <div class="col-lg-7">
         <?php     
           the_archive_title( '<h4 class="entry-title">', '</h4>' ); 
           the_archive_description( '<div class="entry-description mt-2">', '</div>' ); 
           if(get_the_author_meta( 'user_url', $author_id ) !== '') {
            $author_website = get_the_author_meta( 'user_url', $author_id );
            echo sprintf( 
            '<div class="mt-3"> %1$s <a href="%2$s" target="_blank">%3$s</a></div>',
              esc_html('Website: ', 'andaaz'),
              esc_url($author_website),
              esc_html(preg_replace("#^http(s)?://#","",$author_website))
            );
          }
         ?>
       </div>
     </div>
   </div>
 </div>
 
<?php } else { ?>

<div class="page-title-container">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 offset-lg-3 text-center">
        <?php     
          the_archive_title( '<h1 class="page-title">', '</h1>' );
          if(the_archive_description()) {
			  	the_archive_description( '<div class="page-description">', '</div>' );
		  }
		?>
      </div>
    </div>
  </div>
</div>


<?php }

$container = ( false === get_theme_mod('andaaz_is_blog_page_fluid', andaaz_defaults( 'is_blog_page_fluid' ) ) ) ? 'container' : 'container-fluid';

$page_layout = get_theme_mod('andaaz_blog_page_layout', andaaz_defaults( 'blog_page_layout' ) );


if ($page_layout == '' && !is_active_sidebar( 'sidebar-1' )) {
	$page_layout = 'full_width';
} elseif ($page_layout == '' && is_active_sidebar( 'sidebar-1' )) {
	$page_layout = 'right_sidebar';
}

$page_col_size = $page_layout == 'full_width' ? 'col-lg-12' : 'col-lg-8';
$page_sidebar_align = $page_layout == 'left_sidebar' ? ' order-lg-2' : '';
$items_col_size = get_theme_mod( 'andaaz_blog_post_layout_col', andaaz_defaults( 'blog_post_layout_col' ));

if ($items_col_size == '' && $page_col_size == 'col-lg-12') {
	$items_col_size = 'col-lg-4';
} elseif($items_col_size == '' && $page_col_size !== 'col-lg-12') {
	$items_col_size = 'col-lg-6';
}

?>

<div class="<?php echo esc_attr($container); ?>">

	<div class="row gx-5">

		<div class="<?php echo esc_attr($page_col_size); echo esc_attr($page_sidebar_align);?> mb-7">

			<div id="infinite-scroll-container" class="post-list blog-post row masonry-grid <?php echo esc_attr(get_theme_mod( 'andaaz_post_style', andaaz_defaults( 'post_style' ) )); ?>" data-masonry='{ }'>
		
			<?php
		
			if ( have_posts() ) :
			
			
				/* Start the Loop */
				while ( have_posts() ) :
				
					the_post();
				
					?>
					<div class="<?php echo esc_attr($items_col_size); ?>">
					<?php
		
					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/post/content', get_post_format() );
				
					?>
					</div>
					<?php
		
				endwhile;
			
				?>

				<div class="col-12 mt-5">

				<?php
				
					if ( ! class_exists( 'Jetpack' ) || ! Jetpack::is_module_active( 'infinite-scroll' ) ) :
						/*
						 * The posts pagination outputs a set of page numbers with links to the previous and next pages of posts.
						 *
						 * @link https://codex.wordpress.org/Function_Reference/the_posts_pagination
						 */
						the_posts_pagination(
							array(
								'mid_size' => 2,
							)
						);
					endif;
				?>

				</div>

				<?php

			else :
			
				get_template_part( 'template-parts/post/content', 'none' );
			
			endif; ?>
		
			</div>

		</div>
		
		<?php

		if ( is_active_sidebar( 'sidebar-1' ) && $page_layout !== 'full_width' ) : ?>

		<div class="col-lg-4">

			<aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'andaaz' ); ?>">
				
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

<?php
get_footer();
