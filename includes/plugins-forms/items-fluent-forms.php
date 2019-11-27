<?php

// includes/plugins-forms/items-fluent-forms

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if Fluent Forms Pro Add-On plugin is active or not.
 *
 * @since 1.4.8
 *
 * @return bool TRUE if constant is defined, FALSE otherwise.
 */
function ddw_tbex_is_fluent_forms_pro_active() {

	return defined( 'FLUENTFORMPRO_VERSION' );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_fluent_forms' );
/**
 * Items for Plugin: Fluent Forms (free, by WP Fluent Forms)
 *
 * @since 1.4.8
 *
 * @uses ddw_tbex_rand()
 * @uses ddw_tbex_is_fluent_forms_pro_active()
 * @uses ddw_tbex_string_forms_system()
 *
 * @global object $wpdb WP Database object.
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_fluent_forms( $admin_bar ) {

	/** Assists reload when already on settings page */
	$rand = ddw_tbex_rand();

	$title = ddw_tbex_is_fluent_forms_pro_active()
		? ddw_tbex_string_forms_system( 'Fluent', 'pro' )
		: ddw_tbex_string_forms_system( 'Fluent' );

	/** For: Forms */
	$admin_bar->add_node(
		array(
			'id'     => 'forms-fluentforms',
			'parent' => 'tbex-sitegroup-forms',
			'title'  => $title,
			'href'   => esc_url( admin_url( 'admin.php?page=fluent_forms' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => $title,
			)
		)
	);

		/**
		 * Add each individual form as an item. Database query is necessary.
		 * @since 1.4.8
		 */
		global $wpdb;
    	$ff_table_name = $wpdb->prefix . 'fluentform_forms';
    	$forms         = $wpdb->get_results( "SELECT id, title FROM $ff_table_name ORDER BY id DESC" );

		/** Proceed only if there are any forms */
		if ( $forms ) {

			/** Add group */
			$admin_bar->add_group(
				array(
					'id'     => 'group-fluentforms-edit-forms',
					'parent' => 'forms-fluentforms',
				)
			);

			foreach ( $forms as $form ) {

				$form_id   = absint( $form->id );
				$form_name = esc_attr( $form->title );

				/** Add item per form */
				$admin_bar->add_node(
					array(
						'id'     => 'forms-fluentforms-form-' . $form_id,
						'parent' => 'group-fluentforms-edit-forms',
						'title'  => $form_name,
						'href'   => esc_url( admin_url( 'admin.php?page=fluent_forms&route=editor&form_id=' . $form_id ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Edit Form', 'toolbar-extras' ) . ': ' . $form_name,
						)
					)
				);

					$admin_bar->add_node(
						array(
							'id'     => 'forms-fluentforms-form-' . $form_id . '-builder',
							'parent' => 'forms-fluentforms-form-' . $form_id,
							'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=fluent_forms&route=editor&form_id=' . $form_id ) ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target( 'builder' ),
								'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' ),
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'forms-fluentforms-form-' . $form_id . '-preview',
							'parent' => 'forms-fluentforms-form-' . $form_id,
							'title'  => esc_attr__( 'Preview', 'toolbar-extras' ),
							'href'   => esc_url( site_url( '/?fluentform_pages=1&preview_id=' . $form_id . '#ff_preview' ) ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target(),
								'title'  => esc_attr__( 'Preview', 'toolbar-extras' ),
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'forms-fluentforms-form-' . $form_id . '-entries',
							'parent' => 'forms-fluentforms-form-' . $form_id,
							'title'  => esc_attr__( 'Entries', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=fluent_forms&route=entries&form_id=' . $form_id ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Entries', 'toolbar-extras' ),
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'forms-fluentforms-form-' . $form_id . '-settings',
							'parent' => 'forms-fluentforms-form-' . $form_id,
							'title'  => esc_attr__( 'Form Settings', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=fluent_forms&form_id=' . $form_id . '&route=settings&sub_route=form_settings#basic_settings' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Form Settings', 'toolbar-extras' ),
							)
						)
					);

			}  // end foreach

		}  // end if

		/** All Forms */
		$admin_bar->add_node(
			array(
				'id'     => 'forms-fluentforms-all-forms',
				'parent' => 'forms-fluentforms',
				'title'  => esc_attr__( 'All Forms', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=fluent_forms' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Forms', 'toolbar-extras' ),
				)
			)
		);

		/** New Form */
		$admin_bar->add_node(
			array(
				'id'     => 'forms-fluentforms-new-form',
				'parent' => 'forms-fluentforms',
				'title'  => esc_attr__( 'New Form', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=fluent_forms#add=1' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Form', 'toolbar-extras' ),
				)
			)
		);

		/** All Entries */
		$admin_bar->add_node(
			array(
				'id'     => 'forms-fluentforms-all-entries',
				'parent' => 'forms-fluentforms',
				'title'  => esc_attr__( 'All Entries', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=fluent_forms#entries' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Entries', 'toolbar-extras' ),
				)
			)
		);

		/** Tools */
		$admin_bar->add_node(
			array(
				'id'     => 'forms-fluentforms-transfer',
				'parent' => 'forms-fluentforms',
				'title'  => esc_attr__( 'Tools', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=fluent_forms_transfer' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Forms Tools', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-fluentforms-transfer-export',
					'parent' => 'forms-fluentforms-transfer',
					'title'  => esc_attr__( 'Export Forms', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=fluent_forms_transfer&rand=' . $rand . '#exportforms' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Export Forms', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-fluentforms-transfer-import',
					'parent' => 'forms-fluentforms-transfer',
					'title'  => esc_attr__( 'Import Forms', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=fluent_forms_transfer&rand=' . $rand . '#importforms' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Import Forms', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-fluentforms-transfer-logs',
					'parent' => 'forms-fluentforms-transfer',
					'title'  => esc_attr__( 'Activity Logs', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=fluent_forms_transfer&rand=' . $rand . '#activity-logs' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Activity Logs', 'toolbar-extras' ),
					)
				)
			);

		/** Settings */
		$admin_bar->add_node(
			array(
				'id'     => 'forms-fluentforms-settings',
				'parent' => 'forms-fluentforms',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=fluent_forms_settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-fluentforms-settings-global',
					'parent' => 'forms-fluentforms-settings',
					'title'  => esc_attr__( 'Global', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=fluent_forms_settings#settings' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Global Settings', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-fluentforms-settings-recaptcha',
					'parent' => 'forms-fluentforms-settings',
					'title'  => 'reCAPTCHA',
					'href'   => esc_url( admin_url( 'admin.php?page=fluent_forms_settings#re_captcha' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => 'reCAPTCHA',
					)
				)
			);

			if ( class_exists( '\FluentForm\App\Services\Integrations\MailChimp\MailChimpIntegration' ) ) {

				$admin_bar->add_node(
					array(
						'id'     => 'forms-fluentforms-settings-mailchimp',
						'parent' => 'forms-fluentforms-settings',
						'title'  => esc_attr__( 'Module', 'toolbar-extras' ) . ': Mailchimp',
						'href'   => esc_url( admin_url( 'admin.php?page=fluent_forms_settings#general-mailchimp-settings' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Module', 'toolbar-extras' ) . ': Mailchimp',
						)
					)
				);

			}  // end if

		/** Modules */
		$admin_bar->add_node(
			array(
				'id'     => 'forms-fluentforms-modules',
				'parent' => 'forms-fluentforms',
				'title'  => esc_attr__( 'Modules', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=fluent_form_add_ons' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Modules - Add-Ons/ Extensions', 'toolbar-extras' ),
				)
			)
		);

		if ( ddw_tbex_is_fluent_forms_pro_active() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'forms-fluentforms-modules-enable',
					'parent' => 'forms-fluentforms-modules',
					'title'  => esc_attr__( 'Enable Modules', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=fluent_form_add_ons' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Enable Modules', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-fluentforms-modules-license',
					'parent' => 'forms-fluentforms-modules',
					'title'  => esc_attr__( 'License', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=fluent_form_add_ons&sub_page=fluentform-pro-add-on' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'License', 'toolbar-extras' ),
					)
				)
			);

		}  // end if
		
		/** Optionally, let other Fluent Forms Add-Ons hook in */
		do_action( 'tbex_after_fluentforms_settings', $admin_bar );

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-fluentforms-resources',
					'parent' => 'forms-fluentforms',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'fluentforms-support',
				'group-fluentforms-resources',
				'https://wordpress.org/support/plugin/fluentform'
			);

			ddw_tbex_resource_item(
				'documentation',
				'fluentforms-docs',
				'group-fluentforms-resources',
				'https://wpmanageninja.com/docs/fluent-form/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'fluentforms-translate',
				'group-fluentforms-resources',
				'https://translate.wordpress.org/projects/wp-plugins/fluentform'
			);

			ddw_tbex_resource_item(
				'github-issues',
				'fluentforms-github',
				'group-fluentforms-resources',
				'https://github.com/fluentform/fluentform/issues'
			);

			ddw_tbex_resource_item(
				'official-site',
				'fluentforms-site',
				'group-fluentforms-resources',
				'https://wpfluentforms.com/'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_new_content_fluent_form', 80 );
/**
 * Items for "New Content" section: New Fluent Form
 *
 * @since 1.4.8
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_new_content_fluent_form( $admin_bar ) {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() || is_network_admin() ) {
		return $admin_bar;
	}

	$admin_bar->add_node(
		array(
			'id'     => 'tbex-new-fluent-form',	// same as original!
			'parent' => 'new-content',
			'title'  => ddw_tbex_string_new_form( 'Fluent' ),
			'href'   => esc_url( admin_url( 'admin.php?page=fluent_forms#add=1' ) ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target( 'builder' ),
				'title'  => ddw_tbex_string_add_new_item( ddw_tbex_string_new_form( 'Fluent' ) ),
			)
		)
	);

}  // end function
