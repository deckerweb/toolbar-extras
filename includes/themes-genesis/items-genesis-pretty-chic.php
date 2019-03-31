<?php

// includes/themes-genesis/items-genesis-pretty-chic

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_pretty_chic_customize', 90 );
/**
 * Customize items for Genesis Child Theme:
 *   Pretty Chic (Premium, by Lindsey Riel)
 *
 * @since 1.4.2
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_pretty_chic_customize( array $items ) {

	/** Declare child theme's items */
	$pc_items = array(
		'header_image' => array(
			'type'  => 'section',
			'title' => __( 'Header Image', 'toolbar-extras' ),
			'id'    => 'prettychic-header-image',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $pc_items );

}  // end function
