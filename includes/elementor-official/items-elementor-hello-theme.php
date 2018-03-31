<?php

// includes/elementor-official/items-elementor-hello-theme

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'WPINC' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_elementor_hello', 100 );
/**
 * Items for Theme: Elementor Hello Theme (by Elementor/ Pojo Me Digital)
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_customizer_start()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_elementor_hello() {

	/** Theme creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => esc_attr__( 'Theme: Elementor Hello', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_start(),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Active Theme: Elementor Hello', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-creative-customize',
				'parent' => 'theme-creative',
				'title'  => esc_attr__( 'Customize Design', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_start(),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Customize Design', 'toolbar-extras' )
				)
			)
		);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_elementor_hello_resources', 999 );
/**
 * General resources items for Elementor Hello Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_display_items_resources()
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_elementor_hello_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for Elementor Hello Theme */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	ddw_tbex_resource_item(
		'github-issues',
		'ehello-ghissues',
		'group-theme-resources',
		'https://github.com/pojome/elementor/issues'
	);

	ddw_tbex_resource_item(
		'github',
		'ehello-github',
		'group-theme-resources',
		'https://github.com/pojome/elementor-hello-theme'
	);

}  // end function