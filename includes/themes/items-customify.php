<?php

// includes/themes/items-customify

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if Customify Pro Add-On plugin is active or not.
 *
 * @since  1.3.0
 *
 * @return bool TRUE if class exists, otherwise FALSE.
 */
function ddw_tbex_is_customify_pro_active() {

	return ( class_exists( 'Customify_Pro' ) ) ? TRUE : FALSE;

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_customify', 100 );
/**
 * Items for Theme: Customify (free, by WPCustomify/ PressMaximum)
 *
 * @since  1.2.0
 *
 * @uses   ddw_tbex_string_customize_design()
 * @uses   ddw_tbex_customizer_start()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_customify() {

	/** Customify creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child' ),
			'href'   => esc_url( admin_url( 'themes.php?page=customify' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_theme_title( 'attr' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-creative-customize',
				'parent' => 'theme-creative',
				'title'  => ddw_tbex_string_customize_design(),
				'href'   => ddw_tbex_customizer_start(),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => ddw_tbex_string_customize_design()
				)
			)
		);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_customify_customize', 100 );
/**
 * Customize items for Customify Theme
 *
 * @since  1.2.0
 *
 * @uses   ddw_tbex_customizer_focus()
 * @uses   ddw_tbex_string_customize_attr()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_customify_customize() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'customifycmz-header',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Header Builder', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'header_settings' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Header Builder', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'customifycmz-footer',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Footer Builder', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'footer_settings' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Footer Builder', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'customifycmz-layouts',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Layouts', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'layout_panel' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Layouts', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'customifycmz-blog',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Blog', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'blog_panel', get_post_type_archive_link( 'post' ) ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Blog', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'customifycmz-styling',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Styling &amp; Colors', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'styling_panel' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Styling &amp; Colors', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'customifycmz-typography',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Typography', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'typography_panel' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Typography', 'toolbar-extras' ) )
			)
		)
	);

	/** Customify Pro module: Portfolios */
	if ( ddw_tbex_is_customify_pro_active() ) {

		if ( Customify_Pro()->is_enabled_module( 'Customify_Pro_Module_Portfolio' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'customifycmz-portfolios',
					'parent' => 'theme-creative-customize',
					/* translators: Autofocus panel in the Customizer */
					'title'  => esc_attr__( 'Portfolio', 'toolbar-extras' ),
					'href'   => ddw_tbex_customizer_focus( 'panel', 'portfolio_panel' ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => ddw_tbex_string_customize_attr( __( 'Portfolio', 'toolbar-extras' ) )
					)
				)
			);

		}  // end if

	}  // end if

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'customifycmz-compatibility',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Compatibility', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'compatibility_panel' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Plugin Compatibility', 'toolbar-extras' ) )
			)
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_customify_resources', 120 );
/**
 * General resources items for Customify Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since  1.2.0
 *
 * @uses   ddw_tbex_display_items_resources()
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_customify_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for Customify Theme */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => ddw_tbex_is_customify_pro_active() ? 'theme-settings' : 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	ddw_tbex_resource_item(
		'support-forum',
		'theme-support',
		'group-theme-resources',
		'https://wordpress.org/support/theme/customify'
	);

	ddw_tbex_resource_item(
		'support-contact',
		'theme-contact',
		'group-theme-resources',
		'https://wpcustomify.com/contact/'
	);

	ddw_tbex_resource_item(
		'documentation',
		'theme-docs',
		'group-theme-resources',
		'https://wpcustomify.com/help/documentation/',
		esc_attr__( 'Official Theme Documentation', 'toolbar-extras' )
	);

	/** Required hook for Customify Pro resources */
	do_action( 'tbex_after_theme_free_docs' );

	ddw_tbex_resource_item(
		'facebook-group',
		'theme-facebook',
		'group-theme-resources',
		'https://www.facebook.com/groups/customify/'
	);

	ddw_tbex_resource_item(
		'translations-community',
		'theme-translate',
		'group-theme-resources',
		'https://translate.wordpress.org/projects/wp-themes/customify'
	);

	ddw_tbex_resource_item(
		'github',
		'theme-github',
		'group-theme-resources',
		'https://github.com/PressMaximum/customify'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://wpcustomify.com/'
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_customify_pro', 100 );
/**
 * Items for Theme: Customify Pro - Add-On Plugin (Premium, by PressMaximum)
 *
 * @since  1.3.0
 *
 * @uses   ddw_tbex_is_customify_pro_active()
 * @uses   ddw_tbex_is_elementor_active()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_customify_pro() {

	/** Bail early if Pro version is not active */
	if ( ! ddw_tbex_is_customify_pro_active() ) {
		return;
	}

	/** Customify settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-settings',
			'parent' => 'group-active-theme',
			'title'  => esc_attr__( 'Customify Pro Settings', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'themes.php?page=customify' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Customify Pro Settings', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-modules',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Activate Modules', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=customify' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Modules', 'toolbar-extras' )
				)
			)
		);

}  // end function


add_action( 'tbex_after_theme_free_docs', 'ddw_tbex_themeitems_customify_pro_resources' );
/**
 * Additional Resource Items for Customify Pro
 *
 * @since 1.3.0
 *
 * @uses  ddw_tbex_is_customify_pro_active()
 * @uses  ddw_tbex_resource_item()
 */
function ddw_tbex_themeitems_customify_pro_resources() {

	/** Bail early if Pro version is not active */
	if ( ! ddw_tbex_is_customify_pro_active() ) {
		return;
	}

	ddw_tbex_resource_item(
		'pro-modules-documentation',
		'theme-docs-pro',
		'group-theme-resources',
		'https://wpcustomify.com/help/documentation/customify-pro-modules/'
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_customify_sites_import', 100 );
/**
 * Items for Demos Import (Plugin):
 *   Customify Site Library (free, by WPCustomify/ PressMaximum)
 *
 * @since  1.2.0
 *
 * @uses   ddw_tbex_display_items_demo_import()
 * @uses   ddw_tbex_id_sites_browser()
 * @uses   ddw_tbex_item_title_with_settings_icon()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_customify_sites_import() {

	/** Bail early if no display of Demo Import items */
	if ( ! ddw_tbex_display_items_demo_import() ) {
		return;
	}

	/** Sites Library */
	if ( defined( 'CUSTOMIFY_SITES_URL' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => ddw_tbex_id_sites_browser(),
				'parent' => 'group-demo-import',
				'title'  => ddw_tbex_item_title_with_settings_icon(
					esc_attr__( 'Import Customify Sites', 'toolbar-extras' ),
					'general',
					'demo_import_icon'
				),
				'href'   => esc_url( admin_url( 'themes.php?page=customify-sites' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Import Customify Sites', 'toolbar-extras' )
				)
			)
		);

	}  // end if

}  // end if


/**
 * Customify Pro module: Portfolios
 *
 * @since 1.3.0
 *
 * @uses  General portfolio post type support (CPT: 'portfolio')
 */
if ( ddw_tbex_is_customify_pro_active() ) {

	if ( Customify_Pro()->is_enabled_module( 'Customify_Pro_Module_Portfolio' ) ) {

		require_once( TBEX_PLUGIN_DIR . 'includes/plugins/items-cpt-portfolio.php' );

	}  // end if

}  // end if