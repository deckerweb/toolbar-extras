<?php

// includes/plugins/items-site-health-manager

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Create & render resource items for Site Health Manager plugin.
 *
 * @since 1.4.4
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param string $suffix String for suffix for Toolbar node ID and group ID.
 * @param string $parent String for Toolbar parent node.
 *
 * @global object $GLOBALS[ 'wp_admin_bar' ] object to build new Toolbar nodes.
 */
function ddw_tbex_aoitems_site_health_manager( $suffix = '', $parent = '' ) {

	/** Set suffix */
	$suffix = '-' . sanitize_key( $suffix );

	/** Group: Site Health Manager */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-sitehealth-manager' . $suffix,
			'parent' => sanitize_key( $parent ),
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-sitehealth-manager' . $suffix,
			'parent' => 'group-sitehealth-manager' . $suffix,
			'title'  => esc_attr__( 'Site Health Manager', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'tools.php?page=site-health-manager' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Site Health Manager for Status &amp; Info Tabs', 'toolbar-extras' ),
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbex-sitehealth-manager' . $suffix . '-status',
				'parent' => 'tbex-sitehealth-manager' . $suffix,
				'title'  => esc_attr__( 'Manage Status', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'tools.php?page=site-health-manager&tab=status' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Manage Site Health Status Items/ Tests', 'toolbar-extras' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbex-sitehealth-manager' . $suffix . '-info',
				'parent' => 'tbex-sitehealth-manager' . $suffix,
				'title'  => esc_attr__( 'Manage Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'tools.php?page=site-health-manager&tab=info' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Manage Site Health Debug Info Items', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-sitehealth-manager-resources' . $suffix,
					'parent' => 'tbex-sitehealth-manager' . $suffix,
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'sitehealth-manager-support' . $suffix,
				'group-sitehealth-manager-resources' . $suffix,
				'https://wordpress.org/support/plugin/site-health-manager'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'sitehealth-manager-translate' . $suffix,
				'group-sitehealth-manager-resources' . $suffix,
				'https://translate.wordpress.org/projects/wp-plugins/site-health-manager'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_maybe_site_health_manager', 500 );
/**
 * Items for Plugin: Site Health Manager (free, by Rami Yushuvaev)
 *
 * @since 1.4.4
 *
 * @uses ddw_tbex_is_wp52_install()
 * @uses ddw_tbex_aoitems_site_health_manager()
 * @uses ddw_tbex_is_addon_mainwp_active()
 */
function ddw_tbex_site_items_maybe_site_health_manager() {

	/** Bail early if conditions not met */
	if ( ! ddw_tbex_is_wp52_install()
		|| ! apply_filters( 'tbex_filter_site_health_items', TRUE )
		|| ( ! is_multisite() && ! current_user_can( 'install_plugins' ) )
		|| ( is_multisite() && ! current_user_can( 'setup_network' ) )
	) {
		return;
	}

	/** For place: WP Core Site Health (Site Group) */
	ddw_tbex_aoitems_site_health_manager( 'wpcoresh', 'wp-sitehealth' );

	/** Optional: For MainWP Add-On (Server Info Group) */
	if ( ddw_tbex_is_addon_mainwp_active() ) {
		ddw_tbex_aoitems_site_health_manager( 'mwpserverinfo', 'tbexmwp-server-sitehealth' );
	}

}  // end function
