<?php

// includes/themes-genesis/items-genesis-gbeaver

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_gbeaver', 100 );
/**
 * Items for Theme: GBeaver (Premium, by WP Beaver World)
 *   Note: This is a Genesis Child Theme.
 *
 * @since 1.1.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_gbeaver() {

	/** For: GBeaver creative (sub items!) */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-creative-gbeaver-settings',
			'parent' => 'theme-creative',
			'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=gbeaver-options' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-creative-gbeaver-importexport',
			'parent' => 'theme-creative',
			'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=gbeaver-import-export' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' )
			)
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_gbeaver_resources', 120 );
/**
 * General resources items for GBeaver Child Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.1.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 */
function ddw_tbex_themeitems_gbeaver_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for GBeaver Child Theme */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-gbeaver-resources',
			'parent' => 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	ddw_tbex_resource_item(
		'support-contact',
		'gbeaver-contact',
		'group-gbeaver-resources',
		'https://www.wpbeaverworld.com/contact/'
	);

	ddw_tbex_resource_item(
		'official-site',
		'gbeaver-site',
		'group-gbeaver-resources',
		'https://gbeaver.wpbeaverworld.com/'
	);

}  // end function
