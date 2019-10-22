<?php

// includes/elementor-addons/items-bestfreebie-elementor-icons

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_bestfreebie_elementor_icons', 100 );
/**
 * Items for Add-On: Bestfreebie Elementor Icons (free, by Bestfreebie)
 *
 * @since 1.4.3
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_bestfreebie_elementor_icons( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's settings */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-bestfreebieicons',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Elementor Icon Set Icons', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=bestfreebie-elementor-custom-icons' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'Setup an Elementor Icon Set', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-bestfreebieicons-settings',
				'parent' => 'ao-bestfreebieicons',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=bestfreebie-elementor-custom-icons' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-bestfreebieicons-resources',
					'parent' => 'ao-bestfreebieicons',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'bestfreebieicons-docs',
				'group-bestfreebieicons-resources',
				'https://wordpress.org/support/plugin/bestfreebie-elementor-icons'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'bestfreebieicons-translations',
				'group-bestfreebieicons-resources',
				'https://translate.wordpress.org/projects/wp-plugins/bestfreebie-elementor-icons'
			);

		}  // end if

}  // end function
