<?php

// includes/plugins/items-mainwp-child

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if MainWP Child Reports plugin is active or not.
 *
 * @since 1.4.0
 *
 * @return bool TRUE if class exists, FALSE otherwise.
 */
function ddw_tbex_is_mainwp_child_reports_active() {

	return class_exists( 'MainWP_WP_Stream' );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_mainwp_child', 100 );
/**
 * Items for Plugin: MainWP Child (free, by MainWP)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_meta_rel()
 * @uses ddw_tbex_meta_target()
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_site_items_mainwp_child() {

	/** Plugin's items */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'mainwp-child',
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr__( 'MainWP Child', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=mainwp_child_tab' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'MainWP Child Site', 'toolbar-extras' )
			)
		)
	);

		/**
		 * MainWP Dashboard Server
		 *   Quick jump link to MainWP Overview Dashboard
		 */
		$mainwp_dashboard_url  = get_option( 'mainwp_child_server' );
		$mainwp_dashboard_link = '';

		if ( ! empty( $mainwp_dashboard_url ) ) {

			$mainwp_dashboard_link = add_query_arg(
				'page',
				'mainwp_tab',
				$mainwp_dashboard_url . 'admin.php'
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'mainwp-child-mwp-dashboard',
					'parent' => 'mainwp-child',
					'title'  => esc_attr__( 'Dashboard Server', 'toolbar-extras' ),
					'href'   => esc_url( $mainwp_dashboard_link ),
					'meta'   => array(
						'rel'    => ddw_tbex_meta_rel(),
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'MainWP Dashboard Server', 'toolbar-extras' ) . ' &ndash; ' . $mainwp_dashboard_url
					)
				)
			);

		}  // end if

		/** Settings */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mainwp-child-settings',
				'parent' => 'mainwp-child',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=mainwp_child_tab&tab=settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mainwp-child-restore',
				'parent' => 'mainwp-child',
				'title'  => esc_attr__( 'Restore', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=mainwp_child_tab&tab=restore-clone' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Restore', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mainwp-child-serverinfo',
				'parent' => 'mainwp-child',
				'title'  => esc_attr__( 'Server Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=mainwp_child_tab&tab=server-info' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Server Info (for this Child Site)', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mainwp-child-connection',
				'parent' => 'mainwp-child',
				'title'  => esc_attr__( 'Connection Details', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=mainwp_child_tab&tab=connection-detail' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Connection Details', 'toolbar-extras' )
				)
			)
		);

		/** Child Reports Add-On */
		if ( ddw_tbex_is_mainwp_child_reports_active() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'mainwp-child-reports',
					'parent' => 'mainwp-child',
					'title'  => esc_attr__( 'Child Reports', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'options-general.php?page=mainwp-reports-page' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Child Reports', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'mainwp-child-reports-settings',
					'parent' => 'mainwp-child',
					'title'  => esc_attr__( 'Child Reports Settings', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'options-general.php?page=mainwp-reports-settings' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Child Reports Settings', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-mwpchild-resources',
					'parent' => 'mainwp-child',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'mwpchild-support',
				'group-mwpchild-resources',
				'https://wordpress.org/support/plugin/mainwp-child'
			);

			ddw_tbex_resource_item(
				'documentation',
				'mwpchild-docs',
				'group-mwpchild-resources',
				'https://mainwp.com/support/ref/deckerweb/?campaign=tbex-plugin'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'mwpchild-translate',
				'group-mwpchild-resources',
				'https://translate.wordpress.org/projects/wp-plugins/mainwp-child'
			);

			ddw_tbex_resource_item(
				'github',
				'mwpchild-github',
				'group-mwpchild-resources',
				'https://github.com/mainwp/mainwp-child'
			);

			ddw_tbex_resource_item(
				'official-site',
				'mwpchild-site',
				'group-mwpchild-resources',
				'https://mainwp.com/ref/deckerweb/?campaign=tbex-plugin'
			);

		}  // end if

}  // end function
