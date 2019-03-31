<?php

// includes/elementor-addons/items-wpb-elementor-addons

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_wpb_elementor_addons', 100 );
/**
 * Items for Add-On: WPB Elementor Addons (free, by wpbean)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_wpb_elementor_addons( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's Settings */
	$admin_bar->add_node(
		array(
			'id'     => 'wpbean-addons',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'WPB Addons', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=wpb_ea_settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( __( 'WPB Elementor Addons', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'wpbean-addons-elements',
				'parent' => 'wpbean-addons',
				'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wpb_ea_settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-wpbean-resources',
					'parent' => 'wpbean-addons',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'wpbeanao-support',
				'group-wpbean-resources',
				'https://wordpress.org/support/plugin/wpb-elementor-addons'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'wpbeanao-translate',
				'group-wpbean-resources',
				'https://translate.wordpress.org/projects/wp-plugins/wpb-elementor-addons'
			);

		}  // end if

}  // end function
