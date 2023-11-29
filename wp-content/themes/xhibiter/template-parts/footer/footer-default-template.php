<?php
/**
 * The default footer template file
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Xhibiter
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
} ?>

<?php
	$footer_bottom_text = get_theme_mod( 'xhibiter_settings_footer_bottom_text', sprintf(
		esc_html__( 'Copyright &copy; [current-year] %1$s. Powered by %2$Xhibiter theme%3$s' , 'xhibiter' ),
		get_bloginfo( 'name' ),
		'<a href="https://xhibiter.deothemes.com">',
		'</a>'
	) );

	$footer_top_divider = get_theme_mod( 'xhibiter_settings_footer_top_border_show', false );
?>

<?php if ( get_theme_mod( 'xhibiter_settings_footer_show', true ) ) : ?>

	<!-- Footer -->
	<footer class="footer bg-white dark:bg-jacarta-900<?php if ( $footer_top_divider ) echo ' footer--top-border'; ?>" role="contentinfo" itemscope itemtype="https://schema.org/WPFooter">
		<div class="container">

			<?php if ( is_active_sidebar( 'xhibiter-footer-col-1' ) || is_active_sidebar( 'xhibiter-footer-col-2' ) || is_active_sidebar( 'xhibiter-footer-col-3' ) || is_active_sidebar( 'xhibiter-footer-col-4' ) || is_active_sidebar( 'xhibiter-footer-col-5' ) ) : ?>
				<?php if ( get_theme_mod( 'xhibiter_settings_footer_widgets_show', true ) ) : ?>

					<div class="footer__widgets grid grid-cols-6 gap-x-7 gap-y-14 pt-24 pb-12 md:grid-cols-12">				

						<?php if ( is_active_sidebar( 'xhibiter-footer-col-1' ) ) : ?>
							<div class="col-span-full sm:col-span-3 md:col-span-4">
								<?php dynamic_sidebar( 'xhibiter-footer-col-1' ); ?>
							</div>
						<?php endif; ?>

						<?php if ( is_active_sidebar( 'xhibiter-footer-col-2' ) ) : ?>
							<div class="col-span-full sm:col-span-3 md:col-span-2 md:col-start-7">
								<?php dynamic_sidebar( 'xhibiter-footer-col-2' ); ?>
							</div>
						<?php endif; ?>

						<?php if ( is_active_sidebar( 'xhibiter-footer-col-3' ) ) : ?>
							<div class="col-span-full sm:col-span-3 md:col-span-2">
								<?php dynamic_sidebar( 'xhibiter-footer-col-3' ); ?>
							</div>
						<?php endif; ?>

						<?php if ( is_active_sidebar( 'xhibiter-footer-col-4' ) ) : ?>
							<div class="col-span-full sm:col-span-3 md:col-span-2">
								<?php dynamic_sidebar( 'xhibiter-footer-col-4' ); ?>
							</div>
						<?php endif; ?>

					</div> <!-- end footer widgets -->				
				
				<?php endif; ?>
			<?php endif; ?>

			<?php if ( get_theme_mod( 'xhibiter_settings_footer_bottom_show', true ) ) : ?>
				<div class="footer__bottom flex flex-col items-center md:flex-nowrap flex-wrap justify-between space-y-2 py-8 md:flex-row md:space-y-0">
	
					<?php if ( $footer_bottom_text ) : ?>
						<div class="footer__bottom-copyright">									
							<span class="copyright text-sm dark:text-jacarta-400">
								<?php xhibiter_footer_bottom_text(); ?>
							</span>
						</div>
					<?php endif; ?>

					<?php if ( has_nav_menu( 'footer-bottom-menu' ) && get_theme_mod( 'xhibiter_settings_footer_bottom_menu_show', true ) ) : ?>
						<?php
							wp_nav_menu( array(
								'theme_location' => 'footer-bottom-menu',
								'menu_class'     => 'footer__nav-menu flex flex-wrap space-x-4 text-sm dark:text-jacarta-400',
								'depth'          => 1,
							) );
						?>
					<?php endif; ?>

				</div> <!-- .footer__bottom -->
			<?php endif; ?>

		</div> <!-- .container -->
	</footer>

<?php endif; ?>	