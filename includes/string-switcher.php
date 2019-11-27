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
 * @since 1.4.8 Added param to optionally 'echo' instead of returning.
 *
 * @param string $render Flag string to optionally echo string (not returning).
 * @return string Returning or echoing the translatable string for reusage.
 */
function ddw_tbex_string_toolbar_extras( $render = '' ) {

	$string = __( 'Toolbar Extras', 'toolbar-extras' );

	if ( 'echo' === sanitize_key( $render ) ) {
		echo $string;
	}

	return $string;

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
 * Build All/ New strings for post type content.
 *
 * @since 1.0.0
 *
 * @param string $type    Type of content
 * @param string $element Name of content element
 * @return string Translated string for post type content.
 */
function ddw_tbex_string_cpt( $type = '', $element = '' ) {

	$string = '';

	/** Check type for the 2 possible values */
	switch ( sanitize_key( $type ) ) {

		case 'all':
			$string = sprintf(
				esc_attr__( 'All %s', 'toolbar-extras' ),
				esc_attr( $element )
			);
			break;

		case 'new':
			$string = sprintf(
				esc_attr__( 'New %s', 'toolbar-extras' ),
				esc_attr( $element )
			);
			break;

	}  // end switch

	return $string;

}  // end function


/**
 * Build current active Theme string with the Theme name from Theme header
 *   declaration (in style.css).
 *
 *   Optional param can be set to use the title of child theme.
 *
 *   Also, a custom theme name can be set - this one will be used only if there
 *   is no child theme in use.
 *
 * @since 1.0.0
 * @since 1.4.0 Optimized and added third param for custom theme name.
 *
 * @uses is_child_theme()
 *
 * @param string $title_attr  Helper, to enable output for title attribute.
 * @param string $child       Helper, to optionally get Name of Child Theme.
 * @param string $custom_name Optionally use a custom theme name.
 * @return string Translatable, escaped string for use as link title or link
 *                title attribute.
 */
function ddw_tbex_string_theme_title( $title_attr = '', $child = '', $custom_name = '' ) {

	/** Optionally use Child Theme Name, otherwise fallback to Parent Theme Name (Template) */
	$type = ( 'child' === strtolower( esc_attr( $child ) ) ) ? '' : get_template();

	$default_name = wp_get_theme( $type )->get( 'Name' );

	$name = ( isset( $custom_name ) && ! empty( $custom_name ) && ! is_child_theme() ) ? esc_attr( $custom_name ) : $default_name;

	/** Build regular link title: */
	$theme_title = sprintf(
		/* translators: %s - Name of current active Theme or Parent Theme (static!) */
		esc_attr__( 'Theme: %s', 'toolbar-extras' ),
		$name
	);

	/** Optional build link title attribute */
	if ( 'attr' === sanitize_key( $title_attr ) ) {

		$theme_title = sprintf(
			/* translators: %s - Name of current active Theme or Parent Theme (static!) */
			esc_html__( 'Active Theme: %s', 'toolbar-extras' ),
			$name
		);

	}  // end if

	/** Return the string */
	return $theme_title;

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
 * Build string for a Form Builder Plugin system name.
 *
 * @since 1.3.2
 * @since 1.4.8 Added additional $is_pro param.
 *
 * @param string $form_system Name of used form plugin (unique name).
 * @param string $is_pro      Flag param to mark a "Pro" forms system name.
 * @return string Complete, translatable string for name of Forms Plugin.
 */
function ddw_tbex_string_forms_system( $form_system = '', $is_pro = '' ) {

	/** Create the regular output */
	$output = sprintf(
		/* translators: %s - Name of Form System (for example: Formidable, Ninja, Caldera etc.) */
		esc_attr_x(
			'%s Forms',
			'A WordPress Form Builder Plugin',
			'toolbar-extras'
		),
		esc_html( $form_system )
	);

	/** Add an optional "Pro" label */
	if ( 'pro' === sanitize_key( $is_pro ) ) {

		$output = sprintf(
			/* translators: %s - label for a form system, for example "Fluent Forms" */
			esc_html__( '%s Pro', 'toolbar-extras' ),
			$output
		);

	}  // end if

	/** Return the final output */
	return $output;

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
 * @return string Translatable string.
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
 * @return string Returning or echoing the translatable string and markup.
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
 * @return string Returning or echoing the translatable string and markup.
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
 * @return string Returning or echoing the translatable string and markup.
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
 * @return string Returning or echoing the translatable string and markup.
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
 * @return string Returning or echoing the translatable string and markup.
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
 * @return string Translatable string.
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
 * @return string Translatable string.
 */
function ddw_tbex_string_undefined() {

	return esc_html_x( 'Undefined', 'Site Health Debug info', 'toolbar-extras' );

}  // end function


/**
 * Build string for Site Health Debug info page view: "Enabled"
 *
 * @since 1.4.3
 *
 * @return string Translatable string.
 */
function ddw_tbex_string_enabled() {

	return esc_html_x( 'Enabled', 'Site Health Debug info', 'toolbar-extras' );

}  // end function


/**
 * Build string for Site Health Debug info page view: "Disabled"
 *
 * @since 1.4.3
 *
 * @return string Translatable string.
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
 * @return string Translatable string.
 */
function ddw_tbex_string_uninstalled() {

	return esc_html_x( 'Plugin not installed or active', 'Site Health Debug info', 'toolbar-extras' );

}  // end function


/**
 * Build screen reader specific string: "(opens in a new tab)".
 *
 * @since 1.4.3
 *
 * @return string Translatable string.
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
 * @return string HTML link markup and translatable string.
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
 * @since 1.4.9 Added additional param for settings tab; feature update.
 *
 * @uses ddw_tbex_string_debug_info_link()
 * @uses ddw_tbex_get_settings_url()
 * @uses ddw_tbex_meta_target()
 *
 * @param string $source       Source from which to get the URL key value.
 * @param string $settings_tab Optional, ID for a Toolbars Extras settings tab.
 * @return string HTML link markup and translatable string.
 */
function ddw_tbex_string_debug_diagnostic( $source = 'tbex', $settings_tab = '' ) {

	/** Set the default debug/diagnostig string */
	$string_debug_diagnostic = sprintf(
		/* translators: 1 - label, "Support" / 2 - label, "User Group" */
		__( 'Diagnostic information for this plugin, helpful for %s and %s', 'toolbar-extras' ),
		ddw_tbex_string_debug_info_link( 'support', sanitize_key( $source ) ),
		ddw_tbex_string_debug_info_link( 'usergroup' )
	);

	/** Prepare default output */
	$output = $string_debug_diagnostic;

	/** Prepare optional settings link string */
	$string_settings_tab = sprintf(
		/* translators: %s - label, "plugin's settings" (linked to settings page) */
		__( 'To change option values, go to the %s', 'toolbar-extras' ),
		'<a href="' . ddw_tbex_get_settings_url( sanitize_key( $settings_tab ) ) . '" target="' . ddw_tbex_meta_target() . '">' . __( 'plugin\'s settings', 'toolbar-extras' ) . '</a>'
	);

	/** Optional: link to plugin's settings */
	if ( ! empty( $settings_tab ) ) {

		$output = sprintf(
			'<p>%s</p><p>%s</p>',
			$string_debug_diagnostic,
			$string_settings_tab
		);

	}  // end if

	/** Render the output */
	return $output;

}  // end function


/**
 * Build string: "{Item} Version History"
 *
 * @since 1.4.4
 * @since 1.4.7 Added new types.
 *
 * @param string $type Type of item.
 * @return string Translatable string based on given type string.
 */
function ddw_tbex_string_version_history( $type = '' ) {

	$item = '';

	switch ( sanitize_key( $type ) ) {

		case 'plugin':
			$item = __( 'Plugin', 'toolbar-extras' );
			break;

		case 'pro-plugin':
			$item = __( 'Pro Plugin', 'toolbar-extras' );
			break;

		case 'addon':
			$item = __( 'Add-On', 'toolbar-extras' );
			break;

		case 'pro-addon':
			$item = __( 'Pro Add-On', 'toolbar-extras' );
			break;

		case 'extension':
			$item = __( 'Extension', 'toolbar-extras' );
			break;

		case 'theme':
			$item = __( 'Theme', 'toolbar-extras' );
			break;

		case 'child-theme':
			$item = __( 'Child Theme', 'toolbar-extras' );
			break;

		case 'framework':
			$item = __( 'Framework', 'toolbar-extras' );
			break;

	}  // end switch

	return sprintf(
		/* translators: %s - label for item, for example "Plugin" */
		esc_attr__( '%s Version History', 'toolbar-extras' ),
		esc_attr( $item )
	);

}  // end function


/**
 * Build string for "Official Theme Documentation".
 *
 * @since 1.4.7
 *
 * @return string Translatable string.
 */
function ddw_tbex_string_official_theme_documentation() {

	return esc_attr__( 'Official Theme Documentation', 'toolbar-extras' );

}  // end function


/**
 * Build string for Web Group: "Test Current Page URL"
 *
 * @since 1.4.5
 *
 * @return string Translatable string.
 */
function ddw_tbex_string_test_current_page_url() {

	return esc_attr__( 'Test Current Page URL', 'toolbar-extras' );

}  // end function


/**
 * Build string for Web Group: "Test Home URL"
 *
 * @since 1.4.5
 *
 * @return string Translatable string.
 */
function ddw_tbex_string_test_home_url() {

	return esc_attr__( 'Test Home URL', 'toolbar-extras' );

}  // end function


/**
 * Build help content string for headline of the Add-On - for re-use, especially
 *   for Add-Ons.
 *
 * @since 1.4.7
 *
 * @param string $addon_name   Name of the specific Toolbar Extras Add-On this
 *                             headline is for.
 * @param string $addon_prefix Unique key from the Add-On (prefix).
 */
function ddw_tbex_string_help_content_addon_headline( $addon_name = '', $addon_prefix ) {

	$addon_prefix = sanitize_key( $addon_prefix );

	$output = sprintf(
		'<h3>%1$s: %2$s <small class="tbex%3$s-help-version">v%4$s</small></h3>',
		__( 'Add-On', 'toolbar-extras' ),
		esc_attr( $addon_name ),
		$addon_prefix,
		constant( strtoupper( 'TBEX' . $addon_prefix ) . '_PLUGIN_VERSION' )
	);

	/** Render the help content */
	echo $output;

}  // end function


/**
 * Build help content string for Product Name setting - for re-use, especially
 *   for Add-Ons.
 *
 * @since 1.4.7
 *
 * @param string $product_name Name of the original (third-party) product the
 *                             Add-On is made for.
 */
function ddw_tbex_string_help_content_product_name( $product_name ) {

	$product_name = esc_attr( $product_name );

	$headline_string = sprintf(
		/* translators: %s - name of the original third-party product, for example "Give Donations (GiveWP)" */
		__( 'Setting %s Name', 'toolbar-extras' ),
		$product_name
	);

	$info_string = sprintf(
		/* translators: %s - name of the original third-party product, for example "Give Donations (GiveWP)" */
		__( 'This affects the %s name in various instances of the Toolbar and the Admin area.', 'toolbar-extras' ),
		$product_name
	);

	$output = sprintf(
		'<h5>%s</h5>',
		$headline_string
	);

	$output .= sprintf(
		'<p class="tbex-help-info">%s</p>',
		$info_string
	);

	/** Render the help content */
	echo $output;

}  // end function


/**
 * Build help content string for Tooltips/ Links behavior of Toolbar items - for
 *   re-use, especially for Add-Ons.
 *
 * @since 1.4.7
 *
 * @uses ddw_tbex_meta_target()
 * @uses ddw_tbex_meta_rel()
 */
function ddw_tbex_string_help_content_tooltips() {

	/** Tooltips/ Links behavior */
	$links_url = sprintf(
		'<a href="%1$s" target="%3$s" rel="%4$s">%2$s</a>',
		esc_url( admin_url( 'options-general.php?page=toolbar-extras&tab=general#tbex-settings-link-behavior' ) ),
		__( 'Settings > Toolbar Extras > Tab: General > Section: Links Behavior', 'toolbar-extras' ),
		ddw_tbex_meta_target(),
		ddw_tbex_meta_rel()
	);

	$output = sprintf(
		'<h5>%s</h5>',
		__( 'How can I disable the link attributes (tooltips)?', 'toolbar-extras' )
	);

	$output .= sprintf(
		'<p class="tbex-help-info"><strong>%1$s:</strong> <code style="font-size: 90%;">%2$s</code></p>',
		__( 'Go to', 'toolbar-extras' ),
		$links_url
	);

	/** Render the help content */
	echo $output;

}  // end function


/**
 * Build help content string for Support Notice - for re-use, especially for
 *   Add-Ons.
 *
 * @since 1.4.7
 *
 * @param string $addon_name   Name of the specific Toolbar Extras Add-On this
 *                             notice is for.
 * @param string $company_name Name of the company/ team/ author of the original
 *                             third-party product/ plugin.
 * @param string $product_name Name of the original (third-party) product the
 *                             Add-On is made for.
 */
function ddw_tbex_string_help_content_support_notice( $addon_name = '', $company_name = '', $product_name = '' ) {

	$output = sprintf(
		'<h5>%s</h5>',
		__( 'Add-On Support Info', 'toolbar-extras' )
	);

	$output .= sprintf(
		/* translators: 1 - plugin name, for example "Toolbar Extras for Give Nonations" / 2 - company name, for example "GiveWP/ Impress.org, LLC" / 3 - product name, for example "Give Donations (GiveWP)" */
		'<p class="tbex-help-info description">' . __( 'Please note, the %1$s Add-On plugin is not officially endorsed by %2$s. It is an independently developed solution by the community for the community. Therefore our support is connected to the Add-On itself, to the Toolbar and the things around it, not the inner meanings of %3$s.', 'toolbar-extras' ) . '</p>',
		'<span class="noitalic">' . esc_attr( $addon_name ) . '</span>',
		'<span class="noitalic">' . esc_attr( $company_name ) . '</span>',
		'<span class="noitalic">' . esc_attr( $product_name ) . '</span>'
	);

	/** Render the help content */
	echo $output;

}  // end function


/**
 * Build help content string for "Important Plugin Links" - for re-use,
 *   especially for Add-Ons.
 *
 * @since 1.4.7
 *
 * @uses ddw_tbex_info_values()
 * @uses ddw_tbex_get_info_link()
 *
 * @param array  $args   Array of arguments for the link building.
 * @param string $render Flag string to optionally echo string (not returning).
 * @return string Returning or echoing the translatable string and markup.
 */
function ddw_tbex_string_help_content_plugin_links( array $args, $render = '' ) {

	$labels = apply_filters(
		'tbex_filter_labels_help_plugin_links',
		array(
			'url_plugin'      => esc_html__( 'Plugin website', 'toolbar-extras' ),
			'url_plugin_faq'  => esc_html_x( 'FAQ', 'Help tab info', 'toolbar-extras' ),
			'url_wporg_forum' => esc_html_x( 'Support', 'Help tab info', 'toolbar-extras' ),
			'url_fb_group'    => esc_html_x( 'Facebook Group', 'Help tab info', 'toolbar-extras' ),
			'url_translate'   => esc_html_x( 'Translations', 'Help tab info', 'toolbar-extras' ),
			'url_donate'      => esc_html_x( 'Donate', 'Help tab info', 'toolbar-extras' ),
			'url_newsletter'  => esc_html_x( 'Join our Newsletter', 'Help tab info', 'toolbar-extras' ),
		)
	);

	$label      = '';
	$class_list = '';
	$classes    = '';
	$source     = '';

	/** Build the output strings and markup */
	$output = ddw_tbex_info_values()[ 'space_helper' ];

	$output .= sprintf(
		'<h4 style="font-size: 1.1em;" class="tbex-help-footer">%s</h4>',
		__( 'Important plugin links:', 'toolbar-extras' )
	);

	/** Loop through all link keys from the $args array */
	foreach ( $args as $link_key => $link_data ) {

		$link_key = sanitize_key( $link_key );

		$label = ( isset( $link_data[ 'label' ] ) && ! empty( $link_data[ 'label' ] ) ) ? $link_data[ 'label' ] : $labels[ $link_key ];

		$class_list = array_map( 'sanitize_html_class', $link_data[ 'class' ] );
		$classes    = sprintf(
			'button %s',
			implode( ' ', $class_list )
		);

		$source = ( ! isset( $link_data[ 'source' ] ) || empty( $link_data[ 'source' ] ) ) ? 'tbex' : sanitize_key( $link_data[ 'source' ] );

		$output .= sprintf(
			'%1$s' . ddw_tbex_get_info_link( $link_key, $label, $classes, $source ),
			( 'yes' === $link_data[ 'first' ] ) ? '' : '&nbsp;&nbsp;'
		);

	}  // end foreach

	/** Render the output */
	if ( 'echo' === sanitize_key( $render ) ) {
		echo $output;
	}

	return $output;

}  // end function


/**
 * Build help content string for footer copyright of plugin/ Add-On - for re-use,
 *   especially useful for Add-Ons.
 *
 * @since 1.4.7
 *
 * @uses ddw_tbex_get_info_url()
 * @uses ddw_tbex_info_values()
 * @uses ddw_tbex_coding_years()
 *
 * @param string $plugin_key Unique string of a specific TBEX Plugin/ Add-On.
 * @param string $render     Flag string to optionally echo string (not returning).
 * @return string Returning or echoing the translatable string and markup.
 */
function ddw_tbex_string_help_content_copyright( $plugin_key = '', $render = '' ) {

	$tbex_info = (array) ddw_tbex_info_values();

	$output = sprintf(
		'<p><a href="%1$s" target="_blank" rel="nofollow noopener noreferrer" title="%2$s">%2$s</a> &#x000A9; %3$s <a href="%4$s" target="_blank" rel="noopener noreferrer" title="%5$s">%5$s</a></p>',
		ddw_tbex_get_info_url( 'url_license' ),
		esc_attr( $tbex_info[ 'license' ] ),
		ddw_tbex_coding_years( '', sanitize_key( $plugin_key ) ),
		esc_url( $tbex_info[ 'author_uri' ] ),
		esc_html( $tbex_info[ 'author' ] )
	);

	/** Render the output */
	if ( 'echo' === sanitize_key( $render ) ) {
		echo $output;
	}

	return $output;

}  // end function


/**
 * Build string for "Base plugin".
 *
 * @since 1.4.7
 *
 * @param string $render Flag string to optionally echo string (not returning).
 * @return string Returning or echoing the translatable string and markup.
 */
function ddw_tbex_string_base_plugin( $render = '' ) {

	$string = _x( 'Base plugin', 'Plugin settings page: listing of items to export', 'toolbar-extras' );

	if ( 'echo' === sanitize_key( $render ) ) {
		echo $string;
	}

	return $string;

}  // end function



/**
 * Build string for "Add-On".
 *
 * @since 1.4.7
 *
 * @param string $render Flag string to optionally echo string (not returning).
 * @return string Returning or echoing the translatable string and markup.
 */
function ddw_tbex_string_addon( $render = '' ) {

	$string = _x( 'Add-On', 'Plugin settings page: listing of items to export', 'toolbar-extras' );

	if ( 'echo' === sanitize_key( $render ) ) {
		echo $string;
	}

	return $string;

}  // end function


/**
 * Build string for ".json" within <abbr> and <code> tags.
 *
 * @since 1.4.7
 *
 * @uses ddw_tbex_abbr()
 * @uses ddw_tbex_code()
 *
 * @param string $render Flag string to optionally echo string (not returning).
 * @return string Returning or echoing the string and markup.
 */
function ddw_tbex_string_json( $render = '' ) {

	$string = ddw_tbex_abbr(
		'JavaScript Object Notation',
		ddw_tbex_code( '.json' )
	);

	if ( 'echo' === sanitize_key( $render ) ) {
		echo $string;
	}

	return $string;

}  // end function


/**
 * Build a dynamic string.
 *   - optional static string prefix
 *   - optional static string suffix
 *   - optional main string
 *
 * @since 1.4.9
 *
 * @param array $args Array holding all arguments for the string.
 * @return string Modified string with optional parameters.
 */
function ddw_tbex_string_dynamic( array $args = [] ) {

	$prefix = ( ! empty( $args[ 'prefix' ] ) ) ? wp_kses_post( $args[ 'prefix' ] ) : '';
	$suffix = ( ! empty( $args[ 'suffix' ] ) ) ? wp_kses_post( $args[ 'suffix' ] ) : '';

	$string = ( ! empty( $args[ 'string' ] ) ) ? $args[ 'string' ] : '';

	if ( ! empty( $args[ 'addition' ] ) ) {

		$string = sprintf(
			/* translators: 1 - a string/ label or empty / 2 - custom additionally attached string */
			__( '%1$s %2$s', 'toolbar-extras' ),
			$string,
			$args[ 'addition' ]
		);

	}  // end if

	return $prefix . esc_attr( $string ) . $suffix;

}  // end function
