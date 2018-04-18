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
 * Allow for string switching of the local dev notice.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_get_option()
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

	return $output;

}  // end function


/**
 * Allow for string switching of the main item.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_get_option()
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
 * @since  1.0.0
 *
 * @return string String of fallback item, filterable.
 */
function ddw_tbex_string_fallback_item() {

	$output = esc_attr(
		apply_filters(
			'tbex_filter_string_fallback_item',
			/* translators: Toolbar main item, fallback if no supported Page Builder active */
			_x(
				'Customize',
				'Toolbar main item, fallback if no supported Page Builder active',
				'toolbar-extras'
			)
		)
	);

	return $output;

}  // end function


/**
 * Allow for string switching of the "Customize Design" item.
 *
 * @since  1.0.0
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
 * Allow for string switching of the "Elementor" word.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_get_option()
 *
 * @return string String of Elementor word, filterable.
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
 * @since  1.0.0
 *
 * @uses   ddw_tbex_string_elementor()
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
 * @since  1.0.0
 *
 * @uses   ddw_tbex_string_elementor()
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
 * @since  1.0.0
 *
 * @uses   ddw_tbex_string_elementor()
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
 * @since  1.0.0
 *
 * @uses   ddw_tbex_string_elementor()
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
 * @since  1.0.0
 *
 * @uses   ddw_tbex_string_elementor()
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
 * @since  1.0.0
 *
 * @uses   ddw_tbex_string_elementor()
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
 * Build "With Builder" New Content string.
 *
 * @since  1.0.0
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
 * @since  1.0.0
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
 * @since  1.1.0
 *
 * @uses   ddw_tbex_get_elementor_template_types()
 *
 * @param  string $template_type Name of the Elementor template type
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
 * @since  1.1.0
 *
 * @uses   ddw_tbex_get_elementor_template_types()
 *
 * @param  string $template_type Name of the Elementor template type
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
 * Build string "Super Admin" or "Admin" depending on Multisite context.
 *
 * @since  1.0.0
 *
 * @param  bool $plural If plural form to be used (TRUE) or not (FALSE)
 * @return string Role label based on Multisite context.
 */
function ddw_tbex_string_maybe_super_admin( $plural = FALSE ) {

	/* translators: Super Admin user role - plural & singular variant */
	$super_admin = ( TRUE === $plural ) ? __( 'Super Admins', 'toolbar-extras' ) : __( 'Super Admin', 'toolbar-extras' );

	/* translators: Super Admin user role - plural & singular variant */
	$admin = ( TRUE === $plural ) ? __( 'Admins', 'toolbar-extras' ) : __( 'Admin', 'toolbar-extras' );

	return esc_html(
		apply_filters(
			'tbex_filter_string_maybe_super_admin',
			is_multisite() ? $super_admin : $admin,
			(bool) $plural	// optional filter param
		)
	);

}  // end function


/**
 * String for Super Admin menu location.
 *
 * @since   1.0.0
 *
 * @global  $GLOBALS[ 'wp_customize' ]
 *
 * @return  string $tbex_menu_string String for menu location.
 */
function ddw_tbex_string_super_admin_menu_location() {

	/** Helper strings */
	$string_via       = esc_html__( 'via Plugin', 'toolbar-extras' );
	$string_plugin    = esc_html__( 'Toolbar Extras', 'toolbar-extras' );
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
