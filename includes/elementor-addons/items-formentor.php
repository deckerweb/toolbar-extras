<?php

// includes/elementor-addons/items-formentor

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_formentor', 100 );
/**
 * Items for Add-On: Formentor – Elementor Form Plus (free, by Tziki Trop)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_formentor( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's settings */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-formentor',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Formentor', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=formentor-elementor-form-plus%2Foption_page.php' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'Formentor Forms Plus', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-formentor-options',
				'parent' => 'ao-formentor',
				'title'  => esc_attr__( 'Options', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=formentor-elementor-form-plus%2Foption_page.php' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Options', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-formentor-resources',
					'parent' => 'ao-formentor',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'formentor-support',
				'group-formentor-resources',
				'https://wordpress.org/support/plugin/formentor-elementor-form-plus'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'formentor-translate',
				'group-formentor-resources',
				'https://translate.wordpress.org/projects/wp-plugins/formentor-elementor-form-plus'
			);

			ddw_tbex_resource_item(
				'official-site',
				'formentor-site',
				'group-formentor-resources',
				'http://sheet.webduck.co.il/'
			);

		}  // end if

}  // end function
