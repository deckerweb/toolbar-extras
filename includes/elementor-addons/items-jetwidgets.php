<?php

// includes/elementor-addons/items-jetwidgets

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_jetwidgets', 100 );
/**
 * Items for Add-On: JetWidgets for Elementor (Premium, by Zemez Jet/ Crocoblock)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_jetwidgets( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's settings */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-jetwidgets',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'JetWidgets', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=jet-widgets-settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'JetWidgets', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-jetwidgets-settings',
				'parent' => 'ao-jetwidgets',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=jet-widgets-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-jetwidgets-resources',
					'parent' => 'ao-jetwidgets',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'jetwidgets-docs',
				'group-jetwidgets-resources',
				'https://wordpress.org/support/plugin/jetwidgets-for-elementor'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'jetwidgets-translations',
				'group-jetwidgets-resources',
				'https://translate.wordpress.org/projects/wp-plugins/jetwidgets-for-elementor'
			);

			ddw_tbex_resource_item(
				'facebook-group',
				'jetwidgets-facebook',
				'group-jetwidgets-resources',
				'https://www.facebook.com/groups/CrocoblockCommunity/'
			);

		}  // end if

}  // end function
