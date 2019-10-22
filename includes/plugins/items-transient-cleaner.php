<?php

// dev-mode
// includes/plugins/items-transient-cleaner

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_devmode_transient_cleaner', 50 );
/**
 * Items for Plugin: Transient Cleaner (free, by David Artiss)
 *
 * @since 1.4.8
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_devmode_transient_cleaner( $admin_bar ) {

	add_filter( 'tbex_filter_is_dev_mode', '__return_empty_string' );

	/** Group */
	$admin_bar->add_group(
		array(
			'id'     => 'group-transientcleaner',
			'parent' => 'rapid-dev',
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'transientcleaner',
			'parent' => 'group-transientcleaner',
			'title'  => esc_attr__( 'Transient Cleaner', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'tools.php?page=transient-options' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Transient Cleaner', 'toolbar-extras' ),
			)
		)
	);

}  // end function
