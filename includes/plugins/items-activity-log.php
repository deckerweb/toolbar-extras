<?php

// includes/plugins/items-activity-log

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_activity_log', 100 );
/**
 * Items for Plugin: Activity Log (free, by Activity Log Team)
 *
 * @since 1.4.4
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_activity_log( $admin_bar ) {

	/** Plugin's items */
	$admin_bar->add_node(
		array(
			'id'     => 'activitylogs',
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr__( 'Activity Log', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=activity_log_page' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Activity Log', 'toolbar-extras' ),
			)
		)
	);

		/** Logs */
		$admin_bar->add_node(
			array(
				'id'     => 'activitylogs-logs',
				'parent' => 'activitylogs',
				'title'  => esc_attr__( 'Activity Logs', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=activity_log_page' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activity Logs', 'toolbar-extras' ),
				)
			)
		);

		/** Settings */
		$admin_bar->add_node(
			array(
				'id'     => 'activitylogs-settings',
				'parent' => 'activitylogs',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wsal-togglealerts' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'activitylogs-settings-general',
					'parent' => 'activitylogs-settings',
					'title'  => esc_attr__( 'General', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=activity-log-settings&aal_section=general' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'General Settings', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'activitylogs-settings-notifications',
					'parent' => 'activitylogs-settings',
					'title'  => esc_attr__( 'Notifications', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=activity-log-settings&aal_section=notifications' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Notification Settings', 'toolbar-extras' ),
					)
				)
			);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-activitylogs-resources',
					'parent' => 'activitylogs',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'activitylogs-support',
				'group-activitylogs-resources',
				'https://wordpress.org/support/plugin/aryo-activity-log'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'activitylogs-translate',
				'group-activitylogs-resources',
				'https://translate.wordpress.org/projects/wp-plugins/aryo-activity-log'
			);

			ddw_tbex_resource_item(
				'github',
				'activitylogs-github',
				'group-activitylogs-resources',
				'https://github.com/pojome/activity-log'
			);

		}  // end if

}  // end function
