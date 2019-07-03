<?php

// includes/plugins-forms/items-forminator

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_forminator' );
/**
 * Items for Plugin: Forminator (Pro) (free/Premium, by WPMU DEV)
 *
 * @since 1.4.0
 * @since 1.4.4 Added settings sub items.
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_forminator( $admin_bar ) {

	/** For: Forms */
	$admin_bar->add_node(
		array(
			'id'     => 'forms-forminator',
			'parent' => 'tbex-sitegroup-forms',
			'title'  => esc_attr__( 'Forminator', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=forminator' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Forminator', 'toolbar-extras' )
			)
		)
	);

		/**
		 * Add each individual form as an item.
		 * @since 1.4.0
		 */
		$forms = Forminator_API::get_forms( null, 1, 100 );

		/** Proceed only if there are any forms */
		if ( is_array( $forms )	) {

			/** Add group */
			$admin_bar->add_group(
				array(
					'id'     => 'group-forminator-edit-forms',
					'parent' => 'forms-forminator'
				)
			);

			foreach ( $forms as $form ) {

				$form_id    = $form->id;
				$form_title = $form->name;

				if ( isset( $form->settings[ 'formName' ] ) && ! empty( $form->settings[ 'formName' ] ) ) {
					$form_title = $form->settings[ 'formName' ];
				}

				/** Add item per form */
				$admin_bar->add_node(
					array(
						'id'     => 'forms-forminator-form-' . $form_id,
						'parent' => 'group-forminator-edit-forms',
						'title'  => $form_title,
						'href'   => esc_url( admin_url( 'admin.php?page=forminator-cform-wizard&id=' . $form_id ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Edit Form', 'toolbar-extras' ) . ': ' . $form_title
						)
					)
				);

					$admin_bar->add_node(
						array(
							'id'     => 'forms-forminator-form-' . $form_id . '-builder',
							'parent' => 'forms-forminator-form-' . $form_id,
							'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=forminator-cform-wizard&id=' . $form_id ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' )
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'forms-forminator-form-' . $form_id . '-entries',
							'parent' => 'forms-forminator-form-' . $form_id,
							'title'  => esc_attr__( 'Entries', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=forminator-cform-view&form_id=' . $form_id ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Entries', 'toolbar-extras' )
							)
						)
					);

			}  // end foreach

		}  // end if forms

		/**
		 * Add each individual poll as an item.
		 * @since 1.4.0
		 */
		$polls = Forminator_API::get_polls( null, 1, 100 );

		/** Proceed only if there are any polls */
		if ( is_array( $polls ) ) {

			/** Add group */
			$admin_bar->add_group(
				array(
					'id'     => 'group-forminator-edit-polls',
					'parent' => 'forms-forminator'
				)
			);

			foreach ( $polls as $poll ) {

				$poll_id    = $poll->id;
				$poll_title = $poll->name;
				
				if ( isset( $poll->settings[ 'formName' ] ) && ! empty( $poll->settings[ 'formName' ] ) ) {
					$poll_title = $poll->settings[ 'formName' ];
				}

				/** Add item per poll */
				$admin_bar->add_node(
					array(
						'id'     => 'forms-forminator-poll-' . $poll_id,
						'parent' => 'group-forminator-edit-polls',
						'title'  => $poll_title,
						'href'   => esc_url( admin_url( 'admin.php?page=forminator-poll-wizard&id=' . $poll_id ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Edit Poll', 'toolbar-extras' ) . ': ' . $poll_title
						)
					)
				);

					$admin_bar->add_node(
						array(
							'id'     => 'forms-forminator-poll-' . $poll_id . '-builder',
							'parent' => 'forms-forminator-poll-' . $poll_id,
							'title'  => esc_attr__( 'Poll Builder', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=forminator-poll-wizard&id=' . $poll_id ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Poll Builder', 'toolbar-extras' )
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'forms-forminator-poll-' . $poll_id . '-entries',
							'parent' => 'forms-forminator-poll-' . $poll_id,
							'title'  => esc_attr__( 'Entries', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=forminator-poll-view&form_id=' . $poll_id ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Entries', 'toolbar-extras' )
							)
						)
					);

			}  // end foreach

		}  // end if polls

		/**
		 * Add each individual quiz as an item.
		 * @since 1.4.0
		 */
		$quizzes = Forminator_API::get_quizzes( null, 1, 100 );

		/** Proceed only if there are any quizzes */
		if ( is_array( $quizzes ) ) {

			/** Add group */
			$admin_bar->add_group(
				array(
					'id'     => 'group-forminator-edit-quizzes',
					'parent' => 'forms-forminator'
				)
			);

			foreach ( $quizzes as $quiz ) {

				$quiz_id    = $quiz->id;
				$quiz_type  = $quiz->quiz_type;
				$quiz_title = $quiz->name;

				if ( isset( $quiz->settings[ 'formName' ] ) && ! empty( $quiz->settings[ 'formName' ] ) ) {
					$quiz_title = $quiz->settings[ 'formName' ];
				}

				/** Add item per quiz */
				$admin_bar->add_node(
					array(
						'id'     => 'forms-forminator-quiz-' . $quiz_id,
						'parent' => 'group-forminator-edit-quizzes',
						'title'  => $quiz_title,
						'href'   => esc_url( admin_url( 'admin.php?page=forminator-' . $quiz_type . '-wizard&id=' . $quiz_id ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Edit Quiz', 'toolbar-extras' ) . ': ' . $quiz_title
						)
					)
				);

					$admin_bar->add_node(
						array(
							'id'     => 'forms-forminator-quiz-' . $quiz_id . '-builder',
							'parent' => 'forms-forminator-quiz-' . $quiz_id,
							'title'  => esc_attr__( 'Quiz Builder', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=forminator-' . $quiz_type . '-wizard&id=' . $quiz_id ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Quiz Builder', 'toolbar-extras' )
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'forms-forminator-quiz-' . $quiz_id . '-entries',
							'parent' => 'forms-forminator-quiz-' . $quiz_id,
							'title'  => esc_attr__( 'Entries', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=forminator-quiz-view&form_id=' . $quiz_id ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Entries', 'toolbar-extras' )
							)
						)
					);

			}  // end foreach

		}  // end if quizzes

		/** Dashboard */
		$admin_bar->add_node(
			array(
				'id'     => 'forms-forminator-dashboard',
				'parent' => 'forms-forminator',
				'title'  => esc_attr__( 'Dashboard', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=forminator' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Dashboard', 'toolbar-extras' )
				)
			)
		);

		/** Type: Forms */
		$admin_bar->add_node(
			array(
				'id'     => 'forms-forminator-forms',
				'parent' => 'forms-forminator',
				'title'  => esc_attr__( 'Type: Forms', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=forminator-cform' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Type: Forms', 'toolbar-extras' )
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-forminator-forms-all',
					'parent' => 'forms-forminator-forms',
					'title'  => esc_attr__( 'All Forms', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=forminator-cform' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Forms', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-forminator-forms-new',
					'parent' => 'forms-forminator-forms',
					'title'  => esc_attr__( 'New Form', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=forminator-cform-wizard' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Form', 'toolbar-extras' )
					)
				)
			);

		/** Type: Polls */
		$admin_bar->add_node(
			array(
				'id'     => 'forms-forminator-polls',
				'parent' => 'forms-forminator',
				'title'  => esc_attr__( 'Type: Polls', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=forminator-poll' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Type: Polls', 'toolbar-extras' )
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-forminator-polls-all',
					'parent' => 'forms-forminator-polls',
					'title'  => esc_attr__( 'All Polls', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=forminator-poll' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Polls', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-forminator-polls-new',
					'parent' => 'forms-forminator-polls',
					'title'  => esc_attr__( 'New Poll', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=forminator-poll-wizard' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Poll', 'toolbar-extras' )
					)
				)
			);

		/** Type: Quizzes */
		$admin_bar->add_node(
			array(
				'id'     => 'forms-forminator-quizzes',
				'parent' => 'forms-forminator',
				'title'  => esc_attr__( 'Type: Quizzes', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=forminator-quiz' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Type: Quizzes', 'toolbar-extras' )
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-forminator-quizzes-all',
					'parent' => 'forms-forminator-quizzes',
					'title'  => esc_attr__( 'All Quizzes', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=forminator-quiz' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Quizzes', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-forminator-quizzes-new-nowrong',
					'parent' => 'forms-forminator-quizzes',
					'title'  => esc_attr__( 'New Quiz: No Wrong Answer', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=forminator-nowrong-wizard' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Quiz: No Wrong Answer', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-forminator-quizzes-new-knowledge',
					'parent' => 'forms-forminator-quizzes',
					'title'  => esc_attr__( 'New Quiz: Knowledge', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=forminator-knowledge-wizard' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Quiz: Knowledge', 'toolbar-extras' )
					)
				)
			);

		/** All Submissions (Entries) */
		$admin_bar->add_node(
			array(
				'id'     => 'forms-forminator-all-entries',
				'parent' => 'forms-forminator',
				'title'  => esc_attr__( 'All Entries', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=forminator-entries' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Entries', 'toolbar-extras' )
				)
			)
		);

		/** Integrations */
		$admin_bar->add_node(
			array(
				'id'     => 'forms-forminator-integrations',
				'parent' => 'forms-forminator',
				'title'  => esc_attr__( 'Integrations', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=forminator-integrations' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Integrations', 'toolbar-extras' )
				)
			)
		);

		/** Settings */
		$admin_bar->add_node(
			array(
				'id'     => 'forms-forminator-settings',
				'parent' => 'forms-forminator',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=forminator-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-forminator-settings-dashboard',
					'parent' => 'forms-forminator-settings',
					'title'  => esc_attr__( 'Dashboard', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=forminator-settings&section=dashboard' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Dashboard', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-forminator-settings-emails',
					'parent' => 'forms-forminator-settings',
					'title'  => esc_attr__( 'Emails', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=forminator-settings&section=emails' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Emails', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-forminator-settings-google-recaptcha',
					'parent' => 'forms-forminator-settings',
					'title'  => esc_attr__( 'Google reCAPTCHA', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=forminator-settings&section=recaptcha' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Google reCAPTCHA', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-forminator-settings-data',
					'parent' => 'forms-forminator-settings',
					'title'  => esc_attr__( 'Data', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=forminator-settings&section=data' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Data', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-forminator-settings-submissions',
					'parent' => 'forms-forminator-settings',
					'title'  => esc_attr__( 'Submissions', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=forminator-settings&section=submissions' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Submissions', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-forminator-settings-payments',
					'parent' => 'forms-forminator-settings',
					'title'  => esc_attr__( 'Payments', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=forminator-settings&section=payments' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Payments', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-forminator-settings-accessibility',
					'parent' => 'forms-forminator-settings',
					'title'  => esc_attr__( 'Accessibility', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=forminator-settings&section=accessibility' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Accessibility', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-forminator-settings-pagination',
					'parent' => 'forms-forminator-settings',
					'title'  => esc_attr__( 'Pagination', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=forminator-settings&section=pagination' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Pagination', 'toolbar-extras' )
					)
				)
			);

		/** Optionally, let other WPForms Add-Ons hook in */
		do_action( 'tbex_after_forminator_settings' );

		/** Group: Resources for WPForms */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-forminator-resources',
					'parent' => 'forms-forminator',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);
			
			ddw_tbex_resource_item(
				'support-forum',
				'forminator-support',
				'group-forminator-resources',
				'https://wordpress.org/support/plugin/forminator'
			);

			ddw_tbex_resource_item(
				'documentation',
				'forminator-docs',
				'group-forminator-resources',
				'https://premium.wpmudev.org/docs/wpmu-dev-plugins/forminator/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'forminator-translate',
				'group-forminator-resources',
				'https://translate.wordpress.org/projects/wp-plugins/forminator'
			);

			ddw_tbex_resource_item(
				'official-site',
				'forminator-site',
				'group-forminator-resources',
				'https://premium.wpmudev.org/project/forminator-pro/'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_new_content_forminator', 80 );
/**
 * Items for "New Content" section: New Forminator Form types
 *
 * @since 1.4.0
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_new_content_forminator( $admin_bar ) {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() || is_network_admin() ) {
		return;
	}

	$admin_bar->add_node(
		array(
			'id'     => 'tbex-forminator-forms',
			'parent' => 'new-content',
			'title'  => ddw_tbex_string_new_form( 'Forminator' ),
			'href'   => esc_url( admin_url( 'admin.php?page=forminator-cform-wizard' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_add_new_item( ddw_tbex_string_new_form( 'Forminator' ) )
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'forminator-new-form',
				'parent' => 'tbex-forminator-forms',
				'title'  => esc_attr__( 'Contact Form', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=forminator-cform-wizard' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Contact Form', 'toolbar-extras' )
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'forminator-new-poll',
				'parent' => 'tbex-forminator-forms',
				'title'  => esc_attr__( 'Poll', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=forminator-poll-wizard' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Poll', 'toolbar-extras' )
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'forminator-new-quiz-nowrong',
				'parent' => 'tbex-forminator-forms',
				'title'  => esc_attr__( 'Quiz: No Wrong Answer', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=forminator-nowrong-wizard' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Quiz: No Wrong Answer', 'toolbar-extras' )
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'forminator-new-quiz-knowledge',
				'parent' => 'tbex-forminator-forms',
				'title'  => esc_attr__( 'Quiz: Knowledge', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=forminator-knowledge-wizard' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Quiz: Knowledge', 'toolbar-extras' )
				)
			)
		);

}  // end function
