<?php

// OTGS: Toolset Forms
// includes/plugins-otgs/items-toolset-forms

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_toolset_forms', 30 );
/**
 * Items for plugin: Toolset Forms (Premium, by OnTheGoSystems)
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_is_toolset_types_active()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_toolset_forms( $admin_bar ) {

	/** Plugin's items */
	$admin_bar->add_node(
		array(
			'id'     => 'toolset-forms',
			'parent' => 'group-toolset-forms',
			'title'  => esc_attr__( 'Forms', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=CRED_Forms' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => 'Toolset: ' . esc_attr__( 'Forms', 'toolbar-extras' ),
			)
		)
	);

		/** Post Forms */
		$admin_bar->add_node(
			array(
				'id'     => 'toolset-forms-postforms',
				'parent' => 'toolset-forms',
				'title'  => esc_attr__( 'Post Forms', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=CRED_Forms' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Post Forms', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-forms-postforms-all',
					'parent' => 'toolset-forms-postforms',
					'title'  => esc_attr__( 'All Post Forms', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=CRED_Forms' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Post Forms', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-forms-postforms-new',
					'parent' => 'toolset-forms-postforms',
					'title'  => esc_attr__( 'New Post Form', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=cred-form' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Post Form', 'toolbar-extras' ),
					)
				)
			);

		/** User Forms */
		$admin_bar->add_node(
			array(
				'id'     => 'toolset-forms-userforms',
				'parent' => 'toolset-forms',
				'title'  => esc_attr__( 'User Forms', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=CRED_User_Forms' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'User Forms', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-forms-userforms-all',
					'parent' => 'toolset-forms-userforms',
					'title'  => esc_attr__( 'All User Forms', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=CRED_User_Forms' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All User Forms', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-forms-userforms-new',
					'parent' => 'toolset-forms-userforms',
					'title'  => esc_attr__( 'New User Form', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=cred-user-form' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New User Form', 'toolbar-extras' ),
					)
				)
			);

		/** Relationship Forms - optional, depending on Types being active */
		if ( ddw_tbex_is_toolset_types_active() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-forms-relationship',
					'parent' => 'toolset-forms',
					'title'  => esc_attr__( 'Relationship Forms', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=cred_relationship_forms' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Relationship Forms', 'toolbar-extras' ),
					)
				)
			);

				$admin_bar->add_node(
					array(
						'id'     => 'toolset-forms-relationship-all',
						'parent' => 'toolset-forms-relationship',
						'title'  => esc_attr__( 'All Relationship Forms', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=cred_relationship_forms' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'All Relationship Forms', 'toolbar-extras' ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'toolset-forms-relationship-new',
						'parent' => 'toolset-forms-relationship',
						'title'  => esc_attr__( 'New Relationship Form', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=cred_relationship_form&action=add_new' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'New Relationship Form', 'toolbar-extras' ),
						)
					)
				);

		}  // end if

		/** non-Toolset Post Fields */
		$admin_bar->add_node(
			array(
				'id'     => 'toolset-forms-other-fields',
				'parent' => 'toolset-forms',
				'title'  => esc_attr__( 'non-Toolset Post Fields', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=CRED_Fields' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Manage non-Toolset Post Fields with Toolset Forms', 'toolbar-extras' ),
				)
			)
		);


	/** Forms: Settings */
	$admin_bar->add_node(
		array(
			'id'     => 'toolset-forms-settings-forms',
			'parent' => 'toolset-suite-settings',
			'title'  => esc_attr__( 'Forms', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=toolset-settings&tab=forms' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Forms', 'toolbar-extras' ),
			)
		)
	);

	/** Forms: Export/ Import */
	$admin_bar->add_node(
		array(
			'id'     => 'toolset-forms-exportimport-forms',
			'parent' => 'toolset-suite-exportimport',
			'title'  => esc_attr__( 'Forms', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=toolset-export-import&tab=cred' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Forms', 'toolbar-extras' ),
			)
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_new_content_items_toolset_forms', 30 );
/**
 * New Content items for Toolset Forms: Post Form, User Form
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_display_items_new_content()
 * @uses ddw_tbex_string_add_new_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_new_content_items_toolset_forms( $admin_bar ) {

	/** Bail early if display not wanted */
	if ( ! ddw_tbex_display_items_new_content() ) {
		return $admin_bar;
	}

	$admin_bar->add_node(
		array(
			'id'     => 'new-toolset-content-post-form',
			'parent' => 'new-toolset-content',
			'title'  => esc_attr__( 'Post Form', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'post-new.php?post_type=cred-form' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_add_new_item( __( 'Post Form', 'toolbar-extras' ) ),
			)
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'new-toolset-content-user-form',
			'parent' => 'new-toolset-content',
			'title'  => esc_attr__( 'User Form', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'post-new.php?post_type=cred-user-form' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_add_new_item( __( 'User Form', 'toolbar-extras' ) ),
			)
		)
	);

	if ( ddw_tbex_is_toolset_types_active() ) {

		$admin_bar->add_node(
			array(
				'id'     => 'new-toolset-content-relationship-form',
				'parent' => 'new-toolset-content',
				'title'  => esc_attr__( 'Relationship Form', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=cred_relationship_form&action=add_new' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => ddw_tbex_string_add_new_item( __( 'Relationship Form', 'toolbar-extras' ) ),
				)
			)
		);

	}  // end if

}  // end function
