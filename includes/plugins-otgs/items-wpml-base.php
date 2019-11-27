<?php

// OTGS: WPML Suite (shared items)
// includes/plugins-otgs/items-wpml-base

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_init', 'ddw_tbex_plugins_view_filter_wpml', 100 );
/**
 * On the Plugins page add a new filter view to only list all official WPML
 *   plugins by OnTheGoSystems.
 *
 * @since 1.4.9
 *
 * @uses \DDW\TBEX\Group_Plugins()
 * @uses ddw_tbex_string_wpml_suite()
 */
function ddw_tbex_plugins_view_filter_wpml() {

	/** Load the class */
	if ( ! class_exists( '\DDW\TBEX\Group_Plugins' ) ) {
		require_once TBEX_PLUGIN_DIR . 'includes/class-group-plugins.php';
	}

	/** Instantiate the class with given params */
	$wpml_plugins = new \DDW\TBEX\Group_Plugins();
	$wpml_plugins->init(
		'wpml-suite',
		ddw_tbex_string_wpml_suite(),
		array(
			'author-name'      => 'OnTheGoSystems',
			'plugin-name'      => 'Multilingual',
			'description-word' => 'WPML',
			'check-type'       => 'and',
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_wpml_base', 16 );
/**
 * "Global", shared items for the WPML plugin suite.
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_string_toolset_suite()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_wpml_base( $admin_bar ) {

	$wpml_suite_id = 'tbex-wpml-suite';

	$string_wpml_suite = ddw_tbex_string_dynamic( [ 'string' => __( 'WPML Suite', 'toolbar-extras' ), 'suffix' => ': ' ] );

	$admin_bar->add_node(
		array(
			'id'     => $wpml_suite_id,
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr__( 'WPML', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=sitepress-multilingual-cms/menu/languages.php' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'WPML Suite - Multilingual', 'toolbar-extras' ),
			)
		)
	);

		/** Groups for the various areas => hook places */
		$wpml_areas = array( 'languages', 'wpproducts', 'management', 'wpelements', 'options', 'system', );

		foreach ( $wpml_areas as $wpml_area ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-wpml-' . $wpml_area,
					'parent' => $wpml_suite_id,
				)
			);

			do_action( 'tbex_wpml_after_' . $wpml_area, $admin_bar );

		}  // end foreach


		/** Languages */
		do_action( 'tbex_wpml_before_languages', $admin_bar );

		$admin_bar->add_node(
			array(
				'id'     => 'wpml-suite-languages',
				'parent' => 'group-wpml-languages',
				'title'  => esc_attr__( 'Languages', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=sitepress-multilingual-cms/menu/languages.php' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => $string_wpml_suite . esc_attr__( 'Languages', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'wpml-suite-languages-setup',
					'parent' => 'wpml-suite-languages',
					'title'  => esc_attr__( 'Setup Languages', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=sitepress-multilingual-cms/menu/languages.php' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Setup Languages', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'wpml-suite-languages-edit',
					'parent' => 'wpml-suite-languages',
					'title'  => esc_attr__( 'Edit Languages', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=sitepress-multilingual-cms/menu/languages.php&trop=1' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Edit Languages', 'toolbar-extras' ),
					)
				)
			);


		/** Theme & Plugins Localization */
		$admin_bar->add_node(
			array(
				'id'     => 'wpml-suite-strings-wpproducts',
				'parent' => 'group-wpml-wpproducts',
				'title'  => esc_attr__( 'Strings: Themes &amp; Plugins', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=sitepress-multilingual-cms/menu/theme-localization.php' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Strings: Themes &amp; Plugins', 'toolbar-extras' ),
				)
			)
		);


		/** WP Elements - Translate */
		$admin_bar->add_node(
			array(
				'id'     => 'wpml-suite-wpelements',
				'parent' => 'group-wpml-wpelements',
				'title'  => esc_attr__( 'Translate WP Elements', 'toolbar-extras' ),
				'href'   => FALSE,
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Translate WP Elements', 'toolbar-extras' ),
				)
			)
		);

			/**
			 * Nav Menus Sync
			 *   Note: Only display if not deactivated via plugin "SO Remove WPML Menu Sync".
			 */
			if ( ! class_exists( 'SOrwms_Load' ) ) {

				$admin_bar->add_node(
					array(
						'id'     => 'wpml-suite-wpelements-sync-menus',
						'parent' => 'wpml-suite-wpelements',
						'title'  => esc_attr__( 'Nav Menus Sync', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=sitepress-multilingual-cms/menu/menu-sync/menus-sync.php' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Nav Menus Sync', 'toolbar-extras' ),
						)
					)
				);

			}  // end if

			/** Tax Translations */
			$admin_bar->add_node(
				array(
					'id'     => 'wpml-suite-wpelements-tax-translation',
					'parent' => 'wpml-suite-wpelements',
					'title'  => esc_attr__( 'Taxonomy Translation', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=sitepress-multilingual-cms/menu/taxonomy-translation.php' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Taxonomy Translation', 'toolbar-extras' ),
					)
				)
			);


		/** Settings */
		do_action( 'tbex_wpml_before_options', $admin_bar );

		$admin_bar->add_node(
			array(
				'id'     => 'wpml-suite-settings',
				'parent' => 'group-wpml-options',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => ddw_tbex_is_wpml_translation_management_active()
					? esc_url( admin_url( 'admin.php?wpml-translation-management/menu/settings' ) )
					: esc_url( admin_url( 'admin.php?page=sitepress-multilingual-cms/menu/translation-options.php' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);


		/** WPML Suite Plugins */
		$admin_bar->add_node(
			array(
				'id'     => 'wpml-suite-plugins',
				'parent' => 'group-wpml-system',
				'title'  => esc_attr__( 'Suite Plugins', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'plugin-install.php?tab=commercial#repository-wpml' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => ddw_tbex_string_wpml_suite( [ 'suffix' => ': ' ] ) . esc_attr__( 'Plugins &amp; Add-Ons', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'wpml-suite-plugins-view',
					'parent' => 'wpml-suite-plugins',
					'title'  => esc_attr__( 'Installed WPML Plugins', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'plugins.php?plugin_status=wpml-suite' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => ddw_tbex_string_wpml_suite( [ 'suffix' => ': ' ] ) . esc_attr__( 'All currently installed plugins', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'wpml-suite-plugins-installer',
					'parent' => 'wpml-suite-plugins',
					'title'  => esc_attr__( 'Plugin Installer', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'plugin-install.php?tab=commercial#repository-wpml' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => ddw_tbex_string_wpml_suite( [ 'suffix' => ': ' ] ) . esc_attr__( 'Install Plugins &amp; Add-Ons', 'toolbar-extras' ),
					)
				)
			);


		/** WPML Debug & Support */
		$admin_bar->add_node(
			array(
				'id'     => 'wpml-suite-support',
				'parent' => 'group-wpml-system',
				'title'  => esc_attr__( 'Debug &amp; Support', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=sitepress-multilingual-cms/menu/support.php' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => ddw_tbex_string_wpml_suite( [ 'suffix' => ': ' ] ) . esc_attr__( 'Debug &amp; Support', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'wpml-suite-support-system',
					'parent' => 'wpml-suite-support',
					'title'  => esc_attr__( 'System Information', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=sitepress-multilingual-cms/menu/support.php' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => ddw_tbex_string_wpml_suite( [ 'addition' => __( 'Support', 'toolbar-extras' ), 'suffix' => ': ' ] ) . esc_attr__( 'System Information', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'wpml-suite-support-debug',
					'parent' => 'wpml-suite-support',
					'title'  => esc_attr__( 'Debug Information', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=sitepress-multilingual-cms/menu/debug-information.php' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => ddw_tbex_string_wpml_suite( [ 'addition' => __( 'Support', 'toolbar-extras' ), 'suffix' => ': ' ] ) . esc_attr__( 'Debug Information', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'wpml-suite-support-troubleshooting',
					'parent' => 'wpml-suite-support',
					'title'  => esc_attr__( 'Troubleshooting', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=sitepress-multilingual-cms/menu/troubleshooting.php' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => ddw_tbex_string_wpml_suite( [ 'addition' => __( 'Support', 'toolbar-extras' ), 'suffix' => ': ' ] ) . esc_attr__( 'Troubleshooting', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'wpml-suite-support-installer',
					'parent' => 'wpml-suite-support',
					'title'  => esc_attr__( 'Installer Support', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=otgs-installer-support' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => ddw_tbex_string_wpml_suite( [ 'addition' => __( 'Support', 'toolbar-extras' ), 'suffix' => ': ' ] ) . esc_attr__( 'Installer Support', 'toolbar-extras' ),
					)
				)
			);

	/** Toolset integration */
	if ( ddw_tbex_is_toolset_types_active() || ddw_tbex_is_toolset_views_active() ) {

		$admin_bar->add_node(
			array(
				'id'     => 'toolset-suite-settings-wpml',
				'parent' => 'toolset-suite-settings',
				'title'  => esc_attr__( 'WPML Integration', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=toolset-settings&tab=wpml' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'WPML Integration', 'toolbar-extras' ),
				)
			)
		);

	}  // end if

}  // end function


add_action( 'admin_enqueue_scripts', 'ddw_tbex_admin_menu_styles_wpml_suite' );
/**
 * Add helper styles for WPML Suite for the left-hand Admin Menu: This will
 *   add suble separator lines between the various admin sub menu items to
 *   distinguish them a lot better from each other.
 *
 * @since 1.4.9
 *
 * @uses wp_add_inline_style()
 */
function ddw_tbex_admin_menu_styles_wpml_suite() {

	/**
     * For WordPress Toolbar Area
     *   Style handle: 'admin-menu' (WP Core)
     */
    $inline_css = '
		.wp-has-submenu a[href="admin.php?page=sitepress-multilingual-cms/menu/translation-options.php"],
		.wp-has-submenu a[href="admin.php?page=wpml-translation-management/menu/settings"],
		.wp-has-submenu a[href="admin.php?page=sitepress-multilingual-cms/menu/theme-localization.php"],
		.wp-has-submenu a[href="admin.php?page=wpml-translation-management/menu/main.php"],
		.wp-has-submenu a[href="admin.php?page=wpml-media"] {
			border-top: 1px dotted #888;
			margin-top: 8px !important;
			padding-top: 8px !important;
		}

		.admin-color-sunrise .wp-has-submenu a[href="admin.php?page=sitepress-multilingual-cms/menu/translation-options.php"],
		.admin-color-sunrise .wp-has-submenu a[href="admin.php?page=wpml-translation-management/menu/settings"],
		.admin-color-sunrise .wp-has-submenu a[href="admin.php?page=sitepress-multilingual-cms/menu/theme-localization.php"],
		.admin-color-sunrise .wp-has-submenu a[href="admin.php?page=wpml-translation-management/menu/main.php"],
		.admin-color-sunrise .wp-has-submenu a[href="admin.php?page=wpml-media"],
		.admin-color-blue .wp-has-submenu a[href="admin.php?page=sitepress-multilingual-cms/menu/translation-options.php"],
		.admin-color-blue .wp-has-submenu a[href="admin.php?page=wpml-translation-management/menu/settings"],
		.admin-color-blue .wp-has-submenu a[href="admin.php?page=sitepress-multilingual-cms/menu/theme-localization.php"],
		.admin-color-blue .wp-has-submenu a[href="admin.php?page=wpml-translation-management/menu/main.php"],
		.admin-color-blue .wp-has-submenu a[href="admin.php?page=wpml-media"],
		.admin-color-ocean .wp-has-submenu a[href="admin.php?page=sitepress-multilingual-cms/menu/translation-options.php"],
		.admin-color-ocean .wp-has-submenu a[href="admin.php?page=wpml-translation-management/menu/settings"],
		.admin-color-ocean .wp-has-submenu a[href="admin.php?page=sitepress-multilingual-cms/menu/theme-localization.php"],
		.admin-color-ocean .wp-has-submenu a[href="admin.php?page=wpml-translation-management/menu/main.php"],
		.admin-color-ocean .wp-has-submenu a[href="admin.php?page=wpml-media"] {
			border-top: 1px dotted #ccc;
		}';

    wp_add_inline_style( 'admin-menu', $inline_css );

}  // end function
