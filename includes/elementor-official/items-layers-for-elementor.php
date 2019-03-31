<?php

// includes/elementor-official/items-layers-for-elementor

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_layers_for_elementor', 100 );
/**
 * Items for Theme:
 *   Layers for Elementor (free, by Elementor Team/ Elementor Ltd.)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_customizer_start()
 * @uses ddw_tbex_item_theme_creative_customize()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_layers_for_elementor() {

	/** Theme creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child', 'Layers for Elementor' ),
			'href'   => ddw_tbex_customizer_start(),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_theme_title( 'attr', 'child', 'Layers for Elementor' ),
			)
		)
	);

		/** Theme customize */
		ddw_tbex_item_theme_creative_customize();

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-creative-layers-setup',
				'parent' => 'theme-creative',
				'title'  => esc_attr__( 'Layers Setup', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=layerswp-get-started' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Layers Setup', 'toolbar-extras' )
				)
			)
		);

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_layers_for_elementor_customize' );
/**
 * Customize items for Layers for Elementor Theme
 *
 * @since 1.4.2
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_layers_for_elementor_customize( array $items ) {

	/** Declare theme's items */
	$layers_items = array(
		'layers-site-settings' => array(
			'type'  => 'panel',
			'title' => __( 'Site Settings', 'toolbar-extras' ),
			'id'    => 'elayerscmz-site-settings',
		),
		'layers-header' => array(
			'type'  => 'panel',
			'title' => __( 'Header', 'toolbar-extras' ),
			'id'    => 'elayerscmz-header',
		),
		'layers-blog-archive-single' => array(
			'type'        => 'panel',
			'title'       => __( 'Blog', 'toolbar-extras' ),
			'id'          => 'elayerscmz-blog',
			'preview_url' => get_post_type_archive_link( 'post' ),
		),
		'layers-footer' => array(
			'type'  => 'panel',
			'title' => __( 'Footer', 'toolbar-extras' ),
			'id'    => 'elayerscmz-footer',
		),
		'custom_css' => array(
			'type'  => 'section',
			'title' => __( 'Custom CSS', 'toolbar-extras' ),
			'id'    => 'elayerscmz-css',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $layers_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_layers_for_elementor_resources', 999 );
/**
 * General resources items for Layers for Elementor Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 * @uses ddw_tbex_get_resource_url()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_layers_for_elementor_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for Layers for Elementor Theme */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	ddw_tbex_resource_item(
		'documentation',
		'elayers-docs',
		'group-theme-resources',
		ddw_tbex_get_resource_url( 'elementor', 'url_layers_docs' )
	);

	ddw_tbex_resource_item(
		'facebook-group',
		'elayers-fbgroup',
		'group-theme-resources',
		ddw_tbex_get_resource_url( 'elementor', 'url_fb_group' )
	);

	ddw_tbex_resource_item(
		'official-site',
		'elayers-site',
		'group-theme-resources',
		ddw_tbex_get_resource_url( 'elementor', 'url_layers_site' )
	);

}  // end function
