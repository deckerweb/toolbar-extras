<?php

// includes/elementor-addons/items-massive-addons-for-elementor

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_mafe', 100 );
/**
 * Items for Add-On: Massive Addons for Elementor (free, by Blocksera)
 *
 * @since 1.3.2
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_mafe( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's Settings */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-mafe',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Massive Addons', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=massive-addons' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'Massive Addons for Elementor', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-mafe-elements',
				'parent' => 'ao-mafe',
				'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=massive-addons#mae-addons' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-mafe-googlemaps',
				'parent' => 'ao-mafe',
				'title'  => esc_attr__( 'Google Maps API', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=massive-addons#mae-maps' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Google Maps API', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-mafe-resources',
					'parent' => 'ao-mafe',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'mafe-support',
				'group-mafe-resources',
				'https://wordpress.org/support/plugin/massive-addons-for-elementor/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'mafe-translate',
				'group-mafe-resources',
				'https://translate.wordpress.org/projects/wp-plugins/massive-addons-for-elementor/'
			);

		}  // end if

}  // end function
