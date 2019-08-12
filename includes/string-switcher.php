<?php

// includes/string-switcher

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Build string "Toolbar Extras".
 *
 * @since 1.4.0
 *
 * @return string Translateable string for reusage.
 */
function ddw_tbex_string_toolbar_extras() {

	return __( 'Toolbar Extras', 'toolbar-extras' );

}  // end function


/**
 * Allow for string switching of the local dev notice.
 *
 * @since 1.0.0
 * @since 1.4.0 Combined with constant alternative.
 *
 * @uses ddw_tbex_get_option()
 * @uses TBEX_LOCAL_DEV_TEXT
 *
 * @return string String of local dev notice, filterable.
 */
function ddw_tbex_string_local_dev_environment() {

	$output = esc_attr(
		apply_filters(
			'tbex_filter_string_local_dev',
			ddw_tbex_get_option( 'development', 'local_dev_name' )
		)
	);

	if ( defined( 'TBEX_LOCAL_DEV_TEXT' ) && TBEX_LOCAL_DEV_TEXT ) {
		$output = esc_attr( TBEX_LOCAL_DEV_TEXT );
	}

	return $output;

}  // end function


/**
 * Allow for string switching of the main item.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return string String of main item, filterable.
 */
function ddw_tbex_string_main_item() {

	$output = esc_attr(
		apply_filters(
			'tbex_filter_string_main_item',
			ddw_tbex_get_option( 'general', 'main_item_name' )
		)
	);

	return $output;

}  // end function


/**
 * Allow for string switching of the fallback (main) item.
 *
 * @since 1.0.0
 * @since 1.4.0 Gets string via settings.
 *
 * @uses ddw_tbex_get_option()
 *
 * @return string String of fallback item, filterable.
 */
function ddw_tbex_string_fallback_item() {

	$output = esc_attr(
		apply_filters(
			'tbex_filter_string_fallback_item',
			ddw_tbex_get_option( 'general', 'fallback_item_name' )
		)
	);

	return $output;

}  // end function


/**
 * Allow for string switching of the "Customize Design" item.
 *
 * @since 1.0.0
 *
 * @return string String of item, filterable.
 */
function ddw_tbex_string_customize_design() {

	$output = esc_attr(
		apply_filters(
			'tbex_filter_string_customize_design',
			/* translators: Theme creative group - links to Customizer, default "Customize Design" */
			__( 'Customize Design', 'toolbar-extras' )
		)
	);

	return $output;

}  // end function


/**
 * Allow for string switching of the "Elementor" label.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return string String of Elementor label, filterable.
 */
function ddw_tbex_string_elementor() {

	$output = esc_attr(
		apply_filters(
			'tbex_filter_string_elementor',
			ddw_tbex_get_option( 'general', 'elementor_name' )
		)
	);

	return $output;

}  // end function


/**
 * Build "Elementor" Library string.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_string_elementor()
 *
 * @return string String for "Elementor" Library.
 */
function ddw_tbex_string_elementor_library() {

	$output = esc_attr(
		apply_filters(
			'tbex_filter_string_elementor_library',
			sprintf(
				/* translators: %1$s - Word Elementor */
				__( '%1$s Library', 'toolbar-extras' ),
				ddw_tbex_string_elementor()
			)
		)
	);

	return $output;

}  // end function


/**
 * Build "Elementor" settings string.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_string_elementor()
 *
 * @return string String for "Elementor" settings.
 */
function ddw_tbex_string_elementor_settings() {

	$output = esc_attr(
		apply_filters(
			'tbex_filter_string_elementor_settings',
			sprintf(
				/* translators: %1$s - Word Elementor */
				__( '%1$s Settings', 'toolbar-extras' ),
				ddw_tbex_string_elementor()
			)
		)
	);

	return $output;

}  // end function


/**
 * Build "Elementor" tools string.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_string_elementor()
 *
 * @return string String for "Elementor" tools.
 */
function ddw_tbex_string_elementor_tools() {

	$output = esc_attr(
		apply_filters(
			'tbex_filter_string_elementor_tools',
			sprintf(
				/* translators: %1$s - Word Elementor */
				__( '%1$s Tools', 'toolbar-extras' ),
				ddw_tbex_string_elementor()
			)
		)
	);

	return $output;

}  // end function


