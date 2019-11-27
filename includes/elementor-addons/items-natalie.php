<?php

// includes/elementor-addons/items-natalie

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_natalie_theme_builder', 100 );
/**
 * Items for Add-On: Natalie - Personal Theme Builder for Elementor (Premium, by XLDevelopment/ Ashraf)
 *
 * @since 1.3.2
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_natalie_theme_builder( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's Settings */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-natalie-tb',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Natalie Theme Builder', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=xl_options' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_premium_addon_title_attr( __( 'Natalie Theme Builder', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-natalie-tb-options',
				'parent' => 'ao-natalie-tb',
				'title'  => esc_attr__( 'Options', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=xl_options' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Options', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-natalie-tb-resources',
					'parent' => 'ao-natalie-tb',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-contact',
				'natalie-tb-contact',
				'group-natalie-tb-resources',
				'https://1.envato.market/eGJbz'
			);

			ddw_tbex_resource_item(
				'official-site',
				'natalie-tb-site',
				'group-natalie-tb-resources',
				'http://xl.webangon.com/natalie/'
			);

		}  // end if

}  // end function
