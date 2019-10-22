<?php

// dev-mode
// includes/plugins/items-delete-expired-transients

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_devmode_delete_expired_transients', 50 );
/**
 * Items for Plugin: Delete Expired Transients (free, by WebAware)
 *
 * @since 1.4.8
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_devmode_delete_expired_transients( $admin_bar ) {

	add_filter( 'tbex_filter_is_dev_mode', '__return_empty_string' );

	/** Group */
	$admin_bar->add_group(
		array(
			'id'     => 'group-deltransients',
			'parent' => 'rapid-dev',
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'deltransients',
			'parent' => 'group-deltransients',
			'title'  => esc_attr__( 'Delete Expired Transients', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'tools.php?page=delxtrans' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Delete Expired Transients', 'toolbar-extras' ),
			)
		)
	);

}  // end function
