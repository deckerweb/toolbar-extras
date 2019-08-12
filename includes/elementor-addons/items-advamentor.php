<?php

// includes/elementor-addons/items-advamentor

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_advamentor', 100 );
/**
 * Add-On Items from Plugin: Advamentor (free, by Themexa)
 *
 * @since 1.4.3
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_advamentor( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	$admin_bar->add_node(
		array(
			'id'     => 'advamentor',
			'parent' => 'tbex-addons',
			'title'  => 'Advamentor',
			'href'   => esc_url( admin_url( 'admin.php?page=advamentor' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => 'Advamentor',
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'advamentor-elements',
				'parent' => 'advamentor',
				'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=advamentor' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' ),
				)
			)
		);

	/** Group: Plugin's resources */
	if ( ddw_tbex_display_items_resources() ) {

		$admin_bar->add_group(
			array(
				'id'     => 'group-advamentor-resources',
				'parent' => 'advamentor',
				'meta'   => array( 'class' => 'ab-sub-secondary' ),
			)
		);

		ddw_tbex_resource_item(
			'support-forum',
			'advamentor-support',
			'group-advamentor-resources',
			'https://wordpress.org/support/plugin/advamentor/'
		);

		ddw_tbex_resource_item(
			'translations-community',
			'advamentor-translate',
			'group-advamentor-resources',
			'https://translate.wordpress.org/projects/wp-plugins/advamentor/'
		);

	}  // end if

}  // end function
