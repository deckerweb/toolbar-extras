<?php

// includes/items-tbex-plugin

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_items_plugin_settings_resources', 25 );
/**
 * Items for this plugin itself: settings & resources.
 *
 * @since 1.0.0
 * @since 1.3.9 Added newsletter resource.
 * @since 1.4.2 Added "Add-Ons" settings tab.
 * @since 1.4.7 Added "Import &amp; Export", plus "Suggested Plugins" tabs.
 *
 * @uses ddw_tbex_is_addon_mainwp_active()
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 * @uses ddw_tbex_get_info_url()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_items_plugin_settings_resources( $admin_bar ) {

	$test_settings = TRUE;

	/** Plugin settings for Toolbar Extras */
	if ( $test_settings ) {

		$admin_bar->add_node(
			array(
				'id'     => 'tbex-settings',
				'parent' => 'tbex-sitegroup-plsettings',
				'title'  => esc_attr_x( 'Toolbar Settings', 'For Toolbar Extras Plugin', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=toolbar-extras' ) ),
				'meta'   => array(
					'target' => '',
					/* translators: Title attribute for Toolbar Extras "Plugin settings" link */
					'title'  => esc_attr__( 'Toolbar Extras Settings', 'toolbar-extras' ),
				)
			)
		);

			/** General Settings */
			$admin_bar->add_node(
				array(
					'id'     => 'tbex-settings-general',
					'parent' => 'tbex-settings',
					'title'  => esc_attr_x( 'General', 'For Toolbar Extras Plugin', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'options-general.php?page=toolbar-extras&tab=general' ) ),
					'meta'   => array(
						'target' => '',
						/* translators: Title attribute for Toolbar Extras "General" settings link */
						'title'  => esc_attr_x( 'General Settings for the Toolbar Extras plugin', 'For Toolbar Extras Plugin', 'toolbar-extras' ),
					)
				)
			);

			/** Smart Tweaks */
			$admin_bar->add_node(
				array(
					'id'     => 'tbex-settings-tweaks',
					'parent' => 'tbex-settings',
					'title'  => esc_attr_x( 'Smart Tweaks', 'For Toolbar Extras Plugin', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'options-general.php?page=toolbar-extras&tab=smart-tweaks' ) ),
					'meta'   => array(
						'target' => '',
						/* translators: Title attribute for Toolbar Extras "General" settings link */
						'title'  => esc_attr_x( 'Smart Tweaks - Tweak items and behavior of WordPress Core and plugins', 'For Toolbar Extras Plugin', 'toolbar-extras' ),
					)
				)
			);

			/** For Development */
			$admin_bar->add_node(
				array(
					'id'     => 'tbex-settings-development',
					'parent' => 'tbex-settings',
					'title'  => esc_attr_x( 'For Development', 'For Toolbar Extras Plugin', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'options-general.php?page=toolbar-extras&tab=development' ) ),
					'meta'   => array(
						'target' => '',
						/* translators: Title attribute for Toolbar Extras "Development" settings link */
						'title'  => esc_attr_x( 'For Development - enable Local Development Environment, plus the optional Dev Mode', 'For Toolbar Extras Plugin', 'toolbar-extras' ),
					)
				)
			);

			/** Hook place for TBEX Add-Ons settings tabs */
			do_action( 'tbex_plugins_settings_addons' /* , $admin_bar */ );

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-settings-addons',
					'parent' => 'tbex-settings',
					'title'  => esc_attr_x( 'Add-Ons', 'For Toolbar Extras Plugin', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'options-general.php?page=toolbar-extras&tab=addons' ) ),
					'meta'   => array(
						'target' => '',
						/* translators: Title attribute for Toolbar Extras "Add-Ons" settings link */
						'title'  => esc_attr_x( 'Install and manage Add-Ons and Extensions for Toolbar Extras', 'For Toolbar Extras Plugin', 'toolbar-extras' ),
					)
				)
			);

			/** Import & Export */
			if ( current_user_can( 'manage_options' ) ) {

				$admin_bar->add_node(
					array(
						'id'     => 'tbex-settings-import-export',
						'parent' => 'tbex-settings',
						'title'  => esc_attr_x( 'Import &amp; Export', 'For Toolbar Extras Plugin', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'options-general.php?page=toolbar-extras&tab=import-export' ) ),
						'meta'   => array(
							'target' => '',
							/* translators: Title attribute for Toolbar Extras "Import & Export" settings link */
							'title'  => esc_attr_x( 'Import and Export Settings of Toolbar Extras and its (currently active) Add-Ons', 'For Toolbar Extras Plugin', 'toolbar-extras' ),
						)
					)
				);

			}  // end if

			/** Suggested plugins - via "Plugin Manager", only if Plugin Manager instance is active */
			if ( has_action( 'after_setup_theme', 'ddw_tbex_plugin_manager' ) && current_user_can( 'install_plugins' ) ) {

				$admin_bar->add_node(
					array(
						'id'     => 'tbex-settings-suggested-plugins',
						'parent' => 'tbex-settings',
						'title'  => esc_attr_x( 'Suggested Plugins', 'For Toolbar Extras Plugin', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'plugins.php?page=toolbar-extras-suggested-plugins' ) ),
						'meta'   => array(
							'target' => '',
							/* translators: Title attribute for Toolbar Extras "Suggested Plugins" settings link */
							'title'  => esc_attr_x( 'Plugin Manager for our Add-Ons - Required, Recommended and Useful Plugins', 'For Toolbar Extras Plugin', 'toolbar-extras' ),
						)
					)
				);

			}  // end if

			/** About & Support */
			$admin_bar->add_node(
				array(
					'id'     => 'tbex-settings-aboutsupport',
					'parent' => 'tbex-settings',
					'title'  => esc_attr_x( 'About &amp; Support', 'For Toolbar Extras Plugin', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'options-general.php?page=toolbar-extras&tab=about-support' ) ),
					'meta'   => array(
						'target' => '',
						/* translators: Title attribute for Toolbar Extras "About & Support" settings link */
						'title'  => esc_attr_x( 'About &amp; Support for the plugin', 'For Toolbar Extras Plugin', 'toolbar-extras' ),
					)
				)
			);

	}  // end if

	/** For: WP Logo section - About */
	/*
	$admin_bar->add_node(
		array(
			'id'     => 'tbex-about--alt',
			'parent' => 'wp-logo',
			'title'  => esc_attr__( 'About Toolbar Extras', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=toolbar-extras&tab=about-support' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'About Toolbar Extras', 'toolbar-extras' ),
			)
		)
	);
	*/

	/** Resources for Toolbar Extras */
	if ( ddw_tbex_display_items_resources() ) {

		$admin_bar->add_node(
			array(
				'id'     => 'tbex-resources',
				'parent' => 'tbex-sitegroup-plsettings',
				'title'  => esc_attr_x( 'Support &amp; Resources', 'For Toolbar Extras Plugin', 'toolbar-extras' ),
				'href'   => '',
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr_x( 'Toolbar Extras Support &amp; Resources', 'For Toolbar Extras Plugin', 'toolbar-extras' ),
				)
			)
		);

			ddw_tbex_resource_item(
				'support-forum',
				'tbex-support',
				'tbex-resources',
				ddw_tbex_get_info_url( 'url_wporg_forum' )
			);

			ddw_tbex_resource_item(
				'documentation',
				'tbex-docs',
				'tbex-resources',
				ddw_tbex_get_info_url( 'url_plugin_docs' )
			);

			ddw_tbex_resource_item(
				'changelog',
				'tbex-changelog',
				'tbex-resources',
				ddw_tbex_get_info_url( 'url_plugin_changes' ),
				ddw_tbex_string_version_history( 'plugin' )
			);

			ddw_tbex_resource_item(
				'translations-community',
				'tbex-translate',
				'tbex-resources',
				ddw_tbex_get_info_url( 'url_translate' )
			);

			ddw_tbex_resource_item(
				'github',
				'tbex-github',
				'tbex-resources',
				ddw_tbex_get_info_url( 'url_github' )
			);

			ddw_tbex_resource_item(
				'official-site',
				'tbex-site',
				'tbex-resources',
				ddw_tbex_get_info_url( 'url_plugin' )
			);

			/** Newsletter */
			$admin_bar->add_node(
				array(
					'id'     => 'tbex-ddw-plugins-newsletter',
					'parent' => 'tbex-resources',
					'title'  => esc_attr__( 'Join Newsletter', 'toolbar-extras' ),
					'href'   => ddw_tbex_get_info_url( 'url_newsletter' ),
					'meta'   => array(
						'target' => '_blank',
						'rel'    => 'nofollow noopener noreferrer',
						'title'  => esc_attr__( 'Join Newsletter to get insider info and great resources and deals for WordPress', 'toolbar-extras' ),
					)
				)
			);

	}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_items_plugin_about_wpitems', 25 );
