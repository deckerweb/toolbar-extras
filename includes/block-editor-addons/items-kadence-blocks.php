<?php

// includes/block-editor-addons/items-kadence-blocks

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_kadence_blocks', 10 );
/**
 * Site items for Plugin: Kadence Blocks - Gutenberg Page Builder Toolkit (free, by Kadence Themes)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_aoitems_kadence_blocks() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-kadenceblocks',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => esc_attr__( 'Kadence Blocks', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=kadence_blocks' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( esc_attr__( 'Kadence Blocks', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'kadenceblocks-options',
				'parent' => 'tbex-kadenceblocks',
				'title'  => esc_attr__( 'Activate Blocks', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=kadence_blocks' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Blocks', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-kadenceblocks-resources',
					'parent' => 'tbex-kadenceblocks',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'kadenceblocks-support',
				'group-kadenceblocks-resources',
				'https://wordpress.org/support/plugin/kadence-blocks'
			);

			ddw_tbex_resource_item(
				'documentation',
				'kadenceblocks-docs',
				'group-kadenceblocks-resources',
				'http://docs.kadencethemes.com/kadence-blocks/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'kadenceblocks-translate',
				'group-kadenceblocks-resources',
				'https://translate.wordpress.org/projects/wp-plugins/kadence-blocks'
			);

			ddw_tbex_resource_item(
				'github',
				'kadenceblocks-github',
				'group-kadenceblocks-resources',
				'https://github.com/kadencethemes/kadence-blocks'
			);

		}  // end if

}  // end function
