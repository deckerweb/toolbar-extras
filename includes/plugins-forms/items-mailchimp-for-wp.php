<?php

// includes/plugins-forms/items-mailchimp-for-wp

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
 * @since 1.3.2
 * @since 1.4.3 Added more integrations.
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_mc4wp_forms( $admin_bar ) {

	/** For: Forms */
	$admin_bar->add_node(
		array(
			'id'     => 'forms-mc4wp',
			'parent' => 'tbex-sitegroup-forms',
			'title'  => ddw_tbex_string_forms_system( 'MailChimp' ),
			'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-forms' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_forms_system( 'MailChimp' ),
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
			$admin_bar->add_group(
				array(
					'id'     => 'group-mc4wp-edit-forms',
					'parent' => 'forms-mc4wp'
				)
			);

			foreach ( $forms as $form ) {

				$form_id   = absint( $form->ID );
				$form_name = esc_attr( $form->post_title );

				/** Add item per form */
				$admin_bar->add_node(
					array(
						'id'     => 'forms-mc4wp-form-' . $form_id,
						'parent' => 'group-mc4wp-edit-forms',
						'title'  => $form_name,
						'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-forms&view=edit-form&form_id=' . $form_id ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Edit Form', 'toolbar-extras' ) . ': ' . $form_name,
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'forms-mc4wp-form-' . $form_id . '-fields',
						'parent' => 'forms-mc4wp-form-' . $form_id,
						'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-forms&view=edit-form&form_id=' . $form_id . '&tab=fields' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' )
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'forms-mc4wp-form-' . $form_id . '-messages',
						'parent' => 'forms-mc4wp-form-' . $form_id,
						'title'  => esc_attr__( 'Messages', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-forms&view=edit-form&form_id=' . $form_id . '&tab=messages' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Messages', 'toolbar-extras' )
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'forms-mc4wp-form-' . $form_id . '-settings',
						'parent' => 'forms-mc4wp-form-' . $form_id,
						'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-forms&view=edit-form&form_id=' . $form_id . '&tab=settings' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'forms-mc4wp-form-' . $form_id . '-appearance',
						'parent' => 'forms-mc4wp-form-' . $form_id,
						'title'  => esc_attr__( 'Appearance', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-forms&view=edit-form&form_id=' . $form_id . '&tab=appearance' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Appearance', 'toolbar-extras' )
						)
					)
				);

			}  // end foreach

		}  // end if

		/** Integrations */
		$admin_bar->add_node(
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

			$admin_bar->add_node(
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
			$admin_bar->add_group(
				array(
					'id'     => 'group-mc4wp-integrations-custom',
					'parent' => 'forms-mc4wp-integrations'
				)
			);

				$admin_bar->add_node(
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
			$admin_bar->add_group(
				array(
					'id'     => 'group-mc4wp-integrations-wpdefaults',
					'parent' => 'forms-mc4wp-integrations'
				)
			);

				$admin_bar->add_node(
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

				$admin_bar->add_node(
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
			$admin_bar->add_group(
				array(
					'id'     => 'group-mc4wp-integrations-thirdparty',
					'parent' => 'forms-mc4wp-integrations'
				)
			);

				/** Gravity Forms */
				if ( ddw_tbex_is_gravityforms_active() ) {

					$admin_bar->add_node(
						array(
							'id'     => 'forms-mc4wp-integrations-gravityforms',
							'parent' => 'group-mc4wp-integrations-thirdparty',
							'title'  => 'Gravity Forms',
							'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-integrations&integration=gravity-forms' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => 'Gravity Forms',
							)
						)
					);

				}  // end if

				/** WPForms */
				if ( ddw_tbex_is_wpforms_active() ) {

					$admin_bar->add_node(
						array(
							'id'     => 'forms-mc4wp-integrations-wpforms',
							'parent' => 'group-mc4wp-integrations-thirdparty',
							'title'  => 'WPForms',
							'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-integrations&integration=wpforms' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => 'WPForms',
							)
						)
					);

				}  // end if

				/** Ninja Forms 3 */
				if ( ddw_tbex_is_ninjaforms_active() ) {

					$admin_bar->add_node(
						array(
							'id'     => 'forms-mc4wp-integrations-ninjaforms',
							'parent' => 'group-mc4wp-integrations-thirdparty',
							'title'  => 'Ninja Forms',
							'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-integrations&integration=ninja-forms' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => 'Ninja Forms',
							)
						)
					);

				}  // end if

				/** Contact Form 7 (CF7) */
				if ( ddw_tbex_is_cf7_active() ) {

					$admin_bar->add_node(
						array(
							'id'     => 'forms-mc4wp-integrations-cf7',
							'parent' => 'group-mc4wp-integrations-thirdparty',
							'title'  => 'Contact Form 7',
							'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-integrations&integration=contact-form-7' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => 'Contact Form 7',
							)
						)
					);

				}  // end if

				/** WooCommerce */
				if ( ddw_tbex_is_woocommerce_active() ) {

					$admin_bar->add_node(
						array(
							'id'     => 'forms-mc4wp-integrations-woocommerce',
							'parent' => 'group-mc4wp-integrations-thirdparty',
							'title'  => 'WooCommerce',
							'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-integrations&integration=woocommerce' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => 'WooCommerce',
							)
						)
					);

				}  // end if

				/** Easy Digital Downloads (EDD) */
				if ( ddw_tbex_is_edd_active() ) {

					$admin_bar->add_node(
						array(
							'id'     => 'forms-mc4wp-integrations-edd',
							'parent' => 'group-mc4wp-integrations-thirdparty',
							'title'  => 'Easy Digital Downloads',
							'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-integrations&integration=easy-digital-downloads' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => 'Easy Digital Downloads',
							)
						)
					);

				}  // end if

				/** Give Donations */
				if ( ddw_tbex_is_give_active() ) {

					$admin_bar->add_node(
						array(
							'id'     => 'forms-mc4wp-integrations-give',
							'parent' => 'group-mc4wp-integrations-thirdparty',
							'title'  => esc_attr__( 'Give Donations', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-integrations&integration=give' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Give Donations', 'toolbar-extras' )
							)
						)
					);

				}  // end if

				/** MemberPress */
				if ( ddw_tbex_is_memberpress_active() ) {

					$admin_bar->add_node(
						array(
							'id'     => 'forms-mc4wp-integrations-memberpress',
							'parent' => 'group-mc4wp-integrations-thirdparty',
							'title'  => 'MemberPress',
							'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-integrations&integration=memberpress' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => 'MemberPress',
							)
						)
					);

				}  // end if

				/** AffiliateWP */
				if ( ddw_tbex_is_affiliatewp_active() ) {

					$admin_bar->add_node(
						array(
							'id'     => 'forms-mc4wp-integrations-affiliatewp',
							'parent' => 'group-mc4wp-integrations-thirdparty',
							'title'  => 'AffiliateWP',
							'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-integrations&integration=affiliatewp' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => 'AffiliateWP',
							)
						)
					);

				}  // end if

				/** Events Manager */
				if ( ddw_tbex_is_events_manager_active() ) {

					$admin_bar->add_node(
						array(
							'id'     => 'forms-mc4wp-integrations-eventsmanager',
							'parent' => 'group-mc4wp-integrations-thirdparty',
							'title'  => esc_attr__( 'Events Manager', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-integrations&integration=events-manager' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Events Manager', 'toolbar-extras' )
							)
						)
					);

				}  // end if

				/** BuddyPresss */
				if ( ddw_tbex_is_buddypress_active() ) {

					$admin_bar->add_node(
						array(
							'id'     => 'forms-mc4wp-integrations-buddypress',
							'parent' => 'group-mc4wp-integrations-thirdparty',
							'title'  => 'BuddyPresss',
							'href'   => esc_url( admin_url( 'admin.php?page=mailchimp-for-wp-integrations&integration=buddypress' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => 'BuddyPresss',
							)
						)
					);

				}  // end if

		/** Add-On: Top Bar */
		if ( defined( 'MAILCHIMP_SYNC_VERSION' ) ) {

			$admin_bar->add_node(
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

				$admin_bar->add_node(
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

				$admin_bar->add_node(
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

				$admin_bar->add_node(
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

				$admin_bar->add_node(
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

			$admin_bar->add_node(
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
		$admin_bar->add_node(
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
		$admin_bar->add_node(
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
		do_action( 'tbex_after_mc4wp_settings' );

		/** Group: Resources for MC4WP */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
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
				'github',
				'mc4wp-github',
				'group-mc4wp-resources',
				'https://github.com/ibericode/mailchimp-for-wordpress'
			);

			ddw_tbex_resource_item(
				'official-site',
				'mc4wp-site',
				'group-mc4wp-resources',
				'https://mc4wp.com/'
			);

		}  // end if

}  // end function
