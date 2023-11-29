<?php
/**
 * Template parts.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Xhibiter
 * @since 		 1.0.0
 */

add_action( 'xhibiter_header', 'xhibiter_header_markup' );
add_action( 'xhibiter_footer', 'xhibiter_footer_template' );
add_action( 'xhibiter_comments', 'xhibiter_comments_template' );
add_action( 'xhibiter_page_title_after', 'xhibiter_breadcrumbs' );
add_action( 'xhibiter_entry_section_before', 'xhibiter_breadcrumbs' );
add_action( 'xhibiter_entry_featured_image', 'xhibiter_featured_image_markup' );


if ( ! function_exists( 'xhibiter_header_markup' ) ) {
	/**
	* Get site Header
	*/
	function xhibiter_header_markup() {
		if ( ! get_theme_mod( 'xhibiter_settings_header_show', true ) ) {
			return;
		}
		get_template_part( 'template-parts/header/header-default-template' );		
	}
}


if ( ! function_exists( 'xhibiter_logo' ) ) {
	/**
	* Logo
	*/
	function xhibiter_logo() {
		$width = get_theme_mod( 'xhibiter_settings_header_logo_width' );
		$logo_dark = get_theme_mod( 'xhibiter_settings_logo_dark' );
		$logo_light = get_theme_mod( 'xhibiter_settings_logo_light' );
		$size = ( is_customize_preview() ) ? 'full' : [ $width, 0 ];
		?>

		<!-- Logo -->
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="shrink-0" itemtype="https://schema.org/Organization" itemscope="itemscope">
			<?php if ( isset( $logo_dark['id'] ) ) : ?>
				<img src="<?php echo esc_url( $logo_dark['url'] ) ?>"
				class="max-h-7 w-auto dark:hidden"
				width="<?php echo esc_attr( $logo_dark['width'] ); ?>"
				height="<?php echo esc_attr( $logo_dark['height'] ); ?>"
				alt="<?php bloginfo( 'name' ) ?>" />
				
				<?php if ( isset( $logo_light['id'] ) ) : ?>
					<img src="<?php echo esc_url( $logo_light['url'] ) ?>"
					class="hidden max-h-7 w-auto dark:block"
					width="<?php echo esc_attr( $logo_light['width'] ); ?>"
					height="<?php echo esc_attr( $logo_light['height'] ); ?>"
					alt="<?php bloginfo( 'name' ) ?>" />
				<?php endif; ?>
			<?php else : ?>
				<span class="site-title site-title--dark text-jacarta-900 font-display text-lg font-semibold"><?php bloginfo( 'name' ) ?></span>
				<?php $tagline = get_bloginfo( 'description', 'display' ); ?>
				<p class="site-tagline"><?php echo esc_html( $tagline ); ?></p>
			<?php endif; ?>
		</a>

		<?php
	}
}


if ( ! function_exists( 'xhibiter_footer_template' ) ) {
	/**
	* Footer main template
	*/
	function xhibiter_footer_template() {
		get_template_part( 'template-parts/footer/footer-default-template' );
	}
}

if ( ! function_exists( 'xhibiter_comments_template' ) ) {
	/**
	* Comments template
	*/
	function xhibiter_comments_template() {
	
		if ( comments_open() || get_comments_number() ) : ?>
			<!-- Comments -->
			<div class="comments-wrap">
			<?php comments_template(); ?>
		<?php endif;
	}
}

if ( ! function_exists( 'xhibiter_preloader' ) ) {
	/**
	* Preloader
	*/
	function xhibiter_preloader() {
		if ( get_theme_mod( 'xhibiter_settings_preloader_show', false ) ) : ?>
			<div class="loader-mask">
				<div class="loader">
					<div></div>
				</div>
			</div>
		<?php endif;
	}
}

if ( ! function_exists( 'xhibiter_back_to_top' ) ) {
	/**
	* Back to top
	*/
	function xhibiter_back_to_top() {
		if ( get_theme_mod( 'xhibiter_settings_back_to_top_show', true ) ) : ?>
			<!-- Back to top -->
			<div id="back-to-top">
				<a href="#top">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 10.828l-4.95 4.95-1.414-1.414L12 8l6.364 6.364-1.414 1.414z"/></svg>
				</a>
			</div>
		<?php endif; 
	}
}

if ( ! function_exists( 'xhibiter_primary_content_markup_top' ) ) {
	/**
	* Content markup top
	*/
	function xhibiter_primary_content_markup_top() {
		?>
			<picture class="pointer-events-none absolute inset-0 dark:hidden">
				<img src="<?php echo esc_url( XHIBITER_URI . '/assets/img/gradient_light.jpg' ) ?>" alt="" aria-hidden="true" class="h-full w-full">
			</picture>
			<div class="container">
				<div class="row">
		<?php
	}
}

if ( ! function_exists( 'xhibiter_primary_content_markup_bottom' ) ) {
	/**
	* Content markup bottom
	*/
	function xhibiter_primary_content_markup_bottom() {
		?>
				</div>
			</div>
		<?php
	}
}

