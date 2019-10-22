<?php

// includes/plugins/items-simple-css

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_simplecss', 105 );
/**
 * Items for Add-On: Simple CSS (free, by Tom Usborne)
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_customizer_focus()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_simplecss( $admin_bar ) {

	/** Simple CSS */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-simplecss',
			'parent' => 'group-active-theme',
			'title'  => esc_attr__( 'Simple CSS', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'themes.php?page=simple-css' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( __( 'Simple CSS', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-simplecss-admin',
				'parent' => 'ao-simplecss',
				'title'  => esc_attr__( 'Edit in Admin', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=simple-css' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Edit CSS in WP-Admin Dashboard (big CSS-Editor)', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-simplecss-customizer',
				'parent' => 'ao-simplecss',
				'title'  => esc_attr__( 'with Live Preview', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_focus( 'section', 'simple_css_section' ),
				'meta'   => array(
					'rel'    => ddw_tbex_meta_rel(),
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Edit CSS with Live Preview in Customizer', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-simplecss-resources',
					'parent' => 'ao-simplecss',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'simplecss-support',
				'group-simplecss-resources',
				'https://wordpress.org/support/plugin/simple-css'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'simplecss-translate',
				'group-simplecss-resources',
				'https://translate.wordpress.org/projects/wp-plugins/simple-css'
			);

			ddw_tbex_resource_item(
				'github',
				'simplecss-github',
				'group-simplecss-resources',
				'https://github.com/tomusborne/simple-css'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_simple_css', 15 );
/**
 * "Customize" Site Items for Add-On: Simple CSS
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_customizer_focus()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_simple_css( $admin_bar ) {

	$admin_bar->add_node(
		array(
			'id'     => 'customize-simplecss',
			'parent' => 'customize',
			'title'  => ddw_tbex_item_title_with_icon( esc_attr__( 'Simple CSS', 'toolbar-extras' ) ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'simple_css_section' ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Customize Simple CSS with Live Preview', 'toolbar-extras' ),
			)
		)
	);

}  // end function
