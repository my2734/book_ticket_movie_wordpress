<?php
/**
 * Theme Info page
 *
 * @package Foodie Blocks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * About Theme Page
 *
 * @return void
 */
function foodie_blocks_theme_info_page() {
	add_theme_page(
		esc_html__( 'Foodie Blocks Theme Dashboard', 'foodie-blocks' ),
		esc_html__( 'Foodie Blocks Theme', 'foodie-blocks' ),
		'edit_theme_options',
		'foodie_blocks',
		'foodie_blocks_display_theme_page',
        1
	);
}
add_action( 'admin_menu', 'foodie_blocks_theme_info_page' );

/**
 * Display HTML page for Theme
 *
 * @return void
 */
function foodie_blocks_display_theme_page() {

    $parent = wp_get_theme();

	?>


    <script>

      jQuery(document).ready(function($){

            $( function() {
              $( "#tabs" ).tabs();
            } );

      });

      </script>

    <div class="wpz-onboard_wrapper">
        <div id="tabs">

                <div class="wpz-onboard_header">
                    <div class="wpz-onboard_title-wrapper">
                        <h1 class="wpz-onboard_title"><svg width="30" height="30" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg"><mask id="mask0_3157_2609" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="36" height="36"><rect width="36" height="36" fill="#D9D9D9"/></mask><g mask="url(#mask0_3157_2609)"><path d="M6.56094 31.5L4.46094 29.4L19.8359 14.025C19.3859 12.975 19.3234 11.7875 19.6484 10.4625C19.9734 9.1375 20.6859 7.95 21.7859 6.9C23.1109 5.575 24.5859 4.8 26.2109 4.575C27.8359 4.35 29.1609 4.75 30.1859 5.775C31.2109 6.8 31.6109 8.125 31.3859 9.75C31.1609 11.375 30.3859 12.85 29.0609 14.175C28.0109 15.275 26.8234 15.9875 25.4984 16.3125C24.1734 16.6375 22.9859 16.575 21.9359 16.125L20.0609 18L31.4609 29.4L29.3609 31.5L17.9609 20.175L6.56094 31.5ZM10.9859 18.675L6.48594 14.175C5.13594 12.825 4.46094 11.2125 4.46094 9.3375C4.46094 7.4625 5.13594 5.85 6.48594 4.5L15.7859 13.875L10.9859 18.675Z" fill="#289283"/></g></svg> Foodie Blocks <span>Lite</span></h1>
                        <h2 class="wpz-onboard_framework-version">v <?php echo esc_html( $parent->get( 'Version' ) ); ?></h2>
                    </div>

                    <ul class="wpz-onboard_tabs">
                        <li class="wpz-onboard_tab wpz-onboard_tab-quick-start"><a href="#quick-start" title="Quick Start"><svg width="18" height="18" viewBox="0 0 13 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.166992 14.5V0.333332H7.66699L8.00033 2H12.667V10.3333H6.83366L6.50033 8.66667H1.83366V14.5H0.166992ZM8.20866 8.66667H11.0003V3.66667H6.62533L6.29199 2H1.83366V7H7.87533L8.20866 8.66667Z" fill="#000"></path></svg> <?php esc_html_e( 'Quick Start', 'foodie-blocks' ); ?></a></li>

                        <li class="wpz-onboard_tab wpz-onboard_tab-theme-child"><a href="#vs-pro" title="Free vs. PRO"><svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="M15 5.75C11.5482 5.75 8.75 8.54822 8.75 12C8.75 15.4518 11.5482 18.25 15 18.25C15.9599 18.25 16.8674 18.0341 17.6782 17.6489C18.0523 17.4712 18.4997 17.6304 18.6774 18.0045C18.8552 18.3787 18.696 18.8261 18.3218 19.0038C17.3141 19.4825 16.1873 19.75 15 19.75C10.7198 19.75 7.25 16.2802 7.25 12C7.25 7.71979 10.7198 4.25 15 4.25C19.2802 4.25 22.75 7.71979 22.75 12C22.75 12.7682 22.638 13.5115 22.429 14.2139C22.3108 14.6109 21.8932 14.837 21.4962 14.7188C21.0992 14.6007 20.8731 14.1831 20.9913 13.7861C21.1594 13.221 21.25 12.6218 21.25 12C21.25 8.54822 18.4518 5.75 15 5.75Z" fill="black" fill-rule="evenodd"/><path clip-rule="evenodd" d="M5.25 5C5.25 4.58579 5.58579 4.25 6 4.25H15C15.4142 4.25 15.75 4.58579 15.75 5C15.75 5.41421 15.4142 5.75 15 5.75H6C5.58579 5.75 5.25 5.41421 5.25 5Z" fill="black" fill-rule="evenodd"/><path clip-rule="evenodd" d="M4.75 8.5C4.75 8.08579 5.08579 7.75 5.5 7.75H8.5C8.91421 7.75 9.25 8.08579 9.25 8.5C9.25 8.91421 8.91421 9.25 8.5 9.25H5.5C5.08579 9.25 4.75 8.91421 4.75 8.5Z" fill="black" fill-rule="evenodd"/><path clip-rule="evenodd" d="M1.25 8.5C1.25 8.08579 1.58579 7.75 2 7.75H3.5C3.91421 7.75 4.25 8.08579 4.25 8.5C4.25 8.91421 3.91421 9.25 3.5 9.25H2C1.58579 9.25 1.25 8.91421 1.25 8.5Z" fill="black" fill-rule="evenodd"/><path clip-rule="evenodd" d="M3.25 12.5C3.25 12.0858 3.58579 11.75 4 11.75H8C8.41421 11.75 8.75 12.0858 8.75 12.5C8.75 12.9142 8.41421 13.25 8 13.25H4C3.58579 13.25 3.25 12.9142 3.25 12.5Z" fill="black" fill-rule="evenodd"/><path clip-rule="evenodd" d="M12.376 8.58397C12.5151 8.37533 12.7492 8.25 13 8.25H17C17.2508 8.25 17.4849 8.37533 17.624 8.58397L19.624 11.584C19.792 11.8359 19.792 12.1641 19.624 12.416L17.624 15.416C17.4849 15.6247 17.2508 15.75 17 15.75H13C12.7492 15.75 12.5151 15.6247 12.376 15.416L10.376 12.416C10.208 12.1641 10.208 11.8359 10.376 11.584L12.376 8.58397ZM13.4014 9.75L11.9014 12L13.4014 14.25H16.5986L18.0986 12L16.5986 9.75H13.4014Z" fill="black" fill-rule="evenodd"/></svg> <?php esc_html_e( 'Free vs. PRO', 'foodie-blocks' ); ?></a></li>

                    </ul>
                </div>

                <div class="wpz-onboard_content-wrapper">
                    <div class="wpz-onboard_content">

                        <div class="wpz-onboard_content-main">
                            <div id="quick-start" class="wpz-onboard_content-main-tab">

                                <div class="theme-info-wrap welcome-section">

                                    <h3 class="wpz-onboard_content-main-title"><?php esc_html_e( 'Welcome to Foodie Blocks!', 'foodie-blocks' ); ?> 👋</h3>
                                    <p class="wpz-onboard_content-main-intro"><?php esc_html_e( 'Thank you for installing the free version of our theme! Below you can find quick links to different sections where you can configure and customize the theme. The free version includes limited features and block patterns, but if you need more flexibility and plan to take your website to the next level, make sure to check the PRO version.', 'foodie-blocks' ); ?></p>

                                    <p class="section_footer">
                                        <a href="<?php echo esc_url( admin_url( 'site-editor.php' ) ); ?>" target="_blank" class="button button-primary">
                                            <?php esc_html_e( 'Go to Site Editor &rarr;', 'foodie-blocks' ); ?>
                                        </a>

                                        <a href="<?php echo esc_url( __( 'https://www.wpzoom.com/themes/foodie-blocks/', 'foodie-blocks' ) ); ?>" target="_blank" class="button button-secondary">
                                            <?php esc_html_e( 'Get the PRO version &rarr;', 'foodie-blocks' ); ?>
                                        </a>

                                    </p>

                                </div>

                                    <div class="theme-info-wrap">

                                        <h3 class="wpz-onboard_content-main-title"><?php esc_html_e( 'Customize & Configure', 'foodie-blocks' ); ?></h3>

                                            <div class="wpz-grid-wrap">


                                                <div class="section">
                                                    <h4>
                                                        <svg height="26" viewBox="0 0 21 21" width="26" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" transform="translate(3 3)"><path d="m14.4978951 12.4978973-.0105089-9.99999996c-.0011648-1.10374784-.8962548-1.99789734-2-1.99789734h-9.99999995c-1.0543629 0-1.91816623.81587779-1.99451537 1.85073766l-.00548463.151365.0105133 10.00000004c.0011604 1.1037478.89625045 1.9978973 1.99999889 1.9978973h9.99999776c1.0543618 0 1.9181652-.8158778 1.9945143-1.8507377z"/><path d="m4.5 4.5v9.817"/><path d="m7-2v14" transform="matrix(0 1 -1 0 12.5 -2.5)"/></g></svg> <?php esc_html_e( 'Site Editor', 'foodie-blocks' ); ?>
                                                    </h4>
                                                    <p class="about">
                                                        <?php esc_html_e( 'Customize the design and templates of your website easily using the Site Editor.', 'foodie-blocks' ); ?>
                                                    </p>

                                                    <p class="section_footer">

                                                        <a href="<?php echo esc_url( admin_url( 'site-editor.php' ) ); ?>" target="_blank" class="button button-primary">
                                                            <?php esc_html_e( 'Go to Site Editor &rarr;', 'foodie-blocks' ); ?>
                                                        </a>

                                                    </p>
                                                </div>

                                                <div class="section">
                                                    <h4>
                                                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="26" height="26" aria-hidden="true" focusable="false"><path d="M17.2 10.9c-.5-1-1.2-2.1-2.1-3.2-.6-.9-1.3-1.7-2.1-2.6L12 4l-1 1.1c-.6.9-1.3 1.7-2 2.6-.8 1.2-1.5 2.3-2 3.2-.6 1.2-1 2.2-1 3 0 3.4 2.7 6.1 6.1 6.1s6.1-2.7 6.1-6.1c0-.8-.3-1.8-1-3zm-5.1 7.6c-2.5 0-4.6-2.1-4.6-4.6 0-.3.1-1 .8-2.3.5-.9 1.1-1.9 2-3.1.7-.9 1.3-1.7 1.8-2.3.7.8 1.3 1.6 1.8 2.3.8 1.1 1.5 2.2 2 3.1.7 1.3.8 2 .8 2.3 0 2.5-2.1 4.6-4.6 4.6z"></path></svg> <?php esc_html_e( 'Colors & Fonts', 'foodie-blocks' ); ?>
                                                    </h4>
                                                    <p class="about">
                                                        <?php esc_html_e( 'Set up your global colors and fonts to match your site with your brand.', 'foodie-blocks' ); ?>
                                                    </p>

                                                    <p class="section_footer">

                                                        <a href="<?php echo esc_url( admin_url( 'site-editor.php?canvas=edit' ) ); ?>" target="_blank" class="button button-primary">
                                                            <?php esc_html_e( 'Customize the Site &rarr;', 'foodie-blocks' ); ?>
                                                        </a>

                                                    </p>
                                                </div>


                                                <div class="section">
                                                    <h4>
                                                        <svg height="26" viewBox="0 0 512 512" width="26" xmlns="http://www.w3.org/2000/svg"><title/><rect height="336" rx="57" ry="57" style="fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px" width="336" x="128" y="128"/><path d="M383.5,128l.5-24a56.16,56.16,0,0,0-56-56H112a64.19,64.19,0,0,0-64,64V328a56.16,56.16,0,0,0,56,56h24" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"/><line style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px" x1="296" x2="296" y1="216" y2="376"/><line style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px" x1="376" x2="216" y1="296" y2="296"/></svg> <?php esc_html_e( 'Import Demo Pages using Block Patterns', 'foodie-blocks' ); ?>
                                                    </h4>
                                                    <p class="about">
                                                        <?php esc_html_e( 'You can quickly import pre-designed pages from the demo by inserting Block Patterns in pages.', 'foodie-blocks' ); ?>
                                                    </p>
                                                    <p class="section_footer">
                                                        <a href="https://www.wpzoom.com/documentation/foodie-blocks/adding-block-patterns-with-demo-pages/" target="_blank" class="button button-primary">
                                                            <?php esc_html_e( 'See instructions &rarr;', 'foodie-blocks' ); ?>
                                                        </a>

                                                    </p>
                                                </div>

                                                <div class="section">
                                                    <h4>
                                                        <svg id="Icons" style="enable-background:new 0 0 32 32;" width="26" height="26" version="1.1" viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><style type="text/css">
                                                            .st0{fill:none;stroke:#000000;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                                                            .st1{fill:none;stroke:#000000;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;}
                                                            .st2{fill:none;stroke:#000000;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:6,6;}
                                                            .st3{fill:none;stroke:#000000;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:4,4;}
                                                            .st4{fill:none;stroke:#000000;stroke-width:2;stroke-linecap:round;}
                                                            .st5{fill:none;stroke:#000000;stroke-width:2;stroke-linecap:round;stroke-dasharray:3.1081,3.1081;}
                                                            .st6{fill:none;stroke:#000000;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:4,3;}
                                                        </style><circle class="st0" cx="13" cy="13" r="1"/><polyline class="st0" points="7,21 16,16 20,19 25,16 "/><polyline class="st0" points="30,25 7,25 7,2 "/><polyline class="st0" points="7,7 25,7 25,25 "/><line class="st0" x1="7" x2="2" y1="7" y2="7"/><line class="st0" x1="25" x2="25" y1="30" y2="25"/></svg> <?php esc_html_e( 'Site Logo', 'foodie-blocks' ); ?>
                                                    </h4>
                                                    <p class="about">
                                                        <?php esc_html_e( 'If you have a logo image, you can upload it in the header using the Site Logo block.', 'foodie-blocks' ); ?>
                                                    </p>
                                                    <p class="section_footer">
                                                        <a href="https://www.wpzoom.com/docs/how-to-upload-your-logo-image-in-block-themes/" target="_blank" class="button button-primary">
                                                            <?php esc_html_e( 'See instructions &rarr;', 'foodie-blocks' ); ?>
                                                        </a>

                                                    </p>
                                                </div>

                                                <div class="section">
                                                    <h4>
                                                        <svg width="26" height="26" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3" d="M26.2 7.99902C26.0689 8.64524 26 9.31409 26 9.99902C26 14.8369 29.4355 18.8724 34 19.799V39.999H10V7.99902H26.2Z" fill="#E1581A"/>
                                                        <path d="M34 19.8009V40.001H10L9.98 8.00098H26.2C26.4987 6.52957 27.1205 5.17547 27.988 4.01597L10 4.00098C7.78 4.00098 6 5.78098 6 8.00098V40.001C6 42.221 7.78 44.001 10 44.001H34C36.22 44.001 38 42.221 38 40.001V19.8009C37.3538 19.9321 36.6849 20.001 36 20.001C35.3151 20.001 34.6462 19.9321 34 19.8009Z" fill="#E1581A"/>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M25.4289 15.6926C25.6568 15.64 25.8869 15.6133 26.1171 15.6133C28.2581 15.6133 30 17.8222 30 20.5362C30 22.5126 29.0657 24.2725 27.6682 25.0423V33.057C27.6682 33.5788 27.3347 34.001 26.9225 34.001H17.0819C16.6697 34.001 16.3362 33.5788 16.3362 33.057V26.6085C14.9358 25.8425 14 24.0816 14 22.1006C14 19.3396 15.7565 17.104 17.9645 17.1769C18.7721 15.2262 20.3597 14.001 22.1526 14.001C23.3855 14.001 24.5558 14.6113 25.4289 15.6926ZM17.8276 29.7586V32.113H26.1768V29.7586H17.8276Z" fill="#E1581A"/>
                                                        <path d="M42 10.001C42.0013 10.1759 41.9481 10.3469 41.8478 10.4902C41.7475 10.6335 41.6051 10.7421 41.4403 10.8007L38.0343 12.0377L36.7977 15.4448C36.7371 15.608 36.628 15.7488 36.4851 15.8482C36.3422 15.9477 36.1723 16.001 35.9982 16.001C35.8241 16.001 35.6542 15.9477 35.5112 15.8482C35.3683 15.7488 35.2592 15.608 35.1987 15.4448L33.962 12.0377L30.5561 10.8007C30.3928 10.7401 30.2521 10.631 30.1527 10.4881C30.0533 10.3451 30 10.1751 30 10.001C30 9.82683 30.0533 9.65686 30.1527 9.51389C30.2521 9.37092 30.3928 9.26181 30.5561 9.20121L33.962 7.96423L35.1987 4.5572C35.2592 4.39394 35.3683 4.25314 35.5112 4.1537C35.6542 4.05427 35.8241 4.00098 35.9982 4.00098C36.1723 4.00098 36.3422 4.05427 36.4851 4.1537C36.628 4.25314 36.7371 4.39394 36.7977 4.5572L38.0343 7.96423L41.4403 9.20121C41.6051 9.25988 41.7475 9.36841 41.8478 9.51173C41.9481 9.65505 42.0013 9.82604 42 10.001Z" fill="#E1581A"/>
                                                        </svg> <?php esc_html_e( 'Adding Recipe Cards', 'foodie-blocks' ); ?>
                                                    </h4>
                                                    <p class="about">
                                                        <?php printf( esc_html__( 'Using the free version of our %1$sRecipe Card Blocks%2$s plugin, you can quickly add recipe cards in your blog posts theme!', 'foodie-blocks' ), '<a href="https://recipecard.io">', '</a>' );  ?>
                                                    </p>

                                                    <p class="section_footer">

                                                        <?php if ( class_exists( 'WPZOOM_Recipe_Card_Block_Gutenberg' ) ) { ?>

                                                            <a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=wpzoom_rcb' ) ); ?>" target="_blank" class="button button-primary">
                                                                <?php esc_html_e( 'Add a New Recipe &rarr;', 'foodie-blocks' ); ?>
                                                            </a>

                                                        <?php } else {  ?>

                                                            <a href="<?php echo esc_url( admin_url( 'plugin-install.php?s=recipe%252Bcard%252Bblocks%252Bwpzoom%252Bfoodica&tab=search&type=term' ) ); ?>" target="_blank" class="button button-primary">
                                                                <?php esc_html_e( 'Install Recipe Card Blocks &rarr;', 'foodie-blocks' ); ?>
                                                            </a>

                                                        <?php } ?>

                                                        <a href="<?php echo esc_url( __( 'https://recipecard.io/documentation/recipe-card-blocks-pro-how-to-use-the-recipe-card-blocks/', 'foodie-blocks' ) ); ?>" target="_blank" class="button button-secondary">
                                                            <?php esc_html_e( 'How to Create a Recipe Card?', 'foodie-blocks' ); ?>
                                                        </a>
                                                    </p>
                                                </div>



                                            </div><!-- /.wpz-grid-wrap -->

                                    </div><!-- /.theme-info-wrap -->


                                    <div class="theme-info-wrap">

                                        <h3 class="wpz-onboard_content-main-title"><svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="M15 5.75C11.5482 5.75 8.75 8.54822 8.75 12C8.75 15.4518 11.5482 18.25 15 18.25C15.9599 18.25 16.8674 18.0341 17.6782 17.6489C18.0523 17.4712 18.4997 17.6304 18.6774 18.0045C18.8552 18.3787 18.696 18.8261 18.3218 19.0038C17.3141 19.4825 16.1873 19.75 15 19.75C10.7198 19.75 7.25 16.2802 7.25 12C7.25 7.71979 10.7198 4.25 15 4.25C19.2802 4.25 22.75 7.71979 22.75 12C22.75 12.7682 22.638 13.5115 22.429 14.2139C22.3108 14.6109 21.8932 14.837 21.4962 14.7188C21.0992 14.6007 20.8731 14.1831 20.9913 13.7861C21.1594 13.221 21.25 12.6218 21.25 12C21.25 8.54822 18.4518 5.75 15 5.75Z" fill="black" fill-rule="evenodd"/><path clip-rule="evenodd" d="M5.25 5C5.25 4.58579 5.58579 4.25 6 4.25H15C15.4142 4.25 15.75 4.58579 15.75 5C15.75 5.41421 15.4142 5.75 15 5.75H6C5.58579 5.75 5.25 5.41421 5.25 5Z" fill="black" fill-rule="evenodd"/><path clip-rule="evenodd" d="M4.75 8.5C4.75 8.08579 5.08579 7.75 5.5 7.75H8.5C8.91421 7.75 9.25 8.08579 9.25 8.5C9.25 8.91421 8.91421 9.25 8.5 9.25H5.5C5.08579 9.25 4.75 8.91421 4.75 8.5Z" fill="black" fill-rule="evenodd"/><path clip-rule="evenodd" d="M1.25 8.5C1.25 8.08579 1.58579 7.75 2 7.75H3.5C3.91421 7.75 4.25 8.08579 4.25 8.5C4.25 8.91421 3.91421 9.25 3.5 9.25H2C1.58579 9.25 1.25 8.91421 1.25 8.5Z" fill="black" fill-rule="evenodd"/><path clip-rule="evenodd" d="M3.25 12.5C3.25 12.0858 3.58579 11.75 4 11.75H8C8.41421 11.75 8.75 12.0858 8.75 12.5C8.75 12.9142 8.41421 13.25 8 13.25H4C3.58579 13.25 3.25 12.9142 3.25 12.5Z" fill="black" fill-rule="evenodd"/><path clip-rule="evenodd" d="M12.376 8.58397C12.5151 8.37533 12.7492 8.25 13 8.25H17C17.2508 8.25 17.4849 8.37533 17.624 8.58397L19.624 11.584C19.792 11.8359 19.792 12.1641 19.624 12.416L17.624 15.416C17.4849 15.6247 17.2508 15.75 17 15.75H13C12.7492 15.75 12.5151 15.6247 12.376 15.416L10.376 12.416C10.208 12.1641 10.208 11.8359 10.376 11.584L12.376 8.58397ZM13.4014 9.75L11.9014 12L13.4014 14.25H16.5986L18.0986 12L16.5986 9.75H13.4014Z" fill="black" fill-rule="evenodd"/></svg>  <?php esc_html_e( 'Premium Features', 'foodie-blocks' ); ?></h3>

                                            <div class="wpz-grid-wrap">


                                                <div class="section premium-feature">
                                                    <h4><svg height="26" preserveAspectRatio="xMidYMid" version="1.1" viewBox="0 0 256 153" width="26" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M23.7586644,0 L232.137438,0 C245.324643,0 256,10.6753566 256,23.8625617 L256,103.404434 C256,116.591639 245.324643,127.266996 232.137438,127.266996 L157.409942,127.266996 L167.666657,152.385482 L122.558043,127.266996 L23.8633248,127.266996 C10.6761196,127.266996 0.000763038458,116.591639 0.000763038458,103.404434 L0.000763038458,23.8625617 C-0.10389732,10.7800169 10.5714592,0 23.7586644,0 L23.7586644,0 Z" fill="#9B5C8F"/><path d="M14.5781994,21.7495935 C16.0351099,19.7723577 18.2204758,18.7317073 21.1342969,18.5235772 C26.441614,18.1073171 29.4595002,20.604878 30.1879555,26.0162602 C33.4139717,47.7658537 36.9521831,66.1853659 40.6985246,81.2747967 L63.4887685,37.8796748 C65.5700693,33.9252033 68.1716953,31.8439024 71.2936465,31.6357724 C75.8725083,31.3235772 78.6822644,34.2373984 79.8269798,40.3772358 C82.4286059,54.2178862 85.7586872,65.9772358 89.7131587,75.9674797 C92.4188498,49.5349593 96.9977116,30.4910569 103.449744,18.7317073 C105.01072,15.8178862 107.300151,14.3609756 110.318037,14.1528455 C112.711533,13.9447154 114.896899,14.6731707 116.874134,16.2341463 C118.85137,17.795122 119.89202,19.7723577 120.100151,22.1658537 C120.204216,24.0390244 119.89202,25.6 119.0595,27.1609756 C115.000964,34.6536585 111.670882,47.2455285 108.965191,64.7284553 C106.363565,81.6910569 105.42698,94.9073171 106.05137,104.377236 C106.2595,106.978862 105.84324,109.268293 104.80259,111.245528 C103.553809,113.534959 101.680638,114.78374 99.2871424,114.99187 C96.5814514,115.2 93.7716953,113.95122 91.0660042,111.141463 C81.3879555,101.255285 73.6871424,86.4780488 68.0676303,66.8097561 C61.3034026,80.1300813 56.3082807,90.1203252 53.0822644,96.7804878 C46.942427,108.539837 41.739175,114.57561 37.3684433,114.887805 C34.5586872,115.095935 32.1651912,112.702439 30.0838904,107.707317 C24.7765733,94.0747967 19.0529961,67.7463415 12.9131587,28.7219512 C12.4968985,26.0162602 13.1212888,23.6227642 14.5781994,21.7495935 Z M238.213972,38.0878049 C234.46763,31.5317073 228.952183,27.5772358 221.563565,26.0162602 C219.586329,25.6 217.713159,25.3918699 215.944053,25.3918699 C205.953809,25.3918699 197.836736,30.595122 191.488768,41.001626 C186.077386,49.8471545 183.371695,59.6292683 183.371695,70.3479675 C183.371695,78.3609756 185.036736,85.2292683 188.366817,90.9528455 C192.113159,97.5089431 197.628606,101.463415 205.017224,103.02439 C206.99446,103.44065 208.86763,103.64878 210.636736,103.64878 C220.731045,103.64878 228.848118,98.4455285 235.09202,88.0390244 C240.503403,79.0894309 243.209094,69.3073171 243.209094,58.5886179 C243.313159,50.4715447 241.544053,43.7073171 238.213972,38.0878049 Z M225.101777,66.9138211 C223.644866,73.7821138 221.04324,78.8813008 217.192834,82.3154472 C214.174947,85.0211382 211.365191,86.1658537 208.763565,85.6455285 C206.266004,85.1252033 204.184703,82.9398374 202.623728,78.8813008 C201.374947,75.6552846 200.750557,72.4292683 200.750557,69.4113821 C200.750557,66.8097561 200.958687,64.2081301 201.479012,61.8146341 C202.415598,57.5479675 204.184703,53.3853659 206.99446,49.4308943 C210.428606,44.3317073 214.070882,42.2504065 217.817224,42.9788618 C220.314785,43.499187 222.396086,45.6845528 223.957061,49.7430894 C225.205842,52.9691057 225.830232,56.195122 225.830232,59.2130081 C225.830232,61.9186992 225.622102,64.5203252 225.101777,66.9138211 Z M173.069256,38.0878049 C169.322915,31.5317073 163.703403,27.5772358 156.41885,26.0162602 C154.441614,25.6 152.568443,25.3918699 150.799338,25.3918699 C140.809094,25.3918699 132.69202,30.595122 126.344053,41.001626 C120.932671,49.8471545 118.22698,59.6292683 118.22698,70.3479675 C118.22698,78.3609756 119.89202,85.2292683 123.222102,90.9528455 C126.968443,97.5089431 132.48389,101.463415 139.872508,103.02439 C141.849744,103.44065 143.722915,103.64878 145.49202,103.64878 C155.586329,103.64878 163.703403,98.4455285 169.947305,88.0390244 C175.358687,79.0894309 178.064378,69.3073171 178.064378,58.5886179 C178.064378,50.4715447 176.399338,43.7073171 173.069256,38.0878049 Z M159.852996,66.9138211 C158.396086,73.7821138 155.79446,78.8813008 151.944053,82.3154472 C148.926167,85.0211382 146.116411,86.1658537 143.514785,85.6455285 C141.017224,85.1252033 138.935923,82.9398374 137.374947,78.8813008 C136.126167,75.6552846 135.501777,72.4292683 135.501777,69.4113821 C135.501777,66.8097561 135.709907,64.2081301 136.230232,61.8146341 C137.166817,57.5479675 138.935923,53.3853659 141.745679,49.4308943 C145.179825,44.3317073 148.822102,42.2504065 152.568443,42.9788618 C155.066004,43.499187 157.147305,45.6845528 158.708281,49.7430894 C159.957061,52.9691057 160.581451,56.195122 160.581451,59.2130081 C160.685516,61.9186992 160.373321,64.5203252 159.852996,66.9138211 L159.852996,66.9138211 L159.852996,66.9138211 Z" fill="#FFFFFF"/></g></svg> <?php esc_html_e( 'WooCommerce Support', 'foodie-blocks' ); ?>
                                                    </h4>
                                                    <p class="about">
                                                        <?php esc_html_e( 'Need to sell something? With the Foodie Blocks PRO theme, you can build your shop and start selling anything easily! The theme is fully compatible with the WooCommerce plugin.', 'foodie-blocks' ); ?>
                                                    </p>
                                                </div>


                                                <div class="section premium-feature">

                                                      <h4><svg width="20" height="20" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M34 0H14C12.4087 0 10.8826 0.632141 9.75736 1.75736C8.63214 2.88258 8 4.4087 8 6V8H6C4.4087 8 2.88258 8.63214 1.75736 9.75736C0.632141 10.8826 0 12.4087 0 14V34C0 35.5913 0.632141 37.1174 1.75736 38.2426C2.88258 39.3679 4.4087 40 6 40H26C27.5913 40 29.1174 39.3679 30.2426 38.2426C31.3679 37.1174 32 35.5913 32 34V32H34C35.5913 32 37.1174 31.3679 38.2426 30.2426C39.3679 29.1174 40 27.5913 40 26V6C40 4.4087 39.3679 2.88258 38.2426 1.75736C37.1174 0.632141 35.5913 0 34 0ZM28 34C28 34.5304 27.7893 35.0391 27.4142 35.4142C27.0391 35.7893 26.5304 36 26 36H6C5.46957 36 4.96086 35.7893 4.58579 35.4142C4.21071 35.0391 4 34.5304 4 34V20H28V34ZM28 16H4V14C4 13.4696 4.21071 12.9609 4.58579 12.5858C4.96086 12.2107 5.46957 12 6 12H26C26.5304 12 27.0391 12.2107 27.4142 12.5858C27.7893 12.9609 28 13.4696 28 14V16ZM36 26C36 26.5304 35.7893 27.0391 35.4142 27.4142C35.0391 27.7893 34.5304 28 34 28H32V14C31.9946 13.3177 31.8728 12.6413 31.64 12H36V26ZM36 8H12V6C12 5.46957 12.2107 4.96086 12.5858 4.58579C12.9609 4.21071 13.4696 4 14 4H34C34.5304 4 35.0391 4.21071 35.4142 4.58579C35.7893 4.96086 36 5.46957 36 6V8Z" fill="#242628"/>
                                                        </svg> <?php esc_html_e( 'Custom Page Templates', 'foodie-blocks' ); ?> </h4>
                                                        <p class="about">
                                                            <?php esc_html_e( 'With the built-in page templates, you can quickly add useful pages to your website. The PRO version includes layouts crafted specifically for food recipe sites.', 'foodie-blocks' ); ?>
                                                        </p>
                                                        <p class="section_footer">
                                                            <a href="<?php echo esc_url( __( 'https://demo.wpzoom.com/foodie-blocks', 'foodie-blocks' ) ); ?>" target="_blank" class="button button-primary">
                                                                <?php esc_html_e( 'Foodie Blocks PRO Demos &rarr;', 'foodie-blocks' ); ?>
                                                            </a>

                                                        </p>
                                                </div>


                                                <div class="section premium-feature">

                                                      <h4><svg enable-background="new 0 0 26 26"  width="26" height="26" version="1.1" viewBox="0 0 26 26" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M6.75,18.5h-5C1.3359375,18.5,1,18.8359375,1,19.25v5C1,24.6640625,1.3359375,25,1.75,25h5   c0.4140625,0,0.75-0.3359375,0.75-0.75v-5C7.5,18.8359375,7.1640625,18.5,6.75,18.5z M6,23.5H2.5V20H6V23.5z" fill="#1D1D1B"/><path d="M24.25,18.5h-5c-0.4140625,0-0.75,0.3359375-0.75,0.75v5c0,0.4140625,0.3359375,0.75,0.75,0.75h5   c0.4140625,0,0.75-0.3359375,0.75-0.75v-5C25,18.8359375,24.6640625,18.5,24.25,18.5z M23.5,23.5H20V20h3.5V23.5z" fill="#1D1D1B"/><path d="M15.5,18.5h-5c-0.4140625,0-0.75,0.3359375-0.75,0.75v5c0,0.4140625,0.3359375,0.75,0.75,0.75h5   c0.4140625,0,0.75-0.3359375,0.75-0.75v-5C16.25,18.8359375,15.9140625,18.5,15.5,18.5z M14.75,23.5h-3.5V20h3.5V23.5z" fill="#1D1D1B"/><path d="M6.75,9.75h-5C1.3359375,9.75,1,10.0859375,1,10.5v5c0,0.4140625,0.3359375,0.75,0.75,0.75h5   c0.4140625,0,0.75-0.3359375,0.75-0.75v-5C7.5,10.0859375,7.1640625,9.75,6.75,9.75z M6,14.75H2.5v-3.5H6V14.75z" fill="#1D1D1B"/><path d="M24.25,9.75h-5c-0.4140625,0-0.75,0.3359375-0.75,0.75v5c0,0.4140625,0.3359375,0.75,0.75,0.75h5   c0.4140625,0,0.75-0.3359375,0.75-0.75v-5C25,10.0859375,24.6640625,9.75,24.25,9.75z M23.5,14.75H20v-3.5h3.5V14.75z" fill="#1D1D1B"/><path d="M15.5,9.75h-5c-0.4140625,0-0.75,0.3359375-0.75,0.75v5c0,0.4140625,0.3359375,0.75,0.75,0.75h5   c0.4140625,0,0.75-0.3359375,0.75-0.75v-5C16.25,10.0859375,15.9140625,9.75,15.5,9.75z M14.75,14.75h-3.5v-3.5h3.5V14.75z" fill="#1D1D1B"/><path d="M6.75,1h-5C1.3359375,1,1,1.3359375,1,1.75v5C1,7.1640625,1.3359375,7.5,1.75,7.5h5   c0.4140625,0,0.75-0.3359375,0.75-0.75v-5C7.5,1.3359375,7.1640625,1,6.75,1z M6,6H2.5V2.5H6V6z" fill="#1D1D1B"/><path d="M24.25,1h-5c-0.4140625,0-0.75,0.3359375-0.75,0.75v5c0,0.4140625,0.3359375,0.75,0.75,0.75h5   C24.6640625,7.5,25,7.1640625,25,6.75v-5C25,1.3359375,24.6640625,1,24.25,1z M23.5,6H20V2.5h3.5V6z" fill="#1D1D1B"/><path d="M15.5,1h-5c-0.4140625,0-0.75,0.3359375-0.75,0.75v5c0,0.4140625,0.3359375,0.75,0.75,0.75h5   c0.4140625,0,0.75-0.3359375,0.75-0.75v-5C16.25,1.3359375,15.9140625,1,15.5,1z M14.75,6h-3.5V2.5h3.5V6z" fill="#1D1D1B"/></g></svg> <?php esc_html_e( 'Block Patterns for Food Blogs', 'foodie-blocks' ); ?> </h4>
                                                        <p class="about">
                                                            <?php esc_html_e( 'The PRO version includes additional block patterns to help you build unique page layouts. You can find different patterns to add sections like recipe categories, call-to-actions and more!', 'foodie-blocks' ); ?>
                                                        </p>

                                                </div>

                                                <div class="section premium-feature">
                                                    <h4><svg id="Icons" width="26" style="enable-background:new 0 0 32 32;" version="1.1" viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><style type="text/css">.st0{fill:none;stroke:#000000;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}</style><line class="st0" x1="3" x2="29" y1="11" y2="11"/><g><path d="M7,9C6.7,9,6.5,8.9,6.3,8.7C6.1,8.5,6,8.3,6,8c0-0.3,0.1-0.5,0.3-0.7c0,0,0.1-0.1,0.1-0.1c0.1,0,0.1-0.1,0.2-0.1   C6.7,7,6.7,7,6.8,7c0.1,0,0.3,0,0.4,0c0.1,0,0.1,0,0.2,0.1c0.1,0,0.1,0.1,0.2,0.1c0,0,0.1,0.1,0.1,0.1c0.1,0.1,0.2,0.2,0.2,0.3   C8,7.7,8,7.9,8,8c0,0.1,0,0.3-0.1,0.4C7.9,8.5,7.8,8.6,7.7,8.7C7.5,8.9,7.3,9,7,9z"/></g><g><path d="M10,9C9.7,9,9.5,8.9,9.3,8.7C9.1,8.5,9,8.3,9,8c0-0.1,0-0.3,0.1-0.4c0.1-0.1,0.1-0.2,0.2-0.3c0.1-0.1,0.2-0.2,0.3-0.2   C10,6.9,10.4,7,10.7,7.3c0.1,0.1,0.2,0.2,0.2,0.3C11,7.7,11,7.9,11,8c0,0.3-0.1,0.5-0.3,0.7C10.5,8.9,10.3,9,10,9z"/></g><g><path d="M13,9c-0.1,0-0.3,0-0.4-0.1c-0.1-0.1-0.2-0.1-0.3-0.2c-0.1-0.1-0.2-0.2-0.2-0.3C12,8.3,12,8.1,12,8c0-0.1,0-0.3,0.1-0.4   c0.1-0.1,0.1-0.2,0.2-0.3c0.4-0.4,1-0.4,1.4,0c0.1,0.1,0.2,0.2,0.2,0.3C14,7.7,14,7.9,14,8c0,0.1,0,0.3-0.1,0.4   c-0.1,0.1-0.1,0.2-0.2,0.3C13.5,8.9,13.3,9,13,9z"/></g><path class="st0" d="M27,5H5C3.9,5,3,5.9,3,7v18c0,1.1,0.9,2,2,2h22c1.1,0,2-0.9,2-2V7C29,5.9,28.1,5,27,5z"/><line class="st0" x1="3" x2="19" y1="19" y2="19"/><line class="st0" x1="19" x2="19" y1="11" y2="27"/></svg> <?php esc_html_e( 'Multiple Header & Footer Layouts', 'foodie-blocks' ); ?>
                                                    </h4>
                                                    <p class="about">
                                                        <?php esc_html_e( 'Upgrading to the Premium version, you will get access to Multiple Header & Footer Layouts.', 'foodie-blocks' ); ?>
                                                    </p>

                                                </div>



                                            </div>

                                            <span class="many-more"><?php esc_html_e( 'And many other premium features...', 'foodie-blocks' ); ?></span>

                                            <a href="<?php echo esc_url( __( 'https://www.wpzoom.com/themes/foodie-blocks/', 'foodie-blocks' ) ); ?>" target="_blank" class="button button-large button-primary">
                                                <?php esc_html_e( 'Get Foodie Blocks PRO Today &rarr;', 'foodie-blocks' ); ?>
                                            </a>

                                    </div>

                            </div>

                            <div id="vs-pro" class="wpz-onboard_content-main-tab">

                                <div class="theme-info-wrap">
                                <h3 class="wpz-onboard_content-main-title"><?php esc_html_e( 'Foodie Blocks Lite vs. Foodie Blocks PRO', 'foodie-blocks' ); ?></h3>
                                <p class="wpz-onboard_content-main-intro"><?php esc_html_e( 'Below is a comparison chart of the free and the premium versions.', 'foodie-blocks' ); ?></p>

                                <div class="theme-comparison">

                                            <table>
                                                <thead class="theme-comparison-header">
                                                    <tr>
                                                        <th class="table-feature-title"><h3><?php esc_html_e( 'Feature', 'foodie-blocks' ); ?></h3></th>
                                                        <th><h3><?php esc_html_e( 'Foodie Blocks Lite', 'foodie-blocks' ); ?></h3></th>
                                                        <th><h3><?php esc_html_e( 'Foodie Blocks PRO', 'foodie-blocks' ); ?></h3></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Responsive Layout', 'foodie-blocks' ); ?></h3></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Site Editor Support', 'foodie-blocks' ); ?></h3></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Block Patterns', 'foodie-blocks' ); ?></h3></td>
                                                        <td>5</td>
                                                        <td>15+</td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><strong><?php esc_html_e( 'Color Schemes', 'foodie-blocks' ); ?></strong></h3></td>
                                                        <td>2</td>
                                                        <td>6</td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Advanced WooCommerce Integration', 'foodie-blocks' ); ?></h3></td>
                                                        <td><span class="dashicons dashicons-no-alt"></span></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                    </tr>
                                                                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Demo Content Importer', 'foodie-blocks' ); ?></h3></td>
                                                        <td><span class="dashicons dashicons-no-alt"></span></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                    </tr>

                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Page Templates', 'foodie-blocks' ); ?></h3></td>
                                                        <td>2</td>
                                                        <td>5</td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><strong><?php esc_html_e( 'Recipe Index', 'foodie-blocks' ); ?></strong> <span class="table-new-promo">POPULAR FEATURE</span></h3></td>
                                                        <td><span class="dashicons dashicons-no-alt"></span></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Theme Options', 'foodie-blocks' ); ?></h3></td>
                                                        <td><span class="dashicons dashicons-no-alt"></span></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Google Fonts (Hosted Locally)', 'foodie-blocks' ); ?></h3></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Typography Options', 'foodie-blocks' ); ?></h3></td>
                                                        <td>Limited</td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Support', 'foodie-blocks' ); ?></h3></td>
                                                        <td><?php esc_html_e( 'Support Forum', 'foodie-blocks' ); ?></td>
                                                        <td><?php esc_html_e( 'Fast Email Support', 'foodie-blocks' ); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <a href="https://www.wpzoom.com/themes/foodie-blocks/" target="_blank" class="button button-primary">
                                                                <?php esc_html_e( 'Get Foodie Blocks PRO Today!', 'foodie-blocks' ); ?>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                            </div>

                        </div>

                        <div class="wpz-onboard_content-side">

                            <div class="wpz-onboard_content-side-section discover-premium">
                                <h3 class="wpz-onboard_content-side-section-title icon-docs">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <mask id="mask0_3409_3568" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                                    <rect width="24" height="24" fill="#222"/>
                                    </mask>
                                    <g mask="url(#mask0_3409_3568)">
                                    <path d="M19 9L17.75 6.25L15 5L17.75 3.75L19 1L20.25 3.75L23 5L20.25 6.25L19 9ZM19 23L17.75 20.25L15 19L17.75 17.75L19 15L20.25 17.75L23 19L20.25 20.25L19 23ZM9 20L6.5 14.5L1 12L6.5 9.5L9 4L11.5 9.5L17 12L11.5 14.5L9 20ZM9 15.15L10 13L12.15 12L10 11L9 8.85L8 11L5.85 12L8 13L9 15.15Z" fill="#289283"/>
                                    </g>
                                    </svg> <?php esc_html_e( 'Foodie Blocks PRO', 'foodie-blocks' ); ?></h3>
                                <p class="wpz-onboard_content-side-section-content"><?php esc_html_e( 'Upgrade to the Premium version to get instant access to unique features and dozen of pre-built demos!', 'foodie-blocks' ); ?></p>

                                <a href="https://www.wpzoom.com/themes/foodie-blocks/" title="Foodie Blocks PRO" target="_blank"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/admin/pro.png' ); ?>" width="300" alt="<?php echo esc_attr__( 'Foodie Blocks PRO', 'foodie-blocks' ); ?>" /></a>

                                <div class="wpz-onboard_content-side-section-button">
                                    <a href="https://www.wpzoom.com/themes/foodie-blocks/" title="Foodie Blocks" target="_blank" class="button"><?php esc_html_e( 'Discover the PRO Version &rarr;', 'foodie-blocks' ); ?></a>
                                </div>

                            </div>


                            <div class="wpz-onboard_content-side-section">
                                <h3 class="wpz-onboard_content-side-section-title icon-docs">
                                    <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.96074 2H19.9019C20.9965 2 21.8921 2.9 21.8921 4V16C21.8921 17.1 20.9965 18 19.9019 18H7.96074C6.86614 18 5.97055 17.1 5.97055 16V4C5.97055 2.9 6.86614 2 7.96074 2ZM1.99017 6H3.98036V20H17.9117V22H3.98036C2.88576 22 1.99017 21.1 1.99017 20V6ZM19.9019 16H7.96075V4H19.9019V16ZM17.9117 9H9.95093V11H17.9117V9ZM9.95093 12H13.9313V14H9.95093V12ZM17.9117 6H9.95093V8H17.9117V6Z"></path>
                                    </svg> <?php esc_html_e( 'Need help?', 'foodie-blocks' ); ?></h3>
                                <p class="wpz-onboard_content-side-section-content"><?php esc_html_e( 'Documentation is the place where you’ll find the information needed to setup the theme quickly, and other details about theme-specific features. You can also get in touch with our team by contacting us through our website or using the Support Forum.', 'foodie-blocks' ); ?></p>
                                <div class="wpz-onboard_content-side-section-button">
                                    <a href="https://www.wpzoom.com/documentation/foodie-blocks/" title="Read documentation" target="_blank" class="button"><?php esc_html_e( 'Documentation', 'foodie-blocks' ); ?></a> <a href="https://wordpress.org/support/theme/foodie-blocks/" title="Open Support Desk" target="_blank" class="button"><?php esc_html_e( 'Support Forums', 'foodie-blocks' ); ?></a>

                                </div>

                            </div>

                            <div class="wpz-onboard_content-side-section">
                            <div class="section">
                                <div class="inner-section">
                                    <?php
                                    $current_user = wp_get_current_user();
                                    ?>

                                    <h3 class="wpz-onboard_content-side-section-title">
                                        <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" width="21"><path d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z"/></svg> <?php esc_html_e( 'Subscribe for Tips & Tricks', 'foodie-blocks' ); ?>
                                    </h3>
                                    <p class="about">
                                        <?php esc_html_e( 'To ease up the journey you’re starting with Foodie Blocks, we’re sending you some useful tips & tricks to have the best experience building your website.', 'foodie-blocks' ); ?>
                                    </p>
                                    <p>
                                        <div id="mlb2-5662656" class="ml-form-embedContainer ml-subscribe-form ml-subscribe-form-5662656">
                                          <div class="ml-form-align-center">
                                            <div class="ml-form-embedWrapper embedForm">
                                              <div class="ml-form-embedBody ml-form-embedBodyDefault row-form">
                                                <form class="ml-block-form" action="https://static.mailerlite.com/webforms/submit/w5r9l0" data-code="w5r9l0" method="post" target="_blank">
                                                    <input aria-label="email" aria-required="true" type="email" value="<?php echo esc_attr($current_user->user_email); ?>" class="form-control" data-inputmask="" name="fields[email]" placeholder="Email" autocomplete="email">
                                                  <input type="hidden" name="ml-submit" value="1">
                                                  <span class="ml-form-embedSubmit">
                                                    <button type="submit" class="button button-primary">Subscribe</button>
                                                    <button disabled="disabled" style="display:none" type="button" class="loading button-primary"> <div class="ml-form-embedSubmitLoad"></div> <span class="sr-only">Loading...</span> </button>
                                                  </span>
                                                  <input type="hidden" name="anticsrf" value="true">
                                                </form>
                                              </div>
                                              <div class="ml-form-successBody row-success" style="display:none">
                                                <div class="ml-form-successContent">
                                                  <h3>Thank you!</h3>
                                                  <p>You have successfully joined our subscriber list.</p>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>

                                        <script>
                                          function ml_webform_success_5662656(){var r=ml_jQuery||jQuery;r(".ml-subscribe-form-5662656 .row-success").show(),r(".ml-subscribe-form-5662656 .row-form").hide()}
                                        </script>
                                        <img src="https://track.mailerlite.com/webforms/o/5662656/w5r9l0?v1651224972" width="1" height="1" style="max-width:1px;max-height:1px;visibility:hidden;padding:0;margin:0;display:block" alt="." border="0">
                                        <script src="https://static.mailerlite.com/js/w/webforms.min.js?v9b62042f798751c8de86a784eab23614" type="text/javascript"></script>                     </p>
                                </div>
                            </div>
                            </div>

                            <div class="wpz-onboard_content-side-section">
                                <h3 class="wpz-onboard_content-side-section-title icon-follow">
                                    <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M20.8971 9H14.618L15.5633 4.43L15.5932 4.11C15.5932 3.7 15.424 3.32 15.1553 3.05L14.1005 2L7.55281 8.59C7.18462 8.95 6.9657 9.45 6.9657 10V20C6.9657 21.1 7.86129 22 8.95589 22H17.9118C18.7377 22 19.4442 21.5 19.7427 20.78L22.7479 13.73C22.8375 13.5 22.8872 13.26 22.8872 13V11C22.8872 9.9 21.9917 9 20.8971 9ZM20.897 13L17.9117 20H8.95587V10L13.2746 5.66003L12.17 11H20.897V13ZM4.9755 10H0.995117V22H4.9755V10Z"></path>
                                    </svg> Follow WPZOOM
                                </h3>
                                <p class="wpz-onboard_content-side-section-content">Follow us on social media for news and updates on all your theme needs.</p>
                                <div class="wpz-onboard_content-side-section-button">
                                    <a href="https://twitter.com/wpzoom" target="_blank" title="Twitter" class="button button-smaller button-rounded"><span class="dashicons dashicons-twitter"></span> <span class="icon-text">Twitter</span></a>
                                    <a href="https://facebook.com/wpzoom" target="_blank" title="Facebook" class="button button-smaller button-rounded"><svg width="18" height="18" fill="#fff" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Facebook</title><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"></path></svg> <span class="icon-text">Facebook</span></a>
                                    <a href="https://instagram.com/wpzoom" target="_blank" title="Instagram" class="button button-smaller button-rounded"><span class="dashicons dashicons-instagram"></span> <span class="icon-text">Instagram</span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div> <!-- /#tabs -->

            <div class="wpz-onboard_footer">
                <h3 class="wpz-onboard_footer-logo"><a href="https://wpzoom.com/" title="WPZOOM">WPZOOM</a></h3>

                <ul class="wpz-onboard_footer-links">
                    <li class="wpz-onboard_footer-links-themes"><a href="https://www.wpzoom.com/themes/" target="_blank" title="Themes">Premium Themes</a></li>
                    <li class="wpz-onboard_footer-links-plugins"><a href="https://www.wpzoom.com/plugins/" target="_blank" title="Plugins">Plugins</a></li>
                    <li class="wpz-onboard_footer-links-blog"><a href="https://www.wpzoom.com/blog/" target="_blank" title="Blog">Our Blog</a></li>
                    <li class="wpz-onboard_footer-links-support"><a href="https://www.wpzoom.com/support/" target="_blank" title="Support">Support</a></li>
                </ul>
            </div>
        </div>

    <?php
}

?>