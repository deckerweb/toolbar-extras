<?php

// includes/plugins-forms/items-torro-forms

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_torro_forms' );
/**
 * Items for Plugin: Torro Forms (free, by Awesome UG)
 *
 * @since 1.4.2
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_torro_forms() {

	$type = 'torro_form';

	/** For: Forms */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'forms-torroforms',
			'parent' => 'tbex-sitegroup-forms',
			'title'  => ddw_tbex_string_forms_system( 'Torro' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_forms_system( 'Torro' ),
			)
		)
	);

		/**
		 * Add each individual form as an item.
		 *   Forms are saved as a post type therefore a query necessary.
		 * @since 1.4.2
		 */
		$args = array(
			'post_type'      => $type,
			'posts_per_page' => -1,
		);

		$forms = get_posts( $args );

		/** Proceed only if there are any forms */
		if ( $forms ) {

			/** Add group */
			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-torroforms-edit-forms',
					'parent' => 'forms-torroforms'
				)
			);

			foreach ( $forms as $form ) {

				$form_id   = absint( $form->ID );
				$form_name = esc_attr( $form->post_title );
				$form_slug = sanitize_key( $form->post_name );

				/** Add item per form */
				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-torroforms-form-' . $form_id,
						'parent' => 'group-torroforms-edit-forms',
						'title'  => $form_name,
						'href'   => esc_url( admin_url( 'post.php?post=' . $form_id . '&action=edit&classic-editor' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Edit Form', 'toolbar-extras' ) . ': ' . $form_name
						)
					)
				);

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'forms-torroforms-form-' . $form_id . '-builder',
							'parent' => 'forms-torroforms-form-' . $form_id,
							'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'post.php?post=' . $form_id . '&action=edit&classic-editor' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' )
							)
						)
					);

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'forms-torroforms-form-' . $form_id . '-preview',
							'parent' => 'forms-torroforms-form-' . $form_id,
							'title'  => esc_attr__( 'Preview', 'toolbar-extras' ),
							'href'   => esc_url( site_url( '/forms/' . $form_slug . '/' ) ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target(),
								'title'  => esc_attr__( 'Preview', 'toolbar-extras' )
							)
						)
					);

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'forms-torroforms-form-' . $form_id . '-entries',
							'parent' => 'forms-torroforms-form-' . $form_id,
							'title'  => esc_attr__( 'Entries', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=torro_list_submissions&form_id=' . $form_id ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Entries', 'toolbar-extras' )
							)
						)
					);

			}  // end foreach

		}  // end if

		/** All Forms */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-torroforms-all-forms',
				'parent' => 'forms-torroforms',
				'title'  => esc_attr__( 'All Forms', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Forms', 'toolbar-extras' )
				)
			)
		);

		/** New Form */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-torroforms-new-form',
				'parent' => 'forms-torroforms',
				'title'  => esc_attr__( 'New Form', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Form', 'toolbar-extras' )
				)
			)
		);

		/** All Entries */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-torroforms-all-entries',
				'parent' => 'forms-torroforms',
				'title'  => esc_attr__( 'All Entries', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=torro_list_submissions' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Entries', 'toolbar-extras' )
				)
			)
		);

		/** Settings */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-torroforms-settings',
				'parent' => 'forms-torroforms',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=torro_form_settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-torroforms-settings-general',
					'parent' => 'forms-torroforms-settings',
					'title'  => esc_attr__( 'General', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=torro_form_settings&tab=torro_general_settings' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'General', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-torroforms-settings-access-controls',
					'parent' => 'forms-torroforms-settings',
					'title'  => esc_attr__( 'Access Controls', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=torro_form_settings&tab=torro_module_access_controls' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Access Controls', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-torroforms-settings-protectors',
					'parent' => 'forms-torroforms-settings',
					'title'  => esc_attr__( 'Protectors', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=torro_form_settings&tab=torro_module_protectors' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Protectors', 'toolbar-extras' )
					)
				)
			);

		/** Optionally, let other Torro Forms Add-Ons hook in */
		do_action( 'tbex_after_torroforms_settings' );

		/** Group: Resources for torroforms */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-torroforms-resources',
					'parent' => 'forms-torroforms',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);
			
			ddw_tbex_resource_item(
				'support-forum',
				'torroforms-support',
				'group-torroforms-resources',
				'https://wordpress.org/support/plugin/torro-forms'
			);

			ddw_tbex_resource_item(
				'documentation',
				'torroforms-docs',
				'group-torroforms-resources',
				'https://torro-forms.com/user-guide/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'torroforms-translate',
				'group-torroforms-resources',
				'https://translate.wordpress.org/projects/wp-plugins/torro-forms'
			);

			ddw_tbex_resource_item(
				'github',
				'torroforms-github',
				'group-torroforms-resources',
				'https://github.com/awsmug/torro-forms'
			);

			ddw_tbex_resource_item(
				'official-site',
				'torroforms-site',
				'group-torroforms-resources',
				'https://torro-forms.com'
			);

		}  // end if

}  // end function


add_filter( 'admin_bar_menu', 'ddw_tbex_aoitems_new_content_torro_form', 80 );
/**
 * Items for "New Content" section: New Torro Form
 *   Note: Filter the existing Toolbar node.
 *
 * @since 1.4.2
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 *
 * @param object $wp_admin_bar Holds all nodes of the Toolbar.
 */
function ddw_tbex_aoitems_new_content_torro_form( $wp_admin_bar ) {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() || is_network_admin() ) {
		return $wp_admin_bar;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'new-torro_form',	// same as original!
			'parent' => 'new-content',
			'title'  => ddw_tbex_string_new_form( 'Torro' ),
			'meta'   => array(
				'title'  => ddw_tbex_string_add_new_item( ddw_tbex_string_new_form( 'Torro' ) )
			)
		)
	);

}  // end function
