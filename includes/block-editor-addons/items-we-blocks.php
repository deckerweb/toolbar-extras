<?php

// includes/block-editor-addons/items-we-blocks

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_we_blocks', 10 );
/**
 * Site items for Plugin: WE Blocks (free, by wordpresteem)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_we_blocks( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$admin_bar->add_node(
		array(
			'id'     => 'tbex-weblocks',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => esc_attr__( 'WE Blocks', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=we-blocks' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( esc_attr__( 'WE Blocks', 'toolbar-extras' ) )
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'weblocks-plugin-info',
				'parent' => 'tbex-weblocks',
				'title'  => esc_attr__( 'Plugin Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=we-blocks' ) ),
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
					'id'     => 'group-weblocks-resources',
					'parent' => 'tbex-weblocks',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'weblocks-support',
				'group-weblocks-resources',
				'https://wordpress.org/support/plugin/weblocks'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'weblocks-translate',
				'group-weblocks-resources',
				'https://translate.wordpress.org/projects/wp-plugins/weblocks'
			);

			ddw_tbex_resource_item(
				'github',
				'weblocks-github',
				'group-weblocks-resources',
				'https://github.com/pootlepress/weblocks'
			);

		}  // end if

}  // end function
