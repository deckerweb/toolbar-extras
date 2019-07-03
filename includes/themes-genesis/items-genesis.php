<?php

// includes/themes-genesis/items-genesis

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Onboarding demo content & layout(s). This requires Genesis v2.8.0 or higher,
 *   and a Child Theme or plugin with the config sub folder, including an
 *   "onboarding.php" file.
 *
 * @since 1.4.2
 *
 * @uses PARENT_THEME_VERSION (from Genesis Core)
 *
 * @return bool TRUE when the conditions are met, FALSE otherwise.
 */
function ddw_tbex_is_genesis_onboarding_active() {

	$child_onboarding_path = get_stylesheet_directory() . '/config/onboarding.php';

	if ( version_compare( PARENT_THEME_VERSION, '2.8.0', '>=' ) && file_exists( $child_onboarding_path ) ) {
		return TRUE;
	}

	return FALSE;

}  // end function


/**
 * Check if current user has access to one of the possible Genesis Settings
 *   pages or not.
 *
 * @since 1.0.0
 *
 * @param string $genesis_handle Helper key to identify a settings page
 * @return bool TRUE if settings are active, FALSE otherwise.
 */
function ddw_tbex_is_genesis_settings_active( $genesis_handle = '' ) {

	$options   = '';
	$user_meta = '';

	switch ( sanitize_key( $genesis_handle ) ) {

		case 'settings':
			$options   = 'genesis-admin-menu';
			$user_meta = 'genesis_admin_menu';
			break;

		case 'seo':
			$options   = 'genesis-seo-settings-menu';
			$user_meta = 'genesis_seo_settings_menu';
			break;

		case 'export':
			$options   = 'genesis-import-export-menu';
			$user_meta = 'genesis_import_export_menu';
			break;

	}  // end switch

	$current_user = wp_get_current_user();

	return ( current_theme_supports( $options ) && get_the_author_meta( $user_meta, $current_user->ID ) ) ? TRUE : FALSE;

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_genesis', 100 );
/**
 * Items for Theme: Genesis Framework (by StudioPress/ Rainmaker Digital, LLC)
 *
 * @since 1.0.0
 * @since 1.4.0 Various tweaks & optimizations.
 * @since 1.4.2 Added optional onboarding item.
 *
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_is_genesis_settings_active()
 * @uses ddw_tbex_item_theme_creative_customize()
 * @uses ddw_tbex_customizer_start()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_genesis() {

	$genesis_customizer = version_compare( PARENT_THEME_VERSION, '2.10.0', '>=' ) ? TRUE : FALSE;

	/** Genesis creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child' ),
			'href'   => ddw_tbex_is_genesis_settings_active( 'settings' ) ? esc_url( admin_url( 'admin.php?page=genesis' ) ) : ddw_tbex_customizer_start(),
			'meta'   => array(
				'target' => $genesis_customizer ? ddw_tbex_meta_target() : '',
				'title'  => ddw_tbex_string_theme_title( 'attr', 'child' )
			)
		)
	);

		/** Genesis customize */
		ddw_tbex_item_theme_creative_customize();

		/** Add optional child theme group */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-genesischild-creative',
				'parent' => 'theme-creative',
			)
		);

			/** Optional Onboarding item */
			if ( ddw_tbex_is_genesis_onboarding_active() ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'gen-child-onboarding',
						'parent' => 'theme-creative',	//'group-genesischild-creative',
						'title'  => esc_attr__( 'Getting Started', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=genesis-getting-started' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Getting Started: Import Demo Content &amp; Layouts', 'toolbar-extras' )
						)
					)
				);

			}  // end if

		/** Add optional plugins group */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-genesisplugins-creative',
				'parent' => 'theme-creative',
			)
		);

	/** Genesis settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-settings',
			'parent' => 'group-active-theme',
			'title'  => esc_attr__( 'Genesis Settings', 'toolbar-extras' ),
			'href'   => ddw_tbex_is_genesis_settings_active( 'settings' ) ? esc_url( admin_url( 'admin.php?page=genesis' ) ) : ddw_tbex_customizer_start(),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Genesis Settings', 'toolbar-extras' )
			)
		)
	);

		if ( ddw_tbex_is_genesis_settings_active( 'settings' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'gen-theme',
					'parent' => 'theme-settings',
					/* translators: Genesis Default Theme Settings */
					'title'  => esc_attr__( 'Theme', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=genesis' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'General Theme Settings', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		if ( ddw_tbex_is_genesis_settings_active( 'seo' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'gen-seo',
					'parent' => 'theme-settings',
					'title'  => esc_attr__( 'SEO', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=seo-settings' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'General Theme Settings', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		if ( ddw_tbex_is_genesis_settings_active( 'export' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'gen-export',
					'parent' => 'theme-settings',
					'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=genesis-import-export' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'gen-whatsnew',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'What\'s New', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=genesis-upgraded' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'What\'s New &amp; Version Info', 'toolbar-extras' )
				)
			)
		);

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_genesis_customize', 100 );
/**
 * Customize items for Genesis Framework
 *
 * @since 1.0.0
 * @since 1.4.0 Refactored using filter/array declaration.
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_genesis_customize( array $items ) {

	/** Declare theme's items */
	$genesis_items = array(
		'genesis' => array(
			'type'  => 'panel',
			'title' => __( 'Theme Settings', 'toolbar-extras' ),
			'id'    => 'gencmz-theme',
		),
		'genesis-seo' => array(
			'type'  => 'panel',
			'title' => __( 'SEO Settings', 'toolbar-extras' ),
			'id'    => 'gencmz-seo',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $genesis_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_genesis_resources', 130 );
/**
 * General resources items for Genesis Framework.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.0.0
 * @since 1.4.2 Added developer docs.
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_is_genesis_settings_active()
 * @uses ddw_tbex_resource_item()
 * @uses ddw_tbex_display_items_dev_mode()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_genesis_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	$resources_place = 'theme-settings';

	if ( ! ddw_tbex_is_genesis_settings_active( 'settings' )
		&& ! ddw_tbex_is_genesis_settings_active( 'seo' )
		&& ! ddw_tbex_is_genesis_settings_active( 'export' )
	) {
		$resources_place = 'theme-creative';
	}

	/** Group: Resources for Genesis Framework */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => $resources_place,
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	/** Testing Child resources */
	do_action( 'tbex_resouces_genesis_child' );

	ddw_tbex_resource_item(
		'official-support',
		'theme-supportofficial',
		'group-theme-resources',
		'https://my.studiopress.com/support/'
	);

	ddw_tbex_resource_item(
		'community-forum',
		'theme-community',
		'group-theme-resources',
		'https://studiopress.community'
	);

	ddw_tbex_resource_item(
		'facebook-group',
		'theme-facebook',
		'group-theme-resources',
		'https://www.facebook.com/groups/genesiswp/'
	);

	ddw_tbex_resource_item(
		'slack-channel',
		'theme-slack',
		'group-theme-resources',
		'https://genesiswp.slack.com/'
	);

	ddw_tbex_resource_item(
		'tutorials',
		'theme-tutorials',
		'group-theme-resources',
		'https://sridharkatakam.com/',
		esc_attr__( 'Tutorials (Premim Membership Site)', 'toolbar-extras' )
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-beginners',
			'parent' => 'group-theme-resources',
			'title'  => esc_attr__( 'Genesis for Beginners', 'toolbar-extras' ),
			'href'   => 'https://www.studiopress.com/genesis-for-beginners/',
			'meta'   => array(
				'rel'    => ddw_tbex_meta_rel(),
				'target' => ddw_tbex_meta_target(),
				'title'  => esc_attr__( 'Genesis for Beginners', 'toolbar-extras' )
			)
		)
	);

	/** Developer documentation */
	if ( ddw_tbex_display_items_dev_mode() ) {

		ddw_tbex_resource_item(
			'documentation-dev',
			'theme-developer-docs',
			'group-theme-resources',
			'https://studiopress.github.io/genesis/'
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'genesis-beblog-dev-resource',
				'parent' => 'group-theme-resources',
				'title'  => esc_attr__( 'Blog: Genesis Development', 'toolbar-extras' ),
				'href'   => 'https://www.billerickson.net/category/genesis/',
				'meta'   => array(
					'rel'    => ddw_tbex_meta_rel(),
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Bill Erickson Blog: Development with Genesis Framework', 'toolbar-extras' )
				)
			)
		);

	}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_genesis_cpt_archives', 80 );
