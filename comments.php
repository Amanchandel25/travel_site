<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package     Andaaz
 * @author      Amjad Ali
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
} ?>

<div id="comments" class="comments mb-7">

	<div class="comments__inner container-small">

		<?php
		if ( have_comments() ) :
			?>

			<h2 class="comments-title">
				<?php
				$comments_number = get_comments_number();
				if ( '1' === $comments_number ) {
					/* translators: %s: post title */
					printf( _x( 'One reply to &ldquo;%s&rdquo;', 'comments title', 'andaaz' ), get_the_title() );
				} else {
					printf(
						/* translators: 1: number of comments, 2: post title */
						_nx(
							'%1$s reply to &ldquo;%2$s&rdquo;',
							'%1$s replies to &ldquo;%2$s&rdquo;',
							$comments_number,
							'comments title',
							'andaaz'
						),
						number_format_i18n( $comments_number ),
						get_the_title()
					);
				}
				?>
			</h2> 

			<ol class="comment-list list-reset ps-0">
				<?php
				wp_list_comments(
					array(
						'avatar_size' => 100,
						'style'       => 'ol',
						'short_ping'  => true,
					)
				);
				?>
			</ol>

			<?php
			the_comments_pagination(
				array(
					'prev_text' => '<span class="screen-reader-text">' . esc_html__( 'Previous', 'andaaz' ) . '</span>',
					'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next', 'andaaz' ) . '</span>',
				)
			);

		endif; // Check for have_comments().

		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
		$fields =  array(
			'author' => '<p class="comment-form-author"><input id="author" name="author" type="text" placeholder="'. esc_attr__('Name', 'andaaz') . ( $req ? '*' : '' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
			'email'  => '<p class="comment-form-email"><input id="email" name="email" type="text" placeholder="'. esc_attr__('Email', 'andaaz') . ( $req ? '*' :''). '" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
		);
		$comments_args = array(
			'fields' =>  $fields
		);
		
		comment_form($comments_args);

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'andaaz' ); ?></p>
		<?php
		endif;
		?>

	</div>

</div>
