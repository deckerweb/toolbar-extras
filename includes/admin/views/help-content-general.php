<?php

// includes/admin/views/help-content-general

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
 * @since 1.4.0
 *
 * @uses ddw_tbex_help_tab_content_header()
 * @uses ddw_tbex_get_info_link()
 * @uses ddw_tbex_help_tab_content_footer()
 *
 * @return string HTML markup of help tab content.
 */
function ddw_tbex_help_tab_content_general() {

	/** Header */
	ddw_tbex_help_tab_content_header( 'echo' );

	/** Title */
	$output = sprintf(
		'<h2><span class="dashicons-before dashicons-admin-generic"></span> %s</h2>',
		__( 'General Settings', 'toolbar-extras' )
	);

	/** Build the content */
	$output .= '<p>' . sprintf(
		/* translators: 1 - linked label, "Toolbar Groups within the Admin" / 2 - linked label, "Toolbar Groups on the Frontend" */
		__( 'Every Toolbar top-level item is considered a "Group". So from left to right you get the following groups: WP Logo, Site, WP Comments, Updates, New Content, Build (by Toolbar Extras!). And on the right side you get the My Account ("Howdy"/ Welcome) Group, plus on the frontend the additional "Search". See the attached image links to get the whole thing visually: %1$s and %2$s.', 'toolbar-extras' ),
		ddw_tbex_get_info_link( 'url_tb_admin', esc_html__( 'Toolbar Groups within the Admin', 'toolbar-extras' ), 'dashicons-before dashicons-external tbex-inline' ),
		ddw_tbex_get_info_link( 'url_tb_frontend', esc_html__( 'Toolbar Groups on the Frontend', 'toolbar-extras' ), 'dashicons-before dashicons-external tbex-inline' )
		) . '</p>';

	$output .= '<p>' . __( 'Toolbar Extras provides settings to remove, or tweak some of the above mentioned groups. Most of this is done in the "General Settings" tab.', 'toolbar-extras' ) . '</p>';

	$output .= '<p>' . __( 'If you want to disable all link attributes (so-called Tooltips), then you can find the link in Toolbar Extras > General Settings > Link behavior section.', 'toolbar-extras' ) . '</p>';

	/** Render content */
	echo $output;

	/** Footer */
	ddw_tbex_help_tab_content_footer( 'echo' );

}  // end function
