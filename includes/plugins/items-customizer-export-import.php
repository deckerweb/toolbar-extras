<?php

// includes/plugins/items-customizer-export-import

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_customizer_export_import', 999 );
/**
 * Items for Add-On: Customizer Export Import (free, by The Beaver Builder Team)
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_customizer_focus()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_customizer_export_import() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-cei',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Export &amp; Import', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'cei-section' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => esc_attr__( 'Export &amp; Import Customizer Options', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'customize-cei',
			'parent' => 'customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => ddw_tbex_item_title_with_icon( esc_attr__( 'Export &amp; Import', 'toolbar-extras' ) ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'cei-section' ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Export &amp; Import Customizer Options', 'toolbar-extras' )
			)
		)
	);

}  // end function