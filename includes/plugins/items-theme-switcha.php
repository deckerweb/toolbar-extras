<?php

// dev-mode
// includes/plugins/items-theme-switcha

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_devmode_theme_switcha', 50 );
/**
 * Items for Plugin: Theme Switcha (free, by Jeff Starr)
 *
 * @since 1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_devmode_theme_switcha() {

	add_filter( 'tbex_filter_is_dev_mode', '__return_empty_string' );

	/** Group */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-themeswitcha',
			'parent' => 'rapid-dev'
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'themeswitcha',
			'parent' => 'group-themeswitcha',
			'title'  => esc_attr__( 'Theme Switcha', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=theme_switcha_settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Theme Switcha', 'toolbar-extras' )
			)
		)
	);

	/** Plugin's Resources */
	if ( ddw_tbex_display_items_resources() ) {

		ddw_tbex_resource_item(
			'documentation',
			'themeswitcha-docs',
			'group-themeswitcha',
			'https://wordpress.org/plugins/theme-switcha/#installation'
		);

	}  // end if

}  // end function
