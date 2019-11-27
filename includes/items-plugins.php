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
 * Plugin: Central Color Palette (free, by Gáravo)
 * @since 1.0.0
 */
if ( class_exists( 'kt_Central_Palette' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-central-color-palette.php';
}


/**
 * Plugin: Iris Color Picker Enhancer (free, by Maeve Lander)
 * @since 1.4.0
 */
if ( defined( 'ICPE_PLUGIN_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-iris-color-picker-enhancer.php';
}


/**
 * Plugin: Custom Swatches for Iris Color Picker (free, by Iceberg Web Design)
 * @since 1.4.0
 */
if ( function_exists( 'add_iceberg_iris_menu' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-custom-swatches-iris.php';
}


/**
 * Plugin: WordPress Color Picker Enhancement (free, by P. Roy)
 * @since 1.4.3
 */
if ( function_exists( 'd2l_wcp_plugin_menu' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-wp-color-picker-enhancement.php';
}


/**
 * Plugin: Simple CSS (free, by Tom Usborne)
 * @since 1.0.0
 */
if ( function_exists( 'simple_css_admin_menu' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-simple-css.php';
}


/**
 * Plugin: SiteOrigin CSS (free, by SiteOrigin)
 * @since 1.0.0
 */
if ( defined( 'SOCSS_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-siteorigin-css.php';
}


/**
 * Plugin: Simple Custom CSS (free, by John Regan, Danny Van Kooten)
 * @since 1.0.0
 */
if ( defined( 'SCCSS_OPTION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-simple-custom-css.php';
}


/**
 * Plugin: Custom CSS Pro (free, by WaspThemes)
 * @since 1.0.0
 */
if ( ddw_tbex_is_custom_css_pro_active() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-custom-css-pro.php';
}


/**
 * Plugin: WP Show Posts (free, by Tom Usborne)
 * @since 1.1.0
 */
if ( defined( 'WPSP_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-wp-show-posts.php';
}


/**
 * Plugin: Front Page Builder (free, by Themes4WP)
 * @since 1.3.0
 */
if ( defined( 'FPB_SAMPLE_PLUGIN_URL' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-front-page-builder.php';
}


/**
 * Plugin: IconPress Lite/Pro (free/Premium, by IconPress Team)
 * @since 1.4.0
 */
if ( defined( 'ICONPRESSLITE_VERSION' ) || class_exists( '\IconPress\Base' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-iconpress.php';
}


/**
 * Plugin: Customizer Export Import (free, by The Beaver Builder Team)
 * @since 1.0.0
 */
if ( class_exists( 'CEI_Core' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-customizer-export-import.php';
}


/**
 * Plugin: Catch Import Export (free, by Catch Plugins)
 * @since 1.4.0
 */
if ( defined( 'CATCH_IMPORT_EXPORT_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-catch-import-export.php';
}


/**
 * Plugin: One Click Demo Import (free, by ProteusThemes)
 * @since 1.0.0
 */
if ( class_exists( 'OCDI_Plugin' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-oneclick-demo-import.php';
}


/**
 * Plugin: WP Mobile Menu (free, by Takanakui)
 * @since 1.4.0
 */
if ( class_exists( 'WP_Mobile_Menu' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-wp-mobile-menu.php';
}


/**
 * Plugin: Login Designer (free, by Rich Tabor from ThatPluginCompany)
 * @since 1.4.0
 */
if ( class_exists( 'Login_Designer' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-login-designer.php';
}


/**
 * Plugin: Easy Login Styler Pro (Premium, by Phpbits Creative Studio)
 * @since 1.4.0
 */
if ( class_exists( 'Easy_Login_Styler_Pro' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-easy-login-styler.php';
}


/**
 * Plugin: 404page (free, by Peter Raschendorfer)
 * @since 1.0.0
 */
if ( function_exists( 'pp_404_is_active' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-404page.php';
}


/**
 * Plugin: Testimonial Rotator (free, by Hal Gatewood)
 * @since 1.2.0
 */
if ( function_exists( 'testimonial_rotator_setup' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-testimonial-rotator.php';
}


/**
 * Plugin: Extender Pro (Premium, by Cobalt Apps)
 * @since 1.1.0
 */
if ( ddw_tbex_is_cobalt_supported_theme( 'extender-pro' ) && function_exists( 'extender_pro_compatible_theme_check' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-cobalt-extender-pro.php';
}


/**
 * Plugin: Themer Pro (Premium, by Cobalt Apps)
 * @since 1.1.0
 */
if ( ddw_tbex_is_cobalt_supported_theme( 'themer-pro' ) && function_exists( 'themer_pro_compatible_theme_check' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-cobalt-themer-pro.php';
}


/**
 * Plugin: Freelancer DevKit (Premium, by Cobalt Apps)
 * @since 1.1.0
 */
if ( ( 'freelancer' === wp_basename( get_template_directory() ) )			// check for Freelancer Parent Theme
	&& function_exists( 'freelancer_devkit_compatible_theme_check' )	// check for Freelancer DevKit Plugin
) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-cobalt-freelancer-devkit.php';
}


/**
 * Plugin: OceanWP Sticky Header (free, by Oren Hahiashvili)
 * @since 1.3.0
 */
if ( class_exists( 'sticky_header_oceanwp' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-oceanwp-sticky-header.php';
}


/**
 * Plugin: Tweaks for GeneratePress (free, by John Chapman)
 * @since 1.4.4
 */
if ( function_exists( 'gptweaks_back_to_top' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-gp-tweaks.php';
}


/**
 * Plugin: GP Social Share (free, by Jon Mather)
 * @since 1.3.0
 */
if ( function_exists( 'gp_social_options_page' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-gp-social-share.php';
}


/**
 * Plugin: GP Back To Top (free, by Mai Dong Giang (Peter Mai))
 * @since 1.3.0
 */
if ( class_exists( 'GP_Back_To_Top' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-gp-back-to-top.php';
}


/**
 * Plugin: GP Related Posts (free, by Jon Mather)
 * @since 1.4.3
 */
if ( function_exists( 'gp_related_settings_init' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-gp-related-posts.php';
}


/**
 * Plugin: GP Elements Disable (free, by Jon Mather)
 * @since 1.4.3
 */
if ( function_exists( 'wcd_checkbox_body_bg_render' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-gp-elements-disable.php';
}


/**
 * Plugin: Church Content (free, by ChurchThemes.com LLC)
 * @since 1.3.0
 */
if ( class_exists( 'Church_Theme_Content' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-ct-church-content.php';
}


/**
 * Plugin: Envato Elements – Template Kits (free, by Envato)
 * @since 1.4.0
 */
if ( defined( 'ENVATO_ELEMENTS_VER' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-envato-elements-template-kits.php';
}


/**
 * Plugin: Sticky Header 2020 (free, by Iulia Cazan)
 * @since 1.4.9
 */
if ( class_exists( 'Sticky_Header_2020' ) && 'twentytwenty' === wp_basename( get_template_directory() ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-sticky-header-2020.php';
}


/**
 * Plugin: Options for Twenty Nineteen (free, by webd.uk)
 * @since 1.4.8
 */
if ( class_exists( 'options_for_twenty_nineteen_class' ) && 'twentynineteen' === wp_basename( get_template_directory() ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-options-for-twentynineteen.php';
}


if ( 'twentyseventeen' === wp_basename( get_template_directory() ) ) :

	/**
	 * Plugin: Options for Twenty Seventeen (free, by webd.uk)
	 * @since 1.4.8
	 */
	if ( class_exists( 'options_for_twenty_seventeen_class' ) ) {
		require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-options-for-twentyseventeen.php';
	}


	/**
	 * Plugin: Customize Twenty Seventeen (free, by BoldThemes)
	 * @since 1.4.8
	 */
	if ( function_exists( 'boldthemes_2017_enqueue' ) ) {
		require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-customize-twentyseventeen.php';
	}


	/**
	 * Plugin: Advanced Twenty Seventeen (free, by saturnplugins)
	 * @since 1.4.8
	 */
	if ( class_exists( 'AdvancedTwentySeventeen' ) ) {
		require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-advanced-twentyseventeen.php';
	}

endif;


/**
 * Plugin: Customize Twenty Sixteen (free, by BoldThemes)
 * @since 1.4.8
 */
if ( function_exists( 'boldthemes_2016_enqueue' ) && 'twentysixteen' === wp_basename( get_template_directory() ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-customize-twentysixteen.php';
}


/**
 * Plugin: CartFlows (free, by CartFlows Inc)
 *   Note: Since CartFlows v1.1.20 the WooCommerce dependency was removed, so we removed it here as well!
 * @since 1.4.2
 * @since 1.4.5 Removed WooCommerce dependency.
 */
if ( class_exists( 'Cartflows_Loader' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-cartflows.php';
}


/**
 * Plugin: Reusable Blocks – Elementor, Beaver Builder, WYSIWYG (free, by WebEmpire)
 * @since 1.4.3
 * @since 1.4.5 Renaming because plugin changed its name/branding etc.
 */
if ( defined( 'WE_SIDEBAR_PLUGIN_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-we-sidebar-builder.php';
}


/**
 * Plugin: WP Portfolio (Premium, by Brainstorm Force)
 * @since 1.3.2
 */
if ( defined( 'ASTRA_PORTFOLIO_VER' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-wp-portfolio.php';
}


/**
 * Plugin: Portfolio Post Type (free, by Devin Price)
 * @since 1.3.2
 */
if ( function_exists( 'portfolio_post_type_init' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-cpt-portfolio.php';
}


/**
 * Plugin: Cool Timeline (free, by Cool Plugins)
 * @since 1.3.2
 */
if ( defined( 'COOL_TIMELINE_VERSION_CURRENT' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-cool-timeline.php';
}



/**
 * 2nd GROUP: Builder-related stuff (for more than one Builder)
 * @since 1.4.0
 * -----------------------------------------------------------------------------
 */

/**
 * Plugin: Epic News Elements (Premium, by Jegtheme)
 * @since 1.4.0
 */
if ( ( ddw_tbex_is_elementor_active() || ddw_tbex_is_wpbakery_active() || ddw_tbex_is_block_editor_active() )	// Elementor, Block Editor (Gutenberg), or WPBakery is needed
	&& class_exists( '\EPIC\Init' )
) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-epic-news-elements.php';
}


/**
 * Add-On: PithyWP Templates (free, by PithyWP)
 * @since 1.4.2
 */
if ( class_exists( 'PithyWP_Templates' ) ) {		// Elementor, Gutenberg
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-pithy-templates.php';
}



/**
 * 3rd GROUP: Miscellaneous stuff
 * @since 1.0.0
 * @since 1.4.9 Splitted into various includes to keep things organized.
 * -----------------------------------------------------------------------------
 */

	/** Site Group: Items for Media / Galleries / Slider */
	require_once TBEX_PLUGIN_DIR . 'includes/items-plugins-sitegroup-media.php';

	/** Site Group: Items for Manage Content */
	require_once TBEX_PLUGIN_DIR . 'includes/items-plugins-sitegroup-manage-content.php';

	/** Site Group: Elements */
	require_once TBEX_PLUGIN_DIR . 'includes/items-plugins-sitegroup-elements.php';

	/** Site Group: Items for Tools */
	require_once TBEX_PLUGIN_DIR . 'includes/items-plugins-sitegroup-tools.php';

	/** Site Group: Various Stuff */
	require_once TBEX_PLUGIN_DIR . 'includes/items-plugins-sitegroup-stuff.php';
