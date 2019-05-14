<?php

// includes/compatibility/classicpress

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'tbex_filter_color_items', 'ddw_tbex_add_color_item_classicpress', 50 );
/**
 * Add additional color item to any instance of a Toolbar Extras color picker
 *   on its setting page.
 *
 * @since 1.4.3
 *
 * @param array $color_items Array holding all color items.
 * @return array Modified array of color items.
 */
function ddw_tbex_add_color_item_classicpress( $color_items ) {

	$color_items[ 'cp-green' ] = array(
		'color' => '#057f99',
		'name'  => __( 'ClassicPress Green', 'toolbar-extras' ),
	);

	return $color_items;

}  // end function
