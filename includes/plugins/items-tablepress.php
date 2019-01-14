<?php

// includes/plugins/items-tablepress

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_tablepress', 20 );
/**
 * Items for Plugin: TablePress (free, by Tobias Bäthge)
 *
 * @since 1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_tablepress() {

	/** Bail early if user has no permissions for TablePress */
	if ( ! current_user_can( 'tablepress_list_tables' ) ) {
		return;
	}

	/** For: Manage Content */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'manage-content-tablepress',
			'parent' => 'manage-content',
			'title'  => esc_attr__( 'Edit Tables', 'toolbar-extras' ),
			'href'   => esc_url( TablePress::url() ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Edit Tables', 'toolbar-extras' )
			)
		)
	);

}  // end function