/**
 * Admin - Table: Genesis Archive Settings
 * Admin - Archive Settings: Customizer + View
 * Frontend Archiv: Customizer
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_item_title_with_icon()
 * @uses ddw_tbex_string_customize_attr()
 * @uses ddw_tbex_customizer_focus()
 * @uses ddw_tbex_meta_target()
 *
 * @see plugin file /includes/items-edit-content.php
 */
function ddw_tbex_themeitems_genesis_cpt_archives() {
	
	/** Bail early if proper context is not met */
	if ( ( is_admin() && 'edit.php' !== $GLOBALS[ 'pagenow' ] )		// admin && edit.php pagenow
		|| ( ! is_admin() && ! is_post_type_archive() )				// frontend && post type archive
	) {
		return;
	}

	/** Get the current post type */
	$post_type = ( is_admin() ) ? get_current_screen()->post_type : $GLOBALS[ 'wp_query' ]->query_vars[ 'post_type' ];

	/** Bail early if Genesis CPT Archive Settings is not supported */
	if ( ! post_type_supports( $post_type, 'genesis-cpt-archives-settings' ) ) {
		return;
	}

	/** The Customizer link node arguments for reusage */
	$customizer_node = array(
		'id'     => 'genesis-cpt-archive-customize',
		'parent' => 'cpt-archive-settings',		// Original item by Genesis
		'title'  => ddw_tbex_item_title_with_icon( ddw_tbex_string_customize_attr( __( 'Appearance', 'toolbar-extras' ) ) ),
		'href'   => ddw_tbex_customizer_focus( '', '', get_post_type_archive_link( $post_type ) ),
		'meta'   => array(
			'class'  => 'tbex-customize-content',
			'target' => ddw_tbex_meta_target(),
			'title'  => ddw_tbex_string_customize_attr( __( 'Appearance', 'toolbar-extras' ) ),
		)
	);

	/**
	 * In admin:
	 *   - For post type list table add archive settings sub link
	 *   - For CPT Archive Settings page add iew & Customizer links
	 */
	if ( is_admin() ) {

		//$current_screen = get_current_screen();
		//$post_type      = $current_screen->post_type;

		/** For: Post type list table view */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbex-genesis-cpt-archive-' . $post_type,
				'parent' => 'archive',		// Original item by WordPress Core
				'title'  => ddw_tbex_item_title_with_icon( __( 'Archive Settings', 'toolbar-extras' ) ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $post_type . '&page=genesis-cpt-archive-' . $post_type ) ),
				'meta'   => array(
					'class'  => 'tbex-genesis-cpt-archive',
					'target' => '',
					'title'  => esc_attr__( 'Genesis', 'toolbar-extras' ) . ': ' . esc_attr__( 'Archive Settings', 'toolbar-extras' ),
				)
			)
		);

		/**
		 * For: When on Genesis CPT Archive Settings page (completely new item)
		 *   in this context.
		 */
		if ( genesis_is_menu_page( 'genesis-cpt-archive-' . $post_type ) ) {

			$post_type_object = get_post_type_object( $post_type );

			/** Title label */
			$build_title = sprintf(
				/* translators: %s - plural label of post type */
				__( 'View %s', 'toolbar-extras' ),
				$post_type_object->labels->name
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'cpt-archive-settings',		// same as Genesis original
					'title'  => ddw_tbex_item_title_with_icon( $build_title ),
					'href'   => esc_url( get_post_type_archive_link( $post_type ) ),
					'meta'   => array(
						'class'  => 'tbex-view-content',	//'tbex-genesis-cpt-archive-view',
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'View Archive for', 'toolbar-extras' ) . ': ' . $post_type_object->labels->name,
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node( $customizer_node );

		}  // end if

	}

	/** On frontend: For post type archive add Customizer link */
	else {

		// $post_type_object = get_post_type_object( $wp_query->query_vars[ 'post_type' ] );

		$GLOBALS[ 'wp_admin_bar' ]->add_node( $customizer_node );

	}  // end if

}  // end function


