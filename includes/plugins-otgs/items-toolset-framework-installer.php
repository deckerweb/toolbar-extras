<?php

// OTGS: Toolset Framework Installer (Reference Sites)
// includes/plugins-otgs/items-toolset-framework-installer

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'tbex_toolset_before_options', 'ddw_tbex_site_items_toolset_framework_installer', 20 );
/**
 * Items for plugin: Toolset Framework Installer (Premium, by OnTheGoSystems)
 *
 * @since 1.4.9
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_toolset_framework_installer( $admin_bar ) {

	$admin_bar->add_node(
		array(
			'id'     => 'toolset-reference-sites',
			'parent' => 'group-toolset-options',
			'title'  => esc_attr__( 'Install Reference Sites', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=manage-refsites' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Toolset Framework Installer', 'toolbar-extras' ) . ': ' . esc_attr__( 'Reference Sites', 'toolbar-extras' ),
			)
		)
	);

}  // end function
