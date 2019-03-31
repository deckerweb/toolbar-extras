<?php

// includes/block-editor-addons/items-bootstrap-blocks

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_bootstrap_blocks', 10 );
/**
 * Site items for Plugin:
 *   Bootstrap Blocks for WP Editor (free, by Virgial Berveling)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_bootstrap_blocks( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$admin_bar->add_node(
		array(
			'id'     => 'bootstrap-blocks',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => esc_attr__( 'Bootstrap Blocks', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=wp-editor-bootstrap-blocks-settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( esc_attr__( 'Bootstrap Blocks', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'bootstrap-blocks-settings',
				'parent' => 'bootstrap-blocks',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wp-editor-bootstrap-blocks-settings#settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'bootstrap-blocks-design',
				'parent' => 'bootstrap-blocks',
				'title'  => esc_attr__( 'Design', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wp-editor-bootstrap-blocks-settings#design' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Design', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'bootstrap-blocks-extra',
				'parent' => 'bootstrap-blocks',
				'title'  => esc_attr__( 'Extra', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wp-editor-bootstrap-blocks-settings#extra' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Extra', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-bootstrapblocks-resources',
					'parent' => 'bootstrap-blocks',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'bootstrapblocks-support',
				'group-bootstrapblocks-resources',
				'https://wordpress.org/support/plugin/wp-editor-bootstrap-block'
			);

			ddw_tbex_resource_item(
				'support-forum',
				'bootstrapblocks-contact',
				'group-bootstrapblocks-resources',
				'https://gutenberg-bootstrap.com/contact-support/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'bootstrapblocks-translate',
				'group-bootstrapblocks-resources',
				'https://translate.wordpress.org/projects/wp-plugins/wp-editor-bootstrap-block'
			);

			ddw_tbex_resource_item(
				'official-site',
				'bootstrapblocks-site',
				'group-bootstrapblocks-resources',
				'https://gutenberg-bootstrap.com/'
			);

		}  // end if

}  // end function
