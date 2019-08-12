<?php

// includes/admin/admin-extras

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Add user onboarding welcome notice on plugins page - dismissible!
 *   Gets displayed and once dismissed will never show again.
 *
 * @since 1.0.0
 */
require_once TBEX_PLUGIN_DIR . 'includes/admin/views/notice-plugins-welcome.php';
add_action( 'admin_notices', 'ddw_tbex_notice_plugins_welcome' );
add_action( 'network_admin_notices', 'ddw_tbex_notice_plugins_welcome' );	// also show message on Multisite


/**
 * Add plugin review info notice within admin - dismissible!
 *   Gets displayed and once dismissed will never show again.
 *
 * @since 1.4.0
 */
require_once TBEX_PLUGIN_DIR . 'includes/admin/views/notice-plugin-review.php';


/**
 * Add "Settings" and Custom Menu" links to Plugins page.
 *
 * @since 1.0.0
 * @since 1.4.0 Optimizations.
 * @since 1.4.4 Overall code improvements.
 *
 * @param array $action_links (Default) Array of plugin action links.
 * @return array Modified array of plugin action links.
 */
function ddw_tbex_custom_settings_links( $action_links = [] ) {

	$tbex_links = array();

	/** Add settings link only if user can 'manage_options' */
	if ( current_user_can( 'edit_theme_options' ) ) {

		/** Settings Page link */
		$tbex_links[ 'settings' ] = sprintf(
			'<a href="%s" title="%s"><span class="dashicons-before dashicons-admin-generic"></span> %s</a>',
			esc_url( admin_url( 'options-general.php?page=toolbar-extras' ) ),
			/* translators: Title attribute for Toolbar Extras "Plugin settings" link */
			esc_html__( 'Toolbar Extras Settings', 'toolbar-extras' ),
			esc_attr_x( 'Settings', 'For Toolbar Extras Plugin', 'toolbar-extras' )
		);

	}  // end if

	/** Add menu link only if user can 'edit_theme_options' */
	if ( current_user_can( 'edit_theme_options' ) ) {

		/** Menus Page link */
		$tbex_links[ 'menu' ] = sprintf(
			'<a href="%s" title="%s"><span class="dashicons-before dashicons-menu"></span> %s</a>',
			esc_url( admin_url( 'nav-menus.php' ) ),
			esc_html__( 'Setup a custom toolbar menu', 'toolbar-extras' ),
			esc_attr__( 'Custom Menu', 'toolbar-extras' )
		);

	}  // end if

	/** Display plugin settings links */
	return apply_filters(
		'tbex/filter/plugins_page/settings_links',
		array_merge( $tbex_links, $action_links ),
		$tbex_links		// additional param
	);

}  // end function


add_filter( 'plugin_row_meta', 'ddw_tbex_plugin_links', 10, 2 );
/**
 * Add various support links to Plugins page.
 *
 * @since 1.0.0
 * @since 1.3.4 Added more Dashicons.
 * @since 1.3.9 Added newsletter link.
 *
 * @uses ddw_tbex_get_info_link()
 *
 * @param array  $tbex_links (Default) Array of plugin meta links
 * @param string $tbex_file  Path of base plugin file
 * @return array $tbex_links Array of plugin link strings to build HTML markup.
 */
