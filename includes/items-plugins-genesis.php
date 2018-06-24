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
 * Plugin: Genesis Design Palette Pro (Premium, by Reaktiv Studios)
 * @since 1.0.0
 */
if ( defined( 'GPP_VER' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-genesis-design-palette-pro.php' );
}


/**
 * Plugin: Genesis Simple Hooks (free, by StudioPress)
 * @since 1.0.0
 */
if ( class_exists( 'Genesis_Simple_Hooks' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-genesis-simple-hooks.php' );
}


/**
 * Plugin: Genesis Simple Sidebars (free, by StudioPress)
 * @since 1.0.0
 */
if ( class_exists( 'Genesis_Simple_Sidebars' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-genesis-simple-sidebars.php' );
}


/**
 * Plugin: Genesis Portfolio Pro (free, by StudioPress)
 * @since 1.0.0
 */
if ( function_exists( 'genesis_portfolio_init' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-genesis-portfolio-pro.php' );
}


/**
 * Plugin: Genesis Author Pro (free, by StudioPress/ copyblogger)
 * @since 1.0.0
 */
if ( function_exists( 'genesis_author_pro_init' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-genesis-author-pro.php' );
}


/**
 * Plugin: Genesis Testimonial Slider (free, by Frank Schrijvers, WPStudio)
 * @since 1.0.0
 */
if ( function_exists( 'wpstudio_gts_init' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-genesis-testimonial-slider.php' );
}


/**
 * Plugin: Display Featured Image for Genesis (free, by Robin Cornett)
 * @since 1.3.0
 */
if ( defined( 'DISPLAYFEATUREDIMAGEGENESIS_BASENAME' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-display-featured-image-genesis.php' );
}


/**
 * Plugin: Genesis Coming Soon Page (free, by Jose Manuel Sanchez)
 * @since 1.0.0
 */
if ( function_exists( 'gcs_genesis_init' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-genesis-coming-soon-page.php' );
}


/**
 * Plugin: Genesis 404 Page (free, by Bill Erickson)
 * @since 1.0.0
 */
if ( function_exists( 'be_register_genesis_404_settings' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-genesis-404-page.php' );
}


/**
 * Plugin: Blox Lite / Blox (free/Pro, by Nick Diego)
 * @since 1.0.0
 */
if ( class_exists( 'Blox_Lite_Main' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-blox.php' );
}


/**
 * Plugin: Genesis DevKit (Premium, by Cobalt Apps)
 * @since 1.1.3
 */
if ( function_exists( 'genesis_devkit_compatible_theme_check' )
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-cobalt-genesis-devkit.php' );
}


/**
 * Plugin: Genesis Extender (Premium, by Cobalt Apps)
 * @since 1.1.1
 */
if ( defined( 'GENEXT_VERSION' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-cobalt-genesis-extender.php' );
}
