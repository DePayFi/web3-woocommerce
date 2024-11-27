<?php
/**
 * Custom template tags for this theme.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Xhibiter
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

if ( ! function_exists( 'xhibiter_meta_category' ) ) {
	/**
	* Post category meta
	*
	* @since 1.0.0
	*/
	function xhibiter_meta_category( $echo = true, $show_in = true ) {
		$categories = get_the_category();
		$separator = ', ';
		$categories_output = '';
		$output = '';

		if ( ! empty( $categories ) ) :

			if ( $show_in ) {
				$categories_output = '<span class="dark:text-jacarta-400 mr-1">'. esc_html__( 'In', 'xhibiter' ) . '</span>';
			}

			foreach( $categories as $index => $category ):
				if ( $index > 0 ) : $categories_output .= $separator; endif;
				$categories_output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" class="entry__category-item uppercase text-accent">' . esc_html( $category->name ) . '</a>';
			endforeach;
		endif;

		if ( 'post' == get_post_type() ) :
			$output .= '<div class="entry__meta-item entry__category">' . $categories_output . '</div>';
		endif;

		if ( $echo ) {
			echo html_entity_decode( esc_html( $output ) );
		} else {
			return $output;
		}

	}
}

if ( ! function_exists( 'xhibiter_meta_date' ) ) {

	/**
	* Prints HTML with meta information for the current post-date/time.
	*
	* @param bool   $default Returns default format if true. 
	*/
	function xhibiter_meta_date() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}
		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date( 'd M' ) ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);	

		echo '<span class="entry__meta-item entry__meta-date">' . html_entity_decode( esc_html( $time_string ) ) . '</span>';
	}

}


if ( ! function_exists( 'xhibiter_meta_author' ) ) {
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function xhibiter_meta_author() {
		?>
		<span class="entry__meta-item entry__meta-author">
			<a class="entry__meta-author-url font-display text-jacarta-700 hover:text-accent dark:text-jacarta-200" rel="author" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>">	
			<span itemprop="author" itemscope itemtype="http://schema.org/Person" class="entry__meta-author-name">
				<?php echo esc_html( get_the_author() ); ?>
			</span>
			</a>
		</span>
		<?php
	}
}


if ( ! function_exists( 'xhibiter_meta_comments' ) ) {
	/**
	* Post comments meta
	*
	* @since 1.0.0
	*/
	function xhibiter_meta_comments() {

		$comments_num = get_comments_number();
		$output = '';

		if ( comments_open() ) {
			if( $comments_num == 0 ) {
				$comments = esc_html__( '0 Comments', 'xhibiter' );
			} elseif ( $comments_num > 1 ) {
				$comments = $comments_num . esc_html__(' Comments', 'xhibiter');
			} else {
				$comments = esc_html__('1 Comment', 'xhibiter');
			}
			$comments = sprintf('<a href="%1$s">%2$s</a>', get_comments_link(), $comments );
		} else {
			$comments = esc_html__('Comments are closed', 'xhibiter');
		}

		$output .= '<span class="entry__meta-item">' . $comments . '</span>';
		echo html_entity_decode( esc_html( $output ) );
	}
}


