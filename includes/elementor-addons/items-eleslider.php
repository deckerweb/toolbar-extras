<?php

// includes/elementor-addons/items-eleslider

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_eleslider', 150 );
/**
 * Items for Add-On: Eleslider (free, by wpmasters)
 *
 * @since 1.2.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_eleslider( $admin_bar ) {

	$admin_bar->add_node(
		array(
			'id'     => 'ao-eleslider',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'Eleslider', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=wpm_ele_slider' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Eleslider', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-eleslider-posts-all',
				'parent' => 'ao-eleslider',
				'title'  => esc_attr__( 'All Slide Posts', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=wpm_ele_slider' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Slide Posts', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-eleslider-posts-new',
				'parent' => 'ao-eleslider',
				'title'  => esc_attr__( 'New Slide Post', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=wpm_ele_slider' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Slide Post', 'toolbar-extras' ),
				)
			)
		);

		if ( \Elementor\User::is_current_user_can_edit_post_type( 'wpm_ele_slider' ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'ao-eleslider-posts-builder',
					'parent' => 'ao-eleslider',
					'title'  => esc_attr__( 'New Slide Builder', 'toolbar-extras' ),
					'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'wpm_ele_slider' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => esc_attr__( 'New Slide Builder', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

		/** Group: Resources for Eleslider */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-eleslider-resources',
					'parent' => 'ao-eleslider',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'eleslider-support',
				'group-eleslider-resources',
				'https://wordpress.org/support/plugin/eleslider'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'eleslider-translate',
				'group-eleslider-resources',
				'https://translate.wordpress.org/projects/wp-plugins/eleslider'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_new_content_eleslider', 140 );
/**
 * Items for "New Content" section: New Eleslider Post
 *
 * @since 1.2.0
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_new_content_eleslider( $admin_bar ) {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() || ! \Elementor\User::is_current_user_can_edit_post_type( 'wpm_ele_slider' ) ) {
		return $admin_bar;
	}

	$admin_bar->add_node(
		array(
			'id'     => 'eleslider-with-builder',
			'parent' => 'new-wpm_ele_slider',
			'title'  => ddw_tbex_string_newcontent_with_builder(),
			'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'wpm_ele_slider' ) ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target( 'builder' ),
				'title'  => ddw_tbex_string_newcontent_create_with_builder(),
			)
		)
	);

}  // end function
