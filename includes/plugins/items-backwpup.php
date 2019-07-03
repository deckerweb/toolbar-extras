<?php

// includes/plugins/items-backwpup

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_backwpup' );
/**
 * Items for Plugin: BackWPup (free, by Inpsyde GmbH)
 *
 * @since 1.3.2
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_backwpup() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tools-backwpup',
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr__( 'BackWPup', 'toolbar-extras' ),
			'href'   => esc_url( network_admin_url( 'admin.php?page=backwpupjobs' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'BackWPup', 'toolbar-extras' )
			)
		)
	);

		/**
		 * Add each individual backup job as an item. Database query is necessary.
		 * @since 1.3.2
		 */
		$jobs = BackWPup_Option::get_job_ids();

		/** Proceed only if there are any backup jobs */
		if ( $jobs ) {

			/** Add group */
			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-backwpup-jobs',
					'parent' => 'tools-backwpup'
				)
			);

			foreach ( $jobs as $job_id ) {

				$job_title = esc_attr( BackWPup_Option::get( $job_id, 'name' ) );

				/** Add item per install */
				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'backwpup-job-' . $job_id,
						'parent' => 'group-backwpup-jobs',
						'title'  => $job_title,
						'href'   => wp_nonce_url( network_admin_url( 'admin.php?page=backwpupeditjob&jobid=' . $job_id ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Edit Job', 'toolbar-extras' ) . ': ' . $job_title
						)
					)
				);

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'backwpup-job-' . $job_id . '-edit',
							'parent' => 'backwpup-job-' . $job_id,
							'title'  => esc_attr__( 'Edit', 'toolbar-extras' ),
							'href'   => wp_nonce_url( network_admin_url( 'admin.php?page=backwpupeditjob&jobid=' . $job_id ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Edit', 'toolbar-extras' )
							)
						)
					);

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'backwpup-job-' . $job_id . '-run',
							'parent' => 'backwpup-job-' . $job_id,
							'title'  => esc_attr__( 'Run Now', 'toolbar-extras' ),
							'href'   => wp_nonce_url( network_admin_url( 'admin.php?jobid=' . $job_id . '&page=backwpupjobs&action=runnow' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Run Now', 'toolbar-extras' )
							)
						)
					);

			}  // end foreach

		}  // end if

		/** Backup Jobs */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'backwpup-jobs',
				'parent' => 'tools-backwpup',
				'title'  => esc_attr__( 'Backup Jobs', 'toolbar-extras' ),
				'href'   => esc_url( network_admin_url( 'admin.php?page=backwpupjobs' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Backup Jobs', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'backwpup-jobs-all',
					'parent' => 'backwpup-jobs',
					'title'  => esc_attr__( 'All Jobs', 'toolbar-extras' ),
					'href'   => esc_url( network_admin_url( 'admin.php?page=backwpupjobs' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Jobs', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'backwpup-jobs-new',
					'parent' => 'backwpup-jobs',
					'title'  => esc_attr__( 'New Job', 'toolbar-extras' ),
					'href'   => esc_url( network_admin_url( 'admin.php?page=backwpupeditjob' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Job', 'toolbar-extras' )
					)
				)
			);

		/** Backup Downloads */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'backwpup-backups',
				'parent' => 'tools-backwpup',
				'title'  => esc_attr__( 'All Backups', 'toolbar-extras' ),
				'href'   => esc_url( network_admin_url( 'admin.php?page=backwpupbackups' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Backups', 'toolbar-extras' )
				)
			)
		);

		/** Log Files */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'backwpup-logs',
				'parent' => 'tools-backwpup',
				'title'  => esc_attr__( 'All Log Files', 'toolbar-extras' ),
				'href'   => esc_url( network_admin_url( 'admin.php?page=backwpuplogs' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Log Files', 'toolbar-extras' )
				)
			)
		);

		/** Settings */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'backwpup-settings',
				'parent' => 'tools-backwpup',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( network_admin_url( 'admin.php?page=backwpupsettings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'backwpup-settings-general',
					'parent' => 'backwpup-settings',
					'title'  => esc_attr__( 'General', 'toolbar-extras' ),
					'href'   => esc_url( network_admin_url( 'admin.php?page=backwpupsettings#backwpup-tab-general' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'General', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'backwpup-settings-jobs',
					'parent' => 'backwpup-settings',
					'title'  => esc_attr__( 'Jobs', 'toolbar-extras' ),
					'href'   => esc_url( network_admin_url( 'admin.php?page=backwpupsettings#backwpup-tab-job' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Jobs', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'backwpup-settings-logs',
					'parent' => 'backwpup-settings',
					'title'  => esc_attr__( 'Log Files', 'toolbar-extras' ),
					'href'   => esc_url( network_admin_url( 'admin.php?page=backwpupsettings#backwpup-tab-log' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Log Files', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'backwpup-settings-network',
					'parent' => 'backwpup-settings',
					'title'  => esc_attr__( 'Network', 'toolbar-extras' ),
					'href'   => esc_url( network_admin_url( 'admin.php?page=backwpupsettings#backwpup-tab-net' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Network', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'backwpup-settings-api',
					'parent' => 'backwpup-settings',
					'title'  => esc_attr__( 'API Keys', 'toolbar-extras' ),
					'href'   => esc_url( network_admin_url( 'admin.php?page=backwpupsettings#backwpup-tab-apikey' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'API Keys', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'backwpup-settings-systeminfo',
					'parent' => 'backwpup-settings',
					'title'  => esc_attr__( 'System Info', 'toolbar-extras' ),
					'href'   => esc_url( network_admin_url( 'admin.php?page=backwpupsettings#backwpup-tab-information' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'System Info', 'toolbar-extras' )
					)
				)
			);

		/** Plugin Info (Dashboard) */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'backwpup-info',
				'parent' => 'tools-backwpup',
				'title'  => esc_attr__( 'Plugin Info', 'toolbar-extras' ),
				'href'   => esc_url( network_admin_url( 'admin.php?page=backwpup' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Plugin Info', 'toolbar-extras' )
				)
			)
		);

		/** Optionally, let other BackWPup Add-Ons hook in */
		do_action( 'tbex_after_backwpup_settings' );

		/** Group: Resources for BackWPup */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-backwpup-resources',
					'parent' => 'tools-backwpup',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'backwpup-support',
				'group-backwpup-resources',
				'https://wordpress.org/support/plugin/backwpup'
			);

			ddw_tbex_resource_item(
				'documentation',
				'backwpup-docs',
				'group-backwpup-resources',
				'https://backwpup.com/docs/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'backwpup-translate',
				'group-backwpup-resources',
				'https://translate.wordpress.org/projects/wp-plugins/backwpup'
			);

			ddw_tbex_resource_item(
				'github',
				'backwpup-github',
				'group-backwpup-resources',
				'https://github.com/inpsyde/backwpup'
			);

			ddw_tbex_resource_item(
				'official-site',
				'backwpup-site',
				'group-backwpup-resources',
				'https://backwpup.com/'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_new_content_backwpup', 100 );
/**
 * Items for "New Content" section: New BackWPup Job
 *
 * @since 1.3.2
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_new_content_backwpup() {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() ) {
		return;
	}

	if ( ddw_tbex_display_items_dev_mode() ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbex-backwpup-job',
				'parent' => 'new-content',
				'title'  => esc_attr__( 'BackWPup Job', 'toolbar-extras' ),
				'href'   => esc_url( network_admin_url( 'admin.php?page=backwpupeditjob' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => ddw_tbex_string_add_new_item( __( 'BackWPup Job', 'toolbar-extras' ) )
				)
			)
		);

	}  // end if

}  // end function
