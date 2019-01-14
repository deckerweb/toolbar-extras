<?php

// includes/block-editor-addons/items-amazon-block

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_amazon_block', 10 );
/**
 * Site items for Plugin: Amazon Block (free, by Ryo Utsunomiya)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_aoitems_amazon_block() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-amazon-block',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => esc_attr__( 'Amazon Block', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=amazonjs' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( esc_attr__( 'Amazon Block', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'amazon-block-settings',
				'parent' => 'tbex-amazon-block',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=amazonjs' ) ),
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
					'id'     => 'group-amazonblock-resources',
					'parent' => 'tbex-amazon-block',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'amazonblock-support',
				'group-amazonblock-resources',
				'https://wordpress.org/support/plugin/add-amazon-block'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'amazonblock-translate',
				'group-amazonblock-resources',
				'https://translate.wordpress.org/projects/wp-plugins/add-amazon-block'
			);

			ddw_tbex_resource_item(
				'github',
				'amazonblock-github',
				'group-amazonblock-resources',
				'https://github.com/ryo-utsunomiya/amazon-block'
			);

		}  // end if

}  // end function
