<?php

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Xhibiter for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */
require_once XHIBITER_DIR . '/includes/tgmpa/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'xhibiter_tgmpa_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function xhibiter_tgmpa_register_required_plugins()
{
    $url = 'https://xhibiter.deothemes.com';
    $plugins = array(
        array(
        'name'     => esc_html__( 'Kirki', 'xhibiter' ),
        'slug'     => 'kirki',
        'required' => false,
    ),
        array(
        'name'     => esc_html__( 'Elementor', 'xhibiter' ),
        'slug'     => 'elementor',
        'required' => false,
    ),
        array(
        'name'     => esc_html__( 'Contact Form 7', 'xhibiter' ),
        'slug'     => 'contact-form-7',
        'required' => false,
    ),
        array(
        'name'     => esc_html__( 'MailChimp for WordPress', 'xhibiter' ),
        'slug'     => 'mailchimp-for-wp',
        'required' => false,
    ),
        array(
        'name'     => esc_html__( 'WooCommerce', 'xhibiter' ),
        'slug'     => 'woocommerce',
        'required' => false,
    ),
        array(
        'name'     => esc_html__( 'YITH WooCommerce Wishlist', 'xhibiter' ),
        'slug'     => 'yith-woocommerce-wishlist',
        'required' => false,
    )
    );
    $config = array(
        'id'           => 'tgmpa',
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'capability'   => 'edit_theme_options',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => true,
        'message'      => '',
        'strings'      => array(
        'page_title'                     => esc_html__( 'Install Required Plugins', 'xhibiter' ),
        'menu_title'                     => esc_html__( 'Install Plugins', 'xhibiter' ),
        'installing'                     => esc_html__( 'Installing Plugin: %s', 'xhibiter' ),
        'updating'                       => esc_html__( 'Updating Plugin: %s', 'xhibiter' ),
        'oops'                           => esc_html__( 'Something went wrong with the plugin API.', 'xhibiter' ),
        'return'                         => esc_html__( 'Return to Required Plugins Installer', 'xhibiter' ),
        'plugin_activated'               => esc_html__( 'Plugin activated successfully.', 'xhibiter' ),
        'activated_successfully'         => esc_html__( 'The following plugin was activated successfully:', 'xhibiter' ),
        'plugin_already_active'          => esc_html__( 'No action taken. Plugin %1$s was already active.', 'xhibiter' ),
        'plugin_needs_higher_version'    => esc_html__( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'xhibiter' ),
        'complete'                       => esc_html__( 'All plugins installed and activated successfully. %1$s', 'xhibiter' ),
        'dismiss'                        => esc_html__( 'Dismiss this notice', 'xhibiter' ),
        'notice_cannot_install_activate' => esc_html__( 'There are one or more required or recommended plugins to install, update or activate.', 'xhibiter' ),
        'contact_admin'                  => esc_html__( 'Please contact the administrator of this site for help.', 'xhibiter' ),
        'nag_type'                       => 'updated',
    ),
    );
    tgmpa( $plugins, $config );
}
