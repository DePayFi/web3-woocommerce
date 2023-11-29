<?php
/**
 * Theme setup.
 *
 * @package Xhibiter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


if ( ! function_exists( 'xhibiter_setup' ) ) :
	/**
	* Sets up theme defaults and registers support for various WordPress features.
	*
	* Note that this function is hooked into the after_setup_theme hook, which
	* runs before the init hook. The init hook is too late for some features, such
	* as indicating support for post thumbnails.
	*/
	function xhibiter_setup() {

		load_theme_textdomain( 'xhibiter', XHIBITER_DIR . '/languages' );

		// Enable theme support
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', ) );
		add_theme_support( 'post-formats', array( 'video', 'audio' ) );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'custom-background', apply_filters( 'xhibiter_custom_background_args', array(
			'default-color' => '#ffffff',
			'default-image' => '',
		) ) );
		
		// WooCommerce
		if ( xhibiter_is_woocommerce_activated() ) {			
			add_theme_support( 'woocommerce', array(
				'thumbnail_image_width' => 460,
				'gallery_thumbnail_image_width' => 148,
				'single_image_width' => 540,
				'product_grid'      => array(
					'default_columns' => 3,
					'default_rows'    => 3,
				),
			) );
			add_theme_support( 'wc-product-gallery-zoom' );
			add_theme_support( 'wc-product-gallery-lightbox' );
			add_theme_support( 'wc-product-gallery-slider' );
		}

		// Gutenberg
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );

		add_theme_support( 'editor-styles' );
		add_editor_style();

		add_theme_support( 'custom-spacing' );
		add_theme_support( 'editor-color-palette', array(
			array(
				'name' => esc_html__( 'Primary', 'xhibiter' ),
				'slug' => 'primary',
				'color' => get_theme_mod( 'xhibiter_settings_primary_color', '#8358ff' ),
			),
			array(
				'name' => esc_html__( 'Jacarta 900', 'xhibiter' ),
				'slug' => 'jacarta-900',
				'color' => get_theme_mod( 'xhibiter_settings_headings_color', '#0D102D' ),
			),
			array(
				'name' => esc_html__( 'Jacarta 800', 'xhibiter' ),
				'slug' => 'jacarta-800',
				'color' => get_theme_mod( 'xhibiter_settings_headings_color', '#101436' ),
			),
			array(
				'name' => esc_html__( 'Jacarta 700', 'xhibiter' ),
				'slug' => 'jacarta-700',
				'color' => get_theme_mod( 'xhibiter_settings_headings_color', '#131740' ),
			),
			array(
				'name' => esc_html__( 'Jacarta 600', 'xhibiter' ),
				'slug' => 'jacarta-600',
				'color' => get_theme_mod( 'xhibiter_settings_headings_color', '#363A5D' ),
			),		
			array(
				'name' => esc_html__( 'Jacarta 500', 'xhibiter' ),
				'slug' => 'jacarta-500',
				'color' => get_theme_mod( 'xhibiter_settings_text_color', '#5a5d79' ),
			),
			array(
				'name' => esc_html__( 'Jacarta 400', 'xhibiter' ),
				'slug' => 'jacarta-400',
				'color' => get_theme_mod( 'xhibiter_settings_text_color', '#7D7F96' ),
			),
			array(
				'name' => esc_html__( 'Jacarta 300', 'xhibiter' ),
				'slug' => 'jacarta-300',
				'color' => '#a1a2b3',
			),
			array(
				'name' => esc_html__( 'Jacarta 200', 'xhibiter' ),
				'slug' => 'jacarta-200',
				'color' => '#C4C5CF',
			),
			array(
				'name' => esc_html__( 'Jacarta 100', 'xhibiter' ),
				'slug' => 'jacarta-100',
				'color' => '#E7E8EC',
			),
			array(
				'name' => esc_html__( 'Jacarta 50', 'xhibiter' ),
				'slug' => 'jacarta-50',
				'color' => '#F4F4F6',
			),
			array(
				'name' => esc_html__( 'Background Light', 'xhibiter' ),
				'slug' => 'bg-light',
				'color' => get_theme_mod( 'xhibiter_settings_background_light_color', '#f5f8fa' ),
			)
		) );

		// Thumbnails
		add_image_size( 'xhibiter_featured_medium', 740, 0, false );
		add_image_size( 'xhibiter_featured_large', 1170, 678, true );
		
		// Nav menus
		register_nav_menus( array(
			'primary-menu' => esc_html__( 'Primary Menu', 'xhibiter' ),
			'footer-bottom-menu' => esc_html__( 'Footer Bottom Menu', 'xhibiter' ),
		) );

		// Disable Elementor onboarding
		update_option( 'elementor_onboarded', 1 );

		// Disable WooCommerce wizard redirect
		add_filter( 'woocommerce_enable_setup_wizard', '__return_false' );
		add_filter( 'woocommerce_show_admin_notice', '__return_false' );
		add_filter( 'woocommerce_prevent_automatic_wizard_redirect', '__return_false' );

		// Disable Kirki telemetry
		add_filter( 'kirki_telemetry', '__return_false' );

		// Allow shorcodes in text widgets
		add_filter( 'widget_text', 'do_shortcode' );

	}
