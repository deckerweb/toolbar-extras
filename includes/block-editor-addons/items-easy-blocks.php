<?php

// includes/block-editor-addons/items-easy-blocks

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_easy_blocks', 10 );
/**
 * Site items for Plugin: Easy Blocks for Gutenberg (free, by Liton Arefin)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_aoitems_easy_blocks() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-easyblocks',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => esc_attr__( 'Easy Blocks', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=easy-blocks' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( esc_attr__( 'Easy Blocks', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'easyblocks-plugin-info',
				'parent' => 'tbex-easyblocks',
				'title'  => esc_attr__( 'Plugin Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=easy-blocks#how-to' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Plugin Info', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-easyblocks-resources',
					'parent' => 'tbex-easyblocks',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'easyblocks-support',
				'group-easyblocks-resources',
				'https://wordpress.org/support/plugin/ultimate-blocks-for-gutenberg'
			);

			ddw_tbex_resource_item(
				'documentation',
				'easyblocks-docs',
				'group-easyblocks-resources',
				admin_url( 'admin.php?page=easy-blocks#docs' )
			);

			ddw_tbex_resource_item(
				'translations-community',
				'easyblocks-translate',
				'group-easyblocks-resources',
				'https://translate.wordpress.org/projects/wp-plugins/ultimate-blocks-for-gutenberg'
			);

			ddw_tbex_resource_item(
				'official-site',
				'easyblocks-site',
				'group-easyblocks-resources',
				'https://jeweltheme.com/shop/easy-gutenberg-blocks/'
			);

		}  // end if

}  // end function
