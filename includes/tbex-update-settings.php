<?php

// includes/tbex-update-settings

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'plugins_loaded', 'ddw_tbex_plugin_check_version' );
/**
 * Update plugin's options to newest version.
 *
 * @since 1.1.0
 *
 * @uses  ddw_tbex_run_plugin_activation()
 */
function ddw_tbex_plugin_check_version() {

	/** Bail early if we already on plugin version 1.2.0 or higher */
	if ( version_compare( get_option( 'tbex-plugin-version' ), '1.2.0', '>=' ) ) {
		return;
	}


	/**
	 * Update new options for plugin version 1.1.0 or higher
	 *
	 * @since 1.1.0
	 */
	$smart_tweaks_v110 = array(
		'remove_aioseo'  => 'yes',
		'rehook_nextgen' => 'no',
		'rehook_ithsec'  => 'no',
	);

	$existing_tweaks = (array) get_option( 'tbex-options-tweaks' );

	if ( ! array_key_exists( 'remove_aioseo', $existing_tweaks )
		|| ! array_key_exists( 'rehook_nextgen', $existing_tweaks )
		|| ! array_key_exists( 'rehook_ithsec', $existing_tweaks )
	) {
		update_option( 'tbex-options-tweaks', array_merge( $existing_tweaks, $smart_tweaks_v110 ) );
	}


	/**
	 * Update new options for plugin version 1.2.0 or higher
	 *
	 * @since 1.2.0
	 */
	/** New general options */
	$general_options_v120 = array(
		'display_title_attributes' => 'yes',	// on by default!
	);

	$existing_general = (array) get_option( 'tbex-options-general' );

	if ( ! array_key_exists( 'display_title_attributes', $existing_general )
	) {
		update_option( 'tbex-options-general', array_merge( $existing_general, $general_options_v120 ) );
	}

	/** New smart tweaks options */
	$smart_tweaks_v120 = array(
		'remove_user_newcontent'     => 'no',
		'remove_woo_posttypes'       => 'no',
		'rehook_wprocket'            => 'no',
		'rehook_autoptimize'         => 'no',
		'rehook_swiftperformance'    => 'no',
		'unload_td_elementor'        => 'no',
		'unload_td_toolbar_extras'   => 'no',
		'remove_elementor_wpwidgets' => 'no',
	);

	$existing_tweaks = (array) get_option( 'tbex-options-tweaks' );

	if ( ! array_key_exists( 'remove_user_newcontent', $existing_tweaks )
		|| ! array_key_exists( 'remove_woo_posttypes', $existing_tweaks )
		|| ! array_key_exists( 'rehook_wprocket', $existing_tweaks )
		|| ! array_key_exists( 'rehook_autoptimize', $existing_tweaks )
		|| ! array_key_exists( 'rehook_swiftperformance', $existing_tweaks )
		|| ! array_key_exists( 'unload_td_elementor', $existing_tweaks )
		|| ! array_key_exists( 'unload_td_toolbar_extras', $existing_tweaks )
		|| ! array_key_exists( 'remove_elementor_wpwidgets', $existing_tweaks )
	) {
		update_option( 'tbex-options-tweaks', array_merge( $existing_tweaks, $smart_tweaks_v120 ) );
	}


	/**
	 * After updating all new setting options, update the version setting to the
	 *   latest version number.
	 *
	 * @since 1.1.0
	 */
	if ( TBEX_PLUGIN_VERSION !== get_option( 'tbex-plugin-version' ) ) {
		update_option( 'tbex-plugin-version', TBEX_PLUGIN_VERSION );
	}

}  // end function