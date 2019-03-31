<?php

// includes/block-editor-addons/items-block-lab

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_block_lab', 150 );
/**
 * Add-On items for Plugin: Block Lab (free, by Block Lab)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_block_lab( $admin_bar ) {

	$post_type = 'block_lab';

	$admin_bar->add_node(
		array(
			'id'     => 'tbex-blocklab',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'Block Lab', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $post_type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'Block Lab', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'blocklab-all',
				'parent' => 'tbex-blocklab',
				'title'  => esc_attr__( 'All Blocks', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $post_type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Blocks', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'blocklab-new',
				'parent' => 'tbex-blocklab',
				'title'  => esc_attr__( 'New Block', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $post_type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Block', 'toolbar-extras' ),
				)
			)
		);

		/** Block categories, via BTC plugin */
		if ( ddw_tbex_is_btcplugin_active() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'blocklab-categories',
					'parent' => 'tbex-blocklab',
					'title'  => ddw_btc_string_template( 'block' ),
					'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=' . $post_type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_html( ddw_btc_string_template( 'block' ) ),
					)
				)
			);

		}  // end if

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-blocklab-resources',
					'parent' => 'tbex-blocklab',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'blocklab-support',
				'group-blocklab-resources',
				'https://wordpress.org/support/plugin/block-lab'
			);

			ddw_tbex_resource_item(
				'documentation',
				'blocklab-docs',
				'group-blocklab-resources',
				'https://github.com/getblocklab/block-lab/wiki'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'blocklab-translate',
				'group-blocklab-resources',
				'https://translate.wordpress.org/projects/wp-plugins/block-lab'
			);

			ddw_tbex_resource_item(
				'github',
				'blocklab-github',
				'group-blocklab-resources',
				'https://github.com/getblocklab/block-lab'
			);

			ddw_tbex_resource_item(
				'official-site',
				'blocklab-site',
				'group-blocklab-resources',
				'https://getblocklab.com/'
			);

		}  // end if

}  // end function
