<?php
/**
 * Page title for archive pages.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Xhibiter
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

$archive_title    	 = get_the_archive_title();
$archive_description = get_the_archive_description();
?>

<?php if ( $archive_title || $archive_description ) : ?>

	<!-- Page Title -->
	<div class="page-title h-40 relative bg-light-base dark:bg-jacarta-800 flex items-center text-center">
		<div class="container">

			<?php xhibiter_page_title_before(); ?>

				<?php if ( $archive_title ) : ?>						
					<h1 class="page-title__title">
						<?php
							if ( is_tax( 'projects_categories' ) || is_category() || is_tag() ) :
								single_cat_title();

							else :
								echo wp_kses_post( $archive_title );

							endif;
						?>
					</h1>
				<?php endif; ?>

				<?php
					if ( is_post_type_archive( 'projects' ) ) {
						printf( '<p class="page-title__subtitle">%s</p>', get_theme_mod( 'xhibiter_settings_project_archives_subtitle', esc_html__( 'Here are the best features that makes xhibiter the most powerful, fast and user-friendly platform.', 'xhibiter' ) ));
					} elseif ( $archive_description ) {
						?>
						<div class="page-title__description"><?php echo wp_kses_post( wpautop( $archive_description ) ); ?></div>
						<?php
					}
				?>				
		
			<?php xhibiter_page_title_after(); ?>

		</div>
	</div> <!-- .page-title -->

<?php endif; ?>