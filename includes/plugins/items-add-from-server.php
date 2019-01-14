<?php

// includes/plugins/items-add-from-server

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_addfromserver', 15 );
/**
 * Site Group Items from Plugin: Add From Server (free, by Dion Hulse)
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_display_items_new_content()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_addfromserver() {

	/** For: Elements */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-addfromserver',
			'parent' => 'manage-content-media'
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'media-addfromserver',
			'parent' => 'group-addfromserver',
			'title'  => esc_attr__( 'Add From Server', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'upload.php?page=add-from-server' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Add From Server', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'media-addfromserver-settings',
				'parent' => 'group-addfromserver',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=add-from-server-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

	/** For: New Content */
	if ( ddw_tbex_display_items_new_content() ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbex-addfromserver',
				'parent' => 'new-media',
				'title'  => esc_attr_x( 'Add From Server', 'Toolbar New Content section', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'upload.php?page=add-from-server' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr_x( 'Add From Server', 'Toolbar New Content section', 'toolbar-extras' )
				)
			)
		);

	}  // end if

}  // end function
