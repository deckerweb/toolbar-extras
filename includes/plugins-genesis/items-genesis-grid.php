<?php

// includes/plugins-genesis/items-genesis-grid

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_genesis_grid', 115 );
/**
 * Items for Add-On: Genesis Grid (free, by Bill Erickson)
 *
 * @since 1.3.7
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_genesis_grid() {

	/** For: Genesis Creative items */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'genesis-grid',
			'parent' => 'group-genesisplugins-creative',
			'title'  => esc_attr__( 'Grid Settings', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=genesis-grid' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Genesis Grid Settings', 'toolbar-extras' )
			)
		)
	);

}  // end function
