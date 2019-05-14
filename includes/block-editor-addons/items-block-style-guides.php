<?php

// includes/block-editor-addons/items-block-style-guides

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_block_style_guides', 10 );
/**
 * Site items for Plugin:
 *   Block Style Guides for Gutenberg (free, by Robert Gillmer)
 *
 * @since 1.4.3
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_block_style_guides( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$admin_bar->add_node(
		array(
			'id'     => 'tbex-blockstyleguides',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => esc_attr__( 'Block Style Guides', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'tools.php?page=block-style-guides-for-gutenberg' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( esc_attr__( 'Block Style Guides', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'blockstyleguides-settings',
				'parent' => 'tbex-blockstyleguides',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'tools.php?page=block-style-guides-for-gutenberg' ) ),
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
					'id'     => 'group-blockstyleguides-resources',
					'parent' => 'tbex-blockstyleguides',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'blockstyleguides-support',
				'group-blockstyleguides-resources',
				'https://wordpress.org/support/plugin/block-style-guides'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'blockstyleguides-translate',
				'group-blockstyleguides-resources',
				'https://translate.wordpress.org/projects/wp-plugins/block-style-guides'
			);

		}  // end if

}  // end function
