<?php

// includes/elementor-addons/items-metform

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_metform', 100 );
/**
 * Items for Add-On: MetForm (free, by WpMet)
 *
 * @since 1.4.7
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_metform( $admin_bar ) {

	$forms_type   = 'metform-form';
	$entries_type = 'metform-entry';

	/** For: Forms */
	$admin_bar->add_node(
		array(
			'id'     => 'forms-metform',
			'parent' => 'tbex-sitegroup-forms',
			'title'  => esc_attr__( 'MetForm', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $forms_type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'MetForm', 'toolbar-extras' ),
			)
		)
	);

		/**
		 * Add each individual form as an item.
		 *   Forms are saved as a post type therefore a query necessary.
		 * @since 1.4.7
		 */
		$args = array(
			'post_type'      => $forms_type,
			'posts_per_page' => -1,
		);

		$forms = get_posts( $args );

		/** Proceed only if there are any forms */
		if ( $forms ) {

			/** Add group */
			$admin_bar->add_group(
				array(
					'id'     => 'group-metform-edit-forms',
					'parent' => 'forms-metform',
				)
			);

			foreach ( $forms as $form ) {

				$form_id    = absint( $form->ID );
				$form_title = esc_attr( $form->post_title );

				$edit_elementor_url = admin_url( 'post.php?post=' . $form_id . '&action=elementor' );

				$admin_bar->add_node(
					array(
						'id'     => 'forms-metform-form-' . $form_id,
						'parent' => 'group-metform-edit-forms',
						'title'  => $form_title,
						'href'   => esc_url( $edit_elementor_url ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => esc_attr__( 'Edit Form', 'toolbar-extras' ) . ': ' . $form_title,
						)
					)
				);

					$admin_bar->add_node(
						array(
							'id'     => 'forms-metform-form-' . $form_id . '-builder',
							'parent' => 'forms-metform-form-' . $form_id,
							'title'  => esc_attr__( 'Visual Builder', 'toolbar-extras' ),
							'href'   => esc_url( $edit_elementor_url ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target( 'builder' ),
								'title'  => esc_attr__( 'Visual Form Builder - with Elementor', 'toolbar-extras' )
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'forms-metform-form-' . $form_id . '-preview',
							'parent' => 'forms-metform-form-' . $form_id,
							'title'  => esc_attr__( 'Preview', 'toolbar-extras' ),
							'href'   => esc_url( get_permalink( $form_id ) ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target(),
								'title'  => esc_attr__( 'Preview', 'toolbar-extras' )
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'forms-metform-form-' . $form_id . '-settings',
							'parent' => 'forms-metform-form-' . $form_id,
							'title'  => esc_attr__( 'Form Settings', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'edit.php?post_type=' . $forms_type ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Form Settings - Modal View on List Table', 'toolbar-extras' )
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'forms-metform-form-' . $form_id . '-wpsettings',
							'parent' => 'forms-metform-form-' . $form_id,
							'title'  => esc_attr__( 'WP Admin Settings', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'post.php?post=' . $form_id . '&action=edit&classic-editor' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Edit WP Admin Settings (Post Type)', 'toolbar-extras' )
							)
						)
					);

					$form_settings = (array) get_post_meta( $form_id, 'metform_form__form_setting', TRUE );

					if ( '1' === $form_settings[ 'store_entries' ] ) {

						$admin_bar->add_node(
							array(
								'id'     => 'forms-metform-form-' . $form_id . '-entries',
								'parent' => 'forms-metform-form-' . $form_id,
								'title'  => esc_attr__( 'Entries', 'toolbar-extras' ),
								'href'   => esc_url( admin_url( 'edit.php?s&post_status=all&post_type=' . $entries_type . '&form_id=' . $form_id ) ),
								'meta'   => array(
									'target' => '',
									'title'  => esc_attr__( 'Entries', 'toolbar-extras' )
								)
							)
						);

					}  // end if

			}  // end foreach

		}  // end if

		$admin_bar->add_node(
			array(
				'id'     => 'forms-metform-forms-all',
				'parent' => 'forms-metform',
				'title'  => esc_attr__( 'All Forms', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $forms_type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Forms', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'forms-metform-entries-all',
				'parent' => 'forms-metform',
				'title'  => esc_attr__( 'All Entries', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $entries_type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Entries', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Resources for plugin */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-metform-resources',
					'parent' => 'forms-metform',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'metform-support',
				'group-metform-resources',
				'https://wordpress.org/support/plugin/metform'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'metform-translate',
				'group-metform-resources',
				'https://translate.wordpress.org/projects/wp-plugins/metform'
			);

			ddw_tbex_resource_item(
				'official-site',
				'metform-site',
				'group-metform-resources',
				'https://products.wpmet.com/metform/'
			);

		}  // end if

}  // end function
