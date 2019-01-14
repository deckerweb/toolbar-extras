<?php

// includes/plugins-genesis/items-genesis-simple-edits

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_genesis_simple_edits', 115 );
/**
 * Items for Add-On: Genesis Simple Edits (free, by StudioPress)
 *
 * @since 1.3.7
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_genesis_simple_edits() {

	/** For: Genesis Creative items */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'genesis-simple-edits',
			'parent' => 'group-genesisplugins-creative',
			'title'  => esc_attr__( 'Simple Edits', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=genesis-simple-edits' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Genesis Simple Edits for Footer and Entry Meta', 'toolbar-extras' )
			)
		)
	);

}  // end function
