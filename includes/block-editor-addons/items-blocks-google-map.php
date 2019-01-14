<?php

// includes/block-editor-addons/items-blocks-google-map

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_blocks_gmaps_api', 10 );
/**
 * Site items for Plugin: Blocks Google Map API (free, by Govind Kumar)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_aoitems_blocks_gmaps_api() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'blocks-gmap-api',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => esc_attr__( 'Blocks Google Map API', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=blocks-google-map%2Fgutenberg-map.php' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( esc_attr__( 'Blocks Google Map API', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'blocks-gmap-api-settings',
				'parent' => 'blocks-gmap-api',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=blocks-google-map%2Fgutenberg-map.php' ) ),
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
					'id'     => 'group-blocksgmapi-resources',
					'parent' => 'blocks-gmap-api',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'blocksgmapi-support',
				'group-blocksgmapi-resources',
				'https://wordpress.org/support/plugin/blocks-google-map'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'blocksgmapi-translate',
				'group-blocksgmapi-resources',
				'https://translate.wordpress.org/projects/wp-plugins/blocks-google-map'
			);

		}  // end if

}  // end function
