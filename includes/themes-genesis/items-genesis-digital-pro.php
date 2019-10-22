<?php

// includes/themes-genesis/items-genesis-digital-pro

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_digital_pro_customize', 90 );
/**
 * Customize items for Genesis Child Theme:
 *   Digital Pro (Premium, by StudioPress)
 *
 * @since 1.3.2
 * @since 1.4.8 Refactored using filter/array declaration.
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_digital_pro_customize( array $items ) {

	/** Declare child theme's items */
	$digitalpro_items = array(
		'colors' => array(
			'type'  => 'section',
			'title' => __( 'Colors', 'toolbar-extras' ),
			'id'    => 'digitalpro-colors',
		),
		'header_image' => array(
			'type'  => 'section',
			'title' => __( 'Header Image', 'toolbar-extras' ),
			'id'    => 'digitalpro-header-image',
		),
		'digital-image' => array(
			'type'  => 'section',
			'title' => __( 'Front Page Image', 'toolbar-extras' ),
			'id'    => 'digitalpro-front-page-image',
		),
		'digital_journal_section' => array(
			'type'  => 'section',
			'title' => __( 'Front Page Content Settings', 'toolbar-extras' ),
			'id'    => 'digitalpro-front-page-content',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $digitalpro_items );

}  // end function