/**
 * Build "Elementor" resources string.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_string_elementor()
 *
 * @return string String for "Elementor" resources.
 */
function ddw_tbex_string_elementor_resources() {

	$output = esc_attr(
		apply_filters(
			'tbex_filter_string_elementor_resources',
			sprintf(
				/* translators: %1$s - Word Elementor */
				__( '%1$s Resources', 'toolbar-extras' ),
				ddw_tbex_string_elementor()
			)
		)
	);

	return $output;

}  // end function


/**
 * Build "Elementor" community string.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_string_elementor()
 *
 * @return string String for "Elementor" community.
 */
function ddw_tbex_string_elementor_community() {

	$output = esc_attr(
		apply_filters(
			'tbex_filter_string_elementor_community',
			sprintf(
				/* translators: %1$s - Word Elementor */
				__( '%1$s Community', 'toolbar-extras' ),
				ddw_tbex_string_elementor()
			)
		)
	);

	return $output;

}  // end function


/**
 * Build "Elementor" developers string.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_string_elementor()
 *
 * @return string String for "Elementor" developers.
 */
function ddw_tbex_string_elementor_developers() {

	$output = esc_attr(
		apply_filters(
			'tbex_filter_string_elementor_developers',
			sprintf(
				/* translators: %1$s - Word Elementor */
				__( '%1$s Developers', 'toolbar-extras' ),
				ddw_tbex_string_elementor()
			)
		)
	);

	return $output;

}  // end function


/**
 * Allow for string switching of the "Block Editor" label.
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return string String of Block Editor label, filterable.
 */
function ddw_tbex_string_block_editor() {

	$output = esc_attr(
		apply_filters(
			'tbex_filter_string_block_editor',
			ddw_tbex_get_option( 'general', 'block_editor_name' )
		)
	);

	return $output;

}  // end function


/**
 * Build "Block Editor" resources string.
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_string_block_editor()
 *
 * @return string String for "Block Editor" resources.
 */
function ddw_tbex_string_block_editor_resources() {

	$output = esc_attr(
		apply_filters(
			'tbex_filter_string_block_editor_resources',
			sprintf(
				/* translators: %1$s - Word Block Editor */
				__( '%1$s Resources', 'toolbar-extras' ),
				ddw_tbex_string_block_editor()
			)
		)
	);

	return $output;

}  // end function


/**
 * Build "Block Editor" community string.
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_string_block_editor()
 *
 * @return string String for "Block Editor" community.
 */
function ddw_tbex_string_block_editor_community() {

	$output = esc_attr(
		apply_filters(
			'tbex_filter_string_block_editor_community',
			sprintf(
				/* translators: %1$s - Word Block Editor */
				__( '%1$s Community', 'toolbar-extras' ),
				ddw_tbex_string_block_editor()
			)
		)
	);

	return $output;

}  // end function


/**
 * Build "Block Editor" developers string.
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_string_block_editor()
 *
 * @return string String for "Block Editor" developers.
 */
function ddw_tbex_string_block_editor_developers() {

	$output = esc_attr(
		apply_filters(
			'tbex_filter_string_block_editor_developers',
			sprintf(
				/* translators: %1$s - Word Block Editor */
				__( '%1$s Developers', 'toolbar-extras' ),
				ddw_tbex_string_block_editor()
			)
		)
	);

	return $output;

}  // end function


/**
 * Build "With Builder" New Content string.
 *
 * @since 1.0.0
 *
 * @return string String for New Content section.
 */
function ddw_tbex_string_newcontent_with_builder() {

	return esc_attr(
		apply_filters(
			'tbex_filter_string_newcontent_with_builder',
			_x(
				'With Builder',
				'Toolbar New Content section',
				'toolbar-extras'
			)
		)
	);

}  // end function


/**
 * Build "With Builder" New Content string.
 *
 * @since 1.0.0
 *
 * @return string String for New Content section.
 */
