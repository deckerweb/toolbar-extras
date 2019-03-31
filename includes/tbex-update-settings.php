<?php

// includes/tbex-update-settings

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'plugins_loaded', 'ddw_tbex_plugin_check_version' );
/**
 * Update plugin's options to newest version.
 *
 * @since 1.1.0
 * @since 1.2.0 - 1.4.0 Subsequent additions for new settings.
 * @since 1.4.2 Added additional permission check.
 *
 * @uses ddw_tbex_run_plugin_activation()
 */
function ddw_tbex_plugin_check_version() {

	/**
	 * Bail early if we already on plugin version 1.4.0 or higher,
	 *   or, if current user has no permission.
	 */
	if ( ! current_user_can( 'manage_options' )
		&& version_compare( get_option( 'tbex-plugin-version' ), '1.4.0', '>=' )
	) {
		return;
	}


	/**
	 * Update new options for plugin version 1.1.0 or higher
	 * @since 1.1.0
	 * -------------------------------------------------------------------------
	 */
		$smart_tweaks_v110 = array(
			'remove_aioseo'  => 'yes',
			'rehook_nextgen' => 'no',
			'rehook_ithsec'  => 'no',
		);

		$existing_tweaks = (array) get_option( 'tbex-options-tweaks' );
		$new_tweaks      = array();

		if ( ! array_key_exists( 'remove_aioseo', $existing_tweaks )
			|| ! array_key_exists( 'rehook_nextgen', $existing_tweaks )
			|| ! array_key_exists( 'rehook_ithsec', $existing_tweaks )
		) {
			$new_tweaks = wp_parse_args( $smart_tweaks_v110, $existing_tweaks );
			update_option( 'tbex-options-tweaks', $new_tweaks );
		}


	/**
	 * Update new options for plugin version 1.2.0 or higher
	 * @since 1.2.0
	 * -------------------------------------------------------------------------
	 */
		/** New general options */
		$general_options_v120 = array(
			'display_title_attributes' => 'yes',	// on by default!
		);

		$existing_general = (array) get_option( 'tbex-options-general' );
		$new_general      = array();

		if ( ! array_key_exists( 'display_title_attributes', $existing_general )
		) {
			$new_general = wp_parse_args( $general_options_v120, $existing_general );
			update_option( 'tbex-options-general', $new_general );
		}

		/** New Smart Tweaks options */
		$smart_tweaks_v120 = array(
			'remove_user_newcontent'     => 'no',
			'remove_woo_posttypes'       => 'no',
			'rehook_wprocket'            => 'no',
			'rehook_autoptimize'         => 'no',
			'rehook_swiftperformance'    => 'no',
			'unload_td_elementor'        => 'no',
			'unload_td_toolbar_extras'   => 'no',
			'remove_elementor_wpwidgets' => 'no',
		);

		$existing_tweaks = (array) get_option( 'tbex-options-tweaks' );
		$new_tweaks      = array();

		if ( ! array_key_exists( 'remove_user_newcontent', $existing_tweaks )
			|| ! array_key_exists( 'remove_woo_posttypes', $existing_tweaks )
			|| ! array_key_exists( 'rehook_wprocket', $existing_tweaks )
			|| ! array_key_exists( 'rehook_autoptimize', $existing_tweaks )
			|| ! array_key_exists( 'rehook_swiftperformance', $existing_tweaks )
			|| ! array_key_exists( 'unload_td_elementor', $existing_tweaks )
			|| ! array_key_exists( 'unload_td_toolbar_extras', $existing_tweaks )
			|| ! array_key_exists( 'remove_elementor_wpwidgets', $existing_tweaks )
		) {
			$new_tweaks = wp_parse_args( $smart_tweaks_v120, $existing_tweaks );
			update_option( 'tbex-options-tweaks', $new_tweaks );
		}


	/**
	 * Update new options for plugin version 1.3.0 or higher
	 * @since 1.3.0
	 * -------------------------------------------------------------------------
	 */
		/** New general options */
		$general_options_v130 = array(
			'display_items_new_content'  => 'yes',	// on by default!
			'display_items_edit_content' => 'yes',	// on by default!
			'builder_links_blank'        => 'yes',	// on by default!
		);

		$existing_general = (array) get_option( 'tbex-options-general' );
		$new_general      = array();

		if ( ! array_key_exists( 'display_items_new_content', $existing_general )
			|| ! array_key_exists( 'display_items_edit_content', $existing_general )
			|| ! array_key_exists( 'builder_links_blank', $existing_general )
		) {
			$new_general = wp_parse_args( $general_options_v130, $existing_general );
			update_option( 'tbex-options-general', $new_general );
		}

		/** New Smart Tweaks options */
		$smart_tweaks_v130 = array(
			'remove_media_newcontent' => 'no',
		);

		$existing_tweaks = (array) get_option( 'tbex-options-tweaks' );
		$new_tweaks      = array();

		if ( ! array_key_exists( 'remove_media_newcontent', $existing_tweaks )
		) {
			$new_tweaks = wp_parse_args( $smart_tweaks_v130, $existing_tweaks );
			update_option( 'tbex-options-tweaks', $new_tweaks );
		}


	/**
	 * Update new options for plugin version 1.4.0 or higher
	 * @since 1.4.0
	 * -------------------------------------------------------------------------
	 */

		/** Set default builder option */
		$default_builder = 'default-none';
		if ( ddw_tbex_is_elementor_active() ) {
			$default_builder = 'elementor';
		} elseif ( ddw_tbex_is_block_editor_wanted() && ddw_tbex_use_block_editor_support() ) {
			$default_builder = 'block-editor';
		}

		/** New general options */
		$general_options_v140 = array(
			'main_item_url'              => '',
			'main_item_target'           => '_self',
			'fallback_item_icon'         => 'dashicons-text',
			/* translators: Toolbar main item, fallback if no supported Page Builder active */
			'fallback_item_name'         => _x( 'Customize', 'Toolbar main item, fallback if no supported Page Builder active', 'toolbar-extras' ),
			'fallback_item_url'          => '',
			'default_page_builder'       => $default_builder,	// 'default-none' / 'block-editor' / 'elementor'
			/* translators: Toolbar item label */
			'block_editor_name'          => esc_attr_x( 'Block Editor', 'Toolbar item label', 'toolbar-extras' ),		// "Block Editor"
			'display_items_wpcomments'   => 'yes',	// on by default!
			'use_blockeditor_support'    => 'yes',	// on by default!
			'display_blockeditor_addons' => 'yes',	// on by default!
		);

		$existing_general = (array) get_option( 'tbex-options-general' );
		$new_general      = array();

		if ( ! array_key_exists( 'main_item_url', $existing_general )
			|| ! array_key_exists( 'main_item_target', $existing_general )
			|| ! array_key_exists( 'fallback_item_icon', $existing_general )
			|| ! array_key_exists( 'fallback_item_name', $existing_general )
			|| ! array_key_exists( 'fallback_item_url', $existing_general )
			|| ! array_key_exists( 'default_page_builder', $existing_general )
			|| ! array_key_exists( 'block_editor_name', $existing_general )
			|| ! array_key_exists( 'display_items_wpcomments', $existing_general )
			|| ! array_key_exists( 'use_blockeditor_support', $existing_general )
			|| ! array_key_exists( 'display_blockeditor_addons', $existing_general )
		) {
			$new_general = wp_parse_args( $general_options_v140, $existing_general );
			update_option( 'tbex-options-general', $new_general );
		}

		/** New Smart Tweaks options */
		$smart_tweaks_v140 = array(
			'use_myaccount_tweak'        => 'no',
			'use_howdy_replace'          => 'yes',	// on by default!
			'howdy_replacement'          => esc_attr__( 'Welcome,', 'toolbar-extras' ),
			'custom_welcome'             => '',
			'custom_myaccount_url'       => '',
			'custom_myaccount_target'    => '_self',
			'remove_easy_um'             => 'yes',
			'rehook_elementor_inspector' => 'no',
			'rehook_stylepress'          => 'no',
			'rehook_yoastseo'            => 'no',
			'rehook_seopress'            => 'no',
			'display_elementor_tbuilder' => 'yes',
			'display_elementor_popups'   => 'yes',
		);

		$existing_tweaks = (array) get_option( 'tbex-options-tweaks' );
		$new_tweaks      = array();

		if ( ! array_key_exists( 'use_myaccount_tweak', $existing_tweaks )
			|| ! array_key_exists( 'use_howdy_replace', $existing_tweaks )
			|| ! array_key_exists( 'howdy_replacement', $existing_tweaks )
			|| ! array_key_exists( 'custom_welcome', $existing_tweaks )
			|| ! array_key_exists( 'custom_myaccount_url', $existing_tweaks )
			|| ! array_key_exists( 'custom_myaccount_target', $existing_tweaks )
			|| ! array_key_exists( 'remove_easy_um', $existing_tweaks )
			|| ! array_key_exists( 'rehook_elementor_inspector', $existing_tweaks )
			|| ! array_key_exists( 'rehook_stylepress', $existing_tweaks )
			|| ! array_key_exists( 'rehook_yoastseo', $existing_tweaks )
			|| ! array_key_exists( 'rehook_seopress', $existing_tweaks )
			|| ! array_key_exists( 'display_elementor_tbuilder', $existing_tweaks )
			|| ! array_key_exists( 'display_elementor_popups', $existing_tweaks )
		) {
			$new_tweaks = wp_parse_args( $smart_tweaks_v140, $existing_tweaks );
			update_option( 'tbex-options-tweaks', $new_tweaks );
		}

		/** New Development options */
		$development_v140 = array(
			'use_element_ids'    => 'yes',	// on by default!
			'use_uploader_menus' => 'yes',	// on by default!
		);

		$existing_development = (array) get_option( 'tbex-options-development' );
		$new_development      = array();

		if ( ! array_key_exists( 'use_element_ids', $existing_development )
			|| ! array_key_exists( 'use_uploader_menus', $existing_development )
		) {
			$new_development = wp_parse_args( $development_v140, $existing_development );
			update_option( 'tbex-options-development', $new_development );
		}


	/**
	 * After updating all new setting options, update the version setting to the
	 *   latest version number.
	 *
	 * @since 1.1.0
	 */
	if ( TBEX_PLUGIN_VERSION !== get_option( 'tbex-plugin-version' ) ) {
		update_option( 'tbex-plugin-version', TBEX_PLUGIN_VERSION );
	}

}  // end function
