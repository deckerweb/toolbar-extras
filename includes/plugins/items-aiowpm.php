<?php

// includes/plugins/items-aiowpm

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_aiowpm', 10 );
/**
 * Items for Plugin: All-in-One WP Migration (free, by ServMask)
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_site_items_aiowpm() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'aiowpm',
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr__( 'AIO WP Migration', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=site-migration-export' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'All-in-One WP Migration', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'aiowpm-export',
				'parent' => 'aiowpm',
				'title'  => esc_attr__( 'Export', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=site-migration-export' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Export', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'aiowpm-import',
				'parent' => 'aiowpm',
				'title'  => esc_attr__( 'Import', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=site-migration-import' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Import', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'aiowpm-backups',
				'parent' => 'aiowpm',
				'title'  => esc_attr__( 'Browse Backups', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=site-migration-backups' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Browse Backups', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for AIO WP Migration */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-aiowpm-resources',
					'parent' => 'aiowpm',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'aiowpm-support',
				'group-aiowpm-resources',
				'https://wordpress.org/support/all-in-one-wp-migration'
			);

			ddw_tbex_resource_item(
				'knowledge-base',
				'aiowpm-kb',
				'group-aiowpm-resources',
				'https://help.servmask.com/knowledgebase/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'aiowpm-translate',
				'group-aiowpm-resources',
				'https://translate.wordpress.org/projects/wp-plugins/all-in-one-wp-migration'
			);

			ddw_tbex_resource_item(
				'official-site',
				'aiowpm-site',
				'group-aiowpm-resources',
				'https://servmask.com/'
			);

		}  // end if

}  // end function
