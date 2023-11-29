<?php
/**
 * WooCommerce Theme Functions.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Xhibiter
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 * Custom ETH currency and currency symbol
 */
if ( ! function_exists( 'xhibiter_add_woo_currency' ) ) {
	function xhibiter_add_woo_currency( $currencies ) {
		$currencies['ETH'] = esc_html__( 'Ethereum', 'xhibiter' );
		return $currencies;
	}
}
add_filter( 'woocommerce_currencies', 'xhibiter_add_woo_currency' );

if ( ! function_exists( 'xhibiter_add_woo_currency_symbol' ) ) {
	function xhibiter_add_woo_currency_symbol( $currency_symbol, $currency ) {
		switch( $currency ) {
			case 'ETH': $currency_symbol = esc_html__( 'ETH', 'xhibiter' ); break;
		}
		return $currency_symbol;
	}
}
add_filter('woocommerce_currency_symbol', 'xhibiter_add_woo_currency_symbol', 10, 2);


if ( ! function_exists( 'xhibiter_hover_shop_loop_image' ) ) {
	/**
	* Product image back on hover
	*/
	function xhibiter_hover_shop_loop_image() {
		$image_id = isset( wc_get_product()->get_gallery_image_ids()[0] ) ? wc_get_product()->get_gallery_image_ids()[0] : null; 

		if ( $image_id ) {
			echo wp_get_attachment_image( $image_id, 'woocommerce_thumbnail', '', [ 'class' => 'xhibiter-product-image-back'] ) ;
		}
	}
}


if ( ! function_exists( 'xhibiter_woo_cart_icon' ) ) {
	/**
	* WooCommerce cart icon
	*/
	function xhibiter_woo_cart_icon() {

		if ( ! xhibiter_is_woocommerce_activated() || is_null( WC()->cart ) ) {
			return;
		}

		$count = WC()->cart->get_cart_contents_count();
		?>

		<div class="xhibiter-menu-cart woocommerce">
			
			<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="eversor-menu-icon xhibiter-menu-cart__url group flex h-10 w-10 items-center justify-center rounded-full border border-jacarta-100 bg-white transition-colors hover:border-transparent hover:bg-accent focus:border-transparent focus:bg-accent dark:border-transparent dark:bg-white/[.15] dark:hover:bg-accent" title="<?php echo esc_attr__( 'View my shopping cart', 'xhibiter' ); ?>">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4 fill-jacarta-700 transition-colors group-hover:fill-white group-focus:fill-white dark:fill-white">
					<g>
						<path fill="none" d="M0 0h24v24H0z"/>
						<path d="M6.5 2h11a1 1 0 0 1 .8.4L21 6v15a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6l2.7-3.6a1 1 0 0 1 .8-.4zm12 4L17 4H7L5.5 6h13zM9 10H7v2a5 5 0 0 0 10 0v-2h-2v2a3 3 0 0 1-6 0v-2z"/>
					</g>
				</svg>
			</a>

			<?php
				echo '<div class="xhibiter-menu-cart__dropdown">';
					woocommerce_mini_cart();
				echo '</div>';
			?>

		</div>
		<?php

	}
}


if ( ! function_exists( 'xhibiter_woo_cart_ajax_dropdown' ) ) {
	/**
	 * WooCommerce Ajax cart contents update
	 */
	function xhibiter_woo_cart_ajax_dropdown( $fragments ) {
		if ( ! xhibiter_is_woocommerce_activated() || is_null( WC()->cart ) ) {
			return;
		}
		
		$count = WC()->cart->get_cart_contents_count();
		if ( 0 === $count ) {
			$fragments['.xhibiter-menu-cart__count'] = '<span class="xhibiter-menu-cart__count xhibiter-item-counter d-none">' . esc_html( $count ) . '</span>';
		} else {
			$fragments['.xhibiter-menu-cart__count'] = '<span class="xhibiter-menu-cart__count xhibiter-item-counter">' . esc_html( $count ) . '</span>';
		}
		
		ob_start();
		echo '<div class="xhibiter-menu-cart__dropdown">';
			woocommerce_mini_cart();
		echo '</div>';
		
		$fragments['.xhibiter-menu-cart__dropdown'] = ob_get_clean();
		return $fragments;
	}
}


if ( ! function_exists( 'xhibiter_shop_before_content' ) ) {
	/**
	* Archives layout before
	*/
	function xhibiter_shop_before_content() {

			if ( get_theme_mod( 'xhibiter_settings_woocommerce_catalog_page_title_show', true ) ) {
				xhibiter_shop_page_title();
			} ?>

			<div class="shop-section relative main-content-shop py-16 md:py-24">
				<picture class="pointer-events-none absolute -z-10 inset-0 dark:hidden">
					<img src="<?php echo esc_url( XHIBITER_URI . '/assets/img/gradient_light.jpg' ) ?>" alt="" aria-hidden="true" class="h-full w-full">
				</picture>
				<div class="container">

					<div class="flex">
	
						<div class="shop-content content">
		<?php
	}
}

