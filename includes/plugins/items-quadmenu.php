<?php

// includes/plugins/items-quadmenu

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_quadmenu', 15 );
/**
 * Items for Add-On: QuadMenu (free, by QuadMenu)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_quadmenu( $admin_bar ) {

	/** For: Site Group */
	$admin_bar->add_node(
		array(
			'id'     => 'quadmenu',
			'parent' => 'tbex-sitegroup-elements',	// below 'Nav Menus/ Widgets' items
			'title'  => esc_attr__( 'QuadMenu', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=quadmenu_options' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'QuadMenu', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'quadmenu-manage-menus',
				'parent' => 'quadmenu',
				'title'  => esc_attr__( 'Manage Mega Menus', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'nav-menus.php' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Manage Mega Menus', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'quadmenu-options',
				'parent' => 'quadmenu',
				'title'  => esc_attr__( 'Options', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=quadmenu_options' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Options', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'quadmenu-system-status',
				'parent' => 'quadmenu',
				'title'  => esc_attr__( 'System Status', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=quadmenu_system_status' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'System Status', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-quadmenu-resources',
					'parent' => 'quadmenu',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'quadmenu-support',
				'group-quadmenu-resources',
				'https://wordpress.org/support/plugin/quadmenu'
			);

			ddw_tbex_resource_item(
				'documentation',
				'quadmenu-docs',
				'group-quadmenu-resources',
				'https://quadmenu.com/documentation/'
			);

			ddw_tbex_resource_item(
				'facebook-group',
				'quadmenu-fbgroup',
				'group-quadmenu-resources',
				'https://www.facebook.com/groups/quadmenu'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'quadmenu-translate',
				'group-quadmenu-resources',
				'https://translate.wordpress.org/projects/wp-plugins/quadmenu'
			);

			ddw_tbex_resource_item(
				'official-site',
				'quadmenu-site',
				'group-quadmenu-resources',
				'https://quadmenu.com/'
			);

		}  // end if

}  // end function
