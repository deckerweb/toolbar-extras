<?php

// includes/elementor-addons/items-happy-addons

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_happy_addons', 100 );
/**
 * Add-On Items from Plugin:
 *   Happy Elementor Addons (free, by HappyMonster/ weDevs)
 *
 * @since 1.4.8
 *
 * @uses ddw_tbex_rand()
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_happy_addons( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Assists reload when already on settings page */
	$rand = ddw_tbex_rand();

	$admin_bar->add_node(
		array(
			'id'     => 'happyaddons',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Happy Addons', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=happy-addons#home' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'Happy Elementor Addons', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'happyaddons-widgets',
				'parent' => 'happyaddons',
				'title'  => esc_attr__( 'Activate Widgets', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=happy-addons&rand=' . $rand . '#widgets' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Widgets', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'happyaddons-info',
				'parent' => 'happyaddons',
				'title'  => esc_attr__( 'Plugin Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=happy-addons&rand=' . $rand . '#home' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Plugin Info', 'toolbar-extras' ),
				)
			)
		);

	/** Group: Plugin's resources */
	if ( ddw_tbex_display_items_resources() ) {

		$admin_bar->add_group(
			array(
				'id'     => 'group-happyaddons-resources',
				'parent' => 'happyaddons',
				'meta'   => array( 'class' => 'ab-sub-secondary' ),
			)
		);

		ddw_tbex_resource_item(
			'support-forum',
			'happyaddons-support',
			'group-happyaddons-resources',
			'https://wordpress.org/support/plugin/happy-elementor-addons/'
		);

		ddw_tbex_resource_item(
			'support-contact',
			'happyaddons-support-contact',
			'group-happyaddons-resources',
			'https://happyaddons.com/happy-support/'
		);

		ddw_tbex_resource_item(
			'documentation',
			'happyaddons-docs',
			'group-happyaddons-resources',
			'https://happyaddons.com/docs/'
		);

		ddw_tbex_resource_item(
			'facebook-group',
			'happyaddons-fbgroup',
			'group-happyaddons-resources',
			'https://www.facebook.com/groups/HappyAddonsCommunity/'
		);

		ddw_tbex_resource_item(
			'translations-community',
			'happyaddons-translate',
			'group-happyaddons-resources',
			'https://translate.wordpress.org/projects/wp-plugins/happy-elementor-addons/'
		);

		ddw_tbex_resource_item(
			'github-issues',
			'happyaddons-github-issues',
			'group-happyaddons-resources',
			'https://github.com/weDevsOfficial/happy-elementor-addons/issues'
		);

		ddw_tbex_resource_item(
			'official-site',
			'happyaddons-site',
			'group-happyaddons-resources',
			'https://happyaddons.com/'
		);

	}  // end if

}  // end function
