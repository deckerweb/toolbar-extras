<?php

// includes/themes/items-neve

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if Neve Pro Add-On plugin is active or not.
 *
 * @since 1.4.7
 *
 * @return bool TRUE if function exists, FALSE otherwise.
 */
function ddw_tbex_is_neve_pro_active() {

	return function_exists( 'neve_pro_run' );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_neve', 100 );
/**
 * Items for Theme: Neve (free, by ThemeIsle)
 *
 * @since 1.4.7
 *
 * @uses ddw_tbex_is_neve_pro_active()
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_item_theme_creative_customize()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_neve( $admin_bar ) {

	/** Respect Neve White Labeling (if Pro Add-On plugin is active) */
	$neve_theme_name = wp_get_theme( get_template() )->get( 'Name' );

	if ( ddw_tbex_is_neve_pro_active() ) {
		$neve_whitelabel = get_option( 'ti_white_label_inputs' );
		$neve_whitelabel = json_decode( $neve_whitelabel, true );
		$neve_theme_name = ( ! empty( $neve_whitelabel[ 'theme_name' ] ) ) ? $neve_whitelabel[ 'theme_name' ] : $neve_theme_name;
	}

	/** Neve creative */
	$admin_bar->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child', $neve_theme_name ),
			'href'   => esc_url( admin_url( 'themes.php?page=neve-welcome' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_theme_title( 'title', 'child', $neve_theme_name ),
			)
		)
	);

	/** Neve customize */
	ddw_tbex_item_theme_creative_customize();

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_neve_customize' );
/**
 * Customize items for Neve Theme
 *
 * @since 1.4.7
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_neve_customize( array $items ) {

	/** Declare theme's items */
	$neve_items = array(
		'neve_layout' => array(
			'type'  => 'panel',
			'title' => __( 'Layout', 'toolbar-extras' ),
			'id'    => 'nevecmz-layout',
		),
		'hfg_header' => array(
			'type'  => 'panel',
			'title' => __( 'Header', 'toolbar-extras' ),
			'id'    => 'nevecmz-header',
		),
		'hfg_footer' => array(
			'type'  => 'panel',
			'title' => __( 'Footer', 'toolbar-extras' ),
			'id'    => 'nevecmz-footer',
		),
		'neve_colors_background_section' => array(
			'type'  => 'section',
			'title' => __( 'Colors &amp; Background', 'toolbar-extras' ),
			'id'    => 'nevecmz-colors-background',
		),
		'neve_typography' => array(
			'type'  => 'panel',
			'title' => __( 'Typography', 'toolbar-extras' ),
			'id'    => 'nevecmz-typography',
		),
		'neve_buttons_section' => array(
			'type'  => 'section',
			'title' => __( 'Buttons', 'toolbar-extras' ),
			'id'    => 'nevecmz-buttons',
		),
	);

	/** Optional: Neve Hooks plugin support */
	if ( function_exists( 'neve_hooks_init' ) ) {

		$neve_items[ 'neve_hooks' ] = array(
			'type'  => 'panel',
			'title' => __( 'Hooks', 'toolbar-extras' ),
			'id'    => 'nevecmz-hooks',
		);

	}  // end if

	/** Merge and return with all items */
	return array_merge( $items, $neve_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_neve_resources', 120 );
/**
 * General resources items for Neve Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.4.7
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_is_neve_pro_active()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_neve_resources( $admin_bar ) {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return $admin_bar;
	}

	/** Group: Theme's resources */
	$admin_bar->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => ddw_tbex_is_neve_pro_active() ? 'theme-settings' : 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' ),
		)
	);

	ddw_tbex_resource_item(
		'support-forum',
		'theme-support',
		'group-theme-resources',
		'https://wordpress.org/support/theme/neve'
	);

	ddw_tbex_resource_item(
		'documentation',
		'theme-docs',
		'group-theme-resources',
		'https://docs.themeisle.com/article/946-neve-doc',
		ddw_tbex_string_official_theme_documentation()
	);

	/** Required hook for Neve Pro resources */
	do_action( 'tbex_after_theme_free_docs', $admin_bar );

	ddw_tbex_resource_item(
		'facebook-group',
		'theme-facebook',
		'group-theme-resources',
		'https://www.facebook.com/groups/648646435537266/'
	);

	ddw_tbex_resource_item(
		'changelog',
		'theme-changelog',
		'group-theme-resources',
		esc_url( admin_url( 'themes.php?page=neve-welcome#changelog' ) ),
		ddw_tbex_string_version_history( 'theme' )
	);
	
	ddw_tbex_resource_item(
		'translations-community',
		'theme-translate',
		'group-theme-resources',
		'https://translate.wordpress.org/projects/wp-themes/neve'
	);

	ddw_tbex_resource_item(
		'github',
		'theme-github',
		'group-theme-resources',
		'https://github.com/Codeinwp/neve'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://themeisle.com/themes/neve/'
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_neve_sites_library', 100 );
/**
 * Items for Demos Import
 *
 * @since 1.4.7
 *
 * @uses ddw_tbex_display_items_demo_import()
 * @uses ddw_tbex_id_sites_browser()
 * @uses ddw_tbex_item_title_with_settings_icon()
 * @uses ddw_tbex_meta_target()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_neve_sites_library( $admin_bar ) {

	/** Bail early if no display of Demo Import items */
	if ( ! ddw_tbex_display_items_demo_import() ) {
		return $admin_bar;
	}

	/** Sites Library */
	$admin_bar->add_node(
		array(
			'id'     => ddw_tbex_id_sites_browser(),
			'parent' => 'group-demo-import',
			'title'  => ddw_tbex_item_title_with_settings_icon(
				esc_attr__( 'Import Neve Sites', 'toolbar-extras' ),
				'general',
				'demo_import_icon'
			),
			'href'   => esc_url( admin_url( 'themes.php?page=neve-welcome#sites_library' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Import Neve Sites', 'toolbar-extras' ),
			)
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_neve_pro', 100 );
/**
 * Items for Theme: Neve Pro - Add-On Plugin (Premium, by ThemeIsle)
 *
 * @since 1.4.7
 *
 * @uses ddw_tbex_is_neve_pro_active()
 * @uses \Neve_Pro\Core\Settings()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_neve_pro( $admin_bar ) {

	/** Bail early if Pro version is not active */
	if ( ! ddw_tbex_is_neve_pro_active() ) {
		return $admin_bar;
	}

	$nevepro_settings = new \Neve_Pro\Core\Settings();

	/** Get Neve Pro white label strings */
	//$neve_whitelabel = get_option( 'ti_white_label_inputs' );
	//$neve_whitelabel = json_decode( $neve_whitelabel, true );

	$neve_pro_title  = sprintf(
		/* translators: %1$s - Neve Pro name */
		esc_attr__( '%1$s Settings', 'toolbar-extras' ),
		apply_filters( 'ti_wl_plugin_name', NEVE_PRO_NAME )		// ( ! empty( $neve_whitelabel[ 'plugin_name' ] ) ) ? $neve_whitelabel[ 'plugin_name' ] : esc_attr__( 'Neve Pro', 'toolbar-extras' )
	);

	/** Neve settings */
	$admin_bar->add_node(
		array(
			'id'     => 'theme-settings',
			'parent' => 'group-active-theme',
			'title'  => $neve_pro_title,
			'href'   => esc_url( admin_url( 'themes.php?page=neve-welcome' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => $neve_pro_title,
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'theme-settings-modules',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Activate Modules', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=neve-welcome#neve_pro_addons' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Modules', 'toolbar-extras' ),
				)
			)
		);

		/** Optional White Label */
		if ( $nevepro_settings->is_module_active( 'white_label' ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'theme-settings-whitelabel',
					'parent' => 'theme-settings',
					'title'  => esc_attr__( 'White Label', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( '/?page=ti-white-label' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'White Label Branding', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

		$admin_bar->add_node(
			array(
				'id'     => 'theme-settings-license',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'License', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php#neve_pro_addon_license' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'License', 'toolbar-extras' ),
				)
			)
		);

	/** Module: Custom Layouts */
	if ( $nevepro_settings->is_module_active( 'custom_layouts' ) ) {

		$admin_bar->add_group(
			array(
				'id'     => 'group-neve-layouts',
				'parent' => 'theme-creative',
			)
		);

			$type = 'neve_custom_layouts';

			$admin_bar->add_node(
				array(
					'id'     => 'neve-custom-layouts-all',
					'parent' => 'group-neve-layouts',
					'title'  => esc_attr__( 'Custom Layouts', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Custom Layouts', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'neve-custom-layouts-new',
					'parent' => 'group-neve-layouts',
					'title'  => esc_attr__( 'New Layout', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Layout', 'toolbar-extras' ),
					)
				)
			);

			if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( $type ) ) {

				$admin_bar->add_node(
					array(
						'id'     => 'neve-custom-layouts-builder',
						'parent' => 'group-neve-layouts',
						'title'  => esc_attr__( 'New Layout Builder', 'toolbar-extras' ),
						'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $type ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => esc_attr__( 'New Layout Builder', 'toolbar-extras' ),
						)
					)
				);

			}  // end if

			/** Layout categories, via BTC plugin */
			if ( ddw_tbex_is_btcplugin_active() ) {

				$admin_bar->add_node(
					array(
						'id'     => 'neve-custom-layouts-categories',
						'parent' => 'group-neve-layouts',
						'title'  => ddw_btc_string_template( 'layout' ),
						'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=' . $type ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_html( ddw_btc_string_template( 'layout' ) ),
						)
					)
				);

			}  // end if

	}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_new_content_neve_pro' );
/**
 * Items for "New Content" section: New Neve Custom Layout with Builder
 *
 * @since 1.4.7
 *
 * @uses \Neve_Pro\Core\Settings()
 * @uses ddw_tbex_is_neve_pro_active()
 * @uses ddw_tbex_is_elementor_active()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_new_content_neve_pro( $admin_bar ) {

	/** Bail early if Neve Pro not active */
	if ( ! ddw_tbex_is_neve_pro_active() ) {
		return $admin_bar;
	}

	/** Get current active Neve Pro modules */
	$nevepro_settings = new \Neve_Pro\Core\Settings();

	/** Bail early if Neve Pro module not active */
	if ( ! $nevepro_settings->is_module_active( 'custom_layouts' ) ) {
		return $admin_bar;
	}

	$type = 'neve_custom_layouts';

	if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( $type ) ) {

		$admin_bar->add_node(
			array(
				'id'     => 'neve-layout-with-builder',
				'parent' => 'new-' . $type,
				'title'  => ddw_tbex_string_newcontent_with_builder(),
				'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $type ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_newcontent_create_with_builder(),
				)
			)
		);

	}  // end if

}  // end function
