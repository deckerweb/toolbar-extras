<?php

// includes/admin/tbex-settings-development

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Default values of the plugin's Development options.
 *
 * @since 1.0.0
 * @since 1.4.0 Added new settings.
 *
 * @return array strings Parsed args of default options.
 */
function ddw_tbex_default_options_development() {

	/** Set the default values */
	$tbex_default_options = array(

		/** Tab: Development */
		'is_local_dev'       => 'auto',						// setting is on automatic mode by default, as the magic detection works in background
		'local_dev_bg_color' => '#0073aa',					// a nice blue :)
		'local_dev_viewport' => 1030,						// in pixel
		'local_dev_icon'     => 'dashicons-warning',		// Dashicon \f534
		/* translators: Toolbar notice text for local dev environmet */
		'local_dev_name'     => esc_attr__( 'Local Development Website', 'toolbar-extras' ),

		'use_dev_mode'       => 'no',						// disabled by default
		/* translators: Toolbar item label */
		'rapid_dev_name'     => esc_attr__( 'Rapid Dev', 'toolbar-extras' ),
		'rapid_dev_icon'     => 'dashicons-editor-code',	// Dashicon \f475

		'use_element_ids'    => 'yes',
		'use_uploader_menus' => 'yes',

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


add_action( 'admin_init', 'ddw_tbex_register_settings_development', 10 );
/**
 * Load plugin's settings for settings tab "Development".
 *
 * @since 1.0.0
 * @since 1.4.0 Added new settings.
 *
 * @uses ddw_tbex_default_options_development()
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

		/** Development: 1st section - Local Dev Environment */
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

		/** Development: 2nd section - Dev Mode */
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

			add_settings_field(
				'use_element_ids',
				__( 'Display IDs for Post Type and taxonomies elements as sub items in the Toolbar?', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_use_element_ids',
				'tbex_group_development',
				'tbex-section-dev-mode',
				array( 'class' => 'tbex-setting-use-element-ids' )
			);

			add_settings_field(
				'use_uploader_menus',
				__( 'Use the additional Uploader Sub Menus in left-hand Admin menus?', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_use_uploader_menus',
				'tbex_group_development',
				'tbex-section-dev-mode',
				array( 'class' => 'tbex-setting-use-uploader-menus' )
			);

}  // end function


/**
 * Validate Development settings callback.
 *
 * @since 1.0.0
 * @since 1.4.0 Added new settings.
 *
 * @uses ddw_tbex_default_options_development()
 *
 * @param mixed $input User entered value of settings field key.
 * @return string(s) Sanitized user inputs ("parsed").
 */
function ddw_tbex_validate_settings_development( $input ) {

	$tbex_default_options = ddw_tbex_default_options_development();

	$parsed = wp_parse_args( $input, $tbex_default_options );

	/** Save empty text fields with default options */
	$textfields = array(
		'local_dev_name',
		'rapid_dev_name',
	);

	foreach( $textfields as $textfield ) {
		$parsed[ $textfield ] = wp_filter_nohtml_kses( $input[ $textfield ] );
	}

	/** Save CSS classes sanitized */
	$cssclasses_fields = array(
		'local_dev_icon',
		'rapid_dev_icon',
	);

	foreach( $cssclasses_fields as $cssclass ) {
		$parsed[ $cssclass ] = strtolower( sanitize_html_class( $input[ $cssclass ] ) );
	}

	/** Save integer fields */
	$integer_fields = array(
		'local_dev_viewport',
	);

	foreach ( $integer_fields as $integer ) {
		$parsed[ $integer ] = absint( $input[ $integer ] );
	}

	/** Save HEX color fields */
	$hexcolor_fields = array(
		'local_dev_bg_color',
	);

	foreach ( $hexcolor_fields as $hexcolor ) {
		$parsed[ $hexcolor ] = sanitize_hex_color( $input[ $hexcolor ] );
	}

	/** Save select fields */
	$select_fields = array(
		'is_local_dev',
		'use_dev_mode',
		'use_element_ids',
		'use_uploader_menus',
	);

	foreach( $select_fields as $select ) {
		$parsed[ $select ] = sanitize_key( $input[ $select ] );
	}

	/** Return the sanitized user input value(s) */
	return $parsed;

}  // end function
