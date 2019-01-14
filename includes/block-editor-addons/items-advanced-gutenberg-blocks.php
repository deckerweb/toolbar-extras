<?php

// includes/block-editor-addons/items-advanced-gutenberg-blocks

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_advanced_gutenberg_blocks', 10 );
/**
 * Site items for Plugin: Advanced Gutenberg Blocks (free, by Maxime Bernard-Jaquet)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_aoitems_advanced_gutenberg_blocks() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'advanced-gutenberg-blocks',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => esc_attr__( 'Adanced Gutenberg Blocks', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=advanced-gutenberg-blocks-manager' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( esc_attr__( 'Advanced Gutenberg Blocks', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'advanced-gutenberg-blocks-manage',
				'parent' => 'advanced-gutenberg-blocks',
				'title'  => esc_attr__( 'Manage Blocks', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=advanced-gutenberg-blocks-manager' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Manage Blocks', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'advanced-gutenberg-blocks-disable-wpblocks',
				'parent' => 'advanced-gutenberg-blocks',
				'title'  => esc_attr__( 'Disable WP Blocks', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=advanced-gutenberg-blocks-disable' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Disable WP Blocks', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'advanced-gutenberg-blocks-tweak-editor',
				'parent' => 'advanced-gutenberg-blocks',
				'title'  => esc_attr__( 'Tweak Editor', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=advanced-gutenberg-blocks-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Tweak Editor', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-agbblocks-resources',
					'parent' => 'advanced-gutenberg-blocks',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'agbblocks-support',
				'group-agbblocks-resources',
				'https://wordpress.org/support/plugin/advanced-gutenberg-blocks'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'agbblocks-translate',
				'group-agbblocks-resources',
				'https://translate.wordpress.org/projects/wp-plugins/advanced-gutenberg-blocks'
			);

			ddw_tbex_resource_item(
				'github',
				'agbblocks-github',
				'group-agbblocks-resources',
				'https://github.com/maximebj/advanced-gutenberg-blocks'
			);

			ddw_tbex_resource_item(
				'official-site',
				'agbblocks-site',
				'group-agbblocks-resources',
				'https://advanced-gutenberg-blocks.com/'
			);

		}  // end if

}  // end function
