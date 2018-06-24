<?php

// includes/plugins/items-simple-custom-css

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_simple_custom_css', 105 );
/**
 * Items for Add-On: Simple Custom CSS (free, by John Regan, Danny Van Kooten)
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_customizer_focus()
 * @uses   ddw_tbex_customizer_focus()
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_simple_custom_css() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-sccss',
			'parent' => 'group-active-theme',
			'title'  => esc_attr__( 'Simple Custom CSS', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'themes.php?page=simple-custom-css.php' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( __( 'Simple Custom CSS', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-sccss-admin',
				'parent' => 'ao-sccss',
				'title'  => esc_attr__( 'Edit in Admin', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=simple-custom-css.php' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Edit CSS in WP-Admin Dashboard (big CSS-Editor)', 'toolbar-extras' )
				)
			)
		);

		$query_simplecss[ 'autofocus[section]' ] = 'simple_css_section';

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-sccss-customizer',
				'parent' => 'ao-sccss',
				'title'  => esc_attr__( 'with Live Preview', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_focus( 'control', 'sccss_editor' ),
				'meta'   => array(
					'rel'    => ddw_tbex_meta_rel(),
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Edit CSS with Live Preview in Customizer', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for Simple Custom CSS */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-sccss-resources',
					'parent' => 'ao-sccss',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'sccss-support',
				'group-sccss-resources',
				'https://wordpress.org/support/plugin/simple-custom-css'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'sccss-translate',
				'group-sccss-resources',
				'https://translate.wordpress.org/projects/wp-plugins/simple-custom-css'
			);

			ddw_tbex_resource_item(
				'github',
				'sccss-github',
				'group-sccss-resources',
				'https://github.com/johnregan3/simple-custom-css'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_sccss_customize', 15 );
/**
 * Site Items for Add-On: Simple Custom CSS
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_customizer_focus()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_sccss_customize() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'customize-sccss',
			'parent' => 'customize',
			'title'  => ddw_tbex_item_title_with_icon( esc_attr__( 'Simple Custom CSS', 'toolbar-extras' ) ),
			'href'   => ddw_tbex_customizer_focus( 'control', 'sccss_editor' ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Customize Simple Custom CSS with Live Preview', 'toolbar-extras' )
			)
		)
	);

}  // end function