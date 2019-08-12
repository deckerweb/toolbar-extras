<?php

// includes/functions-conditionals-external

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * 1st GROUP: My own add-ons/ plugins:
 * @since 1.4.0
 * -----------------------------------------------------------------------------
 */

/**
 * Is the Builder Template Categories plugin active or not?
 *
 * @since 1.3.5
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_btcplugin_active() {

	return function_exists( 'ddw_btc_string_template' );

}  // end function


/**
 * Is the TBEX MainWP Add-On plugin active or not?
 *
 * @since 1.4.0
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_addon_mainwp_active() {

	return defined( 'TBEXMWP_PLUGIN_VERSION' );

}  // end function


/**
 * Is the TBEX Oxygen Add-On plugin active or not?
 *
 * @since 1.4.2
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_addon_oxygen_active() {

	return defined( 'TBEXOB_PLUGIN_VERSION' );

}  // end function


/**
 * Is the TBEX Brizy Add-On plugin active or not?
 *
 * @since 1.4.2
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_addon_brizy_active() {

	return defined( 'TBEXBZY_PLUGIN_VERSION' );

}  // end function


/**
 * Is the Multisite Toolbar Additions plugin active or not?
 *
 * @since 1.4.0
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_mstba_active() {

	return defined( 'MSTBA_PLUGIN_BASEDIR' );

}  // end function



/**
 * 2nd GROUP: Everything else:
 * @since 1.4.0
 * -----------------------------------------------------------------------------
 */

/**
 * Detect active plugin by constant, class or function existence.
 *
 * @since 1.4.4
 *
 * @param array $plugins Array of array for constants, classes and / or
 *                       functions to check for plugin existence.
 * @return bool TRUE if plugin exists or FALSE if plugin constant, class or
 *              function not detected.
 */
function ddw_tbex_detect_plugin( array $plugins ) {

	/** Check for classes */
	if ( isset( $plugins[ 'classes' ] ) ) {

		foreach ( $plugins[ 'classes' ] as $name ) {

			if ( class_exists( $name ) ) {
				return TRUE;
			}

		}  // end foreach

	}  // end if

	/** Check for functions */
	if ( isset( $plugins[ 'functions' ] ) ) {

		foreach ( $plugins[ 'functions' ] as $name ) {

			if ( function_exists( $name ) ) {
				return TRUE;
			}

		}  // end foreach

	}  // end if

	/** Check for constants */
	if ( isset( $plugins[ 'constants' ] ) ) {

		foreach ( $plugins[ 'constants' ] as $name ) {

			if ( defined( $name ) ) {
				return TRUE;
			}

		}  // end foreach

	}  // end if

	/** No class, function or constant found to exist */
	return FALSE;

}  // end function


/**
 * Is Elementor (free) plugin active or not?
 *
 * @since 1.0.0
 *
 * @return bool TRUE if Elementor is active, FALSE otherwise.
 */
function ddw_tbex_is_elementor_active() {

	return defined( 'ELEMENTOR_VERSION' );

}  // end function


/**
 * Is Elementor Pro plugin active or not?
 *
 * @since 1.0.0
 *
 * @return bool TRUE if Elementor Pro active, FALSE otherwise.
 */
function ddw_tbex_is_elementor_pro_active() {

	return defined( 'ELEMENTOR_PRO_VERSION' );

}  // end function


/**
 * Check for a specific version of Elementor Core/Pro.
 *
 * @since 1.0.0
 * @since 1.4.0 Improved security and fallback mode.
 *
 * @uses ddw_tbex_is_elementor_active()
 * @uses ddw_tbex_is_elementor_pro_active()
 *
 * @param string $type Type of Elementor, free Core or Pro Version.
 * @param string $version Version of Elementor Core/Pro to check against.
 * @param string $operator Comparison operator.
 * @return bool TRUE if the specific Elementor Core/Pro version is active, FALSE otherwise.
 */
