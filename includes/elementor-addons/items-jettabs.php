<?php

// includes/elementor-addons/items-jettabs

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_jettabs', 100 );
/**
 * Items for Add-On: JetTabs (Premium, by Zemez Jet/ Crocoblock)
 *
 * @since 1.4.5
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_jettabs( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's settings */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-jettabs',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'JetTabs', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=jet-tabs-settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_premium_addon_title_attr( __( 'JetTabs', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-jettabs-settings',
				'parent' => 'ao-jettabs',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=jet-tabs-settings' ) ),
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
					'id'     => 'group-jettabs-resources',
					'parent' => 'ao-jettabs',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'documentation',
				'jettabs-docs',
				'group-jettabs-resources',
				'https://documentation.zemez.io/wordpress/index.php?project=jettabs'
			);

			ddw_tbex_resource_item(
				'facebook-group',
				'jettabs-facebook',
				'group-jettabs-resources',
				'https://www.facebook.com/groups/CrocoblockCommunity/'
			);

			ddw_tbex_resource_item(
				'changelog',
				'jettabs-changelog',
				'group-jettabs-resources',
				'https://documentation.zemez.io/wordpress/index.php?project=jettabs&lang=en&section=jettabs-changelog',
				ddw_tbex_string_version_history( 'addon' )
			);

			ddw_tbex_resource_item(
				'official-site',
				'jettabs-site',
				'group-jettabs-resources',
				'https://jettabs.zemez.io/'
			);

		}  // end if

}  // end function
