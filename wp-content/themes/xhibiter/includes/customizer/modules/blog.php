<?php
/**
 * Customizer Blog
 *
 * @package Xhibiter
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
* Meta
*/

// Meta category
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'xhibiter_settings_meta_category_show',
	'label'       => esc_html__( 'Show meta category', 'xhibiter' ),
	'section'     => 'xhibiter_settings_post_meta',
	'default'     => true,
) );

// Meta date
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'xhibiter_settings_meta_date_show',
	'label'       => esc_html__( 'Show meta date', 'xhibiter' ),
	'section'     => 'xhibiter_settings_post_meta',
	'default'     => true,
) );

// Meta author
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'xhibiter_settings_meta_author_show',
	'label'       => esc_html__( 'Show meta author', 'xhibiter' ),
	'section'     => 'xhibiter_settings_post_meta',
	'default'     => true,
) );

// Post excerpt
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'xhibiter_settings_post_excerpt_show',
	'label'       => esc_html__( 'Show post excerpt', 'xhibiter' ),
	'section'     => 'xhibiter_settings_post_meta',
	'default'     => true,
) );

// Excerpt length
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'number',
	'settings'    => 'xhibiter_settings_posts_excerpt_length',
	'label'       => esc_html__( 'Excerpt length (words)', 'xhibiter' ),
	'section'     => 'xhibiter_settings_post_meta',
	'default'     => 30,
	'choices'     => array(
		'min'  => 0,
		'max'  => 9999,
		'step' => 1,
	),
) );


/**
* Single Post
*/

// Featured image
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'xhibiter_settings_single_featured_image_show',
	'label'       => esc_html__( 'Show featured image', 'xhibiter' ),
	'section'     => 'xhibiter_settings_single_post',
	'default'     => true,
) );

// Meta category
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'xhibiter_settings_single_category_show',
	'label'       => esc_html__( 'Show category', 'xhibiter' ),
	'section'     => 'xhibiter_settings_single_post',
	'default'     => true,
) );

// Meta date
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'xhibiter_settings_single_date_show',
	'label'       => esc_html__( 'Show date', 'xhibiter' ),
	'section'     => 'xhibiter_settings_single_post',
	'default'     => true,
) );

// Meta author
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'xhibiter_settings_single_author_show',
	'label'       => esc_html__( 'Show author', 'xhibiter' ),
	'section'     => 'xhibiter_settings_single_post',
	'default'     => true,
) );

// Post tags
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'xhibiter_settings_post_tags_show',
	'label'       => esc_html__( 'Show tags', 'xhibiter' ),
	'section'     => 'xhibiter_settings_single_post',
	'default'     => true,
) );

// Post author box
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'xhibiter_settings_author_box_show',
	'label'       => esc_html__( 'Show author box', 'xhibiter' ),
	'section'     => 'xhibiter_settings_single_post',
	'default'     => true,
) );

// Related posts heading
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'custom',
	'settings'    => 'separator-' . $uniqid++,
	'section'     => 'xhibiter_settings_single_post',
	'default'     => '<h3 class="customizer-title">' . esc_html__( 'Related Posts', 'xhibiter' ) . '</h3>',
) );

// Related posts
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'xhibiter_settings_related_posts_show',
	'label'       => esc_html__( 'Show related posts', 'xhibiter' ),
	'section'     => 'xhibiter_settings_single_post',
	'default'     => true,
) );

// Related by
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'select',
	'settings'    => 'xhibiter_settings_related_posts_relation',
	'label'       => esc_html__( 'Related by', 'xhibiter' ),
	'section'     => 'xhibiter_settings_single_post',
	'default'     => 'category',
	'choices'     => array(
		'category' => esc_html__( 'Category', 'xhibiter' ),
		'tag' => esc_html__( 'Tag', 'xhibiter' ),
		'author' => esc_html__( 'Author', 'xhibiter' ),
	),
) );

/**
* Socials Share Buttons
*/

// Social Share Buttons
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'xhibiter_settings_post_share_buttons_show',
	'label'       => esc_html__( 'Show share buttons', 'xhibiter' ),
	'section'     => 'xhibiter_settings_social_share',
	'default'     => true,
) );

// Facebook Share
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'xhibiter_settings_share_facebook',
	'label'       => esc_html__( 'Facebook', 'xhibiter' ),
	'section'     => 'xhibiter_settings_social_share',
	'default'     => true,
) );

// Twitter Share
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'xhibiter_settings_share_twitter',
	'label'       => esc_html__( 'Twitter', 'xhibiter' ),
	'section'     => 'xhibiter_settings_social_share',
	'default'     => true,
) );

// Linkedin Share
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'xhibiter_settings_share_linkedin',
	'label'       => esc_html__( 'Linkedin', 'xhibiter' ),
	'section'     => 'xhibiter_settings_social_share',
	'default'     => false,
) );

// Pinterest Share
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'xhibiter_settings_share_pinterest',
	'label'       => esc_html__( 'Pinterest', 'xhibiter' ),
	'section'     => 'xhibiter_settings_social_share',
	'default'     => true,
) );

// Vkontakte Share
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'xhibiter_settings_share_vkontakte',
	'label'       => esc_html__( 'Vkontakte', 'xhibiter' ),
	'section'     => 'xhibiter_settings_social_share',
	'default'     => false,
) );

// Pocket Share
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'xhibiter_settings_share_pocket',
	'label'       => esc_html__( 'Pocket', 'xhibiter' ),
	'section'     => 'xhibiter_settings_social_share',
	'default'     => true,
) );

// Facebook Messenger Share
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'xhibiter_settings_share_facebook_messenger',
	'label'       => esc_html__( 'Facebook Messenger', 'xhibiter' ),
	'section'     => 'xhibiter_settings_social_share',
	'default'     => false,
) );

// Whatsapp Share
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'xhibiter_settings_share_whatsapp',
	'label'       => esc_html__( 'Whatsapp', 'xhibiter' ),
	'section'     => 'xhibiter_settings_social_share',
	'default'     => false,
) );

// Viber Share
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'xhibiter_settings_share_viber',
	'label'       => esc_html__( 'Viber', 'xhibiter' ),
	'section'     => 'xhibiter_settings_social_share',
	'default'     => false,
) );

// Telegram Share
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'xhibiter_settings_share_telegram',
	'label'       => esc_html__( 'Telegram', 'xhibiter' ),
	'section'     => 'xhibiter_settings_social_share',
	'default'     => false,
) );

// Reddit Share
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'xhibiter_settings_share_reddit',
	'label'       => esc_html__( 'Reddit', 'xhibiter' ),
	'section'     => 'xhibiter_settings_social_share',
	'default'     => false,
) );

// Email Share
Kirki::add_field( 'xhibiter_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'xhibiter_settings_share_email',
	'label'       => esc_html__( 'Email', 'xhibiter' ),
	'section'     => 'xhibiter_settings_social_share',
	'default'     => true,
) );