<?php

// includes/block-editor-addons/items-gutentor

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_gutentor', 10 );
/**
 * Site items for Plugin: Gutentor (free, by Gutentor)
 *
 * @since 1.4.7
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_gutentor( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$admin_bar->add_node(
		array(
			'id'     => 'tbex-gutentor',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => esc_attr__( 'Gutentor', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=gutentor' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( esc_attr__( 'Gutentor', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'gutentor-plugin-settings',
				'parent' => 'tbex-gutentor',
				'title'  => esc_attr__( 'Activate Blocks', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=gutentor-blocks' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Blocks', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'gutentor-plugin-info',
				'parent' => 'tbex-gutentor',
				'title'  => esc_attr__( 'Plugin Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=gutentor' ) ),
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
					'id'     => 'group-gutentor-resources',
					'parent' => 'tbex-gutentor',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'gutentor-support',
				'group-gutentor-resources',
				'https://wordpress.org/support/plugin/gutentor'
			);

			ddw_tbex_resource_item(
				'documentation',
				'gutentor-docs',
				'group-gutentor-resources',
				'https://www.gutentor.com/documentation/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'gutentor-translate',
				'group-gutentor-resources',
				'https://translate.wordpress.org/projects/wp-plugins/gutentor'
			);

			ddw_tbex_resource_item(
				'official-site',
				'gutentor-site',
				'group-gutentor-resources',
				'https://gutentor.com/'
			);

		}  // end if

}  // end function
