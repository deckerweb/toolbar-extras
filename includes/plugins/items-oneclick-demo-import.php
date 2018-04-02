<?php

// includes/plugins/items-oneclick-demo-import

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_oneclick_demo_import', 100 );
/**
 * Items for Add-On: One Click Demo Import (free, by ProteusThemes)
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_display_items_demo_import()
 * @uses   ddw_tbex_item_title_with_settings_icon()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_oneclick_demo_import() {

	/** Bail early if no display of Demo Import items */
	if ( ! ddw_tbex_display_items_demo_import() ) {
		return;
	}

	$ocdi_obj          = \OCDI\OneClickDemoImport::get_instance();
	$predefined_themes = $ocdi_obj->import_files;

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => ddw_tbex_id_sites_browser(),
			'parent' => 'group-demo-import',
			'title'  => ddw_tbex_item_title_with_settings_icon( esc_attr__( 'Install Demo Data', 'toolbar-extras' ), 'general', 'demo_import_icon' ),
			'href'   => empty( $predefined_themes ) ? esc_url( admin_url( 'themes.php?page=pt-one-click-demo-import&import-mode=manual' ) ) : esc_url( admin_url( 'themes.php?page=pt-one-click-demo-import' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Install Demo Data', 'toolbar-extras' )
			)
		)
	);

}  // end function