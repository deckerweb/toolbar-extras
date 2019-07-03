<?php

// includes/plugins/items-wpsynchro

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_wpsynchro' );
/**
 * Items for Plugin: WP Synchro (free, by WPSynchro)
 *
 * @since 1.3.2
 * @since 1.4.0 Added new sub items.
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_wpsynchro( $admin_bar ) {

	/** For: Dev Mode */
	$admin_bar->add_node(
		array(
			'id'     => 'wpsynchro',
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr__( 'WP Synchro', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=wpsynchro_menu' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'WP Synchro', 'toolbar-extras' )
			)
		)
	);

		/**
		 * Add each individual install as an item. Database query is necessary.
		 * @since 1.3.2
		 */
        $install_factory = $GLOBALS[ 'wpsynchro_container' ]->get( 'class.InstallationFactory' );
        $installs        = $install_factory->getAllInstallations();

		/** Proceed only if there are any installs */
		if ( $installs ) {

			/** Add group */
			$admin_bar->add_group(
				array(
					'id'     => 'group-wpsynchro-installs',
					'parent' => 'wpsynchro'
				)
			);

			foreach ( $installs as $install ) {

				$install_title  = esc_attr( $install->name );

				/** Add item per install */
				$admin_bar->add_node(
					array(
						'id'     => 'wpsynchro-install-' . $install->id,
						'parent' => 'group-wpsynchro-installs',
						'title'  => $install_title,
						'href'   => esc_url( admin_url( 'admin.php?page=wpsynchro_addedit&syncid=' . $install->id ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Edit Installation', 'toolbar-extras' ) . ': ' . $install_title
						)
					)
				);

					$admin_bar->add_node(
						array(
							'id'     => 'wpsynchro-install-' . $install->id . '-edit',
							'parent' => 'wpsynchro-install-' . $install->id,
							'title'  => esc_attr__( 'Edit', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=wpsynchro_addedit&syncid=' . $install->id ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Edit', 'toolbar-extras' )
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'wpsynchro-install-' . $install->id . '-run',
							'parent' => 'wpsynchro-install-' . $install->id,
							'title'  => esc_attr__( 'Run Now', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=wpsynchro_run&syncid=' . $install->id . '&jobid=' . uniqid() ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Run Now', 'toolbar-extras' )
							)
						)
					);

			}  // end foreach

		}  // end if

		/** General WPSynchro items */
		$admin_bar->add_node(
			array(
				'id'     => 'wpsynchro-installs',
				'parent' => 'wpsynchro',
				'title'  => esc_attr__( 'Sync Installs', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wpsynchro_overview' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Sync Installs', 'toolbar-extras' )
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'wpsynchro-installs-all',
					'parent' => 'wpsynchro-installs',
					'title'  => esc_attr__( 'All Sync Jobs', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wpsynchro_overview' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Sync Jobs', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'wpsynchro-installs-pull',
					'parent' => 'wpsynchro-installs',
					'title'  => esc_attr__( 'PULL Jobs', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wpsynchro_overview&type=PULL&paged=1' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'PULL Jobs', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'wpsynchro-installs-push',
					'parent' => 'wpsynchro-installs',
					'title'  => esc_attr__( 'PUSH Jobs', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wpsynchro_overview&type=PUSH&paged=1' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'PUSH Jobs', 'toolbar-extras' )
					)
				)
			);

		$admin_bar->add_node(
			array(
				'id'     => 'wpsynchro-installs-new',
				'parent' => 'wpsynchro',
				'title'  => esc_attr__( 'Add New Install', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wpsynchro_addedit' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Add New Install', 'toolbar-extras' )
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'wpsynchro-logs',
				'parent' => 'wpsynchro',
				'title'  => esc_attr__( 'Logs', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wpsynchro_log' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Logs', 'toolbar-extras' )
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'wpsynchro-setup',
				'parent' => 'wpsynchro',
				'title'  => esc_attr__( 'Setup', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wpsynchro_setup' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Setup', 'toolbar-extras' )
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'wpsynchro-system-info',
				'parent' => 'wpsynchro',
				'title'  => esc_attr__( 'System Info &amp; Support', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( '/admin.php?page=wpsynchro_support' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'System Info &amp; Support', 'toolbar-extras' )
				)
			)
		);

		/** Optionally, let other WPSynchro Add-Ons hook in */
		do_action( 'tbex_after_wpsynchro_settings' );

		/** Group: Resources for WPSynchro */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-wpsynchro-resources',
					'parent' => 'wpsynchro',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'wpsynchro-support',
				'group-wpsynchro-resources',
				'https://wordpress.org/support/plugin/wpsynchro'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'wpsynchro-translate',
				'group-wpsynchro-resources',
				'https://translate.wordpress.org/projects/wp-plugins/wpsynchro'
			);

			ddw_tbex_resource_item(
				'official-site',
				'wpsynchro-site',
				'group-wpsynchro-resources',
				'https://wpsynchro.com/'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_new_content_wpsynchro', 100 );
/**
 * Items for "New Content" section: New WP Synchro Installation
 *
 * @since 1.3.2
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_new_content_wpsynchro( $admin_bar ) {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() ) {
		return;
	}

	$admin_bar->add_node(
		array(
			'id'     => 'tbex-wpsynchro-install',
			'parent' => 'new-content',
			'title'  => esc_attr__( 'WP Synchro Install', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=wpsynchro_addedit' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_add_new_item( __( 'WP Synchro Install', 'toolbar-extras' ) )
			)
		)
	);

}  // end function
