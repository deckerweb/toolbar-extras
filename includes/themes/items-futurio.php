<?php

// includes/themes/items-futurio

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if Futurio Pro Add-On plugin is active or not.
 *
 * @since 1.4.2
 *
 * @return bool TRUE if constant is defined, FALSE otherwise.
 */
function ddw_tbex_is_futurio_pro_active() {

	return defined( 'FUTURIO_PRO_CURRENT_VERSION' );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_futurio', 100 );
/**
 * Items for Theme: Futurio (free, by FuturioWP)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_item_theme_creative_customize()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_futurio() {

	/** Futurio creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child' ),
			'href'   => esc_url( admin_url( 'themes.php?page=futurio' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_theme_title( 'attr', 'child' ),
			)
		)
	);

	/** Futurio customize */
	ddw_tbex_item_theme_creative_customize();

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_futurio_customize' );
/**
 * Customize items for Futurio Theme
 *
 * @since 1.4.2
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_futurio_customize( array $items ) {

	/** Declare theme's items */
	$futurio_items = array(
		'colors' => array(
			'type'  => 'panel',
			'title' => __( 'Colors and Typography', 'toolbar-extras' ),
			'id'    => 'futuriocmz-colors-typography',
		),
		'posts_pages_panel' => array(
			'type'        => 'panel',
			'title'       => __( 'Posts and Pages', 'toolbar-extras' ),
			'id'          => 'futuriocmz-posts-pages',
			'preview_url' => get_post_type_archive_link( 'post' ),
		),
		'global_section' => array(
			'type'  => 'section',
			'title' => __( 'Global Options', 'toolbar-extras' ),
			'id'    => 'futuriocmz-global-options',
		),
		'top_bar' => array(
			'type'  => 'section',
			'title' => __( 'Top Bar', 'toolbar-extras' ),
			'id'    => 'futuriocmz-top-bar',
		),
		'main_menu_icons' => array(
			'type'  => 'section',
			'title' => __( 'Main Menu', 'toolbar-extras' ),
			'id'    => 'futuriocmz-main-menu',
		),
		'main_sidebar' => array(
			'type'  => 'section',
			'title' => __( 'Sidebar', 'toolbar-extras' ),
			'id'    => 'futuriocmz-sidebar',
		),
		'code_section' => array(
			'type'  => 'section',
			'title' => __( 'Copyright', 'toolbar-extras' ),
			'id'    => 'futuriocmz-copyright',
		),
		'custom_code_section' => array(
			'type'  => 'section',
			'title' => __( 'Custom Codes', 'toolbar-extras' ),
			'id'    => 'futuriocmz-custom-codes',
		),
	);

	/** Optional WooCommerce item */
	if ( ddw_tbex_is_woocommerce_active() ) {

		$futurio_items[ 'woo_section_main' ] = array(
			'type'        => 'panel',
			'title'       => __( 'WooCommerce Settings', 'toolbar-extras' ),
			'id'          => 'futuriocmz-woocommerce-settings',
			'preview_url' => get_post_type_archive_link( 'product' ),
		);

	}  // end if

	/** Merge and return with all items */
	return array_merge( $items, $futurio_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_futurio_resources', 120 );
/**
 * General resources items for Futurio Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_is_futurio_pro_active()
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_futurio_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for Futurio Theme */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => ddw_tbex_is_futurio_pro_active() ? 'theme-settings' : 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	ddw_tbex_resource_item(
		'support-forum',
		'theme-support',
		'group-theme-resources',
		'https://wordpress.org/support/theme/futurio'
	);

	ddw_tbex_resource_item(
		'documentation',
		'theme-docs',
		'group-theme-resources',
		'https://futuriowp.com/docs/futurio/',
		esc_attr__( 'Official Theme Documentation', 'toolbar-extras' )
	);

	/** Required hook for Futurio Pro resources */
	do_action( 'tbex_after_theme_free_docs' );

	ddw_tbex_resource_item(
		'translations-community',
		'theme-translate',
		'group-theme-resources',
		'https://translate.wordpress.org/projects/wp-themes/futurio'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://futuriowp.com/'
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_futurio_demo_install', 100 );
/**
 * Items for Demos Import (Plugin):
 *   Futurio Extra (free, by FuturioWP)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_display_items_demo_import()
 * @uses ddw_tbex_id_sites_browser()
 * @uses ddw_tbex_item_title_with_settings_icon()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_futurio_demo_install() {

	/** Bail early if no display of Demo Import items */
	if ( ! ddw_tbex_display_items_demo_import() ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => ddw_tbex_id_sites_browser(),
			'parent' => 'group-demo-import',
			'title'  => ddw_tbex_item_title_with_settings_icon(
				esc_attr__( 'Futurio Install Demos', 'toolbar-extras' ),
				'general',
				'demo_import_icon'
			),
			'href'   => esc_url( admin_url( 'themes.php?page=futurio-panel-install-demos' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Futurio Install Demos', 'toolbar-extras' )
			)
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_futurio_pro', 100 );
/**
 * Items for Theme: Futurio Pro - Add-On Plugin (Premium, by FuturioWP)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_is_futurio_pro_active()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_futurio_pro() {

	/** Bail early if Pro version is not active */
	if ( ! ddw_tbex_is_futurio_pro_active() ) {
		return;
	}

	/** Futurio settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-settings',
			'parent' => 'group-active-theme',
			'title'  => esc_attr__( 'Futurio Pro Settings', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'themes.php?page=futurio' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Futurio Pro Settings', 'toolbar-extras' ),
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-info',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Theme Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=futurio' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Theme Info', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-license',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'License', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=futurio-license-options' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'License', 'toolbar-extras' )
				)
			)
		);

}  // end function


add_action( 'tbex_after_theme_free_docs', 'ddw_tbex_themeitems_futurio_pro_resources' );
/**
 * Additional Resource Items for Futurio Pro
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_is_futurio_pro_active()
 * @uses ddw_tbex_resource_item()
 */
function ddw_tbex_themeitems_futurio_pro_resources() {

	/** Bail early if Pro version is not active */
	if ( ! ddw_tbex_is_futurio_pro_active() ) {
		return;
	}

	ddw_tbex_resource_item(
		'pro-modules-documentation',
		'theme-docs-pro',
		'group-theme-resources',
		'https://futuriowp.com/docs/futurio/futurio-pro/'
	);

}  // end function


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_remove_items_futurio' );
/**
 * Remove "Futurio" top-level item from the Toolbar.
 *
 * @since 1.4.2
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_remove_items_futurio() {

	$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'Futurio Options' );

}  // end function
