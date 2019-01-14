<?php

// dev-mode
// includes/plugins/items-transients-manager

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_devmode_transients_manager', 50 );
/**
 * Items for Plugin: Transients Manager (free, by Pippin Williamson)
 *
 * @since 1.3.8
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_devmode_transients_manager() {

	add_filter( 'tbex_filter_is_dev_mode', '__return_empty_string' );

	/** Group */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-transients-manager',
			'parent' => 'rapid-dev'
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'transients-manager',
			'parent' => 'group-transients-manager',
			'title'  => esc_attr__( 'Transients Manager', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'tools.php?page=pw-transients-manager' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Transients Manager', 'toolbar-extras' )
			)
		)
	);

}  // end function
