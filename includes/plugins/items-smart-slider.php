<?php

// includes/plugins/items-smart-slider

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'admin_bar_menu', 'ddw_tbex_site_items_smartslider' );
/**
 * Items for Plugin: Smart Slider 3 (free/Premium, by Nextend)
 *   If tweak setting is active then re-hook from the top to the conditional
 *   hook place for galleries & sliders.
 *   Note: Existing Toolbar node gets filtered.
 *
 * @since 1.0.0
 * @since 1.1.0 Filter the existing Toolbar node instead of removing/add new.
 *
 * @uses ddw_tbex_use_tweak_smartslider()
 *
 * @global mixed  $GLOBALS[ 'wp_admin_bar' ]
 * @param object $wp_admin_bar Holds all nodes of the Toolbar.
 */
function ddw_tbex_site_items_smartslider( $wp_admin_bar ) {

	/** Bail early if Smart Slider 3 tweak should NOT be used */
	if ( ! ddw_tbex_use_tweak_smartslider() ) {
		return $wp_admin_bar;
	}

	/** Re-hook for: Manage Content */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'smart_slider_3',			// same as original!
			'parent' => 'gallery-slider-addons',
			'title'  => esc_attr__( 'Smart Sliders', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=smart-slider-3' ) ),
			'meta'   => array(
				'class'  => 'tbex-smartslider3',
				'target' => '',
				'title'  => esc_attr__( 'Smart Sliders (via Smart Slider 3)', 'toolbar-extras' )
			)
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_smartslider_extend', 100 );
/**
 * Resources items for Plugin: Smart Slider 3
 *
 * @since 1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_smartslider_extend() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'smartslider-settings',
			'parent' => 'smart_slider_3',
			'title'  => esc_attr__( 'General Settings', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=nextend&nextendcontroller=settings&nextendaction=index' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'General Settings', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'smartslider-fonts',
			'parent' => 'smart_slider_3',
			'title'  => esc_attr__( 'Fonts Settings', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=nextend&nextendcontroller=settings&nextendaction=fonts' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Fonts Settings', 'toolbar-extras' )
			)
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_smartslider_resources', 200 );
/**
 * Resources items for Plugin: Smart Slider 3
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_smartslider_resources() {

	/** Group: Resources for Smart Slider 3 */
	if ( ddw_tbex_display_items_resources() ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-smartslider-resources',
				'parent' => 'smart_slider_3',
				'meta'   => array( 'class' => 'ab-sub-secondary' )
			)
		);

		ddw_tbex_resource_item(
			'support-forum',
			'smartslider-support',
			'group-smartslider-resources',
			'https://wordpress.org/support/plugin/smart-slider-3'
		);

		ddw_tbex_resource_item(
			'translations-community',
			'smartslider-translate',
			'group-smartslider-resources',
			'https://translate.wordpress.org/projects/wp-plugins/smart-slider-3'
		);

		ddw_tbex_resource_item(
			'documentation',
			'smartslider-docs',
			'group-smartslider-resources',
			'https://smartslider3.helpscoutdocs.com/'
		);

		ddw_tbex_resource_item(
			'official-site',
			'smartslider-site',
			'group-smartslider-resources',
			'https://smartslider3.com/'
		);

	}  // end if

}  // end function