function ddw_tbex_plugin_links( $tbex_links, $tbex_file ) {

	/** Capability check */
	if ( ! current_user_can( 'install_plugins' ) ) {
		return $tbex_links;
	}

	/** List additional links only for this plugin */
	if ( $tbex_file === TBEX_PLUGIN_BASEDIR . 'toolbar-extras.php' ) {

		?>
			<style type="text/css">
				tr[data-plugin="<?php echo $tbex_file; ?>"] .plugin-version-author-uri a.dashicons-before:before {
					font-size: 17px;
					margin-right: 2px;
					opacity: .85;
					vertical-align: sub;
				}
			</style>
		<?php

		/* translators: Plugins page listing */
		$tbex_links[] = ddw_tbex_get_info_link(
			'url_wporg_forum',
			esc_html_x( 'Support', 'Plugins page listing', 'toolbar-extras' ),
			'dashicons-before dashicons-sos'
		);

		/* translators: Plugins page listing */
		$tbex_links[] = ddw_tbex_get_info_link(
			'url_fb_group',
			esc_html_x( 'Facebook Group', 'Plugins page listing', 'toolbar-extras' ),
			'dashicons-before dashicons-facebook'
		);

		/* translators: Plugins page listing */
		$tbex_links[] = ddw_tbex_get_info_link(
			'url_translate',
			esc_html_x( 'Translations', 'Plugins page listing', 'toolbar-extras' ),
			'dashicons-before dashicons-translation'
		);

		/* translators: Plugins page listing */
		$tbex_links[] = ddw_tbex_get_info_link(
			'url_donate',
			esc_html_x( 'Donate', 'Plugins page listing', 'toolbar-extras' ),
			'button dashicons-before dashicons-thumbs-up'
		);

		/* translators: Plugins page listing */
		$tbex_links[] = ddw_tbex_get_info_link(
			'url_newsletter',
			esc_html_x( 'Join our Newsletter', 'Plugins page listing', 'toolbar-extras' ),
			'button-primary dashicons-before dashicons-awards'
		);

	}  // end if plugin links

	/** Output the links */
	return apply_filters(
		'tbex/filter/plugins_page/more_links',
		$tbex_links
	);

}  // end function


add_filter( 'admin_footer_text', 'ddw_tbex_admin_footer_text' );
/**
 * Modifies the "Thank you" text displayed in the WP Admin footer.
 *   Fired by 'admin_footer_text' filter.
 *
 * @since 1.3.2
 * @since 1.3.8 Reworked current screen logic; tweaked rating link.
 *
 * @uses get_current_screen()
 * @uses ddw_tbex_get_info_url()
 * @uses ddw_tbex_string_toolbar_extras()
 *
 * @param string $footer_text The content that will be printed.
 * @return string The content that will be printed.
 */
function ddw_tbex_admin_footer_text( $footer_text ) {

	$current_screen = get_current_screen();

	/** Active settings tab logic */
	$active_tab = isset( $_GET[ 'tab' ] ) ? sanitize_key( wp_unslash( $_GET[ 'tab' ] ) ) : 'default';
	$tbex_tabs  = array( 'general', 'smart-tweaks', 'development', 'addons', 'about-support', 'default' );

	if ( ( 'settings_page_toolbar-extras' === $current_screen->id && in_array( $active_tab, $tbex_tabs ) )
		|| ( 'plugins_page_toolbar-extras-suggested-plugins' === $current_screen->id )
	) {

		$rating = sprintf(
			/* translators: %s - 5 stars icons */
			'<a href="' . ddw_tbex_get_info_url( 'url_wporg_review' ) . '" target="_blank" rel="nofollow noopener noreferrer">' . __( '%s rating', 'toolbar-extras' ) . '</a>',
			'&#9733;&#9733;&#9733;&#9733;&#9733;'
		);

		$footer_text = sprintf(
			/* translators: 1 - Plugin name "Toolbar Extras" / 2 - label "5 star rating" */
			__( 'Enjoyed %1$s? Please leave us a %2$s. We really appreciate your support!', 'toolbar-extras' ),
			'<strong>' . ddw_tbex_string_toolbar_extras() . '</strong>',
			$rating
		);

	}  // end if

	return $footer_text;

}  // end function


add_filter( 'update_right_now_text', 'ddw_tbex_dashboard_plugin_version_info', 11 );
/**
 * Add our plugin version to the "Right Now" text within the "At a Glance"
 *   Dashboard Widget.
 *   Note: We hook in at '11' to be a bit later than other plugins/ themes, to
 *         appear more towards the end of that text paragraph :).
 *
 * @since 1.3.8
 *
 * @param string $content Existing Right Now text in "At a Glance" Widget.
 * @return string Amended Right Now text.
 */
function ddw_tbex_dashboard_plugin_version_info( $content ) {

	/**
	 * Bail early if no Toolbar items wanted (and therefore no hint to the
	 *   plugin)
	 */
	if ( ! ddw_tbex_show_toolbar_items() ) {
		return $content;
	}

	$tbex_info = sprintf(
		/* translators: %s - Toolbar Extras plugin version */
		' | ' . __( 'Using Toolbar Extras %s', 'toolbar-extras' ),
		'<a href="' . esc_url( admin_url( 'options-general.php?page=toolbar-extras' ) ) . '">' . TBEX_PLUGIN_VERSION . '</a>'
	);

	return $content . $tbex_info;

}  // end function


