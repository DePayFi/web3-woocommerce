<?php
/**
 * WooCommerce theme hooks
 *
 * @package Xhibiter
 */

/**
 * Layout
 */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar' );
add_action( 'woocommerce_before_main_content', 'xhibiter_shop_before_content', 10 );
add_action( 'woocommerce_after_main_content', 'xhibiter_shop_after_content', 9 );
add_action( 'xhibiter_shop_sidebar', 'xhibiter_shop_get_sidebar', 10 );

/**
 * Taxonomy Archive
 */
remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description', 10 );


/**
 * Products
 */
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open' );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
add_action( 'woocommerce_before_shop_loop_item', 'xhibiter_product_markup_open' );
add_action( 'woocommerce_before_shop_loop_item_title', 'xhibiter_hover_shop_loop_image' ); 
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open' );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close' );


// Image holder close
add_action( 'woocommerce_before_shop_loop_item_title', 'xhibiter_product_image_holder_close' );

// Outer close
add_action( 'woocommerce_before_shop_loop_item_title', 'xhibiter_product_outer_close' );

// Product title
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title' );
add_action( 'woocommerce_shop_loop_item_title', 'xhibiter_product_title' );

// Price
add_action( 'woocommerce_after_shop_loop_item_title', 'xhibiter_before_product_price', 4 );
add_action( 'woocommerce_after_shop_loop_item_title', 'xhibiter_after_product_price', 10 );

// Rating
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 3 );


/**
 * Single Product
 */
add_action( 'woocommerce_share', 'xhibiter_product_share' );
add_filter( 'woocommerce_product_related_products_heading', 'xhibiter_product_related_products_heading' );


/**
 * Single product wishlist
 */
add_action( 'woocommerce_single_product_summary', 'xhibiter_single_product_remove_wishlist' );
add_action( 'woocommerce_after_add_to_cart_button', 'xhibiter_single_product_add_wishlist' );


/**
 * Widgets
 */
add_filter( 'woocommerce_product_tag_cloud_widget_args', 'xhibiter_shop_tag_cloud_widget' );


/**
 * Breadcrumbs
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
add_action( 'xhibiter_shop_breadcrumbs', 'woocommerce_breadcrumb', 10 );
add_filter( 'woocommerce_breadcrumb_defaults', 'xhibiter_shop_breadcrumb_delimiter' );


/**
 * Page Title
 */
add_filter( 'woocommerce_show_page_title', '__return_false' );


/**
 * AJAX Cart
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'xhibiter_woo_cart_ajax_dropdown' );


/**
 * My Account Page
 */
add_action( 'woocommerce_before_customer_login_form', 'xhibiter_woocommerce_before_customer_login_form' );
add_action( 'woocommerce_after_customer_login_form', 'xhibiter_woocommerce_after_customer_login_form' );


/**
 * Quantity buttons
 */
add_action( 'woocommerce_after_quantity_input_field', 'xhibiter_quantity_plus_sign' ); 
add_action( 'woocommerce_before_quantity_input_field', 'xhibiter_quantity_minus_sign' );