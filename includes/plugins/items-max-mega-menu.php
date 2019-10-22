<?php

// includes/plugins/items-max-mega-menu

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_maxmegamenu', 15 );
/**
 * Items for Add-On: Max Mega Menu (free, by Tom Hemsley)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_maxmegamenu( $admin_bar ) {

	/** For: Site Group */
	$admin_bar->add_node(
		array(
			'id'     => 'maxmegamenu',
			'parent' => 'tbex-sitegroup-elements',	// below 'Nav Menus/ Widgets' items
			'title'  => esc_attr__( 'Max Mega Menu', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=maxmegamenu' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Max Mega Menu', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'maxmegamenu-manage-menus',
				'parent' => 'maxmegamenu',
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
				'id'     => 'maxmegamenu-general-settings',
				'parent' => 'maxmegamenu',
				'title'  => esc_attr__( 'General Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mobile-menu-options&tab=header' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'General Settings', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'maxmegamenu-menu-themes',
				'parent' => 'maxmegamenu',
				'title'  => esc_attr__( 'Menu Themes', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=maxmegamenu_theme_editor' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Menu Themes', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'maxmegamenu-menu-locations',
				'parent' => 'maxmegamenu',
				'title'  => esc_attr__( 'Menu Locations', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=maxmegamenu_menu_locations' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Menu Locations', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'maxmegamenu-tools',
				'parent' => 'maxmegamenu',
				'title'  => esc_attr__( 'Tools', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=maxmegamenu_tools' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Tools', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-maxmegamenu-resources',
					'parent' => 'maxmegamenu',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'maxmegamenu-support',
				'group-maxmegamenu-resources',
				'https://wordpress.org/support/plugin/megamenu'
			);

			ddw_tbex_resource_item(
				'documentation',
				'maxmegamenu-docs',
				'group-maxmegamenu-resources',
				'https://www.megamenu.com/documentation/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'maxmegamenu-translate',
				'group-maxmegamenu-resources',
				'https://translate.wordpress.org/projects/wp-plugins/megamenu'
			);

			ddw_tbex_resource_item(
				'official-site',
				'maxmegamenu-site',
				'group-maxmegamenu-resources',
				'https://www.megamenu.com/'
			);

		}  // end if

}  // end function
