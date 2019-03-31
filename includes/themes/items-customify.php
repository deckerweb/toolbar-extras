<?php

// includes/themes/items-customify

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if Customify Pro Add-On plugin is active or not.
 *
 * @since 1.3.0
 *
 * @return bool TRUE if class exists, FALSE otherwise.
 */
function ddw_tbex_is_customify_pro_active() {

	return class_exists( 'Customify_Pro' );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_customify', 100 );
/**
 * Items for Theme: Customify (free, by WPCustomify/ PressMaximum)
 *
 * @since 1.2.0
 * @since 1.4.0 Simplified functions.
 *
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_item_theme_creative_customize()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_customify() {

	/** Customify creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child' ),
			'href'   => esc_url( admin_url( 'themes.php?page=customify' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_theme_title( 'attr' )
			)
		)
	);

	/** Customify customize */
	ddw_tbex_item_theme_creative_customize();

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_customify_customize' );
/**
 * Customize items for Customify Theme
 *
 * @since 1.2.0
 * @since 1.4.0 Refactored using filter/array declaration; added more items.
 *
 * @uses ddw_tbex_is_customify_pro_active()
 * @uses Customify_Pro()
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_customify_customize( array $items ) {

	/** Declare theme's items */
	$customify_items = array(
		'header_settings' => array(
			'type'  => 'panel',
			'title' => __( 'Header Builder', 'toolbar-extras' ),
			'id'    => 'customifycmz-header',
		),
		'footer_settings' => array(
			'type'  => 'panel',
			'title' => __( 'Footer Builder', 'toolbar-extras' ),
			'id'    => 'customifycmz-footer',
		),
		'layout_panel' => array(
			'type'  => 'panel',
			'title' => __( 'Layouts', 'toolbar-extras' ),
			'id'    => 'customifycmz-layouts',
		),
		'blog_panel' => array(
			'type'        => 'panel',
			'title'       => __( 'Blog', 'toolbar-extras' ),
			'id'          => 'customifycmz-blog',
			'preview_url' => get_post_type_archive_link( 'post' ),
		),
		'styling_panel' => array(
			'type'  => 'panel',
			'title' => __( 'Styling &amp; Colors', 'toolbar-extras' ),
			'id'    => 'customifycmz-styling',
		),
		'typography_panel' => array(
			'type'  => 'panel',
			'title' => __( 'Typography', 'toolbar-extras' ),
			'id'    => 'customifycmz-typography',
		),
	);

	/** Optional Customify Pro modules */
	if ( ddw_tbex_is_customify_pro_active() ) {

		/** Module: Product catalog designer */
		if ( ddw_tbex_is_woocommerce_active()
			&& Customify_Pro()->is_enabled_module( 'Customify_Pro_Module_WooCommerce_Booster' )
		) {

			$customify_items[ 'wc_catalog_designer' ] = array(
				'type'        => 'section',
				'title'       => __( 'Product Catalog Designer', 'toolbar-extras' ),
				'id'          => 'customifycmz-woo-product-designer',
				'preview_url' => get_post_type_archive_link( 'product' ),
			);

		}  // end if

		/** Module: Portfolios */
		if ( Customify_Pro()->is_enabled_module( 'Customify_Pro_Module_Portfolio' ) ) {

			$customify_items[ 'portfolio_panel' ] = array(
				'type'  => 'panel',
				'title' => __( 'Portfolio', 'toolbar-extras' ),
				'id'    => 'customifycmz-portfolios',
			);

		}  // end if

		/** Module: Cookie Notice */
		if ( Customify_Pro()->is_enabled_module( 'Customify_Pro_Module_Cookie_Notice' ) ) {

			$customify_items[ 'cookie_notice' ] = array(
				'type'  => 'section',
				'title' => __( 'Cookie Notice', 'toolbar-extras' ),
				'id'    => 'customifycmz-cookie-notice',
			);

		}  // end if

	}  // end if

	$customify_items[ 'compatibility_panel' ] = array(
		'type'  => 'panel',
		'title' => __( 'Plugin Compatibility', 'toolbar-extras' ),
		'id'    => 'customifycmz-compatibility',
	);

	/** Merge and return with all items */
	return array_merge( $items, $customify_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_customify_resources', 120 );
/**
 * General resources items for Customify Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.2.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_is_customify_pro_active()
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_customify_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for Customify Theme */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => ddw_tbex_is_customify_pro_active() ? 'theme-settings' : 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	ddw_tbex_resource_item(
		'support-forum',
		'theme-support',
		'group-theme-resources',
		'https://wordpress.org/support/theme/customify'
	);

	ddw_tbex_resource_item(
		'support-contact',
		'theme-contact',
		'group-theme-resources',
		'https://wpcustomify.com/contact/'
	);

	ddw_tbex_resource_item(
		'documentation',
		'theme-docs',
		'group-theme-resources',
		'https://wpcustomify.com/help/documentation/',
		esc_attr__( 'Official Theme Documentation', 'toolbar-extras' )
	);

	/** Required hook for Customify Pro resources */
	do_action( 'tbex_after_theme_free_docs' );

	ddw_tbex_resource_item(
		'facebook-group',
		'theme-facebook',
		'group-theme-resources',
		'https://www.facebook.com/groups/customify/'
	);

	ddw_tbex_resource_item(
		'translations-community',
		'theme-translate',
		'group-theme-resources',
		'https://translate.wordpress.org/projects/wp-themes/customify'
	);

	ddw_tbex_resource_item(
		'github',
		'theme-github',
		'group-theme-resources',
		'https://github.com/PressMaximum/customify'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://wpcustomify.com/'
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_customify_pro', 100 );
/**
 * Items for Theme: Customify Pro - Add-On Plugin (Premium, by PressMaximum)
 *
 * @since 1.3.0
 * @since 1.4.0 Added additional items for optional Customify Pro Modules.
 *
 * @uses ddw_tbex_is_customify_pro_active()
 * @uses Customify_Pro()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_customify_pro() {

	/** Bail early if Pro version is not active */
	if ( ! ddw_tbex_is_customify_pro_active() ) {
		return;
	}

	/** Customify settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-settings',
			'parent' => 'group-active-theme',
			'title'  => esc_attr__( 'Customify Pro Settings', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'themes.php?page=customify' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Customify Pro Settings', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-modules',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Activate Modules', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=customify' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Modules', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-changelog',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Changelog', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=customify&tab=changelog' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Changelog', 'toolbar-extras' )
				)
			)
		);

	/** Module: Custom Fonts */
	if ( Customify_Pro()->is_enabled_module( 'Customify_Pro_Module_Custom_Fonts' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-customify-fonts',
				'parent' => 'theme-creative'
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'customify-custom-fonts-all',
					'parent' => 'group-customify-fonts',
					'title'  => esc_attr__( 'All Custom Fonts', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=font' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Custom Fonts', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'customify-custom-fonts-new',
					'parent' => 'group-customify-fonts',
					'title'  => esc_attr__( 'New Custom Font', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=font' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Custom Font', 'toolbar-extras' )
					)
				)
			);

	}  // end if

	/** Module: Customify Hooks */
	if ( Customify_Pro()->is_enabled_module( 'Customify_Pro_Module_Hooks' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-customify-hooks',
				'parent' => 'theme-creative'
			)
		);

			$type = 'customify_hook';

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'customify-hooks-all',
					'parent' => 'group-customify-hooks',
					'title'  => esc_attr__( 'Customify Hooks', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Customify Hooks', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'customify-hooks-new',
					'parent' => 'group-customify-hooks',
					'title'  => esc_attr__( 'New Hook', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Hook', 'toolbar-extras' )
					)
				)
			);

			if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( $type ) ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'customify-hooks-builder',
						'parent' => 'group-customify-hooks',
						'title'  => esc_attr__( 'New Hook Builder', 'toolbar-extras' ),
						'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $type ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => esc_attr__( 'New Hook Builder', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'customify-hook-with-builder',
						'parent' => 'new-' . $type,
						'title'  => ddw_tbex_string_newcontent_with_builder(),
						'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $type ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => ddw_tbex_string_newcontent_create_with_builder()
						)
					)
				);

			}  // end if

			/** Hook categories, via BTC plugin */
			if ( ddw_tbex_is_btcplugin_active() ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'customify-hooks-categories',
						'parent' => 'group-customify-hooks',
						'title'  => ddw_btc_string_template( 'hook' ),
						'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=' . $type ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_html( ddw_btc_string_template( 'hook' ) )
						)
					)
				);

			}  // end if

	}  // end if

}  // end function