/**
 * Items for this plugin itself: settings & resources.
 *
 * @since 1.0.0
 * @since 1.4.7 Splitted into extra function to extend items.
 *
 * @uses ddw_tbex_get_info_url()
 * @uses ddw_tbex_meta_target()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_items_plugin_about_wpitems( $admin_bar ) {

	/** For: WP Logo section - About */
	$admin_bar->add_node(
		array(
			'id'     => 'tbex-about',
			'parent' => 'wp-logo',
			'title'  => esc_attr__( 'About Toolbar Extras', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=toolbar-extras&tab=about-support' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'About Toolbar Extras', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'tbex-about-info',
				'parent' => 'tbex-about',
				'title'  => esc_attr__( 'About &amp; Support', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=toolbar-extras&tab=about-support' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'About &amp; Support', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'tbex-about-changelogs',
				'parent' => 'tbex-about',
				'title'  => esc_attr__( 'Change Logs', 'toolbar-extras' ),
				'href'   => ddw_tbex_get_info_url( 'url_plugin_changes' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'rel'    => ddw_tbex_meta_rel(),
					'title'  => esc_attr__( 'Change Logs', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'tbex-about-version-timeline',
				'parent' => 'tbex-about',
				'title'  => esc_attr__( 'Version Timeline', 'toolbar-extras' ),
				'href'   => ddw_tbex_get_info_url( 'url_tbex_timeline' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'rel'    => ddw_tbex_meta_rel(),
					'title'  => esc_attr__( 'Version Timeline', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'tbex-about-milestones',
				'parent' => 'tbex-about',
				'title'  => esc_attr__( 'Milestones', 'toolbar-extras' ),
				'href'   => ddw_tbex_get_info_url( 'url_milestones' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'rel'    => ddw_tbex_meta_rel(),
					'title'  => esc_attr__( 'Milestones - Achievements', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'tbex-about-roadmap',
				'parent' => 'tbex-about',
				'title'  => esc_attr__( 'Roadmap', 'toolbar-extras' ),
				'href'   => ddw_tbex_get_info_url( 'url_roadmap' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'rel'    => ddw_tbex_meta_rel(),
					'title'  => esc_attr__( 'Development Roadmap', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'tbex-about-translations',
				'parent' => 'tbex-about',
				'title'  => esc_attr__( 'Community Translations', 'toolbar-extras' ),
				'href'   => ddw_tbex_get_info_url( 'url_translate' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'rel'    => ddw_tbex_meta_rel(),
					'title'  => esc_attr__( 'Community Translations Portal', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'tbex-about-donate',
				'parent' => 'tbex-about',
				'title'  => esc_attr__( 'Donate', 'toolbar-extras' ),
				'href'   => ddw_tbex_get_info_url( 'url_donate' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'rel'    => ddw_tbex_meta_rel(),
					'title'  => esc_attr__( 'Donate for Ongoing Development', 'toolbar-extras' ),
				)
			)
		);

}  // end function
