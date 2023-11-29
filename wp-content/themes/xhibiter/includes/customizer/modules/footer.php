<?php
/**
 * Customizer Footer
 *
 * @package Xhibiter
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// Show footer
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'xhibiter_settings_footer_show',
	'label'       => esc_attr__( 'Show footer', 'xhibiter' ),
	'section'     => 'xhibiter_settings_footer',
	'default'     => true,
) );

// Show footer widgets
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'xhibiter_settings_footer_widgets_show',
	'label'       => esc_attr__( 'Show footer widgets', 'xhibiter' ),
	'section'     => 'xhibiter_settings_footer',
	'default'     => true,
	'active_callback' => array(
		array(
			'setting'  => 'xhibiter_settings_footer_show',
			'operator' => '==',
			'value'    => true,
		)
	),
) );

// Show footer bottom menu
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'xhibiter_settings_footer_bottom_menu_show',
	'label'       => esc_attr__( 'Show bottom footer menu', 'xhibiter' ),
	'section'     => 'xhibiter_settings_footer',
	'default'     => true,
	'active_callback' => array(
		array(
			'setting'  => 'xhibiter_settings_footer_show',
			'operator' => '==',
			'value'    => true,
		)
	),
) );


// Bottom footer text
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        			=> 'text',
	'settings'    			=> 'xhibiter_settings_footer_bottom_text',
	'section'     			=> 'xhibiter_settings_footer',
	'label'       			=> esc_html__( 'Bottom footer text', 'xhibiter' ),
	'description' 			=> esc_html__( 'Allowed HTML: a, span, i, em, strong', 'xhibiter' ),
	'sanitize_callback' => 'wp_kses_post',
	'default'     			=> sprintf( esc_html__( 'Copyright &copy; [current-year] %1$s. Powered by %2$sXhibiter theme%3$s' , 'xhibiter' ), get_bloginfo( 'name' ), '<a href="https://xhibiter.deothemes.com">', '</a>' ),
	'active_callback' 	=> array(
		array(
			'setting'  => 'xhibiter_settings_footer_show',
			'operator' => '==',
			'value'    => true,
		)
	),
) );