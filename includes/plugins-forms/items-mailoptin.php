<?php

// includes/plugins-forms/items-mailoptin

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_mailoptin', 20 );
/**
 * Items for Plugin: MailOptin Lite (free, by MailOptin Team)
 *
 * @since 1.4.8
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_mailoptin( $admin_bar ) {

	/** For: Forms */
	$admin_bar->add_node(
		array(
			'id'     => 'forms-mailoptin',
			'parent' => 'tbex-sitegroup-forms',
			'title'  => esc_attr__( 'MailOptin', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=mailoptin-settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'MailOptin', 'toolbar-extras' ),
			)
		)
	);

		/** MailOptin dynamics - add group */
		$admin_bar->add_group(
			array(
				'id'     => 'group-mailoptin-dynamic',
				'parent' => 'forms-mailoptin',
			)
		);

		/** Email Campaigns - dynamic */
		$admin_bar->add_node(
			array(
				'id'     => 'forms-mailoptin-dynamic-emails',
				'parent' => 'group-mailoptin-dynamic',
				'title'  => esc_attr__( 'Emails', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mailoptin-emails' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Email Campaigns', 'toolbar-extras' ),
				)
			)
		);

			/**
			 * Add each individual form as an item. REST API query is necessary.
			 * @since 1.4.8
			 */
			//$forms = weforms()->form->all();
			$emails = \MailOptin\Core\Repositories\EmailCampaignRepository::get_email_campaigns();

			/** Proceed only if there are any forms */
			if ( $emails ) {

				foreach ( $emails as $email ) {

					$email_title = esc_attr( $email[ 'name' ] );
					$email_id    = absint( $email[ 'id' ] );

					/** Add item per form */
					$admin_bar->add_node(
						array(
							'id'     => 'forms-mailoptin-dynamic-emails-' . $email_id,
							'parent' => 'forms-mailoptin-dynamic-emails',
							'title'  => $email_title,
							'href'   => esc_url( admin_url( 'customize.php?mailoptin_email_campaign_id=' . $email_id ) ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target(),
								'title'  => esc_attr__( 'Edit Email Campaign', 'toolbar-extras' ) . ': ' . $email_title,
							)
						)
					);

				}  // end foreach

			}  // end if

		/** Optin Campaigns - dynamic */
		$admin_bar->add_node(
			array(
				'id'     => 'forms-mailoptin-dynamic-campaigns',
				'parent' => 'group-mailoptin-dynamic',
				'title'  => esc_attr__( 'Optin Campaigns', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mailoptin-optin-campaigns' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Optin Campaigns', 'toolbar-extras' ),
				)
			)
		);

			/**
			 * Add each individual form as an item. REST API query is necessary.
			 * @since 1.4.8
			 */
			$campaigns = \MailOptin\Core\Repositories\OptinCampaignsRepository::get_optin_campaigns();

			/** Proceed only if there are any forms */
			if ( $campaigns ) {

				foreach ( $campaigns as $campaign ) {

					$campaign_title = esc_attr( $campaign[ 'name' ] );
					$campaign_id    = absint( $campaign[ 'id' ] );

					/** Add item per form */
					$admin_bar->add_node(
						array(
							'id'     => 'forms-mailoptin-dynamic-campaigns-' . $campaign_id,
							'parent' => 'forms-mailoptin-dynamic-campaigns',
							'title'  => $campaign_title,
							'href'   => esc_url( admin_url( 'customize.php?mailoptin_email_campaign_id=' . $campaign_id ) ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target(),
								'title'  => esc_attr__( 'Edit Optin Campaign', 'toolbar-extras' ) . ': ' . $campaign_title,
							)
						)
					);

				}  // end foreach

			}  // end if


		/** Emails */
		$admin_bar->add_node(
			array(
				'id'     => 'forms-mailoptin-emails',
				'parent' => 'forms-mailoptin',
				'title'  => esc_attr__( 'All Emails', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mailoptin-emails' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Email Campaigns', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-mailoptin-emails-overview',
					'parent' => 'forms-mailoptin-emails',
					'title'  => esc_attr__( 'All Emails / Newsletters', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mailoptin-emails' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Emails / Newsletters - Overview', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-mailoptin-emails-new-automation',
					'parent' => 'forms-mailoptin-emails',
					'title'  => esc_attr__( 'New Email Automation', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mailoptin-emails&view=add-new-email-automation' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Add New Email Automation', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-mailoptin-emails-newsletter',
					'parent' => 'forms-mailoptin-emails',
					'title'  => esc_attr__( 'Create Newsletter', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mailoptin-emails&view=create-newsletter' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Create Newsletter', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-mailoptin-emails-logs',
					'parent' => 'forms-mailoptin-emails',
					'title'  => esc_attr__( 'Logs', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mailoptin-emails&view=campaign-log' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Email Logs', 'toolbar-extras' ),
					)
				)
			);

		/** Optin Campaigns */
		$admin_bar->add_node(
			array(
				'id'     => 'forms-mailoptin-campaigns',
				'parent' => 'forms-mailoptin',
				'title'  => esc_attr__( 'All Optin Campaigns', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mailoptin-optin-campaigns' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Optin Campaigns', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-mailoptin-campaigns-overview',
					'parent' => 'forms-mailoptin-campaigns',
					'title'  => esc_attr__( 'Campaign Overview', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mailoptin-optin-campaigns' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Campaigns - Overview', 'toolbar-extras' ),
					)
				)
			);

				$admin_bar->add_node(
					array(
						'id'     => 'forms-mailoptin-campaigns-overview-all',
						'parent' => 'forms-mailoptin-campaigns-overview',
						'title'  => esc_attr__( 'All Campaigns', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=mailoptin-optin-campaigns' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'All Campaigns', 'toolbar-extras' ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'forms-mailoptin-campaigns-overview-lightbox',
						'parent' => 'forms-mailoptin-campaigns-overview',
						'title'  => esc_attr__( 'Lightbox', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=mailoptin-optin-campaigns&optin-type=lightbox' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Type: Lightbox Campaigns (Modal/ Popup)', 'toolbar-extras' ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'forms-mailoptin-campaigns-overview-inpost',
						'parent' => 'forms-mailoptin-campaigns-overview',
						'title'  => esc_attr__( 'In-Post', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=mailoptin-optin-campaigns&optin-type=inpost' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Type: In-Post Campaigns', 'toolbar-extras' ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'forms-mailoptin-campaigns-overview-widget',
						'parent' => 'forms-mailoptin-campaigns-overview',
						'title'  => esc_attr__( 'Sidebar/ Widget', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=mailoptin-optin-campaigns&optin-type=sidebar' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Type: Sidebar/ Widget Campaigns', 'toolbar-extras' ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'forms-mailoptin-campaigns-overview-notification-bar',
						'parent' => 'forms-mailoptin-campaigns-overview',
						'title'  => esc_attr__( 'Notification Bar', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=mailoptin-optin-campaigns&optin-type=bar' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Type: Notification Bar Campaigns', 'toolbar-extras' ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'forms-mailoptin-campaigns-overview-slide-in',
						'parent' => 'forms-mailoptin-campaigns-overview',
						'title'  => esc_attr__( 'Slide-In', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=mailoptin-optin-campaigns&optin-type=slidein' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Type: Slide-In Campaigns', 'toolbar-extras' ),
						)
					)
				);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-mailoptin-campaigns-new',
					'parent' => 'forms-mailoptin-campaigns',
					'title'  => esc_attr__( 'New Campaign', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mailoptin-optin-campaigns&view=add-new-optin' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Add New Campaign', 'toolbar-extras' ),
					)
				)
			);

		/** Settings */
		$admin_bar->add_node(
			array(
				'id'     => 'forms-mailoptin-settings',
				'parent' => 'forms-mailoptin',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mailoptin-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-mailoptin-settings-general',
					'parent' => 'forms-mailoptin-settings',
					'title'  => esc_attr__( 'General', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mailoptin-settings#general_settings' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'General', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-mailoptin-settings-optin-campaign',
					'parent' => 'forms-mailoptin-settings',
					'title'  => esc_attr__( 'Optin Campaign', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mailoptin-settings#optin_campaign_settings' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Optin Campaign', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-mailoptin-settings-email-campaign',
					'parent' => 'forms-mailoptin-settings',
					'title'  => esc_attr__( 'Email Campaign', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mailoptin-settings#email_campaign_settings' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Email Campaign', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-mailoptin-settings-recaptcha',
					'parent' => 'forms-mailoptin-settings',
					'title'  => esc_attr__( 'reCAPTCHA', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mailoptin-settings#recaptcha_settings' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'reCAPTCHA', 'toolbar-extras' ),
					)
				)
			);

		/** Integrations */
		$admin_bar->add_node(
			array(
				'id'     => 'forms-mailoptin-integrations',
				'parent' => 'forms-mailoptin',
				'title'  => esc_attr__( 'Integrations', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mailoptin-integrations' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Integrations', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-mailoptin-integrations-all',
					'parent' => 'forms-mailoptin-integrations',
					'title'  => esc_attr__( 'All Integrations', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mailoptin-integrations' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Integrations - Overview', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-mailoptin-integrations-email-marketing',
					'parent' => 'forms-mailoptin-integrations',
					'title'  => esc_attr__( 'Email Marketing', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mailoptin-integrations&connect-type=emailmarketing' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Type: Email Marketing Integrations', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-mailoptin-integrations-social',
					'parent' => 'forms-mailoptin-integrations',
					'title'  => esc_attr__( 'Social', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mailoptin-integrations&connect-type=social' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Type: Social Integrations', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-mailoptin-integrations-analytics',
					'parent' => 'forms-mailoptin-integrations',
					'title'  => esc_attr__( 'Analytics', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mailoptin-integrations&connect-type=analytics' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Type: Analytics Integrations', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-mailoptin-integrations-crm',
					'parent' => 'forms-mailoptin-integrations',
					'title'  => esc_attr__( 'CRM', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mailoptin-integrations&connect-type=crm' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Type: CRM Integrations', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-mailoptin-integrations-other',
					'parent' => 'forms-mailoptin-integrations',
					'title'  => esc_attr__( 'Other', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mailoptin-integrations&connect-type=other' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Type: Other Integrations', 'toolbar-extras' ),
					)
				)
			);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-mailoptin-resources',
					'parent' => 'forms-mailoptin',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);
			
			ddw_tbex_resource_item(
				'support-forum',
				'mailoptin-support',
				'group-mailoptin-resources',
				'https://wordpress.org/support/plugin/mailoptin'
			);

			ddw_tbex_resource_item(
				'documentation',
				'mailoptin-docs',
				'group-mailoptin-resources',
				'https://mailoptin.io/docs/'
			);

			ddw_tbex_resource_item(
				'support-contact',
				'mailoptin-support-contact',
				'group-mailoptin-resources',
				'https://mailoptin.io/submit-ticket/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'mailoptin-translate',
				'group-mailoptin-resources',
				'https://translate.wordpress.org/projects/wp-plugins/mailoptin'
			);

			ddw_tbex_resource_item(
				'official-site',
				'mailoptin-site',
				'group-mailoptin-resources',
				'https://mailoptin.io/'
			);

		}  // end if

}  // end function


add_filter( 'admin_bar_menu', 'ddw_tbex_site_items_new_content_mailoptin', 80 );
/**
 * Items for "New Content" section:
 *   New MailOptin Email/ Newsletter/ Campaign content
 *
 * @since 1.4.8
 *
 * @param object $admin_bar Holds all nodes of the Toolbar.
 */
function ddw_tbex_site_items_new_content_mailoptin( $admin_bar ) {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() || is_network_admin() ) {
		return $admin_bar;
	}

	$admin_bar->add_node(
		array(
			'id'     => 'tbex-new-mailoptin',
			'parent' => 'new-content',
			'title'  => esc_attr__( 'MailOptin', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=mailoptin-emails&view=create-newsletter' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Add New MailOptin Email Campaign Data', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'tbex-new-mailoptin-email',
				'parent' => 'tbex-new-mailoptin',
				'title'  => esc_attr__( 'Email Automation', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mailoptin-emails&view=add-new-email-automation' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Add New MailOptin Email Automation', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'tbex-new-mailoptin-newsletter',
				'parent' => 'tbex-new-mailoptin',
				'title'  => esc_attr__( 'Newsletter', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mailoptin-emails&view=create-newsletter' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Add New MailOptin Newsletter', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'tbex-new-mailoptin-campaign',
				'parent' => 'tbex-new-mailoptin',
				'title'  => esc_attr__( 'Optin Campaign', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mailoptin-optin-campaigns&view=add-new-optin' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Add New Form in MailOptin Optin Campaign', 'toolbar-extras' ),
				)
			)
		);

}  // end function
