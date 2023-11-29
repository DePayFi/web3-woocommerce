<?php

/**
 * The default header template file
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Xhibiter
 * @since 		 1.0.0
 */
if ( !defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
$header_classes = array( 'js-page-header top-0 z-20 w-full backdrop-blur transition-colors', 'nav' );
$header_classes[] = ( get_theme_mod( 'xhibiter_settings_sticky_header', true ) ? 'sticky top-0 js-page-header--sticky ' : '' );
$header_classes = implode( ' ', $header_classes );
$account_url = get_permalink( get_option( 'woocommerce_myaccount_page_id' ) );
?>

<header class="<?php 
echo  esc_attr( $header_classes ) ;
?>" role="banner" itemtype="https://schema.org/WPHeader" itemscope="itemscope">
	<div class="js-header-placeholder hidden"></div>
	<div class="xhibiter-header__container flex items-center p-5 xl:px-24">

		<?php 
xhibiter_logo_before();
?>
		<?php 
xhibiter_logo();
?>
		<?php 
xhibiter_logo_after();
?>

		<div class="ml-12 mr-8 hidden basis-3/12 lg:block xl:ml-[8%]">
			<?php 
get_search_form();
?>
		</div>

		<!-- Menu / Actions -->
		<div class="js-mobile-menu invisible lg:visible fixed inset-0 z-10 ml-auto items-center bg-white opacity-0 dark:bg-jacarta-800 lg:relative lg:inset-auto lg:flex lg:bg-transparent lg:opacity-100 dark:lg:bg-transparent">
			
			<!-- Mobile Logo / Menu Close -->
			<div class="t-0 fixed left-0 z-10 flex w-full items-center justify-between bg-white py-6 px-5 dark:bg-jacarta-800 lg:hidden">

				<?php 
xhibiter_logo();
?>

				<!-- Mobile Menu Close -->
				<button class="js-mobile-close group p-0 ml-2 flex h-10 w-10 items-center justify-center rounded-full border border-jacarta-100 bg-white transition-colors hover:border-transparent hover:bg-accent focus:border-transparent focus:bg-accent dark:border-transparent dark:bg-white/[.15] dark:hover:bg-accent" aria-label="<?php 
echo  esc_attr__( 'close mobile menu', 'xhibiter' ) ;
?>">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="h-4 w-4 fill-jacarta-700 transition-colors group-hover:fill-white group-focus:fill-white dark:fill-white">
						<path fill="none" d="M0 0h24v24H0z"></path>
						<path d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z"></path>
					</svg>
				</button>
			</div>

			<!-- Mobile Search -->
			<form role="search" method="get" class="relative mb-8 mt-28 w-full lg:hidden" action="<?php 
echo  esc_url( home_url( '/' ) ) ;
?>">
				<input type="search" class="w-full rounded-2xl border border-jacarta-100 !mb-0 py-3 px-4 pl-10 text-jacarta-700 placeholder-jacarta-500 focus:ring-accent dark:border-transparent dark:bg-white/[.15] dark:text-white dark:placeholder-white" placeholder="<?php 
echo  esc_attr_x( 'Search', 'placeholder', 'xhibiter' ) ;
?>" <?php 
echo  get_search_query() ;
?> name="s" />
				<span class="absolute left-0 top-0 flex h-full w-12 items-center justify-center rounded-2xl">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="h-4 w-4 fill-jacarta-500 dark:fill-white">
						<path fill="none" d="M0 0h24v24H0z"></path>
						<path d="M18.031 16.617l4.283 4.282-1.415 1.415-4.282-4.283A8.96 8.96 0 0 1 11 20c-4.968 0-9-4.032-9-9s4.032-9 9-9 9 4.032 9 9a8.96 8.96 0 0 1-1.969 5.617zm-2.006-.742A6.977 6.977 0 0 0 18 11c0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7a6.977 6.977 0 0 0 4.875-1.975l.15-.15z"></path>
					</svg>
				</span>
			</form>

			<?php 

if ( has_nav_menu( 'primary-menu' ) ) {
    ?>
				<!-- Primary Nav -->
				<nav class="navbar w-full">
					<?php 
    wp_nav_menu( array(
        'theme_location' => 'primary-menu',
        'fallback_cb'    => '__return_false',
        'container'      => false,
        'menu_class'     => 'nav__menu p-0 flex flex-wrap flex-col lg:flex-row',
        'walker'         => new Xhibiter_Walker_Nav_Menu(),
    ) );
    ?>

					<?php 
    xhibiter_last_menu_item_after();
    ?>
				</nav>
			<?php 
}

?>
			
			<?php 

if ( function_exists( 'xhibiter_render_social_icons' ) && get_theme_mod( 'xhibiter_settings_header_mobile_socials', true ) ) {
    ?>
				<!-- Mobile Socials -->
				<div class="mt-4 w-full lg:hidden">
					<hr class="my-5 h-px border-0 bg-jacarta-100 dark:bg-jacarta-600">
					<?php 
    echo  xhibiter_render_social_icons( 'socials--no-base text-center' ) ;
    ?>
				</div>
			<?php 
}

?>
			
			<?php 

if ( get_theme_mod( 'xhibiter_settings_header_menu_icon_cart', true ) || get_theme_mod( 'xhibiter_settings_header_menu_icon_account', true ) || get_theme_mod( 'xhibiter_settings_header_menu_icon_dark_mode', true ) ) {
    ?>
				<!-- Cart / Account / Dark Mode -->
				<div class="ml-8 hidden lg:flex xl:ml-12 space-x-2">
				
					<?php 
    if ( xhibiter_is_woocommerce_activated() && function_exists( 'xhibiter_woo_cart_icon' ) && get_theme_mod( 'xhibiter_settings_header_menu_icon_cart', true ) ) {
        xhibiter_woo_cart_icon();
    }
    ?>

					<?php 
    
    if ( xhibiter_is_woocommerce_activated() && get_theme_mod( 'xhibiter_settings_header_menu_icon_account', true ) ) {
        ?>
						<!-- Account -->
						<a href="<?php 
        echo  esc_url( $account_url ) ;
        ?>" class="group flex h-10 w-10 items-center justify-center rounded-full border border-jacarta-100 bg-white transition-colors hover:border-transparent hover:bg-accent focus:border-transparent focus:bg-accent dark:border-transparent dark:bg-white/[.15] dark:hover:bg-accent" id="profileDropdown" aria-expanded="false" aria-label="<?php 
        echo  esc_attr( 'profile', 'eversor' ) ;
        ?>">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="h-4 w-4 fill-jacarta-700 transition-colors group-hover:fill-white group-focus:fill-white dark:fill-white">
								<path fill="none" d="M0 0h24v24H0z"></path>
								<path d="M11 14.062V20h2v-5.938c3.946.492 7 3.858 7 7.938H4a8.001 8.001 0 0 1 7-7.938zM12 13c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6z"></path>
							</svg>
						</a>
					<?php 
    }
    
    ?>
					
					<?php 
    ?>

				</div>
			<?php 
}

?>	

		</div> <!-- .js-mobile-menu -->

		<!-- Mobile Menu Actions -->
		<div class="ml-auto flex lg:hidden space-x-2">

			<?php 

if ( xhibiter_is_woocommerce_activated() && get_theme_mod( 'xhibiter_settings_header_menu_icon_account', true ) ) {
    ?>
				<!-- Account -->
				<a href="<?php 
    echo  esc_url( $account_url ) ;
    ?>" class="group flex h-10 w-10 items-center justify-center rounded-full border border-jacarta-100 bg-white transition-colors hover:border-transparent hover:bg-accent focus:border-transparent focus:bg-accent dark:border-transparent dark:bg-white/[.15] dark:hover:bg-accent" id="profileDropdown" aria-expanded="false" aria-label="<?php 
    echo  esc_attr( 'profile', 'eversor' ) ;
    ?>">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="h-4 w-4 fill-jacarta-700 transition-colors group-hover:fill-white group-focus:fill-white dark:fill-white">
						<path fill="none" d="M0 0h24v24H0z"></path>
						<path d="M11 14.062V20h2v-5.938c3.946.492 7 3.858 7 7.938H4a8.001 8.001 0 0 1 7-7.938zM12 13c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6z"></path>
					</svg>
				</a>
			<?php 
}

?>
			
			<?php 
?>

			<!-- Mobile Menu Toggle -->
			<button class="js-mobile-toggle group p-0 flex h-10 w-10 items-center justify-center rounded-full border border-jacarta-100 bg-white transition-colors hover:border-transparent hover:bg-accent focus:border-transparent focus:bg-accent dark:border-transparent dark:bg-white/[.15] dark:hover:bg-accent" aria-label="<?php 
echo  esc_attr__( 'open mobile menu', 'xhibiter' ) ;
?>">
				<svg
					xmlns="http://www.w3.org/2000/svg"
					viewBox="0 0 24 24"
					width="24"
					height="24"
					class="h-4 w-4 fill-jacarta-700 transition-colors group-hover:fill-white group-focus:fill-white dark:fill-white"
				>
					<path fill="none" d="M0 0h24v24H0z" />
					<path d="M18 18v2H6v-2h12zm3-7v2H3v-2h18zm-3-7v2H6V4h12z" />
				</svg>
			</button>
		</div>

		<?php 
xhibiter_menu_before();
?>		

		<?php 
xhibiter_menu_after();
?>

	</div>
</header>