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
 * @since  1.0.0
 *
 * @uses   ddw_tbex_item_title_with_settings_icon()
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
 * @since  1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_devmode_file_editors() {

	if ( ! ( defined( 'DISALLOW_FILE_EDIT' ) && DISALLOW_FILE_EDIT ) ) {

		/** Group */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-wp-editors',
				'parent' => 'rapid-dev'
			)
		);

		if ( current_user_can( 'edit_themes' ) ) {

			add_filter( 'tbex_filter_is_dev_mode', '__return_empty_string' );

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'theme-editor',
					'parent' => 'group-wp-editors',
					'title'  => esc_attr__( 'Theme Editor', 'toolbar-extras' ),
					'href'   => is_multisite() ? esc_url( network_admin_url( 'theme-editor.php?file=style.css&amp;theme=' . get_stylesheet() ) ) : esc_url( admin_url( 'theme-editor.php?file=style.css&amp;theme=' . get_stylesheet() ) ),
					'meta'   => array(
						'rel'    => ddw_tbex_meta_rel(),
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Theme Editor', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		if ( current_user_can( 'edit_plugins' ) ) {

			add_filter( 'tbex_filter_is_dev_mode', '__return_empty_string' );

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'plugin-editor',
					'parent' => 'group-wp-editors',
					'title'  => esc_attr__( 'Plugin Editor', 'toolbar-extras' ),
					'href'   => is_multisite() ? esc_url( network_admin_url( 'plugin-editor.php' ) ) : esc_url( admin_url( 'plugin-editor.php' ) ),
					'meta'   => array(
						'rel'    => ddw_tbex_meta_rel(),
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Plugin Editor', 'toolbar-extras' )
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
 * @since  1.0.0
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

		if ( apply_filters( 'show_advanced_plugins', TRUE, 'mustuse' ) ) {

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

		}  // end if

		if ( apply_filters( 'show_advanced_plugins', TRUE, 'dropins' ) ) {

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

		}  // end if

	}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_devmode_resources', 999 );
/**
 * Optional resource items for Dev Mode.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_display_items_resources()
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_devmode_resources() {

	/** Bail early if resources display is disabled */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-devmode-resources',
			'parent' => 'rapid-dev',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	ddw_tbex_resource_item(
		'code-reference',
		'wp-developer-coderef',
		'group-devmode-resources',
		'https://developer.wordpress.org/reference/'
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'wp-codex-devs',
			'parent' => 'group-devmode-resources',
			'title'  => esc_attr__( 'WordPress Codex', 'toolbar-extras' ),
			'href'   => 'https://codex.wordpress.org/Developer_Documentation',
			'meta'   => array(
				'rel'    => ddw_tbex_meta_rel(),
				'target' => ddw_tbex_meta_target(),
				'title'  => esc_attr__( 'WordPress Codex for Developers', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'wp-handbook-restapi',
			'parent' => 'group-devmode-resources',
			'title'  => esc_attr__( 'REST API Handbook', 'toolbar-extras' ),
			'href'   => 'https://developer.wordpress.org/rest-api/',
			'meta'   => array(
				'rel'    => ddw_tbex_meta_rel(),
				'target' => ddw_tbex_meta_target(),
				'title'  => esc_attr__( 'REST API Handbook', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'stackexchange-wpdev',
			'parent' => 'group-devmode-resources',
			'title'  => esc_attr__( 'StackExchange Forum', 'toolbar-extras' ),
			'href'   => 'http://wordpress.stackexchange.com/',
			'meta'   => array(
				'rel'    => ddw_tbex_meta_rel(),
				'target' => ddw_tbex_meta_target(),
				'title'  => esc_attr__( 'WordPress Developers @ StackExchange', 'toolbar-extras' )
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
if ( class_exists( 'Debug_Elementor' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-debug-elementor.php' );
}


/**
 * Dev Add-On: AceIDE (free, by AceIDE)
 * @since 1.0.0
 */
if ( class_exists( '\AceIDE\Editor\IDE' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-aceide.php' );
}


/**
 * Dev Add-On: Instant IDE (Premium, by Cobalt Apps)
 * @since 1.0.0
 */
if ( defined( 'IIDE_CURRENT_VERSION' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-cobalt-instant-ide.php' );
}


/**
 * Dev Add-On: Theme Switcha (free, by Jeff Starr)
 * @since 1.0.0
 */
if ( class_exists( 'Theme_Switcha' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-theme-switcha.php' );
}


/**
 * Dev Add-On: Log Viewer (free, by Markus Fischbacher)
 * @since 1.3.2
 */
if ( in_array( 'log-viewer/log-viewer.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-log-viewer.php' );
}


/**
 * Dev Add-On: Log Deprecated Notices (free, by Andrew Nacin)
 * @since 1.3.2
 */
if ( class_exists( 'Deprecated_Log' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-log-deprecated-notices.php' );
}


/**
 * Dev Add-On: WP Synchro (free, by WPSynchro)
 * @since 1.3.2
 */
if ( defined( 'WPSYNCHRO_VERSION' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-wpsynchro.php' );
}


/**
 * Dev Add-On: WP Migrate DB (Pro) (free/Premium, by Delicious Brains)
 * @since 1.0.0
 */
if ( function_exists( 'wp_migrate_db' ) || function_exists( 'wp_migrate_db_pro_loaded' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-wp-db-migrate.php' );
}