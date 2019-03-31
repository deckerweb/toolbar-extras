<?php

// includes/admin/tbex-settings-general

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
 * @since 1.0.0
 * @since 1.2.0 - 1.4.0 Subsequent additions for new settings.
 *
 * @uses ddw_tbex_string_fallback_item()
 *
 * @return array strings Parsed args of default options.
 */
function ddw_tbex_default_options_general() {

	/** Set fallback string */
	/* translators: Toolbar main item, fallback if no supported Page Builder active */
	$fallback_string = _x(
		'Customize',
		'Toolbar main item, fallback if no supported Page Builder active',
		'toolbar-extras'
	);

	/** Set default builder option */
	$default_builder = 'default-none';
	if ( ddw_tbex_is_elementor_active() ) {
		$default_builder = 'elementor';
	} elseif ( ddw_tbex_is_block_editor_wanted() && ddw_tbex_use_block_editor_support() ) {
		$default_builder = 'block-editor';
	}

	/** Set the default values */
	$tbex_default_options = array(

		/** Tab: General */
		'main_item_icon'              => 'dashicons-text',							// Dashicon \f478
		/* translators: Toolbar item label (Toolbar Extras main item) */
		'main_item_name'              => esc_attr__( 'Build', 'toolbar-extras' ),	// "Build"
		'main_item_url'               => '',
		'main_item_target'            => '_self',
		'main_item_priority'          => 71,										// directly after "New Content" section
		'fallback_item_icon'          => 'dashicons-text',							// Dashicon \f478
		'fallback_item_name'          => $fallback_string,							// Customize
		'fallback_item_url'           => '',

		'default_page_builder'        => $default_builder,							// 'default-none' / 'block-editor' / 'elementor'

		/* translators: Toolbar item label */
		'block_editor_name'           => esc_attr_x( 'Block Editor', 'Toolbar item label', 'toolbar-extras' ),		// "Block Editor"
		/* translators: Toolbar item label */
		'elementor_name'              => esc_attr_x( 'Elementor', 'Toolbar item label', 'toolbar-extras' ),			// "Elementor"
		
		'display_items_resources'     => 'yes',
		'display_items_theme'         => 'yes',
		'display_items_plugins'       => 'yes',
		'display_items_addons'        => 'yes',
		'display_items_wpcomments'    => 'yes',
		'display_items_new_content'   => 'yes',
		'display_items_site_group'    => 'yes',
		'display_items_edit_content'  => 'yes',
		'display_items_edit_menus'    => 'yes',
		'display_items_user_group'    => 'yes',
		'display_items_tbex_settings' => 'yes',

		'use_blockeditor_support'     => 'yes',
		'display_blockeditor_addons'  => 'yes',

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


add_action( 'admin_init', 'ddw_tbex_register_settings_general', 10 );
/**
 * Load plugin's settings for settings tab "General Settings".
 *
 * @since 1.0.0
 * @since 1.2.0 - 1.4.0 Subsequent additions for new settings.
 *
 * @uses ddw_tbex_default_options_general()
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

		/** Get default Page Builder */
		$default_builder = ddw_tbex_get_default_pagebuilder();

		$tbex_section_title_main_item = sprintf(
			'<h3 class="tbex-settings-section first">%1$s: &#x00BB;%2$s&#x00AB;</h3>',
			__( 'The Fallback (Main) Item', 'toolbar-extras' ),
			ddw_tbex_string_fallback_item()
		);

		$tbex_section_info_main_item = 'ddw_tbex_settings_section_info_fallback_item';

		$tbex_is_fallback = ' is-fallback';

		$tbex_is_main = ' is-main-inactive';

		if ( ddw_tbex_is_pagebuilder_active() && 'default-none' !== $default_builder /* ! empty( $default_builder ) */ ) {

			$tbex_section_title_main_item = sprintf(
				'<h3 class="tbex-settings-section first">%1$s: &#x00BB;%2$s&#x00AB;</h3>',
				__( 'The Main Item', 'toolbar-extras' ),
				ddw_tbex_string_main_item()
			);

			$tbex_section_info_main_item = 'ddw_tbex_settings_section_info_main_item';

			$tbex_is_main = ' is-main-active';

		}  // end if

		add_settings_section( 
			'tbex-section-main-item',			// id (settings section)
			$tbex_section_title_main_item,		// headline
			$tbex_section_info_main_item,		// heading description
			'tbex_group_general'				// settings page ID via add_options_page()
		);

			add_settings_field(
				'main_item_icon',								// field name (key)
				__( 'Icon of Main Item', 'toolbar-extras' ),	// title of setting field
				'ddw_tbex_settings_cb_main_item_icon',          // callback (rendering)
				'tbex_group_general',							// registered setting ID via "register_setting()"
				'tbex-section-main-item',						// ID of settings section
				array( 'class' => 'tbex-setting-main-item-icon tbex-main' . $tbex_is_main )
			);

			add_settings_field(
				'main_item_name',
				__( 'Name of Main Item', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_main_item_name',
				'tbex_group_general',
				'tbex-section-main-item',
				array( 'class' => 'tbex-setting-main-item-name tbex-main' . $tbex_is_main )
			);

			add_settings_field(
				'main_item_url',
				__( 'Use custom URL for Main Item?', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_main_item_url',
				'tbex_group_general',
				'tbex-section-main-item',
				array( 'class' => 'tbex-setting-main-item-url tbex-main' . $tbex_is_main )
			);

			add_settings_field(
				'fallback_item_icon',
				__( 'Icon of Fallback Item', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_fallback_item_icon',
				'tbex_group_general',
				'tbex-section-main-item',
				array( 'class' => 'tbex-setting-fallback-item-icon tbex-fallback' . $tbex_is_fallback . $tbex_is_main )
			);

			add_settings_field(
				'fallback_item_name',
				__( 'Name of Fallback Item', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_fallback_item_name',
				'tbex_group_general',
				'tbex-section-main-item',
				array( 'class' => 'tbex-setting-fallback-item-name tbex-fallback' . $tbex_is_fallback . $tbex_is_main )
			);

			add_settings_field(
				'fallback_item_url',
				__( 'Use custom URL for Fallback Item?', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_fallback_item_url',
				'tbex_group_general',
				'tbex-section-main-item',
				array( 'class' => 'tbex-setting-fallback-item-url tbex-fallback' . $tbex_is_fallback . $tbex_is_main )
			);

			add_settings_field(
				'main_item_target',
				__( 'Set link target?', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_main_item_target',
				'tbex_group_general',
				'tbex-section-main-item',
				array( 'class' => 'tbex-setting-main-item-target' )
			);
			
			add_settings_field(
				'main_item_priority',
				__( 'Priority of Main Item', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_main_item_priority',
				'tbex_group_general',
				'tbex-section-main-item'
			);


		/** General: 2nd section - Set default Page Builder */
		add_settings_section( 
			'tbex-section-page-builder',
			'<h3 class="tbex-settings-section">' . __( 'Set a Default Page Builder for the Main Item', 'toolbar-extras' ) . '</h3>',
			'ddw_tbex_settings_section_info_page_builder',
			'tbex_group_general'
		);

			add_settings_field(
				'default_page_builder',
				__( 'Select a Builder', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_default_page_builder',
				'tbex_group_general',
				'tbex-section-page-builder'
			);


		/** General: 3rd section - Page Builder name */
		// tbex-heading-elementor-name
		add_settings_section( 
			'tbex-section-builder-name',
			'<h3 class="tbex-settings-section tbex-heading-builder-name">' . __( 'Page Builder Name', 'toolbar-extras' ) . '</h3>',
			'ddw_tbex_settings_section_info_builder_name',
			'tbex_group_general'
		);

			add_settings_field(
				'elementor_name',
				__( 'Name of Elementor', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_elementor_name',
				'tbex_group_general',
				'tbex-section-builder-name',
				array( 'class' => 'tbex-setting-elementor-name tbex-setting-builder-name' )
			);

			add_settings_field(
				'block_editor_name',
				__( 'Name of Block Editor', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_block_editor_name',
				'tbex_group_general',
				'tbex-section-builder-name',
				array( 'class' => 'tbex-setting-block-editor-name tbex-setting-builder-name' )
			);


		/** General: 4th section - Which items to display? */
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
				'display_items_wpcomments',
				__( 'WP Comments Items', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_display_items_wpcomments',
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


		/** Prepare conditional settings */
		$plugin_inactive = ' plugin-inactive';

		/**
		 * General: 5th section - Block Editor (Gutenberg/ WP 5.0+) support
		 *   Show only if Block Editor is active and not disabled (by plugins)
		 */
		//if ( ddw_tbex_is_block_editor_active() && ddw_tbex_is_block_editor_wanted() ) {

		$status_blockeditor         = ( ddw_tbex_is_block_editor_active() && ddw_tbex_is_block_editor_wanted() ) ? ' plugin-blockeditor' : $plugin_inactive;
		$status_blockeditor_preface = ( ddw_tbex_is_block_editor_active() && ddw_tbex_is_block_editor_wanted() ) ? ' plugin-blockeditor-preface' : $plugin_inactive;

		$title_blockeditor = sprintf(
			'<h3 class="tbex-settings-section tbex-setting-conditional%1$s">%2$s</h3>',
			$status_blockeditor_preface,
			__( 'Block Editor Support (Gutenberg/ WP 5.0+)', 'toolbar-extras' )

		);

		add_settings_section( 
			'tbex-section-blockeditor',
			$title_blockeditor,
			'ddw_tbex_settings_section_info_blockeditor_support',
			'tbex_group_general'
		);

			add_settings_field(
				'use_blockeditor_support',
				__( 'Use Block Editor Support?', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_use_blockeditor_support',
				'tbex_group_general',
				'tbex-section-blockeditor',
				array( 'class' => 'tbex-setting-use-block-editor-support tbex-setting-conditional' . $status_blockeditor )
			);

			add_settings_field(
				'display_blockeditor_addons',
				__( 'Display Block Editor Add-Ons?', 'toolbar-extras' ),
				'ddw_tbex_settings_cb_display_blockeditor_addons',
				'tbex_group_general',
				'tbex-section-blockeditor',
				array( 'class' => 'tbex-setting-display-blockeditor-addons tbex-setting-conditional' . $status_blockeditor )
			);

		//}  // end if


		/** General: 6th section - Demo imports */
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


		/** General: 7th section - Links behavior */
		add_settings_section( 
			'tbex-section-links',
			'<h3 id="tbex-settings-link-behavior" class="tbex-settings-section">' . __( 'Links Behavior', 'toolbar-extras' ) . '</h3>',
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


		/** General: 8th section - Admin Toolbar menu */
		add_settings_section( 
			'tbex-section-tbexmenu',
			'<h3 id="tbex-settings-toolbar-menu" class="tbex-settings-section">' . __( 'Admin Toolbar Menu', 'toolbar-extras' ) . '</h3>',
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


/**
 * Validate General settings callback.
 *
 * @since 1.0.0
 * @since 1.2.0 - 1.4.0 Subsequent additions for new settings.
 * @since 1.4.0 Added new validation for URL fields.
 *
 * @uses ddw_tbex_default_options_general()
 *
 * @param mixed $input User entered value of settings field key.
 * @return string(s) Sanitized user inputs ("parsed").
 */
function ddw_tbex_validate_settings_general( $input ) {

	$tbex_default_options = ddw_tbex_default_options_general();

	$parsed = wp_parse_args( $input, $tbex_default_options );

	/** Save empty text fields with default options */
	$textfields = array(
		'main_item_name',
		'fallback_item_name',
		'block_editor_name',
		'elementor_name',
	);

	foreach( $textfields as $textfield ) {
		$parsed[ $textfield ] = wp_filter_nohtml_kses( $input[ $textfield ] );
	}

	/** Save URL fields */
	$url_fields = array(
		'main_item_url',
		'fallback_item_url',
	);

	foreach( $url_fields as $url ) {
		$parsed[ $url ] = esc_url( $input[ $url ] );
	}

	/** Save CSS classes sanitized */
	$cssclasses_fields = array(
		'main_item_icon',
		'fallback_item_icon',
		'demo_import_icon',
		'tbex_tbmenu_icon',
	);

	foreach( $cssclasses_fields as $cssclass ) {
		$parsed[ $cssclass ] = strtolower( sanitize_html_class( $input[ $cssclass ] ) );
	}

	/** Save integer fields */
	$integer_fields = array(
		'main_item_priority',
		'tbex_tbmenu_priority',
	);

	foreach ( $integer_fields as $integer ) {
		$parsed[ $integer ] = absint( $input[ $integer ] );
	}

	/** Save select & key fields */
	$select_fields = array(
		'default_page_builder',
		'display_items_resources',
		'display_items_theme',
		'display_items_plugins',
		'display_items_addons',
		'display_items_wpcomments',
		'display_items_new_content',
		'display_items_site_group',
		'display_items_edit_content',
		'display_items_edit_menus',
		'display_items_user_group',
		'display_items_demo_import',
		'display_items_tbex_settings',
		'display_link_attributes',
		'external_links_blank',
		'builder_links_blank',
		'use_blockeditor_support',
		'display_blockeditor_addons',
		'main_item_target',
	);

	foreach( $select_fields as $select ) {
		$parsed[ $select ] = sanitize_key( $input[ $select ] );
	}

	/** Return the sanitized user input value(s) */
	return $parsed;

}  // end function
