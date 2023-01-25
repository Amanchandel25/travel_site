<?php
// Template Name: Full width
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

get_footer();