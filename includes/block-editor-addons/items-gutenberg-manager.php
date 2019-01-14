<?php

// includes/block-editor-addons/items-gutenberg-manager

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_gutenberg_manager', 10 );
/**
 * Site items for Plugin: Gutenberg Manager (free, by unCommons Team)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_aoitems_gutenberg_manager() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-gutenberg-manager',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => esc_attr__( 'Gutenberg Manager', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=gutenberg-manager' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( esc_attr__( 'Gutenberg Manager', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'gutenberg-manager-settings',
				'parent' => 'tbex-gutenberg-manager',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=gutenberg-manager&tab=settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'gutenberg-manager-default-blocks',
				'parent' => 'tbex-gutenberg-manager',
				'title'  => esc_attr__( 'Default Blocks', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=gutenberg-manager&tab=default-blocks' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Default Blocks', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'gutenberg-manager-additional-blocks',
				'parent' => 'tbex-gutenberg-manager',
				'title'  => esc_attr__( 'Additional Blocks', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=gutenberg-manager&tab=additional-blocks' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Additional Blocks', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'gutenberg-manager-api-hooks',
				'parent' => 'tbex-gutenberg-manager',
				'title'  => esc_attr__( 'API / Hooks', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=gutenberg-manager&tab=api-hooks' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'API / Hooks', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-gutenberg-manager-resources',
					'parent' => 'tbex-gutenberg-manager',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'gutenberg-manager-support',
				'group-gutenberg-manager-resources',
				'https://wordpress.org/support/plugin/manager-for-gutenberg'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'gutenberg-manager-translate',
				'group-gutenberg-manager-resources',
				'https://translate.wordpress.org/projects/wp-plugins/manager-for-gutenberg'
			);

			ddw_tbex_resource_item(
				'github',
				'gutenberg-manager-github',
				'group-gutenberg-manager-resources',
				'https://github.com/unCommonsTeam/gutenberg-manager'
			);

		}  // end if

}  // end function