if ( ! function_exists( 'xhibiter_shop_after_content' ) ) {
	/**
	* Archives layout after
	*/
	function xhibiter_shop_after_content() {
		?>
						</div> <!-- .col -->
	
						<?php if ( 'fullwidth' !== xhibiter_layout_type( 'shop' ) && is_shop() && ! is_product() ) {
							do_action( 'xhibiter_shop_sidebar' );
						} ?>

					</div> <!-- .flex -->
				</div> <!-- .container -->
			</div> <!-- .main-content -->
		<?php
	}
}

if ( ! function_exists( 'xhibiter_product_markup_open' ) ) {
	/**
	* Product markup open
	*/
	function xhibiter_product_markup_open() {
		?>
			<div class="xhibiter-product">
				<div class="xhibiter-product__image-holder">
		<?php
	}
}


if ( ! function_exists( 'xhibiter_product_image_holder_close' ) ) {
	/**
	* Product image holder close
	*/
	function xhibiter_product_image_holder_close() {
		?>
			</div> <!-- .xhibiter-product__image-holder -->
		<?php
	}
}

if ( ! function_exists( 'xhibiter_product_outer_close' ) ) {
	/**
	* Product after link close
	*/
	function xhibiter_product_outer_close() {
		?>
			</div> <!-- .xhibiter-product -->
			<div class="xhibiter-product__body mt-4">
		<?php
	}
}

