<?php # -*- coding: utf-8 -*-
/**
 * Main plugin file.
 * @package           Toolbar Extras
 * @author            David Decker
 * @copyright         Copyright (c) 2012-2019, David Decker - DECKERWEB
 * @license           GPL-2.0-or-later
 * @link              https://deckerweb.de/twitter
 * @link              https://www.facebook.com/groups/ToolbarExtras/
 *
 * @wordpress-plugin
 * Plugin Name:       Toolbar Extras
 * Plugin URI:        https://toolbarextras.com/
 * Description:       This plugins adds a lot of quick jump links to the WordPress Toolbar helpful for Site Builders who use Elementor and its ecosystem of add-ons and from the theme space.
 * Version:           1.4.6
 * Author:            David Decker - DECKERWEB
 * Author URI:        https://toolbarextras.com/
 * License:           GPL-2.0-or-later
 * License URI:       https://opensource.org/licenses/GPL-2.0
 * Text Domain:       toolbar-extras
 * Domain Path:       /languages/
 * Requires WP:       4.7
 * Requires PHP:      5.6
 *
 * Copyright (c) 2012-2019 David Decker - DECKERWEB
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
define( 'TBEX_PLUGIN_VERSION', '1.4.6' );

/** Plugin directory */
define( 'TBEX_PLUGIN_DIR', trailingslashit( dirname( __FILE__ ) ) );

/** Plugin base directory */
define( 'TBEX_PLUGIN_BASEDIR', trailingslashit( dirname( plugin_basename( __FILE__ ) ) ) );


add_action( 'plugins_loaded', 'ddw_tbex_helper_constants', 50 );
/**
 * Helper function for making our helper constants available early but also
 *   unhookable if desired...
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

	/** Smart Tweaks */
	//if ( ! defined( 'TBEX_USE_BLOGK_EDITOR_SUPPORT' ) ) {
	//	define( 'TBEX_USE_BLOGK_EDITOR_SUPPORT', TRUE );
	//}

}  // end function


add_action( 'init', 'ddw_tbex_load_translations', 1 );
/**
 * Load the text domain for translation of the plugin.
 *
 * @since 1.0.0
 *
 * @uses get_user_locale()
 * @uses get_locale()
 * @uses load_textdomain() To load translations first from WP_LANG_DIR sub folder.
 * @uses load_plugin_textdomain() To additionally load default translations from plugin folder (default).
 */
function ddw_tbex_load_translations() {

	/** Set unique textdomain string */
	$tbex_textdomain = 'toolbar-extras';

	/** The 'plugin_locale' filter is also used by default in load_plugin_textdomain() */
	$locale = esc_attr(
		apply_filters(
			'plugin_locale',
			get_user_locale(),	//is_admin() ? get_user_locale() : get_locale(),
			$tbex_textdomain
		)
	);

	/**
	 * WordPress languages directory
	 *   Will default to: wp-content/languages/toolbar-extras/toolbar-extras-{locale}.mo
	 */
	$tbex_wp_lang_dir = trailingslashit( WP_LANG_DIR ) . trailingslashit( $tbex_textdomain ) . $tbex_textdomain . '-' . $locale . '.mo';

	/** Translations: First, look in WordPress' "languages" folder = custom & update-safe! */
	load_textdomain(
		$tbex_textdomain,
		$tbex_wp_lang_dir
	);

	/** Translations: Secondly, look in 'wp-content/languages/plugins/' for the proper .mo file (= default) */
	load_plugin_textdomain(
		$tbex_textdomain,
		FALSE,
		TBEX_PLUGIN_BASEDIR . 'languages'
	);

}  // end function


/** Include global functions */
require_once TBEX_PLUGIN_DIR . 'includes/functions-global.php';

/** Include (global) conditionals functions */
require_once TBEX_PLUGIN_DIR . 'includes/functions-conditionals.php';
require_once TBEX_PLUGIN_DIR . 'includes/functions-conditionals-external.php';
require_once TBEX_PLUGIN_DIR . 'includes/functions-conditionals-tweaks.php';

