<?php

// includes/plugins/items-wpforms

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_wpforms' );
/**
 * Items for Plugin: WPForms Lite (free, by WPForms)
 *
 * @since  1.3.1
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_wpforms() {

	/** For: Forms */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'forms-wpforms',
			'parent' => 'tbex-sitegroup-forms',
			'title'  => esc_attr__( 'WPForms', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=wpforms-overview' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'WPForms', 'toolbar-extras' )
			)
		)
	);

		/**
		 * Add each individual form as an item.
		 *   Forms are saved as a post type therefore a query necessary.
		 * @since 1.3.1
		 */
		$args = array(
			'post_type'      => 'wpforms',
			'posts_per_page' => -1,
		);

		$forms = get_posts( $args );

		/** Proceed only if there are any forms */
		if ( $forms ) {

			/** Add group */
			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-wpforms-edit-forms',
					'parent' => 'forms-wpforms'
				)
			);

			foreach ( $forms as $form ) {

				$form_title = $form->post_title;

				/** Add item per form */
				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-wpforms-form-' . $form->ID,
						'parent' => 'group-wpforms-edit-forms',
						'title'  => $form_title,
						'href'   => esc_url( admin_url( 'admin.php?page=wpforms-builder&view=fields&form_id=' . $form->ID ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => esc_attr__( 'Edit Form', 'toolbar-extras' ) . ': ' . $form_title
						)
					)
				);

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'forms-wpforms-form-' . $form->ID . '-builder',
							'parent' => 'forms-wpforms-form-' . $form->ID,
							'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=wpforms-builder&view=fields&form_id=' . $form->ID ) ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target( 'builder' ),
								'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' )
							)
						)
					);

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'forms-wpforms-form-' . $form->ID . '-preview',
							'parent' => 'forms-wpforms-form-' . $form->ID,
							'title'  => esc_attr__( 'Preview', 'toolbar-extras' ),
							'href'   => esc_url( site_url( '/wpforms-preview/?wpforms_preview=form&form_id=' . $form->ID ) ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target(),
								'title'  => esc_attr__( 'Preview', 'toolbar-extras' )
							)
						)
					);

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'forms-wpforms-form-' . $form->ID . '-entries',
							'parent' => 'forms-wpforms-form-' . $form->ID,
							'title'  => esc_attr__( 'Entries', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=wpforms-entries&view=list&form_id=' . $form->ID ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Entries', 'toolbar-extras' )
							)
						)
					);

			}  // end foreach

		}  // end if

		/** General WPForms items */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-wpforms-all-forms',
				'parent' => 'forms-wpforms',
				'title'  => esc_attr__( 'All Forms', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wpforms-overview' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Forms', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-wpforms-new-form',
				'parent' => 'forms-wpforms',
				'title'  => esc_attr__( 'New Form', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wpforms-builder' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => esc_attr__( 'New Form', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-wpforms-all-entries',
				'parent' => 'forms-wpforms',
				'title'  => esc_attr__( 'All Entries', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wpforms-entries' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Entries', 'toolbar-extras' )
				)
			)
		);

		/** Settings */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-wpforms-settings',
				'parent' => 'forms-wpforms',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wpforms-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-wpforms-settings-general',
					'parent' => 'forms-wpforms-settings',
					'title'  => esc_attr__( 'General', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wpforms-settings&view=general' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'General', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-wpforms-settings-email',
					'parent' => 'forms-wpforms-settings',
					'title'  => esc_attr__( 'Email', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wpforms-settings&view=email' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Email', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-wpforms-settings-recaptcha',
					'parent' => 'forms-wpforms-settings',
					'title'  => esc_attr__( 'reCAPTCHA', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wpforms-settings&view=recaptcha' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'reCAPTCHA', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-wpforms-settings-validation',
					'parent' => 'forms-wpforms-settings',
					'title'  => esc_attr__( 'Validation', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wpforms-settings&view=validation' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Validation', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-wpforms-settings-integrations',
					'parent' => 'forms-wpforms-settings',
					'title'  => esc_attr__( 'Integrations', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wpforms-settings&view=integrations' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Integrations', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-wpforms-settings-misc',
					'parent' => 'forms-wpforms-settings',
					'title'  => esc_attr__( 'Misc', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wpforms-settings&view=misc' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Misc', 'toolbar-extras' )
					)
				)
			);

		/** Tools */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-wpforms-tools',
				'parent' => 'forms-wpforms',
				'title'  => esc_attr__( 'Tools', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wpforms-tools' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Tools', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-wpforms-tools-import',
					'parent' => 'forms-wpforms-tools',
					'title'  => esc_attr__( 'Import', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wpforms-tools&view=import' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Import', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-wpforms-tools-export',
					'parent' => 'forms-wpforms-tools',
					'title'  => esc_attr__( 'Export', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wpforms-tools&view=export' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Export', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-wpforms-tools-system',
					'parent' => 'forms-wpforms-tools',
					'title'  => esc_attr__( 'System Info', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wpforms-tools&view=system' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'System Info', 'toolbar-extras' )
					)
				)
			);

		/** Optionally, let other WPForms Add-Ons hook in */
		do_action( 'tbex_after_wpforms_settings' );

		/** Group: Resources for WPForms */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-wpforms-resources',
					'parent' => 'forms-wpforms',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);
			
			ddw_tbex_resource_item(
				'support-forum',
				'wpforms-support',
				'group-wpforms-resources',
				'https://wordpress.org/support/plugin/wpforms-lite'
			);

			ddw_tbex_resource_item(
				'documentation',
				'wpforms-docs',
				'group-wpforms-resources',
				'https://wpforms.com/docs/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'wpforms-translate',
				'group-wpforms-resources',
				'https://translate.wordpress.org/projects/wp-plugins/wpforms-lite'
			);

			ddw_tbex_resource_item(
				'official-site',
				'wpforms-site',
				'group-wpforms-resources',
				'https://wpforms.com/'
			);

		}  // end if

}  // end function


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_remove_original_wpforms_newcontent' );
/**
 * Remove original "WPForms" item from New Content Group.
 *
 * @since 1.3.1
 */
function ddw_tbex_remove_original_wpforms_newcontent() {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'wpforms' );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_new_content_wpforms', 80 );
/**
 * Items for "New Content" section: New WPForms Form
 *
 * @since  1.3.1
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_new_content_wpforms() {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-wpforms-form',
			'parent' => 'new-content',
			'title'  => ddw_tbex_string_new_form( 'WPForms' ),
			'href'   => esc_url( admin_url( 'admin.php?page=wpforms-builder' ) ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target( 'builder' ),
				'title'  => ddw_tbex_string_new_form( 'WPForms' )
			)
		)
	);

}  // end function