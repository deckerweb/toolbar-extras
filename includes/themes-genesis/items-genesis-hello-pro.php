<?php

// includes/themes-genesis/items-genesis-hello-pro

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_hello_pro_customize', 90 );
/**
 * Customize items for Genesis Child Theme:
 *   Hello Pro 2 (Premium, by brandiD)
 *
 * @since 1.4.2
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_hello_pro_customize( array $items ) {

	/** Declare child theme's items */
	$hellopro_items = array(
		'HelloPro-settings' => array(
			'type'  => 'section',
			'title' => __( 'Front Page Background Images', 'toolbar-extras' ),
			'id'    => 'hellopro-front-background',
		),
		'header_settings' => array(
			'type'  => 'section',
			'title' => __( 'Sticky Header', 'toolbar-extras' ),
			'id'    => 'hellopro-sticky-header',
		),
		'colors' => array(
			'type'  => 'section',
			'title' => __( 'Colors', 'toolbar-extras' ),
			'id'    => 'hellopro-colors',
		),
		'header_image' => array(
			'type'  => 'section',
			'title' => __( 'Header Image', 'toolbar-extras' ),
			'id'    => 'hellopro-header-image',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $hellopro_items );

}  // end function
