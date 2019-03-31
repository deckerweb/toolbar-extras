<?php

// includes/block-editor-addons/items-wp-block-pack

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_wpblockpack', 10 );
/**
 * Site items for Plugin: WP Block Pack (free, by Falcon Theme)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_aoitems_wpblockpack() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-wpblockpack',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => esc_attr__( 'WP Block Pack', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=wp-block-pack' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( esc_attr__( 'WP Block Pack', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'wpblockpack-settings',
				'parent' => 'tbex-wpblockpack',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=wp-block-pack' ) ),
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
					'id'     => 'group-wpblockpack-resources',
					'parent' => 'tbex-wpblockpack',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'wpblockpack-support',
				'group-wpblockpack-resources',
				'https://wordpress.org/support/plugin/wp-block-pack'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'wpblockpack-translate',
				'group-wpblockpack-resources',
				'https://translate.wordpress.org/projects/wp-plugins/wp-block-pack'
			);

		}  // end if

}  // end function
