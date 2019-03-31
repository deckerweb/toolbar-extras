<?php

// includes/elementor-addons/items-layouts-for-elementor

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_layouts_for_elementor', 100 );
/**
 * Add-On Items from Plugin: Layouts for Elementor (free, by Giraphix Creative)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_item_title_with_settings_icon()
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_layouts_for_elementor( $admin_bar ) {

	$admin_bar->add_node(
		array(
			'id'     => 'layouts-for-elementor',
			'parent' => 'group-demo-import',
			'title'  => ddw_tbex_item_title_with_settings_icon( esc_attr__( 'Elementor Layouts', 'toolbar-extras' ), 'general', 'demo_import_icon' ),
			'href'   => esc_url( admin_url( 'admin.php?page=analogwp_templates' ) ),
			'meta'   => array(
				'class'  => 'tbex-import-templates',
				'target' => '',
				'title'  => esc_attr__( 'Elementor Layouts', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'layouts-for-elementor-import',
				'parent' => 'layouts-for-elementor',
				'title'  => esc_attr__( 'Import Layouts', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=analogwp_templates' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Import Layouts', 'toolbar-extras' ),
				)
			)
		);

	/** Group: Plugin's resources */
	if ( ddw_tbex_display_items_resources() ) {

		$admin_bar->add_group(
			array(
				'id'     => 'group-layoutsfe-resources',
				'parent' => 'layouts-for-elementor',
				'meta'   => array( 'class' => 'ab-sub-secondary tbex-group-resources-divider' ),
			)
		);

		ddw_tbex_resource_item(
			'support-forum',
			'analogwp-support',
			'group-layoutsfe-resources',
			'https://wordpress.org/support/plugin/layouts-for-elementor'
		);

		ddw_tbex_resource_item(
			'translations-community',
			'analogwp-translate',
			'group-layoutsfe-resources',
			'https://translate.wordpress.org/projects/wp-plugins/layouts-for-elementor'
		);

	}  // end if

}  // end function
