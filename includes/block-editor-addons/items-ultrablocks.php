<?php

// includes/block-editor-addons/items-ultrablocks

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_ultrablocks', 10 );
/**
 * Site items for Plugin: UltraBlocks Free/Pro (free/Premium, by FestPlugins)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_aoitems_ultrablocks() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-ultrablocks',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => esc_attr__( 'UltraBlocks', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=fest-ultra-addons-gutenberg' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( esc_attr__( 'UltraBlocks', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ultrablocks-settings',
				'parent' => 'tbex-ultrablocks',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=fest-ultra-addons-gutenberg' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ultrablocks-plugin-info',
				'parent' => 'tbex-ultrablocks',
				'title'  => esc_attr__( 'Plugin Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=fest-ultra-addons-gutenberg-about' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Plugin Info', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ultrablocks-support-contact',
				'parent' => 'tbex-ultrablocks',
				'title'  => esc_attr__( 'Support Contact', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=fest-ultra-addons-gutenberg-support' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Support Contact', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-ultrablocks-resources',
					'parent' => 'tbex-ultrablocks',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'ultrablocks-support',
				'group-ultrablocks-resources',
				'https://wordpress.org/support/plugin/ultra-blocks-free-by-fest'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'ultrablocks-translate',
				'group-ultrablocks-resources',
				'https://translate.wordpress.org/projects/wp-plugins/ultra-blocks-free-by-fest'
			);

			ddw_tbex_resource_item(
				'official-site',
				'ultrablocks-site',
				'group-ultrablocks-resources',
				'https://ultrablocks.festplugins.com/'
			);

		}  // end if

}  // end function
