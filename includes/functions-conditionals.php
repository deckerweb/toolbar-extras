<?php

// includes/functions-conditionals

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if we are on localhost. Uses an (filterable) array of common localhost
 *   server names/ IP addresses as well as domain name checks (for '.local').
 *
 * @since 1.0.0
 *
 * @return bool TRUE if Host is a local host (based on known local hosts
 *              listing), FALSE otherwise.
 */
function ddw_tbex_is_localhost() {

	/** Array of known local hosts */
	$known_local_hosts = array(
		'localhost',
		'127.0.0.1',
		'127.0.0.0',
		'::1',
		'http://localhost',
		'https://localhost',
		'http://127.0.0.1',
		'https://127.0.0.1',
		'http://127.0.0.0',
		'https://127.0.0.0',
		'http://::1',
		'https://::1',
	);

	$known_local_hosts = array_map( 'esc_attr', $known_local_hosts );

	/** Set local state */
	$is_local = FALSE;

	$server_name = strtolower( sanitize_text_field( $_SERVER[ 'SERVER_NAME' ] ) );

	/** Check server environment */
	if ( in_array( esc_url( $_SERVER[ 'REMOTE_ADDR' ] ), $known_local_hosts )
		|| ( strpos( $server_name, '.local' ) !== FALSE )
		|| ( strpos( $server_name, 'localhost' ) !== FALSE )
	) {

		$is_local = TRUE;

	} else {

		$is_local = FALSE;

	}  // end if

	/** Finally, return the local state */
	return $is_local;

}  // end function


/**
 * Allows for filtering the general user role/capability to display main
 *   & sub-level items
 *   Default capability: 'manage_options' (Default cap for Elementor
 *   settings page).
 *
 * @since 1.0.0
 * @since 1.4.0 Moved into own function for reusability.
 *
 * @return string Filterable capability ID.
 */
function ddw_tbex_capability_show_all() {

	return sanitize_key(
		apply_filters(
			'tbex_filter_capability_all',
			'manage_options'
		)
	);

}  // end function


/**
 * Does the current user have the permission to show Toolbar items at all?
 *
 * @since 1.0.0
 * @since 1.4.0 Moved capability setup & filter into own function.
 *
 * @uses ddw_tbex_capability_show_all()
 * @uses ddw_tbex_display_items()
 *
 * @return bool TRUE if all permissions in place, FALSE otherwise.
 */
function ddw_tbex_show_toolbar_items() {

	/**
	 * Required WordPress capability to display new toolbar / admin bar entry
	 *   Only showing items if toolbar / admin bar is activated and user is
	 *   logged in!
	 * @since 1.0.0
	 */
	if ( ! is_user_logged_in()
		|| ! is_admin_bar_showing()
		|| ! current_user_can( ddw_tbex_capability_show_all() )	// allows for custom filtering the required role/capability
		|| ! ddw_tbex_display_items()	// allows for custom disabling
	) {

		$show_toolbar_items = FALSE;

	} else {

		$show_toolbar_items = TRUE;

	}  // end if

	return $show_toolbar_items;

}  // end function


/**
 * Display items at all or not?
 *   (Allows for custom disabling)
 *
 * @since 1.0.0
 * @todo TBEX Settings integration!
 *
 * @return bool TRUE if constant defined & true, FALSE otherwise.
 */
function ddw_tbex_display_items() {

	return ( defined( 'TBEX_DISPLAY' ) && TBEX_DISPLAY ) ? TRUE : FALSE;

}  // end function


/**
 * Display Resource items at all or not?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if setting is on 'yes', FALSE otherwise.
 */
