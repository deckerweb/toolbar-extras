<?php

// includes/items-plugins-sitegroup-media

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Plugin: Regenerate Thumbnails (free, by Alex Mills)
 * @since 1.0.0
 */
if ( class_exists( 'RegenerateThumbnails' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-regenerate-thumbnails.php';
}


/**
 * Plugin: ShortPixel Image Optimizer (free, by ShortPixel)
 * @since 1.4.3
 */
if ( defined( 'SHORTPIXEL_IMAGE_OPTIMISER_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-shortpixel-image-optimizer.php';
}


/**
 * Plugin: Imagify Image Optimizer (free, by WP Media)
 * @since 1.4.3
 */
if ( defined( 'IMAGIFY_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-imagify.php';
}


/**
 * Plugin: Smush Image Compression and Optimization (free, by WPMU DEV)
 * @since 1.4.3
 */
if ( defined( 'WP_SMUSH_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-smush.php';
}


/**
 * Plugin: EWWW Image Optimizer (free, by Exactly WWW)
 * @since 1.4.3
 */
if ( defined( 'EWWW_IMAGE_OPTIMIZER_TOOL_PATH' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-ewww-image-optimizer.php';
}


/**
 * Plugin: Compress JPEG & PNG Images (free, by TinyPNG)
 * @since 1.4.3
 */
if ( class_exists( 'Tiny_Plugin' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-compress-images.php';
}


/**
 * Plugin: Media from FTP (free, by Katsushi Kawamori)
 * @since 1.4.9
 */
if ( function_exists( 'media_from_ftp_load_textdomain' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-media-from-ftp.php';
}


/**
 * Plugin: Add From Server (free, by Dion Hulse)
 * @since 1.0.0
 */
if ( defined( 'ADD_FROM_SERVER_WP_REQUIREMENT' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-add-from-server.php';
}


/**
 * Plugin: Smart Slider 3 (free/Premium, by Nextend)
 * @since 1.0.0
 */
if ( ddw_tbex_is_smartslider3_active() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-smart-slider.php';
}


/**
 * Plugin: Envira Gallery Lite/Pro (free/Premium, by Envira Gallery Team)
 * @since 1.1.0
 */
if ( ddw_tbex_is_envira_gallery_active() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-envira-gallery.php';
}


/**
 * Plugin: Soliloquy Sliders Lite/Pro (free/Premium, by Soliloquy Team)
 * @since 1.1.0
 */
if ( ddw_tbex_is_soliloquy_active() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-soliloquy-sliders.php';
}


/**
 * Plugin: FooGallery (free, by FooPlugins)
 * @since 1.1.0
 */
if ( ddw_tbex_is_foogallery_active() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-foogallery.php';
}


/**
 * Plugin: MaxGalleria (free, by Max Foundry)
 * @since 1.1.0
 */
if ( ddw_tbex_is_maxgalleria_active() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-maxgalleria.php';
}


/**
 * Plugin: Instagram Feed (Pro) (free/Premium, by Smash Balloon)
 * @since 1.4.2
 */
if ( ddw_tbex_is_instagram_feed_active() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-instagram-feed.php';
}
