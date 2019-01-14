<?php

// includes/plugins/items-widget-importer-exporter

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_widget_importer_exporter' );
/**
 * Items for Plugin: Widget Importer & Exporter (free, by churchthemes.com)
 *
 * @since 1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_widget_importer_exporter() {

	/** For: WP-Widgets */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'widget-importexport',
			'parent' => 'wpwidgets',
			'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'tools.php?page=widget-importer-exporter' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' )
			)
		)
	);

}  // end function
