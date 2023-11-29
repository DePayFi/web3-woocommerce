<?php
/**
 * Single post
 *
 * @package Xhibiter
 */
?>

<?php 
	$tags_show = get_theme_mod( 'xhibiter_settings_post_tags_show', true );
	$socials_share_show = get_theme_mod( 'xhibiter_settings_post_share_buttons_show', true );
?>

<div class="single-post__content">
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry single-post__entry' ); ?>>

		<?php xhibiter_entry_content_top(); ?>

		<div class="entry__article clearfix">
			<?php the_content(); ?>
		</div>

		<?php xhibiter_multi_page_pagination(); ?>

		<?php xhibiter_entry_content_bottom(); ?>

	</article><!-- #post-## -->

	<?php if ( $tags_show && has_tag() ) : ?>
		<div class="entry__tags flex flex-wrap mb-6 mt-4">
			<?php the_tags( '', '', '' ); ?>
		</div>
	<?php endif; ?>

	<?php if ( function_exists( 'xhibiter_social_sharing_buttons' ) && $socials_share_show ) : ?>
		<div class="entry__share mb-16 flex items-center">
			<span class="mr-4 text-sm font-bold dark:text-jacarta-300"><?php echo esc_html__( 'Share:', 'xhibiter' ); ?></span>
			<?php echo xhibiter_social_sharing_buttons(); ?>
		</div>
	<?php endif; ?>

	<?php if ( get_theme_mod( 'xhibiter_settings_author_box_show', true ) ) {
		xhibiter_author_box();
	} ?>

	<?php if ( get_theme_mod( 'xhibiter_settings_related_posts_show', true ) ) {
		xhibiter_related_posts();
	} ?>

	<?php
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	?>

</div> <!-- .single-post__content -->
