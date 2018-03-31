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
 * @uses  PAnD::is_admin_notice_active()
 */
function ddw_tbex_notice_settings_welcome() {

	/** Check if message should be displayed */
	if ( ! PAnD::is_admin_notice_active( 'tbex-notice-welcome-1' ) ) {
		return;
	}

	/** Display the message (once dismissed, forever hidden!) */
	?>
		<div data-dismissible="tbex-notice-welcome-forever" class="notice notice-info is-dismissible">
			<span class="dashicons-before dashicons-smiley tbex-smiley"></span>
			<h3><?php _e( 'Welcome to Toolbar Extras - Thank You for Using this Plugin!', 'toolbar-extras' ); ?></h3>
			<p><?php _e( 'Below you\'ll find all options for this plugin as well as all resources for support.', 'toolbar-extras' ); ?></p>
			<p class="description"><strong><?php _e( 'Have a great day and enjoy building your site.', 'toolbar-extras' ); ?></strong></p>
			<p><small>(<?php _e( 'This info is only shown once. When dismissed it will never appear again.', 'toolbar-extras' ); ?>)</small></p>
		</div>
	<?php

}  // end function