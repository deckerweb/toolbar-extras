<?php

// includes/plugins/items-cobalt-extender-pro

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_extender_pro', 102 );
/**
 * Items for Add-On: Extender Pro (Premium, by Cobalt Apps)
 *
 * @since 1.1.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_extender_pro() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ca-extenderpro',
			'parent' => 'group-active-theme',
			'title'  => esc_attr__( 'Extender Pro', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=extender-pro-dashboard' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Extender Pro', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ca-extenderpro-custom',
				'parent' => 'ca-extenderpro',
				'title'  => esc_attr__( 'Custom Options', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=extender-pro-custom' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Custom Options', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ca-extenderpro-custompreview',
				'parent' => 'ca-extenderpro',
				'title'  => esc_attr__( 'Custom: Full View', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=extender-pro-custom&iframe=active' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Custom: Full View', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ca-extenderpro-image-manager',
				'parent' => 'ca-extenderpro',
				'title'  => esc_attr__( 'Image Manager', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=extender-pro-image-manager' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Image Manager', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ca-extenderpro-import-export',
				'parent' => 'ca-extenderpro',
				'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=extender-pro-import-export' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ca-extenderpro-general',
				'parent' => 'ca-extenderpro',
				'title'  => esc_attr__( 'General Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=extender-pro-dashboard' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'General Settings', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for Extender Pro */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-caepro-resources',
					'parent' => 'ca-extenderpro',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-contact',
				'caepro-contact',
				'group-caepro-resources',
				'https://cobaltapps.com/my-account/'
			);

			ddw_tbex_resource_item(
				'documentation',
				'caepro-docs',
				'group-caepro-resources',
				'https://docs.cobaltapps.com/'
			);

			ddw_tbex_resource_item(
				'community-forum',
				'caepro-forums',
				'group-caepro-resources',
				'https://cobaltapps.com/community/index.php'
			);

		}  // end if

}  // end function
