<?php # -*- coding: utf-8 -*-
/**
 * Main plugin file.
 * @package           Toolbar Extras
 * @author            David Decker
 * @copyright         Copyright (c) 2012-2018, David Decker - DECKERWEB
 * @license           GPL-2.0+
 * @link              https://deckerweb.de/twitter
 *
 * @wordpress-plugin
 * Plugin Name:       Toolbar Extras
 * Plugin URI:        https://toolbarextras.com/
 * Description:       This plugins adds a lot of quick jump links to the WordPress Toolbar helpful for Site Builders who use Elementor and its ecosystem of add-ons and from the theme space.
 * Version:           1.0.0
 * Author:            David Decker - DECKERWEB
 * Author URI:        https://deckerweb.de/
 * License:           GPL-2.0+
 * License URI:       https://opensource.org/licenses/GPL-2.0
 * Text Domain:       toolbar-extras
 * Domain Path:       /languages/
 * GitHub Plugin URI: https://github.com/deckerweb/toolbar-extras
 * GitHub Branch:     master
 * Requires WP:       4.6
 * Requires PHP:      5.4
 *
 * Copyright (c) 2012-2018 David Decker - DECKERWEB
 */

/**
 * Exit if called directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Setting constants.
 *
 * @since 1.0.0
 */
/** Plugin version */
define( 'TBEX_PLUGIN_VERSION', '1.0.0' );

/** Plugin directory */
define( 'TBEX_PLUGIN_DIR', trailingslashit( dirname( __FILE__ ) ) );

/** Plugin base directory */
define( 'TBEX_PLUGIN_BASEDIR', trailingslashit( dirname( plugin_basename( __FILE__ ) ) ) );


add_action( 'plugins_loaded', 'ddw_tbex_helper_constants', 50 );
/**
 * Helper function for making our helper constants available early but also
 *    unhookable if desired...
 *
 * @since 1.0.0
 */
function ddw_tbex_helper_constants() {

	/** General (main item) */
	if ( ! defined( 'TBEX_DISPLAY' ) ) {
		define( 'TBEX_DISPLAY', TRUE );
	}


	if ( ! defined( 'TBEX_DISPLAY_SUPER_ADMIN_NAV_MENU' ) ) {
		define( 'TBEX_DISPLAY_SUPER_ADMIN_NAV_MENU', TRUE );
	}

	/** Site items: optional Dev Mode */
	if ( ! defined( 'TBEX_DISPLAY_DEV_MODE' ) ) {
		define( 'TBEX_DISPLAY_DEV_MODE', TRUE );
	}

	/** Smart Tweaks */
	if ( ! defined( 'TBEX_USE_SMART_TWEAKS' ) ) {
		define( 'TBEX_USE_SMART_TWEAKS', TRUE );
	}

}  // end function


add_action( 'init', 'ddw_tbex_load_translations', 1 );
/**
 * Load the text domain for translation of the plugin.
 *
 * @since 1.0.0
 *
 * @uses  get_locale()
 * @uses  load_textdomain() To load translations first from WP_LANG_DIR sub folder.
 * @uses  load_plugin_textdomain() To additionally load default translations from plugin folder (default).
 */
function ddw_tbex_load_translations() {

	/** Set unique textdomain string */
	$tbex_textdomain = 'toolbar-extras';

	/** The 'plugin_locale' filter is also used by default in load_plugin_textdomain() */
	$locale = apply_filters( 'plugin_locale', get_locale(), $tbex_textdomain );

	/**
	 * WordPress languages directory
	 *   Will default to: wp-content/languages/toolbar-extras/toolbar-extras-{locale}.mo
	 */
	$tbex_wp_lang_dir = trailingslashit( WP_LANG_DIR ) . trailingslashit( $tbex_textdomain ) . $tbex_textdomain . '-' . $locale . '.mo';

	/** Translations: First, look in WordPress' "languages" folder = custom & update-secure! */
	load_textdomain(
		$tbex_textdomain,
		$tbex_wp_lang_dir
	);

	/** Translations: Secondly, look in plugin's "languages" folder = default */
	load_plugin_textdomain(
		$tbex_textdomain,
		FALSE,
		TBEX_PLUGIN_BASEDIR . 'languages'
	);

}  // end function


