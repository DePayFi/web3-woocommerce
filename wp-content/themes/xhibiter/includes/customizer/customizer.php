<?php
/**
 * Theme Customizer
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Xhibiter
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

function xhibiter_customize_register( $wp_customize ) {

	// Customize Background Settings
	$wp_customize->get_section('background_image')->title = esc_html__('Background Styles', 'xhibiter');  
	$wp_customize->get_control('background_color')->section = 'background_image';

	// Remove colors section
	$wp_customize->remove_section('colors');
}
add_action( 'customize_register', 'xhibiter_customize_register' );

// Check if Kirki is installed
if ( class_exists( 'Kirki' ) ) {

	function xhibiter_customizer_options() {

		// Selector Vars 
		$selectors = array(

			'headings'        =>
				'h1,h2,h3,h4,h5,h6,
				.comment-author',

			'h1'              => 'h1, .h1',
			'h2'              => 'h2, .h2',
			'h3'              => 'h3, .h3',
			'h4'              => 'h4, .h4',
			'h5'              => 'h5, .h5',
			'h6'              => 'h6, .h6',

			'base_font'				=> 'body',

			'buttons'					=>
				'input[type="button"],
				input[type="reset"],
				input[type="submit"],
				button,
				.btn,
				.button,
				.wp-block-button .wp-block-button__link,
				.added_to_cart'

		);

		if ( xhibiter_is_woocommerce_activated() ) {
			$selectors['shop_headings_font']  = '.woocommerce #review_form .comment-reply-title, ul.product_list_widget li a:not(.remove)';
		}

		if ( function_exists( 'xhibiter_get_typekit_fonts') ) {
			$typekit_fonts = xhibiter_get_typekit_fonts();
		}

		$heading_font = ( isset( $typekit_fonts ) && ! empty( $typekit_fonts && isset( $typekit_fonts[0] ) ) ) ? $typekit_fonts[0] : 'CalSans Semibold';
		$body_font = ( isset( $typekit_fonts ) && ! empty( $typekit_fonts && isset( $typekit_fonts[1] ) ) ) ? $typekit_fonts[1] : 'DM Sans';
		$border_color = '#ebebeb';
		$primary_color = '#8358ff';
		$secondary_color = '#131740';
		$text_color = '#5a5d79';
		$bg_light = '#f4f4f6';
		$mobile_menu_dividers_color = '#e3e3e3';
		$container_width = '1210';

		$bp_xl_up   = '@media (min-width: 1210px)';
		$bp_xl_down = '@media (min-width: 1209px)';
		$bp_lg_up   = '@media (min-width: 1025px)';
		$bp_lg_down = '@media (max-width: 1024px)';
		$bp_md_up   = '@media (min-width: 768px)';
		$bp_md_down = '@media (max-width: 767px)';


		// Kirki
		Kirki::add_config( 'xhibiter_settings_config', array(
			'capability'    => 'edit_theme_options',
			'option_type'   => 'theme_mod',
			'option_name'   => 'xhibiter_settings_config'
		) );	


		/**
		* SECTIONS / PANELS
		**/

		$priority = 20;
		$uniqid = 1;

		// 1. GENERAL PANEL
		Kirki::add_panel( 'xhibiter_settings_general', array(
			'title'       => esc_attr__( 'General', 'xhibiter' ),
			'priority'    => $priority++,
		) );

				// Preloader
				Kirki::add_section( 'xhibiter_settings_preloader', array(
					'title' => esc_html__( 'Preloader', 'xhibiter' ),
					'panel'	=> 'xhibiter_settings_general',
				) );

				// Buttons
				Kirki::add_section( 'xhibiter_settings_buttons', array(
					'title' => esc_html__( 'Buttons', 'xhibiter' ),
					'panel'	=> 'xhibiter_settings_general',
				) );

				// Back to Top
				Kirki::add_section( 'xhibiter_settings_back_to_top', array(
					'title' => esc_html__( 'Back to Top', 'xhibiter' ),
					'panel'	=> 'xhibiter_settings_general',
				) );

				// Portfolio
				Kirki::add_section( 'xhibiter_settings_portfolio', array(
					'title' => esc_html__( 'Portfolio', 'xhibiter' ),
					'panel'	=> 'xhibiter_settings_general',
				) );

		// 2. HEADER PANEL
		Kirki::add_panel( 'xhibiter_settings_header', array(
			'title'          => esc_html__( 'Header', 'xhibiter' ),
			'priority'       => $priority++,
		) );

				// Header
				Kirki::add_section( 'xhibiter_settings_default_header', array(
					'title'          => esc_html__( 'Header', 'xhibiter' ),
					'panel'			 		 => 'xhibiter_settings_header',
				) );

				// Logo
				Kirki::add_section( 'xhibiter_settings_logo', array(
					'title'          => esc_html__( 'Logo', 'xhibiter' ),
					'panel'			 		 => 'xhibiter_settings_header',
				) );

				// Top Bar
				Kirki::add_section( 'xhibiter_settings_top_bar', array(
					'title'          => esc_html__( 'Top Bar', 'xhibiter' ),
					'panel'			 		 => 'xhibiter_settings_header',
				) );


		// 3. FOOTER
		Kirki::add_section( 'xhibiter_settings_footer', array(
			'title'       => esc_html__( 'Footer', 'xhibiter' ),
			'priority'    => $priority++,
		) );

		// 4. LAYOUT PANEL
		Kirki::add_panel( 'xhibiter_settings_layout', array(
			'title'          => esc_html__( 'Layout', 'xhibiter' ),
			'priority'       => $priority++,
		) );

				// Content
				Kirki::add_section( 'xhibiter_settings_content_layout', array(
					'title'          => esc_html__( 'Content', 'xhibiter' ),
					'panel'			 		 => 'xhibiter_settings_layout',
				) );

				// Blog Layout
				Kirki::add_section( 'xhibiter_settings_blog_layout', array(
					'title'          => esc_html__( 'Blog', 'xhibiter' ),
					'description'    => esc_html__( 'Layout options for the blog pages', 'xhibiter' ),
					'panel'			 		 => 'xhibiter_settings_layout',
				) );

				// Single Post Layout
				Kirki::add_section( 'xhibiter_settings_single_post_layout', array(
					'title'          => esc_html__( 'Single Post', 'xhibiter' ),
					'panel'			 		 => 'xhibiter_settings_layout',
				) );

				// Projects Layout
				Kirki::add_section( 'xhibiter_settings_projects_layout', array(
					'title'          => esc_html__( 'Projects', 'xhibiter' ),
					'description'    => esc_html__( 'Layout options for the projects archive pages', 'xhibiter' ),
					'panel'			 		 => 'xhibiter_settings_layout',
				) );

				// Page Layout
				Kirki::add_section( 'xhibiter_settings_page_layout', array(
					'title'          => esc_html__( 'Page', 'xhibiter' ),
					'description'    => esc_html__( 'Layout options for the regular pages', 'xhibiter' ),
					'panel'			     => 'xhibiter_settings_layout',
				) );

				// Archive Layout
				Kirki::add_section( 'xhibiter_settings_archive_layout', array(
					'title'          => esc_html__( 'Archive', 'xhibiter' ),
					'description'    => esc_html__( 'Layout options for archive and categories pages', 'xhibiter' ),
					'panel'			 		 => 'xhibiter_settings_layout',
				) );				

				if ( xhibiter_is_woocommerce_activated() ) {
					// Shop Layout
					Kirki::add_section( 'xhibiter_settings_shop_layout', array(
						'title'          => esc_html__( 'Shop', 'xhibiter' ),
						'description'    => esc_html__( 'Layout options for shop catalog pages', 'xhibiter' ),
						'panel'					 => 'xhibiter_settings_layout',
					) );
				}

				// Search Results Layout
				Kirki::add_section( 'xhibiter_settings_search_results_layout', array(
					'title'          => esc_html__( 'Search Results', 'xhibiter' ),
					'description'    => esc_html__( 'Layout options for search result page', 'xhibiter' ),
					'panel'					 => 'xhibiter_settings_layout',
				) );	


		// 5. COLORS PANEL
		Kirki::add_panel( 'xhibiter_settings_colors', array(
			'title'          => esc_html__( 'Colors', 'xhibiter' ),
			'priority'       => $priority++,
		) );

			// General Colors
			Kirki::add_section( 'xhibiter_settings_general_colors', array(
				'title'  => esc_html__( 'General', 'xhibiter' ),
				'panel'	 => 'xhibiter_settings_colors',
			) );
			
			// Shop Colors
			if ( xhibiter_is_woocommerce_activated() ) {
				Kirki::add_section( 'xhibiter_settings_shop_colors', array(
					'title'      => esc_html__( 'Shop', 'xhibiter' ),
					'panel'			 => 'xhibiter_settings_colors',
				) );
			}
			
			if ( class_exists( 'Xhibiter_Core' ) ) {
				// Cookies Bar Colors
				Kirki::add_section( 'xhibiter_settings_cookies_bar_colors', array(
					'title'      => esc_html__( 'Cookies Bar', 'xhibiter' ),
					'panel'			 => 'xhibiter_settings_colors',
				) );
			}

		// 6. TYPOGRAPHY
		Kirki::add_section( 'xhibiter_settings_typography', array(
			'title'          => esc_html__( 'Typography', 'xhibiter' ),
			'priority'       => $priority++,
		) );

		// 7. BLOG PANEL
		Kirki::add_panel( 'xhibiter_settings_blog', array(
			'title'       => esc_attr__( 'Blog', 'xhibiter' ),
			'priority'    => $priority++,
		) );

				// Page title
				Kirki::add_section( 'xhibiter_settings_blog_page_title', array(
					'title'          => esc_html__( 'Page Title', 'xhibiter' ),
					'panel'          => 'xhibiter_settings_blog',
				) );

				// Post Meta
				Kirki::add_section( 'xhibiter_settings_post_meta', array(
					'title'          => esc_html__( 'Post Meta', 'xhibiter' ),
					'panel'          => 'xhibiter_settings_blog',
				) );

				// Single Post
				Kirki::add_section( 'xhibiter_settings_single_post', array(
					'title'          => esc_html__( 'Single Post', 'xhibiter' ),
					'panel'          => 'xhibiter_settings_blog',
				) );

				if ( class_exists( 'Xhibiter_Core' ) ) {
					// Social Share
					Kirki::add_section( 'xhibiter_settings_social_share', array(
						'title'          => esc_html__( 'Social Share Buttons', 'xhibiter' ),
						'panel'          => 'xhibiter_settings_blog',
					) );
				}

				// Post Excerpt
				Kirki::add_section( 'xhibiter_settings_post_excerpt', array(
					'title'          => esc_html__( 'Excerpt', 'xhibiter' ),
					'panel'          => 'xhibiter_settings_blog',
				) );


		if ( class_exists( 'Xhibiter_Core' ) ) {

			// 8. Socials
			Kirki::add_section( 'xhibiter_settings_socials', array(
				'title'          => esc_html__( 'Socials', 'xhibiter' ),
				'description'    => esc_html__( 'Socials options. Paste your social profile links here', 'xhibiter'  ),
				'priority'       => $priority++,
			) );

			// 9. GDPR
			Kirki::add_section( 'xhibiter_settings_gdpr', array(
				'title'          => esc_html__( 'GDPR', 'xhibiter' ),
				'description'    => esc_html__( 'Settings for GDPR compliance.', 'xhibiter'  ),
				'priority'       => $priority++,
			) );

		}

		// 10. Page 404
		Kirki::add_section( 'xhibiter_settings_page_404', array(
			'title'          => esc_html__( 'Page 404', 'xhibiter' ),
			'description'    => esc_html__( 'Settings for page 404', 'xhibiter' ),
			'priority'       => $priority++,
		) );		

		if ( xhibiter_is_woocommerce_activated() ) {
			// WooCommerce Social Share
			Kirki::add_section( 'xhibiter_settings_product_social_share', array(
				'title'        => esc_html__( 'Social share buttons', 'xhibiter' ),
				'panel'        => 'woocommerce',
			) );
		}


		// Load modules
		require_once XHIBITER_DIR . '/includes/customizer/modules/general.php';
		require_once XHIBITER_DIR . '/includes/customizer/modules/header.php';
		require_once XHIBITER_DIR . '/includes/customizer/modules/footer.php';	
		require_once XHIBITER_DIR . '/includes/customizer/modules/layout.php';
		require_once XHIBITER_DIR . '/includes/customizer/modules/blog.php';
		require_once XHIBITER_DIR . '/includes/customizer/modules/colors.php';
		require_once XHIBITER_DIR . '/includes/customizer/modules/typography.php';

		if ( class_exists( 'Xhibiter_Core' ) ) {
			require_once XHIBITER_DIR . '/includes/customizer/modules/socials.php';
			require_once XHIBITER_DIR . '/includes/customizer/modules/gdpr.php';
		}

		require_once XHIBITER_DIR . '/includes/customizer/modules/page-404.php';

		if ( xhibiter_is_woocommerce_activated() ) {
			require_once XHIBITER_DIR . '/includes/customizer/modules/woocommerce.php';
		}

	}

	xhibiter_customizer_options();		

} // endif Kirki check