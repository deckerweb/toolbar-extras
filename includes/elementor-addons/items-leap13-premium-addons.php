<?php

// includes/elementor-addons/items-leap13-premium-addons

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_leap13_premium_addons', 100 );
/**
 * Items for Add-On: Premium Addons for Elementor (free, by Leap13)
 *
 * @since  1.1.0
 *
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_leap13_premium_addons() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Premium Addons Settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-l13pa',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Premium Addons', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=pa-settings-page' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Premium Addons for Elementor (Add-On)', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-l13pa-elements',
				'parent' => 'ao-l13pa',
				'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=pa-settings-page#pa-modules' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-l13pa-gmaps',
				'parent' => 'ao-l13pa',
				'title'  => esc_attr__( 'Google Maps API', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=pa-settings-page#pa-maps-api' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Google Maps API', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-l13pa-versioncontrol',
				'parent' => 'ao-l13pa',
				'title'  => esc_attr__( 'Version Control', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=pa-settings-page#pa-maintenance' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Version Control', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-l13pa-systeminfo',
				'parent' => 'ao-l13pa',
				'title'  => esc_attr__( 'System Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=pa-settings-page#pa-system' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'System Info', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for Premium Addons */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-l13pa-resources',
					'parent' => 'ao-l13pa',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'l13pa-support',
				'group-l13pa-resources',
				'https://wordpress.org/support/plugin/premium-addons-for-elementor'
			);

			ddw_tbex_resource_item(
				'facebook-group',
				'l13pa-facebook',
				'group-l13pa-resources',
				'https://www.facebook.com/groups/2042193629353325/'
			);

			ddw_tbex_resource_item(
				'community-forum',
				'l13pa-contact',
				'group-l13pa-resources',
				'http://www.leap13.com/forums/forum/premium-addons-for-elementor-plugin-community-support/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'l13pa-translate',
				'group-l13pa-resources',
				'https://translate.wordpress.org/projects/wp-plugins/premium-addons-for-elementor'
			);

			ddw_tbex_resource_item(
				'official-site',
				'l13pa-site',
				'group-l13pa-resources',
				'https://www.premiumaddons.com/'
			);

		}  // end if

}  // end function