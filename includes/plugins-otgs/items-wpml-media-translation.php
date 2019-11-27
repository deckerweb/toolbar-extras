<?php

// OTGS: WPML Media Translation
// includes/plugins-otgs/items-wpml-media-translation

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_wpml_media_translation', 20 );
/**
 * Items for plugin: WPML Media Translation (Premium, by OnTheGoSystems)
 *
 * @since 1.4.9
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_wpml_media_translation( $admin_bar ) {

	$admin_bar->add_node(
		array(
			'id'     => 'wpml-suite-wpelements-media',
			'parent' => 'wpml-suite-wpelements',
			'title'  => esc_attr__( 'Media Translation', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=wpml-media' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Media Translation', 'toolbar-extras' ),
			)
		)
	);

}  // end function
