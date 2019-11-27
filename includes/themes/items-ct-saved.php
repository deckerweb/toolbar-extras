<?php

// includes/themes/items-ct-saved

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_ct_saved_customize' );
/**
 * Customize items for CT Saved Theme
 *
 * @since 1.3.0
 * @since 1.4.9 Refactored using filter/array declaration.
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_ct_saved_customize( array $items ) {

	/** Declare theme's items */
	$saved_items = array(
		'colors' => array(
			'type'  => 'section',
			'title' => __( 'Colors', 'toolbar-extras' ),
			'id'    => 'savedcmz-colors',
		),
		'saved_fonts' => array(
			'type'  => 'section',
			'title' => __( 'Fonts', 'toolbar-extras' ),
			'id'    => 'savedcmz-fonts',
		),
		'saved_logo' => array(
			'type'  => 'section',
			'title' => __( 'Logo', 'toolbar-extras' ),
			'id'    => 'savedcmz-logo',
		),
		'saved_header' => array(
			'type'  => 'section',
			'title' => __( 'Header Bar', 'toolbar-extras' ),
			'id'    => 'savedcmz-header-bar',
		),
		'header_image' => array(
			'type'  => 'section',
			'title' => __( 'Header Image', 'toolbar-extras' ),
			'id'    => 'savedcmz-header-image',
		),
		'saved_footer' => array(
			'type'  => 'section',
			'title' => __( 'Footer', 'toolbar-extras' ),
			'id'    => 'savedcmz-footer',
		),
		'saved_effects' => array(
			'type'  => 'section',
			'title' => __( 'Effects', 'toolbar-extras' ),
			'id'    => 'savedcmz-effects',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $saved_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_ct_saved_resources', 120 );
/**
 * General resources items for CT Saved Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.3.0
 * @since 1.4.9 Splitted into own shared function.
 *
 * @see plugin file, /includes/themes/items-ctcom-shared.php
 *
 * @uses ddw_tbex_themeitems_ctcom_shared_resources()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_ct_saved_resources( $admin_bar ) {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return $admin_bar;
	}

	ddw_tbex_themeitems_ctcom_shared_resources( $admin_bar, 'saved' );

}  // end function
