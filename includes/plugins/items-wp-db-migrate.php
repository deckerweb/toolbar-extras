<?php

// dev-mode
// includes/plugins/items-wp-db-migrate

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_wpmigratedb', 19 );
/**
 * Items for Plugin: WP Migrate DB (Pro) (free/Premium, by Delicious Brains)
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_site_items_wpmigratedb() {

	$type = function_exists( 'wp_migrate_db_pro_loaded' ) ? '-pro' : '';

	/** For: Site Group - More Stuff */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'wpdbmigrate',
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr__( 'DB Migrate', 'toolbar-extras' ),
			'href'   => is_multisite() ? esc_url( network_admin_url( 'settings.php?page=wp-migrate-db' . $type ) ) : esc_url( admin_url( 'tools.php?page=wp-migrate-db' . $type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'DB Migrate', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'wpdbmigrate-migrate',
				'parent' => 'wpdbmigrate',
				'title'  => esc_attr__( 'Migrate', 'toolbar-extras' ),
				'href'   => is_multisite() ? esc_url( network_admin_url( 'settings.php?page=wp-migrate-db' . $type . '#migrate' ) ) : esc_url( admin_url( 'tools.php?page=wp-migrate-db' . $type . '#migrate' ) ),
				'meta'   => array(
					'class'  => 'js-action-link migrate',
					'target' => '',
					'title'  => esc_attr__( 'Migrate', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'wpdbmigrate-settings',
				'parent' => 'wpdbmigrate',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => is_multisite() ? esc_url( network_admin_url( 'settings.php?page=wp-migrate-db' . $type . '#settings' ) ) : esc_url( admin_url( 'tools.php?page=wp-migrate-db' . $type . '#settings' ) ),
				'meta'   => array(
					'class'  => 'js-action-link settings',
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'wpdbmigrate-help',
				'parent' => 'wpdbmigrate',
				'title'  => esc_attr__( 'Help', 'toolbar-extras' ),
				'href'   => is_multisite() ? esc_url( network_admin_url( 'settings.php?page=wp-migrate-db' . $type . '#help' ) ) : esc_url( admin_url( 'tools.php?page=wp-migrate-db' . $type . '#help' ) ),
				'meta'   => array(
					'class'  => 'js-action-link help',
					'target' => '',
					'title'  => esc_attr__( 'Help', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for WP Migrate DB */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-wpdbmigrate-resources',
					'parent' => 'wpdbmigrate',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			if ( function_exists( 'wp_migrate_db_pro_loaded' ) ) {

				ddw_tbex_resource_item(
					'documentation',
					'wpdbmigrate-docs',
					'group-wpdbmigrate-resources',
					'https://deliciousbrains.com/wp-migrate-db-pro/docs/getting-started/'
				);

				ddw_tbex_resource_item(
					'youtube-tutorials',
					'wpdbmigrate-videos',
					'group-wpdbmigrate-resources',
					'https://www.youtube.com/watch?v=qvireFZ3j9A&list=PL8Vxqv_9RZB5obYEO97DlIpFfpZB98_j_'
				);

				ddw_tbex_resource_item(
					'my-account',
					'wpdbmigrate-account',
					'group-wpdbmigrate-resources',
					'https://deliciousbrains.com/my-account/'
				);

				ddw_tbex_resource_item(
					'official-site',
					'wpdbmigrate-site',
					'group-wpdbmigrate-resources',
					'https://deliciousbrains.com/wp-migrate-db-pro/'
				);

			} else {

				ddw_tbex_resource_item(
					'support-forum',
					'wpdbmigrate-support',
					'group-wpdbmigrate-resources',
					'https://wordpress.org/support/plugin/wp-migrate-db'
				);

				ddw_tbex_resource_item(
					'documentation',
					'wpdbmigrate-docs',
					'group-wpdbmigrate-resources',
					'https://wordpress.org/plugins/wp-migrate-db/#faq'
				);

				ddw_tbex_resource_item(
					'translations-community',
					'wpdbmigrate-translate',
					'group-wpdbmigrate-resources',
					'https://translate.wordpress.org/projects/wp-plugins/wp-migrate-db'
				);

				ddw_tbex_resource_item(
					'github',
					'wpdbmigrate-github',
					'group-wpdbmigrate-resources',
					'https://github.com/deliciousbrains/wp-migrate-db'
				);

			}  // end if Pro version check

		}  // end if

}  // end function
