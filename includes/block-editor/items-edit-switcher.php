<?php

// includes/block-editor/items-edit-switcher

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'init', 'ddw_tbex_maybe_remove_tsg_adminbar_item', 15 );
/**
 * If plugin "Theme Support for Gutenberg" is active, remove its (similar)
 *   feature and use ours instead.
 *
 * @since 1.3.2
 *
 * @uses ddw_tbex_use_tweak_wplogo()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_maybe_remove_tsg_adminbar_item() {

	/** Bail early if tweak shouldn't be used */
	if ( ! function_exists( 'tsg_admin_bar_menu' ) ) {
		return;
	}

	remove_action( 'admin_bar_menu', 'tsg_admin_bar_menu', 120 );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_blocks_edit_switcher', 120 );
/**
 * Add switcher for "Edit (Classic)" and "Edit (Blocks)" links to the Toolbar.
 *
 * @since 1.3.2
 *
 * @global int    $GLOBALS[ 'post_id' ]
 * @global object $GLOBALS[ 'wp_the_query' ]
 * @global mixed  $GLOBALS[ 'wp_admin_bar' ]
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_blocks_edit_switcher( $admin_bar ) {

	$edit_url = null;

	$post = null;

	if ( is_admin() ) {

		$post = get_post( get_the_ID() );	//get_post( $GLOBALS[ 'post_id' ] );

	} else {

		$post = $GLOBALS[ 'wp_the_query' ]->get_queried_object();

	}  // end if

	/** Bail early if no post or post ID set/known */
	if ( empty( $post ) || empty( $post->ID ) ) {
		return $admin_bar;
	}

	/**
	 * Note: Capability check is in get_edit_post_link().
	 */
	$edit_url = get_edit_post_link( $post->ID, 'url' );

	/**
	 * Here we need to check the following conditions - which all must be met:
	 *   - proper edit URL for the single item of a post type
	 *   - proper edit screen (in Admin) or non-empty post type (frontend)
	 *   - post type support must include "editor"
	 */
	if ( $edit_url
		&& ( ( is_admin() && 'post' === get_current_screen()->base ) || ( ! is_admin() && ! empty( $post->post_type ) ) )
		&& post_type_supports( $post->post_type, 'editor' )
	) {

		if ( isset( $_GET[ 'classic-editor' ] ) ) {

			/** If "Classic Editor" is active - offer switch to "Block Editor" (Gutenberg) */
			$admin_bar->add_node(
				array(
					'id'    => 'tbex-block-editor',
					'title' => esc_attr__( 'Edit (Blocks)', 'toolbar-extras' ),
					'href'  => esc_url( remove_query_arg( 'classic-editor', $edit_url ) ),
					'meta'  => array(
						'class'  => 'tbex-edit-switcher',
						'target' => '',
						'title'  => esc_attr__( 'Edit in Block Editor (Gutenberg)', 'toolbar-extras' ),
					)
				)
			);

		} else {

			/** If "Block Editor" (Gutenberg) is in use - offer switch back to "Classic Editor" */
			$admin_bar->add_node(
				array(
					'id'    => 'tbex-classic-editor',
					'title' => esc_attr__( 'Edit (Classic)', 'toolbar-extras' ),
					'href'  => esc_url( add_query_arg( 'classic-editor', '1', $edit_url ) ),
					'meta'  => array(
						'class'  => 'tbex-edit-switcher',
						'target' => '',
						'title'  => esc_attr__( 'Edit in Classic Editor', 'toolbar-extras' ),
					)
				)
			);

		}  // end if Editor check

	}  // end if Environment conditions check

}  // end function
