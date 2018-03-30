<?php

//dev-mode
//local-dev
//items-local-development

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_local_development', 20 );
/**
 * Items for Plugin: Local Development (by Andy Fragen)
 *
 * @since  1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_site_items_local_development() {

	add_filter( 'tbex_filter_is_dev_mode', '__return_empty_string' );

	/** Group */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-local-development',
			'parent' => 'rapid-dev'
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ldv-plugins',
			'parent' => 'group-local-development',
			'title'  => esc_attr__( 'Local Dev: Plugins', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=local-development&tab=local_dev_settings_plugins' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Local Dev: Plugins', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ldv-themes',
			'parent' => 'group-local-development',
			'title'  => esc_attr__( 'Local Dev: Themes', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=local-development&tab=local_dev_settings_themes' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Local Dev: Themes', 'toolbar-extras' )
			)
		)
	);

}  // end function