<?php

// includes/plugins-forms/items-formcraft

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_formcraft' );
/**
 * Items for Plugin: FormCraft 3 (Premium, by nCrafts)
 *
 * @since 1.3.2
 * @since 1.4.2 Security enhancements.
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_formcraft() {

	/** For: Forms */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'forms-formcraft',
			'parent' => 'tbex-sitegroup-forms',
			'title'  => ddw_tbex_string_forms_system( 'FormCraft' ),
			'href'   => esc_url( admin_url( 'admin.php?page=formcraft-dashboard' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_forms_system( 'FormCraft' ),
			)
		)
	);

		/**
		 * Add each individual form as an item. Database query is necessary.
		 * @since 1.3.2
		 * @see   FormCraft main plugin file for globals/ DB query... :)
		 */
		global $fc_meta, $fc_forms_table, $wpdb;
      	$forms = $wpdb->get_results( "SELECT id, name FROM $fc_forms_table", ARRAY_A );

		/** Proceed only if there are any forms */
		if ( $forms ) {

			/** Add group */
			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-formcraft-edit-forms',
					'parent' => 'forms-formcraft'
				)
			);

			foreach ( $forms as $form => $form_value ) {

				$form_id     = absint( $form_value[ 'id' ] );
				$form_title  = esc_attr( $form_value[ 'name' ] );

				/** Add item per form */
				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-formcraft-form-' . $form_id,
						'parent' => 'group-formcraft-edit-forms',
						'title'  => $form_title,
						'href'   => esc_url( admin_url( 'admin.php?page=formcraft-dashboard&id=' . $form_id ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Edit Form', 'toolbar-extras' ) . ': ' . $form_title
						)
					)
				);

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'forms-formcraft-form-' . $form_id . '-builder',
							'parent' => 'forms-formcraft-form-' . $form_id,
							'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=formcraft-dashboard&id=' . $form_id ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' )
							)
						)
					);

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'forms-formcraft-form-' . $form_id . '-preview',
							'parent' => 'forms-formcraft-form-' . $form_id,
							'title'  => esc_attr__( 'Preview', 'toolbar-extras' ),
							'href'   => esc_url( site_url( '/form-view/' . $form_id . '?preview=true' ) ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target(),
								'title'  => esc_attr__( 'Preview', 'toolbar-extras' )
							)
						)
					);

			}  // end foreach

		}  // end if

		/** General FormCraft Forms items */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-formcraft-all-forms',
				'parent' => 'forms-formcraft',
				'title'  => esc_attr__( 'All Forms', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=formcraft-dashboard' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Forms', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-formcraft-all-entries',
				'parent' => 'forms-formcraft',
				'title'  => esc_attr__( 'All Entries', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=formcraft-entries' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Entries', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-formcraft-insights',
				'parent' => 'forms-formcraft',
				'title'  => esc_attr__( 'Insights', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=formcraft-insights' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Insights', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-formcraft-uploads',
				'parent' => 'forms-formcraft',
				'title'  => esc_attr__( 'Uploads', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=formcraft-uploads' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Uploads', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-formcraft-license',
				'parent' => 'forms-formcraft',
				'title'  => esc_attr__( 'License', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=formcraft-license' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'License', 'toolbar-extras' )
				)
			)
		);

		/** Optionally, let other FormCraft Forms Add-Ons hook in */
		do_action( 'tbex_after_formcraft_settings' );

		/** Group: Resources for FormCraft Forms */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-formcraft-resources',
					'parent' => 'forms-formcraft',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'documentation',
				'formcraft-docs',
				'group-formcraft-resources',
				'https://formcraft-wp.com/help-index/'
			);

			ddw_tbex_resource_item(
				'support-contact',
				'formcraft-contact',
				'group-formcraft-resources',
				'https://formcraft-wp.com/support'
			);

			ddw_tbex_resource_item(
				'official-site',
				'formcraft-site',
				'group-formcraft-resources',
				'https://formcraft-wp.com/'
			);

		}  // end if

}  // end function
