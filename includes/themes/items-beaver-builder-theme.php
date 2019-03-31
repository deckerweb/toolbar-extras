<?php

// includes/themes/items-beaver-builder-theme

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_bbtheme', 100 );
/**
 * Items for Theme: Beaver Builder Theme (Premium, by FastLine Media LLC)
 *
 * @since 1.1.0
 * @since 1.4.2 Simplified functions; added White Label support.
 *
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_customizer_focus()
 * @uses ddw_tbex_customizer_start()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_bbtheme() {

	/** Beaver Builder Theme creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'theme_styles' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_theme_title( 'attr', 'child' )
			)
		)
	);

		/** Beaver Builder Theme customize */
		ddw_tbex_item_theme_creative_customize();

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_bbtheme_customize' );
/**
 * Customize items for Beaver Builder Theme
 *
 * @since 1.1.0
 * @since 1.4.2 Refactored using filter/array declaration.
 *
 * @uses ddw_tbex_is_woocommerce_active()
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_bbtheme_customize( array $items ) {

	/** Declare theme's items */
	$bbt_items = array(
		'fl-presets' => array(
			'type'  => 'section',
			'title' => __( 'Presets', 'toolbar-extras' ),
			'id'    => 'bbtcmz-presets',
		),
		'fl-general' => array(
			'type'  => 'panel',
			'title' => __( 'General', 'toolbar-extras' ),
			'id'    => 'bbtcmz-general',
		),
		'fl-header' => array(
			'type'  => 'panel',
			'title' => __( 'Header', 'toolbar-extras' ),
			'id'    => 'bbtcmz-header',
		),
		'fl-content' => array(
			'type'  => 'panel',
			'title' => __( 'Content', 'toolbar-extras' ),
			'id'    => 'bbtcmz-content',
		),
		'fl-footer' => array(
			'type'  => 'panel',
			'title' => __( 'Footer', 'toolbar-extras' ),
			'id'    => 'bbtcmz-footer',
		),
		'fl-code' => array(
			'type'  => 'panel',
			'title' => __( 'Code', 'toolbar-extras' ),
			'id'    => 'bbtcmz-code',
		),
		'fl-settings' => array(
			'type'  => 'panel',
			'title' => __( 'Settings', 'toolbar-extras' ),
			'id'    => 'bbtcmz-settings',
		),
	);

	/** Only show as long as "Customizer Export Import" Plugin is not active */
	if ( ! class_exists( 'CEI_Core' ) ) {

		$pbf_items[ 'fl-export-import' ] = array(
			'type'  => 'panel',
			'title' => __( 'Export &amp; Import', 'toolbar-extras' ),
			'id'    => 'bbtcmz-export-import',
		);

	}  // end if

	/** Merge and return with all items */
	return array_merge( $items, $bbt_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_bbtheme_resources', 120 );
/**
 * General resources items for Beaver Builder Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.1.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 */
function ddw_tbex_themeitems_bbtheme_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for Beaver Builder Theme */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	ddw_tbex_resource_item(
		'knowledge-base',
		'theme-kb',
		'group-theme-resources',
		'https://kb.wpbeaverbuilder.com/collection/7-theme'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://www.wpbeaverbuilder.com/wordpress-framework-theme/'
	);

}  // end function
