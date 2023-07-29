<?php
/**
 * Title: Footer
 * Slug: footer
 * Description: 
 * Categories: foodie-blocks-footer
 * Keywords: 
 * Viewport Width: 1280
 * Block Types: core/template-part/footer
 * Post Types: wp_template
 * Inserter: true
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"40px","bottom":"40px"},"margin":{"top":"0px"}}},"backgroundColor":"background","layout":{"type":"constrained"},"fontSize":"small"} -->
<div class="wp-block-group alignfull has-background-background-color has-background has-small-font-size" style="margin-top:0px;padding-top:40px;padding-bottom:40px"><!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:site-title {"level":3,"textAlign":"center"} /-->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Discover new flavours and cuisines with us.</p>
<!-- /wp:paragraph -->

<!-- wp:social-links {"iconColor":"secondary","iconColorValue":"#121738","size":"has-normal-icon-size","align":"center","style":{"spacing":{"blockGap":{"top":"0px","left":"33px"},"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"className":"is-style-logos-only wpz-hide-mobile","layout":{"type":"flex","justifyContent":"center"}} -->
<ul class="wp-block-social-links aligncenter has-normal-icon-size has-icon-color is-style-logos-only wpz-hide-mobile" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"instagram"} /-->

<!-- wp:social-link {"url":"#","service":"youtube"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"50px"} -->
<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:navigation {"overlayMenu":"never","layout":{"type":"flex","orientation":"horizontal","justifyContent":"center"},"style":{"spacing":{}}} --><!-- wp:page-list /--><!-- /wp:navigation -->

<!-- wp:spacer {"height":"50px"} -->
<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:separator {"backgroundColor":"primary","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-primary-color has-alpha-channel-opacity has-primary-background-color has-background is-style-wide"/>
<!-- /wp:separator -->

<!-- wp:group {"layout":{"type":"flex","allowOrientation":false,"justifyContent":"space-between","flexWrap":"wrap"}} -->
<div class="wp-block-group"><!-- wp:paragraph -->
<p>Copyright © <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo get_bloginfo( 'name' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}}} -->
<p class="has-link-color">Designed by <a rel="noreferrer noopener" href="https://www.wpzoom.com" data-type="URL" data-id="https://www.wpzoom.com" target="_blank">WPZOOM</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
