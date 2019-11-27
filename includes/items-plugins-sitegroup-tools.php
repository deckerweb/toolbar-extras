<?php

// includes/items-plugins-sitegroup-tools

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Plugin: Activity Log (free, by Activity Log Team)
 * @since 1.4.4
 */
if ( class_exists( 'AAL_Main' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-activity-log.php';
}


/**
 * Plugin: WP Security Audit Log (free, by WP White Security)
 * @since 1.4.0
 */
if ( class_exists( 'WpSecurityAuditLog' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-wp-security-audit-log.php';
}


/**
 * Plugin: User Activity Log (free, by Solwin Infotech)
 * @since 1.4.4
 */
if ( function_exists( 'load_text_domain_user_activity_log' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-user-activity-log.php';
}


/**
 * Plugin: Simple History (free, by Pär Thernström)
 * @since 1.4.4
 */
if ( defined( 'SIMPLE_HISTORY_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-simple-history.php';
}


/**
 * Plugin: Stream (free, by XWP)
 * @since 1.4.4
 */
if ( function_exists( 'wp_stream_get_instance' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-stream.php';
}


/**
 * Plugin: Ivory Search (free, by Ivory Search)
 * @since 1.4.9
 */
if ( class_exists( 'Ivory_Search' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-ivory-search.php';
}


/**
 * Plugin: Borlabs Cookie (Premium, by Benjamin A. Bornschein, Borlabs)
 * @since 1.4.9
 */
if ( defined( 'BORLABS_COOKIE_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-borlabs-cookie.php';
}


/**
 * Plugin: qTranslate-XT (free, by qTranslate Community)
 * @since 1.4.9
 */
if ( defined( 'QTX_VERSION' ) ) :

	if ( version_compare( QTX_VERSION, '3.7.0', '>=' ) ) {
		require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-qtranslate-xt.php';
	}

endif;


/**
 * Plugin: Jetpack (free, by Automattic, Inc./ WordPress.com)
 * @since 1.4.2
 */
if ( ddw_tbex_is_jetpack_active() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-jetpack.php';
}


/**
 * Plugin: WP Toolbelt (free, by Ben Gillbanks)
 * @since 1.4.9
 */
if ( defined( 'TOOLBELT_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-toolbelt.php';
}


/**
 * Plugin: The SEO Framework (free, by Sybre Waaijer)
 * @since 1.4.0
 */
if ( defined( 'THE_SEO_FRAMEWORK_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-seo-framework.php';
}


/**
 * Plugin: Yoast SEO (free, by Team Yoast)
 * @since 1.4.0
 */
if ( defined( 'WPSEO_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-yoastseo.php';
}


/**
 * Detect some Rank Math specific single plugins.
 *
 * @since 1.4.5
 *
 * @uses ddw_tbex_detect_plugin()
 *
 * @return bool TRUE if a plugin exists, or FALSE if no plugin constant, class
 *              or function detected.
 */
function ddw_tbex_detect_rankmath_single_plugins() {

	return ddw_tbex_detect_plugin(

		array(

			/** Classes to detect */
			'classes' => array(
				'RANKMATH_SCHEMA',
				'RankMath_Monitor',
				'RankMath_Redirections',
				'RankMath_Woocommerce',
			),

		)  // end array

	);

}  // end function

/**
 * Plugin: Rank Math SEO (free, by Rank Math)
 * Plugins: Rank Math single feature plugins (all free, by Rank Math)
 * @since 1.4.5
 */
if ( ddw_tbex_is_rankmath_seo_active() ) {

	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-rankmath.php';

} else {

	if ( ddw_tbex_detect_rankmath_single_plugins() ) {
		require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-rankmath-singles.php';
	}

}  // end if


/**
 * Plugin: Instant Indexing for Google (free, by Rank Math)
 * @since 1.4.8
 */
if ( ddw_tbex_is_rm_instant_indexing_active() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-rankmath-instant-indexing.php';
}


/**
 * Plugin: SEOPress (Pro) (free/ Premium, by Benjamin Denis)
 * @since 1.3.2
 */
if ( defined( 'SEOPRESS_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-seopress.php';
}


/**
 * Plugin: Hummingbird (Pro) (free/Premium, by WPMU DEV)
 * @since 1.4.0
 */
if ( class_exists( 'WP_Hummingbird' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-hummingbird.php';
}


/**
 * Plugin: Redirection (free, by John Godley)
 * @since 1.4.0
 */
if ( defined( 'REDIRECTION_DB_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-redirection.php';
}


/**
 * Plugin: Safe Redirect Manager (free, by 10up)
 * @since 1.4.0
 */
if ( class_exists( 'SRM_Redirect' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-safe-redirect-manager.php';
}


/**
 * Plugin: SEO Redirection (free, by Fakhri Alsadi)
 * @since 1.4.0
 */
if ( defined( 'WP_SEO_REDIRECTION_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-seo-redirection.php';
}


/**
 * Plugin: All-in-One WP Migration (free, by ServMask)
 * @since 1.0.0
 */
if ( defined( 'AI1WM_PLUGIN_BASENAME' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-aiowpm.php';
}


/**
 * Plugin: UpdraftPlus (free, by Team Updraft, David Anderson)
 * @since 1.0.0
 */
if ( defined( 'UPDRAFTPLUS_DIR' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-updraftplus.php';
}


/**
 * Plugin: Duplicator (free, by Snap Creek)
 * @since 1.0.0
 */
if ( defined( 'DUPLICATOR_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-duplicator.php';
}


/**
 * Plugin: Duplicator Pro (Premium, by Snap Creek)
 * @since 1.3.2
 */
if ( defined( 'DUPLICATOR_PRO_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-duplicator-pro.php';
}


/**
 * Plugin: BackWPup (free, by Inpsyde GmbH)
 * @since 1.3.2
 */
if ( class_exists( 'BackWPup' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-backwpup.php';
}


/**
 * Plugin: WPvivid Backup Plugin (free, by WPvivid Team)
 * @since 1.4.4
 */
if ( defined( 'WPVIVID_PLUGIN_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-wpvivid.php';
}


/**
 * Plugin: WP-Staging (free, by WP-Staging & Rene Hermenau)
 *   Plugin: WP-Stagig Pro (Premium, by WP-Staging & Rene Hermenau)
 * @since 1.0.0
 */
if ( defined( 'WPSTG_PLUGIN_DIR' ) || defined( 'WPSTGPRO_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-wpstaging.php';
}


/**
 * Plugin: MainWP Child (free, by MainWP)
 * @since 1.4.0
 */
if ( defined( 'MAINWP_CHILD_URL' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-mainwp-child.php';
}


/**
 * Plugin: Better Search Replace (free, by Delicious Brains)
 * @since 1.4.9
 */
if ( function_exists( 'run_better_search_replace' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-better-search-replace.php';
}


/**
 * Plugin: Search & Replace (free, by Inpsyde GmbH)
 * @since 1.4.9
 */
if ( function_exists( 'search_replace_load' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-search-replace.php';
}


/**
 * Plugin: Disable Gutenberg (free, by Jeff Starr)
 * @since 1.4.0
 */
if ( ddw_tbex_is_disable_gutenberg_active() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-disable-gutenberg.php';
}


/**
 * Plugin: Classic Editor (free, by WordPress Contributors)
 * @since 1.4.0
 */
if ( ddw_tbex_is_classic_editor_plugin_active() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-classic-editor.php';
}


/**
 * Plugin: Gutenberg Ramp (free, by Automattic, Inc.)
 * @since 1.4.0
 */
if ( ddw_tbex_is_gutenberg_ramp_active() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-gutenberg-ramp.php';
}


/**
 * Plugin: Dismiss Gutenberg Nag (free, by Luciano Croce)
 * @since 1.4.0
 */
if ( class_exists( 'Dismiss_Gutenberg_Nag_Option_Settings' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-dismiss-gutenberg-nag.php';
}


/**
 * Plugin: Custom Importer & Exporter (free, by Protech.Inc)
 * @since 1.3.9
 */
if ( function_exists( 'cie_menuSettings' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-custom-importer-exporter.php';
}


/**
 * Plugin: Export Import Menus (free, by Akshay Menariya)
 * @since 1.4.0
 */
if ( ddw_tbex_is_export_import_menus_active() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-export-import-menus.php';
}
