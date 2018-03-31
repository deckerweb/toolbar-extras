<?php

// includes/items-themes

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Theme: Astra (free & Pro)
 * @since 1.0.0
 */
if ( ( 'Astra' == wp_get_theme() && defined( 'ASTRA_THEME_VERSION' ) )	// Astra w/o child theme
	|| ( 'astra' === basename( get_template_directory() ) && defined( 'ASTRA_THEME_VERSION' ) )		// Astra w/ child theme
) {

	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-astra.php' );

}  // end if


/**
 * Theme: GeneratePress (free & Premium)
 * @since 1.0.0
 */
if ( ( 'GeneratePress' == wp_get_theme() && function_exists( 'generate_setup' ) )	// GeneratePress w/o child theme
	|| ( 'generatepress' === basename( get_template_directory() ) && function_exists( 'generate_setup' ) )		// GeneratePress w/ child theme
) {

	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-generatepress.php' );

}  // end if


/**
 * Theme: OceanWP (free & Premium)
 *   NOTE: We check here against the "OceanWP Extra" (free) Add-On Plugin, as
 *         the use of OceanWP without "Extra" is complete senseless. It's a
 *         plugin dependency.
 * @since 1.0.0
 */
if ( ( 'OceanWP' == wp_get_theme() && function_exists( 'Ocean_Extra' ) )	// OceanWP w/o child theme
	|| ( 'oceanwp' === basename( get_template_directory() ) && function_exists( 'Ocean_Extra' ) )		// OceanWP w/ child theme
) {

	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-oceanwp.php' );

}  // end if


/**
 * Theme: Genesis Framework (Premium, by StudioPress/ Rainmaker Digital, LLC)
 *   NOTE: usage without Child Theme is absolutely NOT recommended, therefore not supported!
 * @since 1.0.0
 * @uses  ddw_tbex_is_genesis_active()
 */
if ( ddw_tbex_is_genesis_active() ) {

	/** Genesis Framework items: */
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-genesis.php' );


	/**
	 * Genesis Child Themes's Items:
	 * ------------------------------
	 */

	/**
	 * Mai Lifestyle (Premium, by Mike Hemberger, BizBudding Inc.)
	 * @since 1.0.0
	 */
	if ( class_exists( 'Mai_Theme_Engine' ) ) {
		
		require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-genesis-mai-lifestyle.php' );

	}  // end if

}  // end if Genesis Framework


/**
 * Themes: Default Twenty Themes (2010-2017), plus supported (third-party) Child Themes
 * @since 1.0.0
 */
if ( ddw_tbex_is_default_twenty() ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-default-twenty-themes.php' );

}  // end if


/**
 * Themes: Elementor Hello Theme (by Elementor/ Pojo Me Digital)
 * @since 1.0.0
 */
if ( 'elementor-hello-theme' == get_stylesheet() ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-official/items-elementor-hello-theme.php' );

}  // end if