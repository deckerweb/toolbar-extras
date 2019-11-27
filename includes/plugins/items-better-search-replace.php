<?php

// includes/plugins-forms/items-better-search-replace

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_better_search_replace' );
/**
 * Items for Plugin: Better Search Replace (free, by Delicious Brains)
 *
 * @since 1.4.9
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_better_search_replace( $admin_bar ) {

	/** For: Tools */
	$admin_bar->add_node(
		array(
			'id'     => 'tools-bettersearchreplace',
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr__( 'Better Search Replace', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'tools.php?page=better-search-replace' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Better Search Replace', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'tools-bettersearchreplace-run',
				'parent' => 'tools-bettersearchreplace',
				'title'  => esc_attr__( 'Search &amp; Replace', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'tools.php?page=better-search-replace&tab=bsr_search_replace' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Search &amp; Replace (Run the Action)', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'tools-bettersearchreplace-settings',
				'parent' => 'tools-bettersearchreplace',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'tools.php?page=better-search-replace&tab=bsr_settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'tools-bettersearchreplace-help',
				'parent' => 'tools-bettersearchreplace',
				'title'  => esc_attr__( 'Help &amp; Troubleshooting', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'tools.php?page=better-search-replace&tab=bsr_help' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Help &amp; Troubleshooting', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-bettersearchreplace-resources',
					'parent' => 'tools-bettersearchreplace',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'bettersearchreplace-support-forum',
				'group-bettersearchreplace-resources',
				'https://wordpress.org/support/plugin/better-search-replace'
			);

			ddw_tbex_resource_item(
				'changelog',
				'bettersearchreplace-changelog',
				'group-bettersearchreplace-resources',
				'https://github.com/deliciousbrains/better-search-replace#changelog',
				ddw_tbex_string_version_history( 'plugin' )
			);

			ddw_tbex_resource_item(
				'translations-community',
				'bettersearchreplace-translate',
				'group-bettersearchreplace-resources',
				'https://translate.wordpress.org/projects/wp-plugins/better-search-replace'
			);

			ddw_tbex_resource_item(
				'github-issues',
				'bettersearchreplace-github-issues',
				'group-bettersearchreplace-resources',
				'https://github.com/deliciousbrains/better-search-replace/issues'
			);

			ddw_tbex_resource_item(
				'github',
				'bettersearchreplace-github',
				'group-bettersearchreplace-resources',
				'https://github.com/deliciousbrains/better-search-replace'
			);

			ddw_tbex_resource_item(
				'official-site',
				'bettersearchreplace-site',
				'group-bettersearchreplace-resources',
				'https://bettersearchreplace.com/'
			);

		}  // end if

}  // end function
