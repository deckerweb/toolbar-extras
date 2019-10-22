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


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_slush_pro_customize', 90 );
/**
 * Customize items for Genesis Child Theme:
 *   Slush Pro (Premium, by zigzagpress)
 *
 * @since 1.2.0
 * @since 1.4.8 Refactored using filter/array declaration.
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_slush_pro_customize( array $items ) {

	/** Declare child theme's items */
	$slushpro_items = array(
		'body_style' => array(
			'type'  => 'section',
			'title' => __( 'Body Style', 'toolbar-extras' ),
			'id'    => 'slushpro-body-style',
		),
		'heading_style' => array(
			'type'  => 'section',
			'title' => __( 'Heading Style', 'toolbar-extras' ),
			'id'    => 'slushpro-heading-style',
		),
		'zp_accent_color' => array(
			'type'  => 'section',
			'title' => __( 'Accent Colors', 'toolbar-extras' ),
			'id'    => 'slushpro-accent-colors',
		),
		'zp_footer_settings' => array(
			'type'  => 'section',
			'title' => __( 'Footer Settings', 'toolbar-extras' ),
			'id'    => 'slushpro-footer-settings',
		),
		'zp_blog_settings' => array(
			'type'        => 'section',
			'title'       => __( 'Blog Settings', 'toolbar-extras' ),
			'id'          => 'slushpro-blog-settings',
			'preview_url' => get_post_type_archive_link( 'post' ),
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $slushpro_items );

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
