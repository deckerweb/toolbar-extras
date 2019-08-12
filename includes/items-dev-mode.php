<?php

// includes/items-dev-mode

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'tbex_before_site_group_content', 'ddw_tbex_site_items_dev_mode' );
/**
 * Set main item for Dev Mode.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_item_title_with_settings_icon()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_dev_mode() {

	if ( ! has_filter( 'tbex_filter_is_dev_mode' ) ) {
		return;
	}

	/** Group: Rapid Dev (Dev Mode) */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'tbex-sitegroup-dev-mode',
			'parent' => ddw_tbex_parent_id_site_group(),
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'rapid-dev',
			'parent' => 'tbex-sitegroup-dev-mode',
			'title'  => ddw_tbex_item_title_with_settings_icon(
				ddw_tbex_get_option( 'development', 'rapid_dev_name' ),
				'development',
				'rapid_dev_icon'
			),
			'href'   => '',
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Rapid Development', 'toolbar-extras' )
			)
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_devmode_file_editors', 15 );
/**
 * Optionally hook in Theme Editor and Plugin Editor to Dev Mode items.
 *
 * @since 1.0.0
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_devmode_file_editors( $admin_bar ) {

	if ( ! ( defined( 'DISALLOW_FILE_EDIT' ) && DISALLOW_FILE_EDIT ) ) {

		/** Group */
		$admin_bar->add_group(
			array(
				'id'     => 'group-wp-editors',
				'parent' => 'rapid-dev',
			)
		);

		if ( current_user_can( 'edit_themes' ) ) {

			add_filter( 'tbex_filter_is_dev_mode', '__return_empty_string' );

			$admin_bar->add_node(
				array(
					'id'     => 'theme-editor',
					'parent' => 'group-wp-editors',
					'title'  => esc_attr__( 'Theme Editor', 'toolbar-extras' ),
					'href'   => is_multisite() ? esc_url( network_admin_url( 'theme-editor.php?file=style.css&amp;theme=' . get_stylesheet() ) ) : esc_url( admin_url( 'theme-editor.php?file=style.css&amp;theme=' . get_stylesheet() ) ),
					'meta'   => array(
						'rel'    => ddw_tbex_meta_rel(),
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Theme Editor', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

		if ( current_user_can( 'edit_plugins' ) ) {

			add_filter( 'tbex_filter_is_dev_mode', '__return_empty_string' );

			$admin_bar->add_node(
				array(
					'id'     => 'plugin-editor',
					'parent' => 'group-wp-editors',
					'title'  => esc_attr__( 'Plugin Editor', 'toolbar-extras' ),
					'href'   => is_multisite() ? esc_url( network_admin_url( 'plugin-editor.php' ) ) : esc_url( admin_url( 'plugin-editor.php' ) ),
					'meta'   => array(
						'rel'    => ddw_tbex_meta_rel(),
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Plugin Editor', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

	}  // end if

}  // end function


add_action( 'tbex_before_site_group_content', 'ddw_tbex_site_items_devmode_plugin_status' );
/**
 * Hook in more "Plugins Page" items for Dev Mode.
 *
 * @since 1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_devmode_plugin_status() {

	if ( current_user_can( 'activate_plugins' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'wpplugins-recently',
				'parent' => 'wpplugins',
				'title'  => esc_attr__( 'Recently Activated', 'toolbar-extras' ),
				'href'   => is_network_admin() ? esc_url( network_admin_url( 'plugins.php?plugin_status=recently_activated' ) ) : esc_url( admin_url( 'plugins.php?plugin_status=recently_activated' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Recently Activated Only', 'toolbar-extras' )
				)
			)
		);

	}  // end if

	if ( current_user_can( 'update_plugins' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'wpplugins-updateable',
				'parent' => 'wpplugins',
				'title'  => esc_attr__( 'Updateable', 'toolbar-extras' ),
				'href'   => is_network_admin() ? esc_url( network_admin_url( 'plugins.php?plugin_status=upgrade' ) ) : esc_url( admin_url( 'plugins.php?plugin_status=upgrade' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Updateable Only', 'toolbar-extras' )
				)
			)
		);

	}  // end if


	/** MU Plugins (Must Use) and DropIns */
	if ( ! is_multisite()
		|| ( is_network_admin() && current_user_can( 'manage_network_plugins' ) )
	) {

		//if ( apply_filters( 'show_advanced_plugins', TRUE, 'mustuse' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'wpplugins-mustuse',
					'parent' => 'wpplugins',
					'title'  => esc_attr__( 'Must Use (MU)', 'toolbar-extras' ),
					'href'   => esc_url( network_admin_url( 'plugins.php?plugin_status=mustuse' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Must Use - MU Plugins', 'toolbar-extras' )
					)
				)
			);

		//}  // end if

		//if ( apply_filters( 'show_advanced_plugins', TRUE, 'dropins' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'wpplugins-dropins',
					'parent' => 'wpplugins',
					'title'  => esc_attr__( 'Drop-ins', 'toolbar-extras' ),
					'href'   => esc_url( network_admin_url( 'plugins.php?plugin_status=dropins' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Drop-ins - Special Plugins', 'toolbar-extras' )
					)
				)
			);

		//}  // end if

	}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_items_devmode_element_ids' );
/**
 * Add ID of current queried object (Singular/Tax/Archive Page) as sub item to
 *   the edit/view items.
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_use_devmode_element_ids()
 * @uses ddw_tbex_item_title_with_icon()
 *
 * @global object $GLOBALS[ 'wp_the_query' ]
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_items_devmode_element_ids( $admin_bar ) {

	/** Bail early if items should not be displayed */
	if ( ! ddw_tbex_use_devmode_element_ids()
		|| ( is_admin() && ! in_array( get_current_screen()->base, array( 'edit', 'post', 'term' ) ) )
	) {
		return $admin_bar;
	}

	/** Set default */
	$the_id = '';

	/** Helper for proper parent ID for Toolbar node */
	$parent = ( 'draft' === get_post_status( get_the_ID() ) ) ? 'preview' : 'view';

	/** The "ID" logic for Admin & Frontend, plus Singular & Term */
	if ( is_admin() ) {

		/** Get current Admin screen */
		$current_screen = get_current_screen();

		if ( 'term' === $current_screen->base
			&& isset( $_GET[ 'tag_ID' ] )
		) {

			/** (Admin) ID for taxonomy term */
			$the_id = absint( wp_unslash( $_GET[ 'tag_ID' ] ) );

		} elseif ( in_array( $current_screen->base, array( 'post', 'edit' ) ) ) {

			/** (Admin) ID for singular item */
			$the_id = absint( get_the_ID() );

		}  // end if

	} else {

		if ( is_singular() ) {

			/** (Frontend) ID for singular item */
			$the_id = absint( get_the_ID() );

		} elseif ( ! is_post_type_archive() ) {

			/** Get current queried object */
			$current_object = $GLOBALS[ 'wp_the_query' ]->get_queried_object();

			/** (Frontend) ID for taxonomy term */
			if ( is_object( $current_object ) ) {
				$the_id = absint( $current_object->term_id );
			}

		}  // end if

	}  // end if

	/** Build the title string */
	$title = sprintf(
		'%s: %s',
		esc_attr_x( 'ID', 'ID of current element/ queried object', 'toolbar-extras' ),
		$the_id
	);

	/** Build the complete Toolbar node */
	$admin_bar->add_node(
		array(
			'id'     => 'tbex-element-id-' . $the_id,
			'parent' => is_blog_admin() ? $parent : 'edit',
			'title'  => ddw_tbex_item_title_with_icon( $title ),
			'href'   => FALSE,
			'meta'   => array(
				'class'  => 'tbex-element-id',
				'title'  => esc_attr__( 'Internal WordPress ID of current element', 'toolbar-extras' ),
			)
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_devmode_resources', 999 );
/**
 * Optional resource items for Dev Mode.
 *
 * @since 1.0.0
 * @since 1.4.2 Added Child Theme Handbook resource.
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_devmode_resources( $admin_bar ) {

	/** Bail early if resources display is disabled */
	if ( ! ddw_tbex_display_items_resources() ) {
		return $admin_bar;
	}

	$admin_bar->add_group(
		array(
			'id'     => 'group-devmode-resources',
			'parent' => 'rapid-dev',
			'meta'   => array( 'class' => 'ab-sub-secondary' ),
		)
	);

	/** Developer Hub (new) */
	ddw_tbex_resource_item(
		'code-reference',
		'wp-developer-coderef',
		'group-devmode-resources',
		'https://developer.wordpress.org/reference/'
	);

	/** Codex (old) */
	$admin_bar->add_node(
		array(
			'id'     => 'wp-codex-devs',
			'parent' => 'group-devmode-resources',
			'title'  => esc_attr__( 'WordPress Codex', 'toolbar-extras' ),
			'href'   => 'https://codex.wordpress.org/Developer_Documentation',
			'meta'   => array(
				'rel'    => ddw_tbex_meta_rel(),
				'target' => ddw_tbex_meta_target(),
				'title'  => esc_attr__( 'WordPress Codex for Developers', 'toolbar-extras' ),
			)
		)
	);

	/** Handbook: Block Editor (Gutenberg) */
	if ( ddw_tbex_is_block_editor_active() ) {

		$admin_bar->add_node(
			array(
				'id'     => 'wp-handbook-block-editor',
				'parent' => 'group-devmode-resources',
				'title'  => esc_attr__( 'Block Editor (Gutenberg) Handbook', 'toolbar-extras' ),
				'href'   => 'https://wordpress.org/gutenberg/handbook/',
				'meta'   => array(
					'rel'    => ddw_tbex_meta_rel(),
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Block Editor (Gutenberg) Handbook', 'toolbar-extras' ),
				)
			)
		);

	}  // end if

	/** Handbook: Child Theme */
	if ( is_child_theme() ) {

		$admin_bar->add_node(
			array(
				'id'     => 'wp-handbook-child-theme',
				'parent' => 'group-devmode-resources',
				'title'  => esc_attr__( 'Child Themes Handbook', 'toolbar-extras' ),
				'href'   => 'https://developer.wordpress.org/themes/advanced-topics/child-themes/',
				'meta'   => array(
					'rel'    => ddw_tbex_meta_rel(),
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Child Themes Handbook', 'toolbar-extras' ),
				)
			)
		);

	}  // end if

	/** Handbook: Rest API */
	$admin_bar->add_node(
		array(
			'id'     => 'wp-handbook-restapi',
			'parent' => 'group-devmode-resources',
			'title'  => esc_attr__( 'REST API Handbook', 'toolbar-extras' ),
			'href'   => 'https://developer.wordpress.org/rest-api/',
			'meta'   => array(
				'rel'    => ddw_tbex_meta_rel(),
				'target' => ddw_tbex_meta_target(),
				'title'  => esc_attr__( 'REST API Handbook', 'toolbar-extras' ),
			)
		)
	);

	/** StackExchange */
	$admin_bar->add_node(
		array(
			'id'     => 'stackexchange-wpdev',
			'parent' => 'group-devmode-resources',
			'title'  => esc_attr__( 'StackExchange Forum', 'toolbar-extras' ),
			'href'   => 'http://wordpress.stackexchange.com/',
			'meta'   => array(
				'rel'    => ddw_tbex_meta_rel(),
				'target' => ddw_tbex_meta_target(),
				'title'  => esc_attr__( 'WordPress Developers @ StackExchange', 'toolbar-extras' ),
			)
		)
	);

}  // end function


/**
 * Load plugin support:
 * @since 1.0.0
 * -----------------------------------------------------------------------------
 */

/**
 * Dev Add-On: Debug Elementor (free, by Rami Yushuvaev)
 * @since 1.0.0
 */
if ( class_exists( 'Debug_Elementor' ) && ddw_tbex_is_elementor_active() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-debug-elementor.php';
}


/**
 * Dev Add-On: AceIDE (free, by AceIDE)
 * @since 1.0.0
 */
if ( class_exists( '\AceIDE\Editor\IDE' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-aceide.php';
}


/**
 * Dev Add-On: Instant IDE (Premium, by Cobalt Apps)
 * @since 1.0.0
 */
if ( defined( 'IIDE_CURRENT_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-cobalt-instant-ide.php';
}


/**
 * Dev Add-On: Theme Switcha (free, by Jeff Starr)
 * @since 1.0.0
 */
if ( class_exists( 'Theme_Switcha' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-theme-switcha.php';
}


/**
 * Dev Add-On: Log Viewer (free, by Markus Fischbacher)
 * @since 1.3.2
 */
if ( in_array( 'log-viewer/log-viewer.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-log-viewer.php';
}


/**
 * Dev Add-On: Error Log Viewer (free, by BestWebSoft)
 * @since 1.4.0
 */
if ( function_exists( 'rrrlgvwr_init' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-error-log-viewer.php';
}


/**
 * Dev Add-On: Log Deprecated Notices (free, by Andrew Nacin)
 * @since 1.3.2
 */
if ( class_exists( 'Deprecated_Log' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-log-deprecated-notices.php';
}


/**
 * Dev Add-On: Transients Manager (free, by Pippin Williamson)
 * @since 1.3.8
 */
if ( class_exists( 'PW_Transients_Manager' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-transients-manager.php';
}


/**
 * Dev Add-On: WP Synchro (free, by WPSynchro)
 * @since 1.3.2
 */
if ( defined( 'WPSYNCHRO_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-wpsynchro.php';
}


/**
 * Dev Add-On: WP Migrate DB (Pro) (free/Premium, by Delicious Brains)
 * @since 1.0.0
 */
if ( function_exists( 'wp_migrate_db' ) || function_exists( 'wp_migrate_db_pro_loaded' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-wp-db-migrate.php';
}
