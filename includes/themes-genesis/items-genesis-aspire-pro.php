<?php

// includes/themes-genesis/items-genesis-aspire-pro

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_aspire_pro_customize', 90 );
/**
 * Customize items for Genesis Child Theme:
 *   Aspire Pro (Premium, by Appfinite)
 *
 * @since 1.3.2
 * @since 1.4.2 Refactored using filter/array declaration.
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_aspire_pro_customize( array $items ) {

	/** Declare child theme's items */
	$aspirepro_items = array(
		'aspire_journal_section' => array(
			'type'  => 'section',
			'title' => __( 'Front Page Content Settings', 'toolbar-extras' ),
			'id'    => 'aspirepro-front-page-content',
		),
		'aspire-settings' => array(
			'type'  => 'section',
			'title' => __( 'Front Page Background Images', 'toolbar-extras' ),
			'id'    => 'aspirepro-frontpage-background-images',
		),
		'colors' => array(
			'type'  => 'section',
			'title' => __( 'Colors', 'toolbar-extras' ),
			'id'    => 'aspirepro-colors',
		),
		'header_image' => array(
			'type'  => 'section',
			'title' => __( 'Header Image', 'toolbar-extras' ),
			'id'    => 'aspirepro-header-image',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $aspirepro_items );

}  // end function
