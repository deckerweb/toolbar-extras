<?php

// dev-mode
// includes/plugins/items-log-deprecated-notices

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_devmode_log_deprecated_notices', 50 );
/**
 * Items for Plugin: Log Deprecated Notices (free, by Andrew Nacin)
 *
 * @since 1.3.2
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_devmode_log_deprecated_notices() {

	add_filter( 'tbex_filter_is_dev_mode', '__return_empty_string' );

	/** Group */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-logdctn',
			'parent' => 'rapid-dev'
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'log-deprecated-notices',
			'parent' => 'group-logdctn',
			'title'  => esc_attr__( 'Deprecated Notices', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=deprecated_log' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Deprecated Notices', 'toolbar-extras' )
			)
		)
	);

	/** Plugin's Resources */
	if ( ddw_tbex_display_items_resources() ) {

		ddw_tbex_resource_item(
			'documentation',
			'logdctn-docs',
			'group-logdctn',
			'https://nacin.com/2010/03/22/deprecated-functions-and-wp_debug/'
		);

	}  // end if

}  // end function


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_remove_items_log_deprecated_notices' );
/**
 * Remove plugin's "Add New" item as it is not possible to manually add new logs.
 *
 * @since 1.3.2
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_remove_items_log_deprecated_notices() {

	$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'new-deprecated_log' );
	
}  // end function
