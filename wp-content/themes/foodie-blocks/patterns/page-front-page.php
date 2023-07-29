<?php
/**
 * Title: Homepage
 * Slug: page-front-page
 * Description: 
 * Categories: foodie-blocks-page
 * Keywords: 
 * Viewport Width: 1280
 * Block Types: 
 * Post Types: 
 * Inserter: true
 */

?>
<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|small"},"margin":{"top":"0px"}}},"layout":{"type":"constrained"}} -->
<div id="trending-recipes" class="wp-block-group" style="margin-top:0px;padding-bottom:var(--wp--preset--spacing--small)"><!-- wp:separator {"backgroundColor":"lightgrey","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-lightgrey-color has-alpha-channel-opacity has-lightgrey-background-color has-background is-style-wide"/>
<!-- /wp:separator -->

<!-- wp:spacer {"height":"37px"} -->
<div style="height:37px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"15px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:outermost/icon-block {"iconName":"","itemsJustification":"left","width":"36px"} -->
<div class="wp-block-outermost-icon-block items-justified-left"><div class="icon-container" style="width:36px"><svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg"><mask id="mask0_3300_3021" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="36" height="36"><rect width="36" height="36" fill="#D9D9D9"></rect></mask><g mask="url(#mask0_3300_3021)"><path d="M9 21C9 22.3 9.2625 23.531 9.7875 24.693C10.3125 25.856 11.0625 26.875 12.0375 27.75C12.0125 27.625 12 27.5125 12 27.4125V27.075C12 26.275 12.15 25.525 12.45 24.825C12.75 24.125 13.1875 23.4875 13.7625 22.9125L18 18.75L22.2375 22.9125C22.8125 23.4875 23.25 24.125 23.55 24.825C23.85 25.525 24 26.275 24 27.075V27.4125C24 27.5125 23.9875 27.625 23.9625 27.75C24.9375 26.875 25.6875 25.856 26.2125 24.693C26.7375 23.531 27 22.3 27 21C27 19.75 26.769 18.5685 26.307 17.4555C25.844 16.3435 25.175 15.35 24.3 14.475C23.8 14.8 23.275 15.0435 22.725 15.2055C22.175 15.3685 21.6125 15.45 21.0375 15.45C19.4875 15.45 18.144 14.9375 17.007 13.9125C15.869 12.8875 15.2125 11.625 15.0375 10.125C14.0625 10.95 13.2 11.806 12.45 12.693C11.7 13.581 11.069 14.481 10.557 15.393C10.044 16.306 9.6565 17.2375 9.3945 18.1875C9.1315 19.1375 9 20.075 9 21ZM18 22.95L15.8625 25.05C15.5875 25.325 15.375 25.6375 15.225 25.9875C15.075 26.3375 15 26.7 15 27.075C15 27.875 15.294 28.5625 15.882 29.1375C16.469 29.7125 17.175 30 18 30C18.825 30 19.5315 29.7125 20.1195 29.1375C20.7065 28.5625 21 27.875 21 27.075C21 26.675 20.925 26.306 20.775 25.968C20.625 25.631 20.4125 25.325 20.1375 25.05L18 22.95ZM18 4.5V9.45C18 10.3 18.294 11.0125 18.882 11.5875C19.469 12.1625 20.1875 12.45 21.0375 12.45C21.4875 12.45 21.9065 12.3565 22.2945 12.1695C22.6815 11.9815 23.025 11.7 23.325 11.325L24 10.5C25.85 11.55 27.3125 13.0125 28.3875 14.8875C29.4625 16.7625 30 18.8 30 21C30 24.35 28.8375 27.1875 26.5125 29.5125C24.1875 31.8375 21.35 33 18 33C14.65 33 11.8125 31.8375 9.4875 29.5125C7.1625 27.1875 6 24.35 6 21C6 17.775 7.0815 14.7125 9.2445 11.8125C11.4065 8.9125 14.325 6.475 18 4.5Z" fill="var(--wp--preset--color--primary)"></path></g></svg></div></div>
<!-- /wp:outermost/icon-block -->

<!-- wp:heading {"textAlign":"left","level":3} -->
<h3 class="wp-block-heading has-text-align-left">Trending recipes</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"35px"} -->
<div style="height:35px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:query {"queryId":14,"query":{"perPage":"4","pages":0,"offset":"0","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"displayLayout":{"type":"flex","columns":4}} -->
<div class="wp-block-query"><!-- wp:post-template -->
<!-- wp:group {"style":{"spacing":{"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:post-featured-image {"isLink":true,"width":"100%","height":"250px","style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}},"border":{"radius":"0px"}}} /-->

