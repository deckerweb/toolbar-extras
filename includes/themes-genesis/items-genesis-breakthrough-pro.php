<?php

// includes/themes-genesis/items-genesis-breakthrough-pro

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_breakthrough_pro_customize', 90 );
/**
 * Customize items for Genesis Child Theme:
 *   Breakthrough Pro (Premium, by StudioPress)
 *
 * @since 1.3.5
 * @since 1.4.2 Refactored using filter/array declaration.
 *
 * @uses ddw_tbex_string_genesis_child_theme_settings()
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_breakthrough_pro_customize( array $items ) {

	/** Declare child theme's items */
	$btpro_items = array(
		'breakthrough_settings' => array(
			'type'  => 'panel',
			'title' => ddw_tbex_string_genesis_child_theme_settings(),
			'id'    => 'breakthroughpro-settings',
		),
		'colors' => array(
			'type'  => 'section',
			'title' => __( 'Colors', 'toolbar-extras' ),
			'id'    => 'breakthroughpro-colors',
		),
		'background_image' => array(
			'type'  => 'section',
			'title' => __( 'Background Image', 'toolbar-extras' ),
			'id'    => 'breakthroughpro-background-image',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $btpro_items );

}  // end function
