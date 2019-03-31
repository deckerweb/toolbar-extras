<?php

// includes/themes-genesis/items-genesis-brunch-pro

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_brunch_pro_customize', 90 );
/**
 * Customize items for Genesis Child Theme:
 *   Brunch Pro (Premium, by Feast Design Co.)
 *
 * @since 1.2.0
 * @since 1.4.2 Refactored using filter/array declaration.
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_brunch_pro_customize( array $items ) {

	/** Declare child theme's items */
	$brunchpro_items = array(
		'fonts' => array(
			'type'  => 'panel',
			'title' => esc_attr__( 'Typography', 'toolbar-extras' ),
			'id'    => 'brunchpro-typography',
		),
		'colors' => array(
			'type'  => 'panel',
			'title' => __( 'Colors', 'toolbar-extras' ),
			'id'    => 'brunchpro-colors',
		),
		'header_image' => array(
			'type'  => 'section',
			'title' => __( 'Header Image', 'toolbar-extras' ),
			'id'    => 'brunchpro-header-image',
		),
		'background_image' => array(
			'type'  => 'section',
			'title' => __( 'Background Image', 'toolbar-extras' ),
			'id'    => 'brunchpro-background-image',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $brunchpro_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_brunch_pro', 100 );
/**
 * Theme items for Genesis Child Theme:
 *   Brunch Pro (Premium, by Feast Design Co.)
 *
 * @since 1.2.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_brunch_pro() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'brunchpro-theme-info',
			'parent' => 'theme-creative',
			'title'  => esc_attr__( 'Theme Info', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=brunch-pro-dashboard' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Theme Info', 'toolbar-extras' ),
			)
		)
	);

}  // end function
