<?php

// includes/themes-genesis/items-genesis-mai-lifestyle

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_mai_lifestyle_customize', 100 );
/**
 * Customize items for Genesis Child Theme:
 *   Mai Lifestyle (Premium, by Mike Hemberger, BizBudding Inc.)
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_customizer_focus()
 * @uses   ddw_tbex_string_customize_attr()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_mai_lifestyle_customize() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'mlcmz-settings',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Mai Settings', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'mai_settings' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Mai Settings', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'mlcmz-banner-area',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Mai Banner Area', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'mai_banner_area' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Mai Banner Area', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'mlcmz-content-archives',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Mai Content Archives', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'mai_content_archives' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Mai Content Archives', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'mlcmz-content-singular',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Mai Content Singular', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'mai_content_singular' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Mai Content Singular', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'mlcmz-site-layouts',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Mai Site Layouts', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'mai_site_layouts' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Mai Site Layouts', 'toolbar-extras' ) )
			)
		)
	);

	if ( function_exists( 'genesis_portfolio_init' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mlcmz-portfolio',
				'parent' => 'theme-creative-customize',
				/* translators: Autofocus section in the Customizer */
				'title'  => esc_attr__( 'Mai Portfolio Items', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_focus( 'section', 'mai_portfolio_cpt_settings', get_post_type_archive_link( 'portfolio' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => ddw_tbex_string_customize_attr( __( 'Mai Portfolio Items', 'toolbar-extras' ) )
				)
			)
		);
		
	}  // end if

}  // end function