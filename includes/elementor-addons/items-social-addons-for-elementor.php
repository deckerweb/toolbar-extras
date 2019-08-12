<?php

// includes/elementor-addons/items-social-addons-for-elementor

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_social_addons_for_elementor', 100 );
/**
 * Add-On Items from Plugin:
 *   Social Addons for Elementor (Lite) (free, by WebEmpire)
 *
 * @since 1.4.5
 *
 * @uses ddw_tbex_string_free_addon_title_attr()
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_social_addons_for_elementor( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	$admin_bar->add_node(
		array(
			'id'     => 'social-addons-elementor',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Social Addons Lite', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=social-elementor' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'Social Addons for Elementor (Lite)', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'social-addons-elementor-elements',
				'parent' => 'social-addons-elementor',
				'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=social-elementor' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' ),
				)
			)
		);

	/** Group: Plugin's resources */
	if ( ddw_tbex_display_items_resources() ) {

		$admin_bar->add_group(
			array(
				'id'     => 'group-saofel-resources',
				'parent' => 'social-addons-elementor',
				'meta'   => array( 'class' => 'ab-sub-secondary' ),
			)
		);

		ddw_tbex_resource_item(
			'support-forum',
			'saofel-support',
			'group-saofel-resources',
			'https://wordpress.org/support/plugin/social-elementor-lite/'
		);

		ddw_tbex_resource_item(
			'translations-community',
			'saofel-translate',
			'group-saofel-resources',
			'https://translate.wordpress.org/projects/wp-plugins/social-elementor-lite/'
		);

		ddw_tbex_resource_item(
			'github',
			'saofel-github',
			'group-saofel-resources',
			'https://github.com/web-empire/social-elementor-lite'
		);

	}  // end if

}  // end function
