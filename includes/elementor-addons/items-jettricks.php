<?php

// includes/elementor-addons/items-jettricks

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_jettricks', 100 );
/**
 * Items for Add-On: JetTricks (Premium, by Zemez Jet/ Crocoblock)
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_jettricks( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's settings */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-jettricks',
			'parent' => 'tbex-addons',
			'title'  => 'JetTricks',
			'href'   => esc_url( admin_url( 'admin.php?page=jet-tricks-settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_premium_addon_title_attr( 'JetTricks' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-jettricks-settings',
				'parent' => 'ao-jettricks',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=jet-tricks-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-jettricks-jet-dashboard',
				'parent' => 'ao-jettricks',
				'title'  => esc_attr__( 'Jet Plugins Dashboard', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=jet-dashboard' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Jet Plugins Dashboard', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-jettricks-resources',
					'parent' => 'ao-jettricks',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'knowledge-base',
				'jettricks-kb-articles',
				'group-jettricks-resources',
				'https://crocoblock.com/knowledge-base/article-category/jettricks/' . ddw_tbex_afcroc()
			);

			ddw_tbex_resource_item(
				'documentation',
				'jettricks-docs',
				'group-jettricks-resources',
				'https://documentation.zemez.io/wordpress/index.php?project=jettricks'
			);

			ddw_tbex_resource_item(
				'facebook-group',
				'jettricks-facebook',
				'group-jettricks-resources',
				'https://www.facebook.com/groups/CrocoblockCommunity/'
			);

			ddw_tbex_resource_item(
				'changelog',
				'jettricks-changelog',
				'group-jettricks-resources',
				'https://documentation.zemez.io/wordpress/index.php?project=jettricks&lang=en&section=jettricks-changelog',
				ddw_tbex_string_version_history( 'addon' )
			);

			ddw_tbex_resource_item(
				'official-site',
				'jettricks-site',
				'group-jettricks-resources',
				'https://crocoblock.com/plugins/jettricks/' . ddw_tbex_afcroc()
			);

		}  // end if

}  // end function
