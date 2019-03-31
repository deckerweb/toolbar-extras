<?php

// includes/elementor-addons/items-exclusive-addons

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_exclusive_addons', 100 );
/**
 * Items for Add-On: Exclusive Addons for Elementor (free, by DevsCred)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_exclusive_addons( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's Settings */
	$admin_bar->add_node(
		array(
			'id'     => 'exlusive-addons',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Exclusive Addons', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=exad-settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( __( 'Exclusive Addons for Elementor', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'exlusive-addons-elements',
				'parent' => 'exlusive-addons',
				'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=exad-settings#elements' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'exlusive-addons-info',
				'parent' => 'exlusive-addons',
				'title'  => esc_attr__( 'Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=exad-settings#general' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Info', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-exlusiveao-resources',
					'parent' => 'exlusive-addons',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'exlusiveao-support',
				'group-exlusiveao-resources',
				'https://wordpress.org/support/plugin/exclusive-addons-for-elementor'
			);

			ddw_tbex_resource_item(
				'documentation',
				'exlusiveao-docs',
				'group-exlusiveao-resources',
				'https://exclusiveaddons.com/docs/'
			);

			ddw_tbex_resource_item(
				'support-contact',
				'exlusiveao-contact',
				'group-exlusiveao-resources',
				'https://exclusiveaddons.com/support/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'exlusiveao-translate',
				'group-exlusiveao-resources',
				'https://translate.wordpress.org/projects/wp-plugins/exclusive-addons-for-elementor'
			);

			ddw_tbex_resource_item(
				'official-site',
				'exlusiveao-site',
				'group-exlusiveao-resources',
				'https://exclusiveaddons.com/'
			);

		}  // end if

}  // end function
