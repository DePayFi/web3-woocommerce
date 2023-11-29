<?php
/**
 * Customizer General
 *
 * @package Xhibiter
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


// Preloader
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'xhibiter_settings_preloader_show',
	'label'       => esc_html__( 'Theme preloader', 'xhibiter' ),
	'section'     => 'xhibiter_settings_preloader',
	'default'     => false,
) );

// Back to top
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'xhibiter_settings_back_to_top_show',
	'label'       => esc_html__( 'Back to top arrow', 'xhibiter' ),
	'section'     => 'xhibiter_settings_back_to_top',
	'default'     => true,
) );

// Back to top bottom offset
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'xhibiter_settings_back_to_top_bottom_offset',
	'label'       => esc_attr__( 'Bottom offset', 'xhibiter' ),
	'section'     => 'xhibiter_settings_back_to_top',
	'default'     => 20,
	'choices'     => array(
		'min'  => '0',
		'max'  => '300',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '#back-to-top.show',
			'property'    => 'bottom',
			'units'       => 'px',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'xhibiter_settings_back_to_top_show',
			'operator' => '==',
			'value'    => true,
		)
	),
	'transport' => 'auto',
) );

/**
* Back to Portfolio link
*/
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'dropdown-pages',
	'settings'    => 'xhibiter_settings_portfolio_back_to_link_page',
	'label'       => esc_html__( 'Back To Link', 'xhibiter' ),
	'description'	=> esc_html__( 'Choose "Back To" page to link from single project', 'xhibiter' ),
	'section'     => 'xhibiter_settings_portfolio',
	'default'     => 1130,
) );