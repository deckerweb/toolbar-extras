<?php

// includes/themes-genesis/items-genesis-altitude-pro

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_altitude_pro_customize', 90 );
/**
 * Customize items for Genesis Child Theme:
 *   Altitude Pro (Premium, by StudioPress)
 *
 * @since 1.3.0
 * @since 1.4.2 Refactored using filter/array declaration.
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_altitude_pro_customize( array $items ) {

	/** Declare child theme's items */
	$altitudepro_items = array(
		'altitude-settings' => array(
			'type'  => 'section',
			'title' => __( 'Front Page Background Images', 'toolbar-extras' ),
			'id'    => 'altitudepro-frontpage-background-images',
		),
		'colors' => array(
			'type'  => 'section',
			'title' => __( 'Colors', 'toolbar-extras' ),
			'id'    => 'altitudepro-colors',
		),
		'header_image' => array(
			'type'  => 'section',
			'title' => __( 'Header Image', 'toolbar-extras' ),
			'id'    => 'altitudepro-header-image',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $altitudepro_items );

}  // end function
