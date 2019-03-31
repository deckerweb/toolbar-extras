<?php

// includes/themes-genesis/items-genesis-revolution-pro

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_revolution_pro_customize', 90 );
/**
 * Customize items for Genesis Child Theme:
 *   Revolution Pro (Premium, by StudioPress)
 *
 * @since 1.4.2
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_revolution_pro_customize( array $items ) {

	/** Declare child theme's items */
	$revpro_items = array(
		'colors' => array(
			'type'  => 'section',
			'title' => __( 'Colors', 'toolbar-extras' ),
			'id'    => 'revolutionpro-colors',
		),
		'header_image' => array(
			'type'  => 'section',
			'title' => __( 'Header Image', 'toolbar-extras' ),
			'id'    => 'revolutionpro-header-image',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $revpro_items );

}  // end function
