<?php

// includes/items-plugins-block-editor-addons

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
 * @since 1.4.0
 * -----------------------------------------------------------------------------
 */

/**
 * Plugin: Builder Template Categories (free, by David Decker - DECKERWEB)
 * @since 1.4.0
 */
if ( ddw_tbex_is_btcplugin_active() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-builder-template-categories.php';
}


/**
 * Plugin: Block Layouts (free, by Jordy Meow)
 * @since 1.4.0
 */
if ( class_exists( 'Meow_MBL_Core' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-block-layouts.php';
}


/**
 * Plugin: Block Lab (free, by Block Lab)
 * @since 1.4.0
 */
if ( function_exists( 'block_lab' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-block-lab.php';
}


/**
 * Plugin: Advanced Custom Blocks (free, by Rheinard Korf, Luke Carbis, Rob Stinson)
 * @since 1.4.0
 */
if ( function_exists( 'advanced_custom_blocks' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-advanced-custom-blocks.php';
}


/**
 * Plugin: Lazy Blocks (free, by nK)
 * @since 1.4.0
 */
if ( class_exists( 'LazyBlocks' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-lazy-blocks.php';
}


/**
 * Plugin: Ghost Kit (free, by nK)
 * @since 1.4.2
 */
if ( class_exists( 'GhostKit' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-ghostkit.php';
}


/**
 * Plugin: Gutenberg Templates (Block Templates) (free, by Konstantinos Galanakis)
 * @since 1.4.0
 */
if ( class_exists( '\Gutenberg_Templates\Controllers\Gutenberg_Templates' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-block-templates.php';
}


/**
 * Plugin: Placeholder Block (free, by Square Happiness)
 * @since 1.4.0
 */
if ( class_exists( 'SQHP_Placeholder_Init' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-placeholder-block.php';
}


/**
 * Plugin: Advanced Gutenberg (free, by JoomUnited)
 * @since 1.4.0
 */
if ( class_exists( 'AdvancedGutenbergMain' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-advanced-gutenberg.php';
}


/**
 * Plugin: Elegant Blocks (free, by ravisakya, cyclonetheme)
 * @since 1.4.0
 */
if ( defined( 'ELEGANTBLOCKS_PLUGIN_URL' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-elegant-blocks.php';
}


/**
 * Plugin: A/B Testing for WordPress (free, by CleverNode)
 * @since 1.4.2
 */
if ( class_exists( '\ABTestingForWP\RegisterREST' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-ab-testing.php';
}


/**
 * Plugin: Custom Color Palette for Gutenberg (free, by ThemeZee)
 * @since 1.4.0
 */
if ( class_exists( 'ThemeZee_Custom_Color_Palette' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-custom-color-palette.php';
}


/**
 * Plugin: WP Block Ink (free, by Dave Ryan)
 * @since 1.4.0
 */
if ( function_exists( 'wp_block_ink_is_enabled' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-wp-block-ink.php';
}


/**
 * Plugin: WooCommerce Custom Email Blocks (free, by VillaTheme)
 * @since 1.4.2
 */
if ( ddw_tbex_is_woocommerce_active() && defined( 'VI_WCEB_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-wc-email-blocks.php';
}



/**
 * 2nd GROUP: Settings, Extras, Elements etc. (Add-On type)
 * @since 1.4.0
 * -----------------------------------------------------------------------------
 */

/**
 * Plugin: Custom Fields for Gutenberg (free, by Jeff Starr)
 * @since 1.4.0
 */
if ( class_exists( 'G7G_CFG_CustomFields' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-custom-fields-for-gutenberg.php';
}


/**
 * Plugin: Advanced Gutenberg Blocks (free, by Maxime Bernard-Jaquet)
 * @since 1.4.0
 */
if ( class_exists( '\AdvancedGutenbergBlocks\AdvancedGutenbergBlocks' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-advanced-gutenberg-blocks.php';
}


/**
 * Plugin: Unregister Gutenberg Blocks (free, by Luke Kowalski)
 * @since 1.4.0
 */
if ( function_exists( 'ugb_unregister_gutenberg_blocks_init' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-unregister-gutenberg-blocks.php';
}


/**
 * Plugin: Gutenberg Manager (free, by unCommons Team)
 * @since 1.4.0
 */
if ( function_exists( 'gm_check_gutenberg' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-gutenberg-manager.php';
}


/**
 * Plugin: Disable Gutenberg Blocks (free, by Danny Cooper)
 * @since 1.4.0
 */
if ( class_exists( 'Disable_Gutenberg_Blocks' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-disable-gutenberg-blocks.php';
}


/**
 * Plugin: Ultimate Addons for Gutenberg (free, by Brainstorm Force)
 * @since 1.4.0
 */
if ( class_exists( 'UAGB_Loader' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-ultimate-addons-for-gutenberg.php';
}


/**
 * Plugin: Kadence Blocks - Gutenberg Page Builder Toolkit (free, by Kadence Themes)
 * @since 1.4.0
 */
if ( defined( 'KT_BLOCKS_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-kadence-blocks.php';
}


/**
 * Plugin: Stackable Gutenberg Blocks (free, by Gambit Technologies, Inc.)
 * @since 1.4.0
 */
if ( defined( 'STACKABLE_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-stackable.php';
}


/**
 * Plugin: Premium Blocks for Gutenberg (free, by Leap13)
 * @since 1.4.0
 */
if ( defined( 'PREMIUM_BLOCKS_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-premium-blocks-for-gutenberg.php';
}


/**
 * Plugin: Stag Blocks (free, by Codestag)
 * @since 1.4.0
 */
if ( function_exists( 'sgb_compatibility_check' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-stag-blocks.php';
}


/**
 * Plugin: Ultimate Blocks (free, by Imtiaz Rayhan)
 * @since 1.4.0
 */
if ( defined( 'ULTIMATE_BLOCKS_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-ultimate-blocks.php';
}


/**
 * Plugin: Cosmic Blocks (free, by Cosmic WP)
 * @since 1.4.2
 */
if ( defined( 'COSMIC_BLOCKS_PLUGIN_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-cosmic-blocks.php';
}

/**
 * Plugin: Bootstrap Blocks for WP Editor (free, by Virgial Berveling)
 * @since 1.4.2
 */
if ( defined( 'GUTENBERGBOOTSTRAP_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-bootstrap-blocks.php';
}


/**
 * Plugin: WPBlocks (free, by WPBlocks)
 * @since 1.4.0
 */
if ( class_exists( 'WPBlocks' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-wpblocks.php';
}


/**
 * Plugin: WP Block Pack (free, by Falcon Theme)
 * @since 1.4.2
 */
if ( class_exists( 'WP_Block_Pack' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-wp-block-pack.php';
}


/**
 * Plugin: Qubely Blocks (free, by Themeum)
 * @since 1.4.2
 */
if ( defined( 'QUBELY_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-qubely-blocks.php';
}


/**
 * Plugin: Block Options (free, by Phpbits Creative Studio)
 * @since 1.4.0
 */
if ( class_exists( 'BLOCKOPTS_Block_Options' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-block-options.php';
}


/**
 * Plugin: Enable Gutenberg Theme Support (free, by Israel Escuer, Jose Angel Vidania)
 * @since 1.4.0
 */
if ( function_exists( 'egts_load_plugin_textdomain' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-enable-gutenberg-theme-support.php';
}


/**
 * Plugin: Theme Support for Gutenberg (free, by wpweaver)
 * @since 1.4.0
 */
if ( function_exists( 'tsg_plugins_loaded' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-theme-support-gutenberg.php';
}


/**
 * Plugin: Guten-bubble (free, by Chronoir.net)
 * @since 1.4.2
 */
if ( class_exists( 'GutenBubble' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-guten-bubble.php';
}


/**
 * Plugin: GutenBeGone (free, by Lee Rickler)
 * @since 1.4.0
 */
if ( function_exists( 'GBG_block_settings_settings_init' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-gutenbegone.php';
}


/**
 * Plugin: Amazon Block (free, by Ryo Utsunomiya)
 * @since 1.4.0
 */
if ( function_exists( 'make_sure_amazon_block_is_loaded_after_gutenberg' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-amazon-block.php';
}


/**
 * Plugin: Blocks Google Map (free, by Govind Kumar)
 * @since 1.4.0
 */
if ( class_exists( 'Blocks_Google_Maps' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-blocks-google-map.php';
}


/**
 * Plugin: Atomic Blocks (free, by Atomic Blocks/ Array Themes)
 * @since 1.4.0
 */
if ( function_exists( 'atomic_blocks_loader' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-atomic-blocks.php';
}


/**
 * Plugin: Editor Blocks (free, by Editor Blocks/ Danny Cooper)
 * @since 1.4.0
 */
if ( function_exists( 'editor_blocks_activate' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-editor-blocks.php';
}


/**
 * Plugin: UltraBlocks Free - Advanced Blocks for WP Gutenberg (free, by FestPlugins)
 * @since 1.4.0
 */
if ( class_exists( '\fest_ua_gutenberg\Gutenberg' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-ultrablocks.php';
}


/**
 * Plugin: Easy Blocks for Gutenberg (free, by Liton Arefin)
 * @since 1.4.2
 */
if ( defined( 'UGB_PLUGIN_DIR_URL' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-easy-blocks.php';
}


/**
 * Plugin: WE Blocks (free, by wordpresteem)
 * @since 1.4.0
 */
if ( function_exists( 'we_blocks_activate' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-we-blocks.php';
}


/**
 * Plugin: Easy Blocks Pro (free, by Seerox)
 * @since 1.4.2
 */
if ( function_exists( 'srxgb_register_block_category' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-easy-blocks-pro.php';
}


/**
 * Plugin: Caxton (free, by PootlePress)
 * @since 1.4.0
 */
if ( function_exists( 'caxton_init' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-caxton.php';
}


/**
 * Plugin: Cloud Blocks (free, by Frontkom - Fouad Yousefi)
 * @since 1.4.0
 */
if ( class_exists( '\CloudBlocks\CloudBlocks' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/block-editor-addons/items-cloud-blocks.php';
}



/**
 * Conditional Hook Position for Add-Ons
 * @since 1.0.0
 * -----------------------------------------------------------------------------
 */

if ( ! function_exists( 'ddw_tbex_addons_hook_place' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/hook-place-addons.php';
}

add_action( 'admin_bar_menu', 'ddw_tbex_addons_hook_place_block_editor', 200 );
/**
 * Add Block Editor (Gutenberg) specific sub group at the Add-Ons hook place.
 *
 * @since  1.4.0
*
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_addons_hook_place_block_editor() {

	if ( has_filter( 'tbex_filter_is_addon' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-tbex-addons-blockeditor',
				'parent' => 'tbex-addons'
			)
		);

	}  // end if

}  // end function
