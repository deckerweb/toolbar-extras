<?php

// includes/plugins/items-export-import-menus

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_export_import_menus', 10 );
/**
 * Items for Plugin: Export Import Menus (free, by Akshay Menariya)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_site_items_export_import_menus() {

	/** Plugin's settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-export-import-menus',
			'parent' => 'wpmenus',
			'title'  => esc_attr__( 'Export &amp; Import Menus', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'themes.php?page=dsp_export_import_menus' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Export &amp; Import Menus', 'toolbar-extras' )
			)
		)
	);

}  // end function
