<?php

// includes/plugins-forms/items-caldera-forms

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_caldera_forms' );
/**
 * Items for Plugin: Caldera Forms (free, by Caldera Labs)
 *
 * @since 1.3.1
 * @since 1.4.2 Security enhancements.
 *
 * @global mixed  $GLOBALS[ 'wp_admin_bar' ]
 * @global object global $wpdb
 */
function ddw_tbex_site_items_caldera_forms() {

	/** For: Forms */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'forms-calderaforms',
			'parent' => 'tbex-sitegroup-forms',
			'title'  => ddw_tbex_string_forms_system( 'Caldera' ),
			'href'   => esc_url( admin_url( 'admin.php?page=caldera-forms' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_forms_system( 'Caldera' )
			)
		)
	);

		/**
		 * Add each individual form as an item. Database query is necessary.
		 * @since 1.3.1
		 */
		global $wpdb;
		$cf_table_name = $wpdb->prefix . 'cf_forms';
		$forms         = $wpdb->get_results( "SELECT form_id, config FROM $cf_table_name" );

		/** Proceed only if there are any forms */
		if ( $forms ) {

			/** Add group */
			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-calderaforms-edit-forms',
					'parent' => 'forms-calderaforms'
				)
			);

			foreach ( $forms as $form ) {

				$unserialize = maybe_unserialize( $form->config );
				$form_title  = esc_attr( $unserialize[ 'name' ] );
				$form_id     = esc_attr( $form->form_id );

				/** Add item per form */
				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-calderaforms-form-' . $form_id,
						'parent' => 'group-calderaforms-edit-forms',
						'title'  => $form_title,
						'href'   => esc_url( admin_url( 'admin.php?edit=' . $form_id . '&page=caldera-forms' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Edit Form', 'toolbar-extras' ) . ': ' . $form_title
						)
					)
				);

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'forms-calderaforms-form-' . $form_id . '-builder',
							'parent' => 'forms-calderaforms-form-' . $form_id,
							'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?edit=' . $form_id . '&page=caldera-forms' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' )
							)
						)
					);

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'forms-calderaforms-form-' . $form_id . '-preview',
							'parent' => 'forms-calderaforms-form-' . $form_id,
							'title'  => esc_attr__( 'Preview', 'toolbar-extras' ),
							'href'   => esc_url( site_url( '/?cf_preview=' . $form_id ) ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target(),
								'title'  => esc_attr__( 'Preview', 'toolbar-extras' )
							)
						)
					);

			}  // end foreach

		}  // end if

		/** General Caldera Forms items */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-calderaforms-all-forms',
				'parent' => 'forms-calderaforms',
				'title'  => esc_attr__( 'All Forms', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=caldera-forms' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Forms', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-calderaforms-privacy-settings',
				'parent' => 'forms-calderaforms',
				'title'  => esc_attr__( 'Privacy Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=caldera-forms-privacy' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Privacy Settings', 'toolbar-extras' )
				)
			)
		);

		/** Optionally, let other Caldera Forms Add-Ons hook in */
		do_action( 'tbex_after_calderaforms_settings' );

		/** Group: Resources for Caldera Forms */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-calderaforms-resources',
					'parent' => 'forms-calderaforms',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);
			
			ddw_tbex_resource_item(
				'support-forum',
				'calderaforms-support',
				'group-calderaforms-resources',
				'https://wordpress.org/support/plugin/caldera-forms'
			);

			ddw_tbex_resource_item(
				'documentation',
				'calderaforms-docs',
				'group-calderaforms-resources',
				'https://calderaforms.com/caldera-forms-documentation-search/'
			);

			ddw_tbex_resource_item(
				'facebook-group',
				'calderaforms-facebook',
				'group-calderaforms-resources',
				'https://www.facebook.com/groups/651862761663883/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'calderaforms-translate',
				'group-calderaforms-resources',
				'https://translate.wordpress.org/projects/wp-plugins/caldera-forms'
			);

			ddw_tbex_resource_item(
				'github',
				'calderaforms-github',
				'group-calderaforms-resources',
				'https://github.com/CalderaWP/Caldera-Forms'
			);

			ddw_tbex_resource_item(
				'official-site',
				'calderaforms-site',
				'group-calderaforms-resources',
				'https://calderaforms.com/'
			);

		}  // end if

}  // end function