add_action( 'rightnow_end', 'ddw_tbex_dashboard_plugin_update_check' );
add_action( 'mu_rightnow_end', 'ddw_tbex_dashboard_plugin_update_check' );
/**
 * @since 1.4.4
 */
function ddw_tbex_dashboard_plugin_update_check() {

	/** Bail early if not enough permissions */
	if ( ( ! is_multisite() && ! current_user_can( 'activate_plugins' ) )
		|| ( is_multisite() && ! current_user_can( 'manage_network' ) )
	) {
		return;
	}

	/** Create button markup */
	$output = sprintf(
		'<div class="tbex-dashboard-updates">
			<a class="button" href="%1$s" title="%2$s">%3$s</a>
		</div>',
		is_multisite() ? esc_url( network_admin_url( 'update-core.php?force-check=1' ) ) : esc_url( admin_url( 'update-core.php?force-check=1' ) ),
		esc_html__( 'Check for Updates - Core, Plugins, Themes, Translations', 'toolbar-extras' ),
		esc_attr__( 'Force Check Updates', 'toolbar-extras' )
	);

	/** Render button */
	echo $output;

}  // end function


add_filter( 'debug_information', 'ddw_tbex_site_health_add_debug_info', 5 );
/**
 * Add additional plugin related info to the Site Health Debug Info section.
 *   (Only relevant for WordPress 5.2 or higher)
 *
 * @link https://make.wordpress.org/core/2019/04/25/site-health-check-in-5-2/
 *
 * @since 1.4.3
 *
 * @uses ddw_tbex_string_debug_diagnostic()
 * @uses ddw_tbex_string_undefined()
 * @uses ddw_tbex_string_enabled()
 * @uses ddw_tbex_string_disabled()
 * @uses ddw_tbex_string_uninstalled()
 *
 * @param array $debug_info Array holding all Debug Info items.
 * @return array Modified array of Debug Info.
 */
