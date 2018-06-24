<?php

// includes/admin/tbex-settings

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Default values of the plugin's General options.
 *
 * @since  1.0.0
 *
 * @return array strings Parsed args of default options.
 */
function ddw_tbex_default_options_general() {

	/** Set the default values */
	$tbex_default_options = array(

		/** Tab: General */
		'main_item_icon'              => 'dashicons-text',							// Dashicon \f478
		/* translators: Toolbar item label (Toolbar Extras main item) */
		'main_item_name'              => esc_attr__( 'Build', 'toolbar-extras' ),	// "Build"
		'main_item_priority'          => 71,										// directly after "New Content" section

		/* translators: Regular Toolbar item label */
		'elementor_name'              => esc_attr_x( 'Elementor', 'regular Toolbar item', 'toolbar-extras' ),	// "Elementor"
		
		'display_items_resources'     => 'yes',
		'display_items_theme'         => 'yes',
		'display_items_plugins'       => 'yes',
		'display_items_addons'        => 'yes',
		'display_items_new_content'   => 'yes',
		'display_items_site_group'    => 'yes',
		'display_items_edit_content'  => 'yes',
		'display_items_edit_menus'    => 'yes',
		'display_items_user_group'    => 'yes',
		'display_items_tbex_settings' => 'yes',

		'display_items_demo_import'   => 'yes',
		'demo_import_icon'            => 'dashicons-visibility',	// Dashicon \f177

		'display_title_attributes'    => 'yes',						// shown by default
		'external_links_blank'        => 'yes',						// always open in new tab/ window
		'builder_links_blank'         => 'yes',						// always open in new tab/ window

		'tbex_tbmenu_priority'        => 9999,						// last thing of the left part, hopefully
		'tbex_tbmenu_icon'            => '',						// none, of course!

	);  // end of array

	$tbex_defaults = wp_parse_args(
		get_option( 'tbex-options-general' ),
		apply_filters(
			'tbex_filter_default_options_general',
			$tbex_default_options
		)
	);

	/** Return the general settings defaults */
	return $tbex_defaults;

}  // end function


/**
 * Default values of the plugin's Smart Tweaks options.
 *
 * @since  1.0.0
 *
 * @return array strings Parsed args of default options.
 */
function ddw_tbex_default_options_smart_tweaks() {

	/** Set the default values */
	$tbex_default_options = array(

		/** Tab: Smart Tweaks */
		'toolbar_front_color'        => 'no',		// do not touch by default

		'use_web_group'              => 'no',		// let user decide

		'remove_wp_logo'             => 'no',		// do not touch by default
		'remove_front_customizer'    => 'no',		// do not touch by default
		'remove_media_newcontent'    => 'no',		// do not touch by default
		'remove_user_newcontent'     => 'no',		// do not touch by default

		'remove_updraftplus'         => 'yes',		// remove by default, as their default makes no sense
		'remove_members'             => 'no',		// do not touch by default
		'remove_cobaltapps'          => 'no',		// do not touch by default
		'remove_customcsspro'        => 'no',		// do not touch by default
		'remove_apspider'            => 'no',		// do not touch by default
		'remove_aioseo'              => 'yes',		// remove by default
		'remove_mstba_siteextgroup'  => 'yes',		// remove by default
		'remove_woo_posttypes'       => 'no',		// do not touch by default

		'rehook_gravityforms'        => 'no',		// do not touch GF by default
		'rehook_smartslider'         => 'no',		// do not touch SS3 by default
		'rehook_nextgen'             => 'no',		// do not touch NextGen by default
		'rehook_ithsec'              => 'no',		// do not touch iThemes Security by default
		'rehook_wprocket'            => 'no',		// do not touch WP Rocket by default
		'rehook_autoptimize'         => 'no',		// do not touch Autoptimize by default
		'rehook_swiftperformance'    => 'no',		// do not touch Swift by default

		'unload_td_elementor'        => 'no',		// translations loaded by default
		'unload_td_toolbar_extras'   => 'no',		// translations loaded by default

		'remove_elementor_wpwidgets' => 'no'		// do not touch by default

	);  // end of array

	$tbex_defaults = wp_parse_args(
		get_option( 'tbex-options-tweaks' ),
		apply_filters(
			'tbex_filter_default_options_tweaks',
			$tbex_default_options
		)
	);

	/** Return the general settings defaults */
	return $tbex_defaults;

}  // end function


/**
 * Default values of the plugin's Development options.
 *
 * @since  1.0.0
 *
 * @return array strings Parsed args of default options.
 */
function ddw_tbex_default_options_development() {

	/** Set the default values */
	$tbex_default_options = array(

		/** Tab: Development */
		'is_local_dev'                => 'auto',					// setting is on automatic mode by default, as the magic detection works in background
		'local_dev_bg_color'          => '#0073aa',					// a nice blue :)
		'local_dev_viewport'          => 1030,						// in pixel
		'local_dev_icon'              => 'dashicons-warning',		// Dashicon \f534
		/* translators: Toolbar notice text for local dev environmet */
		'local_dev_name'              => esc_attr__( 'Local Development Website', 'toolbar-extras' ),

		'use_dev_mode'                => 'no',						// disabled by default
		/* translators: Toolbar item label */
		'rapid_dev_name'              => esc_attr__( 'Rapid Dev', 'toolbar-extras' ),
		'rapid_dev_icon'              => 'dashicons-editor-code',	// Dashicon \f475

	);  // end of array

	$tbex_defaults = wp_parse_args(
		get_option( 'tbex-options-development' ),
		apply_filters(
			'tbex_filter_default_options_development',
			$tbex_default_options
		)
	);

	/** Return the general settings defaults */
	return $tbex_defaults;

}  // end function


