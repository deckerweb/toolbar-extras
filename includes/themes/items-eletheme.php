<?php

// includes/themes/items-eletheme

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_eletheme', 100 );
/**
 * Items for Theme: Eletheme (free, by Liviu Duda)
 *
 * @since 1.2.0
 *
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_customizer_start()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_eletheme() {

	/** Eletheme creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child' ),
			'href'   => ddw_tbex_customizer_start(),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_theme_title( 'attr' )
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

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'elethemecmz-site-identity',
					'parent' => 'theme-creative-customize',
					/* translators: Autofocus section in the Customizer */
					'title'  => esc_attr__( 'Site Identity', 'toolbar-extras' ),
					'href'   => ddw_tbex_customizer_focus( 'section', 'title_tagline' ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => ddw_tbex_string_customize_attr( __( 'Site Identity', 'toolbar-extras' ) )
					)
				)
			);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_eletheme_resources', 120 );
/**
 * General resources items for Eletheme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.2.0
 *
 * @uses ddw_tbex_is_startwp_extended_active()
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 */
function ddw_tbex_themeitems_eletheme_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for Eletheme */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	ddw_tbex_resource_item(
		'github-issues',
		'theme-issues',
		'group-theme-resources',
		'https://github.com/dudaster/eletheme/issues'
	);

	ddw_tbex_resource_item(
		'github',
		'theme-github',
		'group-theme-resources',
		'https://github.com/dudaster/eletheme'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://www.eletemplator.com/eletheme/'
	);

}  // end function
