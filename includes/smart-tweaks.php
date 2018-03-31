<?php

// includes/smart-tweaks

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'wp_enqueue_scripts', 'ddw_tbex_tweak_frontend_toolbar_color', 10, 0 );
/**
 * Change color of the Toolbar in the frontend to the same color scheme like
 *   used in the Admin.
 *   Note: As of now only the 8 built-in Core-Themes are supported by this tweak.
 *
 * Original code by Daniel James.
 * @author  Daniel James
 * @link    https://www.danieltj.co.uk/
 * @license GNU GPL v3
 *
 * @since 1.0.0
 *
 * @uses  ddw_tbex_in_local_environment()
 * @uses  ddw_tbex_use_tweak_frontend_toolbar_color()
 */
function ddw_tbex_tweak_frontend_toolbar_color() {

	/** Bail early if conditions are not met */
	if ( ddw_tbex_in_local_environment()
		|| ! ddw_tbex_use_tweak_frontend_toolbar_color()
		|| ! is_user_logged_in()
		|| ! is_admin_bar_showing()
	) {
		return;
	}

	/** Check for current's user meta setting of Admin color scheme */
	$used_admin_theme = get_user_meta(
		get_current_user_id(),
		'admin_color',
		TRUE
	);

	/** Check if an RTL language being used */
	$css_filename = is_rtl() ? 'colors-rtl.min.css' : 'colors.min.css';

	/** Build URL of the frontend CSS file */
	$frontend_css = admin_url( 'css/colors/' . $used_admin_theme . '/' . $css_filename );

	/** Allows for the frontend CSS URL to be filtered */
	$frontend_css_url = apply_filters(
		'tbex_filter_frontend_toolbar_css',
		$frontend_css,
		$used_admin_theme
	);

	/** Register the frontend stylesheet */
	wp_register_style(
		'tbex-frontend-toolbar',
		$frontend_css_url,
		array(),
		TBEX_PLUGIN_VERSION
	);

	/** Enqueue the frontend stylesheet */
	wp_enqueue_style( 'tbex-frontend-toolbar' );

}  // end function


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_tweak_remove_items_updraftplus', 15 );
/**
 * Remove items from UpdraftPlus plugin.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_use_tweak_updraftplus()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_tweak_remove_items_updraftplus() {

	/** Bail early if tweak shouldn't be used */
	if ( ! ddw_tbex_use_tweak_updraftplus() ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'updraft_admin_node' );

}  // end function


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_tweak_remove_items_members' );
/**
 * Remove items from Members plugin.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_use_tweak_members()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_tweak_remove_items_members() {

	/** Bail early if tweak shouldn't be used */
	if ( ! ddw_tbex_use_tweak_members() ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'members-new-role' );

}  // end function


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_tweak_remove_items_apspider' );
/**
 * Remove items from Admin Page Spider (Pro Pack) plugin.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_use_tweak_adminpagespider()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_tweak_remove_items_apspider() {

	/** Bail early if tweak shouldn't be used */
	if ( ! ddw_tbex_use_tweak_adminpagespider() ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'quicklinks' );

}  // end function


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_tweak_remove_items_cobaltapps' );
/**
 * Remove items from CobaltApps plugins.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_use_tweak_cobaltapps()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_tweak_remove_items_cobaltapps() {

	/** Bail early if tweak shouldn't be used */
	if ( ! ddw_tbex_use_tweak_cobaltapps() ) {
		return;
	}

	if ( ! is_admin() ) {
		$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'cobalt-apps-wp-admin-bar' );
	}

}  // end function


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_tweak_remove_items_customize' );
/**
 * Remove Customize item in frontend view of the Toolbar.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_use_tweak_customizer()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_tweak_remove_items_customize() {

	/** Bail early if tweak shouldn't be used */
	if ( ! ddw_tbex_use_tweak_customizer() ) {
		return;
	}

	/** Remove WP logo on the top left corner */
	$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'customize' );

}  // end function


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_tweak_remove_items_wplogo' );
/**
 * Remove WP Logo item in top left corner.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_use_tweak_wplogo()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_tweak_remove_items_wplogo() {

	/** Bail early if tweak shouldn't be used */
	if ( ! ddw_tbex_use_tweak_wplogo() ) {
		return;
	}

	/** Remove WP logo on the top left corner */
	$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'wp-logo' );

}  // end function