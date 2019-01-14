<?php

// includes/themes/items-sydney

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_sydney', 100 );
/**
 * Items for Theme: Sydney (free, by athemes)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_item_theme_creative_customize()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_sydney() {

	/** Sydney creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child' ),
			'href'   => esc_url( admin_url( 'themes.php?page=sydney-info.php' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_theme_title( 'attr' )
			)
		)
	);

	/** Sydney customize */
	ddw_tbex_item_theme_creative_customize();

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_sydney_customize' );
/**
 * Customize items for Sydney Theme
 *
 * @since 1.4.0
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_sydney_customize( array $items ) {

	/** Declare theme's items */
	$sydney_items = array(
		'sydney_general' => array(
			'type'  => 'section',
			'title' => __( 'General', 'toolbar-extras' ),
			'id'    => 'sydneycmz-general',
		),
		'sydney_header_panel' => array(
			'type'  => 'panel',
			'title' => __( 'Header Section', 'toolbar-extras' ),
			'id'    => 'sydneycmz-header',
		),
		'sydney_footer' => array(
			'type'  => 'section',
			'title' => __( 'Footer', 'toolbar-extras' ),
			'id'    => 'sydneycmz-footer',
		),
		'blog_options' => array(
			'type'        => 'section',
			'title'       => __( 'Blog Options', 'toolbar-extras' ),
			'id'          => 'sydneycmz-blog',
			'preview_url' => get_post_type_archive_link( 'post' ),
		),
		'sydney_fonts' => array(
			'type'  => 'section',
			'title' => __( 'Fonts', 'toolbar-extras' ),
			'id'    => 'sydneycmz-fonts',
		),
		'sydney_colors_panel' => array(
			'type'  => 'panel',
			'title' => __( 'Colors', 'toolbar-extras' ),
			'id'    => 'sydneycmz-colors',
		),
		'background_image' => array(
			'type'   => 'section',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $sydney_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_sydney_resources', 120 );
/**
 * General resources items for Sydney Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_sydney_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for Sydney Theme */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	ddw_tbex_resource_item(
		'support-forum',
		'theme-support',
		'group-theme-resources',
		'https://wordpress.org/support/theme/sydney'
	);

	ddw_tbex_resource_item(
		'community-forum',
		'theme-contact',
		'group-theme-resources',
		'https://forums.athemes.com/c/sydney'
	);

	ddw_tbex_resource_item(
		'documentation',
		'theme-docs',
		'group-theme-resources',
		'https://docs.athemes.com/category/8-sydney',
		esc_attr__( 'Official Theme Documentation', 'toolbar-extras' )
	);

	ddw_tbex_resource_item(
		'translations-community',
		'theme-translate',
		'group-theme-resources',
		'https://translate.wordpress.org/projects/wp-themes/sydney'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://athemes.com/theme/sydney/'
	);

}  // end function
