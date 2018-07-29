<?php

// includes/elementor-addons/items-popboxes

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_popboxes', 100 );
/**
 * Items for Add-On: PopBoxes for Elementor (free, by Zulfikar Nore)
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_popboxes() {

	/** PopBoxes for Elementor */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-popboxes',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'PopBoxes', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=elementor-popup' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( __( 'PopBoxes for Elementor', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-popboxes-all',
				'parent' => 'ao-popboxes',
				'title'  => esc_attr__( 'All Popups', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=elementor-popup' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Popups', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-popboxes-new',
				'parent' => 'ao-popboxes',
				'title'  => esc_attr__( 'New Popup', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=elementor-popup' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Popup', 'toolbar-extras' )
				)
			)
		);

		if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'elementor-popup' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ao-popboxes-builder',
					'parent' => 'ao-popboxes',
					'title'  => esc_attr__( 'New Popup Builder', 'toolbar-extras' ),
					'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'elementor-popup' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => esc_attr__( 'New Popup Builder', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		/** Group: Resources for PopBoxes */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-popbox-resources',
					'parent' => 'ao-popboxes',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'popbox-support',
				'group-popbox-resources',
				'https://wordpress.org/support/plugin/modal-for-elementor'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'popbox-translate',
				'group-popbox-resources',
				'https://translate.wordpress.org/projects/wp-plugins/modal-for-elementor'
			);

			ddw_tbex_resource_item(
				'github',
				'popbox-github',
				'group-popbox-resources',
				'https://github.com/norewp/modal-for-elementor'
			);

			ddw_tbex_resource_item(
				'official-site',
				'popbox-site',
				'group-popbox-resources',
				'https://designsbynore.com/popups/popbox/'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_new_content_popbox' );
/**
 * Items for "New Content" section: New PopBox
 *
 * @since  1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_new_content_popbox() {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() || ! \Elementor\User::is_current_user_can_edit_post_type( 'elementor-popup' ) ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'popbox-with-builder',
			'parent' => 'new-elementor-popup',
			'title'  => ddw_tbex_string_newcontent_with_builder(),
			'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'elementor-popup' ) ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target( 'builder' ),
				'title'  => ddw_tbex_string_newcontent_create_with_builder()
			)
		)
	);

}  // end if
