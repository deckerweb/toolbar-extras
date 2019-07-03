<?php

// items-astra
// items-astra-pro
// items-astra-addons

// includes/themes/items-astra

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if Astra Pro Add-On plugin is active or not.
 *
 * @since 1.0.0
 *
 * @return bool TRUE if class exists, FALSE otherwise.
 */
function ddw_tbex_is_astra_pro_active() {

	return ( class_exists( 'Astra_Addon_Update' ) ) ? TRUE : FALSE;

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_astra', 100 );
/**
 * Items for Theme: Astra (free, by Brainstorm Force)
 *
 * @since 1.0.0
 * @since 1.4.0 Simplified functions.
 *
 * @uses ddw_tbex_is_astra_pro_active()
 * @uses Astra_Ext_White_Label_Markup::get_white_labels()
 * @uses ddw_tbex_item_theme_creative_customize()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_astra() {

	/** Respect Astra White Labeling (if Pro Add-On plugin is active) */
	$astra_theme_name = wp_get_theme( get_template() )->get( 'Name' );

	if ( ddw_tbex_is_astra_pro_active() ) {
		$astra_whitelabel = Astra_Ext_White_Label_Markup::get_white_labels();
		$astra_theme_name = ( ! empty( $astra_whitelabel[ 'astra' ][ 'name' ] ) ) ? $astra_whitelabel[ 'astra' ][ 'name' ] : $astra_theme_name;
	}

	/** Astra creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			/* translators: (Static) Theme name Astra - optionally white labeled string */
			'title'  => sprintf( esc_attr__( 'Theme: %s', 'toolbar-extras' ), $astra_theme_name ),
			'href'   => esc_url( admin_url( 'themes.php?page=astra' ) ),
			'meta'   => array(
				'target' => '',
				/* translators: (Static) Theme name Astra - optionally white labeled string */
				'title'  => sprintf( esc_attr__( 'Active Theme: %s', 'toolbar-extras' ), $astra_theme_name )
			)
		)
	);

	/** Astra customize */
	ddw_tbex_item_theme_creative_customize();

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_astra_customize' );
/**
 * Customize items for Astra Theme
 *
 * @since 1.0.0
 * @since 1.4.0 Refactored using filter/array declaration.
 *
 * @uses ddw_tbex_is_woocommerce_active()
 * @uses ddw_tbex_is_edd_active()
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_astra_customize( array $items ) {

	$header_item = ddw_tbex_is_astra_pro_active() ? 'section-header-group' : 'section-header';

	/** Declare theme's items */
	$astra_items = array(
		'custom_logo' => array(
			'type'  => 'control',
			'title' => __( 'Logo', 'toolbar-extras' ),
			'id'    => 'astracmz-logo',
		),
		'panel-colors-background' => array(
			'type'  => 'panel',
			'title' => __( 'Colors', 'toolbar-extras' ),
			'id'    => 'astracmz-colors',
		),
		'panel-typography' => array(
			'type'  => 'panel',
			'title' => __( 'Fonts', 'toolbar-extras' ),
			'id'    => 'astracmz-fonts',
		),
		$header_item => array(
			'type'  => 'section',
			'title' => __( 'Header Options', 'toolbar-extras' ),
			'id'    => 'astracmz-header',
		),
		'section-footer-group' => array(
			'type'  => 'section',
			'title' => __( 'Footer Settings', 'toolbar-extras' ),
			'id'    => 'astracmz-footer',
		),
		'panel-layout' => array(
			'type'  => 'panel',
			'title' => __( 'Layout', 'toolbar-extras' ),
			'id'    => 'astracmz-layout',
		),
		'section-sidebars' => array(
			'type'  => 'section',
			'title' => __( 'Sidebars', 'toolbar-extras' ),
			'id'    => 'astracmz-sidebars',
		),
	);

	/** WooCommerce module */
	if ( ddw_tbex_is_woocommerce_active() ) {

		$astra_items[ 'section-woo-group' ] = array(
			'type'        => 'section',
			'title'       => __( 'WooCommerce Layout', 'toolbar-extras' ),
			'id'          => 'astracmz-layout-woocommerce',
			'preview_url' => get_post_type_archive_link( 'product' ),
		);

	}  // end if

	/** EDD module */
	if ( ddw_tbex_is_edd_active() ) {

		$astra_items[ 'section-edd-group' ] = array(
			'type'        => 'section',
			'title'       => __( 'Easy Digital Downloads Layout', 'toolbar-extras' ),
			'id'          => 'astracmz-layout-edd',
			'preview_url' => get_post_type_archive_link( 'download' ),
		);

	}  // end if

	/** Optional: LifterLMS Support */
	if ( class_exists( 'LifterLMS' ) ) {

		$astra_items[ 'section-lifterlms' ] = array(
			'type'        => 'section',
			'title'       => __( 'LifterLMS Layout', 'toolbar-extras' ),
			'id'          => 'astracmz-layout-lifterlms',
			'preview_url' => get_post_type_archive_link( 'course' ),
		);

	}  // end if

	/** Optional: LearnDash Support */
	if ( defined( 'LEARNDASH_VERSION' ) ) {

		$astra_items[ 'section-learndash' ] = array(
			'type'        => 'section',
			'title'       => __( 'LearnDash Layout', 'toolbar-extras' ),
			'id'          => 'astracmz-layout-learndash',
			'preview_url' => get_post_type_archive_link( 'sfwd-courses' ),
		);

	}  // end if

	/** Merge and return with all items */
	return array_merge( $items, $astra_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_astra_resources', 200 );
/**
 * General resources items for Astra Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_astra_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for Astra Theme */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => ddw_tbex_is_astra_pro_active() ? 'theme-settings' : 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	ddw_tbex_resource_item(
		'support-forum',
		'theme-support',
		'group-theme-resources',
		'https://wordpress.org/support/theme/astra'
	);

	ddw_tbex_resource_item(
		'documentation',
		'theme-docs',
		'group-theme-resources',
		'https://wpastra.com/docs/',
		esc_attr__( 'Official Theme Documentation', 'toolbar-extras' )
	);

	/** Required hook for Astra Pro resources */
	do_action( 'tbex_after_theme_free_docs' );

	ddw_tbex_resource_item(
		'facebook-group',
		'theme-facebook',
		'group-theme-resources',
		'https://www.facebook.com/groups/wpastra/'
	);

	ddw_tbex_resource_item(
		'translations-community',
		'theme-translate',
		'group-theme-resources',
		'https://translate.wordpress.org/projects/wp-themes/astra'
	);

	ddw_tbex_resource_item(
		'changelog',
		'theme-changelog',
		'group-theme-resources',
		'https://wpastra.com/changelog/astra-theme/',
		ddw_tbex_string_version_history( 'theme' )
	);

	ddw_tbex_resource_item(
		'github',
		'theme-github',
		'group-theme-resources',
		'https://github.com/brainstormforce/astra'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://wpastra.com/'
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_astra_pro', 100 );
/**
 * Items for Theme: Astra Pro - Add-On Plugin (Premium, by Brainstorm Force)
 *
 * @since 1.0.0
 * @since 1.3.5 Added BTC plugin support.
 *
 * @uses ddw_tbex_is_astra_pro_active()
 * @uses ddw_tbex_is_elementor_active()
 * @uses Astra_Ext_White_Label_Markup::get_white_labels()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_astra_pro() {

	/** Bail early if Pro version is not active */
	if ( ! ddw_tbex_is_astra_pro_active() ) {
		return;
	}

	/** Astra Custom Layouts */
	if ( class_exists( 'Astra_Ext_Extension' ) && Astra_Ext_Extension::is_active( 'advanced-hooks' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'astra-layouts',
				'parent' => 'theme-creative'
			)
		);

			$type_al = 'astra-advanced-hook';

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'a-l-all',
					'parent' => 'astra-layouts',
					'title'  => esc_attr__( 'Custom Layouts', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type_al ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Custom Layouts', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'a-l-new',
					'parent' => 'astra-layouts',
					'title'  => esc_attr__( 'New Layout', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type_al ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Layout', 'toolbar-extras' )
					)
				)
			);

			if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( $type_al ) ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'a-l-builder',
						'parent' => 'astra-layouts',
						'title'  => esc_attr__( 'New Layout Builder', 'toolbar-extras' ),
						'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $type_al ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => esc_attr__( 'New Layout Builder', 'toolbar-extras' )
						)
					)
				);

				/** WordPress "New Content" section within the Toolbar */
				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'alayout-with-builder',
						'parent' => 'new-astra-advanced-hook',
						'title'  => ddw_tbex_string_newcontent_with_builder(),
						'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $type_al ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => ddw_tbex_string_newcontent_create_with_builder()
						)
					)
				);

			}  // end if

			/** Layout categories, via BTC plugin */
			if ( ddw_tbex_is_btcplugin_active() ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'astra-layouts-categories',
						'parent' => 'astra-layouts',
						'title'  => ddw_btc_string_template( 'layout' ),
						'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=' . $type_al ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_html( ddw_btc_string_template( 'layout' ) )
						)
					)
				);

			}  // end if

	}  // end if

	/** Astra Advanced Header */
	if ( class_exists( 'Astra_Ext_Extension' ) && Astra_Ext_Extension::is_active( 'advanced-headers' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'astra-headers',
				'parent' => 'theme-creative'
			)
		);

			$type_avh = 'astra_adv_header';

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'a-h-all',
					'parent' => 'astra-headers',
					'title'  => esc_attr__( 'Advanced Header', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type_avh ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Advanced Header', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'a-h-new',
					'parent' => 'astra-headers',
					'title'  => esc_attr__( 'New Header', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type_avh ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Header', 'toolbar-extras' )
					)
				)
			);

	}  // end if

	/** Get Astra Pro white label strings */
	$astra_whitelabel = Astra_Ext_White_Label_Markup::get_white_labels();
	$astra_pro_title  = sprintf(
		/* translators: %1$s - Astra Pro name */
		esc_attr__( '%1$s Settings', 'toolbar-extras' ),
		( ! empty( $astra_whitelabel[ 'astra-pro' ][ 'name' ] ) ) ? $astra_whitelabel[ 'astra-pro' ][ 'name' ] : esc_attr__( 'Astra Pro', 'toolbar-extras' )
	);

	/** Astra settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-settings',
			'parent' => 'group-active-theme',
			'title'  => $astra_pro_title,
			'href'   => esc_url( admin_url( 'themes.php?page=astra' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => $astra_pro_title
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-extensions',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Activate Extensions', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=astra' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Extensions', 'toolbar-extras' )
				)
			)
		);

		/** Only show white label settings if they are not hidden */
		if ( ! ddw_tbex_hide_astra_whitelabel() ) {

			if ( ! $astra_whitelabel[ 'astra-agency' ][ 'hide_branding' ] ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'theme-settings-whitelabel',
						'parent' => 'theme-settings',
						'title'  => esc_attr__( 'White Label', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'themes.php?page=astra&action=white-label' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'White Label Branding', 'toolbar-extras' )
						)
					)
				);

			}  // end if

		}  // end if

}  // end function


