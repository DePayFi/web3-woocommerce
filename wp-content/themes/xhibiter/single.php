<?php
/**
 * The template for displaying all single posts.
 *
 * @package Xhibiter
 */

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php if ( 'projects' == get_post_type() ) : ?>	

		<?php the_content(); ?>

	<?php else : ?>
		<section class="relative py-16 md:pt-24 md:pb-16">
		
			<picture class="pointer-events-none absolute inset-0 -z-10 dark:hidden">
				<img src="<?php echo esc_url( XHIBITER_URI . '/assets/img/gradient_light.jpg' ) ?>" alt="gradient" class="h-full w-full" />
			</picture>

			<?php xhibiter_entry_featured_image_before(); ?>

			<?php xhibiter_entry_featured_image(); ?>

			<?php xhibiter_entry_featured_image_after(); ?>

			<?php xhibiter_entry_section_before(); ?>

			<div class="container">
				<div class="content-row lg:flex">

					<!-- blog content -->
					<div class="content blog__content mb-8">
						<main class="site-main">
					
							<?php
								if ( function_exists( 'xhibiter_save_post_views' ) ) {
									xhibiter_save_post_views( get_the_ID() );
								}

								get_template_part( 'template-parts/content-single', get_post_format() );
							?>
							
						</main>
					</div> <!-- .blog__content -->

					<?php
						if ( xhibiter_is_active_sidebar( 'blog', 'single_post', 'fullwidth' ) ) {
							xhibiter_sidebar( 'xhibiter-blog-sidebar' );
						}
					?>

				</div>
			</div>

		</section>

	<?php endif; ?>

<?php endwhile; ?>

<?php get_footer(); ?>