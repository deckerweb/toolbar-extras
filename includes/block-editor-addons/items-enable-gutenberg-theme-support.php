<?php

// includes/block-editor-addons/items-enable-gutenberg-theme-support

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_enable_gutenberg_theme_support', 10 );
/**
 * Site items for Plugin: Enable Gutenberg Theme Support (free, by Israel Escuer, Jose Angel Vidania)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_aoitems_enable_gutenberg_theme_support() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-enabletsgb',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => esc_attr__( 'Enable Gutenberg', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'themes.php?page=tsg_page' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( esc_attr__( 'Enable Gutenberg Theme Support', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'enabletsgb-options',
				'parent' => 'tbex-enabletsgb',
				'title'  => esc_attr__( 'Style Options', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=tsg_page#tab-options' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Style Options', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-enabletsgb-resources',
					'parent' => 'tbex-enabletsgb',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'enabletsgb-support',
				'group-enabletsgb-resources',
				'https://wordpress.org/support/plugin/enable-gutenberg-theme-support'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'enabletsgb-translate',
				'group-enabletsgb-resources',
				'https://translate.wordpress.org/projects/wp-plugins/enable-gutenberg-theme-support'
			);

		}  // end if

}  // end function
