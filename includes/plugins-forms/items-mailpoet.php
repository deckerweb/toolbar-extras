<?php

// includes/plugins-forms/items-mailpoet

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_mailpoet' );
/**
 * Items for Plugin: MailPoet 3 (free, by MailPoet)
 *
 * @since 1.4.0
 *
 * @uses \MailPoet\Models\Newsletter::getPublished()
 * @uses \MailPoet\Models\Form::getPublished()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_mailpoet() {

	/** For: Forms hook place */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'forms-mailpoet',
			'parent' => 'tbex-sitegroup-forms',
			'title'  => esc_attr__( 'MailPoet', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=mailpoet-newsletters' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'MailPoet', 'toolbar-extras' )
			)
		)
	);

		/** MailPoet dynamics - add group */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-mailpoet-dynamic',
				'parent' => 'forms-mailpoet'
			)
		);

		/** Newsletters (Emails/ Campaigns) */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mailpoet-newsletters-overview',
				'parent' => 'group-mailpoet-dynamic',
				'title'  => esc_attr__( 'E-Mail Newsletters', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mailpoet-newsletters' ) ),
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
			$newsletters = \MailPoet\Models\Newsletter::getPublished()->findArray();

			/** Proceed only if there are any newsletter */
			if ( $newsletters ) {

				foreach ( $newsletters as $newsletter ) {

					$newsletter_title = esc_attr( $newsletter[ 'subject' ] );
					$newsletter_id    = (int) $newsletter[ 'id' ];

					/** Add item per newsletter */
					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'mailpoet-newsletter-' . $newsletter_id,
							'parent' => 'mailpoet-newsletters-overview',
							'title'  => $newsletter_title,
							'href'   => esc_url( admin_url( 'admin.php?page=mailpoet-newsletter-editor&id=' . $newsletter_id ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Edit Newsletter', 'toolbar-extras' ) . ': ' . $newsletter_title
							)
						)
					);

						$GLOBALS[ 'wp_admin_bar' ]->add_node(
							array(
								'id'     => 'mailpoet-newsletter-' . $newsletter_id . '-edit',
								'parent' => 'mailpoet-newsletter-' . $newsletter_id,
								'title'  => esc_attr__( 'Edit', 'toolbar-extras' ),
								'href'   => esc_url( admin_url( 'admin.php?page=mailpoet-newsletter-editor&id=' . $newsletter_id ) ),
								'meta'   => array(
									'target' => '',
									'title'  => esc_attr__( 'Edit Newsletter', 'toolbar-extras' ) . ': ' . $newsletter_title
								)
							)
						);

						$preview_url = \MailPoet\Newsletter\Url::getViewInBrowserUrl(
							\MailPoet\Newsletter\Url::TYPE_LISTING_EDITOR,
							\MailPoet\Models\Newsletter::findOne( $newsletter_id )
						);

						$GLOBALS[ 'wp_admin_bar' ]->add_node(
							array(
								'id'     => 'mailpoet-newsletter-' . $newsletter_id . '-preview',
								'parent' => 'mailpoet-newsletter-' . $newsletter_id,
								'title'  => esc_attr__( 'Preview', 'toolbar-extras' ),
								'href'   => esc_url( $preview_url ),
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
				'id'     => 'mailpoet-forms-overview',
				'parent' => 'group-mailpoet-dynamic',
				'title'  => esc_attr__( 'Forms', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mailpoet-forms' ) ),
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
			$forms = \MailPoet\Models\Form::getPublished()->orderByAsc( 'name' )->findArray();

			/** Proceed only if there are any forms */
			if ( $forms ) {

				foreach ( $forms as $form ) {

					$form_title = $form[ 'name' ];
					$form_id    = (int) $form[ 'id' ];

					/** Add item per form */
					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'mailpoet-form-' . $form_id,
							'parent' => 'mailpoet-forms-overview',
							'title'  => $form_title,
							'href'   => esc_url( admin_url( 'admin.php?page=mailpoet-form-editor&id=' . $form_id ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Edit Form', 'toolbar-extras' ) . ': ' . $form_title
							)
						)
					);

				}  // end foreach

			}  // end if

		/** Segments (Lists): Add group */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mailpoet-segments-overview',
				'parent' => 'group-mailpoet-dynamic',
				'title'  => esc_attr__( 'Segments', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mailpoet-segments' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Segments', 'toolbar-extras' )
				)
			)
		);

			/**
			 * Add each individual Segment as an item. Database query is necessary.
			 * @since 1.4.0
			 */
			$segments = \MailPoet\Models\Segment::getPublished()->findArray();

			/** Proceed only if there are any segments */
			if ( $segments ) {

				foreach ( $segments as $segment ) {

					$segment_title = $segment[ 'name' ];
					$segment_id    = (int) $segment[ 'id' ];

					/** Add item per segment */
					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'mailpoet-segment-' . $segment_id,
							'parent' => 'mailpoet-segments-overview',
							'title'  => $segment_title,
							'href'   => esc_url( admin_url( 'admin.php?page=mailpoet-segments#/edit/' . $segment_id ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Edit Segment', 'toolbar-extras' ) . ': ' . $segment_title
							)
						)
					);

				}  // end foreach

			}  // end if

		/** Newsletters (general) */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-mailpoet-all-newsletters',
				'parent' => 'forms-mailpoet',
				'title'  => esc_attr__( 'All Newsletters', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mailpoet-newsletters' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Newsletters', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailpoet-standard-newsletters',
					'parent' => 'forms-mailpoet-all-newsletters',
					'title'  => esc_attr__( 'Newsletters', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mailpoet-newsletters#/standard' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Newsletters', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailpoet-welcome-emails',
					'parent' => 'forms-mailpoet-all-newsletters',
					'title'  => esc_attr__( 'Welcome Emails', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mailpoet-newsletters#/welcome' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Welcome Emails', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailpoet-post-notifications',
					'parent' => 'forms-mailpoet-all-newsletters',
					'title'  => esc_attr__( 'Post Notifications', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mailpoet-newsletters#/notification' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Post Notifications', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailpoet-new-newsletter',
					'parent' => 'forms-mailpoet-all-newsletters',
					'title'  => esc_attr__( 'New Newsletter', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mailpoet-newsletters#/new' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Newsletter', 'toolbar-extras' )
					)
				)
			);

		/** Forms (general) */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-mailpoet-all-forms',
				'parent' => 'forms-mailpoet',
				'title'  => esc_attr__( 'All Forms', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mailpoet-forms' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Forms', 'toolbar-extras' )
				)
			)
		);

		/** Subscribers (general) */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-mailpoet-all-subsribers',
				'parent' => 'forms-mailpoet',
				'title'  => esc_attr__( 'All Subscribers', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mailpoet-subscribers#/page[1]/sort_by[created_at]/sort_order[desc]/group[all]' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Subscribers', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailpoet-subsribers',
					'parent' => 'forms-mailpoet-all-subsribers',
					'title'  => esc_attr__( 'Subscribers', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mailpoet-subscribers#/page[1]/sort_by[created_at]/sort_order[desc]/group[subscribed]' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Subscribers', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailpoet-new-subsriber',
					'parent' => 'forms-mailpoet-all-subsribers',
					'title'  => esc_attr__( 'New Subscriber', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mailpoet-subscribers#/new' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Subscriber', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailpoet-import-subscribers',
					'parent' => 'forms-mailpoet-all-subsribers',
					'title'  => esc_attr__( 'Import', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mailpoet-import#step1' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Import', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailpoet-export-subscribers',
					'parent' => 'forms-mailpoet-all-subsribers',
					'title'  => esc_attr__( 'Export', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mailpoet-export' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Export', 'toolbar-extras' )
					)
				)
			);

		/** Segments (general) */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-mailpoet-all-segments',
				'parent' => 'forms-mailpoet',
				'title'  => esc_attr__( 'All Segments', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mailpoet-segments#/' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Segments', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailpoet-segments',
					'parent' => 'forms-mailpoet-all-segments',
					'title'  => esc_attr__( 'Segments', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mailpoet-segments#/' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Segments', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailpoet-new-segment',
					'parent' => 'forms-mailpoet-all-segments',
					'title'  => esc_attr__( 'New Segment', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mailpoet-segments#/new' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Segment', 'toolbar-extras' )
					)
				)
			);

		/** Settings */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-mailpoet-settings',
				'parent' => 'forms-mailpoet',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mailpoet-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailpoet-settings-basics',
					'parent' => 'forms-mailpoet-settings',
					'title'  => esc_attr__( 'Basics', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mailpoet-settings#basics' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Basics', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailpoet-settings-signup',
					'parent' => 'forms-mailpoet-settings',
					'title'  => esc_attr__( 'Sign-up Confirmation', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mailpoet-settings#signup' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Sign-up Confirmation', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailpoet-settings-send-with',
					'parent' => 'forms-mailpoet-settings',
					'title'  => esc_attr__( 'Send with ...', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mailpoet-settings#mta' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Send with ...', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailpoet-settings-advanced',
					'parent' => 'forms-mailpoet-settings',
					'title'  => esc_attr__( 'Advanced', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mailpoet-settings#advanced' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Advanced', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailpoet-settings-license',
					'parent' => 'forms-mailpoet-settings',
					'title'  => esc_attr__( 'License', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mailpoet-settings#premium' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'License', 'toolbar-extras' )
					)
				)
			);

		/** Help */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-mailpoet-help',
				'parent' => 'forms-mailpoet',
				'title'  => esc_attr__( 'Help', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mailpoet-help' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Help', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailpoet-help-system-status',
					'parent' => 'forms-mailpoet-help',
					'title'  => esc_attr__( 'System Status', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mailpoet-help#/systemStatus' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'System Status', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailpoet-help-system-info',
					'parent' => 'forms-mailpoet-help',
					'title'  => esc_attr__( 'System Info', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mailpoet-help#/systemInfo' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'System Info', 'toolbar-extras' )
					)
				)
			);

		/** Optionally, let other MailPoet Add-Ons hook in */
		do_action( 'tbex_after_mailpoet_settings' );

		/** Group: Resources for Quform */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-mailpoet-resources',
					'parent' => 'forms-mailpoet',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'mailpoet-support',
				'group-mailpoet-resources',
				'https://wordpress.org/support/plugin/mailpoet'
			);

			ddw_tbex_resource_item(
				'knowledge-base',
				'mailpoet-knowledge-base',
				'group-mailpoet-resources',
				'https://kb.mailpoet.com/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'mailpoet-translate',
				'group-mailpoet-resources',
				'https://translate.wordpress.org/projects/wp-plugins/mailpoet'
			);

			ddw_tbex_resource_item(
				'github',
				'mailpoet-github',
				'group-mailpoet-resources',
				'https://github.com/mailpoet/mailpoet'
			);

			ddw_tbex_resource_item(
				'official-site',
				'mailpoet-site',
				'group-mailpoet-resources',
				'https://mailpoet.com/'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_new_content_mailpoet', 80 );
/**
 * Items for "New Content" section: New MailPoet 3 content
 *
 * @since 1.4.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_new_content_mailpoet() {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() || is_network_admin() ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-mailpoet-dynamic',
			'parent' => 'new-content',
			'title'  => esc_attr__( 'MailPoet Campaign', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=mailpoet-newsletters#/new' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Add New MailPoet Campaign Data', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mailpoet-new-newsletter',
				'parent' => 'tbex-mailpoet-dynamic',
				'title'  => esc_attr__( 'Newsletter', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mailpoet-newsletters#/new' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Add New MailPoet Newsletter', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mailpoet-new-segment',
				'parent' => 'tbex-mailpoet-dynamic',
				'title'  => esc_attr__( 'Segment', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mailpoet-segments#/new' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Add New MailPoet Segment (List)', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mailpoet-new-subsriber',
				'parent' => 'tbex-mailpoet-dynamic',
				'title'  => esc_attr__( 'Subscriber', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mailpoet-subscribers#/new' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Add New Subscriber in MailPoet', 'toolbar-extras' )
				)
			)
		);

}  // end function
