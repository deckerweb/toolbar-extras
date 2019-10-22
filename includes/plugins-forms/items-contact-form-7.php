<?php

// includes/plugins-forms/items-contact-form-7

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if Flamingo Add-On plugin is active or not.
 *
 * @since 1.3.1
 *
 * @return bool TRUE if constant defined, FALSE otherwise.
 */
function ddw_tbex_is_flamingo_active() {

	return defined( 'FLAMINGO_VERSION' );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_contact_form_7' );
/**
 * Items for Plugin: Contact Form 7 (free, by Takayuki Miyoshi)
 *
 * @since 1.3.1
 * @since 1.4.8 Security enhancements.
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_contact_form_7( $admin_bar ) {

	/** For: Forms */
	$admin_bar->add_node(
		array(
			'id'     => 'forms-cf7',
			'parent' => 'tbex-sitegroup-forms',
			'title'  => esc_attr__( 'Contact Form 7', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=wpcf7' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Contact Form 7', 'toolbar-extras' ),
			)
		)
	);

		/**
		 * Add each individual form as an item.
		 *   Forms are saved as a post type therefore a query necessary.
		 * @since 1.3.1
		 */
		$args = array(
			'post_type'      => 'wpcf7_contact_form',
			'posts_per_page' => -1,
		);

		$forms = get_posts( $args );

		/** Proceed only if there are any forms */
		if ( $forms ) {

			/** Add group */
			$admin_bar->add_group(
				array(
					'id'     => 'group-cf7-edit-forms',
					'parent' => 'forms-cf7',
				)
			);

			foreach ( $forms as $form ) {

				$form_id   = absint( $form->ID );
				$form_name = esc_attr( $form->post_title );
				$form_slug = sanitize_key( $form->post_name );

				/** Add item per form */
				$admin_bar->add_node(
					array(
						'id'     => 'forms-cf7-form-' . $form_id,
						'parent' => 'group-cf7-edit-forms',
						'title'  => $form_name,
						'href'   => esc_url( admin_url( 'admin.php?page=wpcf7&post=' . $form_id . '&action=edit' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Edit Form', 'toolbar-extras' ) . ': ' . $form_name,
						)
					)
				);

				/** If Flamingo Add-On active display additional sub-items */
				if ( ddw_tbex_is_flamingo_active() ) {

					$admin_bar->add_node(
						array(
							'id'     => 'forms-cf7-form-' . $form_id . '-builder',
							'parent' => 'forms-cf7-form-' . $form_id,
							'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=wpcf7&post=' . $form_id . '&action=edit' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' ),
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'forms-cf7-form-' . $form_id . '-entries',
							'parent' => 'forms-cf7-form-' . $form_id,
							'title'  => esc_attr__( 'Entries', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=flamingo_inbound&channel=' . $form_slug ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Entries', 'toolbar-extras' ),
							)
						)
					);

				}  // end if Flamingo check

			}  // end foreach

		}  // end if

		/** General CF7 items */
		$admin_bar->add_node(
			array(
				'id'     => 'forms-cf7-all-forms',
				'parent' => 'forms-cf7',
				'title'  => esc_attr__( 'All Forms', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wpcf7' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Forms', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'forms-cf7-new-form',
				'parent' => 'forms-cf7',
				'title'  => esc_attr__( 'New Form', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wpcf7-new' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Form', 'toolbar-extras' ),
				)
			)
		);

		/** If Flamingo Add-On active display additional items */
		if ( ddw_tbex_is_flamingo_active() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'forms-cf7-flamingo',
					'parent' => 'forms-cf7',
					'title'  => esc_attr__( 'Entries', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=flamingo_inbound' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Entries', 'toolbar-extras' ),
					)
				)
			);

				$admin_bar->add_node(
					array(
						'id'     => 'forms-cf7-flamingo-all',
						'parent' => 'forms-cf7-flamingo',
						'title'  => esc_attr__( 'All Entries', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=flamingo_inbound' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'All Entries', 'toolbar-extras' ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'forms-cf7-flamingo-addressbook',
						'parent' => 'forms-cf7-flamingo',
						'title'  => esc_attr__( 'Address Book', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=flamingo' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Address Book', 'toolbar-extras' ),
						)
					)
				);

		}  // end if Flamingo check

		$admin_bar->add_node(
			array(
				'id'     => 'forms-cf7-integrations',
				'parent' => 'forms-cf7',
				'title'  => esc_attr__( 'Integrations', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wpcf7-integration' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Integrations', 'toolbar-extras' ),
				)
			)
		);

		/** Optionally, let other CF7 Add-Ons hook in */
		do_action( 'tbex_after_cf7_settings', $admin_bar );

		/** Group: Resources for CF7 */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-cf7-resources',
					'parent' => 'forms-cf7',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'cf7-support',
				'group-cf7-resources',
				'https://wordpress.org/support/plugin/contact-form-7'
			);

			ddw_tbex_resource_item(
				'documentation',
				'cf7-docs',
				'group-cf7-resources',
				'https://contactform7.com/docs/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'cf7-translate',
				'group-cf7-resources',
				'https://translate.wordpress.org/projects/wp-plugins/contact-form-7'
			);

			ddw_tbex_resource_item(
				'official-site',
				'cf7-site',
				'group-cf7-resources',
				'https://contactform7.com/'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_new_content_cf7_form', 80 );
/**
 * Items for "New Content" section: New CF7 Form
 *
 * @since 1.3.1
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_new_content_cf7_form( $admin_bar ) {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() ) {
		return $admin_bar;
	}

	$admin_bar->add_node(
		array(
			'id'     => 'tbex-cf7-form',
			'parent' => 'new-content',
			'title'  => ddw_tbex_string_new_form( 'CF7' ),
			'href'   => esc_url( admin_url( 'admin.php?page=wpcf7-new' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_add_new_item( ddw_tbex_string_new_form( 'CF7' ) ),
			)
		)
	);

}  // end function
