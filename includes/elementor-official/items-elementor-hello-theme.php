<?php

// includes/elementor-official/items-elementor-hello-theme

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_elementor_hello', 100 );
/**
 * Items for Theme:
 *   Elementor Hello Theme (free, by Elementor Team/ Elementor Ltd.)
 *
 * @since 1.0.0
 * @since 1.4.0 Simplified functions.
 *
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_customizer_start()
 * @uses ddw_tbex_item_theme_creative_customize()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_elementor_hello() {

	/** Theme creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child', 'Elementor Hello' ),
			'href'   => ddw_tbex_customizer_start(),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_theme_title( 'attr', 'child', 'Elementor Hello' ),
			)
		)
	);

	/** Theme customize */
	ddw_tbex_item_theme_creative_customize();

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_elementor_hello_customize' );
/**
 * Customize items for Elementor Hello Theme
 *
 * @since 1.4.0
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_elementor_hello_customize( array $items ) {

	/** Declare theme's items */
	$hello_items = array(
		'custom_css' => array(
			'type'  => 'section',
			'title' => __( 'Custom CSS', 'toolbar-extras' ),
			'id'    => 'ehellocmz-css',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $hello_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_elementor_hello_resources', 999 );
/**
 * General resources items for Elementor Hello Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 * @uses ddw_tbex_get_resource_url()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_elementor_hello_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for Elementor Hello Theme */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	ddw_tbex_resource_item(
		'github-issues',
		'ehello-ghissues',
		'group-theme-resources',
		ddw_tbex_get_resource_url( 'elementor', 'url_github_issues' )
	);

	ddw_tbex_resource_item(
		'github',
		'ehello-github',
		'group-theme-resources',
		ddw_tbex_get_resource_url( 'elementor', 'url_ehello_github' )
	);

	ddw_tbex_resource_item(
		'facebook-group',
		'ehello-fbgroup',
		'group-theme-resources',
		ddw_tbex_get_resource_url( 'elementor', 'url_fb_group' )
	);

}  // end function