<!-- wp:post-terms {"term":"category","style":{"typography":{"fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"spacing":{"margin":{"top":"15px","right":"0px","bottom":"0px","left":"0px"}}},"textColor":"tertiary"} /-->

<!-- wp:post-title {"level":3,"isLink":true,"style":{"typography":{"fontSize":"22px"},"spacing":{"margin":{"top":"10px"}},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}}} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"backgroundColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background-background-color has-background" id="hero" style="padding-top:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small)"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:image {"id":6414,"width":166,"height":166,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/patterns/images/me.png" alt="" class="wp-image-6414" width="166" height="166"/></figure>
<!-- /wp:image -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:outermost/icon-block {"iconName":"","itemsJustification":"left","width":"30px"} -->
<div class="wp-block-outermost-icon-block items-justified-left"><div class="icon-container" style="width:30px"><svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg"><mask id="mask0_3308_3306" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="36" height="36"><rect width="36" height="36" fill="#D9D9D9"></rect></mask><g mask="url(#mask0_3308_3306)"><path d="M10.5 33V19.275C9.225 18.925 8.1565 18.225 7.2945 17.175C6.4315 16.125 6 14.9 6 13.5V3H9V13.5H10.5V3H13.5V13.5H15V3H18V13.5C18 14.9 17.5685 16.125 16.7055 17.175C15.8435 18.225 14.775 18.925 13.5 19.275V33H10.5ZM25.5 33V21H21V10.5C21 8.425 21.7315 6.6565 23.1945 5.1945C24.6565 3.7315 26.425 3 28.5 3V33H25.5Z" fill="var(--wp--preset--color--primary)"></path></g></svg></div></div>
<!-- /wp:outermost/icon-block -->

<!-- wp:spacer {"height":"20px"} -->
<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"align":"left","style":{"typography":{"fontSize":"24px"}}} -->
<p class="has-text-align-left" style="font-size:24px">Hi! I'm Margaret!</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"},"spacing":{"margin":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}}},"fontSize":"max-36","fontFamily":"cormorant-garamond"} -->
<h3 class="wp-block-heading has-text-align-left has-cormorant-garamond-font-family has-max-36-font-size" style="margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-style:normal;font-weight:700">I bring <em style="color:var(--wp--preset--color--primary)">flavour</em> to your <em style="color:var(--wp--preset--color--primary)">kitchen</em> with <em style="color:var(--wp--preset--color--primary)">easy</em> and <em style="color:var(--wp--preset--color--primary)">tasty recipes</em>!</h3>
<!-- /wp:heading -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#">Meet Margaret →</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|x-small"}}},"layout":{"type":"constrained"}} -->
<div id="latest-recipes" class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--x-small)"><!-- wp:spacer {"height":"51px"} -->
<div style="height:51px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"15px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:outermost/icon-block {"iconName":"","itemsJustification":"left","width":"36px"} -->
<div class="wp-block-outermost-icon-block items-justified-left"><div class="icon-container" style="width:36px"><svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg"><mask id="mask0_3157_2609" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="36" height="36"><rect width="36" height="36" fill="#D9D9D9"></rect></mask><g mask="url(#mask0_3157_2609)"><path d="M6.56094 31.5L4.46094 29.4L19.8359 14.025C19.3859 12.975 19.3234 11.7875 19.6484 10.4625C19.9734 9.1375 20.6859 7.95 21.7859 6.9C23.1109 5.575 24.5859 4.8 26.2109 4.575C27.8359 4.35 29.1609 4.75 30.1859 5.775C31.2109 6.8 31.6109 8.125 31.3859 9.75C31.1609 11.375 30.3859 12.85 29.0609 14.175C28.0109 15.275 26.8234 15.9875 25.4984 16.3125C24.1734 16.6375 22.9859 16.575 21.9359 16.125L20.0609 18L31.4609 29.4L29.3609 31.5L17.9609 20.175L6.56094 31.5ZM10.9859 18.675L6.48594 14.175C5.13594 12.825 4.46094 11.2125 4.46094 9.3375C4.46094 7.4625 5.13594 5.85 6.48594 4.5L15.7859 13.875L10.9859 18.675Z" fill="var(--wp--preset--color--primary)"></path></g></svg></div></div>
<!-- /wp:outermost/icon-block -->

<!-- wp:heading {"textAlign":"left","level":3} -->
<h3 class="wp-block-heading has-text-align-left">Latest recipes</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"50px"} -->
<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:query {"queryId":14,"query":{"perPage":"8","pages":"","offset":"","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"displayLayout":{"type":"flex","columns":4},"layout":{"type":"default"}} -->
<div class="wp-block-query"><!-- wp:post-template -->
<!-- wp:group {"style":{"spacing":{"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:post-featured-image {"isLink":true,"width":"100%","height":"200px","style":{"border":{"radius":"0px"}}} /-->

<!-- wp:post-terms {"term":"category","style":{"typography":{"fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"spacing":{"margin":{"right":"0px","bottom":"0px","left":"0px","top":"15px"}}},"textColor":"tertiary"} /-->

<!-- wp:post-title {"level":3,"isLink":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.3","fontSize":"18px"},"spacing":{"margin":{"top":"10px"}},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}}} /-->

<!-- wp:spacer {"height":"17px"} -->
<div style="height:17px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"color":{"background":"#fafafa"},"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large"},"blockGap":"0","margin":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-group alignfull has-background" id="search" style="background-color:#fafafa;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large)"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:columns {"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}}} -->
<div class="wp-block-columns has-link-color"><!-- wp:column {"width":"80%","style":{"spacing":{"padding":{"right":"var:preset|spacing|large"}}}} -->
<div class="wp-block-column" style="padding-right:var(--wp--preset--spacing--large);flex-basis:80%"><!-- wp:group {"style":{"spacing":{"blockGap":"15px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:outermost/icon-block {"iconName":"","itemsJustification":"left","width":"36px"} -->
<div class="wp-block-outermost-icon-block items-justified-left"><div class="icon-container" style="width:36px"><svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg"><mask id="mask0_3176_2580" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="36" height="36"><rect width="36" height="36" fill="#D9D9D9"></rect></mask><g mask="url(#mask0_3176_2580)"><path d="M29.4 31.5L19.95 22.05C19.2 22.65 18.3375 23.125 17.3625 23.475C16.3875 23.825 15.35 24 14.25 24C11.525 24 9.219 23.0565 7.332 21.1695C5.444 19.2815 4.5 16.975 4.5 14.25C4.5 11.525 5.444 9.2185 7.332 7.3305C9.219 5.4435 11.525 4.5 14.25 4.5C16.975 4.5 19.2815 5.4435 21.1695 7.3305C23.0565 9.2185 24 11.525 24 14.25C24 15.35 23.825 16.3875 23.475 17.3625C23.125 18.3375 22.65 19.2 22.05 19.95L31.5 29.4L29.4 31.5ZM14.25 21C16.125 21 17.719 20.344 19.032 19.032C20.344 17.719 21 16.125 21 14.25C21 12.375 20.344 10.781 19.032 9.468C17.719 8.156 16.125 7.5 14.25 7.5C12.375 7.5 10.781 8.156 9.468 9.468C8.156 10.781 7.5 12.375 7.5 14.25C7.5 16.125 8.156 17.719 9.468 19.032C10.781 20.344 12.375 21 14.25 21Z" fill="var(--wp--preset--color--primary)"></path></g></svg></div></div>
<!-- /wp:outermost/icon-block -->

<!-- wp:heading {"textAlign":"left","level":3} -->
<h3 class="wp-block-heading has-text-align-left">Quick search</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"align":"left","textColor":"tertiary"} -->
<p class="has-text-align-left has-tertiary-color has-text-color">This is a dummy copy. You’re not really supposed to read this dummy copy.</p>
<!-- /wp:paragraph -->

<!-- wp:search {"label":"","showLabel":false,"placeholder":"Search for anything","width":500,"buttonText":"Search","buttonUseIcon":true} /-->

<!-- wp:spacer {"height":"40px"} -->
<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}}} -->
<p style="font-style:normal;font-weight:500"><a href="#">View all recipe index   →</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"20%"} -->
<div class="wp-block-column" style="flex-basis:20%"><!-- wp:group {"style":{"spacing":{"blockGap":"15px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:outermost/icon-block {"iconName":"","width":"32px"} -->
<div class="wp-block-outermost-icon-block"><div class="icon-container" style="width:32px"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><mask id="mask0_3176_2608" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24"><rect width="24" height="24" fill="#D9D9D9"></rect></mask><g mask="url(#mask0_3176_2608)"><path d="M12 22L2 7C3.41667 5.8 4.971 4.83333 6.663 4.1C8.35433 3.36667 10.1333 3 12 3C13.8667 3 15.6457 3.36267 17.337 4.088C19.029 4.81267 20.5833 5.78333 22 7L12 22ZM12 18.4L19.3 7.45C18.2167 6.7 17.0583 6.104 15.825 5.662C14.5917 5.22067 13.3167 5 12 5C10.6833 5 9.41267 5.22067 8.188 5.662C6.96267 6.104 5.8 6.7 4.7 7.45L12 18.4ZM9.5 10C9.91667 10 10.2707 9.854 10.562 9.562C10.854 9.27067 11 8.91667 11 8.5C11 8.08333 10.854 7.72933 10.562 7.438C10.2707 7.146 9.91667 7 9.5 7C9.08333 7 8.72933 7.146 8.438 7.438C8.146 7.72933 8 8.08333 8 8.5C8 8.91667 8.146 9.27067 8.438 9.562C8.72933 9.854 9.08333 10 9.5 10ZM12 15C12.4167 15 12.7707 14.854 13.062 14.562C13.354 14.2707 13.5 13.9167 13.5 13.5C13.5 13.0833 13.354 12.7293 13.062 12.438C12.7707 12.146 12.4167 12 12 12C11.5833 12 11.2293 12.146 10.938 12.438C10.646 12.7293 10.5 13.0833 10.5 13.5C10.5 13.9167 10.646 14.2707 10.938 14.562C11.2293 14.854 11.5833 15 12 15Z" fill="var(--wp--preset--color--primary)"></path></g></svg></div></div>
<!-- /wp:outermost/icon-block -->

<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"medium"} -->
<p class="has-medium-font-size" style="font-style:normal;font-weight:500"><a href="#">Pizza</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"15px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:outermost/icon-block {"iconName":"","width":"32px"} -->
<div class="wp-block-outermost-icon-block"><div class="icon-container" style="width:32px"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><mask id="mask0_3176_2618" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24"><rect width="24" height="24" fill="#D9D9D9"></rect></mask><g mask="url(#mask0_3176_2618)"><path d="M10 20H14V18.9L15.25 18.4C16.3333 17.9667 17.2543 17.3623 18.013 16.587C18.771 15.8123 19.3167 14.95 19.65 14H4.35C4.68333 14.95 5.225 15.8123 5.975 16.587C6.725 17.3623 7.65 17.9667 8.75 18.4L10 18.9V20ZM8 22V20.25C6.21667 19.55 4.771 18.4667 3.663 17C2.55433 15.5333 2 13.8667 2 12H4V4L22 2V3.5L10.5 4.8V6.5H22V8H10.5V12H22C22 13.8667 21.4457 15.5333 20.337 17C19.229 18.4667 17.7833 19.55 16 20.25V22H8ZM8 6.5H9V4.95L8 5.05V6.5ZM5.5 6.5H6.5V5.25L5.5 5.35V6.5ZM8 12H9V8H8V12ZM5.5 12H6.5V8H5.5V12Z" fill="var(--wp--preset--color--primary)"></path></g></svg></div></div>
<!-- /wp:outermost/icon-block -->

<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"medium"} -->
<p class="has-medium-font-size" style="font-style:normal;font-weight:500"><a href="#">Ramen</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"15px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:outermost/icon-block {"iconName":"","width":"32px"} -->
<div class="wp-block-outermost-icon-block"><div class="icon-container" style="width:32px"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><mask id="mask0_3176_2628" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24"><rect width="24" height="24" fill="#D9D9D9"></rect></mask><g mask="url(#mask0_3176_2628)"><path d="M3 15C2.43333 15 1.95833 14.8083 1.575 14.425C1.19167 14.0417 1 13.5667 1 13V4C1 3.45 1.19167 2.979 1.575 2.587C1.95833 2.19567 2.43333 2 3 2H21C21.55 2 22.021 2.19567 22.413 2.587C22.8043 2.979 23 3.45 23 4V13C23 13.5667 22.8043 14.0417 22.413 14.425C22.021 14.8083 21.55 15 21 15H3ZM3 13H21V4H3V13ZM3.075 18.5L3 17L20.975 16.05L21.05 17.55L3.075 18.5ZM3 20.975V19.475H21V20.975H3ZM10.25 11.5C11.4833 11.5 12.6707 11.2833 13.812 10.85C14.954 10.4167 15.95 9.75 16.8 8.85C16.9 9.56667 17.2667 10.104 17.9 10.462C18.5333 10.8207 19.2333 11 20 11V6C19.2333 6 18.5333 6.19167 17.9 6.575C17.2667 6.95833 16.9 7.5 16.8 8.2C15.9167 7.33333 14.9127 6.66667 13.788 6.2C12.6627 5.73333 11.4833 5.5 10.25 5.5C8.93333 5.5 7.66667 5.73333 6.45 6.2C5.23333 6.66667 4.25 7.43333 3.5 8.5C4.25 9.58333 5.23333 10.354 6.45 10.812C7.66667 11.2707 8.93333 11.5 10.25 11.5Z" fill="var(--wp--preset--color--primary)"></path></g></svg></div></div>
<!-- /wp:outermost/icon-block -->

<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"medium"} -->
<p class="has-medium-font-size" style="font-style:normal;font-weight:500"><a href="#">Fish</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"54px"} -->
<div style="height:54px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}}} -->
<p style="font-style:normal;font-weight:500"><a href="#">View all categories   →</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"20%"} -->
<div class="wp-block-column" style="flex-basis:20%"><!-- wp:group {"style":{"spacing":{"blockGap":"15px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:outermost/icon-block {"iconName":"","width":"32px"} -->
<div class="wp-block-outermost-icon-block"><div class="icon-container" style="width:32px"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><mask id="mask0_3611_3580" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24"><rect width="24" height="24" fill="#D9D9D9"></rect></mask><g mask="url(#mask0_3611_3580)"><path d="M6 21C5.45 21 4.97933 20.8043 4.588 20.413C4.196 20.021 4 19.55 4 19V10.45C3.38333 10.0833 2.896 9.59567 2.538 8.987C2.17933 8.379 2 7.71667 2 7C2 5.9 2.39167 4.95833 3.175 4.175C3.95833 3.39167 4.9 3 6 3H18C19.1 3 20.0417 3.39167 20.825 4.175C21.6083 4.95833 22 5.9 22 7C22 7.71667 21.8207 8.379 21.462 8.987C21.104 9.59567 20.6167 10.0833 20 10.45V19C20 19.55 19.8043 20.021 19.413 20.413C19.021 20.8043 18.55 21 18 21H6ZM6 19H18V9.3L19 8.7C19.3 8.51667 19.5417 8.275 19.725 7.975C19.9083 7.675 20 7.35 20 7C20 6.45 19.8043 5.97933 19.413 5.588C19.021 5.196 18.55 5 18 5H6C5.45 5 4.97933 5.196 4.588 5.588C4.196 5.97933 4 6.45 4 7C4 7.36667 4.08767 7.704 4.263 8.012C4.43767 8.32067 4.68333 8.56667 5 8.75L6 9.3V19ZM11.3 16.7C11.5 16.8833 11.7377 16.975 12.013 16.975C12.2877 16.975 12.5167 16.8833 12.7 16.7L15.7 13.7C15.9 13.5 16 13.2623 16 12.987C16 12.7123 15.9 12.4833 15.7 12.3L12.7 9.3C12.5167 9.1 12.2877 9 12.013 9C11.7377 9 11.5 9.1 11.3 9.3L8.3 12.3C8.11667 12.4833 8.025 12.7123 8.025 12.987C8.025 13.2623 8.11667 13.5 8.3 13.7L11.3 16.7ZM12 14.6L10.4 13L12 11.4L13.6 13L12 14.6Z" fill="var(--wp--preset--color--primary)"></path></g></svg></div></div>
<!-- /wp:outermost/icon-block -->

<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"medium"} -->
<p class="has-medium-font-size" style="font-style:normal;font-weight:500"><a href="#">Breakfast</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"15px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:outermost/icon-block {"iconName":"","width":"32px"} -->
<div class="wp-block-outermost-icon-block"><div class="icon-container" style="width:32px"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><mask id="mask0_3176_2652" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24"><rect width="24" height="24" fill="#D9D9D9"></rect></mask><g mask="url(#mask0_3176_2652)"><path d="M2 10V9C2 7.08333 2.90433 5.604 4.713 4.562C6.521 3.52067 8.95 3 12 3C15.05 3 17.4793 3.52067 19.288 4.562C21.096 5.604 22 7.08333 22 9V10H2ZM4.15 8H19.85C19.4667 7.03333 18.5793 6.29167 17.188 5.775C15.796 5.25833 14.0667 5 12 5C9.93333 5 8.204 5.25833 6.812 5.775C5.42067 6.29167 4.53333 7.03333 4.15 8ZM2 14.5V12.5C2.6 12.5 3.075 12.3333 3.425 12C3.775 11.6667 4.41667 11.5 5.35 11.5C6.28333 11.5 6.91667 11.6667 7.25 12C7.58333 12.3333 8.05 12.5 8.65 12.5C9.25 12.5 9.725 12.3333 10.075 12C10.425 11.6667 11.0667 11.5 12 11.5C12.9333 11.5 13.575 11.6667 13.925 12C14.275 12.3333 14.75 12.5 15.35 12.5C15.95 12.5 16.4167 12.3333 16.75 12C17.0833 11.6667 17.7167 11.5 18.65 11.5C19.5833 11.5 20.2417 11.6667 20.625 12C21.0083 12.3333 21.4667 12.5 22 12.5V14.5C21.0667 14.5 20.4417 14.3333 20.125 14C19.8083 13.6667 19.35 13.5 18.75 13.5C18.15 13.5 17.6667 13.6667 17.3 14C16.9333 14.3333 16.2833 14.5 15.35 14.5C14.4167 14.5 13.775 14.3333 13.425 14C13.075 13.6667 12.6 13.5 12 13.5C11.4 13.5 10.925 13.6667 10.575 14C10.225 14.3333 9.58333 14.5 8.65 14.5C7.71667 14.5 7.08333 14.3333 6.75 14C6.41667 13.6667 5.95 13.5 5.35 13.5C4.75 13.5 4.275 13.6667 3.925 14C3.575 14.3333 2.93333 14.5 2 14.5ZM4 21C3.45 21 2.97933 20.8043 2.588 20.413C2.196 20.021 2 19.55 2 19V16H22V19C22 19.55 21.8043 20.021 21.413 20.413C21.021 20.8043 20.55 21 20 21H4ZM4 19H20V18H4V19Z" fill="var(--wp--preset--color--primary)"></path></g></svg></div></div>
<!-- /wp:outermost/icon-block -->

<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"medium"} -->
<p class="has-medium-font-size" style="font-style:normal;font-weight:500"><a href="#">Burger</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"15px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:outermost/icon-block {"iconName":"","width":"32px"} -->
<div class="wp-block-outermost-icon-block"><div class="icon-container" style="width:32px"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><mask id="mask0_3176_2658" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24"><rect width="24" height="24" fill="#D9D9D9"></rect></mask><g mask="url(#mask0_3176_2658)"><path d="M6 21V19H11V14L3 5V3H21V5L13 14V19H18V21H6ZM7.45 7H16.55L18.35 5H5.65L7.45 7ZM12 12.1L14.775 9H9.225L12 12.1Z" fill="var(--wp--preset--color--primary)"></path></g></svg></div></div>
<!-- /wp:outermost/icon-block -->

<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"medium"} -->
<p class="has-medium-font-size" style="font-style:normal;font-weight:500"><a href="#">Cocktail</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|x-large"}}},"layout":{"type":"constrained"}} -->
<div id="dinner-recipes" class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--x-large)"><!-- wp:spacer {"height":"73px"} -->
<div style="height:73px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"15px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:outermost/icon-block {"iconName":"","itemsJustification":"left","width":"36px"} -->
<div class="wp-block-outermost-icon-block items-justified-left"><div class="icon-container" style="width:36px"><svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg"><mask id="mask0_3167_2773" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="36" height="36"><rect width="36" height="36" fill="#D9D9D9"></rect></mask><g mask="url(#mask0_3167_2773)"><path d="M6 31.5L3 28.5H33L30 31.5H6ZM4.5 27C4.65 26.55 4.85 26.125 5.1 25.725C5.35 25.325 5.65 24.95 6 24.6V13.5H4.5V11.25H6V10.125H4.5V7.875H6V6.75H4.5V4.5H14.625C15.575 4.5 16.375 4.825 17.025 5.475C17.675 6.125 18 6.925 18 7.875H31.5V10.125H18C18 11.075 17.675 11.875 17.025 12.525C16.375 13.175 15.575 13.5 14.625 13.5H12V22.65C12.375 22.7 12.7315 22.775 13.0695 22.875C13.4065 22.975 13.725 23.125 14.025 23.325C14.625 21.775 15.619 20.5 17.007 19.5C18.394 18.5 19.975 18 21.75 18C24.175 18 26.2 18.8875 27.825 20.6625C29.45 22.4375 30.15 24.55 29.925 27H4.5ZM17.025 24H26.475C26.025 23.05 25.3875 22.3125 24.5625 21.7875C23.7375 21.2625 22.8 21 21.75 21C20.725 21 19.7875 21.275 18.9375 21.825C18.0875 22.375 17.45 23.1 17.025 24ZM12 7.875H15V6.75H12V7.875ZM12 11.25H15V10.125H12V11.25ZM8.25 7.875H9.75V6.75H8.25V7.875ZM8.25 11.25H9.75V10.125H8.25V11.25ZM8.25 23.025C8.475 22.9 8.7125 22.806 8.9625 22.743C9.2125 22.681 9.475 22.625 9.75 22.575V13.5H8.25V23.025Z" fill="var(--wp--preset--color--primary)"></path></g></svg></div></div>
<!-- /wp:outermost/icon-block -->

<!-- wp:heading {"textAlign":"left","level":3} -->
<h3 class="wp-block-heading has-text-align-left">Mains</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"textColor":"tertiary"} -->
<p class="has-tertiary-color has-text-color">This is some dummy copy. You’re not really supposed to read this dummy copy, it is just a place holder for people who need some type to visualize what the actual copy might look like if it were real content.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}}} -->
<p class="has-link-color" style="font-style:normal;font-weight:500"><a href="#">View all dinner recipes   →</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"50px"} -->
<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:query {"queryId":14,"query":{"perPage":"8","pages":"","offset":"","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false,"taxQuery":{"category":[65,66,67]}},"displayLayout":{"type":"flex","columns":4},"layout":{"type":"default"}} -->
<div class="wp-block-query"><!-- wp:post-template -->
<!-- wp:group {"style":{"spacing":{"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:post-featured-image {"isLink":true,"width":"100%","height":"180px","style":{"border":{"radius":"0px"}}} /-->

<!-- wp:post-terms {"term":"category","style":{"typography":{"fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"spacing":{"margin":{"right":"0px","bottom":"0px","left":"0px","top":"15px"}}},"textColor":"tertiary"} /-->

<!-- wp:post-title {"level":4,"isLink":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.3","fontSize":"18px"},"spacing":{"margin":{"top":"10px"}},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}}} /-->

<!-- wp:spacer {"height":"40px"} -->
<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"color":{"background":"#fafafa"},"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large"}}}} -->
<div class="wp-block-group alignfull has-background" id="categories" style="background-color:#fafafa;padding-top:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large)"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"15px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:outermost/icon-block {"iconName":"","itemsJustification":"left","width":"36px"} -->
<div class="wp-block-outermost-icon-block items-justified-left"><div class="icon-container" style="width:36px"><svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg"><mask id="mask0_3166_2689" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="36" height="36"><rect width="36" height="36" fill="#D9D9D9"></rect></mask><g mask="url(#mask0_3166_2689)"><path d="M21 14.85V12.3C21.825 11.95 22.669 11.6875 23.532 11.5125C24.394 11.3375 25.3 11.25 26.25 11.25C26.9 11.25 27.5375 11.3 28.1625 11.4C28.7875 11.5 29.4 11.625 30 11.775V14.175C29.4 13.95 28.794 13.7815 28.182 13.6695C27.569 13.5565 26.925 13.5 26.25 13.5C25.3 13.5 24.3875 13.619 23.5125 13.857C22.6375 14.094 21.8 14.425 21 14.85ZM21 23.1V20.55C21.825 20.2 22.669 19.9375 23.532 19.7625C24.394 19.5875 25.3 19.5 26.25 19.5C26.9 19.5 27.5375 19.55 28.1625 19.65C28.7875 19.75 29.4 19.875 30 20.025V22.425C29.4 22.2 28.794 22.0315 28.182 21.9195C27.569 21.8065 26.925 21.75 26.25 21.75C25.3 21.75 24.3875 21.8625 23.5125 22.0875C22.6375 22.3125 21.8 22.65 21 23.1ZM21 18.975V16.425C21.825 16.075 22.669 15.8125 23.532 15.6375C24.394 15.4625 25.3 15.375 26.25 15.375C26.9 15.375 27.5375 15.425 28.1625 15.525C28.7875 15.625 29.4 15.75 30 15.9V18.3C29.4 18.075 28.794 17.9065 28.182 17.7945C27.569 17.6815 26.925 17.625 26.25 17.625C25.3 17.625 24.3875 17.744 23.5125 17.982C22.6375 18.219 21.8 18.55 21 18.975ZM9.75 24C10.925 24 12.069 24.131 13.182 24.393C14.294 24.656 15.4 25.05 16.5 25.575V10.8C15.475 10.2 14.3875 9.75 13.2375 9.45C12.0875 9.15 10.925 9 9.75 9C8.85 9 7.9565 9.0875 7.0695 9.2625C6.1815 9.4375 5.325 9.7 4.5 10.05V24.9C5.375 24.6 6.244 24.375 7.107 24.225C7.969 24.075 8.85 24 9.75 24ZM19.5 25.575C20.6 25.05 21.7065 24.656 22.8195 24.393C23.9315 24.131 25.075 24 26.25 24C27.15 24 28.0315 24.075 28.8945 24.225C29.7565 24.375 30.625 24.6 31.5 24.9V10.05C30.675 9.7 29.819 9.4375 28.932 9.2625C28.044 9.0875 27.15 9 26.25 9C25.075 9 23.9125 9.15 22.7625 9.45C21.6125 9.75 20.525 10.2 19.5 10.8V25.575ZM18 30C16.8 29.05 15.5 28.3125 14.1 27.7875C12.7 27.2625 11.25 27 9.75 27C8.7 27 7.669 27.1375 6.657 27.4125C5.644 27.6875 4.675 28.075 3.75 28.575C3.225 28.85 2.719 28.8375 2.232 28.5375C1.744 28.2375 1.5 27.8 1.5 27.225V9.15C1.5 8.875 1.569 8.6125 1.707 8.3625C1.844 8.1125 2.05 7.925 2.325 7.8C3.475 7.2 4.675 6.75 5.925 6.45C7.175 6.15 8.45 6 9.75 6C11.2 6 12.619 6.1875 14.007 6.5625C15.394 6.9375 16.725 7.5 18 8.25C19.275 7.5 20.6065 6.9375 21.9945 6.5625C23.3815 6.1875 24.8 6 26.25 6C27.55 6 28.825 6.15 30.075 6.45C31.325 6.75 32.525 7.2 33.675 7.8C33.95 7.925 34.1565 8.1125 34.2945 8.3625C34.4315 8.6125 34.5 8.875 34.5 9.15V27.225C34.5 27.8 34.2565 28.2375 33.7695 28.5375C33.2815 28.8375 32.775 28.85 32.25 28.575C31.325 28.075 30.356 27.6875 29.343 27.4125C28.331 27.1375 27.3 27 26.25 27C24.75 27 23.3 27.2625 21.9 27.7875C20.5 28.3125 19.2 29.05 18 30Z" fill="var(--wp--preset--color--primary)"></path></g></svg></div></div>
<!-- /wp:outermost/icon-block -->

<!-- wp:heading {"textAlign":"left","level":3} -->
<h3 class="wp-block-heading has-text-align-left">Browse categories</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"80px"} -->
<div style="height:80px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"left","style":{"typography":{"fontSize":"24px","fontStyle":"normal","fontWeight":"500"}}} -->
<p class="has-text-align-left" style="font-size:24px;font-style:normal;font-weight:500">Main ingredient</p>
<!-- /wp:paragraph -->

<!-- wp:separator {"backgroundColor":"tertiary","className":"is-style-default"} -->
<hr class="wp-block-separator has-text-color has-tertiary-color has-alpha-channel-opacity has-tertiary-background-color has-background is-style-default"/>
<!-- /wp:separator --></div>
<!-- /wp:group -->

<!-- wp:columns {"className":"eplus-wrapper"} -->
<div class="wp-block-columns eplus-wrapper"><!-- wp:column {"width":"","className":"eplus-wrapper"} -->
<div class="wp-block-column eplus-wrapper"><!-- wp:cover {"url":"<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/patterns/images/foodiesfeed.com_lemon-basil-sponge-cake.jpg","id":5805,"dimRatio":50,"minHeight":380,"minHeightUnit":"px","isDark":false,"className":"is-style-editorskit-rounded eplus-wrapper is-style-round-corners","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|x-small","left":"30px"}}}} -->
<div class="wp-block-cover is-light is-style-editorskit-rounded eplus-wrapper is-style-round-corners" style="padding-bottom:var(--wp--preset--spacing--x-small);padding-left:30px;min-height:380px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-5805" alt="" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/patterns/images/foodiesfeed.com_lemon-basil-sponge-cake.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:spacer {"height":"296px"} -->
<div style="height:296px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"textAlign":"left","level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white","className":"eplus-wrapper"} -->
<h4 class="wp-block-heading has-text-align-left eplus-wrapper has-white-color has-text-color has-link-color"><strong><a href="#">Desserts</a></strong></h4>
<!-- /wp:heading --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"","className":"eplus-wrapper"} -->
<div class="wp-block-column eplus-wrapper"><!-- wp:cover {"url":"<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/patterns/images/foodiesfeed.com_lemon-basil-sponge-cake.jpg","id":5805,"dimRatio":50,"minHeight":380,"minHeightUnit":"px","isDark":false,"className":"is-style-editorskit-rounded eplus-wrapper is-style-round-corners","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|x-small","left":"30px"}}}} -->
<div class="wp-block-cover is-light is-style-editorskit-rounded eplus-wrapper is-style-round-corners" style="padding-bottom:var(--wp--preset--spacing--x-small);padding-left:30px;min-height:380px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-5805" alt="" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/patterns/images/foodiesfeed.com_lemon-basil-sponge-cake.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:spacer {"height":"296px"} -->
<div style="height:296px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"textAlign":"left","level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white","className":"eplus-wrapper"} -->
<h4 class="wp-block-heading has-text-align-left eplus-wrapper has-white-color has-text-color has-link-color"><strong><a href="#">Desserts</a></strong></h4>
<!-- /wp:heading --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"","className":"eplus-wrapper"} -->
<div class="wp-block-column eplus-wrapper"><!-- wp:cover {"url":"<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/patterns/images/foodiesfeed.com_lemon-basil-sponge-cake.jpg","id":5805,"dimRatio":50,"minHeight":380,"minHeightUnit":"px","isDark":false,"className":"is-style-editorskit-rounded eplus-wrapper is-style-round-corners","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|x-small","left":"30px"}}}} -->
<div class="wp-block-cover is-light is-style-editorskit-rounded eplus-wrapper is-style-round-corners" style="padding-bottom:var(--wp--preset--spacing--x-small);padding-left:30px;min-height:380px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-5805" alt="" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/patterns/images/foodiesfeed.com_lemon-basil-sponge-cake.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:spacer {"height":"296px"} -->
<div style="height:296px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"textAlign":"left","level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white","className":"eplus-wrapper"} -->
<h4 class="wp-block-heading has-text-align-left eplus-wrapper has-white-color has-text-color has-link-color"><strong><a href="#">Desserts</a></strong></h4>
<!-- /wp:heading --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"","className":"eplus-wrapper"} -->
<div class="wp-block-column eplus-wrapper"><!-- wp:cover {"url":"<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/patterns/images/foodiesfeed.com_lemon-basil-sponge-cake.jpg","id":5805,"dimRatio":50,"minHeight":380,"minHeightUnit":"px","isDark":false,"className":"is-style-editorskit-rounded eplus-wrapper is-style-round-corners","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|x-small","left":"30px"}}}} -->
<div class="wp-block-cover is-light is-style-editorskit-rounded eplus-wrapper is-style-round-corners" style="padding-bottom:var(--wp--preset--spacing--x-small);padding-left:30px;min-height:380px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-5805" alt="" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/patterns/images/foodiesfeed.com_lemon-basil-sponge-cake.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:spacer {"height":"296px"} -->
<div style="height:296px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"textAlign":"left","level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white","className":"eplus-wrapper"} -->
<h4 class="wp-block-heading has-text-align-left eplus-wrapper has-white-color has-text-color has-link-color"><strong><a href="#">Desserts</a></strong></h4>
<!-- /wp:heading --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"80px"} -->
<div style="height:80px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"left","style":{"typography":{"fontSize":"24px","fontStyle":"normal","fontWeight":"500"}}} -->
<p class="has-text-align-left" style="font-size:24px;font-style:normal;font-weight:500">Meals and courses</p>
<!-- /wp:paragraph -->

