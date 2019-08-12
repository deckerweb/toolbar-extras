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
 * Plugin: Simple Links (free, by Mat Lipe)
 * @since 1.4.0
 */
if ( defined( 'SIMPLE_LINKS_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-simple-links.php';
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


/**
 * Plugin: Add From Server (free, by Dion Hulse)
 * @since 1.0.0
 */
if ( defined( 'ADD_FROM_SERVER_WP_REQUIREMENT' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-add-from-server.php';
}


/**
 * Plugin: Simple Custom CSS and JS (free/Pro, by Diana Burduja)
 * @since 1.0.0
 */
if ( class_exists( 'CustomCSSandJS' ) || class_exists( 'CustomCSSandJSpro' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-simple-custom-css-js.php';
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
 * Plugin: Church Content (free, by churchthemes.com)
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
 * 2nd GROUP: Builder-related stuff
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
 * -----------------------------------------------------------------------------
 */

/**
 * Plugin: Health Check & Troubleshooting (free, by The WordPress.org community)
 * @since 1.0.0
 */
if ( ddw_tbex_is_wp52_install()
	&& ( class_exists( 'Health_Check' ) || defined( 'HEALTH_CHECK_PLUGIN_VERSION' ) )
) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-health-check.php';
}


/**
 * Plugin: WPMU Dev Dashboard (Premium, by WPMU DEV)
 * @since 1.3.2
 */
if ( class_exists( 'WPMUDEV_Dashboard' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-wpmudev-dashboard.php';
}


/**
 * Plugin: GitHub Updater (free, by Andy Fragen)
 * @since 1.0.0
 */
if ( in_array( 'github-updater/github-updater.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-github-updater.php';
}


/**
 * Dev Add-On: Local Development (free, by Andy Fragen)
 * @since 1.0.0
 */
if ( ddw_tbex_display_items_dev_mode()
	&& in_array( 'local-development/local-development.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )
) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-local-development.php';
}


/**
 * Plugin: WooCommerce (free, by Automattic)
 * @since 1.0.0
 */
if ( ddw_tbex_is_woocommerce_active() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-woocommerce.php';
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
 * Plugin: Popup Maker (free, by WP Popup Maker & Daniel Iser)
 * @since 1.0.0
 */
if ( class_exists( 'Popup_Maker' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-popup-maker.php';
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
 * Plugin: WP Document Revisions (free, by Ben Balter)
 *   Add-On Plugin: WP Document Revisions Simple Downloads (free, by David Decker - DECKERWEB)
 * @since 1.3.9
 */
if ( class_exists( 'WP_Document_Revisions' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-wp-document-revisions.php';
}


/**
 * Plugin: Delightful Downloads (free, by Ashley Rich)
 * @since 1.0.0
 */
if ( class_exists( 'Delightful_Downloads' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-delightful-downloads.php';
}


/**
 * Plugin: Download Monitor (free, by Never5)
 * @since 1.0.0
 */
if ( defined( 'DLM_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-download-monitor.php';
}


/**
 * Plugin: Thirsty Affiliates (free, by Rymera Web Co.)
 * @since 1.0.0
 */
if ( class_exists( 'ThirstyAffiliates' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-thirsty-affiliates.php';
}


/**
 * Plugin: Simple URLs (free, by StudioPress)
 * @since 1.0.0
 */
if ( class_exists( 'SimpleURLs' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-simple-urls.php';
}


/**
 * Plugin: Easy Digital Downloads (free)
 * @since 1.0.0
 */
if ( ddw_tbex_is_edd_active() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-edd.php';
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
 * Plugin: Smart Slider 3 (free/Premium, by Nextend)
 * @since 1.0.0
 */
if ( ddw_tbex_is_smartslider3_active() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-smart-slider.php';
}


/**
 * Plugin: TablePress (free, by Tobias Bäthge)
 * @since 1.0.0
 */
if ( class_exists( 'TablePress' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-tablepress.php';
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


/**
 * Plugin: Cherry Testimonials (free, by Zemez)
 * @since 1.1.0
 */
if ( class_exists( 'TM_Testimonials_Plugin' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-cherry-testimonials.php';
}


/**
 * Plugin: Cherry Team Members (free, by Zemez)
 * @since 1.1.0
 */
if ( class_exists( 'Cherry_Team_Members' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-cherry-team-members.php';
}


/**
 * Plugin: Cherry Services List (free, by Zemez)
 * @since 1.1.0
 */
if ( class_exists( 'Cherry_Services_List' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-cherry-services-list.php';
}


/**
 * Plugin: Cherry Projects (free, by Zemez)
 * @since 1.1.0
 */
if ( class_exists( 'Cherry_Projects' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-cherry-projects.php';
}


/**
 * Plugin: TM Timline (free, by Jetimpex/ Zemez)
 * @since 1.2.0
 */
if ( defined( 'TM_TIMELINE_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-tm-timeline.php';
}


/**
 * Plugin: Cool Timeline (free, by Cool Plugins)
 * @since 1.3.2
 */
if ( defined( 'COOL_TIMELINE_VERSION_CURRENT' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-cool-timeline.php';
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
 * Plugin: Widget Importer & Exporter (free, by churchthemes.com)
 * @since 1.0.0
 */
if ( class_exists( 'Widget_Importer_Exporter' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-widget-importer-exporter.php';
}


/**
 * Plugin: Jetpack (free, by Automattic, Inc./ WordPress.com)
 * @since 1.4.2
 */
if ( ddw_tbex_is_jetpack_active() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-jetpack.php';
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
 * Plugin: Rank Math SEO (free, by Rank Math)
 * Plugins: Rank Math single feature plugins (all free, by Rank Math)
 * @since 1.4.5
 */
if ( class_exists( 'RankMath' ) ) {

	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-rankmath.php';

} else {

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
				'classes'   => array(
					'RANKMATH_SCHEMA',
					'RankMath_Monitor',
					'RankMath_Redirections',
					
				),

			)  // end array

		);

	}  // end function

	if ( ddw_tbex_detect_rankmath_single_plugins() ) {
		require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-rankmath-singles.php';
	}

}  // end if


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
 * Plugin: MainWP Child (free, by MainWP)
 * @since 1.4.0
 */
if ( defined( 'MAINWP_CHILD_URL' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-mainwp-child.php';
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
if ( class_exists( 'DspExportImportMenus' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-export-import-menus.php';
}


/**
 * Plugin: Members (free, by Justin Tadlock)
 * @since 1.0.0
 */
if ( class_exists( 'Members_Plugin' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-members.php';
}


/**
 * Plugin: Thrive Comments (Premium, by Thrive Themes)
 * @since 1.4.0
 */
if ( class_exists( 'Thrive_Comments' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-thrive-comments.php';
}


/**
 * Plugin: Easy Updates Manager (free, by Easy Updates Manager Team)
 * @since 1.4.0
 */
if ( ddw_tbex_is_easy_updates_manager_active() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-easy-updates-manager.php';
}


/**
 * Plugin: Site Health Manager (free, by Rami Yushuvaev)
 * @since 1.4.4
 */
if ( class_exists( 'Site_Health_Manager' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-site-health-manager.php';
}


/**
 * Plugin: Site Health Tool Manager (free, by William Earnhardt)
 * @since 1.4.4
 */
if ( function_exists( 'shtm_add_settings_page' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-site-health-tool-manager.php';
}