function ddw_tbex_is_elementor_version( $type = 'core', $version = '', $operator = '' ) {

	$elementor_version = '';
	
	/** Check type for the 2 possible values */
	switch ( sanitize_key( $type ) ) {

		case 'core':
			$elementor_version = ddw_tbex_is_elementor_active() ? ELEMENTOR_VERSION : 0;
			break;

		case 'pro':
			$elementor_version = ddw_tbex_is_elementor_pro_active() ? ELEMENTOR_PRO_VERSION : 0;
			break;

	}  // end switch

	return version_compare( $elementor_version, strtolower( $version ), strtolower( $operator ) );

}  // end function


/**
 * Helper constants for determining special feature support of Elementor
 *   integration.
 * @since 1.4.0
 */
define( 'TBEX_ELEMENTOR_240', '2.4.0' );
define( 'TBEX_ELEMENTOR_240_BETA', '2.4.0-beta1' );
define( 'TBEX_ELEMENTOR_BEFORE_240', '2.3.999' );


/**
 * Is Genesis Framework plugin active or not?
 *   (A Premium theme by StudioPress/ Rainmaker Digital, LLC)
 *   NOTE: Usage of Genesis without Child Theme is absolutely NOT recommended,
 *         therefore Toolbar Extras plugin does not support that!
 *
 * @since 1.0.0
 *
 * @return bool TRUE if Genesis is active, FALSE otherwise.
 */
function ddw_tbex_is_genesis_active() {

	return ( 'genesis' === wp_basename( get_template_directory() ) && function_exists( 'genesis_html5' ) );

}  // end function


/**
 * Check if current Theme/ Child Theme is a Twenty default theme, or one of the
 *   supported (third-party) child themes.
 *
 * @since 1.0.0
 * @since 1.4.0 Added Twenty Nineteen theme.
 * @since 1.4.3 Improved general compatibility for parent/child themes.
 *
 * @return bool TRUE if current active Theme/ Child Theme is in the array of
 *              supported themes, FALSE otherwise.
 */
function ddw_tbex_is_default_twenty() {

	/** Supported official default themes */
	$supported_twenty = array(
		'twentynineteen',
		'twentyseventeen',
		'twentysixteen',
		'twentyfifteen',
		'twentyfourteen',
		'twentythirteen',
		'twentytwelve',
		'twentyeleven',
		'twentyten',
	);

	/** Supported (third-party) child themes */
	$children = array(
		'minimal-2017',
		'2016-vcready',
		'2012-vcready'
	);

	return in_array( wp_basename( get_template_directory() ), $supported_twenty );

}  // end function


/**
 * Check if current Theme/ Child Theme is a Hestia theme (by Themeisle), or one
 *   of the supported child themes.
 *
 * @since 1.1.0
 *
 * @return bool TRUE if current active Theme/ Child Theme is in the array of
 *              supported themes, FALSE otherwise.
 */
function ddw_tbex_is_theme_hestia() {

	$supported_hestia = array(

		/** Supported official Hestia themes */
		'hestia',

		/** Supported Hestia child themes */
		'tiny-hestia',
		'orfeo',
		'christmas-hestia',
	);

	return in_array( get_stylesheet(), $supported_hestia );

}  // end function


/**
 * Check if current Parent Theme belongs to the Framework Themes supported by
 *   Cobalt Apps plugins.
 *
 * @since 1.1.0
 * @since 1.4.3 Added Twenty Nineteen support to Themer Pro supported themes.
 *
 * @see Extender Pro: https://cobaltapps.com/extender-pro-supported-themes/
 * @see Themer Pro: https://cobaltapps.com/themer-pro-supported-themes/
 *
 * @param string $plugin Helper "handle" of the supported plugin to check for
 * @return bool TRUE if current active Parent Theme is in the array of
 *              supported themes, FALSE otherwise.
 */
function ddw_tbex_is_cobalt_supported_theme( $plugin = '' ) {

	$supported_frameworks = array(
		'genesis',
		'generatepress',
		'oceanwp',
		'astra',
		'bb-theme',
		'freelancer',
	);

	$supported_twenty = array(
		'twentynineteen',
		'twentyseventeen',
		'twentysixteen',
	);

	/** For: Extender Pro Plugin */
	if ( 'extender-pro' === sanitize_key( $plugin ) ) {
		return in_array( wp_basename( get_template_directory() ), $supported_frameworks );
	}

	/** For: Themer Pro Plugin */
	if ( 'themer-pro' === sanitize_key( $plugin ) ) {
		return in_array( wp_basename( get_template_directory() ), array_merge( $supported_frameworks, $supported_twenty ) );
	}

	/** Fallback "FALSE" if no supported theme active */
	return FALSE;

}  // end function


