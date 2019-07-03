<?php

// includes/plugins/items-stream

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_stream', 100 );
/**
 * Items for Plugin: Stream (free, by XWP)
 *
 * @since 1.4.4
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_stream( $admin_bar ) {

	/** Plugin's items */
	$admin_bar->add_node(
		array(
			'id'     => 'tbex-stream',
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr__( 'Stream', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=wp_stream' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Stream', 'toolbar-extras' ),
			)
		)
	);

		/** Logs */
		$admin_bar->add_node(
			array(
				'id'     => 'tbex-stream-logs',
				'parent' => 'tbex-stream',
				'title'  => esc_attr__( 'Activity Logs', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wp_stream' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activity Logs', 'toolbar-extras' ),
				)
			)
		);

		/** Alerts */
		$admin_bar->add_node(
			array(
				'id'     => 'tbex-stream-alerts',
				'parent' => 'tbex-stream',
				'title'  => esc_attr__( 'Alerts', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=wp_stream_alerts' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Alerts - Notifications', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-stream-alerts-all',
					'parent' => 'tbex-stream-alerts',
					'title'  => esc_attr__( 'All Alerts', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=wp_stream_alerts' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Alerts', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-stream-alerts-new',
					'parent' => 'tbex-stream-alerts',
					'title'  => esc_attr__( 'New Alert', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=wp_stream_alerts' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Alert', 'toolbar-extras' ),
					)
				)
			);

		/** Settings */
		$admin_bar->add_node(
			array(
				'id'     => 'tbex-stream-settings',
				'parent' => 'tbex-stream',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wp_stream_settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-stream-settings-general',
					'parent' => 'tbex-stream-settings',
					'title'  => esc_attr__( 'General', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wp_stream_settings&tab=general' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'General Settings', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-stream-settings-exclude',
					'parent' => 'tbex-stream-settings',
					'title'  => esc_attr__( 'Exclude', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wp_stream_settings&tab=exclude' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Exclude Settings', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-stream-settings-advanced',
					'parent' => 'tbex-stream-settings',
					'title'  => esc_attr__( 'Advanced', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wp_stream_settings&tab=advanced' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Advanced Settings', 'toolbar-extras' ),
					)
				)
			);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-stream-resources',
					'parent' => 'tbex-stream',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'tbexstream-support',
				'group-stream-resources',
				'https://wordpress.org/support/plugin/stream'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'tbexstream-translate',
				'group-stream-resources',
				'https://translate.wordpress.org/projects/wp-plugins/stream'
			);

			ddw_tbex_resource_item(
				'github',
				'tbexstream-github',
				'group-stream-resources',
				'https://github.com/xwp/stream'
			);

			ddw_tbex_resource_item(
				'official-site',
				'tbexstream-site',
				'group-stream-resources',
				'https://wp-stream.com/'
			);

		}  // end if

}  // end function
