<?php

// includes/plugins-genesis/items-genesis-simple-sidebars

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_genesis_simple_sidebars', 115 );
/**
 * Items for Add-On: Genesis Simple Sidebars (free, by StudioPress)
 *
 * @since 1.0.0
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_genesis_simple_sidebars( $admin_bar ) {

	/** For: Genesis Creative items */
	$admin_bar->add_node(
		array(
			'id'     => 'genesis-simple-sidebars',
			'parent' => 'group-genesisplugins-creative',
			'title'  => esc_attr__( 'Simple Sidebars', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=simple-sidebars' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Manage Genesis Sidebars', 'toolbar-extras' ),
			)
		)
	);

	/** For: Manage Widgets */
	$admin_bar->add_node(
		array(
			'id'     => 'gen-simple-sidebars',
			'parent' => 'wpwidgets',
			'title'  => esc_attr__( 'Simple Sidebars', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=simple-sidebars' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Manage Genesis Sidebars', 'toolbar-extras' ),
			)
		)
	);

}  // end function
