<?php

// includes/themes/items-ct-jubilee

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_ct_jubilee_customize' );
/**
 * Customize items for CT Jubilee Theme
 *
 * @since 1.4.9
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_ct_jubilee_customize( array $items ) {

	/** Declare theme's items */
	$jubilee_items = array(
		'colors' => array(
			'type'  => 'section',
			'title' => __( 'Colors', 'toolbar-extras' ),
			'id'    => 'jubileecmz-colors',
		),
		'jubilee_fonts' => array(
			'type'  => 'section',
			'title' => __( 'Fonts', 'toolbar-extras' ),
			'id'    => 'jubileecmz-fonts',
		),
		'jubilee_styling' => array(
			'type'  => 'section',
			'title' => __( 'Styling', 'toolbar-extras' ),
			'id'    => 'jubileecmz-styling',
		),
		'jubilee_logo' => array(
			'type'  => 'section',
			'title' => __( 'Logo', 'toolbar-extras' ),
			'id'    => 'jubileecmz-logo',
		),
		'header_image' => array(
			'type'  => 'section',
			'title' => __( 'Header Image', 'toolbar-extras' ),
			'id'    => 'jubileecmz-header-image',
		),
		'jubilee_footer' => array(
			'type'  => 'section',
			'title' => __( 'Footer', 'toolbar-extras' ),
			'id'    => 'jubileecmz-footer',
		),
		'jubilee_icons' => array(
			'type'  => 'section',
			'title' => __( 'Icons', 'toolbar-extras' ),
			'id'    => 'jubileecmz-icons',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $jubilee_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_ct_jubilee_resources', 120 );
/**
 * General resources items for CT Jubilee Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.4.9
 *
 * @see plugin file, /includes/themes/items-ctcom-shared.php
 *
 * @uses ddw_tbex_themeitems_ctcom_shared_resources()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_ct_jubilee_resources( $admin_bar ) {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return $admin_bar;
	}

	ddw_tbex_themeitems_ctcom_shared_resources( $admin_bar, 'jubilee' );

}  // end function
