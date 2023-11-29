<?php
/**
 * Masonry grid post layout.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Xhibiter
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

$columns = get_theme_mod( 'xhibiter_settings_blog_columns', 'lg:w-1/3' );
$image_size = ( 'lg:w-full' == $columns ) ? 'xhibiter_featured_large' : 'xhibiter_featured_medium';
?>

<article itemtype="https://schema.org/Article" itemscope="itemscope" id="post-<?php the_ID(); ?>" <?php post_class( 'entry mb-[30px]' ); ?>>
	<div class="overflow-hidden rounded-2.5xl transition-shadow hover:shadow-lg">
			<?php if ( has_post_thumbnail() ) : ?>
				<!-- Post thumb -->
				<figure class="entry__img-holder group overflow-hidden">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail( esc_html( $image_size ), array( 'class' => 'h-full w-full object-cover transition-transform duration-[1600ms] will-change-transform group-hover:scale-105' ) ); ?>
					</a>
				</figure>
			<?php endif; ?>	
			
			<!-- Body -->
			<div class="entry__body rounded-b-[1.25rem] border border-t-0 border-jacarta-100 bg-white p-[10%] dark:border-jacarta-600 dark:bg-jacarta-700">
				
				<?php if ( get_theme_mod( 'xhibiter_settings_meta_author_show', true ) || get_theme_mod( 'xhibiter_settings_meta_category_show', true ) ) : ?>
					<div class="mb-3 flex flex-wrap items-center space-x-1 text-xs">

						<?php if ( get_theme_mod( 'xhibiter_settings_meta_author_show', true ) ) : ?>
							<?php xhibiter_meta_author(); ?>
						<?php endif; ?>

						<?php if ( get_theme_mod( 'xhibiter_settings_meta_category_show', true ) ) : ?>
							<?php xhibiter_meta_category(); ?>
						<?php endif; ?>						

					</div>
				<?php endif; ?>

				<?php the_title( sprintf( '<h2 class="entry__title mb-4 text-xl hover:text-accent dark:text-white dark:hover:text-accent"><a href="%s">',
				esc_url( get_permalink() ) ),
				'</a></h2>' ); ?>

				<?php if ( get_the_excerpt() ) : ?>
					<div class="mb-8 dark:text-jacarta-200">
						<?php the_excerpt(); ?>
					</div>
				<?php endif; ?>
				
				<?php if ( get_theme_mod( 'xhibiter_settings_meta_date_show', true ) ) : ?>
					<div class="flex flex-wrap items-center space-x-2 text-sm text-jacarta-400">
						<?php xhibiter_meta_date(); ?>
					</div>
				<?php endif; ?>

			</div> <!-- end body -->

	</div>
</article><!-- #post-## -->