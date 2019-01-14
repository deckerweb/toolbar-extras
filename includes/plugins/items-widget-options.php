<?php

// includes/plugins/items-widget-options

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_widget_options' );
/**
 * Items for Plugin: Widget Options (free/Premium, by Phpbits Creative Studio)
 *
 * @since 1.2.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_widget_options() {

	/** For: WP-Widgets */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-phpbits-widget-options',
			'parent' => 'wpwidgets'
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'phpbits-widget-options',
				'parent' => 'group-phpbits-widget-options',
				'title'  => esc_attr__( 'Widget Options', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=widgetopts_plugin_settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Widget Options', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'phpbits-widget-options-import-export',
				'parent' => 'group-phpbits-widget-options',
				'title'  => esc_attr__( 'Import or Export Widgets', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'tools.php?page=widgetopts_migrator_settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Import or Export Widgets', 'toolbar-extras' )
				)
			)
		);

}  // end function
