<?php

// includes/elementor-addons/items-gt3-elementor-photo-gallery

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_gt3_elementor_photo_gallery', 150 );
/**
 * Items for Add-On: GT3 Elementor Photo Gallery (free, by GT3 Themes)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_gt3_elementor_photo_gallery( $admin_bar ) {

	$post_type = 'gt3_gallery';

	$admin_bar->add_node(
		array(
			'id'     => 'ao-gt3elegallery',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'GT3 Galleries', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $post_type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'GT3 Galleries', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-gt3elegallery-all',
				'parent' => 'ao-gt3elegallery',
				'title'  => esc_attr__( 'All Galleries', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $post_type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Galleries', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-gt3elegallery-new',
				'parent' => 'ao-gt3elegallery',
				'title'  => esc_attr__( 'New Gallery', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $post_type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Gallery', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-gt3elegallery-resources',
					'parent' => 'ao-gt3elegallery',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'gt3elegallery-support',
				'group-gt3elegallery-resources',
				'https://wordpress.org/support/plugin/gt3-elementor-photo-gallery'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'gt3elegallery-translate',
				'group-gt3elegallery-resources',
				'https://translate.wordpress.org/projects/wp-plugins/gt3-elementor-photo-gallery'
			);

		}  // end if

}  // end function
