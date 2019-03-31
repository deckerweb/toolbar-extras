<?php

// includes/plugins-forms/items-mailster

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_mailster' );
/**
 * Items for Plugin: Mailster (Premium, by EverPress)
 *
 * @since 1.4.0
 *
 * @uses mailster()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_mailster() {

	/** For: Forms hook place */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'forms-mailster',
			'parent' => 'tbex-sitegroup-forms',
			'title'  => esc_attr__( 'Mailster', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=mailster-newsletters' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Mailster', 'toolbar-extras' )
			)
		)
	);

		/** Set post type arguments for WP_Query */
		$mailster_posttype_args = array(
			'post_type'      => 'newsletter',
			'posts_per_page' => -1,
			'post_status'    => array( 'paused', 'active', 'queued', 'finished', 'autoresponder' ),
		);

		/** Mailster dynamics - add group */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-mailster-dynamic',
				'parent' => 'forms-mailster'
			)
		);

		/** Newsletters (Emails/ Campaigns) */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mailster-campaigns-overview',
				'parent' => 'group-mailster-dynamic',
				'title'  => esc_attr__( 'Campaigns', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mailster-newsletters' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Campaigns', 'toolbar-extras' )
				)
			)
		);

			/**
			 * Add each individual Campaign as an item. Database query is necessary.
			 * @since 1.4.0
			 */
			$campaigns = get_posts( $mailster_posttype_args );

			/** Proceed only if there are any Campaigns */
			if ( $campaigns ) {

				foreach ( $campaigns as $campaign ) {

					/** Skip Autoresponder campaigns */
					if ( 'autoresponder' === $campaign->post_status ) {
						continue;
					}

					$campaign_title = esc_attr( $campaign->post_title );
					$campaign_id    = (int) $campaign->ID;

					/** Add item per Campaign */
					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'mailster-campaign-' . $campaign_id,
							'parent' => 'mailster-campaigns-overview',
							'title'  => $campaign_title,
							'href'   => esc_url( admin_url( 'post.php?post=' . $campaign_id . '&action=edit' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Edit Campaign', 'toolbar-extras' ) . ': ' . $campaign_title
							)
						)
					);

						$GLOBALS[ 'wp_admin_bar' ]->add_node(
							array(
								'id'     => 'mailster-campaign-' . $campaign_id . '-edit',
								'parent' => 'mailster-campaign-' . $campaign_id,
								'title'  => esc_attr__( 'Edit', 'toolbar-extras' ),
								'href'   => esc_url( admin_url( 'post.php?post=' . $campaign_id . '&action=edit' ) ),
								'meta'   => array(
									'target' => '',
									'title'  => esc_attr__( 'Edit Campaign', 'toolbar-extras' ) . ': ' . $campaign_title
								)
							)
						);

						$preview_url = get_permalink( $campaign_id );

						$GLOBALS[ 'wp_admin_bar' ]->add_node(
							array(
								'id'     => 'mailster-campaign-' . $campaign_id . '-preview',
								'parent' => 'mailster-campaign-' . $campaign_id,
								'title'  => esc_attr__( 'Preview', 'toolbar-extras' ),
								'href'   => esc_url( get_permalink( $campaign_id ) ),
								'meta'   => array(
									'target' => ddw_tbex_meta_target(),
									'title'  => esc_attr__( 'Preview Campaign', 'toolbar-extras' ) . ': ' . $campaign_title
								)
							)
						);

				}  // end foreach

			}  // end if

		/** Autoresponder */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mailster-autoresponders-overview',
				'parent' => 'group-mailster-dynamic',
				'title'  => esc_attr__( 'Autoresponder', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_status=autoresponder&post_type=newsletter' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Autoresponder', 'toolbar-extras' )
				)
			)
		);

			/**
			 * Proceed only if there are any Autoresponders.
			 *   Note: Since Autoresponders are Campaigns with a different
			 *         post_status we use the same query result from above
			 *         (Campaigns).
			 */
			if ( $campaigns ) {

				foreach ( $campaigns as $campaign ) {

					/** Skip all but Autoresponder campaigns */
					if ( 'autoresponder' !== $campaign->post_status ) {
						continue;
					}

					$autoresponder_title = esc_attr( $campaign->post_title );
					$autoresponder_id    = (int) $campaign->ID;

					/** Add item per Autoresponder */
					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'mailster-autoresponder-' . $autoresponder_id,
							'parent' => 'mailster-autoresponders-overview',
							'title'  => $autoresponder_title,
							'href'   => esc_url( admin_url( 'post.php?post=' . $autoresponder_id . '&action=edit' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Edit Autoresponder', 'toolbar-extras' ) . ': ' . $autoresponder_title
							)
						)
					);

						$GLOBALS[ 'wp_admin_bar' ]->add_node(
							array(
								'id'     => 'mailster-autoresponder-' . $autoresponder_id . '-edit',
								'parent' => 'mailster-autoresponder-' . $autoresponder_id,
								'title'  => esc_attr__( 'Edit', 'toolbar-extras' ),
								'href'   => esc_url( admin_url( 'post.php?post=' . $autoresponder_id . '&action=edit' ) ),
								'meta'   => array(
									'target' => '',
									'title'  => esc_attr__( 'Edit Autoresponder', 'toolbar-extras' ) . ': ' . $autoresponder_title
								)
							)
						);

						$GLOBALS[ 'wp_admin_bar' ]->add_node(
							array(
								'id'     => 'mailster-autoresponder-' . $autoresponder_id . '-preview',
								'parent' => 'mailster-autoresponder-' . $autoresponder_id,
								'title'  => esc_attr__( 'Preview', 'toolbar-extras' ),
								'href'   => esc_url( get_permalink( $autoresponder_id ) ),
								'meta'   => array(
									'target' => ddw_tbex_meta_target(),
									'title'  => esc_attr__( 'Preview Autoresponder', 'toolbar-extras' ) . ': ' . $autoresponder_title
								)
							)
						);

				}  // end foreach

			}  // end if

		/** Forms */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mailster-forms-overview',
				'parent' => 'group-mailster-dynamic',
				'title'  => esc_attr__( 'Forms', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=newsletter&page=mailster_forms' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Forms', 'toolbar-extras' )
				)
			)
		);

			/**
			 * Add each individual Form as an item. Database query is necessary.
			 * @since 1.4.0
			 */
			$forms = mailster( 'forms' )->get();

			/** Proceed only if there are any Forms */
			if ( $forms ) {

				foreach ( $forms as $form ) {

					$form_title = $form->name;
					$form_id    = (int) $form->ID;

					/** Add item per Form */
					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'mailster-form-' . $form_id,
							'parent' => 'mailster-forms-overview',
							'title'  => $form_title,
							'href'   => esc_url( admin_url( 'edit.php?post_type=newsletter&page=mailster_forms&ID=' . $form_id ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Edit Form', 'toolbar-extras' ) . ': ' . $form_title
							)
						)
					);

						$GLOBALS[ 'wp_admin_bar' ]->add_node(
							array(
								'id'     => 'mailster-form-' . $form_id . '-fields',
								'parent' => 'mailster-form-' . $form_id,
								'title'  => esc_attr__( 'Form Fields', 'toolbar-extras' ),
								'href'   => esc_url( admin_url( 'edit.php?post_type=newsletter&page=mailster_forms&ID=' . $form_id . '&tab=structure' ) ),
								'meta'   => array(
									'target' => '',
									'title'  => esc_attr__( 'Form Fields', 'toolbar-extras' ) . ': ' . $form_title
								)
							)
						);

						$GLOBALS[ 'wp_admin_bar' ]->add_node(
							array(
								'id'     => 'mailster-form-' . $form_id . '-design',
								'parent' => 'mailster-form-' . $form_id,
								'title'  => esc_attr__( 'Design', 'toolbar-extras' ),
								'href'   => esc_url( admin_url( 'edit.php?post_type=newsletter&page=mailster_forms&ID=' . $form_id . '&tab=design' ) ),
								'meta'   => array(
									'target' => '',
									'title'  => esc_attr__( 'Design', 'toolbar-extras' ) . ': ' . $form_title
								)
							)
						);

						$GLOBALS[ 'wp_admin_bar' ]->add_node(
							array(
								'id'     => 'mailster-form-' . $form_id . '-settings',
								'parent' => 'mailster-form-' . $form_id,
								'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
								'href'   => esc_url( admin_url( 'edit.php?post_type=newsletter&page=mailster_forms&ID=' . $form_id . '&tab=settings' ) ),
								'meta'   => array(
									'target' => '',
									'title'  => esc_attr__( 'Settings', 'toolbar-extras' ) . ': ' . $form_title
								)
							)
						);

				}  // end foreach

			}  // end if

		/** Lists */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mailster-lists-overview',
				'parent' => 'group-mailster-dynamic',
				'title'  => esc_attr__( 'Lists', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mailster-segments' ) ),
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
			$lists = mailster( 'lists' )->get();

			/** Proceed only if there are any Lists */
			if ( $lists ) {

				foreach ( $lists as $list ) {

					$list_title = $list->name;
					$list_id    = (int) $list->ID;

					/** Add item per List */
					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'mailster-list-' . $list_id,
							'parent' => 'mailster-lists-overview',
							'title'  => $list_title,
							'href'   => esc_url( admin_url( 'edit.php?post_type=newsletter&page=mailster_lists&ID=' . $list_id ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Edit List', 'toolbar-extras' ) . ': ' . $list_title
							)
						)
					);

				}  // end foreach

			}  // end if

		/** Campaigns (general) */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-mailster-all-newsletters',
				'parent' => 'forms-mailster',
				'title'  => esc_attr__( 'All Campaigns', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=newsletter' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Campaigns', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailster-standard-newsletters',
					'parent' => 'forms-mailster-all-newsletters',
					'title'  => esc_attr__( 'Newsletters', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=newsletter' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Newsletters', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailster-new-newsletter',
					'parent' => 'forms-mailster-all-newsletters',
					'title'  => esc_attr__( 'New Newsletter', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=newsletter' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Newsletter', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailster-autoresponders',
					'parent' => 'forms-mailster-all-newsletters',
					'title'  => esc_attr__( 'Autoresponders', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_status=autoresponder&post_type=newsletter' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Autoresponders', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailster-new-autoresponder',
					'parent' => 'forms-mailster-all-newsletters',
					'title'  => esc_attr__( 'New Autoresponder', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=newsletter&post_status=autoresponder' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Autoresponder', 'toolbar-extras' )
					)
				)
			);

		/** Forms (general) */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-mailster-all-forms',
				'parent' => 'forms-mailster',
				'title'  => esc_attr__( 'All Forms', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=newsletter&page=mailster_forms' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Forms', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailster-forms-list',
					'parent' => 'forms-mailster-all-forms',
					'title'  => esc_attr__( 'Forms', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=newsletter&page=mailster_forms' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Forms', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailster-new-form',
					'parent' => 'forms-mailster-all-forms',
					'title'  => esc_attr__( 'New Form', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=newsletter&page=mailster_forms&new' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Form', 'toolbar-extras' )
					)
				)
			);

		/** Subscribers (general) */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-mailster-all-subsribers',
				'parent' => 'forms-mailster',
				'title'  => esc_attr__( 'All Subscribers', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=newsletter&page=mailster_subscribers' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Subscribers', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailster-subsribers',
					'parent' => 'forms-mailster-all-subsribers',
					'title'  => esc_attr__( 'Subscribers', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=newsletter&page=mailster_subscribers&status=1' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Subscribers', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailster-new-subsriber',
					'parent' => 'forms-mailster-all-subsribers',
					'title'  => esc_attr__( 'New Subscriber', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=newsletter&page=mailster_subscribers&new' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Subscriber', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailster-import-subscribers',
					'parent' => 'forms-mailster-all-subsribers',
					'title'  => esc_attr__( 'Import', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=newsletter&page=mailster_manage_subscribers&tab=import' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Import', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailster-export-subscribers',
					'parent' => 'forms-mailster-all-subsribers',
					'title'  => esc_attr__( 'Export', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=newsletter&page=mailster_manage_subscribers&tab=export' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Export', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailster-delete-subscribers',
					'parent' => 'forms-mailster-all-subsribers',
					'title'  => esc_attr__( 'Delete', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=newsletter&page=mailster_manage_subscribers&tab=delete' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Delete', 'toolbar-extras' )
					)
				)
			);

		/** Lists (general) */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-mailster-all-lists',
				'parent' => 'forms-mailster',
				'title'  => esc_attr__( 'All Lists', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=newsletter&page=mailster_lists' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Lists', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailster-lists',
					'parent' => 'forms-mailster-all-lists',
					'title'  => esc_attr__( 'Lists', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=newsletter&page=mailster_lists' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Lists', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailster-new-list',
					'parent' => 'forms-mailster-all-lists',
					'title'  => esc_attr__( 'New List', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=newsletter&page=mailster_lists&new' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New List', 'toolbar-extras' )
					)
				)
			);

		/** Templates */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-mailster-templates',
				'parent' => 'forms-mailster',
				'title'  => esc_attr__( 'Templates', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=newsletter&page=mailster_templates' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Templates', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailster-templates-installed',
					'parent' => 'forms-mailster-templates',
					'title'  => esc_attr__( 'Installed Templates', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=newsletter&page=mailster_templates' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Installed Templates', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailster-templates-packs',
					'parent' => 'forms-mailster-templates',
					'title'  => esc_attr__( 'Template Packs', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=newsletter&page=mailster_templates&more' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Template Packs', 'toolbar-extras' )
					)
				)
			);

		/** Settings */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-mailster-settings',
				'parent' => 'forms-mailster',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=newsletter&page=mailster_settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		/** Optionally, let other Mailster Add-Ons hook in */
		do_action( 'tbex_after_mailster_settings' );

		/** Group: Resources for Quform */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-mailster-resources',
					'parent' => 'forms-mailster',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-contact',
				'mailster-support-ticket',
				'group-mailster-resources',
				'https://mailster.co/login/'
			);

			ddw_tbex_resource_item(
				'knowledge-base',
				'mailster-knowledge-base',
				'group-mailster-resources',
				'https://kb.mailster.co/'
			);

			ddw_tbex_resource_item(
				'translations-pro',
				'mailster-translate',
				'group-mailster-resources',
				'https://translate.mailster.co/projects/'
			);

			ddw_tbex_resource_item(
				'official-site',
				'mailster-site',
				'group-mailster-resources',
				'https://mailster.co/'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_mailster_settings' );
/**
 * Add Mailster settings sub items as extra Toolbar nodes.
 *
 * @since 1.4.0
 *
 * @see ddw_tbex_site_items_mailster()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_mailster_settings() {

	$settings = apply_filters(
		'tbex_filter_nodes_mailster_settings',
		array(
			'general'         => __( 'General', 'toolbar-extras' ),
			'template'        => __( 'Template', 'toolbar-extras' ),
			'frontend'        => __( 'Frontend', 'toolbar-extras' ),
			'privacy'         => __( 'Privacy', 'toolbar-extras' ),
			'subscribers'     => __( 'Subscribers', 'toolbar-extras' ),
			'wordpress-users' => __( 'WordPress Users', 'toolbar-extras' ),
			'texts'           => __( 'Text Strings', 'toolbar-extras' ),
			'delivery'        => __( 'Delivery', 'toolbar-extras' ),
			'cron'            => __( 'Cron', 'toolbar-extras' ),
			'capabilities'    => __( 'Capabilities', 'toolbar-extras' ),
			'bounce'          => __( 'Bouncing', 'toolbar-extras' ),
			'authentication'  => __( 'Authentication', 'toolbar-extras' ),
			'advanced'        => __( 'Advanced', 'toolbar-extras' ),
			'system_info'     => __( 'System Info', 'toolbar-extras' ),
			'manage-settings' => __( 'Manage Settings', 'toolbar-extras' ),
		)
	);

	foreach ( $settings as $setting => $label ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-mailster-settings-' . $setting,
				'parent' => 'forms-mailster-settings',
				'title'  => esc_attr( $label ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=newsletter&page=mailster_settings#' . $setting ) ),
				'meta'   => array(
					'title'  => esc_attr__( 'Mailster Settings', 'toolbar-extras' ) . ': ' . esc_attr( $label )
				)
			)
		);

	}  // end foreach

}  // end function


/**
 * Setup array of unique (link) key and settings label for each active Mailster
 *   Add-On plugin.
 *
 * @since 1.4.0
 *
 * @return array Filterable array of active Mailster add-on keys & labels.
 */
function ddw_tbex_get_mailster_addons() {

	/** Set the array */
	$addons = array();

	/** Add all Add-Ons */
	if ( defined( 'MAILSTER_KICKBOXIO_VERSION' ) ) {
		$addons[ 'kickboxio' ] = __( 'Kickbox.io', 'toolbar-extras' );
	}

	if ( class_exists( 'MailsterRecaptcha' ) ) {
		$addons[ 'reCaptcha' ] = 'reCaptcha™';
	}

	if ( defined( 'MAILSTER_COOLCAPTCHA_VERSION' ) ) {
		$addons[ 'coolcaptcha' ] = __( 'Cool Captcha', 'toolbar-extras' );
	}

	if ( defined( 'MAILSTER_EMAILVERIFY_VERSION' ) ) {
		$addons[ 'emailverification' ] = __( 'Email Verification', 'toolbar-extras' );
	}

	if ( defined( 'MAILSTER_REPERMISSION_VERSION' ) ) {
		$addons[ 'repermission' ] = __( 'Re-Permission', 'toolbar-extras' );
	}

	if ( defined( 'MAILSTER_WOOCOMMERCE_VERSION' ) && ddw_tbex_is_woocommerce_active() ) {
		$addons[ 'woocommerce' ] = __( 'WooCommerce', 'toolbar-extras' );
	}

	if ( defined( 'MAILSTER_GA_VERSION' ) ) {
		$addons[ 'ga' ] = __( 'Google Analytics', 'toolbar-extras' );
	}

	if ( class_exists( 'MailsterPiwikAnalytics' ) ) {
		$addons[ 'piwik' ] = __( 'Matomo (Piwik)', 'toolbar-extras' );
	}

	/** Return the array, filterable */
	return apply_filters(
		'tbex_filter_nodes_mailster_settings',
		$addons
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_mailster_addon_settings', 200 );
/**
 * Add settings from all currently active Mailser Add-Ons as nodes to the
 *   Mailster Add-On settings hook place.
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_get_mailster_addons()
 */
function ddw_tbex_site_items_mailster_addon_settings() {

	$addons = ddw_tbex_get_mailster_addons();

	if ( ! empty( ddw_tbex_get_mailster_addons() ) ) {

		/** Loop through array to add each Add-On as node */
		foreach ( $addons as $addon => $label ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-mailster-addon-' . $addon,
					'parent' => 'forms-mailster-addon-settings',
					'title'  => esc_attr( $label ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=newsletter&page=mailster_settings#' . $addon ) ),
					'meta'   => array(
						'title'  => esc_attr__( 'Mailster Add-On Settings', 'toolbar-extras' ) . ': ' . esc_attr( $label )
					)
				)
			);

		}  // end foreach

	}  // end if

}  // end function


if ( ! is_null( ddw_tbex_get_mailster_addons() ) && ! empty( ddw_tbex_get_mailster_addons() ) ) {
	
	add_action( 'tbex_after_mailster_settings', 'ddw_tbex_site_items_mailster_addons_hook_place' );
	/**
	 * Optional hook place for Add-On settings from active Mailster Add-Ons.
	 *
	 * @since 1.4.0
	 *
	 * @see ddw_tbex_site_items_mailster_addon_settings()
	 * @see ddw_tbex_get_mailster_addons()
	 */
	function ddw_tbex_site_items_mailster_addons_hook_place() {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-mailster-addon-settings',
				'parent' => 'forms-mailster',
				'title'  => esc_attr__( 'Add-On Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=newsletter&page=mailster_addons' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Add-On Settings', 'toolbar-extras' )
				)
			)
		);

	}  // end function

}  // end if


