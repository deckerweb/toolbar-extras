<?php

// includes/plugins/items-download-monitor

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_download_monitor', 20 );
/**
 * Items for Add-On: Download Monitor
 *
 * @since 1.0.0
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_download_monitor( $admin_bar ) {

	/** For: Manage Content */
	$admin_bar->add_node(
		array(
			'id'     => 'manage-content-dlm',
			'parent' => 'manage-content',
			'title'  => esc_attr__( 'Edit Downloads', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=dlm_download' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Edit Downloads', 'toolbar-extras' ),
			)
		)
	);

}  // end function
