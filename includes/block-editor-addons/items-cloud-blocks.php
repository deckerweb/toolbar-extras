<?php

// includes/block-editor-addons/items-cloud-blocks

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_cloudblocks', 10 );
/**
 * Site items for Plugin: Cloud Blocks (free, by Frontkom - Fouad Yousefi)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_aoitems_cloudblocks() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-cloud-blocks',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => esc_attr__( 'Cloud Blocks', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=cloud-blocks' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( esc_attr__( 'Editor Blocks', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'cloud-blocks-installer',
				'parent' => 'tbex-cloud-blocks',
				'title'  => esc_attr__( 'Install Blocks', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=cloud-blocks' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Install Blocks', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'cloud-blocks-tools',
				'parent' => 'tbex-cloud-blocks',
				'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=gutenberg-cloud-tools' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-cloudblocks-resources',
					'parent' => 'tbex-cloud-blocks',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'cloudblocks-support',
				'group-cloudblocks-resources',
				'https://wordpress.org/support/plugin/cloud-blocks'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'cloudblocks-translate',
				'group-cloudblocks-resources',
				'https://translate.wordpress.org/projects/wp-plugins/cloud-blocks'
			);

			ddw_tbex_resource_item(
				'github',
				'cloudblocks-github',
				'group-cloudblocks-resources',
				'https://github.com/front/cloud-blocks'
			);

			ddw_tbex_resource_item(
				'official-site',
				'cloudblocks-site',
				'group-cloudblocks-resources',
				'https://gutenbergcloud.org/'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_items_new_content_installer_cloudblocks', 100 );
/**
 * Add "Cloud Blocks" installer below Plugins/ Themes installer items in
 *   "New Content" Group.
 *
 * @since 1.4.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_items_new_content_installer_cloudblocks() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
			'id'     => 'cloudblocks-installer',
			'parent' => 'tbex-installer',
			'title'  => esc_attr__( 'Install Cloud Blocks', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=cloud-blocks' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Install Cloud Blocks - Search via GutenbergCloud.org', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
				'id'     => 'cloudblocks-installer-latest',
				'parent' => 'cloudblocks-installer',
				'title'  => esc_attr__( 'Newest Blocks', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=cloud-blocks&browse=latest' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Newest Blocks added on GutenbergCloud.org', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
				'id'     => 'cloudblocks-installer-popular',
				'parent' => 'cloudblocks-installer',
				'title'  => esc_attr__( 'Popular Blocks', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=cloud-blocks&browse=popular' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Popular Blocks on GutenbergCloud.org', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
				'id'     => 'cloudblocks-installer-installed',
				'parent' => 'cloudblocks-installer',
				'title'  => esc_attr__( 'Installed Blocks', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=cloud-blocks&browse=installed' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Currently Installed Blocks', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
				'id'     => 'cloudblocks-installer-importexport',
				'parent' => 'cloudblocks-installer',
				'title'  => esc_attr__( 'Upload &amp; Export', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=gutenberg-cloud-tools' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Upload &amp; Export Blocks', 'toolbar-extras' )
				)
			)
		);

}  // end function
