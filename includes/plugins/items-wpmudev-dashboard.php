<?php

// includes/plugins/items-wpmudev-dashboard

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_wpmudev_dashboard', 99 );
/**
 * Items for Plugin: WPMU Dev Dashboard (Premium, by WPMU DEV)
 *
 * @since 1.3.2
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_wpmudev_dashboard() {

	/** For: Forms */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'wpmudev-install-plugin',
			'parent' => 'install-plugin',
			'title'  => esc_attr__( 'via WPMU DEV', 'toolbar-extras' ),
			'href'   => esc_url( network_admin_url( 'admin.php?page=wpmudev-plugins' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Install Plugins via WPMU DEV', 'toolbar-extras' )
			)
		)
	);

}  // end function
