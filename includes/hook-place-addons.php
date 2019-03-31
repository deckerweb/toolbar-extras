<?php

// includes/hook-place-addons

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_addons_hook_place', 200 );
/**
 * Hook place for Add-On Plugins that provide settings, options, elements.
 *   Only displays conditionally if any of these Add-Ons are active or not.
 *   Controlled via filter 'tbex_filter_is_addon'
 *
 * @since 1.0.0
 * @since 1.4.0 Splitted function into own file to make it better reusable.
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_addons_hook_place( $admin_bar ) {

	if ( has_filter( 'tbex_filter_is_addon' ) ) {

		$admin_bar->add_node(
			array(
				'id'     => 'tbex-addons',
				'parent' => 'group-pagebuilder-options',
				'title'  => esc_attr__( 'Add-Ons', 'toolbar-extras' ),
				'href'   => '',
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Elements and Options from Add-On Plugins', 'toolbar-extras' )
				)
			)
		);

	}  // end if

}  // end function
