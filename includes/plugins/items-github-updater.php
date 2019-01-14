<?php

// includes/plugins/items-github-updater

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_github_updater', 100 );
/**
 * Items for Plugin: GitHub Updater (free, by Andy Fragen)
 *
 * @since 1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_site_items_github_updater() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ghu-install-plugin',
			'parent' => 'install-plugin',
			'title'  => esc_attr__( 'via GitHub Updater', 'toolbar-extras' ),
			'href'   => is_multisite() ? esc_url( network_admin_url( 'settings.php?page=github-updater&tab=github_updater_install_plugin' ) ) : esc_url( admin_url( 'options-general.php?page=github-updater&tab=github_updater_install_plugin' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Install Plugin via GitHub Updater', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ghu-install-theme',
			'parent' => 'install-theme',
			'title'  => esc_attr__( 'via GitHub Updater', 'toolbar-extras' ),
			'href'   => is_multisite() ? esc_url( network_admin_url( 'settings.php?page=github-updater&tab=github_updater_install_theme' ) ) : esc_url( admin_url( 'options-general.php?page=github-updater&tab=github_updater_install_theme' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Install Theme via GitHub Updater', 'toolbar-extras' )
			)
		)
	);

}  // end function
