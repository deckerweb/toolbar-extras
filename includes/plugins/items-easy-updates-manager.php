<?php

// includes/plugins-forms/items-easy-updates-manager

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'tbex_after_site_group_update_check', 'ddw_tbex_site_items_easy_updates_manager' );
/**
 * Items for Plugin: Easy Updates Manager (free, by Easy Updates Manager Team)
 *
 * @since 1.4.0
 *
 * @see plugin file /includes/items-site-group.php
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_easy_updates_manager() {

	/** For: More stuff */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'easy-updates-manager',
			'parent' => 'tbex-sitegroup-stuff',
			'title'  => esc_attr_x( 'Easy Updates Manager', 'A plugin name', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'index.php?page=mpsum-update-options' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr_x( 'Easy Updates Manager', 'A plugin name', 'toolbar-extras' )
			)
		)
	);

		/** General */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'easy-updates-manager-general',
				'parent' => 'easy-updates-manager',
				'title'  => esc_attr__( 'General Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'index.php?page=mpsum-update-options&tab=general' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'General Settings', 'toolbar-extras' )
				)
			)
		);

		/** Plugins */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'easy-updates-manager-plugins',
				'parent' => 'easy-updates-manager',
				'title'  => esc_attr__( 'Plugin Updates', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'index.php?page=mpsum-update-options&tab=plugins' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Manage Plugin Updates', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'easy-updates-manager-plugins-all',
					'parent' => 'easy-updates-manager-plugins',
					'title'  => esc_attr__( 'All Plugins', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'index.php?page=mpsum-update-options&tab=plugins&view=all' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'View: All Plugins', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'easy-updates-manager-plugins-updates-enabled',
					'parent' => 'easy-updates-manager-plugins',
					'title'  => esc_attr__( 'Updates enabled', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'index.php?page=mpsum-update-options&tab=plugins&view=update_enabled' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'View: Plugins with Updates enabled', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'easy-updates-manager-plugins-updates-disabled',
					'parent' => 'easy-updates-manager-plugins',
					'title'  => esc_attr__( 'Updates disabled', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'index.php?page=mpsum-update-options&tab=plugins&view=update_disabled' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'View: Plugins with Updates disabled', 'toolbar-extras' )
					)
				)
			);

		/** Themes */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'easy-updates-manager-themes',
				'parent' => 'easy-updates-manager',
				'title'  => esc_attr__( 'Theme Updates', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'index.php?page=mpsum-update-options&tab=plugins' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Manage Theme Updates', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'easy-updates-manager-themes-all',
					'parent' => 'easy-updates-manager-themes',
					'title'  => esc_attr__( 'All Themes', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'index.php?page=mpsum-update-options&tab=themes&view=all' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'View: All Themes', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'easy-updates-manager-themes-updates-enabled',
					'parent' => 'easy-updates-manager-themes',
					'title'  => esc_attr__( 'Updates enabled', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'index.php?page=mpsum-update-options&tab=themes&view=update_enabled' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'View: Themes with Updates enabled', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'easy-updates-manager-themes-updates-disabled',
					'parent' => 'easy-updates-manager-themes',
					'title'  => esc_attr__( 'Updates disabled', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'index.php?page=mpsum-update-options&tab=themes&view=update_disabled' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'View: Themes with Updates disabled', 'toolbar-extras' )
					)
				)
			);

		/** Logs */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'easy-updates-manager-logs',
				'parent' => 'easy-updates-manager',
				'title'  => esc_attr__( 'Logs', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'index.php?page=mpsum-update-options&tab=logs' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Logs', 'toolbar-extras' )
				)
			)
		);

		/** Advanced */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'easy-updates-manager-advanced',
				'parent' => 'easy-updates-manager',
				'title'  => esc_attr__( 'Advanced Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'index.php?page=mpsum-update-options&tab=advanced' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Advanced Settings', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-easyupdatesmanager-resources',
					'parent' => 'easy-updates-manager',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);
			
			ddw_tbex_resource_item(
				'support-forum',
				'easyupdatesmanager-support',
				'group-easyupdatesmanager-resources',
				'https://wordpress.org/support/plugin/stops-core-theme-and-plugin-updates'
			);

			ddw_tbex_resource_item(
				'documentation',
				'easyupdatesmanager-docs',
				'group-easyupdatesmanager-resources',
				'https://easyupdatesmanager.com/documentation/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'easyupdatesmanager-translate',
				'group-easyupdatesmanager-resources',
				'https://translate.wordpress.org/projects/wp-plugins/stops-core-theme-and-plugin-updates'
			);

			ddw_tbex_resource_item(
				'official-site',
				'easyupdatesmanager-site',
				'group-easyupdatesmanager-resources',
				'https://easyupdatesmanager.com/'
			);

		}  // end if

}  // end function
