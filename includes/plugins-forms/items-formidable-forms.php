<?php

// includes/plugins-forms/items-formidable-forms

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if Formidable Pro Add-On plugin is active or not.
 *
 * @since 1.3.1
 *
 * @return bool TRUE if function exists, FALSE otherwise.
 */
function ddw_tbex_is_formidable_pro_active() {

	return function_exists( 'load_formidable_pro' );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_formidable_forms' );
/**
 * Items for Plugin: Formidable Lite/ Pro (free/ Premium, by Strategy11)
 *
 * @since 1.3.1
 *
 * @uses FrmForm::get_published_forms()
 * @uses FrmAppHelper::truncate()
 * @uses FrmFormsHelper::get_direct_link()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_formidable_forms() {

	/** For: Forms */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'forms-formidableforms',
			'parent' => 'tbex-sitegroup-forms',
			'title'  => ddw_tbex_string_forms_system( 'Formidable' ),
			'href'   => esc_url( admin_url( 'admin.php?page=formidable' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_forms_system( 'Formidable' )
			)
		)
	);

		/**
		 * Add each individual form as an item; using Formdibale helper Classes
		 *   and Methods.
		 * @since 1.3.1
		 */
		$forms = FrmForm::get_published_forms();

		/** Proceed only if there are any forms */
		if ( $forms ) {

			/** Add group */
			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-formidableforms-edit-forms',
					'parent' => 'forms-formidableforms'
				)
			);

			foreach ( $forms as $form ) {

				$form_title = esc_html( '' === $form->name ? __( '(no title)', 'toolbar-extras' ) : FrmAppHelper::truncate( $form->name, 50 ) );
				$form_id    = absint( $form->id );

				/** Add item per form */
				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-formidableforms-form-' . $form->id,
						'parent' => 'group-formidableforms-edit-forms',
						'title'  => $form_title,
						'href'   => esc_url( admin_url( 'admin.php?page=formidable&frm_action=edit&id=' . $form->id ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Edit Form', 'toolbar-extras' ) . ': ' . $form_title
						)
					)
				);

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'forms-formidableforms-form-' . $form->id . '-builder',
							'parent' => 'forms-formidableforms-form-' . $form->id,
							'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=formidable&frm_action=edit&id=' . $form->id ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' )
							)
						)
					);

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'forms-formidableforms-form-' . $form->id . '-preview-empty',
							'parent' => 'forms-formidableforms-form-' . $form->id,
							'title'  => esc_attr__( 'Preview', 'toolbar-extras' ) . ': ' . __( 'On Empty Page', 'toolbar-extras' ),
							'href'   => esc_url( FrmFormsHelper::get_direct_link( $form->form_key ) ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target(),
								'title'  => esc_attr__( 'Preview', 'toolbar-extras' ) . ': ' . __( 'On Empty Page', 'toolbar-extras' )
							)
						)
					);

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'forms-formidableforms-form-' . $form->id . '-preview-theme',
							'parent' => 'forms-formidableforms-form-' . $form->id,
							'title'  => esc_attr__( 'Preview', 'toolbar-extras' ) . ': ' . esc_attr__( 'Within Theme', 'toolbar-extras' ),
							'href'   => esc_url( FrmFormsHelper::get_direct_link( $form->form_key ) . '&theme=1' ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target(),
								'title'  => esc_attr__( 'Preview', 'toolbar-extras' ) . ': ' . esc_attr__( 'Within Theme', 'toolbar-extras' )
							)
						)
					);

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'forms-formidableforms-form-' . $form->id . '-settings',
							'parent' => 'forms-formidableforms-form-' . $form->id,
							'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=formidable&frm_action=settings&id=' . $form->id ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
							)
						)
					);

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'forms-formidableforms-form-' . $form->id . '-submissions',
							'parent' => 'forms-formidableforms-form-' . $form->id,
							'title'  => esc_attr__( 'Entries', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=formidable-entries&frm_action=list&form=' . $form->id ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Entries', 'toolbar-extras' )
							)
						)
					);

					/** Pro only: Views & Reports */
					if ( ddw_tbex_is_formidable_pro_active() ) {

						$GLOBALS[ 'wp_admin_bar' ]->add_node(
							array(
								'id'     => 'forms-formidableforms-form-' . $form->id . '-views',
								'parent' => 'forms-formidableforms-form-' . $form->id,
								'title'  => esc_attr__( 'Views', 'toolbar-extras' ),
								'href'   => esc_url( admin_url( 'edit.php?post_type=frm_display&show_nav=1&form=' . $form->id ) ),
								'meta'   => array(
									'target' => '',
									'title'  => esc_attr__( 'Views', 'toolbar-extras' )
								)
							)
						);

						$GLOBALS[ 'wp_admin_bar' ]->add_node(
							array(
								'id'     => 'forms-formidableforms-form-' . $form->id . '-reports',
								'parent' => 'forms-formidableforms-form-' . $form->id,
								'title'  => esc_attr__( 'Reports', 'toolbar-extras' ),
								'href'   => esc_url( admin_url( 'admin.php?page=formidable&frm_action=reports&show_nav=1&form=' . $form->id ) ),
								'meta'   => array(
									'target' => '',
									'title'  => esc_attr__( 'Reports', 'toolbar-extras' )
								)
							)
						);

					}  // end if

			}  // end foreach

		}  // end if

		/** General Formidable Forms items */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-formidableforms-formslist',
				'parent' => 'forms-formidableforms',
				'title'  => esc_attr__( 'Forms', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=formidable' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Forms', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-formidableforms-formslist-all',
					'parent' => 'forms-formidableforms-formslist',
					'title'  => esc_attr__( 'All Forms', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=formidable' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Forms', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-formidableforms-formslist-new',
					'parent' => 'forms-formidableforms-formslist',
					'title'  => esc_attr__( 'New Form', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=formidable&frm_action=new' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => esc_attr__( 'New Form', 'toolbar-extras' )
					)
				)
			);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-formidableforms-all-entries',
				'parent' => 'forms-formidableforms',
				'title'  => esc_attr__( 'All Entries', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=formidable-entries' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Entries', 'toolbar-extras' )
				)
			)
		);

		/** Pro only: Views */
		if ( ddw_tbex_is_formidable_pro_active() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-formidableforms-views',
					'parent' => 'forms-formidableforms',
					'title'  => esc_attr__( 'Views', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=frm_display' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Views', 'toolbar-extras' )
					)
				)
			);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-formidableforms-views-all',
						'parent' => 'forms-formidableforms-views',
						'title'  => esc_attr__( 'All Views', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'edit.php?post_type=frm_display' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'All Views', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-formidableforms-views-new',
						'parent' => 'forms-formidableforms-views',
						'title'  => esc_attr__( 'New View', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'post-new.php?post_type=frm_display' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'New View', 'toolbar-extras' )
						)
					)
				);

		}  // end if

		/** Styles */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-formidableforms-styles',
				'parent' => 'forms-formidableforms',
				'title'  => esc_attr__( 'Styles', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=formidable-styles' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Styles', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-formidableforms-styles-edit',
					'parent' => 'forms-formidableforms-styles',
					'title'  => esc_attr__( 'Edit Styles', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=formidable-styles' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Edit Styles', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-formidableforms-styles-forms',
					'parent' => 'forms-formidableforms-styles',
					'title'  => esc_attr__( 'Manage Form Styles', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=formidable-styles&frm_action=manage' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Manage Form Styles', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-formidableforms-styles-custom-css',
					'parent' => 'forms-formidableforms-styles',
					'title'  => esc_attr__( 'Custom CSS', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=formidable-styles&frm_action=custom_css' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Custom CSS', 'toolbar-extras' )
					)
				)
			);

		/** Import/ Export */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-formidableforms-import-export',
				'parent' => 'forms-formidableforms',
				'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=formidable-import' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' )
				)
			)
		);

		/** Settings */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-formidableforms-settings',
				'parent' => 'forms-formidableforms',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=formidable-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		/** Optionally, let other Formidable Forms Add-Ons hook in */
		do_action( 'tbex_after_formidable_settings' );

		/** Group: Resources for Formidable Forms */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-formidableforms-resources',
					'parent' => 'forms-formidableforms',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);
			
			ddw_tbex_resource_item(
				'support-forum',
				'formidableforms-support',
				'group-formidableforms-resources',
				'https://wordpress.org/support/plugin/formidable'
			);

			ddw_tbex_resource_item(
				'documentation',
				'formidableforms-docs',
				'group-formidableforms-resources',
				'https://formidableforms.com/knowledgebase/'
			);

			ddw_tbex_resource_item(
				'community-forum',
				'formidableforms-community-forum',
				'group-formidableforms-resources',
				'https://community.formidableforms.com/help-desk/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'formidableforms-translate',
				'group-formidableforms-resources',
				'https://translate.wordpress.org/projects/wp-plugins/formidable'
			);

			ddw_tbex_resource_item(
				'official-site',
				'formidableforms-site',
				'group-formidableforms-resources',
				'https://formidableforms.com/'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_new_content_formidable', 80 );
/**
 * Items for "New Content" section: New Formidable Form
 *
 * @since 1.3.1
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_new_content_formidable() {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() || is_network_admin() ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-formidable-form',
			'parent' => 'new-content',
			'title'  => ddw_tbex_string_new_form( 'Formidable' ),
			'href'   => esc_url( admin_url( 'admin.php?page=formidable&frm_action=new' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_add_new_item( ddw_tbex_string_new_form( 'Formidable' ) )
			)
		)
	);

	/** Pro only: New View */
	if ( ddw_tbex_is_formidable_pro_active() ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbex-formidable-view',
				'parent' => 'new-content',
				'title'  => ddw_tbex_string_new_form( 'Formidable', 'view' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=frm_display' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => ddw_tbex_string_add_new_item( ddw_tbex_string_new_form( 'Formidable', 'view' ) )
				)
			)
		);

	}  // end if

}  // end function