<!-- wp:separator {"backgroundColor":"tertiary","className":"is-style-default"} -->
<hr class="wp-block-separator has-text-color has-tertiary-color has-alpha-channel-opacity has-tertiary-background-color has-background is-style-default"/>
<!-- /wp:separator --></div>
<!-- /wp:group -->

<!-- wp:columns {"className":"eplus-wrapper"} -->
<div class="wp-block-columns eplus-wrapper"><!-- wp:column {"className":"eplus-wrapper"} -->
<div class="wp-block-column eplus-wrapper"><!-- wp:cover {"url":"<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/patterns/images/foodiesfeed.com_homemade-artisan-sourdough-bread.jpg","id":215,"dimRatio":50,"minHeight":130,"minHeightUnit":"px","contentPosition":"center center","className":"is-style-editorskit-rounded eplus-wrapper is-style-round-corners","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|x-small","left":"30px"}}}} -->
<div class="wp-block-cover is-style-editorskit-rounded eplus-wrapper is-style-round-corners" style="padding-bottom:var(--wp--preset--spacing--x-small);padding-left:30px;min-height:130px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-215" alt="" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/patterns/images/foodiesfeed.com_homemade-artisan-sourdough-bread.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:spacer {"height":"35px"} -->
<div style="height:35px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"textAlign":"left","level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white","className":"eplus-wrapper"} -->
<h4 class="wp-block-heading has-text-align-left eplus-wrapper has-white-color has-text-color has-link-color"><strong><a href="#">Baking</a></strong></h4>
<!-- /wp:heading --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"eplus-wrapper"} -->
<div class="wp-block-column eplus-wrapper"><!-- wp:cover {"url":"<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/patterns/images/foodiesfeed.com_homemade-artisan-sourdough-bread.jpg","id":215,"dimRatio":50,"minHeight":130,"minHeightUnit":"px","contentPosition":"center center","className":"is-style-editorskit-rounded eplus-wrapper is-style-round-corners","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|x-small","left":"30px"}}}} -->
<div class="wp-block-cover is-style-editorskit-rounded eplus-wrapper is-style-round-corners" style="padding-bottom:var(--wp--preset--spacing--x-small);padding-left:30px;min-height:130px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-215" alt="" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/patterns/images/foodiesfeed.com_homemade-artisan-sourdough-bread.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:spacer {"height":"35px"} -->
<div style="height:35px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"textAlign":"left","level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white","className":"eplus-wrapper"} -->
<h4 class="wp-block-heading has-text-align-left eplus-wrapper has-white-color has-text-color has-link-color"><strong><a href="#">Baking</a></strong></h4>
<!-- /wp:heading --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"eplus-wrapper"} -->
<div class="wp-block-column eplus-wrapper"><!-- wp:cover {"url":"<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/patterns/images/foodiesfeed.com_homemade-artisan-sourdough-bread.jpg","id":215,"dimRatio":50,"minHeight":130,"minHeightUnit":"px","contentPosition":"center center","className":"is-style-editorskit-rounded eplus-wrapper is-style-round-corners","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|x-small","left":"30px"}}}} -->
<div class="wp-block-cover is-style-editorskit-rounded eplus-wrapper is-style-round-corners" style="padding-bottom:var(--wp--preset--spacing--x-small);padding-left:30px;min-height:130px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-215" alt="" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/patterns/images/foodiesfeed.com_homemade-artisan-sourdough-bread.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:spacer {"height":"35px"} -->
<div style="height:35px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"textAlign":"left","level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white","className":"eplus-wrapper"} -->
<h4 class="wp-block-heading has-text-align-left eplus-wrapper has-white-color has-text-color has-link-color"><strong><a href="#">Baking</a></strong></h4>
<!-- /wp:heading --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"eplus-wrapper"} -->
<div class="wp-block-column eplus-wrapper"><!-- wp:cover {"url":"<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/patterns/images/foodiesfeed.com_homemade-artisan-sourdough-bread.jpg","id":215,"dimRatio":50,"minHeight":130,"minHeightUnit":"px","contentPosition":"center center","className":"is-style-editorskit-rounded eplus-wrapper is-style-round-corners","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|x-small","left":"30px"}}}} -->
<div class="wp-block-cover is-style-editorskit-rounded eplus-wrapper is-style-round-corners" style="padding-bottom:var(--wp--preset--spacing--x-small);padding-left:30px;min-height:130px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-215" alt="" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/patterns/images/foodiesfeed.com_homemade-artisan-sourdough-bread.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:spacer {"height":"35px"} -->
<div style="height:35px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"textAlign":"left","level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white","className":"eplus-wrapper"} -->
<h4 class="wp-block-heading has-text-align-left eplus-wrapper has-white-color has-text-color has-link-color"><strong><a href="#">Baking</a></strong></h4>
<!-- /wp:heading --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"},"margin":{"top":"0px","bottom":"0px"}}},"backgroundColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background-background-color has-background" id="book" style="margin-top:0px;margin-bottom:0px;padding-top:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium)"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%"><!-- wp:heading {"textAlign":"left","fontSize":"max-48"} -->
<h2 class="wp-block-heading has-text-align-left has-max-48-font-size">Get your hands on the <em style="color:var(--wp--preset--color--primary)">delicious</em> and <em style="color:var(--wp--preset--color--primary)">easy-to-follow</em> recipes in my <em style="color:var(--wp--preset--color--primary)">new cookbook</em>!</h2>
<!-- /wp:heading -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"textColor":"header-footer"} -->
<p class="has-header-footer-color has-text-color">Don't miss out on this amazing opportunity to get the book at a discounted price!</p>
<!-- /wp:paragraph -->

