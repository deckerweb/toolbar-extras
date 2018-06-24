<?php

// includes/elementor-addons/items-orbit-fox

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_orbit_fox', 100 );
/**
 * Items for Add-On: Orbit Fox Companion (free, by Themeisle)
 *
 * @since  1.1.0
 *
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_orbit_fox() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Sizzify Lite Settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-orbitfox',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Orbit Fox', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=obfx_template_dir' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( esc_attr__( 'Orbit Fox', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-orbitfox-settings',
				'parent' => 'ao-orbitfox',
				'title'  => esc_attr__( 'General Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=obfx_companion' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'General Settings', 'toolbar-extras' )
				)
			)
		);

		$obfx_templates = get_option( 'obfx_data' );

		if ( $obfx_templates[ 'module_status' ][ 'template-directory' ][ 'active' ] ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ao-orbitfox-templates',
					'parent' => 'ao-orbitfox',
					'title'  => esc_attr__( 'Template Import', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=obfx_template_dir' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Template Import', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		/** Group: Resources for Orbit Fox */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-orbitfox-resources',
					'parent' => 'ao-orbitfox',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'orbitfox-support',
				'group-orbitfox-resources',
				'https://wordpress.org/support/plugin/themeisle-companion'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'orbitfox-translate',
				'group-orbitfox-resources',
				'https://translate.wordpress.org/projects/wp-plugins/themeisle-companion'
			);

		}  // end if

}  // end function