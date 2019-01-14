<?php

// includes/plugins-genesis/items-genesis-404-page

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_genesis_404_page', 140 );
/**
 * Items for Add-On: Genesis 404 Page (free, by Bill Erickson)
 *
 * @since 1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_genesis_404_page() {

	/** For: Genesis Creative items */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'be-404page',
			'parent' => 'group-genesisplugins-creative'
		)
	);

	/** Settings page */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'be-404page-edit',
			'parent' => 'be-404page',
			'title'  => esc_attr__( 'Edit 404 Page', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=genesis-404' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Edit 404 Page', 'toolbar-extras' )
			)
		)
	);
	
	/** Live testing */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'be-404page-live',
			'parent' => 'be-404page',
			'title'  => esc_attr__( '404 Live Test', 'toolbar-extras' ),
			'href'   => esc_url( get_site_url() . '/404page-test-' . md5( mt_rand() ) ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => esc_attr__( '404 Live Test', 'toolbar-extras' )
			)
		)
	);

}  // end function
