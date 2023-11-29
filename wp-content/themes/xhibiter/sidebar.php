<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * 
 * @package Xhibiter
 * @since 1.0.0
 */

if ( ! is_active_sidebar( 'xhibiter-blog-sidebar' ) ) {
	return;
}
?>

<div itemtype="https://schema.org/WPSideBar" itemscope="itemscope" id="secondary" class="widget-area" role="complementary">
	
	<?php xhibiter_sidebar_before(); ?>

	<?php dynamic_sidebar( 'xhibiter-blog-sidebar' ); ?>

	<?php xhibiter_sidebar_after(); ?>

</div><!-- #secondary -->
