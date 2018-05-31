<?php

// includes/elementor-addons/items-sj-elementor-addon

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_sj_elementor_addon', 100 );
/**
 * Items for Add-On: SJ Elementor Addon (free, by sandesh055)
 *
 * @since  1.2.0
 *
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_sj_elementor_addon() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's Settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-sjelao',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'SJ Elementor Addon', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=sjea' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'SJ Elementor Addon', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-sjelao-forms',
				'parent' => 'ao-sjelao',
				'title'  => esc_attr__( 'Form Connections', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=sjea&action=connection' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Form Connections', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-sjelao-info',
				'parent' => 'ao-sjelao',
				'title'  => esc_attr__( 'Plugin Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=sjea&action=welcome' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Plugin Info', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-sjelao-resources',
					'parent' => 'ao-sjelao',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'sjelao-support',
				'group-sjelao-resources',
				'https://wordpress.org/support/plugin/sj-elementor-addon'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'sjelao-translate',
				'group-sjelao-resources',
				'https://translate.wordpress.org/projects/wp-plugins/sj-elementor-addon'
			);

		}  // end if

}  // end function