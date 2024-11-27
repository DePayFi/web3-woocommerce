<?php
/**
 * Title: Latest Products
 * Slug: lifestyle-store/latest-products
 * Categories: lifestyle-store, latest-products
 */
?>

<!-- wp:group {"className":"product-section","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group product-section"><!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"textTransform":"capitalize","fontStyle":"normal","fontWeight":"700"},"color":{"background":"#cce3e2","text":"#1b1c1e"}},"className":"productsec-heading","fontFamily":"josefin_sans"} -->
<h3 class="wp-block-heading has-text-align-left productsec-heading has-text-color has-background has-josefin-sans-font-family" style="color:#1b1c1e;background-color:#cce3e2;font-style:normal;font-weight:700;text-transform:capitalize"><?php esc_html_e('Latest Trending','lifestyle-store'); ?></h3>
<!-- /wp:heading -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained","contentSize":"90%"}} -->
<div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:query {"queryId":15,"query":{"perPage":9,"pages":0,"offset":0,"postType":"product","order":"asc","orderBy":"title","author":"","search":"","exclude":[],"sticky":"","inherit":false,"__woocommerceAttributes":[],"__woocommerceStockStatus":["instock","outofstock","onbackorder"]},"namespace":"woocommerce/product-query"} -->
<div class="wp-block-query"><!-- wp:post-template {"className":"products-block-post-template","layout":{"type":"grid","columnCount":4},"__woocommerceNamespace":"woocommerce/product-query/product-template"} -->
<!-- wp:group {"className":"wow flipInX","layout":{"type":"constrained"}} -->
<div class="wp-block-group wow flipInX"><!-- wp:woocommerce/product-image {"showSaleBadge":false,"imageSizing":"thumbnail","isDescendentOfQueryLoop":true} /-->

<!-- wp:post-title {"textAlign":"center","level":3,"isLink":true,"style":{"spacing":{"margin":{"bottom":"0.75rem","top":"0"}}},"fontSize":"medium","__woocommerceNamespace":"woocommerce/product-query/product-title"} /-->

<!-- wp:woocommerce/product-rating {"isDescendentOfQueryLoop":true,"textAlign":"center"} /-->

<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"center"} /-->

<!-- wp:woocommerce/product-button {"textAlign":"center","width":100,"isDescendentOfQueryLoop":true,"fontSize":"small"} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"center"}} -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p><?php esc_html_e('No Products Found','lifestyle-store'); ?></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->