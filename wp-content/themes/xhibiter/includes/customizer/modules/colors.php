<?php
/**
 * Customizer Colors
 *
 * @package Xhibiter
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 * Extract RGB channels
 */
function xhibiter_extract_rgb_channels( $input ) {
	$sanitized_value = str_replace( 'rgb', '', $input );
	$sanitized_value = str_replace( '(', '', $sanitized_value );
	$sanitized_value = str_replace( ')', '', $sanitized_value );
	$sanitized_value = str_replace( ',', '', $sanitized_value );

	return $sanitized_value;
}

/*-------------------------------------------------------*/
/* General Colors
/*-------------------------------------------------------*/

// Primary color
new \Kirki\Field\Color( array(
	'settings'    => 'xhibiter_settings_primary_color',
	'label'       => esc_html__( 'Primary', 'xhibiter' ),
	'section'     => 'xhibiter_settings_general_colors',
	'default'     => $primary_color,
	'output' => array(
		array(
			'element'  => 'body, :root',
			'property' => '--deo-primary-color',
		),
		array(
			'element'  => 'body, :root, [class*="elementor-kit-"]',
			'property' => '--e-global-color-accent',
		),		
		array(
			'element'  => 'body, :root',
			'property' => '--deo-primary-color-rgb',
			'sanitize_callback' => 'xhibiter_extract_rgb_channels',
		),
		array(
			'element'  => 'body, :root',
			'property' => '--deo-primary-color-rgb--inner-shadow-bottom',
			'sanitize_callback' => function( $value ) {
				return implode( ' ', Kirki_Color::get_rgb( Kirki_Color::adjust_brightness( $value, -40 ) ) );
			},
		),
		array(
			'element'  => 'body, :root',
			'property' => '--deo-primary-color-rgb--inner-shadow-top',
			'sanitize_callback' => function( $value ) {
				return implode( ' ', Kirki_Color::get_rgb( Kirki_Color::adjust_brightness( $value, 40 ) ) );
			},
		),
	),
	'choices'     => [
		'alpha' => true,
		'form_component' => 'RgbStringColorPicker',
	],
) );

// Headings colors
new \Kirki\Field\Color( array(
	'settings'    => 'xhibiter_settings_headings_color',
	'label'       => esc_html__( 'Headings', 'xhibiter' ),
	'section'     => 'xhibiter_settings_general_colors',
	'default'     => $secondary_color,
	'output' => array(
		array(
			'element'  => '.light body, :root.light',
			'property' => '--deo-heading-color',
		),
	),
	'transport' => 'auto',
) );

// Text color
new \Kirki\Field\Color( array(
	'settings'    => 'xhibiter_settings_text_color',
	'label'       => esc_html__( 'Text', 'xhibiter' ),
	'section'     => 'xhibiter_settings_general_colors',
	'default'     => $text_color,
	'output' => array(
		array(
			'element'  => 'body, :root',
			'property' => '--deo-text-color',
		),
	),
	'transport' => 'auto',
) );

// Background light
new \Kirki\Field\Color( array(
	'settings'    => 'xhibiter_settings_background_light_color',
	'label'       => esc_html__( 'Background light', 'xhibiter' ),
	'section'     => 'xhibiter_settings_general_colors',
	'default'     => $bg_light,
	'output' => array(
		array(
			'element'  => 'body, :root',
			'property' => '--deo-background-color--light',
		),
	),
	'transport' => 'auto',
) );


// Borders color
new \Kirki\Field\Color( array(
	'type'        => 'color',
	'settings'    => 'xhibiter_settings_borders_color',
	'label'       => esc_html__( 'Borders', 'xhibiter' ),
	'section'     => 'xhibiter_settings_general_colors',
	'default'     => $border_color,
	'output' => array(
		array(
			'element'     => '.nav__menu li a',
			'property'    => 'border-bottom-color',
			'media_query' => $bp_lg_down,
		),
	),
	'transport' => 'auto',
) );


// Buttons
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'custom',
	'settings'    => 'separator-' . $uniqid++,
	'section'     => 'xhibiter_settings_general_colors',
	'default'     => '<h3 class="customizer-title">' . esc_html__( 'Buttons', 'xhibiter' ) . '</h3>',
) );

// Colored buttons hover background color
new \Kirki\Field\Color( array(
	'type'        => 'color',
	'settings'    => 'xhibiter_settings_colored_buttons_hover_background_color',
	'label'       => esc_html__( 'Colored buttons hover background', 'xhibiter' ),
	'section'     => 'xhibiter_settings_general_colors',
	'default'     => $primary_color_dark,
	'output' => array(
		array(
			'element' => 'body, :root',
			'property' => '--deo-primary-color-dark-rgb',
			'sanitize_callback' => 'xhibiter_extract_rgb_channels',
		),
	),
	'choices'     => [
		'alpha' => true,
		'form_component' => 'RgbStringColorPicker',
	],
	// 'transport' => 'auto',
) );

