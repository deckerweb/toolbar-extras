<?php

// includes/plugins/items-options-for-twentynineteen

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_cmz_options_for_twentynineteen', 5 );
/**
 * Theme items for: Twenty Nineteen (free, by WordPress.org)
 *   via plugin: Options for Twenty Nineteen (free, by webd.uk)
 *
 * @since 1.4.8
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_cmz_options_for_twentynineteen( array $items ) {

	$twenty_nineteen_items[ 'oftn_general' ] = array(
		'type'  => 'section',
		'title' => __( 'General Options', 'toolbar-extras' ),
		'id'    => 'oftn-cmzoptions-general',
	);

	$twenty_nineteen_items[ 'oftn_header' ] = array(
		'type'  => 'section',
		'title' => __( 'Header Options', 'toolbar-extras' ),
		'id'    => 'oftn-cmzoptions-header',
	);

	$twenty_nineteen_items[ 'oftn_navigation' ] = array(
		'type'  => 'section',
		'title' => __( 'Nav Options', 'toolbar-extras' ),
		'id'    => 'oftn-cmzoptions-nav',
	);

	$twenty_nineteen_items[ 'oftn_content' ] = array(
		'type'  => 'section',
		'title' => __( 'Content Options', 'toolbar-extras' ),
		'id'    => 'oftn-cmzoptions-content',
	);

	$twenty_nineteen_items[ 'oftn_footer' ] = array(
		'type'  => 'section',
		'title' => __( 'Footer Options', 'toolbar-extras' ),
		'id'    => 'oftn-cmzoptions-footer',
	);

	/** Merge and return with all items */
	return array_merge( $twenty_nineteen_items, $items );

}  // end function
