<?php

// includes/plugins-forms/items-advanced-forms

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_advanced_forms' );
/**
 * Items for ACF Pro Add-On Plugin:
 *   Advanced Forms (free, by Fabian Lindfors/ Hookturn Digital Pty Ltd)
 *
 * @since 1.4.3
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_advanced_forms( $admin_bar ) {

	$type = 'af_form';

	/** For: Forms */
	$admin_bar->add_node(
		array(
			'id'     => 'forms-advancedforms',
			'parent' => 'tbex-sitegroup-forms',
			'title'  => ddw_tbex_string_forms_system( esc_attr__( 'Advanced', 'toolbar-extras' ) ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_forms_system( esc_attr__( 'Advanced', 'toolbar-extras' ) ),
			)
		)
	);

		/**
		 * Add each individual form as an item.
		 *   Forms are saved as a post type therefore a query necessary.
		 * @since 1.4.3
		 */
		$args = array(
			'post_type'      => $type,
			'posts_per_page' => -1,
		);

		$forms = get_posts( $args );

		/** Proceed only if there are any forms */
		if ( $forms ) {

			/** Add group */
			$admin_bar->add_group(
				array(
					'id'     => 'group-advancedforms-edit-forms',
					'parent' => 'forms-advancedforms',
				)
			);

			foreach ( $forms as $form ) {

				$form_id   = absint( $form->ID );
				$form_name = esc_attr( $form->post_title );

				$form_data = af_get_form( $form_id );
				//$form_key  = af_get_form_field_groups( $form_data[ 'key' ] );
               
				// Get field groups for the current form
				//$field_groups = af_get_form_field_groups( $form_data[ 'key' ] );

				/** Add item per form */
				$admin_bar->add_node(
					array(
						'id'     => 'forms-advancedforms-form-' . $form_id,
						'parent' => 'group-advancedforms-edit-forms',
						'title'  => $form_name,
						'href'   => esc_url( admin_url( 'post.php?post=' . $form_id . '&action=edit&classic-editor' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Edit Form', 'toolbar-extras' ) . ': ' . $form_name
						)
					)
				);

					$admin_bar->add_node(
						array(
							'id'     => 'forms-advancedforms-form-' . $form_id . '-settings',
							'parent' => 'forms-advancedforms-form-' . $form_id,
							'title'  => esc_attr__( 'Form Settings', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'post.php?post=' . $form_id . '&action=edit&classic-editor' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Form Settings', 'toolbar-extras' )
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'forms-advancedforms-form-' . $form_id . '-preview',
							'parent' => 'forms-advancedforms-form-' . $form_id,
							'title'  => esc_attr__( 'Preview', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=af_preview_form&form_id=' . $form_id ) ),	//esc_url( site_url( '/forms/' . $form_slug . '/' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Preview', 'toolbar-extras' )
							)
						)
					);

					if ( '1' === get_post_meta( $form_id, 'form_create_entries', TRUE ) ) {

						$admin_bar->add_node(
							array(
								'id'     => 'forms-advancedforms-form-' . $form_id . '-entries',
								'parent' => 'forms-advancedforms-form-' . $form_id,
								'title'  => esc_attr__( 'Entries', 'toolbar-extras' ),
								'href'   => esc_url( admin_url( 'edit.php?post_type=af_entry&entry_form=' . $form_data[ 'key' ] ) ),
								'meta'   => array(
									'target' => '',
									'title'  => esc_attr__( 'Entries', 'toolbar-extras' )
								)
							)
						);

					}  // end if

			}  // end foreach

		}  // end if

		/** All Forms */
		$admin_bar->add_node(
			array(
				'id'     => 'forms-advancedforms-all-forms',
				'parent' => 'forms-advancedforms',
				'title'  => esc_attr__( 'All Forms', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Forms', 'toolbar-extras' )
				)
			)
		);

		/** New Form */
		$admin_bar->add_node(
			array(
				'id'     => 'forms-advancedforms-new-form',
				'parent' => 'forms-advancedforms',
				'title'  => esc_attr__( 'New Form', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Form', 'toolbar-extras' )
				)
			)
		);

		/** All Entries */
		$admin_bar->add_node(
			array(
				'id'     => 'forms-advancedforms-all-entries',
				'parent' => 'forms-advancedforms',
				'title'  => esc_attr__( 'All Entries', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=af_entry' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Entries', 'toolbar-extras' )
				)
			)
		);

		/** Field Groups */
		$admin_bar->add_node(
			array(
				'id'     => 'forms-advancedforms-settings',
				'parent' => 'forms-advancedforms',
				'title'  => esc_attr__( 'Field Groups', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=acf-field-group' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Field Groups', 'toolbar-extras' )
				)
			)
		);

		/** Optionally, let other Advanced Forms Add-Ons hook in */
		do_action( 'tbex_after_advancedforms_settings' );

		/** Group: Resources for Advanced Forms */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-advancedforms-resources',
					'parent' => 'forms-advancedforms',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);
			
			ddw_tbex_resource_item(
				'support-forum',
				'advancedforms-support',
				'group-advancedforms-resources',
				'https://wordpress.org/support/plugin/advanced-forms'
			);

			ddw_tbex_resource_item(
				'documentation',
				'advancedforms-docs',
				'group-advancedforms-resources',
				'https://advancedforms.github.io/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'advancedforms-translate',
				'group-advancedforms-resources',
				'https://translate.wordpress.org/projects/wp-plugins/advanced-forms'
			);

			ddw_tbex_resource_item(
				'github',
				'advancedforms-github',
				'group-advancedforms-resources',
				'https://github.com/advancedforms/advanced-forms'
			);

			ddw_tbex_resource_item(
				'official-site',
				'advancedforms-site',
				'group-advancedforms-resources',
				'https://hookturn.io/downloads/advanced-forms-pro/'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_new_content_advanced_form', 80 );
/**
 * Items for "New Content" section: New Advanced Form
 *
 * @since 1.4.3
 *
 * @param object $admin_bar Holds all nodes of the Toolbar.
 */
function ddw_tbex_aoitems_new_content_advanced_form( $admin_bar ) {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() || is_network_admin() ) {
		return $admin_bar;
	}

	$type = 'af_form';

	$admin_bar->add_node(
		array(
			'id'     => 'new-' . $type,	// same as original cpt!
			'parent' => 'new-content',
			'title'  => ddw_tbex_string_new_form( esc_attr__( 'Advanced', 'toolbar-extras' ) ),
			'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type ) ),
			'meta'   => array(
				'title'  => ddw_tbex_string_add_new_item( ddw_tbex_string_new_form( esc_attr__( 'Advanced', 'toolbar-extras' ) ) )
			)
		)
	);

}  // end function
