<?php

// includes/plugins-forms/items-hummingbird

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if Hummingbird Pro plugin version is active or not.
 *
 * @since 1.4.0
 *
 * @return bool TRUE if class exists, FALSE otherwise.
 */
function ddw_tbex_is_hummingbird_pro_active() {

	return class_exists( 'WP_Hummingbird_Pro' );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_hummingbird', 10 );
/**
 * Items for Plugin: Hummingbird (Pro) (free/Premium, by WPMU DEV)
 *
 * @since 1.4.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_hummingbird() {

	$title = ddw_tbex_is_hummingbird_pro_active() ? esc_attr__( 'Hummingbird Pro', 'toolbar-extras' ) : esc_attr__( 'Hummingbird', 'toolbar-extras' );

	/** For: Tools */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'hummingbird-pso',
			'parent' => 'tbex-sitegroup-tools',
			'title'  => $title,
			'href'   => esc_url( admin_url( 'admin.php?page=wphb' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => $title
			)
		)
	);

		/** Dashboard */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'hummingbird-pso-dashboard',
				'parent' => 'hummingbird-pso',
				'title'  => esc_attr__( 'Dashboard', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wphb' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Dashboard', 'toolbar-extras' )
				)
			)
		);

		/** Performance Test */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'hummingbird-pso-performance',
				'parent' => 'hummingbird-pso',
				'title'  => esc_attr__( 'Performance Test', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wphb-performance' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Performance Test', 'toolbar-extras' )
				)
			)
		);

			if ( ddw_tbex_is_hummingbird_pro_active() ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'hummingbird-pso-performance-improve',
						'parent' => 'hummingbird-pso-performance',
						'title'  => esc_attr__( 'Improvements', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=wphb-performance&view=main' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Improvements', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'hummingbird-pso-performance-reports',
						'parent' => 'hummingbird-pso-performance',
						'title'  => esc_attr__( 'Reports', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=wphb-performance&view=reports' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Reports', 'toolbar-extras' )
						)
					)
				);

			}  // end if

		/** Caching */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'hummingbird-pso-caching',
				'parent' => 'hummingbird-pso',
				'title'  => esc_attr__( 'Caching', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wphb-caching' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Caching', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'hummingbird-pso-caching-page',
					'parent' => 'hummingbird-pso-caching',
					'title'  => esc_attr__( 'Page Caching', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wphb-caching&view=main' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Page Caching', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'hummingbird-pso-caching-browser',
					'parent' => 'hummingbird-pso-caching',
					'title'  => esc_attr__( 'Browser Caching', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wphb-caching&view=caching' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Browser Caching', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'hummingbird-pso-caching-gravatar',
					'parent' => 'hummingbird-pso-caching',
					'title'  => esc_attr__( 'Gravatar Caching', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wphb-caching&view=gravatar' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Gravatar Caching', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'hummingbird-pso-caching-rss',
					'parent' => 'hummingbird-pso-caching',
					'title'  => esc_attr__( 'RSS Caching', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wphb-caching&view=rss' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'RSS Caching', 'toolbar-extras' )
					)
				)
			);

		/** GZIP */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'hummingbird-pso-gzip',
				'parent' => 'hummingbird-pso',
				'title'  => esc_attr__( 'Gzip Compression', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wphb-gzip' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Gzip Compression', 'toolbar-extras' )
				)
			)
		);

		/** Asset Optimization */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'hummingbird-pso-assets',
				'parent' => 'hummingbird-pso',
				'title'  => esc_attr__( 'Asset Optimization', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wphb-minification' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Asset Optimization', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'hummingbird-pso-assets-files',
					'parent' => 'hummingbird-pso-assets',
					'title'  => esc_attr__( 'Assets/ Files', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wphb-minification&view=files' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Assets/ Files', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'hummingbird-pso-assets-tools',
					'parent' => 'hummingbird-pso-assets',
					'title'  => esc_attr__( 'Tools', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wphb-minification&view=tools' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Tools', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'hummingbird-pso-assets-settings',
					'parent' => 'hummingbird-pso-assets',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wphb-minification&view=settings' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
					)
				)
			);

		/** Advanced Tools */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'hummingbird-pso-tools',
				'parent' => 'hummingbird-pso',
				'title'  => esc_attr__( 'Advanced Tools', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wphb-advanced' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Advanced Tools', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'hummingbird-pso-tools-general',
					'parent' => 'hummingbird-pso-tools',
					'title'  => esc_attr__( 'General', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wphb-advanced&view=main' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'General', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'hummingbird-pso-tools-database',
					'parent' => 'hummingbird-pso-tools',
					'title'  => esc_attr__( 'Database Cleanup', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wphb-advanced&view=db' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Database Cleanup', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'hummingbird-pso-tools-system',
					'parent' => 'hummingbird-pso-tools',
					'title'  => esc_attr__( 'System Information', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wphb-advanced&view=system' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'System Information', 'toolbar-extras' )
					)
				)
			);

		/** Uptime */
		if ( ddw_tbex_is_hummingbird_pro_active() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'hummingbird-pso-uptime',
					'parent' => 'hummingbird-pso',
					'title'  => esc_attr__( 'Uptime Monitoring', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wphb-uptime' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Uptime Monitoring', 'toolbar-extras' )
					)
				)
			);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'hummingbird-pso-uptime-response',
						'parent' => 'hummingbird-pso-uptime',
						'title'  => esc_attr__( 'Response Time', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=wphb-uptime&view=main' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Response Time', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'hummingbird-pso-uptime-downtime',
						'parent' => 'hummingbird-pso-uptime',
						'title'  => esc_attr__( 'Downtime', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=wphb-uptime&view=downtime' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Downtime', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'hummingbird-pso-uptime-settings',
						'parent' => 'hummingbird-pso-uptime',
						'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=wphb-uptime&view=settings' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
						)
					)
				);

		}  // end if

		/** Advanced Tools */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'hummingbird-pso-settings',
				'parent' => 'hummingbird-pso',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wphb-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-hummingbird-resources',
					'parent' => 'hummingbird-pso',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);
			
			ddw_tbex_resource_item(
				'support-forum',
				'hummingbird-support',
				'group-hummingbird-resources',
				'https://wordpress.org/support/plugin/hummingbird'
			);

			ddw_tbex_resource_item(
				'documentation',
				'hummingbird-docs',
				'group-hummingbird-resources',
				'https://premium.wpmudev.org/docs/wpmu-dev-plugins/hummingbird/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'hummingbird-translate',
				'group-hummingbird-resources',
				'https://translate.wordpress.org/projects/wp-plugins/hummingbird'
			);

			ddw_tbex_resource_item(
				'official-site',
				'hummingbird-site',
				'group-hummingbird-resources',
				'https://premium.wpmudev.org/project/wp-hummingbird/'
			);

		}  // end if

}  // end function
