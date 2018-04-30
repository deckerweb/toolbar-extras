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
 * @since  1.0.0
 *
 * @uses   ddw_tbex_info_values() To get some strings of info values.
 * @uses   ddw_tbex_display_items_super_admin_nav_menu()
 * @uses   ddw_tbex_help_content_super_admin_menu()
 * @uses   ddw_tbex_get_info_link()
 * @uses   ddw_tbex_coding_years()
 *
 * @return string HTML markup of help tab content.
 */
function ddw_tbex_help_tab_content_menus() {

	$tbex_info = (array) ddw_tbex_info_values();

	$tbex_space_helper = '<div style="height: 10px;"></div>';

	/** Content: Toolbar Extras plugin */
	echo '<h3>' . __( 'Plugin', 'toolbar-extras' ) . ': ' . __( 'Toolbar Extras', 'toolbar-extras' ) . ' <small>v' . TBEX_PLUGIN_VERSION . '</small></h3>';

	/** Super Admin menu help */
	if ( ddw_tbex_display_items_super_admin_nav_menu() ) {
		ddw_tbex_help_content_super_admin_menu();
	}

	/** Further help content */
	echo $tbex_space_helper . '<p><h4 style="font-size: 1.1em;">' . __( 'Important plugin links:', 'toolbar-extras' ) . '</h4>' .

		ddw_tbex_get_info_link( 'url_plugin', esc_html__( 'Plugin website', 'toolbar-extras' ), 'button' ) .

		'&nbsp;&nbsp;' . ddw_tbex_get_info_link( 'url_plugin_faq', esc_html_x( 'FAQ', 'Help tab info', 'toolbar-extras' ), 'button' ) .

		'&nbsp;&nbsp;' . ddw_tbex_get_info_link( 'url_wporg_forum', esc_html_x( 'Support', 'Help tab info', 'toolbar-extras' ), 'button' ) .

		'&nbsp;&nbsp;' . ddw_tbex_get_info_link( 'url_fb_group', esc_html_x( 'Facebook Group', 'Help tab info', 'toolbar-extras' ), 'button' ) .

		'&nbsp;&nbsp;' . ddw_tbex_get_info_link( 'url_roadmap', esc_html_x( 'Roadmap', 'Help tab info', 'toolbar-extras' ), 'button' ) .

		'&nbsp;&nbsp;' . ddw_tbex_get_info_link( 'url_translate', esc_html_x( 'Translations', 'Help tab info', 'toolbar-extras' ), 'button' ) .

		'&nbsp;&nbsp;' . ddw_tbex_get_info_link( 'url_donate', esc_html_x( 'Donate', 'Help tab info', 'toolbar-extras' ), 'button button-primary' ) .

		sprintf(
			'<p><a href="%1$s" target="_blank" rel="nofollow noopener noreferrer" title="%2$s">%2$s</a> &#x000A9; %3$s <a href="%4$s" target="_blank" rel="noopener noreferrer" title="%5$s">%5$s</a></p>',
			esc_url( $tbex_info[ 'url_license' ] ),
			esc_attr( $tbex_info[ 'license' ] ),
			ddw_tbex_coding_years(),
			esc_url( $tbex_info[ 'author_uri' ] ),
			esc_html( $tbex_info[ 'author' ] )
		);

}  // end function


/**
 * Help content part: for super admin menu.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_get_info_link()
 * @uses   ddw_tbex_string_maybe_super_admin()
 * @uses   ddw_tbex_string_super_admin_menu_location()
 *
 * @return string HTML markup of additional help tab content.
 */
function ddw_tbex_help_content_super_admin_menu() {

	echo '<h4 style="font-size: 1.1em;">' . sprintf(
			/* translators: %s - String "Super Admins" (for Multisite) or "Admins" */
			__( 'Special custom menu for %s', 'toolbar-extras' ),
			'<em>' . ddw_tbex_string_maybe_super_admin( TRUE ) . '</em>'
		) . ':</h4>';

	echo '<blockquote><p>' . __( 'All menu items via a Custom Menu here - and at all other places in the Toolbar (a.k.a. Admin Bar) - are only visible and accessable for Super Admins. That means in a Multisite Environment all Admins who can manage the Network. In regular WordPress (single) installs these are users with the Administrator user role.', 'toolbar-extras' ) . '</p></blockquote>' .
	'<blockquote><p><strong>' . sprintf(
		/* translators: %s - String "Super Admins" (for Multisite) or "Admins" */
		__( 'Added Menu Location by the plugin - only for %s:', 'toolbar-extras' ),
		ddw_tbex_string_maybe_super_admin( TRUE )
	) . ' "' . sprintf(
			/* translators: %s - String "Multisite" (for Multisite) or "Site" */
			__( '%s Toolbar Menu', 'toolbar-extras' ),
			ddw_tbex_string_super_admin_menu_location()
		) . '" &mdash; <em>' . __( 'How to use it?', 'toolbar-extras' ) . '</em></strong></p></blockquote>' .
	'<blockquote><ul>' . 
		'<li>' . sprintf(
			/* translators: %s - String "Super Admin Toolbar" (for Multisite) or "Admin Toolbar" */
			__( 'Create a new menu, set a name like %s', 'toolbar-extras' ),
			sprintf(
				/* translators: %s - String "Super Admin" (for Multisite) or "Admin" */
				'<code>' . __( '%s Toolbar', 'toolbar-extras' ) . '</code>',
				ddw_tbex_string_maybe_super_admin()
			)
		) . '</li>' .
		'<li>' . __( 'Setup your links, might mostly be custom links, or any other...', 'toolbar-extras' ) . '</li>' .
		'<li>' . __( 'Save the new menu to the plugin\'s menu location. That\'s it :)', 'toolbar-extras' ) . '</li>' .
	'<ul></blockquote>' .
	'<blockquote><p><em>' . __( 'Please note:', 'toolbar-extras' ) . '</em> ' . __( 'Every parent item = one main Toolbar entry! So best would be to only use one parent item and set all other items as children.', 'toolbar-extras' ) . ' (' . ddw_tbex_get_info_link( 'url_menu_screen', esc_html__( 'See also this screenshot.', 'toolbar-extras' ) ) . '</a>)' .
		'<br />' . sprintf(
			/* translators: %s - String "Super Admins" (for Multisite) or "Admins" */
			__( 'Also, only %s can edit this menu, all other users/ roles will be blocked!', 'toolbar-extras' ),
			ddw_tbex_string_maybe_super_admin( TRUE )
		) . '</p></blockquote>';

}  // end function