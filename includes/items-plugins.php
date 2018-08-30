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
 * Plugin: Central Color Palette
 * @since 1.0.0
 */
if ( class_exists( 'kt_Central_Palette' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-central-color-palette.php' );
}


/**
 * Plugin: Simple CSS (free, by Tom Usborne)
 * @since 1.0.0
 */
if ( function_exists( 'simple_css_admin_menu' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-simple-css.php' );
}


/**
 * Plugin: SiteOrigin CSS (free, by SiteOrigin)
 * @since 1.0.0
 */
if ( defined( 'SOCSS_VERSION' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-siteorigin-css.php' );
}


/**
 * Plugin: Simple Custom CSS (free, by John Regan, Danny Van Kooten)
 * @since 1.0.0
 */
if ( defined( 'SCCSS_OPTION' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-simple-custom-css.php' );
}


/**
 * Plugin: Custom CSS Pro (free, by WaspThemes)
 * @since 1.0.0
 */
if ( function_exists( 'ccp_frame_loader' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-custom-css-pro.php' );
}


/**
 * Plugin: WP Show Posts CSS (free, by Tom Usborne)
 * @since 1.1.0
 */
if ( defined( 'WPSP_VERSION' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-wp-show-posts.php' );
}


/**
 * Plugin: Front Page Builder (free, by Themes4WP)
 * @since 1.3.0
 */
if ( defined( 'FPB_SAMPLE_PLUGIN_URL' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-front-page-builder.php' );
}


/**
 * Plugin: Customizer Export Import (free, by The Beaver Builder Team)
 * @since 1.0.0
 */
if ( class_exists( 'CEI_Core' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-customizer-export-import.php' );
}


/**
 * Plugin: One Click Demo Import (free, by ProteusThemes)
 * @since 1.0.0
 */
if ( class_exists( 'OCDI_Plugin' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-oneclick-demo-import.php' );
}


/**
 * Plugin: Code Snippets (free, by Shea Bunge)
 * @since 1.0.0
 */
if ( defined( 'CODE_SNIPPETS_VERSION' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-code-snippets.php' );
}


/**
 * Plugin: PHP code snippets (Insert PHP) (free, by Webcraftic)
 * @since 1.0.0
 */
if ( defined( 'WINP_SNIPPETS_POST_TYPE' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-php-code-snippets.php' );
}


/**
 * Plugin: Schema Pro (Premium, by Brainstorm Force)
 * @since 1.3.2
 */
if ( class_exists( 'BSF_AIOSRS_Pro_Admin' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-wp-schema-pro.php' );
}


/**
 * Plugin: All In One Schema Rich Snippets (free, by Brainstorm Force)
 * @since 1.3.2
 */
if ( class_exists( 'RichSnippets' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-bsf-aiosrs.php' );
}


/**
 * Plugin: Schema (free, by Hesham)
 * @since 1.3.2
 */
if ( class_exists( 'Schema_WP' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-hesham-schema.php' );
}


/**
 * Plugin: Add From Server (free, by Dion Hulse)
 * @since 1.0.0
 */
if ( defined( 'ADD_FROM_SERVER_WP_REQUIREMENT' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-add-from-server.php' );
}


/**
 * Plugin: Simple Custom CSS and JS (free/Pro, by Diana Burduja)
 * @since 1.0.0
 */
if ( class_exists( 'CustomCSSandJS' ) || class_exists( 'CustomCSSandJSpro' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-simple-custom-css-js.php' );
}


/**
 * Plugin: 404page (free, by Peter Raschendorfer)
 * @since 1.0.0
 */
if ( function_exists( 'pp_404_is_active' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-404page.php' );
}


/**
 * Plugin: Testimonial Rotator (free, by Hal Gatewood)
 * @since 1.2.0
 */
if ( function_exists( 'testimonial_rotator_setup' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-testimonial-rotator.php' );
}


/**
 * Plugin: Extender Pro (Premium, by Cobalt Apps)
 * @since 1.1.0
 */
if ( ddw_tbex_is_cobalt_supported_theme( 'extender-pro' ) && function_exists( 'extender_pro_compatible_theme_check' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-cobalt-extender-pro.php' );
}


/**
 * Plugin: Themer Pro (Premium, by Cobalt Apps)
 * @since 1.1.0
 */
if ( ddw_tbex_is_cobalt_supported_theme( 'themer-pro' ) && function_exists( 'themer_pro_compatible_theme_check' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-cobalt-themer-pro.php' );
}


/**
 * Plugin: Freelancer DevKit (Premium, by Cobalt Apps)
 * @since 1.1.0
 */
if ( ( 'freelancer' === basename( get_template_directory() ) )			// check for Freelancer Parent Theme
	&& function_exists( 'freelancer_devkit_compatible_theme_check' )	// check for Freelancer DevKit Plugin
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-cobalt-freelancer-devkit.php' );
}


/**
 * Plugin: OceanWP Sticky Header (free, by Oren Hahiashvili)
 * @since 1.3.0
 */
if ( class_exists( 'sticky_header_oceanwp' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-oceanwp-sticky-header.php' );
}


/**
 * Plugin: GP Social Share (free, by Jon Mather)
 * @since 1.3.0
 */
if ( function_exists( 'gp_social_options_page' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-gp-social-share.php' );
}


/**
 * Plugin: GP Back To Top (free, by Mai Dong Giang (Peter Mai))
 * @since 1.3.0
 */
if ( class_exists( 'GP_Back_To_Top' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-gp-back-to-top.php' );
}


/**
 * Plugin: Church Content (free, by churchthemes.com)
 * @since 1.3.0
 */
if ( class_exists( 'Church_Theme_Content' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-ct-church-content.php' );
}



/**
 * 2nd GROUP: Miscellaneous stuff
 * @since 1.0.0
 * -----------------------------------------------------------------------------
 */

/**
 * Plugin: Health Check & Troubleshooting (free, by The WordPress.org community)
 * @since 1.0.0
 */
if ( class_exists( 'Health_Check' ) || defined( 'HEALTH_CHECK_PLUGIN_VERSION' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-health-check.php' );
}


/**
 * Plugin: WPMU Dev Dashboard (Premium, by WPMU DEV)
 * @since 1.3.2
 */
if ( class_exists( 'WPMUDEV_Dashboard' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-wpmudev-dashboard.php' );
}


/**
 * Plugin: GitHub Updater (free, by Andy Fragen)
 * @since 1.0.0
 */
if ( in_array( 'github-updater/github-updater.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-github-updater.php' );
}


/**
 * Dev Add-On: Local Development (by Andy Fragen)
 * @since 1.0.0
 */
if ( ddw_tbex_display_items_dev_mode()
	&& in_array( 'local-development/local-development.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-local-development.php' );
}


/**
 * Plugin: WooCommerce (by Automattic)
 * @since 1.0.0
 */
if ( class_exists( 'WooCommerce' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-woocommerce.php' );
}


/**
 * Plugin: Popup Maker (by WP Popup Maker & Daniel Iser)
 * @since 1.0.0
 */
if ( class_exists( 'Popup_Maker' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-popup-maker.php' );
}


/**
 * Plugin: Delightful Downloads (free, by Ashley Rich)
 * @since 1.0.0
 */
if ( class_exists( 'Delightful_Downloads' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-delightful-downloads.php' );
}


/**
 * Plugin: Download Monitor (free, by Never5)
 * @since 1.0.0
 */
if ( defined( 'DLM_VERSION' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-download-monitor.php' );
}


/**
 * Plugin: Thirsty Affiliates (free, by Rymera Web Co.)
 * @since 1.0.0
 */
if ( class_exists( 'ThirstyAffiliates' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-thirsty-affiliates.php' );
}


/**
 * Plugin: Simple URLs (free, by StudioPress)
 * @since 1.0.0
 */
if ( class_exists( 'SimpleURLs' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-simple-urls.php' );
}


/**
 * Plugin: Easy Digital Downloads (free)
 * @since 1.0.0
 */
if ( class_exists( 'Easy_Digital_Downloads' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-edd.php' );
}


/**
 * Plugin: WP Portfolio (Premium, by Brainstorm Force)
 * @since 1.3.2
 */
if ( defined( 'ASTRA_PORTFOLIO_VER' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-wp-portfolio.php' );
}


/**
 * Plugin: Portfolio Post Type (free, by Devin Price)
 * @since 1.3.2
 */
if ( function_exists( 'portfolio_post_type_init' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-cpt-portfolio.php' );
}


/**
 * Plugin: Gravity Forms (Premium, by Rocketgenius, Inc.)
 * @since 1.0.0
 */
if ( defined( 'RG_CURRENT_VIEW' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-gravity-forms.php' );
}


/**
 * Plugin: WPForms Lite (free, by WPForms)
 * @since 1.3.1
 */
if ( class_exists( 'WPForms' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-wpforms.php' );
}


/**
 * Plugin: Formidable Forms (Premium, by Strategy11)
 * @since 1.3.1
 */
if ( function_exists( 'load_formidable_forms' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-formidable-forms.php' );
}


/**
 * Plugin: Ninja Forms (free, by The WP Ninjas)
 * @since 1.3.1
 */
if ( class_exists( 'Ninja_Forms' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-ninja-forms.php' );
}


/**
 * Plugin: Caldera Forms (Premium, by Caldera Labs)
 * @since 1.3.1
 */
if ( defined( 'CFCORE_PATH' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-caldera-forms.php' );
}


/**
 * Plugin: Contact Form 7 (free, by Takayuki Miyoshi)
 * @since 1.3.1
 */
if ( defined( 'WPCF7_VERSION' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-contact-form-7.php' );
}


/**
 * Plugin: Quform (Premium, by ThemeCatcher)
 * @since 1.3.1
 */
if ( defined( 'QUFORM_VERSION' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-quform.php' );
}


/**
 * Plugin: Everest Forms (free, by WPEverest)
 * @since 1.3.2
 */
if ( class_exists( 'EverestForms' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-everest-forms.php' );
}


/**
 * Plugin: FormCraft 3 (Premium, by nCrafts)
 * @since 1.3.2
 */
if ( function_exists( 'formcraft3_activate' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-formcraft.php' );
}


/**
 * Plugin: ARForms (Premium, by Repute InfoSystems)
 * @since 1.3.2
 */
if ( defined( 'ARFPLUGINTITLE' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-arforms.php' );
}


/**
 * Plugin: MailChimp for WordPress (free, by ibericode)
 * @since 1.3.2
 */
if ( class_exists( 'MC4WP_Form_Manager' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-mailchimp-for-wp.php' );
}


/**
 * Plugin: HappyForms (free, by The Theme Foundry)
 * @since 1.3.2
 */
if ( defined( 'HAPPYFORMS_VERSION' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-happyforms.php' );
}


/**
 * Plugin: Smart Slider 3 (free/Premium, by Nextend)
 * @since 1.0.0
 */
if ( defined( 'NEXTEND_SMARTSLIDER_3_BASENAME' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-smart-slider.php' );
}


/**
 * Plugin: TablePress (free, by Tobias Bäthge)
 * @since 1.0.0
 */
if ( class_exists( 'TablePress' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-tablepress.php' );
}


/**
 * Plugin: Envira Gallery Lite/Pro (free/Premium, by Envira Gallery Team)
 * @since 1.1.0
 */
if ( class_exists( 'Envira_Gallery_Lite' ) || class_exists( 'Envira_Gallery' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-envira-gallery.php' );
}


/**
 * Plugin: Soliloquy Sliders Lite/Pro (free/Premium, by Soliloquy Team)
 * @since 1.1.0
 */
if ( class_exists( 'Soliloquy_Lite' ) || class_exists( 'Soliloquy' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-soliloquy-sliders.php' );
}


/**
 * Plugin: FooGallery (free, by FooPlugins)
 * @since 1.1.0
 */
if ( defined( 'FOOGALLERY_VERSION' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-foogallery.php' );
}


/**
 * Plugin: MaxGalleria (free, by Max Foundry)
 * @since 1.1.0
 */
if ( class_exists( 'MaxGalleria' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-maxgalleria.php' );
}


/**
 * Plugin: Cherry Testimonials (free, by Zemez)
 * @since 1.1.0
 */
if ( class_exists( 'TM_Testimonials_Plugin' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-cherry-testimonials.php' );
}


/**
 * Plugin: Cherry Team Members (free, by Zemez)
 * @since 1.1.0
 */
if ( class_exists( 'Cherry_Team_Members' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-cherry-team-members.php' );
}


/**
 * Plugin: Cherry Services List (free, by Zemez)
 * @since 1.1.0
 */
if ( class_exists( 'Cherry_Services_List' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-cherry-services-list.php' );
}


/**
 * Plugin: Cherry Projects (free, by Zemez)
 * @since 1.1.0
 */
if ( class_exists( 'Cherry_Projects' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-cherry-projects.php' );
}


/**
 * Plugin: TM Timline (free, by Jetimpex/ Zemez)
 * @since 1.2.0
 */
if ( defined( 'TM_TIMELINE_VERSION' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-tm-timeline.php' );
}


/**
 * Plugin: Cool Timeline (free, by Cool Plugins)
 * @since 1.3.2
 */
if ( defined( 'COOL_TIMELINE_VERSION_CURRENT' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-cool-timeline.php' );
}



/**
 * Plugin: Regenerate Thumbnails (free, by Alex Mills)
 * @since 1.0.0
 */
if ( class_exists( 'RegenerateThumbnails' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-regenerate-thumbnails.php' );
}


/**
 * Plugin: Content Aware Sidebars (free, by Joachim Jensen - DEV Institute)
 * @since 1.3.1
 */
if ( class_exists( 'CAS_App' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-content-aware-sidebars.php' );
}


/**
 * Plugin: Lightweight Sidebar Manager (free, by Brainstorm Force)
 * @since 1.2.0
 */
if ( defined( 'BSF_SB_POST_TYPE' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-bsf-sidebar-manager.php' );
}


/**
 * Plugin: Widget Options (free/Premium, by Phpbits Creative Studio)
 * @since 1.2.0
 */
if ( class_exists( 'WP_Widget_Options' ) ) {		// same class for free + Pro!
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-widget-options.php' );
}


/**
 * Plugin: Widget Importer & Exporter (free, by churchthemes.com)
 * @since 1.0.0
 */
if ( class_exists( 'Widget_Importer_Exporter' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-widget-importer-exporter.php' );
}


/**
 * Plugin: SEOPress (Pro) (free/ Premium, by Benjamin Denis)
 * @since 1.3.2
 */
if ( defined( 'SEOPRESS_VERSION' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-seopress.php' );
}


/**
 * Plugin: All-in-One WP Migration (free, by ServMask)
 * @since 1.0.0
 */
if ( defined( 'AI1WM_PLUGIN_BASENAME' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-aiowpm.php' );
}


/**
 * Plugin: UpdraftPlus (free, by Team Updraft, David Anderson)
 * @since 1.0.0
 */
if ( defined( 'UPDRAFTPLUS_DIR' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-updraftplus.php' );
}


/**
 * Plugin: Duplicator (free, by Snap Creek)
 * @since 1.0.0
 */
if ( defined( 'DUPLICATOR_VERSION' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-duplicator.php' );
}


/**
 * Plugin: Duplicator Pro (Premium, by Snap Creek)
 * @since 1.3.2
 */
if ( defined( 'DUPLICATOR_PRO_VERSION' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-duplicator-pro.php' );
}


/**
 * Plugin: BackWPup (free, by Inpsyde GmbH)
 * @since 1.3.2
 */
if ( class_exists( 'BackWPup' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-backwpup.php' );
}


/**
 * Plugin: WP-Staging (free, by WP-Staging & Rene Hermenau)
 * Plugin: WP-Stagig Pro (Premium, by WP-Staging & Rene Hermenau)
 * @since 1.0.0
 */
if ( defined( 'WPSTG_PLUGIN_DIR' ) || defined( 'WPSTGPRO_VERSION' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-wpstaging.php' );
}


/**
 * Plugin: Members (free, by Justin Tadlock)
 * @since 1.0.0
 */
if ( class_exists( 'Members_Plugin' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-members.php' );
}


/**
 * Plugin: OptinMonster API (free/Premium, by OptinMonster Team/ Retyp, LLC)
 * @since 1.2.0
 */
if ( class_exists( 'OMAPI' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-optinmonster.php' );
}


/**
 * Plugin: Convert Pro (Premium, by Brainstorm Force)
 * @since 1.2.0
 */
if ( function_exists( 'cp_load_convertpro' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-convertpro.php' );
}


/**
 * Plugin: Convert Plus (Premium, by Brainstorm Force)
 * @since 1.2.0
 */
if ( class_exists( 'Convert_Plug' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-convertplus.php' );
}


/**
 * Plugin: Hustle (free, by WPMU DEV)
 * @since 1.3.1
 */
if ( class_exists( 'Hustle_Init' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-hustle.php' );
}


/**
 * Plugin: Bloom (Premium, by Elegant Themes)
 * @since 1.3.1
 */
if ( class_exists( 'ET_Bloom' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-bloom.php' );
}