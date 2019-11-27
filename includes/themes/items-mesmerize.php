<?php

// includes/themes/items-mesmerize

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if Mesmerize Companion plugin is active or not.
 *
 * @since 1.4.9
 *
 * @return bool TRUE if function exists, FALSE otherwise.
 */
function ddw_tbex_is_mesmerize_companion_active() {

	return function_exists( 'mesmerize_companion_load_text_domain' );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_mesmerize', 100 );
/**
 * Items for Theme: Mesmerize (free, by Extend Themes/ Horea Radu)
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_string_theme_title()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_mesmerize( $admin_bar ) {

	/** Theme creative */
	$admin_bar->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child' ),
			'href'   => esc_url( admin_url( 'themes.php?page=mesmerize-welcome' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_theme_title( 'attr', 'child' ),
			)
		)
	);

	/** Mesmerize customize */
	ddw_tbex_item_theme_creative_customize();

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_mesmerize_customize' );
/**
 * Customize items for Mesmerize Theme
 *
 * @since 1.4.9
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_mesmerize_customize( array $items ) {

	$mesmerize_items[ 'header_layout' ] = array(
		'type'  => 'section',
		'title' => __( 'Header Layout Homepage', 'toolbar-extras' ),
		'id'    => 'mesmerizecmz-header-layout-homepage',
	);

	$mesmerize_items[ 'navigation_panel' ] = array(
		'type'  => 'panel',
		'title' => __( 'Navigation', 'toolbar-extras' ),
		'id'    => 'mesmerizecmz-navigation',
	);

	$mesmerize_items[ 'header' ] = array(
		'type'  => 'panel',
		'title' => __( 'Hero', 'toolbar-extras' ),
		'id'    => 'mesmerizecmz-hero',
	);

	$mesmerize_items[ 'footer_settings' ] = array(
		'type'  => 'section',
		'title' => __( 'Footer Settings', 'toolbar-extras' ),
		'id'    => 'mesmerizecmz-footer-settings',
	);

	$mesmerize_items[ 'blog_settings' ] = array(
		'type'        => 'section',
		'title'       => __( 'Blog Settings', 'toolbar-extras' ),
		'id'          => 'mesmerizecmz-blog-settings',
		'preview_url' => get_post_type_archive_link( 'post' ),
	);

	$mesmerize_items[ 'general_settings' ] = array(
		'type'  => 'panel',
		'title' => __( 'General Settings', 'toolbar-extras' ),
		'id'    => 'mesmerizecmz-general-settings',
	);

	/** Optional WooCommerce item */
	if ( ddw_tbex_is_woocommerce_active() ) {

		$mesmerize_items[ 'mesmerize_woocommerce_panel' ] = array(
			'type'        => 'panel',
			'title'       => __( 'WooCommerce Options', 'toolbar-extras' ),
			'id'          => 'mesmerizecmz-woocommerce-options',
			'preview_url' => get_post_type_archive_link( 'product' ),
		);

	}  // end if

	/** Merge and return with all items */
	return array_merge( $items, $mesmerize_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_mesmerize_resources', 120 );
/**
 * General resources items for Mesmerize Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_mesmerize_resources( $admin_bar ) {

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
		'https://wordpress.org/support/theme/mesmerize'
	);

	ddw_tbex_resource_item(
		'knowledge-base',
		'theme-docs',
		'group-theme-resources',
		'https://extendthemes.com/knowledge-base/mesmerize-theme/'
	);

	ddw_tbex_resource_item(
		'translations-community',
		'theme-translate',
		'group-theme-resources',
		'https://translate.wordpress.org/projects/wp-themes/mesmerize'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://extendthemes.com/mesmerize/'
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_bstone_demo_importer', 100 );
/**
 * Items for Demos Import (Plugin):
 *   Mesmerize Companion (free, by Extend Themes/ Horea Radu)
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_display_items_demo_import()
 * @uses ddw_tbex_is_mesmerize_companion_active()
 * @uses ddw_tbex_id_sites_browser()
 * @uses ddw_tbex_item_title_with_settings_icon()
 * @uses ddw_tbex_meta_target()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_bstone_demo_importer( $admin_bar ) {

	/** Bail early if no display of Demo Import items */
	if ( ! ddw_tbex_display_items_demo_import() || ! ddw_tbex_is_mesmerize_companion_active() ) {
		return $admin_bar;
	}

	/** Sites Library */
	$admin_bar->add_node(
		array(
			'id'     => ddw_tbex_id_sites_browser(),
			'parent' => 'group-demo-import',
			'title'  => ddw_tbex_item_title_with_settings_icon(
				esc_attr__( 'Mesmerize Demos', 'toolbar-extras' ),
				'general',
				'demo_import_icon'
			),
			'href'   => esc_url( admin_url( 'themes.php?page=mesmerize-demos' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Mesmerize Demo Importer', 'toolbar-extras' ),
			)
		)
	);

}  // end function
