<?php

// includes/plugins/items-front-page-builder

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_front_page_builder', 900 );
/**
 * Items for Add-On: Front Page Builder (free, by Themes4WP)
 *
 * @since  1.3.0
 *
 * @uses   ddw_tbex_customizer_focus()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_front_page_builder() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-front-page-builder',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Front Page Builder Settings', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'homepage', site_url( '/' ) ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Front Page Builder Settings', 'toolbar-extras' ) )
			)
		)
	);

}  // end function