<!-- wp:outermost/icon-block {"iconName":"","itemsJustification":"left","width":"110px"} -->
<div class="wp-block-outermost-icon-block items-justified-left"><div class="icon-container" style="width:110px"><svg width="111" height="111" viewBox="0 0 111 111" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M48.5964 15.9871C51.2096 9.93557 59.7904 9.93557 62.4036 15.9871C64.2001 20.1474 69.2412 21.7854 73.14 19.4755C78.8111 16.1158 85.7531 21.1594 84.3102 27.5912C83.3183 32.013 86.4338 36.3011 90.9457 36.7241C97.5085 37.3394 100.16 45.5002 95.2124 49.8555C91.8108 52.8498 91.8108 58.1502 95.2124 61.1445C100.16 65.4998 97.5085 73.6606 90.9457 74.2759C86.4338 74.6989 83.3183 78.987 84.3102 83.4088C85.7531 89.8406 78.8111 94.8842 73.14 91.5245C69.2412 89.2146 64.2001 90.8526 62.4036 95.0129C59.7904 101.064 51.2096 101.064 48.5964 95.0129C46.7999 90.8526 41.7588 89.2146 37.86 91.5245C32.1889 94.8842 25.2469 89.8406 26.6898 83.4088C27.6817 78.987 24.5662 74.6989 20.0543 74.2759C13.4915 73.6606 10.8398 65.4998 15.7876 61.1445C19.1892 58.1502 19.1892 52.8498 15.7876 49.8555C10.8398 45.5002 13.4915 37.3394 20.0543 36.7241C24.5662 36.3011 27.6817 32.013 26.6898 27.5912C25.2469 21.1594 32.1889 16.1158 37.86 19.4755C41.7588 21.7854 46.7999 20.1474 48.5964 15.9871Z" fill="var(--wp--preset--color--primary)"></path><path d="M40.12 76.308C38.5893 76.308 37.2547 76.0467 36.116 75.524C34.9773 74.9827 33.9413 74.1707 33.008 73.088L35.78 70.26C36.396 71.0067 37.0773 71.5947 37.824 72.024C38.5707 72.4347 39.4293 72.64 40.4 72.64C41.3147 72.64 42.024 72.472 42.528 72.136C43.032 71.7813 43.284 71.2867 43.284 70.652C43.284 70.1107 43.116 69.672 42.78 69.336C42.4627 69 42.0333 68.7107 41.492 68.468C40.9507 68.2253 40.3533 67.992 39.7 67.768C39.0467 67.544 38.3933 67.292 37.74 67.012C37.1053 66.7133 36.5173 66.3493 35.976 65.92C35.4347 65.472 34.996 64.9213 34.66 64.268C34.324 63.596 34.156 62.756 34.156 61.748C34.156 60.5347 34.4453 59.4893 35.024 58.612C35.6213 57.7347 36.4333 57.072 37.46 56.624C38.4867 56.1573 39.6627 55.924 40.988 55.924C42.276 55.924 43.48 56.1667 44.6 56.652C45.72 57.1373 46.6347 57.8 47.344 58.64L44.572 61.468C43.9933 60.852 43.4053 60.3853 42.808 60.068C42.2293 59.732 41.5947 59.564 40.904 59.564C40.1013 59.564 39.476 59.7133 39.028 60.012C38.58 60.3107 38.356 60.7493 38.356 61.328C38.356 61.832 38.524 62.2427 38.86 62.56C39.196 62.8587 39.6347 63.12 40.176 63.344C40.736 63.568 41.3333 63.792 41.968 64.016C42.6213 64.24 43.2747 64.5013 43.928 64.8C44.5813 65.0987 45.1787 65.4813 45.72 65.948C46.28 66.396 46.728 66.9747 47.064 67.684C47.4 68.3747 47.568 69.2333 47.568 70.26C47.568 72.1453 46.9053 73.6293 45.58 74.712C44.2733 75.776 42.4533 76.308 40.12 76.308ZM39.196 74.124H42.276V78.828H39.196V74.124ZM42.276 57.94H39.196V53.404H42.276V57.94ZM49.4591 69.14L55.9551 56.232H60.7431L54.1071 69.14H49.4591ZM49.4591 71.604V69.14L50.9151 67.88H65.3071V71.604H49.4591ZM58.7831 76V63.764H63.0951V76H58.7831ZM68.4934 76L74.7094 67.348L76.3334 67.236C76.0907 67.6653 75.8201 68.048 75.5214 68.384C75.2414 68.7013 74.8774 68.9533 74.4294 69.14C74.0001 69.308 73.4214 69.392 72.6934 69.392C71.4987 69.392 70.3974 69.112 69.3894 68.552C68.4001 67.9733 67.6067 67.1987 67.0094 66.228C66.4307 65.2387 66.1414 64.1187 66.1414 62.868C66.1414 61.5613 66.4681 60.3853 67.1214 59.34C67.7747 58.2947 68.6521 57.464 69.7534 56.848C70.8547 56.232 72.0961 55.924 73.4774 55.924C74.8587 55.924 76.1001 56.232 77.2014 56.848C78.3027 57.4453 79.1707 58.2667 79.8054 59.312C80.4587 60.3387 80.7854 61.5053 80.7854 62.812C80.7854 64.492 80.2067 66.1813 79.0494 67.88L73.4774 76H68.4934ZM73.4774 66.116C74.0561 66.116 74.5787 65.976 75.0454 65.696C75.5121 65.416 75.8761 65.0427 76.1374 64.576C76.3987 64.0907 76.5294 63.5493 76.5294 62.952C76.5294 62.336 76.3987 61.7853 76.1374 61.3C75.8761 60.8147 75.5121 60.4413 75.0454 60.18C74.5787 59.9 74.0561 59.76 73.4774 59.76C72.8801 59.76 72.3481 59.9 71.8814 60.18C71.4334 60.4413 71.0694 60.8147 70.7894 61.3C70.5281 61.7853 70.3974 62.336 70.3974 62.952C70.3974 63.5493 70.5281 64.0907 70.7894 64.576C71.0694 65.0427 71.4427 65.416 71.9094 65.696C72.3761 65.976 72.8987 66.116 73.4774 66.116Z" fill="#121738"></path><path d="M37.962 45.14C37.3087 45.14 36.7207 44.986 36.198 44.678C35.6753 44.37 35.26 43.9547 34.952 43.432C34.644 42.9 34.49 42.3073 34.49 41.654C34.49 41.01 34.644 40.4313 34.952 39.918C35.26 39.3953 35.6753 38.98 36.198 38.672C36.7207 38.364 37.3087 38.21 37.962 38.21C38.606 38.21 39.1893 38.364 39.712 38.672C40.244 38.9707 40.664 39.3813 40.972 39.904C41.28 40.4267 41.434 41.01 41.434 41.654C41.434 42.3073 41.28 42.9 40.972 43.432C40.664 43.9547 40.244 44.37 39.712 44.678C39.1893 44.986 38.606 45.14 37.962 45.14ZM37.962 43.922C38.382 43.922 38.7553 43.824 39.082 43.628C39.4087 43.432 39.6653 43.166 39.852 42.83C40.0387 42.4847 40.132 42.0927 40.132 41.654C40.132 41.2247 40.034 40.842 39.838 40.506C39.6513 40.17 39.3947 39.9087 39.068 39.722C38.7507 39.526 38.382 39.428 37.962 39.428C37.542 39.428 37.1687 39.526 36.842 39.722C36.5153 39.9087 36.2587 40.17 36.072 40.506C35.8853 40.842 35.792 41.2247 35.792 41.654C35.792 42.0927 35.8853 42.4847 36.072 42.83C36.2587 43.166 36.5153 43.432 36.842 43.628C37.1687 43.824 37.542 43.922 37.962 43.922ZM47.5577 45V41.122C47.5577 40.618 47.399 40.2027 47.0817 39.876C46.7644 39.5493 46.3537 39.386 45.8497 39.386C45.5137 39.386 45.215 39.4607 44.9537 39.61C44.6924 39.7593 44.487 39.9647 44.3377 40.226C44.1884 40.4873 44.1137 40.786 44.1137 41.122L43.5957 40.828C43.5957 40.324 43.7077 39.876 43.9317 39.484C44.1557 39.092 44.4684 38.784 44.8697 38.56C45.271 38.3267 45.7237 38.21 46.2277 38.21C46.7317 38.21 47.175 38.336 47.5577 38.588C47.9497 38.84 48.2577 39.1713 48.4817 39.582C48.7057 39.9833 48.8177 40.4127 48.8177 40.87V45H47.5577ZM42.8537 45V38.35H44.1137V45H42.8537ZM50.5236 45V35.004H51.7836V45H50.5236ZM55.8111 45.056L52.9271 38.35H54.3271L56.4691 43.6H56.0211L58.2751 38.35H59.6751L56.5671 45.056H55.8111ZM53.9071 47.786L55.8671 43.768L56.5671 45.056L55.3071 47.786H53.9071ZM66.5586 45.14C65.952 45.14 65.4013 44.9907 64.9066 44.692C64.412 44.384 64.02 43.9687 63.7306 43.446C63.4506 42.9233 63.3106 42.3353 63.3106 41.682C63.3106 41.0287 63.4506 40.4407 63.7306 39.918C64.02 39.3953 64.4073 38.98 64.8926 38.672C65.3873 38.364 65.9426 38.21 66.5586 38.21C67.0626 38.21 67.5106 38.3173 67.9026 38.532C68.304 38.7373 68.626 39.0267 68.8686 39.4C69.1113 39.764 69.2466 40.1887 69.2746 40.674V42.676C69.2466 43.152 69.1113 43.5767 68.8686 43.95C68.6353 44.3233 68.318 44.6173 67.9166 44.832C67.5246 45.0373 67.072 45.14 66.5586 45.14ZM66.7686 43.95C67.394 43.95 67.898 43.74 68.2806 43.32C68.6633 42.8907 68.8546 42.3447 68.8546 41.682C68.8546 41.2247 68.766 40.828 68.5886 40.492C68.4206 40.1467 68.178 39.8807 67.8606 39.694C67.5433 39.498 67.1746 39.4 66.7546 39.4C66.3346 39.4 65.9613 39.498 65.6346 39.694C65.3173 39.89 65.0653 40.1607 64.8786 40.506C64.7013 40.842 64.6126 41.2293 64.6126 41.668C64.6126 42.116 64.7013 42.5127 64.8786 42.858C65.0653 43.194 65.322 43.46 65.6486 43.656C65.9753 43.852 66.3486 43.95 66.7686 43.95ZM68.7706 45V43.208L69.0086 41.584L68.7706 39.974V38.35H70.0446V45H68.7706ZM72.8737 45V35.564H74.1337V45H72.8737ZM71.2357 39.498V38.35H75.7717V39.498H71.2357Z" fill="white"></path></svg></div></div>
<!-- /wp:outermost/icon-block --></div>
<!-- /wp:group -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#">Get a copy now</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top","width":"50%","style":{"spacing":{"padding":{"left":"var:preset|spacing|small"}}}} -->
<div class="wp-block-column is-vertically-aligned-top" style="padding-left:var(--wp--preset--spacing--small);flex-basis:50%"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":"15px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:outermost/icon-block {"iconName":"","itemsJustification":"left","width":"24px"} -->
<div class="wp-block-outermost-icon-block items-justified-left"><div class="icon-container" style="width:24px"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><mask id="mask0_3170_2916" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24"><rect width="24" height="24" fill="#D9D9D9"></rect></mask><g mask="url(#mask0_3170_2916)"><path d="M12 20C11.2 19.3667 10.3333 18.875 9.4 18.525C8.46667 18.175 7.5 18 6.5 18C5.8 18 5.11267 18.0917 4.438 18.275C3.76267 18.4583 3.11667 18.7167 2.5 19.05C2.15 19.2333 1.81267 19.225 1.488 19.025C1.16267 18.825 1 18.5333 1 18.15V6.1C1 5.91667 1.046 5.74167 1.138 5.575C1.22933 5.40833 1.36667 5.28333 1.55 5.2C2.31667 4.8 3.11667 4.5 3.95 4.3C4.78333 4.1 5.63333 4 6.5 4C7.46667 4 8.41267 4.125 9.338 4.375C10.2627 4.625 11.15 5 12 5.5V17.6C12.85 17.0667 13.7417 16.6667 14.675 16.4C15.6083 16.1333 16.55 16 17.5 16C18.1 16 18.6877 16.05 19.263 16.15C19.8377 16.25 20.4167 16.4 21 16.6V4.6C21.25 4.68333 21.496 4.77067 21.738 4.862C21.9793 4.954 22.2167 5.06667 22.45 5.2C22.6333 5.28333 22.771 5.40833 22.863 5.575C22.9543 5.74167 23 5.91667 23 6.1V18.15C23 18.5333 22.8377 18.825 22.513 19.025C22.1877 19.225 21.85 19.2333 21.5 19.05C20.8833 18.7167 20.2373 18.4583 19.562 18.275C18.8873 18.0917 18.2 18 17.5 18C16.5 18 15.5333 18.175 14.6 18.525C13.6667 18.875 12.8 19.3667 12 20ZM14 15V5.5L19 0.5V10.5L14 15ZM10 16.625V6.725C9.45 6.49167 8.87933 6.31267 8.288 6.188C7.696 6.06267 7.1 6 6.5 6C5.88333 6 5.28333 6.05833 4.7 6.175C4.11667 6.29167 3.55 6.46667 3 6.7V16.625C3.58333 16.4083 4.16267 16.25 4.738 16.15C5.31267 16.05 5.9 16 6.5 16C7.1 16 7.68733 16.05 8.262 16.15C8.83733 16.25 9.41667 16.4083 10 16.625Z" fill="var(--wp--preset--color--primary)"></path></g></svg></div></div>
<!-- /wp:outermost/icon-block -->

