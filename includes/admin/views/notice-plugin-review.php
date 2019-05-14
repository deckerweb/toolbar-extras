<?php

// includes/admin/views/notice-plugin-review

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Load the "Astra Notices" class.
 * @since 1.4.0
 */
require_once TBEX_PLUGIN_DIR . 'includes/admin/classes/astra-notices/class-astra-notices.php';


add_action( 'admin_enqueue_scripts', 'ddw_tbex_enqueue_notice_review_styles' );
/**
 * Enqueue CSS styles for admin notice for plugin review.
 *
 * @since 1.4.0
 *
 * @see plugin file: /assets/css/tbex-notices.css
 *
 * @uses ddw_tbex_is_notice_review_allowed()
 * @uses get_current_screen()
 */
function ddw_tbex_enqueue_notice_review_styles() {

	/** Bail early if no notice styles wanted */
	if ( ! ddw_tbex_is_notice_review_allowed( get_current_screen() ) ) {
		return;
	}

	wp_register_style(
		'tbex-notice-review',
		plugins_url( '/assets/css/tbex-notices.css', dirname( dirname( dirname( __FILE__ ) ) ) ),
		array(),
		TBEX_PLUGIN_VERSION,
		'screen'
	);

	wp_enqueue_style( 'tbex-notice-review' );

}  // end function


add_action( 'admin_notices', 'ddw_tbex_register_notice_plugin_review' );
/**
 * Display optional Admin Notice for a plugin review.
 *
 * @since 1.4.0
 *
 * @see plugin file /includes/admin/classes/astra-notices/class-astra-notices.php
 *
 * @uses ddw_tbex_is_notice_review_allowed()
 * @uses get_current_screen()
 * @uses Astra_Notices::add_notice()
 * @uses ddw_tbex_string_toolbar_extras()
 * @uses ddw_tbex_get_info_url()
 */
function ddw_tbex_register_notice_plugin_review() {

	/** Bail early if no notice display wanted */
	if ( ! ddw_tbex_is_notice_review_allowed( get_current_screen() ) ) {
		return;
	}

	/**
	 * The repeat after value: 2 weeks plus X
	 *   'X' will be a value between 1 and 10 days
	 *
	 *   Determines before:
	 *   - the notice first appears
	 *   - showing up again - when as "maybe later" dismissed
	 */
	$repeat_after = ( 2 * WEEK_IN_SECONDS ) + ( mt_rand(1, 10) * DAY_IN_SECONDS );
	//$repeat_after = ( 5 * MINUTE_IN_SECONDS ) + ( mt_rand(1, 10) * MINUTE_IN_SECONDS );  // dev testing

	if ( FALSE === get_option( 'tbex-plugin-old-setup' ) ) {

		set_transient( 'tbex-notice-plugin-first-rating', TRUE, $repeat_after );
		update_option( 'tbex-plugin-old-setup', TRUE );

	} elseif ( FALSE === get_transient( 'tbex-notice-plugin-first-rating' ) ) {

		$image_path = ddw_tbex_get_info_url( 'plugin_icon_svg' );

		$rating = sprintf(
			/* translators: %s - 5 stars icons */
			'<a class="astra-notice-close" href="' . ddw_tbex_get_info_url( 'url_wporg_review' ) . '" target="_blank" rel="nofollow noopener noreferrer">' . __( '%s 5-star rating', 'toolbar-extras' ) . '</a>',
			'&#9733;&#9733;&#9733;&#9733;&#9733;'
		);

		Astra_Notices::add_notice(
			array(
				'id'                         => 'tbex-plugin-rating',
				'type'                       => '',
				'message'                    => sprintf(
					'<div class="notice-image">
						<a class="astra-notice-close" href="%4$s" target="_blank" rel="nofollow noopener noreferrer"><img src="%1$s" class="custom-logo" alt="Toolbar Extras" itemprop="logo"></a>
					</div> 
					<div class="notice-content">
						<div class="notice-heading">
							%2$s
						</div>
						%3$s<br />
						<div class="astra-review-notice-container">
							<a href="%4$s" class="astra-notice-close astra-review-notice button-primary" target="_blank" rel="nofollow noopener noreferrer">
								<span class="dashicons dashicons-external"></span> <strong>%5$s</strong>
							</a>
							<span class="dashicons dashicons-calendar"></span>
							<a href="#" data-repeat-notice-after="%6$s" class="astra-notice-close astra-review-notice">
								%7$s
							</a>
							<span class="dashicons dashicons-smiley"></span>
							<a href="#" class="astra-notice-close astra-review-notice">
								%8$s
							</a>
						</div>
					</div>',
					$image_path,
					sprintf(
						/* translators: %s - name of the plugin, "Toolbar Extras" */
						__( 'Hello! Seems like you have optimized your admin bar experience with %s — Thanks so much!', 'toolbar-extras' ),
						'<span class="dashicons-before dashicons-arrow-up-alt tbex-notice-colored"></span><strong class="tbex-notice-colored">' . ddw_tbex_string_toolbar_extras() . '</strong>'
					),
					sprintf(
						/* translators: %s - icons and string, "5-star reating" */
						__( 'Could you please do me a BIG favor and give it a %s on WordPress.org? This would boost my motivation and help other users make a comfortable decision while saving time for various tasks of a site builder.', 'toolbar-extras' ),
						$rating
					),
					ddw_tbex_get_info_url( 'url_wporg_review' ),
					__( 'Ok, you deserve it', 'toolbar-extras' ),
					$repeat_after,
					__( 'Maybe later', 'toolbar-extras' ),
					__( 'I already did', 'toolbar-extras' )
				),
				'repeat-notice-after'        => $repeat_after,
				'priority'                   => 10,
				'display-with-other-notices' => TRUE,
			)
		);

	}  // end if

}  // end function
