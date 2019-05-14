<?php

// includes/plugins/items-smush

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_smush' );
/**
 * Site Group Items from Plugin:
 *   Smush Image Compression and Optimization (free, by WPMU DEV)
 *
 * @since 1.4.3
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_smush( $admin_bar ) {

	$admin_bar->add_node(
		array(
			'id'     => 'media-smush',
			'parent' => 'manage-content-media',
			'title'  => esc_attr__( 'Smush Optimizer', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=smush&view=bulk' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Smush Image Optimizer', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'media-smush-bulk',
				'parent' => 'media-smush',
				'title'  => esc_attr__( 'Bulk Smush', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=smush&view=bulk' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Bulk Image Optimization', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'media-smush-directory',
				'parent' => 'media-smush',
				'title'  => esc_attr__( 'Directory Smush', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=smush&view=directory' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Optimize Files in Directories', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'media-smush-integrations',
				'parent' => 'media-smush',
				'title'  => esc_attr__( 'Integrations', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=smush&view=integrations' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Integrations', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'media-smush-cdn',
				'parent' => 'media-smush',
				'title'  => esc_attr__( 'CDN', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=smush&view=cdn' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'CDN (Content Delivery Network)', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'media-smush-lazyload',
				'parent' => 'media-smush',
				'title'  => esc_attr__( 'Lazyload', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=smush&view=lazy_load' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Lazy loading images', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'media-smush-settings',
				'parent' => 'media-smush',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=smush&view=settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-smush-resources',
					'parent' => 'media-smush',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'mediasmush-support',
				'group-smush-resources',
				'https://wordpress.org/support/plugin/wp-smushit'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'mediasmush-translate',
				'group-smush-resources',
				'https://translate.wordpress.org/projects/wp-plugins/wp-smushit'
			);

			ddw_tbex_resource_item(
				'official-site',
				'mediasmush-site',
				'group-smush-resources',
				'https://premium.wpmudev.org/project/wp-smush-pro/'
			);

		}  // end if

}  // end function
