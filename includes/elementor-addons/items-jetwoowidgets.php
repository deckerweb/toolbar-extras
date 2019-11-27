<?php

// includes/elementor-addons/items-jetwoowidgets

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_jetwoowidgets', 100 );
/**
 * Items for Add-On: JetWoo Widgets for Elementor (Premium, by Zemez Jet/ Crocoblock)
 *
 * @since 1.4.0
 *
 * @uses   ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_jetwoowidgets( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's settings */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-jetwoowidgets',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'JetWoo Widgets', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=jet-widgets-settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'JetWoo Widgets', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-jetwoowidgets-settings',
				'parent' => 'ao-jetwoowidgets',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=jet-widgets-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-jetwoowidgets-products',
				'parent' => 'ao-jetwoowidgets',
				'title'  => esc_attr__( 'Edit Products', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=product' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Edit Products', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-jetwoowidgets-resources',
					'parent' => 'ao-jetwoowidgets',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'jetwoowidgets-docs',
				'group-jetwoowidgets-resources',
				'https://wordpress.org/support/plugin/jetwoo-widgets-for-elementor'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'jetwoowidgets-translations',
				'group-jetwoowidgets-resources',
				'https://translate.wordpress.org/projects/wp-plugins/jetwoo-widgets-for-elementor'
			);

			ddw_tbex_resource_item(
				'facebook-group',
				'jetwoowidgets-facebook',
				'group-jetwoowidgets-resources',
				'https://www.facebook.com/groups/CrocoblockCommunity/'
			);

		}  // end if

}  // end function
