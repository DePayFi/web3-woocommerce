<?php
/**
 * The template for displaying all pages.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Xhibiter
 * @since 		 1.0.0
 */

get_header();

if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
	<?php
		// Check if the page built with Elementor
		if ( xhibiter_is_elementor_page() ) : ?>

			<?php xhibiter_primary_content_top(); ?>

			<main class="elementor-main-content site-main">

				<?php xhibiter_primary_content_before(); ?>

				<?php the_content(); ?>

				<?php xhibiter_primary_content_after(); ?>

			</main>

			<?php xhibiter_comments(); ?>

			<?php xhibiter_primary_content_bottom(); ?>

		<?php else : ?>			

			<?php
				// Page Title
				get_template_part( 'template-parts/page-title/page-title' );
			?>

			<div class="page-section py-16 md:py-24">
				<div class="container">
					<div class="row">

						<?php xhibiter_primary_content_top(); ?>

						<div id="primary" class="content page-content mb-4">
							<main class="site-main">

								<?php xhibiter_primary_content_before(); ?>

								<div class="entry__article clearfix">
									<?php the_content(); ?>
								</div>

								<?php xhibiter_multi_page_pagination(); ?>
								
								<?php xhibiter_comments(); ?>

								<?php xhibiter_primary_content_after(); ?>

							</main>
						</div> <!-- .page-content -->

						<?php xhibiter_primary_content_bottom(); ?>

						<?php
							// Sidebar
							if ( xhibiter_is_active_sidebar( 'page', 'page', 'fullwidth' ) ) {
								xhibiter_sidebar( 'xhibiter-page-sidebar' );
							}
						?>						

					</div> <!-- .row -->
				</div> <!-- .container -->			
			</div> <!-- .page-section -->

	<?php endif; ?> <!-- elementor check -->	
<?php endwhile; endif; ?>

<?php get_footer(); ?>