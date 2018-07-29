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
if ( ddw_tbex_is_elementor_active() && class_exists( 'Header_Footer_Elementor' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-header-footer-builder.php' );
}


/**
 * Add-On: PopBoxes for Elementor (free, by Zulfikar Nore)
 * @since 1.0.0
 */
if ( ddw_tbex_is_elementor_active() && defined( 'MODAL_ELEMENTOR_VERSION' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-popboxes.php' );
}


/**
 * Add-On: AnyWhere Elementor - free & Pro (free/Premium, by WebTechStreet)
 * @since 1.0.0
 */
if ( ddw_tbex_is_elementor_active()
	&& ( function_exists( 'WTS_AE_load_plugin_textdomain' ) || function_exists( 'ae_pro_load_plugin_textdomain' ) )
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-anywhere-elementor.php' );
}


/**
 * Add-On: Templementor – Persistent Elementor Templates (free, by Lcweb)
 * @since 1.0.0
 */
if ( ddw_tbex_is_elementor_active() && function_exists( 'tpm_plugin_action_links' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-templementor.php' );
}


/**
 * Add-On: Portfolio for Elementor (free, by WpPug)
 * @since 1.0.0
 */
if ( ddw_tbex_is_elementor_active() && function_exists( 'elpt_setup_menu' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-portfolio-for-elementor.php' );
}


/**
 * Add-On: Elementor Custom Skin (free, by Liviu Duda)
 * @since 1.1.0
 */
if ( ddw_tbex_is_elementor_active()
	&& ddw_tbex_is_elementor_pro_active()
	&& function_exists( 'elecs_elementor_init' )
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-ele-custom-skin.php' );
}


/**
 * Add-On: Eleslider (free, by wpmasters)
 * @since 1.2.0
 */
if ( ddw_tbex_is_elementor_active() && class_exists( 'Eleslider' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-eleslider.php' );
}


/**
 * Add-On: JetThemeCore (Premium, by Zemez/ CrocoBlock)
 * @since 1.3.0
 */
if ( ddw_tbex_is_elementor_active() && ddw_tbex_is_addon_jetthemecore() ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-jetthemecore.php' );
}


/**
 * Add-On: JetWooBuilder (Premium, by Zemez/ CrocoBlock)
 * @since 1.2.0
 */
if ( ddw_tbex_is_elementor_active()
	&& class_exists( 'WooCommerce' )	// as it extends WooCommerce!
	&& class_exists( 'Jet_Woo_Builder' )
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-jetwoobuilder.php' );
}


/**
 * Add-On: DHWC Elementor (Premium, by Sitesao Team)
 * @since 1.2.0
 */
if ( ddw_tbex_is_elementor_active()
	&& class_exists( 'WooCommerce' )	// as it extends WooCommerce!
	&& defined( 'DHWC_ELEMENTOR_VERSION' )
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-dhwc-elementor.php' );
}


/**
 * Add-On: Kadence WooCommerce Elementor (free, by Kadence Themes)
 * @since 1.3.0
 */
if ( ddw_tbex_is_elementor_active()
	&& class_exists( 'WooCommerce' )	// as it extends WooCommerce!
	&& class_exists( 'Kadence_Woocommerce_Elementor' )
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-kadence-woocommerce-elementor.php' );
}


/**
 * Add-On: Vakka Addons for Elementor (Premium, by MaxxTheme)
 * @since 1.3.2
 */
if ( ddw_tbex_is_elementor_active() && defined( 'VAKKA_PLUGIN_PATH' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-vakka-addons.php' );
}


/**
 * Add-On: JetEngine (Premium, by Zemez/ CrocoBlock)
 * @since 1.3.2
 */
if ( ddw_tbex_is_elementor_active() && class_exists( 'Jet_Engine' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-jetengine.php' );
}


/**
 * Add-On: Split Test For Elementor (free, by Rocket Elements)
 * @since 1.3.2
 */
if ( ddw_tbex_is_elementor_active() && defined( 'SPLIT_TEST_FOR_ELEMENTOR_VERSION' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-splittest-for-elementor.php' );
}



/**
 * 2nd GROUP: Settings, Extras, Elements etc.
 * @since 1.0.0
 * -----------------------------------------------------------------------------
 */

/**
 * Add-On: Granular Controls for Elementor (free, by Zulfikar Nore)
 * @since 1.0.0
 */
if ( ddw_tbex_is_elementor_active() && defined( 'ELEMENTOR_CONTROLS_VERSION' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-granular-controls.php' );
}


/**
 * Add-On: Elementor Extras (Premium, by Namogo)
 * @since 1.0.0
 */
if ( ddw_tbex_is_elementor_active() && defined( 'ELEMENTOR_EXTRAS_VERSION' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-namogo-extras.php' );
}


/**
 * Add-On: Ultimate Addons for Elementor (Premium, by Brainstorm Force)
 * @since 1.0.0
 */
if ( ddw_tbex_is_elementor_active() && defined( 'UAEL_FILE' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-ultimate-addons-for-elementor.php' );
}


/**
 * Add-On: Element Pack (Premium, by BdThemes)
 * @since 1.0.0
 */
if ( ddw_tbex_is_elementor_active() && defined( 'BDTEP_VER' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-bdthemes-element-pack.php' );
}


/**
 * Add-On: PowerPack Elements (Premium, by IdeaBox Creations)
 * @since 1.0.0
 */
if ( ddw_tbex_is_elementor_active() && defined( 'POWERPACK_ELEMENTS_VER' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-powerpack-elements.php' );
}


/**
 * Add-On: Dashboard Welcome for Elementor (free, by IdeaBox Creations)
 * @since 1.3.2
 */
if ( ddw_tbex_is_elementor_active() && defined( 'IBX_DWE_VER' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-powerpack-dwe.php' );
}


/**
 * Add-On: Dynamic Content for Elementor (Premium, by Dynamic.ooo)
 * @since 1.3.2
 */
if ( ddw_tbex_is_elementor_active()
	&& ( function_exists( 'elements_dce_load' ) )
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-dynamic-content-for-elementor.php' );
}


/**
 * Add-On: Elementor Addons (free/Premium, by Livemesh)
 * @since 1.0.0
 */
if ( ddw_tbex_is_elementor_active()
	&& ( class_exists( '\LivemeshAddons\Livemesh_Elementor_Addons' ) || class_exists( '\LivemeshAddons\Livemesh_Elementor_Addons_Pro' ) )
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-livemesh-addons.php' );
}


/**
 * Add-On: Essential Elementor Addons Lite/Pro (free/Premium, by Codetic)
 * @since 1.0.0
 */
if ( ddw_tbex_is_elementor_active() && defined( 'ESSENTIAL_ADDONS_EL_PATH' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-codetic-addons.php' );
}


/**
 * Add-On: Premium Addons for Elementor (free, by Leap13)
 * @since 1.1.0
 */
if ( ddw_tbex_is_elementor_active() && function_exists( 'premium_addons_elementor_setup' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-leap13-premium-addons.php' );
}


/**
 * Add-On: Revolution for Elementor (free/Premium, by Jan Thielemann)
 * @since 1.2.0
 */
if ( ddw_tbex_is_elementor_active() && defined( 'REVOLUTION_FOR_ELEMENTOR_VERSION' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-revolution-for-elementor.php' );
}


/**
 * Add-On: Extra Privacy for Elementor (free, by Marian Heddesheimer)
 * @since 1.0.0
 */
if ( ddw_tbex_is_elementor_active() && function_exists( 'Extra_Privacy_for_Elementor' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-extra-privacy-for-elementor.php' );
}


/**
 * Add-On: Massive Addons for Elementor (free, by Blocksera)
 * @since 1.3.2
 */
if ( ddw_tbex_is_elementor_active() && class_exists( 'Massive_Elementor' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-massive-addons-for-elementor.php' );
}


/**
 * Add-On: Press Elements (free/Premium, by Press Elements & Rami Yushuvaev)
 * @since 1.1.0
 */
if ( ddw_tbex_is_elementor_active() && class_exists( 'Press_Elements' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-press-elements.php' );
}


/**
 * Add-On: Power-Ups for Elementor (free, by WpPug)
 * @since 1.1.0
 */
if ( ddw_tbex_is_elementor_active() && function_exists( 'elpug_register_settings' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-power-ups-for-elementor.php' );
}


/**
 * Add-On: JetElements (Premium, by Zemez)
 * @since 1.1.0
 */
if ( ddw_tbex_is_elementor_active() && class_exists( 'Jet_Elements' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-jetelements.php' );
}


/**
 * Add-On: JetMenu (Premium, by Zemez)
 * @since 1.1.0
 */
if ( ddw_tbex_is_elementor_active() && class_exists( 'Jet_Menu' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-jetmenu.php' );
}


/**
 * Add-On: JetBlog (Premium, by Zemez)
 * @since 1.1.0
 */
if ( ddw_tbex_is_elementor_active() && class_exists( 'Jet_Blog' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-jetblog.php' );
}


/**
 * Add-On: JetBlocks (Premium, by Zemez/ CrocoBlock)
 * @since 1.2.0
 */
if ( ddw_tbex_is_elementor_active() && class_exists( 'Jet_Blocks' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-jetblocks.php' );
}


/**
 * Add-On: JetReviews (Premium, by Zemez)
 * @since 1.1.0
 */
if ( ddw_tbex_is_elementor_active() && class_exists( 'Jet_Reviews' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-jetreviews.php' );
}


/**
 * Add-On: Total Recipe Generator (Premium, by SaurabhSharma)
 * @since 1.1.0
 */
if ( ddw_tbex_is_elementor_active() && class_exists( 'Total_Recipe_Generator_El' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-total-recipe-generator.php' );
}


/**
 * Add-On: Elements Plus! (free, by The CSSIgniter Team)
 * @since 1.1.0
 */
if ( ddw_tbex_is_elementor_active() && function_exists( 'elements_plus_dependency' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-elements-plus.php' );
}


/**
 * Add-On: WidgetKit for Elementor (free, by Themesgrove)
 * @since 1.1.0
 */
if ( ddw_tbex_is_elementor_active() && class_exists( 'WidgetKit_For_Elementor' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-widgetkit-for-elementor.php' );
}


/**
 * Add-On: PT Elementor Addons Lite (free, by ParamThemes)
 * @since 1.1.0
 */
if ( ddw_tbex_is_elementor_active() && defined( 'PT_ELEMENTOR_ADDONS_VERSION' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-pt-elementor.php' );
}


/**
 * Add-On: Natalie - Personal Theme Builder for Elementor (Premium, by XLDevelopment/ Ashraf)
 * @since 1.3.2
 */
if ( ddw_tbex_is_elementor_active() && function_exists( 'xld_bar_plugin_scripts' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-natalie.php' );
}


/**
 * Add-On: Funnelmentals (Premium) (free/Premium, by Web Disrupt)
 * @since 1.3.2
 */
if ( ddw_tbex_is_elementor_active() && class_exists( '\Web_Disrupt_Funnelmentals\WDF_Core' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-funnelmentals.php' );
}


/**
 * Add-On: Briefcase Elementor Widgets (Premium, by BriefcaseWP)
 * @since 1.3.0
 */
if ( ddw_tbex_is_elementor_active()
	&& function_exists( 'Briefcase_Elementor_Widgets' )
	&& ( class_exists( 'WooCommerce' ) || class_exists( 'Easy_Digital_Downloads' ) )	// depends on shopping plugins
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-briefcase-elementor-widgets.php' );
}


/**
 * Add-On: Elementor Addon Elements (free, by WebTechStreet)
 * @since 1.1.0
 */
if ( ddw_tbex_is_elementor_active() && defined( 'ELEMENTOR_ADDON_PATH' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-webtechstreet-addons.php' );
}


/**
 * Add-On: Elementor Addons & Templates – Sizzify Lite (free, by Themeisle)
 * @since 1.1.0
 */
if ( ddw_tbex_is_elementor_active() && class_exists( 'Elementor_Addon_Widgets' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-sizzify-lite.php' );
}


/**
 * Add-On: Orbit Fox Companion (free, by Themeisle)
 * @since 1.1.0
 */
if ( ddw_tbex_is_elementor_active() && function_exists( 'run_orbit_fox' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-orbit-fox.php' );
}


/**
 * Add-On: Archivescode Addons for Elementor (free, by Archivescode)
 * @since 1.2.0
 */
if ( ddw_tbex_is_elementor_active() && class_exists( 'Archivescode_for_Elementor' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-archivescode-addons.php' );
}


/**
 * Add-On: SJ Elementor Addon (free, by sandesh055)
 * @since 1.2.0
 */
if ( ddw_tbex_is_elementor_active() && class_exists( 'SJEaLoader' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-sj-elementor-addon.php' );
}


/**
 * Add-On: Elementor Google Map Extended (free, by InternetCSS)
 * @since 1.1.0
 */
if ( ddw_tbex_is_elementor_active() && function_exists( 'eb_google_map_extended' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-internetcss-google-map-extended.php' );
}


/**
 * Add-On: Elementor Google Map Extended Pro (Premium, by InternetCSS)
 * @since 1.3.0
 */
if ( ddw_tbex_is_elementor_active() && defined( 'eb_google_map_pro_version' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-internetcss-google-map-extended-pro.php' );
}


/**
 * Add-On: Rife Elementor Extensions & Templates (free, by Apollo13 Themes)
 * @since 1.3.2
 */
if ( ddw_tbex_is_elementor_active() && defined( 'A13REE_VERSION' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-rife-elementor-extensions-templates.php' );
}


/**
 * Add-On: Elementor Contact Form DB (free, by Sean Barton)
 *   Note: Needs Elementor Pro to be active!
 * @since 1.0.0
 */
if ( ddw_tbex_is_elementor_active()
	&& ddw_tbex_is_elementor_pro_active()
	&& function_exists( 'sb_elem_cfd_init' )
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-elementor-contact-form-db.php' );
}


/**
 * Add-On: Lenix Elementor Leads addon (free, by Lenix)
 *   Note: Needs Elementor Pro to be active!
 * @since 1.0.0
 */
if ( ddw_tbex_is_elementor_active()
	&& ddw_tbex_is_elementor_pro_active()
	&& defined( 'ELEMENTOR_LEADS_VERSION' )
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-lenix-elementor-leads-addon.php' );
}


/**
 * Add-On: Contact Form DB (free, by Michael Simpson)
 *   Note: Needs Elementor Pro to be active!
 * @since 1.2.0
 */
if ( ddw_tbex_is_elementor_active()
	&& ddw_tbex_is_elementor_pro_active()
	&& function_exists( 'CF7DBPlugin_i18n_init' )
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-cfdb.php' );
}


/**
 * Add-On: White Label Branding for Elementor (Premium, by IdeaBox Creations)
 * @since 1.2.0
 */
if ( ddw_tbex_is_elementor_active() && class_exists( 'Elementor_Whitelabel_Plugin' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-powerpack-wlbfe.php' );
}



/**
 * Conditional Hook Position for Add-Ons
 * @since 1.0.0
 * -----------------------------------------------------------------------------
 */

add_action( 'admin_bar_menu', 'ddw_tbex_addons_hook_place', 200 );
/**
 * Hook place for Add-On Plugins that provide settings, options, elements.
 *   Only displays conditionally if any of these Add-Ons are active or not.
 *   Controlled via filter 'tbex_filter_is_addon'
 *
 * @since  1.0.0
*
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_addons_hook_place() {

	if ( has_filter( 'tbex_filter_is_addon' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbex-addons',
				'parent' => 'group-pagebuilder-options',
				'title'  => esc_attr__( 'Add-Ons', 'toolbar-extras' ),
				'href'   => '',
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Elements and Options from Add-On Plugins', 'toolbar-extras' )
				)
			)
		);

	}  // end if

}  // end function