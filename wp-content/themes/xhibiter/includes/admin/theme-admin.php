<?php

/**
 * Theme admin functions.
 *
 * @package Xhibiter
 */
if ( !defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
/**
* Add admin menu
*
* @since 1.0.0
*/
function xhibiter_theme_admin_menu()
{
    add_theme_page(
        esc_html__( 'Xhibiter Getting Started', 'xhibiter' ),
        esc_html__( 'Xhibiter', 'xhibiter' ),
        'manage_options',
        'xhibiter-theme',
        'xhibiter_admin_page_content',
        30
    );
}

add_action( 'admin_menu', 'xhibiter_theme_admin_menu' );
/**
* Add admin page content
*
* @since 1.0.0
*/
function xhibiter_admin_page_content()
{
    $theme = wp_get_theme();
    $theme_name = 'Xhibiter';
    $active_theme_name = strtolower( preg_replace( '#[^a-zA-Z]#', '', $theme->template ) );
    $docs_url = 'https://docs.deothemes.com/xhibiter/knowledgebase/';
    $urls = array(
        'theme-url'       => 'https://xhibiter.deothemes.com/',
        'docs'            => 'https://docs.deothemes.com/xhibiter',
        'video-tutorials' => 'https://www.youtube.com/watch?v=MZhkxTkllIE&list=PLaPNmyRO67T3Zg9YCMWtlZraFivCz97eh&ab_channel=DeoThemes',
    );
    $buttons = array(
        'header'     => array(
        'link_url'  => admin_url( 'customize.php?autofocus[panel]=xhibiter_settings_header' ),
        'link_text' => esc_html__( 'Header', 'xhibiter' ),
        'icon'      => 'dashicons dashicons-align-center',
    ),
        'footer'     => array(
        'link_url'  => admin_url( 'customize.php?autofocus[section]=xhibiter_settings_footer' ),
        'link_text' => esc_html__( 'Footer', 'xhibiter' ),
        'icon'      => 'dashicons dashicons-align-full-width',
    ),
        'layout'     => array(
        'link_url'  => admin_url( 'customize.php?autofocus[panel]=xhibiter_settings_layout' ),
        'link_text' => esc_html__( 'Layout', 'xhibiter' ),
        'icon'      => 'dashicons dashicons-layout',
    ),
        'colors'     => array(
        'link_url'  => admin_url( 'customize.php?autofocus[panel]=xhibiter_settings_colors' ),
        'link_text' => esc_html__( 'Colors', 'xhibiter' ),
        'icon'      => 'dashicons dashicons-admin-appearance',
    ),
        'typography' => array(
        'link_url'  => admin_url( 'customize.php?autofocus[section]=xhibiter_settings_typography' ),
        'link_text' => esc_html__( 'Typography', 'xhibiter' ),
        'icon'      => 'dashicons dashicons-editor-textcolor',
    ),
        'customizer' => array(
        'link_url'  => admin_url( 'customize.php' ),
        'link_text' => esc_html__( 'Customizer', 'xhibiter' ),
        'icon'      => 'dashicons dashicons-admin-generic',
    ),
    );
    $videos = array(
        'theme-installation' => array(
        'links' => array( array(
        'link_url'     => 'https://www.youtube.com/watch?v=_7zoyRwF2cs',
        'link_text'    => esc_html__( 'Theme Installation', 'xhibiter' ),
        'link_img_src' => XHIBITER_URI . '/assets/admin/img/videos/xhibiter_video_demo_import.jpg',
    ) ),
    ),
    );
    $features = array(
        'demos'             => array(
        'title' => esc_html__( 'Home Pages', 'xhibiter' ),
        'url'   => '',
        'free'  => esc_html__( '1', 'xhibiter' ),
        'pro'   => esc_html__( '12', 'xhibiter' ),
    ),
        'rtl-translation'   => array(
        'title' => esc_html__( 'RTL and Translation Ready', 'xhibiter' ),
        'url'   => '',
        'free'  => '<i class="xhibiter-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>',
        'pro'   => '<i class="xhibiter-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>',
    ),
        'dark-mode'         => array(
        'title' => esc_html__( 'Dark Mode', 'xhibiter' ),
        'url'   => '',
        'free'  => '<i class="xhibiter-list-item-icon xhibiter-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
        'pro'   => '<i class="xhibiter-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>',
    ),
        'demo-import'       => array(
        'title' => esc_html__( 'Easy Installation Wizard', 'xhibiter' ),
        'url'   => '',
        'free'  => '<i class="xhibiter-list-item-icon xhibiter-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
        'pro'   => '<i class="xhibiter-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>',
    ),
        '24-7-support'      => array(
        'title' => esc_html__( 'Priority email support', 'xhibiter' ),
        'url'   => '',
        'free'  => '<i class="xhibiter-list-item-icon xhibiter-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
        'pro'   => '<i class="xhibiter-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>',
    ),
        'builder'           => array(
        'title' => esc_html__( 'Header / footer builder', 'xhibiter' ),
        'url'   => '',
        'free'  => '<i class="xhibiter-list-item-icon xhibiter-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
        'pro'   => '<i class="xhibiter-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>',
    ),
        'elementor-widgets' => array(
        'title' => esc_html__( 'Elementor widgets', 'xhibiter' ),
        'url'   => '',
        'free'  => esc_html__( 'Basic', 'xhibiter' ),
        'pro'   => esc_html__( '25+ premium widgets', 'xhibiter' ),
    ),
        'megamenu'          => array(
        'title' => esc_html__( 'Customizable mega menu', 'xhibiter' ),
        'url'   => '',
        'free'  => '<i class="xhibiter-list-item-icon xhibiter-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
        'pro'   => '<i class="xhibiter-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>',
    ),
        'gdpr'              => array(
        'title' => esc_html__( 'GDPR tools', 'xhibiter' ),
        'url'   => '',
        'free'  => '<i class="xhibiter-list-item-icon xhibiter-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
        'pro'   => '<i class="xhibiter-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>',
    ),
        'acf-pro'           => array(
        'title' => esc_html__( 'ACF Pro integrated', 'xhibiter' ),
        'url'   => '',
        'free'  => '<i class="xhibiter-list-item-icon xhibiter-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
        'pro'   => '<i class="xhibiter-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>',
    ),
        'dynamic-portfolio' => array(
        'title' => esc_html__( 'Dynamic portfolio', 'xhibiter' ),
        'url'   => '',
        'free'  => '<i class="xhibiter-list-item-icon xhibiter-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
        'pro'   => '<i class="xhibiter-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>',
    ),
        'typography'        => array(
        'title' => esc_html__( 'Typography', 'xhibiter' ),
        'url'   => '',
        'free'  => esc_html__( 'Google Fonts', 'xhibiter' ),
        'pro'   => esc_html__( 'Google Fonts + Custom Fonts + Adobe Fonts', 'xhibiter' ),
    ),
    );
    $demos = array(
        'home-1'  => array(
        'title'   => esc_html__( 'NFT Marketplace 1', 'xhibiter' ),
        'url'     => $urls['theme-url'],
        'preview' => $urls['theme-url'] . '/import/01/preview.jpg',
    ),
        'home-2'  => array(
        'title'   => esc_html__( 'NFT Marketplace 2', 'xhibiter' ),
        'url'     => $urls['theme-url'] . 'home-2',
        'preview' => $urls['theme-url'] . '/import/02/preview.jpg',
    ),
        'home-3'  => array(
        'title'   => esc_html__( 'NFT Marketplace 3', 'xhibiter' ),
        'url'     => $urls['theme-url'] . 'home-3',
        'preview' => $urls['theme-url'] . '/import/03/preview.jpg',
    ),
        'home-4'  => array(
        'title'   => esc_html__( 'NFT Marketplace 4', 'xhibiter' ),
        'url'     => $urls['theme-url'] . 'home-4',
        'preview' => $urls['theme-url'] . '/import/04/preview.jpg',
    ),
        'home-5'  => array(
        'title'   => esc_html__( 'NFT Marketplace 5', 'xhibiter' ),
        'url'     => $urls['theme-url'] . 'home-5',
        'preview' => $urls['theme-url'] . '/import/05/preview.jpg',
    ),
        'home-6'  => array(
        'title'   => esc_html__( 'NFT Marketplace 6', 'xhibiter' ),
        'url'     => $urls['theme-url'] . 'home-6',
        'preview' => $urls['theme-url'] . '/import/06/preview.jpg',
    ),
        'home-7'  => array(
        'title'   => esc_html__( 'Crypto Consultant', 'xhibiter' ),
        'url'     => $urls['theme-url'] . 'crypto-consultant',
        'preview' => $urls['theme-url'] . '/import/07/preview.jpg',
    ),
        'home-8'  => array(
        'title'   => esc_html__( 'NFT Game', 'xhibiter' ),
        'url'     => $urls['theme-url'] . 'nft-game',
        'preview' => $urls['theme-url'] . '/import/08/preview.jpg',
    ),
        'home-9'  => array(
        'title'   => esc_html__( 'DAO Platform', 'xhibiter' ),
        'url'     => $urls['theme-url'] . 'dao-platform',
        'preview' => $urls['theme-url'] . '/import/09/preview.jpg',
    ),
        'home-10' => array(
        'title'   => esc_html__( 'Crypto App', 'xhibiter' ),
        'url'     => $urls['theme-url'] . 'crypto-app',
        'preview' => $urls['theme-url'] . '/import/10/preview.jpg',
    ),
        'home-11' => array(
        'title'   => esc_html__( 'Crypto Trading', 'xhibiter' ),
        'url'     => $urls['theme-url'] . 'crypto-trading',
        'preview' => $urls['theme-url'] . '/import/11/preview.jpg',
    ),
        'home-12' => array(
        'title'   => esc_html__( 'ICO Landing', 'xhibiter' ),
        'url'     => $urls['theme-url'] . 'ico-landing',
        'preview' => $urls['theme-url'] . '/import/12/preview.jpg',
    ),
    );
    ?>

		<div class="xhibiter-page-header">
			<div class="xhibiter-page-header__container">
				<div class="xhibiter-page-header__branding">
					<a href="<?php 
    echo  esc_url( $urls['theme-url'] ) ;
    ?>" target="_blank" rel="noopener" >
						<img src="<?php 
    echo  esc_url( XHIBITER_URI . '/assets/admin/img/theme_logo.png' ) ;
    ?>" class="xhibiter-page-header__logo" alt="<?php 
    echo  esc_attr__( 'Xhibiter', 'xhibiter' ) ;
    ?>" />
					</a>
					<span class="xhibiter-theme-version"><?php 
    echo  esc_html( XHIBITER_VERSION ) ;
    ?></span>
				</div>
				<div class="xhibiter-page-header__tagline">
					<span  class="xhibiter-page-header__tagline-text">				
						<?php 
    echo  esc_html__( 'Made by ', 'xhibiter' ) ;
    ?>
						<a href="https://deothemes.com/"><?php 
    echo  esc_html__( 'DeoThemes', 'xhibiter' ) ;
    ?></a>						
					</span>					
				</div>				
			</div>
		</div>

		<div class="wrap xhibiter-container">
			<div class="xhibiter-grid">

				<div class="xhibiter-grid-content">
					<div class="xhibiter-body">

						<h1 class="xhibiter-title"><?php 
    esc_html_e( 'Getting Started', 'xhibiter' );
    ?></h1>
						<p class="xhibiter-intro-text">
							<?php 
    echo  esc_html__( 'Xhibiter is now installed and ready to use. Get ready to build something beautiful. To get started check the links below. We hope you enjoy it!', 'xhibiter' ) ;
    ?>
						</p>
						
						<?php 
    ?>

						<!-- Navigation Buttons -->
						<ul class="xhibiter-navigation-buttons">
							<?php 
    foreach ( $buttons as $button => $link ) {
        echo  '<li class="xhibiter-navigation-buttons__item">' ;
        echo  '<a href="' . esc_url( $link['link_url'] ) . '" class="xhibiter-navigation-buttons__url">' ;
        echo  '<span class="xhibiter-navigation-buttons__icon ' . esc_attr( $link['icon'] ) . '"></span>' ;
        echo  '<span class="xhibiter-navigation-buttons__label">' . esc_html( $link['link_text'] ) . '</span>' ;
        echo  '</a>' ;
        echo  '</li>' ;
    }
    ?>
						</ul>

						<!-- Pro Demos -->
						<section class="xhibiter-section">
							<h2 class="xhibiter-heading"><?php 
    echo  esc_html( $theme_name ) . esc_html__( ' Pro Predefined Demos', 'xhibiter' ) ;
    ?></h2>
							<ul class="xhibiter-pro-demos">
								<?php 
    foreach ( $demos as $demo ) {
        ?>
									<li class="xhibiter-pro-demos__item">
										<a href="<?php 
        echo  esc_url( $demo['url'] ) ;
        ?>" target="_blank" rel="noopener noreferrer nofollow" <?php 
        the_title_attribute( $demo['title'] );
        ?>>
											<img src="<?php 
        echo  esc_url( $demo['preview'] ) ;
        ?>" alt="<?php 
        echo  esc_attr( $demo['title'] ) ;
        ?>">
											<h2 class="xhibiter-pro-demos__item-title"><?php 
        echo  esc_html( $demo['title'] ) ;
        ?></h2>
										</a>
									</li>
								<?php 
    }
    ?>
							</ul>
						</section>
						
						<?php 
    ?>
							<!-- Comparison -->
							<section class="xhibiter-section">
								<h2 class="xhibiter-heading"><?php 
    echo  esc_html__( 'Free Vs Pro', 'xhibiter' ) ;
    ?></h2>
								<table class="xhibiter-comparison widefat striped table-view-list">
									<thead>
										<tr>
											<th><span><?php 
    echo  esc_html__( 'Features', 'xhibiter' ) ;
    ?></span></th>
											<th><span><?php 
    printf( esc_html__( '%s Free', 'xhibiter' ), $theme_name );
    ?></span></th>
											<th><span><?php 
    printf( esc_html__( '%s Pro', 'xhibiter' ), $theme_name );
    ?></span></th>
										</tr>
									</thead>
									<tbody>
										<?php 
    foreach ( $features as $feature ) {
        ?>
											<tr>
												<td><?php 
        echo  esc_html( $feature['title'] ) ;
        ?></td>
												<td><?php 
        echo  wp_kses( $feature['free'], array(
            'i' => array(
            'class'       => array(),
            'aria-hidden' => array(),
        ),
        ) ) ;
        ?></td>
												<td><?php 
        echo  wp_kses( $feature['pro'], array(
            'i' => array(
            'class'       => array(),
            'aria-hidden' => array(),
        ),
        ) ) ;
        ?></td>
											</tr>
										<?php 
    }
    ?>
									</tbody>
								</table>
								<a href="<?php 
    echo  esc_url( xhibiter_fs()->get_upgrade_url() ) ;
    ?>" class="button button-primary button-hero">
									<span><?php 
    echo  esc_html__( 'Upgrade Now', 'xhibiter' ) ;
    ?></span>
								</a>
							</section>
						<?php 
    ?>


					</div> <!-- .body -->
				</div> <!-- .content -->
				
				<aside class="xhibiter-grid-sidebar">
					<div class="xhibiter-grid-sidebar-widget-area">

						<div class="xhibiter-widget">
							<h2 class="xhibiter-widget-title"><?php 
    echo  esc_html__( 'Useful Links', 'xhibiter' ) ;
    ?></h2>
							<ul class="xhibiter-useful-links">
								<li>
									<a href="https://docs.deothemes.com/xhibiter" target="_blank"><?php 
    echo  esc_html__( 'Knowledge Base', 'xhibiter' ) ;
    ?></a>
								</li>

								<?php 
    ?>

							</ul>
						</div>

						<div class="xhibiter-widget xhibiter-widget-video-tutorials">
							<h2 class="xhibiter-widget-title"><?php 
    esc_html_e( 'Video Tutorials', 'xhibiter' );
    ?></h2>
							<ul class="xhibiter-video-tutorials">
								<?php 
    foreach ( (array) $videos as $video_items => $video ) {
        echo  '<li class="xhibiter-video-tutorials__item">' ;
        foreach ( $video['links'] as $key => $link ) {
            echo  '<a href="' . esc_url( $link['link_url'] ) . '" class="xhibiter-video-tutorials__url" target="_blank" rel="noopener">' ;
            echo  '<img src="' . esc_url( $link['link_img_src'] ) . '" alt="' . esc_html( $link['link_text'] ) . '" class="xhibiter-video-tutorials__img" />' ;
            echo  '<span class="xhibiter-video-tutorials__label">' . esc_html( $link['link_text'] ) . '</span>' ;
            echo  '</a>' ;
        }
        echo  '</li>' ;
    }
    ?>
							</ul>
						</div>					

					</div>					
				</aside>	

			</div> <!-- .grid -->

		</div>
	<?php 
}

/**
* Adds an admin notice upon successful activation.
*/
function xhibiter_activation_admin_notice()
{
    global  $current_user ;
    global  $current_screen ;
    // Don't show on Xhibiter main admin page
    if ( $current_screen->id === 'appearance_page_xhibiter-theme' || $current_screen->id === 'toplevel_page_xhibiter' ) {
        return;
    }
    
    if ( is_admin() ) {
        $current_theme = wp_get_theme();
        $welcome_dismissed = get_user_meta( $current_user->ID, 'xhibiter_wizard_admin_notice' );
        if ( ($current_theme->get( 'Name' ) == "Xhibiter" || $current_theme->get( 'Name' ) == "Xhibiter Pro") && !$welcome_dismissed ) {
            add_action( 'admin_notices', 'xhibiter_wizard_admin_notice', 99 );
        }
        wp_enqueue_style( 'xhibiter-wizard-notice-css', get_template_directory_uri() . '/assets/admin/css/wizard-notice.css' );
    }

}

add_action( 'current_screen', 'xhibiter_activation_admin_notice' );
/**
* Adds a button to dismiss the notice
*/
function xhibiter_dismiss_wizard_notice()
{
    global  $current_user ;
    $user_id = $current_user->ID;
    if ( isset( $_GET['xhibiter_wizard_dismiss'] ) && $_GET['xhibiter_wizard_dismiss'] == '1' ) {
        add_user_meta(
            $user_id,
            'xhibiter_wizard_admin_notice',
            'true',
            true
        );
    }
}

add_action( 'admin_init', 'xhibiter_dismiss_wizard_notice', 1 );
/**
* Display an admin notice linking to the wizard screen
*/
function xhibiter_wizard_admin_notice()
{
    
    if ( current_user_can( 'customize' ) ) {
        ?>
		<div class="notice theme-notice">
			<div class="theme-notice-logo">
				<img src="<?php 
        echo  esc_url( XHIBITER_URI . '/assets/admin/img/theme_logo_white.png' ) ;
        ?>" alt="<?php 
        esc_attr_e( 'Xhibiter', 'xhibiter' );
        ?>">
			</div>
			<div class="theme-notice-message wp-theme-fresh">
				<h2><?php 
        esc_html_e( 'Thank you for choosing Xhibiter!', 'xhibiter' );
        ?></h2>
				<?php 
        
        if ( class_exists( 'Merlin' ) ) {
            ?>
					<p class="about-description"><?php 
            esc_html_e( 'Run the Setup Wizard to configure your new theme and begin customizing your site.', 'xhibiter' );
            ?></p>
				<?php 
        } else {
            ?>
					<p class="about-description"><?php 
            esc_html_e( 'Follow the steps to configure your new theme and begin customizing your site.', 'xhibiter' );
            ?></p>
				<?php 
        }
        
        ?>
			</div>
			<div class="theme-notice-cta">
				<?php 
        
        if ( class_exists( 'Merlin' ) ) {
            ?>
					<a href="<?php 
            echo  esc_url( admin_url( 'themes.php?page=merlin' ) ) ;
            ?>" class="button button-primary button-hero" style="text-decoration: none;"><?php 
            esc_html_e( 'Run Setup Wizard', 'xhibiter' );
            ?></a>
				<?php 
        } else {
            ?>
					<a href="<?php 
            echo  esc_url( admin_url( 'themes.php?page=xhibiter-theme' ) ) ;
            ?>" class="button button-primary button-hero" style="text-decoration: none;"><?php 
            esc_html_e( 'Setup Instructions', 'xhibiter' );
            ?></a>
				<?php 
        }
        
        ?>
				<a href="<?php 
        echo  esc_url( wp_nonce_url( add_query_arg( 'xhibiter_wizard_dismiss', '1' ) ) ) ;
        ?>" class="notice-dismiss" target="_parent"></a>
			</div>
		</div>
	<?php 
    }

}
