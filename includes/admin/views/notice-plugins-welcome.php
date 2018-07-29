<?php

// includes/admin/views/notice-plugins-welcome

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Welcome notice on plugins page - Onboarding for new users.
 *
 * @since  1.0.0
 *
 * @uses   PAnD::is_admin_notice_active()
 *
 * @global $GLOBALS[ 'pagenow' ]
 */
function ddw_tbex_notice_plugins_welcome() {

	/** Check if message should be displayed */
	if ( ! PAnD::is_admin_notice_active( 'tbex-notice-plugins-welcome-forever' )
		|| ! is_plugin_active( 'toolbar-extras/toolbar-extras.php' )
		|| 'plugins.php' !== $GLOBALS[ 'pagenow' ]
	) {
		return;
	}

	$settings_link = sprintf(
		' <a href="%1$s">%2$s &rarr; %3$s</a>',
		esc_url( admin_url( 'options-general.php?page=toolbar-extras' ) ),
		/* translators: Label for "Settings" in left-hand admin menu */
		esc_attr__( 'Settings', 'toolbar-extras' ),
		/* translators: Label for "Toolbar Extras" sub-menu item in left-hand admin menu */
		esc_attr__( 'Toolbar Extras', 'toolbar-extras' )
	);

	$menu_link = sprintf(
		' <a href="%1$s">%2$s &rarr; %3$s</a>',
		esc_url( admin_url( 'nav-menus.php?action=edit&menu=0&use-location=tbex_menu' ) ),		// add new menu & set our location!
		/* translators: Label for "Appearance" in left-hand admin menu */
		esc_attr__( 'Appearance', 'toolbar-extras' ),
		/* translators: Label for "Menus" sub-menu item in left-hand admin menu */
		esc_attr__( 'Menus', 'toolbar-extras' )
	);

	/** Display the message (once dismissed, forever hidden!) */
	?>
		<div data-dismissible="tbex-notice-plugins-welcome-forever" class="notice notice-success is-dismissible">	
			<h3><?php _e( 'Thank You for Installing and Activating the Toolbar Extras Plugin!', 'toolbar-extras' ); ?></h3>
			<p><span class="dashicons-before dashicons-admin-generic"></span> <?php echo __( 'You\'ll find the plugin\'s settings under:', 'toolbar-extras' ) . $settings_link; ?></p>
			<p><span class="dashicons-before dashicons-menu"></span> <?php echo __( 'To create an (optional) Admin Toolbar Menu just build a new menu here:', 'toolbar-extras' ) . $menu_link; ?></p>
			<p><small>(<?php echo ddw_tbex_string_notice_shown_once(); ?>)</small></p>
		</div>
	<?php

}  // end function