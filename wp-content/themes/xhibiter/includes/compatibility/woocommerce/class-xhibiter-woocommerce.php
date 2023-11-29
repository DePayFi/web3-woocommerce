<?php
/**
 * WooCommerce Compatibility File.
 *
 * @package Xhibiter
 */


if ( ! class_exists( 'WooCommerce' ) ) {
	return;
}

/**
 * Xhibiter WooCommerce Compatibility
 */
if ( ! class_exists( 'Xhibiter_WooCommerce' ) ) {

	/**
	 * Xhibiter WooCommerce Compatibility
	 *
	 * @since 1.0.0
	 */
	class Xhibiter_WooCommerce {

		/**
		* Instance
		*
		* @var object instance
		*/
		private static $instance;

		/**
		* Get instance
		*
		* Ensures only one instance of the class is loaded or can be loaded.
		*/
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		* Constructor
		*/
		public function __construct() {
			add_action( 'wp', [ $this, 'product_catalog_customization' ], 5 );
		}


		/**
		* Product catalog customization.
		*
		* @return void
		*/
		public function product_catalog_customization() {

			// Sale badge
			if ( ! get_theme_mod( 'xhibiter_settings_woocommerce_product_sale_badge_show', true ) ) {
				remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
			}

			// Title
			if ( ! get_theme_mod( 'xhibiter_settings_woocommerce_product_title_show', true ) ) {
				remove_action( 'woocommerce_shop_loop_item_title', 'xhibiter_product_title', 10 );
			}
			
			// Rating
			if ( ! get_theme_mod( 'xhibiter_settings_woocommerce_product_rating_show', true ) ) {
				remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
			}

			// Price
			if ( ! get_theme_mod( 'xhibiter_settings_woocommerce_product_price_show', true ) ) {
				remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
			}

			// Add to Cart button
			if ( ! get_theme_mod( 'xhibiter_settings_woocommerce_product_catalog_button_show', true ) ) {
				remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 10 );
			}

			// Add to Wishlist button
			if ( ! get_theme_mod( 'xhibiter_settings_woocommerce_product_catalog_wishlist_show', true ) ) {
				remove_action( 'woocommerce_before_shop_loop_item_title', 'xhibiter_product_add_to_wishlist', 10 );
			}

			// Action Icons
			if ( ! get_theme_mod( 'xhibiter_settings_woocommerce_product_catalog_wishlist_show', true ) && ! get_theme_mod( 'xhibiter_settings_woocommerce_product_catalog_button_show', true ) ) {
				remove_action( 'woocommerce_before_shop_loop_item_title', 'xhibiter_product_action_icons_open' );
				remove_action( 'woocommerce_before_shop_loop_item_title', 'xhibiter_product_action_icons_close' );
			}

		}	

	}

}

Xhibiter_WooCommerce::get_instance();