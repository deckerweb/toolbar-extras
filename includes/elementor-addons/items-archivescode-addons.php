<?php

// includes/elementor-addons/items-archivescode-addons

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_acafe', 100 );
/**
 * Items for Add-On: Archivescode Addons for Elementor (free, by Archivescode)
 *
 * @since  1.2.0
 *
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_acafe() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's Settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-acafe',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Archivescode Addons', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=archivescode' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( __( 'Archivescode Addons for Elementor', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-acafe-widgets',
				'parent' => 'ao-acafe',
				'title'  => esc_attr__( 'Activate Widgets', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=archivescode' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Widgets', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-acafe-resources',
					'parent' => 'ao-acafe',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'acafe-support',
				'group-acafe-resources',
				'https://wordpress.org/support/plugin/archivescode-addons-for-elementor'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'acafe-translate',
				'group-acafe-resources',
				'https://translate.wordpress.org/projects/wp-plugins/archivescode-addons-for-elementor'
			);

			ddw_tbex_resource_item(
				'official-site',
				'acafe-site',
				'group-acafe-resources',
				'https://archivescode.museumdesain.com/'
			);

		}  // end if

}  // end function