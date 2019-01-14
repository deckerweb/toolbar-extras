<?php

// includes/block-editor-addons/items-wpblocks

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_wpblocks', 10 );
/**
 * Site items for Plugin: WPBlocks (free, by WPBlocks)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_aoitems_wpblocks() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-wpblocks',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => esc_attr__( 'WPBlocks', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=wpblocks-settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( esc_attr__( 'WPBlocks', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'wpblocks-options',
				'parent' => 'tbex-wpblocks',
				'title'  => esc_attr__( 'Activate Blocks', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=wpblocks-settings' ) ),
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
					'id'     => 'group-wpblocks-resources',
					'parent' => 'tbex-wpblocks',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'wpblocks-support',
				'group-wpblocks-resources',
				'https://wordpress.org/support/plugin/wpblocks'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'wpblocks-translate',
				'group-wpblocks-resources',
				'https://translate.wordpress.org/projects/wp-plugins/wpblocks'
			);

			ddw_tbex_resource_item(
				'official-site',
				'wpblocks-site',
				'group-wpblocks-resources',
				'https://wpblocks.io/'
			);

		}  // end if

}  // end function
