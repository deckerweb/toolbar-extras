<?php

// includes/plugins/items-compress-images

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_compress_images' );
/**
 * Site Group Items from Plugin: Compress JPEG & PNG Images (free, by TinyPNG)
 *
 * @since 1.4.3
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_compress_images( $admin_bar ) {

	$admin_bar->add_node(
		array(
			'id'     => 'media-compressimg',
			'parent' => 'manage-content-media',
			'title'  => esc_attr__( 'Compress Images', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'upload.php?page=tiny-bulk-optimization' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Compress JPEG & PNG Images', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'media-compressimg-bulk',
				'parent' => 'media-compressimg',
				'title'  => esc_attr__( 'Bulk Optimization', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'upload.php?page=tiny-bulk-optimization' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Bulk Image Optimization', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'media-compressimg-settings',
				'parent' => 'media-compressimg',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=tinify' ) ),
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
					'id'     => 'group-compressimg-resources',
					'parent' => 'media-compressimg',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'mediacompressimg-support',
				'group-compressimg-resources',
				'https://wordpress.org/support/plugin/tiny-compress-images'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'mediacompressimg-translate',
				'group-compressimg-resources',
				'https://translate.wordpress.org/projects/wp-plugins/tiny-compress-images'
			);

			ddw_tbex_resource_item(
				'github',
				'mediacompressimg-github',
				'group-compressimg-resources',
				'https://github.com/tinify/wordpress-plugin'
			);

			ddw_tbex_resource_item(
				'official-site',
				'mediacompressimg-site',
				'group-compressimg-resources',
				'https://tinypng.com/'
			);

		}  // end if

}  // end function
