<?php

// OTGS: Toolset Forms Commerce
// includes/plugins-otgs/items-toolset-forms-commerce

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_toolset_forms_commerce', 40 );
/**
 * Items for plugin: Toolset Forms Commerce (Premium, by OnTheGoSystems)
 *
 * @since 1.4.9
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_toolset_forms_commerce( $admin_bar ) {

	$admin_bar->add_node(
		array(
			'id'     => 'toolset-forms-commerce',
			'parent' => 'toolset-forms',
			'title'  => esc_attr__( 'Toolset Forms Commerce', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=CRED_Commerce' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => 'Toolset: ' . esc_attr__( 'Forms Commerce', 'toolbar-extras' ),
			)
		)
	);

}  // end function
