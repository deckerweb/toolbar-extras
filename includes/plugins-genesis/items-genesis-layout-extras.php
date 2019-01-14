<?php

// includes/plugins-genesis/items-genesis-layout-extras

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_genesis_layout_extras', 115 );
/**
 * Items for Add-On: Genesis Layout Extras (free, by David Decker - DECKERWEB)
 *
 * @since 1.3.5
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_genesis_layout_extras() {

	/** For: Genesis Creative items */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'genesis-layout-extras',
			'parent' => 'group-genesisplugins-creative',
			'title'  => esc_attr__( 'Layout Extras', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=gle-layout-extras' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Genesis Layout Extras', 'toolbar-extras' )
			)
		)
	);

}  // end function
