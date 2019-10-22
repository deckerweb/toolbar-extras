<?php

// includes/elementor-addons/items-custom-icons-for-elementor

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_custom_icons_for_elementor', 100 );
/**
 * Items for Add-On: Custom Icons for Elementor (free, by Michael Bourne)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_custom_icons_for_elementor( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's settings */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-ciconsfe',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Custom Icons', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=elementor-custom-icons' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'Custom Icons for Elementor', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-ciconsfe-settings',
				'parent' => 'ao-ciconsfe',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=elementor-custom-icons' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-ciconsfe-fontello',
				'parent' => 'ao-ciconsfe',
				'title'  => esc_attr__( 'Fontello Icons', 'toolbar-extras' ),
				'href'   => 'http://fontello.com/',
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Fontello Icons', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-ciconsfe-resources',
					'parent' => 'ao-ciconsfe',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'ciconsfe-docs',
				'group-ciconsfe-resources',
				'https://wordpress.org/support/plugin/custom-icons-for-elementor'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'ciconsfe-translations',
				'group-ciconsfe-resources',
				'https://translate.wordpress.org/projects/wp-plugins/custom-icons-for-elementor'
			);

		}  // end if

}  // end function
