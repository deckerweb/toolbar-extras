<?php

// includes/elementor-addons/items-extensions-for-elementor

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_extensions_for_elementor', 100 );
/**
 * Add-On Items from Plugin: Extensions For Elementor (free, by mayanksdudakiya)
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_rand()
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_extensions_for_elementor( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Assists reload when already on settings page */
	$rand = ddw_tbex_rand();

	$admin_bar->add_node(
		array(
			'id'     => 'exfel',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Extensions for Elementor', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=elementor-extensions' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'Extensions for Elementor', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'exfel-widgets',
				'parent' => 'exfel',
				'title'  => esc_attr__( 'Activate Widgets', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=elementor-extensions&rand=' . $rand . '#widget_settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Widgets', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'exfel-integrations',
				'parent' => 'exfel',
				'title'  => esc_attr__( 'Integrations', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=elementor-extensions&rand=' . $rand . '#integration' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Integrations', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'exfel-single-page',
				'parent' => 'exfel',
				'title'  => esc_attr__( 'Single Page', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=elementor-extensions&rand=' . $rand . '#section_settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Single Page', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'exfel-cookie-notice',
				'parent' => 'exfel',
				'title'  => esc_attr__( 'Cookie Notice', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=elementor-extensions&rand=' . $rand . '#cookie_notice' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Cookie Notice', 'toolbar-extras' ),
				)
			)
		);

	/** Group: Plugin's resources */
	if ( ddw_tbex_display_items_resources() ) {

		$admin_bar->add_group(
			array(
				'id'     => 'group-exfel-resources',
				'parent' => 'exfel',
				'meta'   => array( 'class' => 'ab-sub-secondary' ),
			)
		);

		ddw_tbex_resource_item(
			'support-forum',
			'exfel-support',
			'group-exfel-resources',
			'https://wordpress.org/support/plugin/extensions-for-elementor/'
		);

		ddw_tbex_resource_item(
			'translations-community',
			'exfel-translate',
			'group-exfel-resources',
			'https://translate.wordpress.org/projects/wp-plugins/extensions-for-elementor/'
		);

	}  // end if

}  // end function
