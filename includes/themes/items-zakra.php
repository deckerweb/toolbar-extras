<?php

// includes/themes/items-zakra

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_zakra', 100 );
/**
 * Items for Theme: Zakra (free, by ThemeGrill)
 *
 * @since 1.4.7
 *
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_item_theme_creative_customize()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_zakra( $admin_bar ) {

	/** Zakra creative */
	$admin_bar->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child' ),
			'href'   => esc_url( admin_url( 'themes.php?page=zakra-about' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_theme_title( 'attr', 'child' ),
			)
		)
	);

	/** Zakra customize */
	ddw_tbex_item_theme_creative_customize();

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_zakra_customize' );
/**
 * Customize items for Zakra Theme
 *
 * @since 1.4.7
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_zakra_customize( array $items ) {

	/** Declare theme's items */
	$zakra_items = array(
		'zakra_header_group' => array(
			'type'  => 'section',
			'title' => __( 'Header', 'toolbar-extras' ),
			'id'    => 'zakracmz-header',
		),
		'zakra_menu_group' => array(
			'type'  => 'section',
			'title' => __( 'Menu', 'toolbar-extras' ),
			'id'    => 'zakracmz-menu',
		),
		'zakra_general' => array(
			'type'  => 'section',
			'title' => __( 'General', 'toolbar-extras' ),
			'id'    => 'zakracmz-general',
		),
		'zakra_blog' => array(
			'type'  => 'section',
			'title' => __( 'Post/ Page/ Blog', 'toolbar-extras' ),
			'id'    => 'zakracmz-post-page-blog',
		),
		'zakra_layout_group' => array(
			'type'  => 'section',
			'title' => __( 'Layout', 'toolbar-extras' ),
			'id'    => 'zakracmz-layout',
		),
		'zakra_styling_group' => array(
			'type'  => 'section',
			'title' => __( 'Styling', 'toolbar-extras' ),
			'id'    => 'zakracmz-styling',
		),
		'zakra_typography_group' => array(
			'type'  => 'section',
			'title' => __( 'Typography', 'toolbar-extras' ),
			'id'    => 'zakracmz-typography',
		),
		'zakra_footer_group' => array(
			'type'  => 'section',
			'title' => __( 'Footer', 'toolbar-extras' ),
			'id'    => 'zakracmz-footer',
		),
		'colors' => array(
			'type'  => 'section',
			'title' => __( 'Colors', 'toolbar-extras' ) . ' (WP)',
			'id'    => 'zakracmz-colors',
		),
		'header_image' => array(
			'type'  => 'section',
			'title' => __( 'Header Media', 'toolbar-extras' ) . ' (WP)',
			'id'    => 'zakracmz-header-media',
		),
		'background_image' => array(
			'type'  => 'section',
			'title' => __( 'Background Image', 'toolbar-extras' ) . ' (WP)',
			'id'    => 'zakracmz-background-image',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $zakra_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_zakra_resources', 120 );
/**
 * General resources items for Zakra Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.4.7
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_is_zakra_pro_active()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_zakra_resources( $admin_bar ) {

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
		'https://wordpress.org/support/theme/zakra'
	);

	ddw_tbex_resource_item(
		'documentation',
		'theme-docs',
		'group-theme-resources',
		'http://docs.themegrill.com/zakra',
		ddw_tbex_string_official_theme_documentation()
	);

	ddw_tbex_resource_item(
		'changelog',
		'theme-changelog',
		'group-theme-resources',
		'https://zakratheme.com/zakra-changelog/',
		ddw_tbex_string_version_history( 'theme' )
	);

	ddw_tbex_resource_item(
		'translations-community',
		'theme-translate',
		'group-theme-resources',
		'https://translate.wordpress.org/projects/wp-themes/zakra'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://zakratheme.com/'
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_zakra_demo_importer', 100 );
/**
 * Items for Demos Import (Plugin):
 *   ThemeGrill Demo Importer (free, by ThemeGrill)
 *
 * @since 1.4.7
 *
 * @uses ddw_tbex_display_items_demo_import()
 * @uses ddw_tbex_id_sites_browser()
 * @uses ddw_tbex_item_title_with_settings_icon()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_zakra_demo_importer( $admin_bar ) {

	/** Bail early if no display of Demo Import items */
	if ( ! ddw_tbex_display_items_demo_import() ) {
		return $admin_bar;
	}

	/** Sites Library */
	if ( class_exists( 'ThemeGrill_Demo_Importer' ) ) {

		$admin_bar->add_node(
			array(
				'id'     => ddw_tbex_id_sites_browser(),
				'parent' => 'group-demo-import',
				'title'  => ddw_tbex_item_title_with_settings_icon(
					esc_attr__( 'Import Demo Sites', 'toolbar-extras' ),
					'general',
					'demo_import_icon'
				),
				'href'   => esc_url( admin_url( 'themes.php?page=demo-importer' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Import Demo Sites', 'toolbar-extras' ),
				)
			)
		);

	}  // end if

}  // end function
