<?php

// OTGS: Toolset Views WooCommerce
// includes/plugins-otgs/items-toolset-views-woocommerce

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_toolset_views_woocommerce', 40 );
/**
 * Items for plugin: Toolset Views WooCommerce (Premium, by OnTheGoSystems)
 *
 * @since 1.4.9
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_toolset_views_woocommerce( $admin_bar ) {

	/** For: Views Area */
	$admin_bar->add_node(
		array(
			'id'     => 'toolset-views-woocommerce',
			'parent' => 'toolset-views',
			'title'  => esc_attr__( 'WooCommerce Views', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=wpv_wc_views' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => 'Toolset: ' . esc_attr__( 'WooCommerce Views', 'toolbar-extras' ),
			)
		)
	);

	/** Views: Export/ Import */
	$admin_bar->add_node(
		array(
			'id'     => 'toolset-views-exportimport-woocommerce-views',
			'parent' => 'toolset-suite-exportimport',
			'title'  => esc_attr__( 'WooCommerce Views', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=toolset-export-import&tab=wcviews_export_import' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'WooCommerce Views', 'toolbar-extras' ),
			)
		)
	);

}  // end function
