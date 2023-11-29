<?php
/**
 * The template for displaying the footer.
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

	<?php xhibiter_footer_before(); ?>

	<?php xhibiter_footer(); ?>		
	
	<?php xhibiter_footer_after(); ?>

	<?php xhibiter_back_to_top(); ?>

	<?php xhibiter_content_bottom(); ?>

	</div> <!-- #content -->

	<?php xhibiter_content_after(); ?>

</div> <!-- .main-wrapper -->

<?php xhibiter_body_bottom(); ?>

<?php wp_footer(); ?>
</body>
</html>