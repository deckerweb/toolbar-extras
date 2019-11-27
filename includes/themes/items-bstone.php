<?php

// includes/themes/items-bstone

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_bstone', 100 );
/**
 * Items for Theme: Bstone (free, by Stack Themes)
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_string_theme_title()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_bstone( $admin_bar ) {

	/** Theme creative */
	$admin_bar->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child' ),
			'href'   => esc_url( admin_url( 'themes.php?page=bstone' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_theme_title( 'attr', 'child' ),
			)
		)
	);

	/** Bstone customize */
	ddw_tbex_item_theme_creative_customize();

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_bstone_customize' );
/**
 * Customize items for Bstone Theme
 *
 * @since 1.4.9
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_bstone_customize( array $items ) {

	$bstone_options = get_option( 'bstone_light_options' );

	if ( 'on' !== $bstone_options[ 'bst-enable-panel-layout' ] ) {

		$bstone_items[ 'panel-layout' ] = array(
			'type'  => 'panel',
			'title' => __( 'Layout', 'toolbar-extras' ),
			'id'    => 'bstonecmz-layout',
		);

	}  // end if

	if ( 'on' !== $bstone_options[ 'bst-enable-panel-colors' ] ) {

		$bstone_items[ 'panel-colors' ] = array(
			'type'  => 'panel',
			'title' => __( 'Colors &amp; Background', 'toolbar-extras' ),
			'id'    => 'bstonecmz-colors-background',
		);

	}  // end if

	if ( 'on' !== $bstone_options[ 'bst-enable-panel-typography' ] ) {

		$bstone_items[ 'panel-typography' ] = array(
			'type'  => 'panel',
			'title' => __( 'Typography', 'toolbar-extras' ),
			'id'    => 'bstonecmz-typography',
		);

	}  // end if

	if ( 'on' !== $bstone_options[ 'bst-enable-panel-spacing' ] ) {

		$bstone_items[ 'panel-spacing' ] = array(
			'type'  => 'panel',
			'title' => __( 'Spacing', 'toolbar-extras' ),
			'id'    => 'bstonecmz-spacing',
		);

	}  // end if

	$bstone_items[ 'colors' ] = array(
		'type'  => 'section',
		'title' => __( 'Colors', 'toolbar-extras' ),
		'id'    => 'bstonecmz-header',
	);

	$bstone_items[ 'panel-extra-elements' ] = array(
		'type'  => 'panel',
		'title' => __( 'Settings', 'toolbar-extras' ),
		'id'    => 'bstonecmz-settings',
	);

	/** Merge and return with all items */
	return array_merge( $items, $bstone_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_bstone_resources', 120 );
/**
 * General resources items for Bstone Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_bstone_resources( $admin_bar ) {

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
		'https://wordpress.org/support/theme/bstone'
	);

	ddw_tbex_resource_item(
		'documentation',
		'theme-docs',
		'group-theme-resources',
		'https://wpbstone.com/documentation/'
	);

	ddw_tbex_resource_item(
		'translations-community',
		'theme-translate',
		'group-theme-resources',
		'https://translate.wordpress.org/projects/wp-themes/bstone'
	);

	ddw_tbex_resource_item(
		'github',
		'theme-github',
		'group-theme-resources',
		'https://github.com/stackthemes/bstone'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://wpbstone.com/'
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_bstone_demo_importer', 100 );
/**
 * Items for Demos Import (Plugin):
 *   Bstone Demo Importer (free, by Stack Themes)
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_display_items_demo_import()
 * @uses ddw_tbex_id_sites_browser()
 * @uses ddw_tbex_item_title_with_settings_icon()
 * @uses ddw_tbex_meta_target()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_bstone_demo_importer( $admin_bar ) {

	/** Bail early if no display of Demo Import items */
	if ( ! ddw_tbex_display_items_demo_import() ) {
		return $admin_bar;
	}

	/** Sites Library */
	if ( class_exists( 'Bstone_Demo_Importer' ) ) {

		$admin_bar->add_node(
			array(
				'id'     => ddw_tbex_id_sites_browser(),
				'parent' => 'group-demo-import',
				'title'  => ddw_tbex_item_title_with_settings_icon(
					esc_attr__( 'Bstone Demo Importer', 'toolbar-extras' ),
					'general',
					'demo_import_icon'
				),
				'href'   => esc_url( admin_url( 'themes.php?page=demo-importer&browse=all' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Bstone Demo Importer', 'toolbar-extras' ),
				)
			)
		);

	}  // end if

}  // end function