/** Include global functions */
require_once( TBEX_PLUGIN_DIR . 'includes/functions-global.php' );

/** Include (global) conditionals functions */
require_once( TBEX_PLUGIN_DIR . 'includes/functions-conditionals.php' );

/** Load plugin combat early */
require_once( TBEX_PLUGIN_DIR . 'includes/plugin-combatibility.php' );

/** Include string functions */
require_once( TBEX_PLUGIN_DIR . 'includes/string-switcher.php' );


add_action( 'init', 'ddw_tbex_setup_plugin', 1 );
/**
 * Finally setup the plugin for the main tasks.
 *
 * @since 1.0.0
 */
function ddw_tbex_setup_plugin() {

	/** Load "Persist Admin notice Dismissals" helper class */
	if ( is_admin() ) {
		require_once( TBEX_PLUGIN_DIR . 'includes/admin/classes/persist-admin-notices-dismissal.php' );
	}
	add_action( 'admin_init', array( 'PAnD', 'init' ) );

	/** Plugin's admin settings page */
	require_once( TBEX_PLUGIN_DIR . 'includes/admin/tbex-settings.php' );

	/** Load stuff only if Toolbar display is active */
	if ( ddw_tbex_show_toolbar_items() ) {

		/** Include basic css styles (icon) */
		require_once( TBEX_PLUGIN_DIR . 'includes/toolbar-styles.php' );

		/** Include main item */
		require_once( TBEX_PLUGIN_DIR . 'includes/main-item.php' );

		/** Set toolbar groups as base hook places */
		add_action( 'admin_bar_menu', 'ddw_tbex_creative_items_base_groups', 99 );

		/** Include items for WP Site section */
		if ( ddw_tbex_display_items_site() ) {

			require_once( TBEX_PLUGIN_DIR . 'includes/items-site-group.php' );

			if ( ddw_tbex_display_items_edit_nav_menus() ) {
				require_once( TBEX_PLUGIN_DIR . 'includes/items-edit-nav-menus.php' );
			}

		}  // end if

		/** Include items for WP New Content section */
		if ( ddw_tbex_display_items_new_content() ) {
			require_once( TBEX_PLUGIN_DIR . 'includes/items-new-content.php' );
		}
		
		/** Include basic/core stuff for free Elementor plugin */
		if ( ddw_tbex_is_elementor_active() ) {
			require_once( TBEX_PLUGIN_DIR . 'includes/elementor-official/items-elementor-core.php' );
		}

		/** Conditionally load items for Elementor Pro */
		if ( ddw_tbex_is_elementor_pro_active() ) {
			require_once( TBEX_PLUGIN_DIR . 'includes/elementor-official/items-elementor-pro.php' );
		}

		/** Conditionally load items for (general) Plugins */
		if ( ddw_tbex_display_items_plugins() ) {
			require_once( TBEX_PLUGIN_DIR . 'includes/items-plugins.php' );
		}

		/** Conditionally load items for Add-On plugins */
		if ( ddw_tbex_display_items_addons() ) {
			require_once( TBEX_PLUGIN_DIR . 'includes/items-plugins-addons.php' );
		}

		/** Conditionally load items for Elementor-savvy themes */
		if ( ddw_tbex_display_items_themes() && current_user_can( 'edit_theme_options' ) ) {
			require_once( TBEX_PLUGIN_DIR . 'includes/items-themes.php' );
		}

		/** Conditionally load items of plugin's own settings & resources */
		if ( ddw_tbex_display_items_plugin_settings() ) {
			require_once( TBEX_PLUGIN_DIR . 'includes/items-tbex-plugin.php' );
		}

		/** Conditionally load items for optional Dev Mode */
		if ( ddw_tbex_display_items_dev_mode() ) {
			require_once( TBEX_PLUGIN_DIR . 'includes/items-dev-mode.php' );
		}

		/** Check for Custom Menus support */
		if ( ! current_theme_supports( 'menus' ) ) {
			add_theme_support( 'menus' );
		}

		/** Conditionally load items for smart tweaks */
		if ( ddw_tbex_use_smart_tweaks() ) {
			require_once( TBEX_PLUGIN_DIR . 'includes/smart-tweaks.php' );
		}

		/** Conditionally load stuff for local dev mode environment */
		if ( ddw_tbex_in_local_environment() ) {
			require_once( TBEX_PLUGIN_DIR . 'includes/local-dev-environment.php' );
		}

		/** Load User Group items */
		if ( ddw_tbex_display_items_users() ) {
			require_once( TBEX_PLUGIN_DIR . 'includes/items-user.php' );
		}

		/** Load Web Group items */
		if ( ddw_tbex_display_items_webgroup() ) {
			require_once( TBEX_PLUGIN_DIR . 'includes/items-web-group.php' );
		}

	}  // end if

	/** Only register & add additional toolbar menu for super admins */
	if ( ddw_tbex_display_items_super_admin_nav_menu() && is_super_admin() ) {
		require_once( TBEX_PLUGIN_DIR . 'includes/global-superadmin-menu.php' );
	}

	/** Restrict access to the above custom super admin menu */
	add_action( 'admin_menu', 'ddw_tbex_restrict_super_admin_menu_access', 1 );
		
	/** Include admin helper functions */
	if ( is_admin() ) {
		require_once( TBEX_PLUGIN_DIR . 'includes/admin/admin-extras.php' );
	}

	/** Add links to Settings and Menu pages to Plugins page */
	if ( ( is_admin() || is_network_admin() )
		&& ( current_user_can( 'edit_theme_options' ) || current_user_can( 'manage_options' ) )
	) {

		add_filter(
			'plugin_action_links_' . plugin_basename( __FILE__ ),
			'ddw_tbex_custom_settings_links'
		);

		add_filter(
			'network_admin_plugin_action_links_' . plugin_basename( __FILE__ ),
			'ddw_tbex_custom_settings_links'
		);

	}  // end if

}  // end function


