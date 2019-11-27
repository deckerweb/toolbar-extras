<?php

// includes/themes/items-reykjavik

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_reykjavik', 100 );
/**
 * Items for Theme: Reykjavik (free, by WebMan Design/ Oliver Juhas)
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_customizer_start()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_reykjavik( $admin_bar ) {

	/** Theme creative */
	$admin_bar->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child' ),
			'href'   => esc_url( admin_url( 'themes.php?page=reykjavik-welcome' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_theme_title( 'attr', 'child' ),
			)
		)
	);

	/** Reykjavik customize */
	ddw_tbex_item_theme_creative_customize();

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_reykjavik_customize' );
/**
 * Customize items for Reykjavik Theme
 *
 * @since 1.4.9
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_reykjavik_customize( array $items ) {

	/** Declare theme's items */
	$reykjavik_items = array(
		'theme-options' => array(
			'type'  => 'panel',
			'title' => __( 'Theme Options', 'toolbar-extras' ),
			'id'    => 'reykjavikcmz-theme-options',
		),
		'header_image' => array(
			'type'  => 'section',
			'title' => __( 'Header Media', 'toolbar-extras' ),
			'id'    => 'reykjavikcmz-header-media',
		),
		'background_image' => array(
			'type'  => 'section',
			'title' => __( 'Background Image', 'toolbar-extras' ),
			'id'    => 'reykjavikcmz-background-image',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $reykjavik_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_reykjavik_resources', 120 );
/**
 * General resources items for Reykjavik Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_reykjavik_resources( $admin_bar ) {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return $admin_bar;
	}

	/** Group: Theme's resources */
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
		'https://wordpress.org/support/theme/reykjavik'
	);

	ddw_tbex_resource_item(
		'documentation',
		'theme-docs',
		'group-theme-resources',
		'https://webmandesign.github.io/docs/reykjavik/'
	);

	ddw_tbex_resource_item(
		'translations-community',
		'theme-translate',
		'group-theme-resources',
		'https://translate.wordpress.org/projects/wp-themes/reykjavik'
	);

	ddw_tbex_resource_item(
		'github',
		'theme-github',
		'group-theme-resources',
		'https://github.com/webmandesign/reykjavik'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://www.webmandesign.eu/portfolio/reykjavik-wordpress-theme/'
	);

}  // end function
