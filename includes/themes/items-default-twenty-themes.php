<?php

// includes/themes/items-default-twenty-themes

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_default_twenty', 100 );
/**
 * Items for Themes: "Twenty ..." Default Themes (by WordPress.org)
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_string_theme_title()
 * @uses   ddw_tbex_customizer_start()
 * @uses   ddw_tbex_string_customize_design()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_default_twenty() {

	/** Theme creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child' ),
			'href'   => ddw_tbex_customizer_start(),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_theme_title( 'attr', 'child' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-creative-customize',
				'parent' => 'theme-creative',
				'title'  => ddw_tbex_string_customize_design(),
				'href'   => ddw_tbex_customizer_start(),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => ddw_tbex_string_customize_design()
				)
			)
		);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_default_twenty_resources', 999 );
/**
 * General resources items for Twenty default Themes.
 *   Hook in later to have these items at the bottom.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_display_items_resources()
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_default_twenty_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for Twenty Default Themes */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	$theme_slug = get_stylesheet();

	ddw_tbex_resource_item(
		'support-forum',
		$theme_slug . '-support',
		'group-theme-resources',
		'https://wordpress.org/support/theme/' . $theme_slug
	);

	ddw_tbex_resource_item(
		'translations-community',
		$theme_slug . '-translate',
		'group-theme-resources',
		'https://translate.wordpress.org/projects/wp-themes/' . $theme_slug
	);

}  // end function