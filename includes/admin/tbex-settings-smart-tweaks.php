<?php

// includes/admin/tbex-settings-smart-tweaks

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Default values of the plugin's Smart Tweaks options.
 *
 * @since 1.0.0
 * @since 1.1.0 - 1.4.0 Subsequent additions for new settings.
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

		'use_myaccount_tweak'        => 'no',		// user decides whether to use whole tweak or not
		'use_howdy_replace'          => 'yes',		// replace Howdy string or not
		'howdy_replacement'          => esc_attr__( 'Welcome,', 'toolbar-extras' ),  // ...if yes, set a replacement string
		'custom_welcome'             => '',         // ...if custom, then set whole welcome string
		'custom_myaccount_url'       => '',			// custom URL (instead of profile URL)
		'custom_myaccount_target'    => '_self',	// no blank target by default

		'remove_updraftplus'         => 'yes',		// remove by default, as their default makes no sense
		'remove_members'             => 'no',		// do not touch by default
		'remove_cobaltapps'          => 'no',		// do not touch by default
		'remove_customcsspro'        => 'no',		// do not touch by default
		'remove_apspider'            => 'no',		// do not touch by default
		'remove_aioseo'              => 'yes',		// remove by default
		'remove_mstba_siteextgroup'  => 'yes',		// remove by default
		'remove_woo_posttypes'       => 'no',		// do not touch by default
		'remove_easy_um'             => 'yes',		// remove by default

		'rehook_elementor_inspector' => 'no',       // do not touch Elementor Inspector by default
		'rehook_stylepress'          => 'no',		// do not touch StylePress by default
		'rehook_yoastseo'            => 'no',		// do not touch Yoast Seo by default
		'rehook_seopress'            => 'no',		// do not touch SEOPress by default
		'rehook_gravityforms'        => 'no',		// do not touch GF by default
		'rehook_smartslider'         => 'no',		// do not touch SS3 by default
		'rehook_nextgen'             => 'no',		// do not touch NextGen by default
		'rehook_ithsec'              => 'no',		// do not touch iThemes Security by default
		'rehook_wprocket'            => 'no',		// do not touch WP Rocket by default
		'rehook_autoptimize'         => 'no',		// do not touch Autoptimize by default
		'rehook_swiftperformance'    => 'no',		// do not touch Swift by default

		'unload_td_elementor'        => 'no',		// translations loaded by default
		'unload_td_toolbar_extras'   => 'no',		// translations loaded by default

		'display_elementor_tbuilder' => 'yes',		// on by default
		'display_elementor_popups'   => 'yes',		// on by default
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


