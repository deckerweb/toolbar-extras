<?php

// includes/themes-genesis/items-genesis-boss-pro

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_boss_pro_customize', 90 );
/**
 * Customize items for Genesis Child Theme:
 *   Boss Pro (Premium, by Design by Bloom)
 *
 * @since 1.2.0
 * @since 1.4.2 Refactored using filter/array declaration.
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_boss_pro_customize( array $items ) {

	/** Declare child theme's items */
	$bosspro_items = array(
		'boss-images' => array(
			'type'  => 'section',
			'title' => esc_attr__( 'Front Page Images', 'toolbar-extras' ),
			'id'    => 'bosspro-images',
		),
		'colors' => array(
			'type'  => 'section',
			'title' => __( 'Colors', 'toolbar-extras' ),
			'id'    => 'bosspro-colors',
		),
		'header_image' => array(
			'type'  => 'section',
			'title' => __( 'Header Image', 'toolbar-extras' ),
			'id'    => 'bosspro-header-image',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $bosspro_items );

}  // end function
