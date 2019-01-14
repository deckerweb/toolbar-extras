<?php

// includes/block-editor-addons/items-block-options

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_block_options', 10 );
/**
 * Site items for Plugin: Block Options (free, by Phpbits Creative Studio)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_aoitems_block_options() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-block-options',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => esc_attr__( 'Block Options', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=blockopts_plugin_settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( esc_attr__( 'Block Options', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'block-options-settings',
				'parent' => 'tbex-block-options',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=blockopts_plugin_settings' ) ),
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
					'id'     => 'group-blockoptions-resources',
					'parent' => 'tbex-block-options',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'blockoptions-support',
				'group-blockoptions-resources',
				'https://wordpress.org/support/plugin/block-options'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'blockoptions-translate',
				'group-blockoptions-resources',
				'https://translate.wordpress.org/projects/wp-plugins/block-options'
			);

			ddw_tbex_resource_item(
				'github',
				'blockoptions-github',
				'group-blockoptions-resources',
				'https://github.com/phpbits/block-options'
			);

			ddw_tbex_resource_item(
				'official-site',
				'blockoptions-site',
				'group-blockoptions-resources',
				'https://block-options.com/'
			);

		}  // end if

}  // end function
