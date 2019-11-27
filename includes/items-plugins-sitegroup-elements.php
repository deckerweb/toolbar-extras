<?php

// includes/items-plugins-sitegroup-elements

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Plugin: Content Aware Sidebars (free, by Joachim Jensen - DEV Institute)
 * @since 1.3.1
 */
if ( class_exists( 'CAS_App' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-content-aware-sidebars.php';
}


/**
 * Plugin: Lightweight Sidebar Manager (free, by Brainstorm Force)
 * @since 1.2.0
 */
if ( defined( 'BSF_SB_POST_TYPE' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-bsf-sidebar-manager.php';
}


/**
 * Plugin: Widget Options (free/Premium, by Phpbits Creative Studio)
 * @since 1.2.0
 */
if ( class_exists( 'WP_Widget_Options' ) ) {		// same class for free + Pro!
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-widget-options.php';
}


/**
 * Plugin: Widget Importer & Exporter (free, by ChurchThemes.com LLC)
 * @since 1.0.0
 */
if ( class_exists( 'Widget_Importer_Exporter' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-widget-importer-exporter.php';
}


/**
 * Plugin: Max Mega Menu (free, by Tom Hemsley)
 * @since 1.4.2
 */
if ( class_exists( 'Mega_Menu' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-max-mega-menu.php';
}


/**
 * Plugin: QuadMenu (free, by QuadMenu)
 * @since 1.4.2
 */
if ( class_exists( 'QuadMenu' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-quadmenu.php';
}


/**
 * Plugin: Code Snippets (free, by Shea Bunge)
 * @since 1.0.0
 */
if ( defined( 'CODE_SNIPPETS_VERSION' ) || defined( 'CODE_SNIPPETS_FILE' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-code-snippets.php';
}


/**
 * Plugin: PHP code snippets (Insert PHP) (free, by Webcraftic)
 * @since 1.3.2
 */
if ( defined( 'WINP_SNIPPETS_POST_TYPE' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-php-code-snippets.php';
}


/**
 * Plugin: Simple Custom CSS and JS (free/Pro, by Diana Burduja)
 * @since 1.0.0
 */
if ( class_exists( 'CustomCSSandJS' ) || class_exists( 'CustomCSSandJSpro' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-simple-custom-css-js.php';
}


/**
 * Plugin: Shortcoder (free, by Aakash Chakravarthy)
 * @since 1.4.3
 */
if ( class_exists( 'Shortcoder' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-shortcoder.php';
}


/**
 * Plugin: Advanced Custom Fields (free, by Elliot Condon)
 * Plugin: Advanced Custom Fields PRO (Premium, by Elliot Condon)
 * @since 1.4.3
 */
if ( class_exists( 'ACF' ) && defined( 'ACF' ) && defined( 'ACF_VERSION' ) && version_compare( ACF_VERSION, '5.7.10', '>=' ) ) {

	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-acf.php';

	/**
	 * ACF PRO Add-On: Advanced Custom Fields: Extended (free, by ACF Extended)
	 * @since 1.4.3
	 */
	if ( ddw_tbex_is_acf_extended_active() ) {
		require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-acf-extended.php';
	}

}  // end if


/**
 * Plugin: Meta Box (free, by MetaBox.io)
 * @since 1.4.4
 */
if ( class_exists( 'RWMB_Loader' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-meta-box.php';
}


/**
 * Plugin: Pods (free, by Pods Framework Team)
 * @since 1.4.4
 */
if ( defined( 'PODS_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-pods.php';
}


/**
 * Plugin: Custom Field Suite (free, by Matt Gibbs)
 * @since 1.4.3
 */
if ( class_exists( 'Custom_Field_Suite' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-custom-field-suite.php';
}


/**
 * Plugins: Toolset Suite (Types, Views etc.) (Premium, by OnTheGoSystems (OTGS))
 * @since 1.4.9
 * @see plugin folder /includes/plugins-otgs/
 */


/**
 * Plugin: Schema Pro (Premium, by Brainstorm Force)
 * @since 1.3.2
 */
if ( class_exists( 'BSF_AIOSRS_Pro_Admin' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-wp-schema-pro.php';
}


/**
 * Plugin: All In One Schema Rich Snippets (free, by Brainstorm Force)
 * @since 1.3.2
 */
if ( class_exists( 'RichSnippets' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-bsf-aiosrs.php';
}


/**
 * Plugin: Schema (free, by Hesham)
 * @since 1.3.2
 */
if ( class_exists( 'Schema_WP' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-hesham-schema.php';
}


/**
 * Plugin: Shariff Wrapper (free, by Jan-Peter Lambeck & 3UU)
 * @since 1.4.2
 */
if ( function_exists( 'shariff3uu_privacy' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-shariff.php';
}
