<?php

// includes/plugins/items-shortpixel-image-optimizer

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_shortpixel_image_optimizer' );
/**
 * Site Group Items from Plugin:
 *   ShortPixel Image Optimizer (free, by ShortPixel)
 *
 * @since 1.4.3
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_shortpixel_image_optimizer( $admin_bar ) {

	$admin_bar->add_node(
		array(
			'id'     => 'media-shortpixel',
			'parent' => 'manage-content-media',
			'title'  => esc_attr__( 'ShortPixel Optimizer', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'upload.php?page=wp-short-pixel-bulk' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'ShortPixel Image Optimizer', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'media-shortpixel-bulk',
				'parent' => 'media-shortpixel',
				'title'  => esc_attr__( 'Bulk Optimization', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'upload.php?page=wp-short-pixel-bulk' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Bulk Optimization', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'media-shortpixel-stats',
				'parent' => 'media-shortpixel',
				'title'  => esc_attr__( 'Statistics', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=wp-shortpixel#stats' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Statistics', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'media-shortpixel-settings-general',
				'parent' => 'media-shortpixel',
				'title'  => esc_attr__( 'General Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=wp-shortpixel#settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'General Settings', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'media-shortpixel-settings-advanced',
				'parent' => 'media-shortpixel',
				'title'  => esc_attr__( 'Advanced Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=wp-shortpixel#adv-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Advanced Settings', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'media-shortpixel-cloudflare',
				'parent' => 'media-shortpixel',
				'title'  => esc_attr__( 'Cloudflare API', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=wp-shortpixel#cloudflare' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Cloudflare API', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-shortpixel-resources',
					'parent' => 'media-shortpixel',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'mediashortpixel-support',
				'group-shortpixel-resources',
				'https://wordpress.org/support/plugin/shortpixel-image-optimiser'
			);

			ddw_tbex_resource_item(
				'documentation',
				'mediashortpixel-docs',
				'group-shortpixel-resources',
				'https://shortpixel.helpscoutdocs.com/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'mediashortpixel-translate',
				'group-shortpixel-resources',
				'https://translate.wordpress.org/projects/wp-plugins/shortpixel-image-optimiser'
			);

			ddw_tbex_resource_item(
				'github',
				'mediashortpixel-github',
				'group-shortpixel-resources',
				'https://github.com/short-pixel-optimizer/shortpixel-image-optimiser'
			);

			ddw_tbex_resource_item(
				'official-site',
				'mediashortpixel-site',
				'group-shortpixel-resources',
				'https://shortpixel.com/'
			);

		}  // end if

}  // end function
