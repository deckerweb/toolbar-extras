<?php

// includes/block-editor-addons/items-unregister-gutenberg-blocks

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_unregister_gutenberg_blocks', 10 );
/**
 * Site items for Plugin: Unregister Gutenberg Blocks (free, by Luke Kowalski)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_aoitems_unregister_gutenberg_blocks() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-unregister-gutenberg-blocks',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => esc_attr__( 'Unregister Gutenberg Blocks', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=unregister-gutenberg-blocks' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( esc_attr__( 'Unregister Gutenberg Blocks', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'unregister-gutenberg-blocks-options',
				'parent' => 'tbex-unregister-gutenberg-blocks',
				'title'  => esc_attr__( 'Deactivate Blocks', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=unregister-gutenberg-blocks' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Deactivate Blocks', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-unregister-gutenberg-blocks-resources',
					'parent' => 'tbex-unregister-gutenberg-blocks',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'unregister-gutenberg-blocks-support',
				'group-unregister-gutenberg-blocks-resources',
				'https://wordpress.org/support/plugin/unregister-gutenberg-blocks'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'unregister-gutenberg-blocks-translate',
				'group-unregister-gutenberg-blocks-resources',
				'https://translate.wordpress.org/projects/wp-plugins/unregister-gutenberg-blocks'
			);

			ddw_tbex_resource_item(
				'github',
				'unregister-gutenberg-blocks-github',
				'group-unregister-gutenberg-blocks-resources',
				'https://github.com/wpjsio/unregister-gutenberg-blocks'
			);

		}  // end if

}  // end function
