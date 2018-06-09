<?php

// includes/plugins-genesis/items-genesis-design-palette-pro

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_genesis_design_palette_pro', 105 );
/**
 * Items for Add-On: Genesis Design Palette Pro (Premium, by Reaktiv Studios)
 *
 * @since  1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_genesis_design_palette_pro() {

	/** For: Genesis Creative items */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'genesis-design-palette-pro',
			'parent' => 'theme-creative',
			'title'  => esc_attr__( 'Design Palette Pro', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=genesis-palette-pro' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Style with Genesis Design Palette Pro', 'toolbar-extras' )
			)
		)
	);

}  // end function