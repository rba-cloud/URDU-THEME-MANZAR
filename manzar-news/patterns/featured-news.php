<?php
/**
 * Title: Lead story and secondary news
 * Slug: manzar-news/featured-news
 * Categories: manzar-news
 * Inserter: yes
 */
?>
<!-- wp:group {"tagName":"div","layout":{"type":"default"},"className":"manzar-section"} -->
<div class="wp-block-group manzar-section"><!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">آج کی اہم خبریں</h2>
<!-- /wp:heading --><!-- wp:group {"tagName":"div","layout":{"type":"grid","columnCount":2},"className":"manzar-featured"} -->
<div class="wp-block-group manzar-featured"><!-- wp:query {"queryId":1,"query":{"perPage":1,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"className":"manzar-news-grid manzar-lead"} -->
<div class="wp-block-query manzar-news-grid manzar-lead"><!-- wp:post-template {"layout":{"type":"grid","columnCount":1}} -->
<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/10","sizeSlug":"large"} /--><!-- wp:group {"tagName":"div","layout":{"type":"default"},"className":"manzar-card-copy"} -->
<div class="wp-block-group manzar-card-copy"><!-- wp:post-terms {"term":"category"} /--><!-- wp:post-title {"isLink":true,"level":3} /--><!-- wp:post-date {"format":"j F Y"} /--><!-- wp:post-excerpt {"moreText":"مزید پڑھیں","excerptLength":22} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template --><!-- wp:query-no-results -->
<!-- wp:paragraph -->
<p>اس حصے میں ابھی کوئی خبر شائع نہیں ہوئی۔</p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --><!-- wp:query {"queryId":5,"query":{"perPage":4,"pages":0,"offset":1,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"className":"manzar-news-grid manzar-secondary"} -->
<div class="wp-block-query manzar-news-grid manzar-secondary"><!-- wp:post-template {"layout":{"type":"grid","columnCount":2}} -->
<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/10","sizeSlug":"large"} /--><!-- wp:group {"tagName":"div","layout":{"type":"default"},"className":"manzar-card-copy"} -->
<div class="wp-block-group manzar-card-copy"><!-- wp:post-terms {"term":"category"} /--><!-- wp:post-title {"isLink":true,"level":3} /--><!-- wp:post-date {"format":"j F Y"} /--><!-- wp:post-excerpt {"moreText":"مزید پڑھیں","excerptLength":22} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template --><!-- wp:query-no-results -->
<!-- wp:paragraph -->
<p>اس حصے میں ابھی کوئی خبر شائع نہیں ہوئی۔</p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