function ddw_tbex_site_health_add_debug_info( $debug_info ) {

	/** Get all registered Page Builders */
	$all_builders = ddw_tbex_get_pagebuilders();

	/** Default setting -> label */
	$default = $all_builders[ 'default-none' ][ 'label' ];

	if ( ddw_tbex_is_elementor_active() ) {

		$default = $all_builders[ 'elementor' ][ 'label' ];

	} elseif ( ddw_tbex_is_block_editor_wanted() && ddw_tbex_use_block_editor_support() ) {

		$default = $all_builders[ 'block-editor' ][ 'label' ];

	}  // end if

	/** Get potentially unloaded textdomains (ony by this plugin) */
	$unloaded_textdomains = apply_filters( 'tbex_filter_unloading_textdomains', array() );

	/** Add our Debug info */
	$debug_info[ 'toolbar-extras' ] = array(
		'label'       => ddw_tbex_string_toolbar_extras() . ' (' . esc_html__( 'Plugin', 'toolbar-extras' ) . ')',
		'description' => ddw_tbex_string_debug_diagnostic(),
		'fields'      => array(

			/** Various values, including important plugin options */
			'tbex_plugin_version' => array(
				'label' => __( 'Plugin version', 'toolbar-extras' ),
				'value' => TBEX_PLUGIN_VERSION,
			),
			'tbex_install_type' => array(
				'label' => __( 'WordPress Install Type', 'toolbar-extras' ),
				'value' => ( is_multisite() ? esc_html__( 'Multisite install', 'toolbar-extras' ) : esc_html__( 'Single Site install', 'toolbar-extras' ) ),
			),
			'tbex_capability_show_toolbar_items' => array(
				'label' => __( 'Capability for showing Toolbar items', 'toolbar-extras' ),
				'value' => ddw_tbex_capability_show_all(),
			),
			'tbex_default_page_builder' => array(
				'label' => __( 'Default Page Builder', 'toolbar-extras' ),
				'value' => get_option( 'tbex-options-general', $default )[ 'default_page_builder' ],
			),
			'tbex_local_development_environment' => array(
				'label' => __( 'Local Development Environment', 'toolbar-extras' ),
				'value' => get_option( 'tbex-options-development', esc_html__( 'Auto', 'toolbar-extras' ) )[ 'is_local_dev' ],
			),
			'tbex_local_development_environment_server_name' => array(
				'label'   => __( 'Server Name', 'toolbar-extras' ),
				'value'   => $_SERVER[ 'REMOTE_ADDR' ],
				'private' => TRUE,
			),
			'tbex_use_dev_mode' => array(
				'label' => __( 'Dev Mode enabled', 'toolbar-extras' ),
				'value' => get_option( 'tbex-options-development', ddw_tbex_string_no( 'return' ) )[ 'use_dev_mode' ],
			),
			'tbex_use_block_editor_support' => array(
				'label' => __( 'Block Editor support enabled (option)', 'toolbar-extras' ),
				'value' => get_option( 'tbex-options-general', ddw_tbex_string_yes( 'return' ) )[ 'use_blockeditor_support' ],
			),
			'tbex_unload_td_elementor' => array(
				'label' => __( 'Unload Elementor translations', 'toolbar-extras' ),
				'value' => get_option( 'tbex-options-tweaks', ddw_tbex_string_no( 'return' ) )[ 'unload_td_elementor' ],
			),
			'tbex_unload_td_toolbar_extras' => array(
				'label' => __( 'Unload Toolbar Extras translations', 'toolbar-extras' ),
				'value' => get_option( 'tbex-options-tweaks', ddw_tbex_string_no( 'return' ) )[ 'unload_td_toolbar_extras' ],
			),
			'tbex_capability_unload_translations' => array(
				'label' => __( 'Capability for unloading translations', 'toolbar-extras' ),
				'value' => ddw_tbex_capability_unloading_translations(),
			),
			'tbex_unloaded_textdomains' => array(
				'label' => __( 'Unloaded textdomains', 'toolbar-extras' ),
				'value' => ( empty( $unloaded_textdomains ) ? esc_html__( 'No unloaded textdomains', 'toolbar-extras' ) : implode( ', ', $unloaded_textdomains ) ),
			),

			/** Toolbar Extras constants */
			'TBEX_DISPLAY' => array(
				'label' => 'TBEX_DISPLAY',
				'value' => ( ! defined( 'TBEX_DISPLAY' ) ? ddw_tbex_string_undefined() : ( TBEX_DISPLAY ? ddw_tbex_string_enabled() : ddw_tbex_string_disabled() ) ),
			),
			'TBEX_IS_LOCAL_ENVIRONMENT' => array(
				'label' => 'TBEX_IS_LOCAL_ENVIRONMENT',
				'value' => ( ! defined( 'TBEX_IS_LOCAL_ENVIRONMENT' ) ? ddw_tbex_string_undefined() : ( TBEX_IS_LOCAL_ENVIRONMENT ? ddw_tbex_string_enabled() : ddw_tbex_string_disabled() ) ),
			),
			'TBEX_LOCAL_DEV_VIEWPORT' => array(
				'label' => 'TBEX_LOCAL_DEV_VIEWPORT',
				'value' => ( ! defined( 'TBEX_LOCAL_DEV_VIEWPORT' ) ? ddw_tbex_string_undefined() : TBEX_LOCAL_DEV_VIEWPORT ),
			),
			'TBEX_DISPLAY_DEV_MODE' => array(
				'label' => 'TBEX_DISPLAY_DEV_MODE',
				'value' => ( ! defined( 'TBEX_DISPLAY_DEV_MODE' ) ? ddw_tbex_string_undefined() : ( TBEX_DISPLAY_DEV_MODE ? ddw_tbex_string_enabled() : ddw_tbex_string_disabled() ) ),
			),
			'TBEX_DISPLAY_SUPER_ADMIN_NAV_MENU' => array(
				'label' => 'TBEX_DISPLAY_SUPER_ADMIN_NAV_MENU',
				'value' => ( ! defined( 'TBEX_DISPLAY_SUPER_ADMIN_NAV_MENU' ) ? ddw_tbex_string_undefined() : ( TBEX_DISPLAY_SUPER_ADMIN_NAV_MENU ? ddw_tbex_string_enabled() : ddw_tbex_string_disabled() ) ),
			),
			'TBEX_USE_SMART_TWEAKS' => array(
				'label' => 'TBEX_USE_SMART_TWEAKS',
				'value' => ( ! defined( 'TBEX_USE_SMART_TWEAKS' ) ? ddw_tbex_string_undefined() : ( TBEX_USE_SMART_TWEAKS ? ddw_tbex_string_enabled() : ddw_tbex_string_disabled() ) ),
			),
			'TBEX_USE_BLOCK_EDITOR_SUPPORT' => array(
				'label' => 'TBEX_USE_BLOCK_EDITOR_SUPPORT',
				'value' => ( ! defined( 'TBEX_USE_BLOCK_EDITOR_SUPPORT' ) ? ddw_tbex_string_undefined() : ( TBEX_USE_BLOCK_EDITOR_SUPPORT ? ddw_tbex_string_enabled() : ddw_tbex_string_disabled() ) ),
			),

			/** Elementor constants */
			'ELEMENTOR_VERSION' => array(
				'label' => 'Elementor: ELEMENTOR_VERSION',
				'value' => ( ! defined( 'ELEMENTOR_VERSION' ) ? ddw_tbex_string_uninstalled() : ELEMENTOR_VERSION ),
			),
			'ELEMENTOR_PRO_VERSION' => array(
				'label' => 'Elementor Pro: ELEMENTOR_PRO_VERSION',
				'value' => ( ! defined( 'ELEMENTOR_PRO_VERSION' ) ? ddw_tbex_string_uninstalled() : ELEMENTOR_PRO_VERSION ),
			),

		),  // end array
	);

	/** Return modified Debug Info array */
	return $debug_info;

}  // end function


