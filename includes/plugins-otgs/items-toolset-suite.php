<?php

// OTGS: Toolset Suite (shared items)
// includes/plugins-otgs/items-toolset-suite

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_init', 'ddw_tbex_plugins_view_filter_toolset', 20 );
/**
 * On the Plugins page add a new filter view to only list all official Toolset
 *   plugins by OnTheGoSystems.
 *
 * @since 1.4.9
 *
 * @uses \DDW\TBEX\Group_Plugins()
 * @uses ddw_tbex_string_toolset_suite()
 */
function ddw_tbex_plugins_view_filter_toolset() {

	/** Load the class */
	if ( ! class_exists( '\DDW\TBEX\Group_Plugins' ) ) {
		require_once TBEX_PLUGIN_DIR . 'includes/class-group-plugins.php';
	}

	/** Instantiate the class with given params */
	$toolset_plugins = new \DDW\TBEX\Group_Plugins();
	$toolset_plugins->init(
		'toolset-suite',
		ddw_tbex_string_toolset_suite(),
		array(
			'author-name'      => 'OnTheGoSystems',
			'plugin-name'      => 'Toolset',
			//'description-word' => '',	//'Toolset',
			'check-type'       => 'and',	//'name-only',
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_toolset_suite', 15 );
/**
 * "Global", shared items for the Toolset plugin suite.
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_string_toolset_suite()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_toolset_suite( $admin_bar ) {

	$toolset_suite_id = 'tbex-toolset-suite';

	$admin_bar->add_node(
		array(
			'id'     => $toolset_suite_id,
			'parent' => 'tbex-sitegroup-elements',
			'title'  => esc_attr__( 'Toolset', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=toolset-settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Toolset Suite', 'toolbar-extras' ),
			)
		)
	);

		/** Groups for the various areas => hook places */
		$toolset_areas = array( 'types', 'views', 'forms', 'layouts', 'access', 'options', 'system', );

		foreach ( $toolset_areas as $toolset_area ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-toolset-' . $toolset_area,
					'parent' => $toolset_suite_id,
				)
			);

			do_action( 'tbex_toolset_after_' . $toolset_area, $admin_bar );

		}  // end foreach

		do_action( 'tbex_toolset_before_options', $admin_bar );

		/**
		 * Toolset Custom Code (hook place for suite)
		 * @link https://toolset.com/documentation/adding-custom-code/using-toolset-to-add-custom-code/
		 */
		if ( ! ( defined( 'DISALLOW_FILE_EDIT' ) && DISALLOW_FILE_EDIT )		// WP Core
			|| ! ( defined( 'DISALLOW_FILE_MODS' ) && DISALLOW_FILE_MODS )		// WP Core
			|| ! ( defined( 'TOOLSET_DISABLE_CODE_SNIPPETS' ) && TOOLSET_DISABLE_CODE_SNIPPETS )			// Toolset
			|| ! ( defined( 'TOOLSET_DISABLE_CODE_SNIPPETS_GUI' ) && TOOLSET_DISABLE_CODE_SNIPPETS_GUI )	// Toolset
		) {

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-suite-custom-code',
					'parent' => 'group-toolset-options',
					'title'  => esc_attr__( 'Custom Code', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=toolset-settings&tab=code-snippets' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => ddw_tbex_string_toolset_suite( [ 'suffix' => ': ' ] ) . esc_attr__( 'Manage Custom Code', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

		/** Toolset Settings (hook place for suite) */
		$admin_bar->add_node(
			array(
				'id'     => 'toolset-suite-settings',
				'parent' => 'group-toolset-options',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=toolset-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => ddw_tbex_string_toolset_suite( [ 'suffix' => ': ' ] ) . esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-suite-settings-general',
					'parent' => 'toolset-suite-settings',
					'title'  => esc_attr__( 'General', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=toolset-settings&tab=general' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => ddw_tbex_string_toolset_suite( [ 'addition' => __( 'Settings', 'toolbar-extras' ), 'suffix' => ': ' ] ) . esc_attr__( 'General', 'toolbar-extras' ),
					)
				)
			);

		/** Toolset Import/ Export (hook place for suite) */
		$admin_bar->add_node(
			array(
				'id'     => 'toolset-suite-exportimport',
				'parent' => 'group-toolset-options',
				'title'  => esc_attr__( 'Export/ Import', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=toolset-export-import' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => ddw_tbex_string_toolset_suite( [ 'suffix' => ': ' ] ) . esc_attr__( 'Export/ Import', 'toolbar-extras' ),
				)
			)
		);

		/** Toolset Suite Plugins */
		$admin_bar->add_node(
			array(
				'id'     => 'toolset-suite-plugins',
				'parent' => 'group-toolset-system',
				'title'  => esc_attr__( 'Suite Plugins', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'plugin-install.php?tab=commercial#repository-toolset' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => ddw_tbex_string_toolset_suite( [ 'suffix' => ': ' ] ) . esc_attr__( 'Plugins &amp; Add-Ons', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-suite-plugins-view',
					'parent' => 'toolset-suite-plugins',
					'title'  => esc_attr__( 'Installed Toolset Plugins', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'plugins.php?plugin_status=toolset-suite' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => ddw_tbex_string_toolset_suite( [ 'suffix' => ': ' ] ) . esc_attr__( 'All currently installed plugins', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-suite-plugins-installer',
					'parent' => 'toolset-suite-plugins',
					'title'  => esc_attr__( 'Plugin Installer', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'plugin-install.php?tab=commercial#repository-toolset' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => ddw_tbex_string_toolset_suite( [ 'suffix' => ': ' ] ) . esc_attr__( 'Install Plugins &amp; Add-Ons', 'toolbar-extras' ),
					)
				)
			);

		/** Toolset Debug & Support */
		$admin_bar->add_node(
			array(
				'id'     => 'toolset-suite-support',
				'parent' => 'group-toolset-system',
				'title'  => esc_attr__( 'Debug &amp; Support', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=toolset-debug-information' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => ddw_tbex_string_toolset_suite( [ 'suffix' => ': ' ] ) . esc_attr__( 'Debug &amp; Support', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-suite-support-debug',
					'parent' => 'toolset-suite-support',
					'title'  => esc_attr__( 'Debug Information', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=toolset-debug-information' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => ddw_tbex_string_toolset_suite( [ 'addition' => __( 'Support', 'toolbar-extras' ), 'suffix' => ': ' ] ) . esc_attr__( 'Debug Information', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-suite-support-installer',
					'parent' => 'toolset-suite-support',
					'title'  => esc_attr__( 'Installer Support', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=otgs-installer-support' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => ddw_tbex_string_toolset_suite( [ 'addition' => __( 'Support', 'toolbar-extras' ), 'suffix' => ': ' ] ) . esc_attr__( 'Installer Support', 'toolbar-extras' ),
					)
				)
			);

}  // end function


if ( ddw_tbex_detect_toolset_new_content_plugins() && ddw_tbex_display_items_new_content() ) :

	add_action( 'admin_bar_menu', 'ddw_tbex_new_content_items_toolset_suite', 80 );
	/**
	 * Hook place for Toolset Suite for New Content items. Will only appear for
	 *   those plugin/ Add-Ons of the suite that offer appropriate items.
	 *
	 * @since 1.4.9
	 *
	 * @param object $admin_bar Object of Toolbar nodes.
	 */
	function ddw_tbex_new_content_items_toolset_suite( $admin_bar ) {

		/** Bail early if in Network Admin Area */
		if ( is_network_admin() ) {
			return $admin_bar;
		}

		$admin_bar->add_node(
			array(
				'id'     => 'new-toolset-content',
				'parent' => 'new-content',
				'title'  => esc_attr_x( 'Toolset Content', 'Toolbar New Content section', 'toolbar-extras' ),
				'href'   => FALSE,
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr_x( 'New Toolset Content', 'Toolbar New Content section', 'toolbar-extras' ),
				)
			)
		);

	}  // end function

endif;	// New Content check


add_action( 'admin_enqueue_scripts', 'ddw_tbex_admin_menu_styles_toolset_suite' );
/**
 * Add helper styles for Toolset Suite for the left-hand Admin Menu: This will
 *   add suble separator lines between the various admin sub menu items to
 *   distinguish them a lot better from each other.
 *
 * @since 1.4.9
 *
 * @uses wp_add_inline_style()
 */
function ddw_tbex_admin_menu_styles_toolset_suite() {

	/**
     * For WordPress Toolbar Area
     *   Style handle: 'admin-menu' (WP Core)
     */
    $inline_css = '
		.wp-has-submenu a[href="admin.php?page=toolset-settings"],
		.wp-has-submenu a[href="admin.php?page=dd_layouts"],
		.wp-has-submenu a[href="admin.php?page=CRED_Forms"],
		.wp-has-submenu a[href="admin.php?page=views"],
		.wp-has-submenu a[href="admin.php?page=types_access"] {
			border-top: 1px dotted #888;
			margin-top: 8px !important;
			padding-top: 8px !important;
		}

		.admin-color-sunrise .wp-has-submenu a[href="admin.php?page=toolset-settings"],
		.admin-color-sunrise .wp-has-submenu a[href="admin.php?page=dd_layouts"],
		.admin-color-sunrise .wp-has-submenu a[href="admin.php?page=CRED_Forms"],
		.admin-color-sunrise .wp-has-submenu a[href="admin.php?page=views"],
		.admin-color-sunrise .wp-has-submenu a[href="admin.php?page=types_access"],
		.admin-color-blue .wp-has-submenu a[href="admin.php?page=toolset-settings"],
		.admin-color-blue .wp-has-submenu a[href="admin.php?page=dd_layouts"],
		.admin-color-blue .wp-has-submenu a[href="admin.php?page=CRED_Forms"],
		.admin-color-blue .wp-has-submenu a[href="admin.php?page=views"],
		.admin-color-blue .wp-has-submenu a[href="admin.php?page=types_access"],
		.admin-color-ocean .wp-has-submenu a[href="admin.php?page=toolset-settings"],
		.admin-color-ocean .wp-has-submenu a[href="admin.php?page=dd_layouts"],
		.admin-color-ocean .wp-has-submenu a[href="admin.php?page=CRED_Forms"],
		.admin-color-ocean .wp-has-submenu a[href="admin.php?page=views"],
		.admin-color-ocean .wp-has-submenu a[href="admin.php?page=types_access"] {
			border-top: 1px dotted #ccc;
		}';

    wp_add_inline_style( 'admin-menu', $inline_css );

}  // end function
