<?php

// includes/plugins/items-we-sidebar-builder

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_reusable_templates', 100 );
/**
 * Add-On items for Plugin:
 *   Reusable Blocks – Elementor, Beaver Builder, WYSIWYG (free, by WebEmpire)
 *
 * @since 1.4.3
 * @since 1.4.5 Renaming because plugin changed its name/branding etc.
 *
 * @uses ddw_tbex_is_elementor_active()
 * @uses ddw_tbex_is_btcplugin_active()
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_reusable_templates( $admin_bar ) {

	$type = 'we-sidebar-builder';

	$admin_bar->add_node(
		array(
			'id'     => 'ao-reusabletemplates',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'Reusable Templates', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Reusable Templates', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-reusabletemplates-all',
				'parent' => 'ao-reusabletemplates',
				'title'  => esc_attr__( 'All Templates', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Reusable Templates', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-reusabletemplates-new',
				'parent' => 'ao-reusabletemplates',
				'title'  => esc_attr__( 'New Reusable Template', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Reusable Template', 'toolbar-extras' ),
				)
			)
		);

		if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( $type ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ao-reusabletemplates-elementor',
					'parent' => 'ao-reusabletemplates',
					'title'  => esc_attr__( 'New Template Builder', 'toolbar-extras' ),
					'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $type ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => esc_attr__( 'New Template Builder', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

		/** Template categories, via BTC plugin */
		if ( ddw_tbex_is_btcplugin_active() && version_compare( 'BTC_PLUGIN_VERSION', '1.5.1', '>' ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'ao-reusabletemplates-categories',
					'parent' => 'ao-reusabletemplates',
					'title'  => ddw_btc_string_template( 'template' ),
					'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=' . $type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_html( ddw_btc_string_template( 'template' ) ),
					)
				)
			);

		}  // end if

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-reusabletemplates-resources',
					'parent' => 'ao-reusabletemplates',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'reusabletemplates-support',
				'group-reusabletemplates-resources',
				'https://wordpress.org/support/plugin/design-sidebar-using-page-builder'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'reusabletemplates-translate',
				'group-reusabletemplates-resources',
				'https://translate.wordpress.org/projects/wp-plugins/design-sidebar-using-page-builder'
			);

			ddw_tbex_resource_item(
				'github',
				'reusabletemplates-github',
				'group-reusabletemplates-resources',
				'https://github.com/web-empire/design-sidebar-with-builder'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_new_content_reusable_template', 80 );
/**
 * Items for "New Content" section: New Reusable Template for Builders
 *
 * @since 1.4.3
 * @since 1.4.5 Renaming because plugin changed its name/branding etc.
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_new_content_reusable_template( $admin_bar ) {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() ) {
		return;
	}

	$type = 'we-sidebar-builder';

	$admin_bar->add_node(
		array(
			'id'     => 'new-' . $type,		// same as original!
			'parent' => 'new-content',
			'title'  => esc_attr__( 'Reusable Template', 'toolbar-extras' ),
			'meta'   => array(
				'title'  => ddw_tbex_string_add_new_item( __( 'Reusable Template Block', 'toolbar-extras' ) ),
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
