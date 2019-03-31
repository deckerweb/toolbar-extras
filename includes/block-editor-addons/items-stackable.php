<?php

// includes/block-editor-addons/items-stackable

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_stackable', 10 );
/**
 * Site items for Plugin: Stackable Gutenberg Blocks (free, by Gambit Technologies, Inc.)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_aoitems_stackable() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-stackable',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => esc_attr__( 'Stackable', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=stackable' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( esc_attr__( 'Stackable Gutenberg Blocks', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'stackable-options',
				'parent' => 'tbex-stackable',
				'title'  => esc_attr__( 'Activate Blocks', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=stackable' ) ),
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
					'id'     => 'group-stackable-resources',
					'parent' => 'tbex-stackable',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'stackable-support',
				'group-stackable-resources',
				'https://wordpress.org/support/plugin/stackable-ultimate-gutenberg-blocks'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'stackable-translate',
				'group-stackable-resources',
				'https://translate.wordpress.org/projects/wp-plugins/stackable-ultimate-gutenberg-blocks'
			);

			ddw_tbex_resource_item(
				'github',
				'stackable-github',
				'group-stackable-resources',
				'https://github.com/gambitph/Stackable'
			);

			ddw_tbex_resource_item(
				'official-site',
				'stackable-site',
				'group-stackable-resources',
				'https://wpstackable.com/'
			);

		}  // end if

}  // end function
