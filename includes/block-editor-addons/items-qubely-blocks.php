<?php

// includes/block-editor-addons/items-qubely-blocks

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_qubely_blocks', 10 );
/**
 * Site items for Plugin: Qubely Blocks (free, by Themeum)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_qubely_blocks( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$admin_bar->add_node(
		array(
			'id'     => 'qubelyblocks',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => esc_attr__( 'Qubely Blocks', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=qubely-settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( esc_attr__( 'Qubely Blocks - Gutenberg Toolkit', 'toolbar-extras' ) )
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'qubelyblocks-options',
				'parent' => 'qubelyblocks',
				'title'  => esc_attr__( 'Activate Blocks', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=qubely-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Blocks', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-qubelyblocks-resources',
					'parent' => 'qubelyblocks',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'qubelyblocks-support',
				'group-qubelyblocks-resources',
				'https://wordpress.org/support/plugin/qubely'
			);

			ddw_tbex_resource_item(
				'documentation',
				'qubelyblocks-docs',
				'group-qubelyblocks-resources',
				'https://www.themeum.com/docs/qubely-introduction/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'qubelyblocks-translate',
				'group-qubelyblocks-resources',
				'https://translate.wordpress.org/projects/wp-plugins/qubely'
			);

		}  // end if

}  // end function
