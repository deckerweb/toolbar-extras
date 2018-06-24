<?php

// includes/elementor-addons/items-sizzify-lite

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_sizzify_lite', 100 );
/**
 * Items for Add-On: Elementor Addons & Templates – Sizzify Lite (free, by Themeisle)
 *
 * @since  1.1.0
 *
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_sizzify_lite() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Sizzify Lite Settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-sizzifylite',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Sizzify Lite', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=sizzify_template_dir' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( __( 'Sizzify Lite', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-sizzifylite-templates',
				'parent' => 'ao-sizzifylite',
				'title'  => esc_attr__( 'Template Import', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=sizzify_template_dir' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Template Import', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for Sizzy Lite */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-sizzifylite-resources',
					'parent' => 'ao-sizzifylite',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'sizzifylite-support',
				'group-sizzifylite-resources',
				'https://wordpress.org/support/plugin/elementor-addon-widgets'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'sizzifylite-translate',
				'group-sizzifylite-resources',
				'https://translate.wordpress.org/projects/wp-plugins/elementor-addon-widgets'
			);

		}  // end if

}  // end function