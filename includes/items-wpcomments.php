<?php

// includes/items-wpcomments

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_items_wpcomments', 50 );
/**
 * Add sub items to the Comments group.
 *
 * @since 1.4.0
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_items_wpcomments( $admin_bar ) {

	$admin_bar->add_group(
		array(
			'id'     => 'group-wpcomments-pending',
			'parent' => 'comments',
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'tbex-wpcomments-pending',
			'parent' => 'group-wpcomments-pending',
			'title'  => '<strong>' . esc_attr__( 'Pending', 'toolbar-extras' ) . '</strong>',
			'href'   => esc_url( admin_url( 'edit-comments.php?comment_status=moderated' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'For Moderation: Pending Comments', 'toolbar-extras' ),
			)
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'tbex-wpcomments-approved',
			'parent' => 'comments',
			'title'  => esc_attr__( 'Approved', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit-comments.php?comment_status=approved' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Approved Comments', 'toolbar-extras' ),
			)
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'tbex-wpcomments-all',
			'parent' => 'comments',
			'title'  => esc_attr__( 'All Comments', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit-comments.php?comment_status=all' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'All Comments', 'toolbar-extras' ),
			)
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'tbex-wpcomments-spam',
			'parent' => 'comments',
			'title'  => esc_attr__( 'Spam', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit-comments.php?comment_status=spam' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Review Spam Comments', 'toolbar-extras' ),
			)
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'tbex-wpcomments-trash',
			'parent' => 'comments',
			'title'  => esc_attr__( 'Trash', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit-comments.php?comment_status=trash' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Review Trashed Comments', 'toolbar-extras' ),
			)
		)
	);

}  // end function
