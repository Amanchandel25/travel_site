<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package     Andaaz
 * @author      Amjad Ali
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 */

get_header(); ?>

<section class="search-result-wrapper">

	<header class="page-header">

		<div class="page-main-title">
		  <div class="container">
		    <div class="row align-items-center">
		      <div class="col-lg-12">

			  	<?php if ( have_posts() ) : ?>
					<?php /* translators: 1: search query */ ?>
					<h1 class="entry-title h2"><?php printf( esc_html__( 'Searching for: %s', 'andaaz' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<?php else : ?>
					<h1 class="entry-title h2"><?php esc_html_e( 'Nothing Found', 'andaaz' ); ?></h1>
				<?php endif; ?>

		      </div>
		    </div>
		  </div>
		</div>

	</header>

	<div class="container search-result-items">
			<?php
			if ( have_posts() ) :
				/* Start the Loop */
				while ( have_posts() ) :
				
					the_post();
				
					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/post/content', 'excerpt' );
				
				endwhile; // End of the loop. ?> 
		
		<?php
		
		the_posts_pagination(
			array(
				'prev_text'          => '<span>' . esc_html__( 'Previous', 'andaaz' ) . '</span>',
				'next_text'          => '<span>' . esc_html__( 'Next', 'andaaz' ) . '</span>',
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'andaaz' ) . ' </span>',
			)
		); 
		
		?>

		<?php else : ?>

		<div class="container center-align">
			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try searching again.', 'andaaz' ); ?></p>
			<?php get_search_form(); ?>
		</div>

		<?php endif; ?>

	</div>
</section>

<?php
get_footer();
