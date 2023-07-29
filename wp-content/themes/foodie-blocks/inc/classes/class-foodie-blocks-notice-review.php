<?php
/**
 * Theme admin leave review notice
 *
 * @package Foodie Blocks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main PHP class for notice review
 */
class Foodie_Blocks_Notice_Review extends Foodie_Blocks_Notices {

	/**
	 * The constructor.
	 */
	public function __construct() {
		add_action( 'wp_loaded', array( $this, 'review_notice' ), 20 );
		add_action( 'wp_loaded', array( $this, 'hide_notices' ), 15 );

		$this->current_user_id = get_current_user_id();
	}

	/**
	 * Update option 'foodie_blocks_theme_installed_time' if is not exists
	 * Add action if notice wasn't dismissed
	 *
	 * @return void
	 */
	public function review_notice() {
        global $pagenow, $foodie_blocks_version;

		if ( ! get_option( 'foodie_blocks_theme_installed_time' ) ) {
			update_option( 'foodie_blocks_theme_installed_time', time() );
		}

		$this_notice_was_dismissed = $this->get_notice_status( 'review-user-' . $this->current_user_id );

        $current_user_can      = current_user_can( 'edit_theme_options' );

        $should_display_notice = ( $current_user_can && 'index.php' === $pagenow  ) || ( $current_user_can && 'themes.php' === $pagenow && isset( $_GET['activated'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended

        if ( $should_display_notice ) {

    		if ( ! $this_notice_was_dismissed ) {

                wp_enqueue_style( 'welcome-notice', get_template_directory_uri() . '/assets/admin/css/welcome-notice.css' );

    			add_action( 'admin_notices', array( $this, 'review_notice_markup' ) ); // Display this notice.
    		}

        }
	}

	/**
	 * Show HTML markup if conditions meet
	 *
	 * @return void
	 */
	public function review_notice_markup() {
		$dismiss_url = wp_nonce_url(
			remove_query_arg( array( 'activated' ), add_query_arg( 'foodie-blocks-hide-notice', 'review-user-' . $this->current_user_id ) ),
			'foodie_blocks_hide_notices_nonce',
			'_foodie_blocks_notice_nonce'
		);

		$theme_data   = wp_get_theme();
		$current_user = wp_get_current_user();

		if ( ( get_option( 'foodie_blocks_theme_installed_time' ) > strtotime( '-4 day' ) ) ) {
			return;
		}
		?>
		<div id="message" class="notice foodie-blocks-notice foodie-blocks-review-notice wpz-welcome-notice">
			<a class="foodie-blocks-message-close notice-dismiss" href="<?php echo esc_url( $dismiss_url ); ?>"></a>

				<div class="wpz-notice-image">
					<img class="foodie-blocks-screenshot" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/admin/foodie-blocks-top.png" width="233" alt="<?php esc_attr_e( 'Foodie Blocks', 'foodie-blocks' ); ?>" />
				</div>
				<div class="wpz-notice-text">

                    <h3><?php echo esc_html__( 'Leave us a review!', 'foodie-blocks' ); ?></h3>

					<p>
						<?php
						printf(
							/* Translators: %1$s current user display name. */
							esc_html__(
								'We hope you are enjoying the %1$s theme! %2$sIf you can spare a moment, please consider adding a review on WordPress.org.',
								'foodie-blocks'
							),
							// phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
							'<a href="' . esc_url( admin_url( 'themes.php?page=foodie_blocks' ) ) . '"><strong>' . esc_html( $theme_data->Name ) . '</strong></a>',
							'<br>'
						);
						?>
					</p>

                    <div class="wpz-welcome-notice-button">

					   <a href="https://wordpress.org/support/theme/foodie-blocks/reviews/?rate=5#new-post" class="button button-primary" target="_blank"><span class="dashicons dashicons-star-filled"></span> <?php esc_html_e( 'Leave a Review', 'foodie-blocks' ); ?></a>

    					<a href="<?php echo esc_url( $dismiss_url ); ?>" class="button button-secondary"><?php esc_html_e( 'Hide this notice', 'foodie-blocks' ); ?></a>
    					</a>
                    </div>

				</div><!-- .foodie-blocks-message-text -->

		</div><!-- #message -->
		<?php
	}
}

new Foodie_Blocks_Notice_Review();
