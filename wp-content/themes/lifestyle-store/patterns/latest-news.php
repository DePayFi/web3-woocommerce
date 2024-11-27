<?php
/**
 * Title: Latest News
 * Slug: lifestyle-store/latest-news
 * Categories: lifestyle-store, latest-news
 */
?>

<!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"textTransform":"capitalize","fontStyle":"normal","fontWeight":"700"},"color":{"text":"#1b1c1e"}},"backgroundColor":"secondary","className":"productsec-heading","fontFamily":"josefin_sans"} -->
<h3 class="wp-block-heading has-text-align-left productsec-heading has-secondary-background-color has-text-color has-background has-josefin-sans-font-family" style="color:#1b1c1e;font-style:normal;font-weight:700;text-transform:capitalize"><?php esc_html_e('Recent News','lifestyle-store'); ?></h3>
<!-- /wp:heading -->

<!-- wp:group {"align":"wide","backgroundColor":"secondary","className":"recent-news-group","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide recent-news-group has-secondary-background-color has-background"><!-- wp:query {"queryId":3,"query":{"perPage":3,"pages":"1","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"white","className":"wow swing","layout":{"type":"constrained"}} -->
<div class="wp-block-group wow swing has-white-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:post-featured-image /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--30)"><!-- wp:post-date {"textAlign":"center","format":"M j, Y"} /-->

<!-- wp:post-title {"textAlign":"center","level":5,"isLink":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.2"}},"fontSize":"regular","fontFamily":"josefin_sans"} /-->

<!-- wp:post-excerpt {"textAlign":"center","moreText":"","showMoreOnNewLine":false,"excerptLength":10,"fontFamily":"merriweather"} /-->

<!-- wp:read-more {"style":{"elements":{"link":{"color":{"text":"#10c4ba"}}},"color":{"text":"#10c4ba"}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results.","fontFamily":"merriweather"} -->
<p class="has-merriweather-font-family"><?php esc_html_e('There is no post found','lifestyle-store'); ?></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->