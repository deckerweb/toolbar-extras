<?php

// includes/block-editor-addons/items-cosmic-blocks

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_cosmic_blocks', 10 );
/**
 * Site items for Plugin: Cosmic Blocks (free, by Cosmic WP)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_aoitems_cosmic_blocks() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-cosmicblocks',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => esc_attr__( 'Cosmic Blocks', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=cosmic_wp_blocks' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( esc_attr__( 'Cosmic Blocks', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'cosmicblocks-settings',
				'parent' => 'tbex-cosmicblocks',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=cosmic_wp_blocks' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-cosmicblocks-resources',
					'parent' => 'tbex-cosmicblocks',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'cosmicblocks-support',
				'group-cosmicblocks-resources',
				'https://wordpress.org/support/plugin/cosmic-blocks'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'cosmicblocks-translate',
				'group-cosmicblocks-resources',
				'https://translate.wordpress.org/projects/wp-plugins/cosmic-blocks'
			);

			ddw_tbex_resource_item(
				'official-site',
				'cosmicblocks-site',
				'group-cosmicblocks-resources',
				'https://www.cosmicwp.com/cosmic-blocks'
			);

		}  // end if

}  // end function
