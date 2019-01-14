<?php

// includes/admin/views/help-content-menus

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Create and display plugin help tab content.
 *
 * @since 1.0.0
 * @since 1.4.0 Refactored and enhanced.
 *
 * @uses ddw_tbex_help_tab_content_header()
 * @uses ddw_tbex_display_items_super_admin_nav_menu()
 * @uses ddw_tbex_help_content_super_admin_menu()
 * @uses ddw_tbex_help_tab_content_footer()
 *
 * @return string HTML markup of help tab content.
 */
function ddw_tbex_help_tab_content_menus() {

	/** Header */
	ddw_tbex_help_tab_content_header( 'echo' );

	$output = '';

	/** Super Admin menu help */
	if ( ddw_tbex_display_items_super_admin_nav_menu() ) {

		ddw_tbex_help_content_super_admin_menu();

	} else {

		$output = sprintf(
			/* translators: %s - constant TBEX_DISPLAY_SUPER_ADMIN_NAV_MENU */
			'<p class="description">' . __( 'The feature is currently disabled in your install (via constant %s).', 'toolbar-extras' ) . '</p>',
			'<code>TBEX_DISPLAY_SUPER_ADMIN_NAV_MENU</code>'
		);

	}  // end if

	/** Render content */
	echo $output;

	/** Footer */
	ddw_tbex_help_tab_content_footer( 'echo' );

}  // end function


/**
 * Help content part: for super admin menu.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_info_link()
 * @uses ddw_tbex_string_maybe_super_admin()
 * @uses ddw_tbex_string_super_admin_menu_location()
 *
 * @return string HTML markup of additional help tab content.
 */
function ddw_tbex_help_content_super_admin_menu() {

	/** Title */
	$output = '<h2><span class="dashicons-before dashicons-menu"></span> ' . sprintf(
			/* translators: %s - String "Super Admins" (for Multisite) or "Admins" */
			__( 'Special custom menu for %s', 'toolbar-extras' ),
			'<em>' . ddw_tbex_string_maybe_super_admin( 'plural' ) . '</em>'
		) . ':</h2>';

	/** Build the content */
	$output .= '<p>' . __( 'All menu items via a Custom Menu here - and at all other places in the Toolbar (a.k.a. Admin Bar) - are only visible and accessable for Super Admins. That means in a Multisite Environment all Admins who can manage the Network. In regular WordPress (single) installs these are users with the Administrator user role.', 'toolbar-extras' ) . '</p>';

	$output .= '<h5>' . sprintf(
		/* translators: %s - String "Super Admins" (for Multisite) or "Admins" */
		__( 'Added Menu Location by the plugin - only for %s:', 'toolbar-extras' ),
		ddw_tbex_string_maybe_super_admin( 'plural' )
	) . ' "' . ddw_tbex_string_super_admin_menu_location() . '" &mdash; <em>' . __( 'How to use it?', 'toolbar-extras' ) . '</em></h5>';

	$output .= '<p class="tbex-help-step tbex-step-inline">' . sprintf(
			/* translators: %s - String "Super Admin Toolbar" (for Multisite) or "Admin Toolbar" */
			__( 'Create a new menu, set a name like %s', 'toolbar-extras' ),
			sprintf(
				/* translators: %s - String "Super Admin" (for Multisite) or "Admin" */
				'<code>' . __( '%s Toolbar', 'toolbar-extras' ) . '</code>',
				ddw_tbex_string_maybe_super_admin( 'singular' )
			)
		) . '</p>' .
		'<p class="tbex-help-step tbex-step-inline">' . __( 'Setup your links, might mostly be custom links, or any other...', 'toolbar-extras' ) . '</p>' .
		'<p class="tbex-help-step tbex-step-inline">' . __( 'Save the new menu to the plugin\'s menu location. That\'s it :)', 'toolbar-extras' ) . '</p>';

	$output .= '<p><em>' . __( 'Please note:', 'toolbar-extras' ) . '</em> ' . __( 'Every parent item = one main Toolbar entry! So best would be to only use one parent item and set all other items as children.', 'toolbar-extras' ) . ' (' . ddw_tbex_get_info_link( 'url_menu_screen', esc_html__( 'See also this screenshot.', 'toolbar-extras' ), 'dashicons-before dashicons-external tbex-inline' ) . '</a>)' .
		'<br />' . sprintf(
			/* translators: %s - String "Super Admins" (for Multisite) or "Admins" */
			__( 'Also, only %s can edit this menu, all other users/ roles will be blocked!', 'toolbar-extras' ),
			ddw_tbex_string_maybe_super_admin( 'plural' )
		) . '</p>';

	/** Render content */
	echo $output;

}  // end function
