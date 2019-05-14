<?php

// includes/plugins/items-gp-back-to-top

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_gp_back_to_top', 200 );
/**
 * Items for Plugin: GP Back To Top (free, by Mai Dong Giang (Peter Mai))
 *
 * @since 1.3.0
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_gp_back_to_top( $admin_bar ) {

	$admin_bar->add_group(
		array(
			'id'     => 'group-ao-gpbtt',
			'parent' => 'theme-creative',
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'ao-gp-back-to-top',
			'parent' => 'group-ao-gpbtt',
			'title'  => esc_attr__( 'GP Back to Top', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=gp-back-to-top' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'GP Back to Top', 'toolbar-extras' ) ),
			)
		)
	);

}  // end function
