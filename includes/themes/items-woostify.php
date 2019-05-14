<?php

// includes/themes/items-woostify

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if Woostify Pro Add-On plugin is active or not.
 *
 * @since 1.4.2
 *
 * @return bool TRUE if constant defined, FALSE otherwise.
 */
function ddw_tbex_is_woostify_pro_active() {

	return defined( 'WOOSTIFY_PRO_VERSION' );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_woostify', 100 );
/**
 * Items for Theme: Woostify (free, by BoostifyThemes)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_is_suki_pro_active()
 * @uses ddw_tbex_item_theme_creative_customize()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_woostify( $admin_bar ) {

	/** Woostify creative */
	$admin_bar->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child' ),
			'href'   => esc_url( admin_url( 'themes.php?page=woostify-welcome' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_theme_title( 'attr', 'child' ),
			)
		)
	);

	/** Woostify customize */
	ddw_tbex_item_theme_creative_customize();

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_woostify_customize' );
/**
 * Customize items for Woostify Theme
 *
 * @since 1.4.2
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_woostify_customize( array $items ) {

	/** Declare theme's items */
	$woostify_items = array(
		'woostify_layout' => array(
			'type'  => 'panel',
			'title' => __( 'Layout', 'toolbar-extras' ),
			'id'    => 'woostifycmz-layout',
		),
		'woostify_color' => array(
			'type'  => 'section',
			'title' => __( 'Color', 'toolbar-extras' ),
			'id'    => 'woostifycmz-color',
		),
		'woostify_buttons' => array(
			'type'  => 'section',
			'title' => __( 'Buttons', 'toolbar-extras' ),
			'id'    => 'woostifycmz-buttons',
		),
		'woostify_typography' => array(
			'type'  => 'panel',
			'title' => __( 'Typography', 'toolbar-extras' ),
			'id'    => 'woostifycmz-typography',
		),
	);

	/** Optional WooCommerce item */
	if ( ddw_tbex_is_woocommerce_active() ) {

		$woostify_items[ 'woostify_shop' ] = array(
			'type'        => 'panel',
			'title'       => __( 'Shop', 'toolbar-extras' ),
			'id'          => 'woostifycmz-shop',
			'preview_url' => get_post_type_archive_link( 'product' ),
		);

	}  // end if

	/** Merge and return with all items */
	return array_merge( $items, $woostify_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_woostify_resources', 120 );
/**
 * General resources items for Woostify Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_is_woostify_pro_active()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_woostify_resources( $admin_bar ) {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for Woostify Theme */
	$admin_bar->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => ddw_tbex_is_woostify_pro_active() ? 'theme-settings' : 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' ),
		)
	);

	ddw_tbex_resource_item(
		'support-forum',
		'theme-support',
		'group-theme-resources',
		'https://wordpress.org/support/theme/woostify'
	);

	ddw_tbex_resource_item(
		'support-contact',
		'theme-contact',
		'group-theme-resources',
		'https://woostify.com/contact/'
	);

	ddw_tbex_resource_item(
		'documentation',
		'theme-docs',
		'group-theme-resources',
		'https://woostify.com/docs/',
		esc_attr__( 'Official Theme Documentation', 'toolbar-extras' )
	);

	/** Required hook for Woostify Pro resources */
	do_action( 'tbex_after_theme_free_docs' );

	ddw_tbex_resource_item(
		'facebook-group',
		'theme-facebook',
		'group-theme-resources',
		'https://www.facebook.com/groups/2245150649099616/'
	);

	ddw_tbex_resource_item(
		'translations-community',
		'theme-translate',
		'group-theme-resources',
		'https://translate.wordpress.org/projects/wp-themes/woostify'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://woostify.com/'
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_woostify_sites_library', 100 );
/**
 * Items for Demos Import (Plugin):
 *   Woostify Sites Library (free, by BoostifyThemes)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_display_items_demo_import()
 * @uses ddw_tbex_id_sites_browser()
 * @uses ddw_tbex_item_title_with_settings_icon()
 * @uses ddw_tbex_meta_target()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_woostify_sites_library( $admin_bar ) {

	/** Bail early if no display of Demo Import items */
	if ( ! ddw_tbex_display_items_demo_import() ) {
		return;
	}

	/** Sites Library */
	if ( defined( 'WOOSTIFY_SITES_VER' ) ) {

		$admin_bar->add_node(
			array(
				'id'     => ddw_tbex_id_sites_browser(),
				'parent' => 'group-demo-import',
				'title'  => ddw_tbex_item_title_with_settings_icon(
					esc_attr__( 'Import Woostify Sites', 'toolbar-extras' ),
					'general',
					'demo_import_icon'
				),
				'href'   => esc_url( admin_url( 'themes.php?page=woostify-sites' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Import Woostify Sites', 'toolbar-extras' )
				)
			)
		);

	}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_woostify_pro', 100 );
/**
 * Items for Theme: Woostify Pro - Add-On Plugin (Premium, by BoostifyThemes)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_is_woostify_pro_active()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_woostify_pro( $admin_bar ) {

	/** Bail early if Pro version is not active */
	if ( ! ddw_tbex_is_woostify_pro_active() ) {
		return;
	}

	/** Woostify settings */
	$admin_bar->add_node(
		array(
			'id'     => 'theme-settings',
			'parent' => 'group-active-theme',
			'title'  => esc_attr__( 'Woostify Pro Settings', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'themes.php?page=woostify-welcome' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Woostify Pro Settings', 'toolbar-extras' )
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'theme-settings-modules',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Activate Modules', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=woostify-welcome' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Modules', 'toolbar-extras' )
				)
			)
		);

}  // end function


add_action( 'tbex_after_theme_free_docs', 'ddw_tbex_themeitems_woostify_pro_resources' );
/**
 * Additional Resource Items for Woostify Pro
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_is_woostify_pro_active()
 * @uses ddw_tbex_resource_item()
 */
function ddw_tbex_themeitems_woostify_pro_resources() {

	/** Bail early if Pro version is not active */
	if ( ! ddw_tbex_is_woostify_pro_active() ) {
		return;
	}

	ddw_tbex_resource_item(
		'pro-modules-documentation',
		'theme-docs-pro',
		'group-theme-resources',
		'https://woostify.com/docs/pro-modules/'
	);

}  // end function
