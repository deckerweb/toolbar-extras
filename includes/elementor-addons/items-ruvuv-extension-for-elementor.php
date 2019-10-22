<?php

// includes/elementor-addons/items-ruvuv-extension-for-elementor

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_ruvuv_efe', 100 );
/**
 * Add-On Items from Plugin: Ruvuv Extension for Elementor (free, by Ruvuv)
 *
 * @since 1.4.8
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_ruvuv_efe( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	$admin_bar->add_node(
		array(
			'id'     => 'ruvuvefe',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Ruvuv Extension', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=ruvuv-elementor-extension' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'Ruvuv Extension for Elementor', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ruvuvefe-extensions',
				'parent' => 'ruvuvefe',
				'title'  => esc_attr__( 'Activate Extensions', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=ruvuv-elementor-extension' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Extensions', 'toolbar-extras' ),
				)
			)
		);

	/** Group: Plugin's resources */
	if ( ddw_tbex_display_items_resources() ) {

		$admin_bar->add_group(
			array(
				'id'     => 'group-ruvuvefe-resources',
				'parent' => 'ruvuvefe',
				'meta'   => array( 'class' => 'ab-sub-secondary' ),
			)
		);

		ddw_tbex_resource_item(
			'support-forum',
			'ruvuvefe-support',
			'group-ruvuvefe-resources',
			'https://wordpress.org/support/plugin/ruvuv-extension-for-elementor/'
		);

		ddw_tbex_resource_item(
			'support-contact',
			'ruvuvefe-support-contact',
			'group-ruvuvefe-resources',
			'https://elementorextension.ruvuv.com/support/'
		);

		ddw_tbex_resource_item(
			'tutorials',
			'ruvuvefe-tutorials',
			'group-ruvuvefe-resources',
			'https://elementorextension.ruvuv.com/tutorials/'
		);

		ddw_tbex_resource_item(
			'translations-community',
			'ruvuvefe-translate',
			'group-ruvuvefe-resources',
			'https://translate.wordpress.org/projects/wp-plugins/ruvuv-extension-for-elementor/'
		);

		ddw_tbex_resource_item(
			'official-site',
			'ruvuvefe-site',
			'group-ruvuvefe-resources',
			'https://elementorextension.ruvuv.com/'
		);

	}  // end if

}  // end function
