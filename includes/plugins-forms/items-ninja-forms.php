<?php

// includes/plugins-forms/items-ninja-forms

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if any Ninja Form Pro Add-On plugin is active or not.
 *
 * @since 1.3.1
 *
 * @param string $addon Identifier of the Add-On to check for.
 *
 * @return bool TRUE if constant/ function/ class exists, FALSE otherwise.
 */
function ddw_tbex_is_ninjaforms_pro_addon_active( $addon = '' ) {

	/** Set default */
	$active = FALSE;

	/** Check if chosen Add-On is active */
	switch ( sanitize_key( $addon ) ) {

		case 'layout-styles':
			$active = defined( 'NINJA_FORMS_STYLE_VERSION' ) ? TRUE : FALSE;
			break;

		case 'file-uploads':
			$active = function_exists( 'NF_File_Uploads' ) ? TRUE : FALSE;
			break;

	}  // end switch

	/** Return the result */
	return $active;

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_ninja_forms' );
/**
 * Items for Plugin: Ninja Forms (free, by The WP Ninjas)
 *
 * @since 1.3.1
 * @since 1.4.2 Security enhancements.
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_ninja_forms() {

	/** For: Forms */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'forms-ninjaforms',
			'parent' => 'tbex-sitegroup-forms',
			'title'  => ddw_tbex_string_forms_system( 'Ninja' ),
			'href'   => esc_url( admin_url( 'admin.php?page=ninja-forms' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_forms_system( 'Ninja' )
			)
		)
	);

		/**
		 * Add each individual form as an item. Database query is necessary.
		 * @since 1.3.1
		 */
		global $wpdb;
    	$nf_table_name = $wpdb->prefix . 'nf3_forms';
    	$forms         = $wpdb->get_results( "SELECT id, title FROM $nf_table_name" );

		/** Proceed only if there are any forms */
		if ( $forms ) {

			/** Add group */
			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-ninjaforms-edit-forms',
					'parent' => 'forms-ninjaforms'
				)
			);

			foreach ( $forms as $form ) {

				$form_id    = absint( $form->id );
				$form_title = esc_attr( $form->title );

				/** Add item per form */
				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-ninjaforms-form-' . $form_id,
						'parent' => 'group-ninjaforms-edit-forms',
						'title'  => $form_title,
						'href'   => esc_url( admin_url( 'admin.php?page=ninja-forms&form_id=' . $form_id ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => esc_attr__( 'Edit Form', 'toolbar-extras' ) . ': ' . $form_title
						)
					)
				);

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'forms-ninjaforms-form-' . $form_id . '-builder',
							'parent' => 'forms-ninjaforms-form-' . $form_id,
							'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=ninja-forms&form_id=' . $form_id ) ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target( 'builder' ),
								'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' )
							)
						)
					);

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'forms-ninjaforms-form-' . $form_id . '-preview',
							'parent' => 'forms-ninjaforms-form-' . $form_id,
							'title'  => esc_attr__( 'Preview', 'toolbar-extras' ),
							'href'   => esc_url( site_url( '/?nf_preview_form=' . $form_id ) ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target(),
								'title'  => esc_attr__( 'Preview', 'toolbar-extras' )
							)
						)
					);

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'forms-ninjaforms-form-' . $form_id . '-submissions',
							'parent' => 'forms-ninjaforms-form-' . $form_id,
							'title'  => esc_attr__( 'Submissions', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'edit.php?post_status=all&post_type=nf_sub&form_id=' . $form_id ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Submissions', 'toolbar-extras' )
							)
						)
					);

			}  // end foreach

		}  // end if

		/** General Ninja Forms items */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-ninjaforms-all-forms',
				'parent' => 'forms-ninjaforms',
				'title'  => esc_attr__( 'All Forms', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=ninja-forms' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Forms', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-ninjaforms-new-form',
				'parent' => 'forms-ninjaforms',
				'title'  => esc_attr__( 'New Form', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=ninja-forms#new-form' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Form', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-ninjaforms-all-submissions',
				'parent' => 'forms-ninjaforms',
				'title'  => esc_attr__( 'All Submissions', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=nf_sub' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Submissions', 'toolbar-extras' )
				)
			)
		);

		/** Pro Add-On: Layout & Styles */
		if ( ddw_tbex_is_ninjaforms_pro_addon_active( 'layout-styles' ) )  {
			
			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-ninjaforms-styling',
					'parent' => 'forms-ninjaforms',
					'title'  => esc_attr__( 'Styling', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=nf-styling' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Styling', 'toolbar-extras' )
					)
				)
			);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-ninjaforms-styling-forms',
						'parent' => 'forms-ninjaforms-styling',
						'title'  => esc_attr__( 'Form Styles', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=nf-styling&tab=form_settings' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Form Styles', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-ninjaforms-styling-fields',
						'parent' => 'forms-ninjaforms-styling',
						'title'  => esc_attr__( 'Default Field Styles', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=nf-styling&tab=field_settings' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Default Field Styles', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-ninjaforms-styling-field-types',
						'parent' => 'forms-ninjaforms-styling',
						'title'  => esc_attr__( 'Field Type Styles', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=nf-styling&tab=field_type' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Field Type Styles', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-ninjaforms-styling-errors',
						'parent' => 'forms-ninjaforms-styling',
						'title'  => esc_attr__( 'Error Styles', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=nf-styling&tab=error_settings' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Error Styles', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-ninjaforms-styling-datepickers',
						'parent' => 'forms-ninjaforms-styling',
						'title'  => esc_attr__( 'DatePicker Styles', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=nf-styling&tab=datepicker_settings' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'DatePicker Styles', 'toolbar-extras' )
						)
					)
				);

		}  // end if

		/** Pro Add-On: File Uploads */
		if ( ddw_tbex_is_ninjaforms_pro_addon_active( 'file-uploads' ) )  {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-ninjaforms-fileuploads',
					'parent' => 'forms-ninjaforms',
					'title'  => esc_attr__( 'File Uploads', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=ninja-forms-uploads' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'File Uploads', 'toolbar-extras' )
					)
				)
			);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-ninjaforms-fileuploads-browse',
						'parent' => 'forms-ninjaforms-fileuploads',
						'title'  => esc_attr__( 'View Uploads', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=ninja-forms-uploads&tab=browse' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'View Uploads', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-ninjaforms-fileuploads-settings',
						'parent' => 'forms-ninjaforms-fileuploads',
						'title'  => esc_attr__( 'Upload Settings', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=ninja-forms-uploads&tab=settings' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Upload Settings', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-ninjaforms-fileuploads-services',
						'parent' => 'forms-ninjaforms-fileuploads',
						'title'  => esc_attr__( 'External Services', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=ninja-forms-uploads&tab=external' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'External Services', 'toolbar-extras' )
						)
					)
				);

		}  // end if

		/** Import/ Export */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-ninjaforms-import-export',
				'parent' => 'forms-ninjaforms',
				'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=nf-import-export' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-ninjaforms-import-export-forms',
					'parent' => 'forms-ninjaforms-import-export',
					'title'  => esc_attr__( 'Forms', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=nf-import-export&tab=formst' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Forms', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-ninjaforms-import-export-fields',
					'parent' => 'forms-ninjaforms-import-export',
					'title'  => esc_attr__( 'Favorite Fields', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=nf-import-export&tab=favorite_fields' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Favorite Fields', 'toolbar-extras' )
					)
				)
			);

		/** Settings */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-ninjaforms-settings',
				'parent' => 'forms-ninjaforms',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=nf-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-ninjaforms-settings-general',
					'parent' => 'forms-ninjaforms-settings',
					'title'  => esc_attr__( 'General Settings', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=nf-settings&tab=settings' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'General Settings', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-ninjaforms-settings-licenses',
					'parent' => 'forms-ninjaforms-settings',
					'title'  => esc_attr__( 'Licenses', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=nf-settings&tab=licenses' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Licenses', 'toolbar-extras' )
					)
				)
			);

		/** System Status */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-ninjaforms-system-status',
				'parent' => 'forms-ninjaforms',
				'title'  => esc_attr__( 'System Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=nf-system-status' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'System Info', 'toolbar-extras' )
				)
			)
		);

		/** Optionally, let other Ninja Forms Add-Ons hook in */
		do_action( 'tbex_after_ninjaforms_settings' );

		/** Group: Resources for Ninja Forms */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-ninjaforms-resources',
					'parent' => 'forms-ninjaforms',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);
			
			ddw_tbex_resource_item(
				'support-forum',
				'ninjaforms-support',
				'group-ninjaforms-resources',
				'https://wordpress.org/support/plugin/ninja-forms'
			);

			ddw_tbex_resource_item(
				'support-contact',
				'ninjaforms-contact',
				'group-ninjaforms-resources',
				'https://ninjaforms.com/contact/'
			);

			ddw_tbex_resource_item(
				'documentation',
				'ninjaforms-docs',
				'group-ninjaforms-resources',
				'https://ninjaforms.com/documentation/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'ninjaforms-translate',
				'group-ninjaforms-resources',
				'https://translate.wordpress.org/projects/wp-plugins/ninja-forms'
			);

			ddw_tbex_resource_item(
				'github',
				'ninjaforms-github',
				'group-ninjaforms-resources',
				'https://github.com/wpninjas/ninja-forms'
			);

			ddw_tbex_resource_item(
				'official-site',
				'ninjaforms-site',
				'group-ninjaforms-resources',
				'https://ninjaforms.com/'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_new_content_ninja_forms', 80 );
/**
 * Items for "New Content" section: New Ninja Form
 *
 * @since 1.3.1
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_new_content_ninja_forms() {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() || is_network_admin() ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-ninja-form',
			'parent' => 'new-content',
			'title'  => ddw_tbex_string_new_form( 'Ninja' ),
			'href'   => esc_url( admin_url( 'admin.php?page=ninja-forms#new-form' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_add_new_item( ddw_tbex_string_new_form( 'Ninja' ) )
			)
		)
	);

}  // end function
