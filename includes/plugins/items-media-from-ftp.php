<?php

// includes/plugins/items-media-from-ftp

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_media_from_ftp', 15 );
/**
 * Site Group Items from Plugin: Media from FTP (free, by Katsushi Kawamori)
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_display_items_new_content()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_media_from_ftp( $admin_bar ) {

	/** For: Elements */
	$admin_bar->add_group(
		array(
			'id'     => 'group-mediafromftp',
			'parent' => 'manage-content-media',
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'media-mediafromftp',
			'parent' => 'group-mediafromftp',
			'title'  => esc_attr__( 'Media From FTP', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=mediafromftp-search-register' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Media From FTP', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'media-mediafromftp-search-register',
				'parent' => 'media-mediafromftp',
				'title'  => esc_attr__( 'Search &amp; Register', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mediafromftp-search-register' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Search &amp; Register new Files from FTP', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'media-mediafromftp-import',
				'parent' => 'media-mediafromftp',
				'title'  => esc_attr__( 'Import XML Files', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mediafromftp-import' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Import WordPress WXR or XML Files from FTP', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'media-mediafromftp-logs',
				'parent' => 'media-mediafromftp',
				'title'  => esc_attr__( 'Logs', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mediafromftp-log' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Logs', 'toolbar-extras' ),
				)
			)
		);

		/** Settings */
		$admin_bar->add_node(
			array(
				'id'     => 'media-mediafromftp-settings',
				'parent' => 'media-mediafromftp',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mediafromftp-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

			$rand = ddw_tbex_rand();

			$admin_bar->add_node(
				array(
					'id'     => 'media-mediafromftp-settings-register',
					'parent' => 'media-mediafromftp-settings',
					'title'  => esc_attr__( 'Register', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mediafromftp-settings&rand=' . $rand . '#mediafromftp-settings-tabs-1' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Register', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'media-mediafromftp-settings-search',
					'parent' => 'media-mediafromftp-settings',
					'title'  => esc_attr__( 'Search', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mediafromftp-settings&rand=' . $rand . '#mediafromftp-settings-tabs-2' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Search', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'media-mediafromftp-settings-other',
					'parent' => 'media-mediafromftp-settings',
					'title'  => esc_attr__( 'Other', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mediafromftp-settings&rand=' . $rand . '#mediafromftp-settings-tabs-3' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Other', 'toolbar-extras' ),
					)
				)
			);

	/** For: New Content */
	if ( ddw_tbex_display_items_new_content() ) {

		$admin_bar->add_node(
			array(
				'id'     => 'tbex-mediafromftp',
				'parent' => 'new-media',
				'title'  => esc_attr_x( 'Add From Server', 'Toolbar New Content section', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mediafromftp-search-register' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr_x( 'Add From Server', 'Toolbar New Content section', 'toolbar-extras' ),
				)
			)
		);

	}  // end if

	/** Group: Plugin's resources */
	if ( ddw_tbex_display_items_resources() ) {

		$admin_bar->add_group(
			array(
				'id'     => 'group-mediafromftp-resources',
				'parent' => 'media-mediafromftp',
				'meta'   => array( 'class' => 'ab-sub-secondary' ),
			)
		);

		ddw_tbex_resource_item(
			'support-forum',
			'mediafromftp-support',
			'group-mediafromftp-resources',
			'https://wordpress.org/support/plugin/media-from-ftp'
		);

		ddw_tbex_resource_item(
			'translations-community',
			'mediafromftp-translate',
			'group-mediafromftp-resources',
			'https://translate.wordpress.org/projects/wp-plugins/media-from-ftp'
		);

	}  // end if

}  // end function
