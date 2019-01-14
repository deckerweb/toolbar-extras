<?php

// includes/plugins-genesis/items-genesis-featured-image-header

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_genesis_featured_image_header', 115 );
/**
 * Items for Add-On: Genesis Featured Image Header (free, by Scott DeLuzio)
 *
 * @since 1.4.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_genesis_featured_image_header() {

	/** For: Genesis Creative items */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'genesis-featuredimg-header',
			'parent' => 'group-genesisplugins-creative',
			'title'  => esc_attr__( 'Featured Image Header', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=gfih-settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Genesis Featured Image Header', 'toolbar-extras' )
			)
		)
	);

}  // end function
