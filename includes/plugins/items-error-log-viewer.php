<?php

// dev-mode
// includes/plugins/items-error-log-viewer

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_devmode_error_log_viewer', 50 );
/**
 * Items for Plugin: Error Log Viewer (free, by BestWebSoft)
 *
 * @since 1.4.0
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_devmode_error_log_viewer( $admin_bar ) {

	add_filter( 'tbex_filter_is_dev_mode', '__return_empty_string' );

	/** Group */
	$admin_bar->add_group(
		array(
			'id'     => 'group-errorlogviewer',
			'parent' => 'rapid-dev',
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'errorlogviewer-log-monitor',
				'parent' => 'group-errorlogviewer',
				'title'  => esc_attr__( 'Log Monitor', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=rrrlgvwr.php&tab=logmonitor' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Log Monitor', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'errorlogviewer-settings',
				'parent' => 'group-errorlogviewer',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=rrrlgvwr.php&tab=settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

}  // end function
