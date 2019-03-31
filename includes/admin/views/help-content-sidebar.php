<?php

// includes/admin/views/help-content-sidebar

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Content for Help Tab Sidebar.
 *   Note: Content/Markup has to be returned instead of echoed, as the
 *         set_help_sidebar() method already is echoing its content.
 *
 * @since 1.4.0
 * @since 1.4.2 Added more links.
 *
 * @uses ddw_tbex_get_info_link()
 *
 * @return string Complete help sidebar markup and content as a string.
 */
function ddw_tbex_content_help_sidebar() {

	$tbex_help_sidebar_content = '<h4 class="tbex-help-sidebar">' . __( 'Essential', 'toolbar-extras' ) . ':</h4>';

	$tbex_help_sidebar_content .= '<p>' . ddw_tbex_get_info_link( 'url_addons', esc_html__( 'Add-Ons', 'toolbar-extras' ), 'tbex-help-sidebar-icons dashicons-before dashicons-plus-alt' ) . '</p>' .
		'<p>' . ddw_tbex_get_info_link( 'url_snippets', esc_html__( 'Code Snippets', 'toolbar-extras' ), 'tbex-help-sidebar-icons dashicons-before dashicons-editor-code' ) . '</p>' .
		'<p>' . ddw_tbex_get_info_link( 'url_roadmap', esc_html__( 'Development Roadmap', 'toolbar-extras' ), 'tbex-help-sidebar-icons dashicons-before dashicons-redo' ) . '</p>';

	$twitter = sprintf(
		'<p>%s &nbsp; %s<p>',
		ddw_tbex_get_info_link( 'url_twitter', 'Tweets', 'tbex-help-sidebar-icons dashicons-before dashicons-twitter' ),
		ddw_tbex_get_info_link( 'url_twitter_tbex', __( 'More', 'toolbar-extras' ), 'tbex-help-sidebar-icons dashicons-before dashicons-twitter' )
	);

	$tbex_help_sidebar_content .= '<h4 class="tbex-help-sidebar">' . __( 'Connect', 'toolbar-extras' ) . ':</h4>' .
		'<p><strong>' . ddw_tbex_get_info_link( 'url_fb_group', __( 'Facebook Group', 'toolbar-extras' ), 'tbex-help-sidebar-icons dashicons-before dashicons-facebook' ) . '</strong></p>' .
		$twitter .
		'<p>' . ddw_tbex_get_info_link( 'url_instagram', 'Instagram', 'tbex-help-sidebar-icons dashicons-before dashicons-camera' ) . '</p>' .
		'<p>' . ddw_tbex_get_info_link( 'url_github_follow', 'GitHub', 'tbex-help-sidebar-icons dashicons-before dashicons-admin-users' ) . '</p>' .
		'<p>' . ddw_tbex_get_info_link( 'author_uri', 'DECKERWEB', 'tbex-help-sidebar-icons dashicons-before dashicons-networking' ) . '</p>' .
		'<p>' . ddw_tbex_get_info_link( 'url_wporg_profile', 'WordPress.org', 'tbex-help-sidebar-icons dashicons-before dashicons-wordpress' ) . '</p>';

	return apply_filters(
		'tbex/filter/content/help_sidebar',
		$tbex_help_sidebar_content
	);

}  // end function
