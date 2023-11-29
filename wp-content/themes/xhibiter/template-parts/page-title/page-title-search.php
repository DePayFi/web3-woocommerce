<?php
/**
 * Page title for search pages.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Xhibiter
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>

<!-- Page Title -->
<div class="page-title h-40 relative bg-light-base dark:bg-jacarta-800 flex items-center text-center">
	<div class="container">

		<?php xhibiter_page_title_before(); ?>						
			<h1 class="page-title__title">
				<?php printf( esc_html__( 'Search Results for: %s', 'xhibiter' ), '<span>' . get_search_query() . '</span>' ); ?>
			</h1>				
		<?php xhibiter_page_title_after(); ?>

	</div>
</div> <!-- .page-title -->