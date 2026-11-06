<?php
/**
 * Title: Latest news grid
 * Slug: manzar-news/latest-news
 * Categories: manzar-news
 * Inserter: yes
 */
?>
<!-- wp:group {"tagName":"div","layout":{"type":"default"},"className":"manzar-section"} -->
<div class="wp-block-group manzar-section"><!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">تازہ ترین خبریں</h2>
<!-- /wp:heading --><!-- wp:query {"queryId":9,"query":{"perPage":9,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"className":"manzar-news-grid "} -->
<div class="wp-block-query manzar-news-grid "><!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/10","sizeSlug":"large"} /--><!-- wp:group {"tagName":"div","layout":{"type":"default"},"className":"manzar-card-copy"} -->
<div class="wp-block-group manzar-card-copy"><!-- wp:post-terms {"term":"category"} /--><!-- wp:post-title {"isLink":true,"level":3} /--><!-- wp:post-date {"format":"j F Y"} /--><!-- wp:post-excerpt {"moreText":"مزید پڑھیں","excerptLength":22} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template --><!-- wp:query-no-results -->
<!-- wp:paragraph -->
<p>اس حصے میں ابھی کوئی خبر شائع نہیں ہوئی۔</p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --><!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"center"}} -->
<!-- wp:query-pagination-previous {"label":"پچھلا صفحہ"} /--><!-- wp:query-pagination-numbers /--><!-- wp:query-pagination-next {"label":"اگلا صفحہ"} /-->
<!-- /wp:query-pagination --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->
