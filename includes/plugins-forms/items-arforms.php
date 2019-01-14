<?php

// includes/plugins-forms/items-arforms

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_arforms' );
/**
 * Items for Plugin: ARForms (Premium, by Repute InfoSystems)
 *
 * @since 1.3.2
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_arforms() {

	/** For: Forms */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'forms-arforms',
			'parent' => 'tbex-sitegroup-forms',
			'title'  => ddw_tbex_string_forms_system( 'AR' ),
			'href'   => esc_url( admin_url( 'admin.php?page=ARForms' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_forms_system( 'AR' ),
			)
		)
	);

		/**
		 * Add each individual form as an item. Database query is necessary.
		 * @since 1.3.2
		 */
		$arforms_db_where = "is_template=0 AND (status is NULL OR status = '' OR status = 'published')";
		$forms            = $GLOBALS[ 'arfform' ]->getAll( $arforms_db_where, ' ORDER BY name' );

		/** Proceed only if there are any forms */
		if ( $forms ) {

			/** Add group */
			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-arforms-edit-forms',
					'parent' => 'forms-arforms'
				)
			);

			foreach ( $forms as $form ) {

				$form_title  = $form->name;

				/** Add item per form */
				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-arforms-form-' . $form->id,
						'parent' => 'group-arforms-edit-forms',
						'title'  => $form_title,
						'href'   => esc_url( admin_url( 'admin.php?page=ARForms&arfaction=edit&id=' . $form->id ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Edit Form', 'toolbar-extras' ) . ': ' . $form_title
						)
					)
				);

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'forms-arforms-form-' . $form->id . '-builder',
							'parent' => 'forms-arforms-form-' . $form->id,
							'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=ARForms&arfaction=edit&id=' . $form->id ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Form Builder', 'toolbar-extras' )
							)
						)
					);

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'forms-arforms-form-' . $form->id . '-entries',
							'parent' => 'forms-arforms-form-' . $form->id,
							'title'  => esc_attr__( 'Entries', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=ARForms-entries&form=' . $form->id ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Entries', 'toolbar-extras' )
							)
						)
					);

			}  // end foreach

		}  // end if

		/** General ARForms items */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-arforms-all-forms',
				'parent' => 'forms-arforms',
				'title'  => esc_attr__( 'All Forms', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=ARForms' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Forms', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-arforms-new-form',
				'parent' => 'forms-arforms',
				'title'  => esc_attr__( 'New Form', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=ARForms&arfaction=new&isp=1' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Form', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-arforms-entries-analytics',
				'parent' => 'forms-arforms',
				'title'  => esc_attr__( 'Entries &amp; Analytics', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=ARForms-entries' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Entries &amp; Analytics', 'toolbar-extras' )
				)
			)
		);

		/** Optional Add-On: User Signup & Registration */
		if ( defined( 'ARF_USER_REGISTRATION_DIR' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-arforms-user-signup-registration',
					'parent' => 'forms-arforms',
					'title'  => esc_attr__( 'User Signup &amp; Registration', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=ARForms-user-registration' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'User Signup &amp; Registration', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-arforms-import-export',
				'parent' => 'forms-arforms',
				'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=ARForms-import-export' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-arforms-settings',
				'parent' => 'forms-arforms',
				'title'  => esc_attr__( 'General Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=ARForms-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'General Settings', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-arforms-license',
				'parent' => 'forms-arforms',
				'title'  => esc_attr__( 'License', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=ARForms-license' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'License', 'toolbar-extras' )
				)
			)
		);

		/** Optionally, let other ARForms Forms Add-Ons hook in */
		do_action( 'tbex_after_arforms_settings' );

		/** Group: Resources for ARForms */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-arforms-resources',
					'parent' => 'forms-arforms',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'documentation',
				'arforms-docs',
				'group-arforms-resources',
				'https://www.arformsplugin.com/documentation/1-getting-started-with-arforms/'
			);

			ddw_tbex_resource_item(
				'support-contact',
				'arforms-contact',
				'group-arforms-resources',
				'https://helpdesk.arpluginshop.com/submit-a-ticket/'
			);

			ddw_tbex_resource_item(
				'official-site',
				'arforms-site',
				'group-arforms-resources',
				'https://www.arformsplugin.com/'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_new_content_arforms', 80 );
/**
 * Items for "New Content" section: New ARForms Form
 *
 * @since 1.3.2
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_new_content_arforms() {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() || is_network_admin() ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-arforms-form',
			'parent' => 'new-content',
			'title'  => ddw_tbex_string_new_form( 'ARForms' ),
			'href'   => esc_url( admin_url( 'admin.php?page=ARForms&arfaction=new&isp=1' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_add_new_item( ddw_tbex_string_new_form( 'ARForms' ) )
			)
		)
	);

}  // end function
