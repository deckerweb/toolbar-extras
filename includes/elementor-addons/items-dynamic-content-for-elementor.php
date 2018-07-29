<?php

// includes/elementor-addons/items-dynamic-content-for-elementor

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_dcfe', 100 );
/**
 * Items for Add-On: Dynamic Content for Elementor (Premium, by Dynamic.ooo)
 *
 * @since  1.3.2
 *
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_dcfe() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Granular Controls Settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-dcfe',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Dynamic Content', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=dce_opt' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_premium_addon_title_attr( __( 'Dynamic Content for Elementor', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-dcfe-settings',
				'parent' => 'ao-dcfe',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=dce_opt&tab=settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-dcfe-widgets',
				'parent' => 'ao-dcfe',
				'title'  => esc_attr__( 'Activate Widgets', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=dce_opt&tab=widgets' ) ),
					'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Widgets', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-dcfe-license',
				'parent' => 'ao-dcfe',
				'title'  => esc_attr__( 'License', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=dce_opt&tab=license' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'License', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for Dynamic Content for Elementor */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-dcfe-resources',
					'parent' => 'ao-dcfe',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'documentation',
				'dcfe-docs',
				'group-dcfe-resources',
				'https://www.dynamic.ooo/docs/'
			);

			ddw_tbex_resource_item(
				'support-contact',
				'dcfe-contact',
				'group-dcfe-resources',
				'https://www.dynamic.ooo/contact/'
			);

			ddw_tbex_resource_item(
				'official-site',
				'dcfe-site',
				'group-dcfe-resources',
				'https://www.dynamic.ooo/'
			);

		}  // end if

}  // end function