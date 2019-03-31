<?php

// includes/themes/items-phlox

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if Phlox Core Elements Add-On plugin is active or not.
 *
 * @since 1.3.0
 *
 * @return bool TRUE if class exists, FALSE otherwise.
 */
function ddw_tbex_is_phlox_core_active() {

	return ( class_exists( 'Auxin_Plugin_Requirements' ) ) ? TRUE : FALSE;

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_phlox', 100 );
/**
 * Items for Theme: Phlox (free, by averta)
 *
 * @since 1.3.0
 *
 * @uses ddw_tbex_string_customize_design()
 * @uses ddw_tbex_customizer_start()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_phlox() {

	/** Theme creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child' ),
			'href'   => ddw_tbex_is_phlox_core_active() ? esc_url( admin_url( 'admin.php?page=auxin-welcome' ) ) : esc_url( admin_url( 'themes.php?page=auxin-welcome' ) ),
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


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_phlox_customize', 100 );
/**
 * Customize items for Phlox Theme
 *
 * @since 1.3.0
 *
 * @uses ddw_tbex_customizer_focus()
 * @uses ddw_tbex_string_customize_attr()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_phlox_customize() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'phloxcmz-general',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'General', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'general-section' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'General', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'phloxcmz-appearance',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Appearance', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'appearance-section' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Appearance', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'phloxcmz-header',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Header', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'header-section' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Header', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'phloxcmz-footer',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Footer', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'footer-section' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Footer', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'phloxcmz-blog',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Blog', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'blog-section', get_post_type_archive_link( 'post' ) ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Blog', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'phloxcmz-page',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Page', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'page-section' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Page', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'phloxcmz-extras',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Extras', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'tools-section' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Extras', 'toolbar-extras' ) )
			)
		)
	);

	/** Phlox Portfolio Add-On: Portfolios */
	if ( defined( 'AUXPFO_VERSION' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'phloxcmz-portfolios',
				'parent' => 'theme-creative-customize',
				/* translators: Autofocus panel in the Customizer */
				'title'  => esc_attr__( 'Portfolio', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_focus( 'panel', 'portfolio-section' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => ddw_tbex_string_customize_attr( __( 'Portfolio', 'toolbar-extras' ) )
				)
			)
		);

	}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_phlox_resources', 120 );
/**
 * General resources items for Phlox Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.3.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_phlox_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for Phlox Theme */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => ddw_tbex_is_phlox_core_active() ? 'theme-settings' : 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	ddw_tbex_resource_item(
		'support-forum',
		'theme-support',
		'group-theme-resources',
		'http://support.averta.net/en/item/phlox/'
	);

	ddw_tbex_resource_item(
		'documentation',
		'theme-docs',
		'group-theme-resources',
		'http://support.averta.net/en/e-item/phlox-wordpress-theme/',
		esc_attr__( 'Official Theme Documentation', 'toolbar-extras' )
	);

	ddw_tbex_resource_item(
		'knowledge-base',
		'theme-kb',
		'group-theme-resources',
		'http://support.averta.net/en/knowledgebase/'
	);

	ddw_tbex_resource_item(
		'translations-community',
		'theme-translate',
		'group-theme-resources',
		'https://translate.wordpress.org/projects/wp-themes/phlox'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'http://phlox.pro/'
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_phlox_core_elements', 100 );
/**
 * Items for Theme: Phlox Core Elements - Add-On Plugin (free, by averta)
 *
 * @since 1.3.0
 *
 * @uses ddw_tbex_is_phlox_core_active()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_phlox_core_elements() {

	/** Bail early if Add-On version is not active */
	if ( ! ddw_tbex_is_phlox_core_active() ) {
		return;
	}

	/** Theme settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-settings',
			'parent' => 'group-active-theme',
			'title'  => esc_attr__( 'Phlox Settings', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=auxin-welcome' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Phlox Settings', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-dashboard',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'General Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=auxin-welcome' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'General Info', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-plugins-wizard',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Plugin Installer', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=auxin-welcome&tab=plugins' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Plugin Installer', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-system-info',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'System Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=auxin-welcome&tab=status' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'System Info', 'toolbar-extras' )
				)
			)
		);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_phlox_demos_import', 100 );
/**
 * Items for Demos Import
 *
 * @since 1.3.0
 *
 * @uses ddw_tbex_display_items_demo_import()
 * @uses ddw_tbex_id_sites_browser()
 * @uses ddw_tbex_item_title_with_settings_icon()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_phlox_demos_import() {

	/** Bail early if no display of Demo Import items */
	if ( ! ddw_tbex_display_items_demo_import() || ! ddw_tbex_is_phlox_core_active() ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => ddw_tbex_id_sites_browser(),
			'parent' => 'group-demo-import',
			'title'  => ddw_tbex_item_title_with_settings_icon(
				esc_attr__( 'Import Phlox Demos', 'toolbar-extras' ),
				'general',
				'demo_import_icon'
			),
			'href'   => esc_url( admin_url( 'admin.php?page=auxin-welcome&tab=importer' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Import Phlox Demos', 'toolbar-extras' )
			)
		)
	);

}  // end function


/**
 * Add-On Plugin: Phlox Portfolio (free, by averta)
 *
 * @since 1.3.0
 *
 * @uses General portfolio post type support (CPT: 'portfolio')
 */
if ( defined( 'AUXPFO_VERSION' ) ) {

	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-cpt-portfolio.php';

}  // end if


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_remove_items_phlox_upgrade' );
/**
 * Remove "Upgrade" promotion of Phlox Theme from the Toolbar.
 *
 * @since 1.3.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_remove_items_phlox_upgrade() {

	/** Remove "Upgrade" promotion of Phlox Theme */
	$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'phlox-upgrade' );

}  // end function