if ( ! function_exists( 'ddw_wp_site_health_remove_percentage' ) ) :

	add_action( 'admin_head', 'ddw_wp_site_health_remove_percentage', 100 );
	/**
	 * Remove the "Percentage Progress" display in Site Health feature as this will
	 *   get users obsessed with fullfilling a 100% where there are non-problems!
	 *
	 * @link https://make.wordpress.org/core/2019/04/25/site-health-check-in-5-2/
	 *
	 * @uses ddw_tbex_is_wp52_install()
	 *
	 * @since 1.4.3
	 */
	function ddw_wp_site_health_remove_percentage() {

		/** Bail early if not on WP 5.2+ */
		if ( ! ddw_tbex_is_wp52_install() ) {
			return;
		}

		?>
			<style type="text/css">
				.site-health-progress {
					display: none;
				}
			</style>
		<?php

	}  // end function

endif;


/**
 * Inline CSS fix for Plugins page update messages.
 *
 * @since 1.3.4
 * @since 1.4.2 Style tweaks.
 *
 * @see ddw_tbex_plugin_update_message()
 * @see ddw_tbex_multisite_subsite_plugin_update_message()
 */
function ddw_tbex_plugin_update_message_style_tweak() {

	?>
		<style type="text/css">
			.tbex-update-message p:before,
			.update-message.notice p:empty,
			.update-message.updating-message > p,
			.update-message.notice-success > p,
			.update-message.notice-error > p {
				display: none !important;
			}
		</style>
	<?php

}  // end function


add_action( 'in_plugin_update_message-' . TBEX_PLUGIN_BASEDIR . 'toolbar-extras.php', 'ddw_tbex_plugin_update_message', 10, 2 );
/**
 * On Plugins page add visible upgrade/update notice in the overview table.
 *   Note: This action fires for regular single site installs, and for Multisite
 *         installs where the plugin is activated Network-wide.
 *
 * @since 1.3.4
 *
 * @param object $data
 * @param object $response
 * @return string Echoed string and markup for the plugin's upgrade/update
 *                notice.
 */
function ddw_tbex_plugin_update_message( $data, $response ) {

	if ( isset( $data[ 'upgrade_notice' ] ) ) {

		ddw_tbex_plugin_update_message_style_tweak();

		printf(
			'<div class="update-message tbex-update-message">%s</div>',
			wpautop( $data[ 'upgrade_notice' ] )
		);

	}  // end if

}  // end function


