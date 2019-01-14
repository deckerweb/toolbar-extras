<?php

// includes/plugins-genesis/items-genesis-custom-headers

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_genesis_custom_headers', 115 );
/**
 * Items for Add-On: Genesis Custom Headers (free, by Nick Diego)
 *
 * @since 1.3.9
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_genesis_custom_headers() {

	/** For: Genesis Creative items */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'genesis-custom-headers',
			'parent' => 'group-genesisplugins-creative',
			'title'  => esc_attr__( 'Custom Headers', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'themes.php?page=genesis-custom-header' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Genesis Custom Headers', 'toolbar-extras' )
			)
		)
	);

}  // end function
