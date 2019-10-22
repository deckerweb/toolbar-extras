<?php

// includes/plugins/items-wp-mobile-menu

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_wp_mobile_menu', 105 );
/**
 * Items for Add-On: WP Mobile Menu (free, by Takanakui)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_wp_mobile_menu( $admin_bar ) {

	$admin_bar->add_node(
		array(
			'id'     => 'ao-wpmobilemenu',
			'parent' => 'group-active-theme',
			'title'  => esc_attr__( 'Mobile Menu', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=mobile-menu-options' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( __( 'Mobile Menu', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-wpmobilemenu-header',
				'parent' => 'ao-wpmobilemenu',
				'title'  => esc_attr__( 'Header', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mobile-menu-options&tab=header' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Header', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-wpmobilemenu-menu-left',
				'parent' => 'ao-wpmobilemenu',
				'title'  => esc_attr__( 'Left Menu', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mobile-menu-options&tab=left-menu' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Left Menu', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-wpmobilemenu-menu-right',
				'parent' => 'ao-wpmobilemenu',
				'title'  => esc_attr__( 'Right Menu', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mobile-menu-options&tab=right-menu' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Right Menu', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-wpmobilemenu-colors',
				'parent' => 'ao-wpmobilemenu',
				'title'  => esc_attr__( 'Colors', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mobile-menu-options&tab=colors' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Colors', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-wpmobilemenu-settings',
				'parent' => 'ao-wpmobilemenu',
				'title'  => esc_attr__( 'General Options', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mobile-menu-options&tab=general-options' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'General Options', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-wpmobilemenu-resources',
					'parent' => 'ao-wpmobilemenu',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'wpmobilemenu-support',
				'group-wpmobilemenu-resources',
				'https://wordpress.org/support/plugin/mobile-menu'
			);

			ddw_tbex_resource_item(
				'knowledge-base',
				'wpmobilemenu-kb',
				'group-wpmobilemenu-resources',
				'https://www.wpmobilemenu.com/knowledgebase/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'wpmobilemenu-translate',
				'group-wpmobilemenu-resources',
				'https://translate.wordpress.org/projects/wp-plugins/mobile-menu'
			);

			ddw_tbex_resource_item(
				'github',
				'wpmobilemenu-github',
				'group-wpmobilemenu-resources',
				'https://github.com/ruiguerreiro79/mobile-menu'
			);

			ddw_tbex_resource_item(
				'official-site',
				'wpmobilemenu-site',
				'group-wpmobilemenu-resources',
				'https://www.wpmobilemenu.com/'
			);

		}  // end if

}  // end function
