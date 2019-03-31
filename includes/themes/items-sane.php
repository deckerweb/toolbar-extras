<?php

// includes/themes/items-sane

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_sane', 100 );
/**
 * Items for Themes:
 *   - Sane (free, by Elegant Marketplace)
 *   - Sane Pro (Premium, by Elegant Marketplace)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_customizer_start()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_sane() {

	/** Theme creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child' ),
			'href'   => ddw_tbex_customizer_start(),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_theme_title( 'attr', 'child' )
			)
		)
	);

	/** Sane customize */
	ddw_tbex_item_theme_creative_customize();

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_sane_customize' );
/**
 * Customize items for Sane Theme
 *
 * @since 1.4.2
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_sane_customize( array $items ) {

	/** Declare theme's items */
	$sane_items = array(
		'theme_option_panel' => array(
			'type'  => 'panel',
			'title' => __( 'Theme Options', 'toolbar-extras' ),
			'id'    => 'sanecmz-theme-options',
		),
		'color_option_panel' => array(
			'type'  => 'panel',
			'title' => __( 'Color Options', 'toolbar-extras' ),
			'id'    => 'sanecmz-color-options',
		),
		'colors' => array(
			'type'  => 'section',
			'title' => __( 'Colors', 'toolbar-extras' ),
			'id'    => 'sanecmz-colors',
		),
		'background_image' => array(
			'type'  => 'section',
			'title' => __( 'Background Image', 'toolbar-extras' ),
			'id'    => 'sanecmz-background-image',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $sane_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_sane_resources', 120 );
/**
 * General resources items for Sane Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 */
function ddw_tbex_themeitems_sane_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for Sane */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	ddw_tbex_resource_item(
		'support-contact',
		'theme-contact',
		'group-theme-resources',
		'https://sanetheme.com/support/'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://sanetheme.com/'
	);

}  // end function
