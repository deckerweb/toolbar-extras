<?php

// includes/admin/views/notice-settings-welcome

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Welcome notice on plugin's own settings page - Onboarding for new users.
 *
 * @since 1.0.0
 *
 * @uses PAnD::is_admin_notice_active()
 * @uses ddw_tbex_get_info_url()
 * @uses ddw_tbex_string_notice_shown_once()
 */
function ddw_tbex_notice_settings_welcome() {

	/** Check if message should be displayed */
	if ( ! PAnD::is_admin_notice_active( 'tbex-notice-welcome-forever' )
		|| 'forever' === get_site_transient( 'tbex-notice-welcome' )
	) {
		return;
	}

	/** Display the message (once dismissed, forever hidden!) */
	?>
		<div data-dismissible="tbex-notice-welcome-forever" class="notice notice-info is-dismissible">
			<span class="dashicons-before dashicons-smiley tbex-smiley"></span>
			<h3><?php _e( 'Welcome to Toolbar Extras - Thank You for Using this Plugin!', 'toolbar-extras' ); ?></h3>
			<p><?php echo __( 'Video with short summary of what the plugin does', 'toolbar-extras' ) . ': &nbsp;' . sprintf(
				'<a class="thickbox button" href="%1$s" title="%2$s"><span class="dashicons-before dashicons-video-alt3 tbex-videos"></span> %3$s</a>',
				ddw_tbex_get_info_url( 'url_video_tour' ),
				esc_html__( 'Toolbar Extras Plugin - the Video Tour', 'toolbar-extras' ),
				esc_attr__( 'See the Video Tour', 'toolbar-extras' )
			); ?></p>
			<p><?php _e( 'Below you\'ll find all options for this plugin as well as all resources for support.', 'toolbar-extras' ); ?></p>
			<p class="description"><strong><?php _e( 'Have a great day and enjoy building your site.', 'toolbar-extras' ); ?></strong></p>
			<p><small>(<?php echo ddw_tbex_string_notice_shown_once(); ?>)</small></p>
		</div>
	<?php

}  // end function
