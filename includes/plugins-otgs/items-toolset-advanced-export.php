<?php

// OTGS: Toolset Advanced Export
// includes/plugins-otgs/items-toolset-advanced-export

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_toolset_advanced_export', 40 );
/**
 * Items for plugin: Toolset Advanced Export (Premium, by OnTheGoSystems)
 *
 * @since 1.4.9
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_toolset_advanced_export( $admin_bar ) {

	$admin_bar->add_node(
		array(
			'id'     => 'toolset-advanced-export',
			'parent' => 'toolset-suite-exportimport',
			'title'  => esc_attr__( 'Theme (TBT)', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=toolset-export-import&tab=toolset_advanced_export' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Theme (TBT) - Toolset Advanced Export', 'toolbar-extras' ),
			)
		)
	);

}  // end function
