<?php

// includes/elementor-addons/items-granular-controls

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_granularcontrols', 100 );
/**
 * Items for Add-On: Granular Controls for Elementor (free, by Zulfikar Nore)
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_granularcontrols() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Granular Controls Settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-granularcontrols',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Granular Controls', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=granular_controls' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( __( 'Granular Controls for Elementor', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-granularcontrols-general',
				'parent' => 'ao-granularcontrols',
				'title'  => esc_attr__( 'General Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=granular_controls#granular_general_settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'General Settings', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-granularcontrols-editor',
				'parent' => 'ao-granularcontrols',
				'title'  => esc_attr__( 'Editor Options', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=granular_controls#granular_editor_settings' ) ),
					'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Editor Options', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-granularcontrols-advanced',
				'parent' => 'ao-granularcontrols',
				'title'  => esc_attr__( 'Advanced Options', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=granular_controls#granular_advanced_settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Advanced Options', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for Granular Controls */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-granularcontrols-resources',
					'parent' => 'ao-granularcontrols',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'granularcontrols-support',
				'group-granularcontrols-resources',
				'https://wordpress.org/support/plugin/granular-controls-for-elementor'
			);

			ddw_tbex_resource_item(
				'facebook-group',
				'granularcontrols-facebook',
				'group-granularcontrols-resources',
				'https://www.facebook.com/groups/164777660807192/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'granularcontrols-translate',
				'group-granularcontrols-resources',
				'https://translate.wordpress.org/projects/wp-plugins/granular-controls-for-elementor'
			);

			ddw_tbex_resource_item(
				'github',
				'granularcontrols-github',
				'group-granularcontrols-resources',
				'https://github.com/norewp/granular-controls-elementor'
			);

			ddw_tbex_resource_item(
				'official-site',
				'granularcontrols-site',
				'group-granularcontrols-resources',
				'https://granularcontrols.com/'
			);

		}  // end if

}  // end function