if ( ! function_exists( 'xhibiter_breadcrumbs' ) ) {
	/**
	* Breadcrumbs
	*
	* @since 1.0.0
	*/
	function xhibiter_breadcrumbs() {
		if ( ! function_exists( 'breadcrumb_trail' ) ) {
			return;
		}

		// Shop
		if ( xhibiter_is_woocommerce_activated() ) {
			// Shop pages
			if ( ( is_cart() || is_checkout() ) && get_theme_mod( 'xhibiter_settings_shop_pages_breadcrumbs_show', true ) ) {
				breadcrumb_trail( array(
					'show_browse' => false,
				) );
			}
		}		


		// Blog
		if ( is_home() && get_theme_mod( 'xhibiter_settings_breadcrumbs_blog_show', false ) ) {
			breadcrumb_trail( array(
				'show_browse' => false,
			) );
		}

		// Pages
		if ( is_page() && get_theme_mod( 'xhibiter_settings_breadcrumbs_pages_show', false ) ) {

			if ( xhibiter_is_woocommerce_activated() && is_shop() ) {
				return;			
			}

			breadcrumb_trail( array(
				'show_browse' => false,
			) );
		}
		
		// Single post
		if ( is_single() && get_theme_mod( 'xhibiter_settings_single_post_breadcrumbs_show', false ) ) { ?>
			<div class="breadcrumbs-wrap">
				<div class="container">
					<?php breadcrumb_trail( array(
						'show_browse' => false,
					) ); ?>
				</div>
			</div>
			<?php
		}	
	}
}


if ( ! function_exists( 'xhibiter_featured_image_markup' ) ) {
	/**
	* Single Entry Featured Image
	*
	* @since 1.0.0
	*/
	function xhibiter_featured_image_markup() {
		$featured_image = get_theme_mod( 'xhibiter_settings_single_featured_image_show', true ); ?>

		<header class="mx-auto mb-16 max-w-lg text-center">

			<?php if ( get_theme_mod( 'xhibiter_settings_single_category_show', true ) ) : ?>
				<div class="mb-3 inline-flex flex-wrap items-center space-x-1 text-xs">
					<span class="inline-flex flex-wrap items-center space-x-1 text-accent">
						<?php xhibiter_meta_category(); ?>
					</span>
				</div>
			<?php endif; ?>

			<h1 class="single-post__entry-title mb-4 font-display text-2xl text-jacarta-700 dark:text-white sm:text-5xl">
				<?php the_title(); ?>
			</h1>

			<?php if ( get_theme_mod( 'xhibiter_settings_single_author_show', true ) || get_theme_mod( 'xhibiter_settings_single_date_show', true ) ) : ?>
				<!-- Author / date -->
				<div class="inline-flex items-center">

					<?php if ( get_theme_mod( 'xhibiter_settings_single_author_show', true ) ) : ?>
						<?php echo get_avatar( get_the_author_meta( 'ID' ), 148, null, get_the_author_meta( 'user_nicename' ), array( 'class' => array( 'entry-author__img mr-4 h-10 w-10 shrink-0 rounded-full' ) ) ); ?>
					<?php endif; ?>

					<div class="text-left">
						<?php if ( get_theme_mod( 'xhibiter_settings_single_author_show', true ) ) : ?>
							<span class="text-2xs font-medium tracking-tight text-jacarta-700 dark:text-jacarta-200">
								<?php echo esc_html( get_the_author() ); ?>
							</span>
						<?php endif; ?>

						<!-- Date / Time -->
						<?php if ( get_theme_mod( 'xhibiter_settings_single_date_show', true ) ) : ?>
							<div class="flex flex-wrap items-center space-x-2 text-sm text-jacarta-400">
								<?php xhibiter_meta_date(); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>

		</header>
		
		<?php if ( has_post_thumbnail() && $featured_image ) : ?>
			<!-- Featured image -->
			<div class="container">
				<figure class="mb-16">
					<?php the_post_thumbnail( 'xhibiter_featured_large', array( 'class' => 'single-post__featured-img-image w-full rounded-2.5xl' )); ?>
				</figure>
			</div>
		<?php endif;

	}
}


if ( ! function_exists( 'xhibiter_footer_bottom_text' ) ) {

	/**
	 * Footer bottom text
	 *
	 * @since 1.0.0
	 */
	function xhibiter_footer_bottom_text() {
		$output = get_theme_mod( 'xhibiter_settings_footer_bottom_text', sprintf(
			esc_html__( 'Copyright &copy; [current-year] %1$s. Powered by %2$sXhibiter theme%3$s' , 'xhibiter' ),
			get_bloginfo( 'name' ),
			'<a href="https://xhibiter.deothemes.com">',
			'</a>'
		) );

		$output = str_replace( '[current-year]', date_i18n( 'Y' ), $output );

		echo do_shortcode( wp_kses_post( $output ) );
	}
}