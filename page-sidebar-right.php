<?php
// Template Name: Page Right Sidebar
/**
 * The template for displaying all pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package     Andaaz
 * @author      Amjad Ali
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 */

get_header();

?>

<div class="container mt-6">
  <div class="row gx-5">
    <div class="col-lg-8">
      <?php
      while ( have_posts() ) :
      
      	the_post();
      
      	get_template_part( 'template-parts/page/content', 'page' );
      
      	do_action( 'andaaz_before_comments' );
      
      	// If comments are open or we have at least one comment, load up the comment template.
      	if ( comments_open() || get_comments_number() ) :
      		comments_template();
      	endif;
      
      	do_action( 'andaaz_after_comments' );
      
      endwhile; // End of the loop.
      ?>
    </div>

    <div class="col-lg-4 mt-6 mt-md-0">

      <aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Page Sidebar', 'andaaz' ); ?>">

        <?php

        if ( is_active_sidebar( 'page-sidebar' ) ) {
          dynamic_sidebar( 'page-sidebar' ); 
        }
      
        ?>

      </aside>
      <!-- .widget-area -->
      
      </div>

  </div>

</div>

<?php
get_footer();
