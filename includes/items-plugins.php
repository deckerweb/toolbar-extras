<?php

// includes/items-plugins

/**
 * NOTE: For plugins aimed at Developers, see file "items-dev-mode.php"!
 */


/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * 1st GROUP: Active Theme and related stuff
 * @since 1.0.0
 * -----------------------------------------------------------------------------
 */

/**
 * Plugin: Central Color Palette
 * @since 1.0.0
 */
if ( class_exists( 'kt_Central_Palette' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-central-color-palette.php' );

}  // end if


/**
 * Plugin: Simple CSS (free, by Tom Usborne)
 * @since 1.0.0
 */
if ( function_exists( 'simple_css_admin_menu' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-simple-css.php' );

}  // end if


/**
 * Plugin: SiteOrigin CSS (free, by SiteOrigin)
 * @since 1.0.0
 */
if ( defined( 'SOCSS_VERSION' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-siteorigin-css.php' );

}  // end if


/**
 * Plugin: Simple Custom CSS (free, by John Regan, Danny Van Kooten)
 * @since 1.0.0
 */
if ( defined( 'SCCSS_OPTION' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-simple-custom-css.php' );

}  // end if


/**
 * Plugin: Custom CSS Pro (free, by WaspThemes)
 * @since 1.0.0
 */
if ( function_exists( 'ccp_frame_loader' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-custom-css-pro.php' );

}  // end if


/**
 * Plugin: Customizer Export Import (free, by The Beaver Builder Team)
 * @since 1.0.0
 */
if ( class_exists( 'CEI_Core' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-customizer-export-import.php' );

}  // end if


/**
 * Plugin: One Click Demo Import (free, by ProteusThemes)
 * @since 1.0.0
 */
if ( class_exists( 'OCDI_Plugin' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-oneclick-demo-import.php' );

}  // end if


/**
 * Plugin: Code Snippets (free, by Shea Bunge)
 * @since 1.0.0
 */
if ( defined( 'CODE_SNIPPETS_VERSION' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-code-snippets.php' );

}  // end if


/**
 * Plugin: Add From Server (free, by Dion Hulse)
 * @since 1.0.0
 */
if ( defined( 'ADD_FROM_SERVER_WP_REQUIREMENT' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-add-from-server.php' );

}  // end if


/**
 * Plugin: Simple Custom CSS and JS (free/Pro, by Diana Burduja)
 * @since 1.0.0
 */
if ( class_exists( 'CustomCSSandJS' ) || class_exists( 'CustomCSSandJSpro' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-simple-custom-css-js.php' );

}  // end if


/**
 * Plugin: 404page (free, by Peter Raschendorfer)
 * @since 1.0.0
 */
if ( function_exists( 'pp_404_is_active' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-404page.php' );

}  // end if


/**
 * Plugin: Genesis Design Palette Pro (Premium, by Reaktiv Studios)
 * @since 1.0.0
 */
if ( ddw_tbex_is_genesis_active() && defined( 'GPP_VER' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-genesis-design-palette-pro.php' );

}  // end if


/**
 * Plugin: Genesis Simple Hooks (free, by StudioPress)
 * @since 1.0.0
 */
if ( ddw_tbex_is_genesis_active() && class_exists( 'Genesis_Simple_Hooks' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-genesis-simple-hooks.php' );

}  // end if


/**
 * Plugin: Genesis Simple Sidebars (free, by StudioPress)
 * @since 1.0.0
 */
if ( ddw_tbex_is_genesis_active() && class_exists( 'Genesis_Simple_Sidebars' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-genesis-simple-sidebars.php' );

}  // end if


/**
 * Plugin: Genesis Portfolio Pro (free, by StudioPress)
 * @since 1.0.0
 */
if ( ddw_tbex_is_genesis_active() && function_exists( 'genesis_portfolio_init' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-genesis-portfolio-pro.php' );

}  // end if


/**
 * Plugin: Genesis Author Pro (free, by StudioPress/ copyblogger)
 * @since 1.0.0
 */
if ( ddw_tbex_is_genesis_active() && function_exists( 'genesis_author_pro_init' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-genesis-author-pro.php' );

}  // end if


/**
 * Plugin: Genesis Testimonial Slider (free, by Frank Schrijvers, WPStudio)
 * @since 1.0.0
 */
if ( ddw_tbex_is_genesis_active() && function_exists( 'wpstudio_gts_init' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-genesis-testimonial-slider.php' );

}  // end if


/**
 * Plugin: Genesis Coming Soon Page (free, by Jose Manuel Sanchez)
 * @since 1.0.0
 */
if ( ddw_tbex_is_genesis_active() && function_exists( 'gcs_genesis_init' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-genesis-coming-soon-page.php' );

}  // end if


/**
 * Plugin: Genesis 404 Page (free, by Bill Erickson)
 * @since 1.0.0
 */
if ( ddw_tbex_is_genesis_active() && function_exists( 'be_register_genesis_404_settings' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-genesis-404-page.php' );

}  // end if


/**
 * Plugin: Blox Lite / Blox (free/Pro, by Nick Diego)
 * @since 1.0.0
 */
if ( ddw_tbex_is_genesis_active() && class_exists( 'Blox_Lite_Main' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-blox.php' );

}  // end if



/**
 * 2nd GROUP: Miscellaneous stuff
 * @since 1.0.0
 * -----------------------------------------------------------------------------
 */

/**
 * Plugin: Health Check (free, by The WordPress.org community)
 * @since 1.0.0
 */
if ( class_exists( 'HealthCheck' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-health-check.php' );

}  // end if


/**
 * Dev Add-On: GitHub Updater (free, by Andy Fragen)
 * @since 1.0.0
 */
if ( in_array( 'github-updater/github-updater.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-github-updater.php' );

}  // end if


/**
 * Dev Add-On: Local Development (by Andy Fragen)
 * @since 1.0.0
 */
if ( ddw_tbex_display_items_dev_mode()
	&& ddw_tbex_in_local_environment()
	&& in_array( 'local-development/local-development.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )
) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-local-development.php' );

}  // end if


/**
 * Plugin: WooCommerce (by Automattic)
 * @since 1.0.0
 */
if ( class_exists( 'WooCommerce' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-woocommerce.php' );

}  // end if


/**
 * Plugin: Popup Maker (by WP Popup Maker & Daniel Iser)
 * @since 1.0.0
 */
if ( class_exists( 'Popup_Maker' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-popup-maker.php' );

}  // end if


/**
 * Plugin: Delightful Downloads
 * @since 1.0.0
 */
if ( class_exists( 'Delightful_Downloads' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-delightful-downloads.php' );

}  // end if


/**
 * Plugin: Download Monitor (free, by Never5)
 * @since 1.0.0
 */
if ( defined( 'DLM_VERSION' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-download-monitor.php' );

}  // end if


/**
 * Plugin: Thirsty Affiliates
 * @since 1.0.0
 */
if ( class_exists( 'ThirstyAffiliates' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-thirsty-affiliates.php' );

}  // end if


/**
 * Plugin: Simple URLs (free, by StudioPress)
 * @since 1.0.0
 */
if ( class_exists( 'SimpleURLs' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-simple-urls.php' );

}  // end if


/**
 * Plugin: Easy Digital Downloads (free)
 * @since 1.0.0
 */
if ( class_exists( 'Easy_Digital_Downloads' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-edd.php' );

}  // end if


/**
 * Plugin: Gravity Forms (Premium, by Rocketgenius, Inc.)
 * @since 1.0.0
 */
if ( defined( 'RG_CURRENT_VIEW' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-gravity-forms.php' );

}  // end if


/**
 * Plugin: Smart Slider 3 (free/Premium, by Nextend)
 * @since 1.0.0
 */
if ( defined( 'NEXTEND_SMARTSLIDER_3_BASENAME' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-smart-slider.php' );

}  // end if


/**
 * Plugin: TablePress (free, by Tobias Bäthge)
 * @since 1.0.0
 */
if ( class_exists( 'TablePress' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-tablepress.php' );

}  // end if



/**
 * Plugin: Regenerate Thumbnails (free, by Alex Mills)
 * @since 1.0.0
 */
if ( class_exists( 'RegenerateThumbnails' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-regenerate-thumbnails.php' );

}  // end if


/**
 * Plugin: Widget Importer & Exporter (free, by churchthemes.com)
 * @since 1.0.0
 */
if ( class_exists( 'Widget_Importer_Exporter' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-widget-importer-exporter.php' );

}  // end if


/**
 * Plugin: All-in-One WP Migration (free, by ServMask)
 * @since 1.0.0
 */
if ( defined( 'AI1WM_PLUGIN_BASENAME' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-aiowpm.php' );

}  // end if


/**
 * Plugin: UpdraftPlus (free, by Team Updraft, David Anderson)
 * @since 1.0.0
 */
if ( defined( 'UPDRAFTPLUS_DIR' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-updraftplus.php' );

}  // end if


/**
 * Plugin: Duplicator (free, by Snap Creek)
 * @since 1.0.0
 */
if ( defined( 'DUPLICATOR_VERSION' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-duplicator.php' );

}  // end if


/**
 * Plugin: WP-Staging (free, by WP-Staging & Rene Hermenau)
 * @since 1.0.0
 */
if ( defined( 'WPSTG_PLUGIN_DIR' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-wpstaging.php' );

}  // end if


/**
 * Plugin: Members (free, by Justin Tadlock)
 * @since 1.0.0
 */
if ( class_exists( 'Members_Plugin' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-members.php' );

}  // end if