<!-- wp:heading {"textAlign":"left","level":3} -->
<h3 class="wp-block-heading has-text-align-left">My latest book</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"25px"} -->
<div style="height:25px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:image {"id":7279,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"12px"}},"className":"is-style-rounded"} -->
<figure class="wp-block-image size-full has-custom-border is-style-rounded"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/patterns/images/book-mockup-square.png" alt="" class="wp-image-7279" style="border-radius:12px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|small"}}},"layout":{"type":"constrained"}} -->
<div id="special-recipes" class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--small)"><!-- wp:spacer {"height":"60px"} -->
<div style="height:60px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"15px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:outermost/icon-block {"iconName":"","itemsJustification":"left","width":"36px"} -->
<div class="wp-block-outermost-icon-block items-justified-left"><div class="icon-container" style="width:36px"><svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg"><mask id="mask0_3176_2568" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="36" height="36"><rect width="36" height="36" fill="#D9D9D9"></rect></mask><g mask="url(#mask0_3176_2568)"><path d="M10.5 33V19.275C9.225 18.925 8.1565 18.225 7.2945 17.175C6.4315 16.125 6 14.9 6 13.5V3H9V13.5H10.5V3H13.5V13.5H15V3H18V13.5C18 14.9 17.5685 16.125 16.7055 17.175C15.8435 18.225 14.775 18.925 13.5 19.275V33H10.5ZM25.5 33V21H21V10.5C21 8.425 21.7315 6.6565 23.1945 5.1945C24.6565 3.7315 26.425 3 28.5 3V33H25.5Z" fill="var(--wp--preset--color--primary)"></path></g></svg></div></div>
<!-- /wp:outermost/icon-block -->

