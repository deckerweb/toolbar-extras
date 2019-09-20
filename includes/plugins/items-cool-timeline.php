<?php

// includes/plugins/items-cool-timeline

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_cool_timeline', 15 );
/**
 * Site items for Plugin: Cool Timeline (free, by Cool Plugins)
 *
 * @since 1.3.2
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_cool_timeline( $admin_bar ) {

	/** For: Manage Content */
	$admin_bar->add_group(
		array(
			'id'     => 'group-cp-cool-timeline',
			'parent' => 'manage-content',
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'cp-cool-timeline-edit',
			'parent' => 'group-cp-cool-timeline',
			'title'  => esc_attr__( 'Edit Timeline Stories', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=cool_timeline' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Edit Timeline Stories', 'toolbar-extras' ),
			)
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'cp-cool-timeline-settings',
			'parent' => 'group-cp-cool-timeline',
			'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=cool_timeline_page' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
			)
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_cool_timeline', 100 );
/**
 * Add-On items for Plugin: Cool Timeline (free, by Cool Plugins)
 *
 * @since 1.3.2
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_cool_timeline( $admin_bar ) {

	/** Bail early if Elementor or specific Add-On not active */
	if ( ! ddw_tbex_is_elementor_active() || ! function_exists( 'ctla_load' ) ) {
		return $admin_bar;
	}

	$admin_bar->add_node(
		array(
			'id'     => 'ao-cool-timeline',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'Timeline Content', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=cool_timeline' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Timeline Content', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-cool-timeline-all',
				'parent' => 'ao-cool-timeline',
				'title'  => esc_attr__( 'All Timeline Stories', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=cool_timeline' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Timeline Stories', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-cool-timeline-new',
				'parent' => 'ao-cool-timeline',
				'title'  => esc_attr__( 'New Timeline Story', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=cool_timeline' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Timeline Story', 'toolbar-extras' ),
				)
			)
		);

		if ( \Elementor\User::is_current_user_can_edit_post_type( 'cool_timeline' ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'ao-cool-timeline-builder',
					'parent' => 'ao-cool-timeline',
					'title'  => esc_attr__( 'New Timeline Builder', 'toolbar-extras' ),
					'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'cool_timeline' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => esc_attr__( 'New Timeline Builder', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

		$admin_bar->add_node(
			array(
				'id'     => 'ao-cool-timeline-settings',
				'parent' => 'ao-cool-timeline',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=cool_timeline_page' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-cooltimeline-resources',
					'parent' => 'ao-cool-timeline',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'cooltimeline-support',
				'group-cooltimeline-resources',
				'https://wordpress.org/support/plugin/cool-timeline'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'cooltimeline-translate',
				'group-cooltimeline-resources',
				'https://translate.wordpress.org/projects/wp-plugins/cool-timeline'
			);

		}  // end if

}  // end function


add_action( 'tbex_new_content_before_nav_menu', 'ddw_tbex_new_content_cool_timeline' );
/**
 * Items for "New Content" section: New Cool Timeline with Builder
 *
 * @since 1.3.2
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_new_content_cool_timeline( $admin_bar ) {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() ) {
		return $admin_bar;
	}

	if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'cool_timeline' ) ) {

		$admin_bar->add_node(
			array(
				'id'     => 'cp-cool-timeline-with-builder',
				'parent' => 'new-cool_timeline',
				'title'  => ddw_tbex_string_newcontent_with_builder(),
				'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'cool_timeline' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_newcontent_create_with_builder(),
				)
			)
		);

	}  // end if

}  // end function
