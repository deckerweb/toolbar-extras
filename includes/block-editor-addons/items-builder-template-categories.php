<?php

// includes/block-editor-addons/items-builder-template-categories

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_builder_template_categories', 150 );
/**
 * Site items for Plugin:
 *   Builder Template Categories (free, by David Decker - DECKERWEB)
 *
 * @since 1.4.0
 * @since 1.4.2 Added resource; tweaks and enhancements.
 *
 * @see plugin file, /includes/block-editor/items-block-editor.php
 *
 * @uses ddw_btc_string_template()
 * @uses ddw_tbex_string_block_editor()
 * @uses ddw_tbex_resource_item()
 * @uses ddw_tbex_get_resource_url()
 * @uses ddw_btc_get_info_url() To build resource URLs (from BTC plugin).
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_builder_template_categories( $admin_bar ) {

	$post_type = 'wp_block';

		$admin_bar->add_node(
			array(
				'id'     => 'btc-reusable-blocks-categories',
				'parent' => 'blockeditor-reusable-blocks',
				'title'  => ddw_btc_string_template( 'block' ),
				'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=' . $post_type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => ddw_tbex_string_block_editor() . ': ' . esc_html( ddw_btc_string_template( 'block' ) )
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-btcplugin-resources',
					'parent' => 'blockeditor-reusable-blocks',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'btcplugin-reusable-blocks',
					'parent' => 'group-btcplugin-resources',
					'title'  => esc_attr__( 'Reusable Blocks', 'toolbar-extras' ),
					'href'   => ddw_tbex_get_resource_url( 'block-editor', 'url_wpb_reusable' ),
					'meta'   => array(
						'rel'    => ddw_tbex_meta_rel(),
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Tutorial', 'toolbar-extras' ) . ': ' . esc_attr__( 'Reusable Blocks', 'toolbar-extras' )
					)
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'btcplugin-support',
				'group-btcplugin-resources',
				ddw_btc_get_info_url( 'url_wporg_forum' )
			);

			ddw_tbex_resource_item(
				'translations-community',
				'btcplugin-translate',
				'group-btcplugin-resources',
				ddw_btc_get_info_url( 'url_translate' )
			);

			ddw_tbex_resource_item(
				'github',
				'btcplugin-github',
				'group-btcplugin-resources',
				ddw_btc_get_info_url( 'url_github' )
			);

		}  // end if

}  // end function
