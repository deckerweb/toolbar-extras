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


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_wpdbmigrate', 19 );
/**
 * Items for Plugin: WP DB Migrate (free, by Delicious Brains)
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_display_items_resources()
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_site_items_wpdbmigrate() {

	/** For: Site Group - More Stuff */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'wpdbmigrate',
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr__( 'DB Migrate', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'tools.php?page=wp-migrate-db' ) ),
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
				'href'   => esc_url( admin_url( 'tools.php?page=wp-migrate-db#migrate' ) ),
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
				'href'   => esc_url( admin_url( 'tools.php?page=wp-migrate-db#settings' ) ),
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
				'href'   => esc_url( admin_url( 'tools.php?page=wp-migrate-db#help' ) ),
				'meta'   => array(
					'class'  => 'js-action-link help',
					'target' => '',
					'title'  => esc_attr__( 'Help', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for WP DB Migrate */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar']->add_group(
				array(
					'id'     => 'group-wpdbmigrate-resources',
					'parent' => 'wpdbmigrate',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

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

		}  // end if

}  // end function