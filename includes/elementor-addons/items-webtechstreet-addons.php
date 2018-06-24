<?php

// includes/elementor-addons/items-webtechstreet-addons

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_webtechstreet_addons', 100 );
/**
 * Items for Add-On: Elementor Addon Elements (free, by WebTechStreet)
 *
 * @since  1.1.0
 *
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_webtechstreet_addons() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's Settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-wtsaddons',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'WebTechStreet Addons', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=eae' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( __( 'WebTechStreet Addons', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-wtsaddons-settings',
				'parent' => 'ao-wtsaddons',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=eae' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-wtsaddons-resources',
					'parent' => 'ao-wtsaddons',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'wtsaddons-support',
				'group-wtsaddons-resources',
				'https://wordpress.org/support/plugin/addon-elements-for-elementor-page-builder'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'wtsaddons-translate',
				'group-wtsaddons-resources',
				'https://translate.wordpress.org/projects/wp-plugins/addon-elements-for-elementor-page-builder'
			);

		}  // end if

}  // end function