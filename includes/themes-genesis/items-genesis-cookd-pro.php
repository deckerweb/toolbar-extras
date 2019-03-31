<?php

// includes/themes-genesis/items-genesis-cookd-pro

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_cookd_pro_customize', 90 );
/**
 * Customize items for Genesis Child Theme:
 *   Cook'd Pro (Premium, by Feast Design Co.)
 *
 * @since 1.2.0
 * @since 1.4.2 Refactored using filter/array declaration.
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_cookd_pro_customize( array $items ) {

	/** Declare child theme's items */
	$cookdpro_items = array(
		'archive_grid_settings' => array(
			'type'  => 'section',
			'title' => esc_attr__( 'Archive Grid', 'toolbar-extras' ),
			'id'    => 'cookdpro-archive-grid',
		),
		'single_post_settings' => array(
			'type'  => 'section',
			'title' => __( 'Single Posts', 'toolbar-extras' ),
			'id'    => 'cookdpro-single-posts',
		),
		'header_image' => array(
			'type'  => 'section',
			'title' => __( 'Header Image', 'toolbar-extras' ),
			'id'    => 'cookdpro-header-image',
		),
		'background_image' => array(
			'type'  => 'section',
			'title' => __( 'Background Image', 'toolbar-extras' ),
			'id'    => 'cookdpro-background-image',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $cookdpro_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_cookd_pro', 100 );
/**
 * Theme items for Genesis Child Theme:
 *   Cook'd Pro (Premium, by Feast Design Co.)
 *
 * @since 1.2.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_cookd_pro() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'cookdpro-theme-info',
			'parent' => 'theme-creative',
			'title'  => esc_attr__( 'Theme Info', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=cookd-dashboard' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Theme Info', 'toolbar-extras' ),
			)
		)
	);

}  // end function