if ( ddw_tbex_is_genesis_onboarding_active() ) :

	add_action( 'admin_menu', 'ddw_tbex_genesis_onboarding_submenu', 50 );
	/**
	 * Add optional Onboarding page as submenu to the Genesis left-hand admin
	 *   menu.
	 *
	 * @since 1.4.2
	 */
	function ddw_tbex_genesis_onboarding_submenu() {

		remove_submenu_page( null, 'genesis-getting-started' );

		add_submenu_page(
			'genesis',
			__( 'Genesis Getting Started - Import Demo Content', 'toolbar-extras' ),
			__( 'Import Demo Content', 'toolbar-extras' ),
			'edit_theme_options',
			esc_url( admin_url( 'admin.php?page=genesis-getting-started' ) )
		);

	}  // end function


	add_filter( 'parent_file', 'ddw_tbex_parent_submenu_tweaks_genesis' );
	/**
	 * Highlight proper submenu and parent menu for the optional Genesis
	 *   onboarding page.
	 *
	 * @since 1.4.2
	 *
	 * @uses get_current_screen()
	 *
	 * @global string $GLOBALS[ 'submenu_file' ]
	 *
	 * @param string $parent_file The filename of the parent menu.
	 * @return string $parent_file The tweaked filename of the parent menu.
	 */
	function ddw_tbex_parent_submenu_tweaks_genesis( $parent_file ) {

		if ( 'admin_page_genesis-getting-started' === get_current_screen()->id ) {

			$GLOBALS[ 'submenu_file' ] = esc_url( admin_url( 'admin.php?page=genesis-getting-started' ) );
			$parent_file = 'genesis';

		}  // end if

		return $parent_file;

	}  // end function