function ddw_tbex_string_newcontent_create_with_builder() {

	return esc_attr(
		apply_filters(
			'tbex_filter_string_newcontent_create_with_builder',
			_x(
				'Create with Builder',
				'Toolbar New Content section',
				'toolbar-extras'
			)
		)
	);

}  // end function


/**
 * Build string for "Add New" Elementor Template with Page Builder:
 *   "Build New %s" where %s is the template type.
 *
 * @since 1.1.0
 *
 * @uses ddw_tbex_get_elementor_template_types()
 *
 * @param string $template_type Name of the Elementor template type
 * @return string String for New Content section.
 */
function ddw_tbex_string_elementor_template_with_builder( $template_type = '' ) {

	/** Fallback if template type is empty */
	if ( empty( $template_type ) ) {
		$template_type = _x( 'Content', 'Elementor Template type', 'toolbar-extras' );
	}

	return esc_attr(
		apply_filters(
			'tbex_filter_string_elementor_template_with_builder',
			sprintf(
				/* translators: %s - Elementor Template type */
				_x(
					'Build New %s',
					'Toolbar New Content section',
					'toolbar-extras'
				),
				$template_type
			)
		)
	);

}  // end function


/**
 * Build string for "Create with Builder" for Elementor Template with Page Builder:
 *   "Build New %s" where %s is the template type.
 *
 * @since 1.1.0
 *
 * @uses ddw_tbex_get_elementor_template_types()
 *
 * @param string $template_type Name of the Elementor template type
 * @return string Title attribute String for New Content section.
 */
function ddw_tbex_string_elementor_template_create_with_builder( $template_type = '' ) {

	/** Fallback if template type is empty */
	if ( empty( $template_type ) ) {
		$template_type = _x( 'Content', 'Elementor Template type', 'toolbar-extras' );
	}

	return esc_attr(
		apply_filters(
			'tbex_filter_string_elementor_template_create_with_builder',
			sprintf(
				/* translators: %s - Elementor Template type */
				_x(
					'Create New %s Template with Builder',
					'Toolbar New Content section',
					'toolbar-extras'
				),
				$template_type
			)
		)
	);

}  // end function


/**
 * Get the Genesis Child Theme settings name.
 *
 * @since 1.2.0
 *
 * @return string Name of Child Theme settings.
 */
function ddw_tbex_string_genesis_child_theme_settings() {

	return sprintf(
		/* translators: %s - Name of the Genesis Child Theme (from the Stylesheet) */
		esc_attr__( '%s Settings', 'toolbar-extras' ),
		wp_get_theme()->get( 'Name' )
	);

}  // end function


/**
 * Build link title attribute string for general/free Add-On Plugin.
 *
 * @since 1.3.0
 *
 * @param string $title Title of Add-On Plugin.
 * @return string Link attribute title.
 */
function ddw_tbex_string_addon_title_attr( $title = '' ) {

	return sprintf(
		/* translators: %s - Title of Add-On Plugin */
		esc_attr__( '%s (Add-On)', 'toolbar-extras' ),
		$title
	);

}  // end function


/**
 * Build link title attribute string for free Add-On Plugin.
 *
 * @since 1.3.0
 *
 * @param string $title Title of free Add-On Plugin.
 * @return string Link attribute title.
 */
function ddw_tbex_string_free_addon_title_attr( $title = '' ) {

	return sprintf(
		/* translators: %s - Title of free Add-On Plugin */
		esc_attr__( '%s (free Add-On)', 'toolbar-extras' ),
		$title
	);

}  // end function


/**
 * Build link title attribute string for Premium Add-On Plugin.
 *
 * @since 1.3.0
 *
 * @param string $title Title of Premium Add-On Plugin.
 * @return string Link attribute title.
 */
function ddw_tbex_string_premium_addon_title_attr( $title = '' ) {

	return sprintf(
		/* translators: %s - Title of Premium Add-On Plugin */
		esc_attr__( '%s (Premium Add-On)', 'toolbar-extras' ),
		$title
	);

}  // end function


/**
 * Build string for Local Dev settings.
 *
 * @since 1.3.0
 *
 * @param string $type Type of local development setting.
 * @return string Complete string for Local Dev setting.
 */