add_action( 'admin_init', 'ddw_tbex_register_settings_general', 10 );
/**
 * Load plugin's settings for settings tab "General Settings".
 *
 * @since 1.0.0
 *
 * @uses  ddw_tbex_default_options_general()
 */
function ddw_tbex_register_settings_general() {

	/** If options do not exist (on first run), update them with default values */
	if ( ! get_option( 'tbex-options-general' ) ) {
		update_option( 'tbex-options-general', ddw_tbex_default_options_general() );
	}

	/** Settings args */
	$tbex_settings_args = array( 'sanitize_callback' => 'ddw_tbex_validate_settings_general' );

	/** Register options group for General tab */
	register_setting(
		'tbex_group_general',	// option group
		'tbex-options-general',	// options ID in database
		$tbex_settings_args		// args - see: https://developer.wordpress.org/reference/functions/register_setting/
	);

		/** General: 1st section */
		$tbex_section_main_item = sprintf(
			'<h3 class="tbex-settings-section first">%1$s: &#x00BB;%2$s&#x00AB;</h3>',
			__( 'The Main Item', 'toolbar-extras' ),
			ddw_tbex_string_main_item()
		);

		add_settings_section( 
			'tbex-section-main-item',						// id (settings section)
			$tbex_section_main_item,						// headline
			'ddw_tbex_settings_section_info_main_item',		// heading description
			'tbex_group_general'							// settings page ID via add_options_page()
		);

			add_settings_field(
				'main_item_icon',								// field name (key)
				__( 'Icon of Main Item', 'toolbar-extras' ),	// title of setting field
				'ddw_tbex_settings_cb_main_item_icon',          // callback (rendering)
				'tbex_group_general',							// registered setting ID via "register_setting()"
				'tbex-section-main-item'						// ID of settings section
			);

			add_settings_field(
				'main_item_name',
				__( 'Name of Main Item', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_main_item_name',
				'tbex_group_general',
				'tbex-section-main-item'
			);

			add_settings_field(
				'main_item_priority',
				__( 'Priority of Main Item', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_main_item_priority',
				'tbex_group_general',
				'tbex-section-main-item'
			);

		/** General: 2nd section */
		add_settings_section( 
			'tbex-section-elementor',
			'<h3 class="tbex-settings-section">' . __( 'Page Builder Name', 'toolbar-extras' ) . '</h3>',
			'ddw_tbex_settings_section_info_elementor',
			'tbex_group_general'
		);

			add_settings_field(
				'elementor_name',
				__( 'Name of Elementor', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_elementor_name',
				'tbex_group_general',
				'tbex-section-elementor'
			);

		/** General: 3rd section */
		add_settings_section( 
			'tbex-section-display',
			'<h3 class="tbex-settings-section">' . __( 'Which Items to Display?', 'toolbar-extras' ) . '</h3>',
			'ddw_tbex_settings_section_info_display',
			'tbex_group_general'
		);

			add_settings_field(
				'display_items_resources',
				__( 'Resource Items', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_display_items_resources',
				'tbex_group_general',
				'tbex-section-display'
			);

			add_settings_field(
				'display_items_theme',
				__( 'Theme Items', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_display_items_theme',
				'tbex_group_general',
				'tbex-section-display'
			);

			add_settings_field(
				'display_items_plugins',
				__( 'Plugins Items', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_display_items_plugins',
				'tbex_group_general',
				'tbex-section-display'
			);

			add_settings_field(
				'display_items_addons',
				__( 'Add-Ons Items', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_display_items_addons',
				'tbex_group_general',
				'tbex-section-display'
			);

			add_settings_field(
				'display_items_new_content',
				__( 'New Content Items', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_display_items_new_content',
				'tbex_group_general',
				'tbex-section-display'
			);

			add_settings_field(
				'display_items_site_group',
				__( 'Site Group Items', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_display_items_site_group',
				'tbex_group_general',
				'tbex-section-display'
			);

			add_settings_field(
				'display_items_edit_content',
				__( 'View/ Edit Content Items', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_display_items_edit_content',
				'tbex_group_general',
				'tbex-section-display'
			);

			add_settings_field(
				'display_items_edit_menus',
				__( 'List Edit Menu Items', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_display_items_edit_menus',
				'tbex_group_general',
				'tbex-section-display'
			);

			add_settings_field(
				'display_items_user_group',
				__( 'User Group Items', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_display_items_user_group',
				'tbex_group_general',
				'tbex-section-display'
			);

			add_settings_field(
				'display_items_tbex_settings',
				__( 'Toolbar Extras Settings Items', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_display_items_tbex_settings',
				'tbex_group_general',
				'tbex-section-display'
			);

		/** General: 4th section */
		add_settings_section( 
			'tbex-section-demos',
			'<h3 class="tbex-settings-section">' . __( 'Demo Import/ Sites Browser', 'toolbar-extras' ) . '</h3>',
			'ddw_tbex_settings_section_info_demo_import',
			'tbex_group_general'
		);

			add_settings_field(
				'display_items_demo_import',
				__( 'Display Demo Import Items', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_display_items_demo_import',
				'tbex_group_general',
				'tbex-section-demos',
				array( 'class' => 'tbex-setting-display-items-demo-import' )
			);

			add_settings_field(
				'demo_import_icon',
				__( 'Icon Before the Text', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_demo_import_icon',
				'tbex_group_general',
				'tbex-section-demos',
				array( 'class' => 'tbex-setting-demo-import-icon' )
			);

		/** General: 5th section */
		add_settings_section( 
			'tbex-section-links',
			'<h3 class="tbex-settings-section">' . __( 'Links Behavior', 'toolbar-extras' ) . '</h3>',
			'ddw_tbex_settings_section_info_links',
			'tbex_group_general'
		);

			add_settings_field(
				'display_link_attributes',
				__( 'Show Link Title Attributes (Tooltips) In the Toolbar', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_display_title_attributes',
				'tbex_group_general',
				'tbex-section-links'
			);

			add_settings_field(
				'external_links_blank',
				__( 'Open External Links in New Tab/ Window?', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_external_links_blank',
				'tbex_group_general',
				'tbex-section-links'
			);

			add_settings_field(
				'builder_links_blank',
				__( 'Open Create With Builder Links in New Tab/ Window?', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_builder_links_blank',
				'tbex_group_general',
				'tbex-section-links'
			);

		/** General: 6th section */
		add_settings_section( 
			'tbex-section-tbexmenu',
			'<h3 class="tbex-settings-section">' . __( 'Admin Toolbar Menu', 'toolbar-extras' ) . '</h3>',
			'ddw_tbex_settings_section_info_tbexmenu',
			'tbex_group_general'
		);

			add_settings_field(
				'tbex_tbmenu_priority',
				__( 'Priority of this Toolbar Menu', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_tbex_tbmenu_priority',
				'tbex_group_general',
				'tbex-section-tbexmenu'
			);

			add_settings_field(
				'tbex_tbmenu_icon',
				__( 'Icon Before the Menu', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_tbex_tbmenu_icon',
				'tbex_group_general',
				'tbex-section-tbexmenu'
			);

}  // end function



add_action( 'admin_init', 'ddw_tbex_register_settings_smart_tweaks', 10 );
/**
 * Load plugin's settings for settings tab "Smart Tweaks".
 *
 * @since 1.0.0
 *
 * @uses  ddw_tbex_default_options_smart_tweaks()
 */
function ddw_tbex_register_settings_smart_tweaks() {

	/** If options do not exist (on first run), update them with default values */
	if ( ! get_option( 'tbex-options-tweaks' ) ) {
		update_option( 'tbex-options-tweaks', ddw_tbex_default_options_smart_tweaks() );
	}

	/** Settings args */
	$tbex_settings_args = array( 'sanitize_callback' => 'ddw_tbex_validate_settings_smart_tweaks' );

	/** Register options group for Smart Tweaks tab */
	register_setting(
		'tbex_group_smart_tweaks',
		'tbex-options-tweaks',
		$tbex_settings_args
	);

		/** Smart Tweaks: 1st section */
		add_settings_section( 
			'tbex-section-wordpress',
			'<h3 class="tbex-settings-section first">' . __( 'Change Default Toolbar Behavior', 'toolbar-extras' ) . '</h3>',
			'ddw_tbex_settings_section_info_wordpress',
			'tbex_group_smart_tweaks'
		);

			add_settings_field(
				'toolbar_front_color',
				__( 'Use Admin Color Scheme also for Frontend', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_toolbar_front_color',
				'tbex_group_smart_tweaks',
				'tbex-section-wordpress'
			);

			add_settings_field(
				'use_web_group',
				__( 'Use Web Group instead of WP Logo Group', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_use_web_group',
				'tbex_group_smart_tweaks',
				'tbex-section-wordpress'
			);

			add_settings_field(
				'remove_wp_logo',
				__( 'Remove WP Logo and All Sub-Items', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_remove_wp_logo',
				'tbex_group_smart_tweaks',
				'tbex-section-wordpress'
			);

			add_settings_field(
				'remove_front_customizer',
				__( 'Remove Customizer Item on Frontend', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_remove_front_customizer',
				'tbex_group_smart_tweaks',
				'tbex-section-wordpress'
			);

			add_settings_field(
				'remove_media_newcontent',
				__( 'Remove Media Item in New Content Group', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_remove_media_newcontent',
				'tbex_group_smart_tweaks',
				'tbex-section-wordpress'
			);

			add_settings_field(
				'remove_user_newcontent',
				__( 'Remove User Item in New Content Group', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_remove_user_newcontent',
				'tbex_group_smart_tweaks',
				'tbex-section-wordpress'
			);

		/** Smart Tweaks: 2nd section */
		add_settings_section( 
			'tbex-section-plugins',
			'<h3 class="tbex-settings-section">' . __( 'Change Plugin Behavior', 'toolbar-extras' ) . '</h3>',
			'ddw_tbex_settings_section_info_plugins',
			'tbex_group_smart_tweaks'
		);

			if ( defined( 'RG_CURRENT_VIEW' ) ) {		// Gravity Forms

				add_settings_field(
					'rehook_gravityforms',
					__( 'Re-hook Gravity Forms from Top Level to Site Group', 'toolbar-extras' ),
					'ddw_tbex_settings_cb_rehook_gravityforms',
					'tbex_group_smart_tweaks',
					'tbex-section-plugins'
				);

			}  // end if

			if ( defined( 'NEXTEND_SMARTSLIDER_3_BASENAME' ) ) {		// Smart Slider 3

				add_settings_field(
					'rehook_smartslider',
					__( 'Re-hook Smart Slider 3 from Top Level to Site Group', 'toolbar-extras' ),
					'ddw_tbex_settings_cb_rehook_smartslider',
					'tbex_group_smart_tweaks',
					'tbex-section-plugins'
				);

			}  // end if

			if ( class_exists( 'C_NextGEN_Bootstrap' ) ) {		// NextGen Gallery

				add_settings_field(
					'rehook_nextgen',
					__( 'Re-hook NextGen Gallery from Top Level to Site Group', 'toolbar-extras' ),
					'ddw_tbex_settings_cb_rehook_nextgen',
					'tbex_group_smart_tweaks',
					'tbex-section-plugins'
				);

			}  // end if

			if ( function_exists( 'itsec_load_textdomain' ) ) {		// iThemes Security

				add_settings_field(
					'rehook_ithsec',
					__( 'Re-hook iThemes Security from Top Level to Site Group', 'toolbar-extras' ),
					'ddw_tbex_settings_cb_rehook_ithsec',
					'tbex_group_smart_tweaks',
					'tbex-section-plugins'
				);

			}  // end if

			if ( defined( 'WP_ROCKET_VERSION' ) ) {		// WP Rocket

				add_settings_field(
					'rehook_wprocket',
					__( 'Re-hook WP Rocket Items', 'toolbar-extras' ),
					'ddw_tbex_settings_cb_rehook_wprocket',
					'tbex_group_smart_tweaks',
					'tbex-section-plugins'
				);

			}  // end if

			if ( defined( 'AUTOPTIMIZE_PLUGIN_DIR' ) ) {		// Autoptimuze

				add_settings_field(
					'rehook_autoptimize',
					__( 'Re-hook Autoptimize Items', 'toolbar-extras' ),
					'ddw_tbex_settings_cb_rehook_autoptimize',
					'tbex_group_smart_tweaks',
					'tbex-section-plugins'
				);

			}  // end if

			if ( class_exists( 'Swift_Performance_Lite' ) || class_exists( 'Swift_Performance' ) ) {		// Swift Performance Lite

				add_settings_field(
					'rehook_swiftperformance',
					__( 'Re-hook Swift Performance Items', 'toolbar-extras' ),
					'ddw_tbex_settings_cb_rehook_swiftperformance',
					'tbex_group_smart_tweaks',
					'tbex-section-plugins'
				);

			}  // end if

			if ( class_exists( 'WooCommerce' ) ) {		// WooCommerce

				add_settings_field(
					'remove_woo_posttypes',
					__( 'Remove some WooCommerce post types from New Content Group', 'toolbar-extras' ),
					'ddw_tbex_settings_cb_remove_woo_posttypes',
					'tbex_group_smart_tweaks',
					'tbex-section-plugins'
				);

			}  // end if

			if ( defined( 'AIOSEOP_VERSION' ) || defined( 'AIOSEOPPRO' ) ) {		// All In One SEO Pack (Pro)

				add_settings_field(
					'remove_aioseo',
					__( 'Remove All In One SEO Pack Items', 'toolbar-extras' ),
					'ddw_tbex_settings_cb_remove_aioseo',
					'tbex_group_smart_tweaks',
					'tbex-section-plugins'
				);

			}  // end if

			if ( defined( 'UPDRAFTPLUS_DIR' ) ) {		// UpdraftPlus

				add_settings_field(
					'remove_updraftplus',
					__( 'Remove UpdraftPlus Items', 'toolbar-extras' ),
					'ddw_tbex_settings_cb_remove_updraftplus',
					'tbex_group_smart_tweaks',
					'tbex-section-plugins'
				);

			}  // end if

			if ( class_exists( 'Members_Plugin' ) ) {		// Members (by Justin Tadlock)

				add_settings_field(
					'remove_members',
					__( 'Remove Members Items', 'toolbar-extras' ),
					'ddw_tbex_settings_cb_remove_members',
					'tbex_group_smart_tweaks',
					'tbex-section-plugins'
				);

			}  // end if

			if ( function_exists( 'cobalt_apps_admin_bar_menu' ) ) {		// Cobalt Apps Plugins/ Themes

				add_settings_field(
					'remove_cobaltapps',
					__( 'Remove Cobalt Apps Items', 'toolbar-extras' ),
					'ddw_tbex_settings_cb_remove_cobaltapps',
					'tbex_group_smart_tweaks',
					'tbex-section-plugins'
				);

			}  // end if

			if ( function_exists( 'ccp_frame_loader' ) ) {		// Custom CSS Pro (by WaspThemes)

				add_settings_field(
					'remove_customcsspro',
					__( 'Remove Custom CSS Pro Items', 'toolbar-extras' ),
					'ddw_tbex_settings_cb_remove_customcsspro',
					'tbex_group_smart_tweaks',
					'tbex-section-plugins'
				);

			}  // end if

			if ( function_exists( 'page_spider_init' ) || defined( 'EDD_APSPP_VERSION' ) ) {		// Admin Page Spider (Pro)

				add_settings_field(
					'remove_apspider',
					__( 'Remove Admin Page Spider Items', 'toolbar-extras' ),
					'ddw_tbex_settings_cb_remove_apspider',
					'tbex_group_smart_tweaks',
					'tbex-section-plugins'
				);

			}  // end if

			if ( defined( 'MSTBA_PLUGIN_BASEDIR' ) ) {		// Multisite Toolbar Additions

				add_settings_field(
					'remove_mstba_siteextgroup',
					__( 'Remove Site Extend Group of Multisite Toolbar Additions Plugin', 'toolbar-extras' ),
					'ddw_tbex_settings_cb_remove_mstba_siteextgroup',
					'tbex_group_smart_tweaks',
					'tbex-section-plugins'
				);

			}  // end if

		/** Smart Tweaks: 3rd section */
		add_settings_section( 
			'tbex-section-translations',
			'<h3 class="tbex-settings-section">' . __( 'Change Translations Behavior', 'toolbar-extras' ) . '</h3>',
			'ddw_tbex_settings_section_info_translations',
			'tbex_group_smart_tweaks'
		);

			if ( ddw_tbex_is_elementor_active() ) {

				add_settings_field(
					'unload_td_elementor',
					__( 'Unload Elementor Translations', 'toolbar-extras' ),
					'ddw_tbex_settings_cb_unload_td_elementor',
					'tbex_group_smart_tweaks',
					'tbex-section-translations'
				);

			}  // end if

			add_settings_field(
				'unload_td_toolbar_extras',
				__( 'Unload Toolbar Extras Translations', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_unload_td_toolbar_extras',
				'tbex_group_smart_tweaks',
				'tbex-section-translations'
			);

		/** Smart Tweaks: 4th section */
		add_settings_section( 
			'tbex-section-pagebuilder',
			'<h3 class="tbex-settings-section">' . __( 'Change Page Builder Behavior', 'toolbar-extras' ) . '</h3>',
			'ddw_tbex_settings_section_info_pagebuilder',
			'tbex_group_smart_tweaks'
		);

			if ( ddw_tbex_is_elementor_active() ) {

				add_settings_field(
					'remove_elementor_wpwidgets',
					__( 'Remove WordPress Widgets from Elementor Live Editor', 'toolbar-extras' ),
					'ddw_tbex_settings_cb_remove_elementor_wpwidgets',
					'tbex_group_smart_tweaks',
					'tbex-section-pagebuilder'
				);

			}  // end if

}  // end function


add_action( 'admin_init', 'ddw_tbex_register_settings_development', 10 );
/**
 * Load plugin's settings for settings tab "Development".
 *
 * @since 1.0.0
 *
 * @uses  ddw_tbex_default_options_development()
 */
function ddw_tbex_register_settings_development() {

	/** If options do not exist (on first run), update them with default values */
	if ( ! get_option( 'tbex-options-development' ) ) {
		update_option( 'tbex-options-development', ddw_tbex_default_options_development() );
	}

	/** Settings args */
	$tbex_settings_args = array( 'sanitize_callback' => 'ddw_tbex_validate_settings_development' );

	/** Register options group for Development tab */
	register_setting(
		'tbex_group_development',
		'tbex-options-development',
		$tbex_settings_args
	);

		/** Development: 1st section */
		add_settings_section( 
			'tbex-section-local-dev',
			'<h3 class="tbex-settings-section first">' . __( 'Local Development Environment', 'toolbar-extras' ) . '</h3>',
			'ddw_tbex_settings_section_info_local_dev',
			'tbex_group_development'
		);

			add_settings_field(
				'is_local_dev',
				__( 'Set as Local Development Environment', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_is_local_dev',
				'tbex_group_development',
				'tbex-section-local-dev',
				array( 'class' => 'tbex-setting-is-local-dev' )
			);

			add_settings_field(
				'local_dev_bg_color',
				__( 'Background Color of Toolbar', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_local_dev_bg_color',
				'tbex_group_development',
				'tbex-section-local-dev',
				array( 'class' => 'tbex-setting-local-dev-bg-color' )
			);

			add_settings_field(
				'local_dev_icon',
				__( 'Icon Before the Text', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_local_dev_icon',
				'tbex_group_development',
				'tbex-section-local-dev',
				array( 'class' => 'tbex-setting-local-dev-icon' )
			);

			add_settings_field(
				'local_dev_name',
				__( 'Display Text in Toolbar', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_local_dev_name',
				'tbex_group_development',
				'tbex-section-local-dev',
				array( 'class' => 'tbex-setting-local-dev-name' )
			);

			add_settings_field(
				'local_dev_viewport',
				__( 'Minimum Viewport Size to Display the Text', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_local_dev_viewport',
				'tbex_group_development',
				'tbex-section-local-dev',
				array( 'class' => 'tbex-setting-local-dev-viewport' )
			);

		/** Development: 2nd section */
		add_settings_section( 
			'tbex-section-dev-mode',
			'<h3 class="tbex-settings-section">' . __( 'Development Mode', 'toolbar-extras' ) . '</h3>',
			'ddw_tbex_settings_section_info_dev_mode',
			'tbex_group_development'
		);

			add_settings_field(
				'use_dev_mode',
				__( 'Use Dev Mode?', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_use_dev_mode',
				'tbex_group_development',
				'tbex-section-dev-mode',
				array( 'class' => 'tbex-setting-use-dev-mode' )
			);

			add_settings_field(
				'rapid_dev_icon',
				__( 'Icon Before the Text', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_rapid_dev_icon',
				'tbex_group_development',
				'tbex-section-dev-mode',
				array( 'class' => 'tbex-setting-rapid-dev-icon' )
			);

			add_settings_field(
				'rapid_dev_name',
				__( 'Text of Toolbar Item', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_rapid_dev_name',
				'tbex_group_development',
				'tbex-section-dev-mode',
				array( 'class' => 'tbex-setting-rapid-dev-name' )
			);

}  // end function


/**
 * Validate General settings callback.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_default_options_general()
 *
 * @param  mixed $input User entered value of settings field key.
 * @return string(s) Sanitized user inputs ("parsed").
 */
function ddw_tbex_validate_settings_general( $input ) {

	$tbex_default_options = ddw_tbex_default_options_general();

	$parsed = wp_parse_args( $input, $tbex_default_options );

	/** Save empty text fields with default options */
	$textfields = array(
		'main_item_name',
		'elementor_name'
	);

	foreach( $textfields as $textfield ) {
		$parsed[ $textfield ] = wp_filter_nohtml_kses( $input[ $textfield ] );
	}

	/** Save CSS classes sanitized */
	$cssclasses_fields = array(
		'main_item_icon',
		'demo_import_icon',
		'tbex_tbmenu_icon'
	);

	foreach( $cssclasses_fields as $cssclass ) {
		$parsed[ $cssclass ] = strtolower( sanitize_html_class( $input[ $cssclass ] ) );
	}

	/** Save integer fields */
	$integer_fields = array(
		'main_item_priority',
		'tbex_tbmenu_priority'
	);

	foreach ( $integer_fields as $integer ) {
		$parsed[ $integer ] = absint( $input[ $integer ] );
	}

	/** Save select fields */
	$select_fields = array(
		'display_items_resources',
		'display_items_theme',
		'display_items_plugins',
		'display_items_addons',
		'display_items_new_content',
		'display_items_site_group',
		'display_items_edit_content',
		'display_items_edit_menus',
		'display_items_user_group',
		'display_items_demo_import',
		'display_items_tbex_settings',
		'display_link_attributes',
		'external_links_blank',
		'builder_links_blank'
	);

	foreach( $select_fields as $select ) {
		$parsed[ $select ] = sanitize_key( $input[ $select ] );
	}

	/** Return the sanitized user input value(s) */
	return $parsed;

}  // end function


/**
 * Validate Smart Tweaks settings callback.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_default_options_smart_tweaks()
 *
 * @param  mixed $input User entered value of settings field key.
 * @return string(s) Sanitized user inputs ("parsed").
 */
function ddw_tbex_validate_settings_smart_tweaks( $input ) {

	$tbex_default_options = ddw_tbex_default_options_smart_tweaks();

	$parsed = wp_parse_args( $input, $tbex_default_options );

	/** Save select fields */
	$select_fields = array(
		'toolbar_front_color',
		'use_web_group',
		'remove_wp_logo',
		'remove_front_customizer',
		'remove_media_newcontent',
		'remove_user_newcontent',
		'remove_updraftplus',
		'remove_members',
		'remove_cobaltapps',
		'remove_customcsspro',
		'remove_apspider',
		'remove_aioseo',
		'remove_mstba_siteextgroup',
		'remove_woo_posttypes',
		'rehook_gravityforms',
		'rehook_smartslider',
		'rehook_nextgen',
		'rehook_ithsec',
		'rehook_wprocket',
		'rehook_autoptimize',
		'rehook_swiftperformance',
		'unload_td_elementor',
		'unload_td_toolbar_extras',
		'remove_elementor_wpwidgets'
	);

	foreach( $select_fields as $select ) {
		$parsed[ $select ] = sanitize_key( $input[ $select ] );
	}

	/** Return the sanitized user input value(s) */
	return $parsed;

}  // end function


/**
 * Validate Development settings callback.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_default_options_development()
 *
 * @param  mixed $input User entered value of settings field key.
 * @return string(s) Sanitized user inputs ("parsed").
 */
function ddw_tbex_validate_settings_development( $input ) {

	$tbex_default_options = ddw_tbex_default_options_development();

	$parsed = wp_parse_args( $input, $tbex_default_options );

	/** Save empty text fields with default options */
	$textfields = array(
		'rapid_dev_name',
		'local_dev_name'
	);

	foreach( $textfields as $textfield ) {
		$parsed[ $textfield ] = wp_filter_nohtml_kses( $input[ $textfield ] );
	}

	/** Save CSS classes sanitized */
	$cssclasses_fields = array(
		'rapid_dev_icon',
		'local_dev_icon'
	);

	foreach( $cssclasses_fields as $cssclass ) {
		$parsed[ $cssclass ] = strtolower( sanitize_html_class( $input[ $cssclass ] ) );
	}

	/** Save integer fields */
	$integer_fields = array(
		'local_dev_viewport'
	);

	foreach ( $integer_fields as $integer ) {
		$parsed[ $integer ] = absint( $input[ $integer ] );
	}

	/** Save HEX color fields */
	$hexcolor_fields = array(
		'local_dev_bg_color'
	);

	foreach ( $hexcolor_fields as $hexcolor ) {
		$parsed[ $hexcolor ] = sanitize_hex_color( $input[ $hexcolor ] );
	}

	/** Save select fields */
	$select_fields = array(
		'use_dev_mode',
		'is_local_dev'
	);

	foreach( $select_fields as $select ) {
		$parsed[ $select ] = sanitize_key( $input[ $select ] );
	}

	/** Return the sanitized user input value(s) */
	return $parsed;

}  // end function


add_action( 'admin_menu', 'ddw_tbex_settings_add_admin_page' );
/**
 * Add our own plugin settings page under "Settings" in Admin.
 *   Used capability: 'manage_options'
 *
 * @since 1.0.0
 *
 * @uses  add_options_page()
 */
function ddw_tbex_settings_add_admin_page() {

	/** This page will be under "Settings" */
	$bex_settings_page = add_options_page(
		/* translators: Settings page title in browser */
		esc_attr__( 'Toolbar Extras Settings', 'toolbar-extras' ),	// Title Tag (in Browser)
		/* translators: Settings page title in WP-Admin left-hand menu */
		esc_attr__( 'Toolbar Extras', 'toolbar-extras' ),			// Page Title (in Menu)
		'manage_options',											// capability
		'toolbar-extras',											// page slug/ID
		'ddw_tbex_settings_create_admin_page'						// callback function
	);

	/** Let helper styles load only on this admin page */
	add_action( 'load-' . $bex_settings_page, 'ddw_tbex_load_admin_styles_scripts' );

	/** Welcome - New user onboarding */
	add_action( 'load-' . $bex_settings_page, 'ddw_tbex_settings_page_welcome', 5 );

}  // end function


/**
 * Load the welcome notice only on our own admin page.
 *   Using 'load-{admin-page-slug}' action, therefore we need this in-between
 *   step here.
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_page_welcome() {

	/** Welcome - New user onboarding */
	require_once( TBEX_PLUGIN_DIR . 'includes/admin/views/notice-settings-welcome.php' );
	add_action( 'admin_notices', 'ddw_tbex_notice_settings_welcome' );

}  // end function


/**
 * Load Admin styles & scrips only on our own admin page.
 *   Using 'load-{admin-page-slug}' action, therefore we need this in-between
 *   step here.
 *
 * @since 1.0.0
 */
function ddw_tbex_load_admin_styles_scripts() {

	add_action( 'admin_enqueue_scripts', 'ddw_tbex_enqueue_admin_styles_scripts' );

}  // end function


/**
 * Enqueue WordPress Color Picker Script (Iris).
 *
 * @since 1.0.0
 *
 * @see   ddw_tbex_settings_add_admin_page()
 */
function ddw_tbex_enqueue_admin_styles_scripts() {

	/** Styles: TBEX Settings */
	wp_register_style(
		'tbex-settings-page',
		plugins_url( '/assets/css/tbex-settings.css', dirname( dirname( __FILE__ ) ) ),
		array(),
		TBEX_PLUGIN_VERSION,
		FALSE
	);

	wp_enqueue_style( 'tbex-settings-page' );

	/** Styles: WP Color Picker (Iris) */
	wp_enqueue_style( 'wp-color-picker' );

	/** Script: Our Iris config */
	wp_register_script(
		'tbex-iris-config',
		plugins_url( '/assets/js/iris-config.js', dirname( dirname( __FILE__ ) ) ),
		array( 'wp-color-picker' ),
		TBEX_PLUGIN_VERSION,
		TRUE
	);

	wp_enqueue_script( 'tbex-iris-config' );

	/** Styles: Dashicons picker */
	wp_register_style(
		'tbex-dashicons-picker',
		plugins_url( '/assets/css/dashicons-picker.css', dirname( dirname( __FILE__ ) ) ),
		array( 'dashicons' ),
		TBEX_PLUGIN_VERSION,
		FALSE
	);

	wp_enqueue_style( 'tbex-dashicons-picker' );

	/** Script: Dashicons picker */
	wp_register_script(
		'tbex-dashicons-picker',
		plugins_url( '/assets/js/dashicons-picker.js', dirname( dirname( __FILE__ ) ) ),
		array( 'jquery' ),
		TBEX_PLUGIN_VERSION,
		TRUE
	);

	wp_enqueue_script( 'tbex-dashicons-picker' );

	/** Optionally add Thickbox JS & CSS (for video tour) */
	add_thickbox();

}  // end function


/**
 * Callback function to create admin page after adding it.
 *
 * @since 1.0.0
 *
 * @see   ddw_tbex_settings_add_admin_page()
 */
function ddw_tbex_settings_create_admin_page() {

	$url_general       = esc_url( add_query_arg( array( 'page' => 'toolbar-extras', 'tab'  => 'general' ), admin_url( 'options-general.php' ) ) );
	$url_smart_tweaks  = esc_url( add_query_arg( array( 'page' => 'toolbar-extras', 'tab'  => 'smart-tweaks' ), admin_url( 'options-general.php' ) ) );
	$url_development   = esc_url( add_query_arg( array( 'page' => 'toolbar-extras', 'tab'  => 'development' ), admin_url( 'options-general.php' ) ) );
	$url_about_support = esc_url( add_query_arg( array( 'page' => 'toolbar-extras', 'tab'  => 'about-support' ), admin_url( 'options-general.php' ) ) );

	/** Render settings page */
	?>
		<div class="wrap">
			<h1>
				<span class="dashicons-before dashicons-arrow-up-alt tbex-icon"></span>
				<span class="tbex-label">
					<?php
						/* translators: Settings page title in WP-Admin */
						_e( 'Toolbar Extras - Settings', 'toolbar-extras' );
					?>
				</span>
				<span class="tbex-version">v<?php echo ( defined( 'TBEX_PLUGIN_VERSION' ) && TBEX_PLUGIN_VERSION ) ? TBEX_PLUGIN_VERSION : ''; ?></span>
			</h1>

			<div class="tbex-intro">
				<h2><?php _e( 'Let the Toolbar Work for You!', 'toolbar-extras' ); ?></h2>
				<p>
					<?php _e( 'Decide which additional items should be displayed or not. Also use some smart tweaks or enable development modes.', 'toolbar-extras' ); ?>
				<p>
			</div>

			<?php $active_tab = isset( $_GET[ 'tab' ] ) ? sanitize_key( wp_unslash( $_GET[ 'tab' ] ) ) : 'general'; ?>
		 
			<h2 class="nav-tab-wrapper">
				<a href="<?php echo $url_general; ?>" class="dashicons-before dashicons-admin-generic nav-tab <?php echo ( 'general' === $active_tab ) ? 'nav-tab-active' : ''; ?>">
					<?php
						/* translators: Settings tab title in WP-Admin */
						_ex( 'General Settings', 'Plugin settings tab title', 'toolbar-extras' );
					?>
				</a>
				<a href="<?php echo $url_smart_tweaks; ?>" class="dashicons-before dashicons-lightbulb nav-tab <?php echo ( 'smart-tweaks' === $active_tab ) ? 'nav-tab-active' : ''; ?>">
					<?php
						/* translators: Settings tab title in WP-Admin */
						_ex( 'Smart Tweaks', 'Plugin settings tab title', 'toolbar-extras' );
					?>
				</a>
				<a href="<?php echo $url_development; ?>" class="dashicons-before dashicons-editor-code nav-tab <?php echo ( 'development' === $active_tab ) ? 'nav-tab-active' : ''; ?>">
					<?php
						/* translators: Settings tab title in WP-Admin */
						_ex( 'For Development', 'Plugin settings tab title', 'toolbar-extras' );
					?>
				</a>
				<a href="<?php echo $url_about_support; ?>" class="dashicons-before dashicons-info nav-tab <?php echo ( 'about-support' === $active_tab ) ? 'nav-tab-active' : ''; ?>">
					<?php
						/* translators: Settings tab title in WP-Admin */
						_ex( 'About &amp; Support', 'Plugin settings tab title', 'toolbar-extras' );
					?>
				</a>
			</h2>
			<form action="options.php" method="post" class="tbex-settings-page">
				<?php
					switch ( $active_tab ) :

						/** 1) Tab General */
						case 'general' :
							do_action( 'tbex_before_settings_general_view' );

							require_once( TBEX_PLUGIN_DIR . 'includes/admin/views/settings-tab-general.php' );

							settings_fields( 'tbex_group_general' );
							do_settings_sections( 'tbex_group_general' );

							do_action( 'tbex_after_settings_general_view' );

							submit_button();
						break;

						/** 2) Tab Smart Tweaks */
						case 'smart-tweaks' :
							do_action( 'tbex_before_settings_tweaks_view' );

							require_once( TBEX_PLUGIN_DIR . 'includes/admin/views/settings-tab-smart-tweaks.php' );

							settings_fields( 'tbex_group_smart_tweaks' );
							do_settings_sections( 'tbex_group_smart_tweaks' );

							do_action( 'tbex_after_settings_tweaks_view' );

							submit_button();
						break;

						/** 3) Tab Development */
						case 'development' :
							do_action( 'tbex_before_settings_development_view' );

							require_once( TBEX_PLUGIN_DIR . 'includes/admin/views/settings-tab-development.php' );

							settings_fields( 'tbex_group_development' );
							do_settings_sections( 'tbex_group_development' );

							do_action( 'tbex_after_settings_development_view' );

							submit_button();
						break;

						/** 4) Tab About & Support - only text, no submit button! */
						case 'about-support' :
							do_action( 'tbex_before_settings_about_support_view' );
							require_once( TBEX_PLUGIN_DIR . 'includes/admin/views/settings-tab-about-support.php' );
							do_action( 'tbex_after_settings_about_support_view' );

					endswitch;
				?>
			</form>
		</div>
	<?php

}  // end function