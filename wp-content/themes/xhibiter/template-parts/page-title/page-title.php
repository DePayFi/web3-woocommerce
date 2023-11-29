<?php
/**
 * Page title.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Xhibiter
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

if ( xhibiter_is_woocommerce_activated() ) {
	if ( is_page('wishlist') ) {
		return;
	}
}
?>

<!-- Page Title -->
<div class="page-title h-40 relative bg-light-base dark:bg-jacarta-800 flex items-center text-center">
	<div class="container">

		<?php xhibiter_page_title_before(); ?>

		<?php if ( ! is_front_page() ) : ?>
			<h1 class="page-title__title"><?php single_post_title(); ?></h1>
		<?php else : ?>
			<h1 class="page-title__title"><?php the_title(); ?></h1>
		<?php endif; ?>
		
		<?php xhibiter_page_title_after(); ?>

	</div>
</div> <!-- .page-title -->