function ddw_tbex_string_plugin_local_dev( $type = '' ) {

	return sprintf(
		/* translators: %s - Type of local development setting (Plugins, Themes, Extras) */
		esc_attr__( 'Local Dev: %s', 'toolbar-extras' ),
		$type
	);

}  // end function


/**
 * Output string for settings that appear only for active plugins.
 *
 * @since 1.3.0
 *
 * @return string Echo string for settings sections descriptions.
 */
function ddw_tbex_string_settings_show_only_for_active_plugins() {

	_e( 'These settings below will only appear below if the supported plugins are installed and activated.', 'toolbar-extras' );

}  // end function


/**
 * Output the link target description on the plugin's settings page.
 *
 * @since 1.3.0
 *
 * @return string Display description texts.
 */
function ddw_tbex_string_link_target_description() {

	$output = sprintf( __( '%s Links open in a new browser tab/ window', 'toolbar-extras' ), __( 'Yes', 'toolbar-extras' ) . ' = <code>_blank</code> ' );
	$output .= '<br />';
	$output .= sprintf( __( '%s Links open in same browser tab/ window', 'toolbar-extras' ), __( 'No', 'toolbar-extras' ) . ' = <code>_self</code> ' );

	echo $output;

}  // end function


/**
 * Build "Info shown once..." notice string.
 *
 * @since 1.1.2
 *
 * @return string String for Notice that is only shown once in case of being dismissed.
 */
function ddw_tbex_string_notice_shown_once() {

	return __( 'This info is only shown once. When dismissed it will never appear again.', 'toolbar-extras' );

}  // end function


/**
 * Build string "Super Admin" or "Admin" depending on Multisite context.
 *
 * @since 1.0.0
 *
 * @param string $type If plural form to be used ('plural') or not.
 * @return string Role label based on Multisite context.
 */
function ddw_tbex_string_maybe_super_admin( $type = 'plural' ) {

	$type = sanitize_key( $type );

	/* translators: Super Admin user role - plural & singular variant */
	$super_admin = ( 'plural' === $type ) ? __( 'Super Admins', 'toolbar-extras' ) : __( 'Super Admin', 'toolbar-extras' );

	/* translators: Super Admin user role - plural & singular variant */
	$admin = ( 'plural' === $type ) ? __( 'Admins', 'toolbar-extras' ) : __( 'Admin', 'toolbar-extras' );

	return esc_html(
		apply_filters(
			'tbex_filter_string_maybe_super_admin',
			is_multisite() ? $super_admin : $admin,
			$type	// optional filter param
		)
	);

}  // end function


/**
 * String for Super Admin menu location.
 *
 * @since 1.0.0
 *
 * @global $GLOBALS[ 'wp_customize' ]
 *
 * @return string $tbex_menu_string String for menu location.
 */
function ddw_tbex_string_super_admin_menu_location() {

	/** Helper strings */
	$string_via       = esc_html__( 'via Plugin', 'toolbar-extras' );
	$string_plugin    = esc_html( ddw_tbex_string_toolbar_extras() );
	$string_site_type = ( is_multisite() ) ? __( 'Multisite', 'toolbar-extras' ) : __( 'Site', 'toolbar-extras' );

	/** Build menu location string */
	if ( isset( $GLOBALS[ 'wp_customize' ] ) ) {

		$tbex_menu_string = sprintf(
			/* translators: %s - Label for type of installation ("Multisite" or "Site") */
			esc_attr__( '%s Toolbar Menu', 'toolbar-extras' ),
			$string_site_type
		);

	} else {

		$tbex_menu_string = sprintf(
			/* translators: %3$s - Label for type of installation ("Multisite" or "Site") */
			'<span title="%1$s: %2$s">' . esc_attr__( '%3$s Toolbar Menu', 'toolbar-extras' ) . '</span>',
			$string_via,
			$string_plugin,
			$string_site_type
		);

	}  // end if

	/** Output */
	return $tbex_menu_string;

}  // end function


