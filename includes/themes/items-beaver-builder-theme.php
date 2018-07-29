<?php

// includes/themes/items-beaver-builder-theme

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_bbtheme', 100 );
/**
 * Items for Theme: Beaver Builder Theme (Premium, by FastLine Media LLC)
 *
 * @since  1.1.0
 *
 * @uses   ddw_tbex_string_theme_title()
 * @uses   ddw_tbex_customizer_focus()
 * @uses   ddw_tbex_customizer_start()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_bbtheme() {

	/** Beaver Builder Theme creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'theme_styles' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_theme_title( 'attr', 'child' )
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


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_bbtheme_customize', 100 );
/**
 * Customize items for Beaver Builder Theme
 *
 * @since  1.1.0
 *
 * @uses   ddw_tbex_customizer_focus()
 * @uses   ddw_tbex_string_customize_attr()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_bbtheme_customize() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'bbtcmz-presets',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Presets', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'fl-presets' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Presets', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'bbtcmz-general',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'General', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'fl-general' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'General', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'bbtcmz-header',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Header', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'fl-header' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Header', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'bbtcmz-content',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Content', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'fl-content' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Content', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'bbtcmz-footer',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Footer', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'fl-footer' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Footer', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'bbtcmz-code',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Code', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'fl-code' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Code', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'bbtcmz-settings',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'fl-settings' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Settings', 'toolbar-extras' ) )
			)
		)
	);

	/** Only show as long as "Customizer Export Import" Plugin is not active */
	if ( ! class_exists( 'CEI_Core' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'bbtcmz-export-import',
				'parent' => 'theme-creative-customize',
				/* translators: Autofocus section in the Customizer */
				'title'  => esc_attr__( 'Export &amp; Import', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_focus( 'section', 'fl-export-import' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Export &amp; Import Customizer Options', 'toolbar-extras' )
				)
			)
		);

	}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_bbtheme_resources', 120 );
/**
 * General resources items for Beaver Builder Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.1.0
 *
 * @uses  ddw_tbex_display_items_resources()
 * @uses  ddw_tbex_resource_item()
 */
function ddw_tbex_themeitems_bbtheme_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for Beaver Builder Theme */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	ddw_tbex_resource_item(
		'knowledge-base',
		'theme-kb',
		'group-theme-resources',
		'https://kb.wpbeaverbuilder.com/collection/7-theme'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://www.wpbeaverbuilder.com/wordpress-framework-theme/'
	);

}  // end function