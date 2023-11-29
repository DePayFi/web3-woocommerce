<?php
/**
 * Core Theme Functions.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Xhibiter
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 * Checks if WooCommerce is activated
 * @return boolean
 */
if ( ! function_exists( 'xhibiter_is_woocommerce_activated' ) ) {
	function xhibiter_is_woocommerce_activated() {
		return class_exists( 'WooCommerce' ) ? true : false;
	}
}

/**
  * Shim for wp_body_open
  *
  * @since  1.0.0
  */
if ( ! function_exists( 'wp_body_open' ) ) {
  function wp_body_open() {
    do_action( 'wp_body_open' );
  }
}

/**
 * Get page ID by title
 */
function xhibiter_get_page_by_title( $page_title, $post_type = 'page' ) {
	$posts = get_posts(
		array(
			'post_type'              => $post_type,
			'title'                  => $page_title,
			'post_status'            => 'all',
			'numberposts'            => 1,
			'update_post_term_cache' => false,
			'update_post_meta_cache' => false,           
			'orderby'                => 'post_date ID',
			'order'                  => 'ASC',
		)
	);

	if ( ! empty( $posts ) ) {
		$post = $posts[0];
	} else {
		$post = null;
	}

	return $post;
}


/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function xhibiter_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'xhibiter_skip_link_focus_fix' );


/**
	* Check if page built with Elementor
	*
	* @since  1.0.0
	*/
function xhibiter_is_elementor_page() {
	$elementor_page = get_post_meta( get_the_ID(), '_elementor_edit_mode', true );

	if ( is_search() || is_archive() ) {
		return false;
	}

	if ( (bool)$elementor_page ) {
		return true;
	} else {
		return false;
	}	
}


/**
* Gutenberg Check
*
* @since 1.0.0
*/
function xhibiter_is_gutenberg() {
	return function_exists( 'register_block_type' ); 
}


/**
	* Check if it's CPT archive
	*
	* @since  1.0.0
	*/
function xhibiter_is_cpt( $cpt ) {
	return ( is_tax( "{$cpt}_categories" ) || is_post_type_archive( $cpt ) );	
}


if ( ! function_exists( 'xhibiter_custom_post_type_nav_classes' ) ) {
	/**
	* Fix for current_page_parent menu class
	*
	* @since 1.0.0
	*/
	function xhibiter_custom_post_type_nav_classes( $classes, $item ) {
		$cpt = array( 'projects' );
		if ( ( is_post_type_archive( $cpt ) || is_singular( $cpt ) )
		&& get_post_meta( $item->ID, '_menu_item_object_id', true ) == get_option( 'page_for_posts' ) ) {
			$classes = array_diff( $classes, array( 'current_page_parent' ) );
		}
		return $classes;
	}
}
add_filter( 'nav_menu_css_class', 'xhibiter_custom_post_type_nav_classes', 10, 2 );

/**
 * Custom excerpt length
 */
function xhibiter_custom_excerpt_length( $length ) {
	if ( is_admin() ) {
		return;
	}

	$excerpt_length = get_theme_mod( 'xhibiter_settings_posts_excerpt_settings', 18 );
	return $excerpt_length;
}
add_filter( 'excerpt_length', 'xhibiter_custom_excerpt_length' );


if ( ! function_exists( 'xhibiter_cpt_pagination_rewrite' ) ) {
	/**
	 * Fix pagination on cpt archive pages
	 *
	 * @since 1.0.0
	 */
	function xhibiter_cpt_pagination_rewrite() {
		$permalinks = get_option( 'xhibiter_permalinks' );

		if ( ! $permalinks ) {
			return;
		}
		
		$projects_base = empty( $permalinks['projects_base'] ) ? 'projects' : $permalinks['projects_base'];
		add_rewrite_rule( $projects_base . '/page/?([0-9]{1,})/?$', 'index.php?pagename=' . $projects_base . '&paged=$matches[1]', 'top');
	}
	add_action('init', 'xhibiter_cpt_pagination_rewrite');
}


if ( ! function_exists( 'xhibiter_sidebar' ) ) {
	/**
	* Get sidebar
	*
	* @since 1.0.0
	*/
	function xhibiter_sidebar( $sidebar = '' ) {
		if ( ! is_active_sidebar( $sidebar ) ) return;
		?>
			<aside class="sidebar">
				<div itemtype="https://schema.org/WPSideBar" itemscope="itemscope" id="secondary" class="widget-area" role="complementary">
					<?php xhibiter_sidebar_before(); ?>
					<?php dynamic_sidebar( $sidebar ); ?>
					<?php xhibiter_sidebar_after(); ?>
				</div> <!-- #secondary -->
			</aside>
		<?php
	}
}


