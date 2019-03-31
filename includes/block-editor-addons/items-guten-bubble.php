<?php

// includes/block-editor-addons/items-guten-bubble

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_guten_bubble', 10 );
/**
 * Site items for Plugin: Guten-bubble (free, by Chronoir.net)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_guten_bubble( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$admin_bar->add_node(
		array(
			'id'     => 'tbex-gutenbubble',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => 'Guten-bubble',
			'href'   => esc_url( admin_url( 'options-general.php?page=guten-bubble-options' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( 'Guten-bubble' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'tbex-gutenbubble-settings',
				'parent' => 'tbex-gutenbubble',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=guten-bubble-options' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-gutenbubble-resources',
					'parent' => 'tbex-gutenbubble',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'gutenbubble-support',
				'group-gutenbubble-resources',
				'https://wordpress.org/support/plugin/guten-bubble'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'gutenbubble-translate',
				'group-gutenbubble-resources',
				'https://translate.wordpress.org/projects/wp-plugins/guten-bubble'
			);

		}  // end if

}  // end function
