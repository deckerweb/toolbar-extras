<?php

// includes/plugins/items-shortcoder

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_shortcoder', 15 );
/**
 * Site Group Items from Plugin: Shortcoder (free, by Aakash Chakravarthy)
 *
 * @since 1.4.3
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_shortcoder( $admin_bar ) {

	$admin_bar->add_node(
		array(
			'id'     => 'elements-shortcoderplugin',
			'parent' => 'tbex-sitegroup-elements',
			'title'  => esc_attr__( 'Shortcoder', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=shortcoder' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Shortcoder - HTML, JavaScript and Snippets', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'elements-shortcoderplugin-all',
				'parent' => 'elements-shortcoderplugin',
				'title'  => esc_attr__( 'All Shortcodes', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=shortcoder' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Shortcodes', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'elements-shortcoderplugin-new',
				'parent' => 'elements-shortcoderplugin',
				'title'  => esc_attr__( 'New Shortcode', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?action=new&page=shortcoder' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Shortcode', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-shortcoderplugin-resources',
					'parent' => 'elements-shortcoderplugin',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'shortcoderplugin-support',
				'group-shortcoderplugin-resources',
				'https://wordpress.org/support/plugin/shortcoder'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'shortcoderplugin-translate',
				'group-shortcoderplugin-resources',
				'https://translate.wordpress.org/projects/wp-plugins/shortcoder'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_new_content_shortcode', 80 );
/**
 * Items for "New Content" section: New Shortcoder Shortcode
 *
 * @since 1.4.3
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_new_content_shortcode( $admin_bar ) {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() ) {
		return;
	}

	$admin_bar->add_node(
		array(
			'id'     => 'tbex-shortcoder-shortcode',
			'parent' => 'new-content',
			'title'  => esc_attr_x( 'Shortcode', 'Toolbar New Content section', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?action=new&page=shortcoder' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_add_new_item( __( 'Shortcode', 'toolbar-extras' ) ),
			)
		)
	);

}  // end function
