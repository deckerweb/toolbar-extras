<?php

// includes/plugins/items-cherry-services-list

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_cherry_services_list', 15 );
/**
 * Site items for Plugin: Cherry Services List (free, by Zemez)
 *
 * @since 1.1.0
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_cherry_services_list( $admin_bar ) {

	/** For: Manage Content */
	$admin_bar->add_group(
		array(
			'id'     => 'group-cherry-services',
			'parent' => 'manage-content',
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'cherry-services-edit',
			'parent' => 'group-cherry-services',
			'title'  => esc_attr__( 'Edit Services Lists', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=cherry-services' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Edit Services Lists', 'toolbar-extras' ),
			)
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'cherry-services-settings',
			'parent' => 'group-cherry-services',
			'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=cherry-services&page=cherry-services-options' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
			)
		)
	);

}  // end function


add_action( 'tbex_new_content_before_nav_menu', 'ddw_tbex_new_content_cherry_services' );
//add_action( 'admin_bar_menu', 'ddw_tbex_new_content_soliloquy', 15 );
/**
 * Items for "New Content" section: New Service with Builder
 *
 * @since 1.1.0
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_new_content_cherry_services( $admin_bar ) {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() ) {
		return $admin_bar;
	}

	if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'cherry-services' ) ) {

		$admin_bar->add_node(
			array(
				'id'     => 'csl-with-builder',
				'parent' => 'new-cherry-services',
				'title'  => ddw_tbex_string_newcontent_with_builder(),
				'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'cherry-services' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_newcontent_create_with_builder(),
				)
			)
		);

	}  // end if

}  // end function
