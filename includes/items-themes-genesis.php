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
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-sample.php';
}


/**
 * Dynamik Website Builder (Premium, by Cobalt Apps)
 * @since 1.1.0
 */
if ( 'dynamik-gen' === get_stylesheet() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-dynamik-website-builder.php';
}


/**
 * All child themes based on "Mai Theme Engine" plugin (all Premium, by Mike
 *   Hemberger, BizBudding Inc.).
 * @since 1.0.0
 * @since 1.4.0 Refactored using the theme-dependent plugin instead of the
 *              specific child theme.
 */
if ( class_exists( 'Mai_Theme_Engine' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-mai-theme-engine.php';
}


/**
 * Genesis Customizer (free/Premium, by SEO Themes)
 * @since 1.4.3
 */
if ( 'genesis-customizer' === get_stylesheet() || 'genesis-customizer-theme' === get_stylesheet() /* && function_exists( 'genesis_customizer_not_a_theme' ) */ ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-customizer.php';
}


/**
 * Revolution Pro (Premium, by StudioPress)
 * @since 1.4.2
 */
if ( function_exists( 'revolution_theme_defaults' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-revolution-pro.php';
}


/**
 * Essence Pro (Premium, by StudioPress)
 * @since 1.2.0
 */
if ( function_exists( 'essence_theme_defaults' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-essence-pro.php';
}


/**
 * Breakthrough Pro (Premium, by StudioPress)
 * @since 1.3.5
 */
if ( function_exists( 'breakthrough_theme_defaults' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-breakthrough-pro.php';
}


/**
 * Business Pro (Premium, by SEO Themes)
 * @since 1.2.0
 */
if ( function_exists( 'business_theme_defaults' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-business-pro.php';
}


/**
 * Studio Pro (Premium, by SEO Themes)
 * @since 1.2.0
 */
if ( function_exists( 'studio_theme_defaults' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-studio-pro.php';
}


/**
 * Corporate Pro (Premium, by SEO Themes)
 * @since 1.2.0
 */
if ( function_exists( 'corporate_theme_defaults' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-corporate-pro.php';
}


/**
 * Academy Pro (Premium, by StudioPress)
 * @since 1.2.0
 */
if ( function_exists( 'academy_theme_defaults' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-academy-pro.php';
}


/**
 * Authority Pro (Premium, by StudioPress)
 * @since 1.2.0
 */
if ( function_exists( 'authority_theme_defaults' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-authority-pro.php';
}


/**
 * Outfitter Pro (Premium, by StudioPress)
 * @since 1.2.0
 */
if ( function_exists( 'outfitter_theme_defaults' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-outfitter-pro.php';
}


/**
 * Niche Pro (Premium, by Design by Bloom)
 * @since 1.3.2
 */
if ( 'niche-pro' === get_stylesheet() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-niche-pro.php';
}


/**
 * Boss Pro (Premium, by Design by Bloom)
 * @since 1.2.0
 */
if ( function_exists( 'boss_theme_defaults' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-boss-pro.php';
}


/**
 * Refined Pro (Premium, by Restored 316 Designs // Lauren Gaige)
 * @since 1.2.0
 */
if ( function_exists( 'refined_enqueue_scripts' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-refined-pro.php';
}


/**
 * Monochrome Pro (Premium, by StudioPress)
 * @since 1.2.0
 */
if ( function_exists( 'monochrome_theme_defaults' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-monochrome-pro.php';
}


/**
 * Slush Pro (Premium, by zigzagpress)
 * @since 1.2.0
 */
if ( 'slush-pro' === get_stylesheet() || function_exists( 'zp_secondary_nav_wrap_open' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-slush-pro.php';
}


/**
 * Foodie Pro (Premium, by Feast Design Co.)
 * @since 1.2.0
 */
if ( function_exists( 'foodie_pro_load_textdomain' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-foodie-pro.php';
}


/**
 * Cook'd Pro (Premium, by Feast Design Co.)
 * @since 1.2.0
 */
if ( function_exists( 'cookd_load_textdomain' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-cookd-pro.php';
}


/**
 * Brunch Pro (Premium, by Feast Design Co.)
 * @since 1.2.0
 */
if ( function_exists( 'brunch_pro_load_textdomain' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-brunch-pro.php';
}


/**
 * AgentPress Pro (Premium, by StudioPress)
 * @since 1.3.0
 */
if ( function_exists( 'agentpress_theme_defaults' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-agentpress-pro.php';
}


/**
 * Altitude Pro (Premium, by StudioPress)
 * @since 1.3.0
 */
if ( function_exists( 'altitude_theme_defaults' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-altitude-pro.php';
}


/**
 * Author Pro (Premium, by StudioPress)
 * @since 1.3.0
 */
if ( function_exists( 'author_theme_defaults' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-author-pro.php';
}


/**
 * Daily Dish Pro (Premium, by StudioPress)
 * @since 1.3.0
 */
if ( function_exists( 'daily_dish_theme_defaults' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-daily-dish-pro.php';
}


/**
 * Infinity Pro (Premium, by StudioPress)
 * @since 1.3.0
 */
if ( function_exists( 'infinity_theme_defaults' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-infinity-pro.php';
}


/**
 * Lifestyle Pro (Premium, by StudioPress)
 * @since 1.3.2
 */
if ( function_exists( 'lifestyle_theme_defaults' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-lifestyle-pro.php';
}


/**
 * Magazine Pro (Premium, by StudioPress)
 * @since 1.3.0
 */
if ( function_exists( 'magazine_theme_defaults' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-magazine-pro.php';
}


/**
 * Parallax Pro (Premium, by StudioPress)
 * @since 1.3.0
 */
if ( function_exists( 'parallax_theme_defaults' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-parallax-pro.php';
}


/**
 * Wellness Pro (Premium, by StudioPress)
 * @since 1.3.0
 */
if ( function_exists( 'wellness_theme_defaults' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-wellness-pro.php';
}


/**
 * Aspire Pro (Premium, by Appfinite)
 * @since 1.3.2
 */
if ( function_exists( 'aspire_theme_setting_defaults' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-aspire-pro.php';
}


/**
 * Atmosphere Pro (Premium, by StudioPress)
 * @since 1.3.2
 */
if ( function_exists( 'atmosphere_theme_defaults' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-atmosphere-pro.php';
}


/**
 * Digital Pro (Premium, by StudioPress)
 * @since 1.3.2
 */
if ( function_exists( 'digital_theme_defaults' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-digital-pro.php';
}


/**
 * Executive Pro (Premium, by StudioPress)
 * @since 1.3.2
 */
if ( function_exists( 'executive_theme_defaults' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-executive-pro.php';
}


/**
 * Gallery Pro (Premium, by Design by Bloom)
 * @since 1.3.2
 */
if ( 'gallery-pro' === get_stylesheet() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-gallery-pro.php';
}


/**
 * Maker Pro (Premium, by JT Grauke/ Design by Bloom)
 * @since 1.3.2
 */
if ( function_exists( 'maker_theme_setting_defaults' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-maker-pro.php';
}


/**
 * Market Theme (Premium, by Restored 316 Designs // Lauren Gaige)
 * @since 1.3.2
 */
if ( function_exists( 'market_theme_defaults' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-market-theme.php';
}


/**
 * Metro Pro (Premium, by StudioPress)
 * @since 1.3.2
 */
if ( function_exists( 'metro_theme_defaults' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-metro-pro.php';
}


/**
 * Showcase Pro (Premium, by Design by Bloom)
 * @since 1.3.2
 */
if ( 'showcase-pro' === get_stylesheet() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-showcase-pro.php';
}


/**
 * Smart Passive Income Pro (Premium, by StudioPress)
 * @since 1.3.2
 */
if ( function_exists( 'spi_theme_defaults' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-smart-passive-income-pro.php';
}


/**
 * GBeaver (Premium, by WP Beaver World)
 * @since 1.1.0
 */
if ( function_exists( 'gbeaver_initial_layouts' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-gbeaver.php';
}


/**
 * Hello Pro 2 (Premium, by brandiD)
 * @since 1.4.2
 */
if ( function_exists( 'bid_hello_pro_theme_defaults' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-hello-pro.php';
}


/**
 * Kreativ Pro (Premium, by ThemeSquare)
 * @since 1.4.2
 */
if ( function_exists( 'kreativ_theme_defaults' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-kreativ-pro.php';
}


/**
 * Jessica (Premium, by 9seeds, LLC)
 * @since 1.4.2
 */
if ( function_exists( 'jessica_load_scripts' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-jessica.php';
}


/**
 * Divine (Premium, by Restored 316 Designs // Lauren Gaige)
 * @since 1.4.2
 */
if ( function_exists( 'divine_theme_defaults' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-divine.php';
}


/**
 * Pretty Chic (Premium, by Lindsey Riel)
 * @since 1.4.2
 */
if ( function_exists( 'divine_theme_defaults' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis-divine.php';
}
