<?php
/**
 * Title: Blog page
 * Slug: page-blog
 * Description: 
 * Categories: foodie-blocks-query, foodie-blocks-page
 * Keywords: 
 * Viewport Width: 1280
 * Block Types: 
 * Post Types: 
 * Inserter: true
 */

?>
<!-- wp:group {"tagName":"main","align":"full","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"backgroundColor":"background","className":"site-content","layout":{"type":"constrained"}} -->
<main class="wp-block-group alignfull site-content has-background-background-color has-background" style="margin-top:0;padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large)"><!-- wp:group {"className":"is-style-default","layout":{"type":"default"}} -->
<div class="wp-block-group is-style-default"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"top","width":"30%","layout":{"type":"default"}} -->
<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:30%"><!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">Blog</h1>
<!-- /wp:heading --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></main>
<!-- /wp:group -->

<!-- wp:spacer {"height":"64px"} -->
<div style="height:64px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"66.66%"} -->
<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:group {"style":{"spacing":{"blockGap":"15px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"left","level":3} -->
<h3 class="wp-block-heading has-text-align-left">Latest posts</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:query {"queryId":4,"query":{"perPage":"6","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[]},"displayLayout":{"type":"list","columns":2},"layout":{"type":"default"}} -->
<div class="wp-block-query"><!-- wp:post-template -->
<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"40%"} -->
<div class="wp-block-column" style="flex-basis:40%"><!-- wp:post-featured-image {"isLink":true,"width":"100%","height":"300px","style":{"border":{"radius":"5px"}}} /--></div>
<!-- /wp:column -->

<!-- wp:column {"width":""} -->
<div class="wp-block-column"><!-- wp:group {"layout":{"type":"constrained","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|x-small"}},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left"}} -->
<div class="wp-block-group has-link-color" style="margin-bottom:var(--wp--preset--spacing--x-small)"><!-- wp:post-terms {"term":"category"} /-->

<!-- wp:paragraph {"textColor":"lightgrey"} -->
<p class="has-lightgrey-color has-text-color">✦</p>
<!-- /wp:paragraph -->

<!-- wp:post-date /--></div>
<!-- /wp:group -->

<!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"fontSize":"large"} /-->

<!-- wp:post-excerpt /-->

<!-- wp:read-more {"content":"\u003cstrong\u003eRead more → \u003c/strong\u003e\u003ca role=\u0022document\u0022 aria-multiline=\u0022true\u0022 aria-label=\u0022Block: Read More\u0022 tabindex=\u00220\u0022 class=\u0022block-editor-rich-text__editable block-editor-block-list__block wp-block has-secondary-color has-white-background-color has-text-color has-background is-selected remove-outline wp-block-read-more rich-text\u0022 id=\u0022block-63cbfbfd-f8d4-4a03-ae54-d3f75e0a05bb\u0022 data-block=\u002263cbfbfd-f8d4-4a03-ae54-d3f75e0a05bb\u0022 data-title=\u0022Read More\u0022 style=\u0022font-family: var(\u002d\u002dwp\u002d\u002dpreset\u002d\u002dfont-family\u002d\u002dinter); font-size: var(\u002d\u002dwp\u002d\u002dpreset\u002d\u002dfont-size\u002d\u002dsmall); font-weight: var(\u002d\u002dwp\u002d\u002dcustom\u002d\u002dfont-weight\u002d\u002dregular); min-width: 1px; padding: 0px; background-color: rgb(255, 255, 255); color: rgb(238, 119, 29); display: inline !important;\u0022 data-type=\u0022core/read-more\u0022\u003e\u003c/a\u003e","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"backgroundColor":"white","textColor":"secondary"} /-->

<!-- wp:spacer {"height":"40px"} -->
<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results -->

<!-- wp:query-pagination {"paginationArrow":"chevron","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"},"fontSize":"medium"} -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination --></div>
<!-- /wp:query --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"33.33%"} -->
<div class="wp-block-column" style="flex-basis:33.33%"><!-- wp:template-part {"slug":"sidebar","theme":"foodie-blocks","area":"uncategorized"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"120px"} -->
<div style="height:120px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->
