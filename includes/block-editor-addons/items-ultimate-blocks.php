<?php

// includes/block-editor-addons/items-ultimate-blocks

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_ultimate_blocks', 10 );
/**
 * Site items for Plugin: Ultimate Blocks (free, by Imtiaz Rayhan)
 *
 * @since 1.4.0
 * @since 1.4.3 Added new item & resource.
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_ultimate_blocks( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$admin_bar->add_node(
		array(
			'id'     => 'tbex-ultimateblocks',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => esc_attr__( 'Ultimate Blocks', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=ultimate-blocks-settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( esc_attr__( 'Ultimate Blocks', 'toolbar-extras' ) )
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ultimateblocks-manage',
				'parent' => 'tbex-ultimateblocks',
				'title'  => esc_attr__( 'Manage Blocks', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=ultimate-blocks-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Manage Blocks', 'toolbar-extras' )
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ultimateblocks-info',
				'parent' => 'tbex-ultimateblocks',
				'title'  => esc_attr__( 'Plugin Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=ultimate-blocks-help' ) ),
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
					'id'     => 'group-ultimateblocks-resources',
					'parent' => 'tbex-ultimateblocks',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'ultimateblocks-support',
				'group-ultimateblocks-resources',
				'https://wordpress.org/support/plugin/ultimate-blocks'
			);

			ddw_tbex_resource_item(
				'facebook-group',
				'ultimateblocks-fbgroup',
				'group-ultimateblocks-resources',
				'https://www.facebook.com/groups/ultimateblocks/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'ultimateblocks-translate',
				'group-ultimateblocks-resources',
				'https://translate.wordpress.org/projects/wp-plugins/ultimate-blocks'
			);

			ddw_tbex_resource_item(
				'github',
				'ultimateblocks-github',
				'group-ultimateblocks-resources',
				'https://github.com/imtiazrayhan/Ultimate-Blocks'
			);

			ddw_tbex_resource_item(
				'official-site',
				'ultimateblocks-site',
				'group-ultimateblocks-resources',
				'https://ultimateblocks.com/'
			);

		}  // end if

}  // end function
