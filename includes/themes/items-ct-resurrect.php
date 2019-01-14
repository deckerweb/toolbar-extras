<?php

// includes/themes/items-ct-resurrect

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_ct_resurrect', 100 );
/**
 * Items for Theme: Resurrect & Resurrect Child Themes (all Premium, by churchthemes.com)
 *
 * @since 1.3.0
 *
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_customizer_start()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_ct_resurrect() {

	/** Theme creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child' ),
			'href'   => esc_url( admin_url( 'themes.php?page=theme-license' ) ),
			'meta'   => array(
				'target' => '',
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


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_ct_resurrect_license', 111 );
/**
 * Items for Theme: Resurrect License
 *
 * @since 1.3.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_ct_resurrect_license() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-creative-churchthemes-license',
			'parent' => 'theme-creative',
			'title'  => esc_attr__( 'Theme License', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'themes.php?page=theme-license' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Theme License', 'toolbar-extras' )
			)
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_ct_resurrect_customize', 100 );
/**
 * Customize items for Resurrect Theme
 *
 * @since 1.3.0
 *
 * @uses ddw_tbex_customizer_focus()
 * @uses ddw_tbex_string_customize_attr()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_ct_resurrect_customize() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'resurrectcmz-colors',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Colors', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'colors' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Colors', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'resurrectcmz-background-image',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Background Image', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'background_image' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Background Image', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'resurrectcmz-google-fonts',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Google Fonts', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'resurrect_fonts' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Google Fonts', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'resurrectcmz-header-logo',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Header &amp; Logo', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'title' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Header &amp; Logo', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'resurrectcmz-footer-text',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Footer', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'resurrect_footer' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Footer', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'resurrectcmz-homepage-slider',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Homepage Slider', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'resurrect_slider' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Homepage Slider', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'resurrectcmz-social-media-icons',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Social Media Icons', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'resurrect_icons' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Social Media Icons', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'resurrectcmz-site-identity',
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


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_ct_resurrect_resources', 120 );
/**
 * General resources items for Resurrect Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.3.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 */
function ddw_tbex_themeitems_ct_resurrect_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for Resurrect Theme */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	ddw_tbex_resource_item(
		'documentation',
		'theme-docs',
		'group-theme-resources',
		'https://churchthemes.com/guides/user/specific-themes/resurrect/'
	);

	ddw_tbex_resource_item(
		'knowledge-base',
		'theme-kb',
		'group-theme-resources',
		'https://churchthemes.com/guides/'
	);

	ddw_tbex_resource_item(
		'support-contact',
		'theme-contact',
		'group-theme-resources',
		'https://churchthemes.com/contact/'
	);

	ddw_tbex_resource_item(
		'my-account',
		'theme-my-account',
		'group-theme-resources',
		'https://churchthemes.com/account/',
		/* translators: %s - static string "@ churchthemes.com" (My Account @ churchthemes.com) */
		sprintf( esc_attr__( 'My Account %s', 'toolbar-extras' ), '@ churchthemes.com' )
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://churchthemes.com/themes/resurrect/'
	);

}  // end function
