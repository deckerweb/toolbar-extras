<?php

// includes/plugins/items-wpvivid

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_wpvivid' );
/**
 * Items for Plugin: WPvivid Backup Plugin (free, by WPvivid Team)
 *
 * @since 1.4.4
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_wpvivid( $admin_bar ) {

	$admin_bar->add_node(
		array(
			'id'     => 'wpvivid_admin_menu',	// same as original!
			'parent' => 'tbex-sitegroup-tools',
			//'title'  => esc_attr__( 'WPvivid Backup', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=WPvivid' ) ),
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_wpvivid_resources', 100 );
/**
 * Resource items for WPvivid Plugin.
 *
 * @since 1.4.4
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_wpvivid_resources( $admin_bar ) {

	/** Bail early if no resources display wanted */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Plugin's resources */
	$admin_bar->add_group(
		array(
			'id'     => 'group-wpvivid-resources',
			'parent' => 'wpvivid_admin_menu',
			'meta'   => array( 'class' => 'ab-sub-secondary' ),
		)
	);

	ddw_tbex_resource_item(
		'support-forum',
		'wpvivid-support',
		'group-wpvivid-resources',
		'https://wordpress.org/support/plugin/wpvivid-backuprestore'
	);

	ddw_tbex_resource_item(
		'documentation',
		'wpvivid-docs',
		'group-wpvivid-resources',
		'https://wpvivid.com/get-started-settings.html'
	);

	ddw_tbex_resource_item(
		'translations-community',
		'wpvivid-translate',
		'group-wpvivid-resources',
		'https://translate.wordpress.org/projects/wp-plugins/wpvivid-backuprestore'
	);

	ddw_tbex_resource_item(
		'official-site',
		'wpvivid-site',
		'group-wpvivid-resources',
		'https://wpvivid.com/'
	);

}  // end function
