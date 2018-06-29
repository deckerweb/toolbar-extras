<?php

// includes/items-edit-content

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_items_edit_content_customize' );
/**
 * Add Customizer deep links for singular items of post types.
 *
 * @since  1.3.0
 *
 * @uses   ddw_tbex_item_title_with_icon()
 * @uses   ddw_tbex_string_customize_attr()
 * @uses   ddw_tbex_customizer_focus()
 * @uses   ddw_tbex_meta_target()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_items_edit_content_customize() {

	$parent = ( 'draft' === get_post_status( get_the_ID() ) ) ? 'preview' : 'view';

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-customize-content-' . get_the_ID(),
			'parent' => is_blog_admin() ? $parent : 'edit',
			'title'  => ddw_tbex_item_title_with_icon( ddw_tbex_string_customize_attr( __( 'Appearance', 'toolbar-extras' ) ) ),	//ddw_tbex_string_customize_attr( __( 'Appearance', 'toolbar-extras' ) ),
			'href'   => ddw_tbex_customizer_focus( '', '', get_permalink( get_the_ID() ) ),
			'meta'   => array(
				'class'  => 'tbex-customize-content',
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Appearance', 'toolbar-extras' ) )
			)
		)
	);

}  // end function