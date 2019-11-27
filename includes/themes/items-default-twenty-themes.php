<?php

// includes/themes/items-default-twenty-themes

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_default_twenty', 100 );
/**
 * Items for Themes: "Twenty ..." Default Themes (by WordPress.org)
 *
 * @since 1.0.0
 * @since 1.4.0 Added few standard Customizer deep links.
 * @since 1.4.7 Improved "Twenty Eleven" support.
 *
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_customizer_start()
 * @uses ddw_tbex_item_theme_creative_customize()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_default_twenty( $admin_bar ) {

	/** Theme creative */
	$admin_bar->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child' ),
			'href'   => ddw_tbex_customizer_start(),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_theme_title( 'attr', 'child' ),
			)
		)
	);

		/** Theme customize */
		ddw_tbex_item_theme_creative_customize();

		/** Theme Options - for "Twenty Eleven" only */
		$theme_slug = wp_basename( get_template_directory() );

		if ( 'twentyeleven' === $theme_slug ) {

			$admin_bar->add_node(
				array(
					'id'     => 'twentyeleven-settings',
					'parent' => 'theme-creative',
					'title'  => esc_attr__( 'Theme Options', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'themes.php?page=theme_options' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => sprintf(
							/* translators: %s - name of the theme, "Twenty Eleven" */
							esc_attr__( '%s Theme Options', 'toolbar-extras' ),
							ddw_tbex_string_theme_title( 'attr' )
						),
					)
				)
			);

		}  // end if

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_default_twenty_customize' );
/**
 * Customize items for: "Twenty ..." Default Themes (by WordPress.org)
 *
 * @since 1.0.0
 * @since 1.4.0 Refactored using filter/array declaration.
 * @since 1.4.7 Splitted array; added "Twenty Twenty" support.
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_default_twenty_customize( array $items ) {

	$theme_slug = wp_basename( get_template_directory() );

	/** For: 2020 */
	if ( 'twentytwenty' === $theme_slug ) {

		$twenty_items[ 'options' ] = array(
			'type'  => 'section',
			'title' => __( 'Theme Options', 'toolbar-extras' ),
			'id'    => 'default-twenty-theme-options',
		);

		$twenty_items[ 'cover_template_options' ] = array(
			'type'  => 'section',
			'title' => __( 'Cover Template', 'toolbar-extras' ),
			'id'    => 'default-twenty-cover-template',
		);

	}  // end if

	/** For: 2017 */
	if ( 'twentyseventeen' === $theme_slug ) {

		$twenty_items[ 'theme_options' ] = array(
			'type'  => 'section',
			'title' => __( 'Theme Options', 'toolbar-extras' ),
			'id'    => 'default-twenty-theme-options',
		);

	}  // end if

	/** For: 2010-2017 */
	if ( ! in_array( $theme_slug, array( 'twentytwenty', 'twentynineteen' ) ) ) {

		$twenty_items[ 'header_image' ] = array(
			'type'  => 'section',
			'title' => ( 'twentyseventeen' === $theme_slug ) ? __( 'Header Media', 'toolbar-extras' ) : __( 'Header Image', 'toolbar-extras' ),
			'id'    => 'default-twenty-header-media',
		);

	}  // end if

	/** For: 2010-2020 */
	$twenty_items[ 'colors' ] = array(
		'type'  => 'section',
		'title' => __( 'Colors', 'toolbar-extras' ),
		'id'    => 'default-twenty-colors',
	);

	/** For: 2010-2016, 2020 */
	if ( ! in_array( $theme_slug, array( 'twentynineteen', 'twentyseventeen' ) ) ) {

		$twenty_items[ 'background_image' ] = array(
			'type'  => 'section',
			'title' => __( 'Background Image', 'toolbar-extras' ),
			'id'    => 'default-twenty-background-image',
		);

	}  // end if

	/** For: 2010-2020 */
	$twenty_items[ 'custom_css' ] = array(
		'type'  => 'section',
		'title' => __( 'Custom CSS', 'toolbar-extras' ),
		'id'    => 'default-twenty-css',
	);

	/** Merge and return with all items */
	return array_merge( $items, $twenty_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_default_twenty_resources', 999 );
/**
 * General resources items for Twenty default Themes.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_default_twenty_resources( $admin_bar ) {

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

	//$theme_slug = get_stylesheet();
	$theme_slug = wp_basename( get_template_directory() );

	ddw_tbex_resource_item(
		'support-forum',
		$theme_slug . '-support',
		'group-theme-resources',
		'https://wordpress.org/support/theme/' . $theme_slug
	);

	ddw_tbex_resource_item(
		'translations-community',
		$theme_slug . '-translate',
		'group-theme-resources',
		'https://translate.wordpress.org/projects/wp-themes/' . $theme_slug
	);

}  // end function
