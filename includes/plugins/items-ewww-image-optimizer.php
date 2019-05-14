<?php

// includes/plugins/items-ewww-image-optimizer

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_ewww_image_optimizer' );
/**
 * Site Group Items from Plugin:
 *   EWWW Image Optimizer (free, by Exactly WWW)
 *
 * @since 1.4.3
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_ewww_image_optimizer( $admin_bar ) {

	$admin_bar->add_node(
		array(
			'id'     => 'media-ewwwio',
			'parent' => 'manage-content-media',
			'title'  => esc_attr__( 'EWWW Optimizer', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'upload.php?page=ewww-image-optimizer-bulk' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'EWWW Image Optimizer', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'media-ewwwio-bulk',
				'parent' => 'media-ewwwio',
				'title'  => esc_attr__( 'Bulk Optimization', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'upload.php?page=ewww-image-optimizer-bulk' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Bulk Image Optimization', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'media-ewwwio-settings',
				'parent' => 'media-ewwwio',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=ewww-image-optimizer/ewww-image-optimizer.php' ) ),
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
					'id'     => 'group-ewwwio-resources',
					'parent' => 'media-ewwwio',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'mediaewwwio-support',
				'group-ewwwio-resources',
				'https://wordpress.org/support/plugin/ewww-image-optimizer'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'mediaewwwio-translate',
				'group-ewwwio-resources',
				'https://translate.wordpress.org/projects/wp-plugins/ewww-image-optimizer'
			);

			ddw_tbex_resource_item(
				'github',
				'mediaewwwio-github',
				'group-ewwwio-resources',
				'https://github.com/nosilver4u/ewww-image-optimizer'
			);

		}  // end if

}  // end function
