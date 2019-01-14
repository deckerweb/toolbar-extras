<?php

// includes/plugins-genesis/items-genesis-extra-settings-transporter

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_genesis_extra_settings_transporter', 115 );
/**
 * Items for Add-On: Genesis Extra Settings Transporter (free, by David Decker - DECKERWEB)
 *
 * @since 1.3.9
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_genesis_extra_settings_transporter() {

	/** Bail early if no access to Genesis Exporter */
	if ( ! ddw_tbex_is_genesis_settings_active( 'export' ) ) {
		return;
	}

	/** For: Genesis Creative items */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'genesis-extra-settings-transporter',
			'parent' => 'group-genesisplugins-creative',
			'title'  => esc_attr__( 'Extra Settings Transporter', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=genesis-import-export' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Genesis Extra Settings Transporter', 'toolbar-extras' )
			)
		)
	);

}  // end function
