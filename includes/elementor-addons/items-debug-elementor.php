<?php

// dev-mode
// includes/elementor-addons/items-debug-elementor

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


//add_action( 'admin_bar_menu', 'ddw_tbex_site_items_devmode_debug_elementor', 200 );
add_action( 'wp_before_admin_bar_render', 'ddw_tbex_site_items_devmode_debug_elementor', 200 );
/**
 * Items for Plugin: Debug Elementor (by Rami Yushuvaev)
 *
 * @since 1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_devmode_debug_elementor() {

	/** Bail early if we are not on singular on frontend */
	if ( ! is_singular() || is_admin() ) {
		return;
	}

	$this_post = get_queried_object();
    $post_type = get_post_type_object( get_post_type( $this_post ) );

	$debug_title = sprintf(
		/* translators: %s - singular name of post type */
		esc_attr__( 'Debug Info for this %s', 'toolbar-extras' ),
		esc_html( $post_type->labels->singular_name )
	);

	$debug_title_attr = sprintf(
		/* translators: %s - singular name of post type */
		esc_attr__( 'View Elementor Debug Info for this %s - in JSON format', 'toolbar-extras' ),
		esc_html( $post_type->labels->singular_name )
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'dm-debug-elementor',
			'parent' => 'elementor_edit_page',
			'title'  => ddw_tbex_item_title_with_icon( $debug_title ),
			'href'   => esc_url( add_query_arg( 'feed', 'elementor', get_permalink( get_the_ID() ) ) ),
			'meta'   => array(
				'rel'    => ddw_tbex_meta_rel(),
				'target' => ddw_tbex_meta_target(),
				'title'  => $debug_title_attr
			)
		)
	);

}  // end function
