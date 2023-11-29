<?php
/**
 * The template for displaying comments.
 * 
 * The area of the page that contains both current comments
 * and the comment form.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Xhibiter
 * @since 		 1.0.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<?php if ( have_comments() ) : ?>

	<div id="comments" class="entry__comments">

		<?php xhibiter_comments_before(); ?>

			<h2 class="text-3xl mb-8">    
				<?php
					comments_number( esc_html__( 'No Comments', 'xhibiter' ),
						esc_html__( '1 Comment', 'xhibiter' ),
						esc_html__( '% Comments', 'xhibiter' )
					);
				?>
			</h2>

			<?php the_comments_navigation(); ?>

			<ul class="comment-list">
				<?php
					wp_list_comments( array(
						'style'             => 'ul',
						'short_ping'        => true,
						'avatar_size'       => 48,
						'per_page'          => '',
						'rxhibiter_top_level' => true,
						'walker'            => new Xhibiter_Walker_Comment()
					) );
				?>
			</ul><!-- .comment-list -->

			<?php the_comments_navigation(); ?>					

		<?php
			if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'xhibiter' ); ?></p>
		<?php endif; ?>

	</div><!-- .entry-comments -->

<?php endif; // have_comments() ?>

<section class="section-comment-form pt-8">

	<?php
		$commenter = wp_get_current_commenter();
		$consent = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';

		$fields = array(
			'author' =>
			'<div class="md:flex md:space-x-6"><div class="md:flex-1"><div class="comment-form-input"><label for="author">' . esc_html__( 'Name', 'xhibiter' ) . '</label><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" required="required" /></div></div>',

			'email' =>
			'<div class="md:flex-1"><div class="comment-form-input"><label for="email">' . esc_html__( 'Email', 'xhibiter' ) . '</label><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" required="required" /></div></div>',

			'url' =>
			'<div class="md:flex-1"><div class="comment-form-input"><label for="url">' . esc_html__( 'Website', 'xhibiter' ) . '</label><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div></div></div>',

			'cookies' =>
			'<p class="consent-checkbox mb-6 flex items-center"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' .
			'<label for="wp-comment-cookies-consent">' . esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'xhibiter' ) . '</label></p>'
		);

		$args = array(
			'class_submit'  => 'btn btn--lg',
			'title_reply_before' => '<h2 class="text-3xl mb-8">',
			'title_reply' => esc_html__( 'Leave a Comment', 'xhibiter' ),
			'title_reply_after' => '</h2>',
			'comment_notes_before' => '',
			'comment_field' => '<label for="comment">' . esc_html_x( 'Comment', 'noun', 'xhibiter' ) . '</label><textarea id="comment" class="form-control comment-form__textarea" name="comment" rows="6" required="required"></textarea>',
			'fields' => apply_filters( 'xhibiter_comment_form_default_fields', $fields ),
			'submit_field' => '<p class="form-submit">%1$s %2$s</p>',
		);

		comment_form( $args );
	?>

</section> <!-- comment form -->