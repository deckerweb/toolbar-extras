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


/**
 * Is "Hello Elementor" theme at least v2.0.2 or higher?
 *
 * @since 1.4.3
 *
 * @return bool TRUE if theme version is at least 2.0.2, FALSE otherwise.
 */
function ddw_tbex_is_ehello_v2() {

	$theme = wp_get_theme();

	return version_compare( $theme->get( 'Version' ), '2.0.2', '>=' );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_elementor_hello', 100 );
/**
 * Items for Theme:
 *   Elementor Hello Theme (free, by Elementor Team/ Elementor Ltd.)
 *
 * @since 1.0.0
 * @since 1.4.0 Simplified functions.
 * @since 1.4.3 Integration of wordpress.org version of the theme.
 *
 * @uses ddw_tbex_is_ehello_v2()
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_customizer_start()
 * @uses ddw_tbex_item_theme_creative_customize()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_elementor_hello( $admin_bar ) {

	$title = ddw_tbex_is_ehello_v2() ? 'Hello Elementor' : 'Elementor Hello';

	/** Theme creative */
	$admin_bar->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child', $title ),
			'href'   => ddw_tbex_customizer_start(),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_theme_title( 'attr', 'child', $title ),
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
 * @since 1.4.3 Added new resources.
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_is_ehello_v2()
 * @uses ddw_tbex_resource_item()
 * @uses ddw_tbex_get_resource_url()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_elementor_hello_resources( $admin_bar ) {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for Elementor Hello Theme */
	$admin_bar->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' ),
		)
	);

	if ( ddw_tbex_is_ehello_v2() ) {

		ddw_tbex_resource_item(
			'support-forum',
			'ehello-support',
			'group-theme-resources',
			ddw_tbex_get_resource_url( 'elementor', 'url_ehello_support' )
		);

		ddw_tbex_resource_item(
			'translations-community',
			'ehello-translate',
			'group-theme-resources',
			ddw_tbex_get_resource_url( 'elementor', 'url_ehello_translate' )
		);

	}  // end if

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
