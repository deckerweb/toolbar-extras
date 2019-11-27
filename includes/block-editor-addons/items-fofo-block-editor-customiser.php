<?php

// includes/block-editor-addons/items-fofo-block-editor-customiser

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_fofo_bec', 10 );
/**
 * Site items for Plugin:
 *   Foxdell Folio Block Editor Customiser (free, by Foxdell Folio)
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_fofo_bec( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$admin_bar->add_node(
		array(
			'id'     => 'tbex-fofobec',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => esc_attr__( 'Block Editor Customiser', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=fofo_bec_plugin_page' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( esc_attr__( 'Block Editor Customiser', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'fofobec-elements',
				'parent' => 'tbex-fofobec',
				'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=fofo_bec_plugin_page' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'fofobec-addons',
				'parent' => 'tbex-fofobec',
				'title'  => esc_attr__( 'Activate Add-Ons', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=fofo_bec_plugin_page_addons' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Add-Ons', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'fofobec-themes',
				'parent' => 'tbex-fofobec',
				'title'  => esc_attr__( 'Themes', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=fofo_bec_plugin_page_themes' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Block Editor Themes', 'toolbar-extras' ),
				)
			)
		);

		/** For: Add-On Disable Core Blocks */
		if ( class_exists( 'FoFo_Bec_Disable_Core_Blocks' ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'fofobec-core-blocks',
					'parent' => 'tbex-fofobec',
					'title'  => esc_attr__( 'Disable Core Blocks', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=fofo_bec_disable_core_blocks' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Add-On', 'toolbar-extras' ) . ': ' . esc_attr__( 'Disable Core Blocks', 'toolbar-extras' ),
					)
				)
			);

		}  // end if


		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-fofobec-resources',
					'parent' => 'tbex-fofobec',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'fofobec-support',
				'group-fofobec-resources',
				'https://wordpress.org/support/plugin/foxdell-folio-block-editor-customiser'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'fofobec-translate',
				'group-fofobec-resources',
				'https://translate.wordpress.org/projects/wp-plugins/foxdell-folio-block-editor-customiser'
			);

		}  // end if

}  // end function