if ( ! function_exists( 'xhibiter_related_posts' ) ) {
	/**
	 * Related Posts
	 */
	function xhibiter_related_posts() {
		global $post;
		$post_id = $post->ID;
		$tags = wp_get_post_tags( $post->ID );
		$author_id = get_the_author_meta( 'ID' );
		$related_by = get_theme_mod( 'xhibiter_settings_related_posts_relation', 'category' );
		$exclude_ids = array( $post_id );
		$posts_per_page = 3;

		$args = array(
			'post_type'								=> 'post',
			'post_status' 						=> 'publish',
			'update_post_meta_cache' 	=> false,
			'posts_per_page' 					=> absint( $posts_per_page ),
			'ignore_sticky_posts' 		=> true,
			'fields'                 	=> 'ids',
		);

		if ( $tags && 'tag' === $related_by ) {
			$tag_ids = array();
			foreach ( $tags as $tag ) {
				$tag_ids[] = $tag->term_id;
			}
			$args['tag__in'] = $tag_ids;
		} elseif ( 'category' === $related_by ) {
			$args['category__in'] = wp_get_post_categories( $post_id );
		} elseif ( 'author' === $related_by ) {        
			$args['author'] = $author_id;
		}

		$query = new WP_Query( $args );

		if ( $query->found_posts <= 1 ) {
			return;
		} ?>

		<?php if ( $query->have_posts() ) : ?>

			<section class="related-posts pt-8 pb-8">
				<h2 class="text-3xl mb-8"><?php echo esc_html__( 'Related Posts', 'xhibiter'); ?></h2>
				<div class="grid grid-cols-1 gap-[1.875rem] sm:grid-cols-2">

					<?php 
						$post_counter      = 1;
						$total_posts_count = 3;

						while ( $query->have_posts() && $post_counter < $total_posts_count ) :
							$query->the_post();
							$post_id = get_the_ID();
						
							if ( is_array( $exclude_ids ) && ! in_array( $post_id, $exclude_ids ) ) : ?>

								<article <?php post_class( 'entry related-posts__entry' ); ?> itemtype="https://schema.org/Article" itemscope="itemscope">
									<div class="overflow-hidden rounded-2.5xl transition-shadow hover:shadow-lg">
										<?php if ( has_post_thumbnail() ) : ?>
											<figure class="group overflow-hidden">
												<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
													<?php the_post_thumbnail( 'xhibiter_featured_medium', array('class' => 'h-full w-full object-cover transition-transform duration-[1600ms] will-change-transform group-hover:scale-105' ) ); ?>
												</a>
											</figure>
										<?php endif; ?>

										<div class="rounded-b-[1.25rem] border border-t-0 border-jacarta-100 bg-white p-[10%] dark:border-jacarta-600 dark:bg-jacarta-700">

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

											<div class="flex flex-wrap items-center space-x-2 text-sm text-jacarta-400">
												<?php if ( get_theme_mod( 'xhibiter_settings_meta_date_show', true ) ) : ?>
													<?php xhibiter_meta_date(); ?>
												<?php endif; ?>

												<?php if ( get_theme_mod( 'xhibiter_settings_meta_comments_show', true ) ) : ?>
													<?php xhibiter_meta_comments(); ?>
												<?php endif; ?>
											</div>

										</div>
									</div>
								</article><!-- #post-## -->

								<?php $post_counter++; ?>

							<?php endif; ?>

						<?php wp_reset_postdata(); ?>

					<?php endwhile; ?>					

				</div> <!-- .row -->
			</section> <!-- .related-posts -->
		<?php endif;
	}
}


if ( ! function_exists( 'xhibiter_multi_page_pagination' ) ) {
	/**
	* Multi-page pagination
	*
	* @since 1.0.0
	*/
	function xhibiter_multi_page_pagination() {
		$defaults = array(
			'before'           => '<nav class="post-pagination">' . '<span>' . esc_html( 'Pages:', 'xhibiter' ) . '</span>',
			'after'            => '</nav>',
			'link_before'      => '<span class="post-pagination__number">',
			'link_after'       => '</span>',
			'next_or_number'   => 'number',
			'separator'        => ' ',
			'nextpagelink'     => esc_html( 'Next page', 'xhibiter' ),
			'previouspagelink' => esc_html( 'Previous page', 'xhibiter' ),
			'pagelink'         => '%',
			'echo'             => 1
		);

		wp_link_pages( $defaults );
	}
}


