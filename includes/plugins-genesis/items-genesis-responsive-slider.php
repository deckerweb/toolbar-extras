<?php

// includes/plugins-genesis/items-genesis-responsive-slider

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_genesis_responsive_slider', 115 );
/**
 * Items for Add-On: Genesis Responsive Slider (free, by StudioPress)
 *
 * @since 1.4.2
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_genesis_responsive_slider( $admin_bar ) {

	/** For: Genesis Creative items */
	$admin_bar->add_node(
		array(
			'id'     => 'genesis-responsive-slider',
			'parent' => 'group-genesisplugins-creative',
			'title'  => esc_attr__( 'Responsive Slider', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=genesis_responsive_slider' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Genesis Responsive Slider', 'toolbar-extras' ),
			)
		)
	);

}  // end function
