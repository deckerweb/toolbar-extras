<?php

// includes/plugins-genesis/items-genesis-coming-soon-page

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_genesis_coming_soon_page', 130 );
/**
 * Items for Add-On: Genesis Coming Soon Page (free, by Jose Manuel Sanchez)
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_meta_target()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_genesis_coming_soon_page() {

	/** For: Genesis Creative items */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'gcs-page',
			'parent' => 'group-genesisplugins-creative'
		)
	);

	$gcsp_settings = get_option( 'gcs-settings' );
	$gcsp_status   = $gcsp_settings[ 'status' ];
	$page_title    = sprintf(
		/* translators: %s - Status of page, "Coming Soon" or "Maintenance" */
		esc_attr__( '%s Page', 'toolbar-extras' ),
		( 'maintenance' === $gcsp_status ) ? __( 'Maintenance Mode', 'toolbar-extras' ) : __( 'Coming Soon', 'toolbar-extras' )
	);

	/** Settings page */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'gcs-page-edit',
			'parent' => 'gcs-page',
			'title'  => $page_title,
			'href'   => esc_url( admin_url( 'admin.php?page=genesis-coming-soon' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => $page_title
			)
		)
	);

	/** Live testing */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'gcs-page-live',
			'parent' => 'gcs-page',
			'title'  => esc_attr__( 'Live Test', 'toolbar-extras' ),
			'href'   => esc_url( get_site_url() . '/?gcs_preview=true' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => esc_attr__( 'Live Test', 'toolbar-extras' )
			)
		)
	);

}  // end function
