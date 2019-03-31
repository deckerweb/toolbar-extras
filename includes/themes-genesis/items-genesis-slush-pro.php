<?php

// includes/themes-genesis/items-genesis-slush-pro

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_slush_pro_customize', 90 );
/**
 * Customize items for Genesis Child Theme:
 *   Slush Pro (Premium, by zigzagpress)
 *
 * @since 1.2.0
 *
 * @uses ddw_tbex_customizer_focus()
 * @uses ddw_tbex_string_customize_attr()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_slush_pro_customize() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'slushpro-body-style',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Body Style', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'body_style' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Body Style', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'slushpro-heading-style',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Heading Style', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'heading_style' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Heading Style', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'slushpro-accent-colors',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Accent Colors', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'zp_accent_color' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Accent Colors', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'slushpro-footer-settings',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Footer Settings', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'zp_footer_settings' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Footer Settings', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'slushpro-blog-settings',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Blog Settings', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'zp_blog_settings', get_post_type_archive_link( 'post' ) ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Blog Settings', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'slushpro-site-identity',
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


/**
 * Add support for the included Portfolio Post Type ('portfolio') in Slush Pro
 *   Note: Since it is technically identical to the "Genesis Portfolio Pro"
 *         plugin, the support code for this plugin is loaded - but only if it
 *         is not already active.
 *
 * @since 1.2.0
 */
if ( function_exists( 'zp_custom_post_type' ) && ! function_exists( 'genesis_portfolio_init' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-genesis/items-genesis-portfolio-pro.php';
}
