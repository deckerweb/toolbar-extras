<?php

// includes/plugins/items-members

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_user_items_members', 25 );
/**
 * User Group Items from Plugin: Members (free, by Justin Tadlock)
 *
 * @since 1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_user_items_members() {

	/** Bail early if in Network Admin - "Members" only adds to Sites/ Sub Sites */
	if ( is_network_admin() ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'roles-all',
			'parent' => 'group-user-roles',
			'title'  => ddw_tbex_item_title_with_icon( esc_attr__( 'User Roles', 'toolbar-extras' ) ),
			'href'   => esc_url( admin_url( 'users.php?page=roles' ) ),
			'meta'   => array(
				'class'  => 'tbex-users',
				'target' => '',
				'title'  => esc_attr__( 'User Roles', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'roles-new',
			'parent' => 'group-user-roles',
			'title'  => ddw_tbex_item_title_with_icon( esc_attr__( 'New Role', 'toolbar-extras' ) ),
			'href'   => esc_url( admin_url( 'users.php?page=role-new' ) ),
			'meta'   => array(
				'class'  => 'tbex-users',
				'target' => '',
				'title'  => esc_attr__( 'New Role', 'toolbar-extras' )
			)
		)
	);

}  // end function
