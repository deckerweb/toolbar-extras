<?php

// includes/items-plugins-genesis

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Plugin: Genesis Super Customizer (free, by Mario Giancini)
 * @since 1.4.0
 */
if ( class_exists( 'Geneis_Super_Customizer' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-genesis-super-customizer.php';
}


/**
 * Plugin: Genesis Design Palette Pro (Premium, by Reaktiv Studios)
 * @since 1.0.0
 */
if ( defined( 'GPP_VER' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-genesis-design-palette-pro.php';
}


/**
 * Plugin: Genesis Simple Edits (free, by StudioPress)
 * @since 1.3.7
 */
if ( class_exists( 'Genesis_Simple_Edits' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-genesis-simple-edits.php';
}


/**
 * Plugin: Genesis Footer Builder (free, by Shivanand Sharma)
 * @since 1.3.7
 */
if ( defined( 'GFB_SETTINGS_FIELD' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-genesis-footer-builder.php';
}


/**
 * Plugin: Genesis Grid (free, by Bill Erickson)
 * @since 1.3.7
 */
if ( class_exists( 'BE_Genesis_Grid' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-genesis-grid.php';
}


/**
 * Plugin: Genesis Simple Hooks (free, by StudioPress)
 * @since 1.0.0
 */
if ( class_exists( 'Genesis_Simple_Hooks' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-genesis-simple-hooks.php';
}


/**
 * Plugin: Genesis Simple Sidebars (free, by StudioPress)
 * @since 1.0.0
 */
if ( class_exists( 'Genesis_Simple_Sidebars' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-genesis-simple-sidebars.php';
}


/**
 * Plugin: Genesis Portfolio Pro (free, by StudioPress)
 * @since 1.0.0
 */
if ( function_exists( 'genesis_portfolio_init' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-genesis-portfolio-pro.php';
}


/**
 * Plugin: Genesis Author Pro (free, by StudioPress)
 * @since 1.0.0
 */
if ( function_exists( 'genesis_author_pro_init' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-genesis-author-pro.php';
}


/**
 * Plugin: Genesis Testimonial Slider (free, by Frank Schrijvers, WPStudio)
 * @since 1.0.0
 */
if ( function_exists( 'wpstudio_gts_init' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-genesis-testimonial-slider.php';
}


/**
 * Plugin: Genesis Simple FAQ (free, by StudioPress)
 * @since 1.4.0
 */
if ( class_exists( 'Genesis_Simple_FAQ' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-genesis-simple-faq.php';
}


/**
 * Plugin: Genesis Layout Extras (free, by David Decker - DECKERWEB)
 * @since 1.3.5
 */
if ( defined( 'GLE_SETTINGS_FIELD' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-genesis-layout-extras.php';
}


/**
 * Plugin: Genesis Responsive Slider (free, by StudioPress)
 * @since 1.4.2
 */
if ( defined( 'GENESIS_RESPONSIVE_SLIDER_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-genesis-responsive-slider.php';
}


/**
 * Plugin: Genesis Accessible (free, by Rian Rietveld, Robin Cornett)
 * @since 1.3.7
 */
if ( defined( 'GENWPACC_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-genesis-accessible.php';
}


/**
 * Plugin: Display Featured Image for Genesis (free, by Robin Cornett)
 * @since 1.3.0
 */
if ( defined( 'DISPLAYFEATUREDIMAGEGENESIS_BASENAME' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-display-featured-image-genesis.php';
}


/**
 * Plugin: Display Related Posts Image for Genesis (free, by SEO Themes)
 * @since 1.3.5
 */
if ( defined( 'DISPLAY_RELATED_POSTS_FOR_GENESIS_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-display-related-posts-genesis.php';
}


/**
 * Plugin: Genesis Simple Share (free, by StudioPress)
 * @since 1.4.0
 */
if ( function_exists( 'genesis_simple_share_init' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-genesis-simple-share.php';
}


/**
 * Plugin: Genesis Coming Soon Page (free, by Jose Manuel Sanchez)
 * @since 1.0.0
 */
if ( function_exists( 'gcs_genesis_init' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-genesis-coming-soon-page.php';
}


/**
 * Plugin: Genesis Widgetized Not Found & 404 (free, by David Decker - DECKERWEB)
 * @since 1.3.5
 */
if ( defined( 'GWNF_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-genesis-widgetized-notfound.php';
}


/**
 * Plugin: Genesis 404 Page (free, by Bill Erickson)
 * @since 1.0.0
 */
if ( function_exists( 'be_register_genesis_404_settings' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-genesis-404-page.php';
}


/**
 * Plugin: Genesis Extra Settings Transporter (free, by David Decker - DECKERWEB)
 * @since 1.3.9
 */
if ( defined( 'GEST_PLUGIN_BASEDIR' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-genesis-extra-settings-transporter.php';
}


/**
 * Plugin: Genesis Custom Headers (free, by Nick Diego)
 * @since 1.3.9
 */
if ( function_exists( 'gch_activation_check' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-genesis-custom-headers.php';
}


/**
 * Plugin: Easy Genesis (free, by Doug Yuen)
 * @since 1.4.0
 */
if ( function_exists( 'egwp_activation' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-easy-genesis.php';
}


/**
 * Plugin: Genesis Featured Image Header (free, by Scott DeLuzio)
 * @since 1.4.0
 */
if ( function_exists( 'gfih_load_textdomain' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-genesis-featured-image-header.php';
}


/**
 * Plugin: Blox Lite / Blox (free/Pro, by Nick Diego)
 * @since 1.0.0
 */
if ( class_exists( 'Blox_Lite_Main' ) || class_exists( 'Blox_Main' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-blox.php';
}


/**
 * Plugin: Genesis DevKit (Premium, by Cobalt Apps)
 * @since 1.1.3
 */
if ( function_exists( 'genesis_devkit_compatible_theme_check' )
) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-cobalt-genesis-devkit.php';
}


/**
 * Plugin: Genesis Extender (Premium, by Cobalt Apps)
 * @since 1.1.1
 */
if ( defined( 'GENEXT_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-cobalt-genesis-extender.php';
}
