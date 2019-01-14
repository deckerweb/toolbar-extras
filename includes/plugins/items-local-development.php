<?php

// dev-mode
// local-dev
// includes/plugins/items-local-development

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
 * Items for Plugin: Local Development (free, by Andy Fragen)
 *
 * @since 1.0.0
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
			'title'  => ddw_tbex_string_plugin_local_dev( __( 'Plugins', 'toolbar-extras' ) ),
			'href'   => is_multisite() ? esc_url( network_admin_url( 'settings.php?page=local-development&tab=local_dev_settings_plugins' ) ) : esc_url( admin_url( 'options-general.php?page=local-development&tab=local_dev_settings_plugins' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_plugin_local_dev( __( 'Plugins', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ldv-themes',
			'parent' => 'group-local-development',
			'title'  => ddw_tbex_string_plugin_local_dev( __( 'Themes', 'toolbar-extras' ) ),
			'href'   => is_multisite() ? esc_url( network_admin_url( 'settings.php?page=local-development&tab=local_dev_settings_themes' ) ) : esc_url( admin_url( 'options-general.php?page=local-development&tab=local_dev_settings_themes' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_plugin_local_dev( __( 'Themes', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ldv-extras',
			'parent' => 'group-local-development',
			'title'  => ddw_tbex_string_plugin_local_dev( __( 'Extras', 'toolbar-extras' ) ),
			'href'   => is_multisite() ? esc_url( network_admin_url( 'settings.php?page=local-development&tab=local_dev_settings_extras' ) ) : esc_url( admin_url( 'options-general.php?page=local-development&tab=local_dev_settings_extras' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_plugin_local_dev( __( 'Extras', 'toolbar-extras' ) )
			)
		)
	);

}  // end function