function ddw_tbex_display_items_resources() {

	return ( 'yes' === ddw_tbex_get_option( 'general', 'display_items_resources' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Display Themes items at all or not?
 *
 * @since 1.0.0
 * @since 1.4.2 Added filter shortcut for custom disabling.
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if setting is on 'yes', FALSE otherwise.
 */
function ddw_tbex_display_items_themes() {

	if ( ! apply_filters( 'tbex_filter_display_items_themes', TRUE ) ) {
		return FALSE;
	}

	return ( 'yes' === ddw_tbex_get_option( 'general', 'display_items_theme' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Display (general) Plugin items at all or not?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if setting is on 'yes', FALSE otherwise.
 */
function ddw_tbex_display_items_plugins() {

	return ( 'yes' === ddw_tbex_get_option( 'general', 'display_items_plugins' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Display (Elementor) Plugin Add-Ons items at all or not?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if setting is on 'yes', FALSE otherwise.
 */
function ddw_tbex_display_items_addons() {

	return ( 'yes' === ddw_tbex_get_option( 'general', 'display_items_addons' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Display New Content items at all or not?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if setting is on 'yes', FALSE otherwise.
 */
function ddw_tbex_display_items_new_content() {

	return ( 'yes' === ddw_tbex_get_option( 'general', 'display_items_new_content' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Display Site items at all or not?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if setting is on 'yes', FALSE otherwise.
 */
function ddw_tbex_display_items_site() {

	return ( 'yes' === ddw_tbex_get_option( 'general', 'display_items_site_group' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Display items for edit/ view Post Type singular at all or not?
 *
 * @since 1.3.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if setting is on 'yes', FALSE otherwise.
 */
function ddw_tbex_display_items_edit_content() {

	return ( 'yes' === ddw_tbex_get_option( 'general', 'display_items_edit_content' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Display edit Nav Menus items at all or not?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if setting is on 'yes', FALSE otherwise.
 */
function ddw_tbex_display_items_edit_nav_menus() {

	return ( 'yes' === ddw_tbex_get_option( 'general', 'display_items_edit_menus' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Display edit Super Admin Nav Menu items at all or not?
 *
 * @since 1.0.0
 * @todo TBEX Settings integration!
 *
 * @return bool TRUE if constant defined & true, FALSE otherwise.
 */
function ddw_tbex_display_items_super_admin_nav_menu() {

	return ( defined( 'TBEX_DISPLAY_SUPER_ADMIN_NAV_MENU' ) && TBEX_DISPLAY_SUPER_ADMIN_NAV_MENU ) ? TRUE : FALSE;

}  // end function


/**
 * Display Plugin's own settings items at all or not?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if setting is on 'yes', FALSE otherwise.
 */
function ddw_tbex_display_items_plugin_settings() {

	return ( 'yes' === ddw_tbex_get_option( 'general', 'display_items_tbex_settings' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Display link title attributes (Tooltips) in the Toolbar at all or not?
 *   Note: 'yes' is the default setting!
 *
 * @since 1.2.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if setting is on 'yes', FALSE otherwise.
 */
function ddw_tbex_display_link_title_attributes() {

	return ( 'yes' === ddw_tbex_get_option( 'general', 'display_title_attributes' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Display optional Dev Mode items at all or not?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if setting is on 'yes', FALSE otherwise.
 */
function ddw_tbex_display_items_dev_mode() {

	//return ( defined( 'TBEX_DISPLAY_DEV_MODE' ) && TBEX_DISPLAY_DEV_MODE ) ? TRUE : FALSE;

	return ( 'yes' === ddw_tbex_get_option( 'development', 'use_dev_mode' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Display optional Demo Import items at all or not?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if setting is on 'yes', FALSE otherwise.
 */
function ddw_tbex_display_items_demo_import() {

	return ( 'yes' === ddw_tbex_get_option( 'general', 'display_items_demo_import' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Display optional Users items at all or not?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if setting is on 'yes', FALSE otherwise.
 */
function ddw_tbex_display_items_users() {

	return ( 'yes' === ddw_tbex_get_option( 'general', 'display_items_user_group' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Display optional Web Group items at all or not?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if items should be displayed, FALSE otherwise.
 */
function ddw_tbex_display_items_webgroup() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'use_web_group' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Display optional WP Comments items at all or not?
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if items should be displayed, FALSE otherwise.
 */
function ddw_tbex_display_items_wpcomments() {

	return ( 'yes' === ddw_tbex_get_option( 'general', 'display_items_wpcomments' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Determine whether or not we are in a Local Dev Environment.
 *
 * @since 1.0.0
 * @since 1.4.2 Added support for WP_LOCAL_DEV constant.
 *
 * @uses ddw_tbex_get_option()
 * @uses ddw_tbex_is_localhost()
 *
 * @return bool When our constant is defined: TRUE when constant returns TRUE,
 *              otherwise FALSE.
 *              When setting is on 'auto' TRUE when ddw_tbex_is_localhost()
 *              returns TRUE, FALSE otherwise.
 *              When setting is on 'yes' TRUE, FALSE otherwise.
 */
function ddw_tbex_in_local_environment() {

	if ( defined( 'TBEX_IS_LOCAL_ENVIRONMENT' )
		&& ( FALSE === TBEX_IS_LOCAL_ENVIRONMENT )
	) {

		return FALSE;

	} elseif ( defined( 'TBEX_IS_LOCAL_ENVIRONMENT' )
		&& ( TRUE === TBEX_IS_LOCAL_ENVIRONMENT )
	) {

		return TRUE;

	} elseif ( defined( 'WP_LOCAL_DEV' )
		&& ( FALSE === WP_LOCAL_DEV )
	) {

		return FALSE;

	} elseif ( defined( 'WP_LOCAL_DEV' )
		&& ( TRUE === WP_LOCAL_DEV )
	) {

		return TRUE;

	} elseif ( ! defined( 'TBEX_IS_LOCAL_ENVIRONMENT' )
		|| ! defined( 'WP_LOCAL_DEV' )
	) {

		if ( 'auto' === ddw_tbex_get_option( 'development', 'is_local_dev' ) ) {

			return ddw_tbex_is_localhost();

		} elseif ( 'yes' === ddw_tbex_get_option( 'development', 'is_local_dev' ) ) {

			return TRUE;

		} else {

			return FALSE;

		}  // end if

	}  // end if

    return FALSE;

}  // end function


/**
 * Use smart tweaks at all or not?
 *
 * @since 1.0.0
 * @todo (Maybe enhanced TBEX Settings integration?)
 *
 * @return bool TRUE if constant defined & true, FALSE otherwise.
 */
function ddw_tbex_use_smart_tweaks() {

	//return ( defined( 'TBEX_USE_SMART_TWEAKS' ) && TBEX_USE_SMART_TWEAKS ) ? TRUE : FALSE;
	return defined( 'TBEX_USE_SMART_TWEAKS' ) ? TBEX_USE_SMART_TWEAKS : FALSE;

}  // end function


/**
 * Use Block Editor support at all or not?
 *
 * @since 1.3.2
 * @since 1.4.0 Added settings integration.
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool Defined constant has higher priority than the settings.
 *              In either way: if set to TRUE/yes return TRUE, FALSE otherwise.
 */
function ddw_tbex_use_block_editor_support() {

	//return ( defined( 'TBEX_USE_BLOGK_EDITOR_SUPPORT' ) ) ? TBEX_USE_BLOGK_EDITOR_SUPPORT : FALSE;

	if ( defined( 'TBEX_USE_BLOGK_EDITOR_SUPPORT' ) ) {
		return (bool) TBEX_USE_BLOGK_EDITOR_SUPPORT;
	}

	return ( 'yes' === ddw_tbex_get_option( 'general', 'use_blockeditor_support' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Enable Add-Ons/ Plugins support for Block Editor (Gutenberg) at all or not?
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool By default TRUE (= support enabled). Only if Block Editor
 *              Add-Ons support is explicitely disabled then FALSE.
 */
function ddw_tbex_use_block_editor_addons_support() {

	return ( 'yes' === ddw_tbex_get_option( 'general', 'display_blockeditor_addons' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Check if the "Block Editor" is available or not. This can currently mean:
 *   1) WordPress is in version 5.0.0+ (will contain Block Editor by default)
 *   2) or, the "Gutenberg" plugin is active (it is the Blocks Editor)
 *
 * @since 1.3.2
 *
 * @global string $GLOBALS[ 'wp_version' ] 
 * @return bool TRUE if Block Editor available, FALSE otherwise.
 */
function ddw_tbex_is_block_editor_active() {

	//return ( defined( 'GUTENBERG_VERSION' ) ) ? TRUE : FALSE;

	if ( version_compare( $GLOBALS[ 'wp_version' ], '5.0.0', '>=' )
		|| defined( 'GUTENBERG_VERSION' )
	) {
		return TRUE;
	}

	return FALSE;

}  // end if


/**
 * When Block Editor is active, check if any external plugin is deactiving the
 *   Block Editor.
 *
 * @since 1.4.0
 * @since 1.4.2 Further enhancements and tweaks.
 *
 * @uses ddw_tbex_is_block_editor_active()
 * @uses ddw_tbex_is_classic_editor_plugin_active()
 * @uses ddw_tbex_is_classic_editor_addon_active()
 * @uses ddw_tbex_is_disable_gutenberg_active()
 * @uses ddw_tbex_is_gutenberg_ramp_active()
 * @uses ddw_tbex_is_nogutenberg_plugin_active()
 * @uses ddw_tbex_is_disable_wpgutenberg_update_active()
 * @uses ddw_tbex_is_gutenberg_manager_active()
 *
 * @return bool TRUE if certain popular plugins are NOT globally disabling the
 *              Block Editor.
 */
function ddw_tbex_is_block_editor_wanted() {

	/** Bail early if Block Editor isn't active at all */
	if ( ! ddw_tbex_is_block_editor_active() ) {
		return FALSE;
	}

	/**
	 * For: "Classic Editor Add-On" plugin (it deactivates Block Editor
	 *   completely, automatically).
	 *   FALSE when plugin is active.
	 */
	if ( ddw_tbex_is_classic_editor_addon_active() ) {
		return FALSE;
	}

	/**
	 * For: "No Gutenberg" plugin (deactivates Block Editor completely).
	 *   FALSE when plugin is active.
	 */
	if ( ddw_tbex_is_nogutenberg_plugin_active() ) {
		return FALSE;
	}

	/**
	 * For: "Disable WordPress 'Gutenberg' Update" plugin (keeps WordPress on
	 *   the legacy 4.9 branch - no updates to 5.0+).
	 *   FALSE when plugin is active.
	 */
	if ( ddw_tbex_is_disable_wpgutenberg_update_active() ) {
		return FALSE;
	}

	/**
	 * For: "Classic Editor" plugin (there are various options we need to check).
	 *   FALSE when "Classic Editor" is set and users cannot change editor.
	 */
	$classic_type = get_option( 'classic-editor-replace' );
	$classic_user = get_option( 'classic-editor-allow-users' );

	if ( ddw_tbex_is_classic_editor_plugin_active()
		&& ( isset( $classic_type ) && 'classic' === $classic_type )
		&& ( isset( $classic_user ) && 'disallow' === $classic_user )
	) {
		return FALSE;
	}

	/**
	 * For: "Disable Gutenberg" plugin (there are various options we need to
	 *   check).
	 *   FALSE when option 'disable for all' is set.
	 */
	$g7g_options = get_option( 'disable_gutenberg_options', 'default_disabled_all_not_saved' );

	if ( ddw_tbex_is_disable_gutenberg_active()
		&& (
			( 'default_disabled_all_not_saved' === $g7g_options )
			|| ( isset( $g7g_options[ 'disable-all' ] ) && 1 === $g7g_options[ 'disable-all' ] )
		)
	) {
		return FALSE;
	}

	/**
	 * For: "Gutenberg Ramp" plugin (there are various options we need to check).
	 */
	if ( ddw_tbex_is_gutenberg_ramp_active() ) {

		$gutenberg_ramp = Gutenberg_Ramp::get_instance();
		$gbramp_types   = get_option( 'gutenberg_ramp_post_types' );

		/**
		 * FALSE when no $criteria set & no post types in settings are set
		 */
		if ( FALSE === $gutenberg_ramp->active && empty( $gbramp_types ) ) {
			return FALSE;
		}

	}  // end if

	/**
	 * For: "Gutenberg Manager" plugin.
	 */
	if ( ddw_tbex_is_gutenberg_manager_active() ) {

		$gb_manager = get_option( 'gm-global-disable' );

		/**
		 * FALSE when option is set to global disable Gutenberg
		 */
		if ( 1 === absint( $gb_manager ) ) {
			return FALSE;
		}

	}  // end if

	/** For: Default - TRUE */
	return TRUE;

}  // end function


/**
 * When Block Editor is active check if "editor switching" options for users -
 *   provided by certain plugins - are active.
 *   Currently supported plugins:
 *   - Classic Editor
 *   - Disable Gutenberg
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_is_block_editor_active()
 * @uses ddw_tbex_is_classic_editor_plugin_active()
 * @uses ddw_tbex_is_disable_gutenberg_active()
 *
 * @return bool TRUE when "editor switching" or "editor links" are enabled,
 *              FALSE otherwise.
 */
function ddw_tbex_is_block_editor_user_switch() {

	/** Bail early if Block Editor isn't active at all */
	if ( ! ddw_tbex_is_block_editor_active() ) {
		return FALSE;
	}

	/** Get plugin options */
	$classic_user = get_option( 'classic-editor-allow-users' );
	$g7g_options  = get_option( 'disable_gutenberg_options' );

	/** According to plugin settings return TRUE */
	if ( ( ddw_tbex_is_classic_editor_plugin_active() && ( isset( $classic_user ) && 'allow' === $classic_user ) )
		|| ( ddw_tbex_is_disable_gutenberg_active() && ( isset( $g7g_options[ 'links-enable' ] ) && 1 === $g7g_options[ 'links-enable' ] ) )
	) {
		return TRUE;
	}

	/** By default, return FALSE */
	return FALSE;

}  // end function


/**
 * Set filterable capability for unloading translations.
 *   Default is: 'manage_options' (Administrator)
 *
 * @since 1.3.9
 *
 * @return string String ID of capability.
 */
function ddw_tbex_capability_unloading_translations() {

	return sanitize_key(
		apply_filters(
			'tbex_filter_capability_unloading_translations',
			'manage_options'
		)
	);

}  // end function


/**
 * Conditional helper function to check if unloading of translations is allowed:
 *   - current user is logged in
 *
 * @since 1.3.9
 *
 * @uses ddw_tbex_capability_unloading_translations()
 *
 * @return bool TRUE if current user is logged in and the capability is met,
 *              FALSE otherwise.
 */
function ddw_tbex_is_translations_unloading_allowed() {

	return is_user_logged_in() && current_user_can( ddw_tbex_capability_unloading_translations() );

}  // end function


/**
 * Enable element IDs at all or not? (Post type singulars/tax/archive pages)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if items display wanted, FALSE otherwise.
 */
function ddw_tbex_use_devmode_element_ids() {

	return ( 'yes' === ddw_tbex_get_option( 'development', 'use_element_ids' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Use additional Plugin/Theme uploader sub menus in left-hand Admin menu at all
 *   or not?
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if items display wanted, FALSE otherwise.
 */
function ddw_tbex_use_devmode_uploader_menus() {

	return ( 'yes' === ddw_tbex_get_option( 'development', 'use_uploader_menus' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Check for various conditions (admin screens etc.) if the display of Admin
 *   Notice for plugin review is allowed/ wanted.
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_capability_show_all()
 *
 * @param object $current_screen This global (via get_current_screen()) holds
 *                               the current screen object.
 * @return bool If current screen matches the conditions return TRUE, FALSE
 *              otherwise.
 */
function ddw_tbex_is_notice_review_allowed( $current_screen ) {

	$needle_mainwp = 'mainwp';

	/** For specific cases & admin screens don't show the notice */
	if (
		! current_user_can( ddw_tbex_capability_show_all() )
		|| ( 'edit' == $current_screen->base || 'post' == $current_screen->base || 'post-new' == $current_screen->base )
		|| is_network_admin()
		|| ( strpos( $needle_mainwp, $current_screen->base ) !== FALSE )
	) {
		return FALSE;
	}

	/** By default let return TRUE (notice will appear) */
	return TRUE;

}  // end function
