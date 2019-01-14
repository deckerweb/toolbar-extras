<?php

// includes/themes/items-kava

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if Kava Pro Theme is active or not.
 *
 * @since 1.3.0
 *
 * @return bool TRUE if class 'Kava_Module_Base' exists (only available in Kava
 *              Pro), FALSE otherwise.
 */
function ddw_tbex_is_theme_kava_pro() {

	return class_exists( 'Kava_Module_Base' );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_kava', 100 );
/**
 * Items for Theme: Kava Theme free / Kava Pro Theme (free/Premium, by Zemez Jet & CrocoBlock)
 *
 * @since 1.1.1
 *
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_customizer_focus()
 * @uses ddw_tbex_customizer_start()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_kava() {

	/** Kava Theme creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'kava_general_settings' ),
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


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_kava_customize', 100 );
/**
 * Customize items for Kava Theme
 *
 * @since 1.1.1
 *
 * @uses ddw_tbex_customizer_focus()
 * @uses ddw_tbex_string_customize_attr()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_kava_customize() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'kavacmz-site-general',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'General Site Settings', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'kava_general_settings' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'General Site Settings', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'kavacmz-colorscheme',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Color Scheme', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'kava_color_scheme' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Color Scheme', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'kavacmz-typography',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Typography', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'kava_typography' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Typography', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'kavacmz-header',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Header', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'kava_header_options' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Header', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'kavacmz-footer',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Footer', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'kava_footer_options' ),
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
	 *   Note 2: We use the Customizer *section* 'kava_blog' since the the panel
	 *           before only constists of this one section yet.
	 */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'kavacmz-blog',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Blog Settings', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'kava_blog', get_post_type_archive_link( 'post' ) ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Blog Settings', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'kavacmz-site-identity',
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


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_kava_resources', 120 );
/**
 * General resources items for Kava Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.1.1
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 */
function ddw_tbex_themeitems_kava_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for Kava Theme */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => ( ddw_tbex_is_addon_jetthemecore() || ddw_tbex_is_addon_kava_extra() ) ? 'theme-settings' : 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	ddw_tbex_resource_item(
		'documentation',
		'theme-docs',
		'group-theme-resources',
		'https://documentation.zemez.io/wordpress/index.php?project=crocoblock&lang=en&section=crocoblock-theme'
	);

	ddw_tbex_resource_item(
		'knowledge-base',
		'theme-kb',
		'group-theme-resources',
		'https://zemez.io/wordpress/support/knowledge-base/'
	);

	ddw_tbex_resource_item(
		'facebook-group',
		'theme-facebook-group',
		'group-theme-resources',
		'https://www.facebook.com/groups/CrocoblockCommunity'
	);

	ddw_tbex_resource_item(
		'youtube-channel',
		'theme-youtube-playlist',
		'group-theme-resources',
		'https://www.youtube.com/watch?v=APz7aaGc2yE&list=PLdaVCVrkty72g_9pu4-tRJ0j_cc01PqUX'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		( ddw_tbex_is_theme_kava_pro() ) ? 'https://crocoblock.com/kava-pro/' : 'https://crocoblock.com/kava-free/'
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_kava_pro_settings', 100 );
/**
 * Items for Theme: Kava Pro Theme
 *   Settings - added either by "Kava Extra" and/ or "JetThemeCore" Plugins.
 *
 * @since 1.3.0
 *
 * @uses ddw_tbex_is_addon_jetthemecore()
 * @uses ddw_tbex_is_addon_kava_extra()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_kava_pro_settings() {

	/** Bail early if Kava Premium extensions are not active */
	if ( ! ddw_tbex_is_addon_jetthemecore() && ! ddw_tbex_is_addon_kava_extra() ) {
		return;
	}

	/** Case I: only Kava Extra active */
	if ( ddw_tbex_is_addon_kava_extra() && ! ddw_tbex_is_addon_jetthemecore() ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings',
				'parent' => 'group-active-theme',
				'title'  => esc_attr__( 'Kava Pro Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=kava-extra-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Kava Pro Settings', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'theme-settings-kava-extra',
					'parent' => 'theme-settings',
					'title'  => esc_attr__( 'Kava Extra', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=kava-extra-settings' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Kava Extra', 'toolbar-extras' )
					)
				)
			);

	}  // end if

	/** Case II: JetThemeCore and/or Kava Extra active */
	if ( ddw_tbex_is_addon_jetthemecore() ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings',
				'parent' => 'group-active-theme',
				'title'  => esc_attr__( 'CrocoBlock Options', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=jet-theme-core&tab=theme' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'CrocoBlock Options', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'theme-settings-kava-info',
					'parent' => 'theme-settings',
					'title'  => esc_attr__( 'Theme Info', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=jet-theme-core&tab=theme' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Theme Info', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'theme-settings-kava-settings',
					'parent' => 'theme-settings',
					'title'  => esc_attr__( 'Theme Settings', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=jet-theme-core&tab=settings' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Theme Settings', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'theme-settings-theme-update',
					'parent' => 'theme-settings',
					'title'  => esc_attr__( 'Skin Demos &amp; Install', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=jet-theme-core&tab=skins' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Skin Demos &amp; Install', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'theme-settings-jet-plugins-info',
					'parent' => 'theme-settings',
					'title'  => esc_attr__( 'Jet Plugins Info', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=jet-theme-core&tab=plugins' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Jet Plugins Info', 'toolbar-extras' )
					)
				)
			);

			/** Update checker/ sync etc. */
			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'theme-settings-update-checks',
					'parent' => 'theme-settings',
					'title'  => esc_attr__( 'Update Checks', 'toolbar-extras' ),
					'href'   => '',
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Update Checks', 'toolbar-extras' )
					)
				)
			);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'updates-check-kava-pro',
						'parent' => 'theme-settings-update-checks',
						'title'  => esc_attr__( 'Check Kava Pro', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?jet_action=theme&handle=check_updates' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Check Kava Pro', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'updates-check-sync-skins',
						'parent' => 'theme-settings-update-checks',
						'title'  => esc_attr__( 'Synchronize Skins', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?jet_action=skins&handle=synch_skins' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Synchronize Skins', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'updates-check-jet-plugins',
						'parent' => 'theme-settings-update-checks',
						'title'  => esc_attr__( 'Check Jet Plugins', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?jet_action=plugins&handle=check_updates' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Check Jet Plugins', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'updates-check-new-jet-plugins',
						'parent' => 'theme-settings-update-checks',
						'title'  => esc_attr__( 'New Jet Plugins', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?jet_action=plugins&handle=check_for_plugins' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'New Jet Plugins', 'toolbar-extras' )
						)
					)
				);

	}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_kava_pro_sites_import', 100 );
