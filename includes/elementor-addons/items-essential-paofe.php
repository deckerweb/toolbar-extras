<?php

// includes/elementor-addons/items-essential-paofe

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_essential_paofe', 100 );
/**
 * Items for Add-On:
 *   Essentail Premium Addons for Elementor (free, by wpcodestar)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_essential_paofe( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's Settings */
	$admin_bar->add_node(
		array(
			'id'     => 'essential-paofe',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Essential Premium Addons', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=wfe_elementor' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( __( 'Essential Premium Addons', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'essential-paofe-elements-all',
				'parent' => 'essential-paofe',
				'title'  => esc_attr__( 'All Elements', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wfe_elementor&filter=all' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Elements', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'essential-paofe-elements-active',
				'parent' => 'essential-paofe',
				'title'  => esc_attr__( 'Active Elements', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wfe_elementor&filter=active' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Active Elements', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'essential-paofe-elements-inactive',
				'parent' => 'essential-paofe',
				'title'  => esc_attr__( 'Inactive Elements', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wfe_elementor&filter=inactive' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Inactive Elements', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'essential-paofe-api-settings',
				'parent' => 'essential-paofe',
				'title'  => esc_attr__( 'API Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=epa_api' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'API Settings', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'essential-paofe-about',
				'parent' => 'essential-paofe',
				'title'  => esc_attr__( 'Plugin Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wfe_elementor#tab-2' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Plugin Info', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-epaofe-resources',
					'parent' => 'essential-paofe',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'epaofe-support',
				'group-epaofe-resources',
				'https://wordpress.org/support/plugin/essential-premium-addons-for-elementor'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'epaofe-translate',
				'group-epaofe-resources',
				'https://translate.wordpress.org/projects/wp-plugins/essential-premium-addons-for-elementor'
			);

		}  // end if

}  // end function