/**
 * Build string for New Form in New Content Group.
 *
 * @since 1.3.1
 *
 * @param string $form_system Name of used form plugin (unique name).
 * @param string $type        Type of string - "Form" (default) or "View".
 * @return string Complete string for creating a New Form.
 */
function ddw_tbex_string_new_form( $form_system = '', $type = '' ) {

	if ( 'view' === sanitize_key( $type ) ) {

		return sprintf(
			/* translators: %s - Name of Form System (for example: Formidable, Ninja, Caldera etc.) */
			esc_attr_x(
				'%s View',
				'Toolbar New Content section',
				'toolbar-extras'
			),
			esc_html( $form_system )
		);

	}  // end if

	return sprintf(
		/* translators: %s - Name of Form System (for example: Formidable, Ninja, Caldera etc.) */
		esc_attr_x(
			'%s Form',
			'Toolbar New Content section',
			'toolbar-extras'
		),
		esc_html( $form_system )
	);

}  // end function


/**
 * Build string for Form Builder Plugin name.
 *
 * @since 1.3.2
 *
 * @param string $form_system Name of used form plugin (unique name).
 * @return string Complete string for name of Forms Plugin.
 */
function ddw_tbex_string_forms_system( $form_system = '' ) {

	return sprintf(
		/* translators: %s - Name of Form System (for example: Formidable, Ninja, Caldera etc.) */
		esc_attr_x(
			'%s Forms',
			'A WordPress Form Builder Plugin',
			'toolbar-extras'
		),
		esc_html( $form_system )
	);

}  // end function


/**
 * Build (title attribute) string for an "Add New ..." item within New Content
 *   Group.
 *
 * @since 1.3.2
 *
 * @param string $item String for the element to add.
 * @return string Complete string for creating a new item.
 */
function ddw_tbex_string_add_new_item( $item = '' ) {

	return sprintf(
		/* translators: %s - String for the element to be added (for example: "Backup Archive") */
		esc_attr_x(
			'Add new %s',
			'Toolbar New Content section',
			'toolbar-extras'
		),
		esc_html( $item )
	);

}  // end function


/**
 * Build string for plugin's settings page submit button title.
 *
 * @since 1.3.8
 *
 * @return string Translateable string.
 */
function ddw_tbex_string_save_changes() {

	return esc_attr_x(
		'Save Changes',
		'Plugin\'s settings page save button',
		'toolbar-extras'
	);

}  // end function


/**
 * Build string for "Yes".
 *
 * @since 1.4.0
 *
 * @param string $render  Flag string to optionally echo string (not returning).
 * @param string $in_code Flag string to optionally embed string in HTML <code>
 *                        tags.
 * @return string Returning or echoing the translateable string and markup.
 */
function ddw_tbex_string_yes( $render = '', $in_code = '' ) {

	$string = esc_html__( 'Yes', 'toolbar-extras' );
	$string = ( 'code' === sanitize_key( $in_code ) ) ? '<code>' . $string . '</code>' : $string;

	if ( 'echo' === sanitize_key( $render ) ) {
		echo $string;
	}

	return $string;

}  // end function


/**
 * Build string for "No".
 *
 * @since 1.4.0
 *
 * @param string $render  Flag string to optionally echo string (not returning).
 * @param string $in_code Flag string to optionally embed string in HTML <code>
 *                        tags.
 * @return string Returning or echoing the translateable string and markup.
 */
function ddw_tbex_string_no( $render = '', $in_code = '' ) {

	$string = esc_html__( 'No', 'toolbar-extras' );
	$string = ( 'code' === sanitize_key( $in_code ) ) ? '<code>' . $string . '</code>' : $string;

	if ( 'echo' === sanitize_key( $render ) ) {
		echo $string;
	}

	return $string;

}  // end function


/**
 * Build string for "Choose Icon".
 *
 * @since 1.4.0
 *
 * @param string $render Flag string to optionally echo string (not returning).
 * @return string Returning or echoing the translateable string and markup.
 */
function ddw_tbex_string_choose_icon( $render = '' ) {

	$string = esc_html__( 'Choose Icon', 'toolbar-extras' );

	if ( 'echo' === sanitize_key( $render ) ) {
		echo $string;
	}

	return $string;

}  // end function


