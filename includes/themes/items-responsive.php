<?php

// includes/themes/items-responsive

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_responsive', 100 );
/**
 * Items for Theme: Responsive (free, by CyberChimps)
 *
 * @since 1.4.7
 *
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_item_theme_creative_customize()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_responsive( $admin_bar ) {

	/** Responsive creative */
	$admin_bar->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child' ),
			'href'   => esc_url( admin_url( 'themes.php?page=responsive-options' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_theme_title( 'attr', 'child' ),
			)
		)
	);

	/** Responsive customize */
	ddw_tbex_item_theme_creative_customize();

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_responsive_customize' );
/**
 * Customize items for Responsive Theme
 *
 * @since 1.4.7
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_responsive_customize( array $items ) {

	/** Declare theme's items */
	$responsive_items = array(
		'responsive-appearance-options' => array(
			'type'  => 'panel',
			'title' => __( 'Appearance', 'toolbar-extras' ),
			'id'    => 'responsivecmz-appearance',
		),
		'responsive-header-options' => array(
			'type'  => 'panel',
			'title' => __( 'Header', 'toolbar-extras' ),
			'id'    => 'responsivecmz-header',
		),
		'responsive-blog-options' => array(
			'type'        => 'panel',
			'title'       => __( 'Blog', 'toolbar-extras' ),
			'id'          => 'responsivecmz-blog',
			'preview_url' => get_post_type_archive_link( 'post' ),
		),
		'responsive-page-options' => array(
			'type'  => 'panel',
			'title' => __( 'Page', 'toolbar-extras' ),
			'id'    => 'responsivecmz-page',
		),
		'responsive-footer-options' => array(
			'type'  => 'panel',
			'title' => __( 'Footer', 'toolbar-extras' ),
			'id'    => 'responsivecmz-footer',
		),
		'responsive_typography_panel' => array(
			'type'  => 'panel',
			'title' => __( 'General Typography', 'toolbar-extras' ),
			'id'    => 'responsivecmz-typography',
		),
		'responsive-theme-options' => array(
			'type'  => 'panel',
			'title' => __( 'Extras (Theme Options)', 'toolbar-extras' ),
			'id'    => 'responsivecmz-extras',
		),
	);

	/** Optional WooCommerce item */
	if ( ddw_tbex_is_woocommerce_active() ) {

		$responsive_items[ 'woocommerce' ] = array(
			'type'        => 'panel',
			'title'       => __( 'WooCommerce Options', 'toolbar-extras' ),
			'id'          => 'responsivecmz-shop',
			'preview_url' => get_post_type_archive_link( 'product' ),
		);

	}  // end if

	/** Merge and return with all items */
	return array_merge( $items, $responsive_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_responsive_resources', 120 );
/**
 * General resources items for Responsive Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.4.7
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_is_responsive_pro_active()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_responsive_resources( $admin_bar ) {

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
		'https://wordpress.org/support/theme/responsive'
	);

	ddw_tbex_resource_item(
		'documentation',
		'theme-docs',
		'group-theme-resources',
		'https://docs.cyberchimps.com/responsive/',
		ddw_tbex_string_official_theme_documentation()
	);

	ddw_tbex_resource_item(
		'translations-community',
		'theme-translate',
		'group-theme-resources',
		'https://translate.wordpress.org/projects/wp-themes/responsive'
	);

	ddw_tbex_resource_item(
		'github',
		'theme-github',
		'group-theme-resources',
		'https://github.com/cyberchimps/responsive'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://cyberchimps.com/'
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_responsive_site_importer', 100 );
/**
 * Items for Demos Import (Plugin):
 *   Responsive Add Ons (free, by CyberChimps)
 *
 * @since 1.4.7
 *
 * @uses ddw_tbex_display_items_demo_import()
 * @uses ddw_tbex_id_sites_browser()
 * @uses ddw_tbex_item_title_with_settings_icon()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_responsive_site_importer( $admin_bar ) {

	/** Bail early if no display of Demo Import items */
	if ( ! ddw_tbex_display_items_demo_import() ) {
		return $admin_bar;
	}

	/** Sites Library */
	if ( class_exists( 'Responsive_Addons' ) ) {

		$admin_bar->add_node(
			array(
				'id'     => ddw_tbex_id_sites_browser(),
				'parent' => 'group-demo-import',
				'title'  => ddw_tbex_item_title_with_settings_icon(
					esc_attr__( 'Ready Site Importer', 'toolbar-extras' ),
					'general',
					'demo_import_icon'
				),
				'href'   => esc_url( admin_url( 'admin.php?page=responsive-add-ons' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Ready Site Importer', 'toolbar-extras' ),
				)
			)
		);

	}  // end if

}  // end function
