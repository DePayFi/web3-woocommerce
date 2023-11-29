<?php
/**
 * Customizer GDPR
 *
 * @package Xhibiter
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


// Show cookies consent bar
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'xhibiter_settings_cookies_bar_show',
	'label'       => esc_attr__( 'Show cookies consent notification bar', 'xhibiter' ),
	'section'     => 'xhibiter_settings_gdpr',
	'default'     => false,
) );

// Cookies message
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'textarea',
	'settings'    => 'xhibiter_settings_cookies_message',
	'label'       => esc_html__( 'Cookies message text', 'xhibiter' ),
	'section'     => 'xhibiter_settings_gdpr',
	'default'     => esc_html__( 'We are using cookies to personalize content and ads to make our site easier for you to use.', 'xhibiter' ),
) );

// Cookies button
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'text',
	'settings'    => 'xhibiter_settings_cookies_button',
	'label'       => esc_html__( 'Cookies button text', 'xhibiter' ),
	'section'     => 'xhibiter_settings_gdpr',
	'default'     => esc_html__( 'Agree', 'xhibiter' ),
) );

// Cookies Learn More text
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'text',
	'settings'    => 'xhibiter_settings_cookies_learn_more_text',
	'label'       => esc_html__( 'Cookies learn more text', 'xhibiter' ),
	'section'     => 'xhibiter_settings_gdpr',
	'default'     => esc_html__( 'Learn More', 'xhibiter' ),
) );

// Cookies URL
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'url',
	'settings'    => 'xhibiter_settings_cookies_learn_more_url',
	'label'       => esc_html__( 'Cookies learn more URL', 'xhibiter' ),
	'section'     => 'xhibiter_settings_gdpr',
	'default'     => esc_url( 'http://cookiesandyou.com' ),
) );