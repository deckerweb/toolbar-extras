<?php

// includes/themes-genesis/items-genesis-customizer

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if Genesis Customizer Pro Add-On plugin is active or not.
 *
 * @since 1.4.3
 *
 * @return bool TRUE if function exists, FALSE otherwise.
 */
function ddw_tbex_is_genesis_customizer_pro_active() {

	return function_exists( '\GenesisCustomizer\_get_pro_data' );

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_genesis_customizer_child_customize' );
/**
 * Customize items for Genesis Child Theme/ Plugin combo:
 *   - Child Theme: Genesis Customizer Core (free, by SEO Themes)
 *   - Plugin dependency: Genesis Customizer (free, by SEO Themes)
 *   - Pro Add-On Plugin: Genesis Customizer Pro (Premium, by SEO Themes)
 *
 * @since 1.4.3
 *
 * @uses ddw_tbex_is_genesis_customizer_pro_active()
 * @uses genesis_get_option()
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_genesis_customizer_child_customize( array $items ) {

	/** Declare child theme's items */
	$gencustmzr_items = array(
		'genesis-customizer_base' => array(
			'type'  => 'panel',
			'title' => __( 'Base Styles', 'toolbar-extras' ),
			'id'    => 'genesis-customizer-base',
		),
		'genesis-customizer_header' => array(
			'type'  => 'panel',
			'title' => __( 'Header', 'toolbar-extras' ),
			'id'    => 'genesis-customizer-header',
		),
		'genesis-customizer_menus' => array(
			'type'  => 'panel',
			'title' => __( 'Menus', 'toolbar-extras' ),
			'id'    => 'genesis-customizer-menus',
		),
		'genesis-customizer_content' => array(
			'type'  => 'panel',
			'title' => __( 'Content Area', 'toolbar-extras' ),
			'id'    => 'genesis-customizer-content-area',
		),
		'genesis-customizer_sidebars' => array(
			'type'  => 'panel',
			'title' => __( 'Sidebars', 'toolbar-extras' ),
			'id'    => 'genesis-customizer-sidebars',
		),
		'genesis-customizer_single' => array(
			'type'  => 'panel',
			'title' => __( 'Single Post / Page', 'toolbar-extras' ),
			'id'    => 'genesis-customizer-single',
		),
		'genesis-customizer_archive' => array(
			'type'        => 'panel',
			'title'       => __( 'Blog / Archive Layout', 'toolbar-extras' ),
			'id'          => 'genesis-customizer-blog-archive',
			'preview_url' => get_post_type_archive_link( 'post' ),
		),
		'genesis-customizer_footer' => array(
			'type'  => 'panel',
			'title' => __( 'Footer', 'toolbar-extras' ),
			'id'    => 'genesis-customizer-footer',
		),
	);

	/** Pro Add-On: Additionally selected Customizer panels */
	if ( ddw_tbex_is_genesis_customizer_pro_active() && function_exists( '\GenesisCustomizer\_is_module_enabled' ) ) {

		/** Hero Section */
		if ( \GenesisCustomizer\_is_module_enabled( 'hero-section' ) ) {

			$gencustmzr_items[ 'genesis-customizer_hero' ] = array(
				'type'  => 'panel',
				'title' => __( 'Hero Section', 'toolbar-extras' ),
				'id'    => 'genesis-customizer-hero-section',
			);

		}  // end if

		/** Mega Menu */
		if ( \GenesisCustomizer\_is_module_enabled( 'mega-menu' ) ) {

			$gencustmzr_items[ 'genesis-customizer_menus_mega' ] = array(
				'type'  => 'section',
				'title' => __( 'Mega Menu', 'toolbar-extras' ),
				'id'    => 'genesis-customizer-mega-menu',
			);

		}  // end if

		/** Scroll To Top */
		if ( \GenesisCustomizer\_is_module_enabled( 'scroll-to-top' ) ) {

			$gencustmzr_items[ 'genesis-customizer_footer_scroll-to-top' ] = array(
				'type'  => 'section',
				'title' => __( 'Scroll To Top', 'toolbar-extras' ),
				'id'    => 'genesis-customizer-scroll-to-top',
			);

		}  // end if

		/** Custom Code */
		if ( \GenesisCustomizer\_is_module_enabled( 'custom-code' ) ) {

			$gencustmzr_items[ 'genesis-customizer_code' ] = array(
				'type'  => 'panel',
				'title' => __( 'Custom Code', 'toolbar-extras' ),
				'id'    => 'genesis-customizer-custom-code',
			);

		}  // end if

	}  // end if

	/** Merge and return with all items */
	return array_merge( $items, $gencustmzr_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_genesis_customizer_child', 100 );
/**
 * Items for Child Theme:
 *   Genesis Customizer & Add-On plugins (free/Premium, by SEO Themes)
 *
 * @since 1.4.3
 *
 * @uses ddw_tbex_is_genesis_customizer_pro_active()
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_genesis_customizer_child( $admin_bar ) {

	$admin_bar->add_node(
		array(
			'id'     => 'genesis-customizer-demo-import',
			'parent' => 'group-genesischild-creative',
			'title'  => esc_attr__( 'Import Demos', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=genesis-customizer-demo-import' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Genesis Customizer Demos Import', 'toolbar-extras' ),
			)
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'genesis-customizer-settings',
			'parent' => 'group-genesischild-creative',
			'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=genesis-customizer' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Genesis Customizer Theme Settings', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'genesis-customizer-settings-general',
				'parent' => 'genesis-customizer-settings',
				'title'  => esc_attr__( 'General', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=genesis-customizer&tab=general' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'General Child Theme Settings', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'genesis-customizer-settings-colors',
				'parent' => 'genesis-customizer-settings',
				'title'  => esc_attr__( 'Color Palette', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=genesis-customizer&tab=colors' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Color Palette Settings', 'toolbar-extras' ),
				)
			)
		);

		if ( ddw_tbex_is_genesis_customizer_pro_active() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'genesis-customizer-settings-modules',
					'parent' => 'genesis-customizer-settings',
					'title'  => esc_attr__( 'Activate Modules', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=genesis-customizer&tab=modules' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Activate Pro Modules', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'genesis-customizer-settings-license',
					'parent' => 'genesis-customizer-settings',
					'title'  => esc_attr__( 'License', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=genesis-customizer&tab=license' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'License', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

	/** Group: Resources for Genesis Customizer Chíld Theme/ Plugin */
	if ( ddw_tbex_display_items_resources() ) {

		$admin_bar->add_group(
			array(
				'id'     => 'group-childtheme-resources',
				'parent' => 'group-genesischild-creative',
				'meta'   => array( 'class' => 'ab-sub-secondary' ),
			)
		);

		ddw_tbex_resource_item(
			'support-forum',
			'childtheme-support',
			'group-childtheme-resources',
			'https://genesiscustomizer.com/forum/support/'
		);

		ddw_tbex_resource_item(
			'documentation',
			'childtheme-docs',
			'group-childtheme-resources',
			'https://docs.seothemes.com/category/189-getting-started'
		);

		ddw_tbex_resource_item(
			'facebook-group',
			'childtheme-fbgroup',
			'group-childtheme-resources',
			'https://www.facebook.com/groups/genesiscustomizer'
		);

		/** Optional hook for Genesis Customizer Pro resources */
		do_action( 'tbex_after_theme_free_docs' );

		if ( ddw_tbex_is_genesis_customizer_pro_active() ) {

			ddw_tbex_resource_item(
				'support-contact',
				'childtheme-contact',
				'group-childtheme-resources',
				'https://genesiscustomizer.com/priority-support/'
			);

			ddw_tbex_resource_item(
				'slack-channel',
				'childtheme-slack',
				'group-childtheme-resources',
				'https://genesiscustomizer.slack.com/'
			);

		}  // end if

		ddw_tbex_resource_item(
			'official-site',
			'childtheme-site',
			'group-childtheme-resources',
			'https://genesiscustomizer.com/'
		);

	}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_genesis_customizer_theme_setup_import', 100 );
/**
 * Items for Child Theme Setup (= Demo Import):
 *   Genesis Customizer Core Plugin (free, by SEO Themes)
 *
 * @since 1.4.3
 *
 * @uses ddw_tbex_display_items_demo_import()
 * @uses ddw_tbex_id_sites_browser()
 * @uses ddw_tbex_item_title_with_settings_icon()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_genesis_customizer_theme_setup_import( $admin_bar ) {

	/** Bail early if no display of Demo Import items */
	if ( ! ddw_tbex_display_items_demo_import() ) {
		return;
	}

	/** Theme Setup/ Import */
	$admin_bar->add_node(
		array(
			'id'     => ddw_tbex_id_sites_browser(),
			'parent' => 'group-demo-import',
			'title'  => ddw_tbex_item_title_with_settings_icon(
				esc_attr__( 'Import Demos', 'toolbar-extras' ),
				'general',
				'demo_import_icon'
			),
			'href'   => esc_url( admin_url( 'admin.php?page=genesis-customizer-demo-import' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Genesis Customizer Demos Import', 'toolbar-extras' )
			)
		)
	);

}  // end function
