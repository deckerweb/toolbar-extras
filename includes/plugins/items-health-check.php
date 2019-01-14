<?php

// includes/plugins/items-health-check

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'tbex_after_site_group_update_check', 'ddw_tbex_site_items_health_check' );
/**
 * Items for Plugin:
 *   Health Check & Troubleshooting (free, by The WordPress.org community)
 *
 * @since 1.0.0
 * @since 1.3.2 Changed Site Status tab URL; added new resources.
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_health_check() {

	/** For: "Tools" */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'health-check',
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr__( 'Health Check', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'index.php?page=health-check' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Health Check', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'health-check-system',
				'parent' => 'health-check',
				'title'  => esc_attr__( 'System Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'index.php?page=health-check&tab=site-status' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'System Info', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'health-check-debug',
				'parent' => 'health-check',
				'title'  => esc_attr__( 'Debugging Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'index.php?page=health-check&tab=debug' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Debugging Info', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'health-check-php',
				'parent' => 'health-check',
				'title'  => esc_attr__( 'PHP Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'index.php?page=health-check&tab=phpinfo' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'PHP Info', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'health-check-troubleshoot',
				'parent' => 'health-check',
				'title'  => esc_attr__( 'Troubleshooting', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'index.php?page=health-check&tab=troubleshoot' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Troubleshooting', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'health-check-tools',
				'parent' => 'health-check',
				'title'  => esc_attr__( 'Tools', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'index.php?page=health-check&tab=tools' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Tools', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for Health Check */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-healthcheck-resources',
					'parent' => 'health-check',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'documentation',
				'healthcheck-docs',
				'group-healthcheck-resources',
				'https://make.wordpress.org/support/handbook/appendix/troubleshooting-using-the-health-check/'
			);

			ddw_tbex_resource_item(
				'support-forum',
				'healthcheck-support',
				'group-healthcheck-resources',
				'https://wordpress.org/support/plugin/health-check'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'healthcheck-translate',
				'group-healthcheck-resources',
				'https://translate.wordpress.org/projects/wp-plugins/health-check'
			);

			ddw_tbex_resource_item(
				'github',
				'healthcheck-github',
				'group-healthcheck-resources',
				'https://github.com/WordPress/health-check'
			);			

		}  // end if

}  // end function
