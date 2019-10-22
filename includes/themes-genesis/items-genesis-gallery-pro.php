<?php

// includes/themes-genesis/items-genesis-gallery-pro

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_gallery_pro_customize', 90 );
/**
 * Customize items for Genesis Child Theme:
 *   Gallery Pro (Premium, by Design by Bloom)
 *
 * @since 1.3.2
 * @since 1.4.8 Refactored using filter/array declaration.
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_gallery_pro_customize( array $items ) {

	/** Declare child theme's items */
	$gallerypro_items = array(
		'bbs_background_image_section' => array(
			'type'  => 'section',
			'title' => __( 'Front Page Background Images', 'toolbar-extras' ),
			'id'    => 'gallerypro-frontpage-background-images',
		),
		'bbs_front_page_content_settings' => array(
			'type'  => 'section',
			'title' => __( 'Front Page Content Settings', 'toolbar-extras' ),
			'id'    => 'gallerypro-front-page-content',
		),
		'colors' => array(
			'type'  => 'section',
			'title' => __( 'Colors', 'toolbar-extras' ),
			'id'    => 'gallerypro-colors',
		),
		'header_image' => array(
			'type'  => 'section',
			'title' => __( 'Header Image', 'toolbar-extras' ),
			'id'    => 'gallerypro-header-image',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $gallerypro_items );

}  // end function
