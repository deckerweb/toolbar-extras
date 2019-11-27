<?php

// includes/plugins-forms/items-weforms

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if "weForms Pro - Professional" Add-On plugin is active or not.
 *
 * @since 1.4.9
 *
 * @return bool TRUE if class exists, FALSE otherwise.
 */
function ddw_tbex_is_weforms_pro_active() {

	return class_exists( 'WeForms_Pro' );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_weforms' );
/**
 * Items for Plugin: weForms (free, by weDevs)
 *
 * @since 1.4.8
 * @since 1.4.9 Added support for Pro Add-On.
 *
 * @uses weforms()->form->all()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_weforms( $admin_bar ) {

	/** For: Forms */
	$admin_bar->add_node(
		array(
			'id'     => 'forms-weforms',
			'parent' => 'tbex-sitegroup-forms',
			'title'  => esc_attr__( 'weForms', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=weforms#/' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'weForms', 'toolbar-extras' ),
			)
		)
	);

		/**
		 * Add each individual form as an item. REST API query is necessary.
		 * @since 1.4.8
		 */
		$forms = weforms()->form->all();

		/** Proceed only if there are any forms */
		if ( $forms ) {

			/** Add group */
			$admin_bar->add_group(
				array(
					'id'     => 'group-weforms-edit-forms',
					'parent' => 'forms-weforms',
				)
			);

			foreach ( $forms[ 'forms' ] as $form ) {

				$form_title = esc_attr( $form->name );
				$form_id    = absint( $form->id );

				/** Add item per form */
				$admin_bar->add_node(
					array(
						'id'     => 'forms-weforms-form-' . $form_id,
						'parent' => 'group-weforms-edit-forms',
						'title'  => $form_title,
						'href'   => esc_url( admin_url( 'admin.php?page=weforms#/form/' . $form_id . '/edit' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Edit Form', 'toolbar-extras' ) . ': ' . $form_title,
						)
					)
				);

					$admin_bar->add_node(
						array(
							'id'     => 'forms-weforms-form-' . $form_id . '-builder',
							'parent' => 'forms-weforms-form-' . $form_id,
							'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=weforms#/form/' . $form_id . '/edit' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' ),
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'forms-weforms-form-' . $form_id . '-preview',
							'parent' => 'forms-weforms-form-' . $form_id,
							'title'  => esc_attr__( 'Preview', 'toolbar-extras' ),
							'href'   => esc_url( site_url( '/f?weforms_preview=1&form_id=' . $form_id ) ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target(),
								'title'  => esc_attr__( 'Preview', 'toolbar-extras' ),
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'forms-weforms-form-' . $form_id . '-entries',
							'parent' => 'forms-weforms-form-' . $form_id,
							'title'  => esc_attr__( 'Entries', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=weforms#/form/' . $form_id . '/entries' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Entries', 'toolbar-extras' ),
							)
						)
					);

					if ( ddw_tbex_is_weforms_pro_active() ) {

						$admin_bar->add_node(
							array(
								'id'     => 'forms-weforms-form-' . $form_id . '-reports',
								'parent' => 'forms-weforms-form-' . $form_id,
								'title'  => esc_attr__( 'Reports', 'toolbar-extras' ),
								'href'   => esc_url( admin_url( 'admin.php?page=weforms#/form/' . $form_id . '/report' ) ),
								'meta'   => array(
									'target' => '',
									'title'  => esc_attr__( 'Reports', 'toolbar-extras' ),
								)
							)
						);

					}  // end if

			}  // end foreach

		}  // end if

		/** General weForms items */
		$admin_bar->add_node(
			array(
				'id'     => 'forms-weforms-all-forms',
				'parent' => 'forms-weforms',
				'title'  => esc_attr__( 'All Forms', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=weforms#/' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Forms', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'forms-weforms-all-entries',
				'parent' => 'forms-weforms',
				'title'  => esc_attr__( 'All Entries', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=weforms#/entries' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Entries', 'toolbar-extras' ),
				)
			)
		);

		/** Pro: Transactions */
		if ( ddw_tbex_is_weforms_pro_active() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'forms-weforms-transactions',
					'parent' => 'forms-weforms',
					'title'  => esc_attr__( 'Transactions', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=weforms#/transactions' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Transactions', 'toolbar-extras' ),
					)
				)
			);	

		}  // end if

		/** Tools */
		$admin_bar->add_node(
			array(
				'id'     => 'forms-weforms-tools',
				'parent' => 'forms-weforms',
				'title'  => esc_attr__( 'Tools', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=weforms#/tools' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Tools - Export, Import, Logs', 'toolbar-extras' ),
				)
			)
		);

		/** Settings */
		$admin_bar->add_node(
			array(
				'id'     => 'forms-weforms-settings',
				'parent' => 'forms-weforms',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=weforms#/settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

			/** Pro: Modules & License */
			if ( ddw_tbex_is_weforms_pro_active() ) {

				$admin_bar->add_node(
					array(
						'id'     => 'forms-weforms-settings-general',
						'parent' => 'forms-weforms-settings',
						'title'  => esc_attr__( 'General Settings', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=weforms#/settings' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'General Settings', 'toolbar-extras' ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'forms-weforms-settings-modules',
						'parent' => 'forms-weforms-settings',
						'title'  => esc_attr__( 'Modules', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=weforms#/modules' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Modules', 'toolbar-extras' ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'forms-weforms-settings-license',
						'parent' => 'forms-weforms-settings',
						'title'  => esc_attr__( 'License', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=weforms#/license' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'License', 'toolbar-extras' ),
						)
					)
				);

			}  // end if

		/** Optionally, let other Form Maker Add-Ons hook in */
		do_action( 'tbex_after_weforms_options', $admin_bar );

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-weforms-resources',
					'parent' => 'forms-weforms',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'weforms-support',
				'group-weforms-resources',
				'https://wordpress.org/support/plugin/weforms'
			);

			ddw_tbex_resource_item(
				'documentation',
				'weforms-docs',
				'group-weforms-resources',
				'https://wedevs.com/docs/weforms/'
			);

			ddw_tbex_resource_item(
				'changelog',
				'weforms-changelogs',
				'group-weforms-resources',
				'https://wordpress.org/plugins/weforms/#developers',
				ddw_tbex_string_version_history( 'plugin' )
			);

			ddw_tbex_resource_item(
				'translations-community',
				'weforms-translate',
				'group-weforms-resources',
				'https://translate.wordpress.org/projects/wp-plugins/weforms'
			);

			ddw_tbex_resource_item(
				'github',
				'weforms-github',
				'group-weforms-resources',
				'https://github.com/weDevsOfficial/weforms'
			);

			ddw_tbex_resource_item(
				'official-site',
				'weforms-site',
				'group-weforms-resources',
				'https://wedevs.com/weforms'
			);

		}  // end if

}  // end function
