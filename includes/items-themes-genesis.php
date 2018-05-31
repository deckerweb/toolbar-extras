<?php

// includes/items-themes-genesis

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}

/**
 * Genesis Child Themes's Items:
 *   Note: This file only gets loaded when Genesis is active!
 * -----------------------------------------------------------------------------
 */

/**
 * Genesis Sample (Premium, by StudioPress) - version 2.6.0 or higher!
 * @since 1.2.0
 */
if ( function_exists( 'genesis_sample_theme_defaults' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-genesis-sample.php' );
}


/**
 * Dynamik Website Builder (Premium, by Cobalt Apps)
 * @since 1.1.0
 */
if ( 'dynamik-gen' === get_stylesheet() ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-dynamik-website-builder.php' );
}


/**
 * Mai Lifestyle (Premium, by Mike Hemberger, BizBudding Inc.)
 * @since 1.0.0
 */
if ( class_exists( 'Mai_Theme_Engine' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-genesis-mai-lifestyle.php' );
}


/**
 * Essence Pro (Premium, by StudioPress)
 * @since 1.2.0
 */
if ( function_exists( 'essence_theme_defaults' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-genesis-essence-pro.php' );
}


/**
 * Business Pro (Premium, by SEO Themes)
 * @since 1.2.0
 */
if ( function_exists( 'business_theme_defaults' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-genesis-business-pro.php' );
}


/**
 * Studio Pro (Premium, by SEO Themes)
 * @since 1.2.0
 */
if ( function_exists( 'studio_theme_defaults' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-genesis-studio-pro.php' );
}


/**
 * Corporate Pro (Premium, by SEO Themes)
 * @since 1.2.0
 */
if ( function_exists( 'corporate_theme_defaults' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-genesis-corporate-pro.php' );
}


/**
 * Academy Pro (Premium, by StudioPress)
 * @since 1.2.0
 */
if ( function_exists( 'academy_theme_defaults' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-genesis-academy-pro.php' );
}


/**
 * Authority Pro (Premium, by StudioPress)
 * @since 1.2.0
 */
if ( function_exists( 'authority_theme_defaults' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-genesis-authority-pro.php' );
}


/**
 * Outfitter Pro (Premium, by StudioPress)
 * @since 1.2.0
 */
if ( function_exists( 'outfitter_theme_defaults' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-genesis-outfitter-pro.php' );
}


/**
 * Boss Pro (Premium, by Design by Bloom)
 * @since 1.2.0
 */
if ( function_exists( 'boss_theme_defaults' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-genesis-boss-pro.php' );
}


/**
 * Refined Pro (Premium, by Restored 316 Designs // Lauren Gaige)
 * @since 1.2.0
 */
if ( function_exists( 'refined_enqueue_scripts' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-genesis-refined-pro.php' );
}


/**
 * Monochrome Pro (Premium, by StudioPress)
 * @since 1.2.0
 */
if ( function_exists( 'monochrome_theme_defaults' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-genesis-monochrome-pro.php' );
}


/**
 * Slush Pro (Premium, by zigzagpress)
 * @since 1.2.0
 */
if ( 'slush-pro' === get_stylesheet() || function_exists( 'zp_secondary_nav_wrap_open' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-genesis-slush-pro.php' );
}


/**
 * Foodie Pro (Premium, by Feast Design Co.)
 * @since 1.2.0
 */
if ( function_exists( 'foodie_pro_load_textdomain' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-genesis-foodie-pro.php' );
}


/**
 * Cook'd Pro (Premium, by Feast Design Co.)
 * @since 1.2.0
 */
if ( function_exists( 'cookd_load_textdomain' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-genesis-cookd-pro.php' );
}


/**
 * Brunch Pro (Premium, by Feast Design Co.)
 * @since 1.2.0
 */
if ( function_exists( 'brunch_pro_load_textdomain' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-genesis-brunch-pro.php' );
}


/**
 * GBeaver (Premium, by WP Beaver World)
 * @since 1.1.0
 */
if ( function_exists( 'gbeaver_initial_layouts' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-genesis-gbeaver.php' );
}