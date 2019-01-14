<?php

// includes/plugins-forms/items-form-maker

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_formmaker' );
/**
 * Items for Plugin: Form Maker (free, by WebDorado Form Builder Team)
 *
 * @since 1.4.0
 *
 * @uses WDW_FM_Library::get_forms()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_formmaker() {

	/** For: Forms */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'forms-formmaker',
			'parent' => 'tbex-sitegroup-forms',
			'title'  => esc_attr__( 'Form Maker', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=manage_fm' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Form Maker', 'toolbar-extras' )
			)
		)
	);

		/**
		 * Add each individual form as an item. Database query is necessary.
		 * @since 1.4.0
		 */
		$forms = WDW_FM_Library::get_forms();

		/** Proceed only if there are any forms */
		if ( $forms ) {

			/** Add group */
			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-formmaker-edit-forms',
					'parent' => 'forms-formmaker'
				)
			);

			foreach ( $forms as $form => $form_data ) {

				/** Skip the 0 key */
				if ( 0 === $form ) {
					continue;
				}

				$form_title = $form_data;
				$form_id    = $form;

				/** Add item per form */
				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-formmaker-form-' . $form_id,
						'parent' => 'group-formmaker-edit-forms',
						'title'  => $form_title,
						'href'   => esc_url( admin_url( 'admin.php?page=manage_fm&task=edit&current_id=' . $form_id ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Edit Form', 'toolbar-extras' ) . ': ' . $form_title
						)
					)
				);

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'forms-formmaker-form-' . $form_id . '-builder',
							'parent' => 'forms-formmaker-form-' . $form_id,
							'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=manage_fm&task=edit&current_id=' . $form_id ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' )
							)
						)
					);

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'forms-formmaker-form-' . $form_id . '-preview',
							'parent' => 'forms-formmaker-form-' . $form_id,
							'title'  => esc_attr__( 'Preview', 'toolbar-extras' ),
							'href'   => esc_url( site_url( '/form-maker/preview/?wdform_id=' . $form_id ) ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target(),
								'title'  => esc_attr__( 'Preview', 'toolbar-extras' )
							)
						)
					);

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'forms-formmaker-form-' . $form_id . '-entries',
							'parent' => 'forms-formmaker-form-' . $form_id,
							'title'  => esc_attr__( 'Entries', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=submissions_fm&task=display&current_id=' . $form_id . '&order_by=group_id&asc_or_desc=desc' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Entries', 'toolbar-extras' )
							)
						)
					);

			}  // end foreach

		}  // end if

		/** General Form Maker items */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-formmaker-all-forms',
				'parent' => 'forms-formmaker',
				'title'  => esc_attr__( 'All Forms', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=manage_fm' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Forms', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-formmaker-new-form',
				'parent' => 'forms-formmaker',
				'title'  => esc_attr__( 'New Form', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=manage_fm&task=add' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Form', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-formmaker-all-entries',
				'parent' => 'forms-formmaker',
				'title'  => esc_attr__( 'All Entries', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=submissions_fm' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Entries', 'toolbar-extras' )
				)
			)
		);

		/** Themes */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-formmaker-themes',
				'parent' => 'forms-formmaker',
				'title'  => esc_attr__( 'Themes', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=themes_fm' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Themes', 'toolbar-extras' )
				)
			)
		);

		/** Options */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-formmaker-options',
				'parent' => 'forms-formmaker',
				'title'  => esc_attr__( 'Options', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=formmaker.settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Options', 'toolbar-extras' )
				)
			)
		);

		/** Optionally, let other Form Maker Add-Ons hook in */
		do_action( 'tbex_after_formmaker_options' );

		/** Group: Resources for Quform */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-formmaker-resources',
					'parent' => 'forms-formmaker',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'formmaker-support',
				'group-formmaker-resources',
				'https://wordpress.org/support/plugin/form-maker'
			);

			ddw_tbex_resource_item(
				'documentation',
				'formmaker-docs',
				'group-formmaker-resources',
				'https://web-dorado.com/wordpress-form-maker/introduction.html'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'formmaker-translate',
				'group-formmaker-resources',
				'https://translate.wordpress.org/projects/wp-plugins/form-maker'
			);

			ddw_tbex_resource_item(
				'official-site',
				'formmaker-site',
				'group-formmaker-resources',
				'https://web-dorado.com/products/wordpress-form.html'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_new_content_formmaker', 80 );
/**
 * Items for "New Content" section: New Form Maker Form
 *
 * @since 1.4.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_new_content_formmaker() {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() || is_network_admin() ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-formmaker-form',
			'parent' => 'new-content',
			'title'  => ddw_tbex_string_new_form( 'Form Maker' ),
			'href'   => esc_url( admin_url( 'admin.php?page=manage_fm&task=add' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_add_new_item( ddw_tbex_string_new_form( 'Form Maker' ) )
			)
		)
	);

}  // end function