/**
 * Items for Demos & Skins Import - Plugins:
 *   Jet Plugins Wizard (Premium, by Zemez/ CrocoBlock)
 *   Jet Data Importer (Premium, by Zemez/ CrocoBlock)
 *   JetThemeCore (Premium, by Zemez/ CrocoBlock)
 *
 * @since 1.3.0
 *
 * @uses ddw_tbex_display_items_demo_import()
 * @uses ddw_tbex_id_sites_browser()
 * @uses ddw_tbex_item_title_with_settings_icon()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_kava_pro_sites_import() {

	/** Bail early if no display/import of Demo Import items possible */
	if ( ! ddw_tbex_display_items_demo_import()
		|| ! class_exists( 'Jet_Data_Importer' )
		|| ! class_exists( 'Jet_Plugins_Wizard' )
	) {
		return;
	}

	$sites_title = esc_attr__( 'Import Demos &amp; Skins', 'toolbar-extras' );

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => ddw_tbex_id_sites_browser(),
			'parent' => 'group-demo-import',
			'title'  => ddw_tbex_item_title_with_settings_icon( $sites_title, 'general', 'demo_import_icon' ),
			'href'   => esc_url( admin_url( 'admin.php?page=jet-plugins-wizard' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => $sites_title
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'jet-wizard-import-sites',
				'parent' => ddw_tbex_id_sites_browser(),
				'title'  => esc_attr__( 'Import Sites &amp; Skins', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=jet-plugins-wizard' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Import Sites &amp; Skins', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'jet-wizard-import-content-data',
				'parent' => ddw_tbex_id_sites_browser(),
				'title'  => esc_attr__( 'Import Content Data', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=jet-demo-content&tab=import' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Import Content Data', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'jet-wizard-export-content-data',
				'parent' => ddw_tbex_id_sites_browser(),
				'title'  => esc_attr__( 'Export Content Data', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=jet-demo-content&tab=export' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Export Content Data', 'toolbar-extras' )
				)
			)
		);

}  // end function


/**
 * Items for Site Group: CrocoBlock Updates
 *
 * @since 1.3.0
 *
 * @uses ddw_tbex_is_addon_jetthemecore()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
if ( ddw_tbex_is_addon_jetthemecore() ) {
	add_filter( 'tbex_filter_is_update_addon', '__return_empty_string' );
}

add_action( 'admin_bar_menu', 'ddw_tbex_site_items_crocoblock_updates', 30 );
function ddw_tbex_site_items_crocoblock_updates() {

	/** Bail early if JetThemeCore extensions is not active */
	if ( ! ddw_tbex_is_addon_jetthemecore() ) {
		return;
	}

	/** Group: CrocoBlock Update Checks */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-crocoblock-updates',
			'parent' => 'update-check'
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'crocoblock-updates-check-kava-pro',
				'parent' => 'group-crocoblock-updates',
				'title'  => esc_attr__( 'Check Kava Pro', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?jet_action=theme&handle=check_updates' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Check Kava Pro', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'crocoblock-updates-check-sync-skins',
				'parent' => 'group-crocoblock-updates',
				'title'  => esc_attr__( 'Synchronize Skins', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?jet_action=skins&handle=synch_skins' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Synchronize Skins', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'crocoblock-updates-check-jet-plugins',
				'parent' => 'group-crocoblock-updates',
				'title'  => esc_attr__( 'Check Jet Plugins', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?jet_action=plugins&handle=check_updates' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Check Jet Plugins', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'crocoblock-updates-check-new-jet-plugins',
				'parent' => 'group-crocoblock-updates',
				'title'  => esc_attr__( 'New Jet Plugins', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?jet_action=plugins&handle=check_for_plugins' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Jet Plugins', 'toolbar-extras' )
				)
			)
		);

}  // end function
