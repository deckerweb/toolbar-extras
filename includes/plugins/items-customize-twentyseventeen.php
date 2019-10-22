<?php

// includes/plugins/items-customize-twentyseventeen

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_cmz_customize_twentyseventeen', 15 );
/**
 * Theme items for: Twenty Seventeen (free, by WordPress.org)
 *   via plugin: Customize Twenty Seventeen (free, by BoldThemes)
 *
 * @since 1.4.8
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_cmz_customize_twentyseventeen( array $items ) {

	$twenty_seventeen_items[ 'boldthemes_section' ] = array(
		'type'  => 'section',
		'title' => __( 'BoldThemes Settings', 'toolbar-extras' ),
		'id'    => 'cmz-2017-boldthemes',
	);

	/** Merge and return with all items */
	return array_merge( $items, $twenty_seventeen_items );

}  // end function
