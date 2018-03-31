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
 * @since  1.0.0
 *
 * @return bool TRUE if Host is a local host (based on known local hosts listing), otherwise FALSE.
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
		'https://127.0.0.0'
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
 * Does the current user have the permission to show Toolbar items at all?
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_display_items()
 *
 * @return bool TRUE if all permissions in place, otherwise FALSE.
 */
function ddw_tbex_show_toolbar_items() {

	/**
	 * Allows for filtering the general user role/capability to display main & sub-level items
	 *
	 * Default capability: 'manage_options' (Default cap for Elementor settings page)
	 *
	 * @since 1.0.0
	 */
	$tbex_cap_default = sanitize_key(
		apply_filters(
			'tbex_filter_capability_all',
			'manage_options'
		)
	);

	/**
	 * Required WordPress cabability to display new toolbar / admin bar entry
	 * Only showing items if toolbar / admin bar is activated and user is logged in!
	 *
	 * @since 1.0.0
	 */
	if ( ! is_user_logged_in()
		|| ! is_admin_bar_showing()
		|| ! current_user_can( $tbex_cap_default )	// allows for custom filtering the required role/capability
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
 * @since  1.0.0
 * @todo   TBEX Settings integration!
 *
 * @return bool TRUE if constant defined & true, otherwise FALSE.
 */
function ddw_tbex_display_items() {

	return ( defined( 'TBEX_DISPLAY' ) && TBEX_DISPLAY ) ? TRUE : FALSE;

}  // end function


/**
 * Display Resource items at all or not?
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_get_option()
 *
 * @return bool TRUE if setting is on 'yes', otherwise FALSE.
 */
function ddw_tbex_display_items_resources() {

	return ( 'yes' === ddw_tbex_get_option( 'general', 'display_items_resources' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Display Themes items at all or not?
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_get_option()
 *
 * @return bool TRUE if setting is on 'yes', otherwise FALSE.
 */
function ddw_tbex_display_items_themes() {

	return ( 'yes' === ddw_tbex_get_option( 'general', 'display_items_theme' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Display (general) Plugin items at all or not?
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_get_option()
 *
 * @return bool TRUE if setting is on 'yes', otherwise FALSE.
 */
function ddw_tbex_display_items_plugins() {

	return ( 'yes' === ddw_tbex_get_option( 'general', 'display_items_plugins' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Display (Elementor) Plugin Add-Ons items at all or not?
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_get_option()
 *
 * @return bool TRUE if setting is on 'yes', otherwise FALSE.
 */
function ddw_tbex_display_items_addons() {

	return ( 'yes' === ddw_tbex_get_option( 'general', 'display_items_addons' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Display New Content items at all or not?
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_get_option()
 *
 * @return bool TRUE if setting is on 'yes', otherwise FALSE.
 */
function ddw_tbex_display_items_new_content() {

	return ( 'yes' === ddw_tbex_get_option( 'general', 'display_items_new_content' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Display Site items at all or not?
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_get_option()
 *
 * @return bool TRUE if setting is on 'yes', otherwise FALSE.
 */
function ddw_tbex_display_items_site() {

	return ( 'yes' === ddw_tbex_get_option( 'general', 'display_items_site_group' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Display edit Nav Menus items at all or not?
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_get_option()
 *
 * @return bool TRUE if setting is on 'yes', otherwise FALSE.
 */
function ddw_tbex_display_items_edit_nav_menus() {

	return ( 'yes' === ddw_tbex_get_option( 'general', 'display_items_edit_menus' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Display edit Super Admin Nav Menu items at all or not?
 *
 * @since  1.0.0
 * @todo   TBEX Settings integration!
 *
 * @return bool TRUE if constant defined & true, otherwise FALSE.
 */
function ddw_tbex_display_items_super_admin_nav_menu() {

	return ( defined( 'TBEX_DISPLAY_SUPER_ADMIN_NAV_MENU' ) && TBEX_DISPLAY_SUPER_ADMIN_NAV_MENU ) ? TRUE : FALSE;

}  // end function


/**
 * Display Plugin's own settings items at all or not?
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_get_option()
 *
 * @return bool TRUE if setting is on 'yes', otherwise FALSE.
 */
function ddw_tbex_display_items_plugin_settings() {

	return ( 'yes' === ddw_tbex_get_option( 'general', 'display_items_tbex_settings' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Display optional Dev Mode items at all or not?
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_get_option()
 *
 * @return bool TRUE if setting is on 'yes', otherwise FALSE.
 */
function ddw_tbex_display_items_dev_mode() {

	//return ( defined( 'TBEX_DISPLAY_DEV_MODE' ) && TBEX_DISPLAY_DEV_MODE ) ? TRUE : FALSE;

	return ( 'yes' === ddw_tbex_get_option( 'development', 'use_dev_mode' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Display optional Demo Import items at all or not?
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_get_option()
 *
 * @return bool TRUE if setting is on 'yes', otherwise FALSE.
 */
function ddw_tbex_display_items_demo_import() {

	return ( 'yes' === ddw_tbex_get_option( 'general', 'display_items_demo_import' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Display optional Users items at all or not?
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_get_option()
 *
 * @return bool TRUE if setting is on 'yes', otherwise FALSE.
 */
function ddw_tbex_display_items_users() {

	return ( 'yes' === ddw_tbex_get_option( 'general', 'display_items_user_group' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Display optional Web Group items at all or not?
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_get_option()
 *
 * @return bool TRUE if items should be displayed, otherwise FALSE.
 */
function ddw_tbex_display_items_webgroup() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'use_web_group' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Determine whether or not we are in a Local Dev Environment.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_get_option()
 * @uses   ddw_tbex_is_localhost()
 *
 * @return bool When our constant is defined: TRUE when constant returns TRUE, otherwise FALSE.
 *              When setting is on 'auto' TRUE when ddw_tbex_is_localhost() returns TRUE, otherwise FALSE.
 *              When setting is on 'yes' TRUE, otherwise FALSE.
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

	} elseif ( ! defined( 'TBEX_IS_LOCAL_ENVIRONMENT' ) ) {

		if ( 'auto' === ddw_tbex_get_option( 'development', 'is_local_dev' ) ) {

			return ddw_tbex_is_localhost();

		} elseif ( 'yes' === ddw_tbex_get_option( 'development', 'is_local_dev' ) ) {

			return TRUE;

		} else {

			return FALSE;

		}  // end if

	}  // end if

}  // end function


/**
 * Is Elementor (free) plugin active or not?
 *
 * @since  1.0.0
 *
 * @return bool TRUE if Elementor is active, otherwise FALSE.
 */
function ddw_tbex_is_elementor_active() {

	return ( defined( 'ELEMENTOR_VERSION' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Is Elementor Pro plugin active or not?
 *
 * @since  1.0.0
 *
 * @return bool TRUE if Elementor Pro active, otherwise FALSE.
 */
function ddw_tbex_is_elementor_pro_active() {

	return ( defined( 'ELEMENTOR_PRO_VERSION' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Check for a specific version of Elementor Core/Pro.
 *
 * @since  1.0.0
 *
 * @param  string $type Type of Elementor, free Core or Pro Version.
 * @param  string $version Version of Elementor Core/Pro to check against.
 * @param  string $operator Comparison operator.
 * @return bool TRUE if the specific Elementor Core/Pro version is active, otherwise FALSE.
 */
function ddw_tbex_is_elementor_version( $type = 'core', $version = '', $operator = '' ) {

	/** Check type for the 2 possible values */
	switch ( strtolower( esc_attr( $type ) ) ) {

		case 'core':
			$elementor_version = ELEMENTOR_VERSION;
			break;

		case 'pro':
			$elementor_version = ELEMENTOR_PRO_VERSION;
			break;

	}  // end switch

	return version_compare( $elementor_version, strtolower( $version ), strtolower( $operator ) );

}  // end function


/**
 * Is Genesis Framework plugin active or not?
 *   (A Premium theme by StudioPress/ Rainmaker Digital, LLC)
 *   NOTE: Usage of Genesis without Child Theme is absolutely NOT recommended,
 *         therefore Toolbar Extras plugin does not support that!
 *
 * @since  1.0.0
 *
 * @return bool TRUE if Genesis is active, otherwise FALSE.
 */
function ddw_tbex_is_genesis_active() {

	return ( 'genesis' === basename( get_template_directory() ) && function_exists( 'genesis_html5' ) );

}  // end function


/**
 * Use smart tweaks at all or not?
 *
 * @since  1.0.0
 * @todo   TBEX Settings integration!
 *
 * @return bool TRUE if constant defined & true, otherwise FALSE.
 */
function ddw_tbex_use_smart_tweaks() {

	return ( defined( 'TBEX_USE_SMART_TWEAKS' ) && TBEX_USE_SMART_TWEAKS ) ? TRUE : FALSE;

}  // end function


/**
 * Tweak: Change frontend Toolbar color the backend color?
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), otherwise FALSE.
 */
function ddw_tbex_use_tweak_frontend_toolbar_color() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'toolbar_front_color' ) ) ? TRUE : FALSE;;

}  // end function


/**
 * Tweak: Remove WordPress Logo items from the top left corner?
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), otherwise FALSE.
 */
function ddw_tbex_use_tweak_wplogo() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'remove_wp_logo' ) ) ? TRUE : FALSE;;

}  // end function


/**
 * Tweak: Remove Customize item(s) from the top?
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), otherwise FALSE.
 */
function ddw_tbex_use_tweak_customizer() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'remove_front_customizer' ) ) ? TRUE : FALSE;;

}  // end function


/**
 * Tweak: Re-hook Gravity Forms items from the top to our Site Group or not?
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), otherwise FALSE.
 */
function ddw_tbex_use_tweak_gravityforms() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'rehook_gravityforms' ) ) ? TRUE : FALSE;;

}  // end function


/**
 * Tweak: Re-hook Smart Slider 3 items from the top to our Site Group or not?
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), otherwise FALSE.
 */
function ddw_tbex_use_tweak_smartslider() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'rehook_smartslider' ) ) ? TRUE : FALSE;;

}  // end function


/**
 * Tweak: Remove Members (Role) item from "New Content"?
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), otherwise FALSE.
 */
function ddw_tbex_use_tweak_members() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'remove_members' ) ) ? TRUE : FALSE;;

}  // end function


/**
 * Tweak: Remove UpdraftPlus items from the top?
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), otherwise FALSE.
 */
function ddw_tbex_use_tweak_updraftplus() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'remove_updraftplus' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Tweak: Remove CobaltApps items from the top?
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), otherwise FALSE.
 */
function ddw_tbex_use_tweak_cobaltapps() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'remove_cobaltapps' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Tweak: Remove Custom CSS Pro item from the top?
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), otherwise FALSE.
 */
function ddw_tbex_use_tweak_customcsspro() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'remove_customcsspro' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Tweak: Remove Admin Page Spider (Pro Pack) item from the Site Group?
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), otherwise FALSE.
 */
function ddw_tbex_use_tweak_adminpagespider() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'remove_apspider' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Tweak: Remove Multisite Toolbar Additions > Site Extend Group items from the Site Group?
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), otherwise FALSE.
 */
function ddw_tbex_use_tweak_mstba_siteextgroup() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'remove_mstba_siteextgroup' ) ) ? TRUE : FALSE;

}  // end function


/**
 * Check if current Theme/ Child Theme is a Twenty default theme, or one of the
 *   supported (third-party) child themes.
 *
 * @since  1.0.0
 *
 * @return bool TRUE if current active Theme/ Child Theme is in the array of supported themes, otherwise FALSE.
 */
function ddw_tbex_is_default_twenty() {

	$supported_twenty = array(

		/** Supported official default themes */
		'twentyseventeen',
		'twentysixteen',
		'twentyfifteen',
		'twentyfourteen',
		'twentythirteen',
		'twentytwelve',
		'twentyeleven',
		'twentyten',

		/** Supported (third-party) child themes */
		'minimal-2017',
		'2016-vcready',
		'2012-vcready'
	);

	return in_array( get_stylesheet(), $supported_twenty );

}  // end function
