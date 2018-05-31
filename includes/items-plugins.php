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
}


/**
 * Plugin: Simple CSS (free, by Tom Usborne)
 * @since 1.0.0
 */
if ( function_exists( 'simple_css_admin_menu' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-simple-css.php' );
}


/**
 * Plugin: SiteOrigin CSS (free, by SiteOrigin)
 * @since 1.0.0
 */
if ( defined( 'SOCSS_VERSION' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-siteorigin-css.php' );
}


/**
 * Plugin: Simple Custom CSS (free, by John Regan, Danny Van Kooten)
 * @since 1.0.0
 */
if ( defined( 'SCCSS_OPTION' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-simple-custom-css.php' );
}


/**
 * Plugin: Custom CSS Pro (free, by WaspThemes)
 * @since 1.0.0
 */
if ( function_exists( 'ccp_frame_loader' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-custom-css-pro.php' );
}


/**
 * Plugin: WP Show Posts CSS (free, by Tom Usborne)
 * @since 1.1.0
 */
if ( defined( 'WPSP_VERSION' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-wp-show-posts.php' );
}


/**
 * Plugin: Customizer Export Import (free, by The Beaver Builder Team)
 * @since 1.0.0
 */
if ( class_exists( 'CEI_Core' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-customizer-export-import.php' );
}


/**
 * Plugin: One Click Demo Import (free, by ProteusThemes)
 * @since 1.0.0
 */
if ( class_exists( 'OCDI_Plugin' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-oneclick-demo-import.php' );
}


/**
 * Plugin: Code Snippets (free, by Shea Bunge)
 * @since 1.0.0
 */
if ( defined( 'CODE_SNIPPETS_VERSION' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-code-snippets.php' );
}


/**
 * Plugin: Add From Server (free, by Dion Hulse)
 * @since 1.0.0
 */
if ( defined( 'ADD_FROM_SERVER_WP_REQUIREMENT' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-add-from-server.php' );
}


/**
 * Plugin: Simple Custom CSS and JS (free/Pro, by Diana Burduja)
 * @since 1.0.0
 */
if ( class_exists( 'CustomCSSandJS' ) || class_exists( 'CustomCSSandJSpro' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-simple-custom-css-js.php' );
}


/**
 * Plugin: 404page (free, by Peter Raschendorfer)
 * @since 1.0.0
 */
if ( function_exists( 'pp_404_is_active' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-404page.php' );
}


/**
 * Plugin: Genesis Design Palette Pro (Premium, by Reaktiv Studios)
 * @since 1.0.0
 */
if ( ddw_tbex_is_genesis_active() && defined( 'GPP_VER' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-genesis-design-palette-pro.php' );
}


/**
 * Plugin: Genesis Simple Hooks (free, by StudioPress)
 * @since 1.0.0
 */
if ( ddw_tbex_is_genesis_active() && class_exists( 'Genesis_Simple_Hooks' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-genesis-simple-hooks.php' );
}


/**
 * Plugin: Genesis Simple Sidebars (free, by StudioPress)
 * @since 1.0.0
 */
if ( ddw_tbex_is_genesis_active() && class_exists( 'Genesis_Simple_Sidebars' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-genesis-simple-sidebars.php' );
}


/**
 * Plugin: Genesis Portfolio Pro (free, by StudioPress)
 * @since 1.0.0
 */
if ( ddw_tbex_is_genesis_active() && function_exists( 'genesis_portfolio_init' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-genesis-portfolio-pro.php' );
}


/**
 * Plugin: Genesis Author Pro (free, by StudioPress/ copyblogger)
 * @since 1.0.0
 */
if ( ddw_tbex_is_genesis_active() && function_exists( 'genesis_author_pro_init' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-genesis-author-pro.php' );
}


/**
 * Plugin: Genesis Testimonial Slider (free, by Frank Schrijvers, WPStudio)
 * @since 1.0.0
 */
if ( ddw_tbex_is_genesis_active() && function_exists( 'wpstudio_gts_init' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-genesis-testimonial-slider.php' );
}


/**
 * Plugin: Testimonial Rotator (free, by Hal Gatewood)
 * @since 1.2.0
 */
if ( function_exists( 'testimonial_rotator_setup' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-testimonial-rotator.php' );
}


/**
 * Plugin: Genesis Coming Soon Page (free, by Jose Manuel Sanchez)
 * @since 1.0.0
 */
if ( ddw_tbex_is_genesis_active() && function_exists( 'gcs_genesis_init' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-genesis-coming-soon-page.php' );
}


/**
 * Plugin: Genesis 404 Page (free, by Bill Erickson)
 * @since 1.0.0
 */
if ( ddw_tbex_is_genesis_active() && function_exists( 'be_register_genesis_404_settings' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-genesis-404-page.php' );
}


/**
 * Plugin: Blox Lite / Blox (free/Pro, by Nick Diego)
 * @since 1.0.0
 */
if ( ddw_tbex_is_genesis_active() && class_exists( 'Blox_Lite_Main' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-blox.php' );
}


/**
 * Plugin: Extender Pro (Premium, by Cobalt Apps)
 * @since 1.1.0
 */
if ( ddw_tbex_is_cobalt_supported_theme( 'extender-pro' ) && function_exists( 'extender_pro_compatible_theme_check' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-cobalt-extender-pro.php' );
}


/**
 * Plugin: Themer Pro (Premium, by Cobalt Apps)
 * @since 1.1.0
 */
if ( ddw_tbex_is_cobalt_supported_theme( 'themer-pro' ) && function_exists( 'themer_pro_compatible_theme_check' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-cobalt-themer-pro.php' );
}


/**
 * Plugin: Freelancer DevKit (Premium, by Cobalt Apps)
 * @since 1.1.0
 */
if ( ( 'freelancer' === basename( get_template_directory() ) )			// check for Freelancer Parent Theme
	&& function_exists( 'freelancer_devkit_compatible_theme_check' )	// check for Freelancer DevKit Plugin
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-cobalt-freelancer-devkit.php' );
}


/**
 * Plugin: Genesis DevKit (Premium, by Cobalt Apps)
 * @since 1.1.3
 */
if ( ddw_tbex_is_genesis_active()			// check for Genesis Parent Theme
	&& function_exists( 'genesis_devkit_compatible_theme_check' )	// check for Genesis DevKit Plugin
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-cobalt-genesis-devkit.php' );
}


/**
 * Plugin: Genesis Extender (Premium, by Cobalt Apps)
 * @since 1.1.1
 */
if ( ddw_tbex_is_genesis_active() && defined( 'GENEXT_VERSION' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-cobalt-genesis-extender.php' );
}



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
}


/**
 * Dev Add-On: GitHub Updater (free, by Andy Fragen)
 * @since 1.0.0
 */
if ( in_array( 'github-updater/github-updater.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-github-updater.php' );
}


/**
 * Dev Add-On: Local Development (by Andy Fragen)
 * @since 1.0.0
 */
if ( ddw_tbex_display_items_dev_mode()
	&& ddw_tbex_in_local_environment()
	&& in_array( 'local-development/local-development.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-local-development.php' );
}


/**
 * Plugin: WooCommerce (by Automattic)
 * @since 1.0.0
 */
if ( class_exists( 'WooCommerce' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-woocommerce.php' );
}


/**
 * Plugin: Popup Maker (by WP Popup Maker & Daniel Iser)
 * @since 1.0.0
 */
if ( class_exists( 'Popup_Maker' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-popup-maker.php' );
}


/**
 * Plugin: Delightful Downloads (free, by Ashley Rich)
 * @since 1.0.0
 */
if ( class_exists( 'Delightful_Downloads' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-delightful-downloads.php' );
}


/**
 * Plugin: Download Monitor (free, by Never5)
 * @since 1.0.0
 */
if ( defined( 'DLM_VERSION' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-download-monitor.php' );
}


/**
 * Plugin: Thirsty Affiliates (free, by Rymera Web Co.)
 * @since 1.0.0
 */
if ( class_exists( 'ThirstyAffiliates' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-thirsty-affiliates.php' );
}


/**
 * Plugin: Simple URLs (free, by StudioPress)
 * @since 1.0.0
 */
if ( class_exists( 'SimpleURLs' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-simple-urls.php' );
}


/**
 * Plugin: Easy Digital Downloads (free)
 * @since 1.0.0
 */
if ( class_exists( 'Easy_Digital_Downloads' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-edd.php' );
}


/**
 * Plugin: Gravity Forms (Premium, by Rocketgenius, Inc.)
 * @since 1.0.0
 */
if ( defined( 'RG_CURRENT_VIEW' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-gravity-forms.php' );
}


/**
 * Plugin: Smart Slider 3 (free/Premium, by Nextend)
 * @since 1.0.0
 */
if ( defined( 'NEXTEND_SMARTSLIDER_3_BASENAME' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-smart-slider.php' );
}


/**
 * Plugin: TablePress (free, by Tobias Bäthge)
 * @since 1.0.0
 */
if ( class_exists( 'TablePress' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-tablepress.php' );
}


/**
 * Plugin: Envira Gallery Lite/Pro (free/Premium, by Envira Gallery Team)
 * @since 1.1.0
 */
if ( class_exists( 'Envira_Gallery_Lite' ) || class_exists( 'Envira_Gallery' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-envira-gallery.php' );
}


/**
 * Plugin: Soliloquy Sliders Lite/Pro (free/Premium, by Soliloquy Team)
 * @since 1.1.0
 */
if ( class_exists( 'Soliloquy_Lite' ) || class_exists( 'Soliloquy' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-soliloquy-sliders.php' );
}


/**
 * Plugin: FooGallery (free, by FooPlugins)
 * @since 1.1.0
 */
if ( defined( 'FOOGALLERY_VERSION' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-foogallery.php' );
}


/**
 * Plugin: MaxGalleria (free, by Max Foundry)
 * @since 1.1.0
 */
if ( class_exists( 'MaxGalleria' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-maxgalleria.php' );
}


/**
 * Plugin: Cherry Testimonials (free, by Zemez)
 * @since 1.1.0
 */
if ( class_exists( 'TM_Testimonials_Plugin' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-cherry-testimonials.php' );
}


/**
 * Plugin: Cherry Team Members (free, by Zemez)
 * @since 1.1.0
 */
if ( class_exists( 'Cherry_Team_Members' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-cherry-team-members.php' );
}


/**
 * Plugin: Cherry Services List (free, by Zemez)
 * @since 1.1.0
 */
if ( class_exists( 'Cherry_Services_List' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-cherry-services-list.php' );
}


/**
 * Plugin: Cherry Projects (free, by Zemez)
 * @since 1.1.0
 */
if ( class_exists( 'Cherry_Projects' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-cherry-projects.php' );
}


/**
 * Plugin: TM Timline (free, by Jetimpex/ Zemez)
 * @since 1.2.0
 */
if ( defined( 'TM_TIMELINE_VERSION' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-tm-timeline.php' );
}



/**
 * Plugin: Regenerate Thumbnails (free, by Alex Mills)
 * @since 1.0.0
 */
if ( class_exists( 'RegenerateThumbnails' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-regenerate-thumbnails.php' );
}


/**
 * Plugin: Lightweight Sidebar Manager (free, by Brainstorm Force)
 * @since 1.2.0
 */
if ( defined( 'BSF_SB_POST_TYPE' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-bsf-sidebar-manager.php' );
}


/**
 * Plugin: Widget Options (free/Premium, by Phpbits Creative Studio)
 * @since 1.2.0
 */
if ( class_exists( 'WP_Widget_Options' ) ) {		// same class for free + Pro!
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-widget-options.php' );
}


/**
 * Plugin: Widget Importer & Exporter (free, by churchthemes.com)
 * @since 1.0.0
 */
if ( class_exists( 'Widget_Importer_Exporter' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-widget-importer-exporter.php' );
}


/**
 * Plugin: All-in-One WP Migration (free, by ServMask)
 * @since 1.0.0
 */
if ( defined( 'AI1WM_PLUGIN_BASENAME' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-aiowpm.php' );
}


/**
 * Plugin: UpdraftPlus (free, by Team Updraft, David Anderson)
 * @since 1.0.0
 */
if ( defined( 'UPDRAFTPLUS_DIR' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-updraftplus.php' );
}


/**
 * Plugin: Duplicator (free, by Snap Creek)
 * @since 1.0.0
 */
if ( defined( 'DUPLICATOR_VERSION' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-duplicator.php' );
}


/**
 * Plugin: WP-Staging (free, by WP-Staging & Rene Hermenau)
 * @since 1.0.0
 */
if ( defined( 'WPSTG_PLUGIN_DIR' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-wpstaging.php' );
}


/**
 * Plugin: Members (free, by Justin Tadlock)
 * @since 1.0.0
 */
if ( class_exists( 'Members_Plugin' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-members.php' );
}


/**
 * Plugin: OptinMonster API (free/Premium, by OptinMonster Team/ Retyp, LLC)
 * @since 1.2.0
 */
if ( class_exists( 'OMAPI' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-optinmonster.php' );
}


/**
 * Plugin: Convert Pro (Premium, by Brainstorm Force)
 * @since 1.2.0
 */
if ( function_exists( 'cp_load_convertpro' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-convertpro.php' );
}


/**
 * Plugin: Convert Plus (Premium, by Brainstorm Force)
 * @since 1.2.0
 */
if ( class_exists( 'Convert_Plug' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-convertplus.php' );
}