add_action( 'tbex_after_theme_free_docs', 'ddw_tbex_themeitems_customify_pro_resources' );
/**
 * Additional Resource Items for Customify Pro
 *
 * @since 1.3.0
 *
 * @uses ddw_tbex_is_customify_pro_active()
 * @uses ddw_tbex_resource_item()
 */
function ddw_tbex_themeitems_customify_pro_resources() {

	/** Bail early if Pro version is not active */
	if ( ! ddw_tbex_is_customify_pro_active() ) {
		return;
	}

	ddw_tbex_resource_item(
		'pro-modules-documentation',
		'theme-docs-pro',
		'group-theme-resources',
		'https://wpcustomify.com/help/documentation/customify-pro-modules/'
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_customify_sites_import', 100 );
/**
 * Items for Demos Import (Plugin):
 *   Customify Site Library (free, by WPCustomify/ PressMaximum)
 *
 * @since 1.2.0
 *
 * @uses ddw_tbex_display_items_demo_import()
 * @uses ddw_tbex_id_sites_browser()
 * @uses ddw_tbex_item_title_with_settings_icon()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_customify_sites_import() {

	/** Bail early if no display of Demo Import items */
	if ( ! ddw_tbex_display_items_demo_import() ) {
		return;
	}

	/** Sites Library */
	if ( defined( 'CUSTOMIFY_SITES_URL' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => ddw_tbex_id_sites_browser(),
				'parent' => 'group-demo-import',
				'title'  => ddw_tbex_item_title_with_settings_icon(
					esc_attr__( 'Import Customify Sites', 'toolbar-extras' ),
					'general',
					'demo_import_icon'
				),
				'href'   => esc_url( admin_url( 'themes.php?page=customify-sites' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Import Customify Sites', 'toolbar-extras' )
				)
			)
		);

	}  // end if

}  // end function


/**
 * Customify Pro module: Portfolios
 *
 * @since 1.3.0
 *
 * @uses General portfolio post type support (CPT: 'portfolio')
 */
if ( ddw_tbex_is_customify_pro_active() ) {

	if ( Customify_Pro()->is_enabled_module( 'Customify_Pro_Module_Portfolio' ) ) {

		require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-cpt-portfolio.php';

	}  // end if

}  // end if
