<?php

// OTGS: WPML Translation Management
// includes/plugins-otgs/items-wpml-translation-management

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_wpml_translation_management', 20 );
/**
 * Items for plugin: WPML Translation Management (Premium, by OnTheGoSystems)
 *
 * @since 1.4.9
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_wpml_translation_management( $admin_bar ) {

	/** Management */
	$admin_bar->add_node(
		array(
			'id'     => 'wpml-suite-management',
			'parent' => 'group-wpml-management',
			'title'  => esc_attr__( 'Translation Management', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=wpml-translation-management/menu/main.php' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Translation Management', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'wpml-suite-management-dashboard',
				'parent' => 'wpml-suite-management',
				'title'  => esc_attr__( 'Dashboard', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wpml-translation-management/menu/main.php&sm=dashboard' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Dashboard', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'wpml-suite-management-roles',
				'parent' => 'wpml-suite-management',
				'title'  => esc_attr__( 'Roles', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wpml-translation-management/menu/main.php&sm=translators' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Roles', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'wpml-suite-management-services',
				'parent' => 'wpml-suite-management',
				'title'  => esc_attr__( 'Services', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wpml-translation-management/menu/main.php&sm=translation-services' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Services', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'wpml-suite-management-tools',
				'parent' => 'wpml-suite-management',
				'title'  => esc_attr__( 'Tools', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wpml-translation-management/menu/main.php&sm=ate-ams' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Tools', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'wpml-suite-management-logs',
				'parent' => 'wpml-suite-management',
				'title'  => esc_attr__( 'Communication Log', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wpml-translation-management/menu/main.php&sm=com-log' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Communication Log', 'toolbar-extras' ),
				)
			)
		);

	/** Queue */
	$admin_bar->add_node(
		array(
			'id'     => 'wpml-suite-management-queue',
			'parent' => 'group-wpml-management',
			'title'  => esc_attr__( 'Translations Queue', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=wpml-translation-management/menu/translations-queue.php' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Translations Queue', 'toolbar-extras' ),
			)
		)
	);

	/** Packages */
	$admin_bar->add_node(
		array(
			'id'     => 'wpml-suite-management-packages',
			'parent' => 'group-wpml-management',
			'title'  => esc_attr__( 'Package Management', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=wpml-package-management' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Package Management', 'toolbar-extras' ),
			)
		)
	);

	/** For Settings */
	$admin_bar->add_node(
		array(
			'id'     => 'wpml-suite-settings-setup',
			'parent' => 'wpml-suite-settings',
			'title'  => esc_attr__( 'Multilingual Content Setup', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=wpml-translation-management/menu/settings&sm=mcsetup' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Multilingual Content Setup', 'toolbar-extras' ),
			)
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'wpml-suite-settings-notifications',
			'parent' => 'wpml-suite-settings',
			'title'  => esc_attr__( 'Translation Notifications', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=wpml-translation-management/menu/settings&sm=notifications' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Translation Notifications', 'toolbar-extras' ),
			)
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'wpml-suite-settings-xml-config',
			'parent' => 'wpml-suite-settings',
			'title'  => esc_attr__( 'Custom XML Configuration', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=wpml-translation-management/menu/settings&sm=custom-xml-config' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Custom XML Configuration', 'toolbar-extras' ),
			)
		)
	);

}  // end function
