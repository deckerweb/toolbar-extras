<?php

// includes/block-editor-addons/items-richtext-toolbar-buttons

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_richtext_toolbar_buttons', 150 );
/**
 * Site items for Plugin: Add RichText Toolbar Button (free, by Technote)
 *
 * @since 1.4.3
 *
 * @uses ddw_tbex_string_block_editor()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_richtext_toolbar_buttons( $admin_bar ) {
	
	$title_prefix = sprintf(
		/* translators: %s - a name/ label, "Block Editor" */
		esc_html__( 'For the %s', 'toolbar-extras' ) . ': ',
		ddw_tbex_string_block_editor()
	);

	$admin_bar->add_node(
		array(
			'id'     => 'richtext-toolbar-buttons',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'Richtext Toolbar Buttons', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=artb-dashboard' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => $title_prefix . ddw_tbex_string_free_addon_title_attr( esc_attr__( 'Add Richtext Toolbar Button', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'richtext-toolbar-buttons-all',
				'parent' => 'richtext-toolbar-buttons',
				'title'  => esc_attr__( 'All Buttons', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=artb-setting' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => $title_prefix . esc_attr__( 'All Toolbar Buttons', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'richtext-toolbar-buttons-new',
				'parent' => 'richtext-toolbar-buttons',
				'title'  => esc_attr__( 'New Button', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=artb-setting' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => $title_prefix . esc_attr__( 'New Toolbar Button', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'richtext-toolbar-buttons-general',
				'parent' => 'richtext-toolbar-buttons',
				'title'  => esc_attr__( 'General Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=artb-dashboard' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'General Settings', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'richtext-toolbar-buttons-detail',
				'parent' => 'richtext-toolbar-buttons',
				'title'  => esc_attr__( 'Detail Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=artb-setting' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Detail Settings', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-richtexttbbuttons-resources',
					'parent' => 'richtext-toolbar-buttons',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'richtexttbbuttons-support',
				'group-richtexttbbuttons-resources',
				'https://wordpress.org/support/plugin/block-style-guides'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'richtexttbbuttons-translate',
				'group-richtexttbbuttons-resources',
				'https://translate.wordpress.org/projects/wp-plugins/block-style-guides'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'richtexttbbuttons-translate',
				'group-richtexttbbuttons-resources',
				'https://github.com/technote-space/add-richtext-toolbar-button'
			);

		}  // end if

}  // end function


add_filter( 'admin_bar_menu', 'ddw_tbex_aoitems_new_content_richtext_toolbar_button', 80 );
/**
 * Items for "New Content" section: New Richtext Toolbar Button
 *   Note: Filter the existing Toolbar node.
 *
 * @since 1.4.3
 *
 * @param object $wp_admin_bar Holds all nodes of the Toolbar.
 */
function ddw_tbex_aoitems_new_content_richtext_toolbar_button( $wp_admin_bar ) {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() || is_network_admin() ) {
		return $wp_admin_bar;
	}

	$title_prefix = sprintf(
		esc_html__( 'For the %s', 'toolbar-extras' ) . ': ',
		ddw_tbex_string_block_editor()
	);

	$wp_admin_bar->add_node(
		array(
			'id'     => 'new-artb-setting',	// same as original!
			'parent' => 'new-content',
			'title'  => esc_attr__( 'Toolbar Button', 'toolbar-extras' ),
			'meta'   => array(
				'title' => $title_prefix . ddw_tbex_string_add_new_item( esc_attr__( 'Toolbar Button', 'toolbar-extras' ) ),
			)
		)
	);

}  // end function
