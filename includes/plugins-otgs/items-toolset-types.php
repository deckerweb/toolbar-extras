<?php

// OTGS: Toolset Types
// includes/plugins-otgs/items-toolset-types

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_toolset_types', 30 );
/**
 * Items for plugin: Toolset Types (Premium, by OnTheGoSystems)
 *
 * @since 1.4.9
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_toolset_types( $admin_bar ) {

	/** Plugin's items */
	$admin_bar->add_node(
		array(
			'id'     => 'toolset-types',
			'parent' => 'group-toolset-types',
			'title'  => esc_attr__( 'Types', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=toolset-dashboard' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => 'Toolset: ' . esc_attr__( 'Types', 'toolbar-extras' ),
			)
		)
	);

		/** Dashboard */
		$admin_bar->add_node(
			array(
				'id'     => 'toolset-types-dashboard',
				'parent' => 'toolset-types',
				'title'  => esc_attr__( 'Overview', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=toolset-dashboard' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Overview', 'toolbar-extras' ),
				)
			)
		);

		/** Post Types */
		$admin_bar->add_node(
			array(
				'id'     => 'toolset-types-posttypes',
				'parent' => 'toolset-types',
				'title'  => esc_attr__( 'Post Types', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wpcf-cpt' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Post Types', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-types-posttypes-all',
					'parent' => 'toolset-types-posttypes',
					'title'  => esc_attr__( 'All Post Types', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wpcf-cpt' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Post Types', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-types-posttypes-new',
					'parent' => 'toolset-types-posttypes',
					'title'  => esc_attr__( 'New Post Type', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wpcf-edit-type' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Post Type', 'toolbar-extras' ),
					)
				)
			);

		/** Taxonomies */
		$admin_bar->add_node(
			array(
				'id'     => 'toolset-types-taxonomies',
				'parent' => 'toolset-types',
				'title'  => esc_attr__( 'Taxonomies', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wpcf-ctt' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Taxonomies', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-types-taxonomies-all',
					'parent' => 'toolset-types-taxonomies',
					'title'  => esc_attr__( 'All Taxonomies', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wpcf-ctt' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Taxonomies', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-types-taxonomies-new',
					'parent' => 'toolset-types-taxonomies',
					'title'  => esc_attr__( 'New Taxonomy', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wpcf-edit-tax' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Taxonomy', 'toolbar-extras' ),
					)
				)
			);

		/** Custom Fields */
		$admin_bar->add_node(
			array(
				'id'     => 'toolset-types-fields',
				'parent' => 'toolset-types',
				'title'  => esc_attr__( 'Custom Fields', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=types-custom-fields' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Custom Fields', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-types-fields-post-all',
					'parent' => 'toolset-types-fields',
					'title'  => esc_attr__( 'All Post Fields', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=types-custom-fields&domain=posts' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Post Fields', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-types-fields-post-new',
					'parent' => 'toolset-types-fields',
					'title'  => esc_attr__( 'New Post Field', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wpcf-edit' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Post Field', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-types-fields-user-all',
					'parent' => 'toolset-types-fields',
					'title'  => esc_attr__( 'All User Fields', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=types-custom-fields&domain=users' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All User Fields', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-types-fields-user-new',
					'parent' => 'toolset-types-fields',
					'title'  => esc_attr__( 'New User Field', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wpcf-edit-usermeta' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New User Field', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-types-fields-term-all',
					'parent' => 'toolset-types-fields',
					'title'  => esc_attr__( 'All Term Fields', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=types-custom-fields&domain=terms' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Term Fields', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-types-fields-term-new',
					'parent' => 'toolset-types-fields',
					'title'  => esc_attr__( 'New Term Field', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wpcf-termmeta-edit' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Term Field', 'toolbar-extras' ),
					)
				)
			);

		/** Relationships */
		$admin_bar->add_node(
			array(
				'id'     => 'toolset-types-relations',
				'parent' => 'toolset-types',
				'title'  => esc_attr__( 'Relationships', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=types-relationships' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Relationships', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-types-relations-all',
					'parent' => 'toolset-types-relations',
					'title'  => esc_attr__( 'All Relationships', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=types-relationships' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Relationships', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-types-relations-new',
					'parent' => 'toolset-types-relations',
					'title'  => esc_attr__( 'New Relationship', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=types-relationships&action=add_new' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Relationship - Setup Wizard', 'toolbar-extras' ),
					)
				)
			);

	/** Types: Settings */
	$admin_bar->add_node(
		array(
			'id'     => 'toolset-types-settings-custom-content',
			'parent' => 'toolset-suite-settings',
			'title'  => esc_attr__( 'Custom Content', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=toolset-settings&tab=custom-content' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Custom Content', 'toolbar-extras' ),
			)
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'toolset-types-settings-text-search',
			'parent' => 'toolset-suite-settings',
			'title'  => esc_attr__( 'Text Search', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=toolset-settings&tab=relevanssi' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Text Search Settings - for Relevanssi Plugin', 'toolbar-extras' ),
			)
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'toolset-types-settings-custom-code',
			'parent' => 'toolset-suite-settings',
			'title'  => esc_attr__( 'Custom Code', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=toolset-settings&tab=code-snippets' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Custom Code', 'toolbar-extras' ),
			)
		)
	);

	/** Types: Export/ Import */
	$admin_bar->add_node(
		array(
			'id'     => 'toolset-types-exportimport-types',
			'parent' => 'toolset-suite-exportimport',
			'title'  => esc_attr__( 'Types', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=toolset-export-import&tab=types' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Types', 'toolbar-extras' ),
			)
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'toolset-types-exportimport-associations',
			'parent' => 'toolset-suite-exportimport',
			'title'  => esc_attr__( 'Associations', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=toolset-export-import&tab=associations' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Associations', 'toolbar-extras' ),
			)
		)
	);

	//

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_new_content_items_toolset_types', 30 );
/**
 * New Content items for Toolset Types:
 *   Post Type, Taxonomy, Custom Field, Relationship
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_display_items_new_content()
 * @uses ddw_tbex_string_add_new_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_new_content_items_toolset_types( $admin_bar ) {

	/** Bail early if display not wanted */
	if ( ! ddw_tbex_display_items_new_content() ) {
		return $admin_bar;
	}

	$admin_bar->add_node(
		array(
			'id'     => 'new-toolset-content-posttype',
			'parent' => 'new-toolset-content',
			'title'  => esc_attr__( 'Post Type', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=wpcf-edit-type' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_add_new_item( __( 'Post Type', 'toolbar-extras' ) ),
			)
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'new-toolset-content-taxonomy',
			'parent' => 'new-toolset-content',
			'title'  => esc_attr__( 'Taxonomy', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=wpcf-edit-tax' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_add_new_item( __( 'Taxonomy', 'toolbar-extras' ) ),
			)
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'new-toolset-content-field-post',
			'parent' => 'new-toolset-content',
			'title'  => esc_attr__( 'Custom Post Field', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=wpcf-edit' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_add_new_item( __( 'Custom Post Field', 'toolbar-extras' ) ),
			)
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'new-toolset-content-field-user',
			'parent' => 'new-toolset-content',
			'title'  => esc_attr__( 'Custom User Field', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=wpcf-edit-usermeta' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_add_new_item( __( 'Custom User Field', 'toolbar-extras' ) ),
			)
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'new-toolset-content-field-term',
			'parent' => 'new-toolset-content',
			'title'  => esc_attr__( 'Custom Term Field', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=wpcf-termmeta-edit' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_add_new_item( __( 'Custom Term Field', 'toolbar-extras' ) ),
			)
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'new-toolset-content-relation',
			'parent' => 'new-toolset-content',
			'title'  => esc_attr__( 'Relationship', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=types-relationships&action=add_new' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_add_new_item( __( 'Relationship', 'toolbar-extras' ) ),
			)
		)
	);

}  // end function
