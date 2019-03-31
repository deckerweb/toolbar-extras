<?php

// includes/plugins-forms/items-buddyforms

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_buddyforms' );
/**
 * Items for Plugin: BuddyForms (free, by ThemeKraft)
 *
 * @since 1.4.2
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_buddyforms() {

	$type = 'buddyforms';

	/** For: Forms */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'forms-buddyforms',
			'parent' => 'tbex-sitegroup-forms',
			'title'  => ddw_tbex_string_forms_system( 'Buddy' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_forms_system( 'Buddy' ),
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
					'id'     => 'group-buddyforms-edit-forms',
					'parent' => 'forms-buddyforms'
				)
			);

			foreach ( $forms as $form ) {

				$form_id   = absint( $form->ID );
				$form_name = esc_attr( $form->post_title );
				$form_slug = sanitize_key( $form->post_name );

				/** Add item per form */
				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-buddyforms-form-' . $form_id,
						'parent' => 'group-buddyforms-edit-forms',
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
						'id'     => 'forms-buddyforms-form-' . $form_id . '-fields',
						'parent' => 'forms-buddyforms-form-' . $form_id,
						'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'post.php?post=' . $form_id . '&action=edit&classic-editor' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' )
						)
					)
				);

				$preview_page_id = get_option( 'buddyforms_preview_page', true );

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-buddyforms-form-' . $form_id . '-preview',
						'parent' => 'forms-buddyforms-form-' . $form_id,
						'title'  => esc_attr__( 'Preview', 'toolbar-extras' ),
						'href'   => esc_url( site_url( '/?page_id=' . $preview_page_id . '&preview=true&form_slug=' . $form_slug ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target(),
							'title'  => esc_attr__( 'Preview', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-buddyforms-form-' . $form_id . '-entries',
						'parent' => 'forms-buddyforms-form-' . $form_id,
						'title'  => esc_attr__( 'Entries', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=buddyforms_submissions&form_slug=' . $form_slug ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Entries', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-buddyforms-form-' . $form_id . '-export',
						'parent' => 'forms-buddyforms-form-' . $form_id,
						'title'  => esc_attr__( 'Export', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&post_id=' . $form_id . '&my_action=export_form' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Export', 'toolbar-extras' )
						)
					)
				);

			}  // end foreach

		}  // end if

		/** All Forms */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-buddyforms-all-forms',
				'parent' => 'forms-buddyforms',
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
				'id'     => 'forms-buddyforms-new-form',
				'parent' => 'forms-buddyforms',
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
				'id'     => 'forms-buddyforms-all-entries',
				'parent' => 'forms-buddyforms',
				'title'  => esc_attr__( 'All Entries', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=buddyforms_submissions' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Entries', 'toolbar-extras' )
				)
			)
		);

		/** Settings */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-buddyforms-settings',
				'parent' => 'forms-buddyforms',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=buddyforms_settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-buddyforms-settings-general',
					'parent' => 'forms-buddyforms-settings',
					'title'  => esc_attr__( 'General', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=buddyforms_settings&tab=general' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'General', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-buddyforms-settings-password-strength',
					'parent' => 'forms-buddyforms-settings',
					'title'  => esc_attr__( 'Password Strength', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=buddyforms_settings&tab=password_strength' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Password Strength', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-buddyforms-settings-import',
					'parent' => 'forms-buddyforms-settings',
					'title'  => esc_attr__( 'Import Forms', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=buddyforms_settings&tab=import' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Import Forms', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-buddyforms-settings-gdpr',
					'parent' => 'forms-buddyforms-settings',
					'title'  => esc_attr__( 'GDPR', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=buddyforms_settings&tab=gdpr' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'GDPR (Privacy)', 'toolbar-extras' )
					)
				)
			);

		/** Getting Started */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-buddyforms-start',
				'parent' => 'forms-buddyforms',
				'title'  => esc_attr__( 'Getting Started', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=buddyforms_welcome_screen' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Getting Started', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-buddyforms-start-wizard',
					'parent' => 'forms-buddyforms-start',
					'title'  => esc_attr__( 'Form Wizard', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type . '&wizard=1' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Form Wizard', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-buddyforms-start-info',
					'parent' => 'forms-buddyforms-start',
					'title'  => esc_attr__( 'Plugin Info', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=buddyforms_welcome_screen' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Plugin Info', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-buddyforms-start-addons',
					'parent' => 'forms-buddyforms-start',
					'title'  => esc_attr__( 'Add-Ons', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=buddyforms-addons' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Add-Ons', 'toolbar-extras' )
					)
				)
			);

		/** Optionally, let other BuddyForms Add-Ons hook in */
		do_action( 'tbex_after_buddyforms_settings' );

		/** Group: Resources for buddyforms */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-buddyforms-resources',
					'parent' => 'forms-buddyforms',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);
			
			ddw_tbex_resource_item(
				'support-forum',
				'buddyforms-support',
				'group-buddyforms-resources',
				'https://wordpress.org/support/plugin/buddyforms'
			);

			ddw_tbex_resource_item(
				'documentation',
				'buddyforms-docs',
				'group-buddyforms-resources',
				'https://docs.buddyforms.com/'
			);

			ddw_tbex_resource_item(
				'support-contact',
				'buddyforms-support-contact',
				'group-buddyforms-resources',
				esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=buddyforms-contact' ) )
			);

			ddw_tbex_resource_item(
				'translations-community',
				'buddyforms-translate',
				'group-buddyforms-resources',
				'https://translate.wordpress.org/projects/wp-plugins/buddyforms'
			);

			ddw_tbex_resource_item(
				'github',
				'buddyforms-github',
				'group-buddyforms-resources',
				'https://github.com/BuddyForms/BuddyForms'
			);

			ddw_tbex_resource_item(
				'official-site',
				'buddyforms-site',
				'group-buddyforms-resources',
				'https://buddyforms.com/'
			);

		}  // end if

}  // end function