/**
 * To use the optional hook place for (general) gallery & slider plugins or not.
 *
 * @since 1.1.0
 * @since 1.4.2 Added new plugin.
 *
 * @return bool TRUE if the conditions are met, FALSE otherwise.
 */
function ddw_tbex_use_hook_place_gallery_slider() {

	if ( ( ddw_tbex_is_nextgen_gallery_active() && ddw_tbex_use_tweak_nextgen() )
		|| ( ddw_tbex_is_smartslider3_active() && ddw_tbex_use_tweak_smartslider() )
		|| ddw_tbex_is_envira_gallery_active()
		|| ddw_tbex_is_soliloquy_active()
		|| ddw_tbex_is_foogallery_active()
		|| ddw_tbex_is_maxgalleria_active()
		|| ddw_tbex_is_instagram_feed_active()
	) {

		/** Use Gallery/ Slider hook place */
		return TRUE;

	}  // end if

	return FALSE;

}  // end function


/**
 * Display item for white label setting of Astra Theme at all or not?
 *
 * @since 1.4.0
 *
 * @return bool TRUE if constant defined & false, FALSE otherwise.
 */
function ddw_tbex_hide_astra_whitelabel() {

	return defined( 'WP_ASTRA_WHITE_LABEL' ) ? WP_ASTRA_WHITE_LABEL : FALSE;

}  // end function


/**
 * Display item for white label setting of UAEL Add-On at all or not?
 *
 * @since 1.1.0
 *
 * @return bool TRUE if constant defined & false, FALSE otherwise.
 */
function ddw_tbex_hide_uael_whitelabel() {

	//return ( defined( 'WP_UAEL_WL' ) && TRUE === WP_UAEL_WL ) ? TRUE : FALSE;
	return defined( 'WP_UAEL_WL' ) ? WP_UAEL_WL : FALSE;

}  // end function


/**
 * Check if Add-On "JetThemeCore" is active or not.
 *
 * @since 1.3.0
 *
 * @return bool TRUE if class 'Jet_Theme_Core' exists, FALSE otherwise.
 */
function ddw_tbex_is_addon_jetthemecore() {

	return class_exists( 'Jet_Theme_Core' );

}  // end function


/**
 * Check if Add-On "Kava Extra" is active or not.
 *
 * @since 1.3.0
 *
 * @return bool TRUE if class 'Kava_Extra' exists, FALSE otherwise.
 */
function ddw_tbex_is_addon_kava_extra() {

	return class_exists( 'Kava_Extra' );

}  // end function


/**
 * Is the Elementor "Inspector" feature enabled or not?
 *
 * @since 1.4.0
 *
 * @return bool TRUE if feature is enabled, FALSE otherwise.
 */
function ddw_tbex_is_elementor_inspector_enabled() {

	$option = get_option( 'elementor_enable_inspector', null );

	return 'enable' === $option;

}  // end function


/**
 * Is the StylePress for Elementor plugin active or not?
 *   Note: We need at least v1.2.1 or higher.
 *
 * @since 1.4.0
 *s
 * @return bool bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_stylepress_elementor_active() {

	return ( defined( 'DTBAKER_ELEMENTOR_VERSION' ) && version_compare( DTBAKER_ELEMENTOR_VERSION, '1.2.1', '>=' ) );

}  // end function


/**
 * Is the Yoast SEO plugin active or not?
 *
 * @since 1.4.0
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_yoastseo_active() {

	return defined( 'WPSEO_VERSION' );

}  // end function


/**
 * Is the SEOPress (Pro) plugin active or not?
 *
 * @since 1.4.0
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_seopress_active() {

	return defined( 'SEOPRESS_VERSION' );

}  // end function


/**
 * Is the WooCommerce plugin active or not?
 *
 * @since 1.4.0
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_woocommerce_active() {

	return class_exists( 'WooCommerce' );

}  // end function


/**
 * Is the Easy Digital Downloads plugin active or not?
 *
 * @since 1.4.0
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_edd_active() {

	return class_exists( 'Easy_Digital_Downloads' );

}  // end function


/**
 * Is WPBakery Page Builder plugin active or not?
 *
 * @since 1.4.0
 *s
 * @return bool TRUE if WPBakery Page Builder is active and is at least
 *              version 5.0 or higher, FALSE otherwise.
 */