<!-- wp:heading {"textAlign":"left","level":3} -->
<h3 class="wp-block-heading has-text-align-left">Special occasion</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"textColor":"tertiary"} -->
<p class="has-tertiary-color has-text-color">This is some dummy copy. You’re not really supposed to read this dummy copy, it is just a place holder for people who need some type to visualize what the actual copy might look like if it were real content.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}}} -->
<p class="has-link-color" style="font-style:normal;font-weight:500"><a href="#">View all dinner recipes   →</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"50px"} -->
<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:query {"queryId":14,"query":{"perPage":"8","pages":"","offset":"","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"displayLayout":{"type":"flex","columns":4},"layout":{"type":"default"}} -->
<div class="wp-block-query"><!-- wp:post-template -->
<!-- wp:group {"style":{"spacing":{"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:post-featured-image {"isLink":true,"width":"100%","height":"180px","style":{"border":{"radius":"0px"}}} /-->

<!-- wp:post-terms {"term":"category","style":{"typography":{"fontStyle":"normal","fontWeight":"500"},"spacing":{"margin":{"right":"0px","bottom":"0px","left":"0px","top":"15px"}}},"textColor":"tertiary"} /-->

<!-- wp:post-title {"level":4,"isLink":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.3","fontSize":"18px"},"spacing":{"margin":{"top":"10px"}},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}}} /-->

<!-- wp:spacer {"height":"40px"} -->
<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:cover {"url":"<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/patterns/images/foodiesfeed.com_delicious-shakshouka.jpg","id":7286,"dimRatio":40,"overlayColor":"primary","contentPosition":"center center","align":"full"} -->
<div class="wp-block-cover alignfull" id="subscribe"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-40 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-7286" alt="" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/patterns/images/foodiesfeed.com_delicious-shakshouka.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:spacer -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"33.34%"} -->
<div class="wp-block-column" style="flex-basis:33.34%"></div>
<!-- /wp:column -->

<!-- wp:column {"width":"33.34%"} -->
<div class="wp-block-column" style="flex-basis:33.34%"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small"}}},"backgroundColor":"secondary","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":"15px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:outermost/icon-block {"iconName":"","itemsJustification":"left","width":"36px"} -->
<div class="wp-block-outermost-icon-block items-justified-left"><div class="icon-container" style="width:36px"><svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg"><mask id="mask0_3168_2870" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="36" height="36"><rect width="36" height="36" fill="#D9D9D9"></rect></mask><g mask="url(#mask0_3168_2870)"><path d="M18 1.5L31.575 9.6C32.025 9.875 32.375 10.25 32.625 10.725C32.875 11.2 33 11.7 33 12.225V28.5C33 29.325 32.7065 30.0315 32.1195 30.6195C31.5315 31.2065 30.825 31.5 30 31.5H6C5.175 31.5 4.469 31.2065 3.882 30.6195C3.294 30.0315 3 29.325 3 28.5V12.225C3 11.7 3.125 11.2 3.375 10.725C3.625 10.25 3.975 9.875 4.425 9.6L18 1.5ZM18 18.975L29.7 12L18 5.025L6.3 12L18 18.975ZM18 22.5L6 15.3V28.5H30V15.3L18 22.5Z" fill="#FAFAFA"></path></g></svg></div></div>
<!-- /wp:outermost/icon-block -->

<!-- wp:heading {"textAlign":"left","level":5,"style":{"typography":{"fontSize":"32px"}},"textColor":"white"} -->
<h5 class="wp-block-heading has-text-align-left has-white-color has-text-color" style="font-size:32px">Join my newsletter</h5>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"align":"left","textColor":"white"} -->
<p class="has-text-align-left has-white-color has-text-color">Get exclusive access to recipes and cooking tips!</p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<form action="/action_page.php">
    <input type="text" placeholder="Name" name="name" required><br />
    <input type="text" placeholder="Email address" name="mail" required><br />
    <input type="submit" value="Subscribe" class="wpz-alt-button"><br />
</form>
<!-- /wp:html --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"33.33%"} -->
<div class="wp-block-column" style="flex-basis:33.33%"></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div></div>
<!-- /wp:cover -->
