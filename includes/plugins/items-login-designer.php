<?php

// includes/plugins/items-login-designer

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


//add_action( 'admin_bar_menu', 'ddw_tbex_site_items_login_designer', 105 );
//add_filter( 'admin_bar_menu', 'ddw_tbex_site_items_login_designer', 105 );
add_filter( 'wp_before_admin_bar_render', 'ddw_tbex_site_items_login_designer', 105 );
/**
 * Items for Plugin: Login Designer (free, by Rich Tabor from ThatPluginCompany)
 *
 * @since 1.4.0
 *
 * @uses Login_Designer::get_login_designer_page()
 * @uses ddw_tbex_item_title_with_icon()
 * @uses ddw_tbex_customizer_focus()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_login_designer( $admin_bar ) {

	$customizer_url = ddw_tbex_customizer_focus(
		'panel',
		'login_designer__section--styles',
		get_permalink( Login_Designer::get_login_designer_page() )
	);

	$title = esc_attr__( 'Login Designer', 'toolbar-extras' );

	/** For: Active Theme Group */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'rtabor-logindesigner',
			'parent' => 'group-active-theme',
			'title'  => $title,
			'href'   => $customizer_url,
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => $title,
			),
		)
	);

	/** For: Front Customizer */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'my-sub-item',	// same as original
			'parent' => 'customize',
			'title'  => ddw_tbex_item_title_with_icon( $title ),
			'href'   => $customizer_url,
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => $title,
			),
		)
	);

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_login_designer_customizer_sections', 100 );
/**
 * Customize items for Login Designer plugin.
 *
 * @since 1.4.0
 *
 * @uses Login_Designer::get_login_designer_page()
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_login_designer_customizer_sections( array $items ) {

	$parent      = 'rtabor-logindesigner';
	$preview_url = get_permalink( Login_Designer::get_login_designer_page() );

	/** Declare plugin's items */
	$lgds_items = array(
		'login_designer__section--templates' => array(
			'type'        => 'section',
			'title'       => __( 'Templates', 'toolbar-extras' ),
			'id'          => 'lgdscmzr-templates',
			'parent'      => $parent,
			'preview_url' => $preview_url,
		),
		'login_designer__section--styles' => array(
			'type'        => 'section',
			'title'       => __( 'Styles', 'toolbar-extras' ),
			'id'          => 'lgdscmzr-styles',
			'parent'      => $parent,
			'preview_url' => $preview_url,
		),
		'login_designer__section--settings' => array(
			'type'        => 'section',
			'title'       => __( 'Settings', 'toolbar-extras' ),
			'id'          => 'lgdscmzr-settings',
			'parent'      => $parent,
			'preview_url' => $preview_url,
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $lgds_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_login_designer_resources', 120 );
/**
 * General resources items for Login Designer plugin.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_login_designer_resources( $admin_bar ) {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return $admin_bar;
	}

	/** Group: Plugin's resources */
	$admin_bar->add_group(
		array(
			'id'     => 'group-logindesigner-resources',
			'parent' => 'rtabor-logindesigner',
			'meta'   => array( 'class' => 'ab-sub-secondary' ),
		)
	);

	ddw_tbex_resource_item(
		'support-forum',
		'rtabor-logindesigner-support',
		'group-logindesigner-resources',
		'https://wordpress.org/support/plugin/login-designer'
	);

	ddw_tbex_resource_item(
		'translations-community',
		'rtabor-logindesigner-translate',
		'group-logindesigner-resources',
		'https://translate.wordpress.org/projects/wp-plugins/login-designer'
	);

	ddw_tbex_resource_item(
		'github',
		'rtabor-logindesigner-github',
		'group-logindesigner-resources',
		'https://github.com/thatplugincompany/login-designer'
	);

	ddw_tbex_resource_item(
		'official-site',
		'rtabor-logindesigner-site',
		'group-logindesigner-resources',
		'https://logindesigner.com/'
	);

}  // end function
