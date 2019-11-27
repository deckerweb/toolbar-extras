<?php

// includes/block-editor-addons/items-gutenberg

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_gutenberg', 10 );
/**
 * Site items for Plugin: Gutenberg (free, by Gutenberg Team)
 *   Note: These items will only appear if the Toolbar Extras "Dev Mode" is enabled!
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_customizer_focus()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_gutenberg( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$admin_bar->add_node(
		array(
			'id'     => 'tbex-gutenbergplugin',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => esc_attr__( 'Gutenberg', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=gutenberg-experiments' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( esc_attr__( 'Gutenberg', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'gutenbergplugin-experiments',
				'parent' => 'tbex-gutenbergplugin',
				'title'  => esc_attr__( 'Activate Experiments', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=gutenberg-experiments' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Experiments', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'gutenbergplugin-demo',
				'parent' => 'tbex-gutenbergplugin',
				'title'  => esc_attr__( 'Demo Post', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=gutenberg' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Demo Post', 'toolbar-extras' ),
				)
			)
		);

		$gutenberg_options = get_option( 'gutenberg-experiments' );

		/** For: Experiement - Widgets as Blocks */
		if ( '1' === $gutenberg_options[ 'gutenberg-widget-experiments' ] ) {

			$admin_bar->add_node(
				array(
					'id'     => 'gutenbergplugin-widgets',
					'parent' => 'tbex-gutenbergplugin',
					'title'  => esc_attr__( 'Widgets as Blocks', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=gutenberg-widgets' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Widgets as Blocks', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'gutenbergplugin-widgets-customizer',
					'parent' => 'tbex-gutenbergplugin',
					'title'  => esc_attr__( 'Blocks in Customizer', 'toolbar-extras' ),
					'href'   => ddw_tbex_customizer_focus( 'section', 'gutenberg_widget_blocks' ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => esc_attr__( 'Blocks in Customizer', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-gutenbergplugin-resources',
					'parent' => 'tbex-gutenbergplugin',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'gutenbergplugin-support',
				'group-gutenbergplugin-resources',
				'https://wordpress.org/support/plugin/gutenberg'
			);

			ddw_tbex_resource_item(
				'documentation',
				'gutenbergplugin-docs',
				'group-gutenbergplugin-resources',
				'https://developer.wordpress.org/block-editor/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'gutenbergplugin-translate',
				'group-gutenbergplugin-resources',
				'https://translate.wordpress.org/projects/wp-plugins/gutenberg'
			);

			ddw_tbex_resource_item(
				'github',
				'gutenbergplugin-github',
				'group-gutenbergplugin-resources',
				'https://github.com/WordPress/gutenberg'
			);

		}  // end if

}  // end function
