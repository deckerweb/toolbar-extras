<?php

// includes/block-editor-addons/items-disable-gutenberg-blocks

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_disable_gutenberg_blocks', 10 );
/**
 * Site items for Plugin: Disable Gutenberg Blocks (free, by Danny Cooper)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_aoitems_disable_gutenberg_blocks() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-disable-gutenberg-blocks',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => esc_attr__( 'Disable Gutenberg Blocks', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=disable-blocks' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( esc_attr__( 'Disable Gutenberg Blocks', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'gutenberg-manager-settings',
				'parent' => 'tbex-gutenberg-manager',
				'title'  => esc_attr__( 'Disable Blocks', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=disable-blocks' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Disable Blocks', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-dagblocks-resources',
					'parent' => 'tbex-disable-gutenberg-blocks',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'dagblocks-support',
				'group-dagblocks-resources',
				'https://wordpress.org/support/plugin/disable-gutenberg-blocks'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'dagblocks-translate',
				'group-dagblocks-resources',
				'https://translate.wordpress.org/projects/wp-plugins/disable-gutenberg-blocks'
			);

			ddw_tbex_resource_item(
				'github',
				'dagblocks-github',
				'group-dagblocks-resources',
				'https://github.com/editorblocks/disable-gutenberg-blocks'
			);

		}  // end if

}  // end function
