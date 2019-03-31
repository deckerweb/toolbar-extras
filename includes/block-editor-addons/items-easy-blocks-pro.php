<?php

// includes/block-editor-addons/items-easy-blocks-pro

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_easy_blocks_pro', 10 );
/**
 * Site items for Plugin: Easy Blocks Pro (free, by Seerox)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_easy_blocks_pro( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$admin_bar->add_node(
		array(
			'id'     => 'tbex-easyblockspro',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => esc_attr__( 'Easy Blocks Pro', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=srxgb-setting' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( esc_attr__( 'Easy Blocks Pro', 'toolbar-extras' ) )
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'easyblockspro-options',
				'parent' => 'tbex-easyblockspro',
				'title'  => esc_attr__( 'Activate Blocks', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=srxgb-setting' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Blocks', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-easyblockspro-resources',
					'parent' => 'tbex-easyblockspro',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'easyblockspro-support',
				'group-easyblockspro-resources',
				'https://wordpress.org/support/plugin/easy-blocks-pro'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'easyblockspro-translate',
				'group-easyblockspro-resources',
				'https://translate.wordpress.org/projects/wp-plugins/easy-blocks-pro'
			);

			ddw_tbex_resource_item(
				'official-site',
				'easyblockspro-site',
				'group-easyblockspro-resources',
				'https://easyblocks.pro/'
			);

		}  // end if

}  // end function
