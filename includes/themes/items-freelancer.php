<?php

// includes/themes/items-freelancer

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_freelancer', 100 );
/**
 * Items for Theme: Freelancer Framework (free, by Cobalt Apps)
 *
 * @since 1.1.0
 * @since 1.4.0 Simplified functions.
 *
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_customizer_focus()
 * @uses ddw_tbex_item_theme_creative_customize()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_freelancer( $admin_bar ) {

	/** Freelancer creative */
	$admin_bar->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title(),
			'href'   => esc_url( admin_url( 'themes.php?page=freelancer-settings' ) ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_theme_title( 'attr' ),
			)
		)
	);

		/** Freelancer customize */
		ddw_tbex_item_theme_creative_customize();

		$admin_bar->add_node(
			array(
				'id'     => 'theme-creative-settings',
				'parent' => 'theme-creative',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=freelancer-settings' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'theme-creative-license',
				'parent' => 'theme-creative',
				'title'  => esc_attr__( 'License', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=freelancer-license' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'License', 'toolbar-extras' ),
				)
			)
		);

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_freelancer_customize' );
/**
 * Customize items for Freelancer Theme
 *
 * @since 1.4.0
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_freelancer_customize( array $items ) {

	/** Declare theme's items */
	$freelancer_items = array(
		'custom_css' => array(
			'type'  => 'section',
			'title' => __( 'Custom CSS', 'toolbar-extras' ),
			'id'    => 'freelancercmz-css',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $freelancer_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_freelancer_resources', 120 );
/**
 * General resources items for Freelancer Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.1.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_freelancer_resources( $admin_bar ) {

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
		'support-contact',
		'theme-contact',
		'group-theme-resources',
		'https://cobaltapps.com/my-account/'
	);

	ddw_tbex_resource_item(
		'documentation',
		'theme-docs',
		'group-theme-resources',
		'https://docs.cobaltapps.com/collection/398-freelancer-framework',
		ddw_tbex_string_official_theme_documentation()
	);

	ddw_tbex_resource_item(
		'community-forum',
		'theme-forums',
		'group-theme-resources',
		'https://cobaltapps.com/community/index.php'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://cobaltapps.com/downloads/freelancer-framework/'
	);

}  // end function
