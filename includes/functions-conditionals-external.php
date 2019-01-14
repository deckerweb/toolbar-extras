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

	return ( 'genesis' === basename( get_template_directory() ) && function_exists( 'genesis_html5' ) );

}  // end function


/**
 * Check if current Theme/ Child Theme is a Twenty default theme, or one of the
 *   supported (third-party) child themes.
 *
 * @since 1.0.0
 * @since 1.4.0 Added Twenty Ninteteen theme.
 *
 * @return bool TRUE if current active Theme/ Child Theme is in the array of
 *              supported themes, FALSE otherwise.
 */
function ddw_tbex_is_default_twenty() {

	$supported_twenty = array(

		/** Supported official default themes */
		'twentynineteen',
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
		'twentyseventeen',
		'twentysixteen',
	);

	/** For: Extender Pro Plugin */
	if ( 'extender-pro' === sanitize_key( $plugin ) ) {
		return in_array( basename( get_template_directory() ), $supported_frameworks );
	}

	/** For: Themer Pro Plugin */
	if ( 'themer-pro' === sanitize_key( $plugin ) ) {
		return in_array( basename( get_template_directory() ), array_merge( $supported_frameworks, $supported_twenty ) );
	}

	/** Fallback "FALSE" if no supported theme active */
	return FALSE;

}  // end function


/**
 * To use the optional hook place for (general) gallery & slider plugins or not.
 *
 * @since 1.1.0
 *
 * @return bool TRUE if the conditions are met, FALSE otherwise.
 */
function ddw_tbex_use_hook_place_gallery_slider() {

	if ( ddw_tbex_use_tweak_nextgen()
		|| ddw_tbex_use_tweak_smartslider()
		|| ( class_exists( 'Envira_Gallery_Lite' ) || class_exists( 'Envira_Gallery' ) )
		|| ( class_exists( 'Soliloquy_Lite' ) || class_exists( 'Soliloquy' ) )
		|| defined( 'FOOGALLERY_VERSION' )
		|| class_exists( 'MaxGalleria' )
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
