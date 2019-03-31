<?php

// includes/themes-genesis/items-genesis-agentpress-pro

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_agentpress_pro_customize', 90 );
/**
 * Customize items for Genesis Child Theme:
 *   AgentPress Pro (Premium, by StudioPress)
 *
 * @since 1.3.0
 * @since 1.4.2 Refactored using filter/array declaration.
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_agentpress_pro_customize( array $items ) {

	/** Declare child theme's items */
	$agppro_items = array(
		'background_image' => array(
			'type'  => 'section',
			'title' => __( 'Background Image', 'toolbar-extras' ),
			'id'    => 'agentpresspro-background-image',
		),
		'header_image' => array(
			'type'  => 'section',
			'title' => __( 'Header Image', 'toolbar-extras' ),
			'id'    => 'agentpresspro-header-image',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $agppro_items );

}  // end function
