<?php

// includes/elementor-addons/items-analog-templates

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_analog_templates', 100 );
/**
 * Add-On Items from Plugin: AnalogWP Templates (free, by AnalogWP)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_item_title_with_settings_icon()
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_analog_templates( $admin_bar ) {

	$admin_bar->add_node(
		array(
			'id'     => 'analogwp-templates',
			'parent' => 'group-demo-import',
			'title'  => ddw_tbex_item_title_with_settings_icon( esc_attr__( 'Analog Templates', 'toolbar-extras' ), 'general', 'demo_import_icon' ),
			'href'   => esc_url( admin_url( 'admin.php?page=analogwp_templates' ) ),
			'meta'   => array(
				'class'  => 'tbex-import-templates',
				'target' => '',
				'title'  => esc_attr__( 'Analog Templates', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'analogwp-templates-import',
				'parent' => 'analogwp-templates',
				'title'  => esc_attr__( 'Import Templates', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=analogwp_templates' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Import Templates', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'analogwp-templates-settings',
				'parent' => 'analogwp-templates',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=analogwp_templates#settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'analogwp-templates-stylekits-all',
				'parent' => 'analogwp-templates',
				'title'  => esc_attr__( 'All Style Kits', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=ang_tokens' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Elementor Global Style Kits', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'analogwp-templates-stylekits-new',
				'parent' => 'analogwp-templates',
				'title'  => esc_attr__( 'New Style Kit', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=ang_tokens' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Add New Elementor Global Style Kit', 'toolbar-extras' ),
				)
			)
		);

	/** Group: Plugin's resources */
	if ( ddw_tbex_display_items_resources() ) {

		$admin_bar->add_group(
			array(
				'id'     => 'group-analogwp-resources',
				'parent' => 'analogwp-templates',
				'meta'   => array( 'class' => 'ab-sub-secondary tbex-group-resources-divider' ),
			)
		);

		ddw_tbex_resource_item(
			'support-forum',
			'analogwp-support',
			'group-analogwp-resources',
			'https://wordpress.org/support/plugin/analogwp-templates'
		);

		ddw_tbex_resource_item(
			'documentation',
			'analogwp-docs',
			'group-analogwp-resources',
			'https://docs.analogwp.com/'
		);

		ddw_tbex_resource_item(
			'translations-community',
			'analogwp-translate',
			'group-analogwp-resources',
			'https://translate.wordpress.org/projects/wp-plugins/analogwp-templates'
		);

		ddw_tbex_resource_item(
			'official-site',
			'analogwp-site',
			'group-analogwp-resources',
			'https://analogwp.com/'
		);

	}  // end if

}  // end function
