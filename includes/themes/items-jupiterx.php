<?php

// includes/themes/items-jupiterx

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_jupiterx', 100 );
/**
 * Items for Theme: Jupiter X (Premium, by Artbees)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_customizer_start()
 * @uses ddw_tbex_meta_target()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_jupiterx() {

	/** Theme creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child' ),
			'href'   => esc_url( admin_url( 'admin.php?page=jupiterx' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_theme_title( 'attr', 'child' )
			)
		)
	);

		/** Jupiter X customize */
		ddw_tbex_item_theme_creative_customize();

		/** Setup Wizard */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-creative-setup-wizard',
				'parent' => 'theme-creative',
				'title'  => esc_attr__( 'Setup Wizard', 'toolbar-extras' ),
				'href'   => esc_url( add_query_arg(
					'page',
					'jupiterx-setup-wizard',
					admin_url()
				) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Setup Wizard', 'toolbar-extras' ),
				)
			)
		);

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_jupiterx_customize' );
/**
 * Customize items for Jupiter X Theme
 *
 * @since 1.4.2
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_jupiterx_customize( array $items ) {

	/** Declare theme's items */
	$jupiterx_items = array(
		'jupiterx_blog_panel' => array(
			'type'        => 'panel',
			'title'       => __( 'Blog', 'toolbar-extras' ),
			'id'          => 'jupiterxcmz-theme-options',
			'preview_url' => get_post_type_archive_link( 'post' ),
		),
		'jupiterx_pages' => array(
			'type'  => 'panel',
			'title' => __( 'Pages', 'toolbar-extras' ),
			'id'    => 'jupiterxcmz-pages',
		),
		'jupiterx_portfolio_panel' => array(
			'type'        => 'panel',
			'title'       => __( 'Portfolio', 'toolbar-extras' ),
			'id'          => 'jupiterxcmz-portfolio',
			'preview_url' => get_post_type_archive_link( 'portfolio' ),
		),
	);

	/** Optional WooCommerce item */
	if ( ddw_tbex_is_woocommerce_active() ) {

		$jupiterx_items[ 'jupiterx_shop_panel' ] = array(
			'type'        => 'panel',
			'title'       => __( 'Shop Settings', 'toolbar-extras' ),
			'id'          => 'jupiterxcmz-shop-settings',
			'preview_url' => get_post_type_archive_link( 'product' ),
		);

	}  // end if

	/** Merge and return with all items */
	return array_merge( $items, $jupiterx_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_jupiterx_settings', 120 );
/**
 * Settings items for Jupiter X Theme.
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 */
function ddw_tbex_themeitems_jupiterx_settings() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-settings',
			'parent' => 'group-active-theme',
			'title'  => esc_attr__( 'Jupiter X Settings', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=jupiterx' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Jupiter X Settings', 'toolbar-extras' ),
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-control-panel',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Control Panel', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=jupiterx#home' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Control Panel', 'toolbar-extras' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-install-plugins',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Install Plugins', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=jupiterx#install-plugins' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Install Plugins', 'toolbar-extras' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-install-templates',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Install Templates', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=jupiterx#install-templates' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Install Templates', 'toolbar-extras' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-image-sizes',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Image Sizes', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=jupiterx#image-sizes' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Image Sizes', 'toolbar-extras' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-system-status',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'System Status', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=jupiterx#system-status' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'System Status', 'toolbar-extras' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-updates',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Updates', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=jupiterx#update-theme' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Updates', 'toolbar-extras' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-settings',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=jupiterx#settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_jupiterx_resources', 120 );
/**
 * General resources items for Jupiter X Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 */
function ddw_tbex_themeitems_jupiterx_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for Jupiter X */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => 'theme-settings',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	ddw_tbex_resource_item(
		'documentation',
		'theme-help-documentation',
		'group-theme-resources',
		'https://help.artbees.net/'
	);

	ddw_tbex_resource_item(
		'videos',
		'theme-videos',
		'group-theme-resources',
		'https://themes.artbees.net/support/jupiterx/videos/'
	);

	ddw_tbex_resource_item(
		'changelog',
		'theme-changelog',
		'group-theme-resources',
		'https://themes.artbees.net/support/jupiterx/release-notes/',
		ddw_tbex_string_version_history( 'theme' )
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://themes.artbees.net/pages/'
	);

}  // end function


/**
 * Jupiter X module: Portfolios
 *
 * @since 1.4.2
 *
 * @uses General portfolio post type support (CPT: 'portfolio')
 */
if ( ddw_tbex_is_artbees_raven_active() ) {

	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-cpt-portfolio.php';

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_jupiterx_import_templates', 100 );
/**
 * Items for Jupiter X Demos/Templates import
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_display_items_demo_import()
 * @uses ddw_tbex_id_sites_browser()
 * @uses ddw_tbex_item_title_with_settings_icon()
 * @uses ddw_tbex_meta_target()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_jupiterx_import_templates() {

	/** Bail early if no display of Demo Import items */
	if ( ! ddw_tbex_display_items_demo_import() ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => ddw_tbex_id_sites_browser(),
			'parent' => 'group-demo-import',
			'title'  => ddw_tbex_item_title_with_settings_icon(
				esc_attr__( 'Import Templates', 'toolbar-extras' ),
				'general',
				'demo_import_icon'
			),
			'href'   => esc_url( admin_url( 'admin.php?page=jupiterx#install-templates' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Import Templates', 'toolbar-extras' )
			)
		)
	);

}  // end function