add_action( 'after_plugin_row_wp-' . TBEX_PLUGIN_BASEDIR . 'toolbar-extras.php', 'ddw_tbex_multisite_subsite_plugin_update_message', 10, 2 );
/**
 * On Plugins page add visible upgrade/update notice in the overview table.
 *   Note: This action fires for Multisite installs where the plugin is
 *         activated on a per site basis.
 *
 * @since 1.3.4
 *
 * @param string $file
 * @param object $plugin
 * @return string Echoed string and markup for the plugin's upgrade/update
 *                notice.
 */
function ddw_tbex_multisite_subsite_plugin_update_message( $file, $plugin ) {

	if ( is_multisite() && version_compare( $plugin[ 'Version' ], $plugin[ 'new_version' ], '<' ) ) {

		$wp_list_table = _get_list_table( 'WP_Plugins_List_Table' );

		ddw_tbex_plugin_update_message_style_tweak();

		printf(
			'<tr class="plugin-update-tr"><td colspan="%s" class="plugin-update update-message notice inline notice-warning notice-alt"><div class="update-message tbex-update-message"><h4 style="margin: 0; font-size: 14px;">%s</h4>%s</div></td></tr>',
			$wp_list_table->get_column_count(),
			$plugin[ 'Name' ],
			wpautop( $plugin[ 'upgrade_notice' ] )
		);

	}  // end if

}  // end function


/**
 * Optionally tweaking Plugin API results to make more useful recommendations to
 *   the user.
 *
 * @since 1.0.0
 * @since 1.3.2 Added Block Editor specifications for results.
 * @since 1.3.4 Complete refactoring, using library class DDWlib Plugin
 *              Installer Recommendations
 */

add_filter( 'ddwlib_plir/filter/plugins', 'ddw_tbex_register_extra_plugin_recommendations' );
/**
 * Register specific plugins for the class "DDWlib Plugin Installer
 *   Recommendations".
 *   Note: The top-level array keys are plugin slugs from the WordPress.org
 *         Plugin Directory.
 *
 * @since 1.3.4
 * @since 1.3.7 Added new Block Editor recommendations.
 * @since 1.4.0 Add "Dev Mode" recommendations.
 *
 * @uses ddw_tbex_is_elementor_active()
 * @uses ddw_tbex_is_block_editor_active()
 * @uses ddw_tbex_is_block_editor_wanted()
 * @uses ddw_tbex_display_items_dev_mode()
 *
 * @param array $plugins Array holding all plugin recommendations, coming from
 *                       the class and the filter.
 * @return array Filtered and merged array of all plugin recommendations.
 */
