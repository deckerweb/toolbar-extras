<?php

// OTGS: WPML Sticky Links
// includes/plugins-otgs/items-wpml-cms-nav

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_wpml_sticky_links', 20 );
/**
 * Items for plugin: WPML Sticky Links (Premium, by OnTheGoSystems)
 *
 * @since 1.4.9
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_wpml_sticky_links( $admin_bar ) {

	$admin_bar->add_node(
		array(
			'id'     => 'wpml-suite-wpelements-sticky-links',
			'parent' => 'wpml-suite-wpelements',
			'title'  => esc_attr__( 'Sticky Links', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=wpml-sticky-links' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Sticky Links', 'toolbar-extras' ),
			)
		)
	);

}  // end function
