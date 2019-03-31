<?php

// includes/themes/items-rooten

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_rooten', 100 );
/**
 * Items for Theme: Rooten (Premium, by BdThemes)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_customizer_start()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_rooten() {

	/** Theme creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child' ),
			'href'   => ddw_tbex_customizer_start(),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_theme_title( 'attr', 'child' )
			)
		)
	);

		/** Rooten customize */
		ddw_tbex_item_theme_creative_customize();

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'rooten-sidebar-generators',
				'parent' => 'theme-creative',
				'title'  => esc_attr__( 'Sidebar Generator', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=rooten-sidebar-generator' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Sidebar Generator', 'toolbar-extras' )
				)
			)
		);

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_rooten_customize' );
/**
 * Customize items for Rooten Theme
 *
 * @since 1.4.2
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_rooten_customize( array $items ) {

	/** Declare theme's items */
	$rooten_items = array(
		'general' => array(
			'type'  => 'section',
			'title' => __( 'General', 'toolbar-extras' ),
			'id'    => 'rootencmz-general',
		),
		'toolbar' => array(
			'type'  => 'section',
			'title' => __( 'Toolbar', 'toolbar-extras' ),
			'id'    => 'rootencmz-toolbar',
		),
		'header' => array(
			'type'  => 'section',
			'title' => __( 'Header', 'toolbar-extras' ),
			'id'    => 'rootencmz-header',
		),
		'mainbody' => array(
			'type'  => 'section',
			'title' => __( 'Main Body', 'toolbar-extras' ),
			'id'    => 'rootencmz-main-body',
		),
		'blog' => array(
			'type'        => 'section',
			'title'       => __( 'Blog', 'toolbar-extras' ),
			'id'          => 'rootencmz-blog',
			'preview_url' => get_post_type_archive_link( 'post' ),
		),
		'typography' => array(
			'type'  => 'panel',
			'title' => __( 'Typography', 'toolbar-extras' ),
			'id'    => 'rootencmz-typography',
		),
		'colors' => array(
			'type'  => 'panel',
			'title' => __( 'Colors', 'toolbar-extras' ),
			'id'    => 'rootencmz-colors',
		),
		'background_image' => array(
			'type'  => 'section',
			'title' => __( 'Background Image', 'toolbar-extras' ),
			'id'    => 'rootencmz-background-image',
		),
		'footer' => array(
			'type'  => 'section',
			'title' => __( 'Footer', 'toolbar-extras' ),
			'id'    => 'rootencmz-footer',
		),
		'copyright' => array(
			'type'  => 'section',
			'title' => __( 'Copyright', 'toolbar-extras' ),
			'id'    => 'rootencmz-copyright',
		),
		'totop' => array(
			'type'  => 'section',
			'title' => __( 'Go To Top', 'toolbar-extras' ),
			'id'    => 'rootencmz-gototop',
		),
		'cookie' => array(
			'type'  => 'section',
			'title' => __( 'Cookie Bar', 'toolbar-extras' ),
			'id'    => 'rootencmz-cookie-bar',
		),
		'preloader' => array(
			'type'  => 'section',
			'title' => __( 'Preloader', 'toolbar-extras' ),
			'id'    => 'rootencmz-preloader',
		),
	);

	/** Optional WooCommerce item */
	if ( ddw_tbex_is_woocommerce_active() ) {

		$rooten_items[ 'woocommerce' ] = array(
			'type'        => 'section',
			'title'       => __( 'WooCommerce Integration', 'toolbar-extras' ),
			'id'          => 'rootencmz-woocommerce',
			'preview_url' => get_post_type_archive_link( 'product' ),
		);

	}  // end if

	/** Merge and return with all items */
	return array_merge( $items, $rooten_items );

}  // end function


/**
 * BdThemes Rooten Add-On plugin: Portfolio
 *
 * @since 1.4.2
 *
 * @uses DDW_TBEX_Items_CPT_Generic()
 */
if ( function_exists( 'bdthemes_portfolio_register' ) ) {

	$rooten_items_cpt_portfolio = new \DDW\TBEX\Items_CPT_Generic();
	$rooten_items_cpt_portfolio->init( 'portfolio' );

}  // end if


/**
 * BdThemes Rooten Add-On plugin: FAQ
 *
 * @since 1.4.2
 *
 * @uses DDW_TBEX_Items_CPT_Generic()
 */
if ( function_exists( 'bdthemes_faq_register' ) ) {

	$rooten_items_cpt_faq = new \DDW\TBEX\Items_CPT_Generic();
	$rooten_items_cpt_faq->init( 'faq' );

}  // end if


/**
 * BdThemes Rooten Add-On plugin: Testimonials
 *
 * @since 1.4.2
 *
 * @uses DDW_TBEX_Items_CPT_Generic()
 */
if ( function_exists( 'bdthemes_testimonial_register' ) ) {

	$rooten_items_cpt_testimonials = new \DDW\TBEX\Items_CPT_Generic();
	$rooten_items_cpt_testimonials->init( 'bdthemes-testimonial' );

}  // end if


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_rooten_resources', 120 );
/**
 * General resources items for Rooten Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 */
function ddw_tbex_themeitems_rooten_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for Rooten */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	ddw_tbex_resource_item(
		'support-contact',
		'theme-support-contact',
		'group-theme-resources',
		'https://elementpack.pro/support/'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://elementpack.pro/demo/'
	);

}  // end function