if ( ! function_exists( 'xhibiter_is_active_sidebar' ) ) {
	/**
	* Check if sidebar is active
	* @param string sidebar name
	* @param string sidebar type
	* @param string default layout
	* @return bool
	* @since 1.0.0
	*/
	function xhibiter_is_active_sidebar( $sidebar = '', $layout = '', $default = 'fullwidth' ) {
		if ( 'fullwidth' !== xhibiter_layout_type( $layout, $default ) && is_active_sidebar( 'xhibiter-' . $sidebar . '-sidebar' ) ) {
			return true;
		}
	}
}


if ( ! function_exists( 'xhibiter_layout_type' ) ) {
	/**
	 * Check layout type based on customizer and meta settings
	 * @return string $type Layout type
	 */
	function xhibiter_layout_type( $type, $default = 'fullwidth' ) {
		$layout = '';
		$meta = get_post_meta( get_the_ID(), '_xhibiter_page_layout', true );
		$page_for_posts = get_option( 'page_for_posts' );

		if ( is_home() && $page_for_posts ) {
			$meta = get_post_meta( $page_for_posts, '_xhibiter_page_layout', true );
		}

		if ( is_archive() || is_404() || is_search() || is_home() ) {
			$meta = '';
		}

		if ( 'left-sidebar' == get_theme_mod( 'xhibiter_settings_' . $type .  '_layout_type', $default ) ) {
			$layout = ( $meta ) ? $meta : 'left-sidebar';		
		}

		if ( 'right-sidebar' == get_theme_mod( 'xhibiter_settings_' . $type .  '_layout_type', $default ) ) {
			$layout = ( $meta ) ? $meta : 'right-sidebar';
		}

		if ( 'fullwidth' == get_theme_mod( 'xhibiter_settings_' . $type .  '_layout_type', $default ) ) {			
			$layout = ( $meta ) ? $meta : 'fullwidth';
		}	

		return $layout;
	}
}


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function xhibiter_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'xhibiter-group-blog';
	}

	// Page Layout Class
	if ( is_page() ) {
		if ( xhibiter_is_woocommerce_activated() ) {
			if ( is_cart() || is_checkout() || is_account_page() ) {
				$classes[] = 'xhibiter-' . xhibiter_layout_type( 'shop_pages' );
			} else {
				$classes[] = 'xhibiter-' . xhibiter_layout_type( 'page' );
			}
		} else {
			$classes[] = 'xhibiter-' . xhibiter_layout_type( 'page' );
		}		
	}

	// Blog Layout Class
	if ( is_home() ) {
		$classes[] = 'xhibiter-' . xhibiter_layout_type( 'blog' );
	}

	// Single Post Layout Class
	if ( is_single() ) {
		if ( xhibiter_is_woocommerce_activated() && is_product() ) {
			$classes[] = '';
		} else {
			$classes[] = 'xhibiter-' . xhibiter_layout_type( 'single_post' );
		}
	}
    
	// Archives Layout Class
	if ( is_archive() ) {
		if ( xhibiter_is_woocommerce_activated() && ( is_shop() || is_product_taxonomy() ) ) {
			$classes[] = '';	
		} else {
			$classes[] = 'xhibiter-' . xhibiter_layout_type( 'archive' );
		}
	}

	// Shop Layout Class
	if ( xhibiter_is_woocommerce_activated() ) {
		if ( ! is_product() && ! is_product_taxonomy() && is_woocommerce() || is_shop() ) {
			$classes[] = 'xhibiter-' . xhibiter_layout_type( 'shop' );
		}
	}

	$classes[] = '';

	return $classes;
}
add_filter( 'body_class', 'xhibiter_body_classes' );


/**
 * Adds custom admin classes.
 *
 * @param string $classes Classes for the body element.
 * @return string
 */
function xhibiter_admin_body_classes( $classes ) {

	$screen = get_current_screen();

	// Add blog layout class
	if( $screen->id === "post" ) {
		$classes = 'xhibiter-' . xhibiter_layout_type( 'single_post' );
	}

	// Add page layout class
	if( $screen->id === "page" ) {
		$classes = 'xhibiter-' . xhibiter_layout_type( 'page' );
	}
	
	return $classes;
}
add_filter( 'admin_body_class', 'xhibiter_admin_body_classes' );