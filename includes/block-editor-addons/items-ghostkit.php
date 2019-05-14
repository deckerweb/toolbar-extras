<?php

// includes/block-editor-addons/items-ghostkit

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_ghostkit', 10 );
/**
 * Add-On items for Plugin: Ghost Kit (free, by nK)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_ghostkit( $admin_bar ) {

	$type = 'ghostkit_template';

	$admin_bar->add_node(
		array(
			'id'     => 'ghostkit-templates',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'Ghost Kit Templates', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( esc_attr__( 'Ghost Kit Templates', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ghostkit-templates-all',
				'parent' => 'ghostkit-templates',
				'title'  => esc_attr__( 'All Templates', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Templates', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ghostkit-templates-new',
				'parent' => 'ghostkit-templates',
				'title'  => esc_attr__( 'New Template', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Template', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ghostkit-templates-categories',
				'parent' => 'ghostkit-templates',
				'title'  => esc_attr__( 'Template Categories', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=ghostkit_template_category&post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Template Categories', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_group(
			array(
				'id'     => 'group-ghostkit-settings',
				'parent' => 'ghostkit-templates',
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'ghostkit-templates-activate-blocks',
					'parent' => 'group-ghostkit-settings',
					'title'  => esc_attr__( 'Activate Blocks', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=ghostkit' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Activate Blocks', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'ghostkit-templates-settings',
					'parent' => 'group-ghostkit-settings',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=ghostkit&sub_page=settings' ) ),
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
					'id'     => 'group-ghostkit-resources',
					'parent' => 'ghostkit-templates',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'ghostkit-support',
				'group-ghostkit-resources',
				'https://wordpress.org/support/plugin/ghostkit'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'ghostkit-translate',
				'group-ghostkit-resources',
				'https://translate.wordpress.org/projects/wp-plugins/ghostkit'
			);

			ddw_tbex_resource_item(
				'github',
				'ghostkit-github',
				'group-ghostkit-resources',
				'https://github.com/nk-o/ghostkit'
			);

			ddw_tbex_resource_item(
				'official-site',
				'ghostkit-site',
				'group-ghostkit-resources',
				'https://ghostkit.io/'
			);

		}  // end if

}  // end function


add_filter( 'admin_bar_menu', 'ddw_tbex_aoitems_new_content_ghostkit_template', 80 );
/**
 * Items for "New Content" section: New Ghost Kit Template
 *   Note: Filter the existing Toolbar node.
 *
 * @since 1.4.3
 *
 * @param object $wp_admin_bar Holds all nodes of the Toolbar.
 */
function ddw_tbex_aoitems_new_content_ghostkit_template( $wp_admin_bar ) {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() || is_network_admin() ) {
		return $wp_admin_bar;
	}

	$wp_admin_bar->add_node(
		array(
			'id'     => 'new-ghostkit_template',	// same as original!
			'parent' => 'new-content',
			'title'  => esc_attr__( 'Ghost Kit Template', 'toolbar-extras' ),
			'meta'   => array(
				'title' => ddw_tbex_string_add_new_item( esc_attr__( 'Ghost Kit Template', 'toolbar-extras' ) ),
			)
		)
	);

}  // end function
