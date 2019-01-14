<?php

// includes/plugins/items-content-aware-sidebars

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_content_aware_sidebars' );
/**
 * Items for Plugin: Content Aware Sidebars (free, by Joachim Jensen - DEV Institute)
 *
 * @since 1.3.1
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_content_aware_sidebars() {

	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-cas-sidebars',
			'parent' => 'wpwidgets'
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'widget-content-aware-sidebars',
			'parent' => 'group-cas-sidebars',
			'title'  => esc_attr__( 'Content Aware Sidebars', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=wpcas' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Content Aware Sidebars', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'widget-cas-new-sidebar',
			'parent' => 'group-cas-sidebars',
			'title'  => esc_attr__( 'New Sidebar', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=wpcas-edit' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'New Sidebar', 'toolbar-extras' )
			)
		)
	);

}  // end function
