<?php

// includes/themes-genesis/items-genesis-course-maker-pro

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_course_maker_pro_customize', 90 );
/**
 * Customize items for Genesis Child Theme:
 *   Course Maker Pro (Premium, by brandiD)
 *
 * @since 1.4.8
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_course_maker_pro_customize( array $items ) {

	/** Declare child theme's items */
	$cmpro_items = array(
		'coursemakerpro_settings' => array(
			'type'  => 'section',
			'title' => __( 'Course Maker Pro Settings', 'toolbar-extras' ),
			'id'    => 'cmpro-course-maker-pro-settings',
		),
		'color_options_section' => array(
			'type'  => 'section',
			'title' => __( 'Color Palette', 'toolbar-extras' ),
			'id'    => 'cmpro-color-options',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $cmpro_items );

}  // end function
