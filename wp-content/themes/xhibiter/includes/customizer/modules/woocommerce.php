<?php
/**
 * WooCommerce
 *
 * @package Xhibiter
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/*-------------------------------------------------------*/
/* WooCommerce
/*-------------------------------------------------------*/

/*-------------------------------------------------------*/
/* Product Social Share Buttons
/*-------------------------------------------------------*/

Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'xhibiter_settings_product_share_buttons_show',
	'label'       => esc_html__( 'Show share buttons', 'xhibiter' ),
	'section'     => 'xhibiter_settings_product_social_share',
	'default'     => false,
) );

// Facebook Share
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'xhibiter_settings_product_share_facebook',
	'label'       => esc_html__( 'Facebook', 'xhibiter' ),
	'section'     => 'xhibiter_settings_product_social_share',
	'default'     => false,
) );

// Twitter Share
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'xhibiter_settings_product_share_twitter',
	'label'       => esc_html__( 'Twitter', 'xhibiter' ),
	'section'     => 'xhibiter_settings_product_social_share',
	'default'     => false,
) );

// Linkedin Share
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'xhibiter_settings_product_share_linkedin',
	'label'       => esc_html__( 'Linkedin', 'xhibiter' ),
	'section'     => 'xhibiter_settings_product_social_share',
	'default'     => false,
) );

// Pinterest Share
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'xhibiter_settings_product_share_pinterest',
	'label'       => esc_html__( 'Pinterest', 'xhibiter' ),
	'section'     => 'xhibiter_settings_product_social_share',
	'default'     => false,
) );

// Pocket Share
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'xhibiter_settings_product_share_pocket',
	'label'       => esc_html__( 'Pocket', 'xhibiter' ),
	'section'     => 'xhibiter_settings_product_social_share',
	'default'     => false,
) );

// Facebook Messenger Share
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'xhibiter_settings_product_share_facebook_messenger',
	'label'       => esc_html__( 'Facebook Messenger', 'xhibiter' ),
	'section'     => 'xhibiter_settings_product_social_share',
	'default'     => false,
) );

// Whatsapp Share
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'xhibiter_settings_product_share_whatsapp',
	'label'       => esc_html__( 'Whatsapp', 'xhibiter' ),
	'section'     => 'xhibiter_settings_product_social_share',
	'default'     => false,
) );

// Viber Share
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'xhibiter_settings_product_share_viber',
	'label'       => esc_html__( 'Viber', 'xhibiter' ),
	'section'     => 'xhibiter_settings_product_social_share',
	'default'     => false,
) );

// Telegram Share
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'xhibiter_settings_product_share_telegram',
	'label'       => esc_html__( 'Telegram', 'xhibiter' ),
	'section'     => 'xhibiter_settings_product_social_share',
	'default'     => false,
) );

// Reddit Share
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'xhibiter_settings_product_share_reddit',
	'label'       => esc_html__( 'Reddit', 'xhibiter' ),
	'section'     => 'xhibiter_settings_product_social_share',
	'default'     => false,
) );

// Email Share
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'xhibiter_settings_product_share_email',
	'label'       => esc_html__( 'Email', 'xhibiter' ),
	'section'     => 'xhibiter_settings_product_social_share',
	'default'     => false,
) );


/*-------------------------------------------------------*/
/* Catalog
/*-------------------------------------------------------*/

/*-------------------------------------------------------*/
/* Page Title
/*-------------------------------------------------------*/
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'custom',
	'settings'    => 'separator-' . $uniqid++,
	'section'     => 'woocommerce_product_catalog',
	'default'     => '<h3 class="customizer-title">' . esc_html__( 'Page Title', 'xhibiter' ) . '</h3>',
) );

// Show catalog page title
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'xhibiter_settings_woocommerce_catalog_page_title_show',
	'label'       => esc_html__( 'Show page title', 'xhibiter' ),
	'section'     => 'woocommerce_product_catalog',
	'default'     => true,
) );

// Page description
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'text',
	'settings'    => 'xhibiter_settings_woocommerce_page_title_description',
	'label'       => esc_html__( 'Page title description', 'xhibiter' ),
	'section'     => 'woocommerce_product_catalog',
	'default'     => esc_html__( 'It represents a clean, green source of energy. Solar power is a great way to reduce your carbon footprint.', 'xhibiter' ),
) );


/*-------------------------------------------------------*/
/* Product Elements
/*-------------------------------------------------------*/
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'custom',
	'settings'    => 'separator-' . $uniqid++,
	'section'     => 'woocommerce_product_catalog',
	'default'     => '<h3 class="customizer-title">' . esc_html__( 'Product Elements', 'xhibiter' ) . '</h3>',
) );

// Show product Sale badge
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'xhibiter_settings_woocommerce_product_sale_badge_show',
	'label'       => esc_html__( 'Show sale badge', 'xhibiter' ),
	'section'     => 'woocommerce_product_catalog',
	'default'     => true,
) );

// Show product title
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'xhibiter_settings_woocommerce_product_title_show',
	'label'       => esc_html__( 'Show title', 'xhibiter' ),
	'section'     => 'woocommerce_product_catalog',
	'default'     => true,
) );

// Show product rating
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'xhibiter_settings_woocommerce_product_rating_show',
	'label'       => esc_html__( 'Show rating', 'xhibiter' ),
	'section'     => 'woocommerce_product_catalog',
	'default'     => true,
) );

// Show product price
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'xhibiter_settings_woocommerce_product_price_show',
	'label'       => esc_html__( 'Show price', 'xhibiter' ),
	'section'     => 'woocommerce_product_catalog',
	'default'     => true,
) );

// Show product Add To Wishlist button
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'xhibiter_settings_woocommerce_product_catalog_wishlist_show',
	'label'       => esc_html__( 'Show add to wishlist button', 'xhibiter' ),
	'section'     => 'woocommerce_product_catalog',
	'default'     => true,
) );

// Show product Add To Cart button
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'xhibiter_settings_woocommerce_product_catalog_button_show',
	'label'       => esc_html__( 'Show add to cart button', 'xhibiter' ),
	'section'     => 'woocommerce_product_catalog',
	'default'     => true,
) );