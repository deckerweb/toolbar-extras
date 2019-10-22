<?php

// includes/plugins/items-options-for-twentyseventeen

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_cmz_options_for_twentyseventeen', 5 );
/**
 * Theme items for: Twenty Seventeen (free, by WordPress.org)
 *   via plugin: Options for Twenty Seventeen (free, by webd.uk)
 *
 * @since 1.4.8
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_cmz_options_for_twentyseventeen( array $items ) {

	$twenty_seventeen_items[ 'ofts_general' ] = array(
		'type'  => 'section',
		'title' => __( 'General Options', 'toolbar-extras' ),
		'id'    => 'ofts-cmzoptions-general',
	);

	$twenty_seventeen_items[ 'ofts_header' ] = array(
		'type'  => 'section',
		'title' => __( 'Header Options', 'toolbar-extras' ),
		'id'    => 'ofts-cmzoptions-header',
	);

	$twenty_seventeen_items[ 'ofts_navigation' ] = array(
		'type'  => 'section',
		'title' => __( 'Nav Options', 'toolbar-extras' ),
		'id'    => 'ofts-cmzoptions-nav',
	);

	$twenty_seventeen_items[ 'ofts_content' ] = array(
		'type'  => 'section',
		'title' => __( 'Content Options', 'toolbar-extras' ),
		'id'    => 'ofts-cmzoptions-content',
	);

	$twenty_seventeen_items[ 'ofts_footer' ] = array(
		'type'  => 'section',
		'title' => __( 'Footer Options', 'toolbar-extras' ),
		'id'    => 'ofts-cmzoptions-footer',
	);

	/** Merge and return with all items */
	return array_merge( $twenty_seventeen_items, $items );

}  // end function
