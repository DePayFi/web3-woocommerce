<?php
/**
 * Customizer Page 404
 *
 * @package Xhibiter
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// Title
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'text',
	'settings'    => 'xhibiter_settings_page_404_title',
	'label'       => esc_attr__( 'Page 404 title', 'xhibiter' ),
	'section'     => 'xhibiter_settings_page_404',
	'default'     => esc_html__( 'Whoops...page not found', 'xhibiter' ),
) );

// Description text
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'text',
	'settings'    => 'xhibiter_settings_page_404_description',
	'label'       => esc_attr__( 'Page 404 description text', 'xhibiter' ),
	'section'     => 'xhibiter_settings_page_404',
	'default'     => esc_html__( 'Unfortunately, the page you are looking for does not exist.', 'xhibiter' ),
) );

// Button text
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'text',
	'settings'    => 'xhibiter_settings_page_404_button_text',
	'label'       => esc_attr__( 'Page 404 button text', 'xhibiter' ),
	'section'     => 'xhibiter_settings_page_404',
	'default'     => esc_html__( 'Navigate Back Home', 'xhibiter' ),
) );