<?php

// includes/themes-genesis/items-genesis-daily-dish-pro

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_daily_dish_pro_customize', 90 );
/**
 * Customize items for Genesis Child Theme:
 *   Daily Dish Pro (Premium, by StudioPress)
 *
 * @since 1.3.0
 * @since 1.4.8 Refactored using filter/array declaration.
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_daily_dish_pro_customize( array $items ) {

	/** Declare child theme's items */
	$dailydishpro_items = array(
		'daily_dish_theme_options' => array(
			'type'  => 'section',
			'title' => ddw_tbex_string_genesis_child_theme_settings(),
			'id'    => 'dailydishpro-settings',
		),
		'colors' => array(
			'type'  => 'section',
			'title' => __( 'Colors', 'toolbar-extras' ),
			'id'    => 'dailydishpro-colors',
		),
		'header_image' => array(
			'type'  => 'section',
			'title' => __( 'Header Image', 'toolbar-extras' ),
			'id'    => 'dailydishpro-header-image',
		),
		'background_image' => array(
			'type'  => 'section',
			'title' => __( 'Background Image', 'toolbar-extras' ),
			'id'    => 'dailydishpro-background-image',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $dailydishpro_items );

}  // end function
