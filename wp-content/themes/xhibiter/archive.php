<?php
/**
 * The template for displaying archive pages.
 *
 * @package Xhibiter
 */

get_header();
?>

<?php
	// Page Title
	get_template_part( 'template-parts/page-title/page-title-archive' );
?>

<div class="archive-section relative py-16 md:py-24">
	<picture class="pointer-events-none absolute -z-10 inset-0 dark:hidden">
		<img src="<?php echo esc_url( XHIBITER_URI . '/assets/img/gradient_light.jpg' ) ?>" alt="" aria-hidden="true" class="h-full w-full">
	</picture>
	<div class="container">
		<div class="row">

			<?php xhibiter_primary_content_top(); ?>

			<div id="primary" class="content blog__content mb-4">
				<main class="site-main">

					<?php xhibiter_primary_content_before(); ?>

					<?php xhibiter_primary_content_query(); ?>

					<?php xhibiter_post_pagination(); ?>

					<?php xhibiter_primary_content_after(); ?>

				</main>
			</div> <!-- #primary -->

			<?php
				// Sidebar
				if ( 'fullwidth' !== xhibiter_layout_type( 'archive', 'fullwidth' ) && is_active_sidebar( 'xhibiter-blog-sidebar' ) ) {
					xhibiter_sidebar();
				}
			?>	

		</div> <!-- .row -->
	</div> <!-- .container -->
</div>
<?php get_footer();  ?>