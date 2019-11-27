<?php

// includes/plugins-forms/items-search-replace

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_search_replace' );
/**
 * Items for Plugin: Search & Replace (free, by Inpsyde GmbH)
 *
 * @since 1.4.9
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_search_replace( $admin_bar ) {

	/** For: Tools */
	$admin_bar->add_node(
		array(
			'id'     => 'tools-searchreplace',
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr__( 'Search &amp; Replace', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'tools.php?page=search-replace' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Search &amp; Replace', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'tools-searchreplace-run',
				'parent' => 'tools-searchreplace',
				'title'  => esc_attr__( 'Search &amp; Replace', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'tools.php?page=search-replace' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Search &amp; Replace (Run the Action)', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'tools-searchreplace-domain',
				'parent' => 'tools-searchreplace',
				'title'  => esc_attr__( 'Replace Domain URL', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'tools.php?page=replace-domain-url' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Replace Domain URL', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'tools-searchreplace-backup',
				'parent' => 'tools-searchreplace',
				'title'  => esc_attr__( 'Backup Database', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'tools.php?page=backup-database' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Backup Database', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'tools-searchreplace-sql-import',
				'parent' => 'tools-searchreplace',
				'title'  => esc_attr__( 'SQL Import', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'tools.php?page=sql-import' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Import SQL Database File', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-searchreplace-resources',
					'parent' => 'tools-searchreplace',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'searchreplace-support-forum',
				'group-searchreplace-resources',
				'https://wordpress.org/support/plugin/search-and-replace'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'searchreplace-translate',
				'group-searchreplace-resources',
				'https://translate.wordpress.org/projects/wp-plugins/search-and-replace'
			);

			ddw_tbex_resource_item(
				'changelog',
				'searchreplace-changelog',
				'group-searchreplace-resources',
				'https://github.com/inpsyde/search-and-replace/blob/master/CHANGELOG.md',
				ddw_tbex_string_version_history( 'plugin' )
			);

			ddw_tbex_resource_item(
				'github-issues',
				'searchreplace-github-issues',
				'group-searchreplace-resources',
				'https://github.com/inpsyde/search-and-replace/issues'
			);

			ddw_tbex_resource_item(
				'github',
				'searchreplace-github',
				'group-searchreplace-resources',
				'https://github.com/inpsyde/search-and-replace'
			);

		}  // end if

}  // end function
