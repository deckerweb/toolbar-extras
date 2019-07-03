<?php

// includes/themes/items-coblocks

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_coblocks', 100 );
/**
 * Items for Theme: CoBlocks (free, by GoDaddy/ CoBlocks)
 *
 * @since 1.4.0
 * @since 1.4.2 Simplified functions.
 *
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_customizer_start()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_coblocks( $admin_bar ) {

	/** Theme creative */
	$admin_bar->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child' ),
			'href'   => ddw_tbex_customizer_start(),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_theme_title( 'attr', 'child' ),
			)
		)
	);

	/** CoBlocks customize */
	ddw_tbex_item_theme_creative_customize();

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_coblocks_customize' );
/**
 * Customize items for CoBlocks Theme
 *
 * @since 1.4.0
 * @since 1.4.2 Refactored using filter/array declaration.
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_coblocks_customize( array $items ) {

	/** Declare theme's items */
	$coblocks_items = array(
		'colors' => array(
			'type'  => 'section',
			'title' => __( 'Colors', 'toolbar-extras' ),
			'id'    => 'coblockscmz-colors',
		),
		'background_image' => array(
			'type'  => 'section',
			'title' => __( 'Background Image', 'toolbar-extras' ),
			'id'    => 'coblockscmz-background-image',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $coblocks_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_coblocks_resources', 120 );
/**
 * General resources items for CoBlocks Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_coblocks_resources( $admin_bar ) {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for CoBlocks */
	$admin_bar->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' ),
		)
	);

	ddw_tbex_resource_item(
		'support-forum',
		'theme-support',
		'group-theme-resources',
		'https://wordpress.org/support/theme/coblocks'
	);

	ddw_tbex_resource_item(
		'translations-community',
		'theme-translate',
		'group-theme-resources',
		'https://translate.wordpress.org/projects/wp-themes/coblocks'
	);

	ddw_tbex_resource_item(
		'github',
		'theme-github',
		'group-theme-resources',
		'https://github.com/godaddy/coblocks-theme'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://coblocks.com/'
	);

}  // end function
