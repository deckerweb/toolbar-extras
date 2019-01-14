<?php

// includes/plugins/items-oceanwp-sticky-header

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_oceanwp_sticky_header', 200 );
/**
 * Items for Plugin: OceanWP Sticky Header (free, by Oren Hahiashvili)
 *
 * @since 1.3.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_oceanwp_sticky_header() {

	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-ao-owpsh',
			'parent' => 'theme-creative'
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-oceanwp-sticky-header',
			'parent' => 'group-ao-owpsh',
			'title'  => esc_attr__( 'Sticky Header', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=sticky-header-oceanwp' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'Sticky Header', 'toolbar-extras' ) )
			)
		)
	);

}  // end function
