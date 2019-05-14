<?php

// includes/plugins/items-gp-social-share

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_gp_social_share', 200 );
/**
 * Items for Plugin: GP Social Share (free, by Jon Mather)
 *
 * @since 1.3.0
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_gp_social_share( $admin_bar ) {

	$admin_bar->add_group(
		array(
			'id'     => 'group-ao-gpss',
			'parent' => 'theme-creative',
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'ao-gp-social-share',
			'parent' => 'group-ao-gpss',
			'title'  => esc_attr__( 'GP Social Share', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'themes.php?page=gp_social_settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'GP Social Share', 'toolbar-extras' ) ),
			)
		)
	);

}  // end function
