<?php

// items-page-builder-framework
// items-page-builder-framework-premium

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if Page Builder Framework Premium Add-On plugin is active or not.
 *
 * @since  1.1.0
 *
 * @return bool TRUE if constant defined, otherwise FALSE.
 */
function ddw_tbex_is_wpbf_premium_active() {

	return ( defined( 'WPBF_PREMIUM_VERSION' ) ) ? TRUE : FALSE;

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_pbf', 100 );
/**
 * Items for Theme: Page Builder Framework (free & Premium, by David Vongries & MapSteps)
 *
 * @since  1.1.0
 *
 * @uses   ddw_tbex_string_theme_title()
 * @uses   ddw_tbex_customizer_focus()
 * @uses   ddw_tbex_customizer_start()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_pbf() {

	/** Page Builder Framework creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title(),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'layout_panel' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_theme_title( 'attr' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-creative-customize',
				'parent' => 'theme-creative',
				'title'  => esc_attr__( 'Customize Design', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_start(),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Customize Design', 'toolbar-extras' )
				)
			)
		);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_pbf_customize', 100 );
/**
 * Customize items for Page Builder Framework Theme
 *
 * @since  1.1.0
 *
 * @uses   ddw_tbex_customizer_focus()
 * @uses   ddw_tbex_string_customize_attr()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_pbf_customize() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'pbfcmz-general',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'General', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'layout_panel' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'General', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'pbfcmz-typography',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Typography', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'typo_panel' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Typography', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'pbfcmz-header',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Header', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'header_panel' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Header', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'pbfcmz-footer',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Footer', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'wpbf_footer_options' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Footer', 'toolbar-extras' ) )
			)
		)
	);

	/** Optional WooCommerce customization - since PBF 1.8 Beta 1 or higher */
	if ( function_exists( 'wpbf_woo_deregister_defaults' ) ) {
		
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'pbfcmz-woocommerce',
				'parent' => 'theme-creative-customize',
				/* translators: Autofocus panel in the Customizer */
				'title'  => esc_attr__( 'WooCommerce Integration', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_focus( 'panel', 'woocommerce', get_post_type_archive_link( 'product' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => ddw_tbex_string_customize_attr( __( 'WooCommerce Integration', 'toolbar-extras' ) )
				)
			)
		);

	}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_pbf_resources', 120 );
/**
 * General resources items for Page Builder Framework Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.1.0
 *
 * @uses  ddw_tbex_display_items_resources()
 * @uses  ddw_tbex_is_wpbf_premium_active()
 * @uses  ddw_tbex_resource_item()
 */
function ddw_tbex_themeitems_pbf_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for Page Builder Framework Theme */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => ddw_tbex_is_wpbf_premium_active() ? 'theme-settings' : 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	ddw_tbex_resource_item(
		'support-forum',
		'theme-support',
		'group-theme-resources',
		'https://wordpress.org/support/theme/page-builder-framework'
	);

	ddw_tbex_resource_item(
		'facebook-group',
		'theme-facebook',
		'group-theme-resources',
		'https://www.facebook.com/groups/wpagebuilderframework/'
	);

	ddw_tbex_resource_item(
		'documentation',
		'theme-docs',
		'group-theme-resources',
		'https://wp-pagebuilderframework.com/docs/',
		esc_attr__( 'Official Theme Documentation', 'toolbar-extras' )
	);

	/** Required hook for WPBF Premium resources */
	do_action( 'tbex_after_theme_free_docs' );

	ddw_tbex_resource_item(
		'translations-community',
		'theme-translate',
		'group-theme-resources',
		'https://translate.wordpress.org/projects/wp-themes/page-builder-framework'
	);

	ddw_tbex_resource_item(
		'github',
		'theme-github',
		'group-theme-resources',
		'https://github.com/MapSteps/Page-Builder-Framework'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://wp-pagebuilderframework.com/'
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_wpbf_premium', 100 );
/**
 * Items for Theme: Page Builder Framework Premium - Add-On Plugin (Premium, by David Vongries & MapSteps)
 *
 * @since  1.1.0
 *
 * @uses   ddw_tbex_is_wpbf_premium_active()
 * @uses   ddw_tbex_customizer_focus()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_wpbf_premium() {

	/** Bail early if Premium version is not active */
	if ( ! ddw_tbex_is_wpbf_premium_active() ) {
		return;
	}

	/** Page Builder Framework settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-settings',
			'parent' => 'group-active-theme',
			'title'  => esc_attr__( 'PBF Premium Settings', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'themes.php?page=wpbf-premium' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'PBF Premium Settings', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-global',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Global Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=wpbf-premium' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Global Settings', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-license',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'License', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=wpbf-premium&tab=license' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'License', 'toolbar-extras' )
				)
			)
		);

	/** Premium Add-On: Customizer additions */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'pbfcmz-scripts-styles',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Scripts &amp; Styles', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'scripts_panel' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Scripts &amp; Styles', 'toolbar-extras' ) )
			)
		)
	);

}  // end function


add_action( 'tbex_after_theme_free_docs', 'ddw_tbex_themeitems_wpbf_premium_resources' );
/**
 * Additional Resource Items for Page Builder Framework Premium
 *
 * @since 1.2.0
 *
 * @uses  ddw_tbex_is_wpbf_premium_active()
 * @uses  ddw_tbex_resource_item()
 */
function ddw_tbex_themeitems_wpbf_premium_resources() {

	/** Bail early if Premium version is not active */
	if ( ! ddw_tbex_is_wpbf_premium_active() ) {
		return;
	}

	ddw_tbex_resource_item(
		'pro-documentation',
		'theme-docs-pro',
		'group-theme-resources',
		'https://wp-pagebuilderframework.com/docs_cats/premium/'
	);

	ddw_tbex_resource_item(
		'translations-pro',
		'theme-translations-pro',
		'group-theme-resources',
		'http://translate.wp-pagebuilderframework.com/sign-up/'
	);

}  // end function