endif;


if ( ! function_exists( 'ddw_genesis_tweak_plugins_submenu' ) ) :

	add_action( 'admin_menu', 'ddw_genesis_tweak_plugins_submenu', 11 );
	/**
	 * Add Genesis submenu redirecting to "genesis" plugin search within the
	 *   WordPress.org Plugin Directory. For Genesis 2.10.0 or higher this
	 *   replaces the "Genesis Plugins" submenu which only lists plugins from
	 *   StudioPress - but there are many more from the community.
	 *
	 * @since 1.4.3
	 *
	 * @uses remove_submenu_page()
	 * @uses add_submenu_page()
	 */
	function ddw_genesis_tweak_plugins_submenu() {

		/** Remove the StudioPress plugins submenu */
		if ( class_exists( 'Genesis_Admin_Plugins' ) ) {
			remove_submenu_page( 'genesis', 'genesis-plugins' );
		}

		/** Add a Genesis community plugins submenu */
		add_submenu_page(
			'genesis',
			esc_html__( 'Genesis Plugins from the Plugin Directory', 'toolbar-extras' ),
			esc_html__( 'Genesis Plugins', 'toolbar-extras' ),
			'install_plugins',
			esc_url( network_admin_url( 'plugin-install.php?s=genesis&tab=search&type=term' ) )
		);

	}  // end function

endif;


add_filter( 'tbex_filter_color_items', 'ddw_tbex_add_color_item_studiopress_genesis' );
/**
 * Add additional color item to any instance of a Toolbar Extras color picker
 *   on its setting page.
 *
 * @link https://www.studiopress.com/brand-assets/
 *
 * @since 1.4.4
 *
 * @param array $color_items Array holding all color items.
 * @return array Modified array of color items.
 */
function ddw_tbex_add_color_item_studiopress_genesis( $color_items ) {

	$color_items[ 'sp-genesis-blue' ] = array(
		'color' => '#0066cc',
		'name'  => __( 'Genesis Blue', 'toolbar-extras' ),
	);

	return $color_items;

}  // end function
