<?php

// includes/elementor-addons/items-jetthemecore

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Get all JetThemeCore template types as an array.
 *   Note: Filter 'tbex_filter_jetthemecore_template_types' allows for plugins
 *         to add or remove template types.
 *
 * @since  1.3.0
 * @since  1.3.2 Added new template types.
 * @see    ddw_tbex_get_elementor_template_types() in includes/functions-global.php
 *
 * @return array Array of JetThemeCore template types.
 */
function ddw_tbex_get_jetthemecore_template_types() {

	$template_types = apply_filters(
		'tbex_filter_jetthemecore_template_types',
		array( 'jet_page', 'jet_section', 'jet_header', 'jet_footer', 'jet_single', 'jet_archive' )
	);

	return array_map( 'sanitize_key', $template_types );

}  // end function


/**
 * Create an "Add New" link for an JetThemeCore Library Template Type, including
 *   the setting of a template type.
 *
 * @since  1.3.0
 * @since  1.3.2 Added new template types.
 *
 * @uses   ddw_tbex_get_jetthemecore_template_types()
 *
 * @param  string $type Key of the JetThemeCore template type.
 * @param  string $name Title/ Label of to be created template.
 * @return string URL for adding a new JetThemeCore template, containing the
 *                proper template type plus the title/ label name.
 */
