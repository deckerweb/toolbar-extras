<?php

//items-user

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
 * @since  1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_user_items_profiles() {

	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-tbex-users',
			'parent' => 'my-account',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'users-all',
			'parent' => 'group-tbex-users',
			'title'  => '<strong>' . esc_attr__( 'List All Users', 'toolbar-extras' ) . '</strong>',
			'href'   => esc_url( admin_url( 'users.php' ) ),
			'meta'   => array(
				'class'  => 'tbex-users-main',
				'target' => '',
				'title'  => esc_attr__( 'List All Users', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'user-new',
			'parent' => 'group-tbex-users',
			'title'  => ddw_tbex_item_title_with_icon( esc_attr__( 'Create New User', 'toolbar-extras' ) ),
			'href'   => esc_url( admin_url( 'user-new.php' ) ),
			'meta'   => array(
				'class'  => 'tbex-users',
				'target' => '',
				'title'  => esc_attr__( 'Create New User', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'user-admins',
			'parent' => 'group-tbex-users',
			'title'  => ddw_tbex_item_title_with_icon( esc_attr__( 'Admin Users', 'toolbar-extras' ) ),
			'href'   => esc_url( admin_url( 'users.php?role=administrator' ) ),
			'meta'   => array(
				'class'  => 'tbex-users',
				'target' => '',
				'title'  => esc_attr__( 'Admin Users', 'toolbar-extras' )
			)
		)
	);

	/** Optional: Editor Users */
	$editors = get_users( array( 'role' => 'editor' ) );

	if ( ! empty( $editors ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'user-editors',
				'parent' => 'group-tbex-users',
				'title'  => ddw_tbex_item_title_with_icon( esc_attr__( 'Editor Users', 'toolbar-extras' ) ),
				'href'   => esc_url( admin_url( 'users.php?role=editor' ) ),
				'meta'   => array(
					'class'  => 'tbex-users',
					'target' => '',
					'title'  => esc_attr__( 'Editor Users', 'toolbar-extras' )
				)
			)
		);

	}  // end if

	do_action( 'tbex_after_group_users' );

	/** Additional hook place for add-ons */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-user-roles',
			'parent' => 'group-tbex-users',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

}  // end function