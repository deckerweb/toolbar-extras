<?php

// includes/block-editor-addons/items-coblocks

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_coblocks', 10 );
/**
 * Site items for Plugin: CoBlocks (free, by GoDaddy/ CoBlocks)
 *
 * @since 1.4.3
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_coblocks( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$admin_bar->add_node(
		array(
			'id'     => 'tbex-coblocks-plugin',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => 'CoBlocks',
			'href'   => esc_url( admin_url( 'admin.php?page=coblocks-getting-started' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( 'CoBlocks' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'coblocks-plugin-info',
				'parent' => 'tbex-coblocks-plugin',
				'title'  => esc_attr__( 'Plugin Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=coblocks-getting-started' ) ),
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
					'id'     => 'group-coblocksplugin-resources',
					'parent' => 'tbex-coblocks-plugin',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'coblocksplugin-support',
				'group-coblocksplugin-resources',
				'https://wordpress.org/support/plugin/coblocks'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'coblocksplugin-translate',
				'group-coblocksplugin-resources',
				'https://translate.wordpress.org/projects/wp-plugins/coblocks'
			);

			ddw_tbex_resource_item(
				'github',
				'coblocksplugin-github',
				'group-coblocksplugin-resources',
				'https://github.com/godaddy/coblocks'
			);

			ddw_tbex_resource_item(
				'official-site',
				'coblocksplugin-site',
				'group-coblocksplugin-resources',
				'https://coblocks.com/'
			);

		}  // end if

}  // end function