/** Load compat layer early */
require_once TBEX_PLUGIN_DIR . 'includes/compatibility/compatibility-manager.php';

/** Include string functions */
require_once TBEX_PLUGIN_DIR . 'includes/string-switcher.php';


add_action( 'init', 'ddw_tbex_setup_plugin', 1 );
/**
 * Finally setup the plugin for the main tasks.
 *
 * @since 1.0.0
 */
function ddw_tbex_setup_plugin() {

	/** Load "Persist Admin notice Dismissal" helper class */
	if ( is_admin() ) {
		include_once TBEX_PLUGIN_DIR . 'includes/admin/classes/pand/persist-admin-notices-dismissal.php';
		add_action( 'admin_init', array( 'PAnD', 'init' ) );
	}

	/** Plugin's admin settings page */
	require_once TBEX_PLUGIN_DIR . 'includes/admin/tbex-settings.php';

	/** Load stuff only if Toolbar display is active */
	if ( ddw_tbex_show_toolbar_items() ) {

		/** Include generic class */
		require_once TBEX_PLUGIN_DIR . 'includes/class-items-cpt-generic.php';

		/** Include basic css styles (icon) */
		require_once TBEX_PLUGIN_DIR . 'includes/toolbar-styles.php';

		/** Include main item (but not in Network Admin) */
		if ( ! is_network_admin() ) {
			require_once TBEX_PLUGIN_DIR . 'includes/main-item.php';
		}

		/** Set toolbar groups as base hook places */
		add_action( 'admin_bar_menu', 'ddw_tbex_creative_items_base_groups', 99 );

		/** Include items for WP Site section */
		if ( ddw_tbex_display_items_site() ) {

			require_once TBEX_PLUGIN_DIR . 'includes/items-site-group.php';

			if ( ddw_tbex_display_items_edit_nav_menus() ) {
				require_once TBEX_PLUGIN_DIR . 'includes/items-edit-nav-menus.php';
			}

		}  // end if

		/** Include items for WP New Content section */
		if ( ddw_tbex_display_items_new_content() ) {
			require_once TBEX_PLUGIN_DIR . 'includes/items-new-content.php';
		}
		
		/** Include items for WP Edit/View Content section */
		if ( ddw_tbex_display_items_edit_content() ) {
			require_once TBEX_PLUGIN_DIR . 'includes/items-edit-content.php';
		}

		/** Include items for Elementor Page Builder plugin support */
		if ( ddw_tbex_is_elementor_active() ) {

			/** Include basic/core stuff for free Elementor plugin */
			require_once TBEX_PLUGIN_DIR . 'includes/elementor-official/elementor-resources.php';
			require_once TBEX_PLUGIN_DIR . 'includes/elementor-official/items-elementor-core.php';

			/** Conditionally load items for Elementor Pro */
			if ( ddw_tbex_is_elementor_pro_active() ) {
				require_once TBEX_PLUGIN_DIR . 'includes/elementor-official/items-elementor-pro.php';
			}

		}  // end if

		/** Conditionally load items for (general) Plugins */
		if ( ddw_tbex_display_items_plugins() ) {

			/** All general Plugins */
			require_once TBEX_PLUGIN_DIR . 'includes/items-plugins.php';

			/** All Form-/ Optin-In-specific Plugins */
			require_once TBEX_PLUGIN_DIR . 'includes/items-plugins-forms.php';

			/** All Genesis-specific Plugins */
			if ( ddw_tbex_is_genesis_active() ) {
				require_once TBEX_PLUGIN_DIR . 'includes/items-plugins-genesis.php';
			}

		}  // end if

		/** Conditionally load items for Elementor-specific Add-On plugins */
		if ( ddw_tbex_display_items_addons() && ddw_tbex_is_elementor_active() ) {
			require_once TBEX_PLUGIN_DIR . 'includes/items-plugins-elementor-addons.php';
		}

		/** Conditionally load items for Page Builder-savvy themes */
		if ( ddw_tbex_display_items_themes() && current_user_can( 'edit_theme_options' ) ) {
			require_once TBEX_PLUGIN_DIR . 'includes/items-themes.php';
		}

		/** Conditionally load items of plugin's own settings & resources */
		if ( ddw_tbex_display_items_plugin_settings() ) {
			require_once TBEX_PLUGIN_DIR . 'includes/items-tbex-plugin.php';
		}

		/** Conditionally load items for optional Dev Mode */
		if ( ddw_tbex_display_items_dev_mode() ) {
			require_once TBEX_PLUGIN_DIR . 'includes/items-dev-mode.php';
		}

		/** Check for Custom Menus support */
		if ( ! current_theme_supports( 'menus' ) ) {
			add_theme_support( 'menus' );
		}

		/** Conditionally load items for smart tweaks */
		if ( ddw_tbex_use_smart_tweaks() ) {
			require_once TBEX_PLUGIN_DIR . 'includes/smart-tweaks.php';
		}

		/** Conditionally load stuff for local dev mode environment */
		if ( ddw_tbex_in_local_environment() ) {
			require_once TBEX_PLUGIN_DIR . 'includes/local-dev-environment.php';
		}

		/** Load User Group items */
		if ( ddw_tbex_display_items_users() ) {
			require_once TBEX_PLUGIN_DIR . 'includes/items-user.php';
		}

		/** Load Web Group items */
		if ( ddw_tbex_display_items_webgroup() ) {
			require_once TBEX_PLUGIN_DIR . 'includes/items-web-group.php';
		}

		/** Load Comments items */
		if ( ddw_tbex_display_items_wpcomments() ) {
			require_once TBEX_PLUGIN_DIR . 'includes/items-wpcomments.php';
		}

		/** Load Block Editor (Gutenberg) items, support, and add-ons/plugins support */
		if ( ddw_tbex_is_block_editor_active() && ddw_tbex_is_block_editor_wanted() ) {

			/** Block Editor specific items */
			if ( ddw_tbex_use_block_editor_support() ) {
				require_once TBEX_PLUGIN_DIR . 'includes/block-editor/items-block-editor.php';
			}

			/** Block Editor Add-Ons/ Plugin support */
			if ( ddw_tbex_use_block_editor_addons_support() ) {
				require_once TBEX_PLUGIN_DIR . 'includes/items-plugins-block-editor-addons.php';
			}

		}  // end if

	}  // end if ddw_tbex_show_toolbar_items() check

	/** Only register & add additional toolbar menu for super admins */
	if ( ddw_tbex_display_items_super_admin_nav_menu() && is_super_admin() ) {
		require_once TBEX_PLUGIN_DIR . 'includes/global-superadmin-menu.php';
	}

	/** Restrict access to the above custom super admin menu */
	add_action( 'admin_menu', 'ddw_tbex_restrict_super_admin_menu_access', 1 );
		
	/** Include admin helper functions */
	if ( is_admin() ) {
		require_once TBEX_PLUGIN_DIR . 'includes/admin/admin-extras.php';
		require_once TBEX_PLUGIN_DIR . 'includes/admin/admin-help.php';
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

	/** Add some more tools */
	require_once TBEX_PLUGIN_DIR . 'includes/tools/dark-mode-automatic.php';
	
}  // end function


/**
 * Set base groups for our Toolbar main item as "hook places".
 *   Set additional action hooks to enable custom groups.
 *
 * @since 1.0.0
 *
 * @see ddw_tbex_setup_plugin() Hooked-in conditionally there.
 *
 * @uses ddw_tbex_id_main_item()
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
	$pb_resources_top = has_filter( 'tbex_filter_is_addon' ) ? '' : ' tbex-no-addons-border';

	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-pagebuilder-resources',
			'parent' => ddw_tbex_id_main_item(),
			'meta'   => array( 'class' => 'ab-sub-secondary' . $pb_resources_top )
		)
	);

	do_action( 'tbex_after_group_resources' );

}  // end function


/** Include function for settings updates on version changes functions */
require_once TBEX_PLUGIN_DIR . 'includes/tbex-update-settings.php';


/**
 * Steps of the plugin activation routine.
 *
 * @since 1.0.0
 * @since 1.3.2 Moved to own function to improve reuseability.
 *
 * @see plugin file includes/admin/tbex-settings.php
 *
 * @uses ddw_tbex_register_settings_general()
 * @uses ddw_tbex_register_settings_smart_tweaks()
 * @uses ddw_tbex_register_settings_development()
 */
function ddw_tbex_plugin_activation_routine() {

	/** Bail early if permissions are not in place */
	if ( ! current_user_can( 'activate_plugins' ) ) {
		return;
	}

	/**
	 * During run of the activation hook no other hooks and functions are
	 *   available, so we need to load them temporarily.
	 * @link https://premium.wpmudev.org/blog/activate-deactivate-uninstall-hooks/
	 */
	ddw_tbex_load_translations();
	require_once TBEX_PLUGIN_DIR . 'includes/admin/tbex-settings.php';

	/** Register our settings and save the defaults */
	ddw_tbex_register_settings_general();
	ddw_tbex_register_settings_smart_tweaks();
	ddw_tbex_register_settings_development();

}  // end function


register_activation_hook( __FILE__, 'ddw_tbex_run_plugin_activation', 10, 1 );
/**
 * On plugin activation register the plugin's options and save their defaults.
 *
 * @since 1.0.0
 * @since 1.3.2 Refactored to cover Multisite Network-wide activation.
 *
 * @link https://leaves-and-love.net/blog/making-plugin-multisite-compatible/
 *
 * @uses ddw_tbex_plugin_activation_routine()
 *
 * @param bool $network_wide
 */
function ddw_tbex_run_plugin_activation( $network_wide ) {

	/** 1st case: Network-wide activation in a Multisite Network */
    if ( is_multisite() && $network_wide ) { 

    	$site_ids = get_sites( array( 'fields' => 'ids', 'network_id' => get_current_network_id() ) );

        foreach ( $site_ids as $site_id ) {

        	/** Run Site after Site */
            switch_to_blog( $site_id );

            ddw_tbex_plugin_activation_routine();

            restore_current_blog();

        }  // end foreach

    }

    /** 2nd case: Activation on a regular single site install */
    else {

        ddw_tbex_plugin_activation_routine();

    }  // end if

}  // end function


add_action( 'wpmu_new_blog', 'ddw_tbex_network_new_site_run_plugin_activation', 10, 6 );
/**
 * When creating a new Site within a Multisite Network run the plugin activation
 *   routine - if Toolbar Extras is activated Network-wide.
 *   Note: The 'wpmu_new_blog' hook fires only in Multisite.
 *
 * @since 1.3.2
 *
 * @uses ddw_tbex_plugin_activation_routine()
 *
 * @param int    $blog_id
 * @param int    $user_id
 * @param string $domain
 * @param string $path
 * @param int    $site_id
 * @param string $meta
 */
function ddw_tbex_network_new_site_run_plugin_activation( $blog_id, $user_id, $domain, $path, $site_id, $meta ) {

    if ( is_plugin_active_for_network( TBEX_PLUGIN_BASEDIR . 'toolbar-extras.php' ) ) {

        switch_to_blog( $blog_id );

        ddw_tbex_plugin_activation_routine();

        restore_current_blog();

    }  // end if

}  // end function


/**
 * Include smart tweaks functions for optionally unloading some translations.
 *   Note: This is loaded from here to keep a higher priority, beyond the setup
 *         function above.
 *
 * @since 1.2.0
 * @since 1.3.8 Refactored the feature, and relocated functions & files.
 */
require_once TBEX_PLUGIN_DIR . 'includes/smart-tweaks-translations.php';
