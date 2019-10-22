<?php

// includes/elementor-addons/items-clever-mega-menu

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_clever_mega_menu', 150 );
/**
 * Items for Add-On: Clever Mega Menu for Elementor (free, by CleverSoft)
 *
 * @since 1.4.3
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_clever_mega_menu( $admin_bar ) {

	$admin_bar->add_node(
		array(
			'id'     => 'ao-clevermegamenu',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'Clever Mega Menu', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=cmm4e_menu_theme' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'Clever Mega Menu', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-clevermegamenu-skins-all',
				'parent' => 'ao-clevermegamenu',
				'title'  => esc_attr__( 'All Menu Skins', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=cmm4e_menu_theme' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Skins for Mega Menus', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-clevermegamenu-skins-new',
				'parent' => 'ao-clevermegamenu',
				'title'  => esc_attr__( 'New Menu Skin', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=cmm4e_menu_theme' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Skin for Mega Menu', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-clevermegamenu-edit-menus',
				'parent' => 'ao-clevermegamenu',
				'title'  => esc_attr__( 'Add &amp; Edit Menus', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'nav-menus.php' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Add &amp; Edit Menus as Mega Menu', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-clevermegamenu-resources',
					'parent' => 'ao-clevermegamenu',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'clevermegamenu-support',
				'group-clevermegamenu-resources',
				'https://wordpress.org/support/plugin/clever-mega-menu-for-elementor'
			);

			ddw_tbex_resource_item(
				'documentation',
				'clevermegamenu-docs',
				'group-clevermegamenu-resources',
				'https://doc.cleveraddon.com/clever-mega-menu-elementor/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'clevermegamenu-translate',
				'group-clevermegamenu-resources',
				'https://translate.wordpress.org/projects/wp-plugins/clever-mega-menu-for-elementor'
			);

		}  // end if

}  // end function