if ( ! function_exists( 'xhibiter_product_title' ) ) {
	/**
	* Product title
	*/
	function xhibiter_product_title() {
		echo '<h2 class="' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '">';
			woocommerce_template_loop_product_link_open();
				echo get_the_title(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			woocommerce_template_loop_product_link_close();
		echo '</h2>';
	}
}

if ( ! function_exists( 'xhibiter_before_product_price' ) ) {
	/**
	* Product before price
	*/
	function xhibiter_before_product_price() {
		echo '<div class="xhibiter-product__price mt-2">';
	}
}

if ( ! function_exists( 'xhibiter_after_product_price' ) ) {
	/**
	* Product after price
	*/
	function xhibiter_after_product_price() {
		?>

		</div> <!-- .xhibiter-product__price -->

		<div class="mt-4 flex items-center justify-between">

			<div class="xhibiter-product__add-to-cart">
				<?php echo woocommerce_template_loop_add_to_cart(); ?>
			</div>

			<?php if ( class_exists( 'YITH_WCWL' ) ) {
				echo do_shortcode( '[yith_wcwl_add_to_wishlist icon="fa-heart-o"]' );
			} ?>
		</div>

		</div> <!-- .xhibiter-product__body -->
		<?php
	}
}

if ( ! function_exists( 'xhibiter_single_product_remove_wishlist' ) ) {
	/**
	 * Remove single product wishlist icon
	 */
	function xhibiter_single_product_remove_wishlist() {
		if ( class_exists( 'YITH_WCWL' ) ) {
			remove_action( 'woocommerce_single_product_summary', array( YITH_WCWL_Frontend(), 'print_button' ), 31 );
		}
	}
}

if ( ! function_exists( 'xhibiter_single_product_add_wishlist' ) ) {
	/**
	 * Add single product wishlist icon
	 */
	function xhibiter_single_product_add_wishlist() {
		if ( class_exists( 'YITH_WCWL' ) ) {
			echo do_shortcode( '[yith_wcwl_add_to_wishlist icon="fa-heart-o"]' );
		}
	}
}


if ( ! function_exists( 'xhibiter_product_share' ) ) {
	/**
	* Product share
	*/
	function xhibiter_product_share() {
		if ( ! get_theme_mod( 'xhibiter_settings_product_share_buttons_show', true ) ) {
			return;
		}

		if ( function_exists( 'xhibiter_social_sharing_buttons' ) ) : ?>
			<div class="product-share">
				<?php
					echo '<span class="product-share__label">' . esc_html__( 'Share', 'xhibiter' ) . '</span>';
					echo xhibiter_social_sharing_buttons( 'socials--no-base', 'product' );
				?>
			</div>
		<?php endif;
	}
}


if ( ! function_exists( 'xhibiter_product_related_products_heading' ) ) {
	/**
	* Related products title
	*/
	function xhibiter_product_related_products_heading() {
		return esc_html__( 'More from this collection', 'xhibiter' );
	}
}


if ( ! function_exists( 'xhibiter_shop_page_title' ) ) {
	/**
	* Shop page title
	*/
	function xhibiter_shop_page_title() {
		
		if ( is_woocommerce() && ! is_product() && ! is_shop() ) {
			get_template_part( 'template-parts/page-title/page-title-shop' );
		}

	}
}


if ( ! function_exists( 'xhibiter_shop_get_sidebar' ) ) {
	/**
	 * Display shop sidebar
	 *
	 * @uses xhibiter_sidebar()
	 * @since 1.0.0
	 */
	function xhibiter_shop_get_sidebar() {
		if ( is_active_sidebar( 'xhibiter-shop-sidebar' ) ) {
			xhibiter_sidebar( 'xhibiter-shop-sidebar' );
		}
	}
}


if ( ! function_exists( 'xhibiter_shop_breadcrumb_delimiter' ) ) {
	/**
	* Change the breadcrumb separator
	*/
	function xhibiter_shop_breadcrumb_delimiter( $defaults ) {		

		if ( is_rtl() ) {
			$defaults['delimiter'] = '<span class="woocommerce-breadcrumb__separator">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="14" height="16" class="fill-current">
					<path fill="none" d="M0 0h24v24H0z"></path>
					<path d="M10.828 12l4.95 4.95-1.414 1.414L8 12l6.364-6.364 1.414 1.414z"></path>
				</svg>
			</span>';
		} else {
			$defaults['delimiter'] = '<span class="woocommerce-breadcrumb__separator">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="14" height="16" class="fill-current">
					<path fill="none" d="M0 0h24v24H0z"></path>
					<path d="M13.172 12l-4.95-4.95 1.414-1.414L16 12l-6.364 6.364-1.414-1.414z"></path>
				</svg>
			</span>';
		}		
		
		return $defaults;
	}
}


if ( ! function_exists( 'xhibiter_shop_pagination_arrows' ) ) {
	/**
	* Add pagination svg icons
	*/
	function xhibiter_shop_pagination_arrows( $args ) {
		$args['prev_text'] = is_rtl() ? '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="fill-current group-hover:fill-accent"><path fill="none" d="M0 0h24v24H0z"></path><path d="M13.172 12l-4.95-4.95 1.414-1.414L16 12l-6.364 6.364-1.414-1.414z"></path></svg>' : '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="fill-current group-hover:fill-accent"><path fill="none" d="M0 0h24v24H0z"></path><path d="M10.828 12l4.95 4.95-1.414 1.414L8 12l6.364-6.364 1.414 1.414z"></path></svg>';
		$args['next_text'] = is_rtl() ? '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="fill-current group-hover:fill-accent"><path fill="none" d="M0 0h24v24H0z"></path><path d="M10.828 12l4.95 4.95-1.414 1.414L8 12l6.364-6.364 1.414 1.414z"></path></svg>' : '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="fill-current group-hover:fill-accent"><path fill="none" d="M0 0h24v24H0z"></path><path d="M13.172 12l-4.95-4.95 1.414-1.414L16 12l-6.364 6.364-1.414-1.414z"></path></svg>';
		return $args;
	}
}
add_filter( 'woocommerce_pagination_args', 'xhibiter_shop_pagination_arrows' );


if ( ! function_exists( 'xhibiter_shop_tag_cloud_widget' ) ) {
	/**
	* Tag cloud font size
	*/
	function xhibiter_shop_tag_cloud_widget( $args ) {
		$args = array(
			'smallest' => 10, 
			'largest' => 10,
			'taxonomy' => 'product_tag'
		);
		return $args;
	}
}


if ( ! function_exists( 'xhibiter_quantity_plus_sign' ) ) {
	/**
	* Quantity plus
	*/
	function xhibiter_quantity_plus_sign() {
		echo '<span class="quantity__button quantity__plus"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></span>';
	}
}

if ( ! function_exists( 'xhibiter_quantity_minus_sign' ) ) {
	/**
	* Quantity minus
	*/
	function xhibiter_quantity_minus_sign() {
		echo '<span class="quantity__button quantity__minus"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg></span>';
	}
}


if ( ! function_exists( 'xhibiter_woocommerce_before_customer_login_form' ) ) {
	/**
	* My account before login form
	*/
	function xhibiter_woocommerce_before_customer_login_form() {
		echo '<div class="deo-login-form-container">';
	}
}

if ( ! function_exists( 'xhibiter_woocommerce_after_customer_login_form' ) ) {
	/**
	* My account after login form
	*/
	function xhibiter_woocommerce_after_customer_login_form() {
		echo '</div>';
	}
}

if ( ! function_exists( 'xhibiter_get_shop_category_thumbnail' ) ) {
	/**
	 * Shop category thumbnail
	 */
	function xhibiter_get_shop_category_thumbnail() {
		$thumbnail_id = get_term_meta( get_queried_object_id(), 'thumbnail_id', true );
		$image = wp_get_attachment_url( $thumbnail_id );
		return $image;
	}
}


if ( ! function_exists( 'xhibiter_woo_single_product_sale_badge' ) ) {
	/**
	 * Single product sale badge allignment
	 */
	function xhibiter_woo_single_product_sale_badge() {
		if ( ! is_product() ) return;
		global $product;

		if ( ! is_a( $product, 'WC_Product' ) ) {
			$product = wc_get_product( get_the_id() );
		}

		$gallery_image_ids = $product->get_gallery_image_ids();
		
		if ( ! empty( $gallery_image_ids ) ) :
			echo '<div class="onsale--offset"></div>';
		endif;
	}
}
add_action( 'woocommerce_before_single_product_summary', 'xhibiter_woo_single_product_sale_badge', 9 );

