<?php

// OTGS: WPML String Translation
// includes/plugins-otgs/items-wpml-string-translation

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_wpml_string_translation', 20 );
/**
 * Items for plugin: WPML String Translation (Premium, by OnTheGoSystems)
 *
 * @since 1.4.9
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_wpml_string_translation( $admin_bar ) {

	$admin_bar->add_node(
		array(
			'id'     => 'wpml-suite-strings',
			'parent' => 'group-wpml-wpproducts',
			'title'  => esc_attr__( 'String Translation', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=wpml-string-translation/menu/string-translation.php' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'String Translation', 'toolbar-extras' ),
			)
		)
	);

}  // end function
