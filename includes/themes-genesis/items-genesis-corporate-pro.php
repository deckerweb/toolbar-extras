<?php

// includes/themes-genesis/items-genesis-corporate-pro

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_corporate_pro_customize', 90 );
/**
 * Customize items for Genesis Child Theme:
 *   Corporate Pro (Premium, by StudioPress)
 *
 * @since 1.2.0
 * @since 1.4.8 Refactored using filter/array declaration.
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_corporate_pro_customize( array $items ) {

	/** Declare child theme's items */
	$corporatepro_items = array(
		'colors' => array(
			'type'  => 'section',
			'title' => __( 'Colors', 'toolbar-extras' ),
			'id'    => 'corporatepro-colors',
		),
		'header_image' => array(
			'type'  => 'section',
			'title' => __( 'Header Media', 'toolbar-extras' ),
			'id'    => 'corporatepro-header-image',
		),
		'background_image' => array(
			'type'  => 'section',
			'title' => __( 'Background Image', 'toolbar-extras' ),
			'id'    => 'corporatepro-background-image',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $corporatepro_items );

}  // end function
