<?php

// includes/elementor-addons/items-sina-extension

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_smart_fonts_for_elementor', 100 );
/**
 * Items for Add-On: Smart Fonts for Elementor (free, by codevision)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_smart_fonts_for_elementor( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's Settings */
	$admin_bar->add_node(
		array(
			'id'     => 'smartfontsfe',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Smart Fonts', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=acf-options-esf-settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( __( 'Smart Fonts for Elementor', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'smartfontsfe-settings',
				'parent' => 'smartfontsfe',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=acf-options-esf-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'smartfontsfe-license',
				'parent' => 'smartfontsfe',
				'title'  => esc_attr__( 'License', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=acf-options-esf-license' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'License', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-smartfontsfe-resources',
					'parent' => 'smartfontsfe',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'smartfontsfe-support',
				'group-smartfontsfe-resources',
				'https://wordpress.org/support/plugin/codevision-elementor-smart-fonts'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'smartfontsfe-translate',
				'group-smartfontsfe-resources',
				'https://translate.wordpress.org/projects/wp-plugins/codevision-elementor-smart-fonts'
			);

		}  // end if

}  // end function
