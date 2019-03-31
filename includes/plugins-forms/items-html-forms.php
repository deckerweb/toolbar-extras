<?php

// includes/plugins-forms/items-html-forms

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_html_forms' );
/**
 * Items for Plugin: HTML Forms (free, by ibericode)
 *
 * @since 1.4.2
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_html_forms() {

	/** For: Forms */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'forms-htmlforms',
			'parent' => 'tbex-sitegroup-forms',
			'title'  => ddw_tbex_string_forms_system( 'HTML' ),
			'href'   => esc_url( admin_url( 'admin.php?page=html-forms' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_forms_system( 'HTML' ),
			)
		)
	);

		/**
		 * Add each individual form as an item.
		 *   Forms are saved as a post type therefore a query necessary.
		 * @since 1.4.2
		 */
		$args = array(
			'post_type'      => 'html-form',
			'posts_per_page' => -1,
		);

		$forms = get_posts( $args );

		/** Proceed only if there are any forms */
		if ( $forms ) {

			/** Add group */
			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-htmlforms-edit-forms',
					'parent' => 'forms-htmlforms'
				)
			);

			foreach ( $forms as $form ) {

				$form_id   = absint( $form->ID );
				$form_name = esc_attr( $form->post_title );

				/** Add item per form */
				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-htmlforms-form-' . $form_id,
						'parent' => 'group-htmlforms-edit-forms',
						'title'  => $form_name,
						'href'   => esc_url( admin_url( 'admin.php?page=html-forms&view=edit&form_id=' . $form_id ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Edit Form', 'toolbar-extras' ) . ': ' . $form_name
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-htmlforms-form-' . $form_id . '-fields',
						'parent' => 'forms-htmlforms-form-' . $form_id,
						'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=html-forms&view=edit&form_id=' . $form_id . '&tab=fields' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-htmlforms-form-' . $form_id . '-messages',
						'parent' => 'forms-htmlforms-form-' . $form_id,
						'title'  => esc_attr__( 'Messages', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=html-forms&view=edit&form_id=' . $form_id . '&tab=messages' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Messages', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-htmlforms-form-' . $form_id . '-settings',
						'parent' => 'forms-htmlforms-form-' . $form_id,
						'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=html-forms&view=edit&form_id=' . $form_id . '&tab=settings' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-htmlforms-form-' . $form_id . '-actions',
						'parent' => 'forms-htmlforms-form-' . $form_id,
						'title'  => esc_attr__( 'Actions', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=html-forms&view=edit&form_id=' . $form_id . '&tab=actions' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Actions', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-htmlforms-form-' . $form_id . '-submissions',
						'parent' => 'forms-htmlforms-form-' . $form_id,
						'title'  => esc_attr__( 'Submissions', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=html-forms&view=edit&form_id=' . $form_id . '&tab=submissions' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Submissions', 'toolbar-extras' )
						)
					)
				);

			}  // end foreach

		}  // end if

		/** All Forms */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-htmlforms-all-forms',
				'parent' => 'forms-htmlforms',
				'title'  => esc_attr__( 'All Forms', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=html-forms' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Forms', 'toolbar-extras' )
				)
			)
		);

		/** New Form */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-htmlforms-new-form',
				'parent' => 'forms-htmlforms',
				'title'  => esc_attr__( 'New Form', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=html-forms-add-form' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Form', 'toolbar-extras' )
				)
			)
		);

		/** Settings */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-htmlforms-settings',
				'parent' => 'forms-htmlforms',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=html-forms-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		/** Optionally, let other HTML Forms Add-Ons hook in */
		do_action( 'tbex_after_htmlforms_settings' );

		/** Group: Resources for htmlforms */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-htmlforms-resources',
					'parent' => 'forms-htmlforms',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);
			
			ddw_tbex_resource_item(
				'support-forum',
				'htmlforms-support',
				'group-htmlforms-resources',
				'https://wordpress.org/support/plugin/html-forms'
			);

			ddw_tbex_resource_item(
				'knowledge-base',
				'htmlforms-kb',
				'group-htmlforms-resources',
				'https://kb.htmlforms.io/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'htmlforms-translate',
				'group-htmlforms-resources',
				'https://translate.wordpress.org/projects/wp-plugins/html-forms'
			);

			ddw_tbex_resource_item(
				'github',
				'htmlforms-github',
				'group-htmlforms-resources',
				'https://github.com/ibericode/html-forms'
			);

			ddw_tbex_resource_item(
				'official-site',
				'htmlforms-site',
				'group-htmlforms-resources',
				'https://htmlforms.io/'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_new_content_html_forms', 80 );
/**
 * Items for "New Content" section: New HTML Form
 *
 * @since 1.4.2
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_new_content_html_forms() {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() || is_network_admin() ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-html-form',
			'parent' => 'new-content',
			'title'  => ddw_tbex_string_new_form( 'HTML' ),
			'href'   => esc_url( admin_url( 'admin.php?page=html-forms-add-form' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_add_new_item( ddw_tbex_string_new_form( 'HTML' ) )
			)
		)
	);

}  // end function