function ddw_tbex_is_wpbakery_active() {

	/**
	 * "Templatera" Add-On needs at least WPBakery Page Builder version 5.0 or
	 *   higher
	 */
	if ( defined( 'WPB_VC_VERSION' )
		&& version_compare( WPB_VC_VERSION, '5.0', '>=' )
	) {
		return TRUE;
	}

	return FALSE;

}  // end function


/**
 * Is the Classic Editor plugin active or not?
 *
 * @since 1.4.0
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_classic_editor_plugin_active() {

	return class_exists( 'Classic_Editor' );

}  // end function


/**
 * Is the Classic Editor Add-On plugin active or not?
 *
 * @since 1.4.0
 *
 * @return bool TRUE if Add-On plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_classic_editor_addon_active() {

	return function_exists( 'classic_editor_addon_post_init' );

}  // end function


/**
 * Is the Disable Gutenberg plugin active or not?
 *
 * @since 1.4.0
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_disable_gutenberg_active() {

	return class_exists( 'DisableGutenberg' );

}  // end function


/**
 * Is the Gutenberg Ramp plugin active or not?
 *
 * @since 1.4.0
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_gutenberg_ramp_active() {

	return class_exists( 'Gutenberg_Ramp' );

}  // end function


/**
 * Is the No Gutenberg plugin active or not?
 *
 * @since 1.4.0
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_nogutenberg_plugin_active() {

	return function_exists( 'no_gutenberg_init' );

}  // end function


/**
 * Is the Gutenberg Manager plugin active or not?
 *
 * @since 1.4.2
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_gutenberg_manager_active() {

	return function_exists( 'gm_check_gutenberg' );

}  // end function


/**
 * Is the Disable WordPress "Gutenberg" Update plugin active or not?
 *
 * @since 1.4.0
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_disable_wpgutenberg_update_active() {

	return function_exists( 'dwgu_disable_update' );

}  // end function


/**
 * Is the Custom CSS Pro plugin active or not?
 *
 * @since 1.4.0
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_custom_css_pro_active() {

	return function_exists( 'ccp_frame_loader' );

}  // end function


/**
 * Is the Easy Updates Manager plugin active or not?
 *
 * @since 1.4.0
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_easy_updates_manager_active() {

	return class_exists( 'MPSUM_Updates_Manager' );

}  // end function


/**
 * Is the Raven by Artbees plugin active or not?
 *
 * @since 1.4.2
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_artbees_raven_active() {

	return defined( 'RAVEN__FILE__' );

}  // end function


/**
 * Is the Jetpack plugin active or not?
 *
 * @since 1.4.2
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_jetpack_active() {

	return class_exists( 'Jetpack' );

}  // end function


/**
 * Is the Gravity Forms plugin active or not?
 *
 * @since 1.4.2
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_gravityforms_active() {

	return defined( 'RG_CURRENT_VIEW' );

}  // end function


/**
 * Is the Contact Form 7 (CF7) plugin active or not?
 *
 * @since 1.4.2
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_cf7_active() {

	return defined( 'WPCF7_VERSION' );

}  // end function


/**
 * Is the WPForms plugin active or not?
 *
 * @since 1.4.3
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_wpforms_active() {

	return ( class_exists( '\WPForms\WPForms' ) || class_exists( 'WPForms' ) );

}  // end function


/**
 * Is the Ninja Forms 3 plugin active or not?
 *
 * @since 1.4.3
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_ninjaforms_active() {

	return class_exists( 'Ninja_Forms' );

}  // end function


/**
 * Is the Caldera Forms plugin active or not?
 *
 * @since 1.4.4
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_calderaforms_active() {

	return defined( 'CFCORE_PATH' );

}  // end function


/**
 * Is the Give (Donations) plugin active or not?
 *
 * @since 1.4.3
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_give_active() {

	return defined( 'GIVE_VERSION' );

}  // end function


/**
 * Is the MemberPress plugin active or not?
 *
 * @since 1.4.3
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_memberpress_active() {

	return defined( 'MEPR_VERSION' );

}  // end function


/**
 * Is the AffiliateWP plugin active or not?
 *
 * @since 1.4.3
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_affiliatewp_active() {

	return class_exists( 'Affiliate_WP' );

}  // end function


/**
 * Is the BuddyPress plugin active or not?
 *
 * @since 1.4.3
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_buddypress_active() {

	return class_exists( 'BuddyPress' );

}  // end function


/**
 * Is the Events Manager plugin active or not?
 *
 * @since 1.4.3
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_events_manager_active() {

	return defined( 'EM_VERSION' );

}  // end function


/**
 * Is the NextGen Gallery plugin active or not?
 *
 * @since 1.4.3
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_nextgen_gallery_active() {

	return class_exists( 'C_NextGEN_Bootstrap' );

}  // end function


/**
 * Is the Smart Slider 3 plugin active or not?
 *
 * @since 1.4.3
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_smartslider3_active() {

	return defined( 'NEXTEND_SMARTSLIDER_3_BASENAME' );

}  // end function


/**
 * Is the Envira Gallery Lite/Pro plugin active or not?
 *
 * @since 1.4.3
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_envira_gallery_active() {

	return ( class_exists( 'Envira_Gallery_Lite' ) || class_exists( 'Envira_Gallery' ) );

}  // end function


/**
 * Is the Soliloquy Lite/Pro plugin active or not?
 *
 * @since 1.4.3
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_soliloquy_active() {

	return ( class_exists( 'Soliloquy_Lite' ) || class_exists( 'Soliloquy' ) );

}  // end function


/**
 * Is the Instagram Feed (Pro) plugin active or not?
 *
 * @since 1.4.3
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_instagram_feed_active() {

	return ( function_exists( 'display_instagram' ) || function_exists( 'sb_instagram_activate_pro' ) );

}  // end function


/**
 * Is the FooGallery plugin active or not?
 *
 * @since 1.4.3
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_foogallery_active() {

	return defined( 'FOOGALLERY_VERSION' );

}  // end function


/**
 * Is the MaxGalleria plugin active or not?
 *
 * @since 1.4.3
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbex_is_maxgalleria_active() {

	return class_exists( 'MaxGalleria' );

}  // end function


/**
 * Is the current install WordPress 5.2+ or not?
 *
 * @since 1.4.3
 *
 * @return bool TRUE if WordPress 5.2+ is active, FALSE otherwise.
 */
