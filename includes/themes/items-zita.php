<?php

// includes/themes/items-zita

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if Zita Pro Add-On plugin is active or not.
 *
 * @since 1.4.2
 *
 * @return bool TRUE if constant is defined, FALSE otherwise.
 */
function ddw_tbex_is_zita_pro_active() {

	return defined( 'ZITAPRO_UN' );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_zita', 100 );
/**
 * Items for Theme: Zita (free, by WpZita team)
 *
 * @since 1.4.2
 *
 * @uses Zita_Ext_White_Label_Markup::get_white_labels()
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_is_zita_pro_active()
 * @uses ddw_tbex_item_theme_creative_customize()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_zita( $admin_bar ) {

	/** Respect Zita White Labeling (if Pro Add-On plugin is active) */
	$zita_theme_name = wp_get_theme( get_template() )->get( 'Name' );

	if ( ddw_tbex_is_zita_pro_active() ) {
		$zita_whitelabel = Zita_Ext_White_Label_Markup::get_white_labels();
		$zita_theme_name = ( ! empty( $zita_whitelabel[ 'zita-agency' ][ 'hide_branding' ] ) ) ? $zita_whitelabel[ 'zita' ][ 'name' ] : $zita_theme_name;
	}

	/** Zita creative */
	$admin_bar->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			/* translators: (Static) Theme name Zita - optionally white labeled string */
			'title'  => sprintf( esc_attr__( 'Theme: %s', 'toolbar-extras' ), $zita_theme_name ),
			'href'   => esc_url( admin_url( 'themes.php?page=zita' ) ),
			'meta'   => array(
				'target' => '',
				/* translators: (Static) Theme name Zita - optionally white labeled string */
				'title'  => sprintf( esc_attr__( 'Theme: %s', 'toolbar-extras' ), $zita_theme_name ),
			)
		)
	);

	/** Zita customize */
	ddw_tbex_item_theme_creative_customize();

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_zita_customize' );
/**
 * Customize items for Zita Theme
 *
 * @since 1.4.2
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_zita_customize( array $items ) {

	/** Declare theme's items */
	$zita_items = array(
		'zita-panel-layout' => array(
			'type'  => 'panel',
			'title' => __( 'Layout', 'toolbar-extras' ),
			'id'    => 'zitacmz-layout',
		),
		'zita-panel-color-background' => array(
			'type'  => 'panel',
			'title' => __( 'Color &amp; Background', 'toolbar-extras' ),
			'id'    => 'zitacmz-color-background',
		),
		'zita-base-typography' => array(
			'type'  => 'panel',
			'title' => __( 'Typography', 'toolbar-extras' ),
			'id'    => 'zitacmz-typography',
		),
		'zita-site-button' => array(
			'type'  => 'section',
			'title' => __( 'Site Button', 'toolbar-extras' ),
			'id'    => 'zitacmz-site-button',
		),
		'zita-pre-loader' => array(
			'type'  => 'section',
			'title' => __( 'Pre Loader', 'toolbar-extras' ),
			'id'    => 'zitacmz-pre-loader',
		),
		'zita-social-icon' => array(
			'type'  => 'section',
			'title' => __( 'Social Icon', 'toolbar-extras' ),
			'id'    => 'zitacmz-social-icon',
		),
		'zita-search' => array(
			'type'  => 'section',
			'title' => __( 'Search', 'toolbar-extras' ),
			'id'    => 'zitacmz-search',
		),
	);

	/** Optional WooCommerce item */
	if ( ddw_tbex_is_woocommerce_active() ) {

		$zita_items[ 'woocommerce' ] = array(
			'type'        => 'panel',
			'title'       => __( 'WooCommerce Settings', 'toolbar-extras' ),
			'id'          => 'zitacmz-woocommerce-settings',
			'preview_url' => get_post_type_archive_link( 'product' ),
		);

	}  // end if

	/** Merge and return with all items */
	return array_merge( $items, $zita_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_zita_resources', 120 );
/**
 * General resources items for Zita Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_is_zita_pro_active()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_zita_resources( $admin_bar ) {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for Zita Theme */
	$admin_bar->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => ddw_tbex_is_zita_pro_active() ? 'theme-settings' : 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	ddw_tbex_resource_item(
		'support-forum',
		'theme-support',
		'group-theme-resources',
		'https://wordpress.org/support/theme/zita'
	);

	ddw_tbex_resource_item(
		'documentation',
		'theme-docs',
		'group-theme-resources',
		'https://wpzita.com/docs/',
		esc_attr__( 'Official Theme Documentation', 'toolbar-extras' )
	);

	/** Required hook for Zita Pro resources */
	do_action( 'tbex_after_theme_free_docs' );

	ddw_tbex_resource_item(
		'facebook-group',
		'theme-facebook',
		'group-theme-resources',
		'https://www.facebook.com/groups/2098900630396072/'
	);

	ddw_tbex_resource_item(
		'support-contact',
		'theme-support-contact',
		'group-theme-resources',
		'https://wpzita.com/help/'
	);

	ddw_tbex_resource_item(
		'translations-community',
		'theme-translate',
		'group-theme-resources',
		'https://translate.wordpress.org/projects/wp-themes/zita'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://wpzita.com/'
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_zita_site_library', 100 );
/**
 * Items for Demos Import (Plugin):
 *   Zita Site Library (free, by WpZita team)
 *
 * @since 1.4.2
 *
 * @uses Zita_Ext_White_Label_Markup::get_white_labels()
 * @uses ddw_tbex_display_items_demo_import()
 * @uses ddw_tbex_id_sites_browser()
 * @uses ddw_tbex_item_title_with_settings_icon()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_zita_site_library( $admin_bar ) {

	/** Bail early if no display of Demo Import items */
	if ( ! ddw_tbex_display_items_demo_import()
		|| ! defined( 'ZITA_SITE_LIBRARY_VER' )
	) {
		return;
	}

	$zita_sites_title = esc_attr__( 'Import Zita Sites', 'toolbar-extras' );

	if ( ddw_tbex_is_zita_pro_active() ) {
		$zita_whitelabel  = Zita_Ext_White_Label_Markup::get_white_labels();
		$zita_sites_title = ( ! empty( $zita_whitelabel[ 'zita-agency' ][ 'hide_branding' ] ) ) ? $zita_whitelabel[ 'zita-site-libary' ][ 'name' ] : $zita_sites_title;
	}

	$admin_bar->add_node(
		array(
			'id'     => ddw_tbex_id_sites_browser(),
			'parent' => 'group-demo-import',
			'title'  => ddw_tbex_item_title_with_settings_icon(
				$zita_sites_title,
				'general',
				'demo_import_icon'
			),
			'href'   => esc_url( admin_url( 'themes.php?page=zita-site-library' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => $zita_sites_title,
			)
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_zita_pro', 100 );
/**
 * Items for Theme: Zita Pro - Add-On Plugin (Premium, by WpZita team)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_is_zita_pro_active()
 * @uses Zita_Ext_White_Label_Markup::get_white_labels()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_zita_pro( $admin_bar ) {

	/** Bail early if Pro version is not active */
	if ( ! ddw_tbex_is_zita_pro_active() ) {
		return;
	}

	/** Add custom font items - create Group */
	$admin_bar->add_group(
		array(
			'id'     => 'theme-fonts',
			'parent' => 'theme-creative',
		)
	);

	/** Custom Fonts Module */
	$admin_bar->add_node(
		array(
			'id'     => 'zita-pro-custom-fonts',
			'parent' => 'theme-fonts',
			'title'  => esc_attr__( 'Custom Fonts', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=zita-custom-fonts' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Custom Fonts', 'toolbar-extras' ),
			)
		)
	);

	/** Get Zita Pro white label strings */
	$zita_whitelabel = Zita_Ext_White_Label_Markup::get_white_labels();
	$zita_pro_title  = ( ! empty( $zita_whitelabel[ 'zita-agency' ][ 'hide_branding' ] ) ) ? $zita_whitelabel[ 'zita-pro' ][ 'name' ] : esc_attr__( 'Zita Pro', 'toolbar-extras' );

	/** Zita settings */
	$admin_bar->add_node(
		array(
			'id'     => 'theme-settings',
			'parent' => 'group-active-theme',
			'title'  => $zita_pro_title,
			'href'   => esc_url( admin_url( 'themes.php?page=zita' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => $zita_pro_title,
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'theme-settings-modules',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Options &amp; Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=zita' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Options &amp; Info', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'theme-settings-license',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'License', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=zita-license' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'License', 'toolbar-extras' ),
				)
			)
		);

		/** Optional White Label */
		if ( ! $zita_whitelabel[ 'zita-agency' ][ 'hide_branding' ] ) {

			$admin_bar->add_node(
				array(
					'id'     => 'theme-settings-whitelabel',
					'parent' => 'theme-settings',
					'title'  => esc_attr__( 'White Label', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'themes.php?page=zita&action=white-label' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'White Label Branding', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

}  // end function
