<?php

// includes/plugins/items-wp-portfolio

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_bsf_wp_portfolio' );
/**
 * Site Items for Plugin: WP Portfolio (Premium, by Brainstorm Force)
 *   Note: Plugin also known as "Astra Portfolio"
 *
 * @since 1.3.2
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_bsf_wp_portfolio() {

	/** For: Manage Content */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'manage-content-wpportfolio',
			'parent' => 'manage-content',
			'title'  => esc_attr__( 'Edit Portfolio Content', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=astra-portfolio' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Edit Portfolio Content', 'toolbar-extras' )
			)
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_bsf_wp_portfolio', 110 );
/**
 * Theme Items for Plugin: WP Portfolio (Premium, by Brainstorm Force)
 *   Note: Plugin also known as "Astra Portfolio"
 *
 * @since 1.3.2
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_bsf_wp_portfolio() {

	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-wpportfolio-content',
			'parent' => 'theme-creative'
		)
	);

	/** For: Theme Creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'wpportfolio-content',
			'parent' => 'group-wpportfolio-content',
			'title'  => esc_attr__( 'All Portfolio Items', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=astra-portfolio' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'All Portfolio Items', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'wpportfolio-content-new',
			'parent' => 'group-wpportfolio-content',
			'title'  => esc_attr__( 'New Portfolio Item', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=astra-portfolio&page=astra-portfolio-add-new' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'New Portfolio Item', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'wpportfolio-content-settings',
			'parent' => 'group-wpportfolio-content',
			'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=astra-portfolio&page=astra-portfolio' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
			)
		)
	);

}  // end function