add_filter( 'admin_bar_menu', 'ddw_tbex_site_items_new_content_mailster', 80 );
/**
 * Items for "New Content" section: New Mailster Newsletter content
 *   Note: Filter the existing Toolbar node to tweak the item title (attribute).
 *
 * @since 1.4.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 *
 * @param object $wp_admin_bar Holds all nodes of the Toolbar.
 */
function ddw_tbex_site_items_new_content_mailster( $wp_admin_bar ) {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() || is_network_admin() ) {
		return $wp_admin_bar;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'new-newsletter',	// same as original!
			'parent' => 'new-content',
			'title'  => esc_attr__( 'Mailster Campaign', 'toolbar-extras' ),
			'meta'   => array(
				'title'  => esc_attr__( 'Add New Mailster Campaign Data', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mailster-new-campaign',
				'parent' => 'new-newsletter',
				'title'  => esc_attr__( 'Newsletter', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=newsletter' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Add New Mailster Newsletter', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mailster-new-autoresponder',
				'parent' => 'new-newsletter',
				'title'  => esc_attr__( 'Autoresponder', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=newsletter&post_status=autoresponder' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Add New Mailster Autoresponder', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mailster-new-form',
				'parent' => 'new-newsletter',
				'title'  => esc_attr__( 'Form', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=newsletter&page=mailster_forms&new' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Add New Form in Mailster', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mailster-new-list',
				'parent' => 'new-newsletter',
				'title'  => esc_attr__( 'List', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=newsletter&page=mailster_lists&new' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Add New List in Mailster', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mailster-new-subscriber',
				'parent' => 'new-newsletter',
				'title'  => esc_attr__( 'Subscriber', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=newsletter&page=mailster_subscribers&new' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Add New Subscriber in Mailster', 'toolbar-extras' )
				)
			)
		);

}  // end function