add_action( 'tbex_after_theme_free_docs', 'ddw_tbex_themeitems_astra_pro_resources' );
/**
 * Additional Resource Items for Astra Pro
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_is_astra_pro_active()
 * @uses ddw_tbex_resource_item()
 */
function ddw_tbex_themeitems_astra_pro_resources() {

	/** Bail early if Pro version is not active */
	if ( ! ddw_tbex_is_astra_pro_active() ) {
		return;
	}

	ddw_tbex_resource_item(
		'pro-modules-documentation',
		'theme-docs-pro',
		'group-theme-resources',
		'https://wpastra.com/docs-category/astra-pro-modules/'
	);

	ddw_tbex_resource_item(
		'translations-pro',
		'theme-translations-pro',
		'group-theme-resources',
		'https://translate.brainstormforce.com/'
	);

	ddw_tbex_resource_item(
		'changelog',
		'theme-changelog-pro',
		'group-theme-resources',
		'https://wpastra.com/changelog/astra-pro-addon/',
		ddw_tbex_string_version_history( 'addon' )
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_astra_developer_resources', 200 );
/**
 * Additional Developer Resource Items for Astra/ Astra Pro
 *
 * @since 1.2.0
 *
 * @uses ddw_tbex_resource_item()
 */
function ddw_tbex_themeitems_astra_developer_resources() {

	/** Bail early if Dev Mode & Resources display are disabled */
	if ( ! ddw_tbex_display_items_dev_mode() && ! ddw_tbex_display_items_resources() ) {
		return;
	}

	ddw_tbex_resource_item(
		'code-reference',
		'theme-developers-code-reference',
		'group-theme-resources',
		'https://developers.wpastra.com/'
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_astra_sites_import', 100 );
/**
 * Items for Demos Import:
 *   Astra Starter Sites (free) / Astra Premium Sites (Agency - Premium)
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_display_items_demo_import()
 * @uses ddw_tbex_id_sites_browser()
 * @uses ddw_tbex_item_title_with_settings_icon()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_astra_sites_import() {

	/** Bail early if no display of Demo Import items */
	if ( ! ddw_tbex_display_items_demo_import() ) {
		return;
	}

	/** Starter & Pro Sites */
	if ( defined( 'ASTRA_SITES_VER' ) || defined( 'ASTRA_PRO_SITES_VER' ) ) {

		$sites_title = sprintf(
			/* translators: %s - Type of site to be imported ("Premium" or "Starter") */
			esc_attr__( 'Import %s Sites', 'toolbar-extras' ),
			/* translators: Type of site to be imported */
			( defined( 'ASTRA_PRO_SITES_VER' ) ) ? __( 'Premium', 'toolbar-extras' ) : __( 'Starter', 'toolbar-extras' )
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => ddw_tbex_id_sites_browser(),
				'parent' => 'group-demo-import',
				'title'  => ddw_tbex_item_title_with_settings_icon( $sites_title, 'general', 'demo_import_icon' ),
				'href'   => esc_url( admin_url( 'themes.php?page=astra-sites' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => $sites_title
				)
			)
		);

	}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_astra_custom_fonts', 120 );
/**
 * Items for "Custom Fonts" & "Custom Typekit Fonts" - add-ond for Astra Theme
 *   (both by Brainstorm Force)
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_is_astra_pro_active()
 * @uses Astra_Ext_White_Label_Markup::get_white_labels()
 */
function ddw_tbex_themeitems_astra_custom_fonts() {

	/** Bail early if plugins not active */
	if ( ! defined( 'BSF_CUSTOM_FONTS_VER' ) && ! defined( 'CUSTOM_TYPEKIT_FONTS_VER' ) ) {
		return;
	}

	/** Add custom font items - create Group */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'theme-fonts',
			'parent' => 'theme-creative'
		)
	);

	/** Plugin: BSF Custom Fonts */
	if ( defined( 'BSF_CUSTOM_FONTS_VER' ) ) {

		/** Get BSF Custom Fonts (white label) string */
		$bsf_fonts_title = esc_attr__( 'Custom Fonts', 'toolbar-extras' );

		if ( ddw_tbex_is_astra_pro_active() ) {

			$astra_whitelabel = Astra_Ext_White_Label_Markup::get_white_labels();
			$bsf_fonts_title  = ( ! empty( $astra_whitelabel[ 'bsf-custom-fonts' ][ 'name' ] ) ) ? $astra_whitelabel[ 'bsf-custom-fonts' ][ 'name' ] : $bsf_fonts_title;

		}  // end if

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'astra-fonts-bsf-custom',
				'parent' => 'theme-fonts',
				'title'  => $bsf_fonts_title,
				'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=bsf_custom_fonts' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => $bsf_fonts_title
				)
			)
		);

	}  // end if

	/** Plugin: BSF Custom Typekit Fonts */
	if ( defined( 'CUSTOM_TYPEKIT_FONTS_VER' ) ) {

		/** Get BSF Custom Typekit Fonts (white label) string */
		$bsf_typekit_fonts_title = esc_attr__( 'Custom Typekit Fonts', 'toolbar-extras' );

		if ( ddw_tbex_is_astra_pro_active() ) {

			$astra_whitelabel         = Astra_Ext_White_Label_Markup::get_white_labels();
			$bsf_typekit_fonts_title  = ( ! empty( $astra_whitelabel[ 'custom-typekit-fonts' ][ 'name' ] ) ) ? $astra_whitelabel[ 'custom-typekit-fonts' ][ 'name' ] : $bsf_typekit_fonts_title;

		}  // end if

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'astra-fonts-bsf-custom-typekit',
				'parent' => 'theme-fonts',
				'title'  => $bsf_typekit_fonts_title,
				'href'   => esc_url( admin_url( 'themes.php?page=custom-typekit-fonts' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => $bsf_typekit_fonts_title
				)
			)
		);

	}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_astra_home_page_banner', 100 );
/**
 * Customize items for Astra-specific plugin:
 *   Home Page Banner for Astra Theme (free, by Brainstorm Force)
 *
 * @since 1.3.0
 *
 * @uses ddw_tbex_customizer_focus()
 * @uses ddw_tbex_string_customize_attr()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_astra_home_page_banner() {

	/** Bail early if plugin is not active */
	if ( ! defined( 'HOME_PAGE_BANNER_VER' ) ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'astracmz-home-page-banner',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Home Page Banner', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'panel-home-page-banner', site_url( '/' ) ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Home Page Banner', 'toolbar-extras' ) )
			)
		)
	);

}  // end function