function ddw_tbex_is_wp52_install() {

	return version_compare( $GLOBALS[ 'wp_version' ], '5.2-beta', '>' );

}  // end function


/**
 * Is the current install ClassicPress or not?
 *
 * @since 1.4.3
 *
 * @return bool TRUE if ClassicPress is active, FALSE otherwise.
 */
function ddw_tbex_is_classicpress_install() {

	return function_exists( 'classicpress_version' );

}  // end function


/**
 * Check if Advanced Custom Fields PRO version plugin is active or not.
 *
 *   Note: We want only ACF Pro v5.7.10 or higher!
 *
 * @since 1.4.3
 *
 * @return bool TRUE if class exists, FALSE otherwise.
 */
function ddw_tbex_is_acf_pro_active() {

	return ( defined( 'ACF_PRO' ) && defined( 'ACF_VERSION' ) && version_compare( ACF_VERSION, '5.7.10', '>=' ) );

}  // end function


/**
 * Check if Advanced Custom Fields: Extended plugin is active or not.
 *
 *   Note: This depends on ACF Pro v5.7.10 or higher!
 *
 * @since 1.4.3
 *
 * @uses ddw_tbex_is_acf_pro_active()
 *
 * @return bool TRUE if class exists, FALSE otherwise.
 */
function ddw_tbex_is_acf_extended_active() {

	return ddw_tbex_is_acf_pro_active() && function_exists( 'acfe_load' );

}  // end function
