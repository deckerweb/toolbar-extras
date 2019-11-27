<?php

// includes/block-editor-addons/items-kioken-blocks

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_kioken_blocks', 10 );
/**
 * Site items for Plugin: Kioken Blocks (free, by Kioken Theme)
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_kioken_blocks( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$admin_bar->add_node(
		array(
			'id'     => 'tbex-kiokenblocks',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => esc_attr__( 'Kioken Blocks', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=kioken_blocks' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( esc_attr__( 'Kioken Blocks', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'kiokenblocks-info',
				'parent' => 'tbex-kiokenblocks',
				'title'  => esc_attr__( 'Plugin Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=kioken_blocks' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Plugin Info', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-kiokenblocks-resources',
					'parent' => 'tbex-kiokenblocks',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'kiokenblocks-support',
				'group-kiokenblocks-resources',
				'https://wordpress.org/support/plugin/kioken-blocks'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'kiokenblocks-translate',
				'group-kiokenblocks-resources',
				'https://translate.wordpress.org/projects/wp-plugins/kioken-blocks'
			);

			ddw_tbex_resource_item(
				'official-site',
				'kiokenblocks-site',
				'group-kiokenblocks-resources',
				'https://kiokengutenberg.com/'
			);

		}  // end if

}  // end function
