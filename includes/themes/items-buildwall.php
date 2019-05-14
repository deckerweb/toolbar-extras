<?php

// includes/themes/items-buildwall

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_buildwall', 100 );
/**
 * Items for Theme: Buildwall (Premium, by Zemez)
 *
 * @since 1.3.0
 *
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_customizer_focus()
 * @uses ddw_tbex_customizer_start()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_buildwall() {

	/** Buildwall Theme creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child' ),
			'href'   => esc_url( admin_url( 'admin.php?page=tm-dashboard' ) ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_theme_title( 'attr', 'child' )
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


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_buildwall_customize', 100 );
/**
 * Customize items for Buildwall Theme
 *
 * @since 1.3.0
 *
 * @uses ddw_tbex_customizer_focus()
 * @uses ddw_tbex_string_customize_attr()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_buildwall_customize() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'buildwallcmz-site-general',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'General Site Settings', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'buildwall_general_settings' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'General Site Settings', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'buildwallcmz-colorscheme',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Color Scheme', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'buildwall_color_scheme' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Color Scheme', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'buildwallcmz-typography',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Typography', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'buildwall_typography' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Typography', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'buildwallcmz-header',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Header', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'buildwall_header_options' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Header', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'buildwallcmz-footer',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Footer', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'buildwall_footer_options' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Footer', 'toolbar-extras' ) )
			)
		)
	);

	/**
	 * Blog Settings show up only when previewing the actual blog posts archive
	 *   page (WP Blog URL)
	 *
	 *   Note 1: get_post_type_archive_link( 'post' ) is available since WP 4.5
	 *   @link https://wordpress.stackexchange.com/questions/50509/get-the-blog-page-url-set-in-options
	 *
	 *   Note 2: We use the Customizer *section* 'buildwall_blog' since the the
	 *           panel before only constists of this one section yet.
	 */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'buildwallcmz-blog',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Blog Settings', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'buildwall_blog', get_post_type_archive_link( 'post' ) ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Blog Settings', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'buildwallcmz-sidebar',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Sidebar', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'buildwall_sidebar_settings' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Sidebar', 'toolbar-extras' ) )
			)
		)
	);

	/** 404 Error Page */
	$url_404_live = get_site_url() . '/404-live-test-' . md5( mt_rand() );

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'buildwallcmz-404-page',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( '404 Page Style', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'buildwall_page_404_options', $url_404_live ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( '404 Page Style', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'buildwallcmz-ads-management',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Ads Management', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'buildwall_ads_management' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Ads Management', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'buildwallcmz-site-identity',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Site Identity', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'title_tagline' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Site Identity', 'toolbar-extras' ) )
			)
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_buildwall_resources', 120 );
/**
 * General resources items for Buildwall Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.3.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 */
function ddw_tbex_themeitems_buildwall_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for Buildwall Theme */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => 'theme-settings',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	ddw_tbex_resource_item(
		'documentation',
		'theme-docs',
		'group-theme-resources',
		'http://documentation.zemez.io/wordpress/projects/buildwall/index.html'
	);

	ddw_tbex_resource_item(
		'knowledge-base',
		'theme-kb',
		'group-theme-resources',
		'https://zemez.io/wordpress/support/knowledge-base/'
	);

	ddw_tbex_resource_item(
		'support-contact',
		'theme-support-tickets',
		'group-theme-resources',
		'https://support.template-help.com/index.php/Tickets/Submit'
	);

	ddw_tbex_resource_item(
		'youtube-channel',
		'theme-youtube-playlist',
		'group-theme-resources',
		'https://www.youtube.com/channel/UCPW43un8VFXHe9LxKpR_2Hg/videos'
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_buildwall_settings', 100 );
/**
 * Items for Theme: Buildwall settings
 *
 * @since 1.3.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_buildwall_settings() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-settings',
			'parent' => 'group-active-theme',
			'title'  => esc_attr__( 'Buildwall Options', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=tm-dashboard' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Buildwall Options', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-buildwall-info',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Theme Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=tm-dashboard' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Theme Info', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-buildwall-updates',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Updates', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=tm-updates' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Updates', 'toolbar-extras' )
				)
			)
		);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_buildwall_sites_import', 100 );
/**
 * Items for Demos & Skins Import - Plugins:
 *   Cherry Plugins Wizard (Premium, by Zemez)
 *   Cherry Data Importer (Premium, by Zemez)
 *
 * @since 1.3.0
 *
 * @uses ddw_tbex_display_items_demo_import()
 * @uses ddw_tbex_id_sites_browser()
 * @uses ddw_tbex_item_title_with_settings_icon()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_buildwall_sites_import() {

	/** Bail early if no display/import of Demo Import items possible */
	if ( ! ddw_tbex_display_items_demo_import()
		|| ! class_exists( 'Cherry_Data_Importer' )
		|| ! class_exists( 'Cherry_Plugin_Wizard' )
	) {
		return;
	}

	$sites_title = esc_attr__( 'Import Demos &amp; Skins', 'toolbar-extras' );

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => ddw_tbex_id_sites_browser(),
			'parent' => 'group-demo-import',
			'title'  => ddw_tbex_item_title_with_settings_icon( $sites_title, 'general', 'demo_import_icon' ),
			'href'   => esc_url( admin_url( 'admin.php?page=cherry-plugins-wizard' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => $sites_title
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'cherry-wizard-import-sites',
				'parent' => ddw_tbex_id_sites_browser(),
				'title'  => esc_attr__( 'Import Sites &amp; Skins', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?step=1&advanced-install=1&page=cherry-plugin-wizard' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Import Sites &amp; Skins', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'cherry-wizard-import-content-data',
				'parent' => ddw_tbex_id_sites_browser(),
				'title'  => esc_attr__( 'Import Content Data', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=cherry-demo-content&tab=import' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Import Content Data', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'cherry-wizard-export-content-data',
				'parent' => ddw_tbex_id_sites_browser(),
				'title'  => esc_attr__( 'Export Content Data', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=cherry-demo-content&tab=export' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Export Content Data', 'toolbar-extras' )
				)
			)
		);

}  // end function
