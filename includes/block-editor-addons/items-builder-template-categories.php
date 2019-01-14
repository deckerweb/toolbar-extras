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


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_block_layouts', 150 );
/**
 * Site items for Plugin: Builder Template Categories (free, by David Decker - DECKERWEB)
 *
 * @since 1.4.0
 *
 * @uses ddw_btc_string_template()
 * @uses ddw_tbex_resource_item()
 * @uses ddw_btc_get_info_url() To build resource URLs (from BTC plugin).
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_aoitems_block_layouts() {

	$post_type = 'wp_block';

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'btc-reusable-blocks',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'Reusable Blocks', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $post_type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'Reusable Blocks', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'btc-reusable-blocks-all',
				'parent' => 'btc-reusable-blocks',
				'title'  => esc_attr__( 'All Reusable Blocks', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $post_type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Reusable Blocks', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'btc-reusable-blocks-categories',
				'parent' => 'btc-reusable-blocks',
				'title'  => ddw_btc_string_template( 'block' ),
				'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=' . $post_type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_html( ddw_btc_string_template( 'block' ) )
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-btcplugin-resources',
					'parent' => 'btc-reusable-blocks',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
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
				'btcplugin-translate',
				'group-btcplugin-resources',
				ddw_btc_get_info_url( 'url_github' )
			);

		}  // end if

}  // end function
