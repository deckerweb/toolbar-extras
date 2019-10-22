<?php

// includes/themes-genesis/items-genesis-cafe-pro

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_cafe_pro_customize', 90 );
/**
 * Customize items for Genesis Child Theme:
 *   Cafe Pro (Premium, by StudioPress)
 *
 * @since 1.4.8
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_cafe_pro_customize( array $items ) {

	/** Declare child theme's items */
	$cafepro_items = array(
		'cafe-settings' => array(
			'type'  => 'section',
			'title' => __( 'Background Images', 'toolbar-extras' ),
			'id'    => 'cafepro-background-images',
		),
		'colors' => array(
			'type'  => 'section',
			'title' => __( 'Colors', 'toolbar-extras' ),
			'id'    => 'cafepro-colors',
		),
		'header_image' => array(
			'type'  => 'section',
			'title' => __( 'Header Image', 'toolbar-extras' ),
			'id'    => 'cafepro-header-image',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $cafepro_items );

}  // end function
