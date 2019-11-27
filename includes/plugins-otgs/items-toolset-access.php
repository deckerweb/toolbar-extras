<?php

// OTGS: Toolset Access
// includes/plugins-otgs/items-toolset-access

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_toolset_access', 30 );
/**
 * Items for plugin: Toolset Access (Premium, by OnTheGoSystems)
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_is_toolset_forms_active()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_toolset_access( $admin_bar ) {

	/** Plugin's items */
	$admin_bar->add_node(
		array(
			'id'     => 'toolset-access',
			'parent' => 'group-toolset-access',
			'title'  => esc_attr__( 'Access Control', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=types_access' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => 'Toolset: ' . esc_attr__( 'Access Control', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'toolset-access-post-type',
				'parent' => 'toolset-access',
				'title'  => esc_attr__( 'Post Type', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=types_access&tab=post-type' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Post Type', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'toolset-access-taxonomies',
				'parent' => 'toolset-access',
				'title'  => esc_attr__( 'Taxonomies', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=types_access&tab=taxonomy' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Taxonomies', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'toolset-access-post-groups',
				'parent' => 'toolset-access',
				'title'  => esc_attr__( 'Post Groups', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=types_access&tab=custom-group' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Post Groups', 'toolbar-extras' ),
				)
			)
		);

		/** Forms Groups - optional, depending on Forms being active */
		if ( ddw_tbex_is_toolset_forms_active() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-access-toolset-forms',
					'parent' => 'toolset-access',
					'title'  => esc_attr__( 'Toolset Forms', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=types_access&tab=cred-forms' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Toolset Forms', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

		$admin_bar->add_node(
			array(
				'id'     => 'toolset-access-custom-roles',
				'parent' => 'toolset-access',
				'title'  => esc_attr__( 'Custom Roles', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=types_access&tab=custom-roles' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Custom Roles', 'toolbar-extras' ),
				)
			)
		);


	/** Access: Export/ Import */
	$admin_bar->add_node(
		array(
			'id'     => 'toolset-access-exportimport-access',
			'parent' => 'toolset-suite-exportimport',
			'title'  => esc_attr__( 'Access', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=toolset-export-import&tab=access' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Access', 'toolbar-extras' ),
			)
		)
	);

}  // end function
