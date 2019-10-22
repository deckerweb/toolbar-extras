<?php

// includes/themes-genesis/items-genesis-pretty-creative

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_pretty_creative_customize', 90 );
/**
 * Customize items for Genesis Child Theme:
 *   Pretty Creative (Premium, by Lindsey Riel)
 *
 * @since 1.4.8
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_pretty_creative_customize( array $items ) {

	/** Declare child theme's items */
	$prettycreative_items = array(
		'pc_section_home_top' => array(
			'type'  => 'section',
			'title' => __( 'Home Top', 'toolbar-extras' ),
			'id'    => 'prettycreative-home-top',
		),
		'colors' => array(
			'type'  => 'section',
			'title' => __( 'Colors', 'toolbar-extras' ),
			'id'    => 'prettycreative-colors',
		),
		'header_image' => array(
			'type'  => 'section',
			'title' => __( 'Header Image', 'toolbar-extras' ),
			'id'    => 'prettycreative-header-image',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $prettycreative_items );

}  // end function
