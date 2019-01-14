<?php

// includes/plugins-forms/items-mailpoetlegacy-legacy

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_mailpoet_legacy' );
/**
 * Items for Plugin: MailPoet Newsletters (Previous) (Version 2, Legacy) (free, by MailPoet)
 *
 * @since 1.4.0
 *
 * @uses WYSIJA::get()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_mailpoet_legacy() {

	/** For: Forms hook place */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'forms-mailpoetlegacy',
			'parent' => 'tbex-sitegroup-forms',
			'title'  => esc_attr__( 'MailPoet', 'toolbar-extras' ) . ' ' . esc_attr__( '(Legacy)', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=wysija_campaigns' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'MailPoet', 'toolbar-extras' ) . ' ' . esc_attr__( '(Version 2, Legacy)', 'toolbar-extras' )
			)
		)
	);

		/** MailPoet dynamics - add group */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-mailpoetlegacy-dynamic',
				'parent' => 'forms-mailpoetlegacy'
			)
		);

		/** Newsletters (Emails/ Campaigns) */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mailpoetlegacy-newsletters-overview',
				'parent' => 'group-mailpoetlegacy-dynamic',
				'title'  => esc_attr__( 'E-Mail Newsletters', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wysija_campaigns' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'E-Mail Newsletters', 'toolbar-extras' )
				)
			)
		);

			/**
			 * Add each individual Newsletter as an item. Database query is necessary.
			 * @since 1.4.0
			 */
			$model_newsletters = WYSIJA::get( 'email', 'model' );
			$newsletters = $model_newsletters->getRows( array( 'email_id', 'subject' ) );

			/** Proceed only if there are any newsletter */
			if ( ! empty( $newsletters ) ) {

				foreach ( $newsletters as $newsletter ) {

					$newsletter_title = esc_attr( $newsletter[ 'subject' ] );
					$newsletter_id    = (int) $newsletter[ 'email_id' ];

					/** Skip the sign-up confirmation */
					if ( 2 === $newsletter_id ) {
						continue;
					}

					/** Add item per newsletter */
					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'mailpoetlegacy-newsletter-' . $newsletter_id,
							'parent' => 'mailpoetlegacy-newsletters-overview',
							'title'  => $newsletter_title,
							'href'   => esc_url( admin_url( 'admin.php?page=wysija_campaigns&id=' . $newsletter_id . '&action=edit' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Edit Newsletter', 'toolbar-extras' ) . ': ' . $newsletter_title
							)
						)
					);

						$GLOBALS[ 'wp_admin_bar' ]->add_node(
							array(
								'id'     => 'mailpoetlegacy-newsletter-' . $newsletter_id . '-edit',
								'parent' => 'mailpoetlegacy-newsletter-' . $newsletter_id,
								'title'  => esc_attr__( 'Edit', 'toolbar-extras' ),
								'href'   => esc_url( admin_url( 'admin.php?page=wysija_campaigns&id=' . $newsletter_id . '&action=edit' ) ),
								'meta'   => array(
									'target' => '',
									'title'  => esc_attr__( 'Edit Newsletter', 'toolbar-extras' ) . ': ' . $newsletter_title
								)
							)
						);

						$GLOBALS[ 'wp_admin_bar' ]->add_node(
							array(
								'id'     => 'mailpoetlegacy-newsletter-' . $newsletter_id . '-preview',
								'parent' => 'mailpoetlegacy-newsletter-' . $newsletter_id,
								'title'  => esc_attr__( 'Preview', 'toolbar-extras' ),
								'href'   => esc_url( site_url( '/?wysija-page=1&controller=email&action=view&email_id=' . $newsletter_id . '&wysijap=subscriptions' ) ),
								'meta'   => array(
									'target' => ddw_tbex_meta_target(),
									'title'  => esc_attr__( 'Preview', 'toolbar-extras' )
								)
							)
						);

				}  // end foreach

			}  // end if

		/** Forms */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mailpoetlegacy-forms-overview',
				'parent' => 'group-mailpoetlegacy-dynamic',
				'title'  => esc_attr__( 'Forms', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wysija_config#tab-forms' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Forms', 'toolbar-extras' )
				)
			)
		);

			/**
			 * Add each individual form as an item. Database query is necessary.
			 * @since 1.4.0
			 */
			$model_forms = WYSIJA::get( 'forms', 'model' );
			$forms = $model_forms->getRows( array( 'form_id', 'name' ) );

			/** Proceed only if there are any forms */
			if ( ! empty( $forms ) ) {

				foreach ( $forms as $form ) {

					$form_title = esc_attr( $form[ 'name' ] );
					$form_id    = (int) $form[ 'form_id' ];

					/** Add item per form */
					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'mailpoetlegacy-form-' . $form_id,
							'parent' => 'mailpoetlegacy-forms-overview',
							'title'  => $form_title,
							'href'   => esc_url( admin_url( 'admin.php?page=wysija_config&action=form_edit&id=' . $form_id ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Edit Form', 'toolbar-extras' ) . ': ' . $form_title
							)
						)
					);

				}  // end foreach

			}  // end if

		/** Lists */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mailpoetlegacy-lists-overview',
				'parent' => 'group-mailpoetlegacy-dynamic',
				'title'  => esc_attr__( 'Lists', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wysija_subscribers&action=lists' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Lists', 'toolbar-extras' )
				)
			)
		);

			/**
			 * Add each individual List as an item. Database query is necessary.
			 * @since 1.4.0
			 */
			//$lists = WYSIJA_model_list::getLists();
			$model_lists = WYSIJA::get( 'list', 'model' );
			$lists = $model_lists->getRows( array( 'list_id', 'name' ) );

			/** Proceed only if there are any lists */
			if ( ! empty( $lists ) ) {

				foreach ( $lists as $list ) {

					$list_title = esc_attr( $list[ 'name' ] );
					$list_id    = (int) $list[ 'list_id' ];

					/** Add item per list */
					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'mailpoetlegacy-list-' . $list_id,
							'parent' => 'mailpoetlegacy-lists-overview',
							'title'  => $list_title,
							'href'   => esc_url( admin_url( 'admin.php?page=wysija_subscribers&id=' . $list_id . '&action=editlist' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Edit List', 'toolbar-extras' ) . ': ' . $list_title
							)
						)
					);

				}  // end foreach

			}  // end if

		/** Newsletters (general) */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-mailpoetlegacy-all-newsletters',
				'parent' => 'forms-mailpoetlegacy',
				'title'  => esc_attr__( 'All Newsletters', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wysija_campaigns&link_filter=all' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Newsletters', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailpoetlegacy-standard-newsletters',
					'parent' => 'forms-mailpoetlegacy-all-newsletters',
					'title'  => esc_attr__( 'Standard Newsletters', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wysija_campaigns&link_filter=type-regular' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Standard Newsletters', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailpoetlegacy-auto-newsletters',
					'parent' => 'forms-mailpoetlegacy-all-newsletters',
					'title'  => esc_attr__( 'Auto Newsletters', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wysija_campaigns&link_filter=type-autonl' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Auto Newsletters', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailpoetlegacy-drafts',
					'parent' => 'forms-mailpoetlegacy-all-newsletters',
					'title'  => esc_attr__( 'Drafts', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wysija_campaigns&link_filter=status-draft' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Drafts', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailpoetlegacy-new-newsletter',
					'parent' => 'forms-mailpoetlegacy-all-newsletters',
					'title'  => esc_attr__( 'New Newsletter', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wysija_campaigns&action=add' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Newsletter', 'toolbar-extras' )
					)
				)
			);

		/** Forms (general) */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-mailpoetlegacy-all-forms',
				'parent' => 'forms-mailpoetlegacy',
				'title'  => esc_attr__( 'All Forms', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wysija_config#tab-forms' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Forms', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailpoetlegacy-forms',
					'parent' => 'forms-mailpoetlegacy-all-forms',
					'title'  => esc_attr__( 'Forms', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wysija_config#tab-forms' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Forms', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailpoetlegacy-new-form',
					'parent' => 'forms-mailpoetlegacy-all-forms',
					'title'  => esc_attr__( 'New Form', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wysija_config&action=form_add&_wpnonce=' . wp_create_nonce( 'wysija_config-action_form_add' ) ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Form', 'toolbar-extras' )
					)
				)
			);

		/** Subscribers (general) */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-mailpoetlegacy-all-subsribers',
				'parent' => 'forms-mailpoetlegacy',
				'title'  => esc_attr__( 'All Subscribers', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wysija_subscribers' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Subscribers', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailpoetlegacy-subsribers',
					'parent' => 'forms-mailpoetlegacy-all-subsribers',
					'title'  => esc_attr__( 'Subscribers', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wysija_subscribers&link_filter=subscribed' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Subscribers', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailpoetlegacy-new-subsriber',
					'parent' => 'forms-mailpoetlegacy-all-subsribers',
					'title'  => esc_attr__( 'New Subscriber', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wysija_subscribers&action=add' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Subscriber', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailpoetlegacy-import-subscribers',
					'parent' => 'forms-mailpoetlegacy-all-subsribers',
					'title'  => esc_attr__( 'Import', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wysija_subscribers&action=import' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Import', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailpoetlegacy-export-subscribers',
					'parent' => 'forms-mailpoetlegacy-all-subsribers',
					'title'  => esc_attr__( 'Export', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wysija_subscribers&action=export' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Export', 'toolbar-extras' )
					)
				)
			);

		/** Lists (general) */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-mailpoetlegacy-all-lists',
				'parent' => 'forms-mailpoetlegacy',
				'title'  => esc_attr__( 'All Lists', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wysija_subscribers&action=lists' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Lists', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailpoetlegacy-lists',
					'parent' => 'forms-mailpoetlegacy-all-lists',
					'title'  => esc_attr__( 'Lists', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wysija_subscribers&action=lists' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Lists', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailpoetlegacy-new-list',
					'parent' => 'forms-mailpoetlegacy-all-lists',
					'title'  => esc_attr__( 'New List', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wysija_subscribers&action=addlist' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New List', 'toolbar-extras' )
					)
				)
			);

		/** Settings */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-mailpoetlegacy-settings',
				'parent' => 'forms-mailpoetlegacy',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wysija_config' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailpoetlegacy-settings-basics',
					'parent' => 'forms-mailpoetlegacy-settings',
					'title'  => esc_attr__( 'Basics', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wysija_config#basics' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Basics', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailpoetlegacy-settings-signup',
					'parent' => 'forms-mailpoetlegacy-settings',
					'title'  => esc_attr__( 'Sign-up Confirmation', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wysija_config#tab-signupconfirmation' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Sign-up Confirmation', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailpoetlegacy-settings-send-with',
					'parent' => 'forms-mailpoetlegacy-settings',
					'title'  => esc_attr__( 'Send with ...', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wysija_config#tab-sendingmethod' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Send with ...', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailpoetlegacy-settings-advanced',
					'parent' => 'forms-mailpoetlegacy-settings',
					'title'  => esc_attr__( 'Advanced', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wysija_config#tab-advanced' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Advanced', 'toolbar-extras' )
					)
				)
			);

		/** Optionally, let other MailPoet Add-Ons hook in */
		do_action( 'tbex_after_mailpoetlegacy_settings' );

		/** Group: Resources for Quform */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-mailpoetlegacy-resources',
					'parent' => 'forms-mailpoetlegacy',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'mailpoetlegacy-support',
				'group-mailpoetlegacy-resources',
				'https://wordpress.org/support/plugin/wysija-newsletters'
			);

			ddw_tbex_resource_item(
				'documentation',
				'mailpoetlegacy-knowledge-base',
				'group-mailpoetlegacy-resources',
				'https://docs.mailpoet.com/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'mailpoetlegacy-translate',
				'group-mailpoetlegacy-resources',
				'https://translate.wordpress.org/projects/wp-plugins/wysija-newsletters'
			);

			ddw_tbex_resource_item(
				'official-site',
				'mailpoetlegacy-site',
				'group-mailpoetlegacy-resources',
				'https://mailpoet.com/'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_new_content_mailpoet_legacy', 80 );
/**
 * Items for "New Content" section: New MailPoet 2 content
 *
 * @since 1.4.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_new_content_mailpoet_legacy() {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() || is_network_admin() ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-mailpoetlegacy-dynamic',
			'parent' => 'new-content',
			'title'  => esc_attr__( 'MailPoet Campaign', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=wysija_campaigns&action=add' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Add New MailPoet Campaign Data', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mailpoetlegacy-new-newsletter',
				'parent' => 'tbex-mailpoetlegacy-dynamic',
				'title'  => esc_attr__( 'Newsletter', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wysija_campaigns&action=add' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Add New MailPoet Newsletter', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mailpoetlegacy-new-form',
				'parent' => 'tbex-mailpoetlegacy-dynamic',
				'title'  => esc_attr__( 'Form', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wysija_config&action=form_add&_wpnonce=' . wp_create_nonce( 'wysija_config-action_form_add' ) ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Add New MailPoet Form', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mailpoetlegacy-new-list',
				'parent' => 'tbex-mailpoetlegacy-dynamic',
				'title'  => esc_attr__( 'List', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wysija_subscribers&action=addlist' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Add New MailPoet List (Segment)', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mailpoetlegacy-new-subsriber',
				'parent' => 'tbex-mailpoetlegacy-dynamic',
				'title'  => esc_attr__( 'Subscriber', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wysija_subscribers&action=add' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Add New Subscriber in MailPoet', 'toolbar-extras' )
				)
			)
		);

}  // end function
