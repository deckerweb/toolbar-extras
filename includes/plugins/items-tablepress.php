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
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_tablepress( $admin_bar ) {

	/** Bail early if user has no permissions for TablePress */
	if ( ! current_user_can( 'tablepress_list_tables' ) ) {
		return $admin_bar;
	}

	/** For: Manage Content */
	$admin_bar->add_node(
		array(
			'id'     => 'manage-content-tablepress',
			'parent' => 'manage-content',
			'title'  => esc_attr__( 'Edit Tables', 'toolbar-extras' ),
			'href'   => esc_url( TablePress::url() ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Edit Tables', 'toolbar-extras' ),
			)
		)
	);

}  // end function
