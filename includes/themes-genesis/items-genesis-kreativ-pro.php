<?php

// includes/themes-genesis/items-genesis-kreativ-pro

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_kreativ_pro_customize', 90 );
/**
 * Customize items for Genesis Child Theme:
 *   Kreativ Pro (Premium, by ThemeSquare)
 *
 * @since 1.4.2
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_kreativ_pro_customize( array $items ) {

	/** Declare child theme's items */
	$kreativpro_items = array(
		'kreativ-settings' => array(
			'type'  => 'section',
			'title' => __( 'Front Page Images', 'toolbar-extras' ),
			'id'    => 'kreativpro-front-images',
		),
		'kreativ_sticky_header_section' => array(
			'type'  => 'section',
			'title' => __( 'Sticky Header', 'toolbar-extras' ),
			'id'    => 'kreativpro-sticky-header',
		),
		'colors' => array(
			'type'  => 'section',
			'title' => __( 'Colors', 'toolbar-extras' ),
			'id'    => 'kreativpro-colors',
		),
		'header_image' => array(
			'type'  => 'section',
			'title' => __( 'Header Image', 'toolbar-extras' ),
			'id'    => 'kreativpro-header-image',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $kreativpro_items );

}  // end function
