<?php

// includes/elementor-addons/items-jetmenu

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_jetmenu', 100 );
/**
 * Items for Add-On: JetMenu (Premium, by Zemez)
 *
 * @since  1.1.0
 *
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_jetmenu() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** JetMenu Settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-jetmenu',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'JetMenu', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=jet-menu' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_premium_addon_title_attr( __( 'JetMenu', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-jetmenu-settings',
				'parent' => 'ao-jetmenu',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=jet-menu' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-jetmenu-megamenus',
				'parent' => 'ao-jetmenu',
				'title'  => esc_attr__( 'Edit Mega Menus', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'nav-menus.php' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Edit Mega Menus', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for JetMenu */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-jetmenu-resources',
					'parent' => 'ao-jetmenu',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'documentation',
				'jetmenu-docs',
				'group-jetmenu-resources',
				'https://documentation.zemez.io/wordpress/index.php?project=jetmenu'
			);

			ddw_tbex_resource_item(
				'facebook-group',
				'jetmenu-facebook',
				'group-jetmenu-resources',
				'https://www.facebook.com/groups/CrocoblockCommunity/'
			);

			ddw_tbex_resource_item(
				'official-site',
				'jetmenu-site',
				'group-jetmenu-resources',
				'https://jetmenu.zemez.io/'
			);

		}  // end if

}  // end function


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_tweak_remove_items_jetmenu' );
/**
 * Remove New Content Group items from JetMenu plugin.
 *
 * @since  1.1.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_tweak_remove_items_jetmenu() {

	$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'new-jet-menu' );

}  // end function