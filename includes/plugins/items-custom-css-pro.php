<?php

// includes/plugins/items-custom-css-pro

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_custom_css_pro', 105 );
/**
 * Items for Add-On: Custom CSS Pro (free, by WaspThemes)
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_meta_target()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_custom_css_pro() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-ccsspro',
			'parent' => 'group-active-theme',
			'title'  => esc_attr__( 'Custom CSS Pro', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=ccp-editor' ) ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => esc_attr__( 'Custom CSS Pro - Live Editor', 'toolbar-extras' )
			)
		)
	);

}  // end function


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_remove_items_customcsspro' );
/**
 * Remove items from Custom CSS Pro plugin.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_use_tweak_customcsspro()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_remove_items_customcsspro() {

	/** Bail early if Custom CSS Pro tweak should NOT be used */
	if ( ! ddw_tbex_use_tweak_customcsspro() ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'ccp-editor' );

}  // end function