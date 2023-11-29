<?php
/**
 * The main template file.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Xhibiter
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

get_header();
?>

<div class="blog-section relative py-16 md:py-24">	

	<?php xhibiter_primary_content_markup_top(); ?>

		<?php xhibiter_primary_content_top(); ?>

		<!-- blog content -->
		<div id="primary" class="content blog__content col-lg mb-8">
			<main class="site-main">

				<?php xhibiter_primary_content_before(); ?>

				<?php xhibiter_primary_content_query(); ?>

				<?php xhibiter_post_pagination(); ?>

				<?php xhibiter_primary_content_after(); ?>

			</main>
		</div> <!-- .blog__content -->

		<?php
			if ( xhibiter_is_active_sidebar( 'blog', 'blog', 'fullwidth' ) ) {
				xhibiter_sidebar( 'xhibiter-blog-sidebar' );
			}
		?>

		<?php xhibiter_primary_content_bottom(); ?>

	<?php xhibiter_primary_content_markup_bottom(); ?>

</div> <!-- .blog-section -->

<?php get_footer(); ?>