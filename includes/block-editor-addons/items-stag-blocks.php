<?php

// includes/block-editor-addons/items-stag-blocks

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_stag_blocks', 10 );
/**
 * Site items for Plugin: Stag Blocks (free, by Codestag)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_stag_blocks( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$admin_bar->add_node(
		array(
			'id'     => 'tbex-stagblocks',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => esc_attr__( 'Stag Blocks', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=stag-blocks' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( esc_attr__( 'Stag Blocks', 'toolbar-extras' ) )
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'stagblocks-options',
				'parent' => 'tbex-stagblocks',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=stag-blocks' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-stagblocks-resources',
					'parent' => 'tbex-stagblocks',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'stagblocks-support',
				'group-stagblocks-resources',
				'https://wordpress.org/support/plugin/stag-blocks'
			);

			ddw_tbex_resource_item(
				'documentation',
				'stagblocks-docs',
				'group-stagblocks-resources',
				'https://stagblocks.com/blocks/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'stagblocks-translate',
				'group-stagblocks-resources',
				'https://translate.wordpress.org/projects/wp-plugins/stag-blocks'
			);

			ddw_tbex_resource_item(
				'official-site',
				'stagblocks-site',
				'group-stagblocks-resources',
				'https://stagblocks.com/'
			);

		}  // end if

}  // end function
