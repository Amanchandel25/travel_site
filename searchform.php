<?php
/**
 * Template for displaying search forms in andaaz
 *
 * @package     Andaaz
 * @author      Amjad Ali
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 */

$unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    
	<div class="input-group">
		
		<label for="<?php echo esc_attr( $unique_id ); ?>">
			<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'andaaz' ); ?></span>
		</label>

    <input type="search" class="form-control" id="<?php echo esc_attr( $unique_id ); ?>" placeholder="<?php echo esc_attr( 'Search &hellip;', 'placeholder', 'andaaz' ); ?>" value="<?php echo get_search_query(); ?>" name="s">

    <div class="input-group-append">
      <button class="btn bt" type="submit"><i class="fa fa-search" aria-hidden="true"></i> <span class="screen-reader-text"><?php echo esc_html_x( 'Search', 'submit button', 'andaaz' ); ?></span> </button>
    </div>
              
	</div>
	
</form>