add_action( 'admin_init', 'ddw_tbex_register_settings_smart_tweaks', 10 );
/**
 * Load plugin's settings for settings tab "Smart Tweaks".
 *
 * @since 1.0.0
 * @since 1.1.0 - 1.4.0 Subsequent additions for new sections & settings.
 *
 * @uses ddw_tbex_default_options_smart_tweaks()
 * @uses ddw_tbex_string_main_item()
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

		/** Smart Tweaks: 1st section - WordPress behavior */
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
				'tbex-section-wordpress',
				array( 'class' => 'tbex-setting-remove-wp-logo' )
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

		/** Smart Tweaks: 2nd section - welcome item */
		add_settings_section( 
			'tbex-section-welcome',
			'<h3 class="tbex-settings-section">' . __( 'Change the Welcome Item', 'toolbar-extras' ) . '</h3>',
			'ddw_tbex_settings_section_info_welcome',
			'tbex_group_smart_tweaks'
		);

			add_settings_field(
				'use_myaccount_tweak',
				__( 'Customize the My Account ("Howdy") item on the right side?', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_use_myaccount_tweak',
				'tbex_group_smart_tweaks',
				'tbex-section-welcome',
				array( 'class' => 'tbex-setting-use-myaccount-tweak' )
			);

			add_settings_field(
				'use_howdy_replace',
				__( 'Remove or replace the "Howdy"?', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_use_howdy_replace',
				'tbex_group_smart_tweaks',
				'tbex-section-welcome',
				array( 'class' => 'tbex-setting-use-howdy-replace' )
			);

			add_settings_field(
				'howdy_replacement',
				__( 'Replace "Howdy" with your own wording', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_howdy_replacement',
				'tbex_group_smart_tweaks',
				'tbex-section-welcome',
				array( 'class' => 'tbex-setting-howdy-replacement' )
			);

			add_settings_field(
				'custom_welcome',
				__( 'Set your complete custom welcome and name', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_custom_welcome',
				'tbex_group_smart_tweaks',
				'tbex-section-welcome',
				array( 'class' => 'tbex-setting-custom-welcome' )
			);

			add_settings_field(
				'custom_myaccount_url',
				__( 'Set a custom URL (instead of the profile URL)', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_custom_myaccount_url',
				'tbex_group_smart_tweaks',
				'tbex-section-welcome',
				array( 'class' => 'tbex-setting-custom-myaccount-url' )
			);

			add_settings_field(
				'custom_myaccount_target',
				__( 'Optionally set link target', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_custom_myaccount_target',
				'tbex_group_smart_tweaks',
				'tbex-section-welcome',
				array( 'class' => 'tbex-setting-custom-myaccount-target' )
			);

		/** Smart Tweaks: 3rd section - plugin behavior */
		add_settings_section( 
			'tbex-section-plugins',
			'<h3 class="tbex-settings-section">' . __( 'Change Plugin Behavior', 'toolbar-extras' ) . '</h3>',
			'ddw_tbex_settings_section_info_plugins',
			'tbex_group_smart_tweaks'
		);

			if ( ddw_tbex_is_elementor_inspector_enabled() ) {		// Elementor "Inspector" feature

				add_settings_field(
					'rehook_elementor_inspector',
					/* translators: %s - label of our plugin's main group (default: "Build Group") */
					sprintf( __( 'Re-hook Elementor Inspector from Top Level to %s Group', 'toolbar-extras' ), ddw_tbex_string_main_item() ),
					'ddw_tbex_settings_cb_rehook_elementor_inspector',
					'tbex_group_smart_tweaks',
					'tbex-section-plugins'
				);

			}  // end if

			if ( ddw_tbex_is_stylepress_elementor_active() ) {		// StylePress "Styles" feature

				add_settings_field(
					'rehook_stylepress',
					/* translators: %s - label of our plugin's main group (default: "Build Group") */
					sprintf( __( 'Re-hook StylePress from Top Level to %s Group', 'toolbar-extras' ), ddw_tbex_string_main_item() ),
					'ddw_tbex_settings_cb_rehook_stylepress',
					'tbex_group_smart_tweaks',
					'tbex-section-plugins'
				);

			}  // end if

			if ( ddw_tbex_is_yoastseo_active() ) {		// Yoast SEO

				add_settings_field(
					'rehook_yoastseo',
					__( 'Re-hook Yoast SEO from Top Level to Site Group', 'toolbar-extras' ),
					'ddw_tbex_settings_cb_rehook_yoastseo',
					'tbex_group_smart_tweaks',
					'tbex-section-plugins'
				);

			}  // end if

			if ( ddw_tbex_is_seopress_active() ) {		// SEOPress

				add_settings_field(
					'rehook_seopress',
					__( 'Re-hook SEOPress from Top Level to Site Group', 'toolbar-extras' ),
					'ddw_tbex_settings_cb_rehook_seopress',
					'tbex_group_smart_tweaks',
					'tbex-section-plugins'
				);

			}  // end if

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

			if ( ddw_tbex_is_woocommerce_active() ) {		// WooCommerce

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

			if ( ddw_tbex_is_custom_css_pro_active() ) {		// Custom CSS Pro (by WaspThemes)

				add_settings_field(
					'remove_customcsspro',
					__( 'Remove Custom CSS Pro Items', 'toolbar-extras' ),
					'ddw_tbex_settings_cb_remove_customcsspro',
					'tbex_group_smart_tweaks',
					'tbex-section-plugins'
				);

			}  // end if

			if ( ddw_tbex_is_easy_updates_manager_active() ) {		// Easy Updates Manager

				add_settings_field(
					'remove_easy_um',
					__( 'Remove Easy Updates Manager Items', 'toolbar-extras' ),
					'ddw_tbex_settings_cb_remove_easy_um',
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

			if ( ddw_tbex_is_mstba_active() ) {		// Multisite Toolbar Additions

				add_settings_field(
					'remove_mstba_siteextgroup',
					__( 'Remove Site Extend Group of Multisite Toolbar Additions Plugin', 'toolbar-extras' ),
					'ddw_tbex_settings_cb_remove_mstba_siteextgroup',
					'tbex_group_smart_tweaks',
					'tbex-section-plugins'
				);

			}  // end if

		/** Smart Tweaks: 4th section - translations behavior */
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

		/** Smart Tweaks: 5th section - Page Builder behavior */
		add_settings_section( 
			'tbex-section-pagebuilder',
			'<h3 class="tbex-settings-section">' . __( 'Change Page Builder Behavior', 'toolbar-extras' ) . '</h3>',
			'ddw_tbex_settings_section_info_pagebuilder',
			'tbex_group_smart_tweaks'
		);

			/** Only display setting fields if Elementor is really active */
			if ( ddw_tbex_is_elementor_active() ) {

				/** Settings for Elementor Pro template types, v2.4.0+ */
				if ( ddw_tbex_is_elementor_version( 'pro', TBEX_ELEMENTOR_240_BETA, '>=' ) ) {

					$string_build_group = __( 'Build Group', 'toolbar-extras' );

					$title_elementor_tbuilder = sprintf(
						/* translators: %s - label "Build Group" */
						__( 'Display Theme Builder Item in %s?', 'toolbar-extras' ),
						$string_build_group
					);

					$title_elementor_popups = sprintf(
						/* translators: %s - label "Build Group" */
						__( 'Display Popups Item in %s?', 'toolbar-extras' ),
						$string_build_group
					);

					add_settings_field(
						'display_elementor_tbuilder',
						$title_elementor_tbuilder,
						'ddw_tbex_settings_cb_display_elementor_tbuilder',
						'tbex_group_smart_tweaks',
						'tbex-section-pagebuilder'
					);

					add_settings_field(
						'display_elementor_popups',
						$title_elementor_popups,
						'ddw_tbex_settings_cb_display_elementor_popups',
						'tbex_group_smart_tweaks',
						'tbex-section-pagebuilder'
					);

				}  // end if

				add_settings_field(
					'remove_elementor_wpwidgets',
					__( 'Remove WordPress Widgets from Elementor Live Editor', 'toolbar-extras' ),
					'ddw_tbex_settings_cb_remove_elementor_wpwidgets',
					'tbex_group_smart_tweaks',
					'tbex-section-pagebuilder'
				);

			}  // end if

}  // end function


/**
 * Validate Smart Tweaks settings callback.
 *
 * @since 1.0.0
 * @since 1.1.0 - 1.4.0 Subsequent additions for new settings.
 * @since 1.4.0 Added new validation for text and URL fields.
 *
 * @uses ddw_tbex_default_options_smart_tweaks()
 *
 * @param mixed $input User entered value of settings field key.
 * @return string(s) Sanitized user inputs ("parsed").
 */
function ddw_tbex_validate_settings_smart_tweaks( $input ) {

	$tbex_default_options = ddw_tbex_default_options_smart_tweaks();

	$parsed = wp_parse_args( $input, $tbex_default_options );

	/** Save empty text fields with default options */
	$text_fields = array(
		'howdy_replacement',
		'custom_welcome',
	);

	foreach( $text_fields as $text_field ) {
		$parsed[ $text_field ] = wp_filter_nohtml_kses( $input[ $text_field ] );
	}

	/** Save URL fields */
	$url_fields = array(
		'custom_myaccount_url',
	);

	foreach( $url_fields as $url ) {
		$parsed[ $url ] = esc_url( $input[ $url ] );
	}

	/** Save select fields */
	$select_fields = array(
		'toolbar_front_color',
		'use_web_group',
		'remove_wp_logo',
		'remove_front_customizer',
		'remove_media_newcontent',
		'remove_user_newcontent',

		'use_myaccount_tweak',
		'use_howdy_replace',
		'custom_myaccount_target',

		'remove_updraftplus',
		'remove_members',
		'remove_cobaltapps',
		'remove_customcsspro',
		'remove_apspider',
		'remove_aioseo',
		'remove_mstba_siteextgroup',
		'remove_woo_posttypes',
		'remove_easy_um',

		'rehook_elementor_inspector',
		'rehook_stylepress',
		'rehook_yoastseo',
		'rehook_seopress',
		'rehook_gravityforms',
		'rehook_smartslider',
		'rehook_nextgen',
		'rehook_ithsec',
		'rehook_wprocket',
		'rehook_autoptimize',
		'rehook_swiftperformance',

		'unload_td_elementor',
		'unload_td_toolbar_extras',

		'display_elementor_tbuilder',
		'display_elementor_popups',
		'remove_elementor_wpwidgets',
	);

	foreach( $select_fields as $select ) {
		$parsed[ $select ] = sanitize_key( $input[ $select ] );
	}

	/** Return the sanitized user input value(s) */
	return $parsed;

}  // end function
