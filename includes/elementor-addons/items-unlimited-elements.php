<?php

// includes/elementor-addons/items-unlimited-elements

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_unlimited_elements', 100 );
/**
 * Add-On Items from Plugin:
 *   Unlimited Elements for Elementor Lite/Pro (free/Premium, by Blox Themes)
 *
 * @since 1.4.3
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_unlimited_elements( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	$admin_bar->add_node(
		array(
			'id'     => 'unlimitedelements',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Unlimited Elements', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=unlimitedelements' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Unlimited Elements', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'unlimitedelements-general',
				'parent' => 'unlimitedelements',
				'title'  => esc_attr__( 'Manage Elements', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=unlimitedelements' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Manage Elements', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'unlimitedelements-settings',
				'parent' => 'unlimitedelements',
				'title'  => esc_attr__( 'General Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=unlimitedelements_settingselementor' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'General Settings', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'unlimitedelements-license',
				'parent' => 'unlimitedelements',
				'title'  => esc_attr__( 'License', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=unlimitedelements_licenseelementor' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'License', 'toolbar-extras' ),
				)
			)
		);

	/** Group: Plugin's resources */
	if ( ddw_tbex_display_items_resources() ) {

		$admin_bar->add_group(
			array(
				'id'     => 'group-unlimitedelements-resources',
				'parent' => 'unlimitedelements',
				'meta'   => array( 'class' => 'ab-sub-secondary' ),
			)
		);

		ddw_tbex_resource_item(
			'support-forum',
			'analogwp-support',
			'group-unlimitedelements-resources',
			'https://wordpress.org/support/plugin/unlimited-elements-for-elementor/'
		);

		ddw_tbex_resource_item(
			'documentation',
			'unlimitedelements-docs',
			'group-unlimitedelements-resources',
			'http://unlimited-elements.com/wp-content/downloads/documentation-unlimited-elements.pdf'
		);

		ddw_tbex_resource_item(
			'support-contact',
			'unlimitedelements-contact',
			'group-unlimitedelements-resources',
			'https://unitecms.ticksy.com/'
		);

		ddw_tbex_resource_item(
			'translations-community',
			'unlimitedelements-translate',
			'group-unlimitedelements-resources',
			'https://translate.wordpress.org/projects/wp-plugins/unlimited-elements-for-elementor/'
		);

		ddw_tbex_resource_item(
			'official-site',
			'unlimitedelements-site',
			'group-unlimitedelements-resources',
			'http://unlimited-elements.com/'
		);

	}  // end if

}  // end function
