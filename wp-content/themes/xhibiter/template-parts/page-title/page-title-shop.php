<?php
/**
 * Page title for shop pages.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Xhibiter
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

if ( ! get_theme_mod( 'xhibiter_settings_shop_page_title_show', true ) ) {
	return;
}

$page_title_desc = get_theme_mod( 'xhibiter_settings_woocommerce_page_title_description', esc_html__( 'It represents a clean, green source of energy. Solar power is a great way to reduce your carbon footprint.', 'xhibiter' ) );

if ( ! function_exists( 'xhibiter_taxonomy_description' ) ) {
	function xhibiter_taxonomy_description() {
		if ( is_product_taxonomy() && 0 === absint( get_query_var( 'paged' ) ) ) {
			$term = get_queried_object();

			if ( $term ) {
				/**
				* Filters the archive's raw description on taxonomy archives.
				*
				* @since 6.7.0
				*
				* @param string  $term_description Raw description text.
				* @param WP_Term $term             Term object for this taxonomy archive.
				*/
				$term_description = apply_filters( 'woocommerce_taxonomy_archive_description_raw', $term->description, $term );

				if ( ! empty( $term_description ) ) {
					echo '<div class="term-description mt-2 mx-auto max-w-xl text-lg dark:text-jacarta-300">' . wc_format_content( wp_kses_post( $term_description ) ) . '</div>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
			}
		}
	}
}


if ( is_shop() ) : ?>
	<div class="page-title page-title-shop-archive relative">
		<div class="container">
			<div class="page-title__holder relative">
				<h1 class="page-title__title"><?php woocommerce_page_title(); ?></h1>

				<?php if ( $page_title_desc ) : ?>
					<p class="page-title__description"><?php echo esc_html( $page_title_desc ); ?></p>
				<?php endif; ?>

			</div>
		</div>
	</div>
<?php else : ?>

<!-- Page Title -->

<?php
	$thumbnail_src = xhibiter_get_shop_category_thumbnail();
	$thumbnail_id = get_term_meta( get_queried_object_id(), 'thumbnail_id', true );
	$thumbnail_alt = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true);
	
	$banner_id = get_term_meta( get_queried_object_id(), '_xhibiter_woo_category_featured_image', true );
	$banner = wp_get_attachment_image_src( $banner_id, 'full' );
	$verified = get_term_meta( get_queried_object_id(), '_xhibiter_woo_category_verification', true  );
	$classes = 'h-40';
?>

<?php if ( is_product_category() ) {
	$classes = 'h-[18.75rem]';
}
?>

<div class="page-title relative page-title-shop bg-light-base dark:bg-jacarta-800 flex items-center text-center <?php echo esc_attr( $classes ) ?>">
	<?php if ( $banner_id ) : ?>
		<div class="relative w-full">
			<img src="<?php echo esc_url( $banner[0] ); ?>" alt="banner" class="w-full h-full object-cover">
		</div>
	<?php endif; ?>

	<?php if ( ! $banner_id ) : ?>
		<div class="container">
			<?php xhibiter_page_title_before(); ?>
				<h1 class="page-title__title"><?php woocommerce_page_title(); ?></h1>
			<?php xhibiter_page_title_after(); ?>

			<?php xhibiter_taxonomy_description(); ?>

		</div>
	<?php endif; ?>
</div> <!-- .page-title -->


<?php if ( $banner_id ) : ?>
	<section class="relative bg-light-base pb-12 pt-28 dark:bg-jacarta-800">

		<?php if ( $thumbnail_src ) : ?>
			<div class="absolute left-1/2 top-0 z-10 flex -translate-x-1/2 -translate-y-1/2 items-center justify-center">
				<figure class="relative">
					<img src="<?php echo esc_url( $thumbnail_src ); ?>" alt="<?php echo esc_attr( $thumbnail_alt ); ?>" class="w-[138px] rounded-xl border-[5px] border-white dark:border-jacarta-600">
					
					<?php if ( $verified ) : ?>
						<div class="absolute -right-3 bottom-0 flex h-6 w-6 items-center justify-center rounded-full border-2 border-white bg-green dark:border-jacarta-600" data-tippy-content="Verified Collection">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="h-[.875rem] w-[.875rem] fill-white">
								<path fill="none" d="M0 0h24v24H0z"></path>
								<path d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
							</svg>
						</div>
					<?php endif; ?>

				</figure>
			</div>
		<?php endif; ?>

		<div class="container">
			<div class="text-center">
				<?php xhibiter_page_title_before(); ?>
					<h1 class="page-title__title mb-2"><?php woocommerce_page_title(); ?></h1>
				<?php xhibiter_page_title_after(); ?>

				<?php xhibiter_taxonomy_description(); ?>

			</div>
		</div>	

	</section>
<?php endif; ?>

<?php endif;