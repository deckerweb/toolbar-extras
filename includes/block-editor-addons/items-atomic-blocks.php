<?php

// includes/block-editor-addons/items-atomic-blocks

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_atomic_blocks', 10 );
/**
 * Site items for Plugin: Atomic Blocks (free, by StudioPress)
 *   (formerly by: Atomic Blocks/ Array Themes)
 *
 * @since 1.4.0
 * @since 1.4.3 Added "Settings" item.
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_atomic_blocks( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$admin_bar->add_node(
		array(
			'id'     => 'tbex-atomic-blocks',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => esc_attr__( 'Atomic Blocks', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=atomic-blocks' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( esc_attr__( 'Atomic Blocks', 'toolbar-extras' ) )
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'atomic-blocks-settings',
				'parent' => 'tbex-atomic-blocks',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=atomic-blocks-plugin-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'atomic-blocks-plugin-info',
				'parent' => 'tbex-atomic-blocks',
				'title'  => esc_attr__( 'Plugin Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=atomic-blocks' ) ),
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
					'id'     => 'group-atomicblocks-resources',
					'parent' => 'tbex-atomic-blocks',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'atomicblocks-support',
				'group-atomicblocks-resources',
				'https://wordpress.org/support/plugin/atomic-blocks'
			);

			ddw_tbex_resource_item(
				'documentation',
				'atomicblocks-docs',
				'group-atomicblocks-resources',
				'https://atomicblocks.com/plugin-help-file'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'atomicblocks-translate',
				'group-atomicblocks-resources',
				'https://translate.wordpress.org/projects/wp-plugins/atomic-blocks'
			);

			ddw_tbex_resource_item(
				'github',
				'atomicblocks-github',
				'group-atomicblocks-resources',
				'https://github.com/studiopress/atomic-blocks'
			);

			ddw_tbex_resource_item(
				'official-site',
				'atomicblocks-site',
				'group-atomicblocks-resources',
				'https://atomicblocks.com/'
			);

		}  // end if

}  // end function