if ( ! function_exists( 'xhibiter_post_pagination' ) ) {
	/**
	* Post pagination
	*
	* @since 1.0.0
	*/
	function xhibiter_post_pagination() {
		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		} ?>

		<!-- Pagination Numbers -->
		<nav class="pagination clearfix">
			<?php $args = array(
				'prev_next' => true,
				'prev_text' => is_rtl() ? '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="fill-current group-hover:fill-accent"><path fill="none" d="M0 0h24v24H0z"></path><path d="M13.172 12l-4.95-4.95 1.414-1.414L16 12l-6.364 6.364-1.414-1.414z"></path></svg>' : '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="fill-current group-hover:fill-accent"><path fill="none" d="M0 0h24v24H0z"></path><path d="M10.828 12l4.95 4.95-1.414 1.414L8 12l6.364-6.364 1.414 1.414z"></path></svg>',
				'next_text' => is_rtl() ? '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="fill-current group-hover:fill-accent"><path fill="none" d="M0 0h24v24H0z"></path><path d="M10.828 12l4.95 4.95-1.414 1.414L8 12l6.364-6.364 1.414 1.414z"></path></svg>' : '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="fill-current group-hover:fill-accent"><path fill="none" d="M0 0h24v24H0z"></path><path d="M13.172 12l-4.95-4.95 1.414-1.414L16 12l-6.364 6.364-1.414-1.414z"></path></svg>',
			); ?>
			<?php echo paginate_links( $args ); ?>
		</nav>

		<?php
	}
}


