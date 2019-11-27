<?php

// includes/plugins-otgs/items-plugins-otgs

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * 1st GROUP: Shared functions for all supported OTGS products
 * @since 1.4.9
 * -----------------------------------------------------------------------------
 */

/**
 * Shared functions needed for support of WPML and Toolset plugin suites.
 * @since 1.4.9
 */
require_once TBEX_PLUGIN_DIR . 'includes/plugins-otgs/otgs-functions.php';



/**
 * 2nd GROUP: WPML support - whole plugin suite from OTGS.
 * @since 1.4.9
 * -----------------------------------------------------------------------------
 */

/**
 * Plugin: WPML Suite - Resources
 * @since 1.4.9
 */
if ( ddw_tbex_is_wpml_active() ) {

	require_once TBEX_PLUGIN_DIR . 'includes/plugins-otgs/items-wpml-base.php';

	if ( ddw_tbex_display_items_resources() ) {
		require_once TBEX_PLUGIN_DIR . 'includes/plugins-otgs/items-wpml-resources.php';
	}

}  // end if


/**
 * Plugin: WPML Media Translation (Premium, by OnTheGoSystems)
 * @since 1.4.9
 */
if ( defined( 'WPML_MEDIA_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-otgs/items-wpml-media-translation.php';
}


/**
 * Plugin: WPML String Translation (Premium, by OnTheGoSystems)
 * @since 1.4.9
 */
if ( defined( 'WPML_ST_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-otgs/items-wpml-string-translation.php';
}


/**
 * Plugin: WPML Translation Management (Premium, by OnTheGoSystems)
 * @since 1.4.9
 */
if ( ddw_tbex_is_wpml_translation_management_active() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-otgs/items-wpml-translation-management.php';
}


/**
 * Plugin: WPML Sticky Links (Premium, by OnTheGoSystems)
 * @since 1.4.9
 */
if ( defined( 'WPML_STICKY_LINKS_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-otgs/items-wpml-sticky-links.php';
}


/**
 * Plugin: WPML CMS Nav (Premium, by OnTheGoSystems)
 * @since 1.4.9
 */
if ( defined( 'WPML_CMS_NAV_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-otgs/items-wpml-cms-nav.php';
}


/**
 * Plugin: WooCommerce Multilingual (Premium, by OnTheGoSystems)
 * @since 1.4.9
 */
if ( ( ddw_tbex_is_woocommerce_active() )		// dependencies
	&& defined( 'WCML_VERSION' )
) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-otgs/items-wpml-woocommerce-multilingual.php';
}



/**
 * 3rd GROUP: Toolset support - whole plugin suite from OTGS.
 * @since 1.4.9
 * -----------------------------------------------------------------------------
 */

/**
 * Toolset Suite basis:
 *   - Hook place for Toolset Suite & groups for each area.
 *   - Shared items between all plugins of the suite
 * @since 1.4.9
 */
if ( ddw_tbex_detect_toolset_plugins() ) {

	require_once TBEX_PLUGIN_DIR . 'includes/plugins-otgs/items-toolset-suite.php';

	/**
	 * Plugin: Toolset Suite - Resources
	 * @since 1.4.9
	 */
	if ( ddw_tbex_display_items_resources() ) {
		require_once TBEX_PLUGIN_DIR . 'includes/plugins-otgs/items-toolset-resources.php';
	}

}  // end if


/**
 * Plugin: Toolset Types (Premium, by OnTheGoSystems)
 * @since 1.4.9
 */
if ( ddw_tbex_is_toolset_types_active() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-otgs/items-toolset-types.php';
}


/**
 * Plugin: Toolset Views (Premium, by OnTheGoSystems)
 * @since 1.4.9
 */
if ( ddw_tbex_is_toolset_views_active() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-otgs/items-toolset-views.php';
}


/**
 * Plugin: Toolset Forms (Premium, by OnTheGoSystems)
 * @since 1.4.9
 */
if ( ddw_tbex_is_toolset_forms_active() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-otgs/items-toolset-forms.php';
}


/**
 * Plugin: Toolset Access (Premium, by OnTheGoSystems)
 * @since 1.4.9
 */
if ( defined( 'TACCESS_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-otgs/items-toolset-access.php';
}


/**
 * Plugin: Toolset Layouts (Premium, by OnTheGoSystems)
 * @since 1.4.9
 */
if ( defined( 'WPDDL_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-otgs/items-toolset-layouts.php';
}


/**
 * Plugin: Toolset WooCommerce Views (Premium, by OnTheGoSystems)
 * @since 1.4.9
 */
if ( ( ddw_tbex_is_toolset_views_active() && ddw_tbex_is_woocommerce_active() )		// dependencies
	&& defined( 'CRED_COMMERCE_VERSION' )
) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-otgs/items-toolset-views-woocommerce.php';
}


/**
 * Plugin: Toolset Forms Commerce (Premium, by OnTheGoSystems)
 * @since 1.4.9
 */
if ( ( ddw_tbex_is_toolset_forms_active() && ddw_tbex_is_woocommerce_active() )		// dependencies
	&& defined( 'CRED_COMMERCE_VERSION' )
) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-otgs/items-toolset-forms-commerce.php';
}


/**
 * Plugin: Toolset Advanced Export (Premium, by OnTheGoSystems)
 * @since 1.4.9
 */
if ( function_exists( 'toolset_advanced_export_is_environment_compatible' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-otgs/items-toolset-advanced-export.php';
}


/**
 * Plugin: Toolset Maps (Premium, by OnTheGoSystems)
 * @since 1.4.9
 */
if ( function_exists( 'toolset_addon_map_load_or_deactivate' ) ) {
	//require_once TBEX_PLUGIN_DIR . 'includes/plugins-otgs/items-toolset-maps.php';
}


/**
 * Plugin: Toolset Module Manager (Premium, by OnTheGoSystems)
 * @since 1.4.9
 */
if ( defined( 'MODMAN_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-otgs/items-toolset-modules.php';
}


/**
 * Plugin: Toolset Framework Installer (Premium, by OnTheGoSystems)
 * @since 1.4.9
 */
if ( defined( 'FIDEMO_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-otgs/items-toolset-framework-installer.php';
}
