<?php

// includes/block-editor-addons/items-wpbricks

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_wpbricks', 10 );
/**
 * Site items for Plugin:
 *   WPBricks Readymade Custom Gutenberg Blocks (free, by Multidots)
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_wpbricks( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$admin_bar->add_node(
		array(
			'id'     => 'tbex-wpbricks-plugin',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => 'WPBricks',
			'href'   => esc_url( admin_url( 'admin.php?page=bricks-manager' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( 'WPBricks' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'wpbricks-plugin-info',
				'parent' => 'tbex-wpbricks-plugin',
				'title'  => esc_attr__( 'Plugin Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=bricks-manager' ) ),
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
					'id'     => 'group-wpbricksplugin-resources',
					'parent' => 'tbex-wpbricks-plugin',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'wpbricksplugin-support',
				'group-wpbricksplugin-resources',
				'https://wordpress.org/support/plugin/wpbricks'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'wpbricksplugin-translate',
				'group-wpbricksplugin-resources',
				'https://translate.wordpress.org/projects/wp-plugins/wpbricks'
			);

		}  // end if

}  // end function
