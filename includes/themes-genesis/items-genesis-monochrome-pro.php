<?php

// includes/themes-genesis/items-genesis-monochrome-pro

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_monochrome_pro_customize', 90 );
/**
 * Customize items for Genesis Child Theme:
 *   Monochrome Pro (Premium, by StudioPress)
 *
 * @since 1.2.0
 * @since 1.4.8 Refactored using filter/array declaration.
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_monochrome_pro_customize( array $items ) {

	/** Declare child theme's items */
	$monochromepro_items = array(
		'monochrome_theme_options' => array(
			'type'  => 'section',
			'title' => ddw_tbex_string_genesis_child_theme_settings(),
			'id'    => 'monochromepro-settings',
		),
		'monochrome-settings' => array(
			'type'  => 'section',
			'title' => __( 'Front Page Background Images', 'toolbar-extras' ),
			'id'    => 'monochromepro-frontpage-background-images',
		),
		'colors' => array(
			'type'  => 'section',
			'title' => __( 'Colors', 'toolbar-extras' ),
			'id'    => 'monochromepro-colors',
		),
		'header_image' => array(
			'type'  => 'section',
			'title' => __( 'Header Image', 'toolbar-extras' ),
			'id'    => 'monochromepro-header-image',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $monochromepro_items );

}  // end function
