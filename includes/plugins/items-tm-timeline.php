<?php

// includes/plugins/items-tm-timeline

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_tm_timeline', 15 );
/**
 * Site items for Plugin: TM Timeline (free, by Jetimpex/ Zemez)
 *
 * @since 1.2.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_tm_timeline() {

	/** For: Manage Content */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-jetimpex-tmtimeline',
			'parent' => 'manage-content'
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'jetimpex-tmtimeline-edit',
			'parent' => 'group-jetimpex-tmtimeline',
			'title'  => esc_attr__( 'Edit Timeline Posts', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=timeline_post' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Edit Timeline Posts', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'jetimpex-tmtimeline-settings',
			'parent' => 'group-jetimpex-tmtimeline',
			'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=timeline_post&page=timeline_create' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
			)
		)
	);

}  // end function


add_action( 'tbex_new_content_before_nav_menu', 'ddw_tbex_new_content_tm_timeline' );
/**
 * Items for "New Content" section: New TM Timeline with Builder
 *
 * @since 1.2.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_new_content_tm_timeline() {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() ) {
		return;
	}

	if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'timeline_post' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'jetimpex-tmtimeline-with-builder',
				'parent' => 'new-timeline_post',
				'title'  => ddw_tbex_string_newcontent_with_builder(),
				'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'timeline_post' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_newcontent_create_with_builder()
				)
			)
		);

	}  // end if

}  // end function
