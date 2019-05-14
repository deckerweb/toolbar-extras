<?php

// includes/plugins/items-gp-related-posts

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_gp_related_posts', 200 );
/**
 * Items for Plugin: GP Related Posts (free, by Jon Mather)
 *
 * @since 1.4.3
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_gp_related_posts( $admin_bar ) {

	$admin_bar->add_group(
		array(
			'id'     => 'group-ao-gprp',
			'parent' => 'theme-creative',
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'ao-gp-related-posts',
			'parent' => 'group-ao-gprp',
			'title'  => esc_attr__( 'GP Related Posts', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=gp_related_posts' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'GP Related Posts', 'toolbar-extras' ) ),
			)
		)
	);

}  // end function
