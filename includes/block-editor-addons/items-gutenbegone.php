<?php

// includes/block-editor-addons/items-gutenbegone

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_gutenbegone', 10 );
/**
 * Site items for Plugin: GutenBeGone (free, by Lee Rickler)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_aoitems_gutenbegone() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-gutenbegone',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => esc_attr__( 'GutenBeGone', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=GBG_block-settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( esc_attr__( 'GutenBeGone', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'gutenbegone-common-blocks',
				'parent' => 'tbex-gutenbegone',
				'title'  => esc_attr__( 'Common Blocks', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=GBG_block-settings&tab=common_blocks' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Common Blocks', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'gutenbegone-formatting',
				'parent' => 'tbex-gutenbegone',
				'title'  => esc_attr__( 'Formatting', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=GBG_block-settings&tab=formatting' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Formatting', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'gutenbegone-layout-elements',
				'parent' => 'tbex-gutenbegone',
				'title'  => esc_attr__( 'Layout Elements', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=GBG_block-settings&tab=layout_blocks' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Layout Elements', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'gutenbegone-widgets',
				'parent' => 'tbex-gutenbegone',
				'title'  => esc_attr__( 'Widgets', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=GBG_block-settings&tab=widgets' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Widgets', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'gutenbegone-embeds',
				'parent' => 'tbex-gutenbegone',
				'title'  => esc_attr__( 'Embeds', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=GBG_block-settings&tab=embeds' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Embeds', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-gutenbegone-resources',
					'parent' => 'tbex-gutenbegone',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'gutenbegone-support',
				'group-gutenbegone-resources',
				'https://wordpress.org/support/plugin/gutenbegone'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'gutenbegone-translate',
				'group-gutenbegone-resources',
				'https://translate.wordpress.org/projects/wp-plugins/gutenbegone'
			);

		}  // end if

}  // end function
