<?php

// includes/plugins/items-simple-history

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_simple_history', 100 );
/**
 * Items for Plugin: Simple History (free, by Pär Thernström)
 *
 * @since 1.4.4
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_simple_history( $admin_bar ) {

	/** Plugin's items */
	$admin_bar->add_node(
		array(
			'id'     => 'simple-history-view-history',		// same as original item!
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr__( 'Simple History', 'toolbar-extras' ),
			//'href'   => esc_url( admin_url( 'admin.php?page=activity_log_page' ) ),
			'meta'   => array(
				//'target' => '',
				'title'  => esc_attr__( 'Simple History', 'toolbar-extras' ),
			)
		)
	);

		/** Logs */
		$admin_bar->add_node(
			array(
				'id'     => 'simple-history-view-history-logs',
				'parent' => 'simple-history-view-history',
				'title'  => esc_attr__( 'Activity Logs', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'index.php?page=simple_history_page' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activity Logs', 'toolbar-extras' ),
				)
			)
		);

		/** Settings */
		$admin_bar->add_node(
			array(
				'id'     => 'simple-history-view-history-settings',
				'parent' => 'simple-history-view-history',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=simple_history_settings_menu_slug' ) ),
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
					'id'     => 'group-simplehistory-resources',
					'parent' => 'simple-history-view-history',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'simplehistory-support',
				'group-simplehistory-resources',
				'https://wordpress.org/support/plugin/simple-history'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'simplehistory-translate',
				'group-simplehistory-resources',
				'https://translate.wordpress.org/projects/wp-plugins/simple-history'
			);

			ddw_tbex_resource_item(
				'github',
				'simplehistory-github',
				'group-simplehistory-resources',
				'https://github.com/bonny/WordPress-Simple-History'
			);

			ddw_tbex_resource_item(
				'official-site',
				'simplehistory-site',
				'group-simplehistory-resources',
				'https://simple-history.com/'
			);

		}  // end if

}  // end function
