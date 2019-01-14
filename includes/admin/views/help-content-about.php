<?php

// includes/admin/views/help-content-about

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
 * @uses ddw_tbex_help_tab_content_footer()
 *
 * @return string HTML markup of help tab content.
 */
function ddw_tbex_help_tab_content_about() {

	ddw_tbex_help_tab_content_header( 'echo' );

	$output = sprintf(
		'<h2><span class="dashicons-before dashicons-info"></span> %s</h2>',
		__( 'About this Plugin - Values, Principles', 'toolbar-extras' )
	);

	$output .= sprintf(
		'<p>' . __( 'The whole idea is to use the WordPress Toolbar more - and for more typical tasks. Just because it is well suited for that. It is one central place from where you can control a lot of stuff. It is only a small bar but very powerful and always there.', 'toolbar-extras' ) . '</p>'
	);

	$output .= '<p>' . __( 'The first underlying principle of Toolbar Extras is to provide the same items and resources at the exact same place on the Admin AND the Frontend Toolbar. This is really handy as over time you establish a habit and can control your work more "blindly".', 'toolbar-extras' ) . '</p>';

	$output .= '<p>' . __( 'Another basic principle of Toolbar Extras is to provide as much integrations as possible and relevant - out of the box. Installing and activating the plugin and then continue with your work and your tasks. Of course there are dozens of settings when you need them but they won\'t get in your way. Period.', 'toolbar-extras' ) . '</p>';

	$output .= '<p class="description">' . __( 'My pleasure is to support the daily work, routines and tasks of Site Builders, Webmasters and Developers. This is also the main purpose of Toolbar Extras - naturally.', 'toolbar-extras' ) . '</p>';

	echo wpautop( $output );

	ddw_tbex_help_tab_content_footer( 'echo' );

}  // end function
