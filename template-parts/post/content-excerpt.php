<?php
/**
 * Template part for displaying posts with excerpts
 *
 * Used in Search Results.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package     Andaaz
 * @author      Amjad Ali
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="container mb-5">
		<div class="row">
          
      <?php if (has_post_thumbnail()): ?>

        <div class="col-2 mb-15px">
          <?php the_post_thumbnail( array(300, 300) ); ?>
        </div>
        
				<div class="col-9 etcodes-search-item-text mb-15px">
			
					<header class="mb-3">
						<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					</header>

						<?php do_action( 'andaaz_before_content' ); ?>

						<?php the_excerpt(); ?>

						<?php do_action( 'andaaz_after_content' ); ?>

        </div>
                    
      <?php else: ?>

      	<div class="col-md-12 etcodes-search-item-text">

					<header class="mb-3">
						<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					</header>

						<?php do_action( 'andaaz_before_content' ); ?>
		
						<?php the_excerpt(); ?>
		
						<?php do_action( 'andaaz_after_content' ); ?>

        </div>

      <?php endif; ?>
		  
    </div>
	</div>
	

</article><!-- #post-## -->
