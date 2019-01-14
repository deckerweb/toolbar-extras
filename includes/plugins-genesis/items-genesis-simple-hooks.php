<?php

// includes/plugins-genesis/items-genesis-simple-hooks

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_genesis_simple_hooks', 115 );
/**
 * Items for Add-On: Genesis Simple Hooks (free, by StudioPress)
 *
 * @since 1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_genesis_simple_hooks() {

	/** For: Genesis Creative items */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'genesis-simple-hooks',
			'parent' => 'group-genesisplugins-creative',
			'title'  => esc_attr__( 'Simple Hooks', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=simplehooks' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Genesis Hook Locations', 'toolbar-extras' )
			)
		)
	);

}  // end function
