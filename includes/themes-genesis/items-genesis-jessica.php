<?php

// includes/themes-genesis/items-genesis-jessica

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_jessica_customize', 90 );
/**
 * Customize items for Genesis Child Theme: Jessica (Premium, by 9seeds, LLC)
 *
 * @since 1.4.2
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_jessica_customize( array $items ) {

	/** Declare child theme's items */
	$jessica_items = array(
		'header_image' => array(
			'type'  => 'section',
			'title' => __( 'Header Image', 'toolbar-extras' ),
			'id'    => 'jessica-header-image',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $jessica_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_genesis_jessica', 110 );
/**
 * Items for Genesis Child Theme: Jessica (Premium, by 9seeds, LLC)
 *
 * @since 1.4.2
 *
 * @uses genesis_get_option()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_genesis_jessica() {

	$title = sprintf(
		/* translators: %s - title of Child Theme, i.e. "Jessica" */
		esc_attr__( '%s Settings', 'toolbar-extras' ),
		'Jessica'
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'jessica-settings',
			'parent' => 'theme-creative',
			'title'  => $title,
			'href'   => esc_url( admin_url( 'admin.php?page=jessica' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => $title,
			)
		)
	);

	$jessica_updates = genesis_get_option( 'wsm_ignore_updates', 'jessica-settings' );

	$updates_title = sprintf(
		/* translators: %s - title of Child Theme, i.e. "Jessica" */
		esc_attr__( '%s Update Info', 'toolbar-extras' ),
		'Jessica'
	);

	if ( 1 !== $jessica_updates ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'jessica-update-info',
				'parent' => 'theme-creative',
				'title'  => $updates_title,
				'href'   => esc_url( admin_url( 'index.php?page=jessica-updates' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => $updates_title,
				)
			)
		);

	}  // end if

}  // end function
