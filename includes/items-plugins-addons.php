<?php

//items-plugins-addons

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
 * Add-On: Header Footer for Elementor (free, by BrainstormForce)
 * @since 1.0.0
 */
if ( ddw_tbex_is_elementor_active() && class_exists( 'Header_Footer_Elementor' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-header-footer-builder.php' );

}  // end if


/**
 * Add-On: PopBoxes for Elementor (free, by Zulfikar Nore)
 * @since 1.0.0
 */
if ( ddw_tbex_is_elementor_active() && defined( 'MODAL_ELEMENTOR_VERSION' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-popboxes.php' );

}  // end if


/**
 * Add-On: AnyWhere Elementor - free & Pro (free/Premium, by WebTechStreet)
 * @since 1.0.0
 */
if ( ddw_tbex_is_elementor_active() && function_exists( 'WTS_AE_load_plugin_textdomain' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-anywhere-elementor.php' );

}  // end if


/**
 * Add-On: Templementor – Persistent Elementor Templates (free, by Lcweb)
 * @since 1.0.0
 */
if ( ddw_tbex_is_elementor_active() && function_exists( 'tpm_plugin_action_links' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-templementor.php' );

}  // end if


/**
 * Add-On: Portfolio for Elementor (free, by WpPug)
 * @since 1.0.0
 */
if ( ddw_tbex_is_elementor_active() && function_exists( 'elpt_setup_menu' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-portfolio-for-elementor.php' );

}  // end if



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

}  // end if


/**
 * Add-On: Elementor Extras (Premium, by Namogo)
 * @since 1.0.0
 */
if ( ddw_tbex_is_elementor_active() && defined( 'ELEMENTOR_EXTRAS_VERSION' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-namogo-extras.php' );

}  // end if


/**
 * Add-On: Ultimate Addons for Elementor (Premium, by Brainstorm Force)
 * @since 1.0.0
 */
if ( ddw_tbex_is_elementor_active() && defined( 'UAEL_FILE' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-ultimate-addons-for-elementor.php' );

}  // end if


/**
 * Add-On: Element Pack (Premium, by BdThemes)
 * @since 1.0.0
 */
if ( ddw_tbex_is_elementor_active() && defined( 'BDTEP_VER' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-bdthemes-element-pack.php' );

}  // end if


/**
 * Add-On: PowerPack Elements (Premium, by IdeaBox Creations)
 * @since 1.0.0
 */
if ( ddw_tbex_is_elementor_active() && defined( 'POWERPACK_ELEMENTS_VER' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-powerpack-elements.php' );

}  // end if


/**
 * Add-On: Elementor Addons (free/Premium, by Livemesh)
 * @since 1.0.0
 */
if ( ddw_tbex_is_elementor_active()
	&& ( class_exists( '\LivemeshAddons\Livemesh_Elementor_Addons' ) || class_exists( '\LivemeshAddons\Livemesh_Elementor_Addons_Pro' ) )
) {

	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-livemesh-addons.php' );

}  // end if


/**
 * Add-On: Essential Elementor Addons Lite/Pro (free/Premium, by Codetic)
 * @since 1.0.0
 */
if ( ddw_tbex_is_elementor_active() && defined( 'ESSENTIAL_ADDONS_EL_PATH' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-codetic-addons.php' );

}  // end if


/**
 * Add-On: Extra Privacy for Elementor (free, by Marian Heddesheimer)
 * @since 1.0.0
 */
if ( ddw_tbex_is_elementor_active() && function_exists( 'Extra_Privacy_for_Elementor' ) ) {

	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-addons/items-extra-privacy-for-elementor.php' );

}  // end if


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

}  // end if


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

}  // end if



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