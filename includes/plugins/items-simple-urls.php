<?php

// includes/plugins/items-simple-urls

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_simple_urls', 20 );
/**
 * Items for Plugin: Simple URLs (free, by StudioPress)
 *
 * @since 1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_simple_urls() {

	/** For: Manage Content */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'manage-content-surl',
			'parent' => 'manage-content',
			'title'  => esc_attr__( 'Edit URLs', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=surl' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Edit URLs', 'toolbar-extras' )
			)
		)
	);

}  // end function
