<?php

// includes/plugins/items-gp-elements-disable

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_gp_elements_disable', 200 );
/**
 * Items for Plugin: GP Elements Disable (free, by Jon Mather)
 *
 * @since 1.4.3
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_gp_elements_disable( $admin_bar ) {

	$admin_bar->add_group(
		array(
			'id'     => 'group-ao-gpdae',
			'parent' => 'theme-creative',
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'ao-gp-disable-features',
			'parent' => 'group-ao-gpdae',
			'title'  => esc_attr__( 'GP Disable Features', 'toolbar-extras' ),
			'href'   => FALSE,
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'GP Disable Features', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-gp-disable-features-background',
				'parent' => 'ao-gp-disable-features',
				'title'  => esc_attr__( 'Background Elements', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=wcd_define_title()' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Background Elements', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-gp-disable-features-sidebars',
				'parent' => 'ao-gp-disable-features',
				'title'  => esc_attr__( 'Widget Areas', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=gp_sidebar_disable' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Sidebars - Widget Areas', 'toolbar-extras' ),
				)
			)
		);

}  // end function
