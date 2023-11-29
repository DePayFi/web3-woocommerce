<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Xhibiter
 */

get_header();

$title = get_theme_mod( 'xhibiter_settings_page_404_title', __( 'Whoops...page not found', 'xhibiter' ) );
$description = get_theme_mod( 'xhibiter_settings_page_404_description', __( 'Unfortunately, the page you are looking for does not exist.', 'xhibiter' ) );
$button_text = get_theme_mod( 'xhibiter_settings_page_404_button_text', __( 'Navigate Back Home', 'xhibiter' ) );

?>

<div class="page-404-section relative py-16 dark:bg-jacarta-800 md:py-24">
	<picture class="pointer-events-none absolute -z-10 inset-0 dark:hidden">
		<img src="<?php echo esc_url( XHIBITER_URI . '/assets/img/gradient_light.jpg' ) ?>" alt="" aria-hidden="true" class="h-full w-full">
	</picture>

	<div class="container">
		<div class="mx-auto max-w-lg text-center">
			<img src="<?php echo esc_url( XHIBITER_URI . '/assets/img/404/404.png' ); ?>" alt="<?php echo esc_attr__( 'Page not found', 'xhibiter' ) ?>" class="mb-16 inline-block">
			<h1 class="mb-6 font-display text-4xl text-jacarta-700 dark:text-white md:text-6xl"><?php echo esc_html( $title ); ?></h1>
			<p class="mb-12 text-lg leading-normal dark:text-jacarta-300">
				<?php echo esc_html( $description ); ?>
			</p>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-block rounded-full bg-accent py-3 px-8 text-center font-semibold text-white shadow-accent-volume transition-all hover:text-white hover:bg-accent-dark"><?php echo esc_html( $button_text ); ?></a>
		</div>
	</div>

</div>

<?php get_footer();


