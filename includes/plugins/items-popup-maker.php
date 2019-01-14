<?php

// includes/plugins/items-popup-maker

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_popup_maker', 15 );
/**
 * Items for Plugin: Popup Maker (free, by WP Popup Maker & Daniel Iser)
 *
 * @since 1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_popup_maker() {

	/** For: Manage Content */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'manage-content-popups',
			'parent' => 'manage-content',
			'title'  => esc_attr__( 'Edit Popups', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=popup' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Edit Popups', 'toolbar-extras' )
			)
		)
	);

	/** For: New Content */
	if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'popup' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'popup-with-builder',
				'parent' => 'new-popup',
				'title'  => ddw_tbex_string_newcontent_with_builder(),
				'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'popup' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_newcontent_create_with_builder()
				)
			)
		);

	}  // end if

}  // end function
