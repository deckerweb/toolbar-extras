<?php

// dev-mode
// includes/plugins/items-log-viewer

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_devmode_log_viewer', 50 );
/**
 * Items for Plugin: Log Viewer (free, by Markus Fischbacher)
 *
 * @since 1.3.2
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_devmode_log_viewer() {

	add_filter( 'tbex_filter_is_dev_mode', '__return_empty_string' );

	/** Group */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-logviewer',
			'parent' => 'rapid-dev'
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'log-viewer-elements',
			'parent' => 'group-logviewer',
			'title'  => esc_attr__( 'View Log Files', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'tools.php?page=log_viewer_files_view' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'View Log Files', 'toolbar-extras' )
			)
		)
	);

}  // end function
