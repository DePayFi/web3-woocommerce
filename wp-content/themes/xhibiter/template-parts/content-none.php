<?php
/**
 * If no content
 * 
 * @package Xhibiter
 */
?>

<div class="flex justify-center">
	<div class="w-1/2">
		<article <?php post_class('entry'); ?>>

			<div class="text-center">
				<h4 class="mb-4"><?php esc_html_e( 'There is no content to display', 'xhibiter' ); ?></h4>
				<p class="mb-4"><?php esc_html_e('Don\'t fret! Let\'s get you back on track. Perhaps searching can help', 'xhibiter') ?></p>
				<?php get_search_form(); ?>
			</div>
					
		</article>
	</div>
</div>