<?php

// includes/themes-genesis/items-genesis-outfitter-pro

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_outfitter_pro_customize', 90 );
/**
 * Customize items for Genesis Child Theme:
 *   Outfitter Pro (Premium, by StudioPress)
 *
 * @since 1.2.0
 * @since 1.4.8 Refactored using filter/array declaration.
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_outfitter_pro_customize( array $items ) {

	/** Declare child theme's items */
	$outfitterpro_items = array(
		'outfitter_theme_options' => array(
			'type'  => 'section',
			'title' => ddw_tbex_string_genesis_child_theme_settings(),
			'id'    => 'outfitterpro-settings',
		),
		'colors' => array(
			'type'  => 'section',
			'title' => __( 'Colors', 'toolbar-extras' ),
			'id'    => 'outfitterpro-colors',
		),
		'header_image' => array(
			'type'  => 'section',
			'title' => __( 'Header Image', 'toolbar-extras' ),
			'id'    => 'outfitterpro-header-image',
		),
		'background_image' => array(
			'type'  => 'section',
			'title' => __( 'Background Image', 'toolbar-extras' ),
			'id'    => 'outfitterpro-background-image',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $outfitterpro_items );

}  // end function
