<?php

// includes/plugins-genesis/items-blox

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_blox_lite', 115 );
/**
 * Items for Add-On: Blox (free/Pro, by Nick Diego)
 *
 * @since  1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_blox_lite() {

	/** For: Genesis Creative items */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'genesis-global-blox',
			'parent' => 'theme-creative'
		)
	);


	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'global-blox-all',
			'parent' => 'genesis-global-blox',
			'title'  => esc_attr__( 'All Global Blocks', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=blox' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'All Global Content Blocks', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'global-blox-new',
			'parent' => 'genesis-global-blox',
			'title'  => esc_attr__( 'New Global Block', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'post-new.php?post_type=blox' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'New Global Content Block', 'toolbar-extras' )
			)
		)
	);

	/** For: WordPress "New Content" section within the Toolbar */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'new-blox',
			'parent' => 'new-content',
			'title'  => esc_attr__( 'Global Content Block', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'post-new.php?post_type=blox' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Global Content Block', 'toolbar-extras' )
			)
		)
	);

	/** Blox Settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'blox-settings',
			'parent' => 'genesis-global-blox',
			'title'  => esc_attr__( 'Block Settings', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=blox&page=blox-settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Block Settings', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'bxs-general',
				'parent' => 'blox-settings',
				'title'  => esc_attr__( 'General', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=blox&page=blox-settings&tab=general' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'General Settings', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'bxs-defaults',
				'parent' => 'blox-settings',
				'title'  => esc_attr__( 'Defaults', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=blox&page=blox-settings&tab=default' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Defaults', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'bxs-styles',
				'parent' => 'blox-settings',
				'title'  => esc_attr__( 'Styles', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=blox&page=blox-settings&tab=style' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Styles', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'bxs-misc',
				'parent' => 'blox-settings',
				'title'  => esc_attr__( 'Misc', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=blox&page=blox-settings&tab=misc' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Misc', 'toolbar-extras' )
				)
			)
		);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_blox_pro', 120 );
/**
 * Items for Add-On: Blox (Pro, by Nick Diego)
 *
 * @since  1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_blox_pro() {

	/** Bail early if Blox Pro Version is not active */
	if ( ! class_exists( 'Blox_Main' ) ) {
		return;
	}

	/** If Pro Sandbox Add-On is active: */
	if ( class_exists( 'Blox_Sandbox_Main' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'bloxpro-sandbox',
				'parent' => 'genesis-global-blox',
				'title'  => esc_attr__( 'Sandboxed Functions', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=blox&page=blox-settings&tab=sandbox' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Sandboxed Functions', 'toolbar-extras' )
				)
			)
		);

	}  // end if

	/** Pro Settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'bloxpro-hooks',
			'parent' => 'genesis-global-blox',
			'title'  => esc_attr__( 'Hook Config', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=blox&page=blox-settings&tab=hooks' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Hook Config', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'bloxpro-tools',
			'parent' => 'blox-settings',
			'title'  => esc_attr__( 'Tools', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=blox&page=blox-tools' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Tools', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'bloxpro-license',
			'parent' => 'blox-settings',
			'title'  => esc_attr__( 'License', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=blox&page=blox-licenses' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'License', 'toolbar-extras' )
			)
		)
	);

}  // end function