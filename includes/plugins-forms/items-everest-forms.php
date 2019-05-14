<?php

// includes/plugins-forms/items-everest-forms

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_everest_forms' );
/**
 * Items for Plugin: Everest Forms (free, by WPEverest)
 *
 * @since 1.3.2
 * @since 1.4.0 Added individual form preview items.
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_everest_forms() {

	/** For: Forms */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'forms-everestforms',
			'parent' => 'tbex-sitegroup-forms',
			'title'  => ddw_tbex_string_forms_system( 'Everest' ),
			'href'   => esc_url( admin_url( 'admin.php?page=evf-builder' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_forms_system( 'Everest' )
			)
		)
	);

		/**
		 * Add each individual form as an item.
		 *   Forms are saved as a post type therefore a query necessary.
		 * @since 1.3.2
		 * @since 1.4.0 Added form preview.
		 */
		$args = array(
			'post_type'      => 'everest_form',
			'posts_per_page' => -1,
		);

		$forms = get_posts( $args );

		/** Proceed only if there are any forms */
		if ( $forms ) {

			/** Add group */
			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-everestforms-edit-forms',
					'parent' => 'forms-everestforms'
				)
			);

			foreach ( $forms as $form ) {

				$form_id    = absint( $form->ID );
				$form_title = esc_attr( $form->post_title );
				
				/** Add item per form */
				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-everestforms-form-' . $form_id,
						'parent' => 'group-everestforms-edit-forms',
						'title'  => $form_title,
						'href'   => esc_url( admin_url( 'admin.php?page=evf-builder&tab=fields&form_id=' . $form_id ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Edit Form', 'toolbar-extras' ) . ': ' . $form_title
						)
					)
				);

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'forms-everestforms-form-' . $form_id . '-builder',
							'parent' => 'forms-everestforms-form-' . $form_id,
							'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=evf-builder&tab=fields&form_id=' . $form_id ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' )
							)
						)
					);

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'forms-everestforms-form-' . $form_id . '-preview',
							'parent' => 'forms-everestforms-form-' . $form_id,
							'title'  => esc_attr__( 'Preview', 'toolbar-extras' ),
							'href'   => esc_url( site_url( '/?form_id=' . $form_id . '&evf_preview=true' ) ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target(),
								'title'  => esc_attr__( 'Preview', 'toolbar-extras' )
							)
						)
					);

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'forms-everestforms-form-' . $form_id . '-entries',
							'parent' => 'forms-everestforms-form-' . $form_id,
							'title'  => esc_attr__( 'Entries', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=evf-entries&form_id=' . $form_id ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Entries', 'toolbar-extras' )
							)
						)
					);

			}  // end foreach

		}  // end if

		/** General Everest Forms items */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-everestforms-all-forms',
				'parent' => 'forms-everestforms',
				'title'  => esc_attr__( 'All Forms', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=evf-builder' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Forms', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-everestforms-new-form',
				'parent' => 'forms-everestforms',
				'title'  => esc_attr__( 'New Form', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=evf-builder&create-form=1' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Form', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-everestforms-entries',
				'parent' => 'forms-everestforms',
				'title'  => esc_attr__( 'Entries', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=evf-entries' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Entries', 'toolbar-extras' )
				)
			)
		);

		/** Settings */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-everestforms-settings',
				'parent' => 'forms-everestforms',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=evf-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-everestforms-settings-general',
					'parent' => 'forms-everestforms-settings',
					'title'  => esc_attr__( 'General', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=evf-settings&tab=general' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'General', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-everestforms-settings-recaptcha',
					'parent' => 'forms-everestforms-settings',
					'title'  => esc_attr__( 'reCAPTCHA', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=evf-settings&tab=recaptcha' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'reCAPTCHA', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-everestforms-settings-email',
					'parent' => 'forms-everestforms-settings',
					'title'  => esc_attr__( 'Email', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=evf-settings&tab=email' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Email', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-everestforms-settings-validations',
					'parent' => 'forms-everestforms-settings',
					'title'  => esc_attr__( 'Validations', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=evf-settings&tab=validation' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Validations', 'toolbar-extras' )
					)
				)
			);

		/** Status */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-everestforms-status',
				'parent' => 'forms-everestforms',
				'title'  => esc_attr__( 'Log Files', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=evf-status' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Log Files', 'toolbar-extras' )
				)
			)
		);

		/** Optionally, let other Everest Forms Add-Ons hook in */
		do_action( 'tbex_after_everestforms_settings' );

		/** Group: Resources for Everest Forms */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-everestforms-resources',
					'parent' => 'forms-everestforms',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);
			
			ddw_tbex_resource_item(
				'support-forum',
				'everestforms-support',
				'group-everestforms-resources',
				'https://wordpress.org/support/plugin/everest-forms'
			);

			ddw_tbex_resource_item(
				'documentation',
				'everestforms-docs',
				'group-everestforms-resources',
				'https://docs.wpeverest.com/docs/everest-forms/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'everestforms-translate',
				'group-everestforms-resources',
				'https://translate.wordpress.org/projects/wp-plugins/everest-forms'
			);

			ddw_tbex_resource_item(
				'official-site',
				'everestforms-site',
				'group-everestforms-resources',
				'https://wpeverest.com/wordpress-plugins/everest-forms/'
			);

		}  // end if

}  // end function
