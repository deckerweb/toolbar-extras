<?php

// includes/block-editor-addons/items-editor-blocks

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_editor_blocks', 10 );
/**
 * Site items for Plugin: Editor Blocks (free, by Editor Blocks/ Danny Cooper)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_editor_blocks( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$admin_bar->add_node(
		array(
			'id'     => 'tbex-editor-blocks',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => esc_attr__( 'Editor Blocks', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=editor-blocks' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( esc_attr__( 'Editor Blocks', 'toolbar-extras' ) )
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'editor-blocks-plugin-info',
				'parent' => 'tbex-editor-blocks',
				'title'  => esc_attr__( 'Plugin Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=editor-blocks' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Plugin Info', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-editorblocks-resources',
					'parent' => 'tbex-editor-blocks',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'editorblocks-support',
				'group-editorblocks-resources',
				'https://wordpress.org/support/plugin/editor-blocks'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'editorblocks-translate',
				'group-editorblocks-resources',
				'https://translate.wordpress.org/projects/wp-plugins/editor-blocks'
			);

			ddw_tbex_resource_item(
				'github',
				'editorblocks-github',
				'group-editorblocks-resources',
				'https://github.com/editorblocks/editor-blocks'
			);

			ddw_tbex_resource_item(
				'official-site',
				'editorblocks-site',
				'group-editorblocks-resources',
				'https://editorblockswp.com/'
			);

		}  // end if

}  // end function
