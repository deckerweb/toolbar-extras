<?php

// includes/plugins/items-advanced-twentyseventeen

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_cmz_advanced_twentyseventeen', 15 );
/**
 * Theme items for: Twenty Seventeen (free, by WordPress.org)
 *   via plugin: Advanced Twenty Seventeen (free, by saturnplugins)
 *
 * @since 1.4.8
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_cmz_advanced_twentyseventeen( array $items ) {

	$twenty_seventeen_items[ 'ats_global_panel' ] = array(
		'type'  => 'panel',
		'title' => __( 'Advanced: Global', 'toolbar-extras' ),
		'id'    => 'ats-cmz-global',
	);

	$twenty_seventeen_items[ 'ats_header_panel' ] = array(
		'type'  => 'panel',
		'title' => __( 'Advanced: Header', 'toolbar-extras' ),
		'id'    => 'ats-cmz-header',
	);

	$twenty_seventeen_items[ 'ats_footer_panel' ] = array(
		'type'  => 'panel',
		'title' => __( 'Advanced: Footer', 'toolbar-extras' ),
		'id'    => 'ats-cmz-footer',
	);

	$twenty_seventeen_items[ 'ats_miscellaneous_panel' ] = array(
		'type'  => 'panel',
		'title' => __( 'Advanced: Miscellaneous', 'toolbar-extras' ),
		'id'    => 'ats-cmz-miscellaneous',
	);

	$twenty_seventeen_items[ 'ats_home_panel' ] = array(
		'type'  => 'panel',
		'title' => __( 'Advanced: Home Page', 'toolbar-extras' ),
		'id'    => 'ats-cmz-home-page',
	);

	/** Merge and return with all items */
	return array_merge( $items, $twenty_seventeen_items );

}  // end function
