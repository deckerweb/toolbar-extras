<?php

// includes/block-editor-addons/items-theme-support-gutenberg

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_theme_support_gutenberg', 10 );
/**
 * Site items for Plugin: Theme Support for Gutenberg (free, by wpweaver)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_aoitems_theme_support_gutenberg() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-tsforgb',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => esc_attr__( 'Theme Support for Gutenberg', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'themes.php?page=tsg_page' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( esc_attr__( 'Theme Support for Gutenberg', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tsforgb-options',
				'parent' => 'tbex-tsforgb',
				'title'  => esc_attr__( 'Options', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=tsg_page#tab-options' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Options', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tsforgb-quick-help',
				'parent' => 'tbex-tsforgb',
				'title'  => esc_attr__( 'Quick Help', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=tsg_page#tab-help' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Quick Help', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-tsforgb-resources',
					'parent' => 'tbex-tsforgb',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'tsforgb-support',
				'group-tsforgb-resources',
				'https://wordpress.org/support/plugin/theme-support-for-gutenberg'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'tsforgb-translate',
				'group-tsforgb-resources',
				'https://translate.wordpress.org/projects/wp-plugins/theme-support-for-gutenberg'
			);

		}  // end if

}  // end function
