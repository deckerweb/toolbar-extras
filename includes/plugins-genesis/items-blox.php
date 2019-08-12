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
 * @since 1.0.0
 * @since 1.3.5 Added BTC plugin support.
 *
 * @uses ddw_tbex_is_btcplugin_active()
 * @uses ddw_btc_string_template()
 * @uses ddw_tbex_display_items_new_content()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_blox_lite( $admin_bar ) {

	$type = 'blox';

	/** For: Genesis Creative items */
	$admin_bar->add_group(
		array(
			'id'     => 'genesis-global-blox',
			'parent' => 'group-genesisplugins-creative',
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'global-' . $type . '-all',
			'parent' => 'genesis-global-blox',
			'title'  => esc_attr__( 'All Global Blocks', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'All Global Content Blocks', 'toolbar-extras' ),
			)
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'global-blox-new',
			'parent' => 'genesis-global-blox',
			'title'  => esc_attr__( 'New Global Block', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'New Global Content Block', 'toolbar-extras' ),
			)
		)
	);

	/** Block categories, via BTC plugin */
	if ( ddw_tbex_is_btcplugin_active() ) {

		$admin_bar->add_node(
			array(
				'id'     => 'global-blox-categories',
				'parent' => 'genesis-global-blox',
				'title'  => ddw_btc_string_template( 'block' ),
				'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_html( ddw_btc_string_template( 'block' ) ),
				)
			)
		);

	}  // end if

	/** For: WordPress "New Content" section within the Toolbar */
	if ( ddw_tbex_display_items_new_content() ) {

		$admin_bar->add_node(
			array(
				'id'     => 'new-blox',
				'parent' => 'new-content',
				'title'  => esc_attr__( 'Global Content Block', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Global Content Block', 'toolbar-extras' ),
				)
			)
		);

	}  // end if

	/** Blox Settings */
	$admin_bar->add_node(
		array(
			'id'     => 'blox-settings',
			'parent' => 'genesis-global-blox',
			'title'  => esc_attr__( 'Block Settings', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=blox-settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Block Settings', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'bxs-general',
				'parent' => 'blox-settings',
				'title'  => esc_attr__( 'General', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=blox-settings&tab=general' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'General Settings', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'bxs-defaults',
				'parent' => 'blox-settings',
				'title'  => esc_attr__( 'Defaults', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=blox-settings&tab=default' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Defaults', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'bxs-styles',
				'parent' => 'blox-settings',
				'title'  => esc_attr__( 'Styles', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=blox-settings&tab=style' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Styles', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'bxs-misc',
				'parent' => 'blox-settings',
				'title'  => esc_attr__( 'Misc', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=blox-settings&tab=misc' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Misc', 'toolbar-extras' ),
				)
			)
		);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_blox_pro', 120 );
/**
 * Items for Add-On: Blox (Pro, by Nick Diego)
 *
 * @since 1.0.0
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_blox_pro( $admin_bar ) {

	/** Bail early if Blox Pro Version is not active */
	if ( ! class_exists( 'Blox_Main' ) ) {
		return $admin_bar;
	}

	$type = 'blox';

	/** If Pro Sandbox Add-On is active: */
	if ( class_exists( 'Blox_Sandbox_Main' ) ) {

		$admin_bar->add_node(
			array(
				'id'     => 'bloxpro-sandbox',
				'parent' => 'genesis-global-blox',
				'title'  => esc_attr__( 'Sandboxed Functions', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=blox-settings&tab=sandbox' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Sandboxed Functions', 'toolbar-extras' ),
				)
			)
		);

	}  // end if

	/** Pro Settings */
	$admin_bar->add_node(
		array(
			'id'     => 'bloxpro-hooks',
			'parent' => 'genesis-global-blox',
			'title'  => esc_attr__( 'Hook Config', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=blox-settings&tab=hooks' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Hook Config', 'toolbar-extras' ),
			)
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'bloxpro-tools',
			'parent' => 'blox-settings',
			'title'  => esc_attr__( 'Tools', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=blox-tools' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Tools', 'toolbar-extras' ),
			)
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'bloxpro-license',
			'parent' => 'blox-settings',
			'title'  => esc_attr__( 'License', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=blox-licenses' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'License', 'toolbar-extras' ),
			)
		)
	);

}  // end function
