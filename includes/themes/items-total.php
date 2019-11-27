<?php

// includes/themes/items-total

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_total', 100 );
/**
 * Items for Theme: Total (free, by Hash Themes)
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_string_theme_title()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_total( $admin_bar ) {

	/** Theme creative */
	$admin_bar->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child' ),
			'href'   => esc_url( admin_url( '/themes.php?page=total-welcome' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_theme_title( 'attr', 'child' ),
			)
		)
	);

	/** Total customize */
	ddw_tbex_item_theme_creative_customize();

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_total_customize' );
/**
 * Customize items for Total Theme
 *
 * @since 1.4.9
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_total_customize( array $items ) {

	/** Declare theme's items */
	$total_items = array(
		'total_general_settings_panel' => array(
			'type'  => 'panel',
			'title' => __( 'General Settings', 'toolbar-extras' ),
			'id'    => 'totalcmz-general-settings',
		),
		'total_home_panel' => array(
			'type'  => 'panel',
			'title' => __( 'Home Sections', 'toolbar-extras' ),
			'id'    => 'totalcmz-home-sections',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $total_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_total_resources', 120 );
/**
 * General resources items for Total Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_total_resources( $admin_bar ) {

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
		'https://wordpress.org/support/theme/total'
	);

	ddw_tbex_resource_item(
		'documentation',
		'theme-docs',
		'group-theme-resources',
		'https://hashthemes.com/documentation/total-documentation/'
	);

	ddw_tbex_resource_item(
		'community-forum',
		'theme-community-forum',
		'group-theme-resources',
		'https://hashthemes.com/support/forum/total/'
	);

	ddw_tbex_resource_item(
		'translations-community',
		'theme-translate',
		'group-theme-resources',
		'https://translate.wordpress.org/projects/wp-themes/total'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://hashthemes.com/wordpress-theme/total/'
	);

}  // end function
