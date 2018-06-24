<?php

// includes/elementor-addons/items-widgetkit-for-elementor

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_widgetkit_for_elementor', 100 );
/**
 * Items for Add-On: WidgetKit for Elementor (free, by Themesgrove)
 *
 * @since  1.1.1
 *
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_widgetkit_for_elementor() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's Settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-widgetkit',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'WidgetKit', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=widgetkit-settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( __( 'WidgetKit for Elementor', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-widgetkit-elements',
				'parent' => 'ao-widgetkit',
				'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=widgetkit-settings#widgetkit-elements' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-widgetkit-systeminfo',
				'parent' => 'ao-widgetkit',
				'title'  => esc_attr__( 'System Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=widgetkit-settings#widgetkit-info' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'System Info', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-widgetkit-resources',
					'parent' => 'ao-widgetkit',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'widgetkit-support',
				'group-widgetkit-resources',
				'https://wordpress.org/support/plugin/widgetkit-for-elementor'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'widgetkit-translate',
				'group-widgetkit-resources',
				'https://translate.wordpress.org/projects/wp-plugins/widgetkit-for-elementor'
			);

			ddw_tbex_resource_item(
				'official-site',
				'widgetkit-site',
				'group-widgetkit-resources',
				'http://widgetkit.themesgrove.com/'
			);

		}  // end if

}  // end function