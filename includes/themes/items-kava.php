<?php

// includes/themes/items-kava

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_kava', 100 );
/**
 * Items for Theme: Kava (free, by Zemez & CrocoBlock)
 *
 * @since  1.1.1
 *
 * @uses   ddw_tbex_string_theme_title()
 * @uses   ddw_tbex_customizer_focus()
 * @uses   ddw_tbex_customizer_start()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_kava() {

	/** Kava Theme creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title(),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'kava_general_settings' ),
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

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_kava_customize', 100 );
/**
 * Customize items for Kava Theme
 *
 * @since  1.1.1
 *
 * @uses   ddw_tbex_customizer_focus()
 * @uses   ddw_tbex_string_customize_attr()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_kava_customize() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'kavacmz-site-general',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'General Site Settings', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'kava_general_settings' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'General Site Settings', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'kavacmz-colorscheme',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Color Scheme', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'kava_color_scheme' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Color Scheme', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'kavacmz-typography',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Typography', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'kava_typography' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Typography', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'kavacmz-header',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Header', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'kava_header_options' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Header', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'kavacmz-blog',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Blog Settings', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'kava_blog' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Blog Settings', 'toolbar-extras' ) )
			)
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_kava_resources', 120 );
/**
 * General resources items for Kava Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.1.1
 *
 * @uses  ddw_tbex_display_items_resources()
 * @uses  ddw_tbex_resource_item()
 */
function ddw_tbex_themeitems_kava_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for Kava Theme */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	ddw_tbex_resource_item(
		'facebook-group',
		'theme-kb',
		'group-theme-resources',
		'https://www.facebook.com/groups/CrocoblockCommunity'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://crocoblock.com/kava-theme'
	);

}  // end function