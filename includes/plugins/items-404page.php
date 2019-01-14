<?php

// includes/plugins/items-404-page

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_404page', 140 );
/**
 * Items for Add-On: 404page (free, by Peter Raschendorfer)
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_meta_target()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_404page() {

	/** For: Theme Creative items */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'pr-404page',
			'parent' => 'theme-creative'
		)
	);

	$pr_404page = get_option( '404page_page_id' );

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'pr-404page-edit',
			'parent' => 'pr-404page',
			'title'  => esc_attr__( 'Edit 404 Page', 'toolbar-extras' ),
			'href'   => get_edit_post_link( absint( $pr_404page ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Edit 404 Page', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'pr-404page-live',
			'parent' => 'pr-404page',
			'title'  => esc_attr__( '404 Live Test', 'toolbar-extras' ),
			'href'   => esc_url( get_site_url() . '/404page-test-' . md5( mt_rand() ) ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => esc_attr__( '404 Live Test', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'pr-404page-settings',
			'parent' => 'pr-404page',
			'title'  => esc_attr__( '404 Page Settings', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'themes.php?page=404pagesettings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( '404 Page Settings', 'toolbar-extras' )
			)
		)
	);

}  // end function
