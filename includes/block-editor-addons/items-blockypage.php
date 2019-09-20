<?php

// includes/block-editor-addons/items-blockypage

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_blockypage', 10 );
/**
 * Site items for Plugin: BlockyPage Gutenberg Blocks (free, by BlockyPage Team)
 *
 * @since 1.4.7
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_blockypage( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$admin_bar->add_node(
		array(
			'id'     => 'tbex-blockypage',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => esc_attr__( 'BlockyPage', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=blpge_dashboards' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( esc_attr__( 'BlockyPage', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'blockypage-plugin-info',
				'parent' => 'tbex-blockypage',
				'title'  => esc_attr__( 'Plugin Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=blpge_dashboard' ) ),
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
					'id'     => 'group-blockypage-resources',
					'parent' => 'tbex-blockypage',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'blockypage-support',
				'group-blockypage-resources',
				'https://wordpress.org/support/plugin/blockypage'
			);

			ddw_tbex_resource_item(
				'support-contact',
				'blockypage-support-contact',
				'group-blockypage-resources',
				esc_url( admin_url( 'admin.php?page=blpge_dashboard-contact' ) )
			);

			ddw_tbex_resource_item(
				'translations-community',
				'blockypage-translate',
				'group-blockypage-resources',
				'https://translate.wordpress.org/projects/wp-plugins/blockypage'
			);

			ddw_tbex_resource_item(
				'official-site',
				'blockypage-site',
				'group-blockypage-resources',
				'https://www.blockypage.com/'
			);

		}  // end if

}  // end function