/**
 * Set base groups for our Toolbar main item as "hook places".
 *   Set additional action hooks to enable custom groups.
 *
 * @since  1.0.0
 *
 * @see    ddw_tbex_setup_plugin() Hooked-in conditionally there.
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_creative_items_base_groups() {

	/** Group: Creative Content (Library, Fonts, etc.) */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-creative-content',
			'parent' => ddw_tbex_id_main_item()
		)
	);

	do_action( 'tbex_after_group_content' );

	/** Group: Active Theme (only supported ones) */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-active-theme',
			'parent' => ddw_tbex_id_main_item()
		)
	);

	do_action( 'tbex_after_group_theme' );

	/** Group: Demos import */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-demo-import',
			'parent' => ddw_tbex_id_main_item(),
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	do_action( 'tbex_after_group_demos' );

	/** Group: Page Builder Options */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-pagebuilder-options',
			'parent' => ddw_tbex_id_main_item()
		)
	);

	do_action( 'tbex_after_group_options' );

	/** Group: Page Builder Resources (Docs, Support, Community, etc.) */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-pagebuilder-resources',
			'parent' => ddw_tbex_id_main_item(),
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	do_action( 'tbex_after_group_resources' );

}  // end function


register_activation_hook( __FILE__, 'ddw_tbex_run_plugin_activation' );
/**
 * On plugin activation register the plugin's options and save their defaults.
 *
 * @since 1.0.0
 *
 * @see   includes/admin/tbex-settings.php
 *
 * @uses  ddw_tbex_register_settings_general()
 * @uses  ddw_tbex_register_settings_smart_tweaks()
 * @uses  ddw_tbex_register_settings_development()
 */
function ddw_tbex_run_plugin_activation() {

	/** Bail early if permissions are not in place */
	if ( ! current_user_can( 'activate_plugins' ) ) {
		return;
	}

	/**
	 * During run of the activation hook no other hooks and functions are
	 *   available, so we need to load them temporarily.
	 * @link https://premium.wpmudev.org/blog/activate-deactivate-uninstall-hooks/
	 */
	require_once( TBEX_PLUGIN_DIR . 'includes/admin/tbex-settings.php' );

	/** Register our settings and save the defaults */
	ddw_tbex_register_settings_general();
	ddw_tbex_register_settings_smart_tweaks();
	ddw_tbex_register_settings_development();

}  // end function
