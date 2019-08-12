<?php

// includes/themes/items-chaplin

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_chaplin', 100 );
/**
 * Items for Theme: Chaplin (free, by Anders Norén)
 *
 * @since 1.4.5
 *
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_customizer_start()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_chaplin( $admin_bar ) {

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

	/** Chaplin customize */
	ddw_tbex_item_theme_creative_customize();

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_chaplin_customize' );
/**
 * Customize items for Chaplin Theme
 *
 * @since 1.4.5
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_chaplin_customize( array $items ) {

	/** Declare theme's items */
	$chaplin_items = array(
		'colors' => array(
			'type'  => 'section',
			'title' => __( 'Colors', 'toolbar-extras' ),
			'id'    => 'chaplincmz-colors',
		),
		'chaplin_fonts_options' => array(
			'type'  => 'section',
			'title' => __( 'Fonts', 'toolbar-extras' ),
			'id'    => 'chaplincmz-fonts',
		),
		'chaplin_image_options' => array(
			'type'  => 'section',
			'title' => __( 'Images', 'toolbar-extras' ),
			'id'    => 'chaplincmz-images',
		),
		'chaplin_site_header_options' => array(
			'type'  => 'section',
			'title' => __( 'Site Header', 'toolbar-extras' ),
			'id'    => 'chaplincmz-site-header',
		),
		'chaplin_post_options' => array(
			'type'        => 'panel',
			'title'       => __( 'Posts', 'toolbar-extras' ),
			'id'          => 'chaplincmz-posts',
			'preview_url' => get_post_type_archive_link( 'post' ),
		),
		'chaplin_cover_template_options' => array(
			'type'  => 'section',
			'title' => __( 'Cover Template', 'toolbar-extras' ),
			'id'    => 'chaplincmz-cover-template',
		),
		'background_image' => array(
			'type'  => 'section',
			'title' => __( 'Background Image', 'toolbar-extras' ),
			'id'    => 'chaplincmz-background-image',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $chaplin_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_chaplin_resources', 120 );
/**
 * General resources items for Chaplin Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.4.5
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_chaplin_resources( $admin_bar ) {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for Chaplin */
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
		'https://wordpress.org/support/theme/chaplin'
	);

	ddw_tbex_resource_item(
		'translations-community',
		'theme-translate',
		'group-theme-resources',
		'https://translate.wordpress.org/projects/wp-themes/chaplin'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://www.andersnoren.se/teman/chaplin-wordpress-theme/'
	);

}  // end function
