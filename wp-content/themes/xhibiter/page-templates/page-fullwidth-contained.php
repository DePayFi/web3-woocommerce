<?php
/*
 * Template Name: Full-width Contained
 *
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Xhibiter
 * @since 		 1.0.0
 */

get_header();

if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div class="page-section p-0">
		<div class="container">
			<div class="row">

				<?php xhibiter_primary_content_top(); ?>

				<div id="primary" class="content page-content col-lg">
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

<?php endwhile; endif; ?>

<?php get_footer(); ?>