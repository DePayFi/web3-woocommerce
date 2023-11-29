<?php
/**
 * The header for this theme.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Xhibiter
 * @since 		 1.0.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php xhibiter_head_top(); ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php xhibiter_head_bottom(); ?>
	<?php wp_head(); ?>	
</head>

<body <?php body_class(); ?> data-no-jquery itemscope itemtype="https://schema.org/WebPage">

	<?php wp_body_open(); ?>

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to Content', 'xhibiter' ) ?></a>

	<?php xhibiter_body_top(); ?>

	<?php xhibiter_preloader() ?>
	
	<div class="main-wrapper h-full">

		<?php xhibiter_header_before(); ?>

		<?php xhibiter_header(); ?>
		
		<?php xhibiter_header_after(); ?>

		<?php xhibiter_content_before(); ?>

		<div id="content" class="site-content overflow-hidden">

			<?php xhibiter_content_top(); ?>