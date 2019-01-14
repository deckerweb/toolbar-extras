<?php

// includes/plugins-forms/items-quform

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'init', 'ddw_tbex_maybe_turnoff_quform_toolbar', 20 );
/**
 * Disable Toolbar display in Quform.
 *
 * @since 1.3.1
 */
function ddw_tbex_maybe_turnoff_quform_toolbar() {

	$quform_toolbar = get_option( 'quform_options' );

	if ( 1 === $quform_toolbar[ 'toolbarMenu' ] ) {

		$quform_toolbar[ 'toolbarMenu' ] = 0;

		update_option( 'quform_options', $quform_toolbar );

	}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_quform' );
/**
 * Items for Plugin: Quform (Premium, by ThemeCatcher)
 *
 * @since 1.3.1
 *
 * @uses Quform_Repository
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_quform() {

	/** For: Forms */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'forms-quform',
			'parent' => 'tbex-sitegroup-forms',
			'title'  => esc_attr__( 'Quform', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=quform.dashboard' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Quform', 'toolbar-extras' )
			)
		)
	);

		/**
		 * Add each individual form as an item. Database query is necessary.
		 * @since 1.3.1
		 */
		$quform_forms = new Quform_Repository;
		$forms        = $quform_forms->getForms();

		/** Proceed only if there are any forms */
		if ( $forms ) {

			/** Add group */
			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-quform-edit-forms',
					'parent' => 'forms-quform'
				)
			);

			foreach ( $forms as $form ) {

				$form_title = esc_attr( $form[ 'name' ] );
				$form_id    = absint( $form[ 'id' ] );

				/** Add item per form */
				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-quform-form-' . $form_id,
						'parent' => 'group-quform-edit-forms',
						'title'  => $form_title,
						'href'   => esc_url( admin_url( 'admin.php?page=quform.forms&sp=edit&id=' . $form_id ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Edit Form', 'toolbar-extras' ) . ': ' . $form_title
						)
					)
				);

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'forms-quform-form-' . $form_id . '-builder',
							'parent' => 'forms-quform-form-' . $form_id,
							'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=quform.forms&sp=edit&id=' . $form_id ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' )
							)
						)
					);

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'forms-quform-form-' . $form_id . '-entries',
							'parent' => 'forms-quform-form-' . $form_id,
							'title'  => esc_attr__( 'Entries', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=quform.entries&id=' . $form_id ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Entries', 'toolbar-extras' )
							)
						)
					);

			}  // end foreach

		}  // end if

		/** General Quform items */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-quform-all-forms',
				'parent' => 'forms-quform',
				'title'  => esc_attr__( 'All Forms', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=quform.forms' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Forms', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-quform-new-form',
				'parent' => 'forms-quform',
				'title'  => esc_attr__( 'New Form', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=quform.forms&sp=add' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Form', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-quform-all-entries',
				'parent' => 'forms-quform',
				'title'  => esc_attr__( 'All Entries', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=quform.entries' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Entries', 'toolbar-extras' )
				)
			)
		);

		/** Tools */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-quform-tools',
				'parent' => 'forms-quform',
				'title'  => esc_attr__( 'Tools', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=quform.tools' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Tools', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-quform-tools-export-entries',
					'parent' => 'forms-quform-tools',
					'title'  => esc_attr__( 'Export Entries', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=quform.tools&sp=export.entries' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Export Entries', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-quform-tools-export-forms',
					'parent' => 'forms-quform-tools',
					'title'  => esc_attr__( 'Export Form', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=quform.tools&sp=export.form' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Export Form', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-quform-tools-import-form',
					'parent' => 'forms-quform-tools',
					'title'  => esc_attr__( 'Import Form', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=quform.tools&sp=import.form' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Import Form', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-quform-tools-migrate',
					'parent' => 'forms-quform-tools',
					'title'  => esc_attr__( 'Migrate', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=quform.tools&sp=migrate' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Migrate', 'toolbar-extras' )
					)
				)
			);

		/** Settings */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-quform-settings',
				'parent' => 'forms-quform',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=quform.settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		/** Optionally, let other Quform Add-Ons hook in */
		do_action( 'tbex_after_quform_settings' );

		/** Group: Resources for Quform */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-quform-resources',
					'parent' => 'forms-quform',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);
			
			ddw_tbex_resource_item(
				'support-forum',
				'quform-support',
				'group-quform-resources',
				'http://support.themecatcher.net/forums/forum/quform-wordpress-plugin'
			);

			ddw_tbex_resource_item(
				'documentation',
				'quform-docs',
				'group-quform-resources',
				'http://support.themecatcher.net/quform-wordpress-v2'
			);

			ddw_tbex_resource_item(
				'youtube-channel',
				'quform-videos',
				'group-quform-resources',
				'https://www.youtube.com/watch?v=uM3VK7D4Lfc&list=PLoXh1YOEJyfM3qQh8LD9GiLUq9OTUW1I8'
			);

			ddw_tbex_resource_item(
				'official-site',
				'quform-site',
				'group-quform-resources',
				'https://www.quform.com/'
			);

		}  // end if

}  // end function


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_remove_original_quform_newcontent' );
/**
 * Remove original "Form" (from "Quform") item from New Content Group.
 *
 * @since 1.3.1
 */
function ddw_tbex_remove_original_quform_newcontent() {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'quform-new-form' );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_new_content_quform', 80 );
/**
 * Items for "New Content" section: New Quform Form
 *
 * @since 1.3.1
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_new_content_quform() {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() || is_network_admin() ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-quform-form',
			'parent' => 'new-content',
			'title'  => ddw_tbex_string_new_form( 'Quform' ),
			'href'   => esc_url( admin_url( 'admin.php?page=quform.forms&sp=add' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_add_new_item( ddw_tbex_string_new_form( 'Quform' ) )
			)
		)
	);

}  // end function
