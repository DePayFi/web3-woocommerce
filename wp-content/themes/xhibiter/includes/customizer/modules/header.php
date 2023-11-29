<?php

/**
 * Customizer Header
 *
 * @package Xhibiter
 * @since 1.0.0
 */
if ( !defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
// Show header
Kirki::add_field( 'xhibiter_settings_config', array(
    'type'     => 'toggle',
    'settings' => 'xhibiter_settings_header_show',
    'label'    => esc_html__( 'Show header', 'xhibiter' ),
    'section'  => 'xhibiter_settings_default_header',
    'default'  => true,
) );
// Sticky header
Kirki::add_field( 'xhibiter_settings_config', array(
    'type'            => 'toggle',
    'settings'        => 'xhibiter_settings_sticky_header',
    'label'           => esc_html__( 'Sticky header', 'xhibiter' ),
    'section'         => 'xhibiter_settings_default_header',
    'default'         => true,
    'responsive'      => true,
    'active_callback' => array( array(
    'setting'  => 'xhibiter_settings_header_show',
    'operator' => '==',
    'value'    => true,
) ),
) );
// Header container width
Kirki::add_field( 'xhibiter_settings_config', array(
    'type'            => 'dimension',
    'settings'        => 'xhibiter_settings_header_container_width',
    'label'           => esc_html__( 'Header container width', 'xhibiter' ),
    'description'     => esc_html__( "Example: 1200px or 80%", 'xhibiter' ),
    'section'         => 'xhibiter_settings_default_header',
    'default'         => '100%',
    'output'          => array( array(
    'element'  => '.xhibiter-header__container',
    'property' => 'max-width',
) ),
    'active_callback' => array( array(
    'setting'  => 'xhibiter_settings_header_show',
    'operator' => '==',
    'value'    => true,
) ),
    'transport'       => 'auto',
) );
// Header height
Kirki::add_field( 'xhibiter_settings_config', array(
    'type'            => 'slider',
    'settings'        => 'xhibiter_settings_header_height',
    'label'           => esc_attr__( 'Header height', 'xhibiter' ),
    'description'     => esc_html__( 'Will apply only on big screens', 'xhibiter' ),
    'section'         => 'xhibiter_settings_default_header',
    'default'         => 88,
    'choices'         => array(
    'min'  => '40',
    'max'  => '200',
    'step' => '1',
),
    'output'          => array( array(
    'element'  => '.xhibiter-header__container',
    'property' => 'height',
    'units'    => 'px',
) ),
    'active_callback' => array( array(
    'setting'  => 'xhibiter_settings_header_show',
    'operator' => '==',
    'value'    => true,
) ),
    'transport'       => 'auto',
) );
// Header sticky height
Kirki::add_field( 'xhibiter_settings_config', array(
    'type'            => 'slider',
    'settings'        => 'xhibiter_settings_header_sticky_height',
    'label'           => esc_attr__( 'Header sticky height', 'xhibiter' ),
    'description'     => esc_html__( 'Will apply only on big screens', 'xhibiter' ),
    'section'         => 'xhibiter_settings_default_header',
    'default'         => 88,
    'choices'         => array(
    'min'  => '40',
    'max'  => '200',
    'step' => '1',
),
    'output'          => array( array(
    'element'     => '.js-page-header--is-sticky .xhibiter-header__container',
    'property'    => 'height',
    'units'       => 'px',
    'media_query' => $bp_lg_up,
) ),
    'active_callback' => array( array(
    'setting'  => 'xhibiter_settings_header_show',
    'operator' => '==',
    'value'    => true,
) ),
    'transport'       => 'auto',
) );
// Header mobile height
Kirki::add_field( 'xhibiter_settings_config', array(
    'type'            => 'slider',
    'settings'        => 'xhibiter_settings_header_mobile_height',
    'label'           => esc_attr__( 'Header mobile height', 'xhibiter' ),
    'description'     => esc_html__( 'Will apply only on mobile screens', 'xhibiter' ),
    'section'         => 'xhibiter_settings_default_header',
    'default'         => 60,
    'choices'         => array(
    'min'  => '40',
    'max'  => '200',
    'step' => '1',
),
    'output'          => array( array(
    'element'     => '.nav__header',
    'property'    => 'height',
    'units'       => 'px',
    'media_query' => $bp_lg_down,
), array(
    'element'     => '.nav',
    'property'    => 'min-height',
    'units'       => 'px',
    'media_query' => $bp_lg_down,
) ),
    'active_callback' => array( array(
    'setting'  => 'xhibiter_settings_header_show',
    'operator' => '==',
    'value'    => true,
) ),
    'transport'       => 'auto',
) );
// Logo dark
Kirki::add_field( 'xhibiter_settings_config', array(
    'type'     => 'image',
    'settings' => 'xhibiter_settings_logo_dark',
    'label'    => esc_html__( 'Upload dark logo', 'xhibiter' ),
    'section'  => 'xhibiter_settings_logo',
    'choices'  => [
    'save_as' => 'array',
],
) );
// Logo width
Kirki::add_field( 'xhibiter_settings_config', array(
    'type'      => 'slider',
    'settings'  => 'xhibiter_settings_header_logo_width',
    'label'     => esc_attr__( 'Header logo width', 'xhibiter' ),
    'section'   => 'xhibiter_settings_logo',
    'default'   => 128,
    'choices'   => array(
    'min'  => '10',
    'max'  => '300',
    'step' => '1',
),
    'output'    => array( array(
    'element'     => '.nav__header .logo',
    'property'    => 'max-width',
    'units'       => 'px',
    'media_query' => $bp_lg_up,
) ),
    'transport' => 'auto',
) );
// Logo mobile width
Kirki::add_field( 'xhibiter_settings_config', array(
    'type'      => 'slider',
    'settings'  => 'xhibiter_settings_header_logo_mobile_width',
    'label'     => esc_attr__( 'Header logo mobile width', 'xhibiter' ),
    'section'   => 'xhibiter_settings_logo',
    'default'   => 128,
    'choices'   => array(
    'min'  => '10',
    'max'  => '200',
    'step' => '1',
),
    'output'    => array( array(
    'element'     => '.nav__header .logo',
    'property'    => 'max-width',
    'units'       => 'px',
    'media_query' => $bp_lg_down,
) ),
    'transport' => 'auto',
) );
// Mobile menu socials
Kirki::add_field( 'xhibiter_settings_config', array(
    'type'            => 'toggle',
    'settings'        => 'xhibiter_settings_header_mobile_socials',
    'label'           => esc_html__( 'Mobile menu socials', 'xhibiter' ),
    'section'         => 'xhibiter_settings_default_header',
    'default'         => true,
    'active_callback' => array( array(
    'setting'  => 'xhibiter_settings_header_show',
    'operator' => '==',
    'value'    => true,
) ),
) );
// Menu icons
Kirki::add_field( 'xhibiter_settings_config', array(
    'type'            => 'custom',
    'settings'        => 'separator-' . $uniqid++,
    'section'         => 'xhibiter_settings_default_header',
    'default'         => '<h3 class="customizer-title">' . esc_attr__( 'Menu icons', 'xhibiter' ) . '</h3>',
    'active_callback' => array( array(
    'setting'  => 'xhibiter_settings_header_show',
    'operator' => '==',
    'value'    => true,
) ),
) );

if ( class_exists( '\\WooCommerce' ) ) {
    // Menu icon: Cart
    Kirki::add_field( 'xhibiter_settings_config', array(
        'type'            => 'toggle',
        'settings'        => 'xhibiter_settings_header_menu_icon_cart',
        'label'           => esc_html__( 'Cart', 'xhibiter' ),
        'section'         => 'xhibiter_settings_default_header',
        'default'         => true,
        'active_callback' => array( array(
        'setting'  => 'xhibiter_settings_header_show',
        'operator' => '==',
        'value'    => true,
    ) ),
    ) );
    // Menu icon: Account
    Kirki::add_field( 'xhibiter_settings_config', array(
        'type'            => 'toggle',
        'settings'        => 'xhibiter_settings_header_menu_icon_account',
        'label'           => esc_html__( 'Account', 'xhibiter' ),
        'section'         => 'xhibiter_settings_default_header',
        'default'         => true,
        'active_callback' => array( array(
        'setting'  => 'xhibiter_settings_header_show',
        'operator' => '==',
        'value'    => true,
    ) ),
    ) );
}
