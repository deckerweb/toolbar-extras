<?php

// includes/plugins/items-user-activity-log

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_user_activity_log', 100 );
/**
 * Items for Plugin: User Activity Log (free, by Solwin Infotech)
 *
 * @since 1.4.4
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_user_activity_log( $admin_bar ) {

	/** Plugin's items */
	$admin_bar->add_node(
		array(
			'id'     => 'useractivitylogs',
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr__( 'User Activity Log', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=user_action_log' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'User Activity Log', 'toolbar-extras' ),
			)
		)
	);

		/** Logs */
		$admin_bar->add_node(
			array(
				'id'     => 'useractivitylogs-logs',
				'parent' => 'useractivitylogs',
				'title'  => esc_attr__( 'Activity Logs', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=user_action_log' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activity Logs', 'toolbar-extras' ),
				)
			)
		);

		/** Settings */
		$admin_bar->add_node(
			array(
				'id'     => 'useractivitylogs-settings',
				'parent' => 'useractivitylogs',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=general_settings_menu' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-useractivitylogs-resources',
					'parent' => 'useractivitylogs',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'useractivitylogs-support',
				'group-useractivitylogs-resources',
				'https://wordpress.org/support/plugin/user-activity-log'
			);

			ddw_tbex_resource_item(
				'documentation',
				'useractivitylogs-docs',
				'group-useractivitylogs-resources',
				'https://www.solwininfotech.com/documents/wordpress/user-activity-log-lite/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'useractivitylogs-translate',
				'group-useractivitylogs-resources',
				'https://translate.wordpress.org/projects/wp-plugins/user-activity-log'
			);

		}  // end if

}  // end function
