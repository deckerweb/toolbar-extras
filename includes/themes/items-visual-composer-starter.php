<?php

// includes/themes/items-visual-composer-starter

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_visual_composer_starter', 100 );
/**
 * Items for Theme: Visual Composer Starter (free, by The Visual Composer Team)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_customizer_focus()
 * @uses ddw_tbex_item_theme_creative_customize()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_visual_composer_starter() {

	/** Visual Composer Starter creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'vct_overall_site' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_theme_title( 'attr', 'child' )
			)
		)
	);

	/** Visual Composer Starter customize */
	ddw_tbex_item_theme_creative_customize();

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_visual_composer_starter_customize' );
/**
 * Customize items for Visual Composer Starter Theme
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_is_woocommerce_active()
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_visual_composer_starter_customize( array $items ) {

	/** Remove default item (to re-add at another position) */
	if ( isset( $items[ 'title_tagline' ] ) ) {
		$items[ 'title_tagline' ] = null;
	}

	/** Declare theme's items */
	$vcs_items = array(
		'vct_overall_site' => array(
			'type'  => 'section',
			'title' => __( 'Theme Options', 'toolbar-extras' ),
			'id'    => 'vcscmz-theme-options',
		),
		'vct_header_and_menu_area' => array(
			'type'  => 'section',
			'title' => __( 'Header', 'toolbar-extras' ),
			'id'    => 'vcscmz-header',
		),
		'vct_footer_area' => array(
			'type'  => 'section',
			'title' => __( 'Footer', 'toolbar-extras' ),
			'id'    => 'vcscmz-footer',
		),
		'vct_fonts_and_style' => array(
			'type'  => 'panel',
			'title' => __( 'Fonts &amp; Styles', 'toolbar-extras' ),
			'id'    => 'vcscmz-fonts-style',
		),
		'background_image' => array(
			'type' => 'section',
		),
		/** Re-add here */
		'title_tagline' => array(
			'type' => 'section',
		),
	);

	/** Optional WooCommerce item */
	if ( ddw_tbex_is_woocommerce_active() ) {

		$vcs_items[ 'vct_woocommerce_settings' ] = array(
			'type'        => 'section',
			'title'       => __( 'WooCommerce Settings', 'toolbar-extras' ),
			'id'          => 'vcscmz-woocommerce-settings',
			'preview_url' => get_post_type_archive_link( 'product' ),
		);

	}  // end if

	/** Merge and return with all items */
	return array_merge( $items, $vcs_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_visual_composer_starter_resources', 120 );
/**
 * General resources items for Visual Composer Starter Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_visual_composer_starter_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for Visual Composer Starter Theme */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	ddw_tbex_resource_item(
		'support-forum',
		'theme-support',
		'group-theme-resources',
		'https://wordpress.org/support/theme/visual-composer-starter'
	);

	ddw_tbex_resource_item(
		'translations-community',
		'theme-translate',
		'group-theme-resources',
		'https://translate.wordpress.org/projects/wp-themes/visual-composer-starter'
	);

	ddw_tbex_resource_item(
		'github',
		'theme-github',
		'group-theme-resources',
		'https://github.com/wpbakery/visual-composer-starter'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://visualcomposer.io/visual-composer-starter-theme/'
	);

}  // end function
