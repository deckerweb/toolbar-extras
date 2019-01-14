<?php

// includes/plugins-genesis/items-genesis-accessible

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_genesis_accessible', 115 );
/**
 * Items for Add-On: Genesis Accessible (free, by Rian Rietveld, Robin Cornett)
 *
 * @since 1.3.7
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_genesis_accessible() {

	/** For: Genesis Creative items */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'genesis-accessible',
			'parent' => 'group-genesisplugins-creative',
			'title'  => esc_attr__( 'Genesis Accessible', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=genesis-accessible' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Genesis Accessible', 'toolbar-extras' )
			)
		)
	);

}  // end function
