<?php

// includes/themes/items-ct-exodus

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_ct_exodus_customize' );
/**
 * Customize items for CT Exodus Theme
 *
 * @since 1.3.0
 * @since 1.4.9 Refactored using filter/array declaration.
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_ct_exodus_customize( array $items ) {

	/** Declare theme's items */
	$exodus_items = array(
		'colors' => array(
			'type'  => 'section',
			'title' => __( 'Colors &amp; Styling', 'toolbar-extras' ),
			'id'    => 'exoduscmz-colors',
		),
		'exodus_fonts' => array(
			'type'  => 'section',
			'title' => __( 'Google Fonts', 'toolbar-extras' ),
			'id'    => 'exoduscmz-fonts',
		),
		'exodus_top' => array(
			'type'  => 'section',
			'title' => __( 'Top Bar', 'toolbar-extras' ),
			'id'    => 'exoduscmz-top-bar',
		),
		'exodus_header' => array(
			'type'  => 'section',
			'title' => __( 'Header &amp; Logo', 'toolbar-extras' ),
			'id'    => 'exoduscmz-header',
		),
		'exodus_footer' => array(
			'type'  => 'section',
			'title' => __( 'Footer', 'toolbar-extras' ),
			'id'    => 'exoduscmz-footer',
		),
		'exodus_slider' => array(
			'type'  => 'section',
			'title' => __( 'Homepage Slider', 'toolbar-extras' ),
			'id'    => 'exoduscmz-slider',
		),
		'header_icons' => array(
			'type'  => 'section',
			'title' => __( 'Social Media Icons', 'toolbar-extras' ),
			'id'    => 'exoduscmz-icons',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $exodus_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_ct_exodus_resources', 120 );
/**
 * General resources items for CT Exodus Theme.
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
function ddw_tbex_themeitems_ct_exodus_resources( $admin_bar ) {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return $admin_bar;
	}

	ddw_tbex_themeitems_ctcom_shared_resources( $admin_bar, 'exodus' );

}  // end function
