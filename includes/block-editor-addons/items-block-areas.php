<?php

// includes/block-editor-addons/items-block-areas

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_block_areas', 150 );
/**
 * Add-On items for Plugin: Block Areas (free, by The WP Rig Contributors)
 *
 * @since 1.4.7
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_block_areas( $admin_bar ) {

	$post_type = 'block_area';

	$admin_bar->add_node(
		array(
			'id'     => 'tbex-blockareas',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'Block Areas', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $post_type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'Block Areas', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'blockareas-all',
				'parent' => 'tbex-blockareas',
				'title'  => esc_attr__( 'All Areas', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $post_type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Areas', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'blockareas-new',
				'parent' => 'tbex-blockareas',
				'title'  => esc_attr__( 'New Area', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $post_type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Area', 'toolbar-extras' ),
				)
			)
		);

		/** Area categories, via BTC plugin */
		if ( ddw_tbex_is_btcplugin_active() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'blockareas-categories',
					'parent' => 'tbex-blockareas',
					'title'  => ddw_btc_string_template( 'area' ),
					'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=' . $post_type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_html( ddw_btc_string_template( 'area' ) ),
					)
				)
			);

		}  // end if

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-blockareas-resources',
					'parent' => 'tbex-blockareas',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'blockareas-support',
				'group-blockareas-resources',
				'https://wordpress.org/support/plugin/block-areas'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'blockareas-translate',
				'group-blockareas-resources',
				'https://translate.wordpress.org/projects/wp-plugins/block-areas'
			);

			ddw_tbex_resource_item(
				'github',
				'blockareas-github',
				'group-blockareas-resources',
				'https://github.com/wprig/block-areas'
			);

		}  // end if

}  // end function
