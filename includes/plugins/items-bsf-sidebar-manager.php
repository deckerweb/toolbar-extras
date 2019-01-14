<?php

// includes/plugins/items-bsf-sidebar-manager

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_bsf_sidebar_manager' );
/**
 * Items for Plugin: Lightweight Sidebar Manager (free, by Brainstorm Force)
 *
 * @since 1.2.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_bsf_sidebar_manager() {

	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-bsf-sidebars',
			'parent' => 'wpwidgets'
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'widget-bsf-sidebar-manager',
			'parent' => 'group-bsf-sidebars',
			'title'  => esc_attr__( 'Sidebar Manager', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=bsf-sidebar' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Sidebar Manager', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'widget-bsf-new-sidebar',
			'parent' => 'group-bsf-sidebars',
			'title'  => esc_attr__( 'New Sidebar', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'post-new.php?post_type=bsf-sidebar' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'New Sidebar', 'toolbar-extras' )
			)
		)
	);

}  // end function
