<?php

// dev-mode
// includes/plugins/items-wp-control

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_wpcrontrol', 50 );
/**
 * Items for Plugin: WP Crontrol (free, by John Blackbourn & crontributors)
 *
 * @since 1.4.7
 *
 * @uses ddw_tbex_rand()
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_wpcrontrol( $admin_bar ) {

	add_filter( 'tbex_filter_is_dev_mode', '__return_empty_string' );

	/** Assists reload when already on settings page */
	$rand = ddw_tbex_rand();

	/** Group */
	$admin_bar->add_group(
		array(
			'id'     => 'group-wpcrontrol',
			'parent' => 'rapid-dev',
			'meta'   => array( 'class' => 'ab-sub-primary' ),
		)
	);

	/** For: Dev Mode */
	$admin_bar->add_node(
		array(
			'id'     => 'wpcrontrol',
			'parent' => 'group-wpcrontrol',
			'title'  => esc_attr__( 'WP Crontrol', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'tools.php?page=crontrol_admin_manage_page' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'WP Crontrol - Manager for WP Cronjobs', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'wpcrontrol-cron-events',
				'parent' => 'wpcrontrol',
				'title'  => esc_attr__( 'WP-Cron Events', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'tools.php?page=crontrol_admin_manage_page' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Manage WP-Cron Events', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'wpcrontrol-cron-events-all',
					'parent' => 'wpcrontrol-cron-events',
					'title'  => esc_attr__( 'All Cron Events', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'tools.php?page=crontrol_admin_manage_page' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All WP-Cron Events', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'wpcrontrol-cron-events-new',
					'parent' => 'wpcrontrol-cron-events',
					'title'  => esc_attr__( 'New Cron Event', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'tools.php?page=crontrol_admin_manage_page&action=new-cron&rand=' . $rand . '#crontrol_form' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New WP-Cron Event', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'wpcrontrol-cron-events-new-php',
					'parent' => 'wpcrontrol-cron-events',
					'title'  => esc_attr__( 'New PHP Cron Event', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'tools.php?page=crontrol_admin_manage_page&action=new-php-cron&rand=' . $rand . '#crontrol_form' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New PHP Cron Event', 'toolbar-extras' ),
					)
				)
			);

		$admin_bar->add_node(
			array(
				'id'     => 'wpcrontrol-manage-schedules',
				'parent' => 'wpcrontrol',
				'title'  => esc_attr__( 'WP-Cron Schedules', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=crontrol_admin_options_page' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Manage WP-Cron Schedules', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-wpcrontrol-resources',
					'parent' => 'wpcrontrol',
					'meta'   => array( 'class' => 'ab-sub-secondary tbex-group-resources-divider' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'wpcrontrol-support',
				'group-wpcrontrol-resources',
				'https://wordpress.org/support/plugin/wp-crontrol'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'wpcrontrol-translate',
				'group-wpcrontrol-resources',
				'https://translate.wordpress.org/projects/wp-plugins/wp-crontrol'
			);

			ddw_tbex_resource_item(
				'github',
				'wpcrontrol-github',
				'group-wpcrontrol-resources',
				'https://github.com/johnbillion/wp-crontrol'
			);

		}  // end if

}  // end function
