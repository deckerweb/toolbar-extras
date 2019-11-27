<?php

// includes/items-plugins-elementor-addons

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
 * 1st GROUP: Creative Content:
 * @since 1.0.0
 * -----------------------------------------------------------------------------
 */

/**
 * Add-On: Header Footer for Elementor (free, by Brainstorm Force)
 * @since 1.0.0
 */
if ( class_exists( 'Header_Footer_Elementor' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-header-footer-builder.php';
}


/**
 * Add-On: PopBoxes for Elementor (free, by Zulfikar Nore)
 * @since 1.0.0
 */
if ( defined( 'MODAL_ELEMENTOR_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-popboxes.php';
}


/**
 * Add-On: AnyWhere Elementor - free & Pro (free/Premium, by WebTechStreet)
 * @since 1.0.0
 */
if ( function_exists( 'WTS_AE_load_plugin_textdomain' ) || function_exists( 'ae_pro_load_plugin_textdomain' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-anywhere-elementor.php';
}


/**
 * Add-On: StylePress for Elementor (free, by David Baker (dtbaker))
 * @since 1.4.0
 */
if ( ddw_tbex_is_stylepress_elementor_active() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-stylepress-for-elementor.php';
}


/**
 * Add-On: Templementor – Persistent Elementor Templates (free, by Lcweb)
 * @since 1.0.0
 */
if ( function_exists( 'tpm_plugin_action_links' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-templementor.php';
}


/**
 * Add-On: Portfolio for Elementor (free, by WpPug)
 * @since 1.0.0
 */
if ( function_exists( 'elpt_setup_menu' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-portfolio-for-elementor.php';
}


/**
 * Add-On: Elementor Custom Skin (free, by Liviu Duda)
 * @since 1.1.0
 */
if ( ddw_tbex_is_elementor_pro_active()
	&& function_exists( 'elecs_elementor_init' )
) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-ele-custom-skin.php';
}


/**
 * Add-On: Eleslider (free, by wpmasters)
 * @since 1.2.0
 */
if ( class_exists( 'Eleslider' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-eleslider.php';
}


/**
 * Add-On: GT3 Elementor Photo Gallery (free, by GT3 Themes)
 * @since 1.4.0
 */
if ( class_exists( '\GT3\GalleryElementor\Loader' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-gt3-elementor-photo-gallery.php';
}


/**
 * Add-On: Opal Widgets for Elementor (free, by wpopal)
 * @since 1.4.0
 */
if ( class_exists( 'OSF_Elementor_Loader' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-opal-widgets-for-elementor.php';
}


/**
 * Add-On: Opal Megamenu for Elementor (free, by wpopal)
 * @since 1.4.0
 */
if ( class_exists( 'OSF_Megamenu' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-opal-megamenu-for-elementor.php';
}


/**
 * Add-On: Clever Mega Menu for Elementor (free, by CleverSoft)
 * @since 1.4.3
 */
if ( class_exists( '\CleverSoft\WpPlugin\Cmm4E\Plugin' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-clever-mega-menu.php';
}


/**
 * Add-On: JetThemeCore (Premium, by Zemez Jet/ Crocoblock)
 * @since 1.3.0
 */
if ( ddw_tbex_is_addon_jetthemecore() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-jetthemecore.php';
}


/**
 * Add-On: JetWooBuilder (Premium, by Zemez Jet/ Crocoblock)
 * @since 1.2.0
 */
if ( ddw_tbex_is_woocommerce_active()	// as it extends WooCommerce!
	&& class_exists( 'Jet_Woo_Builder' )
) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-jetwoobuilder.php';
}


/**
 * Add-On: JetCompareWishlist (Premium, by Zemez Jet/ Crocoblock)
 * @since 1.4.2
 */
if ( ddw_tbex_is_woocommerce_active()	// as it extends WooCommerce!
	&& class_exists( 'Jet_CW' )
) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-jetcomparewishlist.php';
}


/**
 * Add-On: JetWooProductGallery (Premium, by Zemez Jet/ Crocoblock)
 * @since 1.4.0
 */
if ( ddw_tbex_is_woocommerce_active()	// as it extends WooCommerce!
	&& class_exists( 'Jet_Woo_Product_Gallery' )
) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-jetwooproductgallery.php';
}


/**
 * Add-On: DHWC Elementor (Premium, by Sitesao Team)
 * @since 1.2.0
 */
if ( ddw_tbex_is_woocommerce_active()	// as it extends WooCommerce!
	&& defined( 'DHWC_ELEMENTOR_VERSION' )
) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-dhwc-elementor.php';
}


/**
 * Add-On: Kadence WooCommerce Elementor (free, by Kadence Themes)
 * @since 1.3.0
 */
if ( ddw_tbex_is_woocommerce_active()	// as it extends WooCommerce!
	&& class_exists( 'Kadence_Woocommerce_Elementor' )
) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-kadence-woocommerce-elementor.php';
}


/**
 * Add-On: DT WooCommerce Page Builder for Elementor (Premium, by DawnThemes)
 * @since 1.4.3
 */
if ( ddw_tbex_is_woocommerce_active()	// as it extends WooCommerce!
	&& defined( 'DTWCBE_VERSION' )
) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-woocommerce-pbfe.php';
}


/**
 * Add-On: JetWoo Widgets for Elementor (Premium, by Crocoblock/ Zemez Jet)
 * @since 1.4.0
 */
if ( ddw_tbex_is_woocommerce_active()	// as it extends WooCommerce!
	&& class_exists( 'Jet_Woo_Widgets' )
) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-jetwoowidgets.php';
}


/**
 * Add-On: Vakka Addons for Elementor (Premium, by MaxxTheme)
 * @since 1.3.2
 */
if ( defined( 'VAKKA_PLUGIN_PATH' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-vakka-addons.php';
}


/**
 * Add-On: JetPopup (Premium, by Zemez Jet/ Crocoblock)
 * @since 1.4.0
 */
if ( class_exists( 'Jet_Popup' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-jetpopup.php';
}


/**
 * Add-On: JetEngine (Premium, by Zemez Jet/ Crocoblock)
 * @since 1.3.2
 */
if ( class_exists( 'Jet_Engine' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-jetengine.php';
}


/**
 * Add-On: JetSmartFilters (Premium, by Zemez Jet/ Crocoblock)
 * @since 1.4.0
 */
if ( class_exists( 'Jet_Smart_Filters' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-jetsmartfilters.php';
}


/**
 * Add-On: Split Test For Elementor (free, by Rocket Elements)
 * @since 1.3.2
 */
if ( defined( 'SPLIT_TEST_FOR_ELEMENTOR_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-splittest-for-elementor.php';
}


/**
 * Add-On: RabbitBuilder Global Central JS CSS (free, by RabbitBuilder)
 * @since 1.4.2
 */
if ( defined( 'RBJSCSS_PLUGIN_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-rabbitbuilder-js-css.php';
}


/**
 * Add-On: AnalogWP Templates (free, by AnalogWP)
 * @since 1.4.2
 */
if ( class_exists( '\Analog\Analog_Templates' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-analog-templates.php';
}


/**
 * Add-On: Layouts for Elementor (free, by Giraphix Creative)
 * @since 1.4.2
 */
if ( class_exists( 'Layout_For_Elementor' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-layouts-for-elementor.php';
}


/**
 * Add-On: ToolKit for Elementor (Premium, by ToolKit for Elementor)
 * @since 1.4.5
 */
if ( defined( 'TOOLKIT_FOR_ELEMENTOR_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-toolkit-for-elementor.php';
}


/**
 * Add-On: ElementsKit Lite/Pro (free/Premium, by wpmet)
 * @since 1.4.7
 */
if ( class_exists( 'ElementsKit' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-elements-kit.php';
}


/**
 * Add-On: The Pack Addons (Premium, by XLDevelopment/ Web Angon/ Ashraf)
 * @since 1.4.7
 */
if ( function_exists( 'thepack_tb_load_reqfiles' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-thepack-addons.php';
}



/**
 * 2nd GROUP: Settings, Extras, Elements etc.
 * @since 1.0.0
 * -----------------------------------------------------------------------------
 */

/**
 * Add-On: Custom Icons for Elementor (free, by Michael Bourne)
 * @since 1.4.0
 */
if ( class_exists( 'ECIcons' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-custom-icons-for-elementor.php';
}


/**
 * Add-On: Bestfreebie Elementor Icons (free, by Bestfreebie)
 * @since 1.4.3
 */
if ( class_exists( 'Bestfreebie_elementor_icons' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-bestfreebie-elementor-icons.php';
}


/**
 * Add-On: Granular Controls for Elementor (free, by Zulfikar Nore)
 * @since 1.0.0
 */
if ( defined( 'ELEMENTOR_CONTROLS_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-granular-controls.php';
}


/**
 * Add-On: Elementor Extras (Premium, by Namogo)
 * @since 1.0.0
 */
if ( defined( 'ELEMENTOR_EXTRAS_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-namogo-extras.php';
}


/**
 * Add-On: Ultimate Addons for Elementor (Premium, by Brainstorm Force)
 * @since 1.0.0
 */
if ( defined( 'UAEL_FILE' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-ultimate-addons-for-elementor.php';
}


/**
 * Add-On: Element Pack (Premium, by BdThemes)
 * Add-On: Element Pack Lite (free, by BdThemes)
 * @since 1.0.0
 * @since 1.4.7 Integrated Lite version of Add-On.
 */
if ( defined( 'BDTEP_VER' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-bdthemes-element-pack.php';
}


/**
 * Add-On: Prime Slider Lite (free, by BdThemes)
 * @since 1.4.8
 */
if ( defined( 'BDTPS_VER' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-bdthemes-prime-slider.php';
}


/**
 * Add-On: PowerPack Elements (Premium, by IdeaBox Creations)
 * @since 1.0.0
 */
if ( defined( 'POWERPACK_ELEMENTS_VER' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-powerpack-elements.php';
}


/**
 * Add-On: PowerPack Lite for Elementor (free, by IdeaBox Creations)
 * @since 1.4.0
 */
if ( defined( 'POWERPACK_ELEMENTS_LITE_VER' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-powerpack-elements-lite.php';
}


/**
 * Add-On: Dashboard Welcome for Elementor (free, by IdeaBox Creations)
 * @since 1.3.2
 */
if ( defined( 'IBX_DWE_VER' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-powerpack-dwe.php';
}


/**
 * Add-On: Dynamic Content for Elementor (Premium, by Dynamic.ooo)
 * @since 1.3.2
 */
if ( function_exists( 'elements_dce_load' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-dynamic-content-for-elementor.php';
}


/**
 * Add-On: Elementor Addons (free/Premium, by Livemesh)
 * @since 1.0.0
 */
if ( class_exists( '\LivemeshAddons\Livemesh_Elementor_Addons' ) || class_exists( '\LivemeshAddons\Livemesh_Elementor_Addons_Pro' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-livemesh-addons.php';
}


/**
 * Add-On: Essential Elementor Addons Lite/Pro (free/Premium, by Codetic)
 * @since 1.0.0
 */
if ( defined( 'EAEL_PLUGIN_VERSION' ) || defined( 'EAEL_PRO_PLUGIN_VERSION' ) || defined( 'ESSENTIAL_ADDONS_EL_PATH' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-codetic-addons.php';
}


/**
 * Add-On: Premium Addons for Elementor (free, by Leap13)
 * @since 1.1.0
 */
if ( defined( 'PREMIUM_ADDONS_VERSION' ) || function_exists( 'premium_addons_elementor_setup' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-leap13-premium-addons.php';
}


/**
 * Add-On: HT Mega - Ultimate Addons for Elementor (free, by HT Plugins)
 * @since 1.4.2
 */
if ( defined( 'HTMEGA_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-ht-mega.php';
}


/**
 * Add-On: The Plus Addons for Elementor Lite/Pro (free/Premium, by POSIMYTH Themes)
 * @since 1.4.3
 */
if ( defined( 'THEPLUS_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-theplus-addons.php';
}


/**
 * Add-On: Unlimited Elements for Elementor Lite/Pro (free/Premium, by Blox Themes)
 * @since 1.4.3
 */
if ( defined( 'BLOXBUILDER_INC' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-unlimited-elements.php';
}


/**
 * Add-On: Revolution for Elementor (free/Premium, by Jan Thielemann)
 * @since 1.2.0
 */
if ( defined( 'REVOLUTION_FOR_ELEMENTOR_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-revolution-for-elementor.php';
}


/**
 * Add-On: Extra Privacy for Elementor (free, by Marian Heddesheimer)
 * @since 1.0.0
 */
if ( function_exists( 'Extra_Privacy_for_Elementor' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-extra-privacy-for-elementor.php';
}


/**
 * Add-On: Smart Fonts for Elementor (free, by codevision)
 * @since 1.4.2
 */
if ( defined( 'ESF_PLUGIN_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-smart-fonts-for-elementor.php';
}


/**
 * Add-On: Massive Addons for Elementor (free, by Blocksera)
 * @since 1.3.2
 */
if ( class_exists( 'Massive_Elementor' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-massive-addons-for-elementor.php';
}


/**
 * Add-On: Press Elements (free/Premium, by Press Elements & Rami Yushuvaev)
 * @since 1.1.0
 */
if ( class_exists( 'Press_Elements' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-press-elements.php';
}


/**
 * Add-On: Power-Ups for Elementor (free, by WpPug)
 * @since 1.1.0
 */
if ( function_exists( 'elpug_register_settings' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-power-ups-for-elementor.php';
}


/**
 * Add-On: JetElements (Premium, by Zemez Jet/ Crocoblock)
 * @since 1.1.0
 */
if ( class_exists( 'Jet_Elements' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-jetelements.php';
}


/**
 * Add-On: JetMenu (Premium, by Zemez Jet/ Crocoblock)
 * @since 1.1.0
 */
if ( class_exists( 'Jet_Menu' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-jetmenu.php';
}


/**
 * Add-On: JetBlog (Premium, by Zemez Jet/ Crocoblock)
 * @since 1.1.0
 */
if ( class_exists( 'Jet_Blog' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-jetblog.php';
}


/**
 * Add-On: JetBlocks (Premium, by Zemez Jet/ Crocoblock)
 * @since 1.2.0
 */
if ( class_exists( 'Jet_Blocks' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-jetblocks.php';
}


/**
 * Add-On: JetTabs (Premium, by Zemez Jet/ Crocoblock)
 * @since 1.4.5
 */
if ( class_exists( 'Jet_Tabs' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-jettabs.php';
}


/**
 * Add-On: JetTricks (Premium, by Zemez Jet/ Crocoblock)
 * @since 1.4.9
 */
if ( class_exists( 'Jet_Tricks' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-jettricks.php';
}


/**
 * Add-On: JetReviews (Premium, by Zemez Jet/ Crocoblock)
 * @since 1.1.0
 */
if ( class_exists( 'Jet_Reviews' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-jetreviews.php';
}


/**
 * Add-On: JetWidgets for Elementor (free, by Crocoblock/ Zemez Jet)
 * @since 1.4.0
 */
if ( class_exists( 'Jet_Widgets' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-jetwidgets.php';
}


/**
 * Add-On: Piotnet Addons For Elementor (PAFE) (Pro) (free/Premium, by Luong Huu Phuoc (Louis Hufer))
 * @since 1.3.9
 */
if ( defined( 'PAFE_VERSION' ) || defined( 'PAFE_PRO_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-piotnet-addons.php';
}


/**
 * Add-On: Essentail Premium Addons for Elementor (free, by wpcodestar)
 * @since 1.4.2
 */
if ( function_exists( 'epa_ccn_widgets_reg' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-essential-paofe.php';
}


/**
 * Add-On: Total Recipe Generator (Premium, by SaurabhSharma)
 * @since 1.1.0
 */
if ( class_exists( 'Total_Recipe_Generator_El' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-total-recipe-generator.php';
}


/**
 * Add-On: PDF Generator for Elementor (free, by RedefiningTheWeb)
 * @since 1.4.2
 */
if ( defined( 'RTW_PGAEPA_NAME_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-pdf-generator-for-elementor.php';
}


/**
 * Add-On: Elements Plus! (free, by The CSSIgniter Team)
 * @since 1.1.0
 */
if ( function_exists( 'elements_plus_dependency' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-elements-plus.php';
}


/**
 * Add-On: WidgetKit for Elementor (free, by Themesgrove)
 * @since 1.1.1
 */
if ( class_exists( 'WidgetKit_For_Elementor' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-widgetkit-for-elementor.php';
}


/**
 * Add-On: Exclusive Addons for Elementor (free, by DevsCred)
 * @since 1.4.2
 */
if ( class_exists( 'Exclusive_Addons_Elementor' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-exclusive-addons.php';
}


/**
 * Add-On: Widgets For Elementor (free, by maxster)
 * @since 1.4.0
 */
if ( function_exists( 'wfe_ccn_widgets_reg' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-maxster-addons.php';
}


/**
 * Add-On: PT Elementor Addons Lite (free, by ParamThemes)
 * @since 1.1.0
 */
if ( defined( 'PT_ELEMENTOR_ADDONS_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-pt-elementor.php';
}


/**
 * Add-On: Sina Extension for Elementor (free, by shaonsina)
 * @since 1.4.2
 */
if ( defined( 'SINA_EXT_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-sina-extension.php';
}


/**
 * Add-On: WPB Elementor Addons (free, by wpbean)
 * @since 1.4.2
 */
if ( class_exists( 'WPB_Elementor_Addons' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-wpb-elementor-addons.php';
}


/**
 * Add-On: Natalie - Personal Theme Builder for Elementor (Premium, by XLDevelopment/ Ashraf)
 * @since 1.3.2
 */
if ( function_exists( 'xld_bar_plugin_scripts' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-natalie.php';
}


/**
 * Add-On: Funnelmentals (Premium) (free/Premium, by Web Disrupt)
 * @since 1.3.2
 */
if ( class_exists( '\Web_Disrupt_Funnelmentals\WDF_Core' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-funnelmentals.php';
}


/**
 * Add-On: WunderWP (free, by Artbees)
 * @since 1.4.9
 */
if ( class_exists( 'WunderWP' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-wunderwp.php';
}


/**
 * Add-On: Briefcase Elementor Widgets (Premium, by BriefcaseWP)
 * @since 1.3.0
 */
if ( function_exists( 'Briefcase_Elementor_Widgets' )
	&& ( ddw_tbex_is_woocommerce_active() || ddw_tbex_is_edd_active() )	// depends on shopping plugins
) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-briefcase-elementor-widgets.php';
}


/**
 * Add-On: WooLentor (free, by HasThemes)
 * Add-On: WooLentor Pro (Premium, by HasThemes)
 * @since 1.4.3
 * @since 1.4.5 Added WooLentor Pro version.
 */
if ( ( defined( 'WOOLENTOR_VERSION' ) || defined( 'WOOLENTOR_VERSION_PRO' ) )
	&& ddw_tbex_is_woocommerce_active()		// depends on WooCommerce
) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-woolentor.php';
}


/**
 * Add-On: HT Builder (free, by HasThemes)
 * Add-On: HT Builder Pro (Premium, by HasThemes)
 * @since 1.4.7
 */
if ( ( defined( 'HTBUILDER_VERSION' ) || defined( 'HTBUILDER_VERSION_PRO' ) ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-ht-builder.php';
}


/**
 * Add-On: Elementor Addon Elements (free, by WebTechStreet)
 * @since 1.1.0
 */
if ( defined( 'ELEMENTOR_ADDON_PATH' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-webtechstreet-addons.php';
}


/**
 * Add-On: Elementor Addons (free, by Oxilab/ biplob018)
 * @since 1.4.9
 */
if ( defined( 'SA_EL_ADDONS_PLUGIN_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-oxilab-addons.php';
}


/**
 * Add-On: Extensions For Elementor (free, by mayanksdudakiya)
 * @since 1.4.9
 */
if ( defined( 'ELEMENTOR_EXTENSIONS_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-extensions-for-elementor.php';
}


/**
 * Add-On: Elementor Addons & Templates – Sizzify Lite (free, by Themeisle)
 * @since 1.1.0
 */
if ( class_exists( 'Elementor_Addon_Widgets' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-sizzify-lite.php';
}


/**
 * Add-On: Orbit Fox Companion (free, by Themeisle)
 * @since 1.1.0
 */
if ( function_exists( 'run_orbit_fox' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-orbit-fox.php';
}


/**
 * Add-On: Archivescode Addons for Elementor (free, by Archivescode)
 * @since 1.2.0
 */
if ( class_exists( 'Archivescode_for_Elementor' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-archivescode-addons.php';
}


/**
 * Add-On: SJ Elementor Addon (free, by sandesh055)
 * @since 1.2.0
 */
if ( class_exists( 'SJEaLoader' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-sj-elementor-addon.php';
}


/**
 * Add-On: Elementor Google Map Extended (free, by InternetCSS)
 * @since 1.1.0
 */
if ( function_exists( 'eb_google_map_extended' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-internetcss-google-map-extended.php';
}


/**
 * Add-On: Elementor Google Map Extended Pro (Premium, by InternetCSS)
 * @since 1.3.0
 */
if ( defined( 'eb_google_map_pro_version' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-internetcss-google-map-extended-pro.php';
}


/**
 * Add-On: Rife Elementor Extensions & Templates (free, by Apollo13 Themes)
 * @since 1.3.2
 */
if ( defined( 'A13REE_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-rife-elementor-extensions-templates.php';
}


/**
 * Add-On: Flexible Elementor Panel (free, by Alex Shram/ Flexible-Elementor-Panel.com)
 * @since 1.4.3
 */
if ( function_exists( 'flexible_elementor_panel_load' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-flexible-elementor-panel.php';
}


/**
 * Add-On: Multidomain Support for Elementor (free, by Alex Zappa)
 * @since 1.4.3
 */
if ( defined( 'MULTIDOMAIN_SUPPORT_FOR_ELEMENTOR_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-multidomain-support-elementor.php';
}


/**
 * Add-On: Formentor – Elementor Form Plus (free, by Tziki Trop)
 * @since 1.4.0
 */
if ( ( ddw_tbex_is_elementor_pro_active() || ddw_tbex_is_cf7_active() )		// needs Elementor Pro and/or CF7!
	&& class_exists( 'CTGS_client_to_google_sheet' )
) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-formentor.php';
}


/**
 * Add-On: Elementor Contact Form DB (free, by Sean Barton)
 *   Note: Needs Elementor Pro to be active!
 * @since 1.0.0
 */
if ( ddw_tbex_is_elementor_pro_active()
	&& function_exists( 'sb_elem_cfd_init' )
) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-elementor-contact-form-db.php';
}


/**
 * Add-On: Lenix Elementor Leads addon (free, by Lenix)
 *   Note: Needs Elementor Pro to be active!
 * @since 1.0.0
 */
if ( ddw_tbex_is_elementor_pro_active()
	&& defined( 'ELEMENTOR_LEADS_VERSION' )
) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-lenix-elementor-leads-addon.php';
}


/**
 * Add-On: Elementor Forms (Premium, by Elementor Forms)
 *   Note: Needs only Elementor (free) to be active!
 * @since 1.4.2
 */
if ( function_exists( 'eforms_on_activate' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-elementor-forms.php';
}


/**
 * Add-On: MetForm (free, by WpMet)
 *   Note: Needs only Elementor (free) to be active!
 * @since 1.4.7
 */
if ( class_exists( '\MetForm\Plugin' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-metform.php';
}


/**
 * Add-On: Contact Form DB (free, by Michael Simpson)
 *   Note: Needs Elementor Pro to be active!
 * @since 1.2.0
 */
if ( ddw_tbex_is_elementor_pro_active()
	&& function_exists( 'CF7DBPlugin_i18n_init' )
) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-forms/items-cfdb.php';
}


/**
 * Add-On: White Label Branding for Elementor (Premium, by IdeaBox Creations)
 * @since 1.2.0
 */
if ( class_exists( 'Elementor_Whitelabel_Plugin' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-powerpack-wlbfe.php';
}


/**
 * Add-On: Elementor White Label Branding (free, by Ozan Canakli)
 * @since 1.4.0
 */
if ( defined( 'ELEMENTOR_WL_BRANDING_VER' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-elementor-white-label-branding.php';
}


/**
 * Add-On: Elementor White Label (free, by Nam Truong, PhoenixDigi Việt Nam)
 * Add-On: Elementor White Label Pro (Premium, by Nam Truong, PhoenixDigi Việt Nam)
 * @since 1.4.0
 */
if ( defined( 'ELEMENTOR_WHITE_LABEL_VER' ) || defined( 'ELEMENTOR_WHITE_LABEL_PRO_VER' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-elementor-white-label.php';
}


/**
 * Add-On: JetDesignKit (Premium, by Zemez Jet/ Crocoblock)
 * @since 1.4.0
 */
if ( class_exists( 'Jet_Design_Kit' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-jetdesignkit.php';
}


/**
 * Add-On: Social Addons for Elementor (Lite) (free, by WebEmpire)
 * @since 1.4.5
 */
if ( class_exists( 'Social_Elementor_Loader' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-social-addons-for-elementor.php';
}


/**
 * Add-On: Advamentor (free, by Themexa)
 * @since 1.4.3
 */
if ( function_exists( 'advamentor_init' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-advamentor.php';
}


/**
 * Add-On: Ruvuv Extension for Elementor (free, by Ruvuv)
 * @since 1.4.8
 */
if ( defined( 'RUVUV_EXPAND_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-ruvuv-extension-for-elementor.php';
}


/**
 * Add-On: Happy Elementor Addons (free, by HappyMonster/ weDevs)
 * @since 1.4.8
 */
if ( defined( 'HAPPY_ADDONS_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-happy-addons.php';
}


/**
 * Add-On: WPHobby Addons for Elementor (free, by WPHobby)
 * @since 1.4.9
 */
if ( defined( 'WHAE_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-wphobby-addons.php';
}



/**
 * Conditional Hook Position for Add-Ons
 * @since 1.0.0
 * -----------------------------------------------------------------------------
 */

if ( ! function_exists( 'ddw_tbex_addons_hook_place' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/hook-place-addons.php';
}
