<?php

// includes/items-user

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_user_items_profiles' );
/**
 * Items for Users
 *
 * @since 1.0.0
 * @since 1.3.2 Added Multisite support for Network admin.
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_user_items_profiles( $admin_bar ) {

	$admin_bar->add_group(
		array(
			'id'     => 'group-tbex-users',
			'parent' => 'my-account',
			'meta'   => array( 'class' => 'ab-sub-secondary' ),
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'users-all',
			'parent' => 'group-tbex-users',
			'title'  => '<strong>' . esc_attr__( 'List All Users', 'toolbar-extras' ) . '</strong>',
			'href'   => is_network_admin() ? esc_url( network_admin_url( 'users.php' ) ) : esc_url( admin_url( 'users.php' ) ),
			'meta'   => array(
				'class'  => 'tbex-users-main',
				'target' => '',
				'title'  => esc_attr__( 'List All Users', 'toolbar-extras' ),
			)
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'user-new',
			'parent' => 'group-tbex-users',
			'title'  => ddw_tbex_item_title_with_icon( esc_attr__( 'Create New User', 'toolbar-extras' ) ),
			'href'   => is_network_admin() ? esc_url( network_admin_url( 'user-new.php' ) ) : esc_url( admin_url( 'user-new.php' ) ),
			'meta'   => array(
				'class'  => 'tbex-users',
				'target' => '',
				'title'  => esc_attr__( 'Create New User', 'toolbar-extras' ),
			)
		)
	);

	if ( is_network_admin() ) {

		$admin_bar->add_node(
			array(
				'id'     => 'user-super-admins',
				'parent' => 'group-tbex-users',
				'title'  => ddw_tbex_item_title_with_icon( esc_attr__( 'Super Admins', 'toolbar-extras' ) ),
				'href'   => esc_url( network_admin_url( 'users.php?role=super' ) ),
				'meta'   => array(
					'class'  => 'tbex-users',
					'target' => '',
					'title'  => esc_attr__( 'Super Admins', 'toolbar-extras' ),
				)
			)
		);

	} else {

		$admin_bar->add_node(
			array(
				'id'     => 'user-admins',
				'parent' => 'group-tbex-users',
				'title'  => ddw_tbex_item_title_with_icon( esc_attr__( 'Admin Users', 'toolbar-extras' ) ),
				'href'   => esc_url( admin_url( 'users.php?role=administrator' ) ),
				'meta'   => array(
					'class'  => 'tbex-users',
					'target' => '',
					'title'  => esc_attr__( 'Admin Users', 'toolbar-extras' ),
				)
			)
		);

	}  // end if

	/** Optional: Editor Users */
	$editors = get_users( array( 'role' => 'editor' ) );

	if ( ! empty( $editors ) ) {

		$admin_bar->add_node(
			array(
				'id'     => 'user-editors',
				'parent' => 'group-tbex-users',
				'title'  => ddw_tbex_item_title_with_icon( esc_attr__( 'Editor Users', 'toolbar-extras' ) ),
				'href'   => esc_url( admin_url( 'users.php?role=editor' ) ),
				'meta'   => array(
					'class'  => 'tbex-users',
					'target' => '',
					'title'  => esc_attr__( 'Editor Users', 'toolbar-extras' ),
				)
			)
		);

	}  // end if

	do_action( 'tbex_after_group_users', $admin_bar );

	/** Additional hook place for add-ons */
	$admin_bar->add_group(
		array(
			'id'     => 'group-user-roles',
			'parent' => 'group-tbex-users',
			'meta'   => array( 'class' => 'ab-sub-secondary' ),
		)
	);

}  // end function
