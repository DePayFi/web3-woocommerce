<?php
/**
 * Customizer Layout
 *
 * @package Xhibiter
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// Content layout
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'number',
	'settings'    => 'xhibiter_settings_content_layout_container_width',
	'label'       => esc_html__( 'Container Width (px)', 'xhibiter' ),
	'section'     => 'xhibiter_settings_content_layout',
	'default'     => $container_width,
	'choices'     => array(
		'min'  => '400',
		'max'  => '1920',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.container',
			'property'    => 'max-width',
			'units'       => 'px',
			'media_query' => $bp_xl_up,
		),
	),
	'transport' => 'auto',
) );

// Blog layout
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'radio-image',
	'settings'    => 'xhibiter_settings_blog_layout_type',
	'label'       => esc_html__( 'Layout type', 'xhibiter' ),
	'section'     => 'xhibiter_settings_blog_layout',
	'default'     => 'fullwidth',
	'choices'     => array(
		'left-sidebar'  => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
		'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
		'fullwidth'  		=> get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
	),
) );

// Blog columns
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'select',
	'settings'    => 'xhibiter_settings_blog_columns',
	'label'       => esc_html__( 'Columns', 'xhibiter' ),
	'description' => esc_html__( 'Use this option for regular blog pages, such as homepage', 'xhibiter' ),
	'section'     => 'xhibiter_settings_blog_layout',
	'default'     => 'lg:w-1/3',
	'choices'     => array(
		'lg:w-full' => esc_html__( '1 Column', 'xhibiter' ),
		'lg:w-1/2' => esc_html__( '2 Columns', 'xhibiter' ),
		'lg:w-1/3' => esc_html__( '3 Columns', 'xhibiter' ),
		'lg:w-1/4' => esc_html__( '4 Columns', 'xhibiter' ),
	),
) );


// Single post layout
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'radio-image',
	'settings'    => 'xhibiter_settings_single_post_layout_type',
	'label'       => esc_html__( 'Layout type', 'xhibiter' ),
	'section'     => 'xhibiter_settings_single_post_layout',
	'default'     => 'fullwidth',
	'choices'     => array(
		'left-sidebar'  => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
		'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
		'fullwidth'  		=> get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
	),
) );


// Page Layout
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'radio-image',
	'settings'    => 'xhibiter_settings_page_layout_type',
	'label'       => esc_html__( 'Layout type', 'xhibiter' ),
	'section'     => 'xhibiter_settings_page_layout',
	'default'     => 'fullwidth',
	'choices'     => array(
		'left-sidebar'  => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
		'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
		'fullwidth'  		=> get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
	),
) );

// Archives Layout
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'radio-image',
	'settings'    => 'xhibiter_settings_archive_layout_type',
	'label'       => esc_html__( 'Layout type', 'xhibiter' ),
	'section'     => 'xhibiter_settings_archive_layout',
	'default'     => 'fullwidth',
	'choices'     => array(
		'left-sidebar'  => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
		'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
		'fullwidth'  		=> get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
	),
) );

// Archives columns
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'select',
	'settings'    => 'xhibiter_settings_archive_columns',
	'label'       => esc_html__( 'Columns', 'xhibiter' ),
	'section'     => 'xhibiter_settings_archive_layout',
	'default'     => 'col-lg-4',
	'choices'     => array(
		'col-lg-12' => esc_html__( '1 Column', 'xhibiter' ),
		'col-lg-6'  => esc_html__( '2 Columns', 'xhibiter' ),
		'col-lg-4'  => esc_html__( '3 Columns', 'xhibiter' ),
		'col-lg-3'  => esc_html__( '4 Columns', 'xhibiter' ),
	),
) );

if ( xhibiter_is_woocommerce_activated() ) {

	// Shop layout
	Kirki::add_field( 'xhibiter_settings_config', array(
		'type'        => 'radio-image',
		'settings'    => 'xhibiter_settings_shop_layout_type',
		'label'       => esc_html__( 'Shop layout type', 'xhibiter' ),
		'description'	=> esc_html__( 'Make sure that your Shop sidebar has widgets.', 'xhibiter' ),
		'section'     => 'xhibiter_settings_shop_layout',
		'default'     => 'fullwidth',
		'choices'     => array(
			'left-sidebar'  => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
			'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
			'fullwidth'  		=> get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
		),
	) );

	// Shop pages layout
	Kirki::add_field( 'xhibiter_settings_config', array(
		'type'        => 'radio-image',
		'settings'    => 'xhibiter_settings_shop_pages_layout_type',
		'label'       => esc_html__( 'Shop pages layout type', 'xhibiter' ),
		'description'	=> esc_html__( 'Applies on Cart, Checkout and My Account pages. This setting will not have any effect if you are using custom metaboxes in Pro version.', 'xhibiter' ),
		'section'     => 'xhibiter_settings_shop_layout',
		'default'     => 'fullwidth',
		'choices'     => array(
			'left-sidebar'  => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
			'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
			'fullwidth'  		=> get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
		),
	) );

}

// Search columns
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'select',
	'settings'    => 'xhibiter_settings_search_results_columns',
	'label'       => esc_html__( 'Columns', 'xhibiter' ),
	'section'     => 'xhibiter_settings_search_results_layout',
	'default'     => 'col-lg-4',
	'choices'     => array(
		'col-lg-12' => esc_html__( '1 Column', 'xhibiter' ),
		'col-lg-6'  => esc_html__( '2 Columns', 'xhibiter' ),
		'col-lg-4'  => esc_html__( '3 Columns', 'xhibiter' ),
		'col-lg-3'  => esc_html__( '4 Columns', 'xhibiter' ),
	),
) );