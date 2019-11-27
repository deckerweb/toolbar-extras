<?php

// includes/elementor-addons/items-wunderwp

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_wunderwp', 100 );
/**
 * Add-On Items from Plugin: WunderWP (free, by Artbees)
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_rand()
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_wunderwp( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Assists reload when already on settings page */
	$rand = ddw_tbex_rand();

	$admin_bar->add_node(
		array(
			'id'     => 'wunderwp',
			'parent' => 'tbex-addons',
			'title'  => 'WunderWP',
			'href'   => esc_url( admin_url( 'options-general.php?page=wunderwp' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( 'WunderWP' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'wunderwp-connection',
				'parent' => 'wunderwp',
				'title'  => esc_attr__( 'Connection Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=wunderwp' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Connection Settings', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'wunderwp-sync',
				'parent' => 'wunderwp',
				'title'  => esc_attr__( 'Sync Presets', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=elementor&rand=' . $rand . '#tab-wunderwp' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Sync Presets Library', 'toolbar-extras' ),
				)
			)
		);

	/** Group: Plugin's resources */
	if ( ddw_tbex_display_items_resources() ) {

		$admin_bar->add_group(
			array(
				'id'     => 'group-wunderwp-resources',
				'parent' => 'wunderwp',
				'meta'   => array( 'class' => 'ab-sub-secondary' ),
			)
		);

		ddw_tbex_resource_item(
			'my-account',
			'wunderwp-myaccount',
			'group-wunderwp-resources',
			'https://wunderwp.com/sites/'
		);

		ddw_tbex_resource_item(
			'support-forum',
			'wunderwp-support',
			'group-wunderwp-resources',
			'https://wordpress.org/support/plugin/wunderwp/'
		);

		ddw_tbex_resource_item(
			'translations-community',
			'wunderwp-translate',
			'group-wunderwp-resources',
			'https://translate.wordpress.org/projects/wp-plugins/wunderwp/'
		);

		ddw_tbex_resource_item(
			'official-site',
			'wunderwp-site',
			'group-wunderwp-resources',
			'https://wunderwp.com/'
		);

	}  // end if

}  // end function