/**
 * Build string for "None (empty)".
 *
 * @since 1.4.0
 *
 * @param string $render Flag string to optionally echo string (not returning).
 * @return string Returning or echoing the translateable string and markup.
 */
function ddw_tbex_string_none_empty( $render = '' ) {

	$string = __( 'None (empty)', 'toolbar-extras' );

	if ( 'echo' === sanitize_key( $render ) ) {
		echo $string;
	}

	return $string;

}  // end function


/**
 * Build string for "None (no custom URL)".
 *
 * @since 1.4.0
 *
 * @param string $render Flag string to optionally echo string (not returning).
 * @return string Returning or echoing the translateable string and markup.
 */
function ddw_tbex_string_no_custom_url( $render = '' ) {

	$string = __( 'None (no custom URL)', 'toolbar-extras' );

	if ( 'echo' === sanitize_key( $render ) ) {
		echo $string;
	}

	return $string;

}  // end function


/**
 * Build string for ensuring https:// part for URL input fields.
 *
 * @since 1.4.0
 *
 * @return string Translateable string.
 */
function ddw_tbex_string_ensure_input_https() {

	return sprintf(
		/* translators: %s - the https:// part */
		__( 'Note: Please make sure to enter the full URL, including %s.', 'toolbar-extras' ),
		'<code>https://</code>'
	);

}  // end function


/**
 * String for reusage:
 *   Explanation of the Toolbar structure for Admin and Frontend.
 *
 * @since 1.4.0
 * @since 1.4.2 Splitted into string function for reusage.
 *
 * @uses ddw_tbex_get_info_link()
 */
function ddw_tbex_explanation_toolbar_structure() {

	$output = sprintf(
		/* translators: 1 - linked label, "Toolbar Groups within the Admin" / 2 - linked label, "Toolbar Groups on the Frontend" */
		__( 'See the attached image links to get the whole thing visually: %1$s and %2$s.', 'toolbar-extras' ),
		ddw_tbex_get_info_link(
			'url_tb_admin',
			esc_html__( 'Toolbar Groups within the Admin', 'toolbar-extras' ),
			'dashicons-before dashicons-external tbex-inline'
		),
		ddw_tbex_get_info_link(
			'url_tb_frontend',
			esc_html__( 'Toolbar Groups on the Frontend', 'toolbar-extras' ),
			'dashicons-before dashicons-external tbex-inline'
		)
	);

	echo $output;

}  // end function


/**
 * User info for coloring Toolbar.
 *   This is a helper function specifically for Add-Ons.
 *
 * @since 1.4.2
 */
function ddw_tbex_addon_settings_cb_note_for_coloring() {

	?>
		<p class="description">
			<?php echo sprintf(
				/* translators: 1 - linked label, "For Development" */
				__( 'To adjust these settings just open the %1$s tab here. Don\'t let the "(local) development" wording confuse you: you can use this setting feature for whatever you want. Have fun! ;-)', 'toolbar-extras' ),
				'<a href="' . esc_url( admin_url( 'options-general.php?page=toolbar-extras&tab=development' ) ) . '">"' . __( 'For Development', 'toolbar-extras' ) . '"</a>'
			); ?>
		</p>
	<?php

}  // end function


/**
 * Build string for Site Health Debug info page view: "Undefined"
 *
 * @since 1.4.3
 *
 * @return string Translateable string.
 */
function ddw_tbex_string_undefined() {

	return esc_html_x( 'Undefined', 'Site Health Debug info', 'toolbar-extras' );

}  // end function


/**
 * Build string for Site Health Debug info page view: "Enabled"
 *
 * @since 1.4.3
 *
 * @return string Translateable string.
 */
function ddw_tbex_string_enabled() {

	return esc_html_x( 'Enabled', 'Site Health Debug info', 'toolbar-extras' );

}  // end function


/**
 * Build string for Site Health Debug info page view: "Disabled"
 *
 * @since 1.4.3
 *
 * @return string Translateable string.
 */
function ddw_tbex_string_disabled() {

	return esc_html_x( 'Disabled', 'Site Health Debug info', 'toolbar-extras' );

}  // end function


