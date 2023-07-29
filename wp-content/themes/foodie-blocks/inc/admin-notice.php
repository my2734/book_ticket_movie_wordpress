<?php
/**
 * Admin notice after Theme activation
 *
 * @package Foodie Blocks
 * @subpackage foodie_blocks_Lite
 * @since Foodie Blocks 1.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'foodie_blocks_admin_notice' ) ) {
	/**
	 * Welcome Notice after Theme Activation
	 *
	 * @return void
	 */
	function foodie_blocks_admin_notice() {
		global $pagenow, $foodie_blocks_version;

		$welcome_notice        = get_option( 'foodie_blocks_notice_welcome' );
		$current_user_can      = current_user_can( 'edit_theme_options' );
		$should_display_notice = ( $current_user_can && 'index.php' === $pagenow && ! $welcome_notice ) || ( $current_user_can && 'themes.php' === $pagenow && isset( $_GET['activated'] ) && ! $welcome_notice ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended

		if ( $should_display_notice ) {
            wp_enqueue_style( 'welcome-notice', get_template_directory_uri() . '/assets/admin/css/welcome-notice.css' );

			foodie_blocks_welcome_notice();
		}
	}
}
add_action( 'admin_notices', 'foodie_blocks_admin_notice' );

if ( ! function_exists( 'foodie_blocks_hide_notice' ) ) {
	/**
	 * Hide Welcome Notice in WordPress Dashboard
	 *
	 * @return void
	 */
	function foodie_blocks_hide_notice() {
		if ( isset( $_GET['foodie-blocks-hide-notice'] ) && isset( $_GET['_foodie_blocks_notice_nonce'] ) ) {
			if ( ! check_admin_referer( 'foodie_blocks_hide_notices_nonce', '_foodie_blocks_notice_nonce' ) ) {
				wp_die( esc_html__( 'Action failed. Please refresh the page and retry.', 'foodie-blocks' ) );
			}

			if ( ! current_user_can( 'edit_theme_options' ) ) {
				wp_die( esc_html__( 'You do not have the necessary permission to perform this action.', 'foodie-blocks' ) );
			}

			$hide_notice = sanitize_text_field( wp_unslash( $_GET['foodie-blocks-hide-notice'] ) );
			update_option( 'foodie_blocks_notice_' . $hide_notice, 1 );
		}
	}
}
add_action( 'wp_loaded', 'foodie_blocks_hide_notice' );

if ( ! function_exists( 'foodie_blocks_welcome_notice' ) ) {
	/**
	 * Content of Welcome Notice in WordPress Dashboard
	 *
	 * @return void
	 */
	function foodie_blocks_welcome_notice() {
		?>
		<div class="notice wpz-welcome-notice">
			<a class="notice-dismiss wpz-welcome-notice-hide" href="<?php echo esc_url( wp_nonce_url( remove_query_arg( array( 'activated' ), add_query_arg( 'foodie-blocks-hide-notice', 'welcome' ) ), 'foodie_blocks_hide_notices_nonce', '_foodie_blocks_notice_nonce' ) ); ?>">
				<span class="screen-reader-text">
					<?php echo esc_html__( 'Dismiss this notice.', 'foodie-blocks' ); ?>
				</span>
			</a>

            <div class="wpz-notice-image">
                <a href="https://www.wpzoom.com/themes/foodie-blocks/" title="Foodie Blocks" target="_blank"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/admin/foodie-blocks-top.png' ); ?>" width="233" alt="<?php echo esc_attr__( 'Foodie Blocks', 'foodie-blocks' ); ?>" /></a>
            </div>

            <div class="wpz-notice-text">

                <h3><?php echo esc_html__( 'Discover Foodie Blocks', 'foodie-blocks' ); ?></h3>
    			<p>
    			<?php
    			/* translators: %1$s: Foodie Blocks theme %2$s: anchor tag open %3$s: anchor tag close */
    			printf( esc_html__( 'Thank you for installing %1$s theme! To get started please make sure you visit the %2$sgetting started page%3$s.', 'foodie-blocks' ), 'Foodie Blocks', '<a target="_blank" href="' . esc_url( admin_url( 'themes.php?page=foodie_blocks' ) ) . '">', '</a>' );
    			?>
    			</p>
    			<div class="wpz-welcome-notice-button">
    				<a class="button button-primary" href="<?php echo esc_url( admin_url( 'themes.php?page=foodie_blocks' ) ); ?>">
    					<?php
    					/* translators: %s: Foodie Blocks theme */
    					printf( esc_html__( '%s Dashboard &rarr;', 'foodie-blocks' ), 'Foodie Blocks' );
    					?>
    				</a>
    				<a class="button button-secondary" href="<?php echo esc_url( __( 'https://www.wpzoom.com/themes/foodie-blocks/', 'foodie-blocks' ) ); ?>" target="_blank">
    					<?php esc_html_e( 'Discover Foodie Blocks PRO &rarr;', 'foodie-blocks' ); ?>
    				</a>
    			</div>
            </div>
		</div>
		<?php
	}
}