function ddw_tbex_register_extra_plugin_recommendations( array $plugins ) {
  
	/** Remove our own slug when we are already active :) */
	if ( isset( $plugins[ 'toolbar-extras' ] ) ) {
		$plugins[ 'toolbar-extras' ] = null;
	}

  	/** Add new keys to recommendations */
  	$plugins[ 'custom-css-js' ] = array(
		'featured'    => 'yes',
		'recommended' => 'yes',
		'popular'     => 'no',
	);

  	/** Register additional Elementor plugin recommendations */
  	$plugins_elementor = array();

  	if ( ddw_tbex_is_elementor_active() ) {

		$plugins_elementor = array(
			'flexible-elementor-panel' => array(
				'featured'    => 'yes',
				'recommended' => 'yes',
				'popular'     => 'no',
			),
			'debug-elementor' => array(
				'featured'    => 'yes',
				'recommended' => 'yes',
				'popular'     => 'no',
			),
			'custom-icons-for-elementor' => array(
				'featured'    => 'no',
				'recommended' => 'no',
				'popular'     => 'yes',
			),
			'sticky-header-effects-for-elementor' => array(
				'featured'    => 'no',
				'recommended' => 'no',
				'popular'     => 'yes',
			),
		);

	}  // end if

  	/** Register additional Block Editor (Gutenberg) plugin recommendations */
  	$plugins_block_editor = array();

  	if ( ddw_tbex_is_block_editor_active() && ddw_tbex_is_block_editor_wanted() ) {

		$plugins_block_editor = array(
			'ultimate-addons-for-gutenberg' => array(
				'featured'    => 'yes',
				'recommended' => 'yes',
				'popular'     => 'yes',
			),
			'kadence-blocks' => array(
				'featured'    => 'yes',
				'recommended' => 'yes',
				'popular'     => 'yes',
			),
			'block-options' => array(
				'featured'    => 'yes',
				'recommended' => 'yes',
				'popular'     => 'no',
			),
			'block-builder' => array(
				'featured'    => 'yes',
				'recommended' => 'yes',
				'popular'     => 'yes',
			),
			'lazy-blocks' => array(
				'featured'    => 'yes',
				'recommended' => 'yes',
				'popular'     => 'no',
			),
			'block-lab' => array(
				'featured'    => 'yes',
				'recommended' => 'yes',
				'popular'     => 'no',
			),
			'manager-for-gutenberg' => array(
				'featured'    => 'no',
				'recommended' => 'yes',
				'popular'     => 'no',
			),
			'classic-editor' => array(
				'featured'    => 'no',
				'recommended' => 'yes',
				'popular'     => 'yes',
			),
		);

	}  // end if

  	/** Register additional "Dev Mode" plugin recommendations */
  	$plugins_dev_mode = array();

  	if ( ddw_tbex_display_items_dev_mode() ) {

		$plugins_dev_mode = array(
			'update-theme-and-plugins-from-zip-file' => array(
				'featured'    => 'yes',
				'recommended' => 'yes',
				'popular'     => 'no',
			),
			'wpsynchro' => array(
				'featured'    => 'yes',
				'recommended' => 'yes',
				'popular'     => 'no',
			),
			'theme-switcha' => array(
				'featured'    => 'yes',
				'recommended' => 'yes',
				'popular'     => 'no',
			),
			'site-health-manager' => array(
				'featured'    => 'yes',
				'recommended' => 'yes',
				'popular'     => 'no',
			),
		);

	}  // end if

	/** Merge with the existing recommendations and return */
	return array_merge( $plugins, $plugins_elementor, $plugins_block_editor, $plugins_dev_mode );
  
}  // end function

/** Optionally add string translations for the library */
if ( ! function_exists( 'ddwlib_plir_strings_plugin_installer' ) ) :

	add_filter( 'ddwlib_plir/filter/strings/plugin_installer', 'ddwlib_plir_strings_plugin_installer' );
	/**
	 * Optionally, make strings translateable for included library "DDWlib Plugin
	 *   Installer Recommendations".
	 *   Strings:
	 *    - "Newest" --> tab in plugin installer toolbar
	 *    - "Version:" --> label in plugin installer plugin card
	 *
	 * @since 1.3.5
	 * @since 1.4.2 Added new strings.
	 *
	 * @param array $strings Holds all filterable strings of the library.
	 * @return array Array of tweaked translateable strings.
	 */
	function ddwlib_plir_strings_plugin_installer( $strings ) {

		$strings[ 'newest' ] = _x(
			'Newest',
			'Plugin installer: Tab name in installer toolbar',
			'toolbar-extras'
		);

		$strings[ 'version' ] = _x(
			'Version:',
			'Plugin card: plugin version',
			'toolbar-extras'
		);

		$strings[ 'ddwplugins_tab' ] = _x(
			'deckerweb Plugins',
			'Plugin installer: Tab name in installer toolbar',
			'toolbar-extras'
		);

		$strings[ 'tab_title' ] = _x(
			'deckerweb Plugins',
			'Plugin installer: Page title',
			'toolbar-extras'
		);

		$strings[ 'tab_slogan' ] = __( 'Great helper tools for Site Builders to save time and get more productive', 'toolbar-extras' );

		$strings[ 'tab_info' ] = sprintf(
			__( 'You can use any of our free plugins or premium plugins from %s', 'toolbar-extras' ),
			'<a href="https://deckerweb-plugins.com/" target="_blank" rel="nofollow noopener noreferrer">' . $strings[ 'tab_title' ] . '</a>'
		);

		$strings[ 'tab_newsletter' ] = __( 'Join our Newsletter', 'toolbar-extras' );

		$strings[ 'tab_fbgroup' ] = __( 'Facebook User Group', 'toolbar-extras' );

		return $strings;

	}  // end function

endif;  // function check

/** Include class DDWlib Plugin Installer Recommendations */
require_once TBEX_PLUGIN_DIR . 'includes/admin/classes/ddwlib-plir/ddwlib-plugin-installer-recommendations.php';
