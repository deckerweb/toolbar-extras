<?php

// includes/plugins/items-wpcore

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Create items for various Groups/ hook places - for plugin:
 *   WPCore Plugin Manager (free, by Stuart Starr)
 *
 * @since 1.4.8
 *
 * @uses WPCore::get_instance()->get_payload()
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 * @param string $suffix    String for suffix for Toolbar node IDs and group IDs.
 * @param string $parent    String for Toolbar parent node.
 * @return Void.
 */
function ddw_tbex_aoitems_wpcore_manager( $admin_bar, $suffix = '', $parent = '' ) {

	/** Set suffix */
	$suffix = '-' . sanitize_key( $suffix );

	$wpcore_payload = WPCore::get_instance()->get_payload();

	$base_url = ( is_array( $wpcore_payload ) && count( $wpcore_payload ) > 0 )
		? admin_url( 'plugins.php?page=wpcore-install-plugins' )
		: admin_url( 'admin.php?page=wpcore' );

	$admin_bar->add_node(
			array(
			'id'     => 'wpcore-installer' . $suffix,
			'parent' => sanitize_key( $parent ),	// 'tbex-installer',
			'title'  => esc_attr__( 'Bulk Install Plugins', 'toolbar-extras' ),
			'href'   => esc_url( $base_url ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Bulk Install Plugins via WPCore Collections', 'toolbar-extras' ),
			)
		)
	);

		/** If there are any installable collections, add the installer item */
		if ( is_array( $wpcore_payload ) && count( $wpcore_payload ) > 0 ) {

			$admin_bar->add_node(
					array(
					'id'     => 'wpcore-installer-actions' . $suffix,
					'parent' => 'wpcore-installer' . $suffix,
					'title'  => esc_attr__( 'Plugin Installer', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'plugins.php?page=wpcore-install-plugins' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Plugin Installer for WPCore Collections', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

		/** Settings - manage collections */
		$admin_bar->add_node(
				array(
				'id'     => 'wpcore-installer-settings' . $suffix,
				'parent' => 'wpcore-installer' . $suffix,
				'title'  => esc_attr__( 'Manage Collections', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wpcore' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Manage Plugin Collections', 'toolbar-extras' ),
				)
			)
		);

		/** WPCore.com platform service */

		$admin_bar->add_node(
				array(
				'id'     => 'wpcore-installer-owncollections' . $suffix,
				'parent' => 'wpcore-installer' . $suffix,
				'title'  => esc_attr__( 'Manage Your Collections', 'toolbar-extras' ),
				'href'   => 'https://wpcore.com/yourcollections',
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'rel'    => ddw_tbex_meta_rel(),
					'title'  => esc_attr__( 'Manage Your Collections', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
				array(
				'id'     => 'wpcore-installer-service' . $suffix,
				'parent' => 'wpcore-installer' . $suffix,
				'title'  => esc_attr__( 'WPCore Service', 'toolbar-extras' ),
				'href'   => 'https://wpcore.com/',
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'rel'    => ddw_tbex_meta_rel(),
					'title'  => esc_attr__( 'WPCore Service', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-wpcore-resources' . $suffix,
					'parent' => 'wpcore-installer' . $suffix,
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'wpcore-support' . $suffix,
				'group-wpcore-resources' . $suffix,
				'https://wordpress.org/support/plugin/wpcore'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'wpcore-translate' . $suffix,
				'group-wpcore-resources' . $suffix,
				'https://translate.wordpress.org/projects/wp-plugins/wpcore'
			);

			ddw_tbex_resource_item(
				'github',
				'wpcore-github' . $suffix,
				'group-wpcore-resources' . $suffix,
				'https://github.com/stueynet/wpcore'
			);

			ddw_tbex_resource_item(
				'official-site',
				'wpcore-site' . $suffix,
				'group-wpcore-resources' . $suffix,
				'https://wpcore.com/'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_items_new_content_installer_wpcore', 100 );
/**
 * Items for "New Content" Group for plugin:
 *   WPCore Plugin Manager (free, by Stuart Starr)
 *
 * @since 1.4.8
 *
 * @uses ddw_tbex_display_items_new_content()
 * @uses ddw_tbex_aoitems_wpcore_manager()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_items_new_content_installer_wpcore( $admin_bar ) {

	/** Bail early if no display wanted */
	if ( ! ddw_tbex_display_items_new_content() ) {
		return $admin_bar;
	}

	ddw_tbex_aoitems_wpcore_manager( $admin_bar, 'ncgplace', 'tbex-installer' );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_more_stuff_wpcore', 30 );
/**
 * Items for "New Content" Group for plugin:
 *   WPCore Plugin Manager (free, by Stuart Starr)
 *
 * @since 1.4.8
 *
 * @uses ddw_tbex_display_items_site()
 * @uses ddw_tbex_aoitems_wpcore_manager()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_more_stuff_wpcore( $admin_bar ) {

	/** Bail early if no display wanted */
	if ( ! ddw_tbex_display_items_site() ) {
		return $admin_bar;
	}

	ddw_tbex_aoitems_wpcore_manager( $admin_bar, 'sgmsplace', 'tbex-sitegroup-stuff' );

}  // end function
