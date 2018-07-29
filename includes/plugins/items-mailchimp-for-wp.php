<?php

// includes/plugins/items-mailchimp-for-wp

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_mc4wp_forms' );
/**
 * Items for Plugin: MailChimp for WordPress (free, by ibericode)
 *
 * @since  1.3.2
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_mc4wp_forms() {

	/** For: Forms */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'forms-mc4wp',
			'parent' => 'tbex-sitegroup-forms',
			'title'  => ddw_tbex_string_forms_system( 'MailChimp' ),		// esc_attr__( 'MailChimp Forms', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-forms' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_forms_system( 'MailChimp' ),		// esc_attr__( 'MailChimp Forms', 'toolbar-extras' )
			)
		)
	);

		/**
		 * Add each individual form as an item.
		 *   Forms are saved as a post type therefore a query necessary.
		 * @since 1.3.2
		 */
		$args = array(
			'post_type'      => 'mc4wp-form',
			'posts_per_page' => -1,
		);

		$forms = get_posts( $args );

		/** Proceed only if there are any forms */
		if ( $forms ) {

			/** Add group */
			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-mc4wp-edit-forms',
					'parent' => 'forms-mc4wp'
				)
			);

			foreach ( $forms as $form ) {

				/** Add item per form */
				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-mc4wp-form-' . $form->ID,
						'parent' => 'group-mc4wp-edit-forms',
						'title'  => $form->post_title,
						'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-forms&view=edit-form&form_id=' . $form->ID ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Edit Form', 'toolbar-extras' ) . ': ' . $form->post_title
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-mc4wp-form-' . $form->ID . '-fields',
						'parent' => 'forms-mc4wp-form-' . $form->ID,
						'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-forms&view=edit-form&form_id=' . $form->ID . '&tab=fields' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-mc4wp-form-' . $form->ID . '-messages',
						'parent' => 'forms-mc4wp-form-' . $form->ID,
						'title'  => esc_attr__( 'Messages', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-forms&view=edit-form&form_id=' . $form->ID . '&tab=messages' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Messages', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-mc4wp-form-' . $form->ID . '-settings',
						'parent' => 'forms-mc4wp-form-' . $form->ID,
						'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-forms&view=edit-form&form_id=' . $form->ID . '&tab=settings' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-mc4wp-form-' . $form->ID . '-appearance',
						'parent' => 'forms-mc4wp-form-' . $form->ID,
						'title'  => esc_attr__( 'Appearance', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-forms&view=edit-form&form_id=' . $form->ID . '&tab=appearance' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Appearance', 'toolbar-extras' )
						)
					)
				);

			}  // end foreach

		}  // end if

		/** Integrations */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-mc4wp-integrations',
				'parent' => 'forms-mc4wp',
				'title'  => esc_attr__( 'Integrations', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-integrations' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Integrations', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mc4wp-integrations-overview',
					'parent' => 'forms-mc4wp-integrations',
					'title'  => esc_attr__( 'Overview', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-integrations' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Overview', 'toolbar-extras' )
					)
				)
			);

			/** Custom */
			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-mc4wp-integrations-custom',
					'parent' => 'forms-mc4wp-integrations'
				)
			);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-mc4wp-integrations-custom',
						'parent' => 'group-mc4wp-integrations-custom',
						'title'  => esc_attr__( 'Custom', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-integrations&integration=custom' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Custom', 'toolbar-extras' )
						)
					)
				);

			/** WordPress Defaults: Comments & Registration */
			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-mc4wp-integrations-wpdefaults',
					'parent' => 'forms-mc4wp-integrations'
				)
			);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-mc4wp-integrations-wpcomments',
						'parent' => 'group-mc4wp-integrations-wpdefaults',
						'title'  => esc_attr__( 'Comment Form', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-integrations&integration=wp-comment-form' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Comment Form', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-mc4wp-integrations-wpregistration',
						'parent' => 'group-mc4wp-integrations-wpdefaults',
						'title'  => esc_attr__( 'Registration Form', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-integrations&integration=wp-registration-form' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Registration Form', 'toolbar-extras' )
						)
					)
				);

			/** Third-Party plugins */
			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-mc4wp-integrations-thirdparty',
					'parent' => 'forms-mc4wp-integrations'
				)
			);

				if ( defined( 'RG_CURRENT_VIEW' ) ) {

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'forms-mc4wp-integrations-gravityforms',
							'parent' => 'group-mc4wp-integrations-thirdparty',
							'title'  => esc_attr__( 'Gravity Forms', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-integrations&integration=gravity-forms' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Gravity Forms', 'toolbar-extras' )
							)
						)
					);

				}  // end if

				if ( defined( 'WPCF7_VERSION' ) ) {

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'forms-mc4wp-integrations-cf7',
							'parent' => 'group-mc4wp-integrations-thirdparty',
							'title'  => esc_attr__( 'Contact Form 7', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-integrations&integration=contact-form-7' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Contact Form 7', 'toolbar-extras' )
							)
						)
					);

				}  // end if

				if ( class_exists( 'WooCommerce' ) ) {

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'forms-mc4wp-integrations-woocommerce',
							'parent' => 'group-mc4wp-integrations-thirdparty',
							'title'  => esc_attr__( 'WooCommerce', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-integrations&integration=woocommerce' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'WooCommerce', 'toolbar-extras' )
							)
						)
					);

				}  // end if

				if ( class_exists( 'Easy_Digital_Downloads' ) ) {

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'forms-mc4wp-integrations-edd',
							'parent' => 'group-mc4wp-integrations-thirdparty',
							'title'  => esc_attr__( 'Easy Digital Downloads', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-integrations&integration=easy-digital-downloads' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Easy Digital Downloads', 'toolbar-extras' )
							)
						)
					);

				}  // end if

		/** Add-On: Top Bar */
		if ( defined( 'MAILCHIMP_SYNC_VERSION' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mc4wp-topbar',
					'parent' => 'forms-mc4wp',
					'title'  => esc_attr__( 'Top Bar', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-top-bar' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Top Bar', 'toolbar-extras' )
					)
				)
			);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-mc4wp-topbar-bar-setting',
						'parent' => 'forms-mc4wp-topbar',
						'title'  => esc_attr__( 'Bar Setting', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-top-bar&tab=settings' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Bar Setting', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-mc4wp-topbar-appearance',
						'parent' => 'forms-mc4wp-topbar',
						'title'  => esc_attr__( 'Appearance', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-top-bar&tab=appearance' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Appearance', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-mc4wp-topbar-messages',
						'parent' => 'forms-mc4wp-topbar',
						'title'  => esc_attr__( 'Messages', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-top-bar&tab=messages' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Messages', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-mc4wp-topbar-advanced',
						'parent' => 'forms-mc4wp-topbar',
						'title'  => esc_attr__( 'Advanced', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-top-bar&tab=advanced' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Advanced', 'toolbar-extras' )
						)
					)
				);

		}  // end if

		/** Add-On: User Sync */
		if ( defined( 'MAILCHIMP_SYNC_VERSION' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mc4wp-usersync',
					'parent' => 'forms-mc4wp',
					'title'  => esc_attr__( 'User Sync', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-sync' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'User Sync', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		/** Settings */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-mc4wp-settings',
				'parent' => 'forms-mc4wp',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-other' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		/** MailChimp Setup */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-mc4wp-flamingo',
				'parent' => 'forms-mc4wp',
				'title'  => esc_attr__( 'MailChimp Setup', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'MailChimp Setup', 'toolbar-extras' )
				)
			)
		);

		/** Optionally, let other MC4WP Add-Ons hook in */
		do_action( 'tbex_after_cf7_settings' );

		/** Group: Resources for MC4WP */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-mc4wp-resources',
					'parent' => 'forms-mc4wp',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);
			
			ddw_tbex_resource_item(
				'support-forum',
				'mc4wp-support',
				'group-mc4wp-resources',
				'https://wordpress.org/support/plugin/mailchimp-for-wp'
			);

			ddw_tbex_resource_item(
				'knowledge-base',
				'mc4wp-kb',
				'group-mc4wp-resources',
				'https://kb.mc4wp.com/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'mc4wp-translate',
				'group-mc4wp-resources',
				'https://translate.wordpress.org/projects/wp-plugins/mailchimp-for-wp'
			);

			ddw_tbex_resource_item(
				'official-site',
				'mc4wp-site',
				'group-mc4wp-resources',
				'https://mc4wp.com/'
			);

		}  // end if

}  // end function