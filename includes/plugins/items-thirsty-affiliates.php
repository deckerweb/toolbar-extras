<?php

// includes/plugins/items-thirsty-affiliates

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_thirsty_affiliates', 20 );
/**
 * Items for Plugin: Thirsty Affiliates (free, by Rymera Web Co.)
 *
 * @since 1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_thirsty_affiliates() {

	/** For: Manage Content */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'manage-content-thirsty',
			'parent' => 'manage-content',
			'title'  => esc_attr__( 'Edit Affiliate Links', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=thirstylink' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Edit Affiliate Links', 'toolbar-extras' )
			)
		)
	);

}  // end function
