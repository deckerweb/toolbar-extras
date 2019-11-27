<?php

// includes/plugins/items-sticky-header-2020

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_cmz_sticky_header_2020', 15 );
/**
 * Theme items for: Twenty Twenty (free, by WordPress.org)
 *   via plugin: Sticky Header 2020 (free, by Iulia Cazan)
 *
 * @since 1.4.9
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_cmz_sticky_header_2020( array $items ) {

	$twenty_twenty_items[ 'sh2020_sticky_header_options' ] = array(
		'type'  => 'section',
		'title' => __( 'Sticky Header', 'toolbar-extras' ),
		'id'    => 'cmz-2020-sticky-header',
	);

	/** Merge and return with all items */
	return array_merge( $items, $twenty_twenty_items );

}  // end function
