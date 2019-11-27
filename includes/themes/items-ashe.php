<?php

// includes/themes/items-ashe

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_ashe', 100 );
/**
 * Items for Theme: Ashe (free, by WP Royal)
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_string_theme_title()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_ashe( $admin_bar ) {

	/** Theme creative */
	$admin_bar->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child' ),
			'href'   => esc_url( admin_url( 'themes.php?page=about-ashe' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_theme_title( 'attr', 'child' ),
			)
		)
	);

	/** Ashe customize */
	ddw_tbex_item_theme_creative_customize();

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_ashe_customize' );
/**
 * Customize items for Ashe Theme
 *
 * @since 1.4.9
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_ashe_customize( array $items ) {

	/** Declare theme's items */
	$ashe_items = array(
		'ashe_colors' => array(
			'type'  => 'section',
			'title' => __( 'Colors', 'toolbar-extras' ),
			'id'    => 'ashecmz-colors',
		),
		'ashe_general' => array(
			'type'  => 'section',
			'title' => __( 'General Layouts', 'toolbar-extras' ),
			'id'    => 'ashecmz-general-layouts',
		),
		'header_image' => array(
			'type'  => 'section',
			'title' => __( 'Header Image', 'toolbar-extras' ),
			'id'    => 'ashecmz-header-image',
		),
		'ashe_main_nav' => array(
			'type'  => 'section',
			'title' => __( 'Main Nav', 'toolbar-extras' ),
			'id'    => 'ashecmz-main-nav',
		),
		'ashe_featured_slider' => array(
			'type'  => 'section',
			'title' => __( 'Integrated Slider', 'toolbar-extras' ),
			'id'    => 'ashecmz-integrated-slider',
		),
		'ashe_featured_links' => array(
			'type'  => 'section',
			'title' => __( 'Featured Links', 'toolbar-extras' ),
			'id'    => 'ashecmz-featured-links',
		),
		'ashe_blog_page' => array(
			'type'        => 'section',
			'title'       => __( 'Blog Page', 'toolbar-extras' ),
			'id'          => 'ashecmz-blog-page',
			'preview_url' => get_post_type_archive_link( 'post' ),
		),
		'ashe_single_page' => array(
			'type'        => 'section',
			'title'       => __( 'Single Page', 'toolbar-extras' ),
			'id'          => 'ashecmz-single-page',
			'preview_url' => get_post_type_archive_link( 'post' ),
		),
		'ashe_typography' => array(
			'type'  => 'section',
			'title' => __( 'Typography', 'toolbar-extras' ),
			'id'    => 'ashecmz-typography',
		),
		'ashe_page_footer' => array(
			'type'  => 'section',
			'title' => __( 'Page Footer', 'toolbar-extras' ),
			'id'    => 'ashecmz-page-footer',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $ashe_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_ashe_resources', 120 );
/**
 * General resources items for Ashe Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_ashe_resources( $admin_bar ) {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return $admin_bar;
	}

	/** Group: Theme's resources */
	$admin_bar->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' ),
		)
	);

	ddw_tbex_resource_item(
		'support-forum',
		'theme-support',
		'group-theme-resources',
		'https://wordpress.org/support/theme/ashe'
	);

	ddw_tbex_resource_item(
		'documentation',
		'theme-docs',
		'group-theme-resources',
		'https://wp-royal.com/themes/ashe/docs/'
	);

	ddw_tbex_resource_item(
		'youtube-tuturials',
		'theme-youtube-tuturials',
		'group-theme-resources',
		'https://www.youtube.com/watch?v=a41KNjUduuk&list=PLjFiZESrp955gEYwTy8bC_ZaHNyCnFffk'
	);

	ddw_tbex_resource_item(
		'translations-community',
		'theme-translate',
		'group-theme-resources',
		'https://translate.wordpress.org/projects/wp-themes/ashe'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://wp-royal.com/themes/item-ashe-free/'
	);

}  // end function
