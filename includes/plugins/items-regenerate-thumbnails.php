<?php

// includes/plugins/items-regenerate-thumbnails

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_regenerate_thumbnails' );
/**
 * Items for Plugin: Regenerate Thumbnails (free, by Alex Mills)
 *
 * @since 1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_regenerate_thumbnails() {

	/** For: Manage Content */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'regenerate-thumbnails',
			'parent' => 'manage-content-media',
			'title'  => esc_attr__( 'Regenerate Thumbnails', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'tools.php?page=regenerate-thumbnails' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Regenerate Thumbnails', 'toolbar-extras' )
			)
		)
	);

}  // end function