endif; // theme_setup
add_action( 'after_setup_theme', 'xhibiter_setup' );


// Update Elementor Defaults
if ( 1 != get_option( 'xhibiter_elementor_defaults', 0 ) ) {
	add_option( 'xhibiter_elementor_defaults', 0 );
}

/**
* Update Elementor defaults.
*/
function xhibiter_update_elementor_defaults() {
	if ( 1 != get_option( 'xhibiter_elementor_defaults' ) ) {
		update_option( 'elementor_cpt_support', array(
			'post',
			'page',
			'projects',
			'theme_template'
		) );
		
		// Disable YITH wishlist socials
		update_option( 'yith_wcwl_share_fb', 'no' );
		update_option( 'yith_wcwl_share_twitter', 'no' );
		update_option( 'yith_wcwl_share_pinterest', 'no' );
		update_option( 'yith_wcwl_share_email', 'no' );
		update_option( 'yith_wcwl_share_whatsapp', 'no' );

		update_option( '_elementor_editor_upgrade_notice_dismissed', time() + '9999999999' );
		update_option( 'elementor_disable_color_schemes', 'yes' );
		update_option( 'elementor_disable_typography_schemes', 'yes' );
		update_option( 'elementor_unfiltered_files_upload', 1 );
		update_option( 'elementor_experiment-container', 'active' );
		update_option( 'elementor_experiment-e_font_icon_svg', 'active' );
		update_option( 'elementor_experiment-e_lazyload', 'active' );
		update_option( 'elementor_experiment-e_swiper_latest', 'active' );
		update_option( 'xhibiter_elementor_defaults', 1 );
	}
}
add_action( 'init', 'xhibiter_update_elementor_defaults' );


/**
* Register widget areas.
*/
function xhibiter_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'xhibiter' ),
		'id'            => 'xhibiter-blog-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Page Sidebar', 'xhibiter' ),
		'id'            => 'xhibiter-page-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );	

	if ( xhibiter_is_woocommerce_activated() ) {

		register_sidebar( array(
			'name'          => esc_html__( 'Shop Sidebar', 'xhibiter' ),
			'id'            => 'xhibiter-shop-sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

	}
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'xhibiter' ),
		'id'            => 'xhibiter-footer-col-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'xhibiter' ),
		'id'            => 'xhibiter-footer-col-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );	

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'xhibiter' ),
		'id'            => 'xhibiter-footer-col-3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 4', 'xhibiter' ),
		'id'            => 'xhibiter-footer-col-4',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'xhibiter_widgets_init' );