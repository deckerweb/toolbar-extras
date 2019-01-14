<?php

// includes/plugins-genesis/items-genesis-footer-builder

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_genesis_footer_builder', 115 );
/**
 * Items for Add-On: Genesis Footer Builder (free, by Shivanand Sharma)
 *
 * @since 1.3.7
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_genesis_footer_builder() {

	/** For: Genesis Creative items */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'genesis-footer-builder',
			'parent' => 'group-genesisplugins-creative',
			'title'  => esc_attr__( 'Footer Builder', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=genesis-footer-builder' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Genesis Footer Builder', 'toolbar-extras' )
			)
		)
	);

}  // end function
