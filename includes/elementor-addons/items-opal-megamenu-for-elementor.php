<?php

// includes/elementor-addons/items-opal-megamenu-for-elementor

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_opal_megamenu_for_elementor', 150 );
/**
 * Items for Add-On: Opal Megamenu for Elementor (free, by wpopal)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_opal_megamenu_for_elementor( $admin_bar ) {

	$admin_bar->add_node(
		array(
			'id'     => 'ao-opalmegamenu',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'Opal Megamenu', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'nav-menus.php' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Opal Megamenu', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-opalmegamenu-mega-items',
				'parent' => 'ao-opalmegamenu',
				'title'  => esc_attr__( 'All Mega Items', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=opal_menu_item' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Mega Items', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-opalmegamenu-edit-menus',
				'parent' => 'ao-opalmegamenu',
				'title'  => esc_attr__( 'Add &amp; Edit Menus', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'nav-menus.php' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Add &amp; Edit Menus as Mega Menu', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-opalmegamenu-templates',
				'parent' => 'ao-opalmegamenu',
				'title'  => esc_attr__( 'Megamenu Template', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=dashboard' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Megamenu Template', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-opalmegamenu-resources',
					'parent' => 'ao-opalmegamenu',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'opalmegamenu-support',
				'group-opalmegamenu-resources',
				'https://wordpress.org/support/plugin/opal-megamenu-for-elementor'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'opalmegamenu-translate',
				'group-opalmegamenu-resources',
				'https://translate.wordpress.org/projects/wp-plugins/opal-megamenu-for-elementor'
			);

		}  // end if

}  // end function


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_tweak_remove_items_opal_megamenu' );
/**
 * Remove New Content Group items from Opal Megamenu for Elementor plugin.
 *
 * @since 1.4.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_tweak_remove_items_opal_megamenu() {

	$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'new-opal_menu_item' );

}  // end function
