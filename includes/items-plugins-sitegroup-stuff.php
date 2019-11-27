<?php

// includes/items-plugins-sitegroup-stuff

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Plugin: Members (free, by Justin Tadlock)
 * @since 1.0.0
 */
if ( class_exists( 'Members_Plugin' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-members.php';
}


/**
 * Plugin: Thrive Comments (Premium, by Thrive Themes)
 * @since 1.4.0
 */
if ( class_exists( 'Thrive_Comments' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-thrive-comments.php';
}


/**
 * Plugin: Easy Updates Manager (free, by Easy Updates Manager Team)
 * @since 1.4.0
 */
if ( ddw_tbex_is_easy_updates_manager_active() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-easy-updates-manager.php';
}


/**
 * Plugin: Site Health Manager (free, by Rami Yushuvaev)
 * @since 1.4.4
 */
if ( class_exists( 'Site_Health_Manager' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-site-health-manager.php';
}


/**
 * Plugin: Site Health Tool Manager (free, by William Earnhardt)
 * @since 1.4.4
 */
if ( function_exists( 'shtm_add_settings_page' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-site-health-tool-manager.php';
}


/**
 * Plugin: Health Check & Troubleshooting (free, by The WordPress.org community)
 * @since 1.0.0
 */
if ( ddw_tbex_is_wp52_install()
	&& ( class_exists( 'Health_Check' ) || defined( 'HEALTH_CHECK_PLUGIN_VERSION' ) )
) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-health-check.php';
}


/**
 * Plugin: WPCore Plugin Manager (free, by Stuart Starr)
 * @since 1.4.8
 */
if ( ! is_network_admin()
	&& current_user_can( 'install_plugins' )
	&& class_exists( 'WPCore' )
) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-wpcore.php';
}


/**
 * Plugin: WPMU Dev Dashboard (Premium, by WPMU DEV)
 * @since 1.3.2
 */
if ( class_exists( 'WPMUDEV_Dashboard' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-wpmudev-dashboard.php';
}


/**
 * Plugin: GitHub Updater (free, by Andy Fragen)
 * @since 1.0.0
 */
if ( in_array( 'github-updater/github-updater.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-github-updater.php';
}


/**
 * Dev Add-On: Local Development (free, by Andy Fragen)
 * @since 1.0.0
 */
if ( ddw_tbex_display_items_dev_mode()
	&& in_array( 'local-development/local-development.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )
) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-local-development.php';
}
