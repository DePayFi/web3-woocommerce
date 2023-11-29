<?php

add_action( 'admin_menu', 'lifestyle_store_gettingstarted' );
function lifestyle_store_gettingstarted() {
	add_theme_page( esc_html__('Theme Documentation', 'lifestyle-store'), esc_html__('Theme Documentation', 'lifestyle-store'), 'edit_theme_options', 'lifestyle-store-guide-page', 'lifestyle_store_guide');
}

function lifestyle_store_admin_theme_style() {
   wp_enqueue_style('lifestyle-store-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/dashboard.css');
}
add_action('admin_enqueue_scripts', 'lifestyle_store_admin_theme_style');

if ( ! defined( 'LIFESTYLE_STORE_SUPPORT' ) ) {
define('LIFESTYLE_STORE_SUPPORT',__('https://wordpress.org/support/theme/lifestyle-store/','lifestyle-store'));
}
if ( ! defined( 'LIFESTYLE_STORE_REVIEW' ) ) {
define('LIFESTYLE_STORE_REVIEW',__('https://wordpress.org/support/theme/lifestyle-store/reviews/','lifestyle-store'));
}
if ( ! defined( 'LIFESTYLE_STORE_LIVE_DEMO' ) ) {
define('LIFESTYLE_STORE_LIVE_DEMO',__('https://www.ovationthemes.com/demos/lifestyle-store/','lifestyle-store'));
}
if ( ! defined( 'LIFESTYLE_STORE_BUY_PRO' ) ) {
define('LIFESTYLE_STORE_BUY_PRO',__('https://www.ovationthemes.com/wordpress/lifestyle-store-wordpress-theme/','lifestyle-store'));
}
if ( ! defined( 'LIFESTYLE_STORE_PRO_DOC' ) ) {
define('LIFESTYLE_STORE_PRO_DOC',__('https://www.ovationthemes.com/docs/ot-lifestyle-store-pro-doc/','lifestyle-store'));
}
if ( ! defined( 'LIFESTYLE_STORE_FREE_DOC' ) ) {
define('LIFESTYLE_STORE_FREE_DOC',__('https://www.ovationthemes.com/docs/ot-lifestyle-store-free-doc/','lifestyle-store'));
}
if ( ! defined( 'LIFESTYLE_STORE_THEME_NAME' ) ) {
define('LIFESTYLE_STORE_THEME_NAME',__('Premium Lifestyle Store Theme','lifestyle-store'));
}

/**
 * Theme Info Page
 */
function lifestyle_store_guide() {

	// Theme info
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( '' ); ?>

	<div class="getting-started__header">
		<div class="col-md-10">
			<h2><?php echo esc_html( $theme ); ?></h2>
			<p><?php esc_html_e('Version: ', 'lifestyle-store'); ?><?php echo esc_html($theme['Version']);?></p>
		</div>
		<div class="col-md-2">
			<div class="btn_box">
				<a class="button-primary" href="<?php echo esc_url( LIFESTYLE_STORE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support', 'lifestyle-store'); ?></a>
				<a class="button-primary" href="<?php echo esc_url( LIFESTYLE_STORE_REVIEW ); ?>" target="_blank"><?php esc_html_e('Review', 'lifestyle-store'); ?></a>
			</div>
		</div>
	</div>

	<div class="wrap getting-started">
		<div class="container">
			<div class="col-md-9">
				<div class="leftbox">
					<h3><?php esc_html_e('Documentation','lifestyle-store'); ?></h3>
					<p><?php $theme = wp_get_theme(); 
						echo wp_kses_post( apply_filters( 'description', esc_html( $theme->get( 'Description' ) ) ) );
					?></p>

					<h4><?php esc_html_e('Edit Your Site','lifestyle-store'); ?></h4>
					<p><?php esc_html_e('Now create your website with easy drag and drop powered by gutenburg.','lifestyle-store'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url() . 'site-editor.php' ); ?>" target="_blank"><?php esc_html_e('Edit Your Site','lifestyle-store'); ?></a>

					<h4><?php esc_html_e('Visit Your Site','lifestyle-store'); ?></h4>
					<p><?php esc_html_e('To check your website click here','lifestyle-store'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( home_url() ); ?>" target="_blank"><?php esc_html_e('Visit Your Site','lifestyle-store'); ?></a>

					<h4><?php esc_html_e('Theme Documentation','lifestyle-store'); ?></h4>
					<p><?php esc_html_e('Check the theme documentation to easily set up your website.','lifestyle-store'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( LIFESTYLE_STORE_FREE_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation','lifestyle-store'); ?></a>
				</div>
       	</div>
			<div class="col-md-3">
				<h3><?php echo esc_html(LIFESTYLE_STORE_THEME_NAME); ?></h3>
				<img class="lifestyle_store_img_responsive" style="width: 100%;" src="<?php echo esc_url( $theme->get_screenshot() ); ?>" />
				<div class="pro-links">
					<hr>
			    	<a class="button-primary livedemo" href="<?php echo esc_url( LIFESTYLE_STORE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'lifestyle-store'); ?></a>
					<a class="button-primary buynow" href="<?php echo esc_url( LIFESTYLE_STORE_BUY_PRO ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'lifestyle-store'); ?></a>
					<a class="button-primary docs" href="<?php echo esc_url( LIFESTYLE_STORE_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'lifestyle-store'); ?></a>
					<hr>
				</div>
				<ul style="padding-top:10px">
					<li class="upsell-lifestyle_store"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'lifestyle-store');?> </li>                 
					<li class="upsell-lifestyle_store"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'lifestyle-store');?> </li>
					<li class="upsell-lifestyle_store"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'lifestyle-store');?> </li>
					<li class="upsell-lifestyle_store"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'lifestyle-store');?> </li>
					<li class="upsell-lifestyle_store"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'lifestyle-store');?> </li>
					<li class="upsell-lifestyle_store"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'lifestyle-store');?> </li>
					<li class="upsell-lifestyle_store"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'lifestyle-store');?> </li>
					<li class="upsell-lifestyle_store"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'lifestyle-store');?> </li>
					<li class="upsell-lifestyle_store"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'lifestyle-store');?> </li>
					<li class="upsell-lifestyle_store"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'lifestyle-store');?> </li>
					<li class="upsell-lifestyle_store"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'lifestyle-store');?> </li>
					<li class="upsell-lifestyle_store"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'lifestyle-store');?> </li>
					<li class="upsell-lifestyle_store"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'lifestyle-store');?> </li>
               <li class="upsell-lifestyle_store"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'lifestyle-store');?> </li>
            </ul>
        	</div>
		</div>
	</div>

<?php }?>