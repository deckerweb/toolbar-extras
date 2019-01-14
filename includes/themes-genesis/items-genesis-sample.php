<?php

// includes/themes-genesis/items-genesis-sample

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_genesis_sample_customize' );
/**
 * Customize items for Genesis Child Theme:
 *   Genesis Sample (Premium, by StudioPress) - only for version 2.6.0 or higher!
 *
 * @since 1.2.0
 * @since 1.4.0 Refactored using filter/array declaration.
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_genesis_sample_customize( array $items ) {

	/** Declare theme's items */
	$sample_items = array(
		'colors' => array(
			'type'  => 'section',
			'title' => __( 'Colors', 'toolbar-extras' ),
			'id'    => 'genesis-sample-colors',
		),
		'custom_css' => array(
			'type'  => 'section',
			'title' => __( 'Custom CSS', 'toolbar-extras' ),
			'id'    => 'genesis-sample-css',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $sample_items );

}  // end function
