<?php

// includes/plugins/items-sidebar-builder

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_sidebar_builder', 100 );
/**
 * Add-On items for Plugin:
 *   Design Sidebar Using Page Builder (free, by WebEmpire)
 *
 * @since 1.4.3
 *
 * @uses ddw_tbex_is_elementor_active()
 * @uses ddw_tbex_is_btcplugin_active()
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_sidebar_builder( $admin_bar ) {

	$type = 'we-sidebar-builder';

	$admin_bar->add_node(
		array(
			'id'     => 'ao-sidebarbuilder',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'Sidebar Builder', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Sidebar Builder', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-sidebarbuilder-all',
				'parent' => 'ao-sidebarbuilder',
				'title'  => esc_attr__( 'All Sidebars', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Sidebars (Widget Areas)', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-sidebarbuilder-new',
				'parent' => 'ao-sidebarbuilder',
				'title'  => esc_attr__( 'New Sidebar', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Sidebar (Widget Area)', 'toolbar-extras' ),
				)
			)
		);

		if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( $type ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ao-sidebarbuilder-elementor',
					'parent' => 'ao-sidebarbuilder',
					'title'  => esc_attr__( 'New Sidebar Builder', 'toolbar-extras' ),
					'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $type ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => esc_attr__( 'New Sidebar Builder', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

		/** Sidebar categories, via BTC plugin */
		if ( ddw_tbex_is_btcplugin_active() && version_compare( 'BTC_PLUGIN_VERSION', '1.5.1', '>' ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'ao-sidebarbuilder-categories',
					'parent' => 'ao-sidebarbuilder',
					'title'  => ddw_btc_string_template( 'sidebar' ),
					'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=' . $type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_html( ddw_btc_string_template( 'sidebar' ) ),
					)
				)
			);

		}  // end if

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-sidebarbuilder-resources',
					'parent' => 'ao-sidebarbuilder',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'sidebarbuilder-support',
				'group-sidebarbuilder-resources',
				'https://wordpress.org/support/plugin/design-sidebar-using-page-builder'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'sidebarbuilder-translate',
				'group-sidebarbuilder-resources',
				'https://translate.wordpress.org/projects/wp-plugins/design-sidebar-using-page-builder'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_new_content_sidebar_builder', 80 );
/**
 * Items for "New Content" section: New Sidebar (Widget Area) for Builders
 *
 * @since 1.4.3
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_new_content_sidebar_builder( $admin_bar ) {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() ) {
		return;
	}

	$type = 'we-sidebar-builder';

	$admin_bar->add_node(
		array(
			'id'     => 'new-' . $type,
			'parent' => 'new-content',
			'title'  => esc_attr__( 'Sidebar (Widget Area)', 'toolbar-extras' ),
			'meta'   => array(
				'title'  => ddw_tbex_string_add_new_item( __( 'Sidebar - Widget Area', 'toolbar-extras' ) ),
			)
		)
	);

		if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( $type ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'new-' . $type . '-elementor',
					'parent' => 'new-' . $type,
					'title'  => ddw_tbex_string_newcontent_with_builder(),
					'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $type ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => ddw_tbex_string_newcontent_create_with_builder(),
					)
				)
			);

		}  // end if

}  // end function
