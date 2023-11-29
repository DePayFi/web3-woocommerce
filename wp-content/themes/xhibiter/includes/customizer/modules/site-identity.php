<?php
/**
 * Customizer Site Identity
 *
 * @package Xhibiter
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'custom',
	'settings'    => 'separator-' . $uniqid++,
	'section'     => 'title_tagline',
	'default'     => '<h3 class="customizer-title">' . esc_attr__( 'Site Logo', 'xhibiter' ) . '</h3>',
) );

// Logo Image Upload
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'image',
	'settings'    => 'xhibiter_settings_logo_dark',
	'label'       => esc_attr__( 'Upload logo', 'xhibiter' ),
	'section'     => 'title_tagline',
) );	

// Logo Retina Image Upload
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'image',
	'settings'    => 'xhibiter_settings_logo_dark_retina',
	'label'       => esc_attr__( 'Upload retina logo', 'xhibiter' ),
	'description' => esc_html__( 'Logo 2x bigger size', 'xhibiter' ),
	'section'     => 'title_tagline',
) );