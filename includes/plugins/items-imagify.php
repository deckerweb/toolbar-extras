<?php

// includes/plugins/items-imagify

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_imagify' );
/**
 * Site Group Items from Plugin: Imagify Image Optimizer (free, by WP Media)
 *
 * @since 1.4.3
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_imagify( $admin_bar ) {

	$admin_bar->add_node(
		array(
			'id'     => 'media-imagify',
			'parent' => 'manage-content-media',
			'title'  => esc_attr__( 'Imagify Optimizer', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'upload.php?page=imagify-bulk-optimization' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Imagify Image Optimizer', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'media-imagify-bulk',
				'parent' => 'media-imagify',
				'title'  => esc_attr__( 'Bulk Optimization', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'upload.php?page=imagify-bulk-optimization' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Bulk Optimization', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'media-imagify-other',
				'parent' => 'media-imagify',
				'title'  => esc_attr__( 'Other Media', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'upload.php?page=imagify-files' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Other Media Files', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'media-imagify-settings',
				'parent' => 'media-imagify',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=imagify' ) ),
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
					'id'     => 'group-imagify-resources',
					'parent' => 'media-imagify',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'mediaimagify-support',
				'group-imagify-resources',
				'https://wordpress.org/support/plugin/imagify'
			);

			ddw_tbex_resource_item(
				'documentation',
				'mediaimagify-docs',
				'group-imagify-resources',
				'https://imagify.io/documentation/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'mediaimagify-translate',
				'group-imagify-resources',
				'https://translate.wordpress.org/projects/wp-plugins/imagify'
			);

			ddw_tbex_resource_item(
				'github',
				'mediaimagify-github',
				'group-imagify-resources',
				'https://github.com/wp-media/imagify-plugin'
			);

			ddw_tbex_resource_item(
				'official-site',
				'mediaimagify-site',
				'group-imagify-resources',
				'https://imagify.io/'
			);

		}  // end if

}  // end function
