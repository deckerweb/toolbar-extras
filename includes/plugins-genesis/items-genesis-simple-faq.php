<?php

// includes/plugins-genesis/items-genesis-simple-faq

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_genesis_simple_faq', 115 );
/**
 * Items for Add-On: Genesis Simple FAQ (free, by StudioPress)
 *
 * @since 1.4.0
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_genesis_simple_faq( $admin_bar ) {

	/** For: Genesis Creative items */
	$admin_bar->add_group(
		array(
			'id'     => 'group-genesis-simplefaq',
			'parent' => 'group-genesisplugins-creative',
		)
	);

	$type = 'gs_faq';

		$admin_bar->add_node(
			array(
				'id'     => 'genesis-simplefaq-all',
				'parent' => 'group-genesis-simplefaq',
				'title'  => esc_attr__( 'All FAQ Items', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All FAQ Items', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'genesis-simplefaq-new',
				'parent' => 'group-genesis-simplefaq',
				'title'  => esc_attr__( 'New FAQ Item', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New FAQ Item', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'genesis-simplefaq-categories',
				'parent' => 'group-genesis-simplefaq',
				'title'  => esc_attr__( 'FAQ Categories', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=gs_faq_categories&post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'FAQ Categories', 'toolbar-extras' ),
				)
			)
		);

	/** For: Manage Content in Site Group */
	$admin_bar->add_node(
		array(
			'id'     => 'manage-content-genesis-simple-faq',
			'parent' => 'manage-content',
			'title'  => esc_attr__( 'Edit FAQ Items', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Edit FAQ Items', 'toolbar-extras' ),
			)
		)
	);

}  // end function
