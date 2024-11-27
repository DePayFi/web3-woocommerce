<?php

/**
 * Theme functions and definitions.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Xhibiter
 * @since 		 1.0.0
 */
if ( !defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
// Constants
define( 'XHIBITER_VERSION', '1.2' );
define( 'XHIBITER_DIR', get_template_directory() );
define( 'XHIBITER_URI', get_template_directory_uri() );

if ( !function_exists( 'xhibiter_fs' ) ) {
    // Create a helper function for easy SDK access.
    function xhibiter_fs()
    {
        global  $xhibiter_fs ;
        
        if ( !isset( $xhibiter_fs ) ) {
            // Include Freemius SDK.
            require_once dirname( __FILE__ ) . '/freemius/start.php';
            $xhibiter_fs = fs_dynamic_init( array(
                'id'             => '13209',
                'slug'           => 'xhibiter',
                'premium_slug'   => 'xhibiter-pro',
                'type'           => 'theme',
                'public_key'     => 'pk_5897bfb570ae162b87cf846c194e1',
                'is_premium'     => false,
                'premium_suffix' => 'Pro',
                'has_addons'     => false,
                'has_paid_plans' => true,
                'menu'           => array(
                'slug'    => 'xhibiter-theme',
                'support' => false,
                'parent'  => array(
                'slug' => 'themes.php',
            ),
            ),
                'is_live'        => true,
            ) );
        }
        
        return $xhibiter_fs;
    }
    
    // Init Freemius.
    xhibiter_fs();
    // Signal that SDK was initiated.
    do_action( 'xhibiter_fs_loaded' );
}

/**
* Disable contact for free users
*/
function xhibiter_disable_contact_for_free_users( $is_visible, $menu_id )
{
    if ( 'contact' != $menu_id ) {
        return $is_visible;
    }
    return xhibiter_fs()->can_use_premium_code();
}

xhibiter_fs()->add_filter(
    'is_submenu_visible',
    'xhibiter_disable_contact_for_free_users',
    10,
    2
);
/**
* Change theme icon
*/
function xhibiter_fs_custom_icon()
{
    return get_template_directory() . '/assets/admin/img/theme-icon.png';
}

xhibiter_fs()->add_filter( 'plugin_icon', 'xhibiter_fs_custom_icon' );
// Set the content width based on the theme's design and stylesheet.

if ( !isset( $content_width ) ) {
    $content_width = 1280;
    /* pixels */
}

// Includes
require_once XHIBITER_DIR . '/includes/admin/theme-admin.php';
require_once XHIBITER_DIR . '/includes/theme-setup.php';
require_once XHIBITER_DIR . '/includes/theme-functions.php';
require_once XHIBITER_DIR . '/includes/theme-hooks.php';
require_once XHIBITER_DIR . '/includes/template-tags.php';
require_once XHIBITER_DIR . '/includes/template-parts.php';
require_once XHIBITER_DIR . '/includes/class-xhibiter-query.php';
require_once XHIBITER_DIR . '/includes/class-xhibiter-walker-nav-menu.php';
require_once XHIBITER_DIR . '/includes/class-xhibiter-walker-comment.php';
require_once XHIBITER_DIR . '/includes/customizer/customizer.php';
/**
 * Theme update functions.
 */
require_once XHIBITER_DIR . '/includes/theme-update/class-xhibiter-theme-update.php';
/**
* TGM plugins activation.
*/
require_once XHIBITER_DIR . '/includes/tgmpa/tgm-plugin-activation.php';
/**
 * Compatibility
 */

if ( xhibiter_is_woocommerce_activated() ) {
    require_once XHIBITER_DIR . '/includes/compatibility/woocommerce/class-xhibiter-woocommerce.php';
    require_once XHIBITER_DIR . '/includes/compatibility/woocommerce/woocommerce-theme-functions.php';
    require_once XHIBITER_DIR . '/includes/compatibility/woocommerce/woocommerce-theme-hooks.php';
    // Remove Woo styles
    add_filter( 'woocommerce_enqueue_styles', '__return_false' );
    // Dequeue YITH Wishlist styles
    
    if ( defined( 'YITH_WCWL' ) && xhibiter_is_woocommerce_activated() ) {
        function xhibiter_dequeue_yith_wcwl_font_awesome_styles( $deps )
        {
            $deps = array( 'jquery-selectBox' );
            return $deps;
        }
        
        add_filter( 'yith_wcwl_main_style_deps', 'xhibiter_dequeue_yith_wcwl_font_awesome_styles' );
        // Remove social icon color style
        add_filter( 'yith_wcwl_custom_css_rules', function ( $custom_css ) {
            unset(
                $custom_css['color_fb_button'],
                $custom_css['color_tw_button'],
                $custom_css['color_pr_button'],
                $custom_css['color_em_button'],
                $custom_css['color_wa_button'],
                $custom_css['color_wa_button']
            );
            return $custom_css;
        } );
    }

}

/**
 * Disable auto paragraphs for Contact Form 7
 */

if ( class_exists( 'WPCF7' ) ) {
    add_filter( 'wpcf7_load_js', '__return_false' );
    add_filter( 'wpcf7_load_css', '__return_false' );
    add_filter( 'wpcf7_autop_or_not', '__return_false' );
}

/**
 * Theme styles.
 */
function xhibiter_theme_styles()
{
    wp_enqueue_style(
        'xhibiter-styles',
        XHIBITER_URI . '/assets/css/style.min.css',
        array(),
        XHIBITER_VERSION,
        'all'
    );
    wp_style_add_data( 'xhibiter-styles', 'rtl', 'replace' );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    // Editor shared styles
    wp_enqueue_style( 'xhibiter-block-editor-shared-styles', get_theme_file_uri( '/assets/css/editor-shared.min.css' ), false );
    wp_style_add_data( 'xhibiter-block-editor-shared-styles', 'rtl', 'replace' );
    // WooCommerce styles
    
    if ( xhibiter_is_woocommerce_activated() ) {
        wp_register_style(
            'xhibiter-woocommerce',
            XHIBITER_URI . '/assets/css/compatibility/woocommerce/woocommerce.min.css',
            array(),
            XHIBITER_VERSION
        );
        wp_enqueue_style( 'xhibiter-woocommerce' );
        wp_style_add_data( 'xhibiter-woocommerce', 'rtl', 'replace' );
    }
    
    // Fonts
    if ( !class_exists( 'Kirki' ) ) {
        wp_add_inline_style( 'xhibiter-styles', xhibiter_enqueue_default_fonts() );
    }
    // Check if CalSans custom font is uploaded but Core is not installed
    $custom_fonts = get_option( 'xhibiter-core-custom-fonts' );
    if ( !class_exists( 'Xhibiter_Core' ) && !isset( $custom_fonts['CalSans Semibold'] ) ) {
        wp_add_inline_style( 'xhibiter-styles', xhibiter_enqueue_default_font() );
    }
}

add_action( 'wp_enqueue_scripts', 'xhibiter_theme_styles', 11 );
if ( !function_exists( 'xhibiter_enqueue_default_font' ) ) {
    /**
     * Enqueue default CalSans font.
     *
     * @return string
     */
    function xhibiter_enqueue_default_font()
    {
        return "\n\t\t@font-face{\n\t\t\tfont-family: 'CalSans SemiBold';\n\t\t\tfont-weight: 600;\n\t\t\tfont-style: normal;\n\t\t\tfont-stretch: normal;\n\t\t\tfont-display: swap;\n\t\t\tsrc: url('" . get_theme_file_uri( 'assets/fonts/CalSans/CalSans-SemiBold.woff' ) . "') format('woff'), url('" . get_theme_file_uri( 'assets/fonts/CalSans/CalSans-SemiBold.otf' ) . "') format('opentype');\n\t\t}";
    }

}
if ( !function_exists( 'xhibiter_enqueue_default_fonts' ) ) {
    /**
     * Enqueue default fonts.
     *
     * @return string
     */
    function xhibiter_enqueue_default_fonts()
    {
        return "\n\t\t@font-face{\n\t\t\tfont-family: 'CalSans SemiBold';\n\t\t\tfont-weight: 600;\n\t\t\tfont-style: normal;\n\t\t\tfont-stretch: normal;\n\t\t\tfont-display: swap;\n\t\t\tsrc: url('" . get_theme_file_uri( 'assets/fonts/CalSans/CalSans-SemiBold.woff' ) . "') format('woff'), url('" . get_theme_file_uri( 'assets/fonts/CalSans/CalSans-SemiBold.otf' ) . "') format('opentype');\n\t\t}\n\n\t\t@font-face {\n\t\t\tfont-family: 'DM Sans';\n\t\t\tfont-weight: 400;\n\t\t\tfont-style: normal;\n\t\t\tfont-stretch: normal;\n\t\t\tfont-display: swap;\n\t\t\tsrc: url('" . get_theme_file_uri( 'assets/fonts/DM_Sans/DMSans-Regular.ttf' ) . "') format('truetype');\n\t\t}\n\n\t\t@font-face {\n\t\t\tfont-family: 'DM Sans';\n\t\t\tfont-weight: 400;\n\t\t\tfont-style: italic;\n\t\t\tfont-stretch: normal;\n\t\t\tfont-display: swap;\n\t\t\tsrc: url('" . get_theme_file_uri( 'assets/fonts/DM_Sans/DMSans-Italic.ttf' ) . "') format('truetype');\n\t\t}\n\n\t\t@font-face {\n\t\t\tfont-family: 'DM Sans';\n\t\t\tfont-weight: 500;\n\t\t\tfont-style: normal;\n\t\t\tfont-stretch: normal;\n\t\t\tfont-display: swap;\n\t\t\tsrc: url('" . get_theme_file_uri( 'assets/fonts/DM_Sans/DMSans-Medium.ttf' ) . "') format('truetype');\n\t\t}\n\n\t\t@font-face {\n\t\t\tfont-family: 'DM Sans';\n\t\t\tfont-weight: 700;\n\t\t\tfont-style: normal;\n\t\t\tfont-stretch: normal;\n\t\t\tfont-display: swap;\n\t\t\tsrc: url('" . get_theme_file_uri( 'assets/fonts/DM_Sans/DMSans-Bold.ttf' ) . "') format('truetype');\n\t\t}\n\n\t\t@font-face {\n\t\t\tfont-family: 'DM Sans';\n\t\t\tfont-weight: 700;\n\t\t\tfont-style: italic;\n\t\t\tfont-stretch: normal;\n\t\t\tfont-display: swap;\n\t\t\tsrc: url('" . get_theme_file_uri( 'assets/fonts/DM_Sans/DMSans-BoldItalic.ttf' ) . "') format('truetype');\n\t\t}\n\t\t";
    }

}
/**
 * Block editor styles.
 */
function xhibiter_block_assets()
{
    wp_enqueue_style( 'xhibiter-block-editor-styles', get_theme_file_uri( '/assets/css/editor.min.css' ), false );
    wp_style_add_data( 'xhibiter-block-editor-styles', 'rtl', 'replace' );
    // Editor shared styles
    wp_enqueue_style( 'xhibiter-block-editor-shared-styles', get_theme_file_uri( '/assets/css/editor-shared.min.css' ), false );
    wp_style_add_data( 'xhibiter-block-editor-shared-styles', 'rtl', 'replace' );
    // Adobe fonts
    if ( function_exists( 'xhibiter_get_typekit_fonts' ) ) {
        $typekit_fonts = xhibiter_get_typekit_fonts();
    }
    
    if ( !empty($typekit_fonts) ) {
        $typekit_info = get_option( 'xhibiter-core-typekit-fonts' );
        $typekit_id = $typekit_info['custom-typekit-font-id'];
        if ( !empty($typekit_id) ) {
            wp_enqueue_style( 'xhibiter-core-typekit-fonts', '//use.typekit.net/' . $typekit_id . '.css' );
        }
    }
    
    if ( !class_exists( 'Kirki' ) || empty($typekit_fonts) ) {
        wp_add_inline_style( 'wp-block-library', xhibiter_enqueue_default_fonts() );
    }
}

add_action( 'enqueue_block_editor_assets', 'xhibiter_block_assets' );
/**
 * Theme scripts.
 */
function xhibiter_theme_scripts()
{
    
    if ( is_archive() || is_search() || is_home() ) {
        wp_enqueue_script( 'masonry' );
        wp_enqueue_script( 'imagesloaded' );
    }
    
    wp_enqueue_script(
        'bootstrap',
        XHIBITER_URI . '/assets/js/vendor/min/bootstrap.min.js',
        array(),
        XHIBITER_VERSION,
        true
    );
    wp_enqueue_script(
        'body-scroll-lock',
        XHIBITER_URI . '/assets/js/vendor/min/bodyScrollLock.min.js',
        array(),
        XHIBITER_VERSION,
        true
    );
    
    if ( !is_single() ) {
        wp_dequeue_style( 'wp-block-library' );
        wp_dequeue_style( 'classic-theme-styles' );
    }
    
    if ( xhibiter_is_woocommerce_activated() ) {
        wp_enqueue_script(
            'xhibiter-woo-scripts',
            XHIBITER_URI . '/assets/js/woo-scripts.min.js',
            array(),
            XHIBITER_VERSION,
            true
        );
    }
    wp_enqueue_script(
        'xhibiter-scripts',
        XHIBITER_URI . '/assets/js/main.min.js',
        array(),
        XHIBITER_VERSION,
        true
    );
    $Xhibiter_Data = array(
        'home_url'   => esc_url( home_url( '/' ) ),
        'theme_path' => XHIBITER_URI,
    );
    wp_localize_script( 'xhibiter-scripts', 'Xhibiter_Data', $Xhibiter_Data );
}

add_action( 'wp_enqueue_scripts', 'xhibiter_theme_scripts' );
/**
 * Theme admin scripts and styles.
 */
function xhibiter_admin_scripts()
{
    wp_enqueue_style( 'xhibiter-admin-styles', XHIBITER_URI . '/assets/admin/css/admin-styles.css' );
}

add_action( 'admin_enqueue_scripts', 'xhibiter_admin_scripts' );
/**
 * Customizer scripts and styles.
 */
function xhibiter_customizer_scripts()
{
    wp_enqueue_style( 'xhibiter-customizer-styles', XHIBITER_URI . '/assets/css/customizer/customizer.css' );
}

add_action( 'customize_controls_enqueue_scripts', 'xhibiter_customizer_scripts' );