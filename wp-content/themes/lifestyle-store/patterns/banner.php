<?php
/**
 * Title: Banner
 * Slug: lifestyle-store/banner
 * Categories: lifestyle-store, banner
 */
?>

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0px"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"color":{"background":"#cce3e2"}},"className":"bannerimage","layout":{"type":"constrained","contentSize":"90%"}} -->
<div class="wp-block-group bannerimage has-background" style="background-color:#cce3e2;margin-top:0px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:columns {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"className":"banner-block"} -->
<div class="wp-block-columns banner-block" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:column {"verticalAlignment":"center","width":"20%","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0"}}},"className":"banner-category-column"} -->
<div class="wp-block-column is-vertically-aligned-center banner-category-column" style="padding-top:0;padding-bottom:0;padding-left:0;flex-basis:20%"><!-- wp:heading {"textAlign":"left","level":5,"style":{"spacing":{"padding":{"left":"0"}}}} -->
<h5 class="wp-block-heading has-text-align-left" style="padding-left:0"><?php esc_html_e('All Categories','lifestyle-store'); ?></h5>
<!-- /wp:heading -->

<!-- wp:woocommerce/product-categories {"hasCount":false,"style":{"color":{"text":"#4c4c4c"},"elements":{"link":{"color":{"text":"#4c4c4c"}}},"typography":{"lineHeight":"2"}},"className":"banner-product-category"} /--></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top","width":"80%","className":"banner-img-column"} -->
<div class="wp-block-column is-vertically-aligned-top banner-img-column" style="flex-basis:80%"><!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() . '/images/banner.png'); ?>","id":29,"dimRatio":0,"minHeight":600,"minHeightUnit":"px","isDark":false,"align":"wide","className":"banner-image-cover","layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignwide is-light banner-image-cover" style="min-height:600px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-29" alt="" src="<?php echo esc_url( get_template_directory_uri() . '/images/banner.png'); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center" style="margin-top:0;margin-bottom:0"><!-- wp:column {"verticalAlignment":"center","width":"40%","className":"banner-text wow lightSpeedIn"} -->
<div class="wp-block-column is-vertically-aligned-center banner-text wow lightSpeedIn" style="flex-basis:40%"><!-- wp:heading {"textAlign":"left","level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"typography":{"fontSize":"26px","fontStyle":"normal","fontWeight":"700"},"spacing":{"padding":{"left":"0"}}},"textColor":"white"} -->
<h3 class="wp-block-heading has-text-align-left has-white-color has-text-color has-link-color" style="padding-left:0;font-size:26px;font-style:normal;font-weight:700"><?php esc_html_e('Maquinaria Gear','lifestyle-store'); ?></h3>
<!-- /wp:heading -->

<!-- wp:heading {"textAlign":"left","level":1,"style":{"typography":{"textTransform":"none","fontStyle":"normal","fontWeight":"800","fontSize":"300px","lineHeight":"0.9"},"color":{"text":"#cce3e2"},"elements":{"link":{"color":{"text":"#cce3e2"}}}},"className":"number-heading","fontFamily":"josefin_sans"} -->
<h1 class="wp-block-heading has-text-align-left number-heading has-text-color has-link-color has-josefin-sans-font-family" style="color:#cce3e2;font-size:300px;font-style:normal;font-weight:800;line-height:0.9;text-transform:none"><?php esc_html_e('25','lifestyle-store'); ?></h1>
<!-- /wp:heading -->

<!-- wp:columns {"className":"baner-off-box"} -->
<div class="wp-block-columns baner-off-box"><!-- wp:column {"width":"50%"} -->
<div class="wp-block-column" style="flex-basis:50%"><!-- wp:heading {"level":1,"style":{"color":{"text":"#cce3e2"},"elements":{"link":{"color":{"text":"#cce3e2"}}},"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1"}}} -->
<h1 class="wp-block-heading has-text-color has-link-color" style="color:#cce3e2;font-style:normal;font-weight:600;line-height:1"><?php esc_html_e('% OFF','lifestyle-store'); ?></h1>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"50%"} -->
<div class="wp-block-column" style="flex-basis:50%"><!-- wp:paragraph {"style":{"layout":{"selfStretch":"fit","flexSize":null},"color":{"text":"#cce3e2"},"elements":{"link":{"color":{"text":"#cce3e2"}}}}} -->
<p class="has-text-color has-link-color" style="color:#cce3e2"><?php esc_html_e('Get 25% Off On Best Quality Product','lifestyle-store'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"left"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"white","style":{"border":{"radius":"0px"},"typography":{"textTransform":"capitalize"},"color":{"text":"#1b1c1e"}},"className":"is-style-fill","fontFamily":"merriweather"} -->
<div class="wp-block-button is-style-fill has-merriweather-font-family" style="text-transform:capitalize"><a class="wp-block-button__link has-white-background-color has-text-color has-background wp-element-button" style="border-radius:0px;color:#1b1c1e"><?php esc_html_e('Shop Now','lifestyle-store'); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->