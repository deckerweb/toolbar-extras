<?php

// includes/plugins-forms/items-flo-forms

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_flo_forms' );
/**
 * Items for Plugin: Flo Forms (free, by Flothemes)
 *
 * @since 1.4.7
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_flo_forms( $admin_bar ) {

	$type = 'flo_forms';

	/** For: Forms */
	$admin_bar->add_node(
		array(
			'id'     => 'forms-floforms',
			'parent' => 'tbex-sitegroup-forms',
			'title'  => ddw_tbex_string_forms_system( 'Flo' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_forms_system( 'Flo' ),
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
			$admin_bar->add_group(
				array(
					'id'     => 'group-floforms-edit-forms',
					'parent' => 'forms-floforms',
				)
			);

			foreach ( $forms as $form ) {

				$form_id   = absint( $form->ID );
				$form_name = esc_attr( $form->post_title );
				$form_slug = sanitize_key( $form->post_name );

				/** Add item per form */
				$admin_bar->add_node(
					array(
						'id'     => 'forms-floforms-form-' . $form_id,
						'parent' => 'group-floforms-edit-forms',
						'title'  => $form_name,
						'href'   => esc_url( admin_url( 'post.php?post=' . $form_id . '&action=edit&classic-editor' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Edit Form', 'toolbar-extras' ) . ': ' . $form_name,
						)
					)
				);

					$admin_bar->add_node(
						array(
							'id'     => 'forms-floforms-form-' . $form_id . '-builder',
							'parent' => 'forms-floforms-form-' . $form_id,
							'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'post.php?post=' . $form_id . '&action=edit&classic-editor' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' ),
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'forms-floforms-form-' . $form_id . '-entries',
							'parent' => 'forms-floforms-form-' . $form_id,
							'title'  => esc_attr__( 'Entries', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'edit.php?post_type=flo_form_entry&entry_form=' . $form_slug ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Entries', 'toolbar-extras' ),
							)
						)
					);

			}  // end foreach

		}  // end if

		/** All Forms */
		$admin_bar->add_node(
			array(
				'id'     => 'forms-floforms-all-forms',
				'parent' => 'forms-floforms',
				'title'  => esc_attr__( 'All Forms', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Forms', 'toolbar-extras' ),
				)
			)
		);

		/** New Form */
		$admin_bar->add_node(
			array(
				'id'     => 'forms-floforms-new-form',
				'parent' => 'forms-floforms',
				'title'  => esc_attr__( 'New Form', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Form', 'toolbar-extras' ),
				)
			)
		);

		/** Form categories, via BTC plugin */
		if ( ddw_tbex_is_btcplugin_active() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'forms-floforms-categories',
					'parent' => 'forms-floforms',
					'title'  => ddw_btc_string_template( 'form' ),
					'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=' . $type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_html( ddw_btc_string_template( 'form' ) )
					)
				)
			);

		}  // end if

		/** All Entries */
		$admin_bar->add_node(
			array(
				'id'     => 'forms-floforms-all-entries',
				'parent' => 'forms-floforms',
				'title'  => esc_attr__( 'All Entries', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=flo_form_entry' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Entries', 'toolbar-extras' ),
				)
			)
		);

		/** Settings */
		$admin_bar->add_node(
			array(
				'id'     => 'forms-floforms-settings',
				'parent' => 'forms-floforms',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=flo_forms_settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-floforms-settings-general',
					'parent' => 'forms-floforms-settings',
					'title'  => esc_attr__( 'General', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=flo_forms_settings&tab=settings' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'General', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-floforms-settings-test-email',
					'parent' => 'forms-floforms-settings',
					'title'  => esc_attr__( 'Test Email', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=flo_forms_settings&tab=test-email' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Test Email', 'toolbar-extras' ),
					)
				)
			);

		/** Optionally, let other Flo Forms Add-Ons hook in */
		do_action( 'tbex_after_floforms_settings', $admin_bar );

		/** Group: Resources for floforms */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-floforms-resources',
					'parent' => 'forms-floforms',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'floforms-support',
				'group-floforms-resources',
				'https://wordpress.org/support/plugin/flo-forms'
			);

			ddw_tbex_resource_item(
				'documentation',
				'floforms-docs',
				'group-floforms-resources',
				'https://docs.flothemes.com/floforms/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'floforms-translate',
				'group-floforms-resources',
				'https://translate.wordpress.org/projects/wp-plugins/flo-forms'
			);

			ddw_tbex_resource_item(
				'official-site',
				'floforms-site',
				'group-floforms-resources',
				'https://flothemes.com/flo-plugins/'
			);

		}  // end if

}  // end function


add_filter( 'admin_bar_menu', 'ddw_tbex_aoitems_new_content_flo_form', 80 );
/**
 * Items for "New Content" section: New Flo Form
 *   Note: Filter the existing Toolbar node.
 *
 * @since 1.4.2
 *
 * @param object $admin_bar Holds all nodes of the Toolbar.
 */
function ddw_tbex_aoitems_new_content_flo_form( $admin_bar ) {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() || is_network_admin() ) {
		return $admin_bar;
	}

	$admin_bar->add_node(
		array(
			'id'     => 'new-flo_forms',	// same as original!
			'parent' => 'new-content',
			'title'  => ddw_tbex_string_new_form( 'Flo' ),
			'meta'   => array(
				'title'  => ddw_tbex_string_add_new_item( ddw_tbex_string_new_form( 'Flo' ) ),
			)
		)
	);

}  // end function
