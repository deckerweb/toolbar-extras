<?php

// includes/block-editor-addons/items-editorskit

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_editorskit', 10 );
/**
 * Site items for Plugin:
 *   EditorsKit (free, by Jeffrey Carandang/ Phpbits Creative Studio)
 *
 * @since 1.4.0
 * @since 1.4.4 Transferred from "Block Options" to rebranded "EditorsKit".
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_editorskit( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$admin_bar->add_node(
		array(
			'id'     => 'tbex-editorskit',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => 'EditorsKit',
			'href'   => esc_url( admin_url( 'index.php?page=editorskit-getting-started' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( 'EditorsKit' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'tbex-editorskit-info',
				'parent' => 'tbex-editorskit',
				'title'  => esc_attr__( 'Plugin Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'index.php?page=editorskit-getting-started' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Plugin Info', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-editorskit-resources',
					'parent' => 'tbex-editorskit',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'editorskit-support',
				'group-editorskit-resources',
				'https://wordpress.org/support/plugin/block-options'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'editorskit-translate',
				'group-editorskit-resources',
				'https://translate.wordpress.org/projects/wp-plugins/block-options'
			);

			ddw_tbex_resource_item(
				'github',
				'editorskit-github',
				'group-editorskit-resources',
				'https://github.com/phpbits/block-options'
			);

			ddw_tbex_resource_item(
				'official-site',
				'editorskit-site',
				'group-editorskit-resources',
				'https://editorskit.com/'
			);

		}  // end if

}  // end function