// Buttons hover background color
new \Kirki\Field\Color( array(
	'type'        => 'color',
	'settings'    => 'xhibiter_settings_buttons_hover_background_color',
	'label'       => esc_html__( 'Hover background', 'xhibiter' ),
	'section'     => 'xhibiter_settings_general_colors',
	'default'     => $secondary_color,
	'output' => array(
		array(
			'element' => 'body, :root',
			'property' => '--deo-buttons-hover-background-color',
		),
	),
	'transport' => 'auto',
) );

// Buttons hover border color
new \Kirki\Field\Color( array(
	'type'        => 'color',
	'settings'    => 'xhibiter_settings_buttons_hover_border_color',
	'label'       => esc_html__( 'Hover border', 'xhibiter' ),
	'section'     => 'xhibiter_settings_general_colors',
	'default'     => $secondary_color,
	'output' => array(
		array(
			'element' => 'body, :root',
			'property' => '--deo-buttons-hover-border-color',
		),
	),
	'transport' => 'auto',
) );

// Buttons hover text color
new \Kirki\Field\Color( array(
	'type'        => 'color',
	'settings'    => 'xhibiter_settings_buttons_hover_text_color',
	'label'       => esc_html__( 'Hover text', 'xhibiter' ),
	'section'     => 'xhibiter_settings_general_colors',
	'default'     => '#ffffff',
	'output' => array(
		array(
			'element' => 'body, :root',
			'property' => '--deo-buttons-hover-text-color',
		),
	),
	'transport' => 'auto',
) );


/*-------------------------------------------------------*/
/* Shop Colors
/*-------------------------------------------------------*/
if ( xhibiter_is_woocommerce_activated() ) {

	// Price color
	new \Kirki\Field\Color( array(
		'type'        => 'color',
		'settings'    => 'xhibiter_settings_shop_price_color',
		'label'       => esc_html__( 'Price color', 'xhibiter' ),
		'section'     => 'xhibiter_settings_shop_colors',
		'default'     => '',
		'output' => array(
			array(
				'element'  => '.xhibiter-product__price .amount',
				'property' => 'color',
			),
			array(
				'element'  => '.woocommerce div.product p.price, .woocommerce div.product span.price',
				'property' => '--deo-green-color',
			)
		),
		'transport' => 'auto',
	) );
}

if ( class_exists( 'Xhibiter_Core' ) ) {
	/*-------------------------------------------------------*/
	/* Cookies Bar Colors
	/*-------------------------------------------------------*/

	// Cookies bar background color
	new \Kirki\Field\Color( array(
		'type'        => 'color',
		'settings'    => 'xhibiter_settings_cookies_bar_background_color',
		'label'       => esc_html__( 'Cookies bar background color', 'xhibiter' ),
		'section'     => 'xhibiter_settings_cookies_bar_colors',
		'default'     => '#000000',
		'active_callback' => array(
			array(
				'setting'  => 'xhibiter_settings_cookies_bar_show',
				'operator' => '==',
				'value'    => true,
			),
		),
		'output' => array(
			array(
				'element'  => '.cc-window',
				'property' => 'background-color',
			),
		),
		'transport' => 'auto',
	) );

	// Cookies bar text color
	new \Kirki\Field\Color( array(
		'type'        => 'color',
		'settings'    => 'xhibiter_settings_cookies_bar_text_color',
		'label'       => esc_html__( 'Cookies bar text color', 'xhibiter' ),
		'section'     => 'xhibiter_settings_cookies_bar_colors',
		'default'     => '#ffffff',
		'active_callback' => array(
			array(
				'setting'  => 'xhibiter_settings_cookies_bar_show',
				'operator' => '==',
				'value'    => true,
			),
		),
		'output' => array(
			array(
				'element'  => '.cc-message',
				'property' => 'color',
			),
		),
		'transport' => 'auto',
	) );

	// Cookies bar link color
	new \Kirki\Field\Color( array(
		'type'        => 'color',
		'settings'    => 'xhibiter_settings_cookies_bar_link_color',
		'label'       => esc_html__( 'Cookies bar link color', 'xhibiter' ),
		'section'     => 'xhibiter_settings_cookies_bar_colors',
		'default'     => '#ffffff',
		'active_callback' => array(
			array(
				'setting'  => 'xhibiter_settings_cookies_bar_show',
				'operator' => '==',
				'value'    => true,
			),
		),
		'output' => array(
			array(
				'element'  => '.cc-link, .cc-link:active, .cc-link:visited, .cc-link:hover, .cc-link:focus',
				'property' => 'color',
			),
		),
		'transport' => 'auto',
	) );
}