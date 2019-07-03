<?php

// includes/plugins/items-wp-security-audit-log

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_wp_security_audit_log', 100 );
/**
 * Items for Plugin: WP Security Audit Log (free, by WP White Security)
 *
 * @since 1.4.0
 * @since 1.4.4 Added new item.
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_wp_security_audit_log( $admin_bar ) {

	/** Plugin's items */
	$admin_bar->add_node(
		array(
			'id'     => 'wp-security-auditlog',
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr__( 'WP Security Audit Log', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=wsal-auditlog' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'WP Security Audit Log', 'toolbar-extras' )
			)
		)
	);

		/** Logs */
		$admin_bar->add_node(
			array(
				'id'     => 'wp-security-auditlog-logs',
				'parent' => 'wp-security-auditlog',
				'title'  => esc_attr__( 'Activity Logs', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wsal-auditlog' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activity Logs', 'toolbar-extras' )
				)
			)
		);

		/** Enable/ Disable Events */
		$admin_bar->add_node(
			array(
				'id'     => 'wp-security-auditlog-events',
				'parent' => 'wp-security-auditlog',
				'title'  => esc_attr__( 'Enable/ Disable Events', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wsal-togglealerts' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Enable/ Disable Events', 'toolbar-extras' )
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'wp-security-auditlog-events-user',
					'parent' => 'wp-security-auditlog-events',
					'title'  => esc_attr__( 'User Profiles &amp; Activity', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wsal-togglealerts#tab-users-profiles---activity' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'User Profiles &amp; Activity', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'wp-security-auditlog-events-content',
					'parent' => 'wp-security-auditlog-events',
					'title'  => esc_attr__( 'Content &amp; Comments', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wsal-togglealerts#tab-content---comments' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Content &amp; Comments', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'wp-security-auditlog-events-wpinstall',
					'parent' => 'wp-security-auditlog-events',
					'title'  => esc_attr__( 'WordPress Install', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wsal-togglealerts#tab-wordpress-install' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'WordPress Install', 'toolbar-extras' )
					)
				)
			);

			if ( is_multisite() ) {

				$admin_bar->add_node(
					array(
						'id'     => 'wp-security-auditlog-events-multisite',
						'parent' => 'wp-security-auditlog-events',
						'title'  => esc_attr__( 'Multisite Network', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=wsal-togglealerts#tab-multisite-network' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Multisite Network', 'toolbar-extras' )
						)
					)
				);

			}  // end if

			$admin_bar->add_node(
				array(
					'id'     => 'wp-security-auditlog-events-plugins',
					'parent' => 'wp-security-auditlog-events',
					'title'  => esc_attr__( 'Third Party Plugins', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wsal-togglealerts#tab-third-party-plugins' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Third Party Plugins', 'toolbar-extras' )
					)
				)
			);

		/** Settings */
		$admin_bar->add_node(
			array(
				'id'     => 'wp-security-auditlog-settings',
				'parent' => 'wp-security-auditlog',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wsal-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'wp-security-auditlog-settings-general',
					'parent' => 'wp-security-auditlog-settings',
					'title'  => esc_attr__( 'General', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wsal-settings&tab=general' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'General', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'wp-security-auditlog-settings-activity-log',
					'parent' => 'wp-security-auditlog-settings',
					'title'  => esc_attr__( 'Activity Log', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wsal-settings&tab=audit-log' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Activity Log', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'wp-security-auditlog-settings-file-changes',
					'parent' => 'wp-security-auditlog-settings',
					'title'  => esc_attr__( 'File Integrity Scan', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wsal-settings&tab=file-changes' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'File Integrity Scan', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'wp-security-auditlog-settings-exclude-objects',
					'parent' => 'wp-security-auditlog-settings',
					'title'  => esc_attr__( 'Exclude Objects', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wsal-settings&tab=exclude-objects' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Exclude Objects', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'wp-security-auditlog-settings-export-import',
					'parent' => 'wp-security-auditlog-settings',
					'title'  => esc_attr__( 'Export &amp; Import', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wsal-settings&tab=import-settings' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Export &amp; Import', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'wp-security-auditlog-settings-advanced',
					'parent' => 'wp-security-auditlog-settings',
					'title'  => esc_attr__( 'Advanced Settings', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wsal-settings&tab=advanced-settings' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Advanced Settings', 'toolbar-extras' )
					)
				)
			);

		/** System Info */
		$admin_bar->add_node(
			array(
				'id'     => 'wp-security-auditlog-system-info',
				'parent' => 'wp-security-auditlog',
				'title'  => esc_attr__( 'System Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wsal-help#tab-system-info' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'System Info', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-wpsecurityauditlog-resources',
					'parent' => 'wp-security-auditlog',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'wpsecurityauditlog-support',
				'group-wpsecurityauditlog-resources',
				'https://wordpress.org/support/plugin/wp-security-audit-log'
			);

			ddw_tbex_resource_item(
				'documentation',
				'wpsecurityauditlog-docs',
				'group-wpsecurityauditlog-resources',
				'https://www.wpsecurityauditlog.com/support-documentation/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'wpsecurityauditlog-translate',
				'group-wpsecurityauditlog-resources',
				'https://translate.wordpress.org/projects/wp-plugins/wp-security-audit-log'
			);

			ddw_tbex_resource_item(
				'github',
				'wpsecurityauditlog-github',
				'group-wpsecurityauditlog-resources',
				'https://github.com/WPWhiteSecurity/WP-Security-Audit-Log'
			);

			ddw_tbex_resource_item(
				'official-site',
				'wpsecurityauditlog-site',
				'group-wpsecurityauditlog-resources',
				'https://www.wpsecurityauditlog.com/'
			);

		}  // end if

}  // end function