/**
 * Build string for Site Health Debug info page view:
 *   "Plugin not installed or active"
 *
 * @since 1.4.3
 *
 * @return string Translateable string.
 */
function ddw_tbex_string_uninstalled() {

	return esc_html_x( 'Plugin not installed or active', 'Site Health Debug info', 'toolbar-extras' );

}  // end function


/**
 * Build screen reader specific string: "(opens in a new tab)".
 *
 * @since 1.4.3
 *
 * @return string Translateable string.
 */
function ddw_tbex_string_screen_reader_new_tab() {

	return sprintf(
		'<span class="screen-reader-text">(%s)</span>',
		__( 'opens in a new tab', 'toolbar-extras' )
	);

}  // end function


/**
 * Build Debug Info screen specific string for linked resource.
 *
 * @since 1.4.3
 *
 * @uses ddw_tbex_string_screen_reader_new_tab()
 *
 * @param string $type   Type of link.
 * @param string $source Source from which to get the URL key value.
 * @return string HTML link markup and translateable string.
 */
function ddw_tbex_string_debug_info_link( $type = '', $source = 'tbex' ) {

	$url   = '';
	$label = '';

	switch ( sanitize_key( $type) ) {

		case 'support':
			$url   = ddw_tbex_get_info_url( 'url_wporg_forum', sanitize_key( $source ) );
			$label = __( 'Support', 'toolbar-extras' );
			break;
		
		case 'usergroup':
			$url   = ddw_tbex_get_info_url( 'url_fb_group' );
			$label = __( 'User Group', 'toolbar-extras' );
			break;

	}  // end switch

	$output = sprintf(
		'<a href="%s" target="_blank" rel="nofollow noopener noreferrer">%s</a>%s',
		$url,
		$label,
		ddw_tbex_string_screen_reader_new_tab()
	);

	return $output;

}  // end function


/**
 * Build Debug Info screen string: "Diagnostic information for this plugin ...".
 *
 * @since 1.4.3
 *
 * @uses ddw_tbex_string_debug_info_link()
 *
 * @param string $source Source from which to get the URL key value.
 * @return string HTML link markup and translateable string.
 */
function ddw_tbex_string_debug_diagnostic( $source = 'tbex' ) {

	return sprintf(
		/* translators: 1 - label, "Support" / 2 - label, "User Group" */
		__( 'Diagnostic information for this plugin, helpful for %s and %s', 'toolbar-extras' ),
		ddw_tbex_string_debug_info_link( 'support', sanitize_key( $source ) ),
		ddw_tbex_string_debug_info_link( 'usergroup' )
	);

}  // end function


/**
 * Build string: "{Item} Version History"
 *
 * @since 1.4.4
 *
 * @param string $type Type of item.
 * @return string Translateable string based on given type string.
 */
function ddw_tbex_string_version_history( $type = '' ) {

	$item = '';

	switch ( sanitize_key( $type ) ) {

		case 'plugin':
			$item = __( 'Plugin', 'toolbar-extras' );
			break;

		case 'addon':
			$item = __( 'Add-On', 'toolbar-extras' );
			break;

		case 'theme':
			$item = __( 'Theme', 'toolbar-extras' );
			break;

		case 'child-theme':
			$item = __( 'Child Theme', 'toolbar-extras' );
			break;

	}  // end switch

	return sprintf(
		/* translators: %s - label for item, for example "Plugin" */
		esc_attr__( '%s Version History', 'toolbar-extras' ),
		esc_attr( $item )
	);

}  // end function


/**
 * Build string for Web Group: "Test Current Page URL"
 *
 * @since 1.4.5
 *
 * @return string Translateable string.
 */
function ddw_tbex_string_test_current_page_url() {

	return esc_attr__( 'Test Current Page URL', 'toolbar-extras' );

}  // end function

/**
 * Build string for Web Group: "Test Home URL"
 *
 * @since 1.4.5
 *
 * @return string Translateable string.
 */
function ddw_tbex_string_test_home_url() {

	return esc_attr__( 'Test Home URL', 'toolbar-extras' );

}  // end function
