<?php

// includes/block-editor-addons/items-otter-blocks

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_otter_blocks', 10 );
/**
 * Site items for Plugin: Otter Blocks (free, by ThemeIsle)
 *
 * @since 1.4.3
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_otter_blocks( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$admin_bar->add_node(
		array(
			'id'     => 'tbex-otterblocks',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => esc_attr__( 'Otter Blocks', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=otter' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( esc_attr__( 'Otter Blocks', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'otterblocks-settings',
				'parent' => 'tbex-otterblocks',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=otter' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-otterblocks-resources',
					'parent' => 'tbex-otterblocks',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'otterblocks-support',
				'group-otterblocks-resources',
				'https://wordpress.org/support/plugin/otter-blocks'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'otterblocks-translate',
				'group-otterblocks-resources',
				'https://translate.wordpress.org/projects/wp-plugins/otter-blocks'
			);

			ddw_tbex_resource_item(
				'github',
				'otterblocks-github',
				'group-otterblocks-resources',
				'https://github.com/Codeinwp/otter-blocks'
			);

			ddw_tbex_resource_item(
				'official-site',
				'otterblocks-site',
				'group-otterblocks-resources',
				'https://demo.themeisle.com/otter-blocks/'
			);

		}  // end if

}  // end function
