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


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_sina_extension', 100 );
/**
 * Items for Add-On:
 *   Sina Extension for Elementor (free, by shaonsina)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_sina_extension( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's Settings */
	$admin_bar->add_node(
		array(
			'id'     => 'sina-extension',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Sina Extension', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=sina_ext_settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( __( 'Sina Extension for Elementor', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'sina-extension-settings',
				'parent' => 'sina-extension',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=sina_ext_settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-sinaextension-resources',
					'parent' => 'sina-extension',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'sinaextension-support',
				'group-sinaextension-resources',
				'https://wordpress.org/support/plugin/sina-extension-for-elementor'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'sinaextension-translate',
				'group-sinaextension-resources',
				'https://translate.wordpress.org/projects/wp-plugins/sina-extension-for-elementor'
			);

			ddw_tbex_resource_item(
				'github',
				'sinaextension-github',
				'group-sinaextension-resources',
				'https://github.com/shaonsina/sina-extension-for-elementor'
			);

		}  // end if

}  // end function
