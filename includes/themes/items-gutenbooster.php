<?php

// includes/themes/items-gutenbooster

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_gutenbooster', 100 );
/**
 * Items for Theme: GutenBooster (free, by Onur Oztaskiran)
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_customizer_start()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_gutenbooster( $admin_bar ) {

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

	/** GutenBooster customize */
	ddw_tbex_item_theme_creative_customize();

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_gutenbooster_customize' );
/**
 * Customize items for GutenBooster Theme
 *
 * @since 1.4.9
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_gutenbooster_customize( array $items ) {

	/** Declare theme's items */
	$gutenbooster_items = array(
		'global' => array(
			'type'  => 'panel',
			'title' => __( 'Global Settings', 'toolbar-extras' ),
			'id'    => 'gutenboostercmz-global-settings',
		),
		'layout' => array(
			'type'  => 'panel',
			'title' => __( 'Layout', 'toolbar-extras' ),
			'id'    => 'gutenboostercmz-layout',
		),
		'colors' => array(
			'type'  => 'panel',
			'title' => __( 'Theme Colors', 'toolbar-extras' ),
			'id'    => 'gutenboostercmz-theme-colors',
		),
		'page_banner' => array(
			'type'  => 'section',
			'title' => __( 'Page Banner', 'toolbar-extras' ),
			'id'    => 'gutenboostercmz-page-banner',
		),
		'header' => array(
			'type'  => 'panel',
			'title' => __( 'Header', 'toolbar-extras' ),
			'id'    => 'gutenboostercmz-header',
		),
		'typography' => array(
			'type'  => 'panel',
			'title' => __( 'Typography', 'toolbar-extras' ),
			'id'    => 'gutenboostercmz-typography',
		),
		'blog' => array(
			'type'        => 'panel',
			'title'       => __( 'Blog', 'toolbar-extras' ),
			'id'          => 'gutenboostercmz-blog',
			'preview_url' => get_post_type_archive_link( 'post' ),
		),
		'footer' => array(
			'type'  => 'panel',
			'title' => __( 'Footer', 'toolbar-extras' ),
			'id'    => 'gutenboostercmz-footer',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $gutenbooster_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_gutenbooster_resources', 120 );
/**
 * General resources items for GutenBooster Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_gutenbooster_resources( $admin_bar ) {

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
		'https://wordpress.org/support/theme/gutenbooster'
	);

	ddw_tbex_resource_item(
		'translations-community',
		'theme-translate',
		'group-theme-resources',
		'https://translate.wordpress.org/projects/wp-themes/gutenbooster'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://kiokengutenberg.com/'
	);

}  // end function
