<?php

// includes/elementor-addons/items-extra-privacy-for-elementor

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_epfe', 100 );
/**
 * Items for Add-On: Extra Privacy for Elementor (free, by Marian Heddesheimer)
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_display_items_resources()
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_epfe() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	/** Plugin's Settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-epfe',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Extra Privacy', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=extra_privacy_for_elementor_settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Extra Privacy', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'epfe-settings',
				'parent' => 'ao-epfe',
				'title'  => esc_attr__( 'Default Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=extra_privacy_for_elementor_settings&tab=standard' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Default Settings', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'epfe-settings-video',
				'parent' => 'ao-epfe',
				'title'  => esc_attr__( 'Video Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=extra_privacy_for_elementor_settings&tab=video' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Video Settings', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'epfe-settings-maps',
				'parent' => 'ao-epfe',
				'title'  => esc_attr__( 'Google Maps Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=extra_privacy_for_elementor_settings&tab=maps' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Google Maps Settings', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-epfe-resources',
					'parent' => 'ao-epfe',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'epfe-support',
				'group-epfe-resources',
				'https://wordpress.org/support/plugin/extra-privacy-for-elementor'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'epfe-translate',
				'group-epfe-resources',
				'https://translate.wordpress.org/projects/wp-plugins/extra-privacy-for-elementor'
			);

		}  // end if

}  // end function