if ( ! function_exists( 'xhibiter_author_box' ) ) {
	/**
	* Author Box
	*/
	function xhibiter_author_box() {

		$socials = array(
			'facebook'  => get_the_author_meta( 'facebook' ),
			'twitter'   => get_the_author_meta( 'twitter' ),
			'linkedin'  => get_the_author_meta( 'linkedin' ),
			'instagram' => get_the_author_meta( 'instagram' ),
			'youtube'   => get_the_author_meta( 'youtube' ),
			'vimeo'     => get_the_author_meta( 'vimeo' ),
			'discord' 	=> get_the_author_meta( 'discord' ),
			'github' 		=> get_the_author_meta( 'github' )
		);

		if ( get_the_author_meta( 'description' ) ) : ?>			
			<div class="mb-8 flex rounded-2.5xl border border-jacarta-100 bg-white p-8 dark:border-jacarta-600 dark:bg-jacarta-700 clearfix">
				<figure itemscope itemprop="image" class="mr-4 h-16 w-16 shrink-0 self-start md:mr-8 md:h-[9rem] md:w-[9rem]">
					<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
						<?php echo get_avatar( get_the_author_meta( 'ID' ), 144, null, get_the_author_meta( 'user_nicename' ), array( 'class' => array( 'rounded-lg' ) ) ); ?>
					</a>                
				</figure>
				<div class="entry-author__info">
					<h2 class="entry-author__name" itemprop="url" rel="author">
						<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" itemprop="name">
							<span itemprop="author" itemscope itemtype="https://schema.org/Person" class="entry-author__name mb-3 mt-2 block font-display text-base text-jacarta-700 dark:text-white">
								<?php the_author_meta( 'display_name' ); ?>
							</span>
						</a>
					</h2>

					<?php if ( get_the_author_meta( 'description' ) ) : ?>
						<div class="entry-author__description mb-4 dark:text-jacarta-300"><?php the_author_meta( 'description' ); ?></div>
					<?php endif; ?>
					
					<?php if ( function_exists( 'xhibiter_user_socials' ) ) : ?>

						<?php if ( $socials['facebook'] || $socials['twitter'] || $socials['linkedin'] || $socials['instagram'] || $socials['youtube'] || $socials['vimeo'] || $socials['discord'] || $socials['github'] ) : ?>

							<!-- Socials -->
							<div class="entry-author__socials socials socials--no-base">

								<?php if ( $socials['facebook'] ) : ?>
									<a href="<?php echo esc_url( $socials['facebook'] ); ?>" class="social social-facebook group" title="<?php echo esc_attr( $socials['facebook'] ); ?>" rel="noopener nofollow" target="_blank" aria-label="<?php echo esc_attr__( 'Author\'s Facebook (opens in new window)', 'xhibiter' ); ?>">
										<svg aria-hidden="true" class="h-4 w-4 fill-jacarta-400 group-hover:fill-accent dark:group-hover:fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"></path></svg>
									</a>
								<?php endif; ?>

								<?php if ( $socials['twitter'] ) : ?>
									<a href="<?php echo esc_url( $socials['twitter'] ); ?>" class="social social-twitter group" title="<?php echo esc_attr( $socials['twitter'] ); ?>" rel="noopener nofollow" target="_blank" aria-label="<?php echo esc_attr__( 'Author\'s Twitter (opens in new window)', 'xhibiter' ); ?>">
										<svg aria-hidden="true" class="h-4 w-4 fill-jacarta-400 group-hover:fill-accent dark:group-hover:fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"/></svg>
									</a>
								<?php endif; ?>

								<?php if ( $socials['linkedin'] ) : ?>
									<a href="<?php echo esc_url( $socials['linkedin'] ); ?>" class="social social-linkedin group" title="<?php echo esc_attr( $socials['linkedin'] ); ?>" rel="noopener nofollow" target="_blank" aria-label="<?php echo esc_attr__( 'Author\'s LinkedIn (opens in new window)', 'xhibiter' ); ?>">
										<svg aria-hidden="true" class="h-4 w-4 fill-jacarta-400 group-hover:fill-accent dark:group-hover:fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"/></svg>
									</a>
								<?php endif; ?>

								<?php if ( $socials['instagram'] ) : ?>
									<a href="<?php echo esc_url( $socials['instagram'] ); ?>" class="social social-instagram group" title="<?php echo esc_attr( $socials['instagram'] ); ?>" rel="noopener nofollow" target="_blank" aria-label="<?php echo esc_attr__( 'Author\'s Instagram (opens in new window)', 'xhibiter' ); ?>">
										<svg aria-hidden="true" class="h-4 w-4 fill-jacarta-400 group-hover:fill-accent dark:group-hover:fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
									</a>
								<?php endif; ?>

								<?php if ( $socials['youtube'] ) : ?>
									<a href="<?php echo esc_url( $socials['youtube'] ); ?>" class="social social-youtube group" title="<?php echo esc_attr( $socials['youtube'] ); ?>" rel="noopener nofollow" target="_blank" aria-label="<?php echo esc_attr__( 'Author\' YouTube (opens in new window)', 'xhibiter' ); ?>">
										<svg aria-hidden="true" class="h-4 w-4 fill-jacarta-400 group-hover:fill-accent dark:group-hover:fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"/></svg>
									</a>
								<?php endif; ?>

								<?php if ( $socials['vimeo'] ) : ?>
									<a href="<?php echo esc_url( $socials['vimeo'] ); ?>" class="social social-vimeo group" title="<?php echo esc_attr( $socials['vimeo'] ); ?>" rel="noopener nofollow" target="_blank" aria-label="<?php echo esc_attr__( 'Author\'s Vimeo (opens in new window)', 'xhibiter' ); ?>">
										<svg aria-hidden="true" class="h-4 w-4 fill-jacarta-400 group-hover:fill-accent dark:group-hover:fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M447.8 153.6c-2 43.6-32.4 103.3-91.4 179.1-60.9 79.2-112.4 118.8-154.6 118.8-26.1 0-48.2-24.1-66.3-72.3C100.3 250 85.3 174.3 56.2 174.3c-3.4 0-15.1 7.1-35.2 21.1L0 168.2c51.6-45.3 100.9-95.7 131.8-98.5 34.9-3.4 56.3 20.5 64.4 71.5 28.7 181.5 41.4 208.9 93.6 126.7 18.7-29.6 28.8-52.1 30.2-67.6 4.8-45.9-35.8-42.8-63.3-31 22-72.1 64.1-107.1 126.2-105.1 45.8 1.2 67.5 31.1 64.9 89.4z"/></svg>
									</a>
								<?php endif; ?>

								<?php if ( $socials['discord'] ) : ?>
									<a href="<?php echo esc_url( $socials['discord'] ); ?>" class="social social-discord group" title="<?php echo esc_attr( $socials['github'] ); ?>" rel="noopener nofollow" target="_blank" aria-label="<?php echo esc_attr__( 'Author\'s Discord (opens in new window)', 'xhibiter' ); ?>">
										<svg aria-hidden="true" class="h-4 w-4 fill-jacarta-400 group-hover:fill-accent dark:group-hover:fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
											<path
												d="M524.531,69.836a1.5,1.5,0,0,0-.764-.7A485.065,485.065,0,0,0,404.081,32.03a1.816,1.816,0,0,0-1.923.91,337.461,337.461,0,0,0-14.9,30.6,447.848,447.848,0,0,0-134.426,0,309.541,309.541,0,0,0-15.135-30.6,1.89,1.89,0,0,0-1.924-.91A483.689,483.689,0,0,0,116.085,69.137a1.712,1.712,0,0,0-.788.676C39.068,183.651,18.186,294.69,28.43,404.354a2.016,2.016,0,0,0,.765,1.375A487.666,487.666,0,0,0,176.02,479.918a1.9,1.9,0,0,0,2.063-.676A348.2,348.2,0,0,0,208.12,430.4a1.86,1.86,0,0,0-1.019-2.588,321.173,321.173,0,0,1-45.868-21.853,1.885,1.885,0,0,1-.185-3.126c3.082-2.309,6.166-4.711,9.109-7.137a1.819,1.819,0,0,1,1.9-.256c96.229,43.917,200.41,43.917,295.5,0a1.812,1.812,0,0,1,1.924.233c2.944,2.426,6.027,4.851,9.132,7.16a1.884,1.884,0,0,1-.162,3.126,301.407,301.407,0,0,1-45.89,21.83,1.875,1.875,0,0,0-1,2.611,391.055,391.055,0,0,0,30.014,48.815,1.864,1.864,0,0,0,2.063.7A486.048,486.048,0,0,0,610.7,405.729a1.882,1.882,0,0,0,.765-1.352C623.729,277.594,590.933,167.465,524.531,69.836ZM222.491,337.58c-28.972,0-52.844-26.587-52.844-59.239S193.056,219.1,222.491,219.1c29.665,0,53.306,26.82,52.843,59.239C275.334,310.993,251.924,337.58,222.491,337.58Zm195.38,0c-28.971,0-52.843-26.587-52.843-59.239S388.437,219.1,417.871,219.1c29.667,0,53.307,26.82,52.844,59.239C470.715,310.993,447.538,337.58,417.871,337.58Z"
											></path>
										</svg>
									</a>
								<?php endif; ?>

								<?php if ( $socials['github'] ) : ?>
									<a href="<?php echo esc_url( $socials['github'] ); ?>" class="social social-github group" title="<?php echo esc_attr( $socials['github'] ); ?>" rel="noopener nofollow" target="_blank" aria-label="<?php echo esc_attr__( 'Author\'s Github (opens in new window)', 'xhibiter' ); ?>">
										<svg aria-hidden="true" class="h-4 w-4 fill-jacarta-400 group-hover:fill-accent dark:group-hover:fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><path d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"/></svg>
									</a>
								<?php endif; ?>

							</div>

						<?php endif; ?>

					<?php endif; ?>

				</div>
			</div>

		<?php endif;
	}
}


if ( ! function_exists( 'xhibiter_term_description' ) ) {
	/**
	* Adds class to term description
	* @since 1.0.0
	*/
	function xhibiter_term_description( $before = '', $after = '</div>' ) {
		$description = apply_filters( 'get_the_archive_description', wp_strip_all_tags( term_description() ) );
		if ( ! empty( $description ) ) {
			echo html_entity_decode( esc_html( $before . $description . $after ) );
		}
	}
}