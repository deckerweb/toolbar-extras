<?php

// includes/themes/items-airi

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_airi', 100 );
/**
 * Items for Theme: Airi (free, by athemes)
 *
 * @since 1.4.7
 *
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_item_theme_creative_customize()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_airi( $admin_bar ) {

	/** Airi creative */
	$admin_bar->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child' ),
			'href'   => esc_url( admin_url( 'themes.php?page=airi-info.php' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_theme_title( 'attr', 'child' ),
			)
		)
	);

	/** Airi customize */
	ddw_tbex_item_theme_creative_customize();

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_airi_customize' );
/**
 * Customize items for Airi Theme
 *
 * @since 1.4.7
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_airi_customize( array $items ) {

	/** Declare theme's items */
	$airi_items = array(
		'airi_panel_header' => array(
			'type'  => 'panel',
			'title' => __( 'Header', 'toolbar-extras' ),
			'id'    => 'airicmz-header',
		),
		'airi_panel_typography' => array(
			'type'  => 'panel',
			'title' => __( 'Typography', 'toolbar-extras' ),
			'id'    => 'airicmz-typography',
		),
		'airi_panel_colors' => array(
			'type'  => 'panel',
			'title' => __( 'Colors', 'toolbar-extras' ),
			'id'    => 'airicmz-colors',
		),
		'airi_section_footer' => array(
			'type'  => 'section',
			'title' => __( 'Footer', 'toolbar-extras' ),
			'id'    => 'airicmz-footer',
		),
		'airi_panel_blog' => array(
			'type'        => 'panel',
			'title'       => __( 'Blog', 'toolbar-extras' ),
			'id'          => 'airicmz-blog',
			'preview_url' => get_post_type_archive_link( 'post' ),
		),
		'background_image' => array(
			'type'  => 'section',
			'title' => __( 'Background Image', 'toolbar-extras' ),
			'id'    => 'airicmz-background-image',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $airi_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_airi_resources', 120 );
/**
 * General resources items for Airi Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.4.7
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_is_airi_pro_active()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_airi_resources( $admin_bar ) {

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
		'https://wordpress.org/support/theme/airi'
	);

	ddw_tbex_resource_item(
		'documentation',
		'theme-docs',
		'group-theme-resources',
		'https://docs.athemes.com/category/260-airi',
		ddw_tbex_string_official_theme_documentation()
	);

	ddw_tbex_resource_item(
		'changelog',
		'theme-changelog',
		'group-theme-resources',
		'https://athemes.com/changelog/airi/',
		ddw_tbex_string_version_history( 'theme' )
	);

	ddw_tbex_resource_item(
		'translations-community',
		'theme-translate',
		'group-theme-resources',
		'https://translate.wordpress.org/projects/wp-themes/airi'
	);

	ddw_tbex_resource_item(
		'github',
		'theme-github',
		'group-theme-resources',
		'https://github.com/athemes/Airi'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://athemes.com/theme/airi/'
	);

}  // end function
