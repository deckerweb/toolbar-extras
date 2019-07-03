<?php

// includes/plugins/items-gp-tweaks

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_gp_tweaks_customizer', 100 );
/**
 * Customize items for plugin: Tweaks for GeneratePress (free, by John Chapman)
 *
 * @since 1.4.4
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_gp_tweaks_customizer( array $items ) {

	$gptweaks_items[ 'gptweaks' ] = array(
		'type'  => 'panel',
		'title' => __( 'GP Tweaks', 'toolbar-extras' ),
		'id'    => 'gptweakscmz-gp-tweaks',
		//'parent' => 
	);

	/** Merge and return with all items */
	return array_merge( $items, $gptweaks_items );

}  // end function
