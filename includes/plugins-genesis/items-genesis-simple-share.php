<?php

// includes/plugins-genesis/items-genesis-simple-share

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_genesis_simple_share', 115 );
/**
 * Items for Add-On: Genesis Simple Share (free, by StudioPress)
 *
 * @since 1.4.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_genesis_simple_share() {

	/** For: Genesis Creative items */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'genesis-simple-share',
			'parent' => 'group-genesisplugins-creative',
			'title'  => esc_attr__( 'Simple Share', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=genesis_simple_share_settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Genesis Simple Share', 'toolbar-extras' )
			)
		)
	);

}  // end function
