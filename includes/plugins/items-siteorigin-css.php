<?php

// includes/plugins/items-siteorigin-css

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_custom_css', 107 );
/**
 * Items for Add-On: SiteOrigin CSS (free, by SiteOrigin)
 *
 * @since  1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_custom_css() {

	/** SO Custom CSS */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-siteorigincss',
			'parent' => 'group-active-theme',
			'title'  => esc_attr__( 'SiteOrigin CSS', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'themes.php?page=so_custom_css' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( __( 'SiteOrigin CSS', 'toolbar-extras' ) )
			)
		)
	);

}  // end function