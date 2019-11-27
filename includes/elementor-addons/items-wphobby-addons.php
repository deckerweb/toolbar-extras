<?php

// includes/elementor-addons/items-wphobby-addons

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_wphobby_addons', 100 );
/**
 * Add-On Items from Plugin: WPHobby Addons for Elementor (free, by WPHobby)
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_wphobby_addons( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	$admin_bar->add_node(
		array(
			'id'     => 'wphobbyaddons',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'WPHobby Addons', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=whae-panel#elements' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'WPHobby Addons', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'wphobbyaddons-elements',
				'parent' => 'wphobbyaddons',
				'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=whae-panel#elements' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' ),
				)
			)
		);

	/** Group: Plugin's resources */
	if ( ddw_tbex_display_items_resources() ) {

		$admin_bar->add_group(
			array(
				'id'     => 'group-wphobbyaddons-resources',
				'parent' => 'wphobbyaddons',
				'meta'   => array( 'class' => 'ab-sub-secondary' ),
			)
		);

		ddw_tbex_resource_item(
			'support-forum',
			'wphobbyaddons-support',
			'group-wphobbyaddons-resources',
			'https://wordpress.org/support/plugin/wphobby-addons-for-elementor/'
		);

		ddw_tbex_resource_item(
			'translations-community',
			'wphobbyaddons-translate',
			'group-wphobbyaddons-resources',
			'https://translate.wordpress.org/projects/wp-plugins/wphobby-addons-for-elementor/'
		);

	}  // end if

}  // end function
