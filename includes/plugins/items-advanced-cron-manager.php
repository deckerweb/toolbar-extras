<?php

// dev-mode
// includes/plugins/items-advanced-cron-manager

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_advanced_cron_manager', 50 );
/**
 * Items for Plugin: Advanced Cron Manager (free, by BracketSpace)
 *
 * @since 1.4.7
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_advanced_cron_manager( $admin_bar ) {

	add_filter( 'tbex_filter_is_dev_mode', '__return_empty_string' );

	/** Group */
	$admin_bar->add_group(
		array(
			'id'     => 'group-acronmanager',
			'parent' => 'rapid-dev',
			'meta'   => array( 'class' => 'ab-sub-primary' ),
		)
	);

	/** For: Dev Mode */
	$admin_bar->add_node(
		array(
			'id'     => 'acronmanager',
			'parent' => 'group-acronmanager',
			'title'  => esc_attr__( 'Advanced Cron Manager', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'tools.php?page=advanced-cron-manager' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'WP Crontrol - Manager for WP Cronjobs', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'acronmanager-cron-events',
				'parent' => 'acronmanager',
				'title'  => esc_attr__( 'Manage WP-Cron Events', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'tools.php?page=advanced-cron-manager' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Manage WP-Cron Events', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-acronmanager-resources',
					'parent' => 'acronmanager',
					'meta'   => array( 'class' => 'ab-sub-secondary tbex-group-resources-divider' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'acronmanager-support',
				'group-acronmanager-resources',
				'https://wordpress.org/support/plugin/advanced-cron-manager'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'acronmanager-translate',
				'group-acronmanager-resources',
				'https://translate.wordpress.org/projects/wp-plugins/advanced-cron-manager'
			);

			ddw_tbex_resource_item(
				'github',
				'acronmanager-github',
				'group-acronmanager-resources',
				'https://github.com/BracketSpace/Advanced-Cron-Manager'
			);

		}  // end if

}  // end function