function ddw_tbex_get_jetthemecore_template_add_new_url( $type = '', $name = '' ) {

	/** Fallback to template type 'jet_page' if type parameter is no supported type or is empty */
	if ( ! in_array( $type, ddw_tbex_get_jetthemecore_template_types() ) || empty( $type ) ) {
		$type = 'jet_page';
	}

	/** Set the proper template type label based on template type */
	switch ( sanitize_key( $type ) ) {

		case 'jet_page':
			$jet_label = _x( 'Page', 'JetThemeCore Template type', 'toolbar-extras' );
			break;
		case 'jet_section':
			$jet_label = _x( 'Section', 'JetThemeCore Template type', 'toolbar-extras' );
			break;
		case 'jet_header':
			$jet_label = _x( 'Header', 'JetThemeCore Template type', 'toolbar-extras' );
			break;
		case 'jet_footer':
			$jet_label = _x( 'Footer', 'JetThemeCore Template type', 'toolbar-extras' );
			break;
		case 'jet_single':
			$jet_label = _x( 'Single', 'JetThemeCore Template type', 'toolbar-extras' );
			break;
		case 'jet_archive':
			$jet_label = _x( 'Archive', 'JetThemeCore Template type', 'toolbar-extras' );
			break;

	}  // end switch

	/** Get current local date & time, based on formats set in General Settings */
	$jet_date = date(
		get_option( 'date_format' ) . ' ' . get_option( 'time_format' ),
		current_time( 'timestamp' )
	);

	/** Set template title if no name was given */
	$jet_template_title = sprintf(
		/* translators: %1$s - Name of the template type / %2$s - Current Date + Time */
		esc_attr__( 'Jet Theme Part - %1$s %2$s', 'toolbar-extras' ),
		$jet_label,
		$jet_date
	);

	/** Set final template title for output */
	$template_title = ( ! empty( $name ) ) ? esc_attr( $name ) : $jet_template_title;

	/** Build & return the final template creation URL action */
	return add_query_arg(
		array(
			'action'        => 'jet_create_new_template',
			'template_type' => sanitize_key( $type ),
			'template_name' => $template_title,
		),
		esc_url( admin_url( 'admin.php' ) )
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_jetthemecore', 100 );
/**
 * Items for Add-On: JetThemeCore (Premium, by Zemez/ CrocoBlock)
 *
 * @since  1.3.0
 * @since  1.3.2 Added new template types.
 *
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_jetthemecore() {

	/** JetThemeCore Library */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'jetthemecore-library',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'Jet Theme Parts', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=jet-theme-core' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Jet Theme Parts', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'jetthemecore-library-all',
				'parent' => 'jetthemecore-library',
				'title'  => esc_attr__( 'All Templates', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=jet-theme-core' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Templates', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'jet-library-types',
				'parent' => 'jetthemecore-library',
				'title'  => esc_attr__( 'Template Types', 'toolbar-extras' ),
				'href'   => '',
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'JetThemeCore Template Types', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'jet-library-pages',
					'parent' => 'jet-library-types',
					/* translators: JetThemeCore Template type */
					'title'  => esc_attr_x( 'Pages', 'JetThemeCore Template type', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=jet-theme-core&jet_library_type=jet_page' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Template Type: Pages', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'jet-library-sections',
					'parent' => 'jet-library-types',
					/* translators: JetThemeCore Template type */
					'title'  => esc_attr_x( 'Sections', 'JetThemeCore Template type', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=jet-theme-core&jet_library_type=jet_section' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Template Type: Section Blocks', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'jet-library-headers',
					'parent' => 'jet-library-types',
					/* translators: JetThemeCore Template type */
					'title'  => esc_attr_x( 'Headers', 'JetThemeCore Template type', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=jet-theme-core&jet_library_type=jet_header' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Template Type: Headers', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'jet-library-footers',
					'parent' => 'jet-library-types',
					/* translators: JetThemeCore Template type */
					'title'  => esc_attr_x( 'Footers', 'JetThemeCore Template type', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=jet-theme-core&jet_library_type=jet_footer' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Template Type: Footers', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'jet-library-single',
					'parent' => 'jet-library-types',
					/* translators: JetThemeCore Template type */
					'title'  => esc_attr_x( 'Single', 'JetThemeCore Template type', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=jet-theme-core&jet_library_type=jet_single' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Template Type: Single Content Blocks', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'jet-library-archives',
					'parent' => 'jet-library-types',
					/* translators: JetThemeCore Template type */
					'title'  => esc_attr_x( 'Archives', 'JetThemeCore Template type', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=jet-theme-core&jet_library_type=jet_archive' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Template Type: Archive Content Blocks', 'toolbar-extras' )
					)
				)
			);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'jetthemecore-library-new',
				'parent' => 'jetthemecore-library',
				'title'  => esc_attr__( 'New Template', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=jet-theme-core' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Template', 'toolbar-extras' )
				)
			)
		);

		if ( \Elementor\User::is_current_user_can_edit_post_type( 'jet-theme-core' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'jetthemecore-library-new-builder',
					'parent' => 'jetthemecore-library',
					'title'  => esc_attr__( 'New Template Builder', 'toolbar-extras' ),
					'href'   => '',
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Template Builder', 'toolbar-extras' )
					)
				)
			);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'jet-build-template-page',
						'parent' => 'jetthemecore-library-new-builder',
						'title'  => ddw_tbex_string_elementor_template_with_builder( _x( 'Page', 'JetThemeCore Template type', 'toolbar-extras' ) ),
						'href'   => ddw_tbex_get_jetthemecore_template_add_new_url( 'jet_page' ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => ddw_tbex_string_elementor_template_create_with_builder( _x( 'Page', 'JetThemeCore Template type', 'toolbar-extras' ) )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'jet-build-template-section',
						'parent' => 'jetthemecore-library-new-builder',
						'title'  => ddw_tbex_string_elementor_template_with_builder( _x( 'Section', 'JetThemeCore Template type', 'toolbar-extras' ) ),
						'href'   => ddw_tbex_get_jetthemecore_template_add_new_url( 'jet_section' ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => ddw_tbex_string_elementor_template_create_with_builder( _x( 'Section', 'JetThemeCore Template type', 'toolbar-extras' ) )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'jet-build-template-header',
						'parent' => 'jetthemecore-library-new-builder',
						'title'  => ddw_tbex_string_elementor_template_with_builder( _x( 'Header', 'JetThemeCore Template type', 'toolbar-extras' ) ),
						'href'   => ddw_tbex_get_jetthemecore_template_add_new_url( 'jet_header' ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => ddw_tbex_string_elementor_template_create_with_builder( _x( 'Header', 'JetThemeCore Template type', 'toolbar-extras' ) )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'jet-build-template-footer',
						'parent' => 'jetthemecore-library-new-builder',
						'title'  => ddw_tbex_string_elementor_template_with_builder( _x( 'Footer', 'JetThemeCore Template type', 'toolbar-extras' ) ),
						'href'   => ddw_tbex_get_jetthemecore_template_add_new_url( 'jet_footer' ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => ddw_tbex_string_elementor_template_create_with_builder( _x( 'Footer', 'JetThemeCore Template type', 'toolbar-extras' ) )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'jet-build-template-single',
						'parent' => 'jetthemecore-library-new-builder',
						'title'  => ddw_tbex_string_elementor_template_with_builder( _x( 'Single', 'JetThemeCore Template type', 'toolbar-extras' ) ),
						'href'   => ddw_tbex_get_jetthemecore_template_add_new_url( 'jet_single' ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => ddw_tbex_string_elementor_template_create_with_builder( _x( 'Single', 'JetThemeCore Template type', 'toolbar-extras' ) )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'jet-build-template-archive',
						'parent' => 'jetthemecore-library-new-builder',
						'title'  => ddw_tbex_string_elementor_template_with_builder( _x( 'Archive', 'JetThemeCore Template type', 'toolbar-extras' ) ),
						'href'   => ddw_tbex_get_jetthemecore_template_add_new_url( 'jet_archive' ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => ddw_tbex_string_elementor_template_create_with_builder( _x( 'Archive', 'JetThemeCore Template type', 'toolbar-extras' ) )
						)
					)
				);

			/** Hook place for plugins etc. */
			do_action( 'tbex_after_jetthemecore_library_builder' );

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_jetthemecore_resources', 200 );
/**
 * General resources items for JetThemeCore Plugin.
 *
 * @since 1.3.0
 *
 * @uses  ddw_tbex_display_items_resources()
 * @uses  ddw_tbex_resource_item()
 */
function ddw_tbex_aoitems_jetthemecore_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for JetThemeCore */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-jetthemecore-resources',
			'parent' => 'jetthemecore-library',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	ddw_tbex_resource_item(
		'documentation',
		'jetthemecore-library-docs',
		'group-jetthemecore-resources',
		'http://documentation.zemez.io/wordpress/index.php?project=crocoblock&lang=en&section=crocoblock-jetthemecore'
	);

}  // end function


add_action( 'tbex_new_content_before_nav_menu', 'ddw_tbex_aoitems_new_content_jetthemecore' );
/**
 * Items for "New Content" section: New Jet Templates
 *
 * @since  1.3.0
 * @since  1.3.2 Added new template types.
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_new_content_jetthemecore() {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() || ! \Elementor\User::is_current_user_can_edit_post_type( 'jet-theme-core' ) ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-jetthemecore-template',
			'parent' => 'new-content',
			'title'  => esc_attr_x( 'Jet Theme Part', 'Toolbar New Content section', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'post-new.php?post_type=jet-theme-core' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr_x( 'New Jet Theme Part Template (JetThemeCore)', 'Toolbar New Content section', 'toolbar-extras' ),
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'jet-page-with-builder',
				'parent' => 'tbex-jetthemecore-template',
				'title'  => ddw_tbex_string_elementor_template_with_builder( _x( 'Page', 'JetThemeCore Template type', 'toolbar-extras' ) ),
				'href'   => ddw_tbex_get_jetthemecore_template_add_new_url( 'jet_page' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_elementor_template_create_with_builder( _x( 'Page', 'JetThemeCore Template type', 'toolbar-extras' ) )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'jet-section-with-builder',
				'parent' => 'tbex-jetthemecore-template',
				'title'  => ddw_tbex_string_elementor_template_with_builder( _x( 'Section', 'JetThemeCore Template type', 'toolbar-extras' ) ),
				'href'   => ddw_tbex_get_jetthemecore_template_add_new_url( 'jet_section' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_elementor_template_create_with_builder( _x( 'Section', 'JetThemeCore Template type', 'toolbar-extras' ) )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'jet-header-with-builder',
				'parent' => 'tbex-jetthemecore-template',
				'title'  => ddw_tbex_string_elementor_template_with_builder( _x( 'Header', 'JetThemeCore Template type', 'toolbar-extras' ) ),
				'href'   => ddw_tbex_get_jetthemecore_template_add_new_url( 'jet_header' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_elementor_template_create_with_builder( _x( 'Header', 'JetThemeCore Template type', 'toolbar-extras' ) )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'jet-footer-with-builder',
				'parent' => 'tbex-jetthemecore-template',
				'title'  => ddw_tbex_string_elementor_template_with_builder( _x( 'Footer', 'JetThemeCore Template type', 'toolbar-extras' ) ),
				'href'   => ddw_tbex_get_jetthemecore_template_add_new_url( 'jet_footer' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_elementor_template_create_with_builder( _x( 'Footer', 'JetThemeCore Template type', 'toolbar-extras' ) )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'jet-single-with-builder',
				'parent' => 'tbex-jetthemecore-template',
				'title'  => ddw_tbex_string_elementor_template_with_builder( _x( 'Single', 'JetThemeCore Template type', 'toolbar-extras' ) ),
				'href'   => ddw_tbex_get_jetthemecore_template_add_new_url( 'jet_single' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_elementor_template_create_with_builder( _x( 'Single', 'JetThemeCore Template type', 'toolbar-extras' ) )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'jet-archive-with-builder',
				'parent' => 'tbex-jetthemecore-template',
				'title'  => ddw_tbex_string_elementor_template_with_builder( _x( 'Archive', 'JetThemeCore Template type', 'toolbar-extras' ) ),
				'href'   => ddw_tbex_get_jetthemecore_template_add_new_url( 'jet_archive' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_elementor_template_create_with_builder( _x( 'Archive', 'JetThemeCore Template type', 'toolbar-extras' ) )
				)
			)
		);

}  // end function