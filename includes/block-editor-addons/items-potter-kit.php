<?php

// includes/block-editor-addons/items-potter-kit

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_potter_kit', 10 );
/**
 * Site items for Plugin: Potter Kit (free, by Potter LLC)
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_potter_kit( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	$admin_bar->add_node(
		array(
			'id'     => 'tbex-potterkit',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => 'Potter Kit',
			'href'   => esc_url( admin_url( 'admin.php?page=potter_kit' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( 'Potter Kit' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'potterkit-options',
				'parent' => 'tbex-potterkit',
				'title'  => esc_attr__( 'Activate Blocks', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=potter_kit' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Blocks', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-potterkit-resources',
					'parent' => 'tbex-potterkit',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'potterkit-support',
				'group-potterkit-resources',
				'https://wordpress.org/support/plugin/potter-kit'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'potterkit-translate',
				'group-potterkit-resources',
				'https://translate.wordpress.org/projects/wp-plugins/potter-kit'
			);

			ddw_tbex_resource_item(
				'official-site',
				'potterkit-site',
				'group-potterkit-resources',
				'https://wppotter.com/'
			);

		}  // end if

}  // end function
