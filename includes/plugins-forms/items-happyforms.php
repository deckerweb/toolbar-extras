<?php

// includes/plugins-forms/items-happyforms

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_happyforms' );
/**
 * Items for Plugin: HappyForms (free, by The Theme Foundry)
 *
 * @since 1.3.2
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_happyforms() {

	/** For: Forms */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'forms-happyforms',
			'parent' => 'tbex-sitegroup-forms',
			'title'  => ddw_tbex_string_forms_system( 'Happy' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=happyform' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_forms_system( 'Happy' ),
			)
		)
	);

		/**
		 * Add each individual form as an item.
		 *   Forms are saved as a post type therefore a query necessary.
		 * @since 1.3.2
		 */
		$args = array(
			'post_type'      => 'happyform',
			'posts_per_page' => -1,
		);

		$forms = get_posts( $args );

		/** Proceed only if there are any forms */
		if ( $forms ) {

			/** Add group */
			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-happyforms-edit-forms',
					'parent' => 'forms-happyforms'
				)
			);

			foreach ( $forms as $form ) {

				$form_id    = absint( $form->ID );
				$form_title = esc_attr( $form->post_title );

				$hf_url_edit_form = add_query_arg(
					array(
						'return'     => admin_url( 'edit.php?post_type=happyform' ),
						'happyforms' => 1,
						'form_id'    => $form_id . '#build'
					),
					admin_url( 'customize.php' )
				);

				/** Add item per form */
				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-happyforms-form-' . $form_id,
						'parent' => 'group-happyforms-edit-forms',
						'title'  => $form_title,
						'href'   => esc_url( $hf_url_edit_form ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => esc_attr__( 'Edit Form', 'toolbar-extras' ) . ': ' . $form_title,
						)
					)
				);

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'forms-happyforms-form-' . $form_id . '-builder',
							'parent' => 'forms-happyforms-form-' . $form_id,
							'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' ),
							'href'   => esc_url( $hf_url_edit_form ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target( 'builder' ),
								'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' ),
							)
						)
					);

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'forms-happyforms-form-' . $form_id . '-entries',
							'parent' => 'forms-happyforms-form-' . $form_id,
							'title'  => esc_attr__( 'Entries', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'edit.php?post_status=all&post_type=happyforms-message&form_id=' . $form_id ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Entries', 'toolbar-extras' ),
							)
						)
					);

			}  // end foreach

		}  // end if

		/** General HappyForms items */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-happyforms-all-forms',
				'parent' => 'forms-happyforms',
				'title'  => esc_attr__( 'All Forms', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=happyform' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Forms', 'toolbar-extras' ),
				)
			)
		);

		$hf_url_new_form = add_query_arg(
			array(
				'return'     => admin_url( 'edit.php?post_type=happyform' ),
				'happyforms' => 1,
				'form_id'    => '0#build'
			),
			admin_url( 'customize.php' )
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-happyforms-new-form',
				'parent' => 'forms-happyforms',
				'title'  => esc_attr__( 'New Form', 'toolbar-extras' ),
				'href'   => esc_url( $hf_url_new_form ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => esc_attr__( 'New Form', 'toolbar-extras' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-happyforms-entries',
				'parent' => 'forms-happyforms',
				'title'  => esc_attr__( 'Entries', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=happyforms-message' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Entries', 'toolbar-extras' ),
				)
			)
		);

		/** Optionally, let other HappyForms Add-Ons hook in */
		do_action( 'tbex_after_happyforms_settings' );

		/** Group: Resources for Everest Forms */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-happyforms-resources',
					'parent' => 'forms-happyforms',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);
			
			ddw_tbex_resource_item(
				'support-forum',
				'happyforms-support',
				'group-happyforms-resources',
				'https://wordpress.org/support/plugin/happyforms'
			);

			ddw_tbex_resource_item(
				'documentation',
				'happyforms-docs',
				'group-happyforms-resources',
				'https://happyforms.me/help-guide'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'happyforms-translate',
				'group-happyforms-resources',
				'https://translate.wordpress.org/projects/wp-plugins/happyforms'
			);

			ddw_tbex_resource_item(
				'official-site',
				'happyforms-site',
				'group-happyforms-resources',
				'https://happyforms.me/'
			);

		}  // end if

}  // end function


add_filter( 'admin_bar_menu', 'ddw_tbex_aoitems_new_content_happyforms', 80 );
/**
 * Items for "New Content" section: New HappyForms Form
 *   Note: Filter the existing Toolbar node to make the link target obey to our
 *         options (new browser tab by default, changeable via Toolbar Extras'
 *         settings).
 *
 * @since 1.3.2
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 *
 * @param object $wp_admin_bar Holds all nodes of the Toolbar.
 */
function ddw_tbex_aoitems_new_content_happyforms( $wp_admin_bar ) {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() || is_network_admin() ) {
		return $wp_admin_bar;
	}

	$wp_admin_bar->add_node(
		array(
			'id'     => 'new-content-happyforms',	// same as original!
			'parent' => 'new-content',
			'meta'   => array(
				'target' => ddw_tbex_meta_target( 'builder' ),
			)
		)
	);

}  // end function
